<?php

class arpriceelementcontroller {

    function __construct() {
        add_action( 'plugins_loaded', array( $this, 'arprice_element_widget' ) );
    }

    function arprice_element_widget(){
        if ( ! did_action( 'elementor/loaded' ) ) {
            return;
        }
        require_once(PRICINGTABLE_CLASSES_DIR . '/elementor_widget/arprice_elementor_element.php');
   }

}

?>