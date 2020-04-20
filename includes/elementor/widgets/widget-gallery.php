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

      $this->add_control(
         'subtitle',
         [
            'label' => __( 'Sub Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Delivery Anything', 'startesk' )
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Exclusive Cargo Gallery', 'startesk' )
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

      $this->add_control(
         'button',
         [
            'label' => __( 'Button', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'view gallery', 'startesk' )
         ]
      );

      $this->add_control(
         'url',
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

    <!-- gallery-area -->
    <section class="gallery-area gallery-bg pt-115 pb-120">
        <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-6">
                   <div class="section-title text-center mb-70">
                      <h6><?php echo esc_html( $settings['subtitle'] ) ?></h6>
                      <h2><?php echo esc_html( $settings['title'] ) ?></h2>
                   </div>
               </div>
            </div>
            <div class="row gallery-active">
                <?php foreach (  $settings['gallery_list'] as $key => $gallery_item ): ?>
                <div class="grid-item grid-sizer">
                    <div class="single-gallery-img mb-30">
                        <a href="<?php echo esc_url( $gallery_item['url'] ) ?>"><img src="<?php echo esc_url( $gallery_item['image']['url'] ) ?>" alt="img"></a>
                        <div class="gallery-overlay">
                            <h5 class="gallery-overlay-title"><a href="#"><?php echo esc_html( $gallery_item['title'] ) ?></a></h5>
                            <span><?php echo esc_html( $gallery_item['subtitle'] ) ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="gallery-btn text-center mt-30">
                        <a href="<?php echo esc_url( $settings['url'] ) ?>" class="btn"><?php echo esc_html( $settings['button'] ) ?></a>
                        <div class="gallery-overlay">
                            <h5 class="gallery-overlay-title"><a href="<?php echo esc_url( $settings['url'] ) ?>">Cargo Truck</a></h5>
                            <span>Blanding , Digital</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery-area-end -->
    <?php
   }
}

Plugin::instance()->widgets_manager->register_widget_type( new Startesk_Widget_Gallery );