<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class startesk_Widget_Pricing extends Widget_Base {
 
   public function get_name() {
      return 'pricing';
   }
 
   public function get_title() {
      return esc_html__( 'Pricing', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'pricing_section',
         [
            'label' => esc_html__( 'Pricing', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'cargo logistics Plan'
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Express delivery is an innovative service is effective logistics solution for the delivery of small cargo. This service is useful for companies various.'
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- pricing-area -->
      <section class="pricing-area pt-110 pb-90">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-7 col-lg-10">
                      <div class="s-section-title text-center mb-60">
                          <h2><?php echo esc_html( $settings['title'] ); ?></h2>
                          <p><?php echo esc_html( $settings['desc'] ); ?></p>
                      </div>
                  </div>
              </div>
              <div class="pricing-wrap pl-80 pr-80">
                  <div class="row">
                     <?php
                     $products = new \WP_Query( array( 
                      'post_type' => 'pricing',
                      'posts_per_page' => $settings['ppp'],
                      'ignore_sticky_posts' => true,
                      'order' => $settings['order'],
                     ));
                     /* Start the Loop */

                     while ( $products->have_posts() ) : $products->the_post(); 

                     $duration = get_post_meta( get_the_ID(), 'duration', 1 );
                     $price = get_post_meta( get_the_ID(), 'price', 1 );
                     $buy_button = get_post_meta( get_the_ID(), 'buy_button', 1 );
                     $buy_button_url = get_post_meta( get_the_ID(), 'buy_button_url', 1 );
                     $feature_repeat_group = get_post_meta( get_the_ID(), 'feature_repeat_group', true ); ?>
                      <div class="col-lg-4 col-md-6">
                          <div class="single-pricing text-center mb-30">
                              <div class="pricing-head mb-30">
                                  <div class="pricing-icon mb-15">
                                      <?php the_post_thumbnail() ?>
                                  </div>
                                  <h5><?php the_title(); ?></h5>
                                  <span>Free plan</span>
                                  <p>Subscribe Best Plans</p>
                                  <div class="price-count">
                                      <h4>Free License</h4>
                                  </div>
                              </div>
                              <?php if ($feature_repeat_group): ?>
                                 
                              <div class="pricing-list mb-30">
                                  <ul class="list-unstyled">
                                    <?php foreach ($feature_repeat_group as $key => $value) { ?>
                                       <li><?php echo $value['price_feature'] ?></li>
                                    <?php } ?>
                                  </ul>
                              </div>

                              <?php endif ?>
                              <div class="pricing-btn">
                                  <a href="<?php echo $buy_button_url ?>" class="btn"><?php echo $buy_button ?><i class="fas fa-shopping-cart"></i></a>
                              </div>
                          </div>
                      </div>
                      <?php endwhile; wp_reset_postdata(); ?>
                  </div>
              </div>
          </div>
      </section>
      <!-- pricing-area-end -->

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Pricing );