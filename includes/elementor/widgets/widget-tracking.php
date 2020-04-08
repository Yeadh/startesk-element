<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class startesk_Widget_Tracking extends Widget_Base {
 
   public function get_name() {
      return 'Tracking';
   }
 
   public function get_title() {
      return esc_html__( 'Tracking', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-site-title';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'Tracking_section',
         [
            'label' => esc_html__( 'Tracking', 'startesk' ),
            'type' => Controls_Manager::SECTION,
            'default' => __('Featured Tranding of the week','startesk')
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- tracking-area -->
      <div class="tracking-area pt-95 pb-115">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-8 col-lg-10">
                      <div class="tracking-id-info text-center">
                          <p>Enter Your Cargo Tracking, Door to Door Office <a href="#">Order Number.</a></p>
                          <form action="#" class="tracking-id-form">
                              <input type="text" placeholder="Tracking id">
                              <button class="btn red-btn">Tracking</button>
                          </form>
                          <div class="tracking-list">
                              <ul>
                                  <li>
                                      <div class="tracking-list-icon">
                                          <i class="flaticon-box"></i>
                                      </div>
                                      <div class="tracking-list-content">
                                          <p>Dispatch</p>
                                      </div>
                                  </li>
                                  <li class="active">
                                      <div class="tracking-list-icon">
                                          <i class="flaticon-warehouse"></i>
                                      </div>
                                      <div class="tracking-list-content">
                                          <p>departed country</p>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="tracking-list-icon">
                                          <i class="flaticon-placeholder"></i>
                                      </div>
                                      <div class="tracking-list-content">
                                          <p>Destination</p>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="tracking-list-icon">
                                          <i class="flaticon-audit"></i>
                                      </div>
                                      <div class="tracking-list-content">
                                          <p>Successful</p>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                          <div class="tracking-help">
                              <p>MULTIPLE TRACKING NUMBERS | <a href="#">NEED HELP?</a></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- tracking-area-end -->
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Tracking );