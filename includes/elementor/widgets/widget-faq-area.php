<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Accordion
class startesk_Widget_FAQ extends Widget_Base {
 
   public function get_name() {
      return 'faq';
   }
 
   public function get_title() {
      return esc_html__( 'FAQ Area', 'startesk' );
   }
 
   public function get_icon() { 
        return 'eicon-accordion';
   }
 
   public function get_categories() {
      return [ 'startesk-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'faq_section',
         [
            'label' => esc_html__( 'FAQ Area', 'startesk' ),
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

      $this->end_controls_section();

   }

  protected function render( $instance = [] ) {
 
  // get our input from the widget settings.

  $settings = $this->get_settings_for_display();

  $randID = wp_rand();

  ?>
  
  <!-- faq-area -->
  <section class="faq-area faq-bg pt-110 pb-120">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-10">
                  <div class="s-section-title text-center mb-60">
                      <h2><?php echo esc_html( $settings['title'] ) ?></h2>
                      <p><?php echo esc_html( $settings['desc']) ?></p>
                  </div>
              </div>
          </div>
          <div class="faq-wrapper">
              <div class="row">
                  <div class="col-xl-4 col-lg-5">
                      <div class="nav flex-column nav-pills faq-tab-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <?php
                          $faq = new \WP_Query( array( 
                            'post_type' => 'faq',
                            'posts_per_page' => -1,
                          ));
                          while ( $faq->have_posts() ) : $faq->the_post(); 

                          $icon = get_post_meta( get_the_ID(), 'iconselect', 1 ); ?>

                          <a class="nav-link" id="v-pills-<?php the_ID() ?>-tab" data-toggle="pill" href="#v-pills-<?php the_ID() ?>" role="tab" aria-controls="v-pills-<?php the_ID() ?>" aria-selected="true">
                              <?php if ( $icon ): ?>
                                <div class="faq-tab-icon">
                                    <i class="<?php echo esc_attr( $icon )  ?>"></i>
                                </div>
                              <?php endif ?>
                              
                              <div class="faq-tab-content d-none d-lg-block">
                                  <h5><?php the_title() ?></h5>
                                  <?php the_excerpt() ?>
                              </div>
                          </a>

                          <?php endwhile; wp_reset_postdata(); ?>
                      </div>
                  </div>
                  <div class="col-xl-8 col-lg-7">
                      <div class="tab-content" id="v-pills-tabContent">
                          <?php
                          $faq = new \WP_Query( array( 
                            'post_type' => 'faq',
                            'posts_per_page' => -1,
                          ));

                          while ( $faq->have_posts() ) : $faq->the_post();

                          $icon = get_post_meta( get_the_ID(), 'iconselect', 1 );
                          $faq_repeat_group = get_post_meta( get_the_ID(), 'faq_repeat_group', true ); ?> 

                          <div class="tab-pane fade" id="v-pills-<?php the_ID() ?>" role="tabpanel" aria-labelledby="v-pills-<?php the_ID() ?>-tab">
                              <div class="faq-accordion">
                                  <?php if ( $icon ): ?>
                                    <div class="faq-tab-icon">
                                        <i class="<?php echo esc_attr( $icon )  ?>"></i>
                                    </div>
                                  <?php endif ?>
                                  <div class="faq-accordion-content fix">
                                      <div class="faq-tab-content mb-30">
                                          <h5><?php the_title() ?></h5>
                                          <?php the_excerpt() ?>
                                      </div>
                                      <?php if ($faq_repeat_group): ?>
                                      <div class="accordion" id="accordion<?php echo get_the_ID() ?>">
                                        <?php foreach ($faq_repeat_group as $key => $faq_item): ?>
                                          <div class="card">
                                              <div class="card-header" id="heading<?php echo $key.get_the_ID(); ?>">
                                                  <h5 class="mb-0">
                                                      <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $key.get_the_ID(); ?>"
                                                          aria-expanded="true" aria-controls="collapse<?php echo $key.get_the_ID(); ?>">
                                                          <?php echo esc_html( $faq_item['faq_title'] ) ?>
                                                      </a>
                                                  </h5>
                                              </div>
                                              <div id="collapse<?php echo $key.get_the_ID(); ?>" class="collapse" aria-labelledby="heading<?php echo $key.get_the_ID(); ?>" data-parent="#accordion<?php echo $key.get_the_ID(); ?>">
                                                  <div class="card-body">
                                                      <p><?php echo esc_html( $faq_item['faq_description'] ) ?></p>
                                                  </div>
                                              </div>
                                          </div>
                                        <?php endforeach ?>
                                      </div>
                                      <?php endif ?>
                                  </div>
                              </div>
                          </div>

                          <?php endwhile; wp_reset_postdata(); ?>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- faq-area-end -->

  <?php
  }
}

Plugin::instance()->widgets_manager->register_widget_type( new startesk_Widget_FAQ );