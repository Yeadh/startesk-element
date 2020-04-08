<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class startesk_Widget_ratings extends Widget_Base {
 
   public function get_name() {
      return 'ratings';
   }
 
   public function get_title() {
      return esc_html__( 'ratings', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-rating';
   }

   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'rating_section',
         [
            'label' => esc_html__( 'ratings', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'What customers are thinking?', 'startesk' ),
            
         ]
      );


      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose icon', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
         ]
      );

      $repeater->add_control(
         'based',
         [
            'label' => __( 'Based on', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '3458'
         ]
      );

      $repeater->add_control(
        'rating',
        [
          'label' => __( 'Rating', 'startesk' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 1,
          'options' => [
            1 => __( 'Star 1', 'startesk' ),
            2 => __( 'Star 2', 'startesk' ),
            3 => __( 'Star 3', 'startesk' ),
            4 => __( 'Star 4', 'startesk' ),
            5 => __( 'Star 5', 'startesk' ),
            'none' => __( 'None', 'startesk' ),
          ]
        ]
      );

      $repeater->add_control(
        'delivery_rating',
        [
          'label' => __( 'delivery rating', 'startesk' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 1,
          'options' => [
            1 => __( 'Star 1', 'startesk' ),
            2 => __( 'Star 2', 'startesk' ),
            3 => __( 'Star 3', 'startesk' ),
            4 => __( 'Star 4', 'startesk' ),
            5 => __( 'Star 5', 'startesk' ),
            'none' => __( 'None', 'startesk' ),
          ]
        ]
      );

      $repeater->add_control(
        'experience_rating',
        [
          'label' => __( 'experience rating', 'startesk' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'default' => 1,
          'options' => [
            1 => __( 'Star 1', 'startesk' ),
            2 => __( 'Star 2', 'startesk' ),
            3 => __( 'Star 3', 'startesk' ),
            4 => __( 'Star 4', 'startesk' ),
            5 => __( 'Star 5', 'startesk' ),
            'none' => __( 'None', 'startesk' ),
          ]
        ]
      );

      $this->add_control(
         'rating_list',
         [
            'label' => __( 'rating List', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls()

         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- rating-area -->
      <section class="rating-area pt-110 pb-50">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-7 col-lg-10">
                      <div class="s-section-title text-center mb-80">
                          <h2><?php echo esc_html($settings['title']); ?></h2>
                      </div>
                  </div>
              </div>
              <div class="rating-wrap">
                  <div class="row">
                    <?php foreach (  $settings['rating_list'] as $rating_single ): ?>
                      <div class="col-lg-6">
                          <div class="single-customer-rating mb-70">
                              <div class="customer-rating-top">
                                  <div class="customer-thumb">
                                      <a href="#"><img src="<?php echo esc_html( $rating_single['image']['url'] ); ?>" alt="img"></a>
                                      <div class="rating-info">
                                          <h6><?php esc_html_e( 'Overall Rating', 'startesk' ) ?></h6>
                                          <h3><?php echo esc_html( $rating_single['rating'] ) ?>.0</h3>
                                      </div>
									  <div class="raising-star mb-15">
                                          <?php 
                                          for ($i = 1; $i <= $rating_single['rating']; $i++) {
                                                echo '<i class="fas fa-star"></i>';
                                          } ?>
									  </div>
                                      <span><?php echo esc_html__( 'based on ', 'startesk' ).esc_html( $rating_single['based'] ).esc_html__( ' ratings', 'startesk' ) ?></span>
                                  </div>
                              </div>
                              <div class="rating-list">
                                  <ul>
                                      <li>
                                          <?php esc_html_e( 'On Time Delivery', 'startesk' ) ?>
                                          <span><?php echo esc_html( $rating_single['delivery_rating'] ) ?>.0</span>
                                          <div class="raising-star">
                                              <?php 
                                          for ($i = 1; $i <= $rating_single['delivery_rating']; $i++) {
                                                echo '<i class="fas fa-star"></i>';
                                          } ?>
                                          </div>
                                      </li>
                                      <li>
                                          <?php esc_html_e( 'Delivery experience', 'startesk' ) ?>
                                          <span><?php echo esc_html( $rating_single['experience_rating'] ) ?>.0</span>
                                          <div class="raising-star">
                                              <?php 
                                          for ($i = 1; $i <= $rating_single['experience_rating']; $i++) {
                                                echo '<i class="fas fa-star"></i>';
                                          } ?>
                                          </div>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
              </div>
          </div>
      </section>
      <!-- rating-area-end -->
   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_ratings );