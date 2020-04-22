<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// banner3
class Startesk_Widget_banner3 extends Widget_Base {
 
   public function get_name() {
      return 'banner3';
   }
 
   public function get_title() {
      return esc_html__( 'Banner 3', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner3_section',
         [
            'label' => esc_html__( 'banner', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Delivery Express', 'startesk' ),
            
         ]
      );

      $this->add_control(
         'subtitle',
         [
            'label' => __( 'Sub Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Explore ways to become more efficient, see printing offers and solutions insights and inspiration for your small business.', 'startesk' ),
            
         ]
      );

      $this->add_control(
         'title2',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Delivery Express', 'startesk' ),
            
         ]
      );

      $this->add_control(
         'subtitle2',
         [
            'label' => __( 'Sub Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Explore ways to become more efficient, see printing offers and solutions insights and inspiration for your small business.', 'startesk' ),
            
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
    // get our input from the widget settings.       
    $settings = $this->get_settings_for_display(); ?>


    <!-- slider-area -->
    <section class="slider-area">
        <div class="slider-active">

            <div class="single-slider slider-bg d-flex align-items-center">
                <div class="slider-overlay-bg"></div>
                <div class="slider-bg-shape"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-11">
                            <div class="slider-content text-center">
                                <h2 data-animation="fadeInUpS" data-delay=".3s"><?php echo esc_html( $settings['title'] ) ?></h2>
                                <p data-animation="fadeInUpS" data-delay=".6s"><?php echo esc_html( $settings['subtitle'] ) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-slider slider-bg slider-video-overlay d-flex align-items-center youtube-bg" data-property="{videoURL:'enKKcVrPGs0',}">
                <div class="slider-overlay-bg"></div>
                <div class="slider-bg-shape"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-11">
                            <div class="slider-content text-center">
                                <h2 data-animation="fadeInUpS" data-delay=".3s"><?php echo esc_html( $settings['title2'] ) ?></h2>
                                <p data-animation="fadeInUpS" data-delay=".6s"><?php echo esc_html( $settings['subtitle2'] ) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- slider-area-end -->
    <?php
   }
}

Plugin::instance()->widgets_manager->register_widget_type( new Startesk_Widget_banner3 );