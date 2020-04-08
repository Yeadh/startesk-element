<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner
class startesk_Widget_Banner extends Widget_Base {
 
   public function get_name() {
      return 'banner';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_section',
         [
            'label' => esc_html__( 'Banner 1', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $banner = new \Elementor\Repeater();

      $banner->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
         ]
      );
      
      $banner->add_control(
         'subtitle',
         [
            'label' => __( 'Sub Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'logistics cargo service', 'startesk' ),
            
         ]
      );
      
      $banner->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Delivery Express', 'startesk' ),
            
         ]
      );

      $banner->add_control(
         'description',
         [
            'label' => __( 'Description', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Logistics is generally the detailed organization and implementation of a complex tiona general business sense, logistics is the management', 'startesk' ),
         ]
      );

       $banner->add_control(
         'button',
         [
            'label' => __( 'Button', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'comparison', 'startesk' ),
            
         ]
      );

      $banner->add_control(
         'button_url',
         [
            'label' => __( 'URL', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
            
         ]
      );

      $this->add_control(
         'banner_list',
         [
            'label' => __( 'Banner Items', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $banner->get_controls(),
            'title_field' => '{{title}}',

         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
    // get our input from the widget settings.       
    $settings = $this->get_settings_for_display(); ?>

    <!-- slider-area -->
    <section class="slider-style-three">
        <div class="slider-active">
            <?php foreach (  $settings['banner_list'] as $banner ): ?>
            <div class="single-slider t-slider-area" style="background-image: url(<?php echo esc_url( $banner['image']['url'] ) ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="s-slider-content t-slider-content text-center">
                                <h6 data-animation="fadeInUp" data-delay=".2s"><span class="dots"></span><?php echo esc_html( $banner['subtitle'] ) ?><span class="dots2"></span></h6>
                                <h2 data-animation="fadeInUp" data-delay=".4s"><?php echo esc_html( $banner['title'] ) ?></h2>
                                <p data-animation="fadeInUp" data-delay=".6s"><?php echo esc_html( $banner['description'] ) ?></p>
                                <a href="<?php echo esc_html( $banner['button_url'] ) ?>" class="btn red-btn" data-animation="fadeInUp" data-delay=".8s"><?php echo esc_html( $banner['button'] ) ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- slider-area-end -->
      <?php
   }
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Banner );