<?php
namespace Hostim\Widgets;

defined( 'ABSPATH' ) || exit; // Abort, if called directly.

use Elementor\{Group_Control_Border,
	Group_Control_Box_Shadow,
	Group_Control_Image_Size,
	Utils,
	Widget_Base,
	Controls_Manager,
	Group_Control_Background};

class Hostim_jobs extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve alert widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'hostim_jobs';
	}

	public function get_title() {
		return __( 'Hostim Jobs', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	/**
	 * Name: register_controls
	 * Desc: Register controls for these widgets
	 * Params: no params
	 * Return: @void
	 * Since: @1.0.0
	 * Package: @hostim
	 * Author: Themetags
	 */
	protected function register_controls() {
		$this-> elementor_content_control();
		$this-> elementor_style_control();
	}

	/**
	 * Name: elementor_content_control()
	 * Desc: Register content
	 * Params: no params
	 * Return: @void
	 * Since: @1.0.0
	 * Package: @hostim
	 * Author: Themetags
	 */
	public function elementor_content_control() {


		//======================== Filter Options ==========================//
		$this->start_controls_section(
			'filter', [
				'label' => __( 'Filter', 'hostim-core' ),
			]
		);

		$this->add_control(
			'show_count', [
				'label' => esc_html__( 'Show Posts Count', 'hostim-core' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 4
			]
		);

		$this->add_control(
			'order', [
				'label' => esc_html__( 'Order', 'hostim-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => 'ASC',
					'DESC' => 'DESC'
				],
				'default' => 'ASC'
			]
		);

		$this->add_control(
			'orderby', [
				'label' => esc_html__( 'Order By', 'hostim-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => 'None',
					'ID' => 'ID',
					'author' => 'Author',
					'title' => 'Title',
					'name' => 'Name (by post slug)',
					'date' => 'Date',
					'rand' => 'Random',
				],
				'default' => 'none'
			]
		);

		$this->add_control(
			'title_length', [
				'label' => esc_html__('Title Length', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'excerpt_length', [
				'label' => esc_html__('Excerpt Word Length', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 15,
			]
		);

		$this->add_control(
			'exclude', [
				'label' => esc_html__( 'Exclude', 'hostim-core' ),
				'description' => esc_html__( 'Enter the post IDs to hide/exclude. Input the multiple ID with comma separated', 'hostim-core' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section(); //End Filter's


		//======================== Button Title ==========================//
		$this->start_controls_section(
			'sec_button', [
				'label' => __( 'Apply Button', 'hostim-core' ),
			]
		);

		$this->add_control(
			'btn_title', [
				'label' => esc_html__( 'Button Title', 'hostim-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Apply Now',
                'separator' => 'after'
			]
		);

        // Style Buttons
		$this->start_controls_tabs(
			'style_btn_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab', [
				'label' => esc_html__( 'Normal', 'hostim-core' ),
			]
		);

		$this->add_control(
			'normal_btn_text_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__btn' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'normal_btn_border_color', [
				'label' => esc_html__( 'Border Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__btn' => 'border-color: {{VALUE}}'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(), [
				'name' => 'normal_btn_bg_color',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .__btn',
			]
		);

		$this->end_controls_tab(); //Normal Color

		$this->start_controls_tab(
			'style_hover_tab', [
				'label' => esc_html__( 'Hover', 'hostim-core' ),
			]
		);

		$this->add_control(
			'hover_btn_text_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__btn:hover' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'hover_btn_border_color', [
				'label' => esc_html__( 'Border Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__btn:hover' => 'border-color: {{VALUE}}'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(), [
				'name' => 'hover_btn_bg_color',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .__btn:hover',
			]
		);

		$this->end_controls_tab(); //Normal Color

		$this->end_controls_tab();
		$this->end_controls_tabs();


        $this->end_controls_section(); //End Button Title


	}

	/**
	 * Name: elementor_style_control()
	 * Desc: Register style content
	 * Params: no params
	 * Return: @void
	 * Since: @1.0.0
	 * Package: @hostim
	 * Author: Themetags
	 */
	public function elementor_style_control() {

		//======================== Style Title ==========================//
		$this->start_controls_section(
			'style_title', [
				'label' => __( 'Title', 'hostim-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'title_typo',
				'selector' => '{{WRAPPER}} .__title',
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__title' => 'color: {{VALUE}}'
				],
			]
		);

        $this->end_controls_section(); //End Item Title

	}


	/**
	 * Name: render
	 * Desc: Widgets Render
	 * Params: no params
	 * Return: @void
	 * Since: @1.0.0
	 * Package: @hostim
	 * Author: Themetags
	 */
	protected function render() {

		$settings = $this->get_settings();
		extract( $settings );

		$args = [
			'post_type' => 'job',
			'post_status' => 'publish',
		];

		if ( !empty($show_count) ) {
			$args['posts_per_page'] = $show_count;
		}

		if ( !empty($order) ) {
			$args['order'] = $order;
		}

		if ( !empty($orderby) ) {
			$args['orderby'] = $orderby;
		}

		if ( !empty($exclude ) ) {
			$args['post__not_in'] = $exclude;
		}

		$job_posts = new \WP_Query( $args );
		?>
        <div class="row justify-content-center g-4">
            <?php
            while ($job_posts->have_posts()) : $job_posts->the_post();
                global $post;
	            $job_type = get_the_terms( $post->ID, 'job_type' );
	            ?>
                <div class="col-lg-6">
                    <div class="jobs-single bg-white rounded">
                        <?php if ( !empty($job_type) ) : ?>
                            <span class="job-type d-block text-end mb-1">
                                <svg class="me-1" width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.6744 2.13347C17.6733 2.13347 17.6722 2.13333 17.6711 2.13333H12.8356V1.6C12.8356 0.717778 12.1178 0 11.2356 0H6.96889C6.08667 0 5.36889 0.717778 5.36889 1.6V2.13333H0.533333C0.236389 2.13333 0 2.37667 0 2.66667V14.4C0 15.2822 0.717778 16 1.6 16H16.6044C17.4867 16 18.2044 15.2822 18.2044 14.4V2.67792C18.2044 2.67722 18.2044 2.67653 18.2044 2.67583C18.184 2.32556 17.9686 2.13542 17.6744 2.13347V2.13347ZM6.43556 1.6C6.43556 1.30597 6.67486 1.06667 6.96889 1.06667H11.2356C11.5296 1.06667 11.7689 1.30597 11.7689 1.6V2.13333H6.43556V1.6ZM16.9311 3.2L15.2749 8.16861C15.2022 8.38681 14.9989 8.53333 14.769 8.53333H11.7689V8C11.7689 7.70542 11.5301 7.46667 11.2356 7.46667H6.96889C6.67431 7.46667 6.43556 7.70542 6.43556 8V8.53333H3.43542C3.20556 8.53333 3.00222 8.38681 2.92958 8.16861L1.27333 3.2H16.9311ZM10.7022 8.53333V9.6H7.50222V8.53333H10.7022ZM17.1378 14.4C17.1378 14.694 16.8985 14.9333 16.6044 14.9333H1.6C1.30597 14.9333 1.06667 14.694 1.06667 14.4V5.95319L1.91764 8.50597C2.13569 9.16042 2.74569 9.6 3.43542 9.6H6.43556V10.1333C6.43556 10.4279 6.67431 10.6667 6.96889 10.6667H11.2356C11.5301 10.6667 11.7689 10.4279 11.7689 10.1333V9.6H14.769C15.4588 9.6 16.0688 9.16042 16.2868 8.50597L17.1378 5.95319V14.4Z" fill="#666666"></path>
                                </svg>
                                <?php echo Hostimg_Core_Helper()->get_the_first_taxonomy('job_type') ?>
                            </span>
                        <?php endif; ?>
                        <h4 class="mb-2 __title"><?php echo Hostimg_Core_Helper()->get_the_title_length($settings, 'title_length' ) ?></h4>
                        <span class="time-date"><?php  the_time(get_option('date_format')) ?></span>
                        <p class="mt-3 mb-4 __excerpt"><?php echo Hostimg_Core_Helper()->get_the_excerpt_length($settings, 'excerpt_length' ) ?></p>
                        <a href="<?php the_permalink(); ?>" class="template-btn outline-btn btn-small __btn">
                            <?php echo esc_html($settings['btn_title']) ?>
                        </a>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
		<?php


	}

}
