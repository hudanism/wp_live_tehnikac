<?php
class arp_default_settings {

    function __construct() {

        add_action('wp_ajax_arprice_default_template_skins', array($this, 'arprice_get_template_skins'));

        add_filter('arprice_default_template_skins_filter', array($this, 'arp_change_default_template_skins'), 10, 2);
    }
    function arp_footer_section_template_types() {

        $arp_footer_sec_temp_types = apply_filters('arp_footer_sec_temp_types', array(
            'type_1' => array('arptemplate_4', 'arptemplate_6'),
            'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_5', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26'),
            'type_3' => array('arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16')
        ));
        return $arp_footer_sec_temp_types;
    }

    function arp_color_skin_template_types() {

        $arp_color_skin_template_types = apply_filters('arp_color_skin_temp_types', array(
            'type_1' => array('arptemplate_1', 'arptemplate_4', 'arptemplate_9', 'arptemplate_6', 'arptemplate_12'),
            'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_11', 'arptemplate_20', 'arptemplate_21'),
            'type_3' => array('arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16'),
            'type_4' => array('arptemplate_6'),
            'type_5' => array('arptemplate_2', 'arptemplate_5', 'arptemplate_8', 'arptemplate_10', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26')
        ));

        return $arp_color_skin_template_types;
    }

    function arp_exclude_caption_column_for_color_skin() {
        $arp_exclude_caption_column_for_color_skin = apply_filters('arp_exclude_caption_column_for_color_skin', array(
            'arptemplate_1' => false,
            'arptemplate_2' => false,
            'arptemplate_3' => false,
            'arptemplate_4' => false,
            'arptemplate_5' => false,
            'arptemplate_6' => false,
            'arptemplate_7' => false,
            'arptemplate_8' => false,
            'arptemplate_9' => true,
            'arptemplate_10' => false,
            'arptemplate_11' => false,
            'arptemplate_12' => false,
            'arptemplate_13' => false,
            'arptemplate_14' => false,
            'arptemplate_15' => false,
            'arptemplate_16' => false,
            'arptemplate_20' => false,
            'arptemplate_21' => false,
            'arptemplate_22' => false,
            'arptemplate_23' => false,
            'arptemplate_24' => false,
            'arptemplate_25' => false,
            'arptemplate_26' => false,
        ));

        return $arp_exclude_caption_column_for_color_skin;
    }

    function arp_template_bg_section_classes() {

        $arp_template_bg_sec_classes = apply_filters('arp_tmp_bg_sec_classes', array(
            'arptemplate_1' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',

                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_2' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper',

                )
            ),
            'arptemplate_3' => array(
                'caption_column' => array(
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle,arpcolumnheader',
                    'desc_selection' => 'column_description',

                    'pricing_section' => 'arppricetablecolumnprice',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row',
                        'parent_class' => 'arp_opt_options'
                    )
                )
            ),
            'arptemplate_4' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arpcolumnheader',
                    'desc_selection' => 'column_description',

                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_5' => array(
                'caption_column' => array(
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arpcolumnheader',
                    'pricing_section' => 'arppricetablecolumnprice',

                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_6' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',

                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row',
                        'parent_class' => 'arppricingtablebodycontent'
                    )
                )
            ),
            'arptemplate_7' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'desc_selection' => 'column_description,arppricetablecolumnprice',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_8' => array(
                'caption_column' => array(
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arpcolumnheader',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_9' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper',
                )
            ),
            'arptemplate_10' => array(
                'caption_column' => array(
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'bestPlanTitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'desc_selection' => 'arpplan',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_11' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'desc_selection' => 'arppricetablecolumnprice',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
            ),
            'arptemplate_12' => array(
                'caption_columns' => array(
                    'header_section' => 'arpcaptiontitle',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
            ),
            'arptemplate_13' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'column_section' => 'arpplan',
                    'pricing_section' => 'arppricetablecolumnprice',
                )
            ),
            'arptemplate_14' => array(
                'caption_columns' => array(),
                'other_column' => array()
            ),
            'arptemplate_15' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'pricing_section' => 'arppricetablecolumnprice',
                )
            ),
            'arptemplate_16' => array(
                'caption_columns' => array(),
                'other_column' => array()
            ),
            'arptemplate_20' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'column_section' => 'arp_column_content_wrapper',
                )
            ),
            'arptemplate_21' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arppricetablecolumntitle,arppricetablecolumnprice,arppricingtablebodycontent',
                )
            ),
            'arptemplate_22' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_23' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper::after',
                    'pricing_section' => 'arp_price_wrapper',
                )
            ),
            'arptemplate_24' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper',
                )
            ),
            'arptemplate_25' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_26' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'column_section' => 'arp_column_content_wrapper',
                )
            ),
        ));
        return $arp_template_bg_sec_classes;
    }

    function arp_template_bg_section_inputs_json() {

        $arp_tmp_bg_sec_inputs_json = apply_filters('arp_tmp_bg_sec_inputs_json', array(
            'arptemplate_1' => array(
                'caption_column' => array(
                    'header_bg_color' => 'arpcaptiontitle',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_bg_color' => 'arppricetablecolumntitle',
                    'price_bg_color' => 'arppricetablecolumnprice',
                    'button_bg_color' => 'bestPlanButton',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_2' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_bg_color' => 'arp_column_content_wrapper',
                    'button_bg_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_3' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_bg_color' => 'arppricetablecolumntitle,arpcolumnheader',
                    'column_desc_bg_color' => 'column_description',
                    'button_bg_color' => 'bestPlanButton',
                    'price_bg_color' => 'arppricetablecolumnprice',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_4' => array(
                'caption_column' => array(
                    'header_bg_color' => 'arpcaptiontitle',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_bg_color' => 'arpcolumnheader',
                    'column_desc_bg_color' => 'column_description',
                    'button_bg_color' => 'bestPlanButton',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_5' => array(
                'caption_column' => array(
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_bg_color' => 'arpcolumnheader',
                    'price_bg_color' => 'arppricetablecolumnprice',
                    'button_bg_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_6' => array(
                'caption_column' => array(
                    'header_bg_color' => 'arpcaptiontitle',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_bg_color' => 'arppricetablecolumntitle',
                    'price_bg_color' => 'arppricetablecolumnprice',
                    'button_bg_color' => 'bestPlanButton',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_7' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_bg_color' => 'arppricetablecolumntitle',
                    'button_bg_color' => 'bestPlanButton',
                    'column_desc_bg_color' => 'column_description,arppricetablecolumnprice',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_8' => array(
                'caption_column' => array(
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_bg_color' => 'arpcolumnheader',
                    'button_bg_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_9' => array(
                'caption_column' => array(
                    'header_bg_color' => 'arpcaptiontitle',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'column_bg_color' => 'arp_column_content_wrapper',
                    'button_bg_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_10' => array(
                'caption_column' => array(
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_bg_color' => 'bestPlanTitle',
                    'price_bg_color' => 'arp_price_wrapper',
                    'column_desc_bg_color' => 'arpplan',
                    'button_bg_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_11' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'header_bg_color' => 'arppricetablecolumntitle',
                    'column_desc_bg_color' => 'arppricetablecolumnprice',
                    'button_bg_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
            ),
            'arptemplate_12' => array(
                'caption_columns' => array(
                    'header_bg_color' => 'arpcaptiontitle',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_bg_color' => 'arppricetablecolumntitle',
                    'price_bg_color' => 'arppricetablecolumnprice',
                    'button_bg_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
            ),
            'arptemplate_13' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'column_bg_color' => 'arpplan',
                    'price_bg_color' => 'arppricetablecolumnprice',
                    'button_bg_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_14' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'button_bg_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_15' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'price_bg_color' => 'arppricetablecolumnprice',
                    'button_bg_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_16' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'button_bg_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_20' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_bg_color' => 'arppricetablecolumntitle',
                    'column_bg_color' => 'arp_column_content_wrapper',
                    'button_bg_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_21' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_bg_color' => 'arppricetablecolumntitle,arppricetablecolumnprice,arppricingtablebodycontent',
                    'button_bg_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_22' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_bg_color' => 'arp_column_content_wrapper',
                    'price_bg_color' => 'arppricetablecolumnprice',
                    'button_bg_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_23' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_bg_color' => 'arp_column_content_wrapper::after',
                    'price_bg_color' => 'arp_price_wrapper',
                    'button_bg_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_24' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_bg_color' => 'arp_column_content_wrapper',
                    'button_bg_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_25' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_bg_color' => 'arppricetablecolumntitle,arpcolumnheader',
                    'column_bg_color' => 'arppricingtablebodycontent',
                    'column_desc_bg_color' => 'column_description',
                )
            ),
            'arptemplate_26' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_bg_color' => 'arppricetablecolumntitle',
                    'column_bg_color' => 'arp_column_content_wrapper',
                    'button_bg_color' => 'bestPlanButton',
                )
            )
        ));
        return $arp_tmp_bg_sec_inputs_json;
    }

    function arp_template_bg_section_inputs() {

        $arp_tmp_bg_sec_inputs = apply_filters('arp_tmp_bg_sec_inputs', array(
            'arptemplate_1' => array(
                'caption_column' => array(
                    'header_background_color' => 'arpcaptiontitle',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_2' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_background_color' => 'arp_column_content_wrapper',
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_3' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle,arpcolumnheader',
                    'column_desc_background_color' => 'column_description',
                    'button_background_color' => 'bestPlanButton',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_4' => array(
                'caption_column' => array(
                    'header_background_color' => 'arpcaptiontitle',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arpcolumnheader',
                    'column_desc_background_color' => 'column_description',
                    'button_background_color' => 'bestPlanButton',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_5' => array(
                'caption_column' => array(
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arpcolumnheader',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_6' => array(
                'caption_column' => array(
                    'header_background_color' => 'arpcaptiontitle',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_7' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'button_background_color' => 'bestPlanButton',
                    'column_desc_background_color' => 'column_description,arppricetablecolumnprice',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_8' => array(
                'caption_column' => array(
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arpcolumnheader',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_9' => array(
                'caption_column' => array(
                    'header_background_color' => 'arpcaptiontitle',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'column_background_color' => 'arp_column_content_wrapper',
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_10' => array(
                'caption_column' => array(
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'bestPlanTitle',
                    'price_background_color' => 'arp_price_wrapper',
                    'column_desc_background_color' => 'arpplan',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_11' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'column_desc_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
            ),
            'arptemplate_12' => array(
                'caption_columns' => array(
                    'header_background_color' => 'arpcaptiontitle',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
            ),
            'arptemplate_13' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'column_background_color' => 'arpplan',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_14' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_15' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_16' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'button_background_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_20' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'column_background_color' => 'arp_column_content_wrapper',
                    'button_background_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_21' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_background_color' => 'arppricetablecolumntitle,arppricetablecolumnprice,arppricingtablebodycontent',
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_22' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_background_color' => 'arp_column_content_wrapper',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_23' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_background_color' => 'arp_column_content_wrapper::after',
                    'price_background_color' => 'arp_price_wrapper',
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_24' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_background_color' => 'arp_column_content_wrapper',
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_25' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle,arpcolumnheader',
                    'column_background_color' => 'arppricingtablebodycontent',
                    'column_desc_background_color' => 'column_description',
                )
            ),
            'arptemplate_26' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'column_background_color' => 'arp_column_content_wrapper',
                    'button_background_color' => 'bestPlanButton',
                )
            )
        ));
        return $arp_tmp_bg_sec_inputs;
    }

    function arp_template_sections_array() {

        $arptemplatesectionsarray = apply_filters('arptemplate_available_sections_array', array(
            'arptemplate_1' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_footer_background_color_div' => array('arpcolumnfooter'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_footer_hover_background_color' => array('footer_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_2' => array(
                'arp_footer_background_color_div' => array('arpcolumnfooter'),
                'arp_footer_hover_background_color' => array('footer_hover_color'),
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_shortcode_hover_bg_color' => array('arp_shortcode_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_shortcode_background_color_div' => array('arp_shortcode_background_color_div'),
                'arp_shortcode_background_color' => array('.rounded_corder'),
                'arp_shortcode_font_color' => array('.rounded_corder'),
            ),
            'arptemplate_3' => array(
                'arp_footer_background_color_div' => array('arpcolumnfooter'),
                'arp_footer_hover_background_color' => array('footer_hover_color'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_column_desc_background_color_data_div' => array('column_description'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_column_desc_hover_background_color_data' => array('desc_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_4' => array(
                'arp_header_background_color_div' => array('.arpcolumnheader'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_footer_background_color_div' => array('arpcolumnfooter'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_footer_hover_background_color' => array('footer_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper,arp_price_wrapper i'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
            ),
            'arptemplate_5' => array(
                'arp_header_background_color_div' => array('.arpcolumnheader'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_6' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_footer_background_color_div' => array('arpcolumnfooter'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_footer_hover_background_color' => array('footer_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_7' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_column_desc_background_color_data_div' => array('column_description,.arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_column_desc_hover_background_color_data' => array('desc_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
            ),
            'arptemplate_8' => array(
                'arp_header_background_color_div' => array('.arpcolumnheader'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_shortcode_background_color_div' => array('arp_shortcode_background_color_div'),
                'arp_shortcode_background_color' => array('.rounded_corder'),
                'arp_shortcode_font_color' => array('.rounded_corder'),
                'arp_shortcode_hover_bg_color' => array('arp_shortcode_hover_background_color'),
            ),
            'arptemplate_9' => array(
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_footer_background_color_div' => array('arp_footer_background_color_div'),
                'arp_footer_hover_background_color' => array('arp_footer_hover_background_color'),
            ),
            'arptemplate_10' => array(
                'arp_header_background_color_div' => array('.bestPlanTitle'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_column_desc_background_color_data_div' => array('arpplan'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_column_desc_hover_background_color_data' => array('desc_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_body_label_font_color' => array('caption_li'),
                'arp_body_label_hover_font_color' => array('arpbodyoptionrow'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_11' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_column_desc_background_color_data_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_column_desc_hover_background_color_data' => array('desc_hover_color'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
            ),
            'arptemplate_12' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color' => array('bestPlanButton'),
            ),
            'arptemplate_13' => array(
                'arp_column_background_color_data_div' => array('arpplan'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_column_desc_background_color_data_div' => array('arp_column_desc_background_color_data_div'),
                'arp_column_desc_hover_background_color_data' => array('arp_column_desc_hover_background_color_data'),
            ),
            'arptemplate_14' => array(
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
            ),
            'arptemplate_15' => array(
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
            ),
            'arptemplate_16' => array(
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
            ),
            'arptemplate_20' => array(
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
            ),
            'arptemplate_21' => array(
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_column_background_color_data_div' => array('arppricetablecolumntitle, .arppricetablecolumnprice, .arppricingtablebodycontent'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_pricing_background_color_div' => array('arp_pricing_background_color_div'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
            ),
            'arptemplate_22' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_footer_background_color_div' => array('arp_footer_background_color_div'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_footer_hover_background_color' => array('arp_footer_hover_background_color')
            ),
            'arptemplate_23' => array(
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper::after'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_column_desc_background_color_data_div' => array('arp_column_desc_background_color_data_div'),
                'arp_column_desc_hover_background_color_data' => array('arp_column_desc_hover_background_color_data'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_24' => array(
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_footer_background_color_div' => array('arp_footer_background_color_div'),
                'arp_footer_hover_background_color' => array('arp_footer_hover_background_color'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
            ),
            'arptemplate_25' => array(
                'arp_column_background_color_data_div' => array('arppricingtablebodycontent'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_column_desc_background_color_data_div' => array('column_description'),
                'arp_column_desc_hover_background_color_data' => array('column_description'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
            ),
            'arptemplate_26' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_shortcode_background_color_div' => array('arp_shortcode_background_color_div'),
                'arp_shortcode_background_color' => array('.rounded_corder'),
                'arp_shortcode_font_color' => array('.rounded_corder'),
                'arp_shortcode_hover_bg_color' => array('arp_shortcode_hover_background_color'),
            )
        ));

        return $arptemplatesectionsarray;
    }

    function arp_custom_css_inner_sections() {
        $arp_custom_css_inner_sections = apply_filters('arp_custom_css_inner_sections', array(
            'arptemplate_1' => array(),
            'arptemplate_2' => array(
                'header_background' => false,
                'pricing_background' => false,
                'body_background' => false,
                'footer_background' => false,
            ),
            'arptemplate_3' => array(
                'footer_background' => false,
            ),
            'arptemplate_4' => array(),
            'arptemplate_5' => array(),
            'arptemplate_6' => array(),
            'arptemplate_7' => array(
                'pricing_background' => false,
            ),
            'arptemplate_8' => array(
                'pricing_background' => false,
            ),
            'arptemplate_9' => array(
                'pricing_background' => false,
                'footer_background' => false,
                'body_background' => false,
                'header_background' => false,
            ),
            'arptemplate_10' => array(),
            'arptemplate_11' => array(
                'pricing_background' => false,
            ),
            'arptemplate_12' => array(),
            'arptemplate_13' => array(
                'header_background' => false,
                'body_background' => false,
                'column_desc_background_color' => false
            ),
            'arptemplate_14' => array(
                'header_background' => false,
                'body_background' => false,
                'pricing_background' => false,
            ),
            'arptemplate_15' => array(
                'header_background' => false,
                'body_background' => false,
            ),
            'arptemplate_16' => array(
                'header_background' => false,
                'body_background' => false,
                'pricing_background' => false,
            ),
            'arptemplate_20' => array(
                'pricing_background' => false,
                'body_background' => false,
                'footer_background' => false,
                'footer_font_color' => false
            ),
            'arptemplate_21' => array(
                'header_background' => false,
                'pricing_background' => false,
                'body_background' => false,
                'footer_background' => false,
                'footer_font_color' => false
            ),
            'arptemplate_22' => array(
                'header_background' => false,
                'footer_background' => false,
                'column_desc_background_color' => false
            ),
            'arptemplate_23' => array(
                'header_background' => false,
                'body_background' => false,
                'footer_background' => false,
                'footer_font_color' => false,
                'column_desc_background_color' => false
            ),
            'arptemplate_24' => array(
                'header_background' => false,
                'pricing_background' => false,
                'body_background' => false,
                'footer_background' => false,
                'column_desc_background_color' => false
            ),
            'arptemplate_25' => array(
                'pricing_background' => false,
                'body_background' => false,
            ),
            'arptemplate_26' => array(
                'body_background' => false,
            ),
        ));
        return $arp_custom_css_inner_sections;
    }

    function arp_template_custom_skin_array() {
        $arp_template_custom_skin_array = apply_filters('arp_template_custom_skin_array', array(
            'arptemplate_1' => array(
                'header_font_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}',
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'footer_background_color' => array(
                    'css' => array(
                        '.arpcolumnfooter_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_2' => array(
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_background_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_font_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_3' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_desc_background_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_background_color' => array(
                    'css' => array(
                        '.arpcolumnfooter_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_4' => array(
                'header_font_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '.arpcaptiontitle_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        '.arpcolumnheader_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.arp_price_wrapper[ARP_SPACE]i_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'footer_background_color' => array(
                    'css' => array(
                        '.arpcolumnfooter_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_font_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_5' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '.arpcolumnheader_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_6' => array(
                'header_font_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_background_color' => array(
                    'css' => array(
                        '.arpcolumnfooter_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_7' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_rgb_color___0.7}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_desc_background_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_8' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '.arpcolumnheader_^_1' => array(
                            'background-color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_label_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li[ARP_SPACE]span.caption_li_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_background_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_font_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_9' => array(
                'header_background_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_10' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_desc_background_color' => array(
                    'css' => array(
                        '.arpplan_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row[ARP_SPACE]span_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row[ARP_SPACE]span_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_label_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li[ARP_SPACE]span.caption_li_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_11' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_desc_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_12' => array(
                'header_font_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_background_color' => array(
                    'css' => array(
                        '.arpcolumnfooter_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_13' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arpplan_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_14' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_15' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_16' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_20' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        'ul.arp_opt_options[ARP_SPACE]li[ARP_SPACE]i_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_21' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        '.arppricingtablebodycontent_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_22' => array(
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_23' => array(
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper::after_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_24' => array(
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.arp_price_wrapper_span_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_25' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_desc_background_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arppricingtablebodycontent_^_1' => array(
                            'background' => '{arp_rgb_color___0.8}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),

            ),
            'arptemplate_26' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        ),

                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_background_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_font_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            )
        ));

        return $arp_template_custom_skin_array;
    }

    function arp_template_hover_class_array() {
        $arptemplatehoverclassarray = apply_filters('arptemplatehoverclassarray', array(
            'arptemplate_1' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}',
                    ),
                    '.arpcolumnfooter_^_1' => array(
                        'background' => '{arp_footer_bg_custom_hover_color}',
                    ),
                    '.arpcolumnfooter[ARP_SPACE].arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}',
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}',
                    )
                )
            ),
            'arptemplate_2' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}'
                    ),
                    '.rounded_corder_^_1' => array(
                        'background' => '{arp_shortcode_background_color}',
                        'border-color' => '{arp_shortcode_border_color}',
                        'color' => '{arp_shortcode_font_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}',
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.arp_footer_content_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '{arp_column_hover_background_color}',
                        'box-shadow' => '0[ARP_SPACE]0[ARP_SPACE]0[ARP_SPACE]2px[ARP_SPACE]{arp_column_background_color}'
                    ),
                ),
            ),
            'arptemplate_3' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}',
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.column_description_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_4' => array(
                'arp_common_hover_css' => array(
                    '.arpcolumnheader_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.arp_price_wrapper[ARP_SPACE]i_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.arpcolumnfooter_^_1' => array(
                        'background' => '{arp_footer_bg_custom_hover_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.rounded_corder_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'border-color' => '{arp_border_hover_color}'
                    ),
                ),
            ),
            'arptemplate_5' => array(
                'arp_common_hover_css' => array(
                    '.arpcolumnheader_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_6' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.column_description_^_1' => array(
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'color' => '#ffffff'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.arpcolumnfooter_^_1' => array(
                        'background' => '{arp_footer_bg_custom_hover_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_7' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_background_custom_hover_input_rgba^_^(0.7)}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.column_description_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background-color' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background-color' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                )
            ),
            'arptemplate_8' => array(
                'arp_common_hover_css' => array(
                    '.arpcolumnheader_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.rounded_corder_^_1' => array(
                        'background' => '{arp_shortcode_background_color}',
                        'border-color' => '{arp_shortcode_border_color}',
                        'color' => '{arp_shortcode_font_color}'
                    ),
                ),
            ),
            'arptemplate_9' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}'
                    ),
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '#E9EAEE____{arp_column_hover_background_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '#747577____{arp_button_background_color}',
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.arp_footer_content_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                )
            ),
            'arptemplate_10' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanTitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.arpplan_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                )
            ),
            'arptemplate_11' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.column_description_^_1' => array(
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                )
            ),
            'arptemplate_13' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.arpplan_^_1' => array(
                        'background' => '{arp_column_hover_background_color}',
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.column_description_^_1' => array(
                        'color' => '{arp_description_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_14' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_15' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_16' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.column_description_^_1' => array(
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                ),
            ),
            'arptemplate_20' => array(
                'arp_common_hover_css' => array(
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '{arp_column_hover_background_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li[ARP_SPACE]i_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                        'color' => '{arp_column_hover_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'background' => '{arp_button_background_color}',
                        'color' => '{arp_button_hover_font_color}'
                    )
                )
            ),
            'arptemplate_21' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper::before_^_1' => array(
                        'background' => 'url(' . PRICINGTABLE_IMAGES_URL . '/ribbon_1_hover.png) no-repeat center;',
                        'margin-top' => '-31px'
                    ),

                    '.arp_price_wrapper:after_^_1' => array(
                        'background' => 'url(' . PRICINGTABLE_IMAGES_URL . '/ribbon_1_hover.png) no-repeat center;',
                        'margin-top' => '-31px'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'border-top' => '1px solid #d9d9d9',
                        'border-radius' => '10px',
                        '-webkit-border-radius' => '10px',
                        '-moz-border-radius' => '10px',
                        '-o-border-radius' => '10px',
                        'color' => '{arp_price_hover_font_color}',
                        'box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)',
                        '-webkit-box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)',
                        '-moz-box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)',
                        '-o-box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)'
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background-color' => '{arp_column_hover_background_color}',
                        'border-left' => '1px solid #E5E5E5 !important;',
                        'border-right' => '1px solid #E5E5E5 !important;'
                    ),
                    '.arppricingtablebodycontent_^_1' => array(
                        'background' => '{arp_column_hover_background_color}',
                        'border-left' => '1px solid #E5E5E5 !important;',
                        'border-right' => '1px solid #E5E5E5 !important;'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li_^_1' => array(
                        'box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)',
                        '-webkit-box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)',
                        '-moz-box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)',
                        '-o-box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}',
                    ),
                    '.bestPlanButton_^_1' => array(
                        'color' => '{arp_button_hover_font_color}',
                        'background' => '{arp_button_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}',
                    )
                )
            ),
            'arptemplate_22' => array(
                'arp_common_hover_css' => array(
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '{arp_column_hover_background_color}'
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'color' => '{arp_price_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_23' => array(
                'arp_common_hover_css' => array(
                    '.arp_column_content_wrapper::after_^_1' => array(
                        'background' => '{arp_column_hover_background_color}'
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'color' => '{arp_price_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'color' => '{arp_column_hover_background_color}',
                        'background' => '{arp_button_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_column_hover_background_color}',
                    ),
                    '.column_description_^_1' => array(
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_24' => array(
                'arp_common_hover_css' => array(
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '{arp_column_hover_background_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_25' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricingtablebodycontent_^_1' => array(
                        'background' => '{arp_column_hover_background_color_rgba^_^(0.8)}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.column_description_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_26' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.rounded_corder_^_1' => array(
                        'background' => '{arp_shortcode_background_color}',
                        'border-color' => '{arp_shortcode_border_color}',
                        'color' => '{arp_shortcode_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '{arp_column_hover_background_color}',
                    ),

                ),
            )
        ));

        return $arptemplatehoverclassarray;
    }

    function arp_default_gradient_templates() {
        $arp_default_gradient_templates = apply_filters('arp_default_gradient_templates', array(
            'default_only' => array('arptemplate_9'),
            'all_skins' => array('arptemplate_10')
        ));
        return $arp_default_gradient_templates;
    }

    function arp_default_gradient_templates_colors() {
        $arp_default_gradient_template_colors = apply_filters('arp_default_gradient_colors', array(
            'arptemplate_9' => array(
                'arp_color_skin' => array(
                    'arp_css' => array(
                        'column_level_gradient' => array(
                            '.arp_column_content_wrapper' => array(
                                'darkyellow' => array('', '#adbb5a___#f95d5e___1', '#adbb5a___#f95d5e___1', '#adbb5a___#f95d5e___1', '#adbb5a___#f95d5e___1', '#adbb5a___#f95d5e___1'),
                                'limegreen' => array('', '#00c03f___#00a3a2___1', '#00c03f___#00a3a2___1', '#00c03f___#00a3a2___1', '#00c03f___#00a3a2___1', '#00c03f___#00a3a2___1'),
                                'darkviolet' => array('', '#7200ad___#2672ea___1', '#7200ad___#2672ea___1', '#7200ad___#2672ea___1', '#7200ad___#2672ea___1', '#7200ad___#2672ea___1'),
                                'darkred' => array('', '#af1d04___#f1ae05___1', '#af1d04___#f1ae05___1', '#af1d04___#f1ae05___1', '#af1d04___#f1ae05___1', '#af1d04___#f1ae05___1'),
                                'lightorange' => array('', '#f2b10f___#a1b400___1', '#f2b10f___#a1b400___1', '#f2b10f___#a1b400___1', '#f2b10f___#a1b400___1', '#f2b10f___#a1b400___1'),
                                'orange' => array('', '#fd7c21___#b21e00___1', '#fd7c21___#b21e00___1', '#fd7c21___#b21e00___1', '#fd7c21___#b21e00___1', '#fd7c21___#b21e00___1'),
                                'cyan' => array('', '#03b88b___#a5650e___1', '#03b88b___#a5650e___1', '#03b88b___#a5650e___1', '#03b88b___#a5650e___1', '#03b88b___#a5650e___1'),
                                'magenta' => array('', '#b037c2___#da7a47___1', '#b037c2___#da7a47___1', '#b037c2___#da7a47___1', '#b037c2___#da7a47___1', '#b037c2___#da7a47___1'),
                                'yellow' => array('', '#ceba63___#37b0c5___1', '#ceba63___#37b0c5___1', '#ceba63___#37b0c5___1', '#ceba63___#37b0c5___1', '#ceba63___#37b0c5___1'),
                                'red' => array('', '#ac113d___#4d0062___1', '#ac113d___#4d0062___1', '#ac113d___#4d0062___1', '#ac113d___#4d0062___1', '#ac113d___#4d0062___1'),
                                'multicolor' => array('', '#7101ad___#2670e9___1', '#cbba62___#37b0c5___1', '#ad103d___#4d0064___1', '#fd7c21___#af1e00___1', '#00c140___#00a3a2___1'),
                                'custom_skin' => array('', '{arp_column_background_color}___0___1', '{arp_column_background_color}___0___1', '{arp_column_background_color}___0___1', '{arp_column_background_color}___0___1', '{arp_column_background_color}___0___1')
                            )
                        )
                    )
                )
            ),
            'arptemplate_10' => array(
                'arp_color_skin' => array(
                    'arp_css' => array(
                        'pricing_level_gradient' => array(
                            '.arp_price_wrapper' => array(
                                'red' => array('#c41e1e___#b91617___1', '#c41e1e___#b91617___1', '#c41e1e___#b91617___1', '#c41e1e___#b91617___1', '#c41e1e___#b91617___1', '#c41e1e___#b91617___1'),
                                'teal' => array('#007064___#005e50___1', '#007064___#005e50___1', '#007064___#005e50___1', '#007064___#005e50___1', '#007064___#005e50___1', '#007064___#005e50___1'),
                                'orange' => array('#cb8900___#be7600___1', '#cb8900___#be7600___1', '#cb8900___#be7600___1', '#cb8900___#be7600___1', '#cb8900___#be7600___1', '#cb8900___#be7600___1'),
                                'blue' => array('#3f91c3___#317eb6___1', '#3f91c3___#317eb6___1', '#3f91c3___#317eb6___1', '#3f91c3___#317eb6___1', '#3f91c3___#317eb6___1', '#3f91c3___#317eb6___1'),
                                'green' => array('#017840___#026431___1', '#017840___#026431___1', '#017840___#026431___1', '#017840___#026431___1', '#017840___#026431___1', '#017840___#026431___1'),
                                'lightteal' => array('#189ca0___#12898d___1', '#189ca0___#12898d___1', '#189ca0___#12898d___1', '#189ca0___#12898d___1', '#189ca0___#12898d___1', '#189ca0___#12898d___1'),
                                'pink' => array('#aa2554___#9a1c42___1', '#aa2554___#9a1c42___1', '#aa2554___#9a1c42___1', '#aa2554___#9a1c42___1', '#aa2554___#9a1c42___1', '#aa2554___#9a1c42___1'),
                                'lightgreen' => array('#498025___#3b6c1b___1', '#498025___#3b6c1b___1', '#498025___#3b6c1b___1', '#498025___#3b6c1b___1', '#498025___#3b6c1b___1', '#498025___#3b6c1b___1'),
                                'darkorange' => array('#bd471f___#af3715___1', '#bd471f___#af3715___1', '#bd471f___#af3715___1', '#bd471f___#af3715___1', '#bd471f___#af3715___1', '#bd471f___#af3715___1'),
                                'purple' => array('#593774___#462961___1', '#593774___#462961___1', '#593774___#462961___1', '#593774___#462961___1', '#593774___#462961___1', '#593774___#462961___1'),
                                'darkblue' => array('#2a2672___#1e1c5d___1', '#2a2672___#1e1c5d___1', '#2a2672___#1e1c5d___1', '#2a2672___#1e1c5d___1', '#2a2672___#1e1c5d___1', '#2a2672___#1e1c5d___1'),
                                'gray' => array('#5e5e60___#4c4c4e___1', '#5e5e60___#4c4c4e___1', '#5e5e60___#4c4c4e___1', '#5e5e60___#4c4c4e___1', '#5e5e60___#4c4c4e___1', '#5e5e60___#4c4c4e___1'),
                                'multicolor' => array('#007064___#005c51___1', '#3e90c2___#2e7db5___1', '#c41e20___#b81516___1', '#5f3a7d___#4c2d69___1', '#498025___#3b6c1b___1'),
                                'custom_skin' => array('{arp_pricing_background_color_input}___10___1', '{arp_pricing_background_color_input}___10___1', '{arp_pricing_background_color_input}___10___1', '{arp_pricing_background_color_input}___10___1', '{arp_pricing_background_color_input}___10___1', '{arp_pricing_background_color_input}___10___1')
                            )
                        )
                    ),
                    'arp_attr' => array(
                        'input#price_background_color' => array(
                            'value' => '{arp_pricing_background_color_input}'
                        ),
                        'div#price_background_color' => array(
                            'data-column_id' => '{arp_pricing_background_color_input}',
                            'data-color' => '{arp_pricing_background_color_input}'
                        )
                    )
                )
            ),
        ));
        return $arp_default_gradient_template_colors;
    }

    function arp_default_rgba_color_array() {
        $arp_rgba_color_codes = apply_filters('arp_default_rgba_colors', array(
            'arptemplate_7' => array(
                'header_background_color' => array(
                    '.arppricetablecolumntitle' => '{arp_header_background_color}___0.7'
                )
            ),
            'arptemplate_25' => array(

                'column_background_color' => array(
                    '.arppricingtablebodycontent' => '{arp_column_background_color}___0.8'
                )

            )
        ));
        return $arp_rgba_color_codes;
    }

    function arp_default_skin_luminosity() {
        $arp_default_skin_luminosity = apply_filters('arp_default_skin_luminosity', array(
            'arptemplate_1' => array(),
            'arptemplate_2' => array(),
            'arptemplate_3' => array(),
            'arptemplate_4' => array(),
            'arptemplate_5' => array(),
            'arptemplate_6' => array(),
            'arptemplate_7' => array(),
            'arptemplate_8' => array(),
            'arptemplate_9' => array('0'),
            'arptemplate_10' => array('10'),
            'arptemplate_11' => array(),
            'arptemplate_12' => array(),
            'arptemplate_13' => array(),
            'arptemplate_14' => array(),
            'arptemplate_15' => array(),
            'arptemplate_16' => array(),
            'arptemplate_20' => array(),
            'arptemplate_21' => array(),
            'arptemplate_22' => array(),
            'arptemplate_23' => array(),
            'arptemplate_24' => array(),
            'arptemplate_25' => array(),
            'arptemplate_26' => array(),
        ));

        return $arp_default_skin_luminosity;
    }

    function arp_depended_section_color_codes() {
        $arp_depended_section_color_code = apply_filters('arp_depended_section_color_code', array(
            'arptemplate_1' => array(),
            'arptemplate_2' => array(),
            'arptemplate_3' => array(),
            'arptemplate_4' => array(),
            'arptemplate_5' => array(),
            'arptemplate_6' => array(),
            'arptemplate_7' => array(),
            'arptemplate_8' => array(),
            'arptemplate_9' => array(),
            'arptemplate_10' => array(),
            'arptemplate_11' => array(),
            'arptemplate_12' => array(),
            'arptemplate_13' => array(),
            'arptemplate_14' => array(),
            'arptemplate_15' => array(),
            'arptemplate_16' => array(),
            'arptemplate_20' => array(
                'arp_header_background_color' => array(
                    'arp_price_wrapper~||~color~||~price_font_color|+|id',
                    'arppricingtablebodycontent[ARP_SPACE]i~||~color~||~'
                )
            ),
            'arptemplate_21' => array(),
            'arptemplate_22' => array(),
            'arptemplate_23' => array(),
            'arptemplate_24' => array(),
            'arptemplate_25' => array(),
            'arptemplate_26' => array(),
        ));
        return $arp_depended_section_color_code;
    }

    function arp_custom_skin_selection_section_color() {
        $arp_custom_skin_selection_color = apply_filters('arp_custom_skin_selection_color', array(
            'arptemplate_1' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_2' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_3' => array('arp_pricing_background_color_input', 'arp_pricing_background_color~|~arp_pricing_background_color_input'),
            'arptemplate_4' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_5' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_6' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_7' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_8' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_9' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_10' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_11' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_12' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_13' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_14' => array('arp_button_background_color_input', 'arp_button_background_color~|~arp_button_background_color_input'),
            'arptemplate_15' => array('arp_button_background_color_input', 'arp_button_background_color~|~arp_button_background_color_input'),
            'arptemplate_16' => array('arp_button_background_color_input', 'arp_button_background_color~|~arp_button_background_color_input'),
            'arptemplate_20' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_21' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_22' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_23' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_24' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_25' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_26' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
        ));

        return $arp_custom_skin_selection_color;
    }

    function arp_custom_css_selected_bg_color() {
        $arp_custom_css_selected_bg_color = apply_filters('arp_custom_css_selected_bg_color', array(
            'arptemplate_1' => 'arp_header_bg_custom_color',
            'arptemplate_2' => 'arp_column_bg_custom_color',
            'arptemplate_3' => 'arp_pricing_bg_custom_color',
            'arptemplate_4' => 'arp_header_bg_custom_color',
            'arptemplate_5' => 'arp_header_bg_custom_color',
            'arptemplate_6' => 'arp_header_bg_custom_color',
            'arptemplate_7' => 'arp_header_bg_custom_color',
            'arptemplate_8' => 'arp_header_bg_custom_color',
            'arptemplate_9' => 'arp_column_bg_custom_color',
            'arptemplate_10' => 'arp_header_bg_custom_color',
            'arptemplate_11' => 'arp_header_bg_custom_color',
            'arptemplate_12' => 'arp_header_bg_custom_color',
            'arptemplate_13' => 'arp_column_bg_custom_color',
            'arptemplate_14' => 'arp_button_bg_custom_color',
            'arptemplate_15' => 'arp_button_bg_custom_color',
            'arptemplate_16' => 'arp_button_bg_custom_color',
            'arptemplate_20' => 'arp_header_bg_custom_color',
            'arptemplate_21' => 'arp_column_bg_custom_color',
            'arptemplate_22' => 'arp_column_bg_custom_color',
            'arptemplate_23' => 'arp_column_bg_custom_color',
            'arptemplate_24' => 'arp_column_bg_custom_color',
            'arptemplate_25' => 'arp_column_bg_custom_color',
            'arptemplate_26' => 'arp_header_bg_custom_color',
        ));

        return $arp_custom_css_selected_bg_color;
    }

    function arp_background_image_section_array() {

        $arp_global_bg_image_section = apply_filters('arp_global_bg_image_section', array(
            'arptemplate_1' => array(),
            'arptemplate_2' => array(),
            'arptemplate_3' => array(),
            'arptemplate_4' => array(),
            'arptemplate_5' => array(),
            'arptemplate_6' => array(),
            'arptemplate_7' => array(),
            'arptemplate_8' => array('arpcolumnheader'),
            'arptemplate_9' => array(),
            'arptemplate_10' => array(),
            'arptemplate_11' => array(),
            'arptemplate_12' => array(),
            'arptemplate_13' => array(),
            'arptemplate_14' => array(),
            'arptemplate_15' => array(),
            'arptemplate_16' => array(),
            'arptemplate_20' => array(),
            'arptemplate_21' => array(),
            'arptemplate_22' => array(),
            'arptemplate_23' => array(),
            'arptemplate_24' => array(),
            'arptemplate_25' => array(),
            'arptemplate_26' => array(),
        ));

        return $arp_global_bg_image_section;
    }

    function arp_column_background_image_section_array() {

        $arp_global_column_bg_image_section = apply_filters('arp_global_column_bg_image_section', array(
            'arptemplate_1' => array('arp_column_content_wrapper'),
            'arptemplate_2' => array('arp_column_content_wrapper'),
            'arptemplate_3' => array('arp_column_content_wrapper'),
            'arptemplate_4' => array('arp_column_content_wrapper'),
            'arptemplate_5' => array('arp_column_content_wrapper'),
            'arptemplate_6' => array('arp_column_content_wrapper'),
            'arptemplate_7' => array('arp_column_content_wrapper'),
            'arptemplate_8' => array('arp_column_content_wrapper'),
            'arptemplate_9' => array('arp_column_content_wrapper'),
            'arptemplate_10' => array(''),
            'arptemplate_11' => array('arp_column_content_wrapper'),
            'arptemplate_12' => array('arp_column_content_wrapper'),
            'arptemplate_13' => array('arp_column_content_wrapper'),
            'arptemplate_14' => array('arp_column_content_wrapper'),
            'arptemplate_15' => array('arp_column_content_wrapper'),
            'arptemplate_16' => array('arp_column_content_wrapper'),
            'arptemplate_20' => array('arp_column_content_wrapper'),
            'arptemplate_21' => array('arp_column_content_wrapper'),
            'arptemplate_22' => array('arp_column_content_wrapper'),
            'arptemplate_23' => array(''),
            'arptemplate_24' => array('arp_column_content_wrapper'),
            'arptemplate_25' => array('arp_column_content_wrapper'),
            'arptemplate_26' => array('arp_column_content_wrapper'),
        ));

        return $arp_global_column_bg_image_section;
    }
    

    function arprice_default_template_skins($post = array()) {
        $arprice_default_template_skins = apply_filters('arprice_default_template_skins_filter', array(
            'arptemplate_1' => array(
                'skin' => array('green', 'yellow', 'darkorange', 'darkred', 'red', 'violet', 'pink', 'blue', 'darkblue', 'lightgreen', 'darkestblue', 'cyan', 'black', 'multicolor',),
                'color' => array('6dae2e', 'fbb400', 'e75c01', 'c32929', 'e52937', '713887', 'EB005C', '29A1D3', '2F3687', '1BA341', '2F4251', '009E7B', '5C5C5C', 'Multicolor')
            ),
            'arptemplate_2' => array(
                'skin' => array('blue', 'lightviolet', 'yellow', 'limegreen', 'orange', 'softblue', 'limecyan', 'brightred', 'red', 'pink', 'lightblue', 'darkpink', 'darkcyan'),
                'color' => array('02a3ff', '6c62d3', 'ffba00', '6ed563', 'ff9525', '4476d9', '37ba5a', 'f34044', 'de1a4c', 'de199a', '1a5fde', 'a51143', '11a599')
            ),
            'arptemplate_3' => array(
                'skin' => array('black', 'green', 'orange', 'red', 'teal', 'yellow', 'blue', 'darkgreen', 'maroon', 'purple'),
                'color' => array('39434D', '24B968', 'E87C3C', 'E84C3D', '6DBEBF', 'EBBF44', '316493', '7FB45C', '9A272A', '6F4786')
            ),
            'arptemplate_4' => array(
                'skin' => array('darkgreen', 'darkred', 'green', 'blue', 'pink', 'violet', 'orange', 'skyblue', 'lightblue', 'yellow', 'darkpink', 'darkblue', 'grayishblue'),
                'color' => array('28ae4d', 'ec4152', '2bc489', '0084ff', 'f50d7b', '4a148c', 'ff7510', '48c8f5', '626cef', 'ffcc00', 'ad1457', '112b50', '4a4957')
            ),
            'arptemplate_5' => array(
                'skin' => array('red', 'yellow', 'blue', 'green', 'violet', 'cyan', 'pink', 'limegreen', 'orange', 'darkblue', 'multicolor'),
                'color' => array('E52937', 'FBB400', '20AEFF', '199800', '734EAB', '00D8CD', 'FF1D77', '91D100', 'FE7D22', '2F3687', 'Multicolor')
            ),
            'arptemplate_6' => array(
                'skin' => array('green', 'blue', 'red', 'cyan', 'limegreen', 'darkblue', 'pink', 'darkcyan', 'violet', 'black'),
                'color' => array('87BD41', '29A1D3', 'E84C3D', '1FC4C8', '2ECB72', '5165A2', 'C31F5B', '009E7B', '703784', '6D7383')
            ),
            'arptemplate_7' => array(
                'skin' => array('blue', 'black', 'cyan', 'lightblue', 'red', 'yellow', 'olive', 'darkpurple', 'darkred', 'pink', 'brown'),
                'color' => array('3473DC', '3E3E3C', '1EAE8B', '1BACE1', 'F33C3E', 'FFA800', '8FB021', '5B48A2', '79302A', 'ED1374', 'B11D00')
            ),
            'arptemplate_8' => array(
                'skin' => array('purple', 'skyblue', 'red', 'green', 'blue', 'orange', 'darkcyan', 'yellow', 'pink', 'teal', 'multicolor'),
                'color' => array('AB6ED7', '44B7E4', 'F15859', '7FB948', '595EB7', 'FF6E3D', '54CAB0', 'FFC74B', 'EC3E9A', '25D0D7', 'Multicolor')
            ),
            'arptemplate_9' => array(
                'skin' => array('darkyellow', 'limegreen', 'darkviolet', 'darkred', 'lightorange', 'orange', 'cyan', 'magenta', 'yellow', 'red', 'multicolor'),
                'color' => array('AFBA5A', '00c140', '7003AE', 'AF1D04', 'F2B10F', 'FE7D22', '03B88B', 'B037C0', 'CBB963', 'AC113D', 'Multicolor')
            ),
            'arptemplate_10' => array(
                'skin' => array('red', 'teal', 'orange', 'blue', 'green', 'lightteal', 'pink', 'lightgreen', 'darkorange', 'purple', 'darkblue', 'gray', 'multicolor'),
                'color' => array('E92526', '00A392', 'FFAD00', '50B8F5', '01A358', '1FC4C8', 'E83473', '66AD33', 'FF622B', '8250A9', '3E38A4', '89888D', 'Multicolor')
            ),
            'arptemplate_11' => array(
                'skin' => array('yellow', 'limegreen', 'red', 'blue', 'pink', 'cyan', 'lightpink', 'violet', 'gray', 'green'),
                'color' => array('EFA738', '43B34D', 'FF3241', '09B1F8', 'E3328C', '11B0B6', 'F15F74', '8F4AFF', '949494', '78C335')
            ),
            'arptemplate_12' => array(
                'skin' => array('blue', 'cyan', 'orange', 'green', 'red', 'skyblue', 'maroon', 'purple', 'darkgrey', 'brightorange', 'multicolor'),
                'color' => array("143B86", "059B90", "E38B05", "23A359", "C10F0F", "2284C1", "8A0135", "7B1EC7", "474F62", "D03509", "Multicolor")
            ),
            'arptemplate_13' => array(
                'skin' => array('darkblue', 'cyan', 'green', 'red', 'blue', 'brown', 'darkcyan', 'darkmagenta'),
                'color' => array('01325b', '03735D', '168737', 'C61C1C', '00A0EA', '883D13', '005760', '602B63')
            ),
            'arptemplate_14' => array(
                'skin' => array('orange', 'limegreen', 'blue', 'violet', 'lightorange', 'cyan', 'red', 'yellow', 'gray', 'darkblue'),
                'color' => array('F15A23', '2DCC70', '3598DB', '9661D7', 'F49C14', '1BBC9B', 'E52937', '9CC31A', '757575', '384C81')
            ),
            'arptemplate_15' => array(
                'skin' => array('yellow', 'red', 'green', 'cyan', 'blue', 'pink', 'purple', 'orange', 'darkyellow', 'limegreen'),
                'color' => array('EAA700', 'EC155B', '18B949', '09D1B5', '10A4FA', 'EC3F8F', '755EC6', 'FA5655', 'BE8E44', '8CA91D')
            ),
            'arptemplate_16' => array(
                'skin' => array('orange', 'darkgreen', 'darkred', 'magenta', 'blue', 'darkblue', 'darkcyan', 'red', 'darklimegreen', 'gray'),
                'color' => array('FE7C22', '6DAE2E', 'B41E1F', 'A859B5', '29A1D3', '2F3687', '009E7B', 'E52937', '3D735B', '6D7C7F')
            ),
            'arptemplate_20' => array(
                'skin' => array('blue', 'pink', 'red', 'yellow', 'green', 'cyan', 'strongviolet', 'violet', 'lightviolet', 'darkyellow', 'grey', 'black'),
                'color' => array('00BAFF', 'D81A60', 'F73300', 'FFC22C', '8ACA01', '57CC7D', '4617B5', '6900B4', 'A23BCA', 'D8C022', '858585', '1D1D1D')
            ),
            'arptemplate_21' => array(
                'skin' => array('pink', 'red', 'yellow', 'green', 'darklimegreen', 'limecyan', 'cyan', 'lightblue', 'blue', 'strongviolet', 'purepink', 'darkred', 'gray',),
                'color' => array('D81A60', 'F73300', 'FFC22C', '8ACA01', '169800', '57CC7D', '00D2D3', '41C3FF', '008EE2', '6900B4', 'F900A6', 'BE0022', '5E5E5E',)
            ),
            'arptemplate_22' => array(
                'skin' => array('red', 'darkpink', 'orange', 'lightorange', 'limegreen', 'green', 'cyan', 'lightblue', 'blue', 'brightblue', 'violet', 'softviolet', 'gray', 'black'),
                'color' => array('E40031', 'D90051', 'FAA71B', 'FFC22C', '60C150', '57CC7D', '57DEE1', '41C3FF', '008EE2', '3E52F3', '6F04F4', '8656E0', '33363F', '1D1D1D')
            ),
            'arptemplate_23' => array(
                'skin' => array('orange', 'blue', 'brightblue', 'green', 'limegreen', 'darkblue', 'darkviolet', 'violet', 'pink', 'red', 'gray', 'black'),
                'color' => array('FDB515', '4DC8F4', '43B2E7', 'A2CC3A', '70C27A', '5A79BC', '5F5CA9', '744F9C', 'DC397A', 'E01E38', '4A4957', '35343A')
            ),
            'arptemplate_24' => array(
                'skin' => array('darkblue', 'pink', 'red', 'orange', 'darkgreen', 'darkcyan', 'lightblue', 'blue', 'violet', 'strongpink', 'gray', 'black'),
                'color' => array('5C57B1', 'D81A60', 'EB3102', 'FF892B', '6DB000', '0C898B', '41C3FF', '008EE2', '6900B4', 'CC0288', '5E5E5E', '1D1D1D')
            ),
            'arptemplate_25' => array(
                'skin' => array('blue', 'green', 'red', 'lightviolet', 'lightred', 'orange', 'lightgreen', 'darkgreen', 'black', 'turquoise', 'royalblue', 'violet', 'yellow', 'dogerblue'),
                'color' => array('2FB8FF', '00D29D', 'FF2476', '5178F7', 'F65052', 'FEA60E', '6FC033', '34C159', '2C2F42', '01DFF4', '5B58E3', '824BFF', 'EACD03', '4196FF')
            ),
            'arptemplate_26' => array(
                'skin' => array('blue', 'red', 'lightblue', 'cyan', 'yellow', 'pink', 'lightviolet', 'gray', 'orange', 'darkblue', 'turquoise', 'grayishyellow', 'green'),
                'color' => array('2fb8ff', 'ff2d46', '4196ff', '00d29d', 'f1bc16', 'ff2476', '6b68ff', 'b7bdcb', 'fd9a25', '337cff', '00dbef', 'cfc5a1', '16d784')
            ),
                ), $post);

        return $arprice_default_template_skins;
    }

    function arprice_get_template_skins() {

        $template_id = $_POST['table_id'];
        $reference_id = $_POST['reference_template'];
        $default_template_skin_code = $this->arprice_default_template_skins($_POST);
        $skins = $default_template_skin_code[$reference_id]['skin'];
        $colors = $default_template_skin_code[$reference_id]['color'];
        echo json_encode($default_template_skin_code[$reference_id]);
        die();
    }

    function arp_change_default_template_skins($default_array, $post, $general_options = array()) {
        global $wpdb;

        $action = isset($post['action']) ? $post['action'] : '';
        $tableid = isset($post['table_id']) ? $post['table_id'] : '';
        $reference = isset($post['reference_template']) ? $post['reference_template'] : '';
        if ($tableid == "")
            return $default_array;

        $count_general_options = count($general_options);

        if ($action == 'arprice_default_template_skins' && $count_general_options <= 0) {
            $query = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d", $tableid));
        }
        if( $count_general_options <= 0 ){
            $results = maybe_unserialize($query[0]->general_options);
        } else {
            $results = $general_options;
        }

        $custom_skin_colors = $results['custom_skin_colors'];

        $arp_column_custom_bg_color = $custom_skin_colors['arp_column_bg_custom_color'];
        $arp_column_bg_hover_color = $custom_skin_colors['arp_column_bg_hover_color'];
        $arp_column_desc_custom_color = $custom_skin_colors['arp_column_desc_bg_custom_color'];
        $arp_header_custom_bg_color = $custom_skin_colors['arp_header_bg_custom_color'];
        $arp_pricing_bg_custom_color = $custom_skin_colors['arp_pricing_bg_custom_color'];
        $arp_body_odd_row_bg_color = $custom_skin_colors['arp_body_odd_row_bg_custom_color'];
        $arp_body_even_row_bg_color = $custom_skin_colors['arp_body_even_row_bg_custom_color'];
        $arp_analytics_bgcolor = (isset($custom_skin_colors['arp_analytics_bgcolor'])) ? $custom_skin_colors['arp_analytics_bgcolor']:'#39434D';
        $arp_analytics_forgcolor =(isset($custom_skin_colors['arp_analytics_forgcolor']))? $custom_skin_colors['arp_analytics_forgcolor']:'#F5F5F5';
        
        $arp_footer_bg_custom_color = $custom_skin_colors['arp_footer_content_bg_color'];
        $arp_button_bg_custom_color = $custom_skin_colors['arp_button_bg_custom_color'];
        $arp_button_bg_hover_color = $custom_skin_colors['arp_button_bg_hover_color'];

        $arp_section_background = $this->arp_custom_skin_selection_section_color();
        $main_color = '';

        switch ($arp_section_background[$reference][0]) {
            case 'arp_header_background_color_input':
                $main_color = $arp_header_custom_bg_color;
                break;
            case 'arp_column_background_color_input':
                $main_color = $arp_column_custom_bg_color;
                break;
            case 'arp_pricing_background_color_input':
                $main_color = $arp_pricing_bg_custom_color;
                break;
            case 'arp_button_background_color_input':
                $main_color = $arp_button_bg_custom_color;
                break;
            default:
                $main_color = $arp_header_custom_bg_color;
                break;
        }

        $count = count($default_array[$reference]['color']);

        $default_array[$reference]['color'][$count] = str_replace('#', '', $main_color);
        $default_array[$reference]['skin'][$count] = 'db_custom_skin';

        return $default_array;
    }

    function arp_css_pseudo_elements_array() {
        $arp_css_pseudo_elements = apply_filters('arp_css_pseudo_elements', array('::after', ':after', '::before', ':before')
        );
        return $arp_css_pseudo_elements;
    }

    function arprice_responsive_width_array() {

        $arp_responsive_width_array = apply_filters('arp_responsive_widths', array(
            'arptemplate_1' => array(
                'with_space' => array('18%'),
                'no_space' => array('20%')
            ),
            'arptemplate_2' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_3' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_4' => array(
                'with_space' => array('18%'),
                'no_space' => array('20%')
            ),
            'arptemplate_5' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_6' => array(
                'with_space' => array('18%'),
                'no_space' => array('20%')
            ),
            'arptemplate_7' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_8' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_9' => array(
                'with_space' => array('18%'),
                'no_space' => array('20%')
            ),
            'arptemplate_10' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_11' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_12' => array(
                'with_space' => array('18%'),
                'no_space' => array('20%')
            ),
            'arptemplate_13' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_14' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_15' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_16' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_20' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_21' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_22' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_23' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_24' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_25' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_26' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
        ));

        return $arp_responsive_width_array;
    }

    function arprice_allow_border_radius() {

        $arprice_allow_border_radius = apply_filters('arprice_allow_border_radius', array(
            'arptemplate_1' => true,
            'arptemplate_2' => true,
            'arptemplate_3' => true,
            'arptemplate_4' => true,
            'arptemplate_5' => true,
            'arptemplate_6' => true,
            'arptemplate_7' => true,
            'arptemplate_8' => true,
            'arptemplate_9' => true,
            'arptemplate_10' => false,
            'arptemplate_11' => true,
            'arptemplate_12' => false,
            'arptemplate_13' => false,
            'arptemplate_14' => false,
            'arptemplate_15' => false,
            'arptemplate_16' => false,
            'arptemplate_20' => true,
            'arptemplate_21' => false,
            'arptemplate_22' => true,
            'arptemplate_23' => true,
            'arptemplate_24' => true,
            'arptemplate_25' => true,
            'arptemplate_26' => true,
        ));

        return $arprice_allow_border_radius;
    }

    function arp_border_bottom() {

        $arp_border_bottom_hide_footer = apply_filters('arp_hide_footer_border_bottom', array(
            'arptemplate_1' => array(
                'caption_column' => array(
                    'ul.arppricingtablebodyoptions' => '1px solid #cecece'
                ),
                'other_column' => array(
                    'ul.arppricingtablebodyoptions' => '1px solid #cecece'
                )
            ),
            'arptemplate_4' => array(
                'caption_column' => array(
                    'ul.arppricingtablebodyoptions' => '1px solid #cecece'
                ),
                'other_column' => array(
                    'ul.arppricingtablebodyoptions' => '1px solid #cecece'
                )
            ),
            'arptemplate_5' => array(
                'other_column' => array(
                    'ul.arppricingtablebodyoptions' => '1px solid #cecece'
                )
            ),
            'arptemplate_20' => array(
                'other_column' => array(
                    'div.arppricingtablebodycontent' => '1px solid #f2f2f2'
                )
            )
        ));
        return array();
    }

    function arprice_column_wrapper_height() {
        $arprice_col_wrapper_height = apply_filters('arprice_set_column_wrapper_height', array(
            'arptemplate_1' => 40,
            'arptemplate_2' => 40,
            'arptemplate_3' => 20,
            'arptemplate_4' => -5,
            'arptemplate_5' => 40,
            'arptemplate_6' => 20,
            'arptemplate_7' => 40,
            'arptemplate_8' => 38,
            'arptemplate_9' => 40,
            'arptemplate_10' => 35,
            'arptemplate_11' => 40,
            'arptemplate_12' => 20,
            'arptemplate_13' => 20,
            'arptemplate_14' => 20,
            'arptemplate_15' => 20,
            'arptemplate_16' => 20,
            'arptemplate_20' => 40,
            'arptemplate_21' => 40,
            'arptemplate_22' => 40,
            'arptemplate_23' => 40,
            'arptemplate_24' => 40,
            'arptemplate_25' => 15,
            'arptemplate_26' => 40,
        ));
        return $arprice_col_wrapper_height;
    }

    function arprice_default_highlighted_column_height_with_hover_effect(){
        $templates_array_for_highlighted_columns = array(
            'arptemplate_1' => 20,
            'arptemplate_2' => 20,
            'arptemplate_3' => 40,
            'arptemplate_4' => 65,
            'arptemplate_5' => 20,
            'arptemplate_6' => 40,
            'arptemplate_7' => 20,
            'arptemplate_8' => 22,
            'arptemplate_9' => 20,
            'arptemplate_10' => 25,
            'arptemplate_11' => 20,
            'arptemplate_12' => 0,
            'arptemplate_13' => 0,
            'arptemplate_14' => 0,
            'arptemplate_15' => 0,
            'arptemplate_16' => 0,
            'arptemplate_20' => 20,
            'arptemplate_21' => 20,
            'arptemplate_22' => 20,
            'arptemplate_23' => 15,
            'arptemplate_24' => 20,
            'arptemplate_25' => 20,
            'arptemplate_26' => 20,
        );
        $arprice_defualt_height_hover = apply_filters('arprice_defualt_height_hover',$templates_array_for_highlighted_columns);
        return $arprice_defualt_height_hover;
    }

    function arprice_column_wrapper_default_height(){
        $arprice_column_wrapper_default_height = array(
            'arptemplate_1' => 40,
            'arptemplate_2' => 40,
            'arptemplate_3' => 20,
            'arptemplate_4' => 40,
            'arptemplate_5' => 40,
            'arptemplate_6' => 20,
            'arptemplate_7' => 40,
            'arptemplate_8' => 40,
            'arptemplate_9' => 40,
            'arptemplate_10' => 40,
            'arptemplate_11' => 40,
            'arptemplate_12' => 40,
            'arptemplate_13' => 40,
            'arptemplate_14' => 40,
            'arptemplate_15' => 40,
            'arptemplate_16' => 40,
            'arptemplate_20' => 40,
            'arptemplate_21' => 40,
            'arptemplate_22' => 40,
            'arptemplate_23' => 40,
            'arptemplate_24' => 40,
            'arptemplate_25' => 40,
            'arptemplate_26' => 40,
        );
        return apply_filters('arprice_column_default_wrapper_height',$arprice_column_wrapper_default_height);
    }

    function arprice_hide_section_array() {
        $arprice_hide_section_array = apply_filters('arprice_hide_section_array', array(
            'arptemplate_1' => array(
                'arp_header' => array('.arppricetablecolumntitle', '.arpcaptiontitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
            ),
            'arptemplate_2' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_header_shortcode' => array('.arp_rounded_shortcode_wrapper'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_3' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arp_price_wrapper'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description')
            ),
            'arptemplate_4' => array(
                'arp_header' => array('.arpcolumnheader'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_5' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_header_shortcode' => array('.arp_header_shortcode')
            ),
            'arptemplate_6' => array(
                'arp_header' => array('.arppricetablecolumntitle', '.arpcaptiontitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
            ),
            'arptemplate_7' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arp_price_wrapper'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description'),
                'arp_header_shortcode' => array('.arp_header_shortcode')
            ),
            'arptemplate_8' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_header_shortcode' => array('.arp_header_shortcode'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_9' => array(
                'arp_header' => array('.arppricetablecolumntitle', '.arpcaptiontitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_10' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_description' => array('.column_description'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodyoptions'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_11' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arp_price_wrapper'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description')
            ),
            'arptemplate_12' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description')
            ),
            'arptemplate_13' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description')
            ),
            'arptemplate_14' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arp_price_wrapper'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_15' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_16' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
            ),
            'arptemplate_20' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_21' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_22' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_23' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arp_price_wrapper'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description'),
            ),
            'arptemplate_24' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
            ),
            'arptemplate_25' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_description' => array('.column_description'),
            ),
            'arptemplate_26' => array(
                'arp_header' => array('.arpcolumnheader'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
                )
        );

        return $arprice_hide_section_array;
    }

    function arprice_min_height_with_section_hide() {
        $arprice_min_height_with_section_hide = apply_filters('arprice_min_height_with_section_hide', array(
            'arptemplate_1' => array(
                'arp_header' => array('.arpcolumnheader', '.arpcaptiontitle'),
                'arp_header_shortcode' => '',
                'arp_price' => array('.arpcolumnheader', '.arppricetablecolumnprice', '.arpcaptiontitle'),
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_2' => array(
                'arp_header' => '',
                'arp_header_shortcode' => '.arpcolumnheader',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_3' => array(
                'arp_header' => '.arpcolumnheader',
                'arp_header_shortcode' => '',
                'arp_price' => '',
                'arp_feature' => '',
                'arp_description' => '.arpcolumnheader',
                'arp_footer' => '',
            ),
            'arptemplate_4' => array(
                'arp_header_shortcode' => '',
                'arp_feature' => '.arpcolumnheader',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_6' => array(
                'arp_header' => '.arppricetablecolumntitle',
                'arp_header_shortcode' => '',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '.arppricetablecolumntitle',
                'arp_footer' => '',
            ),
            'arptemplate_7' => array(
                'arp_header' => '',
                'arp_header_shortcode' => '',
                'arp_price' => '.arppricetablecolumnprice',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '.arppricetablecolumnprice',
            ),
            'arptemplate_9' => array(
                'arp_header' => '.arpcolumnheader',
                'arp_header_shortcode' => '',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_11' => array(
                'arp_header' => '.arpcolumnheader',
                'arp_header_shortcode' => '',
                'arp_price' => array('.arpcolumnheader', '.arppricetablecolumnprice'),
                'arp_feature' => '',
                'arp_description' => array('.arpcolumnheader', '.arppricetablecolumnprice'),
                'arp_footer' => array('.arppricetablecolumnprice', '.arpcolumnheader')
            ),
            'arptemplate_15' => array(
                'arp_header' => '',
                'arp_header_shortcode' => '',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_16' => array(
                'arp_header' => '.arpcolumnheader',
                'arp_header_shortcode' => '',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '.arpcolumnheader',
                'arp_footer' => '',
            ),
            'arptemplate_21' => array(
                'arp_header' => '',
                'arp_header_shortcode' => '',
                'arp_price' => '.arppricetablecolumnprice',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_22' => array(
                'arp_header' => '',
                'arp_header_shortcode' => '',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
        ));
        return $arprice_min_height_with_section_hide;
    }

    function arp_hide_header_column_border_top() {
        $arp_hide_header_column_border_top = apply_filters('arp_hide_header_column_border_top', array(
            'arptemplate_22' => array(
                '.arppricetablecolumnprice' => array(
                    'margin-top' => '20px'
                )
            ),
            'arptemplate_21' => array(
                '.arp_price_wrapper:before' => array(
                    'content' => 'none'
                ),
                '.arp_price_wrapper:after' => array(
                    'content' => 'none'
                ),
            ),
            'arptemplate_16' => array(
                '.column_description' => array(
                    'margin-top' => '10px'
                )
            ),
            'arptemplate_4' => array(
                '.arpmain_price' => array(
                    'top' => '0px !important'
                )
            ),
            'arptemplate_1' => array(
                '.arpcaptiontitle' => array(
                    'padding-top' => '0px !important'
                )
            ),
            'arptemplate_6' => array(
                '.arpcolumnheader' => array(
                    'min-height' => '125px !important'
                ),
            ),
        ));
        return $arp_hide_header_column_border_top;
    }

    function arp_hide_price_css_fixes() {
        $arp_hide_price_css_fixes = apply_filters('arp_hide_price_css_fixes', array(
            'arptemplate_20' => array(
                '.arppricingtablebodycontent ul li#arp_row_0' => array(
                    'border-top-width' => '0px !important'
                )
            ),
            'arptemplate_21' => array(
                '.arppricetablecolumnprice:before' => array(
                    'content' => 'none'
                ),
                '.arppricetablecolumnprice:after' => array(
                    'content' => 'none'
                ),
            ),
            'arptemplate_1' => array(
                '.arpcolumnheader' => array(
                    'padding' => '0px !important'
                ),
                '.arpcaptiontitle' => array(
                    'padding-top' => '25px !important'
                )
            ),
            'arptemplate_6' => array(
                '.arpcaptiontitle' => array(
                    'margin-top' => '0px !important',
                    'min-height' => '96px'
                ),
            ),
            'arptemplate_9' => array(
                '.arpcaptiontitle' => array(
                    'margin-top' => '0px !important',
                    'padding-top' => '15px !important',
                    'height' => '70px',
                ),
            ),
        ));

        return $arp_hide_price_css_fixes;
    }

    function arp_hide_description_css_fixes() {
        $arp_hide_description_css_fixes = apply_filters('arp_hide_description_css_fixes', array(
            'arptemplate_7' => array(
                '.arppricetablecolumnprice' => array(
                    'margin' => '0px !important'
                )
            ),
        ));

        return $arp_hide_description_css_fixes;
    }

    function arp_column_border_array() {
        $arp_column_border_array = apply_filters('arp_column_border_array', array(
            'arptemplate_1' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
                'caption_border_all' => array(
                    'left' => '.arp_column_content_wrapper',
                    'right' => '.arp_column_content_wrapper',
                    'top' => '.arp_column_content_wrapper',
                    'bottom' => '.arp_column_content_wrapper',
                ),
            ),
            'arptemplate_2' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_3' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_4' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
                'caption_border_all' => array(
                    'left' => '.arp_column_content_wrapper',
                    'right' => '.arp_column_content_wrapper',
                    'top' => '.arp_column_content_wrapper',
                    'bottom' => '.arp_column_content_wrapper',
                ),
            ),
            'arptemplate_5' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_6' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
                'caption_border_all' => array(
                    'left' => '.arpcaptiontitle, .arppricingtablebodycontent, .arpcolumnfooter',
                    'right' => '.arpcaptiontitle, .arppricingtablebodycontent, .arpcolumnfooter',
                    'top' => '.arpcaptiontitle',
                    'bottom' => '.arp_column_content_wrapper',
                ),
            ),
            'arptemplate_7' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_8' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_9' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arpcolumnfooter',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
                'caption_border_all' => array(
                    'left' => '.arppricingtablebodycontent, .arpcaptiontitle',
                    'right' => '.arppricingtablebodycontent, .arpcaptiontitle',
                    'top' => '.arpcaptiontitle',
                    'bottom' => '.arp_column_content_wrapper',
                ),
            ),
            'arptemplate_10' => array(
                'top' => '.arpplan',
                'bottom' => '.arpplan',
                'left' => '.arpplan',
                'right' => '.arpplan',
            ),
            'arptemplate_11' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_12' => array(
                'top' => '.arpplan',
                'bottom' => '.arpplan',
                'left' => '.arpplan',
                'right' => '.arpplan',
            ),
            'arptemplate_13' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_14' => array(
                'top' => '.arpplan',
                'bottom' => '.arpplan',
                'left' => '.arpplan',
                'right' => '.arpplan',
            ),
            'arptemplate_15' => array(
                'top' => '.arpplan',
                'bottom' => '.arpplan',
                'left' => '.arpplan',
                'right' => '.arpplan',
            ),
            'arptemplate_16' => array(
                'top' => '.arpplan',
                'bottom' => '.arpplan',
                'left' => '.arpplan',
                'right' => '.arpplan',
            ),
            'arptemplate_20' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_21' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_22' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_23' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_24' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_25' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_26' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
        ));
        return $arp_column_border_array;
    }

    function arp_section_text_alignment() {
        $arp_section_text_alignment = apply_filters('arp_section_text_alignment', array(
            'arptemplate_1' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arp_footer_content'
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'body_section' => 'arppricingtablebodyoptions li',
                    'footer_section' => 'arp_footer_content'
                )
            ),
            'arptemplate_2' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'footer_section' => 'arp_footer_content',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_3' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'footer_section' => 'arp_footer_content',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_4' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arp_footer_content',
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_pricerow',
                    'footer_section' => 'arp_footer_content',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_5' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'footer_section' => 'arp_footer_content',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_6' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arp_footer_content'
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'footer_section' => 'arp_footer_content',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_7' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_8' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_9' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'footer_section' => 'arp_footer_content',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_10' => array(
                'other_column' => array(
                    'header_section' => 'bestPlanTitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_11' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_13' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_14' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_15' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_16' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_20' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_21' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_22' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'footer_section' => 'arp_footer_content',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_23' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_24' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'footer_section' => 'arp_footer_content',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_25' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_26' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'footer_section' => 'arp_footer_content',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            )
        ));
        return $arp_section_text_alignment;
    }

    function arp_row_level_border() {

        $arp_row_level_border = apply_filters('arp_row_level_border', array(
            'arptemplate_6' => array(
                array('.arpcolumnheader', 'border-bottom'),
            ),
        ));

        return $arp_row_level_border;
    }

    function arp_row_level_border_remove_from_last_child() {

        $arp_row_level_border_remove_from_last_child = apply_filters('arp_row_level_border_remove_from_last_child', array(
            'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_8', 'arptemplate_10', 'arptemplate_11', 'arptemplate_14', 'arptemplate_15', 'arptemplate_13', 'arptemplate_16', 'arptemplate_25',
                )
        );

        return $arp_row_level_border_remove_from_last_child;
    }

    function arp_select_previous_skin_for_multicolor() {

        $arp_select_previous_skin_for_multicolor = apply_filters('arp_select_previous_skin_for_multicolor', array(
            'arptemplate_1' => 'green',
            'arptemplate_5' => 'red',
            'arptemplate_8' => 'red',
            'arptemplate_9' => 'darkviolet',
            'arptemplate_10' => 'teal',
            'arptemplate_12' => '',
        ));

        return $arp_select_previous_skin_for_multicolor;
    }

    function arp_font_settings() {
        $arp_font_settings = apply_filters('arp_font_settings', array(
            'arptemplate_1' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_2' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_3' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_4' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_5' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_6' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_7' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_8' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_9' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_10' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_11' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_12' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_13' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_14' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_15' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_16' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_20' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_21' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_22' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_23' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_24' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_25' => array('arp_header_font', 'arp_body_font', 'arp_desc_font'),
            'arptemplate_26' => array('arp_header_font', 'arp_body_font', 'arp_button_font'),
                )
        );

        return $arp_font_settings;
    }

    function arp_button_type() {
        $arp_button_type = apply_filters('arp_button_type', array(
            'flat' => array(
                'name' => esc_html__('Flat', 'ARPrice'),
                'class' => 'arp_flat_button'
            ),
            'classic' => array(
                'name' => esc_html__('Classic', 'ARPrice'),
                'class' => 'arp_classic_button'
            ),
            'border' => array(
                'name' => esc_html__('Border', 'ARPrice'),
                'class' => 'arp_border_button'
            ),
            'reverse_border' => array(
                'name' => esc_html__('Reverse Border', 'ARPrice'),
                'class' => 'arp_reverse_border_button'
            ),
            'modern' => array(
                'name' => esc_html__('Modern', 'ARPrice'),
                'class' => 'arp_modern_button'
            ),
            'shadow' => array(
                'name' => esc_html__('Shadow', 'ARPrice'),
                'class' => 'arp_shadow_button'
            ),
            'none' => array(
                'name' => esc_html__('None', 'ARPrice'),
                'class' => 'arp_none_button'
            ),
        ));

        return $arp_button_type;
    }

    function arp_shortcode_custom_type() {
        $arp_shortcode_custom_type = apply_filters('arp_shortcode_custom_type', array(
            'rounded' => array(
                'name' => esc_html__('Circle (Bordered)', 'ARPrice'),
                'class' => 'arp_rounded_shortcode',
                'type' => 'bordered'
            ),
            'rounded_solid' => array(
                'name' => esc_html__('Circle (Solid)', 'ARPrice'),
                'class' => 'arp_rounded_shortcode_solid',
                'type' => 'solid'
            ),
            'square' => array(
                'name' => esc_html__('Square (Bordered)', 'ARPrice'),
                'class' => 'arp_square_shortcode',
                'type' => 'bordered'
            ),
            'square_solid' => array(
                'name' => esc_html__('Square (Solid)', 'ARPrice'),
                'class' => 'arp_square_shortcode_solid',
                'type' => 'solid'
            ),

            'semiround' => array(
                'name' => esc_html__('Rounded Square (Bordered)', 'ARPrice'),
                'class' => 'arp_semiround_shortcode',
                'type' => 'bordered'
            ),
            'semiround_solid' => array(
                'name' => esc_html__('Rounded Square (Solid)', 'ARPrice'),
                'class' => 'arp_semiround_shortcode_solid',
                'type' => 'solid'
            ),
            'none' => array(
                'name' => esc_html__('None', 'ARPrice'),
                'class' => 'arp_none_shortcode',
                'type' => 'none'
            ),
        ));

        return $arp_shortcode_custom_type;
    }

    function arp_button_size_new() {
        $arp_button_size_new = apply_filters('arp_button_size_new', array(
            'Small' => 'arp_small_btn',
            'Medium' => 'arp_medium_btn',
            'Large' => 'arp_large_btn',
        ));

        return $arp_button_size_new;
    }

    function arp_column_bg_image_colors() {
        $arp_column_bg_image_colors = apply_filters('arp_column_bg_image_colors', array(
            'arptemplate_1' => array('.bestPlanButton'),
            'arptemplate_2' => array('.rounded_corder', '.bestPlanButton'),
            'arptemplate_3' => array('.bestPlanButton'),
            'arptemplate_4' => array('.arp_price_wrapper', '.bestPlanButton'),
            'arptemplate_5' => array('.arpcolumnheader', '.arppricetablecolumnprice', '.arp_even_row', '.arp_odd_row', '.bestPlanButton'),
            'arptemplate_6' => array('.bestPlanButton'),
            'arptemplate_7' => array('.arppricetablecolumntitle', '.column_description', '.arppricetablecolumnprice', '.arp_even_row', '.arp_odd_row', '.bestPlanButton'),
            'arptemplate_8' => array('.rounded_corder', '.bestPlanButton'),
            'arptemplate_9' => array('.bestPlanButton'),
            'arptemplate_10' => array('.bestPlanTitle', '.arp_price_wrapper', '.arpplan', '.arp_odd_row', '.arp_even_row', '.bestPlanButton'),
            'arptemplate_11' => array('.bestPlanButton'),
            'arptemplate_13' => array('.arpplan', '.arppricetablecolumnprice', '.bestPlanButton'),
            'arptemplate_14' => array('.bestPlanButton'),
            'arptemplate_15' => array('.arppricetablecolumnprice', '.bestPlanButton'),
            'arptemplate_16' => array('.bestPlanButton'),
            'arptemplate_20' => array('.bestPlanButton'),
            'arptemplate_21' => array('.bestPlanButton'),
            'arptemplate_22' => array('.bestPlanButton'),
            'arptemplate_23' => array('.arp_column_content_wrapper', '.arp_price_wrapper', '.bestPlanButton'),
            'arptemplate_24' => array('.bestPlanButton'),
            'arptemplate_25' => array('.arppricetablecolumntitle', '.arppricingtablebodycontent', '.column_description'),
            'arptemplate_26' => array('.rounded_corder', '.bestPlanButton'),
        ));
        return $arp_column_bg_image_colors;
    }

}

?>