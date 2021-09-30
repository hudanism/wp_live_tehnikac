<?php
namespace ElementorARPRICEELEMENT;

class elementor_arprice_element{

   
   private static $_instance = null;

   
   public function __construct() {

      // Register widget scripts
      add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

      // Register widgets
      add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
   }
    
   public static function instance() {
      if ( is_null( self::$_instance ) ) {
         self::$_instance = new self();
      }
      return self::$_instance;
   }

   
   public function widget_scripts() {
      global $arprice_version;
      wp_register_script('elementor-arprice-element', PRICINGTABLE_URL . '/js/arprice-element.js', array('jquery'), $arprice_version, true);
   }

   
   private function include_widgets_files() {
      require_once( __DIR__ . '/arprice_element_add.php' );
   }

   
   public function register_widgets() {
      // Its is now safe to include Widgets files
      $this->include_widgets_files();

      // Register Widgets
      \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\arprice_element_shortcode() );
   }

}

// Instantiate Plugin Class
elementor_arprice_element::instance();