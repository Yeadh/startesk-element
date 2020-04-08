<?php 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class Startesk_Widget_Newsletter extends Widget_Base {
 
   public function get_name() {
      return 'newsletter';
   }
 
   public function get_title() {
      return esc_html__( 'Newsletter', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {
    
      $this->start_controls_section(
         'newsletter_section',
         [
            'label' => esc_html__( 'Newsletter', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Newsletter Sign Up', 'startesk' ),
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Notifications our best deals...', 'startesk' ),
         ]
      );

      $this->add_control(
         'shortcode',
         [
            'label' => __( 'shortcode', 'startesk' ),
            'type' => \Elementor\Controls_Manager::CODE,
            'language' => 'html',
            'rows' => 20,
         ]
      );

      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- newsletter -->
      <section class="newsletter-area gray-bg">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="newsletter-wrap">
                          <div class="row">
                              <div class="col-lg-5">
                                  <div class="newsletter-content">
                                      <h4><?php echo esc_html($settings['title']); ?></h4>
                                      <span><?php echo esc_html($settings['desc']); ?></span>
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  <div class="newsletter-form">
                                    <?php echo do_shortcode( $settings['shortcode'] ) ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- newsletter-end -->

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new Startesk_Widget_Newsletter );