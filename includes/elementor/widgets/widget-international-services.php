<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class Startesk_Widget_International_Services extends Widget_Base {
 
   public function get_name() {
      return 'International_Services';
   }
 
   public function get_title() {
      return esc_html__( 'International Services', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'service_section',
         [
            'label' => esc_html__( 'Service', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' =>  __( 'International Cargo', 'startesk' )
         ]
      );

      $this->add_control(
         'minititle',
         [
            'label' => __( 'Mini title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Express delivery is an innovative service', 'startesk' )
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Express delivery is an innovative service is effective logistics solution for the delivery of small cargo. This service is useful for companies of various effective logistics scale.', 'startesk' )
         ]
      );

      $this->add_control(
         'btn',
         [
            'label' => __( 'Button', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'comparison', 'startesk' )
         ]
      );

      $this->add_control(
         'url',
         [
            'label' => __( 'URL', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->add_control(
         'image',
         [
            'label' => __( 'Image', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => get_template_directory_uri().'/images/int_cargo_img.png',
            ],
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
      $settings = $this->get_settings_for_display(); ?>

      <section class="international-services position-relative pb-120 fix">
        <div class="container">
            <div class="services-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-0 order-lg-2">
                        <div class="int-services-img text-center text-lg-right">
                            <img src="<?php echo esc_url($settings['image']['url']) ?>" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="s-section-title mb-30">
                            <h2><?php echo esc_html( $settings['title'] ) ?></h2>
                            <h6><?php echo esc_html( $settings['minititle']) ?></h6>
                        </div>
                        <div class="int-services-content">
                            <p><?php echo esc_html( $settings['desc']) ?></p>
                            <a href="<?php echo esc_url( $settings['url'] ) ?>" class="btn red-btn"><?php echo esc_html( $settings['btn'] ) ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay-title paroller" data-paroller-factor="0.15" data-paroller-factor-lg="0.15" data-paroller-factor-md="0.15" data-paroller-factor-sm="0.15" data-paroller-type="foreground" data-paroller-direction="horizontal">Cargo</div>
      </section>
      <!-- services-area-end -->

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Startesk_Widget_International_Services );