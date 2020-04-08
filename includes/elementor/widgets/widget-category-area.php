<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// category
class startesk_Widget_Category_Area extends Widget_Base {
 
   public function get_name() {
      return 'category_area';
   }
 
   public function get_title() {
      return esc_html__( 'Category Area', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'category_area_section',
         [
            'label' => esc_html__( 'Category Area', 'startesk' ),
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



      $category = new \Elementor\Repeater();

      $category->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'startesk' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'flaticon-package',
            'options' => [
              'flaticon-package'  => __( 'Package', 'startesk' ),
              'flaticon-air-freight' => __( 'Air freight', 'startesk' ),
              'flaticon-delivery-truck' => __( 'Delivery truck', 'startesk' ),
              'flaticon-delivery' => __( 'Delivery', 'startesk' ),
              'flaticon-cruise' => __( 'Cruise', 'startesk' ),
              'flaticon-warehouse' => __( 'Warehouse', 'startesk' ),
              'flaticon-delivery-1' => __( 'Delivery', 'startesk' ),
              'flaticon-around-the-world' => __( 'Around the world', 'startesk' ),
              'flaticon-review' => __( 'Review', 'startesk' ),
              'flaticon-user' => __( 'User', 'startesk' ),
              'flaticon-truck' => __( 'Truck', 'startesk' ),
              'flaticon-maps-and-location' => __( 'Maps and location', 'startesk' ),
              'flaticon-delivery-2' => __( 'Delivery', 'startesk' ),
              'flaticon-placeholder' => __( 'Placeholder', 'startesk' ),
              'flaticon-like' => __( 'Like', 'startesk' ),
              'flaticon-shipping-and-delivery' => __( 'Shipping and Delivery', 'startesk' ),
              'flaticon-shipping' => __( 'Shipping', 'startesk' ),
              'flaticon-location' => __( 'Location', 'startesk' ),
              'flaticon-all' => __( 'All', 'startesk' ),
              'flaticon-delivery-cart' => __( 'Delivery cart', 'startesk' ),
              'flaticon-commerce-and-shopping' => __( 'Commerce and shopping', 'startesk' ),
              'flaticon-magnifying-glass' => __( 'Magnifying glass', 'startesk' ),
              'flaticon-right-arrow' => __( 'Right arrow', 'startesk' ),
              'flaticon-credit-card' => __( 'Credit card', 'startesk' ),
              'flaticon-sings' => __( 'Sings', 'startesk' ),
              'flaticon-box' => __( 'Box', 'startesk' ),
              'flaticon-track' => __( 'Track', 'startesk' ),
              'flaticon-audit' => __( 'Audit', 'startesk' ),
              'flaticon-shield' => __( 'Shield', 'startesk' ),
              'flaticon-ecology-and-environment' => __( 'Ecology and environment', 'startesk' ),
              'flaticon-shield-1' => __( 'Shield', 'startesk' ),
              'flaticon-telegram' => __( 'Telegram', 'startesk' ),
              'flaticon-fast-delivery' => __( 'Fast delivery', 'startesk' ),
              'flaticon-package-1' => __( 'Package', 'startesk' ),
              'flaticon-shopping-cart' => __( 'Shopping cart', 'startesk' ),
              'flaticon-favorites' => __( 'Favorites', 'startesk' ),
              'flaticon-freight-wagon' => __( 'Freight wagon', 'startesk' )
            ],
         ]
      );

      $category->add_control(
         'title',
         [
            'label' => __( 'Title', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Delivery Express', 'startesk' ),
            
         ]
      );

      $category->add_control(
         'url',
         [
            'label' => __( 'URL', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
            
         ]
      );

      $category->add_control(
         'description',
         [
            'label' => __( 'Description', 'startesk' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Expres delivery an innovative service is logistics', 'startesk' ),
         ]
      );


      $this->add_control(
         'category_list',
         [
            'label' => __( 'category Items', 'startesk' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $category->get_controls(),
            'title_field' => '{{title}}',

         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
    // get our input from the widget settings.       
    $settings = $this->get_settings_for_display(); ?>

    <?php if ( $settings['style'] == 'style1' ) { ?>
      <!-- category-area -->
      <section class="t-category-area">
          <div class="container">
              <div class="row">
                <?php foreach (  $settings['category_list'] as $category ): ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="s-single-cat t-single-cat">
                        <div class="s-cat-icon">
                            <i class="<?php echo esc_html( $category['icon'] ) ?>"></i>
                        </div>
                        <div class="s-cat-content">
                            <h5><a href="<?php echo esc_url( $category['url'] ) ?>"><?php echo esc_html( $category['title'] ) ?></a></h5>
                            <p><?php echo esc_html( $category['description'] ) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
        </section>
        <!-- category-area-end -->
    <?php } elseif ( $settings['style'] == 'style2' ) { ?>
       <!-- category-area -->
        <section class="category-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="category-list s-category-list">
                            <ul>
                              <?php foreach (  $settings['category_list'] as $category ): ?>
                                <li>
                                    <a href="<?php echo esc_url( $category['url'] ) ?>">
                                        <div class="category-icon">
                                            <i class="<?php echo esc_html( $category['icon'] ) ?>"></i>
                                        </div>
                                        <h5><?php echo esc_html( $category['title'] ) ?></h5>
                                    </a>
                                </li>
                              <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category-area-end -->
    <?php } ?>
      <?php
   }
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Category_Area );