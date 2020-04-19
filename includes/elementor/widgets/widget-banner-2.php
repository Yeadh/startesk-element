<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// banner2
class Startesk_Widget_banner22 extends Widget_Base {
 
   public function get_name() {
      return 'banner2';
   }
 
   public function get_title() {
      return esc_html__( 'Banner 2', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner2_section',
         [
            'label' => esc_html__( 'banner2 1', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'logistics cargo service', 'startesk' ),
            
         ]
      );

      $banner2 = new \Elementor\Repeater();

      $banner2->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Delivery', 'startesk' ),
            
         ]
      );

      $banner2->add_control(
         'subtitle',
         [
            'label' => __( 'Sub Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Express', 'startesk' ),
            
         ]
      );

      $this->add_control(
         'banner2_list',
         [
            'label' => __( 'banner2 Items', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $banner2->get_controls(),
            'title_field' => '{{title}}',

         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
    // get our input from the widget settings.       
    $settings = $this->get_settings_for_display(); ?>

    <!-- slider-area -->
    <section class="s-slider-area">
        <div class="s-slider-bg fix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="s-slider-content text-center">
                            <h6><span class="dots"></span><?php echo esc_html( $settings['title'] ) ?><span class="dots2"></span></h6>
                            <?php foreach (  $settings['banner2_list'] as $key => $banner2 ): ?>
                              <h2 class="frame-<?php echo $key ?>"><span><?php echo esc_html( $banner2['title'] ) ?></span> <?php echo esc_html( $banner2['subtitle'] ) ?></h2>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#category-section" class="icon-scroll">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="slider-golve">
                <img src="<?php echo get_template_directory_uri() ?>/images/golve.png" class="rotateme" alt="">
            </div>
            <div class="slider-golve-bike">
                <img src="<?php echo get_template_directory_uri() ?>/images/bike.png" alt="">
            </div>
            <div class="slide-golve-car">
                <img src="<?php echo get_template_directory_uri() ?>/images/car.png" alt="">
            </div>
            <div class="slider-plane">
                <img src="<?php echo get_template_directory_uri() ?>/images/plane.png" alt="">
            </div>
        </div>
    </section>
    <!-- slider-area-end -->

    <?php
   }
}

Plugin::instance()->widgets_manager->register_widget_type( new Startesk_Widget_banner22 );