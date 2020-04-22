<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class startesk_Widget_Controlarea extends Widget_Base {
 
   public function get_name() {
      return 'Controlarea';
   }
 
   public function get_title() {
      return esc_html__( 'Control area', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-counter';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'Controlarea_section',
         [
            'label' => esc_html__( 'Controlarea', 'startesk' ),
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

      $slides = new \Elementor\Repeater();

      $slides->add_control(
         'image',
         [
            'label' => __( 'Image', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );

      $slides->add_control(
         'url',
         [
            'label' => __( 'URL', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
         ]
      );

      $slides->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Package Delivered', 'startesk' )
         ]
      );

      $slides->add_control(
         'text',
         [
            'label' => __( 'Text', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Express delivery is an innaiv service effective logistics solution', 'startesk' )
         ]
      );

      $this->add_control(
         'slides',
         [
            'label' => __( 'Counter', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $slides->get_controls(),
            'title_field' => '{{title}}'
         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>


      <!-- control-area -->
      <section class="control-area pt-110 pb-120">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-7 col-lg-10">
                      <div class="s-section-title text-center mb-60">
                          <h2><?php echo esc_html( $settings['title'] ) ?></h2>
                          <p><?php echo esc_html( $settings['subtitle'] ) ?></p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="container-fluid control-fluid">
              <div class="row control-active">
                  <?php foreach (  $settings['slides'] as $slide ): ?>
                  <div class="col-xl-4">
                      <div class="single-control-wrap fix">
                          <div class="control-thumb">
                              <img src="<?php echo esc_html( $slide['image']['url'] ) ?>" alt="img">
                          </div>
                          <div class="control-overlay-content">
                              <h4><a href="<?php echo esc_url( $slide['url'] ) ?>"><?php echo esc_html( $slide['title'] ) ?></a></h4>
                              <span><?php echo esc_html( $slide['text'] ) ?></span>
                          </div>
                      </div>
                  </div>
                  <?php endforeach; ?>
              </div>
          </div>
      </section>
      <!-- control-area-end -->
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Controlarea );