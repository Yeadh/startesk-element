<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class startesk_Widget_Partner extends Widget_Base {
 
   public function get_name() {
      return 'partner';
   }
 
   public function get_title() {
      return esc_html__( 'Brand logo', 'startesk' );
   }
 
   public function get_icon() { 
        return 'fa fa-logo';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'partner_section',
         [
            'label' => esc_html__( 'partner', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ],
         ]
      );

      $this->add_control(
         'partner_list',
         [
            'label' => __( 'Partner List', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls()

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
      $settings = $this->get_settings_for_display(); ?>

      <!-- brand-area -->
      <div class="brand-area pt-85 pb-85">
          <div class="container">
              <div class="row brand-active">
               <?php foreach (  $settings['partner_list'] as $partner_single ): ?>
                  <div class="col-12">
                      <div class="signle-brand">
                          <img src="<?php echo esc_url( $partner_single['image']['url'] ); ?>" alt="img">
                      </div>
                  </div>
               <?php endforeach; ?>
              </div>
          </div>
      </div>
      <!-- brand-area-end -->

   <?php } 
 
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Partner );