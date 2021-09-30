<?php

class arpricekccontroller {

    function __construct() {

        add_action('init', array($this, 'add_price_element_to_king_composer'), 99 );

        add_action('init', array($this, 'arprice_kc_element_icon'), 99);
        
    }

     function add_price_element_to_king_composer(){
        global $wpdb;
        $tablename = $wpdb->prefix . 'arp_arprice';
        $results = $wpdb->get_results($wpdb->prepare("SELECT ID,table_name FROM `{$tablename}` WHERE is_template = %d", 0));
        $tables = array();
        $tables[0]= esc_html__('Please Select Pricing Table', 'ARPrice');
        if (!empty($results)) {
            foreach ($results as $key => $table) {
                $tables[$table->ID] = $table->table_name . ' [' . $table->ID . ']';
            }
        }
        
        global $kc;

        $plugin_template = PRICINGTABLE_CLASSES_DIR.'/kc_element/';

        $kc->set_template_path( $plugin_template );

        if(function_exists('kc_add_map')){
            kc_add_map(
                array(
                    'arprice_element' =>array(
                        'name' =>'ARPRice',
                        'description'=>esc_html__('Add ARPrice pricing table','ARPrice'),
                        'icon'=>'arprice_kc_element_icon',
                        'category'=>'ARPrice',
                        'title' => 'ARPrice Pricing Table',
                        'params'=>array(
                            array(
                                'name' => 'arprice_title',
                                'label' => esc_html__('ARPrice Title','ARPrice'),
                                'type' => 'text',
                                'value' => ''
                            ),
                            array(
                                'name' =>'arprice_dropdown',
                                'label' => esc_html__('Select pricing table','ARPrice'),
                                'type' => 'dropdown',  
                                'options' => $tables,
                                'value' => ''
                            )
                        ),

                    )
                )
            );
        }
    }

    function arprice_kc_element_icon(){
        if( function_exists( 'kc_add_icon' ) ) {
        	kc_add_icon( plugins_url().'/arprice/css/arprice.kc-element-icon.css');
        }
    }

}
?>