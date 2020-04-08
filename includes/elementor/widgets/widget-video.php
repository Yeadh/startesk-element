<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class startesk_Widget_Video extends Widget_Base {
 
   public function get_name() {
      return 'video';
   }
 
   public function get_title() {
      return esc_html__( 'Video', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-site-title';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'video_section',
         [
            'label' => esc_html__( 'Video', 'startesk' ),
            'type' => Controls_Manager::SECTION,
            'default' => __('Featured Tranding of the week','startesk')
         ]
      );

      $this->add_control(
         'sub-title',
         [
            'label' => __( 'Sub Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Our Chalanges','startesk')
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('<span>never</span> break our promise','startesk')
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Online marketplace is type of e-commerce site where product or service information provided by multiple third parties where transactions are processed operator.','startesk')
         ]
      );

      $this->add_control(
         'video-background',
         [
            'label' => __( 'Video Background', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );
      $this->add_control(
         'video-url',
         [
            'label' => __( 'Video url', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );
      $this->add_control(
         'btn',
         [
            'label' => __( 'Button', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'more services', 'startesk' ),
         ]
      );
      $this->add_control(
         'btn-url',
         [
            'label' => __( 'URL', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- video-area -->
      <section class="video-area video-bg" style="background-image: url(<?php echo esc_url($settings['video-background']['url']); ?>);">
          <div class="container">
              <div class="video-overlay s-video-overlay">
                  <div class="row align-items-center">
                      <div class="col-xl-5 col-lg-8 order-2 order-lg-0">
                          <div class="video-title">
                              <span><?php echo esc_html($settings['sub-title']) ?></span>
                              <h2><?php echo $settings['title']; ?></h2>
                              <a href="<?php echo esc_url($settings['btn-url']); ?>"><?php echo esc_html($settings['btn']); ?><span></span></a>
                          </div>
                      </div>
                      <div class="col-lg-3">
                          <div class="video-play">
                              <a href="<?php echo esc_url($settings['video-url']); ?>" class="popup-video"><img src="<?php echo get_template_directory_uri().'/images/play_btn.png' ?>" alt="img"></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- video-area-end -->
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Video );