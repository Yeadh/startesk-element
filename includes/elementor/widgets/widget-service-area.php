<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class Startesk_Widget_Service_Area extends Widget_Base {
 
   public function get_name() {
      return 'service_area';
   }
 
   public function get_title() {
      return esc_html__( 'Service Area', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'service_section',
         [
            'label' => esc_html__( 'Service', 'startesk' ),
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
            'default' => __( 'Express delivery is an innovative service is effective logistics solution for the delivery of small cargo. This service is useful for companies various.', 'startesk' )
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

      $service = new \Elementor\Repeater();

      $service->add_control(
         'minititle',
         [
            'label' => __( 'Mini title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Delivery Service', 'startesk' )
         ]
      );

      $service->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'how we help you', 'startesk' )
         ]
      );

      $service->add_control(
         'image',
         [
            'label' => __( 'Image', 'startesk' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $service->add_control(
         'desc',
         [
            'label' => __( 'Description', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Express delivery is an innovativ service is effective logistics solutio for delivery of small cargo service.', 'startesk' )
         ]
      );

      $service->add_control(
         'btn',
         [
            'label' => __( 'Button', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'LET US HELP', 'startesk' )
         ]
      );

      $service->add_control(
         'url',
         [
            'label' => __( 'URL', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );


      $this->add_control(
         'service_list',
         [
            'label' => __( 'Service List', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $service->get_controls(),
            'default' => [
               [
                  'minititle' => __( 'Inspiration Service', 'startesk' ),
                  'title' => __( 'Get Insights Inspiration', 'startesk' ),
                  'image' => \Elementor\Utils::get_placeholder_image_src(),
                  'desc' => __( 'Express delivery is an innovativ service is effective logistics solutio for delivery of small cargo service.', 'startesk' ),
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

      <section class="services-area delivery-bg pt-110 pb-70">
        <div class="container">  
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-10">
                <div class="s-section-title text-center mb-60">
                  <h2><?php echo esc_html( $settings['title'] ) ?></h2>
                  <p><?php echo esc_html( $settings['desc']) ?></p>
                </div>
              </div>
          </div>
          <div class="services-wrapper">
              <div class="row">

                <?php foreach( $settings['service_list'] as $index => $service ) { ?>

                  <div class="col-lg-4 col-md-6">
                    <?php if ( $settings['style'] == 'style1' ) { ?>
                    <div class="single-services mb-30">
                        <div class="services-thumb">
                            <a href="<?php echo esc_url( $service['url'] ) ?>"><img src="<?php echo esc_url($service['image']['url']) ?>" alt="img"></a>
                        </div>
                        <div class="services-content">
                            <div class="services-icon">
                                <i class="flaticon-shipping-and-delivery"></i>
                            </div>
                            <h3><a href="<?php echo esc_url( $service['url'] ) ?>"><?php echo esc_html( $service['title'] ) ?></a></h3>
                            <span><?php echo esc_html( $service['minititle'] ) ?></span>
                            <p><?php echo esc_html( $service['desc'] ) ?></p>
                        </div>
                    </div>

                    <?php } elseif ( $settings['style'] == 'style2' ) { ?>

                    <div class="s-single-services mb-50">
                      <div class="services-thumb mb-25">
                         <a href="<?php echo esc_url( $service['url'] ) ?>"><img src="<?php echo esc_url($service['image']['url']) ?>" alt="img"></a>
                      </div>
                      <div class="s-services-content">
                        <h6><?php echo esc_html( $service['minititle'] ) ?></h6>
                        <h3><a href="<?php echo esc_url( $service['url'] ) ?>"><?php echo esc_html( $service['title'] ) ?></a></h3>
                        <p><?php echo esc_html( $service['desc'] ) ?></p>
                        <a href="<?php echo esc_url( $service['url'] ) ?>" class="btn red-btn"><?php echo esc_html( $service['btn'] ) ?></a>
                      </div>
                    </div>

                    <?php } ?>
                  </div>
                <?php } ?>
              </div>
          </div>
        </div>
      </section>

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Startesk_Widget_Service_Area );