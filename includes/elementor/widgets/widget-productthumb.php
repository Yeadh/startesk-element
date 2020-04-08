<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Product Thumbnails
class startesk_Widget_Product_Thumb extends Widget_Base {
 
   public function get_name() {
      return 'product_thumb';
   }
 
   public function get_title() {
      return esc_html__( 'Product Thumbnails', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }
   protected function _register_controls() {

      $this->start_controls_section(
         'blog_section',
         [
            'label' => esc_html__( 'Blog', 'startesk' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'ppp',
         [
            'label' => __( 'Post per page', 'startesk' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 14,
            'min' => 5,
            'max' => 100,
            'step' => 1
         ]
      );


      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'startesk' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => [
               'ASC'  => __( 'Ascending', 'startesk' ),
               'DESC' => __( 'Descending', 'startesk' )
            ],
         ]
      );
      
      $this->end_controls_section();
   }

  protected function render( $instance = [] ) {
 
    // get our input from the widget settings.
     
    $settings = $this->get_settings_for_display();

    $products = new \WP_Query( array( 
    'post_type' => 'product',
    'posts_per_page' => $settings['ppp'],
    ));
   
    global $product;?>
    <div class="product-thumb-wrap">
      <ul>
      <?php
          while ( $products->have_posts() ) : $products->the_post();
           $categories = get_the_category();  ?>
          <li>
              <a href="<?php the_permalink() ?>">
                <img src="<?php echo esc_url( get_post_meta( get_the_ID(), 'startesk_thumb', 1 ), 'startesk-120x120' ); ?>" alt="<?php the_title() ?> - <?php echo esc_html( get_post_meta( get_the_ID(), 'startesk_sub_title', 1 ) ) ?>">
              </a>
          </li>
          <?php endwhile; wp_reset_postdata(); ?>
      </ul>
    </div>
      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_Product_Thumb );