<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Delivery service area
class startesk_Widget_delivery_service extends Widget_Base {
 
   public function get_name() {
      return 'delivery_service';
   }
 
   public function get_title() {
      return esc_html__( 'Delivery service area', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-counter';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'delivery_service_section',
         [
            'label' => esc_html__( 'Delivery service area', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Exclusive Cargo Gallery', 'startesk' )
         ]
      );

      $this->add_control(
         'subtitle',
         [
            'label' => __( 'Sub Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Delivery Anything', 'startesk' )
         ]
      );

      $delivery_service_1 = new \Elementor\Repeater();

      $delivery_service_1->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );

      $delivery_service_1->add_control(
         'count',
         [
            'label' => __( 'Count', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
         ]
      );

      $delivery_service_1->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Package Delivered', 'startesk' )
         ]
      );

      $delivery_service_1->add_control(
         'text',
         [
            'label' => __( 'Text', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Express delivery is an innaiv service effective logistics solution', 'startesk' )
         ]
      );

      $this->add_control(
         'delivery_service_1',
         [
            'label' => __( 'Counter', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $delivery_service_1->get_controls(),
            'title_field' => '{{title}}'
         ]
      );

      $this->add_control(
        'image',
        [
          'label' => __( 'Choose Image', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $delivery_service_2 = new \Elementor\Repeater();

      $delivery_service_2->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );

      $delivery_service_2->add_control(
         'count',
         [
            'label' => __( 'Count', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
         ]
      );

      $delivery_service_2->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Package Delivered', 'startesk' )
         ]
      );

      $delivery_service_2->add_control(
         'text',
         [
            'label' => __( 'Text', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Express delivery is an innaiv service effective logistics solution', 'startesk' )
         ]
      );

      $this->add_control(
         'delivery_service_2',
         [
            'label' => __( 'Counter', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $delivery_service_2->get_controls(),
            'title_field' => '{{title}}'
         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- delivery-services -->
      <section class="delivery-services position-relative fix pt-110">
          <div class="overlay-title paroller" data-paroller-factor="0.15" data-paroller-factor-lg="0.15" data-paroller-factor-md="0.15" data-paroller-factor-sm="0.15" data-paroller-type="foreground" data-paroller-direction="horizontal">service</div>
          <div class="delivery-services-bg"></div>
          <div class="container">
              <div class="delivery-services-wrap">
                  <div class="row justify-content-center">
                      <div class="col-xl-7 col-lg-10">
                          <div class="s-section-title text-center mb-60">
                              <h2><?php echo esc_html( $settings['title'] ) ?></h2>
                              <p><?php echo esc_html( $settings['subtitle'] ) ?></p>
                          </div>
                      </div>
                  </div>
                  <div class="row align-items-center">
                        <?php foreach (  $settings['delivery_service_1'] as $delivery_service_item_1 ): ?>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                          <div class="single-delivery-services mb-70 pr-75">
                              <div class="ds-icon order-0 order-md-2">
                                  <img src="<?php echo esc_html( $delivery_service_item_1['icon']['url'] ) ?>" alt="icon">
                              </div>
                              <div class="ds-content text-center text-sm-left text-md-right">
                                  <h5><?php echo esc_html( $delivery_service_item_1['title'] ) ?></h5>
                                  <p><?php echo esc_html( $delivery_service_item_1['text'] ) ?></p>
                              </div>
                          </div>
                        </div>
                        <?php endforeach; ?>
                      <div class="col-xl-4 d-none d-xl-block">
                          <div class="d-services-img">
                              <img src="<?php echo esc_url( $settings['image']['url'] ) ?>" alt="img">
                          </div>
                      </div>
                      <?php foreach (  $settings['delivery_service_1'] as $delivery_service_item_1 ): ?>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                          <div class="single-delivery-services mb-70 pr-75">
                            <div class="ds-icon order-0 order-md-2">
                                <img src="<?php echo esc_html( $delivery_service_item_1['icon']['url'] ) ?>" alt="icon">
                            </div>
                            <div class="ds-content text-center text-sm-left text-md-right">
                                <h5><?php echo esc_html( $delivery_service_item_1['title'] ) ?></h5>
                                <p><?php echo esc_html( $delivery_service_item_1['text'] ) ?></p>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                  </div>
              </div>
          </div>
      </section>
      <!-- delivery-services-end -->

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_delivery_service );