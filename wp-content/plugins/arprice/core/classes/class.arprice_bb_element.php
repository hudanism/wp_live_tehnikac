<?php 
class ARP_BB_MODULES_LOADER {
	
	static public function init() {
		add_action( 'plugins_loaded', __CLASS__ . '::setup_hooks' );
	}
	

	static public function setup_hooks() {
		if ( ! class_exists( 'FLBuilder' ) ) {
			return;	
		}
		
		add_action( 'init', __CLASS__ . '::load_modules' );
	}
	
	static public function load_modules() {
		require_once(PRICINGTABLE_CLASSES_DIR . '/bb-modules/arprice_bb_element.php');
	}

}
ARP_BB_MODULES_LOADER::init();
 ?>