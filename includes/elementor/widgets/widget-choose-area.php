<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class Startesk_Widget_Choose_Area extends Widget_Base {
 
   public function get_name() {
      return 'Choose_area';
   }
 
   public function get_title() {
      return esc_html__( 'Choose Area', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'Choose_section',
         [
            'label' => esc_html__( 'Choose', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard Plan'
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Express delivery is an innovative Choose is effective logistics solution for the delivery of small cargo. This Choose is useful for companies various.', 'startesk' )
         ]
      );

      $Choose = new \Elementor\Repeater();

      $Choose->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'how we help you', 'startesk' )
         ]
      );

      $Choose->add_control(
         'image',
         [
            'label' => __( 'Icon', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $Choose->add_control(
         'desc',
         [
            'label' => __( 'Description', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Express delivery is an innovativ Choose is effective logistics solutio for delivery of small cargo Choose.', 'startesk' )
         ]
      );

      $Choose->add_control(
         'btn',
         [
            'label' => __( 'Button', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Read More', 'startesk' )
         ]
      );

      $Choose->add_control(
         'url',
         [
            'label' => __( 'URL', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );


      $this->add_control(
         'Choose_list',
         [
            'label' => __( 'Choose List', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $Choose->get_controls(),
            'default' => [
               [
                  'minititle' => __( 'Inspiration Choose', 'startesk' ),
                  'title' => __( 'Get Insights Inspiration', 'startesk' ),
                  'image' => \Elementor\Utils::get_placeholder_image_src(),
                  'desc' => __( 'Express delivery is an innovativ Choose is effective logistics solutio for delivery of small cargo Choose.', 'startesk' ),
                  'btn' => __( 'LET US HELP', 'startesk' ),
                  'url' => __( '#', 'startesk' ),
               ]
         
            ],
            'title_field' => '{{{ title }}}',
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
      $settings = $this->get_settings_for_display(); ?>

      <!-- choose-area -->
      <section class="choose-area pt-110 pb-80">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-7 col-lg-10">
                      <div class="s-section-title text-center mb-60">
                          <h2><?php echo esc_html( $settings['title'] ); ?></h2>
                          <p><?php echo esc_html( $settings['desc']); ?></p>
                      </div>
                  </div>
              </div>
              <div class="Chooses-wrapper">
                  <div class="row">
                      <?php foreach( $settings['Choose_list'] as $index => $Choose ) { ?>
                      <div class="col-lg-4 col-md-6">
                          <div class="single-choose mb-40">
                              <div class="choose-head">
                                  <div class="choose-icon mb-25">
                                      <img src="<?php echo esc_url($Choose['image']['url']) ?>" alt="img">
                                  </div>
                                  <h3><a href="<?php echo esc_url( $Choose['url'] ) ?>"><?php echo esc_html( $Choose['title'] ) ?></a></h3>
                              </div>
                              <div class="choose-content">
                                  <p><?php echo esc_html( $Choose['desc'] ) ?></p>
                                  <a href="<?php echo esc_url( $Choose['url'] ) ?>"><i class="fas fa-arrow-alt-circle-right"></i> <?php echo esc_html( $Choose['btn'] ) ?></a>
                              </div>
                          </div>
                      </div>
                      <?php } ?>
                  </div>
              </div>
          </div>
      </section>
      <!-- choose-area-end -->

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Startesk_Widget_Choose_Area );