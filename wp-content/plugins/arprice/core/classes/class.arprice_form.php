<?php

class arprice_form {

    function __construct() {
        add_action('wp_ajax_add_price_table', array($this, 'arp_add_pricing_table'));

        add_action('wp_ajax_add_new_row', array($this, 'add_new_row_new'));

        add_action('wp_ajax_update_price_table', array($this, 'update_price_table'));

        add_action('init', array($this, 'parse_standalone_request'), 10);

        add_shortcode('arp_header_image', array($this, 'arp_header_image_shortcode'));

        add_shortcode('arp_youtube_video', array($this, 'arp_youtube_video_shortcode'));

        add_shortcode('arp_vimeo_video', array($this, 'arp_vimeo_video_shortcode'));

        add_shortcode('arp_screenr_video', array($this, 'arp_screenr_video_shortcode'));

        add_shortcode('arp_html5_video', array($this, 'arp_html5_video_shortcode'));

        add_shortcode('arp_html5_audio', array($this, 'arp_html5_audio_shortcode'));

        add_shortcode('arp_googlemap', array($this, 'arp_googlemap_shortcode'));

        add_shortcode('arp_dailymotion_video', array($this, 'arp_dailymotion_video_shortcode'));

        add_shortcode('arp_metacafe_video', array($this, 'arp_metacafe_video_shortcode'));

        add_shortcode('arp_soundcloud_audio', array($this, 'arp_soundcloud_audio_shortcode'));

        add_shortcode('arp_mixcloud_audio', array($this, 'arp_mixcloud_audio_shortcode'));

        add_shortcode('arp_beatport_audio', array($this, 'arp_beatport_audio_shortcode'));

        add_shortcode('arp_embed', array($this, 'arp_embed_shortcode'));

        add_action('wp_ajax_arp_updatetabledata', array($this, 'arp_updatetabledata'));

        add_action('wp_ajax_load_pricing_table', array($this, 'arp_load_pricing_table'));

        add_filter('widget_text', array($this, 'arp_widget_text_filter'), 9);

        add_action('wp_ajax_arp_save_template_image', array($this, 'arp_save_template_image'));

        add_action('wp_ajax_update_arp_tour_guide_value', array($this, 'update_arp_tour_guide_value'));

        add_action('wp_ajax_save_pricing_table', array($this, 'arp_save_pricing_table'));

        add_action('wp_ajax_arp_get_migrate_template',array($this,'arp_get_templates_tobe_migrated'));

        add_action('wp_footer', array($this,'arp_load_js_on_footer'));

        add_action('wp_ajax_arp_remove_preview_opt', array( $this, 'arp_remove_preview_data') );
    }

	function arp_save_pricing_table() {
        global $wpdb, $arprice_version, $arprice_images_css_version,$arp_pricingtable;

        $_POST = json_decode(stripslashes_deep($_POST['filtered_data']), true);

        $_POST = apply_filters('arp_change_values_before_update_pricing_table', $_POST);

        $pt_action = sanitize_text_field( $_POST['pt_action'] );

        $check_caps = $arp_pricingtable->arprice_check_user_cap('arp_add_udpate_pricingtables',true);

        if( $check_caps != 'success' ){
            $check_caps_msg = json_decode($check_caps,true);
            if( !empty( $check_caps_msg[1] ) && 'security_error' == $check_caps_msg[1] ){
                echo 'reauth';
            } else {
                echo 'error~|~'.$check_caps_msg[0];
            }
            die;
        }

        $column = array();

        if ($pt_action == "edit") {
            $table_id = isset($_POST['table_id']) ? intval($_POST['table_id']) : '';
        }

        $arp_allowed_html = $arp_pricingtable->arprice_allowed_html_tags();

        if ($pt_action == "new") {
            $is_template = 0;
        } else {
            $get_is_template = $wpdb->get_results($wpdb->prepare("SELECT is_template FROM {$wpdb->prefix}arp_arprice WHERE ID = %d", $table_id));

            $is_template = $get_is_template[0]->is_template;
        }

        do_action('arp_before_update_pricing_table', $_POST);

        $main_table_title = isset($_POST['pricing_table_main']) ? stripslashes_deep(sanitize_text_field($_POST['pricing_table_main'])) : '';

        $is_tbl_preview = ( isset($_POST['is_tbl_preview']) and $_POST['is_tbl_preview'] == 1 ) ? 1 : 0;

        $dt = current_time('mysql');

        $all_columns_data = json_decode( $_POST['arp_table_data'], true );

        $total = isset($_POST['added_package']) ? intval($_POST['added_package']) : '';

        if ($main_table_title == "" && !$is_tbl_preview) {
            return;
        }
        if( isset($_POST['pt_coloumn_order']) ){
            parse_str($_POST['pt_coloumn_order'], $pt_coloumn_order);
        }

        $template = isset($_POST['arp_template']) ? stripslashes_deep(sanitize_text_field($_POST['arp_template'])) : '';
        $template_name = isset($_POST['arp_template_name']) ? stripslashes_deep(sanitize_text_field($_POST['arp_template_name'])) : '';

        $template_skin = isset($_POST['arp_template_skin_editor']) ? stripslashes_deep(sanitize_text_field($_POST['arp_template_skin_editor'])) : '';
        $template_type = isset($_POST['arp_template_type']) ? stripslashes_deep(sanitize_text_field($_POST['arp_template_type'])) : '';
        $arp_template_custom_color = isset($_POST['arp_custom_color_code']) ? stripslashes_deep(sanitize_text_field($_POST['arp_custom_color_code'])) : '';

        $template_feature = isset($_POST['template_feature']) ? json_decode(stripslashes_deep($_POST['template_feature']), true) : array();

        $template_setting = array(
        	'template' => $template,
        	'skin' => $template_skin,
        	'template_type' => $template_type,
        	'features' => $template_feature,
        	'custom_color_code' => $arp_template_custom_color
        );

        $custom_css = isset($_POST['arp_custom_css']) ? stripslashes_deep(sanitize_text_field($_POST['arp_custom_css'])) : '';
        $enable_toggle_price = (isset($_POST['enable_toggle_price']) && $_POST['enable_toggle_price'] == 1) ? 1 : 0;
        $toggle_copy_data_to_other_step = (isset($_POST['toggle_copy_data_to_other_step']) && $_POST['toggle_copy_data_to_other_step'] == 1) ? 1 : 0;
        $step_options_main = isset($_POST['step_options_main']) ? intval( $_POST['step_options_main'] ) : '';
        $toggle_button_verticle_space = isset($_POST['toggle_button_verticle_space']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_button_verticle_space'])) : '';

        $togglestep_yearly = isset($_POST['togglestep_yearly']) ? stripslashes_deep(sanitize_text_field($_POST['togglestep_yearly'])) : '';
        $togglestep_monthly = isset($_POST['togglestep_monthly']) ? stripslashes_deep(sanitize_text_field($_POST['togglestep_monthly'])) : '';
        $togglestep_quarterly = isset($_POST['togglestep_quarterly']) ? stripslashes_deep(sanitize_text_field($_POST['togglestep_quarterly'])) : '';
        $togglestep_weekly = isset($_POST['togglestep_weekly']) ? stripslashes_deep(sanitize_text_field($_POST['togglestep_weekly'])) : '';
        $togglestep_daily = isset($_POST['togglestep_daily']) ? stripslashes_deep(sanitize_text_field($_POST['togglestep_daily'])) : '';
        $togglestep_step6 = isset($_POST['togglestep_step6']) ? stripslashes_deep(sanitize_text_field($_POST['togglestep_step6'])) : '';
        $togglestep_step7 = isset($_POST['togglestep_step7']) ? stripslashes_deep(sanitize_text_field($_POST['togglestep_step7'])) : '';
        $togglestep_step8 = isset($_POST['togglestep_step8']) ? stripslashes_deep(sanitize_text_field($_POST['togglestep_step8'])) : '';
        
        $setas_default_toggle = isset($_POST['setas_default_toggle']) ? intval($_POST['setas_default_toggle']) : '';
        $toggle_option_main = isset($_POST['toggle_option_main']) ? intval($_POST['toggle_option_main']) : '';
        $toggle_options_mobile_view = isset($_POST['toggle_options_mobile_view']) ? intval($_POST['toggle_options_mobile_view']) : '';

        $toggle_active_color =  isset($_POST['toggle_active_color']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_active_color'])) : '';
        $toggle_active_text_color = isset($_POST['toggle_active_text_color']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_active_text_color'])) : '';
        $toggle_inactive_color = isset($_POST['toggle_inactive_color']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_inactive_color'])) : '';
        $toggle_label_content = isset($_POST['toggle_label_content']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_label_content'])) : '';
        $label_position_main = isset($_POST['label_position_main']) ? intval($_POST['label_position_main']) :'';
        $toggle_main_color = isset($_POST['toggle_main_color']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_main_color'])) : '';

        $toggle_title_font_family = isset($_POST['toggle_title_font_family']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_title_font_family'])) : '';
        $toggle_title_font_size = isset($_POST['toggle_title_font_size']) ? intval($_POST['toggle_title_font_size']) : '';
        $toggle_title_font_color = isset($_POST['toggle_title_font_color']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_title_font_color'])) : '';
        $toggle_title_font_style_bold = isset($_POST['toggle_title_font_style_bold']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_title_font_style_bold'])) : '';
        $toggle_title_font_style_italic = isset($_POST['toggle_title_font_style_italic']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_title_font_style_italic'])) : '';
        $toggle_title_font_style_decoration = isset($_POST['toggle_title_font_style_decoration']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_title_font_style_decoration'])) : '';
        $toggle_button_font_family = isset($_POST['toggle_button_font_family']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_button_font_family'])) : '';
        $toggle_button_font_size = isset($_POST['toggle_button_font_size']) ? intval($_POST['toggle_button_font_size']) : '';
        $toggle_button_font_color = isset($_POST['toggle_button_font_color']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_button_font_color'])) : '';
        $toggle_button_font_style_bold = isset($_POST['toggle_button_font_style_bold']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_button_font_style_bold'])) : '';
        $toggle_button_font_style_italic = isset($_POST['toggle_button_font_style_italic']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_button_font_style_italic'])) : '';
        $toggle_button_font_style_decoration = isset($_POST['toggle_button_font_style_decoration']) ? stripslashes_deep(sanitize_text_field($_POST['toggle_button_font_style_decoration'])) : '';


        $column_order = isset($_POST['pricing_table_column_order']) ? stripslashes_deep(sanitize_text_field($_POST['pricing_table_column_order'])) : '';

        $column_ord = str_replace('\'', '"', $column_order);
        $col_ord_arr = json_decode($column_ord, true);

        if ($_POST['has_caption_column'] == 1 and ! in_array('main_column_0', $col_ord_arr))
            array_unshift($col_ord_arr, 'main_column_0');
        $new_id = array();

        if (is_array($col_ord_arr) and count($col_ord_arr) > 0) {
            foreach ($col_ord_arr as $key => $value)
                $new_id[$key] = str_replace('main_column_', '', $value);
        }

        $total = count($new_id);

        if( $total > 0 ){
            $total = max($new_id);
        }

        if( $total == 0 && count($new_id) == 1 ){
            $total = 1;
        }

        $column_order = json_encode($col_ord_arr);

        $reference_template = isset($_POST['arp_reference_template']) ? stripslashes_deep(sanitize_text_field($_POST['arp_reference_template'])) : '';

        $user_edited_columns = isset($_POST['arp_user_edited_columns']) ? json_decode(stripslashes_deep($_POST['arp_user_edited_columns']), true) : array();

        $general_settings = array(
            'arp_custom_css' => $custom_css,
            'column_order' => $column_order,
            'reference_template' => $reference_template,
            'user_edited_columns' => $user_edited_columns,
            'enable_toggle_price' => $enable_toggle_price,
            'toggle_copy_data_to_other_step' => $toggle_copy_data_to_other_step,
            'arp_step_main' => $step_options_main,
            'toggle_button_verticle_space' => $toggle_button_verticle_space,
            'setas_default_toggle' => $setas_default_toggle,
            'arp_toggle_main' => $toggle_option_main,
            'toggle_mobile_style' => $toggle_options_mobile_view,
            'toggle_active_color' => $toggle_active_color,
            'toggle_active_text_color' => $toggle_active_text_color,
            'toggle_inactive_color' => $toggle_inactive_color,
            'toggle_label_content' => $toggle_label_content,
            'arp_label_position_main' => $label_position_main,
            'toggle_main_color' => $toggle_main_color,
            'toggle_title_font_family' => $toggle_title_font_family,
            'toggle_title_font_size' => $toggle_title_font_size,
            'toggle_title_font_color' => $toggle_title_font_color,
            'toggle_title_font_style_bold' => $toggle_title_font_style_bold,
            'toggle_title_font_style_italic' => $toggle_title_font_style_italic,
            'toggle_title_font_style_decoration' => $toggle_title_font_style_decoration,
            'toggle_button_font_family' => $toggle_button_font_family,
            'toggle_button_font_size' => $toggle_button_font_size,
            'toggle_button_font_color' => $toggle_button_font_color,
            'toggle_button_font_style_bold' => $toggle_button_font_style_bold,
            'toggle_button_font_style_italic' => $toggle_button_font_style_italic,
            'toggle_button_font_style_decoration' => $toggle_button_font_style_decoration
        );

        $total_tabs = $arp_pricingtable->arp_toggle_step_name();

        foreach($total_tabs as $key => $tab_name){

            $general_settings[$tab_name[1]] = isset($_POST[$tab_name[1]]) ? $_POST[$tab_name[1]] : '';

        }

        $general_settings = apply_filters('arp_update_general_settings_from_outside_while_saving',$general_settings,$_POST);

        $button_shadow_clr = isset($_POST['button_shadow_color']) ? stripslashes_deep(sanitize_text_field($_POST['button_shadow_color'])) :'';
        $button_radius = isset($_POST['button_radius']) ? intval($_POST['button_radius']) : '';

        $header_font_setting = array(
        	'font_family' 	=> array(),
        	'font_size' 	=> array(),
        	'font_color' 	=> array(),
        	'font_style' 	=> array()
        );
        $price_font_setting = array(
        	'font_family' 	=> array(),
        	'font_size' 	=> array(),
        	'font_color' 	=> array(),
        	'font_style' 	=> array()
        );
        $price_text_font_setting = array(
        	'font_family' 	=> array(),
        	'font_size' 	=> array(),
        	'font_color' 	=> array(),
        	'font_style' 	=> array()
        );
        $content_font_setting = array(
        	'font_family' 	=> array(),
        	'font_size' 	=> array(),
        	'font_color' 	=> array(),
        	'font_style' 	=> array()
        );
        $button_font_setting = array(
        	'font_family' 	=> array(),
        	'font_size' 	=> array(),
        	'font_color' 	=> array(),
        	'font_style' 	=> array())
        ;
        $button_settings = array('button_shadow_color' => $button_shadow_clr, 'button_radius' => $button_radius);

        $font_setting = array(
        	'header_fonts' 		=> $header_font_setting,
        	'price_fonts' 		=> $price_font_setting,
        	'price_text_fonts' 	=> $price_text_font_setting,
        	'content_fonts' 	=> $content_font_setting,
        	'button_fonts' 		=> $button_font_setting
        );

        $column_space = isset($_POST['column_space']) ? intval($_POST['column_space']) : '';
        $min_row_height = isset($_POST['min_row_height']) ? intval($_POST['min_row_height']) : '';
        $hover_highlight = isset($_POST['column_high_on_hover']) ? stripslashes_deep( sanitize_text_field($_POST['column_high_on_hover'])) : '';
        $is_responsive = isset($_POST['is_responsive']) ? intval($_POST['is_responsive']) : '';
        $all_column_width = isset($_POST['all_column_width']) ? intval($_POST['all_column_width']) : '';

        $arp_row_border_size = isset($_POST['arp_row_border_size']) ? intval($_POST['arp_row_border_size']) : '';
        $arp_row_border_type = isset($_POST['arp_row_border_type']) ? stripslashes_deep(sanitize_text_field($_POST['arp_row_border_type'])) : '';
        $arp_row_border_color = isset($_POST['arp_row_border_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_row_border_color'])) : '';

        $arp_caption_row_border_size = isset($_POST['arp_caption_row_border_size']) ? intval($_POST['arp_caption_row_border_size']) : '';
        $arp_caption_row_border_style = isset($_POST['arp_caption_row_border_style']) ? stripslashes_deep(sanitize_text_field($_POST['arp_caption_row_border_style'])) : '';
        $arp_caption_row_border_color = '';
        

        $arp_column_border_size = isset($_POST['arp_column_border_size']) ? intval($_POST['arp_column_border_size']) : '';
        $arp_column_border_type = isset($_POST['arp_column_border_type']) ? stripslashes_deep(sanitize_text_field($_POST['arp_column_border_type'])) : '';
        $arp_column_border_color = isset($_POST['arp_column_border_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_column_border_color'])) : '';

        $arp_column_border_left = isset($_POST['arp_column_border_left']) ? intval($_POST['arp_column_border_left']) : '';
        $arp_column_border_right = isset($_POST['arp_column_border_right']) ? intval($_POST['arp_column_border_right']) : '';
        $arp_column_border_top = isset($_POST['arp_column_border_top']) ? intval($_POST['arp_column_border_top']) : '';
        $arp_column_border_bottom = isset($_POST['arp_column_border_bottom']) ? intval($_POST['arp_column_border_bottom']) : '';



        $arp_caption_border_color = '';
        $arp_caption_border_style = '';
        $arp_caption_border_size = '';

        $arp_caption_border_left = '';
        $arp_caption_border_right = '';
        $arp_caption_border_top = '';
        $arp_caption_border_bottom = '';

        if( isset( $_POST['has_caption_column'] ) && $_POST['has_caption_column'] == 1 ){
            $caption_column_data = $all_columns_data['column_0']['column_section'];
            $caption_color_data = $all_columns_data['column_0']['color_section'];
           
            $arp_caption_border_size = isset( $caption_column_data['caption_border_size'] ) ? intval( $caption_column_data['caption_border_size'] ) : '';
            $arp_caption_border_style = isset( $caption_column_data['caption_border_style'] ) ? stripslashes_deep( sanitize_text_field( $caption_column_data['caption_border_style'] ) ) : '';
            $arp_caption_border_left = isset($caption_column_data['caption_border_left']) ? intval( $caption_column_data['caption_border_left'] ) : '';
            $arp_caption_border_right = isset($caption_column_data['caption_border_right']) ? intval( $caption_column_data['caption_border_right'] ) : '';
            $arp_caption_border_top = isset($caption_column_data['caption_border_top']) ? intval( $caption_column_data['caption_border_top'] ) : '';
            $arp_caption_border_bottom = isset($caption_column_data['caption_border_bottom']) ? intval( $caption_column_data['caption_border_bottom'] ) : '';
            $arp_caption_border_color = isset( $caption_color_data['caption_border_color'] ) ? stripslashes_deep( sanitize_text_field( $caption_color_data['caption_border_color'] ) ) : '';
            $arp_caption_row_border_color = isset( $caption_color_data['caption_row_border_color'] ) ? stripslashes_deep( sanitize_text_field( $caption_color_data['caption_row_border_color'] ) ) : '';
        }


        $hide_caption_column = isset($_POST['hide_caption_column']) ? intval($_POST['hide_caption_column']) : '';
        $full_column_clickable = isset($_POST['full_column_clickable']) ? intval($_POST['full_column_clickable']) :'';
        $enable_hover_effect = isset($_POST['enable_hover_effect']) ? intval($_POST['enable_hover_effect']) : 0;
        $hide_footer_global = isset($_POST['hide_footer_global']) ? intval($_POST['hide_footer_global']) : '';
        $hide_header_global = isset($_POST['hide_header_global']) ? intval($_POST['hide_header_global']) : '';
        $hide_price_global = isset($_POST['hide_price_global']) ? intval($_POST['hide_price_global']) : '';
        $hide_feature_global = isset($_POST['hide_feature_global']) ? intval($_POST['hide_feature_global']) : '';
        $hide_description_global = isset($_POST['hide_description_global']) ? intval($_POST['hide_description_global']) :'';
        $hide_header_shortcode_global = isset($_POST['hide_header_shortcode_global']) ? intval($_POST['hide_header_shortcode_global']) :'';

        $column_opacity = isset($_POST['column_opacity']) ? stripslashes_deep(sanitize_text_field($_POST['column_opacity'])) : '';
        $column_wrapper_width_txtbox = isset($_POST['column_wrapper_width_txtbox']) ? intval($_POST['column_wrapper_width_txtbox']) : '';
        $column_wrapper_width_style = isset($_POST['column_wrapper_width_style']) ? stripslashes_deep(sanitize_text_field($_POST['column_wrapper_width_style'])) : '';

        $display_column_mobile = isset($_POST['arp_display_columns_mobile']) ? stripslashes_deep(sanitize_text_field($_POST['arp_display_columns_mobile'])) :'';
        $display_column_tablet = isset($_POST['arp_display_columns_tablet']) ? stripslashes_deep(sanitize_text_field($_POST['arp_display_columns_tablet'])) : '';
        $display_column_desktop = isset($_POST['arp_display_columns_desktop']) ? stripslashes_deep(sanitize_text_field($_POST['arp_display_columns_desktop'])) : '';

        $column_box_shadow_effect = isset($_POST['column_box_shadow_effect']) ? stripslashes_deep(sanitize_text_field($_POST['column_box_shadow_effect'])) :'';
        $toggle_column_animation = isset($_POST['toggle_column_animation']) ? intval($_POST['toggle_column_animation']) : '';
        $toggle_effect_animation = isset($_POST['column_toggle_effect'] ) ? stripslashes_deep( sanitize_text_field( $_POST['column_toggle_effect'] ) ) : '';

        $column_border_radius_top_left = ( isset($_POST['column_border_radius_top_left']) && !empty($_POST['column_border_radius_top_left']) ) ? intval($_POST['column_border_radius_top_left']) : 0;
        $column_border_radius_top_right = ( isset($_POST['column_border_radius_top_right']) && !empty($_POST['column_border_radius_top_right']) ) ? intval($_POST['column_border_radius_top_right']) : 0;
        $column_border_radius_bottom_right = ( isset($_POST['column_border_radius_bottom_right']) && !empty($_POST['column_border_radius_bottom_right']) ) ? intval($_POST['column_border_radius_bottom_right']) : 0;
        $column_border_radius_bottom_left = ( isset($_POST['column_border_radius_bottom_left']) && !empty($_POST['column_border_radius_bottom_left']) ) ? intval($_POST['column_border_radius_bottom_left']) : 0;
        $column_hide_blank_rows = isset($_POST['hide_blank_rows']) ? stripslashes_deep(sanitize_text_field($_POST['hide_blank_rows'])) : '';

        $global_button_border_width = isset($_POST['arp_global_button_border_width']) ? intval($_POST['arp_global_button_border_width']) :'';
        $global_button_border_type = isset($_POST['arp_global_button_border_style']) ? stripslashes_deep(sanitize_text_field($_POST['arp_global_button_border_style'])) :'';
        $global_button_border_color = isset($_POST['arp_global_button_border_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_global_button_border_color'])) : '';
        $global_button_border_radius_top_left = isset($_POST['global_button_border_radius_top_left']) ? intval($_POST['global_button_border_radius_top_left']) :'';
        $global_button_border_radius_top_right = isset($_POST['global_button_border_radius_top_right']) ? intval($_POST['global_button_border_radius_top_right']): '';
        $global_button_border_radius_bottom_left = isset($_POST['global_button_border_radius_bottom_left']) ? intval($_POST['global_button_border_radius_bottom_left']) :'';
        $global_button_border_radius_bottom_right = isset($_POST['global_button_border_radius_bottom_right']) ? intval($_POST['global_button_border_radius_bottom_right']) :'';
        $arp_global_button_border_type = isset($_POST['arp_global_button_type']) ? stripslashes_deep(sanitize_text_field($_POST['arp_global_button_type'])) :'';
        $enable_button_hover_effect = isset($_POST['enable_button_hover_effect']) ? intval($_POST['enable_button_hover_effect']) : '';

        $arp_common_font_family_global = isset($_POST['arp_common_font_family_global']) ? stripslashes_deep(sanitize_text_field($_POST['arp_common_font_family_global'])) :'';

        $header_font_family_global = isset($_POST['header_font_family_global']) ? stripslashes_deep(sanitize_text_field($_POST['header_font_family_global'])) :'';
        $header_font_size_global = isset($_POST['header_font_size_global']) ? intval($_POST['header_font_size_global']) : '';
        $arp_header_text_alignment = isset($_POST['arp_header_text_alignment']) ? stripslashes_deep(sanitize_text_field($_POST['arp_header_text_alignment'])) : '';

        $header_style_bold_global = isset($_POST['header_style_bold_global']) ? stripslashes_deep(sanitize_text_field($_POST['header_style_bold_global'])) : '';
        $header_style_italic_global = isset($_POST['header_style_italic_global']) ? stripslashes_deep(sanitize_text_field($_POST['header_style_italic_global'])) : '';
        $header_style_decoration_global = isset($_POST['header_style_decoration_global']) ? stripslashes_deep(sanitize_text_field($_POST['header_style_decoration_global'])) : '';

        $price_font_family_global = isset($_POST['price_font_family_global']) ? stripslashes_deep(sanitize_text_field($_POST['price_font_family_global'])) : '';
        $price_font_size_global = isset($_POST['price_font_size_global']) ? intval($_POST['price_font_size_global']) : '';
        $arp_price_text_alignment = isset($_POST['arp_price_text_alignment']) ? stripslashes_deep(sanitize_text_field($_POST['arp_price_text_alignment'])) : '';

        $price_style_bold_global = isset($_POST['price_style_bold_global']) ? stripslashes_deep(sanitize_text_field($_POST['price_style_bold_global'])) : '';
        $price_style_italic_global = isset($_POST['price_style_italic_global']) ? stripslashes_deep(sanitize_text_field($_POST['price_style_italic_global'])) : '';
        $price_style_decoration_global = isset($_POST['price_style_decoration_global']) ? stripslashes_deep(sanitize_text_field($_POST['price_style_decoration_global'])) : '';

        $body_font_family_global = isset($_POST['body_font_family_global']) ? stripslashes_deep(sanitize_text_field($_POST['body_font_family_global'])) : '';
        $body_font_size_global = isset($_POST['body_font_size_global']) ? intval($_POST['body_font_size_global']) : '';
        $arp_body_text_alignment = isset($_POST['arp_body_text_alignment']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_text_alignment'])) : '';

        $body_style_bold_global = isset($_POST['body_style_bold_global']) ? stripslashes_deep(sanitize_text_field($_POST['body_style_bold_global'])) : '';
        $body_style_italic_global = isset($_POST['body_style_italic_global']) ? stripslashes_deep(sanitize_text_field($_POST['body_style_italic_global'])) : '';
        $body_style_decoration_global = isset($_POST['body_style_decoration_global']) ? stripslashes_deep(sanitize_text_field($_POST['body_style_decoration_global'])) : '';

        $footer_font_family_global = isset($_POST['footer_font_family_global']) ? stripslashes_deep(sanitize_text_field($_POST['footer_font_family_global'])) : '';
        $footer_font_size_global = isset($_POST['footer_font_size_global']) ? intval($_POST['footer_font_size_global']) : '';
        $arp_footer_text_alignment = isset($_POST['arp_footer_text_alignment']) ? stripslashes_deep(sanitize_text_field($_POST['arp_footer_text_alignment'])) : '';

        $footer_style_bold_global = isset($_POST['footer_style_bold_global']) ? stripslashes_deep(sanitize_text_field($_POST['footer_style_bold_global'])) : '';
        $footer_style_italic_global = isset($_POST['footer_style_italic_global']) ? stripslashes_deep(sanitize_text_field($_POST['footer_style_italic_global'])) : '';
        $footer_style_decoration_global = isset($_POST['footer_style_decoration_global']) ? stripslashes_deep(sanitize_text_field($_POST['footer_style_decoration_global'])) : '';

        $button_font_family_global = isset($_POST['button_font_family_global']) ? stripslashes_deep(sanitize_text_field($_POST['button_font_family_global'])) : '';
        $button_font_size_global = isset($_POST['button_font_size_global']) ? intval($_POST['button_font_size_global']) : '';
        $arp_button_text_alignment = isset($_POST['arp_button_text_alignment']) ? stripslashes_deep(sanitize_text_field($_POST['arp_button_text_alignment'])) : '';

        $button_style_bold_global = isset($_POST['button_style_bold_global']) ? stripslashes_deep(sanitize_text_field($_POST['button_style_bold_global'])) : '';
        $button_style_italic_global = isset($_POST['button_style_italic_global']) ? stripslashes_deep(sanitize_text_field($_POST['button_style_italic_global'])) : '';
        $button_style_decoration_global = isset($_POST['button_style_decoration_global']) ? stripslashes_deep(sanitize_text_field($_POST['button_style_decoration_global'])) : '';

        $description_font_family_global = isset($_POST['description_font_family_global']) ? stripslashes_deep(sanitize_text_field($_POST['description_font_family_global'])) : '';
        $description_font_size_global = isset($_POST['description_font_size_global']) ? intval($_POST['description_font_size_global']) : '';
        $arp_description_text_alignment = isset($_POST['arp_description_text_alignment']) ? stripslashes_deep(sanitize_text_field($_POST['arp_description_text_alignment'])) : '';

        $description_style_bold_global = isset($_POST['description_style_bold_global']) ? stripslashes_deep(sanitize_text_field($_POST['description_style_bold_global'])) : '';
        $description_style_italic_global = isset($_POST['description_style_italic_global']) ? stripslashes_deep(sanitize_text_field($_POST['description_style_italic_global'])) : '';
        $description_style_decoration_global = isset($_POST['description_style_decoration_global']) ? stripslashes_deep(sanitize_text_field($_POST['description_style_decoration_global'])) : '';

        $column_setting = array(
        	'column_space' => $column_space,
            'min_row_height' => $min_row_height,
        	'column_highlight_on_hover' => $hover_highlight,
        	'is_responsive' => $is_responsive,
        	'hide_caption_column' => $hide_caption_column,
        	'full_column_clickable' => $full_column_clickable,
        	'column_opacity' => $column_opacity,
        	'all_column_width' => $all_column_width,
        	'column_wrapper_width_txtbox' => $column_wrapper_width_txtbox,
        	'column_wrapper_width_style' => $column_wrapper_width_style,
        	'column_border_radius_top_left' => $column_border_radius_top_left,
        	'column_border_radius_top_right' => $column_border_radius_top_right,
        	'column_border_radius_bottom_right' => $column_border_radius_bottom_right,
        	'column_border_radius_bottom_left' => $column_border_radius_bottom_left,
        	'column_box_shadow_effect' => $column_box_shadow_effect,
        	'column_hide_blank_rows' => $column_hide_blank_rows,
        	'display_col_mobile' => $display_column_mobile,
        	'display_col_tablet' => $display_column_tablet,
        	'hide_header_global' => $hide_header_global,
        	'hide_header_shortcode_global' => $hide_header_shortcode_global,
        	'hide_price_global' => $hide_price_global,
        	'hide_feature_global' => $hide_feature_global,
        	'hide_description_global' => $hide_description_global,
        	'hide_footer_global' => $hide_footer_global,
        	'display_col_desktop' => $display_column_desktop,
        	'global_button_border_width' => $global_button_border_width,
        	'global_button_border_type' => $global_button_border_type,
        	'global_button_border_color' => $global_button_border_color,
        	'global_button_border_radius_top_left' => $global_button_border_radius_top_left,
        	'global_button_border_radius_top_right' => $global_button_border_radius_top_right,
        	'global_button_border_radius_bottom_left' => $global_button_border_radius_bottom_left,
        	'global_button_border_radius_bottom_right' => $global_button_border_radius_bottom_right,
        	'arp_global_button_type' => $arp_global_button_border_type,
        	'enable_button_hover_effect' => $enable_button_hover_effect,
        	'toggle_column_animation' => $toggle_column_animation,
            'column_toggle_effect' => $toggle_effect_animation,
        	'enable_hover_effect' => $enable_hover_effect,
        	'arp_row_border_size' => $arp_row_border_size,
        	'arp_row_border_type' => $arp_row_border_type,
        	'arp_row_border_color' => $arp_row_border_color,
        	'arp_caption_border_style' => $arp_caption_border_style,
        	'arp_caption_border_size' => $arp_caption_border_size,
        	'arp_column_border_size' => $arp_column_border_size,
        	'arp_column_border_type' => $arp_column_border_type,
        	'arp_column_border_color' => $arp_column_border_color,
        	'arp_caption_border_color' => $arp_caption_border_color,
        	'arp_column_border_left' => $arp_column_border_left,
        	'arp_column_border_right' => $arp_column_border_right,
        	'arp_column_border_top' => $arp_column_border_top,
        	'arp_column_border_bottom' => $arp_column_border_bottom,
        	'arp_caption_border_left' => $arp_caption_border_left,
        	'arp_caption_border_right' => $arp_caption_border_right,
        	'arp_caption_border_top' => $arp_caption_border_top,
        	'arp_caption_border_bottom' => $arp_caption_border_bottom,
        	'arp_caption_row_border_size' => $arp_caption_row_border_size,
        	'arp_caption_row_border_style' => $arp_caption_row_border_style,
        	'arp_caption_row_border_color' => $arp_caption_row_border_color,
            'arp_common_font_family_global' => $arp_common_font_family_global,
            'header_font_family_global' => $header_font_family_global,
            'header_font_size_global' => $header_font_size_global,
            'arp_header_text_alignment' => $arp_header_text_alignment,
            'arp_header_text_bold_global' => $header_style_bold_global,
            'arp_header_text_italic_global' => $header_style_italic_global,
            'arp_header_text_decoration_global' => $header_style_decoration_global,
            'price_font_family_global' => $price_font_family_global,
            'price_font_size_global' => $price_font_size_global,
            'arp_price_text_alignment' => $arp_price_text_alignment,
            'arp_price_text_bold_global' => $price_style_bold_global,
            'arp_price_text_italic_global' => $price_style_italic_global,
            'arp_price_text_decoration_global' => $price_style_decoration_global,
            'body_font_family_global' => $body_font_family_global,
            'body_font_size_global' => $body_font_size_global,
            'arp_body_text_alignment' => $arp_body_text_alignment,
            'arp_body_text_bold_global' => $body_style_bold_global,
            'arp_body_text_italic_global' => $body_style_italic_global,
            'arp_body_text_decoration_global' => $body_style_decoration_global,
            'footer_font_family_global' => $footer_font_family_global,
            'footer_font_size_global' => $footer_font_size_global,
            'arp_footer_text_alignment' => $arp_footer_text_alignment,
            'arp_footer_text_bold_global' => $footer_style_bold_global,
            'arp_footer_text_italic_global' => $footer_style_italic_global,
            'arp_footer_text_decoration_global' => $footer_style_decoration_global,
            'button_font_family_global' => $button_font_family_global,
            'button_font_size_global' => $button_font_size_global,
            'arp_button_text_alignment' => $arp_button_text_alignment,
            'arp_button_text_bold_global' => $button_style_bold_global,
            'arp_button_text_italic_global' => $button_style_italic_global,
            'arp_button_text_decoration_global' => $button_style_decoration_global,
            'description_font_family_global' => $description_font_family_global,
            'description_font_size_global' => $description_font_size_global,
            'arp_description_text_alignment' => $arp_description_text_alignment,
            'arp_description_text_bold_global' => $description_style_bold_global,
            'arp_description_text_italic_global' => $description_style_italic_global,
            'arp_description_text_decoration_global' => $description_style_decoration_global,
        );


        $is_animation = isset($_POST['is_animation']) ? stripslashes_deep( sanitize_text_field( $_POST['is_animation'] ) ) : '';
        $visible_columns = isset($_POST['visible_columns']) ? intval($_POST['visible_columns']) : '';
        $visible_columns_tablet = isset($_POST['visible_columns_tablet']) ? intval($_POST['visible_columns_tablet']) : '';
        $scroll_column = isset($_POST['column_to_scroll']) ? intval($_POST['column_to_scroll']) : '';
        $is_navigation = isset($_POST['is_navigation']) ? intval($_POST['is_navigation']) : '';
        $is_autoplay = isset($_POST['is_autoplay']) ? intval($_POST['is_autoplay']) : '';
        $sliding_effect = isset($_POST['sliding_effect']) ? stripslashes_deep(sanitize_text_field($_POST['sliding_effect'])) : '';
        $transition_speed = isset($_POST['slide_transition_speed']) ? intval($_POST['slide_transition_speed']) : '';
        $hide_caption_animation = isset($_POST['hide_caption_animation']) ? intval($_POST['hide_caption_animation']) : '';

        $navigation_style = isset($_POST['navigation_style']) ? stripslashes_deep(sanitize_text_field($_POST['navigation_style'])) : '';
        $easing_effect = isset($_POST['easing_effect']) ? stripslashes_deep(sanitize_text_field($_POST['easing_effect'])) : '';
        $is_pagination = isset($_POST['is_pagination']) ? stripslashes_deep(sanitize_text_field($_POST['is_pagination'])) : '';
        $pagination_style = isset($_POST['pagination_style']) ? stripslashes_deep(sanitize_text_field($_POST['pagination_style'])) : '';
        $pagination_position = isset($_POST['pagination_position']) ? stripslashes_deep(sanitize_text_field($_POST['pagination_position'])) : '';
        $infinite = isset($_POST['is_infinite']) ? stripslashes_deep(sanitize_text_field($_POST['is_infinite'])) : '';

        $pagi_nav_btn = isset($_POST['pagination_navigation_buttons']) ? stripslashes_deep(sanitize_text_field($_POST['pagination_navigation_buttons'])) : '';
        $navi_nav_btn = isset($_POST['navigation_buttons']) ? stripslashes_deep(sanitize_text_field($_POST['navigation_buttons'])) : '';
        $sticky_caption = isset($_POST['sticky_caption']) ? intval($_POST['sticky_caption']) : '';
        $template_bg_img = isset($_POST['arp_template_bg_img']) ? stripslashes_deep(sanitize_text_field($_POST['arp_template_bg_img'])) : '';

        $column_animation = array(
        	'is_animation' 			=> $is_animation,
        	'visible_column' 		=> $visible_columns,
            'visible_columns_tablet'=> $visible_columns_tablet,
        	'scrolling_columns' 	=> $scroll_column,
        	'navigation' 			=> $is_navigation,
        	'autoplay' 				=> $is_autoplay,
        	'sliding_effect' 		=> $sliding_effect,
        	'transition_speed' 		=> $transition_speed,
        	'hide_caption' 			=> $hide_caption_animation,
        	'navigation_style' 		=> $navigation_style,
        	'easing_effect' 		=> $easing_effect,
        	'is_pagination' 		=> $is_pagination,
        	'pagination_style' 		=> $pagination_style,
        	'pagination_position' 	=> $pagination_position,
        	'is_infinite' 			=> $infinite,
        	'pagi_nav_btn' 			=> $pagi_nav_btn,
        	'navi_nav_btn' 			=> $navi_nav_btn,
        	'sticky_caption' 		=> $sticky_caption,
        	'template_bg_img' 		=> $template_bg_img
        );

        $tooltip_bgcolor = isset($_POST['tooltip_bgcolor']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_bgcolor'])) : '';
        $tooltip_txt_color = isset($_POST['tooltip_txtcolor']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_txtcolor'])) : '';
        $tooltip_animation = isset($_POST['tooltip_animation_style']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_animation_style'])) : '';
        $tooltip_position = isset($_POST['tooltip_position']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_position'])) : '';
        $tooltip_width = isset($_POST['tooltip_width']) ? intval($_POST['tooltip_width']) : '';
        $tooltip_style = isset($_POST['tooltip_style']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_style'])) : '';
        $tooltip_font_family = isset($_POST['tooltip_font_family']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_font_family'])) : '';
        $tooltip_font_size = isset($_POST['tooltip_font_size']) ? intval($_POST['tooltip_font_size']) : '';

        
        $tooltip_font_style_bold = isset($_POST['tooltip_font_style_bold']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_font_style_bold'])) : '';
        $tooltip_font_style_italic = isset($_POST['tooltip_font_style_italic']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_font_style_italic'])) : '';
        $tooltip_font_style_decoration = isset($_POST['tooltip_font_style_decoration']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_font_style_decoration'])) : '';


        $tooltip_trigger_type = isset($_POST['tooltip_trigger_type']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_trigger_type'])) : '';
        $tooltip_display_style = isset($_POST['tooltip_display_style']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_display_style'])) : '';
        $tooltip_informative_icon = isset($_POST['tooltip_informative_icon']) ? wp_kses($_POST['tooltip_informative_icon'],$arp_allowed_html) : '';
        $tooltip_icon_position = isset($_POST['tooltip_icon_position']) ? stripslashes_deep(sanitize_text_field($_POST['tooltip_icon_position'])) : '';

        $arp_column_bg_custom_color = isset($_POST['arp_column_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_column_background_color'])) : '';

        $arp_column_desc_bg_custom_color = isset($_POST['arp_column_desc_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_column_desc_background_color'])) : '';

        $arp_column_desc_hover_bg_custom_color = isset($_POST['arp_column_desc_hover_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_column_desc_hover_background_color'])) : '';

        $arp_header_bg_custom_color = isset($_POST['arp_header_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_header_background_color'])) : '';

        $arp_pricing_bg_custom_color = isset($_POST['arp_pricing_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_pricing_background_color'])) : '';

        $arp_template_odd_row_hover_bg_color = isset($_POST['arp_body_odd_row_hover_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_odd_row_hover_background_color'])) : '';

        $arp_template_odd_row_bg_color = isset($_POST['arp_body_odd_row_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_odd_row_background_color'])) : '';

        $arp_body_even_row_hover_bg_custom_color = isset($_POST['arp_body_even_row_hover_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_even_row_hover_background_color'])) : '';

        $arp_body_even_row_bg_custom_color = isset($_POST['arp_body_even_row_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_even_row_background_color'])) : '';

        $arp_template_analytics_bgcolor = isset($_POST['arp_analytics_bgcolor']) ? stripslashes_deep(sanitize_text_field($_POST['arp_analytics_bgcolor'])) : '';

        $arp_template_analytics_forgcolor = isset($_POST['arp_analytics_forgcolor']) ? stripslashes_deep(sanitize_text_field($_POST['arp_analytics_forgcolor'])) : '';

        $arp_footer_content_bg_color = isset($_POST['arp_footer_content_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_footer_content_background_color'])) : '';

        $arp_footer_content_hover_bg_color = isset($_POST['arp_footer_content_hover_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_footer_content_hover_background_color'])) : '';

        $arp_button_bg_custom_color = isset($_POST['arp_button_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_button_background_color'])) : '';

        $arp_column_bg_hover_color = isset($_POST['arp_column_bg_hover_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_column_bg_hover_color'])) : '';

        $arp_button_bg_hover_color = isset($_POST['arp_button_bg_hover_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_button_bg_hover_color'])) : '';

        $arp_header_bg_hover_color = isset($_POST['arp_header_bg_hover_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_header_bg_hover_color'])) : '';

        $arp_price_bg_hover_color = isset($_POST['arp_price_bg_hover_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_price_bg_hover_color'])) : '';

        $arp_header_font_custom_color = isset($_POST['arp_header_font_custom_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_header_font_custom_color_input'])) : '';

        $arp_header_font_custom_hover_color_input = isset($_POST['arp_header_font_custom_hover_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_header_font_custom_hover_color_input'])) : '';

        $arp_price_font_custom_color = isset($_POST['arp_price_font_custom_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_price_font_custom_color_input'])) : '';

        $arp_price_font_custom_hover_color_input = isset($_POST['arp_price_font_custom_hover_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_price_font_custom_hover_color_input'])) : '';

        $arp_price_duration_font_custom_color = isset($_POST['arp_price_duration_font_custom_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_price_duration_font_custom_color_input'])) : '';

        $arp_price_duration_font_custom_hover_color_input = isset($_POST['arp_price_duration_font_custom_hover_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_price_duration_font_custom_hover_color_input'])) : '';

        $arp_desc_font_custom_color = isset($_POST['arp_desc_font_custom_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_desc_font_custom_color_input'])) : '';

        $arp_desc_font_custom_hover_color_input = isset($_POST['arp_desc_font_custom_hover_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_desc_font_custom_hover_color_input'])) : '';

        $arp_body_label_font_custom_color = isset($_POST['arp_body_label_font_custom_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_label_font_custom_color_input'])) : '';

        $arp_body_label_font_custom_hover_color_input = isset($_POST['arp_body_label_font_custom_hover_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_label_font_custom_hover_color_input'])) : '';

        $arp_body_font_custom_color = isset($_POST['arp_body_font_custom_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_font_custom_color_input'])) : '';
        $arp_body_even_font_custom_color = isset($_POST['arp_body_even_font_custom_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_even_font_custom_color_input'])) : '';

        $arp_body_font_custom_hover_color_input = isset($_POST['arp_body_font_custom_hover_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_font_custom_hover_color_input'])) : '';
        $arp_body_even_font_custom_hover_color_input = isset($_POST['arp_body_even_font_custom_hover_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_body_even_font_custom_hover_color_input'])) : '';

        $arp_footer_font_custom_color = isset($_POST['arp_footer_font_custom_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_footer_font_custom_color_input'])) : '';

        $arp_footer_font_custom_hover_color_input = isset($_POST['arp_footer_font_custom_hover_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_footer_font_custom_hover_color_input'])) : '';

        $arp_button_font_custom_color = isset($_POST['arp_button_font_custom_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_button_font_custom_color_input'])) : '';

        $arp_button_font_custom_hover_color_input = isset($_POST['arp_button_font_custom_hover_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_button_font_custom_hover_color_input'])) : '';

        $arp_shortocode_background = isset($_POST['arp_shortocode_background_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_shortocode_background_color'])) : '';
        $arp_shortocode_font_color = isset($_POST['arp_shortocode_font_custom_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_shortocode_font_custom_color_input'])) : '';
        $arp_shortcode_bg_hover_color = isset($_POST['arp_shortcode_bg_hover_color']) ? stripslashes_deep(sanitize_text_field($_POST['arp_shortcode_bg_hover_color'])) : '';
        $arp_shortcode_font_hover_color = isset($_POST['arp_shortcode_font_custom_hover_color_input']) ? stripslashes_deep(sanitize_text_field($_POST['arp_shortcode_font_custom_hover_color_input'])) : '';

        $custom_skin_colors = array(
            "arp_header_bg_custom_color" => $arp_header_bg_custom_color,
            "arp_column_bg_custom_color" => $arp_column_bg_custom_color,
            "arp_column_desc_bg_custom_color" => $arp_column_desc_bg_custom_color,
            "arp_column_desc_hover_bg_custom_color" => $arp_column_desc_hover_bg_custom_color,
            "arp_pricing_bg_custom_color" => $arp_pricing_bg_custom_color,
            "arp_body_odd_row_bg_custom_color" => $arp_template_odd_row_bg_color,
            "arp_body_odd_row_hover_bg_custom_color" => $arp_template_odd_row_hover_bg_color,
            "arp_body_even_row_hover_bg_custom_color" => $arp_body_even_row_hover_bg_custom_color,
            "arp_body_even_row_bg_custom_color" => $arp_body_even_row_bg_custom_color,
            "arp_analytics_bgcolor" => $arp_template_analytics_bgcolor,
            "arp_analytics_forgcolor"=>$arp_template_analytics_forgcolor,
            "arp_footer_content_hover_bg_color" => $arp_footer_content_hover_bg_color,
            "arp_footer_content_bg_color" => $arp_footer_content_bg_color,
            "arp_button_bg_custom_color" => $arp_button_bg_custom_color,
            "arp_column_bg_hover_color" => $arp_column_bg_hover_color,
            "arp_button_bg_hover_color" => $arp_button_bg_hover_color,
            "arp_header_bg_hover_color" => $arp_header_bg_hover_color,
            "arp_price_bg_hover_color" => $arp_price_bg_hover_color,
            "arp_header_font_custom_color" => $arp_header_font_custom_color,
            "arp_header_font_custom_hover_color" => $arp_header_font_custom_hover_color_input,
            "arp_price_font_custom_color" => $arp_price_font_custom_color,
            "arp_price_font_custom_hover_color" => $arp_price_font_custom_hover_color_input,
            "arp_desc_font_custom_color" => $arp_desc_font_custom_color,
            "arp_desc_font_custom_hover_color" => $arp_desc_font_custom_hover_color_input,
            "arp_body_label_font_custom_color" => $arp_body_label_font_custom_color,
            "arp_body_label_font_custom_hover_color" => $arp_body_label_font_custom_hover_color_input,
            "arp_body_font_custom_color" => $arp_body_font_custom_color,
            "arp_body_even_font_custom_color" => $arp_body_even_font_custom_color,
            "arp_body_font_custom_hover_color" => $arp_body_font_custom_hover_color_input,
            "arp_body_even_font_custom_hover_color" => $arp_body_even_font_custom_hover_color_input,
            "arp_footer_font_custom_color" => $arp_footer_font_custom_color,
            "arp_footer_font_custom_hover_color" => $arp_footer_font_custom_hover_color_input,
            "arp_button_font_custom_color" => $arp_button_font_custom_color,
            "arp_button_font_custom_hover_color" => $arp_button_font_custom_hover_color_input,
            'arp_shortocode_background' => $arp_shortocode_background,
            'arp_shortocode_font_color' => $arp_shortocode_font_color,
            'arp_shortcode_bg_hover_color' => $arp_shortcode_bg_hover_color,
            'arp_shortcode_font_hover_color' => $arp_shortcode_font_hover_color,
        );


        $tooltip_setting = array(
        	'background_color' => $tooltip_bgcolor,
        	'text_color' => $tooltip_txt_color,
        	'animation' => $tooltip_animation,
        	'position' => $tooltip_position,
        	'tooltip_width' => $tooltip_width,
        	'style' => $tooltip_style,
        	'tooltip_font_family' => $tooltip_font_family,
        	'tooltip_font_size' => $tooltip_font_size,
        	'tooltip_font_style_bold' => $tooltip_font_style_bold,
        	'tooltip_font_style_italic' => $tooltip_font_style_italic,
        	'tooltip_font_style_decoration' => $tooltip_font_style_decoration,
        	'tooltip_trigger_type' => $tooltip_trigger_type,
        	'tooltip_display_style' => $tooltip_display_style,
        	'tooltip_informative_icon' => $tooltip_informative_icon,
        	'tooltip_icon_position' => $tooltip_icon_position
        );

        $tab_general_opt = array(
        	'template_setting' => $template_setting,
            'font_settings' => $font_setting,
            'column_settings' => $column_setting,
            'column_animation' => $column_animation,
            'tooltip_settings' => $tooltip_setting,
            'general_settings' => $general_settings,
            'button_settings' => $button_settings,
            'custom_skin_colors' => $custom_skin_colors
        );

        $general_opt = maybe_serialize($tab_general_opt);

        $row = array();
        $column_order = array();
        $row_order = array();

        if ($total > 0) {
            if ($pt_action == "new") {
                if ($is_tbl_preview && $is_tbl_preview == 1) {
                    $temp_status = 'draft';

                    $id = $wpdb->query($wpdb->prepare('INSERT INTO ' . $wpdb->prefix . 'arp_arprice (table_name,general_options,status,create_date,arp_last_updated_date) VALUES (%s,%s,%s,%s,%s)', $main_table_title, $general_opt, $temp_status, $dt, $dt));

                    $table_id = $wpdb->insert_id;
                } else {
                    $new_status = 'published';

                    $type_of_template = isset($template_feature['is_animated']) ? $template_feature['is_animated'] : '';

                    $id = $wpdb->query($wpdb->prepare('INSERT INTO ' . $wpdb->prefix . 'arp_arprice (table_name,general_options,is_animated,status,create_date,arp_last_updated_date) VALUES (%s,%s,%d,%s,%s,%s)', $main_table_title, $general_opt, $type_of_template, $new_status, $dt, $dt));
                    $table_id = $wpdb->insert_id;
                }

                if ($table_id > 0) {
                    $select_options_general                               = $wpdb->get_results($wpdb->prepare('SELECT general_options FROM  ' . $wpdb->prefix . 'arp_arprice WHERE ID = %d', $table_id));
                    $options_update                                       = maybe_unserialize($select_options_general[0]->general_options);
                    $arp_custom_css_old                                   = isset($options_update['general_settings']['arp_custom_css']) ? $options_update['general_settings']['arp_custom_css'] : '';
                    $arp_custom_css_new                                   = preg_replace('/arptemplate_(\d+)/', 'arptemplate_' . $table_id, $arp_custom_css_old);
                    $options_update['general_settings']['arp_custom_css'] = ($arp_custom_css_new);
                    $general_options_update                               = (maybe_serialize($options_update));
                    $query_results_update                                 = $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'arp_arprice SET general_options= %s WHERE ID = %d', $general_options_update, $table_id));
                }
            } else {
                $query_results = $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'arp_arprice SET table_name = %s, general_options= %s,arp_last_updated_date=%s WHERE ID = %d', $main_table_title, $general_opt, $dt, $table_id));

                if (!isset($_POST['is_tbl_preview'])) {
                    $wpdb->update($wpdb->prefix . 'arp_arprice', array('status' => 'published', 'arp_last_updated_date' => $dt), array('ID' => $table_id));
                }

            }
            if (count($new_id) > 0) {
                for ($i = 0; $i <= $total; $i++) {
                    if (!in_array($i, $new_id)) {
                        continue;
                    }

                    $Title = 'column_' . $i;

                    $column_section = $all_columns_data[$Title]['column_section'];
                    $color_section = $all_columns_data[$Title]['color_section'];
                    $button_section = $all_columns_data[$Title]['button_content'];
                    $footer_content = $all_columns_data[$Title]['footer_content'];
                    $pricing_content = $all_columns_data[$Title]['pricing_content'];
                    $header_section = $all_columns_data[$Title]['header_content'];
                    $column_description = $all_columns_data[$Title]['column_description'];
                    $rows_data = $all_columns_data[$Title]['rows'];

                    $body_section = isset( $all_columns_data[$Title]['body_section'] ) ? $all_columns_data[$Title]['body_section'] : array();

                    $column_width = isset( $column_section['column_width'] ) ? intval($column_section['column_width']) : '';

                    $caption = isset($_POST['caption_column_' . $i]) ? intval( $_POST['caption_column_' . $i] ) : 0;

                    $column_hide = isset($_POST['column_hide_' . $i]) ? intval( $_POST['column_hide_' . $i] ) : 0;

	                $cstm_rbn_txt = isset( $column_section['arp_custom_ribbon'] ) ? wp_kses( $column_section['arp_custom_ribbon'], $arp_allowed_html ) : '';
	                $column_highlight = isset( $column_section['column_highlight'] ) ? intval( $column_section['column_highlight'] ) : '';

	                $column_background_color = isset( $color_section['column_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['column_bg_color'] ) ) : '';
	                $column_hover_background_color = isset( $color_section['column_hover_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['column_hover_bg_color'] ) ) : '';

	                $column_background_image = isset( $column_section['column_background_image'] ) ? stripslashes_deep(  sanitize_text_field( $column_section['column_background_image'] ) ) : '';
	                $column_background_image_height = isset( $column_section['column_background_image_height'] ) ? intval( $column_section['column_background_image_height'] ) : '';
	                $column_background_image_width = isset( $column_section['column_background_image_width'] ) ? intval( $column_section['column_background_image_width'] ) : '';
	                $column_background_scaling = isset( $column_section['column_background_scaling'] ) ? stripslashes_deep( sanitize_text_field( $column_section['column_background_scaling'] ) ) : '';
	                $column_background_min_positon = isset( $column_section['column_background_min_positon'] ) ? intval( $column_section['column_background_min_positon'] ) : '';
	                $column_background_max_positon = isset( $column_section['column_background_max_positon'] ) ? intval( $column_section['column_background_max_positon'] ) : '';

	                $arp_shortcode_customization_size = isset( $header_section['shortcode_size'] ) ? stripslashes_deep( sanitize_text_field( $header_section['shortcode_size'] ) ) : '';
	                $arp_shortcode_customization_style = isset( $header_section['shortcode_style'] ) ? stripslashes_deep( sanitize_text_field( $header_section['shortcode_style'] ) ) : '';

	                $shortcode_background_color = isset( $color_section['shortcode_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['shortcode_bg_color'] ) ) : '';
	                $shortcode_font_color = isset( $color_section['shortcode_font_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['shortcode_font_color'] ) ) : '';

	                $shortcode_hover_background_color = isset( $color_section['shortcode_hover_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['shortcode_hover_bg_color'] ) ) : '';
	                $shortcode_hover_font_color = isset( $color_section['shortcode_hover_font_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['shortcode_hover_font_color'] ) ) : '';

	                $body_text_alignemnt = isset($body_section['alignment']) ? stripslashes_deep( sanitize_text_field( $body_section['alignment'] ) ) : '';

                    $btn_size = isset( $button_section['size'] ) ? stripslashes_deep( sanitize_text_field( $button_section['size'] ) ) : '';
                    $btn_height = isset( $button_section['height'] ) ? stripslashes_deep( sanitize_text_field( $button_section['height'] ) ) : '';
	                $hide_default_btn = isset( $button_section['hide_default_btn'] ) ? intval( $button_section['hide_default_btn'] ) : '';
                    
	                
	                $is_new_window = isset( $button_section['is_new_window'] ) ? intval( $button_section['is_new_window'] ) : '';
	                $is_new_window_actual = isset( $button_section['is_new_window_actual'] ) ? intval( $button_section['is_new_window_actual'] ) : '';
                	$is_nofollow_link = isset( $button_section['is_nofollow_link'] ) ? intval( $button_section['is_nofollow_link'] ) : '';

                    if ( isset($table_columsn[$Title]['row_order']) && ( !$table_columns[$Title]['row_order'] || !is_array($table_columns[$Title]['row_order']))) {
                        parse_str($_POST[$Title . '_row_order'], $col_row_order);
                        $row_order = isset($col_row_order) ? $col_row_order : '';
                    } else {
                        $row_order = isset($table_columns[$Title]['row_order']) ? $table_columns[$Title]['row_order'] : '';
                    }

	                $header_background_color = isset( $color_section['header_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['header_bg_color'] ) ) : '';
	                $header_hover_background_color = isset( $color_section['header_hover_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['header_hover_bg_color'] ) ) : '';

	                $header_font_color = isset($color_section['header_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['header_font_color'] ) ) : '';
	                $header_hover_font_color = isset($color_section['header_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['header_hover_font_color'] ) ) : '';
	                

	                $header_font_family = isset($header_section['font_family']) ? stripslashes_deep( sanitize_text_field( $header_section['font_family'] ) ) : '';
                    $header_font_size = isset($header_section['font_size']) ? intval($header_section['font_size']) : '';
	                
	                $header_font_align = isset($header_section['alignment']) ? stripslashes_deep( sanitize_text_field( $header_section['alignment'] ) ) : '';

	                $header_font_style = isset($values['header_font_style_' . $i]) ? sanitize_text_field( $values['header_font_style_' . $i] ) : '';
	                $header_style_bold = isset( $header_section['font_bold'] ) ? sanitize_text_field( $header_section['font_bold'] ) : '';
	                $header_style_italic = isset( $header_section['font_italic'] ) ? sanitize_text_field( $header_section['font_italic'] ) : '';
	                $header_style_decoration = isset( $header_section['font_decoration'] ) ? sanitize_text_field( $header_section['font_decoration'] ) : '';

                    $header_background_image = isset($_POST['arp_header_background_image_' . $i]) ? stripslashes_deep($_POST['arp_header_background_image_' . $i]) : '';

                    $header_margin_top = isset( $header_section['margin_top'] ) ? stripslashes_deep( sanitize_text_field( $header_section['margin_top'] ) ) : '';

                    $hscode_min_height = isset( $header_section['shortcode_min_height'] ) ? stripslashes_deep( sanitize_text_field( $header_section['shortcode_min_height'] ) ) : '';
                    $price_min_height = isset( $pricing_content['min_height'] ) ? stripslashes_deep( sanitize_text_field( $pricing_content['min_height'] ) ) : '';

                    $col_desc_min_height = isset( $column_description['min_height'] ) ? stripslashes_deep( sanitize_text_field( $column_description['min_height'] ) ) : '';

                    $footer_min_height = isset( $footer_content['min_height'] ) ? stripslashes_deep( sanitize_text_field( $footer_content['min_height']) ) : '';

                    $button_min_height = isset( $button_section['min_height'] ) ? stripslashes_deep( sanitize_text_field( $button_section['min_height']) ) : '';

	                $price_background_color = isset( $color_section['price_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['price_bg_color'] ) ) : '';
	                $price_hover_background_color = isset( $color_section['price_hover_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['price_hover_bg_color'] ) ) : '';

	                $price_font_color = isset($color_section['price_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['price_font_color'] ) ) : '';
	                $price_hover_font_color = isset($color_section['price_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['price_hover_font_color'] ) ) : '';
                    
                    

                    $price_text_font_color = isset($color_section['price_text_font_color']) ? stripslashes_deep($color_section['price_text_font_color']) : '';
                    $price_text_hover_font_color = isset($color_section['price_text_hover_font_color']) ? stripslashes_deep($color_section['price_text_hover_font_color']) : '';

	                $content_font_color = isset($color_section['content_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_font_color'] ) ) : '';
	                $content_even_font_color = isset($color_section['content_even_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_even_font_color'] ) ) : '';
	                $content_hover_font_color = isset($color_section['content_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_hover_font_color'] ) ) : '';
	                $content_even_hover_font_color = isset($color_section['content_even_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_even_hover_font_color'] ) ) : '';

	                $content_odd_color = isset($color_section['content_odd_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_odd_color'] ) ) : '';
	                $content_odd_hover_color = isset($color_section['content_odd_hover_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_odd_hover_color'] ) ) : '';
	                $content_even_color = isset($color_section['content_even_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_even_color'] ) ) : '';
	                $content_even_hover_color = isset($color_section['content_even_hover_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_even_hover_color'] ) ) : '';

                    $content_font_family = isset( $body_section['font_family'] ) ? stripslashes_deep( sanitize_text_field( $body_section['font_family' ] ) ) :'';
                    $content_font_size = isset( $body_section['font_size'] ) ? intval( $body_section['font_size' ] ) :'';
                    $content_font_alignment = isset( $body_section['alignment'] ) ? stripslashes_deep( sanitize_text_field( $body_section['alignment'] ) ) : '';

                    
	                $button_background_color = isset($color_section['button_bg_color']) ? stripslashes_deep(sanitize_text_field( $color_section['button_bg_color'] ) ) : '';
	                $button_hover_background_color = isset($color_section['button_hover_bg_color']) ? stripslashes_deep(sanitize_text_field( $color_section['button_hover_bg_color'] ) ) : '';
	                $button_font_color = isset($color_section['button_font_color']) ? stripslashes_deep(sanitize_text_field( $color_section['button_font_color'] ) ) : '';
	                $button_hover_font_color = isset($color_section['button_hover_font_color']) ? stripslashes_deep(sanitize_text_field( $color_section['button_hover_font_color'] ) ) : '';
                
                    $button_font_family = isset($_POST['button_font_family_' . $i]) ? stripslashes_deep($_POST['button_font_family_' . $i]) : '';
                    $button_font_size = isset($_POST['button_font_size_' . $i]) ? $_POST['button_font_size_' . $i] : '';
                    $button_font_style = isset($_POST['button_font_style_' . $i]) ? stripslashes_deep($_POST['button_font_style_' . $i]) : '';

                    $button_style_bold = isset($_POST['button_style_bold_' . $i]) ? $_POST['button_style_bold_' . $i] : '';
                    $button_style_italic = isset($_POST['button_style_italic_' . $i]) ? $_POST['button_style_italic_' . $i] : '';
                    $button_style_decoration = isset($_POST['button_style_decoration_' . $i]) ? $_POST['button_style_decoration_' . $i] : '';

	                $column_description_font_color = isset($color_section['column_description_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['column_description_font_color'] ) ) : '';
	                $column_description_hover_font_color = isset($color_section['column_description_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['column_description_hover_font_color'] ) ) : '';
	                $column_desc_background_color = isset($color_section['column_desc_bg_color']) ? stripslashes_deep( sanitize_text_field( $color_section['column_desc_bg_color'] ) ) : '';
	                $column_desc_hover_background_color = isset($color_section['column_desc_hover_bg_color']) ? stripslashes_deep( sanitize_text_field( $color_section['column_desc_hover_bg_color'] ) ) : '';

                    
	                $footer_background_color = isset($color_section['footer_background_color']) ? stripslashes_deep( sanitize_text_field( $color_section['footer_background_color'] ) ) : '';
	                $footer_hover_background_color = isset($color_section['footer_hover_background_color']) ? stripslashes_deep( sanitize_text_field( $color_section['footer_hover_background_color'] ) ) : '';
	                $footer_level_options_font_color = isset($color_section['footer_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['footer_font_color'] ) ) : '';
	                $footer_level_options_hover_font_color = isset($color_section['footer_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['footer_hover_font_color'] ) ) : '';

                    $footer_content_position = isset($footer_content['position']) ? intval($footer_content['position']) : '';
	                $footer_text_align = isset($footer_content['alignment']) ? stripslashes_deep( sanitize_text_field( $footer_content['alignment'] ) ) : '';                    
	                $footer_level_options_font_family = isset($footer_content['font_family']) ? stripslashes_deep( sanitize_text_field( $footer_content['font_family'] ) ) : '';
	                $footer_level_options_font_size = isset($footer_content['font_size']) ? intval( $footer_content['font_size'] ) : '';
	                $footer_level_options_font_style_bold = isset($footer_content['font_bold']) ? stripslashes_deep( sanitize_text_field( $footer_content['font_bold'] ) ) : '';
	                $footer_level_options_font_style_italic = isset($footer_content['font_italic']) ? stripslashes_deep( sanitize_text_field( $footer_content['font_italic'] ) ) : '';
	                $footer_level_options_font_style_decoration = isset($footer_content['font_decoration']) ? stripslashes_deep( sanitize_text_field( $footer_content['font_decoration'] ) ) : '';

                    $total_rows = isset($_POST['total_rows_' . $i]) ? intval( $_POST['total_rows_' . $i] ) : '';

                    if( '' == $total_rows ){
                        $total_rows = count( $rows_data );
                    }

                    $row = array();
                    if( $total_rows > 0 ){
                        for( $j = 0; $j < $total_rows; $j++ ){
                            
                            $row_title = 'row_' . $j;
                            
                            $rowsOpts = $rows_data[$row_title];

                        	$row_content_type = isset( $rowsOpts['content_type'] ) ? intval( $rowsOpts['content_type'] ) : '';

                            $row_custom_css = isset( $rowsOpts['custom_css'] ) ? sanitize_text_field( $rowsOpts['custom_css'] ) : '';

                            $row_hover_custom_css = isset( $rowsOpts['hover_custom_css'] ) ? sanitize_text_field( $rowsOpts['hover_custom_css'] ) : '';

                            $row_min_height = isset( $rowsOpts['min_height'] ) ? sanitize_text_field( $rowsOpts['min_height'] ) : '';

                            $row_btn_size = isset( $rowsOpts['size'] ) ? stripslashes_deep( sanitize_text_field( $rowsOpts['size'] ) ) : '';
    
                            $row_btn_height = isset( $rowsOpts['height'] ) ? stripslashes_deep( sanitize_text_field( $rowsOpts['height'] ) ) : '';

                            $row_hide_default_btn = isset( $rowsOpts['hide_default_btn'] ) ? intval( $rowsOpts['hide_default_btn'] ) : '';
                            
                            $row_is_new_window = isset( $rowsOpts['is_new_window'] ) ? intval( $rowsOpts['is_new_window'] ) : '';
                            $row_is_new_window_actual = isset( $rowsOpts['is_new_window_actual'] ) ? intval( $rowsOpts['is_new_window_actual'] ) : '';
                            $row_is_nofollow_link = isset( $rowsOpts['is_nofollow_link'] ) ? intval( $rowsOpts['is_nofollow_link'] ) : '';

                            $row_btn_img = isset( $rowsOpts['image'] ) ? sanitize_text_field( $rowsOpts['image'] ) : '';
                            $row_btn_img_height = isset( $rowsOpts['image_height'] ) ? stripslashes_deep( sanitize_text_field( $rowsOpts['image_height'] ) ) : '';
                            $row_btn_img_width = isset( $rowsOpts['image_width'] ) ? sanitize_text_field( $rowsOpts['image_width'] ) : '';


                            $row[$row_title] = array(
                                'row_content_type' => $row_content_type,
                                'row_custom_css' => $row_custom_css,
                                'row_hover_custom_css' => $row_hover_custom_css,
                                'row_min_height' => $row_min_height,
                                'button_size_row' => $row_btn_size,
                                'button_height_row' => $row_btn_height,
                                'hide_default_btn_row' => $row_hide_default_btn,
                                'is_new_window_row' => $row_is_new_window,
                                'is_new_window_actual_row' => $row_is_new_window_actual,
                                'is_nofollow_link_row' => $row_is_nofollow_link,
                            );

	                        $g = 0;
	                        foreach($total_tabs as $key => $tab_name){
	                            if( $g == 0 ){
	                                $row[$row_title]['row_description'] = isset($rowsOpts['description']) ? stripslashes_deep( wp_kses( $rowsOpts['description'], $arp_allowed_html ) ) : '';

	                                $row[$row_title]['row_tooltip'] = isset($rowsOpts['tooltip']) ? stripslashes_deep( wp_kses( $rowsOpts['tooltip'], $arp_allowed_html ) ) : '';

	                                $row[$row_title]['row_label'] = isset($values['row_' . $i . '_label_' . $j]) ? stripslashes_deep( wp_kses( $values['row_' . $i . '_label_' . $j], $arp_allowed_html ) ) : '';

                                    $row[$row_title]['paypal_code_row'] = isset($rowsOpts['embed_script']) ? stripslashes_deep( $rowsOpts['embed_script']  ) : '';
                                    
                                    $row[$row_title]['button_url'] = isset($rowsOpts['btn_url']) ? stripslashes_deep( esc_url_raw( $rowsOpts['btn_url'] ) ) : '';

                                    $row[$row_title]['image_row'] = isset( $rowsOpts['image'] ) ? sanitize_text_field( $rowsOpts['image'] ) : '';
            
                                    $row[$row_title]['image_height_row'] = isset( $rowsOpts['image_height'] ) ? stripslashes_deep( sanitize_text_field( $rowsOpts['image_height'] ) ) : '';
                    
                                    $row[$row_title]['image_width_row'] = isset( $rowsOpts['image_width'] ) ? sanitize_text_field( $rowsOpts['image_width'] ) : '';
    
	                            } else {
	                                $row[$row_title]['row_description_'.$tab_name[2]] = isset($rowsOpts['description_' . $tab_name[2]]) ? stripslashes_deep( wp_kses( $rowsOpts['description_' . $tab_name[2]], $arp_allowed_html ) ) : '';
	                                $row[$row_title]['row_tooltip_'.$tab_name[2]] = isset($rowsOpts['tooltip_' . $tab_name[2]]) ? stripslashes_deep( wp_kses( $rowsOpts['tooltip_' . $tab_name[2]], $arp_allowed_html ) ) : '';
	                                $row[$row_title]['row_label_'.$tab_name[2]] = isset($values['row_' . $i . '_label_' . $tab_name[2] . '_' . $j]) ? stripslashes_deep( wp_kses( $values['row_' . $i . '_label_' . $tab_name[2] . '_' . $j], $arp_allowed_html ) ) : '';
                                    $row[$row_title]['paypal_code_row_'.$tab_name[2]] = isset($rowsOpts['embed_script_'.$tab_name[2]]) ? stripslashes_deep( $rowsOpts['embed_script_'.$tab_name[2]]  ) : '';
                                     
                                    $row[$row_title]['button_url_'.$tab_name[2]] = isset($rowsOpts['btn_url_'.$tab_name[2]]) ? stripslashes_deep( esc_url_raw( $rowsOpts['btn_url_'.$tab_name[2]] ) ) : '';

                                    $row[$row_title]['image_row_'.$tab_name[2]] = isset( $rowsOpts['image_'.$tab_name[2]] ) ? sanitize_text_field( $rowsOpts['image_'.$tab_name[2]] ) : '';
            
                                    $row[$row_title]['image_height_row_'.$tab_name[2]] = isset( $rowsOpts['image_height_'.$tab_name[2]] ) ? stripslashes_deep( sanitize_text_field( $rowsOpts['image_height_'.$tab_name[2]] ) ) : '';
                    
                                    $row[$row_title]['image_width_row_'.$tab_name[2]] = isset( $rowsOpts['image_width_'.$tab_name[2]] ) ? sanitize_text_field( $rowsOpts['image_width_'.$tab_name[2]] ) : '';
	                            }
	                            $g++;
	                        }
	                    }
	                }

                    $ribbon_settings = array(
                        'arp_ribbon' => isset( $column_section['arp_ribbon'] ) ? $column_section['arp_ribbon'] : '',
                        'arp_ribbon_bgcol' => isset( $column_section['arp_ribbon_bgcol'] ) ? $column_section['arp_ribbon_bgcol'] : '',
                        'arp_ribbon_txtcol' => isset( $column_section['arp_ribbon_txtcol'] ) ? $column_section['arp_ribbon_txtcol'] : '',
                        'arp_ribbon_position' => isset( $column_section['arp_ribbon_position'] ) ? $column_section['arp_ribbon_position'] : '',
                        'arp_ribbon_custom_position_rl' => isset( $column_section['arp_ribbon_custom_position_rl'] ) ? intval($column_section['arp_ribbon_custom_position_rl']) : '',
                        'arp_ribbon_custom_position_top' => isset( $column_section['arp_ribbon_custom_position_top'] ) ? intval($column_section['arp_ribbon_custom_position_top']) : '',
                    );

                    $g = 0;
                    
                    foreach($total_tabs as $key => $tab_name){
                        if( $g == 0 ){
                        $ribbon_settings['arp_ribbon_content'] = isset($column_section['arp_ribbon_content']) ? stripslashes_deep( sanitize_text_field( $column_section['arp_ribbon_content'] ) ) : '';
                        $ribbon_settings['arp_custom_ribbon'] = isset($column_section['arp_custom_ribbon']) ? stripslashes_deep( sanitize_text_field( $column_section['arp_custom_ribbon'] ) ) : '';
                        } else {
                        $ribbon_settings['arp_ribbon_content_'.$tab_name[2]] = isset($column_section['arp_ribbon_content_' . $tab_name[2]]) ? stripslashes_deep( sanitize_text_field( $column_section['arp_ribbon_content_' . $tab_name[2]] ) ) : '';
                        $ribbon_settings['arp_custom_ribbon_'.$tab_name[2]] = isset( $column_section['arp_custom_ribbon_' . $tab_name[2]] ) ? stripslashes_deep( sanitize_text_field( $column_section['arp_custom_ribbon_' . $tab_name[2]] ) ) : '';
                        }
                        $g++;
                    }

                    $column[$Title] = array(
                        'column_width' => $column_width,
                        'is_caption' => $caption,
                        'custom_ribbon_txt' => $cstm_rbn_txt,
                        'column_highlight' => $column_highlight,
                        'column_hide' => $column_hide,
                        'column_background_color' => $column_background_color,
                        'column_hover_background_color' => $column_hover_background_color,
                        'column_background_image' => $column_background_image,
                        'column_background_image_height' => $column_background_image_height,
                        'column_background_image_width' => $column_background_image_width,
                        'column_background_scaling' => $column_background_scaling,
                        'column_background_min_positon' => $column_background_min_positon,
                        'column_background_max_positon' => $column_background_max_positon,
                        'arp_shortcode_customization_size' => $arp_shortcode_customization_size,
                        'arp_shortcode_customization_style' => $arp_shortcode_customization_style,
                        'shortcode_background_color' => $shortcode_background_color,
                        'shortcode_font_color' => $shortcode_font_color,
                        'shortcode_hover_background_color' => $shortcode_hover_background_color,
                        'shortcode_hover_font_color' => $shortcode_hover_font_color,
                        'gmap_marker' => isset($google_map_marker) ? $google_map_marker : '',
                        'body_text_alignment' => $body_text_alignemnt,
                        'rows' => $row,
                        'button_size' => $btn_size,
                        'button_height' => $btn_height,
                        'button_size_row' => $row_btn_size,
                        'button_height_row' => $row_btn_height,
                        'hide_default_btn' => $hide_default_btn,
                        'is_new_window' => $is_new_window,
                        'is_new_window_actual' => $is_new_window_actual,
                        'is_nofollow_link' => $is_nofollow_link,
                        'hide_default_btn_row' => $row_hide_default_btn,
                        'is_new_window_row' => $row_is_new_window,
                        'is_new_window_actual_row' => $row_is_new_window_actual,
                        'is_nofollow_link_row' => $row_is_nofollow_link,
                        'row_order' => $row_order,
                        'ribbon_setting' => $ribbon_settings,
                        'header_background_color' => $header_background_color,
                        'header_hover_background_color' => $header_hover_background_color,
                        'header_font_family' => $header_font_family,
                        'header_font_size' => $header_font_size,
                        'header_font_color' => $header_font_color,
                        'header_hover_font_color' => $header_hover_font_color,
                        'header_font_align' => $header_font_align,
                        'header_font_style' => $header_font_style,
                        'header_style_bold' => $header_style_bold,
                        'header_style_italic' => $header_style_italic,
                        'header_style_decoration' => $header_style_decoration,
                        'header_background_image' => $header_background_image,
                        'price_background_color' => $price_background_color,
                        'price_hover_background_color' => $price_hover_background_color,                        
                        'price_font_color' => $price_font_color,
                        'price_hover_font_color' => $price_hover_font_color,                        
                        'price_text_font_color' => $price_text_font_color,
                        'price_text_hover_font_color' => $price_text_hover_font_color,                        
                        'content_font_family' => $content_font_family,
                        'content_font_size' => $content_font_size,
                        'body_text_alignment' => $content_font_alignment,
                        'content_font_color' => $content_font_color,
                        'content_even_font_color' => $content_even_font_color,
                        'content_hover_font_color' => $content_hover_font_color,
                        'content_even_hover_font_color' => $content_even_hover_font_color,
                        'content_odd_color' => $content_odd_color,
                        'content_odd_hover_color' => $content_odd_hover_color,
                        'content_even_color' => $content_even_color,
                        'content_even_hover_color' => $content_even_hover_color,                        
                        'button_background_color' => $button_background_color,
                        'button_hover_background_color' => $button_hover_background_color,
                        'button_font_family' => $button_font_family,
                        'button_font_size' => $button_font_size,
                        'button_font_color' => $button_font_color,
                        'button_hover_font_color' => $button_hover_font_color,
                        'button_font_style' => $button_font_style,
                        'button_style_bold' => $button_style_bold,
                        'button_style_italic' => $button_style_italic,
                        'button_style_decoration' => $button_style_decoration,
                        'column_description_font_color' => $column_description_font_color,
                        'column_description_hover_font_color' => $column_description_hover_font_color,
                        'column_desc_background_color' => $column_desc_background_color,
                        'column_desc_hover_background_color' => $column_desc_hover_background_color,                        
                        'footer_content_position' => $footer_content_position,
                        'footer_text_align' => $footer_text_align,
                        'footer_level_options_font_family' => $footer_level_options_font_family,
                        'footer_background_color' => $footer_background_color,
                        'footer_hover_background_color' => $footer_hover_background_color,
                        'footer_level_options_font_size' => $footer_level_options_font_size,
                        'footer_level_options_font_color' => $footer_level_options_font_color,
                        'footer_level_options_hover_font_color' => $footer_level_options_hover_font_color,
                        'footer_level_options_font_style_bold' => $footer_level_options_font_style_bold,
                        'footer_level_options_font_style_italic' => $footer_level_options_font_style_italic,
                        'footer_level_options_font_style_decoration' => $footer_level_options_font_style_decoration,
                        'header_margin_top' => $header_margin_top,
                        'shortcode_min_height' => $hscode_min_height,
                        'price_min_height' => $price_min_height,
                        'col_desc_min_height' => $col_desc_min_height,
                        'footer_min_height' => $footer_min_height,
                        'button_min_height' => $button_min_height
                    );

                $g = 0;
                foreach($total_tabs as $key => $tab_name){
                    if( $g == 0 ){
                        $column[$Title]['package_title'] = isset($header_section['header_title']) ? stripslashes_deep( wp_kses( $header_section['header_title'], $arp_allowed_html ) ) : '';

                        $column[$Title]['column_description'] = isset($column_description['description']) ? stripslashes_deep( wp_kses( $column_description['description'], $arp_allowed_html ) ) : '';
                          
                        $column[$Title]['post_variables_content'] = isset($column_section['post_variables_content']) ? stripslashes_deep( sanitize_text_field( $column_section['post_variables_content'] ) ) : '';

                        $column[$Title]['arp_header_shortcode'] = isset($header_section['header_shortcode']) ? stripslashes_deep( $header_section['header_shortcode'] ) : '';

                        if( $caption ){
                            $column[$Title]['html_content'] = isset($header_section['header_title']) ? stripslashes_deep( wp_kses( $header_section['header_title'], $arp_allowed_html ) ) : '';
                        }
                          
                        $column[$Title]['price_text'] = isset($pricing_content['price_text']) ? stripslashes_deep( wp_kses( $pricing_content['price_text'], $arp_allowed_html ) ) : '';
                          
                        $column[$Title]['button_text'] = isset($button_section['btn_content']) ? stripslashes_deep( wp_kses( $button_section['btn_content'], $arp_allowed_html ) ) : '';

                        $column[$Title]['btn_img'] = isset( $button_section['image'] ) ? sanitize_text_field( $button_section['image'] ) : '';
                        
                        $column[$Title]['btn_img_height'] = isset( $button_section['image_height'] ) ? intval($button_section['image_height']) : '';
                        $column[$Title]['btn_img_width'] = isset( $button_section['image_width'] ) ? intval($button_section['image_width']) : '';
                          
                        $column[$Title]['paypal_code'] = isset($button_section['embed_script']) ? stripslashes_deep( $button_section['embed_script'] ) : '';
                          
                        $column[$Title]['button_url'] = isset($button_section['btn_url']) ? stripslashes_deep( esc_url_raw( $button_section['btn_url'] ) ) : '';
                          
                        $column[$Title]['footer_content'] = isset($footer_content['footer_content']) ? stripslashes_deep(wp_kses( $footer_content['footer_content'], $arp_allowed_html ) ) : '';
                    } else {

                        $column[$Title]['package_title_'.$tab_name[2]] = isset($header_section['header_title_'.$tab_name[2]]) ? stripslashes_deep( wp_kses( $header_section['header_title_'.$tab_name[2]], $arp_allowed_html ) ) : '';

                        $column[$Title]['column_description_'.$tab_name[2]] = isset($column_description['description_'.$tab_name[2]]) ? stripslashes_deep( wp_kses( $column_description['description_'.$tab_name[2]], $arp_allowed_html ) ) : '';
                          
                        $column[$Title]['post_variables_content_'.$tab_name[2]] = isset($column_section['post_variables_content_'.$tab_name[2]]) ? stripslashes_deep( sanitize_text_field( $column_section['post_variables_content_'.$tab_name[2]] ) ) : '';
                          
                        $column[$Title]['arp_header_shortcode_'.$tab_name[2]] = isset($header_section['header_shortcode_'.$tab_name[2]]) ? stripslashes_deep( $header_section['header_shortcode_'.$tab_name[2]]) : '';
                          
                        if( $caption ){
                            $column[$Title]['html_content_'.$tab_name[2]] = isset($header_section['header_title_' . $tab_name[2]]) ? stripslashes_deep( wp_kses( $header_section['header_title_'.$tab_name[2]], $arp_allowed_html ) ) : '';
                        }
                          
                        $column[$Title]['price_text_'.$tab_name[3].'_step'] = isset($pricing_content['price_text_' . $tab_name[2]]) ? stripslashes_deep( wp_kses( $pricing_content['price_text_' . $tab_name[2]], $arp_allowed_html ) ) : '';

                            
                        $column[$Title]['btn_content_'.$tab_name[2]] = isset($button_section['btn_content_'.$tab_name[2]]) ? stripslashes_deep( wp_kses( $button_section['btn_content_'.$tab_name[2]], $arp_allowed_html ) ) : '';

                        $column[$Title]['btn_img_'.$tab_name[2]] = isset( $button_section['image_'.$tab_name[2]] ) ? sanitize_text_field( $button_section['image_'.$tab_name[2]] ) : '';


                        $column[$Title]['btn_img_height_'.$tab_name[2]] = isset( $button_section['image_height_'.$tab_name[2]] ) ? intval($button_section['image_height_'.$tab_name[2]]) : '';

                        $column[$Title]['btn_img_width_'.$tab_name[2]] = isset( $button_section['image_width_'.$tab_name[2]] ) ? intval($button_section['image_width_'.$tab_name[2]]) : '';

                        $column[$Title]['paypal_code_'.$tab_name[2]] = isset($button_section['embed_script_'.$tab_name[2]]) ? stripslashes_deep( $button_section['embed_script_'.$tab_name[2]] ) : '';

                        $column[$Title]['button_url_'.$tab_name[2]] = isset($button_section['btn_url_'.$tab_name[2]]) ? stripslashes_deep( esc_url_raw( $button_section['btn_url_'.$tab_name[2]] ) ) : '';

                        $column[$Title]['footer_content_'.$tab_name[2]] = isset($footer_content['footer_content_'.$tab_name[2]]) ? stripslashes_deep( wp_kses( $footer_content['footer_content_'.$tab_name[2]], $arp_allowed_html ) ) : '';

                    }
                    $g++;
                    $column[$Title]['header_min_height_'.$tab_name[2]] = isset( $header_section['min_height_' . $tab_name[2]] ) ? stripslashes_deep( sanitize_text_field( $header_section['min_height_' . $tab_name[2]] ) ) : '';
                }
                }
            }
        } else {
            return;
        }

        $tbl_opt['columns'] = $column;
        $tbl_opt['column_order'] = $column_order;
        $table_options = maybe_serialize($tbl_opt);
        
        

        if ($pt_action == "new") {
            $ins = $wpdb->query($wpdb->prepare('INSERT INTO ' . $wpdb->prefix . 'arp_arprice_options (table_id,table_options) VALUES (%d,%s)', $table_id, $table_options));

            $css_file_name = $template_name . '.css';

            WP_Filesystem();

            global $wp_filesystem;

            if (file_exists(PRICINGTABLE_DIR . '/css/templates/' . $template_name . '_v' . $arprice_images_css_version . '.css')) {
                $css = ARPFilecontroller::arp_get_file_content(PRICINGTABLE_DIR . '/css/templates/' . $template_name . '_v' . $arprice_images_css_version . '.css');
            } else {

                if (file_exists(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name)) {
                    $css = ARPFilecontroller::arp_get_file_content(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name);
                } else {
                    $css = ARPFilecontroller::arp_get_file_content(PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css');
                }

            }

            $css_new = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $table_id, $css);

            $css_new = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_new);

            $path = PRICINGTABLE_UPLOAD_DIR . '/css/';

            $file_name = 'arptemplate_' . $table_id . '.css';

            $wp_filesystem->put_contents($path . $file_name, $css_new, 0777);
        } else {
            $ins = $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'arp_arprice_options SET table_options = %s WHERE table_id = %d', $table_options, $table_id));
            $query = $wpdb->get_row($wpdb->prepare('SELECT is_template FROM ' . $wpdb->prefix . 'arp_arprice WHERE ID = %d', $table_id));

            $is_template = $query->is_template;

            if ($is_template == 0 and ! file_exists(PRICINGTABLE_UPLOAD_URL . '/css/arptemplate_' . $table_id . '.css')) {

                WP_Filesystem();

                global $wp_filesystem;

                $css_file_name = $template_name . '.css';

                $ref_id = str_replace('arptemplate_', '', $reference_template);
                if( $ref_id >= 20 ){
                    $ref_id = $ref_id - 3;
                    $reference_template = 'arptemplate_'.$ref_id;
                }

                if (file_exists(PRICINGTABLE_DIR . '/css/templates/' . $template_name . '_v' . $arprice_images_css_version . '.css')) {
                    $css = ARPFilecontroller::arp_get_file_content(PRICINGTABLE_DIR . '/css/templates/' . $template_name . '_v' . $arprice_images_css_version . '.css');
                } else {
                    if (file_exists(PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css')) {
                        $css = ARPFilecontroller::arp_get_file_content(PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css');
                    } else if( file_exists(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name) ){
                        $css = ARPFilecontroller::arp_get_file_content(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name);
                    }
                }

                $css_new = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $table_id, $css);

                $css_new = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_new);

                $path = PRICINGTABLE_UPLOAD_DIR . '/css/';

                $file_name = 'arptemplate_' . $table_id . '.css';

                $wp_filesystem->put_contents($path . $file_name, $css_new, 0777);
            }
        }


        
        $all_previewoption = get_option('arp_previewoptions');
        $all_previewoption = maybe_unserialize($all_previewoption);
        if ($all_previewoption && count($all_previewoption) > 0) {
            $option_to_delete = array();
            $day_ago_time = strtotime("-2 days");
            $all_previewoption_db = $all_previewoption;
            foreach ($all_previewoption as $opt_name => $opt_date) {
                if (isset($opt_name) && $opt_name != '' && $opt_name != '0' && $opt_date <= $day_ago_time) {
                    $option_to_delete[] = $opt_name;
                    unset($all_previewoption_db[$opt_name]);
                }
            }
            if ($option_to_delete && count($option_to_delete) > 0) {
                update_option('arp_previewoptions', $all_previewoption_db);  
                $option_to_delete_str = implode("','", $option_to_delete);
                $option_to_delete_str = "'" . $option_to_delete_str . "'";
                $wpdb->query("DELETE FROM " . $wpdb->options . " WHERE option_name IN (" . $option_to_delete_str . ")");
            }
        }
        
        $pricing_table_updated_ids = get_option('arprice_version_v39_updated_forms');

        if( "new" != $pt_action && !empty($pricing_table_updated_ids) && in_array( $table_id, $pricing_table_updated_ids ) ){
            $pricing_table_key = array_search( $table_id, $pricing_table_updated_ids );
            if( false !== $pricing_table_key ){
                unset( $pricing_table_updated_ids[ $pricing_table_key ] );

                if( count( $pricing_table_updated_ids ) > 0 ){
                    update_option( 'arprice_version_v39_updated_forms', $pricing_table_updated_ids );
                } else {
                    delete_option( 'arprice_version_v39_updated_forms' );
                }
            }
        }

        echo $pt_action . '~|~' . $table_id . '~|~' . $is_template;

        die();
    }

    function create($values = array()) {
        global $wpdb,$arp_update_table;

        $form_name = $values['name'];
        $dt = current_time('mysql');
        $status = $values['status'];
        $template = $values['is_template'];
        $template_name = $values['template_name'];
        $is_animated = $values['is_animated'];
        $options = $values['options'];

        if( isset($arp_update_table) && $arp_update_table == true ){
            $table_id = $values['ID'];
            $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "arp_arprice (ID,table_name,template_name,general_options,is_template,is_animated,status,create_date,arp_last_updated_date) VALUES (%d,%s,%d,%s,%d,%d,%s,%s,%s) ", $table_id, $form_name, $template_name, $options, $template, $is_animated, $status, $dt, $dt));
        } else {
            $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "arp_arprice (table_name,template_name,general_options,is_template,is_animated,status,create_date,arp_last_updated_date) VALUES (%s,%d,%s,%d,%d,%s,%s,%s) ", $form_name, $template_name, $options, $template, $is_animated, $status, $dt, $dt));

        }
        return $wpdb->insert_id;
    }

    function new_release_update($values = array()) {
        global $wpdb;

        $form_name = $values['name'];
        $dt = current_time('mysql');
        $status = $values['status'];
        $template = $values['is_template'];
        $template_name = $values['template_name'];
        $is_animated = $values['is_animated'];
        $options = $values['options'];


        $wpdb->query($wpdb->prepare("UPDATE " . $wpdb->prefix . "arp_arprice set general_options = %s where template_name = %d ", $options, $template_name));

        return $template_name;
    }

    function option_create($table_id, $opts) {
        global $wpdb;
        $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "arp_arprice_options(table_id,table_options) VALUES (%d,%s)", $table_id, $opts));
    }

    function new_release_option_update($table_id, $opts) {
        global $wpdb;

        $wpdb->query($wpdb->prepare("UPDATE " . $wpdb->prefix . "arp_arprice_options set table_options = %s where table_id = %d ", $opts, $table_id));
    }

    function get_direct_link($tbl_id = '', $chk_preview = false) {

        if (!$chk_preview) {
            $target_url = esc_url(get_home_url() . '/index.php?plugin=arprice&arpaction=preview&tbl=' . $tbl_id);
        } else {
            $target_url = esc_url(get_home_url() . '/index.php?plugin=arprice&arpaction=preview&home_view=1&tbl=' . $tbl_id);
        }

        if (is_ssl()) {
            $target_url = str_replace('http://', 'https://', $target_url);
        }

        return $target_url;
    }

    function parse_standalone_request() {
        global $arprice_form;
        $plugin = isset($_REQUEST['plugin']) ? $_REQUEST['plugin'] : '';

        $action = isset($_REQUEST['arpaction']) ? $_REQUEST['arpaction'] : '';

        if (!empty($plugin) and $plugin == 'arprice' and ! empty($action) and $action == 'preview') {

            $table_id = isset($_REQUEST['tbl']) ? $_REQUEST['tbl'] : '';
            $arprice_form->preview_table($table_id);
            exit;
        }
    }

    function preview_table($table_id) {

        header("Content-Type: text/html; charset=utf-8");

        header("Cache-Control: no-cache, must-revalidate, max-age=0");

        $is_tbl_preview = 1;

        require(PRICINGTABLE_VIEWS_DIR . '/arprice_preview.php');
    }

    function edit_template() {
        global $wpdb;
        $arpaction_new = 'new';
        if (isset($_REQUEST['template_type']) and $_REQUEST['template_type'] == 'new') {
            
        } else if (isset($_REQUEST['template_type']) and $_REQUEST['template_type'] != '') {
            $template_id = $_REQUEST['template_type'];

            
            $tbl_res = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d", $template_id));

            $results = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $tbl_res->ID));

            $new_values = array();

            $new_values['table_name'] = isset($tbl_res->table_name) ? $tbl_res->table_name : '';
            $new_values['general_options'] = isset($tbl_res->general_options) ? $tbl_res->general_options : '';
            $new_values['is_template'] = 0;
            $new_values['status'] = 'draft';
            $new_current_date = current_time('mysql');
            $new_values['create_date'] = $new_current_date;
            $new_values['arp_last_updated_date'] = $new_current_date;

            $res = $wpdb->insert($wpdb->prefix . "arp_arprice", $new_values);
            $table_id = $wpdb->insert_id;

            $new_values = array();
            $new_values['table_id'] = $table_id;
            $new_values['table_options'] = isset($results->table_options) ? $results->table_options : '';
            $res = $wpdb->insert($wpdb->prefix . "arp_arprice_options", $new_values);

            
            $general_option = maybe_unserialize($tbl_res->general_options);

            $general_font_settings = isset($general_option['font_settings']) ? $general_option['font_settings'] : array();

            $general_column_settings = isset($general_option['font_settings']) ? $general_option['column_settings'] : array();

            $general_tooltip_settings = isset($general_option['tooltip_settings']) ? $general_option['tooltip_settings'] : array();

            $new_values = array();

            $arpaction_new = 'edit';
        }

        if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arprice_listing_editor.php')) {
            include PRICINGTABLE_VIEWS_DIR . '/arprice_listing_editor.php';
        }

    }

    function arp_header_image_shortcode($atts) {
        global $arp_is_lightbox;
        if( $arp_is_lightbox == '' ){
            $arp_is_lightbox = 0;
        }
        $image_url = isset($atts['id']) ? $atts['id'] : '';
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';
        
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        if(strpos($height, 'px')===true){
            $height = str_replace("px", "", $height);
        }
        if(strpos($width, 'px')===true){
            $width = str_replace("px", "", $width);
        }
        $style_width = 'auto';
        $style_height = 'auto';
        $arpifr_width = 'width: auto;';
        $arpifr_height = 'height: auto;';
        if($width != 'auto' && $width!=''){
            $style_width = "width:".$width."px;";
            $width = " width='".$width."'";
        }else {
            $width = "";
            $style_width = "";
        }
        if($height != 'auto' && $height!=''){
            $style_height = "height:".$height."px;";
            $height = " height='".$height."'";
        }else{
            $height = "";    
            $style_height = "";
        }
        
        $style = "";
        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            return "<div class='arp_header_image arp_header_image_lightbox' data-bpopup=\"<iframe class='arp_video_ifr' src='".$image_url."' style='border:0px;margin:0px;".$arpifr_width.$arpifr_height."'></iframe>\"> 
                    <img " . $width . $height . " src='" . $image_url . "' class='alignnone arp_video_current_img' style='".$style_width.$style_height."'/> 
                    </div>";
        } else {
            return '<div class="arp_header_image"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><img ' . $width . $height . ' src="' . $image_url . '" class="alignnone" style="'.$style_width.$style_height.'" /></div>';
        }
    }

    function arp_youtube_video_shortcode($atts) {
        global $arp_is_lightbox;
        if( $arp_is_lightbox == '' ){
            $arp_is_lightbox = 0;
        }

        $video_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '1' : '';
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';
        
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        
        if(strpos($height, 'px')===true){
            $height = str_replace("px", "", $height);
        }
        if(strpos($width, 'px')===true){
            $width = str_replace("px", "", $width);
        }
        $arpifr_width = 'width: auto;';
        $arpifr_height = 'height: auto;';
        $style_width = 'auto';
        $style_height = 'auto';
        if($width != 'auto' && $width!=''){
            $style_width = "width:".$width."px;";
            $width = " width='".$width."'";
        }else {
            $width = "";
            $style_width = "width:auto;";
        }
        if($height != 'auto' && $height!=''){
            $style_height = "height:".$height."px;";
            $height = " height='".$height."'";
        }else{
            $height = "";    
            $style_height = "height:auto";
        }

        $style = "";

        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;

            $imageURL = "http".$https."://img.youtube.com/vi/" . $video_id . "/maxresdefault.jpg;";


            return '<div class="arp_youtube_video arp_youtube_video_lightbox"' . ' data-bpopup=\'<iframe class="arp_video_ifr" src="http'.$https.'://www.youtube.com/embed/' . $video_id . '?wmode=opaque&amp;controls=1&amp;showinfo=1&amp;autohide=1&amp;rel=0&amp;autoplay=' . $autoplay . '" style="border:0px;margin:0px;'.$arpifr_width.$arpifr_height.'"></iframe>\'>
                                    <img src="' . $imageURL . '" class="arp_video_current_img" style="'.$style_width.$style_height.'" />
                            </div>';
        } else {
            return '<div class="arp_youtube_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe  src="http'.$https.'://www.youtube.com/embed/' . $video_id . '?wmode=opaque&amp;controls=1&amp;showinfo=1&amp;autohide=1&amp;rel=0&amp;autoplay=' . $autoplay . '" style="border:0px;margin:0px;'.$style_width.$style_height.'"></iframe></div>';
        }
    }

    function arp_vimeo_video_shortcode($atts) {
        global $arp_is_lightbox;
        if( $arp_is_lightbox == '' ){
            $arp_is_lightbox = 0;
        }
        $video_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '1' : '0';
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';
        $color = isset($atts['color']) ? $atts['color'] : '';
        
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $style = "";
        if( $height != 'auto' && strpos($height, 'px') === false ){
            $height .= 'px';
        }
        if( $width != 'auto' && strpos($width, 'px') === false ){
            $width .= 'px';
        }
        $arpifr_width = 'width: auto;';
        $arpifr_height = 'height: auto;';
        $style_width = 'auto';
        $style_height = 'auto';
        if($width != 'auto' && $width!=''){
            $style_width = "width:".$width."px;";
            $width = " width='".$width."'";
        }else {
            $width = "";
            $style_width = "width:auto;";
        }
        if($height != 'auto' && $height!=''){
            $style_height = "height:".$height."px;";
            $height = " height='".$height."'";
        }else{
            $height = "";    
            $style_height = "height:auto";
        }
        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $data = ARPFilecontroller::arp_get_file_content("http://vimeo.com/api/v2/video/" . $video_id . ".json");
            $data = json_decode($data);
            $imageURL = $data[0]->thumbnail_large;

            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }

            return '<div class="arp_vimeo_video arp_vimeo_video_lightbox" data-bpopup=\'<iframe class="arp_video_ifr" src="http'.$https.'://player.vimeo.com/video/' . esc_attr($video_id) . '?title=0&amp;byline=0&amp;portrait=0&amp;autohide=1&amp;color=' . $color . '&amp;autoplay=' . $autoplay . '" style="border:0px;margin:0px;'.$arpifr_width.$arpifr_height.'"></iframe>\' >
                                <img src="' . $imageURL . '"  class="arp_video_current_img" style="'.$style_width.$style_height.'"" />
                        </div>';
        } else {
            return '<div class="arp_vimeo_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http'.$https.'://player.vimeo.com/video/' . esc_attr($video_id) . '?title=0&amp;byline=0&amp;portrait=0&amp;autohide=1&amp;color=' . $color . '&amp;autoplay=' . $autoplay . '" style="border:0px;margin:0px;'.$style_width.$style_height.'"></iframe></div>';
        }
    }



    function arp_screenr_video_shortcode($atts) {
        global $arp_is_lightbox;
        if( $arp_is_lightbox == '' ){
            $arp_is_lightbox = 0;
        }
        $video_id = isset($atts['id']) ? $atts['id'] : '';
        $https = is_ssl() ? 's' : '';
        
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        
        $style = "";
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        if( $height != 'auto' && strpos($height, 'px') === false ){
            $height .= 'px';
        }
        if( $width != 'auto' && strpos($width, 'px') === false ){
            $width .= 'px';
        }


        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $data = ARPFilecontroller::arp_get_file_content("http://www.screenr.com/api/oembed.json?url=http://www.screenr.com/" . $video_id);
            $data = json_decode($data);
            $imageURL = $data->thumbnail_url;

            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }

            return '<div class="arp_screenr_video arp_screenr_video_lightbox" data-bpopup=\'<iframe class="arp_video_ifr" src="http'.$https.'://www.screenr.com/embed/' . esc_attr($video_id) . '" style="border:0px;margin:0px;width:' . $width . ';height:' . $height . ';"></iframe>\'>
                <img src="' . $imageURL . '" class="arp_video_current_img"  />
            </div>';
        } else {
            return '<div class="arp_screenr_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http'.$https.'://www.screenr.com/embed/' . esc_attr($video_id) . '" style="border:0px;margin:0px;width:' . $width . ';height:' . $height . ';"></iframe></div>';
        }
    }

    function arp_html5_video_shortcode($atts) {
        global $arp_is_lightbox;
        if( $arp_is_lightbox == '' ){
            $arp_is_lightbox = 0;
        }
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        extract(shortcode_atts(array(
            'mp4' => '',
            'webm' => '',
            'ogg' => '',
            'poster' => '',
            'autoplay' => 0,
            'loop'     => 0,
        ), $atts));
        $https = is_ssl() ? 's' : '';

        $mp4 = $mp4 != "" ? '<source src="' . $mp4 . '" type="video/mp4">' : '';
        $webm = $webm != "" ? '<source src="' . $webm . '" type="video/webm">' : '';
        
        
        $ogg = $ogg != "" ? '<source src="' . $ogg . '" type="video/ogg">' : '';
        $poster = $poster != "" ? $poster : '';
        $autoplay = $autoplay == 1 ? 'autoplay="true"' : '';
        $loop = $loop == 1 ? 'loop="true"' : '';

        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $imageURL = '';
            if (!empty($atts['poster'])) {
                $imageURL = $atts['poster'];
                if(is_ssl()){
                    $imageURL = str_replace('http://', 'https://', $imageURL);
                }
                return '<div class="arp_html5_video arp_html5_video_lightbox" data-bpopup=\'<video controls="controls"' . ( $autoplay != '' ? $autoplay : '' ) . ( $loop != '' ? $loop : '' ) . ( $poster != '' ? ' poster="' . $poster . '"' : '' ) . '>' . $mp4 . $webm . $ogg . '<object type="application/x-shockwave-flash" data="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf">
              <param name="movie" value="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf" />
              <param name="flashvars" value="controls=true&poster=' . $poster . '&file=' . $mp4 . '" />
              <img src="' . $poster . '" title="No video playback capabilities" />
              </object></video>\'>
                    <img src="' . $imageURL . '"   />
                </div>';
            } else {
                $imageURL = PRICINGTABLE_IMAGES_URL . '/video-icon.png';
                if(is_ssl()){
                    $imageURL = str_replace('http://', 'https://', $imageURL);
                }
                return '<div class="arp_html5_video arp_html5_video_lightbox" data-bpopup=\'<video controls="controls"' . ( $autoplay != '' ? $autoplay : '' ) . ( $loop != '' ? $loop : '' ) . ( $poster != '' ? ' poster="' . $poster . '"' : '' ) . '>' . $mp4 . $webm . $ogg . '<object type="application/x-shockwave-flash" data="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf">
              <param name="movie" value="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf" />
              <param name="flashvars" value="controls=true&poster=' . $poster . '&file=' . $mp4 . '" />
              <img src="' . $poster . '" title="No video playback capabilities" />
              </object></video>\'>
                <img class="arp_video_img" src="' . $imageURL . '"   />
            </div>';
            }
        } else {
            return '<video controls="controls"' . ( $autoplay != '' ? $autoplay : '' ) . ( $loop != '' ? $loop : '' ) . ( $poster != '' ? ' poster="' . $poster . '"' : '' ) . '>' . $mp4 . $webm . $ogg . '<object type="application/x-shockwave-flash" data="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf">
              <param name="movie" value="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf" />
              <param name="flashvars" value="controls=true&poster=' . $poster . '&file=' . $mp4 . '" />
              <img src="' . $poster . '" title="No video playback capabilities" />
              </object></video>';
        }


    }

    function arp_html5_audio_shortcode($atts) {
        extract(shortcode_atts(array(
            'mp3' => '',
            'wav' => '',
            'ogg' => '',
            'autoplay' => 0,
            'loop' => 0
                        ), $atts));

        $autoplay = $autoplay == 1 ? 'autoplay="true"' : '';
        $loop = $loop == 1 ? 'loop="yes"' : '';
        $mp3 = $mp3 != "" ? "<source src='" . $mp3 . "' type='audio/mpeg'>" : '';
        $ogg = $ogg != '' ? '<source src="' . $ogg . '" type="audio/ogg">' : '';
        $wav = $wav != '' ? '<source src="' . $wav . '" type="audio/wav">' : '';

        return '<audio controls="controls"' . ( $autoplay != '' ? $autoplay : '' ) . ( $loop != '' ? $loop : '' ) . ' style="width: 100%;">' . $mp3 . $ogg . $wav . '</audio>';
    }

    function arp_googlemap_shortcode($atts) {
        extract(shortcode_atts(array(
            'address' => '',
            'title' => '',
            'marker_image' => '',
            'content' => NULL,
            'show_popup' => 'no',
            'zoom' => 14,
            'maptype' => 'ROADMAP',
            'width' => '100%',
            'height' => '300',
                        ), $atts));

        $address = $address ? $address : '';
        $height = $height ? $height : '300';
        $popup = $show_popup ? true : false;
        $icon = $marker_image ? $marker_image : '';
        $zoom = isset($zoom_level) ? $zoom_level : '14';
        $content = $content ? $content : '';
        $maptype = $maptype ? $maptype : 'ROADMAP';

        $mapdata = array();
        $mapdata['api_key'] = get_option('arp_google_map_api_key');
        $mapdata['markers'][] = array(
            'address' => $address,
            'title' => $title,
            'icon' => !empty($icon) ? array('image' => $icon) : null,
            'html' => isset($content) ? array(
                'content' => $content,
                'popup' => $popup
                    ) : null,
        );
        $mapdata['zoom'] = intval($zoom);
        $mapdata['maptype'] = $maptype;
        $mapdata['mapTypeControl'] = false;

        return '<div class="arp_googlemap" style="width:100%; height:' . $height . 'px;" data-map="' . esc_attr(json_encode($mapdata)) . '"></div>';
    }

    function arp_dailymotion_video_shortcode($atts) {
        global $arp_is_lightbox;
        if( $arp_is_lightbox == '' ){
            $arp_is_lightbox = 0;
        }
        $video_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '1' : '';
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';
        
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        
        $style = "";
        if(strpos($height, 'px')===true){
            $height = str_replace("px", "", $height);
        }
        if(strpos($width, 'px')===true){
            $width = str_replace("px", "", $width);
        }

        $style_width = 'auto';
        $style_height = 'auto';
        if($width != 'auto' && $width!=''){
            $style_width = "width:".$width."px;";
            $width = " width='".$width."'";
        }else {
            $width = "";
            $style_width = "width:auto;";
        }
        if($height != 'auto' && $height!=''){
            $style_height = "height:".$height."px;";
            $height = " height='".$height."'";
        }else{
            $height = "";    
            $style_height = "height:auto";
        }

        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $data = ARPFilecontroller::arp_get_file_content('https://api.dailymotion.com/video/' . $video_id . '?fields=thumbnail_large_url');
            $data = json_decode($data);
            $imageURL = $data->thumbnail_large_url;

            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }

            return '<div class="arp_dailymotion_video arp_dailymotion_video_lightbox"  data-bpopup=\'<iframe class="arp_video_ifr" src="http' . $https . '://www.dailymotion.com/embed/video/' . esc_attr($video_id) . '?wmode=opaque&amp;autoPlay=' . $autoplay . '" style="border:0px;margin:0px;width:' . $style_width . ';height:' . $style_height . ';"></iframe>\'>
                <img src="' . $imageURL . '" class="arp_video_current_img" style="'.$style_width.$style_height.'" />
            </div>';

        } else {
            return '<div class="arp_dailymotion_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://www.dailymotion.com/embed/video/' . esc_attr($video_id) . '?wmode=opaque&amp;autoPlay=' . $autoplay . '" style="border:0px;margin:0px;'.$style_height.$style_width.'"></iframe></div>';
        }
    }

    function arp_metacafe_video_shortcode($atts) {
        global $arp_is_lightbox;
        if( $arp_is_lightbox == '' ){
            $arp_is_lightbox = 0;
        }
        $video_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '1' : '';
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        
        $style = "";
        if(strpos($height, 'px')===true){
            $height = str_replace("px", "", $height);
        }
        if(strpos($width, 'px')===true){
            $width = str_replace("px", "", $width);
        }
        $arpifr_width = 'width: auto;';
        $arpifr_height = 'height: auto;';
        $style_width = 'auto';
        $style_height = 'auto';
        if($width != 'auto' && $width!=''){
            $style_width = "width:".$width."px;";
            $width = " width='".$width."'";
        }else {
            $width = "";
            $style_width = "width:auto;";
        }
        if($height != 'auto' && $height!=''){
            $style_height = "height:".$height."px;";
            $height = " height='".$height."'";
        }else{
            $height = "";    
            $style_height = "height:auto";
        }

        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $exp_str = explode("/", $video_id);
            $video_id1 = trim($exp_str[0]);
            $video_id2 = $video_id1 / 1000;
            $video_id2 = intval($video_id2);
            $video_id2 = $video_id2 * 1000;

            $https = is_ssl() ? 's' : '' ;
            $imageURL = 'http'.$https.'://cdn.mcstatic.com/contents/videos_screenshots/'.$video_id2.'/'.$video_id1.'/400x225/1.jpg';

            return '<div class="arp_metacafe_video arp_metacafe_video_lightbox"   data-bpopup=\'<iframe class="arp_video_ifr" src="http' . $https . '://www.metacafe.com/embed/' . $video_id . '?wmode=opaque&amp;controls=1&amp;showinfo=1&amp;autohide=1&amp;rel=0&amp;ap=' . $autoplay . '" style="border:0px;margin:0px;'.$arpifr_width.$arpifr_height.'"></iframe>\'>
				<img src="' . $imageURL . '" class="arp_video_current_img" style="'.$style_width.$style_height.'" />
			</div>';
        } else {
            return '<div class="arp_metacafe_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://www.metacafe.com/embed/' . $video_id . '?wmode=opaque&amp;controls=1&amp;showinfo=1&amp;autohide=1&amp;rel=0&amp;ap=' . $autoplay . '" style="border:0px;margin:0px;'.$style_width.$style_height.'"></iframe></div>';
        }
    }

    function arp_soundcloud_audio_shortcode($atts) {

        $audio_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = (isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? 'true' : 'false';
        $https = is_ssl() ? 's' : '';
        $width = '100%';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';

        return '<div class="arp_soundcloud_audio"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F' . esc_attr($audio_id) . '?wmode=opaque&amp;auto_play=' . $autoplay . '&amp;show_artwork=true" style="border:0px;margin:0px;"></iframe></div>';
    }

    function arp_mixcloud_audio_shortcode($atts) {

        $audio_url = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';

        $width = '100%';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
        ;

        return '<div class="arp_mixcloud_audio"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://www.mixcloud.com/widget/iframe/?feed=' . esc_attr(urlencode(trim($audio_url, '/'))) . '%2F&amp;show_tracklist=&amp;wmode=opaque" style="border:0px;margin:0px;"></iframe></div>';
    }

    function arp_beatport_audio_shortcode($atts) {

        $audio_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '&amp;auto=yes' : '';
        $https = is_ssl() ? 's' : '';

        $width = '100%';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
        ;


        return '<div class="arp_beatport_audio"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://embed.beatport.com/player?id=' . esc_attr($audio_id) . '?wmode=opaque&amp;type=track' . $autoplay . '" style="border:0px;margin:0px;"></iframe></div>';
    }

    function arp_embed_shortcode($atts) {

        $embed = isset($atts['embed']) ? $atts['embed'] : '';

        return '<div class="arp_embed_video">' . html_entity_decode($embed) . '</div>';
    }

    function arp_render_customcss($table_id, $general_option, $front_preview, $opts, $is_animated) {
        global $arp_mainoptionsarr, $arprice_fonts, $arprice_form, $arprice_default_settings,$arp_pricingtable;

        $returnstring = "";

        $template_type = $general_option['template_setting']['template_type'];

        $general_font_settings = $general_option['font_settings'];

        $general_column_settings = $general_option['column_settings'];

        $general_tooltip_settings = $general_option['tooltip_settings'];

        $general_column_animation = $general_option['column_animation'];

        $general_template_settings = $general_option['template_setting'];

        $template_color_skin = $general_template_settings['skin'];

        $general_settings = $general_option['general_settings'];

        $column_order = $general_settings['column_order'];

        $col_ord_arr = json_decode($column_order, true);

        $temp_cols = $opts['columns'];

        $new_cols = array();
        $new_cols['columns'] = array();
        if (is_array($col_ord_arr) && count($col_ord_arr) > 0) {
            foreach ($col_ord_arr as $key => $value) {
                $new_value = str_replace('main_', '', $value);
                $new_col_id = $new_value;
                foreach ($opts['columns'] as $j => $columns) {
                    if ($new_col_id == $j) {
                        $new_cols['columns'][$new_col_id] = $columns;
                    }
                }
            }
        } else {
            $new_cols = $opts;
        }

        $opts = $new_cols;

        $user_edited_columns = $general_settings['user_edited_columns'];
        $reference_template = $general_option['general_settings']['reference_template'];
        if (isset($general_template_settings['template_feature']) and ! empty($general_template_settings['template_feature'])) {
            $template_feature = maybe_unserialize($general_template_settings['template_feature']);
        } else {
            
            $template_feature = maybe_unserialize($general_template_settings['features']);
        }
        $new_values = array();

        $pricing_table_updated_ids = get_option('arprice_version_v39_updated_forms');

        $new_values['column_space'] = isset($general_column_settings['column_space']) ? $general_column_settings['column_space'] : 0;

        $new_values['min_row_height'] = isset( $general_column_settings['min_row_height'] ) ? $general_column_settings['min_row_height'] : '';

        $new_values['highlight_column'] = isset($general_column_settings['highlightcolumnonhover']) ? 1 : 0;

        $new_values['tooltip_bg_color'] = $general_tooltip_settings['background_color'];

        $new_values['tooltip_text_color'] = $general_tooltip_settings['text_color'];

        $new_values['tooltip_style'] = isset($general_tooltip_settings['tooltip_style']) ? $general_tooltip_settings['tooltip_style'] : '';

        $new_values['tooltip_font_family'] = $general_tooltip_settings['tooltip_font_family'];

        $new_values['tooltip_font_size'] = $general_tooltip_settings['tooltip_font_size'];

        

        $new_values['tooltip_font_style_bold'] = isset($general_tooltip_settings['tooltip_font_style_bold']) ? $general_tooltip_settings['tooltip_font_style_bold'] : '';

        $new_values['tooltip_font_style_italic'] = isset($general_tooltip_settings['tooltip_font_style_italic']) ? $general_tooltip_settings['tooltip_font_style_italic'] : '';

        $new_values['tooltip_font_style_decoration'] = isset($general_tooltip_settings['tooltip_font_style_decoration']) ? $general_tooltip_settings['tooltip_font_style_decoration'] : '';



        if ($front_preview == 1 || $front_preview == 2) {
            $new_values['caption_style'] = $template_feature['caption_style'];
        } else {
            $new_values['caption_style'] = isset($general_template_settings['features']['caption_style']) ? $general_template_settings['features']['caption_style'] : '';
        }
        $new_values['column_opacity'] = $general_column_settings['column_opacity'];

        $new_values['column_wrapper_width_txtbox'] = (isset($general_column_settings['column_wrapper_width_txtbox'])) ? $general_column_settings['column_wrapper_width_txtbox'] : 0;

        $new_values['column_wrapper_width_style'] = (isset($general_column_settings['column_wrapper_width_style'])) ? $general_column_settings['column_wrapper_width_style'] : '';

        $new_values['column_border_radius_top_left'] = ( isset($general_column_settings['column_border_radius_top_left']) and ! empty($general_column_settings['column_border_radius_top_left']) ) ? $general_column_settings['column_border_radius_top_left'] : 0;
        $new_values['column_border_radius_top_right'] = ( isset($general_column_settings['column_border_radius_top_right']) and ! empty($general_column_settings['column_border_radius_top_right']) ) ? $general_column_settings['column_border_radius_top_right'] : 0;
        $new_values['column_border_radius_bottom_right'] = ( isset($general_column_settings['column_border_radius_bottom_right']) and ! empty($general_column_settings['column_border_radius_bottom_right']) ) ? $general_column_settings['column_border_radius_bottom_right'] : 0;
        $new_values['column_border_radius_bottom_left'] = ( isset($general_column_settings['column_border_radius_bottom_left']) and ! empty($general_column_settings['column_border_radius_bottom_left']) ) ? $general_column_settings['column_border_radius_bottom_left'] : 0;

        $is_responsive = $general_column_settings['is_responsive'];

        $is_columnhover_on = $general_column_settings['column_highlight_on_hover'];

        $arp_column_bg_hover_color = $general_option['custom_skin_colors']['arp_column_bg_hover_color'];

        $arp_button_bg_hover_color = $general_option['custom_skin_colors']['arp_button_bg_hover_color'];

        $arp_header_bg_hover_color = $general_option['custom_skin_colors']['arp_header_bg_hover_color'];

        $is_columnanimation_on = ( isset($general_column_animation['is_animation']) and $general_column_animation['is_animation'] == 'yes' ) ? 1 : 0;

        extract($new_values);

        

        $toggle_active_color = $general_settings['toggle_active_color'];
        $toggle_active_text_color = $general_settings['toggle_active_text_color'];
        $toggle_inactive_color = $general_settings['toggle_inactive_color'];
        $toggle_title_font_color = $general_settings['toggle_title_font_color'];
        $toggle_button_font_color = $general_settings['toggle_button_font_color'];
        $toggle_main_color = $general_settings['toggle_main_color'];

        $toggle_title_font_family = $general_settings['toggle_title_font_family'];
        $toggle_title_font_size = $general_settings['toggle_title_font_size'];
        $toggle_title_font_style_bold = $general_settings['toggle_title_font_style_bold'];
        $toggle_title_font_style_italic = (isset($general_settings['toggle_title_font_style_italic']) && $general_settings['toggle_title_font_style_italic'] != '' ) ? $general_settings['toggle_title_font_style_italic'] : 'normal';
        $toggle_title_font_style_decoration = $general_settings['toggle_title_font_style_decoration'];



        $toggle_button_font_family = $general_settings['toggle_button_font_family'];
        $toggle_button_font_size = $general_settings['toggle_button_font_size'];
        $toggle_button_font_color = $general_settings['toggle_button_font_color'];
        
        $toggle_button_font_style_bold = $general_settings['toggle_button_font_style_bold'];

        $toggle_button_font_style_italic = (isset($general_settings['toggle_button_font_style_italic']) && $general_settings['toggle_button_font_style_italic'] != '') ? $general_settings['toggle_button_font_style_italic'] : 'normal';
        $toggle_button_font_style_decoration = $general_settings['toggle_button_font_style_decoration'];


        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.button_switch_box_selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.button_switch_box_selected,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .radio_button_box.selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .radio_button_box.selected,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .border_button_box.selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .border_button_box.selected,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .slide_button_box.slide_button_box_selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .slide_button_box.slide_button_box_selected";
        $returnstring .= "{";
        $returnstring .= "background:" . $toggle_active_color . ";";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .stepy_box .stepy_box_selected .arp_icon,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .stepy_box .stepy_box_selected .arp_icon {";
        $returnstring .= "background:" . $toggle_active_color . ";";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .stepy_box.selected .stepy_box_selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .stepy_box.selected .stepy_box_selected {";
        $returnstring .= "border:1px solid " . $toggle_active_color . ";";
        $returnstring .= "}";

        $arp_switch_width = $arp_pricingtable->arp_toggle_switch_position();
        $arp_slide_btn_width = $arp_pricingtable->arp_toggle_slide_button_position();

        $step_main = $general_settings['arp_step_main'];

        $default_step = $general_settings['setas_default_toggle'];

        

        $toggle_switch_btn_left = isset($arp_switch_width[$step_main][$default_step]) ? $arp_switch_width[$step_main][$default_step] : '';
        $toggle_slide_btn_left = isset($arp_slide_btn_width[$step_main][$default_step]) ? $arp_slide_btn_width[$step_main][$default_step] : '';


        if( $toggle_switch_btn_left != '' ){
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.button_switch_box_selected,";
            $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.button_switch_box_selected";
            $returnstring .= "{";
            $returnstring .= "left:" . $toggle_switch_btn_left . ";";
            $returnstring .= "}";
        }
        
        if( $toggle_slide_btn_left != '' ){
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .slide_button_box.slide_button_box_selected,";
            $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .slide_button_box.slide_button_box_selected";
            $returnstring .= "{";
                $returnstring .= "left:" . $toggle_slide_btn_left . ";";
            $returnstring .= "}";
        }

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .radio_button_box.selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .radio_button_box.selected,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .border_button_box.selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .border_button_box.selected";
        $returnstring .= "{";
        if ($toggle_active_color == '#ffffff' || $toggle_active_color == '#FFFFFF') {
            $toggle_active_border_color = '#d0d0d0';
        } else {
            $toggle_active_border_color = $this->arp_generate_color_tone($toggle_active_color, -30);
        }
        $returnstring .= "border:1px solid " . $toggle_active_border_color . ";";
        $returnstring .= "}";

        $returnstring .= "@media (max-width:480px){";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.selected,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .slide_button_box.selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .slide_button_box.selected{";
        $returnstring .= "background:" . $toggle_active_color . ";";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_widget_table .arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.selected,";
        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.selected,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_widget_table .arptemplate_" . $table_id . " .toggle_content_switches .slide_button_box.selected,";
        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .toggle_content_switches .slide_button_box.selected{";
        $returnstring .= "background:" . $toggle_active_color . ";";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";


        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .radio_button_box label.toggle_content_label_txt,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .radio_button_box label.toggle_content_label_txt,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .border_button_box,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .border_button_box,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .slide_button_box,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .slide_button_box,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .stepy_box span,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .stepy_box span{";
        $returnstring .= "font-family:" . $toggle_button_font_family . ";";
        $returnstring .= "font-size:" . $toggle_button_font_size . "px;";
        $returnstring .= "font-style:" . $toggle_button_font_style_italic . ";";
        if( $toggle_button_font_style_bold != '' ){
            $returnstring .= "font-weight:" . $toggle_button_font_style_bold . ";";
        }
        if( $toggle_button_font_style_decoration != '' ){
            $returnstring .= "text-decoration:" . $toggle_button_font_style_decoration . ";";
        }
        $returnstring .= "}";


        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_wrapper.arp_radio_style_switch,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_wrapper.arp_radio_style_switch{";
        $returnstring .= "background:" . $toggle_main_color . ";";
        $toggle_wrapper_color = ( $toggle_main_color == '#ffffff' || $toggle_main_color == '#FFFFFF' ) ? '#d2d2d2' : $this->arp_generate_color_tone($toggle_main_color, -30);
        $returnstring .= "border:1px solid " . $toggle_wrapper_color . ";";
        $returnstring .= "}";



        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_slide_button_style_switch .toggle_content_switches,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_slide_button_style_switch .toggle_content_switches{";
        $returnstring .= "background:" . $toggle_inactive_color . ";";
        $returnstring .= "color:" . $toggle_button_font_color . ";";
        $returnstring .= "}";


        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches .selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches .selected,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_slide_button_style_switch .toggle_content_switches .selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_slide_button_style_switch .toggle_content_switches .selected{";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";


        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_border_button_style_switch .border_button_box,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_border_button_style_switch .border_button_box{";
        $returnstring .= "background:" . $toggle_inactive_color . ";";
        $returnstring .= "}";

        $arp_stepy_toggle_inactive_color = ($toggle_inactive_color == '#ffffff' || $toggle_inactive_color == '#FFFFFF') ? '#d0d0d0' : $toggle_inactive_color;

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_stepy_style_switch .stepy_box .stepy_box_selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_stepy_style_switch .stepy_box .stepy_box_selected{";
        $returnstring .= "border:1px solid " . $arp_stepy_toggle_inactive_color . ";";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_stepy_style_switch .stepy_box:before,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_stepy_style_switch .stepy_box:before,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_stepy_style_switch .stepy_box:after,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_stepy_style_switch .stepy_box:after{";
        $returnstring .= "background-color: " . $arp_stepy_toggle_inactive_color . ";";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_widget_table .arptemplate_" . $table_id . " .arp_stepy_style_switch .stepy_box:before,";
        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .arp_stepy_style_switch .stepy_box:before,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_widget_table .arptemplate_" . $table_id . " .arp_stepy_style_switch .stepy_box:after,";
        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .arp_stepy_style_switch .stepy_box:after{";
        $returnstring .= "background-color: " . $arp_stepy_toggle_inactive_color . ";";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .stepy_box.selected span,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .stepy_box.selected span {";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_switches .stepy_box:not(.selected) span,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .stepy_box:not(.selected) span {";
        $returnstring .= "color:" . $toggle_button_font_color . ";";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box:not(.selected),";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box:not(.selected),";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_border_button_style_switch .border_button_box:not(.selected),";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_border_button_style_switch .border_button_box:not(.selected){";
        if ($toggle_inactive_color == '#ffffff' || $toggle_inactive_color == '#FFFFFF') {
            $toggle_inactive_border_color = '#d0d0d0';
        } else {
            $toggle_inactive_border_color = $this->arp_generate_color_tone($toggle_inactive_color, -30);
        }
        $returnstring .= "border:1px solid " . $toggle_inactive_border_color . ";";
        $returnstring .= "}";

        $returnstring .= "@media (max-width:480px){";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_slide_button_style_switch .toggle_content_switches,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_slide_button_style_switch .toggle_content_switches{";
        $returnstring .= "background:none !important;";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_button_style_switch .button_switch_box,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_button_style_switch .button_switch_box,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_slide_button_style_switch .slide_button_box,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_slide_button_style_switch .slide_button_box{";
        $returnstring .= "background:" . $toggle_inactive_color . ";";
        $returnstring .= "}";

        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_widget_table .arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches,";
        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_widget_table .arptemplate_" . $table_id . " .arp_slide_button_style_switch .toggle_content_switches,";
        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .arp_slide_button_style_switch .toggle_content_switches{";
        $returnstring .= "background:none !important;";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_widget_table .arptemplate_" . $table_id . " .arp_button_style_switch .button_switch_box,";
        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .arp_button_style_switch .button_switch_box,";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_widget_table .arptemplate_" . $table_id . " .arp_slide_button_style_switch .slide_button_box,";
        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .arp_slide_button_style_switch .slide_button_box{";
        $returnstring .= "background:" . $toggle_inactive_color . ";";
        $returnstring .= "}";




        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box label,#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box:not(.selected) span,#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_border_button_style_switch .border_button_box,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box label,.arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box:not(.selected) span,.arptemplate_" . $table_id . " .arp_border_button_style_switch .border_button_box{";
        $returnstring .= "color:" . $toggle_button_font_color . ";";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box.selected label, #ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box.selected span.fas, #ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_border_button_style_switch .border_button_box.selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box.selected label, .arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box.selected span.fas, .arptemplate_" . $table_id . " .arp_border_button_style_switch .border_button_box.selected{";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";


        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .toggle_content_title,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_title{";
        $returnstring .= "color:" . $toggle_title_font_color . ";";
        $returnstring .= "font-family:" . $toggle_title_font_family . ";";
        $returnstring .= "font-size:" . $toggle_title_font_size . "px;";
        $returnstring .= "min-height:" . $toggle_title_font_size . "px !important;";
        $returnstring .= "font-style:" . $toggle_title_font_style_italic . ";";
        if( $toggle_title_font_style_bold != '' ){
            $returnstring .= "font-weight:" . $toggle_title_font_style_bold . ";";
        }
        if( $toggle_title_font_style_decoration != '' ){
            $returnstring .= "text-decoration:" . $toggle_title_font_style_decoration . ";";
        }
        $returnstring .= "}";

        if ($general_option['button_settings']['button_radius'] != '' && $general_option['button_settings']['button_radius'] != 0) {
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " .bestPlanButton,
                .arp_price_table_" . $table_id . " .bestPlanButton{
				border-radius:" . $general_option['button_settings']['button_radius'] . "px !important;
					-moz-border-radius:" . $general_option['button_settings']['button_radius'] . "px !important;
					-webkit-border-radius:" . $general_option['button_settings']['button_radius'] . "px !important;
					-o-border-radius:" . $general_option['button_settings']['button_radius'] . "px !important;
			}";
        }

        $default_luminosity = $arprice_default_settings->arp_default_skin_luminosity();
        $luminosity = (isset($default_luminosity[$reference_template][0])) ? $default_luminosity[$reference_template][0] : '';


        $template_inputs = $arprice_default_settings->arp_template_bg_section_inputs();
        $template_inputs_ = $template_inputs[$reference_template];


        $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arpcolumnheader .bestPlanTitle,";
        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arpcolumnheader .bestPlanTitle";

        $returnstring .= " {font-family: " . stripslashes($general_column_settings['header_font_family_global']) . ";font-size: " . $general_column_settings['header_font_size_global'] . "px; ";
        if ($general_column_settings['arp_header_text_bold_global'] != '') {
            $returnstring .= " font-weight: " . $general_column_settings['arp_header_text_bold_global'] . ";";
        }
        if ($general_column_settings['arp_header_text_italic_global'] != '') {
            $returnstring .= " font-style: " . $general_column_settings['arp_header_text_italic_global'] . ";";
        }
        if ($general_column_settings['arp_header_text_decoration_global'] != '') {
            $returnstring .= " text-decoration: " . $general_column_settings['arp_header_text_decoration_global'] . ";";
        }
        $returnstring .="}";


        $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arp_price_wrapper,";
        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arp_price_wrapper{";


        $returnstring .= "font-family:" . stripslashes_deep($general_column_settings['price_font_family_global']) . ";
						font-size:" . $general_column_settings['price_font_size_global'] . "px;";

        if ($general_column_settings['arp_price_text_bold_global'] != '') {
            $returnstring .= " font-weight: " . $general_column_settings['arp_price_text_bold_global'] . ";";
        }

        if ($general_column_settings['arp_price_text_italic_global'] != '') {
            $returnstring .= " font-style: " . $general_column_settings['arp_price_text_italic_global'] . ";";
        }

        if ($general_column_settings['arp_price_text_decoration_global'] != '') {
            $returnstring .= " text-decoration: " . $general_column_settings['arp_price_text_decoration_global'] . ";";
        }


        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn):not(.no_transition) .arp_opt_options li,#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_transition:not(.maincaptioncolumn) .arp_opt_options li,";
        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn):not(.no_transition) .arp_opt_options li, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_transition:not(.maincaptioncolumn) .arp_opt_options li";
        $returnstring .= "{";
        $returnstring .= "font-family:" . stripslashes_deep($general_column_settings['body_font_family_global']) . ";";
        $returnstring .= "font-size:" . $general_column_settings['body_font_size_global'] . "px;";

        if ($general_column_settings['arp_body_text_bold_global'] != '') {
            $returnstring .= " font-weight: " . $general_column_settings['arp_body_text_bold_global'] . ";";
        }

        if ($general_column_settings['arp_body_text_italic_global'] != '') {
            $returnstring .= " font-style: " . $general_column_settings['arp_body_text_italic_global'] . ";";
        }

        if ($general_column_settings['arp_body_text_decoration_global'] != '') {
            $returnstring .= " text-decoration: " . $general_column_settings['arp_body_text_decoration_global'] . " ;";
        }


        $returnstring .= "}";

        $returnstring .= '#ArpTemplate_main.arp_front_main_container .arp_price_table_' . $table_id . ' #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arp_footer_content,';
        $returnstring .= '.arp_price_table_' . $table_id . ' #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arp_footer_content{';
        if(isset($general_column_settings['footer_font_family_global']) && $general_column_settings['footer_font_family_global']!=''){
            $returnstring .= 'font-family: ' . $general_column_settings['footer_font_family_global'] . ';';    
        }
        if(isset($general_column_settings['footer_font_size_global']) && $general_column_settings['footer_font_size_global']!=''){
            $returnstring .= 'font-size:' . $general_column_settings['footer_font_size_global'] . 'px;';
        }
        if ($general_column_settings['arp_footer_text_bold_global'] == 'bold') {
            $returnstring .= 'font-weight: bold;';
        }
        if ($general_column_settings['arp_footer_text_italic_global'] == 'italic') {
            $returnstring .= 'font-style: italic;';
        }
        if ($general_column_settings['arp_footer_text_decoration_global'] == 'underline') {
            $returnstring .= 'text-decoration: underline;';
        } else if ($general_column_settings['arp_footer_text_decoration_global'] == 'line-through') {
            $returnstring .= 'text-decoration: line-through;';
        }

        $returnstring .= '}';

        $returnstring .= "#ArpTemplate_main.arp_front_main_container  .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .bestPlanButton,#ArpTemplate_main.arp_front_main_container  .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .bestPlanButton .bestPlanButton_text,";
        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .bestPlanButton, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .bestPlanButton .bestPlanButton_text";


        $returnstring .= "{";

        $returnstring .= "font-family:" . stripslashes_deep($general_column_settings['button_font_family_global']) . ";";
        $returnstring .= "font-size:" . $general_column_settings['button_font_size_global'] . "px;";

        if (isset($general_column_settings['arp_button_text_bold_global']) && $general_column_settings['arp_button_text_bold_global'] != '') {
            $returnstring .= " font-weight: " . $general_column_settings['arp_button_text_bold_global'] . ";";
        }

        if (isset($general_column_settings['arp_button_text_italic_global']) && $general_column_settings['arp_button_text_italic_global'] != '') {
            $returnstring .= " font-style: " . $general_column_settings['arp_button_text_italic_global'] . ";";
        }

        if (isset($general_column_settings['arp_button_text_decoration_global']) && $general_column_settings['arp_button_text_decoration_global'] != '') {
            $returnstring .= " text-decoration: " . $general_column_settings['arp_button_text_decoration_global'] . ";";
        }


        $returnstring .= "}";

        if ($reference_template == 'arptemplate_7') {
            $returnstring .= "#ArpTemplate_main.arp_front_main_container  .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .column_description,#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arppricetablecolumnprice,";
            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .column_description,.arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arppricetablecolumnprice{";
        } else if ($reference_template == 'arptemplate_10') {
            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arpplan{";
        } else if ($reference_template == 'arptemplate_11') {
            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arppricetablecolumnprice{";
        } else {
            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .column_description{";
        }

        if ($general_column_settings['arp_description_text_bold_global'] != '') {
            $returnstring .= " font-weight: " . $general_column_settings['arp_description_text_bold_global'] . ";";
        }

        if ($general_column_settings['arp_description_text_italic_global'] != '') {
            $returnstring .= " font-style: " . $general_column_settings['arp_description_text_italic_global'] . ";";
        }

        if ($general_column_settings['arp_description_text_decoration_global'] != '') {
            $returnstring .= " text-decoration: " . $general_column_settings['arp_description_text_decoration_global'] . ";";
        }

        if( $general_column_settings['description_font_family_global'] != '' ){
            $returnstring .= "font-family:" . stripslashes_deep($general_column_settings['description_font_family_global']) . ";";
        }

        if( $general_column_settings['description_font_size_global'] != '' ){
            $returnstring .= "font-size:" . $general_column_settings['description_font_size_global'] . 'px;';
        }


        $returnstring .= "}";


        if (is_array($opts['columns'])) {
            foreach ($opts['columns'] as $c => $columns) {

                $column_type = "";
                $col_arr_key = 0;
                if (isset($columns['is_caption']) && $columns['is_caption'] == 1)
                    $column_type = "caption_column";
                else
                    $column_type = "other_column";

                $col = str_replace('column_', '', $c);
                if ($column_type == 'caption_column') {
                    $col_arr_key = 0;
                } else {
                    $col_arr_key = $col % 5;
                    $col_arr_key = ($col_arr_key > 0) ? $col_arr_key : 5;
                }

                $is_colum_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_column_bg_color = (is_array($template_inputs_['caption_column']) && array_key_exists('column_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_column_bg_color = (is_array($template_inputs_['other_column']) && array_key_exists('column_background_color', $template_inputs_['other_column'])) ? true : false;
                }


                if (isset($columns['column_background_color']) && $columns['column_background_color'] != '' && $is_column_bg_color) {
                    $gradient_arr = $arprice_default_settings->arp_default_gradient_templates();
                    $gradient_col = $arprice_default_settings->arp_default_gradient_templates_colors();
                    $gradient_default_skin = $gradient_arr['default_only'];
                    $gradient_all_skin = $gradient_arr['all_skins'];
                    $all_skin_template = 0;
                    $default_skin_template = 0;

                    if (in_array($reference_template, $gradient_all_skin)) {
                        $all_skin_template = 1;
                        $default_skin_template = 0;
                    } else if (in_array($reference_template, $gradient_default_skin)) {
                        $all_skin_template = 0;
                        $default_skin_template = 1;
                    }

                    $css_class = isset($arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['column_section']) ? $arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['column_section'] : '';

                    $explode_css_class = explode(",", $css_class);

                    if ($all_skin_template == 1 || $default_skin_template == 1) {

                        foreach ($explode_css_class as $css_class) {
                            $colors = $gradient_col[$reference_template]['arp_color_skin']['arp_css']['column_level_gradient'][$css_class][$template_color_skin];

                            if ($template_color_skin == 'custom_skin') {
                                foreach ($explode_css_class as $column_class) {

                                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c $column_class,";
                                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c $column_class{";

                                    if ($colors[$col_arr_key] == "") {
                                        $properties[] = "background";
                                        $values[] = $columns['column_background_color'];
                                        foreach ($properties as $arkey => $arvalue) {
                                            $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                        }
                                    } else {
                                        $properties = array();
                                        $values = array();

                                        $colors = explode('___', $colors[$col_arr_key]);
                                        $color1 = $colors[0];
                                        $color2 = $colors[1];
                                        $putcol = $colors[2];

                                        if ($color1 == '{arp_column_background_color}') {
                                            $color1 = str_replace('{arp_column_background_color}', $columns['column_background_color'], $color1);
                                        }

                                        preg_match('/\d{2,3}|(\.\d{2,3})/', $color2, $matches);


                                        if (isset($matches[0]) && $matches[0] != "") {
                                            $matches[0] = $matches[0];
                                            $color2 = $this->arp_generate_color_tone($color1, $matches[0]);
                                        } else {
                                            $color2 = $colors[1];
                                        }


                                        if ($putcol == 1) {
                                            $first_color = $color1;
                                            $base_color = $color1;
                                            $color1 = $color2;
                                        } else {
                                            $first_color = $color1;
                                            $color1 = $color1;
                                            $base_color = $color2;
                                        }

                                        $properties[] = "background";
                                        $values[] = $first_color;
                                        $properties[] = "background-color";
                                        $values[] = $first_color;
                                        $properties[] = "background-image";
                                        $values[] = "-moz-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "-webkit-gradient(linear,0 0, 100%, to($base_color,$color1))";
                                        $properties[] = "background-image";
                                        $values[] = "-webkit-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "-o-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "linear-gradient(to bottom,$base_color,$color1)";
                                        $properties[] = "background-repeat";
                                        $values[] = "repeat-x";
                                        $properties[] = "filter";
                                        $values[] = "progid:DXImageTransform.Microsoft.gradient(startColorstr='$base_color', endColorstr='$color1', GradientType=0)";
                                        $properties[] = "-ms-filter";
                                        $values[] = "progid:DXImageTransform.Microsoft.gradient (startColorstr=$base_color, endColorstr=$color1, GradientType=0)";
                                        foreach ($properties as $arkey => $arvalue) {
                                            $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                        }
                                    }
                                    $returnstring .= "}";
                                }
                            } else {

                                $colors = $colors[$col_arr_key];

                                foreach ($explode_css_class as $column_class) {
                                    $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c $column_class ,";
                                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c $column_class{";

                                    $colors_new = $gradient_col[$reference_template]['arp_color_skin']['arp_css']['column_level_gradient'][$css_class][$template_color_skin];
                                    $column_bg_color = $columns['column_background_color'];

                                    $default_gradient_colors = array();
                                    if (is_array($colors_new) && !empty($colors_new)) {
                                        foreach ($colors_new as $key => $tmpcol) {
                                            $default_gradient_colors[$key] = substr($tmpcol, 0, 7);
                                        }
                                    }

                                    if (( $colors == "" ) || ( $reference_template == 'arptemplate_9' && isset( $columns['arp_change_bgcolor'] ) && $columns['arp_change_bgcolor'] == 1 && !in_array(strtolower($column_bg_color), $default_gradient_colors) )) {
                                        
                                        $properties[] = "background";
                                        $values[] = $columns['column_background_color'];
                                        foreach ($properties as $arkey => $arvalue) {
                                            $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                        }
                                    } else {
                                        $properties = array();
                                        $values = array();


                                        if ($reference_template == 'arptemplate_9' && isset( $columns['arp_change_bgcolor'] ) && $columns['arp_change_bgcolor'] == 1) {

                                            $colors_new = $gradient_col[$reference_template]['arp_color_skin']['arp_css']['column_level_gradient'][$css_class][$template_color_skin];
                                            $column_bg_color = $columns['column_background_color'];

                                            foreach ($colors_new as $tmp_color) {
                                                $tmpcol = explode('___', $tmp_color);
                                                $tmpcol1 = isset($tmpcol[0]) ? $tmpcol[0] : '';
                                                $tmpcol2 = isset($tmpcol[1]) ? $tmpcol[1] : '';
                                                $tmpputc = isset($tmpcol[2]) ? $tmpcol[2] : '';
                                                if ($tmpcol1 == strtolower($column_bg_color)) {
                                                    $color1 = $tmpcol1;
                                                    $color2 = $tmpcol2;
                                                    $putcol = $tmpputc;
                                                }
                                            }
                                        } else {

                                            $colors = explode('___', $colors);
                                            $color1 = $colors[0];
                                            $color2 = $colors[1];
                                            $putcol = $colors[2];
                                        }
                                        if ($putcol == 1) {
                                            $first_color = $color1;
                                            $base_color = $color1;
                                            $color1 = $color2;
                                        } else {
                                            $first_color = $color1;
                                            $color1 = $color1;
                                            $base_color = $color2;
                                        }

                                        $properties[] = "background";
                                        $values[] = $first_color;
                                        $properties[] = "background-color";
                                        $values[] = $first_color;
                                        $properties[] = "background-image";
                                        $values[] = "-moz-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "-webkit-gradient(linear,0 0, 100%, to($base_color,$color1))";
                                        $properties[] = "background-image";
                                        $values[] = "-webkit-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "-o-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "linear-gradient(to bottom,$base_color,$color1)";
                                        $properties[] = "background-repeat";
                                        $values[] = "repeat-x";
                                        $properties[] = "filter";
                                        $values[] = "progid:DXImageTransform.Microsoft.gradient(startColorstr='$base_color', endColorstr='$color1', GradientType=0)";
                                        $properties[] = "-ms-filter";
                                        $values[] = "progid:DXImageTransform.Microsoft.gradient (startColorstr=$base_color, endColorstr=$color1, GradientType=0)";
                                        foreach ($properties as $arkey => $arvalue) {
                                            $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                        }
                                    }
                                    $returnstring .= "}";
                                }
                            }
                        }
                    } else {

                        foreach ($explode_css_class as $column_class) {
                            if (!empty($column_class)) {
                                $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c $column_class,";
                                $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c $column_class{";
                                if ($reference_template === 'arptemplate_25') {
                                    $bgcolor = $arprice_form->hex2rgb($columns['column_background_color']);

                                    $returnstring .= "background-color:rgba({$bgcolor['red']},{$bgcolor['green']},{$bgcolor['blue']},0.8);";
                                } else {

                                    $returnstring .= "background-color:{$columns['column_background_color']};";
                                }
                                $returnstring .= "}";
                            }
                        }
                    }
                
                }

                /**
                 * Column Background Image
                 * 
                 * @since ARPrice 2.0
                 */
                if (isset($columns['column_background_image']) && $columns['column_background_image'] != '') {

                    $column_background_image = isset($columns['column_background_image']) ? $columns['column_background_image'] : '';
                    $column_background_image_height = isset($columns['column_background_image_height']) ? $columns['column_background_image_height'] : '';
                    $column_background_image_width = isset($columns['column_background_image_width']) ? $columns['column_background_image_width'] : '';

                    $column_background_image_class = $arprice_default_settings->arp_column_background_image_section_array();
                    $column_bg_img_class = $column_background_image_class[$reference_template];
                    if (!empty($column_bg_img_class)) {
                        foreach ($column_bg_img_class as $cbgimg_class) {
                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$cbgimg_class,";
                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$cbgimg_class{";
                            $returnstring .= "background-image:url(" . $column_background_image . ");";
                            $columns['column_background_min_positon'] = isset($columns['column_background_min_positon']) ? $columns['column_background_min_positon'] : '50';
                            $columns['column_background_max_positon'] = isset($columns['column_background_max_positon']) ? $columns['column_background_max_positon'] : '50';
                            if (isset($columns['column_background_scaling']) && 'do_not_scale_image' == $columns['column_background_scaling'] ) {
                                $returnstring .= "background-position:0 0;";
                            } else {
                                $returnstring .= "background-position:" . $columns['column_background_min_positon'] . "% " . $columns['column_background_max_positon'] . "% !important;";
                                $returnstring .= "-webkit-background-size:cover;";
                                $returnstring .= "-moz-background-size:cover;";
                                $returnstring .= "-o-background-size:cover;";
                                $returnstring .= "background-size:cover;";
                            }
                   

                            $returnstring .= "background-repeat:no-repeat !important;";

                            $returnstring .= "}";
                        }
                    }

                    $other_background_section = $arprice_default_settings->arp_template_bg_section_classes();
                    $other_background_section_class = $other_background_section[$reference_template]['other_column'];

                    if (!empty($other_background_section_class)) {
                        foreach ($other_background_section_class as $section_key => $section_value) {
                            if ($reference_template !== 'arptemplate_25') {
                                if ($section_key == 'body_section') {
                                    if (!empty($section_key)) {
                                        foreach ($other_background_section_class[$section_key] as $body_class) {
                                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$body_class,";
                                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$body_class{";
                                            $returnstring .= "background-color:transparent !important;";
                                            $returnstring .= "}";
                                        }
                                    }
                                } else {
                                    $other_css_class = $other_background_section_class[$section_key];
                                    $explode_other_css_class = explode(",", $other_css_class);

                                    foreach ($explode_other_css_class as $other_column_class) {
                                        if (!empty($other_column_class)) {
                                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$other_column_class,";
                                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$other_column_class{";
                                            $returnstring .= "background-color:transparent !important;";
                                            $returnstring .= "}";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                

                
                $is_column_desc_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_column_desc_bg_color = ( is_array($template_inputs_['caption_column']) && array_key_exists('column_desc_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_column_desc_bg_color = ( is_array($template_inputs_['other_column']) && array_key_exists('column_desc_background_color', $template_inputs_['other_column'])) ? true : false;
                }

                if (isset($columns['column_desc_background_color']) && $columns['column_desc_background_color'] != '' && $is_column_desc_bg_color) {

                    if (isset($arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['desc_selection']) && !empty($arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['desc_selection'])) {

                        $back_sect_class = explode(',', $arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['desc_selection']);
                        foreach ($back_sect_class as $value) {

                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$value},";
                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$value}{";

                            $returnstring .= "background-color:{$columns['column_desc_background_color']};";
                            
                            $returnstring .= "}";
                        }
                    }
                }
                



                

                $is_column_header_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_column_header_bg_color = (is_array($template_inputs_['caption_column']) && array_key_exists('header_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_column_header_bg_color = ( is_array($template_inputs_['other_column']) && array_key_exists('header_background_color', $template_inputs_['other_column'])) ? true : false;
                }
                if (isset($columns['header_background_color']) && $columns['header_background_color'] != '' && $is_column_header_bg_color) {

                    $explode_header_class_arr = explode(",", $arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['header_section']);

                    $gradient_arr = $arprice_default_settings->arp_default_gradient_templates();
                    $gradient_col = $arprice_default_settings->arp_default_gradient_templates_colors();
                    $gradient_default_skin = $gradient_arr['default_only'];
                    $gradient_all_skin = $gradient_arr['all_skins'];
                    $all_skin_template = 0;
                    $default_skin_template = 0;

                    if (in_array($reference_template, $gradient_all_skin)) {
                        $all_skin_template = 1;
                        $default_skin_template = 0;
                    } else if (in_array($reference_template, $gradient_default_skin)) {
                        $all_skin_template = 0;
                        $default_skin_template = 1;
                    }


                    foreach ($explode_header_class_arr as $explode_header_class) {


                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$explode_header_class ,";
                        $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$explode_header_class {";
                        if ($reference_template == 'arptemplate_7') {
                            $bgcolor = $arprice_form->hex2rgb($columns['header_background_color']);

                            $returnstring .= "background-color:rgba({$bgcolor['red']},{$bgcolor['green']},{$bgcolor['blue']},0.7);";
                        } else {
                            $returnstring .= "background-color:{$columns['header_background_color']};";
                        }
                        $returnstring .= "}";
                    }



                    if ($reference_template == 'arptemplate_20') {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .arppricingtablebodycontent li i,";
                        $returnstring .= ".arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .arppricingtablebodycontent li i{";
                        $returnstring .= "color:{$columns['header_background_color']}";
                        $returnstring .= "}";

                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .arppricingtablebodycontent li .bestPlanRowButton i,";
                        $returnstring .= ".arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .arppricingtablebodycontent li .bestPlanRowButton i{";
                        $returnstring .= "color: inherit !important;";
                        $returnstring .= "}";
                    }



                }

                /**
                 * Header Background Image
                 * 
                 * @since ARPrice 2.0
                 */
                if (isset($columns['header_background_image']) && $columns['header_background_image'] != '') {

                    $header_background_image = $columns['header_background_image'];

                    $header_background_image_class = $arprice_default_settings->arp_background_image_section_array();
                    $header_bg_img_class = $header_background_image_class[$reference_template];

                    if (!empty($header_bg_img_class)) {
                        foreach ($header_bg_img_class as $bgimg_class) {
                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$bgimg_class,";
                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$bgimg_class{";
                            $returnstring .= "background-image:url(" . $header_background_image . ");";
                            $returnstring .= "background-position:center center;";
                            $returnstring .= "background-repeat:no-repeat;";
                            $returnstring .= "}";
                        }
                    }
                }

                

                
                $is_column_price_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_column_price_bg_color = (is_array($template_inputs_['caption_column']) && array_key_exists('price_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_column_price_bg_color = (is_array($template_inputs_['other_column']) && array_key_exists('price_background_color', $template_inputs_['other_column'])) ? true : false;
                }

                if (isset($columns['price_background_color']) && $columns['price_background_color'] != '' && $is_column_price_bg_color) {
                    $gradient_arr = $arprice_default_settings->arp_default_gradient_templates();
                    $gradient_col = $arprice_default_settings->arp_default_gradient_templates_colors();
                    $gradient_default_skin = $gradient_arr['default_only'];
                    $gradient_all_skin = $gradient_arr['all_skins'];
                    $all_skin_template = 0;
                    $default_skin_template = 0;

                    if (in_array($reference_template, $gradient_all_skin)) {
                        $all_skin_template = 1;
                        $default_skin_template = 0;
                    } else if (in_array($reference_template, $gradient_default_skin)) {
                        $all_skin_template = 0;
                        $default_skin_template = 1;
                    }

                    $css_class = $arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['pricing_section'];

                    if ($all_skin_template == 1 || $default_skin_template == 1) {

                        $colors = $gradient_col[$reference_template]['arp_color_skin']['arp_css']['pricing_level_gradient']['.' . $css_class][$template_color_skin];

                        if ($template_color_skin == 'custom_skin') {

                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$css_class,";
                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$css_class{";

                            if ($colors[$col_arr_key] == "") {
                                $properties[] = "background";
                                $values[] = $columns['price_background_color'];
                                foreach ($properties as $arkey => $arvalue) {
                                    $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                }
                            } else {
                                $properties = array();
                                $values = array();

                                $colors = explode('___', $colors[$col_arr_key]);
                                $color1 = $colors[0];
                                $color2 = $colors[1];
                                $putcol = $colors[2];

                                if ($color1 == '{arp_pricing_background_color_input}') {
                                    $color1 = str_replace('{arp_pricing_background_color_input}', $columns['price_background_color'], $color1);
                                }

                                preg_match('/\d{2,3}|(\.\d{2,3})/', $color2, $matches);


                                if ($matches[0] != "") {
                                    $matches[0] = $matches[0];
                                    $color2 = $this->arp_generate_color_tone($color1, $matches[0]);
                                } else {
                                    $color2 = $colors[1];
                                }


                                if ($putcol == 1) {
                                    $first_color = $color1;
                                    $base_color = $color1;
                                    $color1 = $color2;
                                } else {
                                    $first_color = $color1;
                                    $color1 = $color1;
                                    $base_color = $color2;
                                }

                                $properties[] = "background";
                                $values[] = $first_color;
                                $properties[] = "background-color";
                                $values[] = $first_color;
                                $properties[] = "background-image";
                                $values[] = "-moz-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "-webkit-gradient(linear,0 0, 100%, to($base_color,$color1))";
                                $properties[] = "background-image";
                                $values[] = "-webkit-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "-o-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "linear-gradient(to bottom,$base_color,$color1)";
                                $properties[] = "background-repeat";
                                $values[] = "repeat-x";
                                $properties[] = "filter";
                                $values[] = "progid:DXImageTransform.Microsoft.gradient(startColorstr='$base_color', endColorstr='$color1', GradientType=0)";
                                $properties[] = "-ms-filter";
                                $values[] = "progid:DXImageTransform.Microsoft.gradient (startColorstr=$base_color, endColorstr=$color1, GradientType=0)";

                                foreach ($properties as $arkey => $arvalue) {
                                    $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                }
                            }
                            $returnstring .= "}";
                        } else {

                            $colors = $colors[$col_arr_key];
                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$css_class,";
                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$css_class{";
                            if ($colors == "") {
                                $properties[] = "background";
                                $values[] = $columns['price_background_color'];
                                foreach ($properties as $arkey => $arvalue) {
                                    $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                }
                            } else {
                                $properties = array();
                                $values = array();
                                $colors = explode('___', $colors);
                                $color1 = $colors[0];
                                $color2 = $colors[1];
                                $putcol = $colors[2];
                                if ($color1 != $columns['price_background_color']) {
                                    $color1 = $columns['price_background_color'];
                                    $color2 = $this->arp_generate_color_tone($color1, -20);
                                }
                                if ($putcol == 1) {
                                    $first_color = $color1;
                                    $base_color = $color1;
                                    $color1 = $color2;
                                } else {
                                    $first_color = $color1;
                                    $color1 = $color1;
                                    $base_color = $color2;
                                }

                                $properties[] = "background";
                                $values[] = $first_color;
                                $properties[] = "background-color";
                                $values[] = $first_color;
                                $properties[] = "background-image";
                                $values[] = "-moz-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "-webkit-gradient(linear,0 0, 100%, to($base_color,$color1))";
                                $properties[] = "background-image";
                                $values[] = "-webkit-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "-o-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "linear-gradient(to bottom,$base_color,$color1)";
                                $properties[] = "background-repeat";
                                $values[] = "repeat-x";
                                $properties[] = "filter";
                                $values[] = "progid:DXImageTransform.Microsoft.gradient(startColorstr='$base_color', endColorstr='$color1', GradientType=0)";
                                $properties[] = "-ms-filter";
                                $values[] = "progid:DXImageTransform.Microsoft.gradient (startColorstr=$base_color, endColorstr=$color1, GradientType=0)";
                                foreach ($properties as $arkey => $arvalue) {
                                    $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                }
                            }
                            $returnstring .= "}";
                        }
                    } else {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$css_class,";
                        $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$css_class{";
                        $returnstring .= "background-color:{$columns['price_background_color']};";
                        $returnstring .= "}";
                    }
                }

                

                
                $is_button_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_button_bg_color = (is_array($template_inputs_['caption_column']) && array_key_exists('button_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_button_bg_color = (is_array($template_inputs_['other_column']) && array_key_exists('button_background_color', $template_inputs_['other_column'])) ? true : false;
                }
                if (isset($columns['button_background_color']) && $columns['button_background_color'] != '' && $is_button_bg_color) {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['button_section']},";
                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['button_section']}{";
                    $returnstring .= "background-color:{$columns['button_background_color']};";
                    $returnstring .= "}";
                }

                

                
                $is_footer_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_footer_bg_color = (is_array($template_inputs_['caption_column']) && array_key_exists('footer_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_footer_bg_color = (is_array($template_inputs_['other_column']) && array_key_exists('footer_background_color', $template_inputs_['other_column'])) ? true : false;
                }
                if (isset($columns['footer_background_color']) && $columns['footer_background_color'] != '' && $is_footer_bg_color) {

                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['footer_section']},";
                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['footer_section']}{";
                    $returnstring .= "background:{$columns['footer_background_color']};";
                    $returnstring .= "}";
                }

                

                
                $is_content_odd_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_body_section = ( is_array($template_inputs_['caption_column']) && array_key_exists('body_section', $template_inputs_['caption_column']) ) ? true : false;
                    $is_content_odd_bg_color = ( $is_body_section && is_array($template_inputs_['caption_column']['body_section']) && array_key_exists('content_odd_color', $template_inputs_['caption_column']['body_section'])) ? true : false;
                } else {
                    $is_body_section = is_array($template_inputs_['other_column']) && array_key_exists('body_section', $template_inputs_['other_column']) ? true : false;
                    $is_content_odd_bg_color = ($is_body_section && $template_inputs_['other_column']['body_section'] && array_key_exists('content_odd_color', $template_inputs_['other_column']['body_section'])) ? true : false;
                }
                if (isset($columns['content_odd_color']) && $columns['content_odd_color'] != '' && $is_content_odd_bg_color) {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['body_section']['odd_row']},";
                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['body_section']['odd_row']} {";
                    if ($reference_template === 'arptemplate_25') {
                        $contentcolor = $arprice_form->hex2rgb($columns['content_odd_color']);

                        $returnstring .= "background-color:rgba({$contentcolor['red']},{$contentcolor['green']},{$contentcolor['blue']},0.8);";
                    } else {
                        $returnstring .= "background:{$columns['content_odd_color']}";
                    }
                    $returnstring .= "}";
                }

                $is_content_even_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_body_section = ( isset($template_inputs_['caption_column']) && is_array($template_inputs_['caption_column']) && array_key_exists('body_section', $template_inputs_['caption_column'])) ? true : false;
                    $is_content_even_bg_color = ($is_body_section && is_array($template_inputs_['caption_column']['body_section']) && array_key_exists('content_even_color', $template_inputs_['caption_column']['body_section'])) ? true : false;
                } else {
                    $is_body_section = isset($template_inputs_['other_column']) && is_array($template_inputs_['other_column']) && array_key_exists('body_section', $template_inputs_['other_column']) ? true : false;
                    $is_content_even_bg_color = ($is_body_section && isset($template_inputs_['other_column']['body_section']) && is_array($template_inputs_['other_column']['body_section']) && array_key_exists('content_even_color', $template_inputs_['other_column']['body_section'])) ? true : false;
                }

                if (isset($columns['content_even_color']) && $columns['content_even_color'] != '' && $is_content_even_bg_color) {

                    $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['body_section']['even_row']},";
                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['body_section']['even_row']} {";
                    if ($reference_template === 'arptemplate_25') {
                        $contentcolor = $arprice_form->hex2rgb($columns['content_even_color']);

                        $returnstring .= "background-color:rgba({$contentcolor['red']},{$contentcolor['green']},{$contentcolor['blue']},0.8);";
                    } else {
                        $returnstring .= "background:{$columns['content_even_color']}";
                    }
                    $returnstring .= "}";
                }

                

                
                if ($columns['is_caption'] != 0) {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arpcolumnheader .arpcaptiontitle,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arpcolumnheader .arpcaptiontitle";
                    $returnstring .= " {width: 100% ;font-family: " . stripslashes($columns['header_font_family']) . ";font-size: " . $columns['header_font_size'] . "px; ";
                    if ($columns['header_style_bold'] != '')
                        $returnstring .= " font-weight: " . $columns['header_style_bold'] . ";";

                    if ($columns['header_style_italic'] != '')
                        $returnstring .= " font-style: " . $columns['header_style_italic'] . ";";

                    if ($columns['header_style_decoration'] != '')
                        $returnstring .= " text-decoration: " . $columns['header_style_decoration'] . ";";

                    $returnstring .= " color: " . $columns['header_font_color'] . ";
                        }";
                }
                else {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arpcolumnheader .bestPlanTitle,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arpcolumnheader .bestPlanTitle {";
                    $returnstring .= " color: " . $columns['header_font_color'] . ";
                        }";
                }


                if( $columns['price_font_color'] != '' ){
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_price_wrapper,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_price_wrapper{";
                        $returnstring .= "color:" . $columns['price_font_color'] . ";";
                    $returnstring .= "}";
                }
                
                
                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_opt_options li.arp_odd_row,";
                $returnstring .= ".arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_opt_options li.arp_odd_row{";
                $returnstring .= "color:" . $columns['content_font_color'] . ";";
                $returnstring .= "}";

                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_opt_options li.arp_even_row,";
                $returnstring .= ".arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_opt_options li.arp_even_row{";
                $returnstring .= "color:" . $columns['content_even_font_color'] . ";";
                $returnstring .= "}";

                if (isset($columns['rows']) && is_array($columns['rows'])) {
                    $row_count = 0;
                    foreach ($columns['rows'] as $i => $row_detail) {

                        if ($columns['is_caption'] != 0) {
                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_opt_options li,.arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.no_transition).style_" . $c . " .arp_opt_options li,";
                            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_opt_options li,.arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.no_transition).style_" . $c . " .arp_opt_options li";

                            $returnstring .= "{";
                            $returnstring .= "font-family:" . stripslashes_deep($columns['content_font_family']) . ";";
                            $returnstring .= "font-size:" . $columns['content_font_size'] . "px;";


                            $returnstring .= "}";
                        }

                        $row_content_type = isset( $columns['rows'][$i]['row_content_type'] ) ? $columns['rows'][$i]['row_content_type'] : 0;

                        if (1 == $row_content_type && $reference_template != 'arptemplate_26') {

                            $button_size_row = isset($columns['rows'][$i]['button_size_row']) ? $columns['rows'][$i]['button_size_row'] : 0;
                            $button_height_row = isset($columns['rows'][$i]['button_height_row']) ? $columns['rows'][$i]['button_height_row'] : 0;

                            if( $button_size_row == 0 && !empty( $pricing_table_updated_ids ) && in_array( $table_id, $pricing_table_updated_ids ) ){
                                $button_size_row = $columns['button_size'];
                            }

                            if( $button_height_row == 0 && !empty( $pricing_table_updated_ids ) && in_array( $table_id, $pricing_table_updated_ids ) ){
                                $button_height_row = $columns['button_height'];
                            }

                            $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " 
                            .bestPlanButton.bestPlanRowButton.newplanbutton_" . $c . "_" . $i . ",";
                            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " 
                            .bestPlanButton.bestPlanRowButton.newplanbutton_" . $c . "_" . $i . "";
                            $returnstring .= "{";
                            

                            if( $button_size_row != '' ){
                                $returnstring .= "width:" . $button_size_row . "px;";
                            }
                            
                            if( $button_height_row != '' ){
                                $returnstring .= "height:" . $button_height_row . "px;";
                                $returnstring .= "line-height:normal !important;";
                            }
                            
                            $returnstring .= "}";


                            if( $button_height_row != '' && (int)$button_height_row > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton.arp_border_button .bestPlanRowButton.newplanbutton_" . $c . "_" . $i . ",";
                                $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton.arp_border_button .bestPlanRowButton.newplanbutton_" . $c . "_" . $i . ",";
                                $returnstring .= ".arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton.arp_modern_button .bestPlanRowButton.newplanbutton_" . $c . "_" . $i . ",";
                                $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton.arp_modern_button .bestPlanRowButton.newplanbutton_" . $c . "_" . $i . "";
                                $returnstring .= "{";
                                $returnstring .= "line-height:" . ($button_height_row - 4) . "px !important;";
                                $returnstring .= "}";
                            }

                            $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " 
                            .bestPlanRowButton.newplanbutton_" . $c . "_" . $i . ","; 
                            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanRowButton.newplanbutton_" . $c . "_" . $i . "{";
                            $returnstring .= "line-height: normal !important;";
                            $returnstring .= "}";

                        }

                        $row_count++;
                    }
                }

                if( $columns['button_font_color'] != '' ){
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton .bestPlanButton_text,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton .bestPlanButton_text";

                    $returnstring .= "{";

                    $returnstring .= "color:" . $columns['button_font_color'] . ";";

                    $returnstring .= "}";
                }


                if (isset($columns['button_size']) && isset($columns['button_height']) && $reference_template != 'arptemplate_26') {
                    
                    $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton:not(.bestPlanRowButton),";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton:not(.bestPlanRowButton)";
                    $returnstring .= "{";
                    
                    if( $columns['button_size'] != '' ){
                        $returnstring .= "width:" . $columns['button_size'] . "px;";
                        if($reference_template == 'arptemplate_23'){
                            $returnstring .= "max-width: 96%;";
                        } else if($reference_template != 'arptemplate_5' && $reference_template != 'arptemplate_20' && $reference_template != 'arptemplate_21') {
                            $returnstring .= "max-width: 98%;";
                        }
                    }
                    
                    if( $columns['button_height'] != '' ){
                        $returnstring .= "height:" . $columns['button_height'] . "px;";
                        $returnstring .= "line-height:" . $columns['button_height'] . "px !important;";
                    }
                    
                    $returnstring .= "}";

                    if( $columns['button_height'] != '' && (int)$columns['button_height'] > 0 ){
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton.arp_border_button:not(.bestPlanRowButton),";
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton.arp_border_button:not(.bestPlanRowButton),";
                        $returnstring .= ".arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton.arp_modern_button:not(.bestPlanRowButton),";
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton.arp_modern_button:not(.bestPlanRowButton)";
                        $returnstring .= "{";
                        $returnstring .= "line-height:" . ($columns['button_height'] - 4) . "px !important;";
                        $returnstring .= "}";
                    }

                    $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " 
                    .bestPlanRowButton.newplanbutton_" . $c . "_" . $i . " ,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanRowButton.newplanbutton_" . $c . "_" . $i . "{";
                    $returnstring .= "line-height: normal !important;";
                    $returnstring .= "}";

                }


                if ($reference_template == 'arptemplate_7') {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .column_description,.arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arppricetablecolumnprice,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .column_description,.arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arppricetablecolumnprice{";
                } else if ($reference_template == 'arptemplate_10') {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arpplan,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arpplan{";
                } else if ($reference_template == 'arptemplate_11') {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arppricetablecolumnprice,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arppricetablecolumnprice{";
                } else {
                    $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .column_description,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .column_description{";
                }
                if( $columns['column_description_font_color'] != '' ){
                    $returnstring .= "color:" . stripslashes_deep($columns['column_description_font_color']) . ";";
                }

                $returnstring .= "}";

                $content_label_font_color_value = ( isset($columns['content_label_font_color']) ? $columns['content_label_font_color'] : "" );
                if( $content_label_font_color_value != '' ){
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .caption_li, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_caption_li_text,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .caption_li, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_caption_li_text{";
                    $returnstring .= "color:" . $content_label_font_color_value . ";";
                    $returnstring .= "}";
                }
                
                if ($columns['is_caption'] != 0) {
                    $returnstring .= '#ArpTemplate_main.arp_front_main_container .arptemplate_' . $table_id . ' .style_column_0 .arp_footer_content,';
                    $returnstring .= '.arptemplate_' . $table_id . ' .style_column_0 .arp_footer_content {';

                    $returnstring .= 'margin: 5px;';
                    $returnstring .= 'color: ' . $columns['footer_level_options_font_color'] . ';';
                    $returnstring .= 'font-family: ' . $columns['footer_level_options_font_family'] . ';';
                    $returnstring .= 'font-size:' . $columns['footer_level_options_font_size'] . 'px;';
                    if ($columns['footer_level_options_font_style_bold'] == 'bold') {
                        $returnstring .= 'font-weight: bold;';
                    }
                    if ($columns['footer_level_options_font_style_italic'] == 'italic') {
                        $returnstring .= 'font-style: italic;';
                    }
                    if ($columns['footer_level_options_font_style_decoration'] == 'underline') {
                        $returnstring .= 'text-decoration: underline;';
                    } else if ($columns['footer_level_options_font_style_decoration'] == 'line-through') {
                        $returnstring .= 'text-decoration: line-through;';
                    }

                    $returnstring .= '}';
                }
                

                $returnstring .= '#ArpTemplate_main.arp_front_main_container .arptemplate_' . $table_id . ' .style_' . $c . ' .arp_footer_content,';
                $returnstring .= '.arptemplate_' . $table_id . ' .style_' . $c . ' .arp_footer_content{';               
                $returnstring .= 'color: ' . $columns['footer_level_options_font_color'] . ';';
                $returnstring .= 'width:100% !important;';
                $returnstring .= '}';

                
                $arp_section_text_alignment = $arprice_default_settings->arp_section_text_alignment();
                $arp_section_text_alignment = isset($arp_section_text_alignment[$reference_template]) ? $arp_section_text_alignment[$reference_template] : array();
                if ($columns['is_caption'] != 0) {
                    $arp_section_text_alignment = $arp_section_text_alignment['caption_column'];
                    if (isset($columns['header_font_align']) && array_key_exists('header_section', $arp_section_text_alignment)) {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['header_section'] . ",";
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['header_section'] . "{";
                        $returnstring .="text-align:" . $columns['header_font_align'] . ";";
                        $returnstring .="}";
                    }

                    if (isset($columns['footer_text_align']) && array_key_exists('footer_section', $arp_section_text_alignment)) {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['footer_section'] . ",";
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['footer_section'] . "{";
                        $returnstring .="text-align:" . $columns['footer_text_align'] . ";";
                        $returnstring .="}";
                    }
                } else {
                    $arp_section_text_alignment = isset($arp_section_text_alignment['other_column']) ? $arp_section_text_alignment['other_column'] : array();
                    if (isset($general_column_settings['arp_header_text_alignment']) && array_key_exists('header_section', $arp_section_text_alignment)) {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['header_section'] . ",";
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['header_section'] . "{";
                        $returnstring .="text-align:" . $general_column_settings['arp_header_text_alignment'] . ";";
                        $returnstring .="}";
                    }
                    if (isset($general_column_settings['arp_price_text_alignment']) && array_key_exists('pricing_section', $arp_section_text_alignment)) {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['pricing_section'] . ",";
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['pricing_section'] . "{";
                        $returnstring .="text-align:" . $general_column_settings['arp_price_text_alignment'] . ";";
                        $returnstring .="}";
                    }



                    if (isset($general_column_settings['arp_body_text_alignment']) && array_key_exists('body_section', $arp_section_text_alignment)) {
                        
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['body_section'] . ",";
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['body_section'] . "{";
                        $returnstring .="text-align:" . $general_column_settings['arp_body_text_alignment'] . ";";
                        $returnstring .="}";
                    }
                    if (isset($general_column_settings['arp_footer_text_alignment']) && array_key_exists('footer_section', $arp_section_text_alignment)) {
                        $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['footer_section'] . ",";
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['footer_section'] . "{";
                        if(isset($general_column_settings['arp_footer_text_alignment']) && $general_column_settings['arp_footer_text_alignment']!=''){
                            $returnstring .="text-align:" . $general_column_settings['arp_footer_text_alignment'] . ";";    
                        }
                        
                        $returnstring .="}";
                    }

                    if (isset($general_column_settings['arp_description_text_alignment']) && array_key_exists('column_description_section', $arp_section_text_alignment)) {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['column_description_section'] . ",";
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['column_description_section'] . "{";
                        if(isset($general_column_settings['arp_description_text_alignment']) && $general_column_settings['arp_description_text_alignment']!=''){
                            $returnstring .="text-align:" . $general_column_settings['arp_description_text_alignment'] . ";";
                        }
                        
                        $returnstring .="}";
                    }
                }


                
                
                if (isset($columns['arp_shortcode_customization_style']) && isset($columns['arp_shortcode_customization_size'])) {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .rounded_corder,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .rounded_corder{";
                    if ($reference_template == 'arptemplate_4' ) {
                        if( isset($columns['price_font_color']) && $columns['price_font_color'] != '' ){
                            $returnstring .="color : " . $columns['price_font_color'] . "; ";
                        }
                    } else {
                        if( isset($columns['shortcode_font_color']) && $columns['shortcode_font_color'] != '' ){
                            $returnstring .="color : " . $columns['shortcode_font_color'] . "; ";
                        }
                    }
                    $returnstring .="}";
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .rounded_corder,";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .rounded_corder{";
                    $shortcode_array = $arprice_default_settings->arp_shortcode_custom_type();

                    if ($reference_template == 'arptemplate_4' ) {
                        if( isset($columns['price_font_color']) && $columns['price_font_color'] != '' ){
                            $returnstring .="color : " . $columns['price_font_color'] . "; ";
                        }
                    } else {
                        if( isset($columns['shortcode_font_color']) && $columns['shortcode_font_color'] != '' ){
                            $returnstring .="color : " . $columns['shortcode_font_color'] . "; ";
                        }
                    }
                    if ($reference_template == 'arptemplate_4') {
                        if (isset($shortcode_array[$columns['arp_shortcode_customization_style']]['type']) && $shortcode_array[$columns['arp_shortcode_customization_style']]['type'] == 'solid') {
                            if( isset($columns['price_background_color']) && '' != $columns['price_background_color'] ){
                                $returnstring .="background-color : " . $columns['price_background_color'] . "; ";
                            }
                        }
                        if( isset($columns['price_background_color']) && $columns['price_background_color'] != '' ){
                            $returnstring .="border-color : " . $columns['price_background_color'] . "; ";
                        }
                    } else {

                        if (isset($shortcode_array[$columns['arp_shortcode_customization_style']]['type']) && 'solid' == $shortcode_array[$columns['arp_shortcode_customization_style']]['type'] ) {
                            if( isset($columns['shortcode_background_color']) ){
                                $returnstring .="background-color : " . $columns['shortcode_background_color'] . "; ";
                            }
                        }
                        if( isset($columns['shortcode_background_color']) && $columns['shortcode_background_color'] != '' ){
                            $returnstring .="border-color : " . $columns['shortcode_background_color'] . "; ";
                        }
                    }
                    $returnstring .="}";
                }
                


                
                $arp_button_type = $arprice_default_settings->arp_button_type();

                if (isset($general_column_settings['arp_global_button_type']) && $general_column_settings['arp_global_button_type'] != 'none') {
                    if ( isset( $general_column_settings['arp_global_button_type'] ) && $general_column_settings['arp_global_button_type'] == 'border') {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":not(.maincaptioncolumn) .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ",";
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":not(.maincaptioncolumn) .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . "{";
                        $returnstring .="border : 2px solid " . $columns['button_background_color'] . ";";
                        $returnstring .="color : " . $columns['button_background_color'] . ";";
                        $returnstring .="background-color : transparent !important;";

                        $returnstring .="}";
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":not(.maincaptioncolumn) .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . " .bestPlanButton_text,";
                        $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . " .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.maincaptioncolumn) .bestPlanButton_text{";
                        $returnstring .="color :" . $columns['button_background_color'] . "  !important;";
                        $returnstring .="}";

                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":not(.maincaptioncolumn) .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] .":not(.arp_button_hover_disable):hover{";
                            $returnstring .= 'background-color:' . $columns['button_background_color'] . ' !important;';
                            $returnstring .='border-color : ' . $columns['button_background_color'] . ' !important;';
                        $returnstring .= "}";

                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":not(.maincaptioncolumn) .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] .":not(.arp_button_hover_disable):hover .bestPlanButton_text{";
                            $returnstring .="color :" . $columns['button_font_color'] . "  !important;";
                        $returnstring .= "}";

                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.has_animation.style_" . $c . ":not(.maincaptioncolumn) .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . "{";
                            $returnstring .= "border:2px solid " . $columns['button_background_color'] ." !important;";
                        $returnstring .= "}";

                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.has_animation.style_" . $c . ":not(.maincaptioncolumn) .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . " .bestPlanButton_text{";
                            $returnstring .= "color: " . $columns['button_background_color'] ." !important;";
                        $returnstring .= "}";
                    }
                    if( isset( $general_column_settings['arp_global_button_type'] ) && 'reverse_border' == $general_column_settings['arp_global_button_type'] ) {

                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_".$c.":not(.no_transition):not(.maincaptioncolumn) .bestPlanButton{";
                        $returnstring .= "border:2px solid ".$columns['button_background_color'] ." !important; ";
                        $returnstring .= "}";

                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_".$c.":not(.no_transition):not(.maincaptioncolumn):not(.arp_disable_hover).column_highlight .bestPlanButton,";
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_".$c.":not(.no_transition):not(.maincaptioncolumn):not(.arp_disable_hover):hover .bestPlanButton{";
                            $returnstring .= "background:".$columns['button_hover_background_color']." !important;";
                            $returnstring .= "border:2px solid ".$columns['button_hover_background_color']." !important;";
                        $returnstring .= "}";

                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_".$c.":not(.no_transition):not(.maincaptioncolumn).column_highlight .bestPlanButton:not(.arp_button_hover_disable):hover,";
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_".$c.":not(.no_transition):not(.maincaptioncolumn):hover  .bestPlanButton:not(.arp_button_hover_disable):hover{";
                            $returnstring .= "border:2px solid ".$columns['button_hover_background_color']." !important;";
                            $returnstring .= "background:transparent !important;";
                        $returnstring .= "}";

                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_".$c.":not(.no_transition):not(.maincaptioncolumn).column_highlight .bestPlanButton:not(.arp_button_hover_disable):hover .bestPlanButton_text,";
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_".$c.":not(.no_transition):not(.maincaptioncolumn):hover  .bestPlanButton:not(.arp_button_hover_disable):hover .bestPlanButton_text{";
                            $returnstring .= "color:".$columns['button_hover_background_color']." !important;";
                        $returnstring .= "}";

                    }

                    if ( isset( $general_column_settings['arp_global_button_type'] ) && $general_column_settings['arp_global_button_type'] == 'classic') {

                        if ( isset( $general_column_settings['enable_button_hover_effect'] ) && $general_column_settings['enable_button_hover_effect'] == 1) {
                            $color = $arprice_form->hex2rgb($columns['button_hover_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                                $returnstring .="}";
                            }
                        }
                        if ( !isset( $general_column_settings ) || $general_column_settings['enable_hover_effect'] != 1) {
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":not(.arp_button_hover_disable):hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                                $returnstring .="}";
                            }
                        }
                        if ( (!isset($general_column_settings['enable_hover_effect']) || $general_column_settings['enable_hover_effect'] != 1 ) && ( !isset($general_column_settings['enable_button_hover_effect']) || $general_column_settings['enable_button_hover_effect'] != 1) ) {
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',1) !important';
                                $returnstring .="}";
                            }
                        }
                    }
                    if ( isset( $general_column_settings['arp_global_button_type'] ) && $general_column_settings['arp_global_button_type'] == 'modern') {
                        if (isset( $general_column_settings['enable_button_hover_effect'] ) && $general_column_settings['enable_button_hover_effect'] == 1) {
                            $color = $arprice_form->hex2rgb($columns['button_hover_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                                $returnstring .="}";
                            }
                        }
                        if ( !isset( $general_column_settings['enable_hover_effect'] ) || $general_column_settings['enable_hover_effect'] != 1) {
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":not(.arp_button_hover_disable):hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                                $returnstring .="}";
                            }
                        }
                        if ( (!isset($general_column_settings['enable_hover_effect']) || $general_column_settings['enable_hover_effect'] != 1 ) && (!isset( $general_column_settings['enable_button_hover_effect']) || $general_column_settings['enable_button_hover_effect'] != 1 ) ) {
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":not(.arp_button_hover_disable):hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',1) !important';
                                $returnstring .="}";
                            }
                        }
                    }
                    if ( isset( $general_column_settings['arp_global_button_type'] ) && $general_column_settings['arp_global_button_type'] == 'flat') {
                        if (isset( $general_column_settings['enable_button_hover_effect'] ) && $general_column_settings['enable_button_hover_effect'] == 1) {
                            $color = $arprice_form->hex2rgb($columns['button_hover_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                                $returnstring .="}";
                            }
                        }
                        if (!isset( $general_column_settings['enable_hover_effect'] ) || $general_column_settings['enable_hover_effect'] != 1) {
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                                $returnstring .="}";
                            }
                        }
                        if ( ( !isset($general_column_settings['enable_hover_effect']) || $general_column_settings['enable_hover_effect'] != 1 ) && ( !isset( $general_column_settings['enable_button_hover_effect'] ) || $general_column_settings['enable_button_hover_effect'] != 1) ) {
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":not(.arp_button_hover_disable):hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',1) !important';
                                $returnstring .="}";
                            }
                        }
                    }
                    if ($general_column_settings['arp_global_button_type'] == 'shadow') {
                        if ( isset( $general_column_settings['enable_button_hover_effect'] ) && $general_column_settings['enable_button_hover_effect'] == 1) {
                            $color = $arprice_form->hex2rgb($columns['button_hover_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                                $returnstring .="}";
                            }
                        }
                        if ( !isset($general_column_settings['enable_hover_effect'] ) || $general_column_settings['enable_hover_effect'] != 1) {
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                                $returnstring .="}";
                            }
                        }
                        if (( !isset($general_column_settings['enable_hover_effect']) || $general_column_settings['enable_hover_effect'] != 1) && ( !isset( $general_column_settings['enable_button_hover_effect'] ) || $general_column_settings['enable_button_hover_effect'] != 1 ) ) {
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            if( isset($color) && is_array($color) && count($color) > 0 ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover,";
                                $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                                $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',1) !important';
                                $returnstring .="}";
                            }
                        }
                    }
                }

                
                $total_tabs = $arp_pricingtable->arp_toggle_step_name();

                $g = 0;

                foreach( $total_tabs as $key => $tab_name ){
                    $tab_key = $tab_name[2];
                    if( isset( $columns['header_min_height_' . $tab_key] ) && '' != $columns['header_min_height_' . $tab_key] ){
                        $header_min_height_data = explode( '||', $columns['header_min_height_' . $tab_key] );
                        if( $header_min_height_data[0] > 0 && '' != $header_min_height_data[1] ){
                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ".$header_min_height_data[1]."{";
                                $returnstring .= "height:" . $header_min_height_data[0] . "px;";
                            $returnstring .= "}";
                        }
                    }
                    $g++;
                }
                
                if( isset( $columns['header_margin_top'] ) && '' != $columns['header_margin_top'] ){
                    $header_margin_top_data = explode( '||', $columns['header_margin_top'] );
                    if( $header_margin_top_data[0] > 0 && '' != $header_margin_top_data[1] ){
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ".$header_margin_top_data[1]."{";
                            $returnstring .= "margin-top:" . $header_margin_top_data[0] . "px;";
                        $returnstring .= "}";
                    }
                }

                if( isset( $columns['shortcode_min_height'] ) && '' != $columns['shortcode_min_height'] ) {
                    $shortcode_height_data = explode( '||', $columns['shortcode_min_height'] );
                    if( $shortcode_height_data[0] > 0 && '' != $shortcode_height_data[1] ){
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ".$shortcode_height_data[1]."{";
                            $returnstring .= "height:" . $shortcode_height_data[0] . "px;";
                        $returnstring .= "}";
                    }
                }

                if( isset( $columns['price_min_height'] ) && '' != $columns['price_min_height'] ) {
                    $price_min_height_data = explode( '||', $columns['price_min_height'] );
                    if( $price_min_height_data[0] > 0 && '' !=  $price_min_height_data[1]){
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ".$price_min_height_data[1]."{";
                            $returnstring .= "height:" . $price_min_height_data[0] . "px;";
                        $returnstring .= "}";
                    }
                }

                if( isset( $columns['col_desc_min_height'] ) && '' != $columns['col_desc_min_height'] ){
                    $col_desc_height_data = explode( '||', $columns['col_desc_min_height'] );
                    if( $col_desc_height_data[0] > 0 && '' != $col_desc_height_data[1] ){
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ".$col_desc_height_data[1]."{";
                            $returnstring .= "height:" . $col_desc_height_data[0] . "px;";
                        $returnstring .= "}";
                    }
                }

                if( isset( $columns['footer_min_height'] ) && '' != $columns['footer_min_height'] ) {
                    $footer_min_height_data = explode( '||', $columns['footer_min_height'] );
                    if( $footer_min_height_data[0] > 0 && '' != $footer_min_height_data[1] ){
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ".$footer_min_height_data[1]."{";
                            $returnstring .= "height:" . $footer_min_height_data[0] . "px;";
                        $returnstring .= "}";
                    }
                }

                if( isset( $columns['button_min_height'] ) && '' != $columns['button_min_height'] ){
                    $button_min_height_data = explode( '||', $columns['button_min_height'] );
                    if( $button_min_height_data[0] > 0 && '' != $button_min_height_data[1] ){
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ".$button_min_height_data[1]."{";
                            $returnstring .= "height:" . $button_min_height_data[0] . "px;";
                        $returnstring .= "}";
                    }
                }

                if( isset( $columns['rows'] ) && count( $columns['rows'] ) > 0 ){
                    foreach( $columns['rows'] as $rk => $rv ){
                        if( isset( $rv['row_min_height'] ) && '' != $rv['row_min_height'] ){
                            $row_min_height_data = explode('||', $rv['row_min_height']);
                            if( $row_min_height_data[0] > 0 && '' != $row_min_height_data[1] ){
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ul li#arp_".$c."_".$rk."{";
                                    $returnstring .= "height:" . $row_min_height_data[0] . "px;";
                                $returnstring .= "}";
                            }
                        }
                    }
                }
            }
        }
        

        $tooltip_style = $general_option['tooltip_settings']['style'];
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_tooltip_" . $table_id . " ,
            .arp_tooltip_" . $table_id . " {
			color: " . $tooltip_text_color . " !important;";
        if ($tooltip_style == 'glass') {
            $color = $arprice_form->hex2rgb($tooltip_bg_color);
            $returnstring .= 'background:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.7)';
        } else if ($tooltip_style == 'alert') {
            $color = $arprice_form->hex2rgb($tooltip_bg_color);
            $returnstring .= 'background:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.9)';
        } else {
            $returnstring .= "background: " . $tooltip_bg_color . " !important;";
        }
        $returnstring .= "}";

        $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_tooltip_" . $table_id . " .tipso_content,
            .arp_tooltip_" . $table_id . " .tipso_content {
			font-family: " . stripslashes($tooltip_font_family) . ";
			font-size: " . $tooltip_font_size . "px;";
        if( $tooltip_font_style_decoration != '' ){
            $returnstring .= "text-decoration: " . $tooltip_font_style_decoration . ";";
        }
        
        if( $tooltip_font_style_italic != '' ){
            $returnstring .= "font-style: " . $tooltip_font_style_italic . ";";
        }

        if( $tooltip_font_style_bold != '' ){
		  $returnstring .= "font-weight: " . $tooltip_font_style_bold . ";";
        }
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container  .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper,
        .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper{
                    margin-right:" . ($column_space / 2 ) . "px;
                    margin-left:" . ($column_space / 2) . "px;
                }";
        
        
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .ArpPriceTable.arp_price_table_" . $table_id . " .maincaptioncolumn .arpcaptiontitle { color: #E3E3E3; }";
        $returnstring .= " .ArpPriceTable.arp_price_table_" . $table_id . " .maincaptioncolumn .arpcaptiontitle { color: #E3E3E3; }";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .ArpPriceTable.arp_price_table_" . $table_id . " .maincaptioncolumn .arpcaptiontitle { color: #000000; }";
        $returnstring .= " .ArpPriceTable.arp_price_table_" . $table_id . " .maincaptioncolumn .arpcaptiontitle { color: #000000; }";

        $returnstring .= " #ArpTemplate_main.arp_front_main_container .ArpPriceTable.arp_price_table_" . $table_id . " .maincaptioncolumn .arpcaptiontitle { font-family:'opensans-regular-webfont',Arial, Helvetica, sans-serif; font-size:32px; }";
        $returnstring .= " .ArpPriceTable.arp_price_table_" . $table_id . " .maincaptioncolumn .arpcaptiontitle { font-family:'opensans-regular-webfont',Arial, Helvetica, sans-serif; font-size:32px; }";




        global $arp_pricingtable, $arp_templatehoverclassarr, $arprice_default_settings;
        $arp_templatehoverclassarr = $arprice_default_settings->arp_template_hover_class_array();

        $exclude_caption = $arprice_default_settings->arp_exclude_caption_column_for_color_skin();
        $is_exclude_caption = $exclude_caption[$reference_template];

        
        $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.no_transition){ opacity: " . $column_opacity . "; }";
        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.no_transition){ opacity: " . $column_opacity . "; }";

        $caption_column_odd_color = isset($opts['columns']['column_0']['content_odd_color']) ? $opts['columns']['column_0']['content_odd_color'] : '';
        $caption_column_even_color = isset($opts['columns']['column_0']['content_even_color']) ? $opts['columns']['column_0']['content_even_color'] : '';

        $content_odd_color = isset($columns['content_odd_color']) ? $columns['content_odd_color'] : '';
        $content_even_color = isset($columns['content_even_color']) ? $columns['content_even_color'] : '';

        if (!empty($arp_templatehoverclassarr[$reference_template])) {
            
            $common_skin = (isset($arp_templatehoverclassarr[$reference_template]['arp_common_hover_css'])) ? $arp_templatehoverclassarr[$reference_template]['arp_common_hover_css'] : '';
            
            $color_skins = (isset($arp_templatehoverclassarr[$reference_template]['arp_skin_hover_css'])) ? $arp_templatehoverclassarr[$reference_template]['arp_skin_hover_css'] : '';
            $columns = $opts['columns'];
            $element_hover = "";
            $parent_hover = "";
            $g = 1;
            $grc = 1;
            $skinarr = array();
            $cap_cols = array();
            $start = 0;


            foreach ($columns as $c => $column) {

                if ($column['is_caption'] == 1) {

                    $str = '';
                    if (isset($column['rows'])) {
                        foreach ($column['rows'] as $key => $rows) {

                            if (isset($rows['row_hover_custom_css']) && $rows['row_hover_custom_css'] != '') {
                                $str .= "#ArpTemplate_main.arp_front_main_container .arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.arp_disable_hover):hover li#arp_$c" . "_" . "$key,";
                                $str .= ".arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.arp_disable_hover):hover li#arp_$c" . "_" . "$key{";
                                {

                                    $row_inline_script_old = trim($rows['row_hover_custom_css']);
                                    $row_inline_script_old = str_replace("/\r|\n/", "", $row_inline_script_old);
                                    $row_inline_script_old = explode(';', $row_inline_script_old);
                                    $row_inline_script = '';
                                    if (!empty($row_inline_script_old)) {
                                        foreach ($row_inline_script_old as $new_css) {
                                            if ($new_css != '') {
                                                $new_css = explode(':', $new_css);
                                                $row_inline_script .= trim($new_css[0]) . ' : ' . trim(str_replace("!important", "", $new_css[1])) . ' !important;';
                                            }
                                        }
                                    }
                                    $str .= $row_inline_script;
                                }
                                $str .= '}';
                            }
                        }
                    }
                    $skinarr[] = $str;
                    $start++;
                } else {


                    $g = ($general_option['template_setting']['skin'] == 'custom_skin') ? 0 : 1;

                    $caption_column_odd_color = isset($opts['columns']['column_0']['content_odd_color']) ? $opts['columns']['column_0']['content_odd_color'] : '';
                    $caption_column_even_color = isset($opts['columns']['column_0']['content_even_color']) ? $opts['columns']['column_0']['content_even_color'] : '';

                    $content_odd_color = isset($column['content_odd_color']) ? $column['content_odd_color'] : '';
                    $content_even_color = isset($column['content_even_color']) ? $column['content_even_color'] : "";
                    
                    if (!empty($common_skin)) {

                        foreach ($common_skin as $class_key => $cskin) {
                            $str = '';

                            $class_key = explode('_^_', $class_key);
                            $class_name = $class_key[0];
                            $class_name = str_replace("[ARP_SPACE]", " ", $class_name);

                            $hover = $class_key[1];

                            if ($hover == 0) {
                                $element_hover = ":hover";
                                $parent_hover = "";
                            } else {
                                $element_hover = "";
                                $parent_hover = ":hover";
                            }

                            $str .= "#ArpTemplate_main.arp_front_main_container .arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.maincaptioncolumn):not(.arp_disable_hover)$parent_hover $class_name";
                            $str .= $element_hover;
                            $str .= ",#ArpTemplate_main.arp_front_main_container .arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.maincaptioncolumn):not(.arp_disable_hover).column_highlight $class_name$element_hover,";
                            $str .= ".arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.maincaptioncolumn):not(.arp_disable_hover)$parent_hover $class_name";
                            $str .= $element_hover;
                            $str .= ",.arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.maincaptioncolumn):not(.arp_disable_hover).column_highlight $class_name$element_hover";

                            $str .="{";


                            foreach ($cskin as $property => $values) {
                                $values = explode('<==>', $values);
                                $values_ = isset($values[0]) ? $values[0] : '';
                                $parameter = isset($values[1]) ? $values[1] : '';
                                $points = isset($values[2]) ? $values[2] : '';
                                if (preg_match('/____/', $values_)) {
                                    $values_ = explode('____', $values_);
                                } else {
                                    $value = $values_;
                                }
                                

                                $value = ( is_array($values_) and count($values_) > 1 ) ? $values_[1] : $values_;

                                $arp_button_bg_hover_color = isset($column['button_hover_background_color']) ? $column['button_hover_background_color'] : $general_option['custom_skin_colors']['arp_button_bg_hover_color'];
                                $arp_button_hover_font_color = isset($column['button_hover_font_color']) ? $column['button_hover_font_color'] : '';

                                $arp_column_bg_hover_color = isset($column['column_hover_background_color']) ? $column['column_hover_background_color'] : $general_option['custom_skin_colors']['arp_column_bg_hover_color'];


                                if (isset($general_option['custom_skin_colors']['arp_footer_content_bg_color']) and ! empty($general_option['custom_skin_colors']['arp_footer_content_bg_color']) && $template_color_skin == 'custom_skin') {
                                    $arp_footer_bg_hover_color = $general_option['custom_skin_colors']['arp_footer_content_bg_color'];
                                } else {
                                    $arp_footer_bg_hover_color = isset($column['footer_background_color']) ? $column['footer_background_color'] : '';
                                }


                                if (isset($general_option['custom_skin_colors']['arp_header_bg_custom_color']) and ! empty($general_option['custom_skin_colors']['arp_header_bg_custom_color']) && $template_color_skin == 'custom_skin') {
                                    $arp_header_bg_hover_color = $general_option['custom_skin_colors']['arp_header_bg_custom_color'];
                                } else {
                                    $arp_header_bg_hover_color = isset($column['header_hover_background_color']) ? $column['header_hover_background_color'] : $general_option['custom_skin_colors']['arp_header_bg_custom_color'];
                                }

                                $arp_header_bg_hover_custom_color = isset($column['header_hover_background_color']) ? $column['header_hover_background_color'] : $general_option['custom_skin_colors']['arp_header_bg_hover_color'];

                                $arp_header_hover_font_color = isset($column['header_hover_font_color']) ? $column['header_hover_font_color'] : '';
                                $arp_price_bg_hover_custom_color = isset($column['price_hover_background_color']) ? $column['price_hover_background_color'] : $general_option['custom_skin_colors']['arp_price_bg_hover_color'];

                                $arp_odd_row_hover_background_color = isset($column['content_odd_hover_color']) ? $column['content_odd_hover_color'] : $general_option['custom_skin_colors']['arp_body_odd_row_hover_bg_custom_color'];

                                $arp_even_row_hover_background_color = isset($column['content_even_hover_color']) ? $column['content_even_hover_color'] : $general_option['custom_skin_colors']['arp_body_even_row_hover_bg_custom_color'];

                                $arp_content_hover_font_color = isset($column['content_hover_font_color']) ? $column['content_hover_font_color'] : '';
                                $arp_content_even_hover_font_color = isset($column['content_even_hover_font_color']) ? $column['content_even_hover_font_color'] : '';
                                $arp_content_label_hover_font_color = isset($column['content_label_hover_font_color']) ? $column['content_label_hover_font_color'] : '';

                                $arp_footer_content_hover_bg_color = isset($column['footer_hover_background_color']) ? $column['footer_hover_background_color'] : $general_option['custom_skin_colors']['arp_footer_content_hover_bg_color'];
                                $arp_footer_hover_font_color = isset($column['footer_level_options_hover_font_color']) ? $column['footer_level_options_hover_font_color'] : '';

                                $arp_desc_hover_background_color = isset($column['column_desc_hover_background_color']) ? $column['column_desc_hover_background_color'] : $general_option['custom_skin_colors']['arp_column_desc_hover_bg_custom_color'];
                                $arp_desc_hover_font_color = isset($column['column_description_hover_font_color']) ? $column['column_description_hover_font_color'] : '';

                                $arp_price_backgroud_color = isset($column['price_background_color']) ? $column['price_background_color'] : '';
                                $arp_price_hover_font_color = isset($column['price_hover_font_color']) ? $column['price_hover_font_color'] : '';
                                $arp_price_label_hover_font_color = isset($column['price_text_hover_font_color']) ? $column['price_text_hover_font_color'] : '';

                                $arp_shortoce_hover_font_color = isset($column['shortcode_hover_font_color']) ? $column['shortcode_hover_font_color'] : '';
                                $arp_shortoce_hover_background_color = isset($column['shortcode_hover_background_color']) ? $column['shortcode_hover_background_color'] : '';

                                $value = str_replace('{arp_price_background_color}', $arp_price_backgroud_color, $value);
                                $value = str_replace('{arp_price_hover_font_color}', $arp_price_hover_font_color, $value);
                                $value = str_replace('{arp_price_label_hover_font_color}', $arp_price_label_hover_font_color, $value);
                                if($general_column_settings['full_column_clickable']==1 && $value=='{arp_button_background_color}' && $reference_template!='arptemplate_26' && $reference_template!='arptemplate_20' && $reference_template!='arptemplate_21' && $reference_template!='arptemplate_5'){
                                    $color = $arprice_form->hex2rgb($arp_button_bg_hover_color);
                                    $color_val = 'rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75)';
                                    $value = str_replace('{arp_button_background_color}', $color_val, $value);
                                }
                                else{
                                    $value = str_replace('{arp_button_background_color}', $arp_button_bg_hover_color, $value);    
                                }
                                
                                $value = str_replace('{arp_button_hover_font_color}', $arp_button_hover_font_color, $value);
                                $value = str_replace('{arp_column_hover_background_color}', $arp_column_bg_hover_color, $value);
                                $value = str_replace('{arp_footer_column_background_color}', $arp_column_bg_hover_color, $value);
                                if( isset($column['header_background_color']) ){
                                    $value = str_replace('{arp_header_background_color}', $column['header_background_color'], $value);
                                }

                                $value = str_replace('{arp_header_hover_font_color}', $arp_header_hover_font_color, $value);
                                if (preg_match('/{arp_column_hover_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $value)) {
                                    $column_color = $this->hex2rgb($arp_column_bg_hover_color);

                                    $new_val = explode('^_^', $value);

                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace(')', '', $opacity);
                                    $opacity = str_replace('}', '', $opacity);
                                    $new_color = 'rgba(' . $column_color["red"] . ',' . $column_color["green"] . ',' . $column_color["blue"] . ',' . $opacity . ')';

                                    $value = preg_replace('/{arp_column_hover_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $new_color, $value);
                                }
                                $value = str_replace('[ARP_SPACE]', ' ', $value);
                                if( isset($column['column_background_color']) ){
                                    $value = str_replace('{arp_column_background_color}', $column['column_background_color'], $value);
                                }
                                $value = str_replace('{arp_header_bg_custom_hover_color}', $arp_header_bg_hover_custom_color, $value);
                                if (preg_match('/{arp_header_background_custom_hover_input_rgba\^\_\^\((\d(\.\d))\)}/', $value)) {
                                    $header_color_rgb = $this->hex2rgb($arp_header_bg_hover_custom_color);

                                    $new_val = explode('^_^', $value);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace(')', '', $opacity);
                                    $opacity = str_replace('}', '', $opacity);
                                    $new_color = 'rgba(' . $header_color_rgb["red"] . ',' . $header_color_rgb["green"] . ',' . $header_color_rgb["blue"] . ',' . $opacity . ')';

                                    $value = preg_replace('/{arp_header_background_custom_hover_input_rgba\^\_\^\((\d(\.\d))\)}/', $new_color, $value);
                                }
                                if ($reference_template != 'arptemplate_4') {
                                    $value = str_replace('{arp_price_hover_background_color}', $arp_price_bg_hover_custom_color, $value);
                                }
                                $value = str_replace('{arp_even_row_hover_background_color}', $arp_even_row_hover_background_color, $value);

                                if (preg_match('/{arp_body_even_row_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $value)) {
                                    $even_color_rgb = $this->hex2rgb($arp_even_row_hover_background_color);

                                    $new_val = explode('^_^', $value);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace(')', '', $opacity);
                                    $opacity = str_replace('}', '', $opacity);
                                    $new_color = 'rgba(' . $even_color_rgb["red"] . ',' . $even_color_rgb["green"] . ',' . $even_color_rgb["blue"] . ',' . $opacity . ')';

                                    $value = preg_replace('/{arp_body_even_row_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $new_color, $value);
                                }

                                $value = str_replace('{arp_odd_row_hover_background_color}', $arp_odd_row_hover_background_color, $value);
                                if (preg_match('/{arp_body_odd_row_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $value)) {
                                    $odd_color_rgb = $this->hex2rgb($arp_odd_row_hover_background_color);
                                    $new_val = explode('^_^', $value);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace(')', '', $opacity);
                                    $opacity = str_replace('}', '', $opacity);
                                    $new_color = 'rgba(' . $odd_color_rgb["red"] . ',' . $odd_color_rgb["green"] . ',' . $odd_color_rgb["blue"] . ',' . $opacity . ')';

                                    $value = preg_replace('/{arp_body_odd_row_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $new_color, $value);
                                }
                                $value = str_replace('{arp_content_hover_font_color}', $arp_content_hover_font_color, $value);
                                $value = str_replace('{arp_content_even_hover_font_color}', $arp_content_even_hover_font_color, $value);
                                $value = str_replace('{arp_content_label_hover_font_color}', $arp_content_label_hover_font_color, $value);
                                $value = str_replace('{arp_footer_bg_custom_hover_color}', $arp_footer_content_hover_bg_color, $value);
                                $value = str_replace('{arp_footer_font_hover_color}', $arp_footer_hover_font_color, $value);

                                $value = str_replace('{arp_desc_hover_background_color}', $arp_desc_hover_background_color, $value);

                                if (preg_match('/{arp_desc_hover_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $value)) {
                                    $desc_color_rgb = $this->hex2rgb($arp_desc_hover_background_color);

                                    $new_val = explode('^_^', $value);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace(')', '', $opacity);
                                    $opacity = str_replace('}', '', $opacity);
                                    $new_color = 'rgba(' . $desc_color_rgb["red"] . ',' . $desc_color_rgb["green"] . ',' . $desc_color_rgb["blue"] . ',' . $opacity . ')';

                                    $value = preg_replace('/{arp_desc_hover_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $new_color, $value);
                                }

                                $value = str_replace('{arp_description_hover_font_color}', $arp_desc_hover_font_color, $value);

                                if ($class_name == '.rounded_corder') {

                                    $shortcode_array = $arprice_default_settings->arp_shortcode_custom_type();
                                    if (isset( $column['arp_shortcode_customization_style']) && isset($shortcode_array[$column['arp_shortcode_customization_style']]['type']) && 'solid' == $shortcode_array[$column['arp_shortcode_customization_style']]['type']) {

                                        $value = str_replace('{arp_shortcode_background_color}', $arp_shortoce_hover_background_color, $value);
                                        if ($reference_template == 'arptemplate_4') {
                                            $value = str_replace('{arp_price_hover_background_color}', $arp_price_bg_hover_custom_color, $value);
                                        }
                                    } else {
                                        $value = str_replace('{arp_shortcode_background_color}', 'none', $value);
                                        if ($reference_template == 'arptemplate_4') {
                                            $value = str_replace('{arp_price_hover_background_color}', 'none', $value);
                                        }
                                    }

                                    $value = str_replace('{arp_shortcode_border_color}', $arp_shortoce_hover_background_color, $value);
                                    if ($reference_template == 'arptemplate_4') {
                                        $value = str_replace('{arp_border_hover_color}', $arp_price_bg_hover_custom_color, $value);
                                    }
                                }
                                $value = str_replace('{arp_shortcode_font_color}', $arp_shortoce_hover_font_color, $value);
                                if ($points > 0) {

                                    if ($parameter == "n") {
                                        $points = "-" . $points;
                                    } else {
                                        $points = $points;
                                    }

                                    $value = $this->arp_generate_color_tone($value, $points);
                                }

                                if (isset($column['column_background_image']) && $column['column_background_image'] != '' && $class_name == '.arp_column_content_wrapper') {
                                    
                                } else {
                                    $str .= $property . ':' . $value . ' !important;';
                                }
                            }
                            $str .= "}";

                            $skinarr[] = $str;
                        }
                        $str = '';
                        if (isset($column['rows'])) {
                            foreach ($column['rows'] as $key => $rows) {
                                if (isset($rows['row_hover_custom_css']) && $rows['row_hover_custom_css'] != '') {
                                    $str .= "#ArpTemplate_main.arp_front_main_container .arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.arp_disable_hover):hover li#arp_$c" . "_" . "$key,";
                                    $str .= ".arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.arp_disable_hover):hover li#arp_$c" . "_" . "$key{"; {
                                        $row_inline_script_old = trim($rows['row_hover_custom_css']);
                                        $row_inline_script_old = str_replace("/\r|\n/", "", $row_inline_script_old);
                                        $row_inline_script_old = explode(';', $row_inline_script_old);
                                        $row_inline_script = '';
                                        if (!empty($row_inline_script_old)) {
                                            foreach ($row_inline_script_old as $new_css) {
                                                if ($new_css != '') {

                                                    $new_css = explode(':', $new_css);

                                                    if (isset($new_css[0]) && isset($new_css[1]))
                                                        $row_inline_script .= trim($new_css[0]) . ' : ' . trim(str_replace("!important", "", $new_css[1])) . ' !important;';

                                                }
                                            }
                                        }
                                        $str .= $row_inline_script;
                                    }
                                    $str .= '}';
                                }
                            }
                        }
                        $skinarr[] = $str;
                    }

                    $start++;
                }
            }
        }

        if (is_array($skinarr) && !empty($skinarr)) {
            foreach ($skinarr as $css) {
                $returnstring .= $css;
            }
        }

        if ($is_animated) {
            $returnstring .= "
                #ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation:hover,
                .arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation:hover,
                #ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation.column_highlight,
                .arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation.column_highlight{
                    -webkit-transition:all .5s;
                       -moz-transition:all .5s;
                         -o-transition:all .5s;
                            transition:all .5s;
                    -webkit-box-shadow:0 0 30px rgba(0,0,0,0.3);
                       -moz-box-shadow:0 0 30px rgba(0,0,0,0.3);
                         -o-box-shadow:0 0 30px rgba(0,0,0,0.3);
                            box-shadow:0 0 30px rgba(0,0,0,0.3);
                            position:relative !important;z-index:1;
                            -webkit-transition:all .5s;
                       -moz-transition:all .5s;
                         -o-transition:all .5s;
                            transition:all .5s;
                    -webkit-box-shadow:0 0 30px rgba(0,0,0,0.3);
                       -moz-box-shadow:0 0 30px rgba(0,0,0,0.3);
                         -o-box-shadow:0 0 30px rgba(0,0,0,0.3);
                            box-shadow:0 0 30px rgba(0,0,0,0.3);
                            position:relative !important;z-index:1;
                }";
        } else {

            $zindex = ($reference_template == 'arptemplate_22') ? '' : 'z-index:1;';
            $returnstring .= "
                #ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation:not(.maincaptioncolumn):hover .arp_column_content_wrapper,
				.arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation:not(.maincaptioncolumn):hover .arp_column_content_wrapper,
                #ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation:not(.maincaptioncolumn).column_highlight .arp_column_content_wrapper,
				.arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation:not(.maincaptioncolumn).column_highlight .arp_column_content_wrapper{
					-webkit-transition:all .5s;
					   -moz-transition:all .5s;
						 -o-transition:all .5s;
							transition:all .5s;
					-webkit-box-shadow:0 0 30px rgba(0,0,0,0.3);
					   -moz-box-shadow:0 0 30px rgba(0,0,0,0.3);
						 -o-box-shadow:0 0 30px rgba(0,0,0,0.3);
							box-shadow:0 0 30px rgba(0,0,0,0.3);
							position:relative !important;
							$zindex
				}";
        }


        if ($general_settings['enable_toggle_price'] == 1) {

            
            $tab_width = $arp_pricingtable->arp_toggle_switch_tab_width();

            $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .maincaptioncolumn .column_tabs li,";
            $returnstring .= " .arp_price_table_$table_id .maincaptioncolumn .column_tabs li,";
            $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .column_tabs li ,";
            $returnstring .= " .arp_price_table_$table_id .column_tabs li {";
            $returnstring .= "width:{$tab_width[$general_settings['arp_step_main']]};";
            $returnstring .= "}";

            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .switch-candy ,";
            $returnstring .= " .arp_price_table_$table_id .switch-candy {";
            $returnstring .= "background-color:{$general_settings['toggle_inactive_color']};";
            $returnstring .= "}";

            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .switch-candy.switch-candy-blue a,";
            $returnstring .= " .arp_price_table_$table_id .switch-candy.switch-candy-blue a{";
            $returnstring .= "background-color:{$general_settings['toggle_active_color']};";
            $returnstring .= "color:{$general_settings['toggle_active_text_color']};";
            $returnstring .= "}";

            if ($general_settings['arp_label_position_main'] == 0) {
                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .toggle_button_title,";
                $returnstring .= " .arp_price_table_$table_id .toggle_button_title {";
                $returnstring .= "float:left;margin-right: 10px;";
                $returnstring .= "}";
            } else if ($general_settings['arp_label_position_main'] == 1) {
                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .toggle_button_title ,";
                $returnstring .= " .arp_price_table_$table_id .toggle_button_title {";
                $returnstring .= "text-align:center;";
                $returnstring .= "}";
            } else if ($general_settings['arp_label_position_main'] == 2) {
                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .toggle_button_title,";
                $returnstring .= " .arp_price_table_$table_id .toggle_button_title {";
                $returnstring .= "float:right;margin-left: 10px;";
                $returnstring .= "}";
            }

            if ($general_settings['arp_label_position_main'] == 0) {
                if ($general_settings['arp_toggle_main'] == 1) {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .simple-toggle-radio ,";
                    $returnstring .= " .arp_price_table_$table_id .simple-toggle-radio {";
                    $returnstring .= "margin: 0;text-align:left;";
                    $returnstring .= "}";
                } else {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .switch-candy-blue ,";
                    $returnstring .= " .arp_price_table_$table_id .switch-candy-blue {";
                    $returnstring .= "margin: 0;float: none;";
                    $returnstring .= "}";
                }
            } else if ($general_settings['arp_label_position_main'] == 1) {
                if ($general_settings['arp_toggle_main'] == 1) {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .simple-toggle-radio,";
                    $returnstring .= " .arp_price_table_$table_id .simple-toggle-radio {";
                    $returnstring .= "margin: auto;text-align:center;";
                    $returnstring .= "}";
                } else {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .switch-candy-blue,";
                    $returnstring .= " .arp_price_table_$table_id .switch-candy-blue {";
                    $returnstring .= "margin: auto;float: none;";
                    $returnstring .= "}";
                }
            } else if ($general_settings['arp_label_position_main'] == 2) {
                if ($general_settings['arp_toggle_main'] == 1) {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .simple-toggle-radio,";
                    $returnstring .= " .arp_price_table_$table_id .simple-toggle-radio {";
                    $returnstring .= "margin: 0;text-align:right;";
                    $returnstring .= "}";
                } else {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .switch-candy-blue,";
                    $returnstring .= " .arp_price_table_$table_id .switch-candy-blue {";
                    $returnstring .= "margin: 0;float: right;";
                    $returnstring .= "}";
                }
            }

            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .toggle_button_title ,";
            $returnstring .= ".arp_price_table_$table_id .toggle_button_title {";

            $returnstring .= 'color: ' . $general_settings['toggle_title_font_color'] . ';';
            $returnstring .= 'font-family: ' . $general_settings['toggle_title_font_family'] . ';';
            $returnstring .= 'font-size:' . $general_settings['toggle_title_font_size'] . 'px;';
            if ($general_settings['toggle_title_font_style_bold'] == 'bold') {
                $returnstring .= 'font-weight: bold;';
            }
            if ($general_settings['toggle_title_font_style_italic'] == 'italic') {
                $returnstring .= 'font-style: italic;';
            }
            if ($general_settings['toggle_title_font_style_decoration'] == 'underline') {
                $returnstring .= 'text-decoration: underline;';
            } else if ($general_settings['toggle_title_font_style_decoration'] == 'line-through') {
                $returnstring .= 'text-decoration: line-through;';
            }

            $returnstring .= '}';

            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id #toggle_switch_2 label, .arp_price_table_$table_id #toggle_switch_3 label,";
            $returnstring .= ".arp_price_table_$table_id #toggle_switch_2 label, .arp_price_table_$table_id #toggle_switch_3 label{";

            $returnstring .= 'color: ' . $general_settings['toggle_button_font_color'] . ';';
            $returnstring .= 'font-family: ' . $general_settings['toggle_button_font_family'] . ';';
            $returnstring .= 'font-size:' . $general_settings['toggle_button_font_size'] . 'px;';
            if ($general_settings['toggle_button_font_style_bold'] == 'bold') {
                $returnstring .= 'font-weight: bold;';
            }
            if ($general_settings['toggle_button_font_style_italic'] == 'italic') {
                $returnstring .= 'font-style: italic;';
            }
            if ($general_settings['toggle_button_font_style_decoration'] == 'underline') {
                $returnstring .= 'text-decoration: underline;';
            } else if ($general_settings['toggle_button_font_style_decoration'] == 'line-through') {
                $returnstring .= 'text-decoration: line-through;';
            }

            $returnstring .= '}';
        }

        $min_row_height = isset( $general_column_settings['min_row_height'] ) ? $general_column_settings['min_row_height'] : 0;

        if( 0 < $min_row_height ){
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper ul.arppricingtablebodyoptions li:not(.arp_last_list_item){";
                $returnstring .= 'min-height:' . $min_row_height . 'px !important;';
            $returnstring .= "}";
        }

        
        $tablet_responsive_size = get_option('arp_tablet_responsive_size');
        $tablet_responsive_size += 1;

        $returnstring .= "@media ( min-width:" . $tablet_responsive_size . "px){";
        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper,";
        $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper{";
        $returnstring .= "width:" . $general_column_settings['all_column_width'] . "px;";
        $returnstring .= "}";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper,";
        $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper{";
        $returnstring .= "width:" . $general_column_settings['all_column_width'] . "px;";
        $returnstring .= "}";

        $mobile_responsive_size = get_option('arp_mobile_responsive_size');
        $display_mobile_col = $general_column_settings['display_col_mobile'];

        if ($display_mobile_col == 1 && $general_column_settings['is_responsive'] === '1') {
            $returnstring .= "@media (max-width:" . $mobile_responsive_size . "px){";
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper,";
            $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper{";
            $returnstring .= "width:100% !important;";
            $returnstring .= "}";
            $returnstring .= "}";
        }

        if ($reference_template == 'arptemplate_7' || $reference_template == 'arptemplate_5') {
            $returnstring .= "@media ( max-width:" . $mobile_responsive_size . "px){";
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_header_shortcode img,";
            $returnstring .= ".arptemplate_" . $table_id . " .arp_header_shortcode img,";
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .arp_header_shortcode iframe,";
            $returnstring .= ".arptemplate_" . $table_id . " .arp_header_shortcode iframe{";
            $returnstring .= "width:100% !important;";
            $returnstring .= "}";
            $returnstring .= "}";
        }

        if ($general_column_settings['hide_footer_global'] == 1) {
            $bottom_border_ary = $arprice_default_settings->arp_border_bottom();
            $btm_brd_tmp_ary = isset($bottom_border_ary[$reference_template]) ? $bottom_border_ary[$reference_template] : '';
            $caption_brd_btm = isset($btm_brd_tmp_ary['caption_column']) ? $btm_brd_tmp_ary['caption_column'] : '';
            $others_brd_btm = isset($btm_brd_tmp_ary['other_column']) ? $btm_brd_tmp_ary['other_column'] : '';

            if (is_array($caption_brd_btm) && !empty($caption_brd_btm)) {
                foreach ($caption_brd_btm as $class => $value) {

                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $class . ",";
                    $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $class . "{";
                    $returnstring .= "border-bottom:" . $value . " !important;";
                    $returnstring .= "}";
                }
            }

            if (is_array($others_brd_btm) && !empty($others_brd_btm)) {
                foreach ($others_brd_btm as $class => $value) {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) " . $class . ",";
                    $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) " . $class . "{";
                    $returnstring .= "border-bottom:" . $value . " !important";
                    $returnstring .= "}";
                }
            }
        }

        $hide_section_min_height_array = $arprice_default_settings->arprice_min_height_with_section_hide();
        $hide_section_min_height_array = isset($hide_section_min_height_array[$reference_template]) ? $hide_section_min_height_array[$reference_template] : array();

        if (isset($hide_section_min_height_array)) {
            
            if (isset($general_column_settings['hide_header_global']) && $general_column_settings['hide_header_global'] == '1') {
                if (isset($hide_section_min_height_array['arp_header']) && is_array($hide_section_min_height_array['arp_header'])) {
                    foreach ($hide_section_min_height_array['arp_header'] as $hide_class) {

                        if ($hide_class != '') {
                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . ",";
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                } else {
                    if (isset($hide_section_min_height_array['arp_header']) && $hide_section_min_height_array['arp_header'] != '') {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_header'] . ",";
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_header'] . "{";
                        $returnstring .= "min-height:0px !important;";
                        $returnstring .= "}";
                    }
                }

                $arp_hide_header_column_border_top = $arprice_default_settings->arp_hide_header_column_border_top();
                $arp_hide_header_column_border_top = isset($arp_hide_header_column_border_top[$reference_template]) ? $arp_hide_header_column_border_top[$reference_template] : array();

                if (isset($arp_hide_header_column_border_top)) {
                    foreach ($arp_hide_header_column_border_top as $class => $css_value) {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $class . ",";
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $class . "{";
                        foreach ($css_value as $properties => $properties_value) {
                            $returnstring .= $properties . ':' . $properties_value . ';';
                        }
                        $returnstring .= "}";
                    }
                }
            }
            
            
            if (isset($general_column_settings['hide_header_shortcode_global']) && $general_column_settings['hide_header_shortcode_global'] == '1') {

                if (isset($hide_section_min_height_array['arp_header_shortcode']) && is_array($hide_section_min_height_array['arp_header_shortcode'])) {

                    foreach ($hide_section_min_height_array['arp_header_shortcode'] as $hide_class) {
                        if ($hide_class != '') {
                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . ",";
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                } else {
                    if (isset($hide_section_min_height_array['arp_header_shortcode']) && $hide_section_min_height_array['arp_header_shortcode'] != '') {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_header_shortcode'] . ",";
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_header_shortcode'] . "{";
                        $returnstring .= "min-height:0px !important;";
                        $returnstring .= "}";
                    }
                }
                if ($reference_template == 'arptemplate_7') {
                    $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) .arppricetablecolumntitle,";
                    $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) .arppricetablecolumntitle{";
                    $returnstring .= "margin-top:0px !important;";
                    $returnstring .= "}";
                }
            }
            
            
            if (isset($general_column_settings['hide_feature_global']) && $general_column_settings['hide_feature_global'] == '1') {
                if (isset( $hide_section_min_height_array['arp_feature'] ) && is_array($hide_section_min_height_array['arp_feature'])) {

                    foreach ($hide_section_min_height_array['arp_feature'] as $hide_class) {
                        if ($hide_class != '') {
                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . ",";
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                } else {
                    if (isset($hide_section_min_height_array['arp_feature']) && '' != $hide_section_min_height_array['arp_feature'] ) {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_feature'] . ",";
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_feature'] . "{";
                        $returnstring .= "min-height:0px !important;";
                        $returnstring .= "}";
                    }
                }
            }
            
            

            if (isset($general_column_settings['hide_price_global']) && $general_column_settings['hide_price_global'] == '1') {
                if (isset($hide_section_min_height_array['arp_price']) && is_array($hide_section_min_height_array['arp_price'])) {

                    foreach ($hide_section_min_height_array['arp_price'] as $hide_class) {

                        if ($hide_class != '') {
                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . ",";
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                            if($hide_class == '.arpcaptiontitle'){
                                $returnstring .= "min-height:80px !important;";
                            } else {
                                $returnstring .= "min-height:0px !important;";
                            }
                            $returnstring .= "}";
                        }
                    }
                } else {
                    if (isset($hide_section_min_height_array['arp_price']) && $hide_section_min_height_array['arp_price'] != '') {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_price'] . ",";
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_price'] . "{";
                        if($hide_section_min_height_array['arp_price'] == '.arpcaptiontitle'){
                            $returnstring .= "min-height:80px !important;";
                        } else {
                            $returnstring .= "min-height:0px !important;";
                        }
                        $returnstring .= "}";
                    }
                }

                $arp_hide_price_css_fixes = $arprice_default_settings->arp_hide_price_css_fixes();
                $arp_hide_price_css_fixes = isset($arp_hide_price_css_fixes[$reference_template]) ? $arp_hide_price_css_fixes[$reference_template] : array();

                if (isset($arp_hide_price_css_fixes)) {
                    foreach ($arp_hide_price_css_fixes as $class => $css_value) {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $class . ",";
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $class . "{";
                        foreach ($css_value as $properties => $properties_value) {
                            $returnstring .= $properties . ':' . $properties_value . ';';
                        }
                        $returnstring .= "}";
                    }
                }
            }
            
            
            if (isset($general_column_settings['hide_description_global']) && $general_column_settings['hide_description_global'] == '1') {
                if (isset($hide_section_min_height_array['arp_description'])) {
                    if (is_array($hide_section_min_height_array['arp_description'])) {

                        foreach ($hide_section_min_height_array['arp_description'] as $hide_class) {
                            if ($hide_class != '') {
                                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . ",";
                                $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                                $returnstring .= "min-height:0px !important;";
                                $returnstring .= "}";
                            }
                        }
                    } else {
                        if (isset($hide_section_min_height_array['arp_description']) && $hide_section_min_height_array['arp_description'] != '') {

                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_description'] . ",";
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_description'] . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                }
                $arp_hide_description_css_fixes = $arprice_default_settings->arp_hide_description_css_fixes();
                $arp_hide_description_css_fixes = isset($arp_hide_description_css_fixes[$reference_template]) ? ($arp_hide_description_css_fixes[$reference_template]) : '';

                if (isset($arp_hide_description_css_fixes) && !empty($arp_hide_description_css_fixes)) {
                    foreach ($arp_hide_description_css_fixes as $class => $css_value) {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $class . ",";
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $class . "{";
                        foreach ($css_value as $properties => $properties_value) {
                            $returnstring .= $properties . ':' . $properties_value . ';';
                        }
                        $returnstring .= "}";
                    }
                }
            }
            
            
            if (isset($general_column_settings['hide_footer_global']) && $general_column_settings['hide_footer_global'] == '1') {
                if (isset( $hide_section_min_height_array['arp_footer']) && is_array($hide_section_min_height_array['arp_footer'])) {

                    foreach ($hide_section_min_height_array['arp_footer'] as $hide_class) {
                        if ($hide_class != '') {
                            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . ",";
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                } else {
                    if (isset($hide_section_min_height_array['arp_footer']) && '' != $hide_section_min_height_array['arp_footer'] ) {
                        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_footer'] . ",";
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_footer'] . "{";
                        $returnstring .= "min-height:0px !important;";
                        $returnstring .= "}";
                    }
                }
            }
            
        }

        if (isset($arp_mainoptionsarr['general_options']['template_options']['features'][$reference_template]['button_border_customization']) && $arp_mainoptionsarr['general_options']['template_options']['features'][$reference_template]['button_border_customization'] == 1) {
            if (isset($general_column_settings['global_button_border_color']) && $general_column_settings['global_button_border_color'] != '') {
                $general_column_settings['global_button_border_color'] = $general_column_settings['global_button_border_color'];
            } else {
                $general_column_settings['global_button_border_color'] = '#c9c9c9';
            }

            if (isset($general_column_settings['global_button_border_width']) && $general_column_settings['global_button_border_width'] != '') {
                $general_column_settings['global_button_border_width'] = $general_column_settings['global_button_border_width'];
            } else {
                $general_column_settings['global_button_border_width'] = 0;
            }

            if (isset($general_column_settings['global_button_border_type']) && $general_column_settings['global_button_border_type'] != '') {
                $general_column_settings['global_button_border_type'] = $general_column_settings['global_button_border_type'];
            } else {
                $general_column_settings['global_button_border_type'] = 'solid';
            }

            if (isset($general_column_settings['global_button_border_radius_top_left']) && $general_column_settings['global_button_border_radius_top_left'] != '') {
                $general_column_settings['global_button_border_radius_top_left'] = $general_column_settings['global_button_border_radius_top_left'];
            } else {
                $general_column_settings['global_button_border_radius_top_left'] = 0;
            }

            if (isset($general_column_settings['global_button_border_radius_top_right']) && $general_column_settings['global_button_border_radius_top_right'] != '') {
                $general_column_settings['global_button_border_radius_top_right'] = $general_column_settings['global_button_border_radius_top_right'];
            } else {
                $general_column_settings['global_button_border_radius_top_right'] = 0;
            }
            if (isset($general_column_settings['global_button_border_radius_bottom_left']) && $general_column_settings['global_button_border_radius_bottom_left'] != '') {
                $general_column_settings['global_button_border_radius_bottom_left'] = $general_column_settings['global_button_border_radius_bottom_left'];
            } else {
                $general_column_settings['global_button_border_radius_bottom_left'] = 0;
            }

            if (isset($general_column_settings['global_button_border_radius_bottom_right']) && $general_column_settings['global_button_border_radius_bottom_right'] != '') {
                $general_column_settings['global_button_border_radius_bottom_right'] = $general_column_settings['global_button_border_radius_bottom_right'];
            } else {
                $general_column_settings['global_button_border_radius_bottom_right'] = '0';
            }


            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .bestPlanButton,";
            $returnstring .= ".arptemplate_" . $table_id . " .bestPlanButton{";
            $returnstring .= 'border :' . $general_column_settings['global_button_border_width'] . 'px ' . $general_column_settings['global_button_border_type'] . ' ' . $general_column_settings['global_button_border_color'] . ';';
            $returnstring .= 'border-radius :' . $general_column_settings['global_button_border_radius_top_left'] . 'px ' . $general_column_settings['global_button_border_radius_top_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_left'] . 'px;';
            $returnstring .= '-webkit-border-radius :' . $general_column_settings['global_button_border_radius_top_left'] . 'px ' . $general_column_settings['global_button_border_radius_top_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_left'] . 'px;';
            $returnstring .= '-moz-border-radius :' . $general_column_settings['global_button_border_radius_top_left'] . 'px ' . $general_column_settings['global_button_border_radius_top_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_left'] . 'px;';
            $returnstring .= '-o-border-radius :' . $general_column_settings['global_button_border_radius_top_left'] . 'px ' . $general_column_settings['global_button_border_radius_top_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_left'] . 'px;';
            $returnstring .= "}";
        }

        if ($reference_template == 'arptemplate_20' || $reference_template == "arptemplate_7" || $reference_template == 'arptemplate_24') {
            $tol_bottom_border_style = " border-top-style:";
            $tol_bottom_border_width = " border-top-width:";
            $tol_bottom_border_color = " border-top-color:";
        } else {
            $tol_bottom_border_style = " border-bottom-style:";
            $tol_bottom_border_width = " border-bottom-width:";
            $tol_bottom_border_color = " border-bottom-color:";
        }

        $arp_row_level_border_fixer = $arprice_default_settings->arp_row_level_border();
        $arp_row_level_border_fixer = isset($arp_row_level_border_fixer[$reference_template]) ? $arp_row_level_border_fixer[$reference_template] : array();
        

        $general_column_settings['arp_row_border_type'] = isset($general_column_settings['arp_row_border_type']) ? $general_column_settings['arp_row_border_type'] : '';
        $general_column_settings['arp_row_border_size'] = isset($general_column_settings['arp_row_border_size']) ? $general_column_settings['arp_row_border_size'] : '';
        $general_column_settings['arp_row_border_color'] = isset($general_column_settings['arp_row_border_color']) ? $general_column_settings['arp_row_border_color'] : '';

        
        $general_column_settings['arp_caption_row_border_style'] = isset($general_column_settings['arp_caption_row_border_style']) ? $general_column_settings['arp_caption_row_border_style'] : '';
        $general_column_settings['arp_caption_row_border_size'] = isset($general_column_settings['arp_caption_row_border_size']) ? $general_column_settings['arp_caption_row_border_size'] : '';
        $general_column_settings['arp_caption_row_border_color'] = isset($general_column_settings['arp_caption_row_border_color']) ? $general_column_settings['arp_caption_row_border_color'] : '';
        

        
        if (isset($template_feature['button_position']) && $template_feature['button_position'] != 'default' && $reference_template != 'arptemplate_7') {
            $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id:not(.arp_admin_template_editor) .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li:not(:nth-last-child(-n+2)),#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id:not(.arp_admin_template_editor) .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li:last-child,#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id.arp_admin_template_editor .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li,";
            $returnstring .= " .arp_price_table_$table_id:not(.arp_admin_template_editor) .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li:not(:nth-last-child(-n+2)),.arp_price_table_$table_id:not(.arp_admin_template_editor) .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li:last-child,.arp_price_table_$table_id.arp_admin_template_editor .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li";
        } else {
            $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li,";
            $returnstring .= " .arp_price_table_$table_id .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li";
        }
        $returnstring .= "{";
        
        if(isset($general_column_settings['arp_row_border_size']) && $general_column_settings['arp_row_border_size']!=''){
            $returnstring .= "$tol_bottom_border_width " . $general_column_settings['arp_row_border_size'] . "px;";
            if(isset($general_column_settings['arp_row_border_type']) && $general_column_settings['arp_row_border_type']!=''){
	            $returnstring .= "$tol_bottom_border_style " . $general_column_settings['arp_row_border_type'] . ";";    
	        }
	        if(isset($general_column_settings['arp_row_border_color']) && $general_column_settings['arp_row_border_color']!=''){
	            $returnstring .= "$tol_bottom_border_color " . $general_column_settings['arp_row_border_color'] . ";";    
	        }
        }
        $returnstring .= " }";


        
        $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .ArpPricingTableColumnWrapper.maincaptioncolumn .planContainer .arppricingtablebodycontent ul li,";
        $returnstring .= " .arp_price_table_$table_id .ArpPricingTableColumnWrapper.maincaptioncolumn .planContainer .arppricingtablebodycontent ul li";
        $returnstring .= "{";
        
        if(isset($general_column_settings['arp_row_border_size']) && $general_column_settings['arp_row_border_size']!=''){
            $returnstring .= "$tol_bottom_border_width " . $general_column_settings['arp_row_border_size'] . "px;";    
            if(isset($general_column_settings['arp_row_border_type']) && $general_column_settings['arp_row_border_type']!=''){
	            $returnstring .= "$tol_bottom_border_style " . $general_column_settings['arp_row_border_type'] . ";";    
	        }
	        if(isset($general_column_settings['arp_caption_row_border_color']) && $general_column_settings['arp_caption_row_border_color']!=''){
	            $returnstring .= "$tol_bottom_border_color " . $general_column_settings['arp_caption_row_border_color'] . ";";    
	        }
        }
        $returnstring .= " }";
        


        if (is_array($arp_row_level_border_fixer)) {
            foreach ($arp_row_level_border_fixer as $css_fixer) {

                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer " . $css_fixer[0].",";
                $returnstring .= ".arp_price_table_$table_id .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer " . $css_fixer[0];
                $returnstring .= "{";
                $returnstring .= "$css_fixer[1]: " . $general_column_settings['arp_row_border_size'] . "px " . $general_column_settings['arp_row_border_type'] . " " . $general_column_settings['arp_row_border_color'] . ";";
                $returnstring .= " }";

                
                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .ArpPricingTableColumnWrapper.maincaptioncolumn .planContainer " . $css_fixer[0].",";
                $returnstring .= ".arp_price_table_$table_id .ArpPricingTableColumnWrapper.maincaptioncolumn .planContainer " . $css_fixer[0];
                $returnstring .= "{";
                $returnstring .= "$css_fixer[1]: " . $general_column_settings['arp_row_border_size'] . "px " . $general_column_settings['arp_row_border_type'] . " " . $general_column_settings['arp_caption_row_border_color'] . ";";
                $returnstring .= " }";
                
            }
        }

        $arp_row_level_border_remove_from_last_child = $arprice_default_settings->arp_row_level_border_remove_from_last_child();
        if (in_array($reference_template, $arp_row_level_border_remove_from_last_child)) {

            $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id .ArpPricingTableColumnWrapper .planContainer .arppricingtablebodycontent ul li:last-child{border-bottom:none;}";
            $returnstring .= " .arp_price_table_$table_id .ArpPricingTableColumnWrapper .planContainer .arppricingtablebodycontent ul li:last-child{border-bottom:none;}";
            if ($reference_template == 'arptemplate_8' || $reference_template == 'arptemplate_10' || $reference_template == 'arptemplate_11' || $reference_template == 'arptemplate_14') {
                $returnstring .= " #ArpTemplate_main.arp_front_main_container .arp_price_table_$table_id:not(.arp_admin_template_editor) .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li:nth-last-child(-n+2){border-bottom:none;}";
                $returnstring .= " .arp_price_table_$table_id:not(.arp_admin_template_editor) .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li:nth-last-child(-n+2){border-bottom:none;}";
            }
        }

        
        $arp_border_css_class = $arprice_default_settings->arp_column_border_array();
        $arp_border_css_class = $arp_border_css_class[$reference_template];

        $border_size = isset($general_column_settings['arp_column_border_size']) ? $general_column_settings['arp_column_border_size'] : '0';
        $border_type = isset($general_column_settings['arp_column_border_type']) ? $general_column_settings['arp_column_border_type'] : 'solid';

        $left_size_border = isset($general_column_settings['arp_column_border_left']) ? $general_column_settings['arp_column_border_left'] : '';
        $right_size_border = isset($general_column_settings['arp_column_border_right']) ? $general_column_settings['arp_column_border_right'] : '';
        $top_size_border = isset($general_column_settings['arp_column_border_top']) ? $general_column_settings['arp_column_border_top'] : '';
        $bottom_size_border = isset($general_column_settings['arp_column_border_bottom']) ? $general_column_settings['arp_column_border_bottom'] : '';

        $border_color = isset($general_column_settings['arp_column_border_color']) ? $general_column_settings['arp_column_border_color'] : '#c9c9c9';



        $caption_border_color = isset($general_column_settings['arp_caption_border_color']) ? $general_column_settings['arp_caption_border_color'] : '#c9c9c9';
        $caption_border_size = isset($general_column_settings['arp_caption_border_size']) ? $general_column_settings['arp_caption_border_size'] : '0';
        $arp_caption_border_style = isset($general_column_settings['arp_caption_border_style']) ? $general_column_settings['arp_caption_border_style'] : 'solid';

        $caption_left_size_border = isset($general_column_settings['arp_caption_border_left']) ? $general_column_settings['arp_caption_border_left'] : '';
        $caption_right_size_border = isset($general_column_settings['arp_caption_border_right']) ? $general_column_settings['arp_caption_border_right'] : '';
        $caption_top_size_border = isset($general_column_settings['arp_caption_border_top']) ? $general_column_settings['arp_caption_border_top'] : '';
        $caption_bottom_size_border = isset($general_column_settings['arp_caption_border_bottom']) ? $general_column_settings['arp_caption_border_bottom'] : '';


        if ($border_size != '0' && $left_size_border != '' && isset($arp_border_css_class['left'])) {
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['left'] . ",";
            $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['left'] . "{";
            $returnstring .= 'border-left :' . $border_size . 'px ' . $border_type . ' ' . $border_color . ';';
            $returnstring .= "}";
        }
        if ($border_size != '0' && $right_size_border != '' && isset($arp_border_css_class['right'])) {
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['right'] . ",";
            $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['right'] . "{";
            $returnstring .= 'border-right :' . $border_size . 'px ' . $border_type . ' ' . $border_color . ';';
            $returnstring .= "}";
        }
        if ($border_size != '0' && $top_size_border != '' && isset($arp_border_css_class['top'])) {
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['top'] . ",";
            $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['top'] . "{";
            $returnstring .= 'border-top :' . $border_size . 'px ' . $border_type . ' ' . $border_color . ';';
            $returnstring .= "}";
        }
        if ($border_size != '0' && $bottom_size_border != '' && isset($arp_border_css_class['bottom'])) {
            $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['bottom'] . ",";
            $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['bottom'] . "{";
            $returnstring .= 'border-bottom :' . $border_size . 'px ' . $border_type . ' ' . $border_color . ';';
            $returnstring .= "}";
        }




        
        if ($caption_border_size != '0' && $caption_left_size_border != '' && isset($arp_border_css_class['left'])) {

            $cap_border_left = explode(",", $arp_border_css_class['caption_border_all']['left']);
            foreach ($cap_border_left as $value_left) {
                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_left . ",";
                $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_left . "{";
                $returnstring .= 'border-left :' . $caption_border_size . 'px ' . $arp_caption_border_style . ' ' . $caption_border_color . ';';
                $returnstring .= "}";
            }
        }

        if ($caption_border_size != '0' && $caption_right_size_border != '' && isset($arp_border_css_class['right'])) {

            $cap_border_right = explode(",", $arp_border_css_class['caption_border_all']['right']);
            foreach ($cap_border_right as $value_right) {
                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_right . ",";
                $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_right . "{";
                $returnstring .= 'border-right :' . $caption_border_size . 'px ' . $arp_caption_border_style . ' ' . $caption_border_color . ';';
                $returnstring .= "}";
            }
        }

        if ($caption_border_size != '0' && $caption_top_size_border != '' && isset($arp_border_css_class['top'])) {

            $cap_border_top = explode(",", $arp_border_css_class['caption_border_all']['top']);
            foreach ($cap_border_top as $value_top) {
                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_top . ",";
                $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_top . "{";
                $returnstring .= 'border-top :' . $caption_border_size . 'px ' . $arp_caption_border_style . ' ' . $caption_border_color . ';';
                $returnstring .= "}";
            }
        }

        if ($caption_border_size != '0' && $caption_bottom_size_border != '' && isset($arp_border_css_class['bottom'])) {

            $cap_border_bottom = explode(",", $arp_border_css_class['caption_border_all']['bottom']);
            foreach ($cap_border_bottom as $value_bottom) {
                $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_bottom . ",";
                $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_bottom . "{";
                $returnstring .= 'border-bottom :' . $caption_border_size . 'px ' . $arp_caption_border_style . ' ' . $caption_border_color . ';';
                $returnstring .= "}";
            }
        }

        $loader_bg_color = isset($general_option['custom_skin_colors']['arp_analytics_bgcolor']) ? $general_option['custom_skin_colors']['arp_analytics_bgcolor'] : '#39434D';
        $loader_tx_color = isset($general_option['custom_skin_colors']['arp_analytics_forgcolor']) ? $general_option['custom_skin_colors']['arp_analytics_forgcolor'] : '#F5F5F5';

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_".$table_id." .arp_template_loader_continer .arp_template_loader_wrapper{";
            $loader_bg_colors = $this->hex2rgb($loader_bg_color);
            $returnstring .= "background:rgba(".$loader_bg_colors['red'].",".$loader_bg_colors['green'].",".$loader_bg_colors['blue'].",0.5);";
        $returnstring .= "}";

        $returnstring .= "#ArpTemplate_main.arp_front_main_container .arptemplate_".$table_id." .arp_template_loader_continer .arp_template_loader_div{";
            $rgbcol = $this->hex2rgb($loader_tx_color);

            $is_light = $this->arp_is_light_color($rgbcol);
            if( $is_light ){
                $returnstring .= "border-color:".$this->arp_generate_color_tone($loader_tx_color,-25).";";
            } else {
                $returnstring .= "border-color:rgba(".$rgbcol['red'].",".$rgbcol['green'].",".$rgbcol['blue'].",0.3);";
            }
            $returnstring .= "border-top-color:".$loader_tx_color.";";
        $returnstring .= "}";

        return $returnstring;
    }

    function get_ribbon_type($ribbontext = 0) {
        if (!$ribbontext) {
            return;
        }

        if (preg_match('/_1/i', $ribbontext)) {
            return 'arpribbon_1 arp_' . $ribbontext;
        } else if (preg_match('/_2/i', $ribbontext)) {
            return 'arpribbon_2 arp_' . $ribbontext;
        } else if (preg_match('/_3/i', $ribbontext)) {
            return 'arpribbon_3 arp_' . $ribbontext;
        } else if (preg_match('/_4/i', $ribbontext)) {
            return 'arpribbon_4 arp_' . $ribbontext;
        } else if (preg_match('/_5/i', $ribbontext)) {
            return 'arpribbon_5 arp_' . $ribbontext;
        } else if (preg_match('/_6/i', $ribbontext)) {
            return 'arpribbon_6 arp_' . $ribbontext;
        }
    }

    function get_preview_table($values) {
	    global $wpdb, $arp_mainoptionsarr, $arp_pricingtable;

	    $table_id = intval( $values['table_id'] );

	    $sql = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d", $table_id));

	    $is_template = $sql[0]->is_template;
	    $template_name = $sql[0]->template_name;
	    $is_animated = $sql[0]->is_animated;

	    $main_table_title = stripslashes_deep( sanitize_text_field( $values['pricing_table_main'] ) );

	    $all_columns_data = json_decode( $values['arp_table_data'], true );
        
	    $column = array();

	    $arp_allowed_html = $arp_pricingtable->arprice_allowed_html_tags();

	    $total = intval( $values['added_package'] );

	    $template = stripslashes_deep( sanitize_text_field( $values['arp_template'] ) );
	    $template_skin = stripslashes_deep( sanitize_text_field( $values['arp_template_skin_editor'] ) );
	    $template_type = stripslashes_deep( sanitize_text_field( $values['arp_template_type'] ) );
	    $arp_template_custom_color = isset($values['arp_custom_color_code']) ? sanitize_text_field( $values['arp_custom_color_code'] ) : '';
	    $template_feature = maybe_serialize(json_decode(stripslashes($values['template_feature']), true));

	    $template_setting = array('template' => $template, 'skin' => $template_skin, 'template_type' => $template_type, 'template_feature' => $template_feature, 'custom_color_code' => $arp_template_custom_color);


	    $custom_css = isset($values['arp_custom_css']) ? stripslashes_deep(sanitize_text_field($values['arp_custom_css'])) : '';
	    $enable_toggle_price = (isset($values['enable_toggle_price']) and intval( $values['enable_toggle_price'] ) == 1) ? 1 : 0;
	    $toggle_copy_data_to_other_step = (isset($_POST['toggle_copy_data_to_other_step']) and intval( $_POST['toggle_copy_data_to_other_step'] ) == 1) ? 1 : 0;
	    $step_options_main = isset($values['step_options_main']) ? intval( $values['step_options_main'] ) : '';
	    $toggle_button_verticle_space = isset($values['toggle_button_verticle_space']) ? intval( $values['toggle_button_verticle_space'] ) : '40';
	    
	    $togglestep_yearly = isset($values['togglestep_yearly']) ? stripslashes_deep( sanitize_text_field( $values['togglestep_yearly'] ) ) : '';
	    $togglestep_monthly = isset($values['togglestep_monthly']) ? stripslashes_deep( sanitize_text_field( $values['togglestep_monthly'] ) ) : '';
	    $togglestep_quarterly = isset($values['togglestep_quarterly']) ? stripslashes_deep( sanitize_text_field( $values['togglestep_quarterly'] ) ) : '';
	    $togglestep_weekly = isset($values['togglestep_weekly']) ? stripslashes_deep( sanitize_text_field( $values['togglestep_weekly'] ) ) : '';
	    $togglestep_daily = isset($values['togglestep_daily']) ? stripslashes_deep( sanitize_text_field( $values['togglestep_daily'] ) ) : '';
        $togglestep_step6 = isset($values['togglestep_step6']) ? stripslashes_deep( sanitize_text_field( $values['togglestep_step6'] ) ) : '';
        $togglestep_step7 = isset($values['togglestep_step7']) ? stripslashes_deep( sanitize_text_field( $values['togglestep_step7'] ) ) : '';
        $togglestep_step8 = isset($values['togglestep_step8']) ? stripslashes_deep( sanitize_text_field( $values['togglestep_step8'] ) ) : '';

	    $setas_default_toggle = isset($values['setas_default_toggle']) ? stripslashes_deep( intval( $values['setas_default_toggle'] ) ) : '';
	    $toggle_option_main = isset($values['toggle_option_main']) ? intval( $values['toggle_option_main'] ) : '';
	    $toggle_options_mobile_view = isset($values['toggle_options_mobile_view']) ? intval( $values['toggle_options_mobile_view'] ) : '';
	    $toggle_active_color = isset($values['toggle_active_color']) ? stripslashes_deep( sanitize_text_field( $values['toggle_active_color'] ) ) : '';
	    $toggle_active_text_color = isset($values['toggle_active_text_color']) ? stripslashes_deep( sanitize_text_field( $values['toggle_active_text_color'] ) ) : '';
	    $toggle_inactive_color = isset($values['toggle_inactive_color']) ? stripslashes_deep( sanitize_text_field( $values['toggle_inactive_color'] ) ) : '';
	    $toggle_label_content = isset($values['toggle_label_content']) ? stripslashes_deep( sanitize_text_field( $values['toggle_label_content'] ) ) : '';
	    $label_position_main = isset($values['label_position_main']) ? stripslashes_deep( intval( $values['label_position_main'] ) ) : '';
	    $toggle_main_color = isset($values['toggle_main_color']) ? stripslashes_deep( sanitize_text_field( $values['toggle_main_color'] ) ) : '';
	    $toggle_title_font_family = isset($values['toggle_title_font_family']) ? sanitize_text_field( $values['toggle_title_font_family'] ) : '';
	    $toggle_title_font_size = isset($values['toggle_title_font_size']) ? intval( $values['toggle_title_font_size'] ) : '';
	    $toggle_title_font_color = isset($values['toggle_title_font_color']) ? stripslashes_deep( sanitize_text_field( $values['toggle_title_font_color'] ) ) : '';
	    $toggle_title_font_style_bold = isset($values['toggle_title_font_style_bold']) ? sanitize_text_field( $values['toggle_title_font_style_bold'] ) : '';
	    $toggle_title_font_style_italic = isset($values['toggle_title_font_style_italic']) ? sanitize_text_field( $values['toggle_title_font_style_italic'] ) : '';
	    $toggle_title_font_style_decoration = isset($values['toggle_title_font_style_decoration']) ? sanitize_text_field( $values['toggle_title_font_style_decoration'] ) : '';
	    $toggle_button_font_family = isset($values['toggle_button_font_family']) ? sanitize_text_field( $values['toggle_button_font_family'] ) : '';
	    $toggle_button_font_size = isset($values['toggle_button_font_size']) ? intval( $values['toggle_button_font_size'] ) : '';
	    $toggle_button_font_color = isset($values['toggle_button_font_color']) ? stripslashes_deep( sanitize_text_field( $values['toggle_button_font_color'] ) ) : '';
	    $toggle_button_font_style_bold = isset($values['toggle_button_font_style_bold']) ? sanitize_text_field( $values['toggle_button_font_style_bold'] ) : '';
	    $toggle_button_font_style_italic = isset($values['toggle_button_font_style_italic']) ? sanitize_text_field( $values['toggle_button_font_style_italic'] ) : '';
	    $toggle_button_font_style_decoration = isset($values['toggle_button_font_style_decoration']) ? sanitize_text_field( $values['toggle_button_font_style_decoration'] ) : '';



	    $column_order = isset($values['pricing_table_column_order']) ? stripslashes_deep( sanitize_text_field( $values['pricing_table_column_order'] ) ) : '';

	    $column_ord = str_replace('\'', '"', $column_order);
	    $col_ord_arr = json_decode($column_ord, true);

	    if ($values['has_caption_column'] == 1 and ! in_array('main_column_0', $col_ord_arr)) {
	        array_unshift($col_ord_arr, 'main_column_0');
	    }
	    $new_id = array();


	    if (is_array($col_ord_arr) and count($col_ord_arr) > 0) {
	        foreach ($col_ord_arr as $key => $value) {
	            $new_id[$key] = str_replace('main_column_', '', $value);
	        }
	    }

	    $column_order = json_encode($col_ord_arr);

	    $total = ( isset($new_id) && is_array($new_id) ) ? count($new_id) : 0;

	    if( $total > 0 ){
	        $total = max($new_id);
	    }

	    if( $total == 0 && count($new_id) == 1 ){
	        $total = 1;
	    }

	    $reference_template = $values['arp_reference_template'];


	    $user_edited_columns = json_decode(stripslashes_deep(isset($values['arp_user_edited_columns'])) ? $values['arp_user_edited_columns'] : '', true);

	    $general_settings = array('arp_custom_css' => $custom_css,
	        'column_order' => $column_order,
	        'reference_template' => $reference_template,
	        'user_edited_columns' => $user_edited_columns,
	        'enable_toggle_price' => $enable_toggle_price,
	        'toggle_copy_data_to_other_step' => $toggle_copy_data_to_other_step,
	        'arp_step_main' => $step_options_main,
	        'toggle_button_verticle_space' => $toggle_button_verticle_space,
	        'togglestep_yearly' => $togglestep_yearly,
	        'togglestep_monthly' => $togglestep_monthly,
	        'togglestep_quarterly' => $togglestep_quarterly,
	        'togglestep_weekly' => $togglestep_weekly,
	        'togglestep_daily' => $togglestep_daily,
            'togglestep_step6' => $togglestep_step6,
            'togglestep_step7' => $togglestep_step7,
            'togglestep_step8' => $togglestep_step8,
	        'setas_default_toggle' => $setas_default_toggle,
	        'arp_toggle_main' => $toggle_option_main,
	        'toggle_mobile_style' => $toggle_options_mobile_view,
	        'toggle_active_color' => $toggle_active_color,
	        'toggle_active_text_color' => $toggle_active_text_color,
	        'toggle_inactive_color' => $toggle_inactive_color,
	        'toggle_label_content' => $toggle_label_content,
	        'arp_label_position_main' => $label_position_main,
	        'toggle_main_color' => $toggle_main_color,
	        'toggle_title_font_family' => $toggle_title_font_family,
	        'toggle_title_font_size' => $toggle_title_font_size,
	        'toggle_title_font_color' => $toggle_title_font_color,
	        'toggle_title_font_style_bold' => $toggle_title_font_style_bold,
	        'toggle_title_font_style_italic' => $toggle_title_font_style_italic,
	        'toggle_title_font_style_decoration' => $toggle_title_font_style_decoration,
	        'toggle_button_font_family' => $toggle_button_font_family,
	        'toggle_button_font_size' => $toggle_button_font_size,
	        'toggle_button_font_color' => $toggle_button_font_color,
	        'toggle_button_font_style_bold' => $toggle_button_font_style_bold,
	        'toggle_button_font_style_italic' => $toggle_button_font_style_italic,
	        'toggle_button_font_style_decoration' => $toggle_button_font_style_decoration
	    );

	    global $arp_pricingtable;

	    $total_tabs = $arp_pricingtable->arp_toggle_step_name();

	    foreach($total_tabs as $key => $tab_name){

	        $general_settings[$tab_name[1]] = isset($values[$tab_name[1]]) ? $values[$tab_name[1]] : '';

	    }

	    $button_shadow_clr = isset($values['button_shadow_color']) ? sanitize_text_field( $values['button_shadow_color'] ) : '';
	    $button_radius = isset($values['button_radius']) ? intval( $values['button_radius'] ) : '';

	    $header_font_setting = array('font_family' => array(), 'font_size' => array(), 'font_color' => array(), 'font_style' => array());
	    $price_font_setting = array('font_family' => array(), 'font_size' => array(), 'font_color' => array(), 'font_style' => array());
	    $price_text_font_setting = array('font_family' => array(), 'font_size' => array(), 'font_color' => array(), 'font_style' => array());
	    $content_font_setting = array('font_family' => array(), 'font_size' => array(), 'font_color' => array(), 'font_style' => array());
	    $button_font_setting = array('font_family' => array(), 'font_size' => array(), 'font_color' => array(), 'font_style' => array());
	    $button_settings = array('button_shadow_color' => $button_shadow_clr, 'button_radius' => $button_radius);

	    $font_setting = array('header_fonts' => $header_font_setting, 'price_fonts' => $price_font_setting, 'price_text_fonts' => $price_text_font_setting, 'content_fonts' => $content_font_setting, 'button_fonts' => $button_font_setting);

	    
	    $column_space = isset($values['column_space']) ? intval( $values['column_space'] ) : '';
        $min_row_height = isset( $values['min_row_height'] ) ? intval( $values['min_row_height'] ) : '';
	    $hover_highlight = isset($values['column_high_on_hover']) ? stripslashes_deep( sanitize_text_field( $values['column_high_on_hover'] ) ) : '';
	    $is_responsive = isset($values['is_responsive']) ? intval( $values['is_responsive'] ) : '';
	    
	    $all_column_width = isset($values['all_column_width']) ? intval( $values['all_column_width'] ) : '';

	    $arp_row_border_size = isset($values['arp_row_border_size']) ? intval( $values['arp_row_border_size'] ) : 0;
	    $arp_row_border_type = isset($values['arp_row_border_type']) ? stripslashes_deep( sanitize_text_field( $values['arp_row_border_type'] ) ) : '';
	    $arp_row_border_color = isset($values['arp_row_border_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_row_border_color'] ) ) : '';

	    $arp_caption_row_border_size = isset($values['arp_caption_row_border_size']) ? intval( $values['arp_caption_row_border_size'] ) : '';
	    $arp_caption_row_border_style = isset($values['arp_caption_row_border_style']) ? stripslashes_deep( sanitize_text_field( $values['arp_caption_row_border_style'] ) ) : '';
	    $arp_caption_row_border_color = '';

        $arp_column_border_size = isset($values['arp_column_border_size']) ? intval($values['arp_column_border_size']) : '';
	    $arp_column_border_type = isset($values['arp_column_border_type']) ? $values['arp_column_border_type'] : '';
	    $arp_column_border_color = isset($values['arp_column_border_color']) ? $values['arp_column_border_color'] : '';

        $arp_column_border_left = isset($values['arp_column_border_left']) ? intval($values['arp_column_border_left']) : '';
        $arp_column_border_right = isset($values['arp_column_border_right']) ? intval($values['arp_column_border_right']) : '';
        $arp_column_border_top = isset($values['arp_column_border_top']) ? intval($values['arp_column_border_top']) : '';
        $arp_column_border_bottom = isset($values['arp_column_border_bottom']) ? intval($values['arp_column_border_bottom']) : '';
	    
	    $arp_caption_border_color = '';
	    $arp_caption_border_size = '';
	    $arp_caption_border_style = '';
	    $arp_caption_border_left = '';
	    $arp_caption_border_right = '';
	    $arp_caption_border_top = '';
	    $arp_caption_border_bottom = '';

	    if( isset( $values['has_caption_column'] ) && $values['has_caption_column'] == 1 ){
	        $caption_column_data = $all_columns_data['column_0']['column_section'];
	        $caption_color_data = $all_columns_data['column_0']['color_section'];
	       
            $arp_caption_border_size = isset( $caption_column_data['caption_border_size'] ) ? intval($caption_column_data['caption_border_size']) : '';
	        $arp_caption_border_style = isset( $caption_column_data['caption_border_style'] ) ? $caption_column_data['caption_border_style'] : '';
            $arp_caption_border_left = isset($caption_column_data['caption_border_left']) ? intval($caption_column_data['caption_border_left']) : '';
            $arp_caption_border_right = isset($caption_column_data['caption_border_right']) ? intval($caption_column_data['caption_border_right']) : '';
            $arp_caption_border_top = isset($caption_column_data['caption_border_top']) ? intval($caption_column_data['caption_border_top']) : '';
            $arp_caption_border_bottom = isset($caption_column_data['caption_border_bottom']) ? intval($caption_column_data['caption_border_bottom']) : '';
	        $arp_caption_border_color = isset( $caption_color_data['caption_border_color'] ) ? $caption_color_data['caption_border_color'] : '';
	        $arp_caption_row_border_color = isset( $caption_color_data['caption_row_border_color'] ) ? $caption_color_data['caption_row_border_color'] : '';
	    }

	    
	    $hide_caption_column = isset($values['hide_caption_column']) ? intval( $values['hide_caption_column'] ) : '';
	    $full_column_clickable = isset($values['full_column_clickable']) ? intval( $values['full_column_clickable'] ) : '';
	    $enable_hover_effect = isset($values['enable_hover_effect']) ? intval( $values['enable_hover_effect'] ) : 0;
	    $hide_footer_global = isset($values['hide_footer_global']) ? intval( $values['hide_footer_global'] ) : '';
	    $hide_header_global = isset($values['hide_header_global']) ? intval( $values['hide_header_global'] ) : '';
	    $hide_price_global = isset($values['hide_price_global']) ? intval( $values['hide_price_global'] ) : '';
	    $hide_feature_global = isset($values['hide_feature_global']) ? intval( $values['hide_feature_global'] ) : '';
	    $hide_description_global = isset($values['hide_description_global']) ? intval( $values['hide_description_global'] ) : '';
	    $hide_header_shortcode_global = isset($values['hide_header_shortcode_global']) ? intval( $values['hide_header_shortcode_global'] ) : '';

	    $column_opacity = isset($values['column_opacity']) ? floatval( $values['column_opacity'] ) : '';
	    $column_wrapper_width_txtbox = isset($values['column_wrapper_width_txtbox']) ? intval( $values['column_wrapper_width_txtbox'] ) : '';
	    $column_wrapper_width_style = isset($values['column_wrapper_width_style']) ? stripslashes_deep( sanitize_text_field( $values['column_wrapper_width_style'] ) ) : '';
	    $column_box_shadow_effect = isset($values['column_box_shadow_effect']) ? stripslashes_deep( sanitize_text_field( $values['column_box_shadow_effect'] ) ) : '';
	    $toggle_column_animation = isset($values['toggle_column_animation']) ? intval( $values['toggle_column_animation'] ) : '';
        $toggle_effect_animation = isset($values['column_toggle_effect'] ) ? stripslashes_deep( sanitize_text_field( $values['column_toggle_effect'] ) ) : '';

	    $display_column_mobile = isset($values['arp_display_columns_mobile']) ? sanitize_text_field( $values['arp_display_columns_mobile'] ) : '';
	    $display_column_tablet = isset($values['arp_display_columns_tablet']) ? sanitize_text_field( $values['arp_display_columns_tablet'] ) : '';
	    $display_column_desktop = isset($values['arp_display_columns_desktop']) ? $values['arp_display_columns_desktop'] : '';

	    $column_border_radius_top_left = ( isset($values['column_border_radius_top_left']) and ! empty($values['column_border_radius_top_left']) ) ? intval( $values['column_border_radius_top_left'] ) : 0;
	    $column_border_radius_top_right = ( isset($values['column_border_radius_top_right']) and ! empty($values['column_border_radius_top_right']) ) ? intval( $values['column_border_radius_top_right'] ) : 0;
	    $column_border_radius_bottom_right = ( isset($values['column_border_radius_bottom_right']) and ! empty($values['column_border_radius_bottom_right']) ) ? intval( $values['column_border_radius_bottom_right'] ) : 0;
	    $column_border_radius_bottom_left = ( isset($values['column_border_radius_bottom_left']) and ! empty($values['column_border_radius_bottom_left']) ) ? intval( $values['column_border_radius_bottom_left'] ) : 0;
	    $column_hide_blank_rows = isset($values['hide_blank_rows']) ? sanitize_text_field( $values['hide_blank_rows'] ) : '';
	    $global_button_border_width = isset($values['arp_global_button_border_width']) ? intval( $values['arp_global_button_border_width'] ) : '';
	    $global_button_border_type = isset($values['arp_global_button_border_style']) ? stripslashes_deep( sanitize_text_field( $values['arp_global_button_border_style'] ) ) : '';
	    $global_button_border_color = isset($values['arp_global_button_border_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_global_button_border_color'] ) ) : '';
	    $global_button_border_radius_top_left = isset($values['global_button_border_radius_top_left']) ? intval( $values['global_button_border_radius_top_left'] ) : '';
	    $global_button_border_radius_top_right = isset($values['global_button_border_radius_top_right']) ? intval( $values['global_button_border_radius_top_right'] ) : '';
	    $global_button_border_radius_bottom_left = isset($values['global_button_border_radius_bottom_left']) ? intval( $values['global_button_border_radius_bottom_left'] ) : '';
	    $global_button_border_radius_bottom_right = isset($values['global_button_border_radius_bottom_right']) ? intval( $values['global_button_border_radius_bottom_right'] ) : '';
	    $arp_global_button_border_type = isset($values['arp_global_button_type']) ? stripslashes_deep( sanitize_text_field( $values['arp_global_button_type'] ) ) : '';
	    $enable_button_hover_effect = isset($values['enable_button_hover_effect']) ? intval( $values['enable_button_hover_effect'] ) : '';

	    $arp_common_font_family_global = isset($values['arp_common_font_family_global']) ? stripslashes_deep( sanitize_text_field( $values['arp_common_font_family_global'] ) ) : '';

	    $header_font_family_global = isset($values['header_font_family_global']) ? stripslashes_deep( sanitize_text_field( $values['header_font_family_global'] ) ) : '';
	    $header_font_size_global = isset($values['header_font_size_global']) ? intval( $values['header_font_size_global'] ) : '';
	    $arp_header_text_alignment = isset($values['arp_header_text_alignment']) ? stripslashes_deep( sanitize_text_field( $values['arp_header_text_alignment'] ) ) : '';

	    $header_style_bold_global = isset($values['header_style_bold_global']) ? stripslashes_deep( sanitize_text_field( $values['header_style_bold_global'] ) ) : '';
	    $header_style_italic_global = isset($values['header_style_italic_global']) ? stripslashes_deep( sanitize_text_field( $values['header_style_italic_global'] ) ) : '';
	    $header_style_decoration_global = isset($values['header_style_decoration_global']) ? stripslashes_deep( sanitize_text_field( $values['header_style_decoration_global'] ) ) : '';

	    $price_font_family_global = isset($values['price_font_family_global']) ? stripslashes_deep( sanitize_text_field( $values['price_font_family_global'] ) ) : '';
	    $price_font_size_global = isset($values['price_font_size_global']) ? intval( $values['price_font_size_global'] ) : '';
	    $arp_price_text_alignment = isset($values['arp_price_text_alignment']) ? stripslashes_deep( sanitize_text_field( $values['arp_price_text_alignment'] ) ) : '';

	    $price_style_bold_global = isset($values['price_style_bold_global']) ? stripslashes_deep( sanitize_text_field( $values['price_style_bold_global'] ) ) : '';
	    $price_style_italic_global = isset($values['price_style_italic_global']) ? stripslashes_deep( sanitize_text_field( $values['price_style_italic_global'] ) ) : '';
	    $price_style_decoration_global = isset($values['price_style_decoration_global']) ? stripslashes_deep( sanitize_text_field( $values['price_style_decoration_global'] ) ) : '';

	    $body_font_family_global = isset($values['body_font_family_global']) ? stripslashes_deep( sanitize_text_field( $values['body_font_family_global'] ) ) : '';
	    $body_font_size_global = isset($values['body_font_size_global']) ? intval( $values['body_font_size_global'] ) : '';
	    $arp_body_text_alignment = isset($values['arp_body_text_alignment']) ? sanitize_text_field( $values['arp_body_text_alignment'] ) : '';

	    $body_style_bold_global = isset($values['body_style_bold_global']) ? stripslashes_deep( sanitize_text_field( $values['body_style_bold_global'] ) ) : '';
	    $body_style_italic_global = isset($values['body_style_italic_global']) ? stripslashes_deep( sanitize_text_field( $values['body_style_italic_global'] ) ) : '';
	    $body_style_decoration_global = isset($values['body_style_decoration_global']) ? stripslashes_deep( sanitize_text_field( $values['body_style_decoration_global'] ) ) : '';

	    $footer_font_family_global = isset($values['footer_font_family_global']) ? stripslashes_deep( sanitize_text_field( $values['footer_font_family_global'] ) ) : '';
	    $footer_font_size_global = isset($values['footer_font_size_global']) ? intval( $values['footer_font_size_global'] ) : '';
	    $arp_footer_text_alignment = isset($values['arp_footer_text_alignment']) ? stripslashes_deep( sanitize_text_field( $values['arp_footer_text_alignment'] ) ) : '';

	    $footer_style_bold_global = isset($values['footer_style_bold_global']) ? stripslashes_deep( sanitize_text_field( $values['footer_style_bold_global'] ) ) : '';
	    $footer_style_italic_global = isset($values['footer_style_italic_global']) ? stripslashes_deep( sanitize_text_field( $values['footer_style_italic_global'] ) ) : '';
	    $footer_style_decoration_global = isset($values['footer_style_decoration_global']) ? stripslashes_deep( sanitize_text_field( $values['footer_style_decoration_global'] ) ) : '';

	    $button_font_family_global = isset($values['button_font_family_global']) ? stripslashes_deep( sanitize_text_field( $values['button_font_family_global'] ) ) : '';
	    $button_font_size_global = isset($values['button_font_size_global']) ? intval( $values['button_font_size_global'] ) : '';
	    $arp_button_text_alignment = isset($values['arp_button_text_alignment']) ? stripslashes_deep( sanitize_text_field( $values['arp_button_text_alignment'] ) ) : '';

	    $button_style_bold_global = isset($values['button_style_bold_global']) ? stripslashes_deep( sanitize_text_field( $values['button_style_bold_global'] ) ) : '';
	    $button_style_italic_global = isset($values['button_style_italic_global']) ? stripslashes_deep( sanitize_text_field( $values['button_style_italic_global'] ) ) : '';
	    $button_style_decoration_global = isset($values['button_style_decoration_global']) ? stripslashes_deep( sanitize_text_field( $values['button_style_decoration_global'] ) ) : '';

	    $description_font_family_global = isset($values['description_font_family_global']) ? stripslashes_deep( sanitize_text_field( $values['description_font_family_global'] ) ) : '';
	    $description_font_size_global = isset($values['description_font_size_global']) ? intval( $values['description_font_size_global'] ) : '';
	    $arp_description_text_alignment = isset($values['arp_description_text_alignment']) ? stripslashes_deep( sanitize_text_field( $values['arp_description_text_alignment'] ) ) : '';

	    $description_style_bold_global = isset($values['description_style_bold_global']) ? stripslashes_deep( sanitize_text_field( $values['description_style_bold_global'] ) ) : '';
	    $description_style_italic_global = isset($values['description_style_italic_global']) ? stripslashes_deep( sanitize_text_field( $values['description_style_italic_global'] ) ) : '';
	    $description_style_decoration_global = isset($values['description_style_decoration_global']) ? stripslashes_deep( sanitize_text_field( $values['description_style_decoration_global'] ) ) : '';

	    $column_setting = array(
            'column_space' => $column_space, 'min_row_height' => $min_row_height, 'column_highlight_on_hover' => $hover_highlight, 'is_responsive' => $is_responsive, 'hide_caption_column' => $hide_caption_column, 'full_column_clickable' => $full_column_clickable, 'enable_hover_effect' => $enable_hover_effect, 'column_opacity' => $column_opacity, 'all_column_width' => $all_column_width, 'column_wrapper_width_txtbox' => $column_wrapper_width_txtbox, 'column_wrapper_width_style' => $column_wrapper_width_style, 'column_border_radius_top_left' => $column_border_radius_top_left, 'column_border_radius_top_right' => $column_border_radius_top_right, 'column_border_radius_bottom_right' => $column_border_radius_bottom_right, 'column_border_radius_bottom_left' => $column_border_radius_bottom_left, 'column_box_shadow_effect' => $column_box_shadow_effect, 'column_hide_blank_rows' => $column_hide_blank_rows, 'hide_header_global' => $hide_header_global, 'hide_header_shortcode_global' => $hide_header_shortcode_global, 'hide_price_global' => $hide_price_global, 'hide_feature_global' => $hide_feature_global, 'hide_description_global' => $hide_description_global, 'hide_footer_global' => $hide_footer_global, 'display_col_mobile' => $display_column_mobile, 'display_col_tablet' => $display_column_tablet, 'display_col_desktop' => $display_column_desktop, 'global_button_border_width' => $global_button_border_width, 'global_button_border_type' => $global_button_border_type, 'global_button_border_color' => $global_button_border_color, 'global_button_border_radius_top_left' => $global_button_border_radius_top_left, 'global_button_border_radius_top_right' => $global_button_border_radius_top_right, 'global_button_border_radius_bottom_left' => $global_button_border_radius_bottom_left, 'global_button_border_radius_bottom_right' => $global_button_border_radius_bottom_right, 'arp_global_button_type' => $arp_global_button_border_type, 'enable_button_hover_effect' => $enable_button_hover_effect, 'toggle_column_animation' => $toggle_column_animation, 'column_toggle_effect' => $toggle_effect_animation, 'arp_row_border_size' => $arp_row_border_size, 'arp_row_border_type' => $arp_row_border_type, 'arp_row_border_color' => $arp_row_border_color, 'arp_caption_border_style' => $arp_caption_border_style, 'arp_caption_border_size' => $arp_caption_border_size, 'arp_column_border_size' => $arp_column_border_size, 'arp_column_border_type' => $arp_column_border_type, 'arp_column_border_color' => $arp_column_border_color, 'arp_caption_border_color' => $arp_caption_border_color, 'arp_column_border_left' => $arp_column_border_left, 'arp_column_border_right' => $arp_column_border_right, 'arp_column_border_top' => $arp_column_border_top, 'arp_column_border_bottom' => $arp_column_border_bottom, 'arp_caption_border_left' => $arp_caption_border_left, 'arp_caption_border_right' => $arp_caption_border_right, 'arp_caption_border_top' => $arp_caption_border_top, 'arp_caption_border_bottom' => $arp_caption_border_bottom, 'arp_caption_row_border_size' => $arp_caption_row_border_size, 'arp_caption_row_border_style' => $arp_caption_row_border_style, 'arp_caption_row_border_color' => $arp_caption_row_border_color,
	        'arp_common_font_family_global' => $arp_common_font_family_global,
	        'header_font_family_global' => $header_font_family_global,
	        'header_font_size_global' => $header_font_size_global,
	        'arp_header_text_alignment' => $arp_header_text_alignment,
	        'arp_header_text_bold_global' => $header_style_bold_global,
	        'arp_header_text_italic_global' => $header_style_italic_global,
	        'arp_header_text_decoration_global' => $header_style_decoration_global,
	        'price_font_family_global' => $price_font_family_global,
	        'price_font_size_global' => $price_font_size_global,
	        'arp_price_text_alignment' => $arp_price_text_alignment,
	        'arp_price_text_bold_global' => $price_style_bold_global,
	        'arp_price_text_italic_global' => $price_style_italic_global,
	        'arp_price_text_decoration_global' => $price_style_decoration_global,
	        'body_font_family_global' => $body_font_family_global,
	        'body_font_size_global' => $body_font_size_global,
	        'arp_body_text_alignment' => $arp_body_text_alignment,
	        'arp_body_text_bold_global' => $body_style_bold_global,
	        'arp_body_text_italic_global' => $body_style_italic_global,
	        'arp_body_text_decoration_global' => $body_style_decoration_global,
	        'footer_font_family_global' => $footer_font_family_global,
	        'footer_font_size_global' => $footer_font_size_global,
	        'arp_footer_text_alignment' => $arp_footer_text_alignment,
	        'arp_footer_text_bold_global' => $footer_style_bold_global,
	        'arp_footer_text_italic_global' => $footer_style_italic_global,
	        'arp_footer_text_decoration_global' => $footer_style_decoration_global,
	        'button_font_family_global' => $button_font_family_global,
	        'button_font_size_global' => $button_font_size_global,
	        'arp_button_text_alignment' => $arp_button_text_alignment,
	        'arp_button_text_bold_global' => $button_style_bold_global,
	        'arp_button_text_italic_global' => $button_style_italic_global,
	        'arp_button_text_decoration_global' => $button_style_decoration_global,
	        'description_font_family_global' => $description_font_family_global,
	        'description_font_size_global' => $description_font_size_global,
	        'arp_description_text_alignment' => $arp_description_text_alignment,
	        'arp_description_text_bold_global' => $description_style_bold_global,
	        'arp_description_text_italic_global' => $description_style_italic_global,
	        'arp_description_text_decoration_global' => $description_style_decoration_global,
	    );

	    $is_animation = isset($values['is_animation']) ? stripslashes_deep( sanitize_text_field( $values['is_animation'] ) ) : '';
	    $visible_columns = isset($values['visible_columns']) ? intval( $values['visible_columns'] ) : '';
        $visible_columns_tablet = isset($values['visible_columns_tablet']) ? intval( $values['visible_columns_tablet'] ) : '';
	    $scroll_column = isset($values['column_to_scroll']) ? intval( $values['column_to_scroll'] ) : '';
	    $is_navigation = isset($values['is_navigation']) ? $values['is_navigation'] : '';
	    $is_autoplay = isset($values['is_autoplay']) ? intval( $values['is_autoplay'] ) : '';
	    $sliding_effect = isset($values['sliding_effect']) ? sanitize_text_field( $values['sliding_effect'] ) : '';
	    $transition_speed = isset($values['slide_transition_speed']) ? intval( $values['slide_transition_speed'] ) : '';
	    $hide_caption_animation = isset($values['hide_caption_animation']) ? intval( $values['hide_caption_animation'] ) : '';
	    
	    $navigation_style = isset($values['navigation_style']) ? $values['navigation_style'] : '';
	    $easing_effect = isset($values['easing_effect']) ? $values['easing_effect'] : '';
	    $is_pagination = isset($values['is_pagination']) ? $values['is_pagination'] : '';
	    $pagination_style = isset($values['pagination_style']) ? $values['pagination_style'] : '';
	    $pagination_position = isset($values['pagination_position']) ? $values['pagination_position'] : '';
	    $infinite = isset($values['is_infinite']) ? $values['is_infinite'] : '';
	    
	    $pagi_nav_btn = isset($values['pagination_navigation_buttons']) ? sanitize_text_field( $values['pagination_navigation_buttons'] ) : '';
	    $navi_nav_btn = isset($values['navigation_buttons']) ? sanitize_text_field( $values['navigation_buttons'] ) : '';
	    $sticky_caption = isset($values['sticky_caption']) ? intval( $values['sticky_caption'] ) : '';
	    $template_bg_img = isset($values['arp_template_bg_img']) ? sanitize_text_field( $values['arp_template_bg_img'] ) : '';

	    $column_animation = array('is_animation' => $is_animation, 'visible_column' => $visible_columns, 'visible_columns_tablet' => $visible_columns_tablet, 'scrolling_columns' => $scroll_column, 'navigation' => $is_navigation, 'autoplay' => $is_autoplay, 'sliding_effect' => $sliding_effect, 'transition_speed' => $transition_speed, 'hide_caption' => $hide_caption_animation, 'navigation_style' => $navigation_style, 'easing_effect' => $easing_effect, 'is_pagination' => $is_pagination, 'pagination_style' => $pagination_style, 'pagination_position' => $pagination_position, 'is_infinite' => $infinite, 'pagi_nav_btn' => $pagi_nav_btn, 'navi_nav_btn' => $navi_nav_btn, 'sticky_caption' => $sticky_caption,'template_bg_img' =>$template_bg_img);

	    $tooltip_bgcolor = isset($values['tooltip_bgcolor']) ? stripslashes_deep( sanitize_text_field( $values['tooltip_bgcolor'] ) ) : '';
	    $tooltip_txt_color = isset($values['tooltip_txtcolor']) ? stripslashes_deep( sanitize_text_field( $values['tooltip_txtcolor'] ) ) : '';
	    $tooltip_animation = isset($values['tooltip_animation_style']) ? sanitize_text_field( $values['tooltip_animation_style'] ) : '';
	    $tooltip_position = isset($values['tooltip_position']) ? sanitize_text_field( $values['tooltip_position'] ) : '';
	    $tooltip_width = isset($values['tooltip_width']) ? intval( $values['tooltip_width'] ) : '';
	    $tooltip_style = isset($values['tooltip_style']) ? sanitize_text_field( $values['tooltip_style'] ) : '';
	    $tooltip_font_family = isset($values['tooltip_font_family']) ? stripslashes_deep( sanitize_text_field( $values['tooltip_font_family'] ) ) : '';
	    $tooltip_font_size = isset($values['tooltip_font_size']) ? intval( $values['tooltip_font_size'] ) : '';

	    
	    $tooltip_font_style_bold = isset($values['tooltip_font_style_bold']) ? sanitize_text_field( $values['tooltip_font_style_bold'] ) : '';
	    $tooltip_font_style_italic = isset($values['tooltip_font_style_italic']) ? sanitize_text_field( $values['tooltip_font_style_italic'] ) : '';
	    $tooltip_font_style_decoration = isset($values['tooltip_font_style_decoration']) ? sanitize_text_field( $values['tooltip_font_style_decoration'] ) : '';

	    $tooltip_trigger_type = isset($values['tooltip_trigger_type']) ? sanitize_text_field( $values['tooltip_trigger_type'] ) : '';
	    $tooltip_display_style = isset($values['tooltip_display_style']) ? sanitize_text_field( $values['tooltip_display_style'] ) : '';
	    $tooltip_informative_icon = isset($values['tooltip_informative_icon']) ? wp_kses( $values['tooltip_informative_icon'], $arp_allowed_html) : '';
	    $tooltip_icon_position = isset($values['tooltip_icon_position']) ? sanitize_text_field( $values['tooltip_icon_position'] ) : '';

	    $arp_column_bg_custom_color = isset($values['arp_column_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_column_background_color'] ) ) : '';

	    $arp_column_desc_bg_custom_color = isset($values['arp_column_desc_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_column_desc_background_color'] ) ) : '';

	    $arp_column_desc_hover_bg_custom_color = isset($values['arp_column_desc_hover_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_column_desc_hover_background_color'] ) ) : '';

	    $arp_header_bg_custom_color = isset($values['arp_header_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_header_background_color'] ) ) : '';

	    $arp_pricing_bg_custom_color = isset($values['arp_pricing_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_pricing_background_color'] ) ) : '';

	    $arp_template_odd_row_bg_color = isset($values['arp_body_odd_row_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_body_odd_row_background_color'] ) ) : '';

	    $arp_template_odd_row_hover_bg_color = isset($values['arp_body_odd_row_hover_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_body_odd_row_hover_background_color'] ) ) : '';

	    $arp_body_even_row_bg_custom_color = isset($values['arp_body_even_row_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_body_even_row_background_color'] ) ) : '';

	    $arp_body_even_row_hover_bg_custom_color = isset($values['arp_body_even_row_hover_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_body_even_row_hover_background_color'] ) ) : '';

	    $arp_template_analytics_bgcolor = isset($values['arp_analytics_bgcolor']) ? sanitize_text_field( $values['arp_analytics_bgcolor'] ) : '';
	    
	    $arp_template_analytics_forgcolor = isset($values['arp_analytics_forgcolor']) ? sanitize_text_field( $values['arp_analytics_forgcolor'] ) : '';

	    $arp_footer_content_bg_color = isset($values['arp_footer_content_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_footer_content_background_color'] ) ) : '';

	    $arp_footer_content_hover_bg_color = isset($values['arp_footer_content_hover_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_footer_content_hover_background_color'] ) ) : '';

	    $arp_button_bg_custom_color = isset($values['arp_button_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_button_background_color'] ) ) : '';

	    $arp_column_bg_hover_color = isset($values['arp_column_bg_hover_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_column_bg_hover_color'] ) ) : '';

	    $arp_button_bg_hover_color = isset($values['arp_button_bg_hover_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_button_bg_hover_color'] ) ) : '';

	    $arp_header_bg_hover_color = isset($values['arp_header_bg_hover_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_header_bg_hover_color'] ) ) : '';

	    $arp_price_bg_hover_color = isset($values['arp_price_bg_hover_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_price_bg_hover_color'] ) ) : '';

	    $arp_header_font_custom_color = isset($values['arp_header_font_custom_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_header_font_custom_color_input'] ) ) : '';

	    $arp_header_font_custom_hover_color_input = isset($values['arp_header_font_custom_hover_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_header_font_custom_hover_color_input'] ) ) : '';

	    $arp_price_font_custom_color = isset($values['arp_price_font_custom_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_price_font_custom_color_input'] ) ) : '';

	    $arp_price_font_custom_hover_color_input = isset($values['arp_price_font_custom_hover_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_price_font_custom_hover_color_input'] ) ) : '';

	    $arp_price_duration_font_custom_color = isset($values['arp_price_duration_font_custom_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_price_duration_font_custom_color_input'] ) ) : '';

	    $arp_price_duration_font_custom_hover_color_input = isset($values['arp_price_duration_font_custom_hover_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_price_duration_font_custom_hover_color_input'] ) ) : '';

	    $arp_desc_font_custom_color = isset($values['arp_desc_font_custom_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_desc_font_custom_color_input'] ) ) : '';

	    $arp_desc_font_custom_hover_color_input = isset($values['arp_desc_font_custom_hover_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_desc_font_custom_hover_color_input'] ) ) : '';

	    $arp_body_label_font_custom_color = isset($values['arp_body_label_font_custom_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_body_label_font_custom_color_input'] ) ) : '';

	    $arp_body_label_font_custom_hover_color_input = isset($values['arp_body_label_font_custom_hover_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_body_label_font_custom_hover_color_input'] ) ) : '';

	    $arp_body_font_custom_color = isset($values['arp_body_font_custom_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_body_font_custom_color_input'] ) ) : '';
	    $arp_body_even_font_custom_color = isset($values['arp_body_even_font_custom_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_body_even_font_custom_color_input'] ) ) : '';

	    $arp_body_font_custom_hover_color_input = isset($values['arp_body_font_custom_hover_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_body_font_custom_hover_color_input'] ) ) : '';
	    $arp_body_even_font_custom_hover_color_input = isset($values['arp_body_even_font_custom_hover_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_body_even_font_custom_hover_color_input'] ) ) : '';

	    $arp_footer_font_custom_color = isset($values['arp_footer_font_custom_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_footer_font_custom_color_input'] ) ) : '';

	    $arp_footer_font_custom_hover_color_input = isset($values['arp_footer_font_custom_hover_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_footer_font_custom_hover_color_input'] ) ) : '';

	    $arp_button_font_custom_color = isset($values['arp_button_font_custom_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_button_font_custom_color_input'] ) ) : '';

	    $arp_button_font_custom_hover_color_input = isset($values['arp_button_font_custom_hover_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_button_font_custom_hover_color_input'] ) ) : '';

	    $arp_shortocode_background = isset($values['arp_shortocode_background_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_shortocode_background_color'] ) ) : '';
	    $arp_shortocode_font_color = isset($values['arp_shortocode_font_custom_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_shortocode_font_custom_color_input'] ) ) : '';
	    $arp_shortcode_bg_hover_color = isset($values['arp_shortcode_bg_hover_color']) ? stripslashes_deep( sanitize_text_field( $values['arp_shortcode_bg_hover_color'] ) ) : '';
	    $arp_shortcode_font_hover_color = isset($values['arp_shortcode_font_custom_hover_color_input']) ? stripslashes_deep( sanitize_text_field( $values['arp_shortcode_font_custom_hover_color_input'] ) ) : '';

	    $custom_skin_colors = array(
	        "arp_header_bg_custom_color" => $arp_header_bg_custom_color,
	        "arp_column_bg_custom_color" => $arp_column_bg_custom_color,
	        "arp_column_desc_bg_custom_color" => $arp_column_desc_bg_custom_color,
	        "arp_column_desc_hover_bg_custom_color" => $arp_column_desc_hover_bg_custom_color,
	        "arp_pricing_bg_custom_color" => $arp_pricing_bg_custom_color,
	        "arp_body_odd_row_bg_custom_color" => $arp_template_odd_row_bg_color,
	        "arp_body_odd_row_hover_bg_custom_color" => $arp_template_odd_row_hover_bg_color,
	        "arp_body_even_row_hover_bg_custom_color" => $arp_body_even_row_hover_bg_custom_color,
	        "arp_body_even_row_bg_custom_color" => $arp_body_even_row_bg_custom_color,
	        "arp_analytics_bgcolor" => $arp_template_analytics_bgcolor,
	        "arp_analytics_forgcolor"=>$arp_template_analytics_forgcolor,
	        "arp_footer_content_bg_color" => $arp_footer_content_bg_color,
	        "arp_footer_content_hover_bg_color" => $arp_footer_content_hover_bg_color,
	        "arp_button_bg_custom_color" => $arp_button_bg_custom_color,
	        "arp_column_bg_hover_color" => $arp_column_bg_hover_color,
	        "arp_button_bg_hover_color" => $arp_button_bg_hover_color,
	        "arp_header_bg_hover_color" => $arp_header_bg_hover_color,
	        "arp_price_bg_hover_color" => $arp_price_bg_hover_color,
	        "arp_header_font_custom_color" => $arp_header_font_custom_color,
	        "arp_header_font_custom_hover_color" => $arp_header_font_custom_hover_color_input,
	        "arp_price_font_custom_color" => $arp_price_font_custom_color,
	        "arp_price_font_custom_hover_color" => $arp_price_font_custom_hover_color_input,
	        "arp_price_duration_font_custom_color" => $arp_price_duration_font_custom_color,
	        "arp_price_duration_font_custom_hover_color" => $arp_price_duration_font_custom_hover_color_input,
	        "arp_desc_font_custom_color" => $arp_desc_font_custom_color,
	        "arp_desc_font_custom_hover_color" => $arp_desc_font_custom_hover_color_input,
	        "arp_body_label_font_custom_color" => $arp_body_label_font_custom_color,
	        "arp_body_label_font_custom_hover_color" => $arp_body_label_font_custom_hover_color_input,
	        "arp_body_font_custom_color" => $arp_body_font_custom_color,
	        "arp_body_even_font_custom_color" => $arp_body_even_font_custom_color,
	        "arp_body_font_custom_hover_color" => $arp_body_font_custom_hover_color_input,
	        "arp_body_even_font_custom_hover_color" => $arp_body_even_font_custom_hover_color_input,
	        "arp_footer_font_custom_color" => $arp_footer_font_custom_color,
	        "arp_footer_font_custom_hover_color" => $arp_footer_font_custom_hover_color_input,
	        "arp_button_font_custom_color" => $arp_button_font_custom_color,
	        "arp_button_font_custom_hover_color" => $arp_button_font_custom_hover_color_input,
	        'arp_shortocode_background' => $arp_shortocode_background,
	        'arp_shortocode_font_color' => $arp_shortocode_font_color,
	        'arp_shortcode_bg_hover_color' => $arp_shortcode_bg_hover_color,
	        'arp_shortcode_font_hover_color' => $arp_shortcode_font_hover_color,
	    );

	    $tooltip_setting = array( 'background_color' => $tooltip_bgcolor, 'text_color' => $tooltip_txt_color, 'animation' => $tooltip_animation, 'position' => $tooltip_position, 'tooltip_width' => $tooltip_width, 'style' => $tooltip_style, 'tooltip_font_family' => $tooltip_font_family, 'tooltip_font_size' => $tooltip_font_size, 'tooltip_font_style_bold' => $tooltip_font_style_bold, 'tooltip_font_style_italic' => $tooltip_font_style_italic, 'tooltip_font_style_decoration' => $tooltip_font_style_decoration, 'tooltip_trigger_type' => $tooltip_trigger_type, 'tooltip_display_style' => $tooltip_display_style, 'tooltip_informative_icon' => $tooltip_informative_icon, 'tooltip_icon_position' => $tooltip_icon_position);

	    $tab_general_opt = array('template_setting' => $template_setting, 'font_settings' => $font_setting, 'column_settings' => $column_setting, 'column_animation' => $column_animation, 'tooltip_settings' => $tooltip_setting, 'general_settings' => $general_settings, 'button_settings' => $button_settings, 'custom_skin_colors' => $custom_skin_colors
	    );

	    $general_opt = maybe_serialize($tab_general_opt);

	    
	    $sql_results = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $table_id));
	    $table_opt = $sql_results[0]->table_options;
	    $uns_table_opt = maybe_unserialize($table_opt);
	    $table_columns = $uns_table_opt['columns'];

	    if ($total > 0) {
	        if (count($new_id) > 0) {
	            for ($i = 0; $i <= $total; $i++) {
	                if (!in_array($i, $new_id)) {
	                    continue;
	                }

	                $Title = 'column_' . $i;

	                $column_section = $all_columns_data[$Title]['column_section'];
	                $color_section = $all_columns_data[$Title]['color_section'];
	                $button_section = $all_columns_data[$Title]['button_content'];
	                $footer_content = $all_columns_data[$Title]['footer_content'];
	                $pricing_content = $all_columns_data[$Title]['pricing_content'];
	                $header_section = $all_columns_data[$Title]['header_content'];
	                $column_description = $all_columns_data[$Title]['column_description'];
	                $rows_data = $all_columns_data[$Title]['rows'];
	                $body_section = isset( $all_columns_data[$Title]['body_section'] ) ? $all_columns_data[$Title]['body_section'] : array();

	                $column_width = isset( $column_section['column_width'] ) ? intval( $column_section['column_width'] ) : '';

	                $caption = isset($values['caption_column_' . $i]) ? intval( $values['caption_column_' . $i] ) : 0;
	                $column_hide = isset($values['column_hide_' . $i]) ? intval( $values['column_hide_' . $i] ) : '';

	                $cstm_rbn_txt = isset( $column_section['arp_custom_ribbon'] ) ? wp_kses( $column_section['arp_custom_ribbon'], $arp_allowed_html ) : '';
	                $column_highlight = isset( $column_section['column_highlight'] ) ? intval( $column_section['column_highlight'] ) : '';

	                $column_background_color = isset( $color_section['column_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['column_bg_color'] ) ) : '';
	                $column_hover_background_color = isset( $color_section['column_hover_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['column_hover_bg_color'] ) ) : '';

	                $column_background_image = isset( $column_section['column_background_image'] ) ? stripslashes_deep(  sanitize_text_field( $column_section['column_background_image'] ) ) : '';
	                $column_background_image_height = isset( $column_section['column_background_image_height'] ) ? intval( $column_section['column_background_image_height'] ) : '';
	                $column_background_image_width = isset( $column_section['column_background_image_width'] ) ? intval( $column_section['column_background_image_width'] ) : '';
	                $column_background_scaling = isset( $column_section['column_background_scaling'] ) ? stripslashes_deep( sanitize_text_field( $column_section['column_background_scaling'] ) ) : '';
	                $column_background_min_positon = isset( $column_section['column_background_min_positon'] ) ? intval( $column_section['column_background_min_positon'] ) : '';
	                $column_background_max_positon = isset( $column_section['column_background_max_positon'] ) ? intval( $column_section['column_background_max_positon'] ) : '';

	                $arp_shortcode_customization_size = isset( $header_section['shortcode_size'] ) ? stripslashes_deep( sanitize_text_field( $header_section['shortcode_size'] ) ) : '';
	                $arp_shortcode_customization_style = isset( $header_section['shortcode_style'] ) ? stripslashes_deep( sanitize_text_field( $header_section['shortcode_style'] ) ) : '';

	                $shortcode_background_color = isset( $color_section['shortcode_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['shortcode_bg_color'] ) ) : '';
	                $shortcode_font_color = isset( $color_section['shortcode_font_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['shortcode_font_color'] ) ) : '';

	                $shortcode_hover_background_color = isset( $color_section['shortcode_hover_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['shortcode_hover_bg_color'] ) ) : '';
	                $shortcode_hover_font_color = isset( $color_section['shortcode_hover_font_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['shortcode_hover_font_color'] ) ) : '';

	                $body_text_alignemnt = isset($values['body_text_alignment_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['body_text_alignment_' . $i] ) ) : '';

                    $btn_size = isset( $button_section['size'] ) ? stripslashes_deep( sanitize_text_field( $button_section['size'] ) ) : '';
                    $btn_height = isset( $button_section['height'] ) ? stripslashes_deep( sanitize_text_field( $button_section['height'] ) ) : '';
                    
	                $btn_type = isset($values['button_type_' . $i]) ? sanitize_text_field( $values['button_type_' . $i] ) : '';
	                $hide_default_btn = isset( $button_section['hide_default_btn'] ) ? intval( $button_section['hide_default_btn'] ) : '';
	                
	                $is_new_window = isset( $button_section['is_new_window'] ) ? intval( $button_section['is_new_window'] ) : '';
	                $is_new_window_actual = isset( $button_section['is_new_window_actual'] ) ? intval( $button_section['is_new_window_actual'] ) : '';
	                $is_nofollow_link = isset( $button_section['is_nofollow_link'] ) ? intval( $button_section['is_nofollow_link'] ) : '';

	                if ( isset($table_columsn[$Title]['row_order']) && ( !$table_columns[$Title]['row_order'] || !is_array($table_columns[$Title]['row_order']))) {
	                    parse_str($values[$Title . '_row_order'], $col_row_order);
	                    $row_order = isset($col_row_order) ? $col_row_order : '';
	                } else {
	                    $row_order = isset($table_columns[$Title]['row_order']) ? $table_columns[$Title]['row_order'] : '';
	                }

	                $header_background_color = isset( $color_section['header_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['header_bg_color'] ) ) : '';
	                $header_hover_background_color = isset( $color_section['header_hover_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['header_hover_bg_color'] ) ) : '';

	                $header_font_color = isset($color_section['header_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['header_font_color'] ) ) : '';
	                $header_hover_font_color = isset($color_section['header_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['header_hover_font_color'] ) ) : '';
	                

	                $header_font_family = isset($header_section['font_family']) ? stripslashes_deep( sanitize_text_field( $header_section['font_family'] ) ) : '';
                    $header_font_size = isset($header_section['font_size']) ? intval($header_section['font_size']) : '';
	                
	                $header_font_align = isset($header_section['alignment']) ? stripslashes_deep( sanitize_text_field( $header_section['alignment'] ) ) : '';

	                $header_font_style = isset($values['header_font_style_' . $i]) ? sanitize_text_field( $values['header_font_style_' . $i] ) : '';
	                $header_style_bold = isset( $header_section['font_bold'] ) ? sanitize_text_field( $header_section['font_bold'] ) : '';
	                $header_style_italic = isset( $header_section['font_italic'] ) ? sanitize_text_field( $header_section['font_italic'] ) : '';
	                $header_style_decoration = isset( $header_section['font_decoration'] ) ? sanitize_text_field( $header_section['font_decoration'] ) : '';
                    $header_margin_top = isset( $header_section['margin_top'] ) ? stripslashes_deep( sanitize_text_field( $header_section['margin_top'] ) ) : '';

                    $hscode_min_height = isset( $header_section['shortcode_min_height'] ) ? stripslashes_deep( sanitize_text_field( $header_section['shortcode_min_height'] ) ) : '';

                    $price_min_height = isset( $pricing_content['min_height'] ) ? stripslashes_deep( sanitize_text_field( $pricing_content['min_height'] ) ) : '';

                    $col_desc_min_height = isset( $column_description['min_height'] ) ? stripslashes_deep( sanitize_text_field( $column_description['min_height'] ) ) : '';

                    $footer_min_height = isset( $footer_content['min_height'] ) ? stripslashes_deep( sanitize_text_field( $footer_content['min_height']) ) : '';

                    $button_min_height = isset( $button_section['min_height'] ) ? stripslashes_deep( sanitize_text_field( $button_section['min_height']) ) : '';
                    

	                $header_background_image = isset($values['arp_header_background_image_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['arp_header_background_image_' . $i] ) ) : '';

	                $price_background_color = isset( $color_section['price_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['price_bg_color'] ) ) : '';
	                $price_hover_background_color = isset( $color_section['price_hover_bg_color'] ) ? stripslashes_deep( sanitize_text_field( $color_section['price_hover_bg_color'] ) ) : '';

	                $price_font_color = isset($color_section['price_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['price_font_color'] ) ) : '';
	                $price_hover_font_color = isset($color_section['price_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['price_hover_font_color'] ) ) : '';
	                
	                $price_font_family = isset($values['price_font_family_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['price_font_family_' . $i] ) ) : '';
	                $price_font_size = isset($values['price_font_size_' . $i]) ? intval( $values['price_font_size_' . $i] ) : '';
	                $price_font_style = isset($values['price_font_style_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['price_font_style_' . $i] ) ) : '';
	                $price_font_align = isset($values['arp_price_text_alignment_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['arp_price_text_alignment_' . $i] ) ) : '';
	                
	                $price_label_style_bold = isset($values['price_label_style_bold_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['price_label_style_bold_' . $i] ) ) : '';
	                $price_label_style_italic = isset($values['price_label_style_italic_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['price_label_style_italic_' . $i] ) ) : '';
	                $price_label_style_decoration = isset($values['price_label_style_decoration_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['price_label_style_decoration_' . $i] ) ) : '';
	                
	                $price_text_font_family = isset($values['price_text_font_family_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['price_text_font_family_' . $i] ) ) : '';
	                $price_text_font_size = isset($values['price_text_font_size_' . $i]) ? intval( $values['price_text_font_size_' . $i] ) : '';
	                $price_text_font_style = isset($values['price_text_font_style_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['price_text_font_style_' . $i] ) ) : '';
	                

	                $price_text_style_bold = isset($values['price_text_style_bold_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['price_text_style_bold_' . $i] ) ) : '';
	                $price_text_style_italic = isset($values['price_text_style_italic_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['price_text_style_italic_' . $i] ) ) : '';
	                $price_text_style_decoration = isset($values['price_text_style_decoration_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['price_text_style_decoration_' . $i] ) ) : '';

	                $price_text_font_color = isset($color_section['price_text_font_color']) ? stripslashes_deep($color_section['price_text_font_color']) : '';
	                $price_text_hover_font_color = isset($color_section['price_text_hover_font_color']) ? stripslashes_deep($color_section['price_text_hover_font_color']) : '';

	                $content_font_color = isset($color_section['content_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_font_color'] ) ) : '';
	                $content_even_font_color = isset($color_section['content_even_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_even_font_color'] ) ) : '';
	                $content_hover_font_color = isset($color_section['content_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_hover_font_color'] ) ) : '';
	                $content_even_hover_font_color = isset($color_section['content_even_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_even_hover_font_color'] ) ) : '';

	                $content_odd_color = isset($color_section['content_odd_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_odd_color'] ) ) : '';
	                $content_odd_hover_color = isset($color_section['content_odd_hover_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_odd_hover_color'] ) ) : '';
	                $content_even_color = isset($color_section['content_even_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_even_color'] ) ) : '';
	                $content_even_hover_color = isset($color_section['content_even_hover_color']) ? stripslashes_deep( sanitize_text_field( $color_section['content_even_hover_color'] ) ) : '';

	                $content_font_family = isset( $body_section['font_family'] ) ? stripslashes_deep( sanitize_text_field( $body_section['font_family' ] ) ) :'';
                    $content_font_size = isset( $body_section['font_size'] ) ? intval($body_section['font_size' ]) :'';
                    $content_font_alignment = isset( $body_section['alignment'] ) ? stripslashes_deep( sanitize_text_field( $body_section['alignment' ] ) ) :'';


	                $button_background_color = isset($color_section['button_bg_color']) ? stripslashes_deep(sanitize_text_field( $color_section['button_bg_color'] ) ) : '';
	                $button_hover_background_color = isset($color_section['button_hover_bg_color']) ? stripslashes_deep(sanitize_text_field( $color_section['button_hover_bg_color'] ) ) : '';
	                $button_font_color = isset($color_section['button_font_color']) ? stripslashes_deep(sanitize_text_field( $color_section['button_font_color'] ) ) : '';
	                $button_hover_font_color = isset($color_section['button_hover_font_color']) ? stripslashes_deep(sanitize_text_field( $color_section['button_hover_font_color'] ) ) : '';
	                
	                $button_font_family = isset($values['button_font_family_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['button_font_family_' . $i] ) ) : '';
	                $button_font_size = isset($values['button_font_size_' . $i]) ? intval( $values['button_font_size_' . $i] ) : '';
	                $button_font_style = isset($values['button_font_style_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['button_font_style_' . $i] ) ) : '';

	                $button_style_bold = isset($values['button_style_bold_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['button_style_bold_' . $i] ) ) : '';
	                $button_style_italic = isset($values['button_style_italic_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['button_style_italic_' . $i] ) ) : '';
	                $button_style_decoration = isset($values['button_style_decoration_' . $i]) ? stripslashes_deep( sanitize_text_field( $values['button_style_decoration_' . $i] ) ) : '';

	                $column_description_font_color = isset($color_section['column_description_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['column_description_font_color'] ) ) : '';
	                $column_description_hover_font_color = isset($color_section['column_description_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['column_description_hover_font_color'] ) ) : '';
	                $column_desc_background_color = isset($color_section['column_desc_bg_color']) ? stripslashes_deep( sanitize_text_field( $color_section['column_desc_bg_color'] ) ) : '';
	                $column_desc_hover_background_color = isset($color_section['column_desc_hover_bg_color']) ? stripslashes_deep( sanitize_text_field( $color_section['column_desc_hover_bg_color'] ) ) : '';

	                

	                $footer_background_color = isset($color_section['footer_background_color']) ? stripslashes_deep( sanitize_text_field( $color_section['footer_background_color'] ) ) : '';
	                $footer_hover_background_color = isset($color_section['footer_hover_background_color']) ? stripslashes_deep( sanitize_text_field( $color_section['footer_hover_background_color'] ) ) : '';
	                $footer_level_options_font_color = isset($color_section['footer_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['footer_font_color'] ) ) : '';
	                $footer_level_options_hover_font_color = isset($color_section['footer_hover_font_color']) ? stripslashes_deep( sanitize_text_field( $color_section['footer_hover_font_color'] ) ) : '';

                    $footer_content_position = isset($footer_content['position']) ? intval($footer_content['position']) : '';
                    
	                $footer_text_align = isset($footer_content['alignment']) ? stripslashes_deep( sanitize_text_field( $footer_content['alignment'] ) ) : '';                    

	                $footer_level_options_font_family = isset($footer_content['font_family']) ? stripslashes_deep( sanitize_text_field( $footer_content['font_family'] ) ) : '';
	                $footer_level_options_font_size = isset($footer_content['font_size']) ? intval( $footer_content['font_size'] ) : '';
	                $footer_level_options_font_style_bold = isset($footer_content['font_bold']) ? stripslashes_deep( sanitize_text_field( $footer_content['font_bold'] ) ) : '';
	                $footer_level_options_font_style_italic = isset($footer_content['font_italic']) ? stripslashes_deep( sanitize_text_field( $footer_content['font_italic'] ) ) : '';
	                $footer_level_options_font_style_decoration = isset($footer_content['font_decoration']) ? stripslashes_deep( sanitize_text_field( $footer_content['font_decoration'] ) ) : '';

	                $total_rows = isset($values['total_rows_' . $i]) ? intval( $values['total_rows_' . $i] ) : '';

	                if( '' == $total_rows ){
	                    $total_rows = count( $rows_data );
	                }

	                $row = array();
	                if( $total_rows > 0 ){
	                    for( $j = 0; $j < $total_rows; $j++ ){
	                        
	                        $row_title = 'row_' . $j;
	                        
	                        $rowsOpts = $rows_data[$row_title];

	                        $row_content_type = isset( $rowsOpts['content_type'] ) ? intval( $rowsOpts['content_type'] ) : '';


                            $row_custom_css = isset( $rowsOpts['custom_css'] ) ? sanitize_text_field( $rowsOpts['custom_css'] ) : '';

                            $row_hover_custom_css = isset( $rowsOpts['hover_custom_css'] ) ? sanitize_text_field( $rowsOpts['hover_custom_css'] ) : '';

                            $row_min_height = isset( $rowsOpts['min_height'] ) ? sanitize_text_field( $rowsOpts['min_height'] ) : '';

                            $row_btn_size = isset( $rowsOpts['size'] ) ? stripslashes_deep( sanitize_text_field($rowsOpts['size'] ) ) : '';
            
                            $row_btn_height = isset( $rowsOpts['height'] ) ? stripslashes_deep( sanitize_text_field( $rowsOpts['height'] ) ) : '';
                            $row_hide_default_btn = isset( $rowsOpts['hide_default_btn'] ) ? intval( $rowsOpts['hide_default_btn'] ) : '';
                             
                            $row_is_new_window = isset( $rowsOpts['is_new_window'] ) ? intval( $rowsOpts['is_new_window'] ) : '';
                            
                            $row_is_new_window_actual = isset( $rowsOpts['is_new_window_actual'] ) ? intval( $rowsOpts['is_new_window_actual'] ) : '';
                            $row_is_nofollow_link = isset( $rowsOpts['is_nofollow_link'] ) ? intval( $rowsOpts['is_nofollow_link'] ) : '';
                            
	                        $row[$row_title] = array(
	                            'row_content_type' => $row_content_type,
                                'row_custom_css' => $row_custom_css,
                                'row_hover_custom_css' => $row_hover_custom_css,
                                'row_min_height' => $row_min_height,
                                'button_size_row' => $row_btn_size,
                                'button_height_row' => $row_btn_height,
                                'hide_default_btn_row' => $row_hide_default_btn,
                                'is_new_window_row' => $row_is_new_window,
                                'is_new_window_actual_row' => $row_is_new_window_actual,
                                'is_nofollow_link_row' => $row_is_nofollow_link,
	                        );

	                        $g = 0;
	                        foreach($total_tabs as $key => $tab_name){
	                            if( $g == 0 ){
	                                $row[$row_title]['row_description'] = isset($rowsOpts['description']) ? stripslashes_deep( wp_kses( $rowsOpts['description'], $arp_allowed_html ) ) : '';

	                                $row[$row_title]['row_tooltip'] = isset($rowsOpts['tooltip']) ? stripslashes_deep( wp_kses( $rowsOpts['tooltip'], $arp_allowed_html ) ) : '';

	                                $row[$row_title]['row_label'] = isset($values['row_' . $i . '_label_' . $j]) ? stripslashes_deep( wp_kses( $values['row_' . $i . '_label_' . $j], $arp_allowed_html ) ) : '';

                                    $row[$row_title]['paypal_code_row'] = isset($rowsOpts['embed_script']) ? stripslashes_deep( $rowsOpts['embed_script'] ) : '';
                                    
                                    $row[$row_title]['button_url'] = isset($rowsOpts['btn_url']) ? stripslashes_deep( esc_url_raw( $rowsOpts['btn_url'] ) ) : '';

                                    $row[$row_title]['image_row'] = isset( $rowsOpts['image'] ) ? sanitize_text_field( $rowsOpts['image'] ) : '';
            
                                    $row[$row_title]['image_height_row'] = isset( $rowsOpts['image_height'] ) ? stripslashes_deep( sanitize_text_field( $rowsOpts['image_height'] ) ) : '';
                    
                                    $row[$row_title]['image_width_row'] = isset( $rowsOpts['image_width'] ) ? sanitize_text_field( $rowsOpts['image_width'] ) : '';

	                            } else {
	                                $row[$row_title]['row_description_'.$tab_name[2]] = isset($rowsOpts['description_' . $tab_name[2]]) ? stripslashes_deep( wp_kses( $rowsOpts['description_' . $tab_name[2]], $arp_allowed_html ) ) : '';
	                                $row[$row_title]['row_tooltip_'.$tab_name[2]] = isset($rowsOpts['tooltip_' . $tab_name[2]]) ? stripslashes_deep( wp_kses( $rowsOpts['tooltip_' . $tab_name[2]], $arp_allowed_html ) ) : '';
	                                $row[$row_title]['row_label_'.$tab_name[2]] = isset($values['row_' . $i . '_label_' . $tab_name[2] . '_' . $j]) ? stripslashes_deep( wp_kses( $values['row_' . $i . '_label_' . $tab_name[2] . '_' . $j], $arp_allowed_html ) ) : '';
                                    $row[$row_title]['paypal_code_row_'.$tab_name[2]] = isset($rowsOpts['embed_script_'.$tab_name[2]]) ? stripslashes_deep( $rowsOpts['embed_script_'.$tab_name[2]] ) : '';
                                    $row[$row_title]['button_url_'.$tab_name[2]] = isset($rowsOpts['btn_url_'.$tab_name[2]]) ? stripslashes_deep( esc_url_raw( $rowsOpts['btn_url_'.$tab_name[2]] ) ) : '';

                                     $row[$row_title]['image_row_'.$tab_name[2]] = isset( $rowsOpts['image_'.$tab_name[2]] ) ? sanitize_text_field( $rowsOpts['image_'.$tab_name[2]] ) : '';
            
                                    $row[$row_title]['image_height_row_'.$tab_name[2]] = isset( $rowsOpts['image_height_'.$tab_name[2]] ) ? stripslashes_deep( sanitize_text_field( $rowsOpts['image_height_'.$tab_name[2]] ) ) : '';
                    
                                    $row[$row_title]['image_width_row_'.$tab_name[2]] = isset( $rowsOpts['image_width_'.$tab_name[2]] ) ? sanitize_text_field( $rowsOpts['image_width_'.$tab_name[2]] ) : '';
	                            }
	                            $g++;
	                        }
	                    }
	                }

	                $ribbon_settings = array(
	                    'arp_ribbon' => isset( $column_section['arp_ribbon'] ) ? $column_section['arp_ribbon'] : '',
	                    'arp_ribbon_bgcol' => isset( $column_section['arp_ribbon_bgcol'] ) ? $column_section['arp_ribbon_bgcol'] : '',
	                    'arp_ribbon_txtcol' => isset( $column_section['arp_ribbon_txtcol'] ) ? $column_section['arp_ribbon_txtcol'] : '',
	                    'arp_ribbon_position' => isset( $column_section['arp_ribbon_position'] ) ? $column_section['arp_ribbon_position'] : '',
                        'arp_ribbon_custom_position_rl' => isset( $column_section['arp_ribbon_custom_position_rl'] ) ? intval($column_section['arp_ribbon_custom_position_rl']) : '',
                        'arp_ribbon_custom_position_top' => isset( $column_section['arp_ribbon_custom_position_top'] ) ? intval($column_section['arp_ribbon_custom_position_top']) : '',
	                );

	                $g = 0;
	                
	                foreach($total_tabs as $key => $tab_name){
	                    if( $g == 0 ){
	                        $ribbon_settings['arp_ribbon_content'] = isset($column_section['arp_ribbon_content']) ? stripslashes_deep( sanitize_text_field( $column_section['arp_ribbon_content'] ) ) : '';
	                        $ribbon_settings['arp_custom_ribbon'] = isset($column_section['arp_custom_ribbon']) ? stripslashes_deep( sanitize_text_field( $column_section['arp_custom_ribbon'] ) ) : '';
	                    } else {
	                        $ribbon_settings['arp_ribbon_content_'.$tab_name[2]] = isset($column_section['arp_ribbon_content_' . $tab_name[2]]) ? stripslashes_deep( sanitize_text_field( $column_section['arp_ribbon_content_' . $tab_name[2]] ) ) : '';
	                        $ribbon_settings['arp_custom_ribbon_'.$tab_name[2]] = isset( $column_section['arp_custom_ribbon_' . $tab_name[2]] ) ? stripslashes_deep( sanitize_text_field( $column_section['arp_custom_ribbon_' . $tab_name[2]] ) ) : '';
	                    }
	                    $g++;
	                }

	                $column[$Title] = array(
	                    'column_width' => $column_width,
	                    'is_caption' => $caption,
	                    'custom_ribbon_txt' => $cstm_rbn_txt,
	                    'column_highlight' => $column_highlight,
	                    'column_hide' => $column_hide,
	                    'column_background_color' => $column_background_color,
	                    'column_hover_background_color' => $column_hover_background_color,
	                    'column_background_image' => $column_background_image,
	                    'column_background_image_height' => $column_background_image_height,
	                    'column_background_image_width' => $column_background_image_width,
	                    'column_background_scaling' => $column_background_scaling,
	                    'column_background_min_positon' => $column_background_min_positon,
	                    'column_background_max_positon' => $column_background_max_positon,
	                    'arp_shortcode_customization_size' => $arp_shortcode_customization_size,
	                    'arp_shortcode_customization_style' => $arp_shortcode_customization_style,
	                    'shortcode_background_color' => $shortcode_background_color,
	                    'shortcode_font_color' => $shortcode_font_color,
	                    'shortcode_hover_background_color' => $shortcode_hover_background_color,
	                    'shortcode_hover_font_color' => $shortcode_hover_font_color,
	                    'gmap_marker' => isset($google_map_marker) ? $google_map_marker : '',
	                    'body_text_alignment' => $body_text_alignemnt,
	                    'rows' => $row,
	                    'button_size' => $btn_size,
	                    'button_height' => $btn_height,
                        'button_size_row' => $row_btn_size,
                        'button_height_row' => $row_btn_height,
	                    'button_type' => $btn_type,
	                    'hide_default_btn' => $hide_default_btn,
	                    'is_new_window' => $is_new_window,
	                    'is_new_window_actual' => $is_new_window_actual,
	                    'is_nofollow_link' => $is_nofollow_link,
                        'hide_default_btn_row' => $row_hide_default_btn,
                        'is_new_window_row' => $row_is_new_window,
                        'is_new_window_actual_row' => $row_is_new_window_actual,
                        'is_nofollow_link_row' => $row_is_nofollow_link,
	                    'row_order' => $row_order,
	                    'ribbon_setting' => $ribbon_settings,
	                    'header_background_color' => $header_background_color,
	                    'header_hover_background_color' => $header_hover_background_color,
	                    'header_font_family' => $header_font_family,
	                    'header_font_size' => $header_font_size,
	                    'header_font_color' => $header_font_color,
	                    'header_hover_font_color' => $header_hover_font_color,
	                    'header_font_align' => $header_font_align,
	                    'header_font_style' => $header_font_style,
	                    'header_style_bold' => $header_style_bold,
	                    'header_style_italic' => $header_style_italic,
	                    'header_style_decoration' => $header_style_decoration,
	                    'header_background_image' => $header_background_image,
	                    'price_background_color' => $price_background_color,
	                    'price_hover_background_color' => $price_hover_background_color,	                    
	                    'price_font_color' => $price_font_color,
	                    'price_hover_font_color' => $price_hover_font_color,	                    
	                    'price_text_font_color' => $price_text_font_color,
	                    'price_text_hover_font_color' => $price_text_hover_font_color,
	                    'content_font_family' => $content_font_family,
	                    'content_font_size' => $content_font_size,
                        'body_text_alignment' => $content_font_alignment,	                    
	                    'content_font_color' => $content_font_color,
	                    'content_even_font_color' => $content_even_font_color,
	                    'content_hover_font_color' => $content_hover_font_color,
	                    'content_even_hover_font_color' => $content_even_hover_font_color,
	                    'content_odd_color' => $content_odd_color,
	                    'content_odd_hover_color' => $content_odd_hover_color,
	                    'content_even_color' => $content_even_color,
	                    'content_even_hover_color' => $content_even_hover_color,	                    
	                    'button_background_color' => $button_background_color,
	                    'button_hover_background_color' => $button_hover_background_color,
	                    'button_font_family' => $button_font_family,
	                    'button_font_size' => $button_font_size,
	                    'button_font_color' => $button_font_color,
	                    'button_hover_font_color' => $button_hover_font_color,
	                    'button_font_style' => $button_font_style,
	                    'button_style_bold' => $button_style_bold,
	                    'button_style_italic' => $button_style_italic,
	                    'button_style_decoration' => $button_style_decoration,
	                    'column_description_font_color' => $column_description_font_color,
	                    'column_description_hover_font_color' => $column_description_hover_font_color,
	                    'column_desc_background_color' => $column_desc_background_color,
	                    'column_desc_hover_background_color' => $column_desc_hover_background_color,
	                    'footer_content_position' => $footer_content_position,
	                    'footer_text_align' => $footer_text_align,
	                    'footer_level_options_font_family' => $footer_level_options_font_family,
	                    'footer_background_color' => $footer_background_color,
	                    'footer_hover_background_color' => $footer_hover_background_color,
	                    'footer_level_options_font_size' => $footer_level_options_font_size,
	                    'footer_level_options_font_color' => $footer_level_options_font_color,
	                    'footer_level_options_hover_font_color' => $footer_level_options_hover_font_color,
	                    'footer_level_options_font_style_bold' => $footer_level_options_font_style_bold,
	                    'footer_level_options_font_style_italic' => $footer_level_options_font_style_italic,
	                    'footer_level_options_font_style_decoration' => $footer_level_options_font_style_decoration,
                        'header_margin_top' => $header_margin_top,
                        'shortcode_min_height' => $hscode_min_height,
                        'price_min_height' => $price_min_height,
                        'col_desc_min_height' => $col_desc_min_height,
                        'footer_min_height' => $footer_min_height,
                        'button_min_height' => $button_min_height
	                );

	                $g = 0;
	                foreach($total_tabs as $key => $tab_name){
	                    if( $g == 0 ){
	                        $column[$Title]['package_title'] = isset($header_section['header_title']) ? stripslashes_deep( wp_kses( $header_section['header_title'], $arp_allowed_html ) ) : '';

	                        $column[$Title]['column_description'] = isset($column_description['description']) ? stripslashes_deep( wp_kses( $column_description['description'], $arp_allowed_html ) ) : '';
	                          
	                        $column[$Title]['post_variables_content'] = isset($column_section['post_variables_content']) ? stripslashes_deep( sanitize_text_field( $column_section['post_variables_content'] ) ) : '';

	                        $column[$Title]['arp_header_shortcode'] = isset($header_section['header_shortcode']) ? stripslashes_deep( $header_section['header_shortcode'] ) : '';

	                        if( $caption ){
	                            $column[$Title]['html_content'] = isset($header_section['header_title']) ? stripslashes_deep( wp_kses( $header_section['header_title'], $arp_allowed_html ) ) : '';
	                        }
	                          
	                        $column[$Title]['price_text'] = isset($pricing_content['price_text']) ? stripslashes_deep( wp_kses( $pricing_content['price_text'], $arp_allowed_html ) ) : '';
	                          
	                        $column[$Title]['button_text'] = isset($button_section['btn_content']) ? stripslashes_deep( wp_kses( $button_section['btn_content'], $arp_allowed_html ) ) : '';

                            $column[$Title]['btn_img'] = isset( $button_section['image'] ) ? sanitize_text_field( $button_section['image'] ) : '';
                            
                            $column[$Title]['btn_img_height'] = isset( $button_section['image_height'] ) ? intval($button_section['image_height']) : '';

                            $column[$Title]['btn_img_width'] = isset( $button_section['image_width'] ) ? intval($button_section['image_width']) : '';


	                        $column[$Title]['paypal_code'] = isset($button_section['embed_script']) ? stripslashes_deep( $button_section['embed_script'] ) : '';
	                          
	                        $column[$Title]['button_url'] = isset($button_section['btn_url']) ? stripslashes_deep( esc_url_raw( $button_section['btn_url'] ) ) : '';
	                          
	                        $column[$Title]['footer_content'] = isset($footer_content['footer_content']) ? stripslashes_deep(wp_kses( $footer_content['footer_content'], $arp_allowed_html ) ) : '';
	                    } else {

	                        $column[$Title]['package_title_'.$tab_name[2]] = isset($header_section['header_title_'.$tab_name[2]]) ? stripslashes_deep( wp_kses( $header_section['header_title_'.$tab_name[2]], $arp_allowed_html ) ) : '';

	                        $column[$Title]['column_description_'.$tab_name[2]] = isset($column_description['description_'.$tab_name[2]]) ? stripslashes_deep( wp_kses( $column_description['description_'.$tab_name[2]], $arp_allowed_html ) ) : '';
	                          
	                        $column[$Title]['post_variables_content_'.$tab_name[2]] = isset($column_section['post_variables_content_'.$tab_name[2]]) ? stripslashes_deep( sanitize_text_field( $column_section['post_variables_content_'.$tab_name[2]] ) ) : '';
	                          
	                        $column[$Title]['arp_header_shortcode_'.$tab_name[2]] = isset($header_section['header_shortcode_'.$tab_name[2]]) ? stripslashes_deep( $header_section['header_shortcode_'.$tab_name[2]] ) : '';
	                          
	                        if( $caption ){
	                            $column[$Title]['html_content_'.$tab_name[2]] = isset($header_section['header_title_' . $tab_name[2]]) ? stripslashes_deep( wp_kses( $header_section['header_title_'.$tab_name[2]], $arp_allowed_html ) ) : '';
	                        }
	                          
	                        $column[$Title]['price_text_'.$tab_name[3].'_step'] = isset($pricing_content['price_text_' . $tab_name[2]]) ? stripslashes_deep( wp_kses( $pricing_content['price_text_' . $tab_name[2]], $arp_allowed_html ) ) : '';

	                        

	                        $column[$Title]['btn_content_'.$tab_name[2]] = isset($button_section['btn_content_'.$tab_name[2]]) ? stripslashes_deep( wp_kses( $button_section['btn_content_'.$tab_name[2]], $arp_allowed_html ) ) : '';

                            $column[$Title]['btn_img_'.$tab_name[2]] = isset( $button_section['image_'.$tab_name[2]] ) ? sanitize_text_field( $button_section['image_'.$tab_name[2]] ) : '';

                            $column[$Title]['btn_img_height_'.$tab_name[2]] = isset( $button_section['image_height_'.$tab_name[2]] ) ? intval($button_section['image_height_'.$tab_name[2]]) : '';

                            $column[$Title]['btn_img_width_'.$tab_name[2]] = isset( $button_section['image_width_'.$tab_name[2]] ) ? intval($button_section['image_width_'.$tab_name[2]]) : '';

	                        $column[$Title]['paypal_code_'.$tab_name[2]] = isset($button_section['embed_script_'.$tab_name[2]]) ? stripslashes_deep( $button_section['embed_script_'.$tab_name[2]] ) : '';

	                        $column[$Title]['button_url_'.$tab_name[2]] = isset($button_section['btn_url_'.$tab_name[2]]) ? stripslashes_deep( esc_url_raw( $button_section['btn_url_'.$tab_name[2]] ) ) : '';

	                        $column[$Title]['footer_content_'.$tab_name[2]] = isset($footer_content['footer_content_'.$tab_name[2]]) ? stripslashes_deep( wp_kses( $footer_content['footer_content_'.$tab_name[2]], $arp_allowed_html ) ) : '';

	                    }

                        $column[$Title]['header_min_height_'.$tab_name[2]] = isset( $header_section['min_height_' . $tab_name[2]] ) ? stripslashes_deep( sanitize_text_field( $header_section['min_height_' . $tab_name[2]] ) ) : '';
	                    $g++;
	                }
	            }
	        }
	    } else {
	        return;
	    }


	    $uns_table_opt['columns'] = $column;

	    $table_options = maybe_serialize($uns_table_opt);

	    $table_arr = array('table_id' => $table_id, 'general_options' => $general_opt, 'table_options' => $table_options, 'is_template' => $is_template, 'template_name' => $template_name, 'is_animated' => $is_animated);


	    return $table_arr;
	}

    function arp_updatetabledata() {
        $all_previewtabledata_option = get_option('arp_previewoptions');
        $all_previewtabledata_option = maybe_unserialize($all_previewtabledata_option);
        $all_previewtabledata_option = (array) $all_previewtabledata_option;

        if (get_option('arp_previewtabledata_1') == '') {
            update_option('arp_previewtabledata_1', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_1'] = time();
            echo 'arp_previewtabledata_1';
        } else if (get_option('arp_previewtabledata_2') == '') {
            update_option('arp_previewtabledata_2', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_2'] = time();
            echo 'arp_previewtabledata_2';
        } else if (get_option('arp_previewtabledata_3') == '') {
            update_option('arp_previewtabledata_3', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_3'] = time();
            echo 'arp_previewtabledata_3';
        } else if (get_option('arp_previewtabledata_4') == '') {
            update_option('arp_previewtabledata_4', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_4'] = time();
            echo 'arp_previewtabledata_4';
        } else if (get_option('arp_previewtabledata_5') == '') {
            update_option('arp_previewtabledata_5', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_5'] = time();
            echo 'arp_previewtabledata_5';
        } else if (get_option('arp_previewtabledata_6') == '') {
            update_option('arp_previewtabledata_6', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_6'] = time();
            echo 'arp_previewtabledata_6';
        } else if (get_option('arp_previewtabledata_7') == '') {
            update_option('arp_previewtabledata_7', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_7'] = time();
            echo 'arp_previewtabledata_7';
        } else if (get_option('arp_previewtabledata_8') == '') {
            update_option('arp_previewtabledata_8', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_8'] = time();
            echo 'arp_previewtabledata_8';
        } else if (get_option('arp_previewtabledata_9') == '') {
            update_option('arp_previewtabledata_9', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_9'] = time();
            echo 'arp_previewtabledata_9';
        } else {
            $random = rand(11, 9999);
            if (get_option('arp_previewtabledata_' . $random) != '') {
                $random = rand(11, 9999);
            }

            update_option('arp_previewtabledata_' . $random, $_POST);
            $all_previewtabledata_option['arp_previewtabledata_' . $random] = time();
            echo 'arp_previewtabledata_' . $random;
        }

        update_option('arp_previewoptions', $all_previewtabledata_option);

        die();
    }

    function get_table_enqueue_data($tablearr = array()) {
        if (!$tablearr) {
            return;
        }

        global $wpdb,$arp_pricingtable;

        $tableresutls = array();

        foreach ($tablearr as $table_id) {
            
            if( isset($GLOBALS['arp_data']) && isset($GLOBALS['arp_data'][$table_id]) ){
                $tabledata = $GLOBALS['arp_data'][$table_id];
            } else {
                $tabledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d and is_template = %d", $table_id, 0));
                $GLOBALS['arp_data'][$table_id] = $tabledata;
            }
            if( isset($GLOBALS['arp_opt_data']) && isset($GLOBALS['arp_opt_data'][$table_id]) ){
                $tableoption = $GLOBALS['arp_opt_data'][$table_id];
            } else {
                $tableoption = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $table_id));
                $GLOBALS['arp_opt_data'][$table_id] = $tableoption;
            }

            $total_tabs = $arp_pricingtable->arp_toggle_step_name();

            if ($tabledata && $tableoption) {
                $general_options = maybe_unserialize($tabledata->general_options);
                $table_options = maybe_unserialize($tableoption->table_options);

                $arp_googlemap = 0;
                if ($table_options['columns']) {
                    foreach ($table_options['columns'] as $columns) {
                        

                        $g = 0;
                        foreach($total_tabs as $key => $tab_name){
                            $str_key = ($g == 0 ) ? 'arp_header_shortcode' : 'arp_header_shortcode_'.$tab_name[2];

                            $html_content_shortcode = isset($columns[$str_key]) ? $columns[$str_key] : '';

                            if( preg_match('/arp_googlemap/',$html_content_shortcode)){
                                $arp_googlemap = 1;

                            }

                            $g++;
                        }

                    }
                }

                $tableresutls[$tabledata->ID] = array(
                    'template' => $general_options['template_setting']['template'],
                    'skin' => $general_options['template_setting']['skin'],
                    'template_name' => $tabledata->template_name,
                    'is_template' => $tabledata->is_template,
                    'googlemap' => $arp_googlemap,
                );
            }
        }

        return $tableresutls;
    }

    function arp_choose_template_type($template_1 = '') {
        global $arp_mainoptionsarr;
        if ($template_1 == '') {
            $template = $_REQUEST['template'];
        } else {
            $template = $template_1;
        }

        if ($template_1 != '') {
            return $arp_mainoptionsarr['general_options']['template_options']['template_type'][$template];
        } else {
            echo $arp_mainoptionsarr['general_options']['template_options']['template_type'][$template];
        }

        die();
    }

    function arp_widget_text_filter($content) {
        $regex = '/\[\s*ARPrice\s+.*\]/';
        return preg_replace_callback($regex, array($this, 'arp_widget_text_filter_callback'), $content);
    }

    function arp_widget_text_filter_callback($matches) {

        global $arprice_form, $arprice_version;

        if ($matches[0]) {
            $parts = explode("id=", $matches[0]);
            $partsnew = explode(" ", $parts[1]);
            $tableid = $partsnew[0];
            $tableid = trim($tableid);
            if ($tableid) {
                $newvalues_enqueue = $arprice_form->get_table_enqueue_data(array($tableid));

                if (is_array($newvalues_enqueue) && count($newvalues_enqueue) > 0) {
                    $to_google_map = 0;
                    $templates = array();

                    foreach ($newvalues_enqueue as $newqnqueue) {
                        if ($newqnqueue['googlemap']) {
                            $to_google_map = 1;
                        }

                        $templates[] = $newqnqueue['template'];
                    }

                    $templates = array_unique($templates);

                    if ($to_google_map) {
                        $map_script_url = 'http://maps.google.com/maps/api/js?sensor=false';
                        if( is_ssl() ){
                            $map_script_url = str_replace('http://', 'https://', $map_script_url);
                        }
                        wp_register_script('arp_googlemap_js', $map_script_url, array(), $arprice_version);

                        wp_enqueue_script('arp_googlemap_js');

                        wp_register_script('arp_gomap_js', PRICINGTABLE_URL . '/js/jquery.gomap-1.3.2.min.js', array(), $arprice_version);

                        wp_enqueue_script('arp_gomap_js');
                    }

                    if ($templates) {
                        wp_enqueue_script('arp_animate_numbers');
                        wp_enqueue_script('arprice_slider_js');
                        wp_enqueue_script('arp_tooltip_front');
                        wp_enqueue_script('arprice_js');

                        wp_enqueue_style('arprice_front_css');
                        wp_enqueue_style('arprice_front_tooltip_css');
                        wp_enqueue_style('arp_fontawesome_css');
                        wp_enqueue_style('arprice_font_css_front');

                        foreach ($templates as $template) {
                            foreach ($newvalues_enqueue as $template_id => $newqnqueue) {
                                if (isset($newqnqueue['is_template']) && !empty($newqnqueue['is_template'])) {
                                    wp_register_style('arptemplate_' . $newqnqueue['template_name'] . '_css', PRICINGTABLE_URL . '/css/templates/arptemplate_' . $newqnqueue['template_name'] . '.css', array(), $arprice_version);
                                    wp_enqueue_style('arptemplate_' . $newqnqueue['template_name'] . '_css');
                                } else {

                                    wp_register_style('arptemplate_' . $template_id . '_css', PRICINGTABLE_UPLOAD_URL . '/css/arptemplate_' . $template_id . '.css', array(), $arprice_version);
                                    wp_enqueue_style('arptemplate_' . $template_id . '_css');
                                }
                            }
                        }
                    }
                }
            }
        }

        return do_shortcode($matches[0]);
    }

    function hex2rgb($colour) {

        if (isset($colour[0]) && $colour[0] == '#') {
            $colour = substr($colour, 1);
        }
        if (strlen($colour) == 6) {
            list( $r, $g, $b ) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
        } elseif (strlen($colour) == 3) {
            list( $r, $g, $b ) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
        } else {
            return false;
        }
        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);
        return array('red' => $r, 'green' => $g, 'blue' => $b);
    }

    function arp_is_light_color($color = array()){
        if( !is_array($color) ){
            return false;
        } else if( empty($color)  ){
            return false;
        } else {
            $r = $color['red'];
            $g = $color['green'];
            $b = $color['blue'];

            return ( (0.213 * $r) + (0.715 * $g) + (0.072 * $b) > (255/2) );
        }
    }

    function arp_load_pricing_table() {

        global $wpdb, $arp_mainoptionsarr;

        require_once PRICINGTABLE_DIR . '/core/classes/class.arprice_preview_editor.php';

        $template_id = $_REQUEST['id'];

        $template = $_REQUEST['template'];

        $skin = $_REQUEST['skin'];

        $ref_template = $_REQUEST['ref_temp'];

        $is_clone = $_REQUEST['is_clone'];

        $sql = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'arp_arprice WHERE ID = %d ', $template_id));

        $table_name = $sql[0]->table_name;

        $general_options = json_encode(maybe_unserialize(stripslashes($sql[0]->general_options)));


        $opt = maybe_unserialize($sql[0]->general_options);

        $is_animated = $sql[0]->is_animated;

        $columns = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'arp_arprice_options WHERE table_id = %d', $template_id));

        $column_options = json_encode(maybe_unserialize(stripslashes($columns[0]->table_options)));

        $table = arp_get_pricing_table_string_editor($template_id, $table_name, 2, '', '', $is_clone);

        $template_skins = json_encode($arp_mainoptionsarr['general_options']['template_options']['skins'][$ref_template]);

        $template_skin_codes = json_encode($arp_mainoptionsarr['general_options']['template_options']['skin_color_code'][$ref_template]);

        $options = json_decode($general_options, true);

        $general_settings = json_encode($options['general_settings']);

        $template_settings = json_encode($options['template_setting']);

        $template_type = $this->arp_choose_template_type($ref_template);

        $columns = maybe_unserialize(stripslashes($columns[0]->table_options));

        $template_feature = json_encode($arp_mainoptionsarr['general_options']['template_options']['features'][$ref_template]);

        $total_columns = count($columns['columns']);

        $json_array = array('table' => $table, 'table_name' => $table_name, 'general_settings' => $general_settings, 'template_settings' => $template_settings, 'column_options' => $column_options, 'template_skins' => $template_skins, 'template_skin_codes' => $template_skin_codes, 'template_type' => $template_type, 'total_columns' => $total_columns, 'is_animated' => $is_animated, 'template_features' => $template_feature, 'general_options' => $general_options);

        $json_array = json_encode($json_array);

        echo $json_array;

        die();
    }

    function font_settings($selected_fonts = '') {

        global $arprice_fonts;

        $default_fonts = $arprice_fonts->get_default_fonts();

        $google_fonts = $arprice_fonts->google_fonts_list();

        $str = '';

        $str .= '<optgroup label="' . esc_html__('Default Fonts', 'ARPrice') . '">';

        foreach ($default_fonts as $font) {
            $str .= '<option style="font-family:' . $font . '" id="normal" ' . selected($font, $selected_fonts, false) . ' value="' . $font . '">' . $font . '</option>';
        }

        $str .= '</optgroup>';

        $str .= '<optgroup label="' . esc_html__('Google Fonts', 'ARPrice') . '">';

        foreach ($google_fonts as $font) {
            $str .= '<option style="font-family:' . $font . '" id="google" ' . selected($font, $selected_fonts, false) . ' value="' . $font . '">' . $font . '</div>';
        }

        $str.= '</optgroup>';

        return $str;
    }
 
    function font_size($selected_size = '') {
        $str = '';
        for ($s = 8; $s <= 20; $s++) {
            $size_arr[] = $s;
        }
        for ($st = 22; $st <= 70; $st+=2) {
            $size_arr[] = $st;
        }
        foreach ($size_arr as $size) {
            
            $str .= '<option ' . selected($size, $selected_size, false) . ' value="' . $size . '">' . esc_html__(ucfirst($size), 'ARPrice') . '</option>';
        }
        return $str;
    }

    function font_style($selected_style = '') {
        $str = '';
        $style_arr = array('normal', 'italic', 'bold');
        foreach ($style_arr as $style) {
            $str .= '<option ' . selected($style, $selected_style, false) . ' value="' . $style . '">' . esc_html__(ucfirst($style), 'ARPrice') . '</option>';
        }
        return $str;
    }

    function font_style_new() {
        $str = '';
        $style_arr = array('normal' => esc_html__('Normal', 'ARPrice'), 'italic' => esc_html__('Italic', 'ARPrice'), 'bold' => esc_html__('Bold', 'ARPrice'));
        foreach ($style_arr as $x => $style) {
            $str .= "<li data-value='" . $x . "' data-label='" . $style . "'>" . $style . "</li>";
        }
        return $str;
    }

    function font_color($property_name = '', $data_column = '', $data_column_id = '', $id = '', $value = '', $main_class = '', $input_class = '') {
        $str = '';
        $str .= '<div class="color_picker_font font_color_picker ' . $main_class . '" data-column="' . $data_column . '" id="' . $id . '_wrapper" data-color="' . $value . '" >';
        $str .= '<input type="text" id="' . $id . '_' . $data_column . '" name="' . $property_name . '" value="' . $value . '" class="general_color_box general_color_box_font_color jscolor ' . $input_class . '" data-jscolor="{hash:true,onFineChange:\'arp_update_color(this,' . $id . '_' . $data_column . ')\',required:false}" jscolor-required="false" jscolor-hash="true" jscolor-onfinechange="arp_update_color(this,' . $id . '_' . $data_column . ')" />';
        $str .= '</div>';

        return $str;
    }

    function font_color_new($property_name = '', $data_column = '', $data_column_id = '', $id = '', $value = '', $main_class = '', $input_class = '') {
        $str = '';
        $str .= '<div class="jscolor arp_custom_css_colorpicker arp_general_color_box" data-column="' . $data_column . '" id="' . $id . '_' . $data_column . '_wrapper" data-color="' . $value . '" data-jscolor="{hash:true,onFineChange:\'arp_update_color(this,' . $id . '_' . $data_column . '_wrapper)\',valueElement:\'' . $id . '_' . $data_column . '\',required:false}" jscolor-required="false" jscolor-hash="true" jscolor-onfinechange="arp_update_color(this,' . $id . '_' . $data_column . '_wrapper)" jscolor-valueelement="' . $id . '_' . $data_column . '">';
        $str .= '</div>';
        $str .= '<input type="hidden" id="' . $id . '_' . $data_column . '" name="' . $property_name . '" value="' . $value . '" class="  ' . $input_class . '"  />';

        return $str;
    }

    function font_color_row($property_name = '', $data_column = '', $data_column_id = '', $id = '', $value = '', $main_class = '', $input_class = '', $row_id = '') {
        $str = '';

        $str .= '<div class="color_picker_font font_color_picker ' . $main_class . '" data-column="' . $data_column . '" data-row="' . $row_id . '" data-column-id="' . $data_column_id . '" id="' . $id . '_wrapper" data-color="' . $value . '" data-row-id="' . $row_id . '">';
        $str .= '<input type="text" id="' . $id . '_' . $data_column . '_' . $row_id . '" name="' . $property_name . '" value="' . $value . '" class="general_color_box jscolor general_color_box_font_color ' . $input_class . '" data-jscolor="{hash:true,onFineChange:\'arp_update_color(this,' . $id . '_' . $data_column . '_' . $row_id . ')\',required:false}" jscolor-required="false" jscolor-hash="true" jscolor-onfinechange="arp_update_color(this,' . $id . '_' . $data_column . '_' . $row_id . ')" />';
        $str .= '</div>';

        return $str;
    }

    function arp_save_template_image() {
        WP_Filesystem();
        global $wp_filesystem;

        $arp_image_data = isset($_POST['arp_image_data']) ? $_POST['arp_image_data'] : '';

        $template_id = isset($_POST['template_id']) ? $_POST['template_id'] : '';

        if ($arp_image_data != '' && $template_id != '') {
            $arp_image_data = str_replace('data:image/png;base64,', '', $arp_image_data);
            $arp_image_data = str_replace(' ', '+', $arp_image_data);
            $data = base64_decode($arp_image_data);
            $file = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $template_id . '_full_legnth.png';
            
            $wp_filesystem->put_contents($file, $data, 0777);

            list($width, $height) = getimagesize($file);
            $newheight = 180; 
            $newwidth = 400; 

            $src_image = imagecreatefrompng($file);
            $tmp_image = imagecreatetruecolor($newwidth, $newheight);
            $bgColor = imagecolorallocate($tmp_image, 255, 255, 255);
            imagefill($tmp_image, 0, 0, $bgColor);
            imagecopyresampled($tmp_image, $src_image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            $filename = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $template_id . '.png';
            imagepng($tmp_image, $filename);
            imagedestroy($tmp_image);

            $newheight_big = 238; 
            $newwidth_big = 530; 
            $tmp_image_big = imagecreatetruecolor($newwidth_big, $newheight_big);
            $bgColor_big = imagecolorallocate($tmp_image_big, 255, 255, 255);
            imagefill($tmp_image_big, 0, 0, $bgColor_big);
            imagecopyresampled($tmp_image_big, $src_image, 0, 0, 0, 0, $newwidth_big, $newheight_big, $width, $height);
            $filename_big = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $template_id . '_big.png';
            imagepng($tmp_image_big, $filename_big);
            imagedestroy($tmp_image_big);

            $newheight_large = 300; 
            $newwidth_large = 668; 
            $tmp_image_large = imagecreatetruecolor($newwidth_large, $newheight_large);
            $bgColor_large = imagecolorallocate($tmp_image_large, 255, 255, 255);
            imagefill($tmp_image_large, 0, 0, $bgColor_large);
            imagecopyresampled($tmp_image_large, $src_image, 0, 0, 0, 0, $newwidth_large, $newheight_large, $width, $height);
            $filename_large = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $template_id . '_large.png';
            imagepng($tmp_image_large, $filename_large);
            imagedestroy($tmp_image_large);

            unlink($file);
        }
        die();
    }

    function arp_get_video_image($add_shortcode) {
        $add_shortcode_text = str_replace('[', '', $add_shortcode);
        $add_shortcode_text = str_replace(']', '', $add_shortcode_text);

        $as_shortcode = shortcode_parse_atts($add_shortcode_text);

        if (isset($as_shortcode[0]) && 'arp_youtube_video' == $as_shortcode[0] ) {

            $video_id = isset($as_shortcode['id']) ? $as_shortcode['id'] : '';
            $width = ( isset($as_shortcode['width']) and $as_shortcode['width'] != '' ) ? $as_shortcode['width'] : 'auto';
            $height = ( isset($as_shortcode['height']) and $as_shortcode['height'] != '' ) ? $as_shortcode['height'] : 'auto';
            
            if(strpos($height, 'px')===true){
                $height = str_replace("px", "", $height);
            }
            if(strpos($width, 'px')===true){
                $width = str_replace("px", "", $width);
            }

            if($width != 'auto' && $width!=''){
                $width = " width='".$width."'";
            }else {
                $width = "";
            }
            if($height != 'auto' && $height!=''){
                $height = " height='".$height."'";
            }else{
                $height = "";    
            }
            $style = "";
            $https = is_ssl() ? 's' : '';

            $imageURL = "http".$https."://img.youtube.com/vi/" . $video_id . "/maxresdefault.jpg;";

            return '<div class="arp_youtube_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '>
                <img src="' . $imageURL . '"' . $width . $height . ' />
            </div>';
        } elseif (isset($as_shortcode[0]) && 'arp_vimeo_video' == $as_shortcode[0]) {


            $video_id = isset($as_shortcode['id']) ? $as_shortcode['id'] : '';
            $width = '100%';
            $height = ( isset($as_shortcode['height']) and $as_shortcode['height'] != '' ) ? $as_shortcode['height'] : 'auto';
            
            $style = "";
            $data = ARPFilecontroller::arp_get_file_content("http://vimeo.com/api/v2/video/" . $video_id . ".json");
            $data = json_decode($data);
            $imageURL = $data[0]->thumbnail_large;

            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }

            return '<div class="arp_vimeo_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '>
                <img src="' . $imageURL . '"  height="' . $height . '"  />
            </div>';
        } elseif (isset($as_shortcode[0]) && 'arp_screenr_video' == $as_shortcode[0] ) {

            $video_id = isset($as_shortcode['id']) ? $as_shortcode['id'] : '';
            $width = '100%';
            $height = ( isset($as_shortcode['height']) and $as_shortcode['height'] != '' ) ? $as_shortcode['height'] : 'auto';
            
            $style = "";
            $data = ARPFilecontroller::arp_get_file_content("http://www.screenr.com/api/oembed.json?url=http://www.screenr.com/" . $video_id);
            $data = json_decode($data);
            $imageURL = $data->thumbnail_url;

            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }

            return '<div class="arp_screenr_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '>
                <img src="' . $imageURL . '"  height="' . $height . '"  />
            </div>';
        } elseif (isset($as_shortcode[0]) && 'arp_html5_video' == $as_shortcode[0]) {
            $imageURL = '';
            if (!empty($as_shortcode['poster'])) {
                $imageURL = $as_shortcode['poster'];
                if(is_ssl()){
                    $imageURL = str_replace('http://', 'https://', $imageURL);
                }
                return '<div class="arp_html5_video">
                    <img src="' . $imageURL . '"   />
                </div>';
            } else {
                $imageURL = PRICINGTABLE_IMAGES_URL . '/video-icon.png';
                if(is_ssl()){
                    $imageURL = str_replace('http://', 'https://', $imageURL);
                }
                return '<div class="arp_html5_video">
                <img class="arp_video_img" src="' . $imageURL . '"   />
            </div>';
            }
        } elseif (isset($as_shortcode[0]) && 'arp_html5_audio' == $as_shortcode[0]) {
            $imageURL = PRICINGTABLE_IMAGES_URL . '/audio-icon.png';
            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }
            return '<div class="arp_html5_audio">
                <img class="arp_audio_img" src="' . $imageURL . '"   />
            </div>';
        } elseif (isset($as_shortcode[0]) && 'arp_googlemap' == $as_shortcode[0] ) {

            $address = ($as_shortcode['address']) ? $as_shortcode['address'] : '';
            $zoom_level = ($as_shortcode['zoom_level']) ? $as_shortcode['zoom_level'] : '14';
            $height = ($as_shortcode['height']) ? $as_shortcode['height'] : '300';

            $address = $address ? $address : '';
            $popup = $as_shortcode['show_popup'] ? true : false;
            $icon = $as_shortcode['marker_image'] ? $as_shortcode['marker_image'] : '';
            $content = $as_shortcode['content'] ? $as_shortcode['content'] : '';
            $maptype = isset($as_shortcode['maptype']) ? $as_shortcode['maptype'] : 'ROADMAP';
            $google_map_api_key = get_option("arp_google_map_api_key");
            $mapdata = array();
            $mapdata['api_key'] = $google_map_api_key;
            $mapdata['markers'][] = array(
                'address' => $address,
                'title' => $as_shortcode['title'],
                'icon' => !empty($icon) ? array('image' => $icon) : null,
                'html' => isset($content) ? array(
                    'content' => $content,
                    'popup' => $popup
                        ) : null,
            );
            $mapdata['zoom'] = intval($zoom_level);
            $mapdata['maptype'] = $maptype;
            $mapdata['mapTypeControl'] = false;
            $address = str_replace(" ", "+", $address);
            $data = ARPFilecontroller::arp_get_file_content("https://maps.googleapis.com/maps/api/geocode/json?key=".$google_map_api_key."&address=" . $address);
            $data = json_decode($data);
            $map_data = isset($data->results[0]) ? $data->results[0] : '';
            $lat='';
            $lng='';
            if($map_data!=''){
                $lat = $map_data->geometry->location->lat;
                $lng = $map_data->geometry->location->lng;    
            }

            $imageURL = "https://maps.googleapis.com/maps/api/staticmap?center=" . $lat . "," . $lng . "&zoom=" . $zoom_level . "&size=280x" . $height;
            return '<div class="arp_googlemap" data-map="' . esc_attr(json_encode($mapdata)) . '"  style="width:100%; height:' . $height . 'px;"><img src="' . $imageURL . '"  height="' . $height . '"  /></div>';
        } elseif (isset($as_shortcode[0]) && 'arp_dailymotion_video' == $as_shortcode[0] ) {

            $video_id = isset($as_shortcode['id']) ? $as_shortcode['id'] : '';
            $width = '100%';
            $height = ( isset($as_shortcode['height']) and $as_shortcode['height'] != '' ) ? $as_shortcode['height'] : 'auto';
            
            $style = "";
            $data = ARPFilecontroller::arp_get_file_content('https://api.dailymotion.com/video/' . $video_id . '?fields=thumbnail_large_url');
            $data = json_decode($data);
            $imageURL = $data->thumbnail_large_url;

            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }

            return '<div class="arp_dailymotion_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '>
                <img src="' . $imageURL . '"  height="' . $height . '"  />
            </div>';
        } elseif (isset($as_shortcode[0]) && 'arp_metacafe_video' == $as_shortcode[0] ) {

            $video_id = isset($as_shortcode['id']) ? $as_shortcode['id'] : '';
            $width = '100%';
            $height = ( isset($as_shortcode['height']) and $as_shortcode['height'] != '' ) ? $as_shortcode['height'] : 'auto';

            
            $style = "";

            
            $exp_str = explode("/", $video_id);
            $video_id1 = trim($exp_str[0]);
            $video_id2 = $video_id1 / 1000;
            $video_id2 = intval($video_id2);
            $video_id2 *= 1000;

            $https = is_ssl() ? 's' : '' ;
            $imageURL = 'http'.$https.'://cdn.mcstatic.com/contents/videos_screenshots/'.$video_id2.'/'.$video_id1.'/400x225/1.jpg';

            return '<div class="arp_metacafe_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '>
                <img src="' . $imageURL . '"  height="' . $height . '"  />
            </div>';
        } elseif (isset($as_shortcode[0]) && 'arp_soundcloud_audio' == $as_shortcode[0] ) {
            $imageURL = PRICINGTABLE_IMAGES_URL . '/audio-icon.png';
            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }
            return '<div class="arp_soundcloud_audio">
                <img class="arp_audio_img" src="' . $imageURL . '"   />
            </div>';
        } elseif ( isset($as_shortcode[0]) && 'arp_mixcloud_audio' == $as_shortcode[0]) {
            $imageURL = PRICINGTABLE_IMAGES_URL . '/audio-icon.png';
            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }
            return '<div class="arp_mixcloud_audio">
                <img class="arp_audio_img" src="' . $imageURL . '"   />
            </div>';
        } elseif (isset($as_shortcode[0]) && 'arp_beatport_audio' == $as_shortcode[0] ) {
            $imageURL = PRICINGTABLE_IMAGES_URL . '/audio-icon.png';
            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }
            return '<div class="arp_beatport_audio">
                <img class="arp_audio_img" src="' . $imageURL . '"   />
            </div>';
        } elseif (isset($as_shortcode[0]) && 'arp_embed' == $as_shortcode[0] ) {
            $imageURL = PRICINGTABLE_IMAGES_URL . '/embed-icon.png';
            if(is_ssl()){
                $imageURL = str_replace('http://', 'https://', $imageURL);
            }
            return '<div class="arp_embed_audio">
                <img class="arp_embed_img" src="' . $imageURL . '"   />
            </div>';
        } else {
            return do_shortcode($add_shortcode);
        }
    }

    function update_arp_tour_guide_value() {
        $return = '0';
        update_option('arprice_tour_guide_value', 'no');
        if ($_REQUEST['arp_tour_guide_value'] == 'arp_tour_guide_start_yes') {
            $return = '1';
        }

        echo $return;

        die();
    }


    function arp_generate_color_tone($hex, $steps) {

        $steps = max(-255, min(255, $steps));

        $hex = str_replace('#', '', $hex);

        if ($hex != '' && strlen($hex) < 6) {
            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
        }

        $color_parts = str_split($hex, 2);
        $return = '#';

        $acsteps = str_replace(array('+', '-'), array('', ''), $steps);

        if (strlen($acsteps) > 2) {
            $lum = $steps / 1000;
        } else {
            $lum = $steps / 100;
        }

        foreach ($color_parts as $color) {
            $color = hexdec($color);
            $color = round(max(0, min(255, $color + ($color * $lum))));
            $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
        }

        return $return;
    }

    

    function arp_create_alignment_div_new($id, $alignment, $name, $column, $level) {
        $tablestring = '';
        $tablestring .= "<div class='col_opt_input_div' id='" . $id . "'>";
        $left_selected = ($alignment == 'left') ? 'align_selected' : '';
        $center_selected = ($alignment == 'center') ? 'align_selected' : '';
        $right_selected = ($alignment == 'right') ? 'align_selected' : '';
        if (is_rtl()) {
            $tablestring .= "<div class='arp_alignment_btn align_right_btn " . $right_selected . "' data-align='right' id='align_right_btn' data-id='" . $column . "' data-level='" . $level . "'>";
            $tablestring .= "<i class='fas fa-align-right fa-flip-vertical'></i>";
            $tablestring .= "</div>";

            $tablestring .= "<div class='arp_alignment_btn align_center_btn " . $center_selected . "' data-align='center' id='align_center_btn' data-id='" . $column . "' data-level='" . $level . "'>";
            $tablestring .= "<i class='fas fa-align-center fa-flip-vertical'></i>";
            $tablestring .= "</div>";
            
            $tablestring .= "<div class='arp_alignment_btn align_left_btn " . $left_selected . "' data-align='left' id='align_left_btn' data-id='" . $column . "' data-level='" . $level . "'>";
            $tablestring .= "<i class='fas fa-align-left fa-flip-vertical'></i>";
            $tablestring .= "</div>";
        }else{
            $tablestring .= "<div class='arp_alignment_btn align_left_btn " . $left_selected . "' data-align='left' id='align_left_btn' data-id='" . $column . "' data-level='" . $level . "'>";
            $tablestring .= "<i class='fas fa-align-left fa-flip-vertical'></i>";
            $tablestring .= "</div>";

            $tablestring .= "<div class='arp_alignment_btn align_center_btn " . $center_selected . "' data-align='center' id='align_center_btn' data-id='" . $column . "' data-level='" . $level . "'>";
            $tablestring .= "<i class='fas fa-align-center fa-flip-vertical'></i>";
            $tablestring .= "</div>";

            $tablestring .= "<div class='arp_alignment_btn align_right_btn " . $right_selected . "' data-align='right' id='align_right_btn' data-id='" . $column . "' data-level='" . $level . "'>";
            $tablestring .= "<i class='fas fa-align-right fa-flip-vertical'></i>";
            $tablestring .= "</div>";
        }

        $tablestring .= "<input type='hidden' id='$name' value='" . $alignment . "' name='" . $name . "'>";

        $tablestring .= "</div>";


        return $tablestring;
        die();
    }

    function arp_create_alignment_div($id, $alignment, $name, $column, $level, $edit_in_place = false) {
        $tablestring = '';
        $row_cls = 'col_opt_row';
        if( $edit_in_place ){
            $row_cls = 'edit_in_place_row';
        }
        $tablestring .= "<div class='{$row_cls}' id='" . $id . "'>";
        $tablestring .= "<div class='col_opt_title_div'>" . esc_html__('Text Alignment', 'ARPrice') . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";
        $left_selected = ($alignment == 'left') ? 'align_selected' : '';
        $center_selected = ($alignment == 'center') ? 'align_selected' : '';
        $right_selected = ($alignment == 'right') ? 'align_selected' : '';

        $tablestring .= "<div class='arp_alignment_btn align_left_btn " . $left_selected . "' data-align='left' id='align_left_btn' data-id='" . $column . "' data-level='" . $level . "'>";
        $tablestring .= "<i class='fas fa-align-left fa-flip-vertical'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_alignment_btn align_center_btn " . $center_selected . "' data-align='center' id='align_center_btn' data-id='" . $column . "' data-level='" . $level . "'>";
        $tablestring .= "<i class='fas fa-align-center fa-flip-vertical'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_alignment_btn align_right_btn " . $right_selected . "' data-align='right' id='align_right_btn' data-id='" . $column . "' data-level='" . $level . "'>";
        $tablestring .= "<i class='fas fa-align-right fa-flip-vertical'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<input type='hidden' id='$name' value='" . $alignment . "' name='" . $name . "_" . $column . "'>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        return $tablestring;
        die();
    }

    function arp_pricing_table_editor_hover_css($ref_template){
        global $arp_pricingtable;

        $arp_template_hover_css = $arp_pricingtable->arp_template_editor_hover_css();

        $hover_arr = $arp_template_hover_css[$ref_template];

        $hoverstring = "";

        foreach ($hover_arr as $key => $value) {
            $hoverstring .= $key.'{ position:relative; }';

            foreach( $value as $k => $buttons ){


                $hoverstring .= $key.":hover .$k{";
                    $hoverstring .= "display:block !important;";
                $hoverstring .= "}";

                $hoverstring .= $key.":not(.selected) .$k{";
                    $hoverstring .= "left:100% !important;";
                $hoverstring .= "}";

                foreach( $buttons as $j => $btn){
                    $hoverstring .= $key.":hover .$k #$btn{";
                        $hoverstring .= "display:block !important;";
                    $hoverstring .= "}";
                }
            }
        }

        
        return $hoverstring;
    }

    function arp_get_templates_tobe_migrated(){
        global $wpdb;
        $return = array();
        $html_content = "";
        if( isset($_POST['action']) && $_POST['action'] == 'arp_get_migrate_template'){
            $current_table_id = $_POST['current_table_id'];
            $default_templates = "SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE is_template = %d AND status = %s AND ID != %d ORDER BY is_template DESC, is_animated ASC, ID ASC";
            $default_templates = $wpdb->get_results($wpdb->prepare($default_templates, 0, 'published',$current_table_id));

            $arp_tables_to_import = array();
            foreach( $default_templates as $key => $template ){

                $template_opt = maybe_unserialize($template->general_options);
                $template_name = $template_opt['template_setting']['template'];
                $arp_reference_template = $template_opt['general_settings']['reference_template'];
                $table_name = $template->table_name;
                $arp_template_id = $template->ID;
                if( $current_table_id == $arp_template_id){
                    continue;
                }
                array_push($arp_tables_to_import,$current_table_id);
                
                $html_content .= '<div class="arp_template_migration_wrapper">';
                    $html_content .= '<div class="arp_template_migration_title">'.esc_html($table_name).' ('.esc_html__( 'Table ID', 'ARPrice').': '.$arp_template_id.')</div>';
                    $html_content .= '<div class="arp_template_migration_div" data-template-id="'.$template_opt['general_settings']['reference_template'].'||'.$arp_template_id.'">';
                        $html_content .= file_exists(PRICINGTABLE_UPLOAD_DIR.'/template_images/arptemplate_'.$arp_template_id.'_big.png') ? "<img src='".PRICINGTABLE_UPLOAD_URL."/template_images/arptemplate_".$arp_template_id."_big.png' alt='".esc_html($table_name)."' align='absmiddle' />" : '<span class="migration_no_image_text">No Image</span>';
                        $html_content .= '<div class="arp_template_selection_inner_div">';
                            $html_content .= '<div class="arp_template_selection_icon_div"></div>';
                        $html_content .= '</div>';
                    $html_content .= '</div>';
                $html_content .= '</div>';
            }
            if( count($arp_tables_to_import) == 0 ){
                $html_content .= '<span class="migrate_table_empty_notice">'.esc_html__("Currently, There is no any other table to import data from.",'ARPrice').'</span>';
            }
            $results['success'] = true;
            $results['message'] = $html_content;
            echo json_encode( $results );
        } else {
            echo json_encode(array('success'=>false));
        }
        die;
    }

    function arp_load_js_css( $table_id, $is_template ){
        global $arprice_images_css_version;
        $arp_db_version = get_option('arprice_version');
        
        if( $is_template ){
            $arp_stylesheet_url = PRICINGTABLE_URL.'/css/templates/arptemplate_'.$table_id.'_v'.$arprice_images_css_version.'.css';
        } else {
            $arp_stylesheet_url = PRICINGTABLE_UPLOAD_URL.'/css/arptemplate_' . $table_id.'.css';
        }

        $arp_return_link = '';

        $load_all_js_css = get_option('arp_load_js_css');

        $arp_style_handler = 'arptemplate_'.$table_id.'_css';

        if( 'arp_load_js_css' != $load_all_js_css && !wp_style_is( $arp_style_handler, 'enqueued') ){
            wp_enqueue_style( $arp_style_handler, $arp_stylesheet_url );
        } else {
            $arp_return_link = '<link rel="stylesheet" id="arptemplate_'.$table_id.'_fallback-css" href="'.$arp_stylesheet_url.'" />';
        }
        return $arp_return_link;
    }

    function arp_load_js_on_footer(){
        $arp_load_js_css = get_option('arp_load_js_css');

        if( isset( $arp_load_js_css ) && 'arp_load_js_css' == $arp_load_js_css ){
            echo '<script type="text/javascript" id="arp_footer_fallback_js" >';
                echo 'if( document.readyState == "complete" ){';
                    echo 'setTimeout(function(){';
                        echo 'arp_load_js_onready();';
                    echo '},1000);';
                echo '};';
                echo 'window.addEventListener("DOMContentLoaded",function(){';
                    echo 'setTimeout(function(){';
                        echo 'arp_load_js_onready();';
                    echo '},1000);';
                echo '});';
            echo '</script>';
        }
    }

    function arp_remove_preview_data(){
        global $arp_pricingtable;
        $check_caps = $arp_pricingtable->arprice_check_user_cap('arp_add_udpate_pricingtables',true);

        if( $check_caps != 'success' ){
            $check_caps_msg = json_decode($check_caps,true);
            die;
        }

        $opt_id = isset( $_POST['opt_id'] ) ? sanitize_text_field( $_POST['opt_id'] ) : '';
        
        if( $opt_id != '' ){
            delete_option($opt_id);
        }
        die;
    }

}
