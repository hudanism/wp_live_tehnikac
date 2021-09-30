<?php

global $wpdb, $arp_pricingtable, $arp_newdbversion;

if (version_compare($arp_newdbversion, '1.0.1', '<')) {
    $res = $wpdb->get_results($wpdb->prepare("SELECT ID,general_options FROM " . $wpdb->prefix . "arp_arprice WHERE is_template=%d and template_name=%d order by id desc", 0, 0), OBJECT_K);

    foreach ($res as $key => $val) {
        $newtemplateid = $val->ID;
        $general_options = maybe_unserialize($val->general_options);

        $ref_template = $general_options['template_setting']['template'];
        $wp_upload_dir = wp_upload_dir();
        $dest_dir = $wp_upload_dir['basedir'] . '/arprice/css/';
        $css_file_new = $dest_dir . 'arptemplate_' . $newtemplateid . '.css';

        if (file_exists(PRICINGTABLE_DIR . '/css/templates/' . $ref_template . '.css')) {
            $css = file_get_contents(PRICINGTABLE_DIR . '/css/templates/' . $ref_template . '.css');
        }

        $css_new = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $newtemplateid, $css);

        WP_Filesystem();
        global $wp_filesystem;
        $wp_filesystem->put_contents($css_file_new, $css_new, 0777);
    }
}

if (version_compare($arp_newdbversion, '1.1', '<')) {
    $res = $wpdb->get_results($wpdb->prepare("SELECT ID,general_options FROM " . $wpdb->prefix . "arp_arprice WHERE is_template=%d and template_name=%d order by id desc", 0, 0), OBJECT_K);

    foreach ($res as $key => $val) {
        $newtemplateid = $val->ID;
        $general_options = maybe_unserialize($val->general_options);

        $ref_template = $general_options['template_setting']['template'];
        $wp_upload_dir = wp_upload_dir();
        $dest_dir = $wp_upload_dir['basedir'] . '/arprice/css/';
        $css_file_new = $dest_dir . 'arptemplate_' . $newtemplateid . '.css';

        if (file_exists(PRICINGTABLE_DIR . '/css/templates/' . $ref_template . '.css')) {
            $css = file_get_contents(PRICINGTABLE_DIR . '/css/templates/' . $ref_template . '.css');
        }

        $css_new = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $newtemplateid, $css);

        WP_Filesystem();
        global $wp_filesystem;
        $wp_filesystem->put_contents($css_file_new, $css_new, 0777);
    }
}

if (version_compare($arp_newdbversion, '2.0', '<')) {
    update_option('arp_is_dashboard_visited', 0);

    update_option('arp_is_new_installation', 0);

    

    $arp_arprice = $wpdb->prefix . 'arp_arprice';
    $arp_arprice_options = $wpdb->prefix . 'arp_arprice_options';
    $arp_analytics = $wpdb->prefix . 'arp_arprice_analytics';

    

    $sql_arprice = $wpdb->query("ALTER TABLE `$arp_arprice` CHANGE `general_options` `general_options` LONGTEXT");
    $sql_arprice_options = $wpdb->query("ALTER TABLE `$arp_arprice_options` CHANGE `table_options` `table_options` LONGTEXT");

    

    $sql_remove1 = $wpdb->query("ALTER TABLE `$arp_arprice` DROP COLUMN `pricing_css`");

    $sql_remove2 = $wpdb->query("ALTER TABLE `$arp_analytics` DROP COLUMN `browser_info`");

    $sql_remove3 = $wpdb->query("ALTER TABLE `$arp_analytics` DROP COLUMN `referer`");

    

    $sql_insert_col1 = $wpdb->query("ALTER TABLE `$arp_arprice` ADD COLUMN `arp_last_updated_date` datetime NOT NULL");

    $sql_insert_col2 = $wpdb->query("ALTER TABLE `$arp_analytics` ADD COLUMN ( `is_click` INT(1) DEFAULT 0, `plan_id` VARCHAR(25) NOT NULL )");

    $sql_insert_col3 = $wpdb->query("ALTER TABLE `$arp_analytics` ADD COLUMN `ref_template_id` INT(11) NOT NULL");

    
    if ($wpdb->has_cap('collation')) {

        if (!empty($wpdb->charset))
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

        if (!empty($wpdb->collate))
            $charset_collate .= " COLLATE $wpdb->collate";
    }

    $temp_table1 = $wpdb->prefix . 'arp_arprice_temp';

    $sql_table = "CREATE TABLE IF NOT EXISTS `{$temp_table1}`(			
                 ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                 table_name VARCHAR(255) NOT NULL, 
                 template_name int(11) NOT NULL,
                 general_options LONGTEXT NOT NULL, 
                 is_template int(1) NOT NULL,
                 is_animated int(1) NOT NULL,
                 status VARCHAR(255) NOT NULL, 
                 create_date DATETIME NOT NULL, 
                 arp_last_updated_date DATETIME NOT NULL,
                 ref_table_name VARCHAR(255) NOT NULL
            ){$charset_collate}";

    $wpdb->query($sql_table);

    $wpdb->query("ALTER TABLE `{$temp_table1}` AUTO_INCREMENT = 10000");

    $templates = $wpdb->get_results("SELECT * FROM `" . $arp_arprice . "` ORDER BY ID ASC");

    if (!empty($templates)) {
        foreach ($templates as $key => $template) {
            $query = "INSERT INTO `{$temp_table1}`( table_name, template_name, general_options, is_template, is_animated, status, create_date, arp_last_updated_date, ref_table_name ) VALUES ( %s, %d, %s, %d, %d, %s, %s, %s, %d )";
            $wpdb->query($wpdb->prepare($query, $template->table_name, $template->template_name, $template->general_options, $template->is_template, $template->is_animated, $template->status, $template->create_date, $template->arp_last_updated_date, $template->ID));

            $reference_table_id = $wpdb->insert_id;

            $qry = $wpdb->prepare("UPDATE `$arp_analytics` SET `ref_template_id` = %d WHERE `pricing_table_id` = %d", $reference_table_id, $template->ID);

            $wpdb->query($qry);
        }
    }

    $temp_table_2 = $wpdb->prefix . "arp_arprice_options_temp";

    $sql_table_opt = "CREATE TABLE IF NOT EXISTS `{$temp_table_2}`( 
                ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                table_id INT(11) NOT NULL,
		table_options LONGTEXT NOT NULL,
                ref_table_id INT(11) NOT NULL
            ){$charset_collate}";

    $wpdb->query($sql_table_opt);

    $wpdb->query("ALTER TABLE `{$temp_table_2}` AUTO_INCREMENT = 10000 ");

    $template_opts = $wpdb->get_results("SELECT * FROM `" . $arp_arprice_options . "` ORDER BY ID ASC");

    if (!empty($template_opts)) {
        foreach ($template_opts as $key => $option) {

            $wpdb->query($wpdb->prepare("INSERT INTO `{$temp_table_2}`(table_id, table_options, ref_table_id) VALUES ( %d,%s,%d) ", $option->table_id, $option->table_options, $option->table_id));
        }
    }

    

    $wpdb->query("TRUNCATE TABLE `" . $arp_arprice . "`");

    $wpdb->query("TRUNCATE TABLE `" . $arp_arprice_options . "`");

    $arp_pricingtable->arp_pricing_table_templates();

    $wpdb->query("ALTER TABLE `" . $arp_arprice . "` AUTO_INCREMENT = 100");

    $wpdb->query("ALTER TABLE `" . $arp_arprice_options . "` AUTO_INCREMENT = 100");

    
}


if (version_compare($arp_newdbversion, '2.1.1', '<')) {
    $res = $wpdb->get_results($wpdb->prepare("SELECT ID,general_options FROM " . $wpdb->prefix . "arp_arprice WHERE is_template=%d order by id desc", 1), OBJECT_K);

    foreach ($res as $key => $val) {
        $newtemplateid = $val->ID;
        $general_options = maybe_unserialize($val->general_options);

        $general_options['general_settings']['toggle_active_color'] = '#404040';
        $general_options['general_settings']['toggle_inactive_color'] = '#ffffff';
        $general_options['general_settings']['toggle_active_text_color'] = '#ffffff';
        $general_options['general_settings']['toggle_button_font_color'] = '#000000';

        $general_options = maybe_serialize($general_options);

        $qry = $wpdb->prepare("UPDATE " . $wpdb->prefix . "arp_arprice SET `general_options` = %s WHERE `ID` = %d", $general_options, $newtemplateid);
        $wpdb->query($qry);
    }
}

if (version_compare($arp_newdbversion, '2.5', '<')) {
    global $wpdb, $arprice_form, $arprice_default_settings;
    $converted_json = array();
    if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arp_column_background_color.json')) {
        $arp_column_section_background_color = file_get_contents(PRICINGTABLE_VIEWS_DIR . '/arp_column_background_color.json');
    }
    $converted_json = (json_decode($arp_column_section_background_color,true));
    $section_bg_color = $converted_json['arp_column_section_background_color'];

    require_once(ABSPATH . 'wp-admin/includes/file.php');
    WP_Filesystem();
    global $wp_filesystem;

    
    include_once(PRICINGTABLE_CLASSES_DIR . '/class.arprice_default_templates_update_2.5.php');

    
    /**
     * ARPrice Template 22
     *
     * @since 2.0
     */
    $values = array();
    $values['name'] = 'ARPrice Template 22';
    $values['is_template'] = 1;
    $values['template_name'] = 22;
    $values['status'] = 'published';
    $values['is_animated'] = 0;

    $arp_pt_gen_options = array();
    $arp_pt_template_settings = array();
    $arp_pt_font_settings = array();
    $arp_pt_general_settings = array();
    $arp_header_font_settings = array();
    $arp_price_font_settings = array();
    $arp_price_text_font_settings = array();
    $arp_content_font_settings = array();
    $arp_button_font_settings = array();
    $arp_pt_column_settings = array();
    $arp_pt_column_animation = array();
    $arp_pt_tooltip_settings = array();
    $arp_pt_button_settings = array();

    $arp_pt_template_settings['template'] = 'arptemplate_25';
    $arp_pt_template_settings['skin'] = 'blue';
    $arp_pt_template_settings['template_type'] = 'normal';
    $arp_pt_template_settings['features'] = array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'after_button', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false);

    $arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2"]';
    $arp_pt_general_settings['reference_template'] = 'arptemplate_25';
    $arp_pt_general_settings['user_edited_columns'] = '';

    
    $arp_pt_general_settings['enable_toggle_price'] = '0';
    $arp_pt_general_settings['toggle_copy_data_to_other_step'] = '0';
    $arp_pt_general_settings['arp_step_main'] = '2';
    $arp_pt_general_settings['togglestep_yearly'] = 'Yearly';
    $arp_pt_general_settings['togglestep_monthly'] = 'Monthly';
    $arp_pt_general_settings['togglestep_quarterly'] = 'Quarterly';
    $arp_pt_general_settings['setas_default_toggle'] = '0';
    $arp_pt_general_settings['arp_toggle_main'] = '0';
    $arp_pt_general_settings['toggle_active_color'] = '#404040';
    $arp_pt_general_settings['toggle_inactive_color'] = '#ffffff';
    $arp_pt_general_settings['toggle_active_text_color'] = '#ffffff';
    $arp_pt_general_settings['toggle_button_font_color'] = '#000000';
    $arp_pt_general_settings['toggle_title_font_color'] = '#000000';
    $arp_pt_general_settings['toggle_label_content'] = 'Please Select Your Plan';
    $arp_pt_general_settings['arp_label_position_main'] = '1';
    $arp_pt_general_settings['toggle_main_color'] = '#E8E9EB';
    $arp_pt_general_settings['toggle_title_font_family'] = 'Ubuntu';
    $arp_pt_general_settings['toggle_title_font_size'] = 16;
    $arp_pt_general_settings['toggle_title_font_style_bold'] = '';
    $arp_pt_general_settings['toggle_title_font_style_italic'] = '';
    $arp_pt_general_settings['toggle_title_font_style_decoration'] = '';
    $arp_pt_general_settings['toggle_button_font_family'] = 'Ubuntu';
    $arp_pt_general_settings['toggle_button_font_size'] = 16;
    $arp_pt_general_settings['toggle_button_font_style_bold'] = '';
    $arp_pt_general_settings['toggle_button_font_style_italic'] = '';
    $arp_pt_general_settings['toggle_button_font_style_decoration'] = '';
    

    $arp_pt_button_settings['button_shadow_color'] = '#ffffff';
    $arp_pt_button_settings['button_radius'] = 0;

    
    $arp_pt_column_settings['column_space'] = 10;
    $arp_pt_column_settings['column_highlight_on_hover'] = 'no_effect';
    $arp_pt_column_settings['is_responsive'] = 1;
    $arp_pt_column_settings['full_column_clickable'] = 0;
    $arp_pt_column_settings['disable_hover_effect'] = 0;
    $arp_pt_column_settings['hide_footer_global'] = 0;
    $arp_pt_column_settings['hide_header_global'] = 0;
    $arp_pt_column_settings['hide_price_global'] = 0;
    $arp_pt_column_settings['hide_feature_global'] = 0;
    $arp_pt_column_settings['hide_description_global'] = 0;
    $arp_pt_column_settings['hide_header_shortcode_global'] = 0;
    $arp_pt_column_settings['all_column_width'] = 280;
    
    
    $arp_pt_column_settings['hide_caption_colunmn'] = 0;
    $arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
    $arp_pt_column_settings['column_border_radius_top_left'] = 8;
    $arp_pt_column_settings['column_border_radius_top_right'] = 8;
    $arp_pt_column_settings['column_border_radius_bottom_right'] = 8;
    $arp_pt_column_settings['column_border_radius_bottom_left'] = 8;
    $arp_pt_column_settings['column_wrapper_width_txtbox'] = 870;

    $arp_pt_column_settings['global_button_border_width'] = 0;
    $arp_pt_column_settings['global_button_border_type'] = 'solid';
    $arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
    $arp_pt_column_settings['global_button_border_radius_top_left'] = 0;
    $arp_pt_column_settings['global_button_border_radius_top_right'] = 0;
    $arp_pt_column_settings['global_button_border_radius_bottom_left'] = 0;
    $arp_pt_column_settings['global_button_border_radius_bottom_right'] = 0;
    $arp_pt_column_settings['arp_global_button_type'] = 'none';
    $arp_pt_column_settings['disable_button_hover_effect'] = 0;

    $arp_pt_column_settings['arp_row_border_size'] = '0';
    $arp_pt_column_settings['arp_row_border_type'] = 'solid';
    $arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';

    $arp_pt_column_settings['arp_column_border_size'] = '0';
    $arp_pt_column_settings['arp_column_border_type'] = 'solid';
    $arp_pt_column_settings['arp_column_border_color'] = '#efefef';

    $arp_pt_column_settings['arp_column_border_left'] = 1;
    $arp_pt_column_settings['arp_column_border_right'] = 1;
    $arp_pt_column_settings['arp_column_border_top'] = 1;
    $arp_pt_column_settings['arp_column_border_bottom'] = 1;

    $arp_pt_column_settings['display_col_mobile'] = 1;
    $arp_pt_column_settings['display_col_tablet'] = 3;

    $arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
    $arp_pt_column_settings['hide_blank_rows'] = 'no';
    $arp_pt_column_settings['header_font_family_global'] = 'Roboto';
    $arp_pt_column_settings['header_font_size_global'] = 24;
    $arp_pt_column_settings['arp_header_text_alignment'] = 'center';
    $arp_pt_column_settings['arp_header_text_bold_global'] = '';
    $arp_pt_column_settings['arp_header_text_italic_global'] = '';
    $arp_pt_column_settings['arp_header_text_decoration_global'] = '';
    $arp_pt_column_settings['price_font_family_global'] = '';
    $arp_pt_column_settings['price_font_size_global'] = '';
    $arp_pt_column_settings['arp_price_text_alignment'] = '';
    $arp_pt_column_settings['arp_price_text_bold_global'] = '';
    $arp_pt_column_settings['arp_price_text_italic_global'] = '';
    $arp_pt_column_settings['arp_price_text_decoration_global'] = '';
    $arp_pt_column_settings['body_font_family_global'] = 'Roboto';
    $arp_pt_column_settings['body_font_size_global'] = 17;
    $arp_pt_column_settings['arp_body_text_alignment'] = 'center';
    $arp_pt_column_settings['arp_body_text_bold_global'] = '';
    $arp_pt_column_settings['arp_body_text_italic_global'] = '';
    $arp_pt_column_settings['arp_body_text_decoration_global'] = '';
    $arp_pt_column_settings['footer_font_family_global'] = '';
    $arp_pt_column_settings['footer_font_size_global'] = '';
    $arp_pt_column_settings['arp_footer_text_alignment'] = '';
    $arp_pt_column_settings['arp_footer_text_bold_global'] = '';
    $arp_pt_column_settings['arp_footer_text_italic_global'] = '';
    $arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
    $arp_pt_column_settings['button_font_family_global'] = 'Roboto';
    $arp_pt_column_settings['button_font_size_global'] = 20;
    $arp_pt_column_settings['arp_button_text_alignment'] = 'center';
    $arp_pt_column_settings['arp_button_text_bold_global'] = '';
    $arp_pt_column_settings['arp_button_text_italic_global'] = '';
    $arp_pt_column_settings['arp_button_text_decoration_global'] = '';
    $arp_pt_column_settings['description_font_family_global'] = 'Roboto';
    $arp_pt_column_settings['description_font_size_global'] = 17;
    $arp_pt_column_settings['arp_description_text_alignment'] = 'center';
    $arp_pt_column_settings['arp_description_text_bold_global'] = '';
    $arp_pt_column_settings['arp_description_text_italic_global'] = '';
    $arp_pt_column_settings['arp_description_text_decoration_global'] = '';
    $arp_pt_column_animation['is_animation'] = 'no';
    $arp_pt_column_animation['visible_column'] = 2;
    $arp_pt_column_animation['scrolling_columns'] = 2;
    $arp_pt_column_animation['navigation'] = 1;
    $arp_pt_column_animation['autoplay'] = 1;
    $arp_pt_column_animation['sliding_effect'] = 'slide';
    $arp_pt_column_animation['transition_speed'] = 750;
    $arp_pt_column_animation['navigation_style'] = 'arp_nav_style_1';
    $arp_pt_column_animation['pagination'] = 1;
    $arp_pt_column_animation['pagination_style'] = 'arp_paging_style_1';
    $arp_pt_column_animation['pagination_position'] = 'Top';
    $arp_pt_column_animation['easing_effect'] = 'swing';
    $arp_pt_column_animation['infinite'] = 1;
    
    $arp_pt_column_animation['navi_nav_btn'] = 'navigation';
    $arp_pt_column_animation['pagi_nav_btn'] = 'pagination_bottom';
    $arp_pt_column_animation['sticky_caption'] = 0;

    $arp_pt_tooltip_settings['background_color'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['background_color'];
    $arp_pt_tooltip_settings['text_color'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['text_color'];
    $arp_pt_tooltip_settings['animation'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['animation'][0];
    $arp_pt_tooltip_settings['position'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['position'][0];
    $arp_pt_tooltip_settings['style'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['style'][0];
    $arp_pt_tooltip_settings['tooltip_width'] = '';
    $arp_pt_tooltip_settings['tooltip_font_family'] = 'Open Sans Bold';
    $arp_pt_tooltip_settings['tooltip_font_size'] = 16;
    $arp_pt_tooltip_settings['tooltip_font_style'] = 'normal';
    $arp_pt_tooltip_settings['tooltip_trigger_type'] = 'hover';
    $arp_pt_tooltip_settings['tooltip_display_style'] = 'default';
    $arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fa fa-info-circle arpsize-ico-14"></i>';

    $arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
    $arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
    $arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
    $arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
    $arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

    $arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

    $arp_pt_custom_skin_array = array();

    $arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#2fb8ff";
    $arp_pt_custom_skin_array['arp_column_bg_custom_color'] = '#000000';
    $arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = "#2fb8ff";
    $arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_footer_content_bg_color'] = "#2fb8ff";
    $arp_pt_custom_skin_array['arp_button_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_column_bg_hover_color'] = '#2fb8ff';
    $arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_header_bg_hover_color'] = "#272727";
    $arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
    $arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
    $arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = '#000000';
    $arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = null;
    $arp_pt_custom_skin_array['arp_desc_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
    $arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_footer_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

    $arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

    $values['options'] = maybe_serialize($arp_pt_gen_options);

    $table_id = $arprice_form->create($values);

    $updatestat = $wpdb->query($wpdb->prepare("update " . $wpdb->prefix . "arp_arprice set id = %d where ID = %d", 22, $table_id));
    $table_id = '22';

    $pt_columns = array();
    $column = array();

    $column['column_0']['package_title'] = 'Liza haden';
    $column['column_0']['column_description'] = "<a href='#'><i class='fa fa-facebook arpsize-ico-20'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'><i class='fa fa-twitter arpsize-ico-20'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'><i class='fa fa-google-plus arpsize-ico-20'></i></a>";
    $column['column_0']['custom_ribbon_txt'] = '';
    $column['column_0']['column_width'] = '';
    $column['column_0']['column_align'] = 'left';
    $column['column_0']['column_background_color'] = '#000000';
    $column['column_0']['column_hover_background_color'] = "#2fb8ff";
    $column['column_0']['column_background_image'] = PRICINGTABLE_IMAGES_URL . "/arp_25_img_1.png";
    
    $column['column_0']['header_background_color'] = '#2fb8ff';
    $column['column_0']['header_hover_background_color'] = '#272727';
    $column['column_0']['header_font_family'] = 'Roboto';
    $column['column_0']['header_font_size'] = 24;
    $column['column_0']['header_font_color'] = '#ffffff';
    $column['column_0']['header_hover_font_color'] = '#ffffff';
    $column['column_0']['header_style_bold'] = '';
    $column['column_0']['header_style_italic'] = '';
    $column['column_0']['header_style_decoration'] = '';
    

    $column['column_0']['price_background_color'] = '';
    $column['column_0']['price_hover_background_color'] = '';
    $column['column_0']['price_font_family'] = 'Roboto';
    $column['column_0']['price_font_size'] = 40;
    $column['column_0']['price_font_color'] = '#ffffff';
    $column['column_0']['price_hover_font_color'] = '#ffffff';
    $column['column_0']['price_label_style_bold'] = 'bold';
    $column['column_0']['price_label_style_italic'] = '';
    $column['column_0']['price_label_style_decoration'] = '';

    
    $column['column_0']['price_text_font_family'] = 'Roboto';
    $column['column_0']['price_text_font_size'] = 17;
    $column['column_0']['price_text_font_color'] = '#ffffff';
    $column['column_0']['price_text_hover_font_color'] = '#ffffff';
    $column['column_0']['price_text_style_bold'] = 'bold';
    $column['column_0']['price_text_style_italic'] = '';
    $column['column_0']['price_text_style_decoration'] = '';
    

    
    $column['column_0']['column_description_font_family'] = 'Roboto';
    $column['column_0']['column_description_font_size'] = 20;
    $column['column_0']['column_description_font_color'] = '#ffffff';
    $column['column_0']['column_description_hover_font_color'] = '#ffffff';
    $column['column_0']['column_desc_background_color'] = '#2fb8ff';
    $column['column_0']['column_desc_hover_background_color'] = '#000000';
    $column['column_0']['column_description_style_bold'] = '';
    $column['column_0']['column_description_style_italic'] = '';
    $column['column_0']['column_description_style_decoration'] = '';
    

    
    $column['column_0']['content_font_family'] = 'Roboto';
    $column['column_0']['content_font_size'] = 17;
    $column['column_0']['content_font_color'] = '#ffffff';
    $column['column_0']['content_hover_font_color'] = '#ffffff';
    $column['column_0']['content_even_font_color'] = '#ffffff';
    $column['column_0']['content_even_hover_font_color'] = '#ffffff';
    $column['column_0']['content_odd_color'] = '#272727';
    $column['column_0']['content_odd_hover_color'] = '#2fb8ff';
    $column['column_0']['content_even_color'] = '#272727';
    $column['column_0']['content_even_hover_color'] = '#2fb8ff';
    $column['column_0']['body_li_style_bold'] = '';
    $column['column_0']['body_li_style_italic'] = '';
    $column['column_0']['body_li_style_decoration'] = '';
    

    
    $column['column_0']['button_background_color'] = '#2fb8ff';
    $column['column_0']['button_hover_background_color'] = '#272727';
    $column['column_0']['button_font_family'] = 'Roboto';
    $column['column_0']['button_font_size'] = 20;
    $column['column_0']['button_font_color'] = '#ffffff';
    $column['column_0']['button_hover_font_color'] = '#ffffff';
    $column['column_0']['button_style_bold'] = '';
    $column['column_0']['button_style_italic'] = '';
    $column['column_0']['button_style_decoration'] = '';
    

    $column['column_0']['is_caption'] = 0;
    $column['column_0']['column_highlight'] = '';
    $column['column_0']['price_text'] = "";
    $column['column_0']['price_label'] = '';
    $column['column_0']['arp_header_shortcode'] = '';
    $column['column_0']['body_text_alignment'] = 'center';

    $column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
    $column['column_0']['rows']['row_0']['row_description'] = '';
    $column['column_0']['rows']['row_0']['row_label'] = '';
    $column['column_0']['rows']['row_0']['row_tooltip'] = '';
    $column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
    $column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
    $column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
    $column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
    $column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
    $column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';

    $column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
    $column['column_0']['rows']['row_1']['row_description'] = 'I am a Musician in London <br/> hollywood from last 5 years.';
    $column['column_0']['rows']['row_1']['row_label'] = '';
    $column['column_0']['rows']['row_1']['row_tooltip'] = '';
    $column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
    $column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
    $column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
    $column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
    $column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
    $column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
    $column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
    $column['column_0']['rows']['row_2']['row_description'] = '';
    $column['column_0']['rows']['row_2']['row_label'] = '';
    $column['column_0']['rows']['row_2']['row_tooltip'] = '';
    $column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
    $column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
    $column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
    $column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
    $column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
    $column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';

    $column['column_0']['button_size'] = 'Medium';
    $column['column_0']['button_height'] = 'Medium';
    $column['column_0']['button_type'] = 'button';
    $column['column_0']['button_text'] = 'Contact Me';
    $column['column_0']['button_url'] = '#';
    $column['column_0']['button_s_size'] = '';
    $column['column_0']['button_s_type'] = '';
    $column['column_0']['button_s_text'] = '';
    $column['column_0']['button_s_url'] = '';
    $column['column_0']['s_is_new_window'] = '';
    $column['column_0']['is_new_window'] = 0;

    

    $column['column_0']['footer_content'] = '';
    $column['column_0']['footer_content_position'] = 0;
    $column['column_0']['footer_level_options_font_family'] = 'Open Sans Bold';
    $column['column_0']['footer_level_options_font_size'] = 12;
    $column['column_0']['footer_level_options_font_color'] = '#ffffff';
    $column['column_0']['footer_level_options_hover_font_color'] = '#ffffff';
    $column['column_0']['footer_level_options_font_style_bold'] = '';
    $column['column_0']['footer_level_options_font_style_italic'] = '';
    $column['column_0']['footer_level_options_font_style_decoration'] = '';
    $column['column_0']['footer_background_color'] = '';
    $column['column_0']['footer_hover_background_color'] = '';

    $column['column_0']['is_post_variables'] = 0;
    $column['column_0']['post_variables_content'] = 'plan_id=1;';


    $column['column_1']['package_title'] = 'John Doe';
    $column['column_1']['column_description'] = "<a href='#'><i class='fa fa-facebook arpsize-ico-20'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'><i class='fa fa-twitter arpsize-ico-20'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'><i class='fa fa-google-plus arpsize-ico-20'></i></a>";
    $column['column_1']['custom_ribbon_txt'] = '';
    $column['column_1']['column_width'] = '';
    $column['column_1']['column_align'] = 'left';
    $column['column_1']['column_background_color'] = '#000000';
    $column['column_1']['column_hover_background_color'] = "#2fb8ff";
    $column['column_1']['column_background_image'] = PRICINGTABLE_IMAGES_URL . "/arp_25_img_2.png";
    
    $column['column_1']['header_background_color'] = '#2fb8ff';
    $column['column_1']['header_hover_background_color'] = '#272727';
    $column['column_1']['header_font_family'] = 'Roboto';
    $column['column_1']['header_font_size'] = 24;
    $column['column_1']['header_font_color'] = '#ffffff';
    $column['column_1']['header_hover_font_color'] = '#ffffff';
    $column['column_1']['header_style_bold'] = '';
    $column['column_1']['header_style_italic'] = '';
    $column['column_1']['header_style_decoration'] = '';
    

    $column['column_1']['price_background_color'] = '';
    $column['column_1']['price_hover_background_color'] = '';
    $column['column_1']['price_font_family'] = 'Roboto';
    $column['column_1']['price_font_size'] = 40;
    $column['column_1']['price_font_color'] = '#ffffff';
    $column['column_1']['price_hover_font_color'] = '#ffffff';
    $column['column_1']['price_label_style_bold'] = 'bold';
    $column['column_1']['price_label_style_italic'] = '';
    $column['column_1']['price_label_style_decoration'] = '';

    
    $column['column_1']['price_text_font_family'] = 'Roboto';
    $column['column_1']['price_text_font_size'] = 40;
    $column['column_1']['price_text_font_color'] = '#ffffff';
    $column['column_1']['price_text_hover_font_color'] = '#ffffff';
    $column['column_1']['price_text_style_bold'] = 'bold';
    $column['column_1']['price_text_style_italic'] = '';
    $column['column_1']['price_text_style_decoration'] = '';
    

    
    $column['column_1']['column_description_font_family'] = 'Roboto';
    $column['column_1']['column_description_font_size'] = 20;

    $column['column_1']['column_description_font_color'] = '#ffffff';
    $column['column_1']['column_description_hover_font_color'] = '#ffffff';
    $column['column_1']['column_desc_background_color'] = '#2fb8ff';
    $column['column_1']['column_desc_hover_background_color'] = '#000000';
    $column['column_1']['column_description_style_bold'] = '';
    $column['column_1']['column_description_style_italic'] = '';
    $column['column_1']['column_description_style_decoration'] = '';
    

    
    $column['column_1']['content_font_family'] = 'Roboto';
    $column['column_1']['content_font_size'] = 17;
    $column['column_1']['content_font_color'] = '#ffffff';
    $column['column_1']['content_even_font_color'] = '#ffffff';
    $column['column_1']['content_hover_font_color'] = '#ffffff';
    $column['column_1']['content_even_hover_font_color'] = '#ffffff';
    $column['column_1']['content_odd_color'] = '#272727';
    $column['column_1']['content_odd_hover_color'] = '#2fb8ff';
    $column['column_1']['content_even_color'] = '#272727';
    $column['column_1']['content_even_hover_color'] = '#2fb8ff';
    $column['column_1']['body_li_style_bold'] = '';
    $column['column_1']['body_li_style_italic'] = '';
    $column['column_1']['body_li_style_decoration'] = '';
    

    
    $column['column_1']['button_background_color'] = '#2fb8ff';
    $column['column_1']['button_hover_background_color'] = '#272727';
    $column['column_1']['button_font_family'] = 'Roboto';
    $column['column_1']['button_font_size'] = 20;
    $column['column_1']['button_font_color'] = '#ffffff';
    $column['column_1']['button_hover_font_color'] = '#ffffff';
    $column['column_1']['button_style_bold'] = '';
    $column['column_1']['button_style_italic'] = '';
    $column['column_1']['button_style_decoration'] = '';
    

    $column['column_1']['is_caption'] = 0;
    
    $column['column_1']['column_highlight'] = '';
    $column['column_1']['price_text'] = "";
    $column['column_1']['price_label'] = "";
    $column['column_1']['arp_header_shortcode'] = '';
    $column['column_1']['body_text_alignment'] = 'center';

    $column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
    $column['column_1']['rows']['row_0']['row_description'] = '';
    $column['column_1']['rows']['row_0']['row_label'] = '';
    $column['column_1']['rows']['row_0']['row_tooltip'] = '';
    $column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
    $column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
    $column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
    $column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
    $column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
    $column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';

    $column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
    $column['column_1']['rows']['row_1']['row_description'] = 'I am an Artist in London <br/> hollywood from last 8 years.';
    $column['column_1']['rows']['row_1']['row_label'] = '';
    $column['column_1']['rows']['row_1']['row_tooltip'] = '';
    $column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
    $column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
    $column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
    $column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
    $column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
    $column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';

    $column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
    $column['column_1']['rows']['row_2']['row_description'] = '';
    $column['column_1']['rows']['row_2']['row_label'] = '';
    $column['column_1']['rows']['row_2']['row_tooltip'] = '';
    $column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
    $column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
    $column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
    $column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
    $column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
    $column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';


    $column['column_1']['button_size'] = 'Medium';
    $column['column_1']['button_height'] = 'Medium';
    $column['column_1']['button_type'] = 'button';
    $column['column_1']['button_text'] = 'Contact Me';
    $column['column_1']['button_url'] = '#';
    $column['column_1']['button_s_size'] = '';
    $column['column_1']['button_s_type'] = '';
    $column['column_1']['button_s_text'] = '';
    $column['column_1']['button_s_url'] = '';
    $column['column_1']['s_is_new_window'] = '';
    $column['column_1']['is_new_window'] = 0;


    $column['column_1']['footer_content'] = '';
    $column['column_1']['footer_content_position'] = 0;
    $column['column_1']['footer_level_options_font_family'] = 'Open Sans Bold';
    $column['column_1']['footer_level_options_font_size'] = 12;
    $column['column_1']['footer_level_options_font_color'] = '#ffffff';
    $column['column_1']['footer_level_options_hover_font_color'] = '#ffffff';
    $column['column_1']['footer_level_options_font_style_bold'] = '';
    $column['column_1']['footer_level_options_font_style_italic'] = '';
    $column['column_1']['footer_level_options_font_style_decoration'] = '';
    $column['column_1']['footer_background_color'] = '#e3e3e3';
    $column['column_1']['footer_hover_background_color'] = '#e3e3e3';

    $column['column_1']['is_post_variables'] = 0;
    $column['column_1']['post_variables_content'] = 'plan_id=2;';

    $column['column_2']['package_title'] = 'Jesika Ray';
    $column['column_2']['column_description'] = "<a href='#'><i class='fa fa-facebook arpsize-ico-20'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'><i class='fa fa-twitter arpsize-ico-20'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'><i class='fa fa-google-plus arpsize-ico-20'></i></a>";
    $column['column_2']['custom_ribbon_txt'] = '';
    $column['column_2']['column_width'] = '';
    $column['column_2']['column_align'] = 'left';
    $column['column_2']['column_background_color'] = '#000000';
    $column['column_2']['column_hover_background_color'] = "#2fb8ff";
    $column['column_2']['column_background_image'] = PRICINGTABLE_IMAGES_URL . "/arp_25_img_3.png";
    
    $column['column_2']['header_background_color'] = '#2fb8ff';
    $column['column_2']['header_hover_background_color'] = '#272727';
    $column['column_2']['header_font_family'] = 'Roboto';
    $column['column_2']['header_font_size'] = 24;
    $column['column_2']['header_font_color'] = '#ffffff';
    $column['column_2']['header_hover_font_color'] = '#ffffff';
    $column['column_2']['header_style_bold'] = '';
    $column['column_2']['header_style_italic'] = '';
    $column['column_2']['header_style_decoration'] = '';
    

    $column['column_2']['price_background_color'] = '';
    $column['column_2']['price_hover_background_color'] = '';
    $column['column_2']['price_font_family'] = 'Roboto';
    $column['column_2']['price_font_size'] = 40;
    $column['column_2']['price_font_color'] = '#ffffff';
    $column['column_2']['price_hover_font_color'] = '#ffffff';
    $column['column_2']['price_label_style_bold'] = 'bold';
    $column['column_2']['price_label_style_italic'] = '';
    $column['column_2']['price_label_style_decoration'] = '';

    
    $column['column_2']['price_text_font_family'] = 'Roboto';
    $column['column_2']['price_text_font_size'] = 40;
    $column['column_2']['price_text_font_color'] = '#ffffff';
    $column['column_2']['price_text_hover_font_color'] = '#ffffff';
    $column['column_2']['price_text_style_bold'] = 'bold';
    $column['column_2']['price_text_style_italic'] = '';
    $column['column_2']['price_text_style_decoration'] = '';
    

    
    $column['column_2']['column_description_font_family'] = 'Roboto';
    $column['column_2']['column_description_font_size'] = 20;
    $column['column_2']['column_description_font_color'] = '#ffffff';
    $column['column_2']['column_description_hover_font_color'] = '#ffffff';
    $column['column_2']['column_desc_background_color'] = '#2fb8ff';
    $column['column_2']['column_desc_hover_background_color'] = '#000000';
    $column['column_2']['column_description_style_bold'] = '';
    $column['column_2']['column_description_style_italic'] = '';
    $column['column_2']['column_description_style_decoration'] = '';
    

    
    $column['column_2']['content_font_family'] = 'Roboto';
    $column['column_2']['content_font_size'] = 17;
    $column['column_2']['content_font_color'] = '#ffffff';
    $column['column_2']['content_even_font_color'] = '#ffffff';
    $column['column_2']['content_hover_font_color'] = '#ffffff';
    $column['column_2']['content_even_hover_font_color'] = '#ffffff';
    $column['column_2']['content_odd_color'] = '#272727';
    $column['column_2']['content_odd_hover_color'] = '#2fb8ff';
    $column['column_2']['content_even_color'] = '#272727';
    $column['column_2']['content_even_hover_color'] = '#2fb8ff';
    $column['column_2']['body_li_style_bold'] = '';
    $column['column_2']['body_li_style_italic'] = '';
    $column['column_2']['body_li_style_decoration'] = '';
    

    
    $column['column_2']['button_background_color'] = '#2FB8FF';
    $column['column_2']['button_hover_background_color'] = '#272727';
    $column['column_2']['button_font_family'] = 'Roboto';
    $column['column_2']['button_font_size'] = 20;
    $column['column_2']['button_font_color'] = '#ffffff';
    $column['column_2']['button_hover_font_color'] = '#ffffff';
    $column['column_2']['button_style_bold'] = '';
    $column['column_2']['button_style_italic'] = '';
    $column['column_2']['button_style_decoration'] = '';
    

    $column['column_2']['is_caption'] = 0;
    
    $column['column_2']['column_highlight'] = '';
    $column['column_2']['price_text'] = "";
    $column['column_2']['price_label'] = '';
    $column['column_2']['arp_header_shortcode'] = '';
    $column['column_2']['body_text_alignment'] = 'center';

    $column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
    $column['column_2']['rows']['row_0']['row_description'] = '';
    $column['column_2']['rows']['row_0']['row_label'] = '';
    $column['column_2']['rows']['row_0']['row_tooltip'] = '';
    $column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
    $column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
    $column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
    $column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
    $column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
    $column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';

    $column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
    $column['column_2']['rows']['row_1']['row_description'] = 'I am a Lyricist in London <br/> from last 10 years.';
    $column['column_2']['rows']['row_1']['row_label'] = '';
    $column['column_2']['rows']['row_1']['row_tooltip'] = '';
    $column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
    $column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
    $column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
    $column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
    $column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
    $column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';

    $column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
    $column['column_2']['rows']['row_2']['row_description'] = '';
    $column['column_2']['rows']['row_2']['row_label'] = '';
    $column['column_2']['rows']['row_2']['row_tooltip'] = '';
    $column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
    $column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
    $column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
    $column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
    $column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
    $column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';

    $column['column_2']['button_size'] = 'Medium';
    $column['column_2']['button_height'] = 'Medium';
    $column['column_2']['button_type'] = 'button';
    $column['column_2']['button_text'] = 'Contact Me';
    $column['column_2']['button_url'] = '#';
    $column['column_2']['button_s_size'] = '';
    $column['column_2']['button_s_type'] = '';
    $column['column_2']['button_s_text'] = '';
    $column['column_2']['button_s_url'] = '';
    $column['column_2']['is_new_window'] = 0;
    $column['column_2']['s_is_new_window'] = '';

    

    $column['column_2']['footer_content'] = '';
    $column['column_2']['footer_content_position'] = 0;
    $column['column_2']['footer_level_options_font_family'] = 'Open Sans Bold';
    $column['column_2']['footer_level_options_font_size'] = 12;
    $column['column_2']['footer_level_options_font_color'] = '#ffffff';
    $column['column_2']['footer_level_options_hover_font_color'] = '#ffffff';
    $column['column_2']['footer_level_options_font_style_bold'] = '';
    $column['column_2']['footer_level_options_font_style_italic'] = '';
    $column['column_2']['footer_level_options_font_style_decoration'] = '';
    $column['column_2']['footer_background_color'] = '#e3e3e3';
    $column['column_2']['footer_hover_background_color'] = '#e3e3e3';
    $column['column_2']['is_post_variables'] = 0;
    $column['column_2']['post_variables_content'] = 'plan_id=3;';

    $pt_columns = array('columns' => $column);

    $opts = maybe_serialize($pt_columns);

    $arprice_form->option_create($table_id, $opts);

    unset($values);


    /**
     * ARPrice Template 23
     *
     * @since 2.0
     */
    $values = array();

    $values['name'] = 'ARPrice Template 23';
    $values['is_template'] = 1;
    $values['status'] = 'published';
    $values['template_name'] = 23;
    $values['is_animated'] = 0;

    $arp_pt_gen_options = array();
    $arp_pt_template_settings = array();
    $arp_pt_font_settings = array();
    $arp_pt_general_settings = array();
    $arp_header_font_settings = array();
    $arp_price_font_settings = array();
    $arp_content_font_settings = array();
    $arp_button_font_settings = array();
    $arp_pt_column_settings = array();
    $arp_pt_column_animation = array();
    $arp_pt_tooltip_settings = array();
    $arp_pt_button_settings = array();

    $arp_pt_template_settings['template'] = 'arptemplate_26';
    $arp_pt_template_settings['skin'] = 'blue';
    $arp_pt_template_settings['template_type'] = 'normal';
    $arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'rounded_border', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0);

    $arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2"]';
    $arp_pt_general_settings['reference_template'] = 'arptemplate_26';
    $arp_pt_general_settings['user_edited_columns'] = '';
    
    $arp_pt_general_settings['enable_toggle_price'] = '0';
    $arp_pt_general_settings['toggle_copy_data_to_other_step'] = '0';
    $arp_pt_general_settings['arp_step_main'] = '2';
    $arp_pt_general_settings['togglestep_yearly'] = 'Yearly';
    $arp_pt_general_settings['togglestep_monthly'] = 'Monthly';
    $arp_pt_general_settings['togglestep_quarterly'] = 'Quarterly';
    $arp_pt_general_settings['setas_default_toggle'] = '0';
    $arp_pt_general_settings['arp_toggle_main'] = '0';
    $arp_pt_general_settings['toggle_active_color'] = '#404040';
    $arp_pt_general_settings['toggle_inactive_color'] = '#ffffff';
    $arp_pt_general_settings['toggle_active_text_color'] = '#ffffff';
    $arp_pt_general_settings['toggle_button_font_color'] = '#000000';
    $arp_pt_general_settings['toggle_title_font_color'] = '#000000';
    $arp_pt_general_settings['toggle_label_content'] = 'Please Select Your Plan';
    $arp_pt_general_settings['arp_label_position_main'] = '1';
    $arp_pt_general_settings['toggle_main_color'] = '#E8E9EB';
    $arp_pt_general_settings['toggle_title_font_family'] = 'Ubuntu';
    $arp_pt_general_settings['toggle_title_font_size'] = 16;
    $arp_pt_general_settings['toggle_title_font_style_bold'] = '';
    $arp_pt_general_settings['toggle_title_font_style_italic'] = '';
    $arp_pt_general_settings['toggle_title_font_style_decoration'] = '';
    $arp_pt_general_settings['toggle_button_font_family'] = 'Ubuntu';
    $arp_pt_general_settings['toggle_button_font_size'] = 16;
    $arp_pt_general_settings['toggle_button_font_style_bold'] = '';
    $arp_pt_general_settings['toggle_button_font_style_italic'] = '';
    $arp_pt_general_settings['toggle_button_font_style_decoration'] = '';
    

    $arp_pt_button_settings['button_shadow_color'] = '#ffffff';
    $arp_pt_button_settings['button_radius'] = 0;

    
    $arp_pt_column_settings['column_space'] = 10;
    $arp_pt_column_settings['column_highlight_on_hover'] = 'no_effect';
    $arp_pt_column_settings['is_responsive'] = 1;
    $arp_pt_column_settings['full_column_clickable'] = 0;
    $arp_pt_column_settings['disable_hover_effect'] = 0;
    $arp_pt_column_settings['hide_footer_global'] = 0;
    $arp_pt_column_settings['hide_header_global'] = 0;
    $arp_pt_column_settings['hide_price_global'] = 0;
    $arp_pt_column_settings['hide_feature_global'] = 0;
    $arp_pt_column_settings['hide_description_global'] = 0;
    $arp_pt_column_settings['hide_header_shortcode_global'] = 0;
    $arp_pt_column_settings['all_column_width'] = 280;
    
    
    $arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
    $arp_pt_column_settings['column_border_radius_top_left'] = 15;
    $arp_pt_column_settings['column_border_radius_top_right'] = 15;
    $arp_pt_column_settings['column_border_radius_bottom_right'] = 15;
    $arp_pt_column_settings['column_border_radius_bottom_left'] = 15;
    $arp_pt_column_settings['column_wrapper_width_txtbox'] = 870;

    $arp_pt_column_settings['global_button_border_width'] = 0;
    $arp_pt_column_settings['global_button_border_type'] = 'solid';
    $arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
    $arp_pt_column_settings['global_button_border_radius_top_left'] = 0;
    $arp_pt_column_settings['global_button_border_radius_top_right'] = 0;
    $arp_pt_column_settings['global_button_border_radius_bottom_left'] = 0;
    $arp_pt_column_settings['global_button_border_radius_bottom_right'] = 0;
    $arp_pt_column_settings['arp_global_button_type'] = 'none';
    $arp_pt_column_settings['disable_button_hover_effect'] = 0;

    $arp_pt_column_settings['arp_row_border_size'] = '0';
    $arp_pt_column_settings['arp_row_border_type'] = 'solid';
    $arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';

    $arp_pt_column_settings['arp_column_border_size'] = '0';
    $arp_pt_column_settings['arp_column_border_type'] = 'solid';
    $arp_pt_column_settings['arp_column_border_color'] = '#e3e3e3';

    $arp_pt_column_settings['arp_column_border_left'] = 1;
    $arp_pt_column_settings['arp_column_border_right'] = 1;
    $arp_pt_column_settings['arp_column_border_top'] = 1;
    $arp_pt_column_settings['arp_column_border_bottom'] = 1;

    $arp_pt_column_settings['display_col_mobile'] = 1;
    $arp_pt_column_settings['display_col_tablet'] = 3;
    
    

    $arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
    $arp_pt_column_settings['hide_blank_rows'] = 'no';
    $arp_pt_column_settings['header_font_family_global'] = 'Open Sans';
    $arp_pt_column_settings['header_font_size_global'] = 30;
    $arp_pt_column_settings['arp_header_text_alignment'] = 'center';
    $arp_pt_column_settings['arp_header_text_bold_global'] = '';
    $arp_pt_column_settings['arp_header_text_italic_global'] = '';
    $arp_pt_column_settings['arp_header_text_decoration_global'] = '';
    $arp_pt_column_settings['price_font_family_global'] = '';
    $arp_pt_column_settings['price_font_size_global'] = '';
    $arp_pt_column_settings['arp_price_text_alignment'] = '';
    $arp_pt_column_settings['arp_price_text_bold_global'] = '';
    $arp_pt_column_settings['arp_price_text_italic_global'] = '';
    $arp_pt_column_settings['arp_price_text_decoration_global'] = '';
    $arp_pt_column_settings['body_font_family_global'] = 'Open Sans';
    $arp_pt_column_settings['body_font_size_global'] = 18;
    $arp_pt_column_settings['arp_body_text_alignment'] = 'center';
    $arp_pt_column_settings['arp_body_text_bold_global'] = '';
    $arp_pt_column_settings['arp_body_text_italic_global'] = '';
    $arp_pt_column_settings['arp_body_text_decoration_global'] = '';
    $arp_pt_column_settings['footer_font_family_global'] = '';
    $arp_pt_column_settings['footer_font_size_global'] = '';
    $arp_pt_column_settings['arp_footer_text_alignment'] = '';
    $arp_pt_column_settings['arp_footer_text_bold_global'] = '';
    $arp_pt_column_settings['arp_footer_text_italic_global'] = '';
    $arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
    $arp_pt_column_settings['button_font_family_global'] = 'Roboto';
    $arp_pt_column_settings['button_font_size_global'] = 20;
    $arp_pt_column_settings['arp_button_text_alignment'] = 'center';
    $arp_pt_column_settings['arp_button_text_bold_global'] = '';
    $arp_pt_column_settings['arp_button_text_italic_global'] = '';
    $arp_pt_column_settings['arp_button_text_decoration_global'] = '';
    $arp_pt_column_settings['description_font_family_global'] = '';
    $arp_pt_column_settings['description_font_size_global'] = '';
    $arp_pt_column_settings['arp_description_text_alignment'] = '';
    $arp_pt_column_settings['arp_description_text_bold_global'] = '';
    $arp_pt_column_settings['arp_description_text_italic_global'] = '';
    $arp_pt_column_settings['arp_description_text_decoration_global'] = '';
    $arp_pt_column_animation['is_animation'] = 'no';
    $arp_pt_column_animation['visible_column'] = 2;
    $arp_pt_column_animation['scrolling_columns'] = 2;
    $arp_pt_column_animation['navigation'] = 1;
    $arp_pt_column_animation['autoplay'] = 1;
    $arp_pt_column_animation['sliding_effect'] = 'slide';
    $arp_pt_column_animation['transition_speed'] = 750;
    $arp_pt_column_animation['navigation_style'] = $arp_mainoptionsarr['general_options']['column_animation']['navigation_style'][1];
    $arp_pt_column_animation['pagination'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination'];
    $arp_pt_column_animation['pagination_style'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_style'][1];
    $arp_pt_column_animation['pagination_position'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_position'][0];
    $arp_pt_column_animation['easing_effect'] = $arp_mainoptionsarr['general_options']['column_animation']['easing_effect'][0];
    $arp_pt_column_animation['infinite'] = 0;
    $arp_pt_column_animation['navi_nav_btn'] = 'navigation';
    $arp_pt_column_animation['pagi_nav_btn'] = 'pagination_bottom';
    $arp_pt_column_animation['sticky_caption'] = 0;

    $arp_pt_tooltip_settings['background_color'] = '#2579eb';
    $arp_pt_tooltip_settings['text_color'] = '#FFFFFF';
    $arp_pt_tooltip_settings['animation'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['animation'][0];
    $arp_pt_tooltip_settings['position'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['position'][0];
    $arp_pt_tooltip_settings['style'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['style'][0];
    $arp_pt_tooltip_settings['tooltip_width'] = '';
    $arp_pt_tooltip_settings['tooltip_font_family'] = 'Open Sans Bold';
    $arp_pt_tooltip_settings['tooltip_font_size'] = 18;
    $arp_pt_tooltip_settings['tooltip_font_style'] = 'normal';
    $arp_pt_tooltip_settings['tooltip_trigger_type'] = 'hover';
    $arp_pt_tooltip_settings['tooltip_display_style'] = 'default';
    $arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fa fa-info-circle arpsize-ico-14"></i>';
    $arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
    $arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
    $arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
    $arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
    $arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

    $arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

    $arp_pt_custom_skin_array = array();

    $arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#2EB7FD";
    $arp_pt_custom_skin_array['arp_column_bg_custom_color'] = "#2B2E37";
    $arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
    $arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#2FB8FF";
    $arp_pt_custom_skin_array['arp_column_bg_hover_color'] = "#2B2E37";
    $arp_pt_custom_skin_array['arp_button_bg_hover_color'] = "#08090B";
    $arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
    $arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
    $arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
    $arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_price_font_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = null;
    $arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = null;
    $arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
    $arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
    $arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#2B2E37';
    $arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#2B2E37';
    $arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
    $arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
    $arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';
    $arp_pt_custom_skin_array['arp_shortocode_background'] = '#2fb8ff';
    $arp_pt_custom_skin_array['arp_shortocode_font_color'] = '#2fb8ff';
    $arp_pt_custom_skin_array['arp_shortcode_bg_hover_color'] = '#2fb8ff';
    $arp_pt_custom_skin_array['arp_shortcode_font_hover_color'] = '#2fb8ff';

    $arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

    $values['options'] = maybe_serialize($arp_pt_gen_options);

    $table_id = $arprice_form->create($values);
    $updatestat = $wpdb->query($wpdb->prepare("update " . $wpdb->prefix . "arp_arprice set id = %d where ID = %d", 23, $table_id));
    $table_id = '23';

    $pt_columns = array();
    $column = array();

    $column['column_0']['shortcode_background_color'] = '#2fb8ff';
    $column['column_0']['shortcode_font_color'] = '#ffffff';
    $column['column_0']['shortcode_hover_background_color'] = '#2fb8ff';
    $column['column_0']['shortcode_hover_font_color'] = '#2fb8ff';
    $column['column_0']['arp_shortcode_customization_style'] = 'rounded';
    $column['column_0']['arp_shortcode_customization_size'] = 'large';
    $column['column_0']['package_title'] = 'John Smith <span style="text-transform:uppercase;font-size:18px;display:block;">London</span>';
    $column['column_0']['column_description'] = '';
    $column['column_0']['custom_ribbon_txt'] = '';
    $column['column_0']['column_width'] = '';
    $column['column_0']['is_caption'] = 0;
    $column['column_0']['column_highlight'] = '';
    $column['column_0']['column_background_color'] = "#2B2E37";
    $column['column_0']['column_hover_background_color'] = "#2B2E37";

    
    $column['column_0']['header_background_color'] = '#2FB8FF';
    $column['column_0']['header_hover_background_color'] = '#08090B';
    $column['column_0']['header_font_family'] = 'Open Sans';
    $column['column_0']['header_font_size'] = 30;
    $column['column_0']['header_font_color'] = "#ffffff";
    $column['column_0']['header_hover_font_color'] = "#ffffff";
    $column['column_0']['header_style_bold'] = '';
    $column['column_0']['header_style_italic'] = '';
    $column['column_0']['header_style_decoration'] = '';
    

    $column['column_0']['price_font_family'] = "Lato";
    $column['column_0']['price_font_size'] = 40;
    $column['column_0']['price_font_color'] = "#ffffff";
    $column['column_0']['price_hover_font_color'] = "#000000";
    $column['column_0']['price_label_style_bold'] = 'bold';
    $column['column_0']['price_label_style_italic'] = '';
    $column['column_0']['price_label_style_decoration'] = '';

    $column['column_0']['price_text_font_family'] = 'Lato';
    $column['column_0']['price_text_font_size'] = 18;
    $column['column_0']['price_text_font_color'] = "#ffffff";
    $column['column_0']['price_text_hover_font_color'] = "#000000";
    $column['column_0']['price_text_style_bold'] = 'bold';
    $column['column_0']['price_text_style_italic'] = '';
    $column['column_0']['price_text_style_decoration'] = '';

    
    $column['column_0']['column_description_font_family'] = 'Arial';
    $column['column_0']['column_description_font_size'] = 13;
    $column['column_0']['column_description_font_color'] = '#7c7c7c';
    $column['column_0']['column_description_hover_font_color'] = '#7c7c7c';
    $column['column_0']['column_description_style_bold'] = '';
    $column['column_0']['column_description_style_italic'] = '';
    $column['column_0']['column_description_style_decoration'] = '';
    

    
    $column['column_0']['content_font_family'] = "Open Sans";
    $column['column_0']['content_font_size'] = 18;
    $column['column_0']['content_font_color'] = "#ffffff";
    $column['column_0']['content_even_font_color'] = "#ffffff";
    $column['column_0']['content_hover_font_color'] = "#2FB8FF";
    $column['column_0']['content_even_hover_font_color'] = "#2FB8FF";
    $column['column_0']['body_li_style_bold'] = '';
    $column['column_0']['body_li_style_italic'] = '';
    $column['column_0']['body_li_style_decoration'] = '';
    

    
    $column['column_0']['content_label_font_family'] = 'Arial';
    $column['column_0']['content_label_font_size'] = 15;
    $column['column_0']['content_label_font_color'] = '#2a2e31';
    $column['column_0']['content_label_hover_font_color'] = '#2a2e31';
    $column['column_0']['body_label_style_bold'] = 'bold';
    $column['column_0']['body_label_style_italic'] = '';
    $column['column_0']['body_label_style_decoration'] = '';
    

    
    $column['column_0']['button_background_color'] = '#2fb8ff';
    $column['column_0']['button_hover_background_color'] = '#272727';
    $column['column_0']['button_font_family'] = "Roboto";
    $column['column_0']['button_font_size'] = 20;
    $column['column_0']['button_font_color'] = "#ffffff";
    $column['column_0']['button_hover_font_color'] = "#ffffff";
    
    $column['column_0']['button_style_bold'] = '';
    $column['column_0']['button_style_italic'] = '';
    $column['column_0']['button_style_decoration'] = '';
    

    $column['column_0']['price_text'] = "";
    $column['column_0']['price_label'] = "";
    $column['column_0']['arp_header_shortcode'] = "<div style='background:url(" . PRICINGTABLE_IMAGES_URL . "/arp_26_img_1.png) no-repeat 0 0;background-size:cover;width:100%;height:100%;'></div>";
    $column['column_0']['body_text_alignment'] = 'center';
    $column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
    $column['column_0']['rows']['row_0']['row_description'] = 'I am a Model in London <br/> from 5 Years';
    $column['column_0']['rows']['row_0']['row_label'] = '';
    $column['column_0']['rows']['row_0']['row_tooltip'] = '';
    $column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
    $column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
    $column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
    $column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
    $column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
    $column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
    $column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
    $column['column_0']['rows']['row_1']['row_description'] = '<br/>';
    $column['column_0']['rows']['row_1']['row_label'] = '';
    $column['column_0']['rows']['row_1']['row_tooltip'] = '';
    $column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
    $column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
    $column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
    $column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
    $column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
    $column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
    $column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
    $column['column_0']['rows']['row_2']['row_description'] = 'Follow me on <br/> Instagram & Twitter';
    $column['column_0']['rows']['row_2']['row_label'] = '';
    $column['column_0']['rows']['row_2']['row_tooltip'] = '';
    $column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
    $column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
    $column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
    $column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
    $column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
    $column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
    $column['column_0']['button_size'] = 'Medium';
    $column['column_0']['button_height'] = 'Medium';
    $column['column_0']['button_type'] = 'Button';
    $column['column_0']['button_text'] = 'Contact Me';
    $column['column_0']['button_url'] = '#';
    $column['column_0']['button_s_size'] = '';
    $column['column_0']['button_s_type'] = '';
    $column['column_0']['button_s_text'] = '';
    $column['column_0']['button_s_url'] = '';
    $column['column_0']['s_is_new_window'] = '';
    $column['column_0']['is_new_window'] = 0;

    

    $column['column_0']['footer_content'] = '';
    $column['column_0']['footer_content_position'] = 0;
    $column['column_0']['footer_level_options_font_family'] = 'Open Sans Bold';
    $column['column_0']['footer_level_options_font_size'] = 12;
    $column['column_0']['footer_level_options_font_color'] = '#ffffff';
    $column['column_0']['footer_level_options_hover_font_color'] = '#000000';
    $column['column_0']['footer_level_options_font_style_bold'] = '';
    $column['column_0']['footer_level_options_font_style_italic'] = '';
    $column['column_0']['footer_level_options_font_style_decoration'] = '';

    $column['column_0']['is_post_variables'] = 0;
    $column['column_0']['post_variables_content'] = 'plan_id=0;';


    $column['column_1']['shortcode_background_color'] = '#2fb8ff';
    $column['column_1']['shortcode_font_color'] = '#ffffff';
    $column['column_1']['shortcode_hover_background_color'] = '#2fb8ff';
    $column['column_1']['shortcode_hover_font_color'] = '#2fb8ff';
    $column['column_1']['arp_shortcode_customization_style'] = 'rounded';
    $column['column_1']['arp_shortcode_customization_size'] = 'large';
    $column['column_1']['package_title'] = 'Jaceb Haden  <span style="text-transform:uppercase;font-size:18px;display:block;">London</span>';
    $column['column_1']['column_description'] = '';
    $column['column_1']['custom_ribbon_txt'] = '';
    $column['column_1']['column_width'] = '';
    $column['column_1']['is_caption'] = 0;
    $column['column_1']['column_highlight'] = 1;
    $column['column_1']['column_background_color'] = "#2B2E37";
    $column['column_1']['column_hover_background_color'] = "#2B2E37";

    
    $column['column_1']['header_font_family'] = 'Open Sans';
    $column['column_1']['header_font_size'] = 30;
    $column['column_1']['header_font_color'] = "#ffffff";
    $column['column_1']['header_hover_font_color'] = "#ffffff";
    $column['column_1']['header_style_bold'] = '';
    $column['column_1']['header_style_italic'] = '';
    $column['column_1']['header_style_decoration'] = '';
    $column['column_1']['header_background_color'] = '#2FB8FF';
    $column['column_1']['header_hover_background_color'] = '#08090B';
    

    $column['column_1']['price_font_family'] = "Lato";
    $column['column_1']['price_font_size'] = 40;
    $column['column_1']['price_font_color'] = "#ffffff";
    $column['column_1']['price_hover_font_color'] = "#000000";
    $column['column_1']['price_label_style_bold'] = 'bold';
    $column['column_1']['price_label_style_italic'] = '';
    $column['column_1']['price_label_style_decoration'] = '';

    $column['column_1']['price_text_font_family'] = 'Lato';
    $column['column_1']['price_text_font_size'] = 18;
    $column['column_1']['price_text_font_color'] = "#ffffff";
    $column['column_1']['price_text_hover_font_color'] = "#000000";
    $column['column_1']['price_text_style_bold'] = 'bold';
    $column['column_1']['price_text_style_italic'] = '';
    $column['column_1']['price_text_style_decoration'] = '';

    
    $column['column_1']['column_description_font_family'] = 'Arial';
    $column['column_1']['column_description_font_size'] = 13;
    $column['column_1']['column_description_font_color'] = '#7c7c7c';
    $column['column_1']['column_description_hover_font_color'] = '#7c7c7c';
    $column['column_1']['column_description_style_bold'] = '';
    $column['column_1']['column_description_style_italic'] = '';
    $column['column_1']['column_description_style_decoration'] = '';
    

    
    $column['column_1']['content_font_family'] = "Open Sans";
    $column['column_1']['content_font_size'] = 18;
    $column['column_1']['content_font_color'] = "#ffffff";
    $column['column_1']['content_even_font_color'] = "#ffffff";
    $column['column_1']['content_hover_font_color'] = "#2fb8ff";
    $column['column_1']['content_even_hover_font_color'] = "#2fb8ff";
    $column['column_1']['body_li_style_bold'] = '';
    $column['column_1']['body_li_style_italic'] = '';
    $column['column_1']['body_li_style_decoration'] = '';
    

    
    $column['column_1']['content_label_font_family'] = 'Arial';
    $column['column_1']['content_label_font_size'] = 15;
    $column['column_1']['content_label_font_color'] = '#2a2e31';
    $column['column_1']['content_label_hover_font_color'] = '#2a2e31';
    $column['column_1']['body_label_style_bold'] = 'bold';
    $column['column_1']['body_label_style_italic'] = '';
    $column['column_1']['body_label_style_decoration'] = '';
    

    
    $column['column_1']['button_background_color'] = '#2fb8ff';
    $column['column_1']['button_hover_background_color'] = '#272727';
    $column['column_1']['button_font_family'] = "Roboto";
    $column['column_1']['button_font_size'] = 20;
    $column['column_1']['button_font_color'] = "#ffffff";
    $column['column_1']['button_hover_font_color'] = "#ffffff";
    $column['column_1']['button_style_bold'] = '';
    $column['column_1']['button_style_italic'] = '';
    $column['column_1']['button_style_decoration'] = '';
    

    $column['column_1']['price_text'] = "";
    $column['column_1']['price_label'] = "";
    $column['column_1']['arp_header_shortcode'] = "<div style='background:url(" . PRICINGTABLE_IMAGES_URL . "/arp_26_img_2.png) no-repeat 0 0;background-size:cover;width:100%;height:100%;'></div>";
    $column['column_1']['body_text_alignment'] = 'center';
    $column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
    $column['column_1']['rows']['row_0']['row_description'] = 'I am a Designer in London <br/> from 9 Years';
    $column['column_1']['rows']['row_0']['row_label'] = '';
    $column['column_1']['rows']['row_0']['row_tooltip'] = '';
    $column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
    $column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
    $column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
    $column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
    $column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
    $column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
    $column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
    $column['column_1']['rows']['row_1']['row_description'] = '<br/>';
    $column['column_1']['rows']['row_1']['row_label'] = '';
    $column['column_1']['rows']['row_1']['row_tooltip'] = '';
    $column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
    $column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
    $column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
    $column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
    $column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
    $column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
    $column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
    $column['column_1']['rows']['row_2']['row_description'] = 'Follow me on <br/> Instagram & Twitter';
    $column['column_1']['rows']['row_2']['row_label'] = '';
    $column['column_1']['rows']['row_2']['row_tooltip'] = '';
    $column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
    $column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
    $column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
    $column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
    $column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
    $column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
    $column['column_1']['button_size'] = 'Medium';
    $column['column_1']['button_height'] = 'Medium';
    $column['column_1']['button_type'] = 'Button';
    $column['column_1']['button_text'] = 'Contact Me';
    $column['column_1']['button_url'] = '#';
    $column['column_1']['is_new_window'] = 0;

    

    $column['column_1']['footer_content'] = '';
    $column['column_1']['footer_content_position'] = 0;
    $column['column_1']['footer_level_options_font_family'] = 'Open Sans Bold';
    $column['column_1']['footer_level_options_font_size'] = 12;
    $column['column_1']['footer_level_options_font_color'] = '#ffffff';
    $column['column_1']['footer_level_options_hover_font_color'] = '#000000';
    $column['column_1']['footer_level_options_font_style_bold'] = '';
    $column['column_1']['footer_level_options_font_style_italic'] = '';
    $column['column_1']['footer_level_options_font_style_decoration'] = '';
    $column['column_1']['is_post_variables'] = 0;
    $column['column_1']['post_variables_content'] = 'plan_id=1;';

    $column['column_2']['shortcode_background_color'] = '#2fb8ff';
    $column['column_2']['shortcode_font_color'] = '#ffffff';
    $column['column_2']['shortcode_hover_background_color'] = '#2fb8ff';
    $column['column_2']['shortcode_hover_font_color'] = '#2fb8ff';
    $column['column_2']['arp_shortcode_customization_style'] = 'rounded';
    $column['column_2']['arp_shortcode_customization_size'] = 'large';
    $column['column_2']['package_title'] = 'Jason Carter <span style="text-transform:uppercase;font-size:18px;display:block;">London</span>';
    $column['column_2']['column_description'] = '';
    $column['column_2']['custom_ribbon_txt'] = '';
    $column['column_2']['column_width'] = '';
    $column['column_2']['is_caption'] = 0;
    $column['column_2']['column_highlight'] = '';
    $column['column_2']['column_background_color'] = "#2B2E37";
    $column['column_2']['column_hover_background_color'] = "#2B2E37";

    
    $column['column_2']['header_font_family'] = 'Open Sans';
    $column['column_2']['header_font_size'] = 30;
    $column['column_2']['header_font_color'] = "#ffffff";
    $column['column_2']['header_hover_font_color'] = "#ffffff";
    $column['column_2']['header_style_bold'] = '';
    $column['column_2']['header_style_italic'] = '';
    $column['column_2']['header_style_decoration'] = '';
    $column['column_2']['header_background_color'] = '#2FB8FF';
    $column['column_2']['header_hover_background_color'] = '#08090B';
    


    $column['column_2']['price_font_family'] = "Lato";
    $column['column_2']['price_font_size'] = 40;
    $column['column_2']['price_font_color'] = "#ffffff";
    $column['column_2']['price_hover_font_color'] = "#000000";
    $column['column_2']['price_label_style_bold'] = 'bold';
    $column['column_2']['price_label_style_italic'] = '';
    $column['column_2']['price_label_style_decoration'] = '';

    $column['column_2']['price_text_font_family'] = 'Lato';
    $column['column_2']['price_text_font_size'] = 18;
    $column['column_2']['price_text_font_color'] = "#ffffff";
    $column['column_2']['price_text_hover_font_color'] = "#000000";
    $column['column_2']['price_text_style_bold'] = 'bold';
    $column['column_2']['price_text_style_italic'] = '';
    $column['column_2']['price_text_style_decoration'] = '';


    
    $column['column_2']['column_description_font_family'] = 'Arial';
    $column['column_2']['column_description_font_size'] = 18;
    $column['column_2']['column_description_font_color'] = '#7c7c7c';
    $column['column_2']['column_description_hover_font_color'] = '#7c7c7c';
    $column['column_2']['column_description_style_bold'] = '';
    $column['column_2']['column_description_style_italic'] = '';
    $column['column_2']['column_description_style_decoration'] = '';
    

    
    $column['column_2']['content_font_family'] = "Open Sans";
    $column['column_2']['content_font_size'] = 18;
    $column['column_2']['content_font_color'] = "#ffffff";
    $column['column_2']['content_even_font_color'] = "#ffffff";
    $column['column_2']['content_hover_font_color'] = "#2fb8ff";
    $column['column_2']['content_even_hover_font_color'] = "#2fb8ff";
    
    $column['column_2']['body_li_style_bold'] = '';
    $column['column_2']['body_li_style_italic'] = '';
    $column['column_2']['body_li_style_decoration'] = '';
    

    
    $column['column_2']['content_label_font_family'] = 'Arial';
    $column['column_2']['content_label_font_size'] = 15;
    
    $column['column_2']['content_label_font_color'] = '#2a2e31';
    $column['column_2']['content_label_hover_font_color'] = '#2a2e31';
    $column['column_2']['body_label_style_bold'] = 'bold';
    $column['column_2']['body_label_style_italic'] = '';
    $column['column_2']['body_label_style_decoration'] = '';
    

    
    $column['column_2']['button_background_color'] = '#2fb8ff';
    $column['column_2']['button_hover_background_color'] = '#272727';
    $column['column_2']['button_font_family'] = "Roboto";
    $column['column_2']['button_font_size'] = 22;
    $column['column_2']['button_font_color'] = "#ffffff";
    $column['column_2']['button_hover_font_color'] = "#ffffff";
    $column['column_2']['button_style_bold'] = '';
    $column['column_2']['button_style_italic'] = '';
    $column['column_2']['button_style_decoration'] = '';
    

    $column['column_2']['price_text'] = "";
    $column['column_2']['price_label'] = "";
    $column['column_2']['arp_header_shortcode'] = "<div style='background:url(" . PRICINGTABLE_IMAGES_URL . "/arp_26_img_3.png) no-repeat 0 0;background-size:cover;width:100%;height:100%;'></div>";
    $column['column_2']['body_text_alignment'] = 'center';
    $column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
    $column['column_2']['rows']['row_0']['row_description'] = 'I am a makup artist in London <br/> from 15 Years';
    $column['column_2']['rows']['row_0']['row_label'] = '';
    $column['column_2']['rows']['row_0']['row_tooltip'] = '';
    $column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
    $column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
    $column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
    $column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
    $column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
    $column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
    $column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
    $column['column_2']['rows']['row_1']['row_description'] = '<br/>';
    $column['column_2']['rows']['row_1']['row_label'] = '';
    $column['column_2']['rows']['row_1']['row_tooltip'] = '';
    $column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
    $column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
    $column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
    $column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
    $column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
    $column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
    $column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
    $column['column_2']['rows']['row_2']['row_description'] = 'Follow me on <br/> Instagram & Twitter';
    $column['column_2']['rows']['row_2']['row_label'] = '';
    $column['column_2']['rows']['row_2']['row_tooltip'] = '';
    $column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
    $column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
    $column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
    $column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
    $column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
    $column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
    $column['column_2']['button_size'] = 'Medium';
    $column['column_2']['button_height'] = 'Medium';
    $column['column_2']['button_type'] = 'Button';
    $column['column_2']['button_text'] = 'Contact Me';
    $column['column_2']['button_url'] = '#';
    $column['column_2']['button_s_size'] = '';
    $column['column_2']['button_s_type'] = '';
    $column['column_2']['button_s_text'] = '';
    $column['column_2']['button_s_url'] = '';
    $column['column_2']['s_is_new_window'] = '';
    $column['column_2']['is_new_window'] = 0;

    

    $column['column_2']['footer_content'] = '';
    $column['column_2']['footer_content_position'] = 0;
    $column['column_2']['footer_level_options_font_family'] = 'Open Sans Bold';
    $column['column_2']['footer_level_options_font_size'] = 12;
    $column['column_2']['footer_level_options_font_color'] = '#ffffff';
    $column['column_2']['footer_level_options_hover_font_color'] = '#000000';
    $column['column_2']['footer_level_options_font_style_bold'] = '';
    $column['column_2']['footer_level_options_font_style_italic'] = '';
    $column['column_2']['footer_level_options_font_style_decoration'] = '';
    $column['column_2']['is_post_variables'] = 0;
    $column['column_2']['post_variables_content'] = 'plan_id=2;';

    $pt_columns = array('columns' => $column);
    $opts = maybe_serialize($pt_columns);

    $arprice_form->option_create($table_id, $opts);
    unset($values);
    unset($column);

    
    $charset_collate = '';
    if ($wpdb->has_cap('collation')) {

        if (!empty($wpdb->charset))
            $charset_collate .= "DEFAULT CHARACTER SET $wpdb->charset";

        if (!empty($wpdb->collate))
            $charset_collate .= " COLLATE $wpdb->collate";
    }

    $temp_table1 = $wpdb->prefix . 'arp_arprice_temp_latest';

    $sql_table = "CREATE TABLE IF NOT EXISTS `{$temp_table1}`(			
                 ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                 table_name VARCHAR(255) NOT NULL, 
                 template_name int(11) NOT NULL,
                 general_options LONGTEXT NOT NULL,
				 table_options LONGTEXT NOT NULL, 
                 is_template int(1) NOT NULL,
                 is_animated int(1) NOT NULL,
                 status VARCHAR(255) NOT NULL, 
                 create_date DATETIME NOT NULL, 
                 arp_last_updated_date DATETIME NOT NULL,
                 ref_table_name VARCHAR(255) NOT NULL
            ){$charset_collate}";

    $wpdb->query($sql_table);

    

    $res = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice where is_template = %d ",0), OBJECT_K);

    foreach ($res as $key => $val) {
        $newtemplateid = $val->ID;

        $original_general_options = $val->general_options;
        $general_options = maybe_unserialize($val->general_options);
        $reference_template = $general_options['general_settings']['reference_template'];
        $current_color_skin = $general_options['template_setting']['skin'];

        $original_table_options = '';
        $get_temp_options = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $newtemplateid));
        if (!empty($get_temp_options)) {
            $result = $get_temp_options[0];
            $column_options = maybe_unserialize($result->table_options);

            $original_table_options = $result->table_options;
            
            foreach ($column_options['columns'] as $key => $value) {
                if ($column_options['columns'][$key]['is_caption'] == 1) {
                    
                } else {
                    $mycurrentcolumn = $column_options['columns'][$key];
                    break;
                }
            }
        }

        
        
        
        $query_temp_ins = '';

        $query_temp_ins = $wpdb->prepare("INSERT INTO $temp_table1 ( table_name, template_name, general_options, table_options, is_template, is_animated, status, create_date, arp_last_updated_date,ref_table_name ) VALUES ( %s,%d,%s,%s,%d,%d,%s,%s,%s,%d )", $val->table_name, 0, $original_general_options, $original_table_options, 0, $val->is_animated, $val->status, $val->create_date, $val->arp_last_updated_date, $val->ID);

        $wpdb->query($query_temp_ins);


        if ($reference_template == "arptemplate_1") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 4;
            $general_options['column_settings']['arp_global_button_type'] = 'shadow';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_caption_row_border_size'] = '0';
            $general_options['column_settings']['arp_caption_row_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#cecece';
            $general_options['column_settings']['arp_column_border_left'] = 0;
            $general_options['column_settings']['arp_column_border_right'] = 0;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['arp_caption_border_size'] = '1';
            $general_options['column_settings']['arp_caption_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_border_color'] = '#cecece';
            $general_options['column_settings']['arp_caption_border_left'] = 1;
            $general_options['column_settings']['arp_caption_border_right'] = 0;
            $general_options['column_settings']['arp_caption_border_top'] = 1;
            $general_options['column_settings']['arp_caption_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_odd_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_even_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = $general_options['custom_skin_colors']['arp_footer_content_bg_color'];
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = $general_options['custom_skin_colors']['arp_pricing_bg_custom_color'];

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = isset($mycurrentcolumn['footer_level_options_hover_font_color']) ? $mycurrentcolumn['footer_level_options_hover_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = isset($mycurrentcolumn['footer_level_options_hover_font_color']) ? $mycurrentcolumn['footer_level_options_hover_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = $arprice_form->arp_generate_color_tone(isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff', -30);

            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']['arp_button_bg_custom_color'], -30);
        } else if ($reference_template == "arptemplate_2") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 3;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 3;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 3;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 3;
            $general_options['column_settings']['arp_global_button_type'] = 'shadow';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '0';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#e3e3e3';

            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '';

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = $general_options['custom_skin_colors']["arp_column_bg_custom_color"];
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = '#000000';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = '#000000';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = '#000000';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = isset($mycurrentcolumn['footer_level_options_hover_font_color']) ? $mycurrentcolumn['footer_level_options_hover_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '#000000';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = '#ffffff';

            $general_options['custom_skin_colors']['arp_shortocode_background'] = '#ffffff';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '#ffffff';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = $general_options['custom_skin_colors']["arp_column_bg_custom_color"];
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = $general_options['custom_skin_colors']["arp_column_bg_custom_color"];
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']["arp_column_bg_custom_color"];
        } else if ($reference_template == "arptemplate_3") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 3;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 3;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 3;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 3;
            $general_options['column_settings']['arp_global_button_type'] = 'flat';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#e3e3e3';

            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = $general_options['custom_skin_colors']["arp_column_desc_bg_custom_color"];
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']["arp_body_odd_row_bg_custom_color"];
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']["arp_body_even_row_bg_custom_color"];
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $general_options['custom_skin_colors']["arp_header_bg_custom_color"];
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = $general_options['custom_skin_colors']["arp_column_bg_hover_color"];
            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = $general_options['custom_skin_colors']["arp_column_bg_hover_color"];
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = $general_options['custom_skin_colors']["arp_column_bg_hover_color"];
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
        } else if ($reference_template == "arptemplate_4") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 4;
            $general_options['column_settings']['arp_global_button_type'] = 'flat';

            $general_options['column_settings']['arp_row_border_size'] = '1';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#ffffff';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#dadada';
            $general_options['column_settings']['arp_column_border_left'] = 0;
            $general_options['column_settings']['arp_column_border_right'] = 0;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['arp_caption_row_border_size'] = '1';
            $general_options['column_settings']['arp_caption_row_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_row_border_color'] = '#ffffff';

            $general_options['column_settings']['arp_caption_border_size'] = '1';
            $general_options['column_settings']['arp_caption_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_border_color'] = '#E3E3E3';
            $general_options['column_settings']['arp_caption_border_left'] = 1;
            $general_options['column_settings']['arp_caption_border_right'] = 0;
            $general_options['column_settings']['arp_caption_border_top'] = 1;
            $general_options['column_settings']['arp_caption_border_bottom'] = 1;


            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = $general_options['custom_skin_colors']['arp_footer_content_bg_color'];
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_pricing_bg_custom_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = isset($mycurrentcolumn['footer_level_options_font_color']) ? $mycurrentcolumn['footer_level_options_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = isset($mycurrentcolumn['footer_level_options_font_color']) ? $mycurrentcolumn['footer_level_options_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
        } else if ($reference_template == "arptemplate_5") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 0;
            $general_options['column_settings']['arp_global_button_type'] = 'none';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#ffffff';

            $general_options['column_settings']['arp_column_border_left'] = 0;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 0;
            $general_options['column_settings']['arp_column_border_bottom'] = 0;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;

            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_odd_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_even_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = $general_options['custom_skin_colors']['arp_pricing_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
        } else if ($reference_template == "arptemplate_6") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 4;
            $general_options['column_settings']['arp_global_button_type'] = 'shadow';

            $general_options['column_settings']['arp_row_border_size'] = '1';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#cccccc';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#e3e3e3';
            $general_options['column_settings']['arp_column_border_left'] = 0;
            $general_options['column_settings']['arp_column_border_right'] = 0;
            $general_options['column_settings']['arp_column_border_top'] = 0;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['arp_caption_row_border_size'] = '1';
            $general_options['column_settings']['arp_caption_row_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_row_border_color'] = '#87BD41';

            $general_options['column_settings']['arp_caption_border_size'] = '1';
            $general_options['column_settings']['arp_caption_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_border_color'] = '#cccccc';
            $general_options['column_settings']['arp_caption_border_left'] = 0;
            $general_options['column_settings']['arp_caption_border_right'] = 0;
            $general_options['column_settings']['arp_caption_border_top'] = 0;
            $general_options['column_settings']['arp_caption_border_bottom'] = 1;


            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;



            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_odd_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_even_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']['arp_header_bg_custom_color'], -30);
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = isset($mycurrentcolumn['footer_level_options_font_color']) ? $mycurrentcolumn['footer_level_options_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = isset($mycurrentcolumn['footer_level_options_font_color']) ? $mycurrentcolumn['footer_level_options_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = '#000000';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = '#ffffff';
        } else if ($reference_template == "arptemplate_7") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 0;
            $general_options['column_settings']['arp_global_button_type'] = 'shadow';

            $general_options['column_settings']['arp_row_border_size'] = '1';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#e1e1e1';

            $general_options['column_settings']['arp_column_border_size'] = '2';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#dfdbdc';

            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_column_desc_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_odd_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_even_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '';

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            ;
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            ;
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = '#000000';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
        } else if ($reference_template == "arptemplate_8") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 20;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 20;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 20;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 20;
            $general_options['column_settings']['arp_global_button_type'] = 'shadow';

            $general_options['column_settings']['arp_row_border_size'] = '1';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#d4d4d4';

            $general_options['column_settings']['arp_caption_row_border_size'] = '1';
            $general_options['column_settings']['arp_caption_row_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_row_border_color'] = '#d4d4d4';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#dfdbdc';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['arp_caption_border_size'] = '0';
            $general_options['column_settings']['arp_caption_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_border_color'] = '#cecece';
            $general_options['column_settings']['arp_caption_border_left'] = 0;
            $general_options['column_settings']['arp_caption_border_right'] = 0;
            $general_options['column_settings']['arp_caption_border_top'] = 0;
            $general_options['column_settings']['arp_caption_border_bottom'] = 0;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '';

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '#ffffff';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '#ffffff';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '#ffffff';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '#ffffff';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
        } else if ($reference_template == "arptemplate_9") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 5;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 5;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 5;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 5;
            $general_options['column_settings']['arp_global_button_type'] = 'shadow';

            $general_options['column_settings']['arp_row_border_size'] = '1';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#ffffff';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#d9d9d9';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 0;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['arp_caption_row_border_size'] = '1';
            $general_options['column_settings']['arp_caption_row_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_row_border_color'] = '#d9d9d9';

            $general_options['column_settings']['arp_caption_border_size'] = '1';
            $general_options['column_settings']['arp_caption_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_border_color'] = '#d9d9d9';
            $general_options['column_settings']['arp_caption_border_left'] = 1;
            $general_options['column_settings']['arp_caption_border_right'] = 0;
            $general_options['column_settings']['arp_caption_border_top'] = 1;
            $general_options['column_settings']['arp_caption_border_bottom'] = 1;


            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '';

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = '#000000';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';

            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = '#000000';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = '#000000';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = isset($mycurrentcolumn['footer_level_options_font_color']) ? $mycurrentcolumn['footer_level_options_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '#000000';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_hover_color'];
        } else if ($reference_template == "arptemplate_10") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 4;
            $general_options['column_settings']['arp_global_button_type'] = 'flat';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#d7d7d7';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_column_desc_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_odd_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_even_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            if ($current_color_skin == 'custom_skin') {
                $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_hover_color'];
            } else {
                $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '#585E5E';
            }
            if ($current_color_skin == 'custom_skin') {
                $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']['arp_column_bg_hover_color'], -50);
            } else {
                $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '#3C403F';
            }

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';

            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';

            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';


            if ($current_color_skin == 'custom_skin') {
                $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_hover_color'];
            } else {
                $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = '#3c403f';
            }
        } else if ($reference_template == "arptemplate_11") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 0;
            $general_options['column_settings']['arp_global_button_type'] = 'shadow';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_caption_row_border_size'] = '0';
            $general_options['column_settings']['arp_caption_row_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#525252';
            $general_options['column_settings']['arp_column_border_left'] = 0;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 0;
            $general_options['column_settings']['arp_column_border_bottom'] = 0;

            $general_options['column_settings']['arp_caption_border_size'] = '0';
            $general_options['column_settings']['arp_caption_border_style'] = 'solid';
            $general_options['column_settings']['arp_caption_border_color'] = '#cecece';
            $general_options['column_settings']['arp_caption_border_left'] = 0;
            $general_options['column_settings']['arp_caption_border_right'] = 0;
            $general_options['column_settings']['arp_caption_border_top'] = 0;
            $general_options['column_settings']['arp_caption_border_bottom'] = 0;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;



            
            if ($current_color_skin == 'custom_skin') {
                $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']["arp_column_bg_hover_color"], 15);
            } else {
                $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['arp_desc_hover_background'][1];
            }
            if ($current_color_skin == 'custom_skin') {
                $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']["arp_column_bg_hover_color"], 5);
            } else {
                $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['arp_body_odd_row_hover_background_color'][0];
            }
            if ($current_color_skin == 'custom_skin') {
                $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']["arp_column_bg_hover_color"], 15);
            } else {
                $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['arp_body_even_row_hover_background_color'][0];
            }
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            if ($current_color_skin == 'custom_skin') {
                $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']["arp_column_bg_hover_color"], 25);
            } else {
                $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['header_bg_color'][0];
            }
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '';

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';

            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
        } else if ($reference_template == "arptemplate_13") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 3;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 3;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 3;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 3;
            $general_options['column_settings']['arp_global_button_type'] = 'flat';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#d1d1d1';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;



            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = $general_options['custom_skin_colors']['arp_pricing_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
        } else if ($reference_template == "arptemplate_14") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 4;
            $general_options['column_settings']['arp_global_button_type'] = 'flat';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#d8e7f0';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#000000';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#000000';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#0058b3';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#0058b3';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#333333';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#333333';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#333333';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#333333';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#333333';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#333333';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
        } else if ($reference_template == "arptemplate_15") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 0;
            $general_options['column_settings']['arp_global_button_type'] = 'flat';

            $general_options['column_settings']['arp_row_border_size'] = '1';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#ffffff';

            $general_options['column_settings']['arp_column_border_size'] = '0';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#d8e780';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = $general_options['custom_skin_colors']['arp_pricing_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
        } else if ($reference_template == "arptemplate_16") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 3;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 3;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 3;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 3;
            $general_options['column_settings']['arp_global_button_type'] = 'flat';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#d8e4ea';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = $general_options['custom_skin_colors']['arp_pricing_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']['arp_button_bg_custom_color'], -30);
        } else if ($reference_template == "arptemplate_20") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 0;
            $general_options['column_settings']['arp_global_button_type'] = 'none';

            $general_options['column_settings']['arp_row_border_size'] = '3';
            $general_options['column_settings']['arp_row_border_type'] = 'dotted';
            $general_options['column_settings']['arp_row_border_color'] = '#909090';

            $general_options['column_settings']['arp_column_border_size'] = '1';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#efefef';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 0;
            $general_options['column_settings']['arp_column_border_bottom'] = 0;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;



            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '';

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = $general_options['custom_skin_colors']['arp_header_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_custom_color'];
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
        } else if ($reference_template == "arptemplate_21") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 10;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 10;
            $general_options['column_settings']['arp_global_button_type'] = 'none';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '0';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#c9c9c9';
            $general_options['column_settings']['arp_column_border_left'] = 0;
            $general_options['column_settings']['arp_column_border_right'] = 0;
            $general_options['column_settings']['arp_column_border_top'] = 0;
            $general_options['column_settings']['arp_column_border_bottom'] = 0;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '';

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = '#393939';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = '#393939';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = '#ffffff';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_custom_color'];
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
        } else if ($reference_template == "arptemplate_22") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 50;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 50;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 50;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 50;
            $general_options['column_settings']['arp_global_button_type'] = 'shadow';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '0';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#efefef';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;



            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_odd_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = $general_options['custom_skin_colors']['arp_body_even_row_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = $general_options['custom_skin_colors']['arp_pricing_bg_custom_color'];

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = isset($mycurrentcolumn['footer_level_options_font_color']) ? $mycurrentcolumn['footer_level_options_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = isset($mycurrentcolumn['footer_level_options_font_color']) ? $mycurrentcolumn['footer_level_options_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
        } else if ($reference_template == "arptemplate_23") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 8;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 8;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 8;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 8;
            $general_options['column_settings']['arp_global_button_type'] = 'shadow';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '0';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#efefef';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;



            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = $general_options['custom_skin_colors']['arp_pricing_bg_custom_color'];

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = isset($mycurrentcolumn['column_description_font_color']) ? $mycurrentcolumn['column_description_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';

            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
        } else if ($reference_template == "arptemplate_24") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 4;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 4;
            $general_options['column_settings']['arp_global_button_type'] = 'shadow';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '0';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#efefef';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;


            
            $general_options['custom_skin_colors']["arp_column_bg_hover_color"] = $general_options['custom_skin_colors']['arp_column_bg_custom_color'];
            $general_options['custom_skin_colors']["arp_column_desc_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_odd_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_even_row_hover_bg_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_footer_content_hover_bg_color"] = '';
            $general_options['custom_skin_colors']["arp_header_bg_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_price_bg_hover_color"] = '';

            $general_options['custom_skin_colors']["arp_header_font_custom_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_header_font_custom_hover_color"] = isset($mycurrentcolumn['header_font_color']) ? $mycurrentcolumn['header_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_price_font_custom_hover_color"] = isset($mycurrentcolumn['price_font_color']) ? $mycurrentcolumn['price_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_desc_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_desc_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_color"] = '';
            $general_options['custom_skin_colors']["arp_body_label_font_custom_hover_color"] = '';
            $general_options['custom_skin_colors']["arp_body_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_body_even_font_custom_hover_color"] = isset($mycurrentcolumn['content_font_color']) ? $mycurrentcolumn['content_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_color"] = isset($mycurrentcolumn['footer_level_options_hover_font_color']) ? $mycurrentcolumn['footer_level_options_hover_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_footer_font_custom_hover_color"] = isset($mycurrentcolumn['footer_level_options_hover_font_color']) ? $mycurrentcolumn['footer_level_options_hover_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';
            $general_options['custom_skin_colors']["arp_button_font_custom_hover_color"] = isset($mycurrentcolumn['button_font_color']) ? $mycurrentcolumn['button_font_color'] : '#ffffff';

            $general_options['custom_skin_colors']['arp_shortocode_background'] = '';
            $general_options['custom_skin_colors']['arp_shortocode_font_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_bg_hover_color'] = '';
            $general_options['custom_skin_colors']['arp_shortcode_font_hover_color'] = '';
            $general_options['custom_skin_colors']["arp_button_bg_hover_color"] = $general_options['custom_skin_colors']['arp_button_bg_custom_color'];
        } else if ($reference_template == "arptemplate_25") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 0;
            $general_options['column_settings']['arp_global_button_type'] = 'none';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '0';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#efefef';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;
        } else if ($reference_template == "arptemplate_26") {
            $general_options['column_settings']['global_button_border_width'] = 0;
            $general_options['column_settings']['global_button_border_type'] = 'solid';
            $general_options['column_settings']['global_button_border_color'] = '#c9c9c9';
            $general_options['column_settings']['global_button_border_radius_top_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_top_right'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_left'] = 0;
            $general_options['column_settings']['global_button_border_radius_bottom_right'] = 0;
            $general_options['column_settings']['arp_global_button_type'] = 'none';

            $general_options['column_settings']['arp_row_border_size'] = '0';
            $general_options['column_settings']['arp_row_border_type'] = 'solid';
            $general_options['column_settings']['arp_row_border_color'] = '#c9c9c9';

            $general_options['column_settings']['arp_column_border_size'] = '0';
            $general_options['column_settings']['arp_column_border_type'] = 'solid';
            $general_options['column_settings']['arp_column_border_color'] = '#e3e3e3';
            $general_options['column_settings']['arp_column_border_left'] = 1;
            $general_options['column_settings']['arp_column_border_right'] = 1;
            $general_options['column_settings']['arp_column_border_top'] = 1;
            $general_options['column_settings']['arp_column_border_bottom'] = 1;

            $general_options['column_settings']['hide_header_global'] = 0;
            $general_options['column_settings']['hide_price_global'] = 0;
            $general_options['column_settings']['hide_feature_global'] = 0;
            $general_options['column_settings']['hide_description_global'] = 0;
            $general_options['column_settings']['hide_header_shortcode_global'] = 0;
        }


        
        $general_options['column_settings']['header_font_family_global'] = isset($mycurrentcolumn['header_font_family']) ? $mycurrentcolumn['header_font_family'] : 'Open Sans';
        $general_options['column_settings']['header_font_size_global'] = isset($mycurrentcolumn['header_font_size']) ? $mycurrentcolumn['header_font_size'] : '28';
        $general_options['column_settings']['arp_header_text_alignment'] = 'center';
        $general_options['column_settings']['arp_header_text_bold_global'] = isset($mycurrentcolumn['header_style_bold']) ? $mycurrentcolumn['header_style_bold'] : '';
        $general_options['column_settings']['arp_header_text_italic_global'] = isset($mycurrentcolumn['header_style_italic']) ? $mycurrentcolumn['header_style_italic'] : '';
        $general_options['column_settings']['arp_header_text_decoration_global'] = isset($mycurrentcolumn['header_style_decoration']) ? $mycurrentcolumn['header_style_decoration'] : '';

        $general_options['column_settings']['price_font_family_global'] = isset($mycurrentcolumn['price_font_family']) ? $mycurrentcolumn['price_font_family'] : 'Open Sans';
        $general_options['column_settings']['price_font_size_global'] = isset($mycurrentcolumn['price_font_size']) ? $mycurrentcolumn['price_font_size'] : '18';
        $general_options['column_settings']['arp_price_text_alignment'] = 'center';
        $general_options['column_settings']['arp_price_text_bold_global'] = isset($mycurrentcolumn['price_label_style_bold']) ? $mycurrentcolumn['price_label_style_bold'] : '';
        $general_options['column_settings']['arp_price_text_italic_global'] = isset($mycurrentcolumn['price_label_style_italic']) ? $mycurrentcolumn['price_label_style_italic'] : '';
        $general_options['column_settings']['arp_price_text_decoration_global'] = isset($mycurrentcolumn['price_label_style_decoration']) ? $mycurrentcolumn['price_label_style_decoration'] : '';

        $general_options['column_settings']['body_font_family_global'] = isset($mycurrentcolumn['content_font_family']) ? $mycurrentcolumn['content_font_family'] : 'Arial';
        $general_options['column_settings']['body_font_size_global'] = isset($mycurrentcolumn['content_font_size']) ? $mycurrentcolumn['content_font_size'] : 'Arial';
        $general_options['column_settings']['arp_body_text_alignment'] = isset($mycurrentcolumn['body_text_alignment']) ? $mycurrentcolumn['body_text_alignment'] : 'center';
        $general_options['column_settings']['arp_body_text_bold_global'] = '';
        $general_options['column_settings']['arp_body_text_italic_global'] = '';
        $general_options['column_settings']['arp_body_text_decoration_global'] = '';

        $general_options['column_settings']['footer_font_family_global'] = isset($mycurrentcolumn['footer_level_options_font_family']) ? $mycurrentcolumn['footer_level_options_font_family'] : 'Open Sans Bold';
        $general_options['column_settings']['footer_font_size_global'] = isset($mycurrentcolumn['footer_level_options_font_size']) ? $mycurrentcolumn['footer_level_options_font_size'] : '12';
        $general_options['column_settings']['arp_footer_text_alignment'] = 'center';
        $general_options['column_settings']['arp_footer_text_bold_global'] = isset($mycurrentcolumn['footer_level_options_font_style_bold']) ? $mycurrentcolumn['footer_level_options_font_style_bold'] : '';
        $general_options['column_settings']['arp_footer_text_italic_global'] = isset($mycurrentcolumn['footer_level_options_font_style_italic']) ? $mycurrentcolumn['footer_level_options_font_style_italic'] : '';
        $general_options['column_settings']['arp_footer_text_decoration_global'] = isset($mycurrentcolumn['footer_level_options_font_style_decoration']) ? $mycurrentcolumn['footer_level_options_font_style_decoration'] : '';


        $general_options['column_settings']['button_font_family_global'] = isset($mycurrentcolumn['button_font_family']) ? $mycurrentcolumn['button_font_family'] : 'Open Sans Bold';
        $general_options['column_settings']['button_font_size_global'] = isset($mycurrentcolumn['button_font_size']) ? $mycurrentcolumn['button_font_size'] : '17';
        $general_options['column_settings']['arp_button_text_bold_global'] = isset($mycurrentcolumn['button_style_bold']) ? $mycurrentcolumn['button_style_bold'] : '';
        $general_options['column_settings']['arp_button_text_italic_global'] = isset($mycurrentcolumn['button_style_italic']) ? $mycurrentcolumn['button_style_italic'] : '';
        $general_options['column_settings']['arp_button_text_decoration_global'] = isset($mycurrentcolumn['button_style_decoration']) ? $mycurrentcolumn['button_style_decoration'] : '';

        $general_options['column_settings']['description_font_family_global'] = isset($mycurrentcolumn['column_description_font_family']) ? $mycurrentcolumn['column_description_font_family'] : '';
        $general_options['column_settings']['description_font_size_global'] = isset($mycurrentcolumn['column_description_font_size']) ? $mycurrentcolumn['column_description_font_size'] : '';
        $general_options['column_settings']['arp_description_text_alignment'] = 'center';
        $general_options['column_settings']['arp_description_text_bold_global'] = isset($mycurrentcolumn['column_description_style_bold']) ? $mycurrentcolumn['column_description_style_bold'] : '';
        $general_options['column_settings']['arp_description_text_italic_global'] = isset($mycurrentcolumn['column_description_style_italic']) ? $mycurrentcolumn['column_description_style_italic'] : '';
        $general_options['column_settings']['arp_description_text_decoration_global'] = isset($mycurrentcolumn['column_description_style_decoration']) ? $mycurrentcolumn['column_description_style_decoration'] : '';


        $general_options['column_settings']['disable_hover_effect'] = 0;
        $general_options['column_settings']['disable_button_hover_effect'] = 0;
        $general_options['column_settings']['toggle_column_animation'] = 0;

        $general_options['tooltip_settings']['tooltip_icon_position'] = 'float_to_content';

        $general_options['general_settings']['setas_default_toggle'] = 0;

        $general_options = maybe_serialize($general_options);

        $qry = $wpdb->prepare("UPDATE " . $wpdb->prefix . "arp_arprice SET `general_options` = %s WHERE `ID` = %d", $general_options, $newtemplateid);
        $wpdb->query($qry);

        $general_options = maybe_unserialize($general_options);

        $get_temp_options = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $newtemplateid));
        if (!empty($get_temp_options)) {
            $result = $get_temp_options[0];
            $column_options = maybe_unserialize($result->table_options);

            foreach ($column_options['columns'] as $key => $value) {

                
                $arp_price_label_css = '';
                if (isset($column_options['columns'][$key]['price_text_font_size'])) {
                    $arp_price_label_css .= 'font-size: ' . $column_options['columns'][$key]['price_text_font_size'] . 'px;';
                }

                if ($column_options['columns'][$key]['price_text_style_bold'] == 'bold') {
                    $arp_price_label_css .='font-weight:bold;';
                } else {
                    $arp_price_label_css .='font-weight:normal;';
                }
                if ($column_options['columns'][$key]['price_text_style_italic'] == 'italic') {
                    $arp_price_label_css .='font-style:italic;';
                }
                if ($column_options['columns'][$key]['price_text_style_decoration'] == 'underline') {
                    $arp_price_label_css .='text-decoration:underline;';
                }
                if ($column_options['columns'][$key]['price_text_style_decoration'] == 'line-through') {
                    $arp_price_label_css .='text-decoration:line-through;';
                }
                

                if ($reference_template == "arptemplate_20" || $reference_template == "arptemplate_2" || $reference_template == "arptemplate_4" || $reference_template == "arptemplate_5" || $reference_template == "arptemplate_6" || $reference_template == "arptemplate_7" || $reference_template == "arptemplate_9" || $reference_template == "arptemplate_10" || $reference_template == "arptemplate_11" || $reference_template == "arptemplate_14" || $reference_template == "arptemplate_15" || $reference_template == "arptemplate_16") {
                    $column_options['columns'][$key]['price_text'] = "<span class='arp_price_value'>" . $column_options['columns'][$key]['price_text'] . "</span><span class='arp_price_duration' style='" . $arp_price_label_css . "'>" . $column_options['columns'][$key]['price_label'] . "</span>";

                    $column_options['columns'][$key]['price_text_two_step'] = "<span class='arp_price_value'>" . $column_options['columns'][$key]['price_text_input_two_step_price'] . "</span><span class='arp_price_duration' style='" . $arp_price_label_css . "'>" . $column_options['columns'][$key]['price_text_input_two_step_label'] . "</span>";

                    $column_options['columns'][$key]['price_text_three_step'] = "<span class='arp_price_value'>" . $column_options['columns'][$key]['price_text_input_three_step_price'] . "</span><span class='arp_price_duration' style='" . $arp_price_label_css . "'>" . $column_options['columns'][$key]['price_text_input_three_step_label'] . "</span>";


                    $column_options['columns'][$key]['price_label'] = '';
                    $column_options['columns'][$key]['price_text_input_two_step_label'] = '';
                    $column_options['columns'][$key]['price_text_input_three_step_label'] = '';
                }

                if ($reference_template == "arptemplate_8" || $reference_template == "arptemplate_3" || $reference_template == "arptemplate_13") {
                    $column_options['columns'][$key]['price_text'] = "<span class='arp_price_duration' style='" . $arp_price_label_css . "'>" . $column_options['columns'][$key]['price_label'] . "</span><span class='arp_price_value'>" . $column_options['columns'][$key]['price_text'] . "</span>";

                    $column_options['columns'][$key]['price_text_two_step'] = "<span class='arp_price_duration' style='" . $arp_price_label_css . "'>" . $column_options['columns'][$key]['price_text_input_two_step_label'] . "</span><span class='arp_price_value'>" . $column_options['columns'][$key]['price_text_input_two_step_price'] . "</span>";

                    $column_options['columns'][$key]['price_text_three_step'] = "<span class='" . $arp_price_label_css . "'>" . $column_options['columns'][$key]['price_text_input_three_step_label'] . "</span><span class='arp_price_value'>" . $column_options['columns'][$key]['price_text_input_three_step_price'] . "</span>";


                    $column_options['columns'][$key]['price_label'] = '';
                    $column_options['columns'][$key]['price_text_input_two_step_label'] = '';
                    $column_options['columns'][$key]['price_text_input_three_step_label'] = '';
                }

                
                
                if ($reference_template == "arptemplate_6" || $reference_template == "arptemplate_16") {

                    $arp_colum_desc_style = '';
                    if (isset($column_options['columns'][$key]['column_description_font_size'])) {
                        $arp_colum_desc_style .= 'font-size: ' . $column_options['columns'][$key]['column_description_font_size'] . 'px;';
                    }

                    if ($column_options['columns'][$key]['column_description_style_bold'] == 'bold') {
                        $arp_colum_desc_style .='font-weight:bold;';
                    } else {
                        $arp_colum_desc_style .='font-weight:normal;';
                    }
                    if ($column_options['columns'][$key]['column_description_style_italic'] == 'italic') {
                        $arp_colum_desc_style .='font-style:italic;';
                    }
                    if ($column_options['columns'][$key]['column_description_style_decoration'] == 'underline') {
                        $arp_colum_desc_style .='text-decoration:underline;';
                    }
                    if ($column_options['columns'][$key]['column_description_style_decoration'] == 'line-through') {
                        $arp_colum_desc_style .='text-decoration:line-through;';
                    }
                    

                    if ($reference_template == "arptemplate_6") {

                        $column_options['columns'][$key]['package_title'] = $column_options['columns'][$key]['package_title'];
                        $column_options['columns'][$key]['package_title'] .=isset($column_options['columns'][$key]['column_description']) ? '<div style="' . $arp_colum_desc_style . '">' . $column_options['columns'][$key]['column_description'] . '</div>' : '';

                        $column_options['columns'][$key]['package_title_second'] = $column_options['columns'][$key]['package_title_second'];
                        $column_options['columns'][$key]['package_title_second'] .= isset($column_options['columns'][$key]['column_description_second']) ? '<div style="' . $arp_colum_desc_style . '">' . $column_options['columns'][$key]['column_description_second'] . '</div>' : '';

                        $column_options['columns'][$key]['package_title_third'] = $column_options['columns'][$key]['package_title'];
                        $column_options['columns'][$key]['package_title_third'] .= isset($column_options['columns'][$key]['column_description_third']) ? '<div style="' . $arp_colum_desc_style . '">' . $column_options['columns'][$key]['column_description_third'] . '</div>' : '';
                    }
                    if ($reference_template == "arptemplate_16") {
                        $column_options['columns'][$key]['package_title'] = $column_options['columns'][$key]['package_title'];
                        $column_options['columns'][$key]['package_title'] .= isset($column_options['columns'][$key]['column_description']) ? '<br><span style="' . $arp_colum_desc_style . '">' . $column_options['columns'][$key]['column_description'] . '</span>' : '';

                        $column_options['columns'][$key]['package_title_second'] = $column_options['columns'][$key]['package_title_second'];
                        $column_options['columns'][$key]['package_title_second'] .= isset($column_options['columns'][$key]['column_description_second']) ? '<br><span style="' . $arp_colum_desc_style . '">' . $column_options['columns'][$key]['column_description_second'] . '</span>' : '';

                        $column_options['columns'][$key]['package_title_third'] = $column_options['columns'][$key]['package_title_third'];
                        $column_options['columns'][$key]['package_title_third'] .= isset($column_options['columns'][$key]['column_description_third']) ? '<br><span style="' . $arp_colum_desc_style . '">' . $column_options['columns'][$key]['column_description_third'] . '</span>' : '';
                    }
                    $column_options['columns'][$key]['column_description_third'] = '';
                    $column_options['columns'][$key]['column_description_second'] = '';
                    $column_options['columns'][$key]['column_description'] = '';
                }
                $column_options['columns'][$key]['column_background_image'] = '';
                $column_options['columns'][$key]['column_background_scaling'] = 'fit_to_container';
                $column_options['columns'][$key]['column_background_min_positon'] = '50';
                $column_options['columns'][$key]['column_background_max_positon'] = '50';
                $column_options['columns'][$key]['is_new_window_actual'] = 0;
                $column_options['columns'][$key]['header_font_align'] = 'center';
                $column_options['columns'][$key]['price_font_align'] = 'center';
                $column_options['columns'][$key]['description_text_alignment'] = 'center';
                $column_options['columns'][$key]['footer_text_align'] = 'center';

                $column_options['columns'][$key]['arp_header_shortcode_second'] = '';
                $column_options['columns'][$key]['arp_header_shortcode_third'] = '';


                
                if ($reference_template == "arptemplate_8" || $reference_template == "arptemplate_2" || $reference_template == "arptemplate_4" || $reference_template == "arptemplate_26") {
                    if ($reference_template == "arptemplate_2") {
                        $column_options['columns'][$key]['arp_shortcode_customization_size'] = 'medium';
                        $column_options['columns'][$key]['arp_shortcode_customization_style'] = 'rounded';
                        
                        
                        
                        
                    }
                    if ($reference_template == "arptemplate_4") {
                        $column_options['columns'][$key]['arp_shortcode_customization_size'] = 'small';
                        $column_options['columns'][$key]['arp_shortcode_customization_style'] = 'square_solid';
                        $column_options['columns'][$key]['shortcode_background_color'] = '#ffffff';
                        $column_options['columns'][$key]['shortcode_font_color'] = '#ffffff';
                        $column_options['columns'][$key]['shortcode_hover_background_color'] = '#ffffff';
                        $column_options['columns'][$key]['shortcode_hover_font_color'] = '#ffffff';
                    }
                    if ($reference_template == "arptemplate_8") {
                        $column_options['columns'][$key]['arp_shortcode_customization_size'] = 'small';
                        $column_options['columns'][$key]['arp_shortcode_customization_style'] = 'rounded';
                        $column_options['columns'][$key]['shortcode_background_color'] = '#ffffff';
                        $column_options['columns'][$key]['shortcode_font_color'] = '#ffffff';
                        $column_options['columns'][$key]['shortcode_hover_background_color'] = '#ffffff';
                        $column_options['columns'][$key]['shortcode_hover_font_color'] = '#ffffff';
                    }
                    if ($reference_template == "arptemplate_26") {
                        $column_options['columns'][$key]['arp_shortcode_customization_size'] = 'large';
                        $column_options['columns'][$key]['arp_shortcode_customization_style'] = 'rounded';
                        $column_options['columns'][$key]['shortcode_background_color'] = '#2fb8ff';
                        $column_options['columns'][$key]['shortcode_font_color'] = '#2fb8ff';
                        $column_options['columns'][$key]['shortcode_hover_background_color'] = '#2fb8ff';
                        $column_options['columns'][$key]['shortcode_hover_font_color'] = '#2fb8ff';
                    }
                } else {
                    $column_options['columns'][$key]['arp_shortcode_customization_size'] = 'medium';
                    $column_options['columns'][$key]['arp_shortcode_customization_style'] = 'none';
                    $column_options['columns'][$key]['shortcode_background_color'] = '';
                    $column_options['columns'][$key]['shortcode_font_color'] = '';
                    $column_options['columns'][$key]['shortcode_hover_background_color'] = '';
                    $column_options['columns'][$key]['shortcode_hover_font_color'] = '';
                }

                
                if ($reference_template == "arptemplate_1") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_background_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = $column_options['columns'][$key]['price_background_color'];
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = $column_options['columns'][$key]['content_odd_color'];
                    $column_options['columns'][$key]['content_even_hover_color'] = $column_options['columns'][$key]['content_even_color'];
                    $column_options['columns'][$key]['button_hover_background_color'] = $arprice_form->arp_generate_color_tone($column_options['columns'][$key]['button_background_color'], -30);
                    $column_options['columns'][$key]['button_hover_font_color'] = $arprice_form->arp_generate_color_tone($column_options['columns'][$key]['button_font_color'], -30);
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = $column_options['columns'][$key]['footer_background_color'];
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = $column_options['columns'][$key]['footer_level_options_font_color'];


                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '122';
                        $column_options['columns'][$key]['button_height'] = '30';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '140';
                        $column_options['columns'][$key]['button_height'] = '45';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '158';
                        $column_options['columns'][$key]['button_height'] = '54';
                    }
                }
                if ($reference_template == "arptemplate_2") {
                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['column_hover_background_color'] = $general_options['custom_skin_colors']["arp_column_bg_hover_color"];
                    } else {
                        $column_options['columns'][$key]['column_hover_background_color'] = '#f6f6f6';
                    }

                    $column_options['columns'][$key]['header_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = '';
                    $column_options['columns'][$key]['price_hover_font_color'] = '#000000';
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = '#000000';
                    $column_options['columns'][$key]['content_even_hover_font_color'] = '#000000';
                    $column_options['columns'][$key]['content_odd_hover_color'] = '';
                    $column_options['columns'][$key]['content_even_hover_color'] = '';
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '#000000';


                    $column_options['columns'][$key]['shortcode_background_color'] = '#ffffff';
                    $column_options['columns'][$key]['shortcode_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['shortcode_hover_background_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['shortcode_hover_font_color'] = $column_options['columns'][$key]['column_background_color'];



                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '140';
                        $column_options['columns'][$key]['button_height'] = '39';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '152';
                        $column_options['columns'][$key]['button_height'] = '48';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '164';
                        $column_options['columns'][$key]['button_height'] = '51';
                    }
                }
                if ($reference_template == "arptemplate_3") {
                    $column_options['columns'][$key]['header_hover_background_color'] = $column_options['columns'][$key]['header_background_color'];

                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['header_hover_font_color'] = $general_options['custom_skin_colors']["arp_column_bg_hover_color"];
                    } else {
                        $column_options['columns'][$key]['header_hover_font_color'] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['arp_header_hover_font_color'][1];
                    }

                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['price_hover_background_color'] = $general_options['custom_skin_colors']["arp_column_bg_hover_color"];
                    } else {
                        $column_options['columns'][$key]['price_hover_background_color'] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['price_bg_color'][1];
                    }

                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];

                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['content_hover_font_color'] = $general_options['custom_skin_colors']["arp_column_bg_hover_color"];
                    } else {
                        $column_options['columns'][$key]['content_hover_font_color'] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['arp_body_font_hover_color'][1];
                    }

                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = $column_options['columns'][$key]['content_odd_color'];
                    $column_options['columns'][$key]['content_even_hover_color'] = $column_options['columns'][$key]['content_even_color'];
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['button_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = $column_options['columns'][$key]['column_description_font_color'];
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = $column_options['columns'][$key]['column_desc_background_color'];
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';


                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '152';
                        $column_options['columns'][$key]['button_height'] = '30';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '164';
                        $column_options['columns'][$key]['button_height'] = '42';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '176';
                        $column_options['columns'][$key]['button_height'] = '51';
                    }
                }
                if ($reference_template == "arptemplate_4") {
                    $column_options['columns'][$key]['price_background_color'] = '#ffffff';
                    $column_options['columns'][$key]['price_hover_background_color'] = '#ffffff';

                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_background_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['content_even_hover_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['content_odd_hover_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['content_even_hover_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['button_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = $column_options['columns'][$key]['footer_background_color'];
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = $column_options['columns'][$key]['footer_level_options_font_color'];


                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '116';
                        $column_options['columns'][$key]['button_height'] = '36';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '140';
                        $column_options['columns'][$key]['button_height'] = '45';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '158';
                        $column_options['columns'][$key]['button_height'] = '51';
                    }
                }
                if ($reference_template == "arptemplate_5") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_background_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = $column_options['columns'][$key]['price_background_color'];
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = $column_options['columns'][$key]['content_odd_color'];
                    $column_options['columns'][$key]['content_even_hover_color'] = $column_options['columns'][$key]['content_even_color'];
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['button_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';
                    $column_options['columns'][$key]['button_height'] = '';
                }
                if ($reference_template == "arptemplate_6") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_background_color'] = $arprice_form->arp_generate_color_tone($column_options['columns'][$key]['header_background_color'], -30);
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['price_hover_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = $column_options['columns'][$key]['content_odd_color'];
                    $column_options['columns'][$key]['content_even_hover_color'] = $column_options['columns'][$key]['content_even_color'];
                    $column_options['columns'][$key]['button_hover_background_color'] = '#ffffff';
                    if ($current_color_skin != 'custom_skin') {
                        $column_options['columns'][$key]['button_hover_font_color'] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['arp_button_hover_font_color'][1];
                    } else {
                        $column_options['columns'][$key]['button_hover_font_color'] = '#000000';
                    }
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = $column_options['columns'][$key]['footer_level_options_font_color'];
                    $column_options['columns'][$key]['shortcode_background_color'] = '';
                    $column_options['columns'][$key]['shortcode_font_color'] = '';
                    $column_options['columns'][$key]['shortcode_hover_background_color'] = '';
                    $column_options['columns'][$key]['shortcode_hover_font_color'] = '';

                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '128';
                        $column_options['columns'][$key]['button_height'] = '30';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '146';
                        $column_options['columns'][$key]['button_height'] = '45';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '158';
                        $column_options['columns'][$key]['button_height'] = '54';
                    }
                }
                if ($reference_template == "arptemplate_7") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_background_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = '';
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = $column_options['columns'][$key]['content_odd_color'];

                    $column_options['columns'][$key]['content_even_hover_color'] = $column_options['columns'][$key]['content_even_color'];
                    if ($current_color_skin != 'custom_skin') {
                        $column_options['columns'][$key]['button_hover_background_color'] = '#3E3E3C';
                    } else {
                        $column_options['columns'][$key]['button_hover_background_color'] = $general_options['custom_skin_colors']['arp_button_bg_hover_color'];
                    }

                    if ($current_color_skin != 'custom_skin') {
                        $column_options['columns'][$key]['button_hover_font_color'] = '#000000';
                    } else {
                        $column_options['columns'][$key]['button_hover_font_color'] = '#ffffff';
                    }
                    $column_options['columns'][$key]['column_description_hover_font_color'] = $column_options['columns'][$key]['column_description_font_color'];
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = $column_options['columns'][$key]['column_desc_background_color'];
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';
                    $column_options['columns'][$key]['shortcode_background_color'] = '';
                    $column_options['columns'][$key]['shortcode_font_color'] = '';
                    $column_options['columns'][$key]['shortcode_hover_background_color'] = '';
                    $column_options['columns'][$key]['shortcode_hover_font_color'] = '';

                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '122';
                        $column_options['columns'][$key]['button_height'] = '33';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '146';
                        $column_options['columns'][$key]['button_height'] = '45';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '170';
                        $column_options['columns'][$key]['button_height'] = '60';
                    }
                }
                if ($reference_template == "arptemplate_8") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_background_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = $column_options['columns'][$key]['price_background_color'];
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = '#ffffff';
                    $column_options['columns'][$key]['content_even_hover_color'] = '#ffffff';
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['button_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';
                    $column_options['columns'][$key]['shortcode_background_color'] = '#ffffff';
                    $column_options['columns'][$key]['shortcode_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['shortcode_hover_background_color'] = '#ffffff';
                    $column_options['columns'][$key]['shortcode_hover_font_color'] = '#ffffff';


                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '110';
                        $column_options['columns'][$key]['button_height'] = '30';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '134';
                        $column_options['columns'][$key]['button_height'] = '36';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '122';
                        $column_options['columns'][$key]['button_height'] = '51';
                    }
                }
                if ($reference_template == "arptemplate_9") {
                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['column_hover_background_color'] = $general_options['custom_skin_colors']['arp_column_bg_hover_color'];
                    } else {
                        $column_options['columns'][$key]['column_hover_background_color'] = '#E9EAEE';
                    }
                    $column_options['columns'][$key]['header_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_font_color'] = '#000000';
                    $column_options['columns'][$key]['price_hover_background_color'] = '';
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = '#000000';
                    $column_options['columns'][$key]['content_even_hover_font_color'] = '#000000';
                    $column_options['columns'][$key]['content_odd_hover_color'] = '';
                    $column_options['columns'][$key]['content_even_hover_color'] = '';

                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['button_hover_background_color'] = $general_options['custom_skin_colors']['arp_button_bg_hover_color'];
                    } else {
                        $column_options['columns'][$key]['button_hover_background_color'] = '#747577';
                    }
                    $column_options['columns'][$key]['button_hover_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '#000000';
                    $column_options['columns'][$key]['shortcode_background_color'] = '';
                    $column_options['columns'][$key]['shortcode_font_color'] = '';
                    $column_options['columns'][$key]['shortcode_hover_background_color'] = '';
                    $column_options['columns'][$key]['shortcode_hover_font_color'] = '';

                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '116';
                        $column_options['columns'][$key]['button_height'] = '30';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '128';
                        $column_options['columns'][$key]['button_height'] = '45';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '164';
                        $column_options['columns'][$key]['button_height'] = '54';
                    }
                }
                if ($reference_template == "arptemplate_10") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['header_hover_background_color'] = $general_options['custom_skin_colors']['arp_column_bg_hover_color'];
                    } else {
                        $column_options['columns'][$key]['header_hover_background_color'] = '#585E5E';
                    }
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];

                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['price_hover_background_color'] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']['arp_column_bg_hover_color'], -50);
                    } else {
                        $column_options['columns'][$key]['price_hover_background_color'] = '#3C403F';
                    }
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = $column_options['columns'][$key]['content_odd_color'];
                    $column_options['columns'][$key]['content_even_hover_color'] = $column_options['columns'][$key]['content_even_color'];

                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['button_hover_background_color'] = $general_options['custom_skin_colors']['arp_column_bg_hover_color'];
                    } else {
                        $column_options['columns'][$key]['button_hover_background_color'] = '#3c403f';
                    }
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = $column_options['columns'][$key]['column_description_font_color'];
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = $column_options['columns'][$key]['column_desc_background_color'];
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';

                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '152';
                        $column_options['columns'][$key]['button_height'] = '36';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '176';
                        $column_options['columns'][$key]['button_height'] = '42';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '200';
                        $column_options['columns'][$key]['button_height'] = '57';
                    }
                }
                if ($reference_template == "arptemplate_11") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['header_hover_background_color'] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']["arp_column_bg_hover_color"], 25);
                    } else {
                        $column_options['columns'][$key]['header_hover_background_color'] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['header_bg_color'][0];
                    }
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = '';
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['content_odd_hover_color'] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']["arp_column_bg_hover_color"], 5);
                    } else {
                        $column_options['columns'][$key]['content_odd_hover_color'] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['arp_body_odd_row_hover_background_color'][0];
                    }
                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['content_even_hover_color'] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']["arp_column_bg_hover_color"], 15);
                    } else {
                        $column_options['columns'][$key]['content_even_hover_color'] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['arp_body_even_row_hover_background_color'][0];
                    }
                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['button_hover_background_color'] = $general_options['custom_skin_colors']["arp_button_bg_hover_color"];
                    } else {
                        $column_options['columns'][$key]['button_hover_background_color'] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['button_bg_color'][0];
                    }

                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];

                    $column_options['columns'][$key]['column_description_hover_font_color'] = $column_options['columns'][$key]['column_description_font_color'];
                    if ($current_color_skin == 'custom_skin') {
                        $column_options['columns'][$key]['column_desc_hover_background_color'] = $arprice_form->arp_generate_color_tone($general_options['custom_skin_colors']["arp_column_bg_hover_color"], 15);
                    } else {
                        $column_options['columns'][$key]['column_desc_hover_background_color'] = $section_bg_color[$reference_template][$current_color_skin]['arp_hover_color']['arp_desc_hover_background'][0];
                    }
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';


                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '122';
                        $column_options['columns'][$key]['button_height'] = '33';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '158';
                        $column_options['columns'][$key]['button_height'] = '45';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '146';
                        $column_options['columns'][$key]['button_height'] = '54';
                    }
                }
                if ($reference_template == "arptemplate_13") {
                    $column_options['columns'][$key]['column_hover_background_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['header_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = $column_options['columns'][$key]['price_background_color'];
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = '';
                    $column_options['columns'][$key]['content_even_hover_color'] = '';
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['button_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = $column_options['columns'][$key]['column_description_font_color'];
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';


                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '140';
                        $column_options['columns'][$key]['button_height'] = '30';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '152';
                        $column_options['columns'][$key]['button_height'] = '39';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '164';
                        $column_options['columns'][$key]['button_height'] = '51';
                    }
                }
                if ($reference_template == "arptemplate_14") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = '';
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = '';
                    $column_options['columns'][$key]['content_even_hover_color'] = '';
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['button_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';


                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '116';
                        $column_options['columns'][$key]['button_height'] = '36';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '140';
                        $column_options['columns'][$key]['button_height'] = '45';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '152';
                        $column_options['columns'][$key]['button_height'] = '54';
                    }
                }
                if ($reference_template == "arptemplate_15") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = $column_options['columns'][$key]['price_background_color'];
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = '';
                    $column_options['columns'][$key]['content_even_hover_color'] = '';
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['button_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';


                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '104';
                        $column_options['columns'][$key]['button_height'] = '39';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '116';
                        $column_options['columns'][$key]['button_height'] = '45';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '116';
                        $column_options['columns'][$key]['button_height'] = '54';
                    }
                }
                if ($reference_template == "arptemplate_16") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = '';
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = '';
                    $column_options['columns'][$key]['content_even_hover_color'] = '';
                    $column_options['columns'][$key]['button_hover_background_color'] = $arprice_form->arp_generate_color_tone($column_options['columns'][$key]['button_background_color'], -30);
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';

                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '128';
                        $column_options['columns'][$key]['button_height'] = '30';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '140';
                        $column_options['columns'][$key]['button_height'] = '39';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '152';
                        $column_options['columns'][$key]['button_height'] = '51';
                    }
                }
                if ($reference_template == "arptemplate_20") {
                    $column_options['columns'][$key]['column_hover_background_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['header_hover_background_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = '';
                    $column_options['columns'][$key]['price_hover_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['content_even_hover_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['content_odd_hover_color'] = '';
                    $column_options['columns'][$key]['content_even_hover_color'] = '';
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['header_background_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';
                    $column_options['columns'][$key]['button_height'] = '';
                }
                if ($reference_template == "arptemplate_21") {
                    $column_options['columns'][$key]['column_hover_background_color'] = '#ffffff';
                    $column_options['columns'][$key]['header_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = '';
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = '#393939';
                    $column_options['columns'][$key]['content_even_hover_font_color'] = '#393939';
                    $column_options['columns'][$key]['content_odd_hover_color'] = '';
                    $column_options['columns'][$key]['content_even_hover_color'] = '';
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = '#ffffff';
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';
                    $column_options['columns'][$key]['button_height'] = '';
                }
                if ($reference_template == "arptemplate_22") {
                    $column_options['columns'][$key]['column_hover_background_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['header_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = $column_options['columns'][$key]['price_background_color'];
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = $column_options['columns'][$key]['content_odd_color'];
                    $column_options['columns'][$key]['content_even_hover_color'] = $column_options['columns'][$key]['content_even_color'];
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['button_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = $column_options['columns'][$key]['footer_level_options_font_color'];

                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '140';
                        $column_options['columns'][$key]['button_height'] = '36';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '152';
                        $column_options['columns'][$key]['button_height'] = '42';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '164';
                        $column_options['columns'][$key]['button_height'] = '51';
                    }
                }
                if ($reference_template == "arptemplate_23") {
                    $column_options['columns'][$key]['column_hover_background_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['header_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = $column_options['columns'][$key]['price_background_color'];
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = '';
                    $column_options['columns'][$key]['content_even_hover_color'] = '';
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['button_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = $column_options['columns'][$key]['column_description_font_color'];
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = '';


                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '140';
                        $column_options['columns'][$key]['button_height'] = '39';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '164';
                        $column_options['columns'][$key]['button_height'] = '48';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '182';
                        $column_options['columns'][$key]['button_height'] = '57';
                    }
                }
                if ($reference_template == "arptemplate_24") {
                    $column_options['columns'][$key]['column_hover_background_color'] = $column_options['columns'][$key]['column_background_color'];
                    $column_options['columns'][$key]['header_hover_background_color'] = '';
                    $column_options['columns'][$key]['header_hover_font_color'] = $column_options['columns'][$key]['header_font_color'];
                    $column_options['columns'][$key]['price_hover_background_color'] = '';
                    $column_options['columns'][$key]['price_hover_font_color'] = $column_options['columns'][$key]['price_font_color'];
                    $column_options['columns'][$key]['content_even_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_even_hover_font_color'] = $column_options['columns'][$key]['content_font_color'];
                    $column_options['columns'][$key]['content_odd_hover_color'] = '';
                    $column_options['columns'][$key]['content_even_hover_color'] = '';
                    $column_options['columns'][$key]['button_hover_background_color'] = $column_options['columns'][$key]['button_background_color'];
                    $column_options['columns'][$key]['button_hover_font_color'] = $column_options['columns'][$key]['button_font_color'];
                    $column_options['columns'][$key]['column_description_hover_font_color'] = '';
                    $column_options['columns'][$key]['column_desc_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_hover_background_color'] = '';
                    $column_options['columns'][$key]['footer_level_options_hover_font_color'] = $column_options['columns'][$key]['footer_level_options_font_color'];

                    if ($column_options['columns'][$key]['button_size'] == 'Small') {
                        $column_options['columns'][$key]['button_size'] = '128';
                        $column_options['columns'][$key]['button_height'] = '39';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Medium') {
                        $column_options['columns'][$key]['button_size'] = '140';
                        $column_options['columns'][$key]['button_height'] = '48';
                    }
                    if ($column_options['columns'][$key]['button_size'] == 'Large') {
                        $column_options['columns'][$key]['button_size'] = '152';
                        $column_options['columns'][$key]['button_height'] = '60';
                    }
                }

                
                $column_options['columns'][$key]['ribbon_setting']['arp_ribbon_content_second'] = '';
                $column_options['columns'][$key]['ribbon_setting']['arp_ribbon_content_third'] = '';
                $column_options['columns'][$key]['ribbon_setting']['arp_custom_ribbon_second'] = '';
                $column_options['columns'][$key]['ribbon_setting']['arp_custom_ribbon_third'] = '';

                
                foreach ($column_options['columns'][$key]['rows'] as $key1 => $value1) {

                    
                    if ($reference_template == "arptemplate_8") {

                        $column_options['columns'][$key]['rows'][$key1]['row_label'] = isset($column_options['columns'][$key]['rows'][$key1]['row_label']) ? $column_options['columns'][$key]['rows'][$key1]['row_label'] . '<br>' : "";

                        $column_options['columns'][$key]['rows'][$key1]['row_description'] = $column_options['columns'][$key]['rows'][$key1]['row_label'] . '<b>' . $column_options['columns'][$key]['rows'][$key1]['row_description'] . '</b>';

                        $column_options['columns'][$key]['rows'][$key1]['row_label_second'] = isset($column_options['columns'][$key]['rows'][$key1]['row_label_second']) ? $column_options['columns'][$key]['rows'][$key1]['row_label_second'] . '<br>' : '';
                        $column_options['columns'][$key]['rows'][$key1]['row_description_second'] = isset($column_options['columns'][$key]['rows'][$key1]['row_description_second']) ? $column_options['columns'][$key]['rows'][$key1]['row_description_second'] : '';

                        $column_options['columns'][$key]['rows'][$key1]['row_description_second'] = $column_options['columns'][$key]['rows'][$key1]['row_label_second'] . '<b>' . $column_options['columns'][$key]['rows'][$key1]['row_description_second'] . '</b>';

                        $column_options['columns'][$key]['rows'][$key1]['row_label_third'] = isset($column_options['columns'][$key]['rows'][$key1]['row_label_third']) ? $column_options['columns'][$key]['rows'][$key1]['row_label_third'] . '<br>' : '';
                        $column_options['columns'][$key]['rows'][$key1]['row_description_third'] = isset($column_options['columns'][$key]['rows'][$key1]['row_description_third']) ? $column_options['columns'][$key]['rows'][$key1]['row_description_third'] : '';

                        $column_options['columns'][$key]['rows'][$key1]['row_description_third'] = $column_options['columns'][$key]['rows'][$key1]['row_label_third'] . '<b>' . $column_options['columns'][$key]['rows'][$key1]['row_description_third'] . '</b>';
                    }
                    if ($reference_template == "arptemplate_10") {
                        $column_options['columns'][$key]['rows'][$key1]['row_description'] = $column_options['columns'][$key]['rows'][$key1]['row_label'] . '<b>' . $column_options['columns'][$key]['rows'][$key1]['row_description'] . '</b>';
                        $column_options['columns'][$key]['rows'][$key1]['row_label_second'] = isset($column_options['columns'][$key]['rows'][$key1]['row_label_second']) ? $column_options['columns'][$key]['rows'][$key1]['row_label_second'] : '';
                        $column_options['columns'][$key]['rows'][$key1]['row_description_second'] = isset($column_options['columns'][$key]['rows'][$key1]['row_description_second']) ? $column_options['columns'][$key]['rows'][$key1]['row_description_second'] : '';

                        $column_options['columns'][$key]['rows'][$key1]['row_description_second'] = $column_options['columns'][$key]['rows'][$key1]['row_label_second'] . '<b>' . $column_options['columns'][$key]['rows'][$key1]['row_description_second'] . '</b>';

                        $column_options['columns'][$key]['rows'][$key1]['row_label_third'] = isset($column_options['columns'][$key]['rows'][$key1]['row_label_third']) ? $column_options['columns'][$key]['rows'][$key1]['row_label_third'] : '';
                        $column_options['columns'][$key]['rows'][$key1]['row_description_third'] = isset($column_options['columns'][$key]['rows'][$key1]['row_description_third']) ? $column_options['columns'][$key]['rows'][$key1]['row_description_third'] : '';

                        $column_options['columns'][$key]['rows'][$key1]['row_description_third'] = $column_options['columns'][$key]['rows'][$key1]['row_label_third'] . '<b>' . $column_options['columns'][$key]['rows'][$key1]['row_description_third'] . '</b>';
                    }

                    
                    $row_custom_css = '';

                    if ($column_options['columns'][$key]['rows'][$key1]['row_des_style_bold'] == 'bold') {
                        $row_custom_css .='font-weight:bold;';
                    } else {
                        $row_custom_css .='font-weight:normal;';
                    }
                    if ($column_options['columns'][$key]['rows'][$key1]['row_des_style_italic'] == 'italic') {
                        $row_custom_css .='font-style:italic;';
                    }
                    if ($column_options['columns'][$key]['rows'][$key1]['row_des_style_decoration'] == 'underline') {
                        $row_custom_css .='text-decoration:underline;';
                    }
                    if ($column_options['columns'][$key]['rows'][$key1]['row_des_style_decoration'] == 'line-through') {
                        $row_custom_css .='text-decoration:line-through;';
                    }

                    $column_options['columns'][$key]['rows'][$key1]['row_custom_css'] = $row_custom_css;
                    $column_options['columns'][$key]['rows'][$key1]['row_hover_custom_css'] = '';
                    $column_options['columns'][$key]['rows'][$key1]['row_tooltip_second'] = '';
                    $column_options['columns'][$key]['rows'][$key1]['row_tooltip_third'] = '';
                    $column_options['columns'][$key]['rows'][$key1]['row_description_second'] = isset($column_options['columns'][$key]['rows'][$key1]['row_description_second']) ? $column_options['columns'][$key]['rows'][$key1]['row_description_second'] : '';
                    $column_options['columns'][$key]['rows'][$key1]['row_description_third'] = isset($column_options['columns'][$key]['rows'][$key1]['row_description_third']) ? $column_options['columns'][$key]['rows'][$key1]['row_description_third'] : '';
                }
            }

            $column_options = maybe_serialize($column_options);

            $qry_opt = $wpdb->prepare("UPDATE " . $wpdb->prefix . "arp_arprice_options SET `table_options` = %s WHERE `ID` = %d", $column_options, $newtemplateid);
            $wpdb->query($qry_opt);
        }


        
        global $arprice_images_css_version;
        $reference_id_array = array();
        $original_ref_template = $reference_template;
        $reference_id_array = explode("arptemplate_", $original_ref_template);
        $reference_id = $reference_id_array[1];


        if ($reference_id == 24)
            $reference_id = 21;
        else if ($reference_id == 23)
            $reference_id = 20;
        else if ($reference_id == 22)
            $reference_id = 19;
        else if ($reference_id == 21)
            $reference_id = 18;
        else if ($reference_id == 20)
            $reference_id = 17;

        $css_directory = PRICINGTABLE_DIR . '/css/templates';
        $file = $css_directory . '/arptemplate_' . $reference_id . '_v' . $arprice_images_css_version . '.css';
        $new_file = PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $newtemplateid . '.css';

        $css = file_get_contents($file);
        $css_content = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $newtemplateid, $css);
        $css_content = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_content);

        $wp_filesystem->put_contents($new_file, $css_content, 0777);
    }
}

if (version_compare($arp_newdbversion, '2.5.2', '<')) {
    global $wpdb, $arprice_images_css_version;

    $res = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice where is_template = %d ", 0), OBJECT_K);
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    WP_Filesystem();
    global $wp_filesystem;
    foreach ($res as $key => $val) {
        $newtemplateid = $val->ID;
        $original_general_options = $val->general_options;
        $general_options = maybe_unserialize($val->general_options);
        $reference_template = $general_options['general_settings']['reference_template'];
        
        global $arprice_images_css_version;
        $reference_id_array = array();
        $original_ref_template = $reference_template;
        $reference_id_array = explode("arptemplate_", $original_ref_template);
        $reference_id = $reference_id_array[1];


        if ($reference_id == 24)
            $reference_id = 21;
        else if ($reference_id == 23)
            $reference_id = 20;
        else if ($reference_id == 22)
            $reference_id = 19;
        else if ($reference_id == 21)
            $reference_id = 18;
        else if ($reference_id == 20)
            $reference_id = 17;
        else if ($reference_id == 25)
            $reference_id = 22;
        else if ($reference_id == 26)
            $reference_id = 23;

        $css_directory = PRICINGTABLE_DIR . '/css/templates';
        $file = $css_directory . '/arptemplate_' . $reference_id . '_v' . $arprice_images_css_version . '.css';
        $new_file = PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $newtemplateid . '.css';

        $css = file_get_contents($file);
        $css_content = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $newtemplateid, $css);
        $css_content = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_content);

        $wp_filesystem->put_contents($new_file, $css_content, 0777);
    }
}

if (version_compare($arp_newdbversion, '2.5.3', '<')) {
    global $wpdb, $arprice_images_css_version;

    $res = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice where is_template = %d ", 0), OBJECT_K);
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    WP_Filesystem();
    global $wp_filesystem;
    foreach ($res as $key => $val) {
        $newtemplateid = $val->ID;
        $original_general_options = $val->general_options;
        $general_options = maybe_unserialize($val->general_options);
        $reference_template = $general_options['general_settings']['reference_template'];
        
        global $arprice_images_css_version;
        $reference_id_array = array();
        $original_ref_template = $reference_template;
        $reference_id_array = explode("arptemplate_", $original_ref_template);
        $reference_id = $reference_id_array[1];


        if ($reference_id == 24)
            $reference_id = 21;
        else if ($reference_id == 23)
            $reference_id = 20;
        else if ($reference_id == 22)
            $reference_id = 19;
        else if ($reference_id == 21)
            $reference_id = 18;
        else if ($reference_id == 20)
            $reference_id = 17;
        else if ($reference_id == 25)
            $reference_id = 22;
        else if ($reference_id == 26)
            $reference_id = 23;


        if ($reference_id == 1 || $reference_id == 2 || $reference_id == 4 || $reference_id == 6 || $reference_id == 9 || $reference_id == 20 || $reference_id == 19) {
            $css_directory = PRICINGTABLE_DIR . '/css/templates';
            $file = $css_directory . '/arptemplate_' . $reference_id . '_v' . $arprice_images_css_version . '.css';
            $new_file = PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $newtemplateid . '.css';

            $css = file_get_contents($file);
            $css_content = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $newtemplateid, $css);
            $css_content = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_content);

            $wp_filesystem->put_contents($new_file, $css_content, 0777);
        }
    }
}

if (version_compare($arp_newdbversion, '2.5.4', '<')) {
	global $wpdb, $arprice_images_css_version;
       $res = $wpdb->get_results("SELECT ID,general_options FROM " . $wpdb->prefix . "arp_arprice order by id desc", OBJECT_K);      
                  
    foreach ($res as $key => $val) {    
        $newtemplateid = $val->ID;
        $general_options = maybe_unserialize($val->general_options);        
        $general_options['template_setting']['template_type'] = 'normal';
        $general_options = maybe_serialize($general_options);

        $qry = $wpdb->prepare("UPDATE " . $wpdb->prefix . "arp_arprice SET `general_options` = %s WHERE `ID` = %d", $general_options, $newtemplateid);

    }
    update_option('arp_enable_analytics','arp_enable_analytics');
}
if (version_compare($arp_newdbversion, '2.6', '<')) {
    $args = array(
        'role' => 'administrator',
        'fields' => 'id'
    );
    $users = get_users($args);
    if (count($users) > 0) {
        foreach ($users as $key => $user_id) {
            $arproles = $arp_pricingtable->arp_capabilities();
            $userObj = new WP_User($user_id);
            foreach ($arproles as $arprole => $arproledescription) {
                $userObj->add_cap($arprole);
            }
            unset($arprole);
            unset($arproles);
            unset($arproledescription);
        }
    }
}

if( version_compare($arp_newdbversion,'3.0','<') ){

    require PRICINGTABLE_VIEWS_DIR.'/upgrade_latest_data_v3.0.php';
}

if( version_compare($arp_newdbversion,'3.1','<')){

    global $wpdb,$arp_update_table,$arprice_import_export,$arp_pricingtable,$arprice_images_css_version;

    update_option('arp_db_version_before_3.1',$arp_newdbversion);


    $wp_upload_dir = wp_upload_dir();
    $source_dir = $wp_upload_dir['basedir'].'/arprice/css';
    $destination_dir = $wp_upload_dir['basedir'].'/arprice/css_backup_v3.1';

    $arp_pricingtable->arp_copy_folder($source_dir,$destination_dir,0755);
    
    $arp_all_templates = $wpdb->get_results($wpdb->prepare("SELECT ID FROM `".$wpdb->prefix."arp_arprice` WHERE `is_template` = %d",1));
    foreach( $arp_all_templates as $key => $template ){
        $table_id = $template->ID;
        $wpdb->delete(
            $wpdb->prefix.'arp_arprice',
            array( 'ID' => $table_id ),
            array( '%d' )
        );

        $wpdb->delete(
            $wpdb->prefix.'arp_arprice_options',
            array('table_id' => $table_id ),
            array('%d')
        );
    }


    $arp_update_table = true;
    include(PRICINGTABLE_CLASSES_DIR . '/class.arprice_default_templates.php');


    $all_created_tables = $wpdb->get_results( $wpdb->prepare("SELECT * FROM `".$wpdb->prefix."arp_arprice` WHERE `is_template` = %d AND `status` = %s",0,'published'));
    foreach( $all_created_tables as $k => $table ){
        $table_id = $table->ID;

        $general_options_updated = array();
        $general_options = maybe_unserialize($table->general_options);
        $general_options_updated = $general_options;
        $reference_template = $general_options['general_settings']['reference_template'];

        $ref_id = str_replace('arptemplate_', '', $reference_template);

        if( $ref_id >= 20 ){
            $ref_id = $ref_id - 3;
            $reference_template = 'arptemplate_'.$ref_id;
        }


        $tooltip_informative_icon = $general_options['tooltip_settings']['tooltip_informative_icon'];
        if( $tooltip_informative_icon != '' ){
            $tooltip_informative_icon = $arprice_import_export->update_fa_font_class($tooltip_informative_icon);
        }
        $general_options_updated['tooltip_settings']['tooltip_informative_icon'] = $tooltip_informative_icon;

        $toggle_yearly_text = $general_options['general_settings']['togglestep_yearly'];
        $toggle_monthly_text = $general_options['general_settings']['togglestep_monthly'];
        $toggle_quarterly_text = $general_options['general_settings']['togglestep_quarterly'];

        if( $toggle_yearly_text != '' ){
            $general_options_updated['general_settings']['togglestep_yearly'] = $arprice_import_export->update_fa_font_class($toggle_yearly_text);
        }

        if( $toggle_monthly_text != '' ){
            $general_options_updated['general_settings']['togglestep_monthly'] = $arprice_import_export->update_fa_font_class($toggle_monthly_text);
        }

        if( $toggle_quarterly_text != '' ){
            $general_options_updated['general_settings']['togglestep_quarterly'] = $arprice_import_export->update_fa_font_class($toggle_quarterly_text);
        }

        $final_updated_opts = maybe_serialize($general_options_updated);

        $wpdb->update(
            $wpdb->prefix.'arp_arprice',
            array( 'general_options' => $final_updated_opts ),
            array( 'ID' => $table_id ),
            array( '%s' ),
            array( '%d' )
        );

        $tableopts = $wpdb->get_row($wpdb->prepare("SELECT * FROM `".$wpdb->prefix."arp_arprice_options` WHERE table_id = %d",$table_id));

        $table_opt_id = $tableopts->ID;
        $table_opts = maybe_unserialize($tableopts->table_options);

        $column_opts = $table_opts['columns'];
        $new_column_opts = array();
        $total_tabs = $arp_pricingtable->arp_toggle_step_name();

        foreach( $column_opts as $c => $columns ){
            $g = 0;
            foreach( $total_tabs as $k => $tab_name ){
                if( $g == 0 ){
                    $columns['package_title'] = $arprice_import_export->update_fa_font_class($columns['package_title']);
                    $columns['arp_header_shortcode'] = $arprice_import_export->update_fa_font_class($columns['arp_header_shortcode']);
                    $columns['price_text'] = $arprice_import_export->update_fa_font_class($columns['price_text']);
                    $columns['column_description'] = $arprice_import_export->update_fa_font_class($columns['column_description']);
                    $columns['button_text'] = $arprice_import_export->update_fa_font_class($columns['button_text']);
                } else {
                    $columns['package_title_'.$tab_name[2]] = isset($columns['package_title_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['package_title_'.$tab_name[2]]) : '';
                    $columns['arp_header_shortcode_'.$tab_name[2]] =  isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['arp_header_shortcode_'.$tab_name[2]]) : '';
                    $columns['price_text_'.$tab_name[3].'_step'] =  isset($columns['price_text_'.$tab_name[3].'_step']) ? $arprice_import_export->update_fa_font_class($columns['price_text_'.$tab_name[3].'_step']) : '';
                    $columns['column_description_'.$tab_name[2]] = isset($columns['column_description_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['column_description_'.$tab_name[2]]) : '';
                    $columns['btn_content_'.$tab_name[2]] = isset($columns['btn_content_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['btn_content_'.$tab_name[2]]) : '';
                }
                $g++;
            }

            $column_opts[$c] = $columns;
            if( is_array( $columns['rows']) && count($columns['rows']) > 0 ){
                foreach( $columns['rows'] as $r => $row ){
                    $g = 0;
                    foreach( $total_tabs as $key => $tab_name ){

                        if( $g == 0 ){
                            $row['row_description'] = $arprice_import_export->update_fa_font_class($row['row_description']);
                            $column_opts[$c]['rows'][$r]['row_description'] = $row['row_description'];
                            $row['row_tooltip'] = $arprice_import_export->update_fa_font_class($row['row_tooltip']);
                            $column_opts[$c]['rows'][$r]['row_tooltip'] = $row['row_tooltip'];
                        } else {
                            $row['row_description_'.$tab_name[2]] = isset($row['row_description_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class( $row['row_description_'.$tab_name[2]] ) : '';
                            $column_opts[$c]['rows'][$r]['row_description_'.$tab_name[2]] = $row['row_description_'.$tab_name[2]];
                            $row['row_tooltip_'.$tab_name[2]] = isset($row['row_tooltip_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class( $row['row_tooltip_'.$tab_name[2]]) : '';
                            $column_opts[$c]['rows'][$r]['row_tooltip_'.$tab_name[2]] = $row['row_tooltip_'.$tab_name[2]];
                        }

                        $g++;
                    }
                }
            }
        }

        $new_column_opts['columns'] = $column_opts;

        $final_updated_cols = maybe_serialize($new_column_opts);

        $wpdb->update(
            $wpdb->prefix.'arp_arprice_options',
            array( 'table_options' => $final_updated_cols ),
            array( 'table_id' => $table_id, 'ID' => $table_opt_id ),
            array( '%s' ),
            array( '%d','%d')
        );

        WP_Filesystem();

        global $wp_filesystem;

        $css_file_name = 'arptemplate_'.$table_id.'.css';
        
        $ref_css_file_name = PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css';
        
        $css_file_content = file_get_contents($ref_css_file_name);

        $css_new = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $table_id, $css_file_content);

        $css_new = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_new);

        $path = PRICINGTABLE_UPLOAD_DIR . '/css/';

        $file_name = 'arptemplate_' . $table_id . '.css';

        $wp_filesystem->put_contents($path . $file_name, $css_new, 0777);

    }

}

if( version_compare( $arp_newdbversion, '3.5', '<' ) ){
    require PRICINGTABLE_VIEWS_DIR.'/upgrade_latest_data_v3.5.php';
}

if( version_compare( $arp_newdbversion, '3.8', '<' ) ){
	@set_time_limit(0);
    global $arprice_import_export,$arp_pricingtable,$arprice_images_css_version,$arp_update_table;

    update_option('arp_db_version_before_3.8',$arp_newdbversion);

    $arp_all_templates = $wpdb->get_results($wpdb->prepare("SELECT ID FROM `".$wpdb->prefix."arp_arprice` WHERE `is_template` = %d",1));
    foreach( $arp_all_templates as $key => $template ){
        $table_id = $template->ID;
        $wpdb->delete(
            $wpdb->prefix.'arp_arprice',
            array( 'ID' => $table_id ),
            array( '%d' )
        );

        $wpdb->delete(
            $wpdb->prefix.'arp_arprice_options',
            array('table_id' => $table_id ),
            array('%d')
        );
    }


    $arp_update_table = true;
    include(PRICINGTABLE_CLASSES_DIR . '/class.arprice_default_templates.php');

    $all_created_tables = $wpdb->get_results( $wpdb->prepare("SELECT * FROM `".$wpdb->prefix."arp_arprice` WHERE `is_template` = %d AND `status` = %s",0,'published'));

    if( !empty( $all_created_tables ) ){
        foreach( $all_created_tables as $k => $table ){
            $table_id = $table->ID;

            $general_options_updated = array();
            $general_options = maybe_unserialize($table->general_options);
            $general_options_updated = $general_options;

            $reference_template = $general_options['general_settings']['reference_template'];

            $ref_id = str_replace('arptemplate_', '', $reference_template);

            if( $ref_id >= 20 ){
                $ref_id = $ref_id - 3;
                $reference_template = 'arptemplate_'.$ref_id;
            }

            $tooltip_informative_icon = $general_options['tooltip_settings']['tooltip_informative_icon'];
            
            if( $tooltip_informative_icon != '' ){
                $tooltip_informative_icon = $arprice_import_export->update_fa_font_class($tooltip_informative_icon);
            }
            
            $general_options_updated['tooltip_settings']['tooltip_informative_icon'] = $tooltip_informative_icon;

            $total_tabs = $arp_pricingtable->arp_toggle_step_name();

            foreach( $total_tabs as $k => $tab_name ){
                $toggle_step_data = !empty( $general_options['general_settings'][$tab_name[1]] ) ? $general_options['general_settings'][$tab_name[1]] : '';

                if( !empty( $toggle_step_data ) ){
                    $general_options_updated['general_settings'][$tab_name[1]] = $arprice_import_export->update_fa_font_class( $toggle_step_data );
                }
            }
            $min_row_height_arr = $arp_pricingtable->arp_min_height_row_arr();

            $general_options_updated['column_settings']['min_row_height'] = $min_row_height_arr[ $reference_template ];

            $general_options_updated['column_settings']['column_toggle_effect'] = 'fade';

            $general_options_updated['column_animation']['visible_columns_tablet'] = 2;

            $final_updated_opts = maybe_serialize($general_options_updated);

            $wpdb->update(
                $wpdb->prefix.'arp_arprice',
                array( 'general_options' => $final_updated_opts ),
                array( 'ID' => $table_id ),
                array( '%s' ),
                array( '%d' )
            );

            $tableopts = $wpdb->get_row($wpdb->prepare("SELECT * FROM `".$wpdb->prefix."arp_arprice_options` WHERE table_id = %d",$table_id));

            $table_opt_id = $tableopts->ID;
            $table_opts = maybe_unserialize($tableopts->table_options);

            $column_opts = $table_opts['columns'];
            $new_column_opts = array();

            foreach( $column_opts as $c => $columns ){
                $g = 0;
                foreach( $total_tabs as $k => $tab_name ){
                    if( $g == 0 ){
                        $columns['package_title'] = $arprice_import_export->update_fa_font_class($columns['package_title']);
                        $columns['arp_header_shortcode'] = $arprice_import_export->update_fa_font_class($columns['arp_header_shortcode']);
                        $columns['price_text'] = $arprice_import_export->update_fa_font_class($columns['price_text']);
                        $columns['column_description'] = $arprice_import_export->update_fa_font_class($columns['column_description']);
                        $columns['button_text'] = $arprice_import_export->update_fa_font_class($columns['button_text']);
                    } else {
                        $columns['package_title_'.$tab_name[2]] = isset($columns['package_title_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['package_title_'.$tab_name[2]]) : '';
                        $columns['arp_header_shortcode_'.$tab_name[2]] =  isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['arp_header_shortcode_'.$tab_name[2]]) : '';
                        $columns['price_text_'.$tab_name[3].'_step'] =  isset($columns['price_text_'.$tab_name[3].'_step']) ? $arprice_import_export->update_fa_font_class($columns['price_text_'.$tab_name[3].'_step']) : '';
                        $columns['column_description_'.$tab_name[2]] = isset($columns['column_description_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['column_description_'.$tab_name[2]]) : '';
                        $columns['btn_content_'.$tab_name[2]] = isset($columns['btn_content_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['btn_content_'.$tab_name[2]]) : '';
                    }
                    $g++;
                }

                $column_opts[$c] = $columns;
                if( isset( $columns['rows'] ) && is_array( $columns['rows']) && count($columns['rows']) > 0 ){
                    foreach( $columns['rows'] as $r => $row ){
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){

                            if( $g == 0 ){
                                $row['row_description'] = $arprice_import_export->update_fa_font_class($row['row_description']);
                                $column_opts[$c]['rows'][$r]['row_description'] = $row['row_description'];
                                $row['row_tooltip'] = $arprice_import_export->update_fa_font_class($row['row_tooltip']);
                                $column_opts[$c]['rows'][$r]['row_tooltip'] = $row['row_tooltip'];
                            } else {
                                $row['row_description_'.$tab_name[2]] = isset($row['row_description_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class( $row['row_description_'.$tab_name[2]] ) : '';
                                $column_opts[$c]['rows'][$r]['row_description_'.$tab_name[2]] = $row['row_description_'.$tab_name[2]];
                                $row['row_tooltip_'.$tab_name[2]] = isset($row['row_tooltip_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class( $row['row_tooltip_'.$tab_name[2]]) : '';
                                $column_opts[$c]['rows'][$r]['row_tooltip_'.$tab_name[2]] = $row['row_tooltip_'.$tab_name[2]];
                            }

                            $g++;
                        }
                    }
                }
            }

            $new_column_opts['columns'] = $column_opts;

            $final_updated_cols = maybe_serialize($new_column_opts);

            $wpdb->update(
                $wpdb->prefix.'arp_arprice_options',
                array( 'table_options' => $final_updated_cols ),
                array( 'table_id' => $table_id, 'ID' => $table_opt_id ),
                array( '%s' ),
                array( '%d','%d')
            );

            WP_Filesystem();

            global $wp_filesystem;

            $css_file_name = 'arptemplate_'.$table_id.'.css';
            
            $ref_css_file_name = PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css';
            
            $css_file_content = file_get_contents($ref_css_file_name);

            $css_new = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $table_id, $css_file_content);

            $css_new = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_new);

            $path = PRICINGTABLE_UPLOAD_DIR . '/css/';

            $file_name = 'arptemplate_' . $table_id . '.css';

            $wp_filesystem->put_contents($path . $file_name, $css_new, 0777);
        }
    }
}

if( version_compare( $arp_newdbversion, '3.9', '<' ) ){

    global $arprice_import_export,$arp_pricingtable,$arprice_images_css_version,$arp_update_table;

    update_option('arp_db_version_before_3.9',$arp_newdbversion);

    $arp_all_templates = $wpdb->get_results($wpdb->prepare("SELECT ID FROM `".$wpdb->prefix."arp_arprice` WHERE `is_template` = %d",1));
    foreach( $arp_all_templates as $key => $template ){
        $table_id = $template->ID;
        $wpdb->delete(
            $wpdb->prefix.'arp_arprice',
            array( 'ID' => $table_id ),
            array( '%d' )
        );

        $wpdb->delete(
            $wpdb->prefix.'arp_arprice_options',
            array('table_id' => $table_id ),
            array('%d')
        );
    }

    $arp_update_table = true;
    include(PRICINGTABLE_CLASSES_DIR . '/class.arprice_default_templates.php');

    $arp_template_ids = array();

    $arp_all_tables = $wpdb->get_results( $wpdb->prepare("SELECT ID FROM `".$wpdb->prefix."arp_arprice` WHERE `is_template` = %d AND `status` = %s", 0,'published'));


    if( !empty( $arp_all_tables ) ){
        foreach( $arp_all_tables as $arp_table ){
            array_push( $arp_template_ids, $arp_table->ID );
        }
    }

    update_option( 'arprice_version_v39_updated_forms', $arp_template_ids );

}

update_option('arprice_version', '3.9');

update_option('arprice_version_updated','1');

$arp_newdbversion = '3.9';

update_option( 'arprice_updated_date_'.$arp_newdbversion, current_time( 'mysql' ) );
?>