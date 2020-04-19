<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// about
class Startesk_Widget_About extends Widget_Base {
 
   public function get_name() {
      return 'about';
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
         'about_section',
         [
            'label' => esc_html__( 'About', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $about = new \Elementor\Repeater();

      $about->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
         ]
      );

      $about->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'International Cargo Service', 'startesk' )
         ]
      );

      $about->add_control(
         'subtitle',
         [
            'label' => __( 'Sub Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Express delivery is an innovative service', 'startesk' )
         ]
      );

      $about->add_control(
         'text',
         [
            'label' => __( 'Text', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Express delivery is an innovative service is effective logistics solution for the delivery of small cargo. This service is useful for companies of various effective logistics scale.', 'startesk' )
         ]
      );

      $about->add_control(
         'button',
         [
            'label' => __( 'Button', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'comparison', 'startesk' )
         ]
      );

      $about->add_control(
         'url',
         [
            'label' => __( 'Text', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->add_control(
         'about_list',
         [
            'label' => __( 'About Items', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $about->get_controls(),
            'title_field' => '{{title}}'
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
    // get our input from the widget settings.       
    $settings = $this->get_settings_for_display(); ?>

    <!-- about-area -->
    <section class="about-area about-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-active">
                      <?php foreach (  $settings['about_list'] as $key => $about ): ?>
                        <div class="single-about-wrap">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="about-img">
                                        <img src="<?php echo esc_html( $about['image']['url'] ) ?>" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="about-content">
                                        <div class="section-title about-title mb-25">
                                            <h2><?php echo esc_html( $about['title'] ) ?></h2>
                                            <h6><?php echo esc_html( $about['subtitle'] ) ?></h6>
                                        </div>
                                        <p><?php echo esc_html( $about['text'] ) ?></p>
                                        <a href="<?php echo esc_url( $about['url'] ) ?>" class="btn"><?php echo esc_html( $about['button'] ) ?></a>
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
    <!-- about-area-end -->


    <!-- slider-area -->
    <section class="s-slider-area">
        <div class="s-slider-bg fix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="s-slider-content text-center">
                            <h6><span class="dots"></span><?php echo esc_html( $settings['title'] ) ?><span class="dots2"></span></h6>
                            <?php foreach (  $settings['about_list'] as $key => $about ): ?>
                              <h2 class="frame-<?php echo $key ?>"><span><?php echo esc_html( $about['title'] ) ?></span> <?php echo esc_html( $about['subtitle'] ) ?></h2>
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

Plugin::instance()->widgets_manager->register_widget_type( new Startesk_Widget_About );