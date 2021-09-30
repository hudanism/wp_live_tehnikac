<?php

/**
 * Element Controls: ARPrice
 */
global $wpdb;
$tablename = $wpdb->prefix . 'arp_arprice';

$results = $wpdb->get_results($wpdb->prepare("SELECT ID,table_name FROM `{$tablename}` WHERE is_template = %d", 0));

$tables = array();

$tables[0]['value'] = '';
$tables[0]['label'] = esc_html__('Please Select Pricing Table', 'ARPrice');

if (!empty($results)) {
    $n = 1;
    foreach ($results as $key => $table) {
        $tables[$n]['value'] = $table->ID;
        $tables[$n]['label'] = $table->table_name . ' [' . $table->ID . ']';
        $n++;
    }
}

$arprice_cs_control = array();

$arprice_cs_control['arprice_templates'] = array(
    'type' => 'select',
    'ui' => array(
        'title' => esc_html__('Select Pricing Table', 'ARPrice')
    ),
    'options' => array(
        'choices' => $tables
    )
);

return $arprice_cs_control;
