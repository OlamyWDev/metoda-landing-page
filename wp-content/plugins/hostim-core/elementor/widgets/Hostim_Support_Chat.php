<?php
namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Controls_Manager,
	Group_Control_Background,
	Group_Control_Box_Shadow,
	Widget_Base,
	Group_Control_Typography,
	Repeater,
	Utils};

class hostim_support_chat extends Widget_Base {

	public function get_name() {
		return 'hostim_support_chat';
	}

	public function get_title() {
		return esc_html__( 'Hostim Support Chat', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-comments';
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

		//=================== Support Chat Slider  =====================//
		$this->start_controls_section( 'support_slider_sec ', [
			'label' => esc_html__( 'Support Chat', 'hostim-core' ),
		] );

		// ==== Support Chat
		$slider1 = new Repeater();
		$slider1->add_control( 'title', [
			'label'       => __( 'Chat Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => 'Dynamic cultivate front-end'
		] );

		$slider1->add_control( 'image', [
			'label'       => __( 'User Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
		] );

		$this->add_control( 'support_chat', [
			'label'       => __( 'Add Item', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $slider1->get_controls(),
			'title_field' => '{{{ title }}}',
		] );

		$this->add_control( 'fimage', [
			'label'       => __( 'Featured Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
            'separator'   => 'before'
		] );

        $this->end_controls_section();

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
		$settings     = $this->get_settings_for_display();
		extract( $settings);

		?>
		<div class="mn-chatting-slider swiper-container overflow-hidden">
			<div class="swiper-wrapper">
				<?php
				if ( is_array($support_chat) ) {
					foreach ( $support_chat as $item ) {
						?>
						<div class="mn-chatting-single d-flex align-items-center swiper-slide">
							<?php echo wp_get_attachment_image($item['image']['id'], 'full', '', ['class' => 'rounded-circle' ]) ?>
							<p class="mb-0 ms-3 bg-white"><?php echo esc_html($item['title']) ?></p>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
		<?php echo !empty($fimage['id']) ? wp_get_attachment_image($fimage['id'], 'full', '', ['class' => 'img-fluid' ]) : '' ?>
		<?php
	}

}