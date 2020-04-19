<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Gallery
class Startesk_Widget_Gallery extends Widget_Base {
 
   public function get_name() {
      return 'gallery';
   }
 
   public function get_title() {
      return esc_html__( 'Gallery area', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'gallery_section',
         [
            'label' => esc_html__( 'Gallery', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $gallery = new \Elementor\Repeater();

      $gallery->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
         ]
      );

      $gallery->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'International Cargo Service', 'startesk' )
         ]
      );

      $gallery->add_control(
         'subtitle',
         [
            'label' => __( 'Sub Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Express delivery is an innovative service', 'startesk' )
         ]
      );

      $gallery->add_control(
         'text',
         [
            'label' => __( 'Text', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Express delivery is an innovative service is effective logistics solution for the delivery of small cargo. This service is useful for companies of various effective logistics scale.', 'startesk' )
         ]
      );

      $gallery->add_control(
         'button',
         [
            'label' => __( 'Button', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'comparison', 'startesk' )
         ]
      );

      $gallery->add_control(
         'url',
         [
            'label' => __( 'URL', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->add_control(
         'gallery_list',
         [
            'label' => __( 'Gallery Items', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $gallery->get_controls(),
            'title_field' => '{{title}}'
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
    // get our input from the widget settings.       
    $settings = $this->get_settings_for_display(); ?>

    <!-- Gallery-area -->
    <section class="Gallery-area Gallery-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="Gallery-active">
                      <?php foreach (  $settings['gallery_list'] as $key => $Gallery ): ?>
                        <div class="single-Gallery-wrap">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="Gallery-img">
                                        <img src="<?php echo esc_html( $Gallery['image']['url'] ) ?>" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="Gallery-content">
                                        <div class="section-title Gallery-title mb-25">
                                            <h2><?php echo esc_html( $Gallery['title'] ) ?></h2>
                                            <h6><?php echo esc_html( $Gallery['subtitle'] ) ?></h6>
                                        </div>
                                        <p><?php echo esc_html( $Gallery['text'] ) ?></p>
                                        <a href="<?php echo esc_url( $Gallery['url'] ) ?>" class="btn"><?php echo esc_html( $Gallery['button'] ) ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery-area-end -->

    <?php
   }
}

Plugin::instance()->widgets_manager->register_widget_type( new Startesk_Widget_Gallery );