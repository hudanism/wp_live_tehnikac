<?php

class ArpriceBBAddModule extends FLBuilderModule
{

    public function __construct()
    {
        parent::__construct(
            array(
            'name'          => esc_html__('ARPrice', 'ARPrice'),
            'description'   => esc_html__('Add pricing table.', 'ARPrice'),
            'category'        => esc_html__('ARPrice Modules', 'ARPrice'),
            'dir'           => PRICINGTABLE_CLASSES_DIR . '/bb-modules/arprice_bb_element/',
            'url'           => PRICINGTABLE_CLASSES_URL . '/bb-modules/arprice_bb_element/',
            'editor_export' => true,
            'enabled'       => true,
            )
        );
    }
}

Global $wpdb;
    $table_name =$wpdb->prefix. 'arp_arprice';
    $results =$wpdb->get_results($wpdb->prepare("SELECT ID, table_name FROM `{$table_name}` WHERE is_template= %d", 0));
    $tables=array();
    $tables['Please Select Pricing Table']= esc_html__('Please Select Pricing Table.', 'ARPrice');
if(!empty($results)) {
    foreach ($results as $key => $table) {
        $tables['[ARPrice id='.$table->ID.']'] = $table->table_name .' [ '.$table->ID.' ]';
    }
}

FLBuilder::register_module(
    'ArpriceBBAddModule', array(
    'general'       => array( 
        'title'         => esc_html__('General', 'ARPrice'),
        'sections'      => array(
            'general'       => array(
                'title'         => esc_html__('ARPrice', 'ARPrice'), 
                'fields'        => array( 
                    'select_field'   => array(
                        'type'          => 'select',
                        'label'         => esc_html__('Select pricing table', 'ARPrice'),
                        'default'       => 'Please Select Pricing Table',
                        'options'       => $tables,
                        'preview'         => array(
                            'type'             => 'text',
                            'selector'         => '.arp-select-table'  
                        )
                    ),
              
                )
            )
        )
    )
    )
);
?>
