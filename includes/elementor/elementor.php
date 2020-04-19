<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// get posts dropdown
function startesk_get_portfolio_dropdown_array($args = [], $key = 'ID', $value = 'post_title') {
  $options = [];
  $posts = get_posts($args);
  foreach ((array) $posts as $term) {
    $options[$term->{$key}] = $term->{$value};
  }
  return $options;
}

function startesk_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'startesk-elements',
		[
			'title' => esc_html__( 'startesk Elements', 'startesk' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'startesk_add_elementor_widget_categories' );

//Elementor init

class startesk_ElementorCustomElement {
 
   private static $instance = null;
 
   public static function get_instance() {
      if ( ! self::$instance )
         self::$instance = new self;
      return self::$instance;
   }
 
   public function init(){
      add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
   }


   public function widgets_registered() {
 
    // We check if the Elementor plugin has been installed / activated.
    if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-about.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-banner.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-banner-2.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-banner-3.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-title.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-accordion.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-contact.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-international-services.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-category-area.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-counter.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-rating-area.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-partner.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-products.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-productthumb.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-newsletter.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-service-area.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-testimonials.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-tracking.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-blog.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-choose-area.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-video.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-pricing.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-faq-area.php');
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-button.php');
      }
	}

}

startesk_ElementorCustomElement::get_instance()->init();