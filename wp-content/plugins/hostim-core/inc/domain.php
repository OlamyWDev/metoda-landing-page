<?php

/**
 * Domain
 *
 * @package Hostim
 * @author ThemeTags
 * @link https://themetags.com
 */
class Hostim_Domain
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action('wp_ajax_nopriv_hostim_ajax_search_domain', array($this, 'ajax_search_domain'));
        add_action('wp_ajax_hostim_ajax_search_domain', array($this, 'ajax_search_domain'));
        add_action('wp_ajax_nopriv_hostim_domain_search_seggestion', array($this, 'ajax_search_suggested_domain'));
        add_action('wp_ajax_hostim_domain_search_seggestion', array($this, 'ajax_search_suggested_domain'));
        add_action('wp_head', array($this, 'domain_js_file'));
        add_action('wdes_domain_verify_code', array($this, 'verify_code'));

    }

    /**
     * Admin ajax for domain.
     */
    function domain_js_file()
    {
        echo '<script>
            /*<![CDATA[*/
            var hostim_ajax_url = "' . admin_url('admin-ajax.php') . '";
            /*]]>*/
          </script>';
    }

    public function hostim_whmcs_url_build($domain)
    {
        $theme_option = get_option('hostim_cs_options');
        $whmcs_portal_url = !empty($theme_option['whmcs_portal_url']) ? $theme_option['whmcs_portal_url'] : '';
        $portal_url = esc_url($whmcs_portal_url) . '/cart.php?systpl=hostim&carttpl=themetags_cart&a=add&domain=register&query='.$domain;
        return $portal_url;
    }
    /**
     * Connect from whois server.
     *
     * @param string $domain the full domain that will checking.
     *
     * @return mixed|string
     */
    public function get_whois_server($domain)
    {

        $fp = stream_socket_client('whois.iana.org:43', $errno, $errstr, 30);
        if (!$fp) {
            echo "$errstr ($errno)<br />\n";
        } else {

            fputs($fp, $domain . "\r\n");
            $response_text = '';

            while (!feof($fp)) {
                $response_text .= fgets($fp, 128);
            }

            $response_server = '';

            if (strpos($response_text, 'but this server does not have') == 0) {
                if (strpos($domain, 'earth') == true) {
                    return $response_server = 'whois.nimzo98.com';
                }

                $split_whois        = explode('whois: ', $response_text);
                $split_status       = explode('status:', $split_whois[1]);
                $response_server    = preg_replace('/\s+/', '', $split_status[0]);
            }


            return $response_server;
        }
    }

    /**
     * Check if domain is available.
     *
     * @param $whois_server
     * @param $domain
     *
     * @return array
     */
    public function check_available($whois_server, $domain)
    {
        if ($whois_server && $domain) {

            $fp = stream_socket_client($whois_server . ':43', $errno, $errstr, 30);
            if (!$fp) {
                echo "$errstr ($errno)<br />\n";
            } else {
                fputs($fp, $domain . "\r\n");
                $response = '';

                while (!feof($fp)) {
                    $response .= fgets($fp, 128);
                }

                //Fix for work with country extension
                $lowercase_response = strtolower($response);

                if (is_int(strpos($lowercase_response, 'domain name:'))) {
                    $result = true;
                } else {
                    $result = false;
                }

                return array(
                    'status' => $result,
                );
            }
        } else {
            return array(
                'status' => false,
            );
        }

    }

    /**
     * Get the domain result by ajax.
     */
    public function ajax_search_domain()
    {
        $domain = sanitize_text_field(trim($_POST['domain']));

        $domainArr = explode('.', $domain);

        $ext      = '';
        $n_domain = '';
        if(count($domainArr) == 1) { // somedomain
            $ext = '.com';
            $n_domain = $domain . $ext;
        } else if (!empty($domainArr) && count($domainArr) == 2) { // somedomain.com
            $ext      = $domainArr[1];
            $n_domain = $domain;
        } else if (!empty($domainArr) && count($domainArr) == 3 && $domainArr[0] === 'www') { // www.somedomain.com
            $ext      = $domainArr[2];
            $n_domain = $domainArr[1] . '.' . $domainArr[2];
        }
        
        if(!empty($ext) && !empty($n_domain)) {
            $output = array(
                'status'        => '',
                'domain'        => '',
                'results_html'  => '',
            );

            $whois_server = $this->get_whois_server($n_domain);

            if (empty($whois_server)) {
                $output = array(
                    'status'        => 'no_support',
                    'domain'        => $domain,
                    'results_html'  => esc_html__('Please check the domain name or extension', 'hostim-core'),
                );
            } else {
                $output = $this->check_available($whois_server, $n_domain);

                $output['status'] = ($output['status']) ? 'taken' : 'available';
                $output['domain'] = $n_domain;

                // result html.
                if ($output['status'] === 'available') {
                    
                    $output['results_html'] = '<div class="result-wrapper alert-success mb-3"><i class="far fa-check-circle"></i>' . __('Congratulation', 'hostim-core') . ' <b>' . $domain . ' </b>' . __('is available!', 'hostim-core') . '<span class="reasult-info"><a href="' . self::hostim_whmcs_url_build($domain) . '" class="hostim-btn" target="_blank"><input type="button" class="wdes-purchase-btn template-btn primary-btn btn-small flex-shrink-0 border-0" value="' . esc_attr__('Purchase', 'hostim-core') . '"></a></span></div>';
                } else {
                    $output['results_html'] = '<div class="result-wrapper alert-danger mb-3"><span class="hostim-btn-token"><i class="fas fa-exclamation-circle icon-taken"></i><b>' . $domain . ' </b>' . ' ' . __('is unavailable', 'hostim-core') . '</span>';
                }
            }

        } else {
            $output = array(
                'status'        => 'no_support',
                'domain'        => $domain,
                'results_html'  => esc_html__('Please check the domain name or extension', 'hostim-core'),
            );
        }

        wp_send_json($output);
    }

    /**
     * Get the domain result by ajax.
     */
    public function ajax_search_suggested_domain()
    {
        $domain     = sanitize_text_field($_POST['domain']); // "somedomain"
        $domainArr  = explode('.', $domain);
        $exclodeExt = '.'.$domainArr[1];
        $basename   = $domainArr[0];
        $exts       = $_POST['extensions']; //[".org", ".net", ".online"]
        $domainList = [];

        if(!empty($exts)) {
            foreach($exts as $ext) {
                if($ext != $exclodeExt ){
                    $output = [
                        'status'        => '',
                        'domain'        => '',
                        'results_html'  => '',
                    ];

                    $n_domain     = $basename . $ext;
                    $whois_server = $this->get_whois_server($n_domain);
                    if(!empty($whois_server)) {
                        $output = $this->check_available($whois_server, $n_domain);

                        $output['status'] = ($output['status']) ? 'taken' : 'available';
                        $output['domain'] = $n_domain;

                        if ($output['status'] === 'available') {
                            $output['results_html'] = '<div class="result-wrapper alert-success"><i class="far fa-check-circle"></i><b>' . $n_domain . ' </b>' . __('is available!', 'hostim-core') . '<span class="reasult-info"><a href="' . self::hostim_whmcs_url_build($n_domain) . '" class="hostim-btn" target="_blank"><input type="button" class="wdes-purchase-btn template-btn primary-btn btn-small flex-shrink-0 border-0" value="' . esc_attr__('Purchase', 'hostim-core') . '"></a></span></div>';
                        }

                        $domainList[] = $output;
                    }
                }
                
            }
        }

        wp_send_json($domainList);
    }

    /**
     * Verify code
     */
    public function verify_code()
    {
        echo '<input type="hidden" name="token" value="0811bf819565bf8142cc613d099e85a27ec1204c">';
    }


}

$obj = new Hostim_Domain();