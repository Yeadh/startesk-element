<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class startesk_Widget_Factarea extends Widget_Base {
 
   public function get_name() {
      return 'fact_area';
   }
 
   public function get_title() {
      return esc_html__( 'Fact area', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-counter';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'fact_area_section',
         [
            'label' => esc_html__( 'Fact area', 'startesk' ),
            'type' => Controls_Manager::SECTION,
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

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Exclusive Cargo Gallery', 'startesk' )
         ]
      );

      $counter = new \Elementor\Repeater();

      $counter->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'flaticon-package',
         ]
      );

      $counter->add_control(
         'count',
         [
            'label' => __( 'Count', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
         ]
      );

      $counter->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Package Delivered', 'startesk' )
         ]
      );

      $counter->add_control(
         'text',
         [
            'label' => __( 'Text', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Express delivery is an innaiv service effective logistics solution', 'startesk' )
         ]
      );

      $this->add_control(
         'counter',
         [
            'label' => __( 'Counter', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $counter->get_controls(),
            'title_field' => '{{title}}'
         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- fact-area -->
      <section class="fact-area position-relative pt-115">
          <div class="fact-bg"></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <div class="section-title text-center mb-70">
                        <h6><?php echo esc_html( $settings['subtitle'] ) ?></h6>
                        <h2><?php echo esc_html( $settings['title'] ) ?></h2>
                      </div>
                  </div>
              </div>
              <div class="row">
                <?php foreach (  $settings['counter'] as $counter_single ): ?>
                  <div class="col-xl-3 col-lg-4 col-sm-6">
                      <div class="single-fact mb-50">
                          <div class="fact-icon mb-25">
                              <i class="<?php echo esc_attr( $counter_single['icon'] ) ?>"></i>
                          </div>
                          <div class="fact-content">
                              <h4><span class="count"><?php echo esc_html( $counter_single['count'] ) ?></span></h4>
                              <h6><?php echo esc_html( $counter_single['title'] ) ?></h6>
                              <p><?php echo esc_html( $counter_single['text'] ) ?></p>
                          </div>
                      </div>
                  </div>
                <?php endforeach; ?>
              </div>
          </div>
      </section>
      <!-- fact-area-end -->

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Factarea );