<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class startesk_Widget_Testimonials extends Widget_Base {
 
   public function get_name() {
      return 'testimonials';
   }
 
   public function get_title() {
      return esc_html__( 'Testimonials', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-testimonial';
   }

   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'testimonial_section',
         [
            'label' => esc_html__( 'Testimonials', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'style',
         [
            'label' => __( 'Columns', 'tijarah' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style1',
            'options' => [
               'style1'  => __( 'Style 1', 'tijarah' ),
               'style2' => __( 'Style 2', 'tijarah' ),
            ],
         ]
      );


      $this->add_control(
         'image',
         [
            'label' => __( 'Background', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
         ]
      );

      $this->add_control(
         'testi_subtitle',
         [
            'label' => __( 'Sub title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Happy Customer Quotes', 'startesk' ),
         ]
      );


      $this->add_control(
         'testi_title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Our Top Reviews', 'startesk' ),
            
         ]
      );


      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Air Freight', 'startesk' ),
         ]
      );

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
         ]
      );
      
      $repeater->add_control(
         'name',
         [
            'label' => __( 'Name', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Emaley Mcculloch', 'startesk' ),
            
         ]
      );

      $repeater->add_control(
         'designation',
         [
            'label' => __( 'Designation', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Founder ceo', 'startesk' ),
         ]
      );

      $repeater->add_control(
         'testimonial',
         [
            'label' => __( 'Testimonial', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '“ Express delivery is an innovative service is effective logistics solution for the delivery of small cargo. This service is useful companied various effective logistics scala ”', 'startesk' ),
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

      $this->add_control(
         'testimonial_list',
         [
            'label' => __( 'Testimonial List', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{name}}',

         ]
      );



      $this->add_control(
         'quote_subtitle',
         [
            'label' => __( 'Sub title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Clients Trust Us', 'startesk' ),
         ]
      );


      $this->add_control(
         'quote_title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Cargo Request Quote', 'startesk' ),
            
         ]
      );

      $this->add_control(
         'shortcode',
         [
            'label' => __( 'Quote shortcode', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '[contact-form-7 id="2096" title="Cargo Request Quote"]',
            
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <?php if ( $settings['style'] == 'style1' ) { ?>
      <!-- section-area -->
      <section class="area-wrapper black-bg position-relative pt-115 pb-120">
          <div class="area-wrap-bg" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);"></div>
          <div class="testimonial-map-bg"></div>
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="testimonial-area">
                          <div class="section-title white-title mb-55">
                              <h6><?php echo esc_html($settings['testi_subtitle']); ?></h6>
                              <h2><?php echo esc_html($settings['testi_title']); ?></h2>
                          </div>
                          <div class="testimonial-active">
                            <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
                              <div class="single-testimonial">
                                  <div class="testimonial-cat mb-30">
                                      <h5><?php echo esc_html($testimonial_single['title']); ?></h5>
                                      <div class="testimonial-rating">
                                        <?php for ($x = 0; $x <= $testimonial_single['rating']; $x++) {
                                          echo "<i class='fas fa-star'></i>";
                                        } ?>
                                      </div>
                                  </div>
                                  <div class="testimonial-content mb-45">
                                      <p>“<?php echo esc_html($testimonial_single['testimonial']); ?>”</p>
                                  </div>
                                  <div class="testimonial-avatar">
                                      <div class="testi-avatar-img">
                                          <img src="<?php echo esc_url($testimonial_single['image']['url']) ?>" alt="img">
                                      </div>
                                      <div class="testi-avatar-info">
                                          <h6><?php echo esc_html($testimonial_single['name']); ?></h6>
                                          <span><?php echo esc_html($testimonial_single['designation']); ?></span>
                                      </div>
                                  </div>
                              </div>
                            <?php endforeach; ?>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="cta-area cta-pl">
                          <div class="section-title white-title mb-60">
                              <h6><?php echo esc_html($settings['quote_subtitle']); ?></h6>
                              <h2><?php echo esc_html($settings['quote_title']); ?></h2>
                          </div>
                          <?php echo do_shortcode( $settings['shortcode'] ) ?>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- section-area-end -->
      <?php } elseif ( $settings['style'] == 'style2' ) { ?>
      <!-- testimonial-area -->
      <section class="testimonial-area pt-110 pb-120 testimonial-bg">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-7 col-lg-10">
                      <div class="s-section-title text-center mb-90">
                          <h2><?php echo esc_html($settings['testi_title']); ?></h2>
                      </div>
                  </div>
              </div>
              <div class="testimonial-padding-wrap">
                  <div class="row s-testi-active">
                  <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
                      <div class="col-12">
                          <div class="s-single-testimonial">
                              <div class="s-testi-content">
                                  <h5>“ <?php echo esc_html($testimonial_single['testimonial']); ?> “</h5>
                              </div>
                              <div class="s-testi-avatar">
                                  <div class="s-testi-avatar-img">
                                      <img src="<?php echo esc_url($testimonial_single['image']['url']) ?>" alt="<?php echo esc_html($testimonial_single['name']); ?>">
                                  </div>
                                  <div class="s-testi-avatar-info">
                                      <p><?php echo esc_html($testimonial_single['name']); ?> <span><?php echo esc_html($testimonial_single['designation']); ?></span></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <?php endforeach; ?>
                  </div>
                  <div class="s-testi-quote">
                      <img src="<?php echo get_template_directory_uri() ?>/images/testi_quote.png" alt="img">
                  </div>
              </div>
          </div>
      </section>
      <!-- testimonial-area-end -->

      <?php } ?>

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Testimonials );