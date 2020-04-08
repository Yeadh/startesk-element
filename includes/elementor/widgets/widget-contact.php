<?php
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// contact item
class startesk_Widget_Contact extends Widget_Base {
 
   public function get_name() {
      return 'contact_info';
   }
 
   public function get_title() {
      return esc_html__( 'Contact Info', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'contact_section',
         [
            'label' => esc_html__( 'Contact Info', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $contact = new \Elementor\Repeater();

      $contact->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $contact->add_control(
         'contact',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Office Locations', 'startesk' )
         ]
      );

      $contact->add_control(
         'info',
         [
            'label' => __( 'Info', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'W8 Steet Capital 7TH Lan Roas New York Brooklyn, New York', 'startesk' )
         ]
      );

      $this->add_control(
         'contact_list',
         [
            'label' => __( 'Feature List', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $contact->get_controls(),
            'default' => [
               [
                  'contact' => __( 'Office Locations', 'startesk' ),
                  'info' => __( 'W8 Steet Capital 7TH Lan Roas New York Brooklyn, New York', 'startesk' ),
               ],
               [
                  'contact' => __( 'Contact Number', 'startesk' ),
                  'info' => __( '(+02) 124 326 4587 (+02) 124 326 4588', 'startesk' ),
               ],
               [
                  'contact' => __( 'Mail Support', 'startesk' ),
                  'info' => __( 'infocompany@mail.com info@exemple.com', 'startesk' ),
               ]
            ],
            'title_field' => '{{{ contact }}}',
         ]
      );
      
      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'sub-title', 'basic' );
      ?>

      <!-- contact-area -->
      <section class="contact-area primary-bg pt-70 pb-15">
          <div class="container">
              <div class="row">
               <?php foreach( $settings['contact_list'] as $index => $contact ) { ?>
                  <div class="col-lg-3 col-sm-6">
                      <div class="single-contact-box mb-50">
                          <div class="contact-icon mb-30">
                              <img src="<?php echo $contact['icon']['url'] ?>" alt="<?php echo $contact['contact'] ?>">
                          </div>
                          <div class="contact-content">
                              <h5><?php echo $contact['contact'] ?></h5>
                              <span><?php echo $contact['info'] ?></span>
                          </div>
                      </div>
                  </div>
               <?php } ?>
              </div>
          </div>
      </section>
      <!-- contact-area-end -->

      <?php
   }
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Contact );