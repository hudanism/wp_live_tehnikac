<?php

if (!function_exists('arp_get_pricing_table_string_editor')) {

    function arp_get_pricing_table_string_editor($table_id, $pricetable_name = "", $is_tbl_preview = 0, $general_option = '', $opts = '', $is_clone = '', $table_options = '') {

        global $wpdb, $arprice_form, $arprice_fonts, $arprice_version, $arprice_font_awesome_icons, $arp_pricingtable;
        $id = $table_id;
        $name = esc_html($pricetable_name);

        if (is_ssl()) {
            $googlefontpreviewurl = "https://www.google.com/fonts/specimen/";
        } else {
            $googlefontpreviewurl = "http://www.google.com/fonts/specimen/";
        }

        global $arp_tempbuttonsarr, $arp_mainoptionsarr, $arprice_form, $arprice_fonts, $arprice_default_settings;

        global $arprice_class;
        $setact = 0;
        global $arp_chk_version;
        $setact = 1;

        $total_tabs = $arp_pricingtable->arp_toggle_step_name();

        $arp_is_rtl = is_rtl();
        $tablestring = "";
        $title_cls = "";
        $header_cls = "";

        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();

        $default_fonts_string = '';
        $google_fonts_string = '';
        foreach ($default_fonts as $font) {
            $default_fonts_string .= "<li class='arp_selectbox_option' data-font-type='normal' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        foreach ($google_fonts as $font) {
            $google_fonts_string .= "<li class='arp_selectbox_option' data-font-type='google' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "   <style type='text/css'>
	    body { overflow-x: hidden;} 
		.tooltipster-content{
			font-family: 'Open Sans' !important;
			font-size: 13px;
			font-weight: normal;
			line-height: normal !important;
			padding: 5px 10px !important;
		}
		.tooltipster-base{
			width:auto !important;
			border:none;
			border-radius:2px;
				-moz-border-radius:2px;
				-webkit-border-radius:2px;
				-o-border-radius:2px;
			min-height:30px;
			box-shadow:0 1px 2px rgba(0, 0, 0, 0.5);
				-moz-box-shadow:0 1px 2px rgba(0, 0, 0, 0.5);
				-webkit-box-shadow:0 1px 2px rgba(0, 0, 0, 0.5);
				-o-box-shadow:0 1px 2px rgba(0, 0, 0, 0.5);
			background:#43B4FB;
			color:#ffffff;
		}
        .alignment_btn i, .arp_alignment_btn i{
            font-family: unset;
            float: left;
            font-size: 23px;
            margin-top: 0px;
        }
       .font_settings_options_dropdown .fa-align-left:before, .alignment_btn .fa-align-left:before, .arp_alignment_btn .fa-align-left:before {
            content: '';
            background: url(../wp-content/plugins/arprice/images/arp_sprite.png) no-repeat -523px -162px;
            height: 25px;
            width: 30px;
            display: block;
        }
        .font_settings_options_dropdown .fa-align-center:before, .alignment_btn .fa-align-center:before, .arp_alignment_btn .fa-align-center:before {
            content: '';
            background: url(../wp-content/plugins/arprice/images/arp_sprite.png) no-repeat -549px -162px;
            height: 25px;
            width: 30px;
            display: block;
        }
        .font_settings_options_dropdown .fa-align-right:before, .alignment_btn .fa-align-right:before, .arp_alignment_btn .fa-align-right:before {
            content: '';
            background: url(../wp-content/plugins/arprice/images/arp_sprite.png) no-repeat -574px -162px;
            height: 25px;
            width: 30px;
            display: block;
        }

        .alignment_btn:hover .fa-align-left:before, .arp_alignment_btn:hover .fa-align-left:before, .alignment_btn.align_selected .fa-align-left:before, .arp_alignment_btn.align_selected .fa-align-left:before{
            background: #fff url(../wp-content/plugins/arprice/images/arp_sprite.png) no-repeat -523px -188px;
            content: '';
            height: 25px;
            width: 30px;
            display: block;
        }
        .alignment_btn:hover .fa-align-center:before, .arp_alignment_btn:hover .fa-align-center:before, .alignment_btn.align_selected .fa-align-center:before, .arp_alignment_btn.align_selected .fa-align-center:before{
            background: #fff url(../wp-content/plugins/arprice/images/arp_sprite.png) no-repeat -549px -188px;
            content: '';
            height: 25px;
            width: 30px;
            display: block;
        }
        .alignment_btn:hover .fa-align-right:before, .arp_alignment_btn:hover .fa-align-right:before, .alignment_btn.align_selected .fa-align-right:before, .arp_alignment_btn.align_selected .fa-align-right:before{
            background: #fff url(../wp-content/plugins/arprice/images/arp_sprite.png) no-repeat -574px -188px;
            content: '';
            height: 25px;
            width: 30px;
            display: block;
        }
        .CodeMirror-lint-tooltip{
            z-index: 1000 !important;
        }
        .CodeMirror-wrap{
            height: 330px !important;
        }
    </style>";

        if (isset($_REQUEST['arp_action']) && $_REQUEST['arp_action'] == 'edit') {

            $tablestring .= "<script type='text/javascript'>
    			jQuery(document).ready(function(){
    				var right_side_tooltip_options = '';
    				var left_side_tooltip_options = '';
                        jQuery('.arp_btn:not(\'.selected\')').each(function(){
                            var tipso_pos = 'left';
                            if( jQuery(this).parent().hasClass('column_level_button_wrapper') ){
                                var tipso_pos = 'bottom';
                            }
                            jQuery(this).tipso({
                                position:tipso_pos,
                                background:'#43B4FB',
                                width:'auto',
                            });
                        });
    			});
            </script>";
        }

        
        if ($is_tbl_preview && $is_tbl_preview == 1) {
            if (isset($_REQUEST['optid']) && $_REQUEST['optid'] != '') {
                $post_values = get_option($_REQUEST['optid']);
                $get_preview_data = $arprice_form->get_preview_table($post_values);

                $id = $table_id = $get_preview_data['table_id'];
                $is_animated = $get_preview_data['is_animated'];
                $opts = maybe_unserialize($get_preview_data['table_options']);
                $general_option = maybe_unserialize($get_preview_data['general_options']);
            }
        } else if ($is_tbl_preview && $is_tbl_preview == 3) {
            $opts = maybe_unserialize($opts);
            $general_option = maybe_unserialize($general_option);
        } else {
            $sql = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d AND status = %s ", $id, 'published'));

            $table_id = $sql->ID;
            $is_animated = $sql->is_animated;
            if($table_options != ''){
                $opts = maybe_unserialize($table_options);
            } else {
                $sql_opt = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d ", $table_id));
                $opts = maybe_unserialize($sql_opt[0]->table_options);
            }
            $general_option = maybe_unserialize($sql->general_options);
            $is_template = $sql->is_template;
            apply_filters('arp_append_googlemap_js', $table_id);
        }
        $table_cols = array();
        $table_cols = $table_cols_new = $opts['columns'];

        $arp_table_data = array();

        $maxrowcount = 0;
        if (is_array($table_cols)) {
            foreach ($table_cols as $countcol) {
                if (isset($countcol['rows']) && count($countcol['rows']) > $maxrowcount){
                    $maxrowcount = count($countcol['rows']);
                }
            }
            $maxrowcount--;
        }

        $opts['columns'] = $table_cols;

        $total_columns = count($table_cols);

        $column_animation = $general_option['column_animation'];

        $is_animation = $column_animation['is_animation'];

        $column_settings = $general_option['column_settings'];

        $hover_type = $column_settings['column_highlight_on_hover'];

        $template_settings = $general_option['template_setting'];

        $general_settings = $general_option['general_settings'];

        $template_type = $template_settings['template_type'];

        $template = $template_settings['template'];

        $ref_template = $general_settings['reference_template'];

        $template_id = $template_settings['template'];

        $tooltip_settings = $general_option['tooltip_settings'];

        $arp_template_skin = $template_settings['skin'];

        $is_responsive = $general_option['column_settings']['is_responsive'];

        $arp_template_custom_color = isset($template_settings['custom_color_code']) ? $template_settings['custom_color_code'] : '';

        $reference_template = $general_settings['reference_template'];

        $arp_global_button_type = isset($column_settings['arp_global_button_type']) ? $column_settings['arp_global_button_type'] : 'flat';
        $arp_global_button_class = '';
        $arp_global_button_class_array = $arprice_default_settings->arp_button_type();
        $arp_global_button_size = $arprice_default_settings->arp_button_size_new();
        if ($arp_global_button_type !== 'none') {
            $arp_global_button_class_array[$arp_global_button_type]['class'] = isset($arp_global_button_class_array[$arp_global_button_type]['class']) ? $arp_global_button_class_array[$arp_global_button_type]['class'] : '';
            if (!isset($column_settings['enable_button_hover_effect']) || $column_settings['enable_button_hover_effect'] != 1) {
                $arp_global_button_class = $arp_global_button_class_array[$arp_global_button_type]['class'] . ' arp_button_hover_disable arp_editor';
            } else {
                $arp_global_button_class = $arp_global_button_class_array[$arp_global_button_type]['class'] . ' arp_editor';
            }
        }

        $template_feature = $arp_mainoptionsarr['general_options']['template_options']['features'][$ref_template];

        $allow_row_level_button = isset( $template_feature['allow_row_level_button'] ) ? $template_feature['allow_row_level_button'] : false;

        $pricing_table_updated_ids = get_option('arprice_version_v39_updated_forms');

        foreach( $table_cols as $col_key => $tab_col ){
            if( !isset($arp_table_data[$col_key]) ){
                $arp_table_data[$col_key] = array();
            }
            
            $rows = isset($tab_col['rows']) ? $tab_col['rows'] : array();

            if( !isset( $arp_table_data[$col_key]['rows'] ) ){
                $arp_table_data[$col_key]['rows'] = array();
            }

            $arp_table_data[$col_key]['button_content']['size'] = isset( $tab_col['button_size'] ) ? $tab_col['button_size'] : '';
            
            $arp_table_data[$col_key]['button_content']['height'] = isset( $tab_col['button_height'] ) ? $tab_col['button_height'] : '';
            
            $arp_table_data[$col_key]['button_content']['hide_default_btn'] = isset( $tab_col['hide_default_btn'] ) ? $tab_col['hide_default_btn'] : 0;
            $arp_table_data[$col_key]['button_content']['is_new_window'] = isset( $tab_col['is_new_window'] ) ? $tab_col['is_new_window'] : 0;
            $arp_table_data[$col_key]['button_content']['is_new_window_actual'] = isset( $tab_col['is_new_window_actual'] ) ? $tab_col['is_new_window_actual'] : 0;
            $arp_table_data[$col_key]['button_content']['is_nofollow_link'] = isset( $tab_col['is_nofollow_link'] ) ? $tab_col['is_nofollow_link'] : 0;

            $arp_table_data[$col_key]['button_content']['min_height'] = isset( $tab_col['button_min_height'] ) ? $tab_col['button_min_height'] : '';

            $g = 0;
            foreach( $total_tabs as $key => $tab_name ){
                $cbKey = ( $g == 0 ) ? 'btn_content' : 'btn_content_' . $tab_name[2];
                $bdKey = ( $g == 0 ) ? 'button_text' : 'btn_content_' . $tab_name[2];

                $bikey = ( $g == 0) ? 'image' : 'image_' . $tab_name[2];
                $bival = ( $g == 0) ? 'btn_img' : 'btn_img_' . $tab_name[2];

                $bhkey = ( $g == 0) ? 'image_height' : 'image_height_' . $tab_name[2];
                $bhval = ( $g == 0) ? 'btn_img_height' : 'btn_img_height_' . $tab_name[2];

                $bwkey = ( $g == 0) ? 'image_width' : 'image_width_' . $tab_name[2];
                $bwval = ( $g == 0) ? 'btn_img_width' : 'btn_img_width_' . $tab_name[2];

                $dukey = ( $g == 0 ) ? 'btn_url' : 'btn_url_' . $tab_name[2];
                $cukey = ( $g == 0 ) ? 'button_url' : 'button_url_'. $tab_name[2];

                $dekey = ( $g == 0 ) ? 'embed_script' : 'embed_script_' . $tab_name[2];
                $cekey = ( $g == 0 ) ? 'paypal_code' : 'paypal_code_' . $tab_name[2];

                $dfkey = ( $g == 0 ) ? 'footer_content' : 'footer_content_' . $tab_name[2];
                $cfkey = ( $g == 0 ) ? 'footer_content' : 'footer_content_' . $tab_name[2];

                $arp_table_data[$col_key]['button_content'][$cbKey] = isset( $tab_col[$bdKey] ) ? $tab_col[$bdKey] : ''; 

                if( $g > 0 && empty( $tab_col[$bival] ) && !empty( $pricing_table_updated_ids ) && in_array( $table_id, $pricing_table_updated_ids) ){
                    $arp_table_data[$col_key]['button_content'][$bikey] = isset( $tab_col['btn_img'] ) ? $tab_col['btn_img'] : '';
                } else {
                    $arp_table_data[$col_key]['button_content'][$bikey] = isset( $tab_col[$bival] ) ? $tab_col[$bival] : '';
                }

                if( $g > 0 && empty( $tab_col[$bhval] ) && !empty( $pricing_table_updated_ids ) && in_array( $table_id, $pricing_table_updated_ids ) ){
                    $arp_table_data[$col_key]['button_content'][$bhkey] = isset( $tab_col['image_height'] ) ? $tab_col['image_height'] : '';
                } else {
                    $arp_table_data[$col_key]['button_content'][$bhkey] = isset( $tab_col[$bhval] ) ? $tab_col[$bhval] : '';
                }
                if( $g > 0 && empty( $tab_col[$bwval] ) && !empty( $pricing_table_updated_ids ) && in_array( $table_id, $pricing_table_updated_ids ) ){
                    $arp_table_data[$col_key]['button_content'][$bwkey] = isset( $tab_col['image_width'] ) ? $tab_col['image_width'] : '';
                } else {
                    $arp_table_data[$col_key]['button_content'][$bwkey] = isset( $tab_col[$bwval] ) ? $tab_col[$bwval] : '';
                }
                
                $arp_table_data[$col_key]['button_content'][$dukey] = isset( $tab_col[$cukey] ) ? $tab_col[$cukey] : '';

                $arp_table_data[$col_key]['button_content'][$dekey] = isset( $tab_col[$cekey] ) ? $tab_col[$cekey] : '';

                $arp_table_data[$col_key]['footer_content'][$cfkey] = isset( $tab_col[$dfkey] ) ? $tab_col[$dfkey] : '';

                $g++;
            }

            foreach( $rows as $rkey => $rval ){  
                if( false == $allow_row_level_button ){
                    $arp_table_data[$col_key]['rows'][$rkey]['content_type'] =  0;
                } else {
                    $arp_table_data[$col_key]['rows'][$rkey]['content_type'] = isset( $rval['row_content_type'] ) ? $rval['row_content_type'] : 0;
                }

                $arp_table_data[$col_key]['rows'][$rkey]['custom_css'] = isset( $rval['row_custom_css'] ) ? $rval['row_custom_css'] : '';
                $arp_table_data[$col_key]['rows'][$rkey]['hover_custom_css'] = isset( $rval['row_hover_custom_css'] ) ? $rval['row_hover_custom_css'] : '';

                $arp_table_data[$col_key]['rows'][$rkey]['size'] = !empty( $rval['button_size_row'] ) ? $rval['button_size_row'] : $arp_table_data[$col_key]['button_content']['size'];
                $arp_table_data[$col_key]['rows'][$rkey]['height'] = !empty( $rval['button_height_row'] ) ? $rval['button_height_row'] : $arp_table_data[$col_key]['button_content']['height'];              
                $arp_table_data[$col_key]['rows'][$rkey]['hide_default_btn'] = !empty( $rval['hide_default_btn_row'] ) ? $rval['hide_default_btn_row'] : $arp_table_data[$col_key]['button_content']['hide_default_btn'];
                $arp_table_data[$col_key]['rows'][$rkey]['is_new_window'] = !empty( $rval['is_new_window_row'] ) ? $rval['is_new_window_row'] : $arp_table_data[$col_key]['button_content']['is_new_window'];
                $arp_table_data[$col_key]['rows'][$rkey]['is_new_window_actual'] = !empty($rval['is_new_window_actual_row'] ) ? $rval['is_new_window_actual_row'] : $arp_table_data[$col_key]['button_content']['is_new_window_actual'];
                $arp_table_data[$col_key]['rows'][$rkey]['is_nofollow_link'] = !empty( $rval['is_nofollow_link_row'] ) ? $rval['is_nofollow_link_row'] : $arp_table_data[$col_key]['button_content']['is_nofollow_link'];

                $arp_table_data[$col_key]['rows'][$rkey]['image'] = isset( $rval['image_row'] ) ? $rval['image_row'] : '';

                $arp_table_data[$col_key]['rows'][$rkey]['image_height'] = isset( $rval['image_height_row'] ) ? $rval['image_height_row'] : '';
                $arp_table_data[$col_key]['rows'][$rkey]['image_width'] = isset( $rval['image_width_row'] ) ? $rval['image_width_row'] : '';

                $g = 0;
                foreach( $total_tabs as $key => $tab_name ){
                    $irKey = ( $g == 0 ) ? 'description' : 'description_'. $tab_name[2];
                    $rvalKey = ( $g == 0 ) ? 'row_description' : 'row_description_'.$tab_name[2];

                    $rtKey = ( $g == 0 ) ? 'tooltip' : 'tooltip_'.$tab_name[2];
                    $rtipKey = ( $g == 0 ) ? 'row_tooltip' : 'row_tooltip_' . $tab_name[2];

                    $dukey = ( $g == 0 ) ? 'btn_url' : 'btn_url_' . $tab_name[2];
                    $cukey = ( $g == 0 ) ? 'button_url' : 'button_url_'.$tab_name[2];

                    $dekey = ( $g == 0 ) ? 'embed_script' : 'embed_script_' . $tab_name[2];
                    $cekey = ( $g == 0 ) ? 'paypal_code_row' : 'paypal_code_row_' . $tab_name[2];

                    $bikey = ( $g == 0) ? 'image' : 'image_' . $tab_name[2];
                    $bival = ( $g == 0) ? 'image_row' : 'image_row_' . $tab_name[2];

                    $bhkey = ( $g == 0) ? 'image_height' : 'image_height_' . $tab_name[2];
                    $bhval = ( $g == 0) ? 'image_height_row' : 'image_height_row_' . $tab_name[2];

                    $bwkey = ( $g == 0) ? 'image_width' : 'image_width_' . $tab_name[2];
                    $bwval = ( $g == 0) ? 'image_width_row' : 'image_width_row_' . $tab_name[2];

                    $arp_table_data[$col_key]['rows'][$rkey][$irKey] = isset( $rval[$rvalKey] ) ? $rval[$rvalKey] : '';
                    $arp_table_data[$col_key]['rows'][$rkey][$rtKey] = isset( $rval[$rtipKey] ) ? $rval[$rtipKey] : '';

                    $arp_table_data[$col_key]['rows'][$rkey][$dukey] = !empty( $rval[$cukey] ) ? $rval[$cukey] : $arp_table_data[$col_key]['button_content'][$dukey];
                    $arp_table_data[$col_key]['rows'][$rkey][$dekey] = !empty( $rval[$cekey] ) ? $rval[$cekey] : $arp_table_data[$col_key]['button_content'][$dekey];

                    $arp_table_data[$col_key]['rows'][$rkey][$bikey] = isset( $rval[$bival] ) ? $rval[$bival] : $arp_table_data[$col_key]['button_content'][$bikey];
                    $arp_table_data[$col_key]['rows'][$rkey][$bhkey] = isset( $rval[$bhval] ) ? $rval[$bhval] : $arp_table_data[$col_key]['button_content'][$bhkey];
                    $arp_table_data[$col_key]['rows'][$rkey][$bwkey] = isset( $rval[$bwval] ) ? $rval[$bwval] : $arp_table_data[$col_key]['button_content'][$bwkey];
                    
                    $g++;
                }
            }

            if( isset( $tab_col['is_caption'] ) && $tab_col['is_caption'] == 1 ){
                $arp_table_data[$col_key]['body_section']['alignment'] = isset( $tab_col['body_text_alignment'] ) ? $tab_col['body_text_alignment'] : '';
                $arp_table_data[$col_key]['body_section']['font_family'] = isset( $tab_col['content_font_family'] ) ? $tab_col['content_font_family'] : '';
                $arp_table_data[$col_key]['body_section']['font_size'] = isset( $tab_col['content_font_size'] ) ? $tab_col['content_font_size'] : '';
            }

            
            $arp_table_data[$col_key]['footer_content']['position'] = isset( $tab_col['footer_content_position'] ) ? $tab_col['footer_content_position'] : '';
            $arp_table_data[$col_key]['footer_content']['min_height'] = isset( $tab_col['footer_min_height'] ) ? $tab_col['footer_min_height'] : '';
            if( isset( $tab_col['is_caption'] ) && $tab_col['is_caption'] == 1 ){

                $footer_text_alignment_global = isset($general_option['column_settings']['arp_footer_text_alignment']) ? $general_option['column_settings']['arp_footer_text_alignment'] : 'center';

                $footer_text_alignment = isset( $tab_col['footer_text_align'] ) ? $tab_col['footer_text_align'] : $footer_text_alignment_global;

                $arp_table_data[$col_key]['footer_content']['alignment'] = $footer_text_alignment;
                $arp_table_data[$col_key]['footer_content']['font_family'] = isset( $tab_col['footer_level_options_font_family'] ) ? $tab_col['footer_level_options_font_family'] : '';
                $arp_table_data[$col_key]['footer_content']['font_size'] = isset( $tab_col['footer_level_options_font_size'] ) ? $tab_col['footer_level_options_font_size'] : '';
                $arp_table_data[$col_key]['footer_content']['font_bold'] = isset( $tab_col['footer_level_options_font_style_bold'] ) ? $tab_col['footer_level_options_font_style_bold'] : '';
                $arp_table_data[$col_key]['footer_content']['font_italic'] = isset( $tab_col['footer_level_options_font_style_italic'] ) ? $tab_col['footer_level_options_font_style_italic'] : '';
                $arp_table_data[$col_key]['footer_content']['font_decoration'] = isset( $tab_col['footer_level_options_font_style_decoration'] ) ? $tab_col['footer_level_options_font_style_decoration'] :'';
            }

            $g = 0;
            foreach( $total_tabs as $key => $tab_name ){
                $pckey = ( $g == 0 ) ? 'price_text' : 'price_text_'.$tab_name[2];
                $pvkey = ( $g == 0 ) ? 'price_text' : 'price_text_'.$tab_name[3].'_step';

                $arp_table_data[$col_key]['pricing_content'][$pckey] = isset( $tab_col[$pvkey] ) ? $tab_col[$pvkey] : '';
                $g++;
            }
            
            $arp_table_data[$col_key]['pricing_content']['shortcode_style'] = isset( $tab_col['arp_shortcode_customization_style'] ) ? $tab_col['arp_shortcode_customization_style'] : '';
            $arp_table_data[$col_key]['pricing_content']['shortcode_size'] = isset( $tab_col['arp_shortcode_customization_size'] ) ? $tab_col['arp_shortcode_customization_size'] : '';

            $arp_table_data[$col_key]['pricing_content']['font_family'] = isset( $tab_col['price_font_family'] ) ? $tab_col['price_font_family'] : '';

            $g = 0;
            foreach( $total_tabs as $key => $tab_name ){

                if( isset( $tab_col['is_caption'] ) && $tab_col['is_caption'] == 1 ){
                    $hvkey = ( $g == 0 ) ? 'html_content' : 'html_content_'.$tab_name[2];
                } else {
                    $hvkey = ( $g == 0 ) ? 'package_title' : 'package_title_'. $tab_name[2];
                }
                $hckey = ( $g == 0 ) ? 'header_title' : 'header_title_'.$tab_name[2];

                $arp_table_data[$col_key]['header_content'][$hckey] = isset( $tab_col[$hvkey] ) ? $tab_col[$hvkey] : '';
                $g++;
            }

            $arp_table_data[$col_key]['header_content']['alignment'] = isset( $tab_col['header_font_align']) ? $tab_col['header_font_align'] : 'center';
            $arp_table_data[$col_key]['header_content']['font_family'] = isset( $tab_col['header_font_family'] ) ? $tab_col['header_font_family'] : '';
            $arp_table_data[$col_key]['header_content']['font_size'] = isset( $tab_col['header_font_size'] ) ? $tab_col['header_font_size'] : '';
            $arp_table_data[$col_key]['header_content']['font_bold'] = isset( $tab_col['header_style_bold'] ) ? $tab_col['header_style_bold'] : '';
            $arp_table_data[$col_key]['header_content']['font_italic'] = isset( $tab_col['header_style_italic'] ) ? $tab_col['header_style_italic'] : '';
            $arp_table_data[$col_key]['header_content']['font_decoration'] = isset( $tab_col['header_style_decoration'] ) ? $tab_col['header_style_decoration'] : '';
            $arp_table_data[$col_key]['header_content']['shortcode_min_height'] = isset( $tab_col['shortcode_min_height']) ? $tab_col['shortcode_min_height'] : '';

            $g = 0;
            foreach( $total_tabs as $key => $tab_name ){
                $hsvkey = ( $g == 0 ) ? 'arp_header_shortcode' : 'arp_header_shortcode_' . $tab_name[2];
                $hsckey = ( $g == 0 ) ? 'header_shortcode' : 'header_shortcode_' . $tab_name[2];

                $arp_table_data[$col_key]['header_content']['min_height_' . $tab_name[2]] = isset( $tab_col['min_height_' . $tab_name[2]] ) ? $tab_col['min_height_' . $tab_name[2]] : '';

                $arp_table_data[$col_key]['header_content'][$hsckey] = isset( $tab_col[$hsvkey] ) ? $tab_col[$hsvkey] : '';

                $g++;
            }

            $arp_table_data[$col_key]['header_content']['shortcode_style'] = isset( $tab_col['arp_shortcode_customization_style'] ) ? $tab_col['arp_shortcode_customization_style'] : '';
            $arp_table_data[$col_key]['header_content']['shortcode_size'] = isset( $tab_col['arp_shortcode_customization_size'] ) ? $tab_col['arp_shortcode_customization_size'] : '';

            $g = 0;
            foreach( $total_tabs as $key => $tab_name ){
                $cdvkey = ( $g == 0 ) ? 'column_description' : 'column_description_' . $tab_name[2];
                $cdckey = ( $g == 0 ) ? 'description' : 'description_' . $tab_name[2];

                $arp_table_data[$col_key]['column_description'][$cdckey] = isset( $tab_col[$cdvkey] ) ? $tab_col[$cdvkey] : '';

                $g++;
            }

            $arp_table_data[$col_key]['column_description']['min_height'] = isset( $tab_col['col_desc_min_height'] ) ? $tab_col['col_desc_min_height'] : '';

            $arp_table_data[$col_key]['color_section']['column_bg_color'] = isset( $tab_col['column_background_color'] ) ? $tab_col['column_background_color'] : '';
            $arp_table_data[$col_key]['color_section']['column_hover_bg_color'] = isset( $tab_col['column_hover_background_color'] ) ? $tab_col['column_hover_background_color'] : '';

            $arp_table_data[$col_key]['color_section']['header_bg_color'] = isset( $tab_col['header_background_color'] ) ? $tab_col['header_background_color'] : '';
            $arp_table_data[$col_key]['color_section']['header_hover_bg_color'] = isset( $tab_col['header_hover_background_color'] ) ? $tab_col['header_hover_background_color'] : '';
            
            $arp_table_data[$col_key]['color_section']['header_font_color'] = isset( $tab_col['header_font_color'] ) ? $tab_col['header_font_color'] : '';
            $arp_table_data[$col_key]['color_section']['header_hover_font_color'] = isset( $tab_col['header_hover_font_color'] ) ? $tab_col['header_hover_font_color'] : '';

            $arp_table_data[$col_key]['color_section']['price_bg_color'] = isset( $tab_col['price_background_color'] ) ? $tab_col['price_background_color'] : '';
            $arp_table_data[$col_key]['color_section']['price_hover_bg_color'] = isset( $tab_col['price_hover_background_color'] ) ? $tab_col['price_hover_background_color'] : '';
            
            $arp_table_data[$col_key]['color_section']['price_font_color'] = isset( $tab_col['price_font_color'] ) ? $tab_col['price_font_color'] : '';
            $arp_table_data[$col_key]['color_section']['price_hover_font_color'] = isset( $tab_col['price_hover_font_color'] ) ? $tab_col['price_hover_font_color'] : '';
            
            $arp_table_data[$col_key]['color_section']['price_text_font_color'] = isset( $tab_col['price_text_font_color'] ) ? $tab_col['price_text_font_color'] : '';
            $arp_table_data[$col_key]['color_section']['price_text_hover_font_color'] = isset( $tab_col['price_text_hover_font_color'] ) ? $tab_col['price_text_hover_font_color'] : '';
            
            $arp_table_data[$col_key]['color_section']['content_font_color'] = isset( $tab_col['content_font_color'] ) ? $tab_col['content_font_color'] : '';
            $arp_table_data[$col_key]['color_section']['content_even_font_color'] = isset( $tab_col['content_even_font_color'] ) ? $tab_col['content_even_font_color'] : '';
            
            $arp_table_data[$col_key]['color_section']['content_hover_font_color'] = isset( $tab_col['content_hover_font_color'] ) ? $tab_col['content_hover_font_color'] : '';
            $arp_table_data[$col_key]['color_section']['content_even_hover_font_color'] = isset( $tab_col['content_even_hover_font_color'] ) ? $tab_col['content_even_hover_font_color'] : '';
            
            $arp_table_data[$col_key]['color_section']['content_odd_color'] = isset( $tab_col['content_odd_color'] ) ? $tab_col['content_odd_color'] : '';
            $arp_table_data[$col_key]['color_section']['content_odd_hover_color'] = isset( $tab_col['content_odd_hover_color'] ) ? $tab_col['content_odd_hover_color'] : '';
            
            $arp_table_data[$col_key]['color_section']['content_even_color'] = isset( $tab_col['content_even_color'] ) ? $tab_col['content_even_color'] : '';
            $arp_table_data[$col_key]['color_section']['content_even_hover_color'] = isset( $tab_col['content_even_hover_color'] ) ? $tab_col['content_even_hover_color'] : '';

            $arp_table_data[$col_key]['color_section']['button_bg_color'] = isset( $tab_col['button_background_color'] ) ? $tab_col['button_background_color'] : '';
            $arp_table_data[$col_key]['color_section']['button_hover_bg_color'] = isset( $tab_col['button_hover_background_color'] ) ? $tab_col['button_hover_background_color'] : '';
            
            $arp_table_data[$col_key]['color_section']['button_font_color'] = isset( $tab_col['button_font_color'] ) ? $tab_col['button_font_color'] : '';
            $arp_table_data[$col_key]['color_section']['button_hover_font_color'] = isset( $tab_col['button_hover_font_color'] ) ? $tab_col['button_hover_font_color'] : '';
            
            $arp_table_data[$col_key]['color_section']['footer_font_color'] = isset( $tab_col['footer_level_options_font_color'] ) ? $tab_col['footer_level_options_font_color'] : '';
            $arp_table_data[$col_key]['color_section']['footer_hover_font_color'] = isset( $tab_col['footer_level_options_hover_font_color'] ) ? $tab_col['footer_level_options_hover_font_color'] : '';
            
            $arp_table_data[$col_key]['color_section']['footer_background_color'] = isset( $tab_col['footer_background_color'] ) ? $tab_col['footer_background_color'] : '';
            $arp_table_data[$col_key]['color_section']['footer_hover_background_color'] = isset( $tab_col['footer_hover_background_color'] ) ? $tab_col['footer_hover_background_color'] : '';

            $arp_table_data[$col_key]['color_section']['caption_border_color'] = isset( $general_option['column_settings']['arp_caption_border_color'] ) ? $general_option['column_settings']['arp_caption_border_color'] : '';
            $arp_table_data[$col_key]['color_section']['caption_row_border_color'] = isset( $general_option['column_settings']['arp_caption_row_border_color'] ) ? $general_option['column_settings']['arp_caption_row_border_color'] : '';

            $arp_table_data[$col_key]['color_section']['shortcode_bg_color'] = isset( $tab_col['shortcode_background_color'] ) ? $tab_col['shortcode_background_color'] : '';
            $arp_table_data[$col_key]['color_section']['shortcode_hover_bg_color'] = isset( $tab_col['shortcode_hover_background_color'] ) ? $tab_col['shortcode_hover_background_color'] : '';

            $arp_table_data[$col_key]['color_section']['shortcode_font_color'] = isset( $tab_col['shortcode_font_color'] ) ? $tab_col['shortcode_font_color'] : '';
            $arp_table_data[$col_key]['color_section']['shortcode_hover_font_color'] = isset( $tab_col['shortcode_hover_font_color'] ) ? $tab_col['shortcode_hover_font_color'] : '';

            $arp_table_data[$col_key]['color_section']['column_description_font_color'] = isset( $tab_col['column_description_font_color'] ) ? $tab_col['column_description_font_color'] : '';
            $arp_table_data[$col_key]['color_section']['column_description_hover_font_color'] = isset( $tab_col['column_description_hover_font_color'] ) ? $tab_col['column_description_hover_font_color'] : '';

            $arp_table_data[$col_key]['color_section']['column_desc_bg_color'] = isset( $tab_col['column_desc_background_color'] ) ? $tab_col['column_desc_background_color'] : '';
            $arp_table_data[$col_key]['color_section']['column_desc_hover_bg_color'] = isset( $tab_col['column_desc_hover_background_color'] ) ? $tab_col['column_desc_hover_background_color'] : '';


            $arp_table_data[$col_key]['column_section']['column_width'] = isset( $tab_col['column_width'] ) ? $tab_col['column_width'] : '';
            $arp_table_data[$col_key]['column_section']['caption_border_size'] = isset( $general_option['column_settings']['arp_caption_border_size'] ) ? $general_option['column_settings']['arp_caption_border_size'] : '';
            $arp_table_data[$col_key]['column_section']['caption_border_style'] = isset( $general_option['column_settings']['arp_caption_border_style']) ? $general_option['column_settings']['arp_caption_border_style'] : '';
            $arp_table_data[$col_key]['column_section']['caption_border_left'] = isset( $general_option['column_settings']['arp_caption_border_left'] ) ? $general_option['column_settings']['arp_caption_border_left'] : '';
            $arp_table_data[$col_key]['column_section']['caption_border_right'] = isset( $general_option['column_settings']['arp_caption_border_right'] ) ? $general_option['column_settings']['arp_caption_border_right'] : '';
            $arp_table_data[$col_key]['column_section']['caption_border_top'] = isset( $general_option['column_settings']['arp_caption_border_top'] ) ? $general_option['column_settings']['arp_caption_border_top'] : '';
            $arp_table_data[$col_key]['column_section']['caption_border_bottom'] = isset( $general_option['column_settings']['arp_caption_border_bottom'] ) ? $general_option['column_settings']['arp_caption_border_bottom'] : '';

            $arp_table_data[$col_key]['column_section']['column_background_image'] = isset( $tab_col['column_background_image'] ) ? $tab_col['column_background_image'] : '';
            $arp_table_data[$col_key]['column_section']['column_background_scaling'] = isset( $tab_col['column_background_scaling'] ) ? $tab_col['column_background_scaling'] : '';
            $arp_table_data[$col_key]['column_section']['column_background_image_height'] = isset( $tab_col['column_background_image_height'] ) ? $tab_col['column_background_image_height'] : '';
            $arp_table_data[$col_key]['column_section']['column_background_image_width'] = isset( $tab_col['column_background_image_width'] ) ? $tab_col['column_background_image_width'] : '';
            $arp_table_data[$col_key]['column_section']['column_background_min_positon'] = isset( $tab_col['column_background_min_positon'] ) ? $tab_col['column_background_min_positon'] : '50';
            $arp_table_data[$col_key]['column_section']['column_background_max_positon'] = isset( $tab_col['column_background_max_positon'] ) ? $tab_col['column_background_max_positon'] : '50';

            $arp_table_data[$col_key]['column_section']['column_highlight'] = isset( $tab_col['column_highlight'] ) ? $tab_col['column_highlight'] : '';

            $arp_table_data[$col_key]['column_section']['arp_ribbon'] = isset( $tab_col['ribbon_setting']['arp_ribbon'] ) ? $tab_col['ribbon_setting']['arp_ribbon'] : '';
            $arp_table_data[$col_key]['column_section']['arp_ribbon_bgcol'] = isset( $tab_col['ribbon_setting']['arp_ribbon_bgcol'] ) ? $tab_col['ribbon_setting']['arp_ribbon_bgcol'] : '';
            $arp_table_data[$col_key]['column_section']['arp_ribbon_txtcol'] = isset( $tab_col['ribbon_setting']['arp_ribbon_txtcol'] ) ? $tab_col['ribbon_setting']['arp_ribbon_txtcol'] : '';
            $arp_table_data[$col_key]['column_section']['arp_ribbon_position'] = isset( $tab_col['ribbon_setting']['arp_ribbon_position'] ) ? $tab_col['ribbon_setting']['arp_ribbon_position'] : '';

            $arp_table_data[$col_key]['column_section']['arp_ribbon_custom_position_rl'] = isset( $tab_col['ribbon_setting']['arp_ribbon_custom_position_rl'] ) ? $tab_col['ribbon_setting']['arp_ribbon_custom_position_rl'] : '';
            $arp_table_data[$col_key]['column_section']['arp_ribbon_custom_position_top'] = isset( $tab_col['ribbon_setting']['arp_ribbon_custom_position_top'] ) ? $tab_col['ribbon_setting']['arp_ribbon_custom_position_top'] : '';
            

            $g = 0;
            foreach( $total_tabs as $key => $tab_name ){
                $nkey = ( $g == 0 ) ? 'arp_ribbon_content' : 'arp_ribbon_content_' . $tab_name[2];
                $ckey = ( $g == 0 ) ? 'arp_custom_ribbon' : 'arp_custom_ribbon_' . $tab_name[2];

                $pvkey = ( $g == 0 ) ? 'post_variables_content' : 'post_variables_content_'.$tab_name[2];

                $arp_table_data[$col_key]['column_section'][$nkey] = isset( $tab_col['ribbon_setting'][$nkey] ) ? $tab_col['ribbon_setting'][$nkey] : '';
                $arp_table_data[$col_key]['column_section'][$ckey] = isset( $tab_col['ribbon_setting'][$ckey] ) ? $tab_col['ribbon_setting'][$ckey] : ''; 

                $arp_table_data[$col_key]['column_section'][$pvkey] = isset( $tab_col[$pvkey] ) ? $tab_col[$pvkey] : '';

                $g++;
            }


        }


        echo '<input type="hidden" id="arp_table_data" name="arp_table_data" value="'. htmlspecialchars( json_encode( $arp_table_data ) ). '" />';

        

        $shadow_style = '';
        if ($column_settings['column_border_radius_top_left'] == 0 && $column_settings['column_border_radius_top_right'] == 0 && $column_settings['column_border_radius_bottom_right'] == 0 && $column_settings['column_border_radius_bottom_left'] == 0) {
            $shadow_style = $column_settings['column_box_shadow_effect'];
        }


        $caption_col = array();

        if (is_array($opts['columns'])) {
            foreach ($opts['columns'] as $key => $val) {
                if (isset($val['is_caption']) && $val['is_caption'] == 1) {
                    $caption_col[] = 1;
                } else {
                    $caption_col[] = 0;
                }
            }
        }

        $isTourGuide = '';

        if( isset( $_GET['tour_guid'] ) && $_GET['tour_guid'] == 'true' ){
            $isTourGuide = 'pricingtable_menu_belt_tour_guide';
        }

        $tablestring .= "<div class='pricingtable_menu_belt ".$isTourGuide."' style='display:block;'>";

        $tablestring .= "<div class='pricingtable_menu_inner'>";

        $tablestring .= "<div class='pricing_table_editor_logo'>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='pricing_table_main'>";

        $tablestring .= "<div class='pt_table_main_cnt'>";
        
        $tablestring .= "<div class='header_table_name enable' data-image='" . PRICINGTABLE_IMAGES_URL . "/icons/edit-icon_hover.png' id='main_pricing_table_name'>";
        $tablestring .= "<input type='text' name='pricing_table_main' id='pricing_table_main' class='arp_pricing_table_name' value='" . $name . "'>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $arp_load_after_migration = ( isset($column_settings['arp_load_first_time_after_migration']) && $column_settings['arp_load_first_time_after_migration'] != "") ? $column_settings['arp_load_first_time_after_migration'] : 0;

        $tablestring .= "<input type='hidden' name='arprice_load_after_migrate' value='" . $arp_load_after_migration . "' id='arprice_load_after_migration' />";

        $tablestring .= "</div>";

        $tablestring .= "<div class='pricing_table_btns'>";

        $display = ( empty($id) or $is_clone == 1 ) ? 'display:none;' : '';

        $shortcode_txt = (!empty($id) ) ? '<div id="arp_shortcode_value" style="float:right;" >[ARPrice id=' . $id . ']</div>' : '<div id="arp_shortcode_value" style="float:right;"></div>';

        $tablestring .= "<div id='arp_shortcode' class='arp_shortcode_main arp_shortcode arptooltipster' title='Shortcode' style='" . $display . "' >";

        $tablestring .= "<div class='arp_shortcode_icon' id='arprice_shortcode_icon'></div>";


        $tablestring .= "</div>";

        
        $tablestring .= '<div class="arprice_editor_shortcode_list_content">
                            <ul id="arf_editor_saved_form_shortcodes" class="arf_editor_form_shortcode_list" >
                                <li class="arprice_editor_shortcode_header">'.esc_html__("Shortcode", 'ARPrice').'</li>
                                <li class="arprice_editor_shortcode">
                                    <span class="arprice_shortcode_label">'.esc_html__("Embed Inline Pricing Table", 'ARPrice').'</span>
                                    <span id="arp_shortcode_value" class="arprice_shortcode_content">[ARPrice id='.$id.']</span>
                                </li>
                            </ul>

                        </div>';
        

        $tablestring .= "<div class='btn_field' style='float:right;height:100%;'>";

        $tablestring .= "<div class='arp_editor_top_belt_btn enable arp_save_btn' id='save_btn' title=''>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_editor_top_belt_btn arp_preview_btn' data-src='" . $arprice_form->get_direct_link() . "' id='preview_btn' onClick='arp_preview_new(\"" . $arprice_form->get_direct_link() . "\");' >";
        $tablestring .= "</div>";


        $export_option_style =(isset($_REQUEST['arp_action']) && $_REQUEST['arp_action'] =='edit' ) ? '' : 'display:none;';

        $tablestring .= "<div class='arp_editor_top_belt_btn arp_export_btn' id='export_table_options' style='".$export_option_style."'>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_editor_top_belt_btn arp_cancel_btn' id='template_close_btn' onClick='javascript:location.href=\"admin.php?page=arprice\"'>";
        $tablestring .= "</div>";

        $arp_template = isset($arp_template) ? $arp_template : '';
        $arp_template_skin = ($arp_template_skin) ? $arp_template_skin : '';
        $arptemplate_1 = ($id) ? 'arptemplate_' . $id : '';
        $tablestring .= "<input type='hidden' name='arp_template' id='arp_template_id_editor' value='" . $arptemplate_1 . "' />";
        $tablestring .= "<input type='hidden' name='arp_template_skin_editor' class='arp_template_skin' id='arp_template_skin_editor' value='" . $arp_template_skin . "' />";

        $tablestring .= "<input type='hidden' name='arp_custom_color_code' id='arp_custom_color_code' value='" . $arp_template_custom_color . "' />";

        $arp_template_is_custom_color = isset($arp_template_is_custom_color) ? $arp_template_is_custom_color : '';
        $tablestring .= "<input type='hidden' name='is_custom_color' id='is_custom_color' value='" . $arp_template_is_custom_color . "' />";

        $arp_template_column_bg_color = $general_option['custom_skin_colors']['arp_column_bg_custom_color'];
        $arp_template_column_desc_bg_color = $general_option['custom_skin_colors']['arp_column_desc_bg_custom_color'];
        $arp_template_header_bg_color = $general_option['custom_skin_colors']['arp_header_bg_custom_color'];
        $arp_template_pricing_bg_color = $general_option['custom_skin_colors']['arp_pricing_bg_custom_color'];
        $arp_template_odd_row_bg_color = $general_option['custom_skin_colors']['arp_body_odd_row_bg_custom_color'];
        $arp_analytics_bgcolor = (isset($general_option['custom_skin_colors']['arp_analytics_bgcolor']))? $general_option['custom_skin_colors']['arp_analytics_bgcolor']:'#39434D';
        $arp_analytics_forgcolor = (isset($general_option['custom_skin_colors']['arp_analytics_forgcolor']))? $general_option['custom_skin_colors']['arp_analytics_forgcolor']:'#F5F5F5';
        $arp_template_even_row_bg_color = $general_option['custom_skin_colors']['arp_body_even_row_bg_custom_color'];
        $arp_template_footer_content_bg_color = $general_option['custom_skin_colors']['arp_footer_content_bg_color'];
        $arp_template_button_bg_color = $general_option['custom_skin_colors']['arp_button_bg_custom_color'];
        $arp_column_bg_hover_color = $general_option['custom_skin_colors']['arp_column_bg_hover_color'];
        $arp_button_bg_hover_color = $general_option['custom_skin_colors']['arp_button_bg_hover_color'];
        $arp_header_bg_hover_color = $general_option['custom_skin_colors']['arp_header_bg_hover_color'];
        $arp_price_bg_hover_color = $general_option['custom_skin_colors']['arp_price_bg_hover_color'];
        $arp_template_odd_row_hover_bg_color = $general_option['custom_skin_colors']['arp_body_odd_row_hover_bg_custom_color'];
        $arp_template_even_row_hover_bg_color = $general_option['custom_skin_colors']['arp_body_even_row_hover_bg_custom_color'];
        $arp_footer_hover_background_color = $general_option['custom_skin_colors']['arp_footer_content_hover_bg_color'];
        $arp_template_column_desc_hover_bg_color = $general_option['custom_skin_colors']['arp_column_desc_hover_bg_custom_color'];
        $arp_header_font_custom_color_input = $general_option['custom_skin_colors']['arp_header_font_custom_color'];
        $arp_header_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_header_font_custom_hover_color'];
        $arp_price_font_custom_color_input = $general_option['custom_skin_colors']['arp_price_font_custom_color'];
        $arp_price_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_price_font_custom_hover_color'];

        $arp_desc_font_custom_color_input = $general_option['custom_skin_colors']['arp_desc_font_custom_color'];
        $arp_desc_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_desc_font_custom_hover_color'];
        $arp_body_label_font_custom_color_input = $general_option['custom_skin_colors']['arp_body_label_font_custom_color'];
        $arp_body_label_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_body_label_font_custom_hover_color'];
        $arp_body_font_custom_color_input = $general_option['custom_skin_colors']['arp_body_font_custom_color'];
        $arp_body_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_body_font_custom_hover_color'];
        $arp_body_even_font_custom_color_input = $general_option['custom_skin_colors']['arp_body_even_font_custom_color'];
        $arp_body_even_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_body_even_font_custom_hover_color'];

        $arp_footer_font_custom_color_input = $general_option['custom_skin_colors']['arp_footer_font_custom_color'];
        $arp_footer_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_footer_font_custom_hover_color'];
        $arp_button_font_custom_color_input = $general_option['custom_skin_colors']['arp_button_font_custom_color'];
        $arp_button_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_button_font_custom_hover_color'];

        $arp_shortocode_background = isset($general_option['custom_skin_colors']['arp_shortocode_background']) ? $general_option['custom_skin_colors']['arp_shortocode_background'] : '';
        $arp_shortocode_font_color = isset($general_option['custom_skin_colors']['arp_shortocode_font_color']) ? $general_option['custom_skin_colors']['arp_shortocode_font_color'] : '';
        $arp_shortcode_bg_hover_color = isset($general_option['custom_skin_colors']['arp_shortcode_bg_hover_color']) ? $general_option['custom_skin_colors']['arp_shortcode_bg_hover_color'] : '';
        $arp_shortcode_font_hover_color = isset($general_option['custom_skin_colors']['arp_shortcode_font_hover_color']) ? $general_option['custom_skin_colors']['arp_shortcode_font_hover_color'] : '';


        $tablestring .= "<input type='hidden' name='arp_column_background_color' id='arp_column_background_color_input' value='" . $arp_template_column_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_column_desc_background_color' id='arp_column_desc_background_color_input' value='" . $arp_template_column_desc_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_header_background_color' id='arp_header_background_color_input' value='" . $arp_template_header_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_pricing_background_color' id='arp_pricing_background_color_input' value='" . $arp_template_pricing_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_odd_row_background_color' id='arp_body_odd_row_background_color' value='" . $arp_template_odd_row_bg_color . "' />";
        
        $tablestring .= "<input type='hidden' name='arp_body_even_row_background_color' id='arp_body_even_row_background_color' value='" . $arp_template_even_row_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_analytics_bgcolor' class='arp_analytics_row_bgcolor' id='arp_analytics_row_bgcolor' value='" . $arp_analytics_bgcolor . "' />";

        $tablestring .= "<input type='hidden' name='arp_analytics_forgcolor' class='arp_analytics_row_forgcolor' id='arp_analytics_row_forgcolor' value='" . $arp_analytics_forgcolor . "' />";

        $tablestring .= "<input type='hidden' name='arp_footer_content_background_color' id='arp_footer_content_background_color' value='" . $arp_template_footer_content_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_button_background_color' id='arp_button_background_color_input' value='" . $arp_template_button_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_column_bg_hover_color' class='arp_column_bg_hover_color' id='arp_column_bg_hover_color' value='" . $arp_column_bg_hover_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_header_bg_hover_color' class='arp_header_bg_hover_color' id='arp_header_bg_hover_color' value='" . $arp_header_bg_hover_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_button_bg_hover_color' class='arp_button_bg_hover_color' id='arp_button_bg_hover_color' value='" . $arp_button_bg_hover_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_price_bg_hover_color' class='arp_price_bg_hover_color' id='arp_price_bg_hover_color' value='" . $arp_price_bg_hover_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_odd_row_hover_background_color' id='arp_body_odd_row_hover_background_color' class='arp_body_odd_row_hover_background_color' value='" . $arp_template_odd_row_hover_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_even_row_hover_background_color' id='arp_body_even_row_hover_background_color' class='arp_body_even_row_hover_background_color' value='" . $arp_template_even_row_hover_bg_color . "' />";
        $tablestring .= "<input type='hidden' name='arp_footer_content_hover_background_color' id='arp_footer_hover_bg_color' class='arp_footer_hover_background_color' value='" . $arp_footer_hover_background_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_column_desc_hover_background_color' class='arp_column_desc_hover_background_color_input' id='arp_column_desc_hover_background_color_input' value='" . $arp_template_column_desc_hover_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_header_font_custom_color_input' class='arp_header_font_custom_color_input' id='arp_header_font_custom_color_input' value='" . $arp_header_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_header_font_custom_hover_color_input' class='arp_header_font_custom_hover_color_input' id='arp_header_font_custom_hover_color_input' value='" . $arp_header_font_custom_hover_color_input . "' />";
        $tablestring .= "<input type='hidden' name='arp_price_font_custom_color_input' class='arp_price_font_custom_color_input' id='arp_price_font_custom_color_input' value='" . $arp_price_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_price_font_custom_hover_color_input' class='arp_price_font_custom_hover_color_input' id='arp_price_font_custom_hover_color_input' value='" . $arp_price_font_custom_hover_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_desc_font_custom_color_input' class='arp_desc_font_custom_color_input' id='arp_desc_font_custom_color_input' value='" . $arp_desc_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_desc_font_custom_hover_color_input' class='arp_desc_font_custom_hover_color_input' id='arp_desc_font_custom_hover_color_input' value='" . $arp_desc_font_custom_hover_color_input . "' />";
        $tablestring .= "<input type='hidden' name='arp_body_label_font_custom_color_input' class='arp_body_label_font_custom_color_input' id='arp_body_label_font_custom_color_input' value='" . $arp_body_label_font_custom_color_input . "' />";
        $tablestring .= "<input type='hidden' name='arp_body_label_font_custom_hover_color_input' class='arp_body_label_font_custom_hover_color_input' id='arp_body_label_font_custom_hover_color_input' value='" . $arp_body_label_font_custom_hover_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_font_custom_color_input' class='arp_body_font_custom_color_input' id='arp_body_font_custom_color_input' value='" . $arp_body_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_font_custom_hover_color_input' class='arp_body_font_custom_hover_color_input' id='arp_body_font_custom_hover_color_input' value='" . $arp_body_font_custom_hover_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_even_font_custom_color_input' class='arp_body_even_font_custom_color_input' id='arp_body_even_font_custom_color_input' value='" . $arp_body_even_font_custom_color_input . "' />";
        $tablestring .= "<input type='hidden' name='arp_body_even_font_custom_hover_color_input' class='arp_body_even_font_custom_hover_color_input' id='arp_body_even_font_custom_hover_color_input' value='" . $arp_body_even_font_custom_hover_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_footer_font_custom_color_input' class='arp_footer_font_custom_color_input' id='arp_footer_font_custom_color_input' value='" . $arp_footer_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_footer_font_custom_hover_color_input' class='arp_footer_font_custom_hover_color_input' id='arp_footer_font_custom_hover_color_input' value='" . $arp_footer_font_custom_hover_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_button_font_custom_color_input' class='arp_button_font_custom_color_input' id='arp_button_font_custom_color_input' value='" . $arp_button_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_button_font_custom_hover_color_input' class='arp_button_font_custom_hover_color_input' id='arp_button_font_custom_hover_color_input' value='" . $arp_button_font_custom_hover_color_input . "' />";
        $tablestring .= "<input type='hidden' name='arp_shortocode_background_color' id='arp_shortocode_background_color_input' value='" . $arp_shortocode_background . "' />";
        $tablestring .= "<input type='hidden' name='arp_shortocode_font_custom_color_input' class='arp_shortocode_font_custom_color_input' id='arp_shortocode_font_custom_color_input' value='" . $arp_shortocode_font_color . "' />";
        $tablestring .= "<input type='hidden' name='arp_shortcode_font_custom_hover_color_input' class='arp_shortcode_font_custom_hover_color_input' id='arp_shortcode_font_custom_hover_color_input' value='" . $arp_shortcode_font_hover_color . "' />";
        $tablestring .= "<input type='hidden' name='arp_shortcode_bg_hover_color' class='arp_shortcode_bg_hover_color' id='arp_shortcode_bg_hover_color' value='" . $arp_shortcode_bg_hover_color . "' />";


        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        /**
         * New Belt Design
         * 
         * @since ARPrice 2.0
         */
        $tablestring .= "<div class='arprice_options_menu_belt'>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='column_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='column_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . esc_html__('Column Options', 'ARPrice') . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='column_effects'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='column_effects_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . esc_html__('Effects', 'ARPrice') . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='all_font_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='font_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . esc_html__('Fonts', 'ARPrice') . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option arp_manage_color_options' id='all_color_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='color_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . esc_html__('Colors', 'ARPrice') . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='tootip_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='tooltip_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . esc_html__('Tooltip', 'ARPrice') . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='custom_css_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='custom_css_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . esc_html__('Custom CSS', 'ARPrice') . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='toggle_content_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='toggle_content_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . esc_html__('Toggle Price', 'ARPrice') . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='migrate_template'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='migrate_content_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . esc_html__('Import Data','ARPrice') . "</label>";
        $tablestring .= "<span class='arp_new_feature_label'>".esc_html__('New','ARPrice')."</span>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_right'>";

        $tablestring .= "<div class='arprice_top_right_belt_inner container_width'>";

        if ($column_settings['column_wrapper_width_txtbox'] != '') {
            $wrapper_width_value = $column_settings['column_wrapper_width_txtbox'];
        } else {
            $wrapper_width_value = $arp_mainoptionsarr['general_options']['wrapper_width'];
        }

        $tablestring .= "<label for='column_wrapper_width_txtbox'>" . esc_html__('Width', 'ARPrice') . "</label>&nbsp;&nbsp;";

        $tablestring .= "<div class='arprice_container_width_wrapper'>";
        $tablestring .= "<input type='text' id='column_wrapper_width_txtbox' value='$wrapper_width_value' class='arp_tab_txt' name='column_wrapper_width_txtbox'>";

        $tablestring .= "<span>px</span>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $footer_btn_cls = 'arp_footer_top_position';
        if( in_array( $reference_template, array('arptemplate_7','arptemplate_8','arptemplate_10','arptemplate_11','arptemplate_14') ) ){
            $footer_btn_cls = '';
        }

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        /**
         * ARPrice Column Options Menu New Design.
         * 
         * @since 2.0
         */
        

        $tablestring .= "<div class='general_options_bar arp_hidden'>";

        $tablestring .= "<div class='general_options_bar_content'>";

        $tablestring .= "<div class='arprice_toggle_menu_options'></div>";


        

        $tablestring .= "<div class='general_column_options_tab enable global_opts' id='column_options'>";

        $tablestring .= "<div class='arprice_option_belt_title'>";

        $tablestring .= esc_html__('Column Options', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_option_dropdown arp_offset_container' id='column_option_dropdown'>";


        
        $tablestring .= "<div class='column_content_light_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols column_opt_label_height' >" . esc_html__('Column Width', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $column_width_readonly = '';


        $tablestring .= "<span class='arp_col_px'>px</span>";

        $tablestring .= "<input type='text' " . $column_width_readonly . " name='all_column_width' class='arp_tab_txt' value='" . $column_settings['all_column_width'] . "' id='all_column_width' />";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        
        $tablestring .= "<div class='column_content_light_row column_opt_row'>";
        $tablestring .= "<div class='column_opt_label two_cols column_opt_label_height' >" . esc_html__('Space between Columns', 'ARPrice') . "</div>";
        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
        $tablestring .= "<span class='arp_col_px'>px</span>";
        $tablestring .= "<input type='text' name='column_space' class='arp_tab_txt' value='" . $column_settings['column_space'] . "' id='column_space' />";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_content_light_row column_opt_row'>";
            $tablestring .= "<div class='column_opt_label two_cols column_opt_label_height' >" . esc_html__('Minimum Row Height', 'ARPrice') . "</div>";
            $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
                $tablestring .= "<span class='arp_col_px'>px</span>";
                $tablestring .= "<input type='text' name='min_row_height' class='arp_tab_txt' value='".(!empty($column_settings['min_row_height']) ? $column_settings['min_row_height'] : '' )."' id='min_row_height' />";
            $tablestring .= "</div>";
        $tablestring .= "</div>";


        $allow_border_radius = $arprice_default_settings->arprice_allow_border_radius();
        $column_border_radius_top_left = $column_border_radius_top_right = $column_border_radius_bottom_right = $column_border_radius_bottom_left = '';

        if ($allow_border_radius[$reference_template]) {

            $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label two_cols column_radius_label_height' >" . esc_html__('Column Radius (px)', 'ARPrice') . "</div>";

            $tablestring .= "<div class='column_opt_opts two_cols align_right column_chk_box_alignment'>";

            if ($column_settings['column_box_shadow_effect'] == 'shadow_style_none' || $column_settings['column_box_shadow_effect'] == '') {
                $arp_tab_column_radius_txt_disabled = '';
            } else {
                $arp_tab_column_radius_txt_disabled = 'readonly="readonly"';
            }

            if ($column_settings['column_border_radius_top_left'] != '' || $column_settings['column_border_radius_top_left'] == 0) {
                $column_border_radius_top_left = $column_settings['column_border_radius_top_left'];
            } else {
                $column_border_radius_top_left = $arp_mainoptionsarr['general_options']['default_column_radius_value'][$reference_template]['top_left'];
            }

            if ($column_settings['column_border_radius_top_right'] != '' || $column_settings['column_border_radius_top_right'] == 0) {
                $column_border_radius_top_right = $column_settings['column_border_radius_top_right'];
            } else {
                $column_border_radius_top_right = $arp_mainoptionsarr['general_options']['default_column_radius_value'][$reference_template]['top_right'];
            }
            if ($column_settings['column_border_radius_bottom_right'] != '' || $column_settings['column_border_radius_bottom_right'] == 0) {
                $column_border_radius_bottom_right = $column_settings['column_border_radius_bottom_right'];
            } else {
                $column_border_radius_bottom_right = $arp_mainoptionsarr['general_options']['default_column_radius_value'][$reference_template]['bottom_right'];
            }
            if ($column_settings['column_border_radius_bottom_left'] != '' || $column_settings['column_border_radius_bottom_left'] == 0) {
                $column_border_radius_bottom_left = $column_settings['column_border_radius_bottom_left'];
            } else {
                $column_border_radius_bottom_left = $arp_mainoptionsarr['general_options']['default_column_radius_value'][$reference_template]['bottom_left'];
            }

            $tablestring .= "<div class='arp_column_radius_main'>";

            $tablestring .= "<div>";
            $tablestring .= "<span>Left</span>";
            $tablestring .= "<input type='text' id='column_border_radius_top_left' value='$column_border_radius_top_left' class='arp_tab_txt arp_tab_column_radius_txt' name='column_border_radius_top_left' onBlur=\"arp_update_column_border_radius(this.value,jQuery('#column_border_radius_top_right').val(),jQuery('#column_border_radius_bottom_right').val(), jQuery('#column_border_radius_bottom_left').val(),$is_animated)\" } $arp_tab_column_radius_txt_disabled />";
            $tablestring .= "</div>";

            $tablestring .= "<div>";
            $tablestring .= "<span>Right</span>";
            $tablestring .= "<input type='text' id='column_border_radius_top_right' value='$column_border_radius_top_right' class='arp_tab_txt arp_tab_column_radius_txt' name='column_border_radius_top_right' onBlur=\"arp_update_column_border_radius(jQuery('#column_border_radius_top_left').val(),this.value,jQuery('#column_border_radius_bottom_right').val(), jQuery('#column_border_radius_bottom_left').val(),$is_animated)\" $arp_tab_column_radius_txt_disabled />";
            $tablestring .= "</div>";


            $tablestring .= "<div>";
            $tablestring .= "<span>Left</span>";
            $tablestring .= "<input type='text' id='column_border_radius_bottom_left' value='$column_border_radius_bottom_left' class='arp_tab_txt arp_tab_column_radius_txt' name='column_border_radius_bottom_left' onBlur=\"arp_update_column_border_radius(jQuery('#column_border_radius_top_left').val(), jQuery('#column_border_radius_top_right').val(), jQuery('#column_border_radius_bottom_right').val(), this.value, $is_animated)\" $arp_tab_column_radius_txt_disabled />";
            $tablestring .= "</div>";

            $tablestring .= "<div>";
            $tablestring .= "<span>Right</span>";
            $tablestring .= "<input type='text' id='column_border_radius_bottom_right' value='$column_border_radius_bottom_right' class='arp_tab_txt arp_tab_column_radius_txt' name='column_border_radius_bottom_right' onBlur=\"arp_update_column_border_radius(jQuery('#column_border_radius_top_left').val(), jQuery('#column_border_radius_top_right').val(), this.value, jQuery('#column_border_radius_bottom_left').val(),$is_animated)\" $arp_tab_column_radius_txt_disabled />";
            $tablestring .= "</div>";

            $tablestring .= "</div>";


            $tablestring .= "<div class='arp_column_radius_main'>";
            $tablestring .= "<div class='arp_column_radius_bottom'>";
            $tablestring .= "<span>Top</span>";
            $tablestring .= "</div>";
            $tablestring .= "<div class='arp_column_radius_bottom'>";
            $tablestring .= "<span>Bottom</span>";
            $tablestring .= "</div>";
            $tablestring .= "</div>";

            $tablestring .= "</div>";

            $tablestring .= "</div>";
        }
        
        
        
        $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . esc_html__('Enable Responsive Columns', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right column_opt_opts_alignment' >";

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

        $tablestring .= "<input type='checkbox' name='is_responsive' id='is_responsive' class='arp_checkbox light_bg' value='1' " . checked($column_settings['is_responsive'], 1, false) . " />";

        $tablestring .= "<span></span>";

        $tablestring .= "</span>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . esc_html__('Mobile', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols column_option_dropdown_alignment' >";

        $tablestring .= "<input type='hidden' name='arp_display_columns_mobile' id='arp_display_columns_mobile' value='" . $column_settings['display_col_mobile'] . "' />";

        $tablestring .= "<dl id='arp_display_columns_mobile' class='arp_selectbox arp_columns_options_dl' data-id='arp_display_columns_mobile' data-name='arp_display_columns_mobile' style=''>";

        if ($column_settings['display_col_mobile']) {
            $display_col_mobile = $column_settings['display_col_mobile'];
        } else {
            $display_col_mobile = esc_html__('Choose Option', 'ARPrice');
        }
        $tablestring .= "<dt><span>" . $display_col_mobile . "</span><input type='text' style='display:none;' value='" . $display_col_mobile . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_display_columns_mobile' data-id='arp_display_columns_mobile'>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . esc_html__('All', 'ARPrice') . "' data-label='" . esc_html__('All', 'ARPrice') . "'>" . esc_html__('All', 'ARPrice') . "</li>";
        for ($i = 1; $i <= $total_columns; $i++) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols'>" . esc_html__('Tablet', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols column_option_dropdown_alignment'>";

        $tablestring .= "<input type='hidden' name='arp_display_columns_tablet' id='arp_display_columns_tablet' value='" . $column_settings['display_col_tablet'] . "' />";

        $tablestring .= "<dl id='arp_display_columns_tablet' class='arp_selectbox arp_columns_options_dl' data-id='arp_display_columns_tablet' data-name='arp_display_columns_tablet' style=''>";

        if ($column_settings['display_col_tablet']) {
            $display_col_tablet = $column_settings['display_col_tablet'];
        } else {
            $display_col_tablet = esc_html__('Choose Option', 'ARPrice');
        }
        $tablestring .= "<dt><span>" . $display_col_tablet . "</span><input type='text' style='display:none;' value='" . $display_col_tablet . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_display_columns_tablet' data-id='arp_display_columns_tablet'>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . esc_html__('All', 'ARPrice') . "' data-label='" . esc_html__('All', 'ARPrice') . "'>" . esc_html__('All', 'ARPrice') . "</li>";
        for ($i = 1; $i <= $total_columns; $i++) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
               
       
        
        if (in_array(1, $caption_col))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        if ($reference_template == "arptemplate_25") {
            $arp_temp_25 = 'display:none;';
        } else {
            $arp_temp_25 = '';
        }
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_temp_25 . "'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . esc_html__('Full Column Clickable', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right column_opt_opts_alignment' >";


        $column_settings['full_column_clickable'] = isset($column_settings['full_column_clickable']) ? $column_settings['full_column_clickable'] : "";
        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

        $tablestring .="<input type='checkbox' name='full_column_clickable' id='full_column_clickable' class='arp_checkbox light_bg' value='1' " . checked($column_settings['full_column_clickable'], 1, false) . " />";

        $tablestring .="<span></span>";

        $tablestring .="</span>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        
        
        
        
        if (in_array(1, $caption_col))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_content_light_row column_opt_row' id='column_content_hide_caption_column' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . esc_html__('Hide Caption Column', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $column_settings['hide_caption_column'] = isset($column_settings['hide_caption_column']) ? $column_settings['hide_caption_column'] : "";

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

        $tablestring .= "<input type='checkbox' name='hide_caption_column' id='hide_caption_column' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_caption_column'], 1, false) . " />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        
        
        $column_settings['column_hide_blank_rows'] = isset($column_settings['column_hide_blank_rows']) ? $column_settings['column_hide_blank_rows'] : '';
        $tablestring .= "<div class='column_content_light_row column_opt_row'><div class='column_opt_label two_cols'>" . esc_html__('Hide blank rows from bottom', 'ARPrice') . "</div>";
        $tablestring .= "<div class='column_opt_opts two_cols align_right column_opt_opts_alignment'>";
        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";
        $tablestring .= "<input type='checkbox' name='hide_blank_rows' id='hide_blank_rows' value='yes' " . checked($column_settings['column_hide_blank_rows'], 'yes', false) . " class='arp_checkbox light_bg' />";
        $tablestring .= "<span></span>";
        $tablestring .= "</span>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_label_help'>(" . esc_html__('Only bottom rows will hide and shown in preview and front end.', 'ARPrice') . ")</div>";
        $tablestring .= "</div>";

        


        
        $hide_section_array = $arprice_default_settings->arprice_hide_section_array();
        $hide_section_array = $hide_section_array[$ref_template];

        
        $tablestring .= "<div class='column_content_light_row column_opt_row' id='arp_hide_show_section'>";

        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Hide Column Sections', 'ARPrice') . "</div>";

        
        if (array_key_exists('arp_header', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols column_opt_sub_label_height'>" . esc_html__('Hide Header', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols sub_column_chk_box_alignment' >";

        $column_settings['hide_header_global'] = isset($column_settings['hide_header_global']) ? $column_settings['hide_header_global'] : "";

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

        $tablestring .= "<input type='checkbox' data-hide-section='arp_header' name='hide_header_global' id='hide_header_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_header_global'], 1, false) . " />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";
        

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        if (array_key_exists('arp_header_shortcode', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols column_opt_sub_label_height'>" . esc_html__('Hide Shortcode Section', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols sub_column_chk_box_alignment' >";

        $column_settings['hide_header_shortcode_global'] = isset($column_settings['hide_header_shortcode_global']) ? $column_settings['hide_header_shortcode_global'] : "";

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

        $tablestring .= "<input type='checkbox' data-hide-section='arp_header_shortcode' name='hide_header_shortcode_global' id='hide_header_shortcode_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_header_shortcode_global'], 1, false) . " />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";
        

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        if (array_key_exists('arp_price', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols column_opt_sub_label_height' >" . esc_html__('Hide Price', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols sub_column_chk_box_alignment' >";

        $column_settings['hide_price_global'] = isset($column_settings['hide_price_global']) ? $column_settings['hide_price_global'] : "";

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

        $tablestring .= "<input type='checkbox' data-hide-section='arp_price' name='hide_price_global' id='hide_price_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_price_global'], 1, false) . " />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        if (array_key_exists('arp_feature', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols column_opt_sub_label_height' >" . esc_html__('Hide Body', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols sub_column_chk_box_alignment' >";

        $column_settings['hide_feature_global'] = isset($column_settings['hide_feature_global']) ? $column_settings['hide_feature_global'] : "";

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

        $tablestring .= "<input type='checkbox' data-hide-section='arp_feature' name='hide_feature_global' id='hide_feature_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_feature_global'], 1, false) . " />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";
        

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (array_key_exists('arp_description', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols column_opt_sub_label_height' >" . esc_html__('Hide Description', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols sub_column_chk_box_alignment' >";

        $column_settings['hide_description_global'] = isset($column_settings['hide_description_global']) ? $column_settings['hide_description_global'] : "";

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

        $tablestring .= "<input type='checkbox' data-hide-section='arp_description' name='hide_description_global' id='hide_description_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_description_global'], 1, false) . " />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (array_key_exists('arp_footer', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols column_opt_sub_label_height' >" . esc_html__('Hide Button', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols sub_column_chk_box_alignment' >";

        $column_settings['hide_footer_global'] = isset($column_settings['hide_footer_global']) ? $column_settings['hide_footer_global'] : "";

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

        $tablestring .= "<input type='checkbox' data-hide-section='arp_footer' name='hide_footer_global' id='hide_footer_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_footer_global'], 1, false) . " />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label_help arp_column_help_depth_level1' >(" . esc_html__('Effect will shown in preview and front end only.', 'ARPrice') . ")</div>";
        $tablestring .= "</div>";


        
        if (in_array(1, $caption_col))
            $cls = 'column_content_dark_row';
        else
            $cls = 'column_content_light_row';

        if ($is_animation == 1 or $is_animation == 'yes')
            $display = 'display:none;';
        else
            $display = 'display:block';

        $tablestring .= "<div class='" . $cls . " column_opt_row' id='column_content_opacity' style='" . $display . ";' > ";

        $tablestring .= "<div class='column_opt_label  two_cols column_opt_label_height'>" . esc_html__('Opacity', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols column_opt_dropdown_alignment' >";

        $tablestring .= "<input type='hidden' name='column_opacity' id='column_opacity' value='" . $column_settings['column_opacity'] . "' />";

        $tablestring .= "<dl class='arp_selectbox arp_columns_options_dl' id='column_opacity_dd' data-name='column_opacity' data-id='column_opacity' style=''>";

        if ($column_settings['column_opacity']) {
            $arp_selectbox_placeholder = $column_settings['column_opacity'];
        } else {
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $column_settings['column_opacity'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";
            $tablestring .= "<ul class='arp_column_opacity' data-id='column_opacity'>";

                foreach ($arp_mainoptionsarr['general_options']['column_opacity'] as $column_opacity) {
                    $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $column_opacity . "' data-label='" . $column_opacity . "'>" . $column_opacity . "</li>";
                }
            $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label_help opt_note_alignment' >(" . esc_html__('Opacity will be shown in preview and frontend only.', 'ARPrice') . ")</div>";

        $tablestring .= "</div>";

        
        
        $column_border_style = '';
        if ($reference_template == 'arptemplate_23' || $reference_template == 'arptemplate_21') {
            $column_border_style = 'display: none;';
        }
        $tablestring .= "<div class='column_content_dark_row column_opt_row' style='" . $column_border_style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_title_height' >";

        $tablestring .= esc_html__('Column Borders', 'ARPrice');

        $tablestring .= "</div>";

        
        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . esc_html__('Border Size', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols column_option_dropdown_alignment' >";
        $column_settings['arp_column_border_size'] = isset($column_settings['arp_column_border_size']) ? $column_settings['arp_column_border_size'] : '';
        $tablestring .= "<input type='hidden' name='arp_column_border_size' id='arp_column_border_size' value='" . $column_settings['arp_column_border_size'] . "' />";

        $tablestring .= "<dl id='arp_column_border_size' class='arp_selectbox arp_columns_options_dl' data-id='arp_column_border_size' data-name='arp_column_border_size' style=''>";

        if ($column_settings['arp_column_border_size']) {
            $selected_border_size = $column_settings['arp_column_border_size'];
        } else {
            $selected_border_size = "0";
        }
        $tablestring .= "<dt><span>" . $selected_border_size . "</span><input type='text' style='display:none;' value='" . $selected_border_size . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_column_border_size' data-id='arp_column_border_size'>";
        for ($i = 0; $i <= 10; $i++) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        
        
        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols'>" . esc_html__('Border Type', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols column_option_dropdown_alignment' >";
        $column_settings['arp_column_border_type'] = isset($column_settings['arp_column_border_type']) ? $column_settings['arp_column_border_type'] : '';
        $tablestring .= "<input type='hidden' name='arp_column_border_type' id='arp_column_border_type' value='" . $column_settings['arp_column_border_type'] . "' />";

        $tablestring .= "<dl id='arp_column_border_type' class='arp_selectbox arp_columns_options_dl' data-id='arp_column_border_type' data-name='arp_column_border_type' style=''>";

        if ($column_settings['arp_column_border_type']) {
            $selected_border_type = $column_settings['arp_column_border_type'];
        } else {
            $selected_border_type = esc_html__('Choose Option', 'ARPrice');
        }
        $tablestring .= "<dt><span>" . $selected_border_type . "</span><input type='text' style='display:none;' value='" . $selected_border_type . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_column_border_type' data-id='arp_column_border_type'>";

        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='solid' data-label='solid'>Solid</li>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='dotted' data-label='dotted'>Dotted</li>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='dashed' data-label='dashed'>Dashed</li>";

        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        
        $tablestring .= "<div class='column_opt_opts'>";
        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols'>" . esc_html__('Borders', 'ARPrice') . "</div>";
        $tablestring .= "<div class='column_opt_opts two_cols align_right column_border_chk_box_alignment' >";
        $tablestring .= "<div class='arp_column_radius_main'>";



        $tablestring .= "<div>";
        $tablestring .= "<span>Left</span>";
        $column_settings['arp_column_border_left'] = isset($column_settings['arp_column_border_left']) ? $column_settings['arp_column_border_left'] : '';
        $tablestring .= "<span class='arp_price_checkbox_wrapper_standard'>";
        $tablestring .= "<input type='checkbox' name='arp_column_border_left' id='arp_column_border_left' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_column_border_left'], 1, false) . " style=''  />";
        $tablestring .= "<span></span>";
        $tablestring .= "</span>";
        $tablestring .= "</div>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Right</span>";
        $column_settings['arp_column_border_right'] = isset($column_settings['arp_column_border_right']) ? $column_settings['arp_column_border_right'] : '';
        $tablestring .= "<span class='arp_price_checkbox_wrapper_standard'>";
        $tablestring .= "<input type='checkbox' name='arp_column_border_right' id='arp_column_border_right' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_column_border_right'], 1, false) . " style='position:relative;'  />";
        $tablestring .= "<span></span>";
        $tablestring .= "</span>";
        $tablestring .= "</div>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Top</span>";
        $column_settings['arp_column_border_top'] = isset($column_settings['arp_column_border_top']) ? $column_settings['arp_column_border_top'] : '';
        $tablestring .= "<span class='arp_price_checkbox_wrapper_standard'>";
        $tablestring .= "<input type='checkbox' name='arp_column_border_top' id='arp_column_border_top' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_column_border_top'], 1, false) . " style='position:relative;'  />";
        $tablestring .= "<span></span>";
        $tablestring .= "</span>";
        $tablestring .= "</div>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Bottom</span>";
        $column_settings['arp_column_border_bottom'] = isset($column_settings['arp_column_border_bottom']) ? $column_settings['arp_column_border_bottom'] : '';
        $tablestring .= "<span class='arp_price_checkbox_wrapper_standard'>";
        $tablestring .= "<input type='checkbox' name='arp_column_border_bottom' id='arp_column_border_bottom' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_column_border_bottom'], 1, false) . " style='position:relative;'  />";
        $tablestring .= "<span></span>";
        $tablestring .= "</span>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        

        $tablestring .= "</div>";

        
        

        $row_border_style = '';
        if ($reference_template == 'arptemplate_21') {
            $row_border_style = 'display: none;';
        }

        $row_border_secton_bottom_border = '';
        if ($reference_template == 'arptemplate_20' || $reference_template == 'arptemplate_5' || $reference_template == 'arptemplate_25' || $reference_template == 'arptemplate_26' || $reference_template == 'arptemplate_21') {
            $row_border_secton_bottom_border = 'arp_no_border';
        }

        $tablestring .= "<div class='column_content_dark_row column_opt_row ".$row_border_secton_bottom_border."' " . $row_border_style . ">";

        $tablestring .= "<div class='column_opt_label column_opt_title_height' >";

        $tablestring .= esc_html__('Row Borders', 'ARPrice');

        $tablestring .= "</div>";

        
        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . esc_html__('Border Size', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols column_option_dropdown_alignment' >";
        $column_settings['arp_row_border_size'] = isset($column_settings['arp_row_border_size']) ? $column_settings['arp_row_border_size'] : '';
        $tablestring .= "<input type='hidden' name='arp_row_border_size' id='arp_row_border_size' value='" . $column_settings['arp_row_border_size'] . "' />";

        $tablestring .= "<dl id='arp_row_border_size' class='arp_selectbox arp_columns_options_dl' data-id='arp_row_border_size' data-name='arp_row_border_size' style=''>";

        if ($column_settings['arp_row_border_size']) {
            $selected_border_size = $column_settings['arp_row_border_size'];
        } else {
            $selected_border_size = "0";
        }
        $tablestring .= "<dt><span>" . $selected_border_size . "</span><input type='text' style='display:none;' value='" . $selected_border_size . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_row_border_size' data-id='arp_row_border_size'>";
        for ($i = 0; $i <= 10; $i++) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        
        
        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols'>" . esc_html__('Border Type', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols column_option_dropdown_alignment' >";
        $column_settings['arp_row_border_type'] = isset($column_settings['arp_row_border_type']) ? $column_settings['arp_row_border_type'] : '';
        $tablestring .= "<input type='hidden' name='arp_row_border_type' id='arp_row_border_type' value='" . $column_settings['arp_row_border_type'] . "' />";

        $tablestring .= "<dl id='arp_row_border_type' class='arp_selectbox arp_columns_options_dl' data-id='arp_row_border_type' data-name='arp_row_border_type' style=''>";

        if ($column_settings['arp_row_border_type']) {
            $selected_border_type = $column_settings['arp_row_border_type'];
        } else {
            $selected_border_type = esc_html__('Choose Option', 'ARPrice');
        }
        $tablestring .= "<dt><span>" . $selected_border_type . "</span><input type='text' style='display:none;' value='" . $selected_border_type . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_row_border_type' data-id='arp_row_border_type'>";

        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='solid' data-label='solid'>Solid</li>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='dotted' data-label='dotted'>Dotted</li>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='dashed' data-label='dashed'>Dashed</li>";

        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        

        $tablestring .= "</div>";
        
        
              

        $style = '';
        if ($reference_template == 'arptemplate_20' || $reference_template == 'arptemplate_5' || $reference_template == 'arptemplate_25' || $reference_template == 'arptemplate_26' || $reference_template == 'arptemplate_21') {
            $style = 'display:none';
        } else {
            $style = 'display:block';
        }

        $tablestring .= "<div class='column_content_light_row column_opt_row arp_no_border' style='" . $style . ";'>";

        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Button Style Options', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts' style='display:none;'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . esc_html__('Border Width', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols colunm_opt_border_chk_alignment'>";

        if (isset($column_settings['global_button_border_width'])) {
            $arp_global_button_border_width = $column_settings['global_button_border_width'];
        } else {
            $arp_global_button_border_width = 0;
        }

        $tablestring .= "<input type='hidden' name='arp_global_button_border_width' id='arp_global_button_border_width' value='" . $arp_global_button_border_width . "' />";

        $tablestring .= "<dl id='arp_global_button_border_width' class='arp_selectbox' data-id='arp_global_button_border_width' data-name='arp_global_button_border_width' style='width:110px;margin-top:18px;margin-right:15px;float:right;'>";

        $tablestring .= "<dt><span>" . $arp_global_button_border_width . "</span><input type='text' style='display:none;' value='" . $arp_global_button_border_width . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_global_button_border_width' data-id='arp_global_button_border_width'>";

        for ($i = 0; $i <= 10; $i++) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $border_style = array('solid', 'dotted', 'dashed');
        $tablestring .= "<div class='column_opt_opts' style='display:none;'>";
        if (isset($column_settings['global_button_border_type'])) {
            $arp_global_button_border_style = $column_settings['global_button_border_type'];
        } else {
            $arp_global_button_border_style = esc_html__('solid', 'ARPrice');
        }

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . esc_html__('Border Style', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols colunm_opt_border_chk_alignment' >";

        $tablestring .= "<input type='hidden' name='arp_global_button_border_style' id='arp_global_button_border_style' value='" . $arp_global_button_border_style . "' />";

        $tablestring .= "<dl id='arp_global_button_border_style' class='arp_selectbox' data-id='arp_global_button_border_style' data-name='arp_global_button_border_style' style='width:110px;margin-top:18px;margin-right:15px;float:right;'>";

        $tablestring .= "<dt><span>" . $arp_global_button_border_style . "</span><input type='text' style='display:none;' value='" . $arp_global_button_border_style . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_global_button_border_style' data-id='arp_global_button_border_style'>";

        foreach ($border_style as $i) {
            $tablestring .= "<li style='margin:0px' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (isset($column_settings['global_button_border_color']) && $column_settings['global_button_border_color']) {
            $arp_global_button_border_color = $column_settings['global_button_border_color'];
        } else {
            $arp_global_button_border_color = '#c9c9c9';
        }

        $tablestring .= "<div class='column_opt_opts' style='height: 34px;display:none;'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . esc_html__('Border Color', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols' style='margin-top:2px;height:38px;'>";

        $tablestring .= "<div class='color_picker color_picker_round jscolor opt_bg_box_alignment' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_global_button_border_color)\",valueElement:\"arp_global_button_border_color_hidden\"}' data-id='arp_global_button_border_color_hidden' data-column-id='arp_global_button_border_color' id='arp_global_button_border_color' style='background:" . $arp_global_button_border_color . ";' data-color='" . $arp_global_button_border_color . "' >";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<input type='hidden' id='arp_global_button_border_color_hidden' name='arp_global_button_border_color' value='" . $arp_global_button_border_color . "' />";

        $tablestring .= "</div>";


        $arp_global_button_border_type = isset($column_settings['arp_global_button_type']) ? $column_settings['arp_global_button_type'] : 'flat';
        if ($reference_template == 'arptemplate_5' || $reference_template == 'arptemplate_25') {
            $button_button_type = 'display : none;';
        } else {
            $button_button_type = 'display : block;';
        }

        $button_type = $arprice_default_settings->arp_button_type();
        unset($button_type['none']);
        $tablestring .= "<div class='column_opt_opts' style='" . $button_button_type . "'>";
        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols' >" . esc_html__('Button Type', 'ARPrice');

        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts two_cols colunm_opt_border_chk_alignment' >";
        $tablestring .= "<input type='hidden' name='arp_global_button_type' id='arp_global_button_border_type' value='" . $arp_global_button_border_type . "' />";

        $tablestring .= "<dl id='arp_global_button_border_type' class='arp_selectbox' data-id='arp_global_button_border_type' data-name='arp_global_button_border_type' style='width:110px;margin-top:18px;margin-right:15px;float:right;'>";
        $arp_global_button_border_type_name = isset($button_type[$arp_global_button_border_type]['name']) ? $button_type[$arp_global_button_border_type]['name'] : '';
        $tablestring .= "<dt><span>" . $arp_global_button_border_type_name . "</span><input type='text' style='display:none;' value='" . $arp_global_button_border_type_name . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_global_button_border_type' data-id='arp_global_button_border_type'>";

        foreach ($button_type as $i => $value) {
            $tablestring .= "<li style='margin:0px' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $value['name'] . "'>" . $value['name'] . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts' >";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . esc_html__('Border Radius', 'ARPrice');

        $tablestring .= "</div>";

        if (isset($column_settings['global_button_border_radius_top_left']) && $column_settings['global_button_border_radius_top_left'] != '') {
            $global_button_border_radius_top_left = $column_settings['global_button_border_radius_top_left'];
        } else {
            $global_button_border_radius_top_left = 0;
        }

        if (isset($column_settings['global_button_border_radius_top_right']) && $column_settings['global_button_border_radius_top_right'] != '') {
            $global_button_border_radius_top_right = $column_settings['global_button_border_radius_top_right'];
        } else {
            $global_button_border_radius_top_right = 0;
        }
        if (isset($column_settings['global_button_border_radius_bottom_left']) && $column_settings['global_button_border_radius_bottom_left'] != '') {
            $global_button_border_radius_bottom_left = $column_settings['global_button_border_radius_bottom_left'];
        } else {
            $global_button_border_radius_bottom_left = 0;
        }
        if (isset($column_settings['global_button_border_radius_bottom_right']) && $column_settings['global_button_border_radius_bottom_right'] != '') {
            $global_button_border_radius_bottom_right = $column_settings['global_button_border_radius_bottom_right'];
        } else {
            $global_button_border_radius_bottom_right = 0;
        }

        $tablestring .= "<div class='column_opt_opts two_cols column_opt_border_input_alignment' >";


        $tablestring .= "<div class='arp_button_radius_main'>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Left</span>";
        $tablestring .= "<input type='text' id='global_button_border_radius_top_left' value='$global_button_border_radius_top_left' class='arp_tab_txt arp_tab_column_radius_txt' name='global_button_border_radius_top_left' onBlur=\"arp_update_button_border_radius(this.value,jQuery('#global_button_border_radius_top_right').val(),jQuery('#global_button_border_radius_bottom_right').val(), jQuery('#global_button_border_radius_bottom_left').val())\" />";
        $tablestring .= "</div>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Right</span>";
        $tablestring .= "<input type='text' id='global_button_border_radius_top_right' value='$global_button_border_radius_top_right' class='arp_tab_txt arp_tab_column_radius_txt' name='global_button_border_radius_top_right' onBlur=\"arp_update_button_border_radius(jQuery('#global_button_border_radius_top_left').val(),this.value,jQuery('#global_button_border_radius_bottom_right').val(), jQuery('#global_button_border_radius_bottom_left').val())\" />";
        $tablestring .= "</div>";


        $tablestring .= "<div>";
        $tablestring .= "<span>Left</span>";
        $tablestring .= "<input type='text' id='global_button_border_radius_bottom_left' value='$global_button_border_radius_bottom_left' class='arp_tab_txt arp_tab_column_radius_txt' name='global_button_border_radius_bottom_left' onBlur=\"arp_update_button_border_radius(jQuery('#global_button_border_radius_top_left').val(), jQuery('#global_button_border_radius_top_right').val(), jQuery('#global_button_border_radius_bottom_right').val(), this.value)\" />";
        $tablestring .= "</div>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Right</span>";
        $tablestring .= "<input type='text' id='global_button_border_radius_bottom_right' value='$global_button_border_radius_bottom_right' class='arp_tab_txt arp_tab_column_radius_txt' name='global_button_border_radius_bottom_right' onBlur=\"arp_update_button_border_radius(jQuery('#global_button_border_radius_top_left').val(), jQuery('#global_button_border_radius_top_right').val(), this.value, jQuery('#global_button_border_radius_bottom_left').val())\" />";
        $tablestring .= "</div>";

        $tablestring .= "</div>";



        $tablestring .= "<div class='arp_button_radius_main'>";
        $tablestring .= "<div class='arp_column_radius_bottom'>";
        $tablestring .= "<span>Top</span>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='arp_column_radius_bottom'>";
        $tablestring .= "<span>Bottom</span>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";


        






        $tablestring .= "</div>";

        $tablestring .= "</div>";

        

        

        $tablestring .= "<div class='general_animation_tab enable global_opts' id='column_effects' >";

        $tablestring .= "<div class='animation_dropdown'>";

        $tablestring .= "<div class='arprice_option_belt_title'>" . esc_html__("Effects", 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_option_animation_dropdown arp_offset_container' id='column_option_animation_dropdown'>";

        

        $tablestring .= "<div class='column_content_light_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height' >" . esc_html__('Background Image', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right opt_bg_icon_alignment' >";

        $template_bg_img='';
        if(isset($column_animation['template_bg_img']) && $column_animation['template_bg_img'] !=''){
            $template_bg_img= $column_animation['template_bg_img'];
        }

        
        $background_image_upload_url = PRICINGTABLE_BG_IMG_UPLOAD_URL.$template_bg_img;
        $img_display_none ='';
        $upload_btn_none='';

        if($template_bg_img == ''){
            $img_display_none = 'display:none;';
        }else{
            $upload_btn_none = 'display:none;';
        }

        $tablestring .= "<div class='arp_ajaxfile_after_upload' style='".$img_display_none."'>";

        $arp_bg_img_style = ($arp_is_rtl) ? "margin-left:15px;" : "margin-right:15px;";
        if($template_bg_img != ''){
            $tablestring .="<img src='".$background_image_upload_url."' height='35' width='35' name='arp_bg_img_preview' id='arp_bg_img_preview' style='border:1px solid #D5E3FF !important; {$arp_bg_img_style}'>";
        } else {

        }

        $tablestring .="<span id='delete_bg_image' style='width:35px;height: 35px;display:inline-block;cursor: pointer;'><svg width='23px' height='27px' viewBox='0 0 30 30'><path xmlns='http://www.w3.org/2000/svg' fill-rule='evenodd' clip-rule='evenodd' fill='#53575D' d='M19.002,4.351l0.007,16.986L3.997,21.348L3.992,4.351H1.016V2.38  h1.858h4.131V0.357h8.986V2.38h4.146h1.859l0,0v1.971H19.002z M16.268,4.351H6.745H5.993l0.006,15.003h10.997L17,4.351H16.268z   M12.01,7.346h1.988v9.999H12.01V7.346z M9.013,7.346h1.989v9.999H9.013V7.346z'></path></svg></span>";



        $tablestring .= "</div>";

        $tablestring.="<div class='delete_bg_img_container' id='delete_bg_img_container' style='display: none;'>";

        $tablestring.="<div class='delete_bg_img_column_arrow'></div>";

        $tablestring.="<div class='delete_bg_img_title'>".esc_html__('Are you sure you want to delete this images?', 'ARPrice')."</div>";

        $tablestring.="<div class='delete_bg_column_buttons'>";

        $tablestring.="<button id='Model_Delete_Column_bg_img_ok_0' col-id='0' type='button' class='delete_img_ok' value='ok'>".esc_html__('Ok', 'ARPrice')."</button>";
        $tablestring.="<button id='Model_Delete_Column_bg_img_cancel_0' col-id='0' type='button' class='delete_img_cancle' value='Cancel'>".esc_html__('Cancel', 'ARPrice')."</button>";

        $tablestring.="</div>";

        $tablestring.="</div>";

        $tablestring .="<div class='arp_imageloader' id='ajax_form_loader' style='display:none;'></div>";

        $tablestring .= "<div class='arp_ajaxfileupload' style='".$upload_btn_none."'>";
        $tablestring .= "<div class='arp_form_style_file_upload_icon' style='padding-right:1px;'>";

        $tablestring .="<svg width='16' height='18' viewBox='0 0 18 20' fill='#ffffff'><path xmlns='http://www.w3.org/2000/svg' d='M15.906,18.599h-1h-12h-1h-1v-7h2v5h12v-5h2v7H15.906z M13.157,7.279L9.906,4.028v8.571c0,0.552-0.448,1-1,1c-0.553,0-1-0.448-1-1v-8.54l-3.22,3.22c-0.403,0.403-1.058,0.403-1.46,0 c-0.403-0.403-0.403-1.057,0-1.46l4.932-4.932c0.211-0.211,0.488-0.306,0.764-0.296c0.275-0.01,0.553,0.085,0.764,0.296 l4.932,4.932c0.403,0.403,0.403,1.057,0,1.46S13.561,7.682,13.157,7.279z'></path></svg>";

        $tablestring .= "</div>";

        $tablestring .= "<input type='file' name='form_bg_img' id='form_bg_img' data-val='form_bg' class='original' style='position: absolute; cursor: pointer; top: 0px; padding:0; margin:0; height:100%; width:100%; right:0; z-index: 100; opacity: 0; filter:alpha(opacity=0);'>";

        
        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";


        $tablestring .= "<div class='column_content_light_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_opts arp_allow_animation'>";

                $tablestring .= "<div class='column_opt_label two_cols'>" . esc_html__('Column Hover Effect', 'ARPrice') . "</div>";

                $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

                    $column_settings['enable_hover_effect'] = isset($column_settings['enable_hover_effect']) ? $column_settings['enable_hover_effect'] : 0;

                    $switch_style = ($arp_is_rtl) ? "left:-5px;" : "right:-5px;";
                    $tablestring .= "<span class='arp_switch_wrapper arp_align_right' style='{$switch_style}'>";

                        $tablestring .= "<input type='checkbox' name='enable_hover_effect' id='enable_hover_effect' class='arp_switch arp_enable_hover_effect_switch' value='1'  " . checked($column_settings['enable_hover_effect'], 1, false) . " />";

                        $tablestring .= "<span></span>";
                    $tablestring .= "</span>";

                $tablestring .= "</div>";

                $help_style = ($arp_is_rtl) ? "margin-right:15px;" : "margin-left:15px;";
                $tablestring .= "<div class='column_opt_label_help'>(" . esc_html__('Active column effects and hover color changes will be enabled.', 'ARPrice') . ")</div>";

            $tablestring .= "</div>";

            $tablestring .= "<div class='column_opt_label two_cols column_opt_sub_label column_opt_label_height'>".esc_html__( 'Select Hover Effect', 'ARPrice' )."</div>";

            $tablestring .= "<div class='column_opt_opts two_cols effect_opt_dd_alignment'>";

                $tablestring .= "<div class='column_hover_effect'>";

                    $tablestring .= "<input type='hidden' id='column_high_on_hover' name='column_high_on_hover' value='" . $column_settings['column_highlight_on_hover'] . "' >";
                    $temp_class = '';
                    if ( !isset( $column_settings['enable_hover_effect'] ) || $column_settings['enable_hover_effect'] != 1) {
                        $temp_class = 'arp_disabled';
                    }

                    $arp_selectbox_dl_style = ($arp_is_rtl) ? "margin-left:10px;float:left;" : "margin-right:10px;float:right;";
                    $tablestring .= "<dl class='arp_selectbox $temp_class' id='column_high_on_hover_dd' data-name='column_high_on_hover' data-id='column_high_on_hover' style='width:120px !important;margin-top:18px; {$arp_selectbox_dl_style}'>";

                        if (isset($arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']]) && $arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] != '') {
                            $arp_selectbox_placeholder = $column_settings['column_highlight_on_hover'];
                            $arp_selectbox_placeholder = $arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$arp_selectbox_placeholder];
                        } else {
                            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');
                        }

                        $arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] = isset($arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']]) ? $arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] : '';

                        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" .$arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

                        $tablestring .= "<dd>";

                            $tablestring .= "<ul data-id='column_high_on_hover' class='arp_active_column'>";
            
                                $template_no_hover_effect = array('arptemplate_25');
            
                                foreach ($arp_mainoptionsarr['general_options']['highlightcolumnonhover'] as $j => $hover_effect) {

                                    if ( ($is_animated == 1 || in_array($reference_template,$template_no_hover_effect) ) && $hover_effect == 'Hover Effect') {
                    
                                    } else {
                                        if ($hover_effect == 'Shadow effect') {
                                            if ($reference_template != 'arptemplate_23') {
                                                if ($column_settings['column_box_shadow_effect'] == 'shadow_style_none' || $column_settings['column_box_shadow_effect'] == '') {
                                                    $tablestring .= "<li class='arp_selectbox_option arp_shadow_effect' data-value='" . $j . "' data-label='" . $hover_effect . "'>" . $hover_effect . "</li>";
                                                } else {
                                                    $tablestring .= "<li id='arp_shadow_effect' class='arp_selectbox_option arp_shadow_effect arp_shadow_effect_disabled' data-value='" . $j . "' data-label='" . $hover_effect . "'>" . $hover_effect . "</li>";
                                                }
                                            }
                                        } else {
                                            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $j . "' data-label='" . $hover_effect . "'>" . $hover_effect . "</li>";
                                        }
                                    }
                                }

                            $tablestring .= "</ul>";

                        $tablestring .= "</dd>";

                    $tablestring .= "</dl>";

                $tablestring .= "</div>";

            $tablestring .= "</div>";


            $tablestring .= "<div class='column_opt_opts arp_allow_animation' style='$button_button_type'>";

                $tablestring .= "<div class='column_opt_label two_cols' >" . esc_html__('Button Hover Effect', 'ARPrice')."</div>";

                $tablestring .= "<div class='column_opt_opts two_cols align_right' >";
                    $tablestring .= "<span class='arp_switch_wrapper arp_align_right opt_switch_alignment' >";

                        $column_settings['enable_button_hover_effect'] = isset($column_settings['enable_button_hover_effect']) ? $column_settings['enable_button_hover_effect'] : 0;

                        $tablestring .= "<input type='checkbox' name='enable_button_hover_effect' id='enable_button_hover_effect' value='1' " . checked($column_settings['enable_button_hover_effect'], 1, false) . " class='arp_switch light_bg' />";

                        $tablestring .= "<span></span>";
                    $tablestring .= "</span>";
                $tablestring .= "</div>";

                $tablestring .= "<div class='column_opt_label_help'>(" . esc_html__('You can see button hover effect at preview and front end.', 'ARPrice') . ")</div>";

            $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (in_array(1, $caption_col))
            $cls = 'column_content_light_row';
        else
            $cls = 'column_content_dark_row';


        if (isset($template_settings['features']['is_animated']) && $template_settings['features']['is_animated'] == 0 && $ref_template != 'arptemplate_23' && $ref_template != 'arptemplate_21') {

            $arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] = isset($arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']]) ? $arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] : '';

            if ($arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] == 'Shadow effect') {
                $arp_selectbox_disabled = "disabled='disabled'";
                $arp_selectbox_disabled_class = 'arp_selectbox_disabled';
            } else {
                $arp_selectbox_disabled = '';
                $arp_selectbox_disabled_class = '';
            }

            $tablestring .= "<div id='column_box_shadow_effect' class='$cls column_opt_row'>";

                $tablestring .= "<div class='column_opt_label  two_cols effect_opt_label_height' >" . esc_html__('Column Shadow', 'ARPrice');

                $tablestring .= "</div>";

                $tablestring .= "<div id='column_box_shadow_options' class='column_opt_opts two_cols'>";

                    if ($column_settings['column_box_shadow_effect'] != '') {
                        $column_box_shadow_effect = $column_settings['column_box_shadow_effect'];
                    } else {
                        $column_box_shadow_effect = 'shadow_style_none';
                    }

                    $tablestring .= "<input type='hidden' name='column_box_shadow_effect' class='arp_box_shadow_change' id='column_box_shadow_effect' value='" . $column_box_shadow_effect . "' />";


                    if ($column_settings['column_box_shadow_effect'] == 'shadow_style_1') {
                        $shadow_span_text = 'Style 1';
                    } else if ($column_settings['column_box_shadow_effect'] == 'shadow_style_2') {
                        $shadow_span_text = 'Style 2';
                    } else if ($column_settings['column_box_shadow_effect'] == 'shadow_style_3') {
                        $shadow_span_text = 'Style 3';
                    } else if ($column_settings['column_box_shadow_effect'] == 'shadow_style_4') {
                        $shadow_span_text = 'Style 4';
                    } else if ($column_settings['column_box_shadow_effect'] == 'shadow_style_5') {
                        $shadow_span_text = 'Style 5';
                    } else {
                        $shadow_span_text = 'None';
                    }

                    $tablestring .= '<dl name="column_box_shadow_effect" style="width:120px !important;margin-top:18px;margin-right:-2px;float:right;" id="column_box_shadow_effect" class="arp_selectbox">'
                    . '<dt id="column_box_shadow_dt" class="' . $arp_selectbox_disabled_class . '" ' . $arp_selectbox_disabled . ' ><span>' . $shadow_span_text . '</span><input type="text" class="arp_autocomplete" value="None" style="display:none;"><i class="fas fa-caret-down fa-lg"></i></dt>'
                    . '<dd><ul data-id="column_box_shadow_effect" class="column_box_shadow_effect" id="column_box_shadow_effect1">';

                        foreach ($arp_mainoptionsarr['general_options']['column_box_shadow_effect'] as $key => $column_box_shadow_effect) {

                            $tablestring .= '<li data-label="' . $column_box_shadow_effect . '" data-value="' . $key . '" class="arp_selectbox_option" style="margin:0">' . $column_box_shadow_effect . '</li>';
                        }

                    $tablestring .= '</ul>'
                    . '</dd>'
                    . '</dl>';

                $tablestring .= "</div>";

                $tablestring .= "<div class='column_opt_label_help opt_note_alignment' >(" . esc_html__('Column shadow will not apply with column border radius and Active Column Shadow Effect.', 'ARPrice') . ")</div>";

            $tablestring .= '</div>';
        }

        $tablestring .= "<div class='column_opt_row'>";

            $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height'>" . esc_html__( 'Toggle Effect', 'ARPrice' ) . "</div>";

            $toggle_effect_style = '';
            $toggle_effect_attrs = '';
            if ( $general_settings['enable_toggle_price'] != 1 ) {
                $toggle_effect_style = 'arp_disabled';
                $toggle_effect_attrs = 'disabled="disabled"';
            }

            $tablestring .= "<div class='column_opt_opts two_cols'>";

                if( !empty( $column_settings['column_toggle_ffect'] ) ){
                    $toggle_effect = $column_settings['column_toggle_ffect'];
                } else {
                    $toggle_effect = 'fade';
                }

                $toggle_effect_arr = $arp_pricingtable->arp_toggle_effect_array();

                $toggle_effect_text = $toggle_effect_arr[$toggle_effect]['label'];

                $tablestring .= "<input type='hidden' name='column_toggle_effect' class='arp_column_toggle_effect' id='column_toggle_effect' value='".$toggle_effect."' />";

                $tablestring .= '<dl name="column_toggle_effect" style="width:120px !important; margin-top:18px;margin-right:-2px;float:right;" class="arp_selectbox '.$toggle_effect_style.'">';

                    $tablestring .= '<dt id="column_toggle_effect_dt"><span>' . $toggle_effect_text . '</span><input type="text" class="arp_autocomplete" value="'.$toggle_effect_text.'" style="display:none;"><i class="fas fa-caret-down fa-lg"></i></dt>';

                    $tablestring .= '<dd>';

                        $tablestring .= '<ul data-id="column_toggle_effect" class="column_toggle_effect">';

                            foreach( $toggle_effect_arr as $toggle_effect => $toggle_effect_opts ){
                                $tablestring .= '<li class="arp_selectbox_option" style="margin:0;" data-label="'.$toggle_effect_opts['label'].'" data-value="'.$toggle_effect.'">'.$toggle_effect_opts['label'].'</li>';
                            }

                        $tablestring .= '</ul>';

                    $tablestring .= '</dd>';

                $tablestring .= '</dl>';

            $tablestring .= "</div>";

            $tablestring .= "<div class='column_opt_label_help'>(".esc_html__('You can see the toggle effect at preview and front-end. Also, this will be only effective when toggle price option is enable.', 'ARPrice').")</div>";

        $tablestring .= "</div>";

        $toggle_column_animation_style = '';
        if ($reference_template == 'arptemplate_25' || $reference_template == 'arptemplate_26') {
            $toggle_column_animation_style = 'display:none;';
        }

        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $toggle_column_animation_style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_title_height' >" . esc_html__('Animate Price', 'ARPrice');
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_allow_animation' style='" . $toggle_column_animation_style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols' style='line-height:1.5;'>" . sprintf( esc_html__('Price(Number) Spin Effect On %s Toggle', 'ARPrice'), '<br/>' ). "</div>";

        
        $tablestring .= "<div class='column_opt_opts two_cols align_right effect_opt_dropdown_alignment' >";
        $column_settings['toggle_column_animation'] = isset($column_settings['toggle_column_animation']) ? $column_settings['toggle_column_animation'] : '';
        $temp_style = '';
        $temp_class = '';
        if ( $general_settings['enable_toggle_price'] != 1 ) {
            $temp_style = 'disabled=disabled;';
            $temp_class = 'arp_disabled';
        }

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right effect_opt_switch_align'>";

        
        $tablestring .= "<input type='checkbox' name='toggle_column_animation' id='toggle_column_animation' class='arp_checkbox light_bg $temp_class' value='1' " . checked($column_settings['toggle_column_animation'], 1, false) . " $temp_style />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts column_opt_label_help'>(" . sprintf( esc_html__('Wrap your pricing number with class %s with span tag. It will animate numbers of pricing while toggle. If you have the price with comma(,) as a decimal separator then add %s class in the span tag', 'ARPrice'), '<b>arp_price_amount</b>', '<b>arp_comma_decimal</b>' ) . ")</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";




        $tablestring .= "<div class='column_content_dark_row column_opt_row' style='border-bottom: none;'>";

        $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height' >" . esc_html__('Column Rotation', 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $animation_option_disable = '';
        if ($column_animation['is_animation'] == 'yes') {
            $checked = "checked='checked'";
            $arp_check_box_disable = '';
        } else {
            $checked = '';
            $animation_option_disable = 'arp_disabled';
            $arp_check_box_disable = 'disabled="disabled"';
        }
        $tablestring .= "<span class='arp_switch_wrapper arp_align_right effect_opt_switch_align' >";

        $tablestring .= "<input type='checkbox' " . $checked . " class='light_bg arp_switch arp_column_rotation_switch' name='is_animation' id='is_animation' value='yes' />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";



        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label_help'>(" . esc_html__('Rotation effect will be shown in preview and frontend only.', 'ARPrice') . ")</div>";

        $tablestring .= "<div class='column_opt_label two_cols column_opt_sub_label column_opt_label_height' >" . esc_html__('Visible Columns', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right' >";

        $vcols_readonly = '';

        if ($column_animation['is_animation'] == 'yes')
            $vcols_readonly = '';
        else
            $vcols_readonly = 'readonly="readonly"';

        $tablestring .= "<input type='text' " . $vcols_readonly . " name='visible_columns' class='arp_tab_txt' value='" . $column_animation['visible_column'] . "' id='visible_columns' />";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label two_cols column_opt_sub_label column_opt_label_height arp_visible_columns_tablet' >" . esc_html__('Visible Columns for tablet', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right' >";

        $column_animation['visible_columns_tablet'] = !empty( $column_animation['visible_columns_tablet'] ) ? $column_animation['visible_columns_tablet'] : $column_animation['visible_column'];

        $tablestring .= "<input type='text' " . $vcols_readonly . " name='visible_columns_tablet' class='arp_tab_txt' value='" . $column_animation['visible_columns_tablet'] . "' id='visible_columns_tablet' />";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label two_cols column_opt_sub_label column_opt_label_height' style='margin-left: 1px;'>" . esc_html__('Column to scroll', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
        $scols_readonly = '';
        if ($column_animation['is_animation'] == 'yes')
            $scols_readonly = '';
        else
            $scols_readonly = 'readonly="readonly"';
        $tablestring .= "<input type='text' " . $scols_readonly . " name='column_to_scroll' class='arp_tab_txt' value='" . $column_animation['scrolling_columns'] . "' id='column_to_scroll' />";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols arp_fix_height' style='height:46px;'>" . esc_html__('Transition Speed', 'ARPrice');

        $tablestring .= "<div class='column_opt_label_help'>(" . esc_html__('Millisecond', 'ARPrice') . ")</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
        $anim_speed = '';
        if ($column_animation['is_animation'] == 'yes')
            $anim_speed = '';
        else
            $anim_speed = 'readonly="readonly"';
        $tablestring .= "<input type='text' " . $anim_speed . " name='slide_transition_speed' class='arp_tab_txt' value='" . $column_animation['transition_speed'] . "' id='slide_transition_speed' />";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label two_cols column_opt_sub_label' style='margin-left: 1px;'>" . esc_html__('Autoplay', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        if ($column_animation['autoplay'] == 1)
            $checked = "checked='checked'";
        else
            $checked = '';


        $tablestring .= "<span class='arp_price_checkbox_wrapper_standard arp_align_right'>";

        $tablestring .= "<input type='checkbox' name='is_autoplay' class='arp_checkbox light_bg $animation_option_disable' id='is_autoplay' value='1' " . $checked . " " . $arp_check_box_disable . " />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";

        $tablestring .= "</div>";

        if (in_array(1, $caption_col)){
            $sticky = 'display:block;';
        } else {
            $sticky = 'display:none;';
        }

        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols' style='{$sticky}'>";
        $tablestring .= esc_html__('Sticky Caption Column', 'ARPrice');
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        if (isset($column_animation['sticky_caption']) && $column_animation['sticky_caption'] == 1)
            $ch_sticky = "checked='checked'";
        else
            $ch_sticky = '';

        $tablestring .= "<span class='arp_price_checkbox_wrapper_standard arp_align_right' style='{$sticky};'>";

        $tablestring .= "<input type='checkbox' name='sticky_caption' class='arp_checkbox light_bg $animation_option_disable' id='sticky_column' value='1' " . $ch_sticky . " " . $arp_check_box_disable . " />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";


        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_label_help arp_column_help_depth_level1' style='{$sticky};'>(" . esc_html__('This will apply only in desktop and tablet.', 'ARPrice') . ")</div>";

        if (in_array(1, $caption_col)){
            $cls = 'column_content_dark_row';
        } else {
            $cls = 'column_content_light_row';
        }

        $tablestring .= "<div class='{$cls} column_opt_label two_cols column_opt_sub_label effect_opt_label_height' >" . esc_html__('Navigation Button', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols arp_align_right'>";

        
        if ($column_animation['navi_nav_btn'] == 'navigation') {
            $checked = "checked='checked'";            
        }else{
            $checked = "";          
        }

        if ($column_animation['is_animation'] == 'yes') {
            $arp_check_box_disable = '';
            $temp_class = '';
        }else{
            $arp_check_box_disable = 'disabled="disabled"';
            $temp_class = 'arp_disabled';
        }

        $tablestring .= "<div class='column_animation_easing_effect'>";
        
        $tablestring .= "<span class='arp_price_checkbox_wrapper_standard arp_align_right' >";

        $tablestring .= "<input type='checkbox' " . $checked . " class='arp_checkbox light_bg $temp_class' name='navigation_buttons' id='navigation_buttons' value='navigation' ".$arp_check_box_disable." />";

        $tablestring .= "<span></span>";

        $tablestring .= "</span>";

        $tablestring .= "</div>";

        if (in_array(1, $caption_col))
            $cls = 'column_content_dark_row';
        else
            $cls = 'column_content_light_row';



        $tablestring .= "</div>";

        

        $tablestring .= "<div class='{$cls} column_opt_label two_cols effect_opt_label_height column_opt_sub_label' style='margin-left: 1px;'>" . esc_html__('Pagination Button', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols effect_opt_dd_alignment'>";

        $default = $column_animation['pagi_nav_btn'];

        $option = isset($arp_mainoptionsarr['general_options']['column_animation']['pagi_nav_btns'][$default]) ? $arp_mainoptionsarr['general_options']['column_animation']['pagi_nav_btns'][$default] : 'pagination_top';

        $tablestring .= "<div class='column_animation_easing_effect'>";

        $tablestring .= "<input type='hidden' name='pagination_navigation_buttons' id='pagination_navigation_buttons' value='" . $default . "' />";

        $tablestring .= "<dl class='arp_selectbox $animation_option_disable' id='pagi_nav_btns' data-name='pagi_nav_btns' data-id='pagination_navigation_buttons' style='width:95px;margin-top:18px;margin-right:15px;float:right;'>";

        $tablestring .= "<dt><span style='width:89%;float:left;'>" . $option . "</span><input type='text' value='" . $option . "' style='display:none;' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= '<dd>';

        $tablestring .= "<ul class='arp_column_pagination_navigation' data-id='pagination_navigation_buttons' style='max-height:80px;'>";

        foreach ($arp_mainoptionsarr['general_options']['column_animation']['pagi_nav_btns'] as $x => $btns) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $x . "' data-label='" . $btns . "' >" . $btns . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (in_array(1, $caption_col))
            $cls = 'column_content_light_row';
        else
            $cls = 'column_content_dark_row';

        $navigation_effect = array();
        $navigation_effect = array_merge($arp_mainoptionsarr['general_options']['column_animation']['easing_effect'], $arp_mainoptionsarr['general_options']['column_animation']['sliding_effect']);

        $tablestring .= "<div class='{$cls} column_opt_label column_opt_sub_label two_cols' effect_opt_label_height>" . esc_html__('Navigation effect', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols effect_opt_dd_alignment'>";

        $tablestring .= "<div class='column_animation_sliding_effect'>";

        $tablestring .= "<input type='hidden' id='sliding_effect' name='sliding_effect' value='" . $column_animation['sliding_effect'] . "' />";

        $tablestring .= "<dl class='arp_selectbox $animation_option_disable' id='sliding_effect_dd' data-name='sliding_effect' data-id='sliding_effect' style='width:120px !important;margin-right:10px;float:right;'>";

        if ($column_animation['sliding_effect'])
            $arp_selectbox_placeholder = $column_animation['sliding_effect'];
        elseif ($column_animation['easing_effect'])
            $arp_selectbox_placeholder = $column_animation['easing_effect'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        switch ($column_animation['sliding_effect']) {
                case 'swing':
                    $effect_options = 'Swing';
                    break;
                case 'linear':
                    $effect_options = 'Linear';
                    break;
                case 'cubic':
                    $effect_options = 'Cubic';
                    break;
                case 'elastic':
                    $effect_options = 'Elastic';
                    break;
                case 'quadratic':
                    $effect_options = 'Quadratic';
                    break;
                case 'slide':
                    $effect_options = 'Slide';
                    break;
                case 'fade':
                    $effect_options = 'Fade';
                    break;
                case 'crossfade':
                    $effect_options = 'Cross Fade';
                    break;
                case 'directscroll':
                    $effect_options = 'Direct Scroll';
                    break;
                case 'cover':
                    $effect_options = 'Cover';
                    break;
                case 'uncover':
                    $effect_options = 'Uncover';
                    break;
                default:
                    $effect_options = $effect;
                    break;
            }


        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $effect_options . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_column_sliding_effect' data-id='sliding_effect' style='max-height:80px;'>";
        foreach ($navigation_effect as $effect) {
            switch ($effect) {
                case 'swing':
                    $effect_options = 'Swing';
                    break;
                case 'linear':
                    $effect_options = 'Linear';
                    break;
                case 'cubic':
                    $effect_options = 'Cubic';
                    break;
                case 'elastic':
                    $effect_options = 'Elastic';
                    break;
                case 'quadratic':
                    $effect_options = 'Quadratic';
                    break;
                case 'slide':
                    $effect_options = 'Slide';
                    break;
                case 'fade':
                    $effect_options = 'Fade';
                    break;
                case 'crossfade':
                    $effect_options = 'Cross Fade';
                    break;
                case 'directscroll':
                    $effect_options = 'Direct Scroll';
                    break;
                case 'cover':
                    $effect_options = 'Cover';
                    break;
                case 'uncover':
                    $effect_options = 'Uncover';
                    break;
                default:
                    $effect_options = $effect;
                    break;
            }
            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $effect . "' data-label='" . $effect_options . "'>" . $effect_options . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        

        $tablestring .= "</div>";

        $tablestring .= "</div>";


        $tablestring .= "</div>";
       

        

        $tablestring .= "<div class='general_tooltip_tab enable global_opts' id='tootip_options' >";

        $tablestring .= "<div class='tooltip_dropdown'>";

        $tablestring .= "<div class='arprice_option_belt_title'>" . esc_html__('Tooltip', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_option_tooltip_dropdown arp_offset_container' id='column_option_tooltip_dropdown'>";

        
        $tablestring .= "<div class='column_content_light_row column_opt_row arp_tooltip_row' >";

        $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height'>" . esc_html__('Display Style', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols tooltip_dd_alignment'>";

        $tablestring .= "<input type='hidden' id='tooltip_style' name='tooltip_style' value='" . $tooltip_settings['style'] . "' />";

        $arp_selectbox_dl_style = ($arp_is_rtl) ? "margin-left:15px;float:left;" : "margin-right:15px;float:right;";
        $tablestring .= "<dl class='arp_selectbox' id='tooltip_style_dd' data-name='tooltip_style' data-id='tooltip_style' style='width:110px;margin-top:18px; {$arp_selectbox_dl_style}'>";

        if ($tooltip_settings['style'])
            $arp_selectbox_placeholder = $tooltip_settings['style'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $tooltip_settings['style'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='tooltip_style'>";

        foreach ($arp_mainoptionsarr['general_options']['tooltipsetting']['style'] as $tooltip_style) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $tooltip_style . "' data-label='" . $tooltip_style . "'>" . $tooltip_style . "</li>";
        }
        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        
        

        if ($tooltip_settings['tooltip_display_style']) {
            $arp_tooltip_display_style = $tooltip_settings['tooltip_display_style'];
        } else {
            $arp_tooltip_display_style = $arp_mainoptionsarr['general_options']['tooltipsetting']['tooltip_display_style'][0];
        }

        $tablestring .= "<div class='column_content_dark_row column_opt_row arp_tooltip_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>";

        $tablestring .= esc_html__("Show Info Icon", 'ARPrice');

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right tooltip_chk_box_alignment'>";

        

        $tablestring .= "<input type='hidden' id='tooltip_display_style' name='tooltip_display_style' value='" . $arp_tooltip_display_style . "'  />";

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

        $tablestring .= "<input type='checkbox' name='show_info_icon' id='arp_show_info_icon' class='arp_checkbox light_bg' value='1' " . checked($arp_tooltip_display_style, 'informative', false) . " />";

        $tablestring .= "<span></span>";
        $tablestring .= "</span>";


        $tablestring .= "</div>";

        $tablestring .= "</div>";

        
        

        if ($tooltip_settings['tooltip_informative_icon'])
            $arp_selectbox_placeholder = $tooltip_settings['tooltip_informative_icon'];
        else
            $arp_selectbox_placeholder = $arp_mainoptionsarr['general_options']['tooltipsetting']['informative_tootip_icon'][0];


        $arp_tooltip_icon_display = ($arp_tooltip_display_style == 'informative') ? 'style="display:block;"' : 'style="display:none;"';

        $tablestring .= "<div class='column_content_light_row column_opt_row arp_tooltip_row' id='arp_tooltip_icon_main' {$arp_tooltip_icon_display}>";

        $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height' >" . esc_html__('Select Icon', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right tooltip_icon_alignment'>";

        $tablestring .="<div class='arp_informative_tooltip_icon'>";

        $tablestring .= '<textarea style="display:none" id="tooltip_informative_icon" name="tooltip_informative_icon">' . $arp_selectbox_placeholder . '</textarea>';

        $tablestring .= "<span class='arp_informative_tooltip_icon_display'>" . $arp_selectbox_placeholder . "</span>";

        $tablestring .="</div>";

        $tablestring .= "<button id='arp_informative_tooltip_fontawesome' style='margin:0;' type='button' class='arp_informative_tooltip_fontawesome col_opt_btn align_right' data-insert='tooltip_informative_icon' >";

        $tablestring .="<img src='" . PRICINGTABLE_URL . "/images/icons/font-awesome-icon_white.png' >";

        $tablestring .= "</button>";

        $tablestring .= "<div class='arp_tooltip_icons_container'>";
        $tablestring .= "<div class='arp_tooltip_icons_container_arrow left_position'></div>";
        $tablestring .= "<div class='arp_tooltip_icon_list'>";

        $tablestring .= "<div id='fa-exclamation' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 1'><i class='fas fa-exclamation'></i></div>";
        $tablestring .= "<div id='fa-exclamation-circle' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 2'><i class='fas fa-exclamation-circle'></i></div>";
        $tablestring .= "<div id='fa-exclamation-triangle' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 3'><i class='fas fa-exclamation-triangle'></i></div>";
        $tablestring .= "<div id='fa-info' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 4'><i class='fas fa-info'></i></div>";
        $tablestring .= "<div id='fa-info-circle' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 5'><i class='fas fa-info-circle'></i></div>";
        $tablestring .= "<div id='fa-info-circle' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 6'><i class='fas fa-question'></i></div>";
        $tablestring .= "<div id='fa-question-circle' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 7'><i class='fas fa-question-circle'></i></div>";

        $tablestring .="</div>";

        $tablestring .="</div>";


        $tablestring .= "</div>";

        $tablestring .= "</div>";

        
        
        $tooltip_settings['tooltip_icon_position'] = isset($tooltip_settings['tooltip_icon_position']) ? $tooltip_settings['tooltip_icon_position'] : 'float_to_content';
        $tablestring .= "<div class='column_content_dark_row column_opt_row arp_tooltip_row' id='arp_tooltip_icon_position' $arp_tooltip_icon_display>";

        $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height' >" . esc_html__('Icon Position', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right tooltip_dd_alignment' >";
        $tooltip_settings['tooltip_icon_position'] = isset($tooltip_settings['tooltip_icon_position']) ? $tooltip_settings['tooltip_icon_position'] : '';
        $tablestring .= "<input type='hidden' id='tooltip_icon_position' name='tooltip_icon_position' value='" .$tooltip_settings['tooltip_icon_position'] . "'  />";
        
        $arp_selectbox_dl_style = ($arp_is_rtl) ? "margin-left:15px;float:left;" : "margin-right:15px;float:right;";
        $tablestring .= "<dl class='arp_selectbox' data-name='tooltip_icon_position' data-id='tooltip_icon_position' style='width:110px;margin-top:18px;{$arp_selectbox_dl_style}'>";

        if (isset($tooltip_settings['tooltip_icon_position'])) {
            $arp_selectbox_placeholder = $arp_mainoptionsarr['general_options']['tooltipsetting']['icon_position'][$tooltip_settings['tooltip_icon_position']];
        } else {
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');
        }
        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' value='" . $arp_selectbox_placeholder . "' style='display:none;' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='tooltip_icon_position'>";

        foreach ($arp_mainoptionsarr['general_options']['tooltipsetting']['icon_position'] as $key => $tooltip_icon_position) {
            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $key . "' data-label='" . $tooltip_icon_position . "'>" . $tooltip_icon_position . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        
        
        $tablestring .= "<div class='column_content_dark_row column_opt_row arp_tooltip_row'>";

        $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height' >" . esc_html__('Animation Effect', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right tooltip_dd_alignment' >";
        $tablestring .= "<input type='hidden' id='tooltip_animation_style' name='tooltip_animation_style' value='" . $tooltip_settings['animation'] . "'  />";
        
        $arp_selectbox_dl_style = ($arp_is_rtl) ? "margin-left:15px;float:left;" : "margin-right:15px;float:right;";
        $tablestring .= "<dl class='arp_selectbox' data-name='tooltip_animation_style' data-id='tooltip_animation_style' style='width:110px;margin-top:18px; {$arp_selectbox_dl_style}'>";

        if ($tooltip_settings['animation'])
            $arp_selectbox_placeholder = $tooltip_settings['animation'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' value='" . $tooltip_settings['animation'] . "' style='display:none;' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='tooltip_animation_style'>";

        foreach ($arp_mainoptionsarr['general_options']['tooltipsetting']['animation'] as $tooltip_animation) {
            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $tooltip_animation . "' data-label='" . $tooltip_animation . "'>" . $tooltip_animation . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        
        

        $tooltip_settings['tooltip_width'] = (!empty($tooltip_settings['tooltip_width'])) ? $tooltip_settings['tooltip_width'] : 0;

        $tablestring .= "<div class='column_content_dark_row column_opt_row arp_tooltip_row arp_tooltip_row'>";

        $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height' >" . esc_html__('Tooltip Width', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts  two_cols align_right' style='margin: 0;'>";

        $tablestring .= "<div class='col_opt_input'>";

        $tablestring .= "<span class='arp_col_px' style='margin:-2px -17px 5px;'>px</span>";

        $tablestring .= "<input type='text' value='{$tooltip_settings['tooltip_width']}' class='arp_tab_txt' id='tooltip_width' name='tooltip_width'>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label_help'>(" . esc_html__('width (0) zero value indicate auto width', 'ARPrice') . ")</div>";

        $tablestring .= "</div>";

        
        
        $tablestring .= "<div class='column_content_dark_row column_opt_row arp_tooltip_row'>";

        $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height' >" . esc_html__('Show On', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols tooltip_dd_alignment'>";

        if ($tooltip_settings['tooltip_trigger_type'])
            $arp_selectbox_placeholder = $tooltip_settings['tooltip_trigger_type'];
        else
            $arp_selectbox_placeholder = $arp_mainoptionsarr['general_options']['tooltipsetting']['trigger_on'][0];

        $tablestring .= "<input type='hidden' id='tooltip_trigger_type' name='tooltip_trigger_type' value='" . $arp_selectbox_placeholder . "' />";

        $arp_selectbox_dl_style = ($arp_is_rtl) ? "margin-left:15px;float:left;" : "margin-right:15px;float:right;";
        $tablestring .= "<dl class='arp_selectbox' id='tooltip_trigger_type_dd' data-name='tooltip_trigger_type' data-id='tooltip_trigger_type' style='width:110px;margin-top:18px; {$arp_selectbox_dl_style}'>";

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $tooltip_settings['tooltip_trigger_type'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='tooltip_trigger_type'>";

        foreach ($arp_mainoptionsarr['general_options']['tooltipsetting']['trigger_on'] as $tooltip_trigger_type) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $tooltip_trigger_type . "' data-label='" . $tooltip_trigger_type . "'>" . $tooltip_trigger_type . "</li>";
        }
        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        



        $tablestring .= "<div class='column_content_light_row column_opt_row arp_no_border arp_tooltip_row' >";

        $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height'>" . esc_html__('Tooltip Position', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols tooltip_dd_alignment' >";

            $tablestring .= "<input type='hidden' id='tooltip_position' name='tooltip_position' value='" . $tooltip_settings['position'] . "' />";

            $arp_selectbox_dl_style = ($arp_is_rtl) ? "margin-left:15px;float:left;" : "margin-right:15px;float:right;";
        $tablestring .= "<dl class='arp_selectbox' id='tooltip_postion_dd' data-name='tooltip_position' data-id='tooltip_position' style='width:110px;margin-top:18px; {$arp_selectbox_dl_style}'>";

        if ($tooltip_settings['position'])
            $arp_selectbox_placeholder = $tooltip_settings['position'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $tooltip_settings['position'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='tooltip_position'>";

        foreach ($arp_mainoptionsarr['general_options']['tooltipsetting']['position'] as $tltp_position) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $tltp_position . "' data-label='" . $tltp_position . "'>" . $tltp_position . "</li>";
        }
        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";


        $tablestring .= "</div>";

        $tablestring .= "</div>";


        

        

        $tablestring .= "<div class='general_custom_css_tab enable global_opts' id='custom_css_options' >";

        $tablestring .= "<div class='arprice_option_belt_title'>" . esc_html__('Custom CSS', 'ARPrice') . "</div>";

        $tablestring .= "<div class='custom_css_dropdown arp_offset_container'>";

        $tablestring .= "<div class='column_opt_label_div two_column'>";

        $tablestring .= "<div class='column_opt_label_div'>" . esc_html__('Enter css class and style', 'ARPrice') . "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_content_light_row column_opt_row '>";

        $general_settings['arp_custom_css'] = isset($general_settings['arp_custom_css']) ? $general_settings['arp_custom_css'] : "";
        $tablestring .= "<div class='arp_custom_css_wrapper' style='height: 325px;'>";
        $tablestring .= "<textarea class='arp_custom_css' name='arp_custom_css' id='arp_custom_css'>" . $general_settings['arp_custom_css'] . "</textarea>";
        $tablestring .= "</div>";

        $css_span_style = ($arp_is_rtl) ? "margin-left:6px;" : "margin-right:6px;";
        $tablestring .= "<div class='opt_css_note_alignment'><span style='font-weight:normal; {$css_span_style}'>(e.g.) .btn{color:#000000;}</span></div>";

        $css_btn_style = ($arp_is_rtl) ? "float:right;" : "float:left;";
        $tablestring .= "<button id='arp_custom_css_btn' style='{$css_btn_style} margin:12px 0 5px 0;width:130px;' class='col_opt_btn' type='button'>" . esc_html__('Apply To Editor', 'ARPrice') . "</button>";



        $tablestring .= "</div>";





        $tablestring .= "<div class='column_content_dark_row column_opt_row arp_no_border'>";

        $tablestring .= "<div class='column_opt_label two_cols effect_opt_label_height'>" . esc_html__('CSS class info', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $tablestring .= "<span class='arp_switch_wrapper arp_align_right effect_opt_switch_align'>";

        $tablestring .= "<input type='checkbox' id='css_debug_mode' value='1' class='css_debug_mode arp_switch' name='arp_css_debug_mode' />";
        $tablestring .= "<span></span>";
        $tablestring .= "</span>";


        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label' style='box-sizing: border-box;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;-o-box-sizing: border-box; float: left; width: 100%;white-space:pre-wrap;' >"
                . "<span class='column_opt_label_help'>" . esc_html__('When you turn ON CSS Class Info, You will get an extra button on each column. By clicking on that button, you will get all CSS class information for that particular column.', 'ARPrice') . "</span>"
                . "</div>";

        $tablestring .= "<div class='column_opt_label' style='box-sizing:border-box; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;-o-box-sizing:border-box;float:left;width:100%;white-space:pre-wrap;'>";
        $tablestring .= "<div class='column_opt_custom_css_notice' style='line-height:normal;'>";
        $tablestring .= "Note: " . esc_html__("Some custom CSS properties may not apply in editor. Please check table Preview for all custom CSS you have applied.", 'ARPrice');
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";








        $tablestring .= "</div>";

        $tablestring .= "</div>";

        

        

        $tablestring .= "<div class='general_toggle_options_tab enable global_opts' id='toggle_content_options' >";

        $tablestring .= "<div class='arprice_option_belt_title'>" . esc_html__('Toggle Price', 'ARPrice') . "</div>";

        $tablestring .= "<input type='hidden' id='toggle_step_counter' value='{$arp_pricingtable->arp_toggle_counter()}' />";

        $tablestring .= "<input type='hidden' id='toggle_counter_data' value='".esc_html(json_encode($arp_pricingtable->arp_toggle_step_label_with_db($general_option['general_settings'])))."' />";

        $tablestring .= "<input type='hidden' id='toggle_wrapper_class' value='".json_encode($arp_pricingtable->arp_toggle_switch_wrapper_class())."' />";

        $tablestring .= "<input type='hidden' id='toggle_switch_width' value='".json_encode($arp_pricingtable->arp_toggle_switch_position())."' />";

        $tablestring .= "<input type='hidden' id='toggle_slide_button_width' value='".json_encode($arp_pricingtable->arp_toggle_slide_button_position())."' />";

        $tablestring .= "<input type='hidden' id='toggle_class_hide_show' value='".json_encode($arp_pricingtable->arp_toggle_class_hide_show())."' />";

        $tablestring .= "<input type='hidden' id='arp_toggle_name' value='".json_encode($total_tabs)."' />";

        $tablestring .= "<input type='hidden' id='arp_switch_tab_width' value='".json_encode($arp_pricingtable->arp_toggle_switch_tab_width())."' />";

        $tablestring .= "<input type='hidden' id='arp_toggle_switch_label_name' value='".json_encode($arp_pricingtable->arp_toggle_switch_label_name())."' />";
        
        if ($setact == 1) {
            $tablestring .= "<div class='toggle_options_dropdown arp_offset_container'>";

            if ($general_settings['enable_toggle_price'] == '') {
                $default_toggle_price = 0;
            } else {
                $default_toggle_price = $general_settings['enable_toggle_price'];
            }

            

            $tablestring .= "<div class='column_content_light_row column_opt_row' >";

            $tablestring .= "<div class='column_opt_label two_cols'>" . esc_html__('Enable Toggle Price', 'ARPrice') . "</div>";

            $tablestring .= "<div class='column_opt_opts two_cols align_right arp_toggle_price_main toggle_switch_alignment'>";

            $tablestring .= "<span class='arp_switch_wrapper arp_align_right'>";

            $tablestring .= "<input type='checkbox' id='enable_toggle_price_id' value='1' class='enable_toggle_price_id arp_switch_toogle' name='enable_toggle_price' ".checked($default_toggle_price,1,false)." />";

            $tablestring .= "<span></span>";
            $tablestring .= "</span>";


            $tablestring .= "<input type='hidden' id='enable_toggle_price_hidden' name='enable_toggle_price_hidden' value='" . $default_toggle_price . "' /> ";

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            if ($default_toggle_price == 0) {
                $toggle_copy_data_disabled = "disabled='disabled'";
                $toggle_button_disabled_color = "style='background: #e1e9f2;'";
            } else {
                $toggle_copy_data_disabled = "";
                $toggle_button_disabled_color = "";
            }
            
            
            $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height'>" . esc_html__('Copy First Tab Data To Other Tabs', 'ARPrice') . "</div>";

            $tablestring .= "<div class='column_opt_opts two_cols align_right' style='margin: 7px 0px 0px 0px !important;'>";

            
            $tablestring .= "<div class='copy_toggle_data_btn_div'>";
            $tablestring .= "<button type='button' class='copy_toggle_data_btn' name='toggle_copy_data_to_other_step' id='toggle_copy_data_to_other_step' value='1' ".$toggle_copy_data_disabled." ".$toggle_button_disabled_color." >".esc_html__('Copy', 'ARPrice')."</button>";
            $tablestring .= "</div>";


            $tablestring .= "</div>";

            $tablestring .= "</div>";
            

            $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label'>" . esc_html__('Toggle Button Style', 'ARPrice') . "</div>";

            $tablestring .= "<div class='column_opt_opts toggle_radio_alignment'>";
            if ($general_option['general_settings']['arp_toggle_main'] == 0) {
                $toggle_button_check = "checked='checked'";
            } else if ($general_option['general_settings']['arp_toggle_main'] == 1) {
                $toggle_radio_check = "checked='checked'";
            } else if ($general_option['general_settings']['arp_toggle_main'] == 2) {
                $toggle_border_button_check = "checked='checked'";
            } else if ($general_option['general_settings']['arp_toggle_main'] == 3) {
                $toggle_slide_button_check = "checked='checked'";
            } else if ($general_option['general_settings']['arp_toggle_main'] == 4) {
                $toggle_stepy_check = "checked='checked'";
            } else {
                $toggle_button_check = "checked='checked'";
            }

            if ($default_toggle_price == 0) {
                $toggle_disabled = "disabled='disabled'";
                $toggle_readonly = "readonly='readonly'";
            } else {
                $toggle_disabled = "";
                $toggle_readonly = "'";
            }
            $toggle_button_check = isset($toggle_button_check) ? $toggle_button_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style two_cols arp_price_radio_wrapper_standard'><input " . $toggle_button_check . " type='radio' id='toggle_option_main_button' class='toggle_option_main' data-style-name='button_switch_box' name='toggle_option_main' value='0' style='margin:0;' $toggle_disabled /><span></span> <label for='toggle_option_main_button'> " . esc_html__('Switch Style', 'ARPrice') . " </label> </div>";
            $toggle_radio_check = isset($toggle_radio_check) ? $toggle_radio_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style two_cols arp_price_radio_wrapper_standard'><input " . $toggle_radio_check . " type='radio' id='toggle_option_main_radio' class='toggle_option_main' data-style-name='radio_button_box' name='toggle_option_main' value='1' style='margin:0;' $toggle_disabled /><span></span> <label for='toggle_option_main_radio'> " . esc_html__('Radio Style', 'ARPrice') . " </label> </div>";
            $toggle_border_button_check = isset($toggle_border_button_check) ? $toggle_border_button_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style two_cols arp_price_radio_wrapper_standard'><input " . $toggle_border_button_check . " type='radio' id='toggle_option_main_border_button' class='toggle_option_main' data-style-name='border_button_box' name='toggle_option_main' value='2' style='margin:0;' $toggle_disabled /><span></span> <label for='toggle_option_main_border_button'> " . esc_html__('Border Button Style', 'ARPrice') . " </label> </div>";
            $toggle_slide_button_check = isset($toggle_slide_button_check) ? $toggle_slide_button_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style two_cols arp_price_radio_wrapper_standard'><input " . $toggle_slide_button_check . " type='radio' id='toggle_option_main_slide_button' class='toggle_option_main' data-style-name='slide_button_box' name='toggle_option_main' value='3' style='margin:0;' $toggle_disabled /><span></span> <label for='toggle_option_main_slide_button'> " . esc_html__('Slide Button Style', 'ARPrice') . " </label> </div>";

            $toggle_stepy_check = isset($toggle_stepy_check) ? $toggle_stepy_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style two_cols arp_price_radio_wrapper_standard'><input " . $toggle_stepy_check . " type='radio' id='toggle_option_main_stepy' class='toggle_option_main' name='toggle_option_main' data-style-name='stepy_box' value='4' style='margin:0;' $toggle_disabled /><span></span> <label for='toggle_option_main_stepy'> " . esc_html__('Stepy Style', 'ARPrice') . " </label> </div>";

            if ($general_option['general_settings']['arp_toggle_main'] == '') {
                $default_arp_toggle_main = 0;
            } else {
                $default_arp_toggle_main = $general_option['general_settings']['arp_toggle_main'];
            }

            $tablestring .= '<input type="hidden" id="toggle_option_main_hidden" value="' . $default_arp_toggle_main . '" /> ';

            $tablestring .= "</div>";

            $tablestring .= "</div>";
            
            $toggle_button_verticle_space = isset($general_settings['toggle_button_verticle_space']) ? $general_settings['toggle_button_verticle_space'] : '40' ;

            $tablestring .= '<div class="column_content_dark_row column_opt_row">';
            $tablestring .= '<div class="column_opt_label">' . esc_html__("Mobile View Style", 'ARPrice') . '</div>';
            $tablestring .= "<div class='column_opt_opts toggle_radio_alignment'>";

            $arp_toggle_mobile_stack = "checked='checked'";
            if (isset($general_option['general_settings']['toggle_mobile_style']) && $general_option['general_settings']['toggle_mobile_style'] == 1) {
                $arp_toggle_mobile_dropdown = "checked='checked'";
            }

            $arp_toggle_mobile_stack = isset($arp_toggle_mobile_stack) ? $arp_toggle_mobile_stack : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style two_cols arp_price_radio_wrapper_standard'><input " . $arp_toggle_mobile_stack . " type='radio' id='toggle_mobile_stack' class='toggle_options_mobile_view' name='toggle_options_mobile_view' value='0' style='margin:0;' $toggle_disabled /><span></span> <label for='toggle_mobile_stack'> " . esc_html__('Stack', 'ARPrice') . " </label> </div>";

            $arp_toggle_mobile_dropdown = isset($arp_toggle_mobile_dropdown) ? $arp_toggle_mobile_dropdown : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style two_cols arp_price_radio_wrapper_standard'><input " . $arp_toggle_mobile_dropdown . " type='radio' id='toggle_mobile_dropdown' class='toggle_options_mobile_view' name='toggle_options_mobile_view' value='1' style='margin:0;' $toggle_disabled /><span></span> <label for='toggle_mobile_dropdown'> " . esc_html__('Dropdown', 'ARPrice') . " </label> </div>";


            $tablestring .= '</div>';
            $tablestring .= '</div>';


            $tablestring .= '<div class="column_opt_row">';
            $tablestring .= '<div class="column_opt_label two_cols column_opt_label_height">'.esc_html__("Vertical Space", 'ARPrice').'</div>';
            $tablestring .= '<div class="column_opt_opts two_cols align_right toggle_small_input"><span class="arp_col_px">px</span><input type="text" name="toggle_button_verticle_space" class="arp_tab_txt" value="'.$toggle_button_verticle_space.'" '.$toggle_readonly.' id="toggle_button_verticle_space"></div>';
            $tablestring .= '</div>';


            $tablestring .= "<div class='column_content_light_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label'>" . esc_html__('Title (Optional)', 'ARPrice') . "</div>";

            $tablestring .= "<div class='column_opt_opts toggle_input_alignment' >";
            $general_settings['toggle_label_content'] = isset($general_settings['toggle_label_content']) ? esc_html($general_settings['toggle_label_content']) : '';

            $tablestring .= "<input type='text' id='toggle_label_content' value='" . $general_settings['toggle_label_content'] . "' class='toggle_label_content_txt arp_tab_txt' name='toggle_label_content' style='float:left;width:100%;' $toggle_readonly />";

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            

            $tablestring .= "<div class='column_content_dark_row column_opt_row' >";

            $tablestring .= "<div class='column_opt_label'>" . esc_html__('Title Position', 'ARPrice') . "</div>";

            $tablestring .= "<div class='column_opt_opts toggle_radio_alignment'>";

            if ($general_option['general_settings']['arp_label_position_main'] === '') {
                $general_option['general_settings']['arp_label_position_main'] = 1;
            }

            if ($general_option['general_settings']['arp_label_position_main'] === 0) {
                $label_left_check = "checked='checked'";
            } else if ($general_option['general_settings']['arp_label_position_main'] === 1) {
                $label_top_check = "checked='checked'";
            } else if ($general_option['general_settings']['arp_label_position_main'] === 2) {
                $label_right_check = "checked='checked'";
            } else {
                $label_top_check = "checked='checked'";
            }
            $label_left_check = isset($label_left_check) ? $label_left_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style arp_price_radio_wrapper_standard' style='width: 33.33%;'><input " . $label_left_check . " type='radio' id='label_position_main_left' class='label_position_main' name='label_position_main' value='0' style='margin:0;' $toggle_disabled /><span></span> <label for='label_position_main_left'> " . esc_html__('Left', 'ARPrice') . " </label> </div>";
            $label_right_check = isset($label_right_check) ? $label_right_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style arp_price_radio_wrapper_standard' style='width: 33.33%;'><input " . $label_right_check . " type='radio' id='label_position_main_right' class='label_position_main' name='label_position_main' value='2' style='margin:0;' $toggle_disabled /><span></span> <label for='label_position_main_right'> " . esc_html__('Right', 'ARPrice') . " </label> </div>";
            $label_top_check = isset($label_top_check) ? $label_top_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style arp_price_radio_wrapper_standard' style='width: 33.33%;'><input " . $label_top_check . " type='radio' id='label_position_main_top' class='label_position_main' name='label_position_main' value='1' style='margin:0;' $toggle_disabled /><span></span> <label for='label_position_main_top'> " . esc_html__('Top', 'ARPrice') . " </label> </div>";

            if ($general_option['general_settings']['arp_label_position_main'] === '') {
                $default_arp_label_position_main = 1;
            } else {
                $default_arp_label_position_main = $general_option['general_settings']['arp_label_position_main'];
            }

            $tablestring .= '<input type="hidden" id="label_position_main_hidden" value="' . $default_arp_label_position_main . '" /> ';

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            

            $tablestring .= "<div class='column_content_light_row column_opt_row' >";

            $tablestring .= "<div class='column_opt_label'>" . esc_html__('Toggle Steps', 'ARPrice') . "</div>";

            $tablestring .= "<div class='column_opt_opts arp_toggle_step_dropdwon' >";

            $arp_toggle_counter = $arp_pricingtable->arp_toggle_counter();

            if ($default_toggle_price == 0) {
            	$temp_class = 'arp_disabled';
            }else{
            	$temp_class = '';
            }         
            

            if ($general_option['general_settings']['arp_step_main'] == '') {
                $default_arp_step_main = 2;
                $general_option['general_settings']['arp_step_main'] = 2;
            } else {
                $default_arp_step_main = $general_option['general_settings']['arp_step_main'];
            }

            $tablestring .= '<input type="hidden" id="step_options_main_hidden"  name="step_options_main" class="step_options_main" value="' . $default_arp_step_main . '" /> ';

            $tablestring .= "<dl class='arp_selectbox arp_toggle_option_dd $temp_class' id='step_options_main_hidden_dd' data-name='step_options_main' data-id='step_options_main_hidden' style='width:92% !important;'>";

                $tablestring .= "<dt><span>".$general_option['general_settings']['arp_step_main'].' '.esc_html__('Step','ARPrice')."</span>";

                $tablestring .= "<input type='text' style='display:none;' value='".$general_option['general_settings']['arp_step_main']." ".esc_html__('Step','ARPrice')."' class='arp_autocomplete' />";

                $tablestring .= "<i class='fas fa-caret-down fa-lg'></i></dt>";

                $tablestring .= "<dd>";
                $tablestring .= "<ul data-id='step_options_main_hidden'>";
                    for( $t = 1; $t <= $arp_toggle_counter; $t++ ){
                        $count = $t + 1;

                        $tablestring .= "<li class='arp_selectbox_option' data-value='{$count}' data-label='".$count." ".esc_html__('Step','ARPrice')."'>";
                            $tablestring .= $count." ".esc_html__('Step','ARPrice');
                        $tablestring .= "</li>";
                    }
                $tablestring .= "</ul>";
                $tablestring .= "</dd>";

            $tablestring .= "</dl>";

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            

            if ($general_option['general_settings']['setas_default_toggle'] == 0) {
                $setas_default_toggle_yearly = "checked='checked'";
            } else if ($general_option['general_settings']['setas_default_toggle'] == 1) {
                $setas_default_toggle_monthly = "checked='checked'";
            } else if ($general_option['general_settings']['setas_default_toggle'] == 2) {
                $setas_default_toggle_quarterly = "checked='checked'";
            } else {
                $setas_default_toggle_yearly = "checked='checked'";
            }
            $tablestring .= "<div class='column_content_dark_row column_opt_row' style='border-bottom: none;'>";

            $tablestring .= "<div class='column_opt_label'>" . esc_html__('Tabs Label', 'ARPrice') . "</div>";

            $tablestring .= "<div class='column_opt_opts toggle_tab_label_alignment'>";

            $togglestep_keys = $arp_pricingtable->arp_toggle_step_label_with_db($general_option['general_settings']);

            for($t = 0; $t <= $arp_toggle_counter; $t++ ){
                $count = $t + 1;
                $checked = '';

                if( $general_option['general_settings']['setas_default_toggle'] == $t){
                    $checked = "checked='checked'";
                }
                $display = '';
                if( $count > 2 ){
                    if( $default_arp_step_main == $count ){
                        $display = '';
                    } else if( $count > $default_arp_step_main ) {
                        $display = 'display:none;';
                    }
                }

                $toggle_data = $togglestep_keys[$count];
                $toggle_data_array = explode('|',$toggle_data);
                $toggle_db_key = $toggle_data_array[0];
                $toggle_label = $toggle_data_array[1];
                $toggle_id = $toggle_data_array[2];
                $toggle_step = str_replace('togglestep_', '', $toggle_db_key);  
                $tablestring .= "<div class='column_opt_opts arp_toggle_label_wrapper' id='{$toggle_db_key}' data-key='{$toggle_data_array[4]}' style='margin-top:15px;{$display}' >";
                    $tablestring .= "<span class='tab_label_no'>{$count})</span>";

                        $step_label = isset( $general_option['general_settings'][$toggle_db_key] ) ? stripslashes_deep(esc_html($general_option['general_settings'][$toggle_db_key])) : $toggle_label;

                        $tablestring .= "<input style='width:200px;' type='text' id='{$toggle_db_key}' value='".$step_label."' class='col_opt_input_object arp_tab_toggle_text {$toggle_db_key}' name='{$toggle_db_key}' ".$toggle_readonly." />";

                        $tablestring .= "<button type='button' class='col_opt_btn_icon add_toggle_fontawesome arptooltipster toggle_fontawesome_btn' name='add_toggle_fontawesome' id='add_toggle_fontawesome_{$toggle_step}' data-insert='{$toggle_db_key}' data-column='togglestep_fontawesome_icons' title='" . esc_html__('Add Font Icon', 'ARPrice') . "' data-title='" . esc_html__('Add Font Icon', 'ARPrice') . "' style='float:left;' >";

                        $tablestring .= "</button>";

                        $tablestring .= "<div class='arp_font_awesome_model_box_container toggle_left_container'>";

                        $tablestring .= "</div>";

                        $tablestring .= "<div class='arp_default_toggle_container arp_price_radio_wrapper_standard' >";

                        $tablestring .= "<input " . $checked . " type='radio' id='{$toggle_id}' class='setas_default_toggle' name='setas_default_toggle' value='{$t}' $toggle_disabled style='margin:0;' /><span></span> <label for='{$toggle_id}'> " . esc_html__('Set As Default', 'ARPrice') . " </label>";

                        $tablestring .= "</div>";

                $tablestring .= "</div>";

            }

            

            if ($general_option['general_settings']['setas_default_toggle'] == '') {
                $arp_setas_default_toggle = 0;
            } else {
                $arp_setas_default_toggle = $general_option['general_settings']['setas_default_toggle'];
            }

            $tablestring .= '<input type="hidden" id="setas_default_toggle_hidden" value="' . $arp_setas_default_toggle . '" /> ';

            $tablestring .= "</div>";



            $tablestring .= "</div>";          


            $tablestring .= "</div>";
        } else {
            $tablestring .= "<div class='toggle_options_dropdown arp_offset_container'>";

            if ($general_settings['enable_toggle_price'] == '') {
                $default_toggle_price = 0;
            } else {
                $default_toggle_price = $general_settings['enable_toggle_price'];
            }

            

            $tablestring .= "<div class='column_content_light_row column_opt_row arp_no_border' >";

            $admin_css_url = admin_url('admin.php?page=arp_global_settings');
            $tablestring .= "<div class='column_opt_label'>" . esc_html__('You are using Unlicensed Copy. To enable this feature, Please activate license from', 'ARPrice') . " <a href='" . $admin_css_url . "'>here</a></div>";

            $tablestring .= "</div></div>";
        }

        $tablestring .= "</div>";

        
        $tablestring .= "<div class='general_toggle_options_tab enable global_opts' id='all_color_options'>";
            $tablestring .= "<div class='arprice_option_belt_title'>" . esc_html__('Color Settings', 'ARPrice') . "</div>";
            $tablestring .= "<div class='font_settings_options_dropdown arp_offset_container'>";

            $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_options_group_title' style='    padding: 10px 0px 0px 15px;'>" . esc_html__('Default Table Color', 'ARPrice') . "</div></div>"; 

            $tablestring .= "<div class='column_content_light_row column_color_skin_row' style='border-bottom:1px solid #e1e9f2' >";


            $tablestring .= "<div class='column_opt_label'>" . esc_html__('Select Default Color', 'ARPrice') . "</div>";

            $tablestring .= "<div class='column_opt_opts arp_toggle_step_dropdwon' >";


            if ($reference_template == '')
                $reference_template = 'arptemplate_1';

            $arp_template_skin_selected_key = array_search($arp_template_skin, $arp_mainoptionsarr['general_options']['template_options']['skins'][$reference_template]);

            $default_skins = $arprice_default_settings->arprice_default_template_skins();
            $postarr['action'] = "arprice_default_template_skins";
            $postarr['table_id'] = $table_id;
            $postarr['reference_template'] = $reference_template;
            $skins = $arprice_default_settings->arp_change_default_template_skins($default_skins, $postarr, $general_option);
            $data_skin = json_encode($skins[$reference_template]['skin']);
            $data_array = json_encode($skins[$reference_template]['color']);
            

            $skins_reference_template_colors = isset($skins[$reference_template]['color']) ? $skins[$reference_template]['color'] : array();

            if (isset($arp_mainoptionsarr['general_options']['template_options']['skins'][$reference_template][$arp_template_skin_selected_key]) && $arp_mainoptionsarr['general_options']['template_options']['skins'][$reference_template][$arp_template_skin_selected_key] == 'multicolor')
            $cls = 'multi-color-small-icon';
            else
                $cls = '';

            if (isset($arp_mainoptionsarr['general_options']['template_options']['skins'][$reference_template][$arp_template_skin_selected_key]) && $arp_mainoptionsarr['general_options']['template_options']['skins'][$reference_template][$arp_template_skin_selected_key] != 'multicolor') {
                $color = '#' . $arp_mainoptionsarr['general_options']['template_options']['skin_color_code'][$reference_template][$arp_template_skin_selected_key];
            } else {
                $color = '';
            }

            if ($template_settings['skin'] == 'custom' || $template_settings['skin'] == 'custom_skin') {
                $custom_skin_key = $arprice_default_settings->arp_custom_css_selected_bg_color();
                $custom_skin_key = $custom_skin_key[$reference_template];
                $color = $general_option['custom_skin_colors'][$custom_skin_key];
            }

            $tablestring .= '<input type="hidden" id="color_selection_options_main_hidden"  name="color_options_main" class="color_options_main" value="' . $skins_reference_template_colors[$arp_template_skin_selected_key] . '" /> ';

            
            $tablestring .= "<dl class='arp_selectbox arp_select_colorbox arp_toggle_option_dd' id='color_selection_options_main_hidden_dd' data-name='color_options_main' data-id='color_selection_options_main_hidden' style='width:92% !important;float:right;'>";

                $tablestring .= "<dt>";
                
                if( 'Multicolor' == $skins_reference_template_colors[$arp_template_skin_selected_key] ){
                    $tablestring .= "<span class='arp_multicolor_dd_belt'>&nbsp;</span>";
                } else if( '' === trim($arp_template_skin_selected_key) ){
                    $tablestring .= "<span class='arp_custom_skin_dd_belt'>".esc_html__('Custom Color','ARPrice')."</span>";
                } else {
                    $tablestring .= "<span style='background:#{$skins_reference_template_colors[$arp_template_skin_selected_key]}'>&nbsp;</span>";
                }

                $tablestring .= "<i class='fas fa-caret-down fa-lg'></i></dt>";

                $tablestring .= "<dd>";
                $tablestring .= "<ul data-id='color_selection_options_main_hidden'>";
                    $arp_cntr = 0;
                    foreach ( $skins_reference_template_colors as $skins_reference_template_color ){

                        if( $skins_reference_template_color == 'Multicolor' ){
                            $tablestring .= "<li class='arp_selectbox_option arp_multicolor_dd_belt' data-value='{$skins_reference_template_color}' onClick='arp_select_template_skin(\"".$skins[$reference_template]['skin'][$arp_cntr]."\",\"".$skins_reference_template_color."\");' data-label='&nbsp;' >";
                                $tablestring .= " ";
                            $tablestring .= "</li>";
                        } else if( 'db_custom_skin' == $skins[$reference_template]['skin'][$arp_cntr] ){
                            $tablestring .= "<li class='arp_selectbox_option arp_custom_skin_dd_belt' data-value='{$skins_reference_template_color}'  onClick='arp_select_template_skin(\"".$skins[$reference_template]['skin'][$arp_cntr]."\",\"".$skins_reference_template_color."\");' data-label='".esc_html__('Custom Color','ARPrice')."'>".esc_html__('Custom Color','ARPrice')."</li>";
                        } else {
                            $tablestring .= "<li class='arp_selectbox_option' data-value='{$skins_reference_template_color}' onClick='arp_select_template_skin(\"".$skins[$reference_template]['skin'][$arp_cntr]."\",\"".$skins_reference_template_color."\");' data-label='&nbsp;' style='background:#".$skins_reference_template_color.";'>";
                                $tablestring .= " ";
                            $tablestring .= "</li>";
                        }
                        $arp_cntr++;
                    }
                $tablestring .= "</ul>";
                $tablestring .= "</dd>";

            $tablestring .= "</dl>";

            $tablestring .= "</div>";

            $tablestring .= "</div>";

                if($setact == 1) {
                    $arp_style = ($arp_is_rtl) ? "padding-right:5px !important;padding-left:0px !important" : "padding-left:5px !important;padding-right:0px !important";
                    $arp_txt_style = ($arp_is_rtl) ? "padding-right:0px !important;" : "padding-left:0px !important;";

                    $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_options_group_title' style='padding: 10px 0px 0px 15px;'>" . esc_html__('Customize Color Options', 'ARPrice') . "</div></div>";
                    $tablestring .= "<div class='column_color_skin_row' style='padding-bottom:0 !important;padding-top:0 !important;'>";

                        $tablestring .= "<div class='column_opt_label'>";
                            $tablestring .= esc_html__('Customize Colors','ARPrice');
                        $tablestring .= "</div>";
                    $tablestring .= "</div>";
                
                    $tablestring .= "<div class='column_custom_background ' table_id='".$id."'  id='arp_custom_color_scheme_popup'>";
                        $tablestring .= "<div class='col_opt_row' id='arp_custom_color_tab' style='padding:0 !important;'>";
                            $tablestring .= "<div class='col_opt_title_div two_column arp_color_tab selected' data-id='arp_normal'>". esc_html__('Normal', 'ARPrice')."</div>";
                            $tablestring .= "<div class='col_opt_title_div two_column arp_color_tab' data-id='arp_hover'>".esc_html__('Hover', 'ARPrice')."</div>";
                        $tablestring .= "</div>";

                    $tablestring .= "<div class='col_opt_row' id='arp_normal_custom_color_tab' style='padding:0 !important;padding-top:7px !important;'>";
                        $tablestring .= "<div class='col_opt_title_div three_column txt_align_center'></div>";
                            $tablestring .= "<div class='col_opt_title_div three_column txt_align_center' data-id='background_color' style='padding-top:5px !important;'>". esc_html__('Background', 'ARPrice')."</div>";
                        $tablestring .= "<div class='col_opt_title_div three_column txt_align_center' data-id='font_color' style='padding-top:5px !important;'>". esc_html__('Text Color', 'ARPrice')."</div>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div id='arp_normal_background_color'>";
                        $tablestring .= "<div class='col_opt_row' id='arp_column_background_color_data_div' style='display:none'>";
                            $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Column', 'ARPrice')."</div>";
                            $tablestring .= "<div class='col_opt_input_div three_column'>";
                                $tablestring .= "<div data-color='".$arp_template_column_bg_color."' data-custom-input='arp_column_background_color_input' id='arp_column_background_color_data' data-column-id='' data-column='' class='color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_column_background_color_data)\",valueElement:\"arp_column_background_color_data_hidden\"}'>";
                                $tablestring .= "</div>";
                            $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_template_column_bg_color."' name='arp_column_bg_custom_color' id='arp_column_background_color_data_hidden' />";
                            $tablestring .= "</div>";
                        $tablestring .= "</div>";
                            $tablestring .= "<div class='col_opt_row' id='arp_header_background_color_div' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Header', 'ARPrice') . "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_header_background_div_id' id='arp_header_background_div_id'>";

                                    $tablestring .= "<div data-color='".$arp_template_header_bg_color."' data-custom-input='arp_header_background_color_input' id='arp_header_background_color' data-column-id='' data-column='' class='color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker' data-id='arp_header_background_color_hidden' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_header_background_color)\",valueElement:\"arp_header_background_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_template_header_bg_color."' name='arp_header_background_color' id='arp_header_background_color_hidden' >";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_header_font_color_div_id' id='arp_header_font_color_div_id'>";
                                    $tablestring .= "<div id='arp_header_font_color' data-custom-input='arp_header_font_custom_color_input' data-color='".$arp_header_font_custom_color_input."' data-column-id='".$arp_header_font_custom_color_input."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_header_font_custom_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_header_font_color)\",valueElement:\"arp_header_font_color_hidden\"}' >";
                                    $tablestring .= "</div>";

                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_header_font_custom_color_input."' name='arp_header_font_custom_color' id='arp_header_font_color_hidden' >";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";

                            $tablestring .= "<div class='col_opt_row' id='arp_shortcode_background_color_div' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>";
                                    $tablestring .= esc_html__('Shortcode', 'ARPrice');
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_shortcode_background_div_id' id='arp_shortcode_background_div_id'>";

                                    $tablestring .= "<div data-color='".$arp_shortocode_background."' data-custom-input='arp_shortocode_background_color_input' id='arp_shortcode_background_color' data-column-id='' data-column='' class='color_picker_font font_color_picker background_column_picker arp_shortcode_background_color jscolor arp_custom_css_colorpicker' data-id='arp_shortcode_background_color_hidden' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_shortcode_background_color)\",valueElement:\"arp_shortcode_background_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_shortocode_background."' name='arp_shortcode_background_color' id='arp_shortcode_background_color_hidden' >";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_shortcode_font_color_div_id' id='arp_shortcode_font_color_div_id'>";
                                    $tablestring .= "<div id='arp_shortcode_font_custom_color' data-custom-input='arp_shortocode_font_custom_color_input' data-color='".$arp_shortocode_font_color."' data-column-id='".$arp_shortocode_font_color."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_shortcode_font_custom_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_shortcode_font_custom_color)\",valueElement:\"arp_shortcode_font_color_hidden\"}' data-id='arp_shortcode_font_color_hidden'>";
                                    $tablestring .= "</div>";

                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_shortocode_font_color."' name='arp_shortcode_font_color' id='arp_shortcode_font_color_hidden' >";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";

                            
                            $tablestring .= "<div class='col_opt_row' id='arp_column_desc_background_color_data_div' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>".esc_html__('Description', 'ARPrice')."</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_column_desc_background_color_div_id' id='arp_column_desc_background_color_div_id'>";
                                    $tablestring .= "<div data-color='".$arp_template_column_desc_bg_color."' data-custom-input='arp_column_desc_background_color_input' id='arp_column_desc_background_color_data' data-column-id='".$arp_template_column_desc_bg_color."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker' data-column_id='' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_column_desc_background_color_data)\",valueElement:\"arp_column_desc_background_color_data_hidden\"}' >";
                                    $tablestring .= "</div>";

                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_template_column_desc_bg_color."' name='arp_column_desc_bg_custom_color' id='arp_column_desc_background_color_data_hidden' />";

                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_desc_font_custom_color_div_id' id='arp_desc_font_custom_color_div_id'>
                                    <div id='arp_desc_font_custom_color' data-color='".$arp_desc_font_custom_color_input."' data-custom-input='arp_desc_font_custom_color_input' data-column-id='".$arp_desc_font_custom_color_input."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_desc_font_custom_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_desc_font_custom_color)\",valueElement:\"arp_desc_font_custom_color_hidden\"}'>";
                                $tablestring .= "</div>";
                                $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_desc_font_custom_color_input."' name='arp_desc_font_custom_color' id='arp_desc_font_custom_color_hidden' />";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            
                            $tablestring .= "<div class='col_opt_row' id='arp_pricing_background_color_div' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Pricing', 'ARPrice')."</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_pricing_background_div_id' id='arp_pricing_background_div_id'>";
                                    $tablestring .= "<div data-color='".$arp_template_pricing_bg_color."' data-custom-input='arp_pricing_background_color_input' id='arp_pricing_background_color' data-column-id='".$arp_template_pricing_bg_color."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker' data-column_id='' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_pricing_background_color)\",valueElement:\"arp_pricing_background_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_template_pricing_bg_color."' name='arp_pricing_background_color' id='arp_pricing_background_color_hidden' />";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_pricing_font_color_div_id' id='arp_pricing_font_color_div_id'>";
                                    $tablestring .= "<div id='arp_price_font_custom_color' data-color='".$arp_price_font_custom_color_input."' data-custom-input='arp_price_font_custom_color_input' data-column-id='".$arp_price_font_custom_color_input."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_price_font_custom_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_price_font_custom_color)\",valueElement:\"arp_price_font_custom_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_price_font_custom_color_input."' name='arp_price_font_custom_color' id='arp_price_font_custom_color_hidden' >";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";

                            $tablestring .= "<div class='col_opt_row' id='arp_footer_background_color_div' style='display:none;'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Footer', 'ARPrice')."</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_footer_background_div_id'>";
                                    $tablestring .= "<div data-color='". $arp_template_footer_content_bg_color ."' data-custom-input='arp_footer_content_background_color' id='arp_footer_background_color' data-column_id='' data-column='' class='color_picker_font font_color_picker background_column_picker arp_footer_background jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_footer_background_color)\",valueElement:\"arp_footer_background_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color'   value='". $arp_template_footer_content_bg_color ."' name='arp_footer_background_color' id='arp_footer_background_color_hidden' />";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_footer_font_color_div_id'>";
                                    $tablestring .= "<div id='arp_footer_font_custom_color' data-color='".$arp_footer_font_custom_color_input."' data-custom-input='arp_footer_font_custom_color_input' data-column-id='".$arp_footer_font_custom_color_input."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_footer_font_custom_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_footer_font_custom_color)\",valueElement:\"arp_footer_font_custom_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_footer_font_custom_color_input."' name='arp_footer_font_custom_color' id='arp_footer_font_custom_color_hidden' >";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            
                            $tablestring .= "<div class='col_opt_row' id='arp_button_background_color_div' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Button', 'ARPrice')."</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_button_background_div_id' id='arp_button_background_div_id'>";
                                    $tablestring .= "<div data-color='". $arp_template_button_bg_color ."' data-custom-input='arp_button_background_color_input' id='arp_button_background_color' data-column_id='". $arp_template_button_bg_color ."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_footer_background jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_button_background_color)\",valueElement:\"arp_button_background_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='".$arp_template_button_bg_color."' name='arp_button_background_color' id='arp_button_background_color_hidden' />";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column' id='arp_button_font_color_div_id'>";
                                    $tablestring .= "<div id='arp_button_font_custom_color' data-color='".$arp_button_font_custom_color_input."' data-custom-input='arp_button_font_custom_color_input' data-column-id='".$arp_button_font_custom_color_input."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_button_font_custom_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_button_font_custom_color)\",valueElement:\"arp_button_font_custom_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_button_font_custom_color_input."' name='arp_button_font_custom_color' id='arp_button_font_custom_color_hidden'>";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div' id='button_custom_font_notice' style='display:none;'>(For Button Hover)</div>";

                            $tablestring .= "</div>";

                            $tablestring .= "<div class='col_opt_row' id='arp_body_background_color' style='display:none;".$arp_style."'>";
                                $tablestring .= "<div id='' class='col_opt_row' style='padding-left:0 !important;'>";
                                    $tablestring .= "<div class='col_opt_title_div col_opt_title_div_sub_head'>". esc_html__('Body Row Colors', 'ARPrice')."</div>";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_row'>";
                                    $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Odd', 'ARPrice')."</div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column arp_body_background_div_id' id='arp_body_background_div_id'>";
                                        $tablestring .= "<div data-color='".$arp_template_odd_row_bg_color."' data-custom-input='arp_body_odd_row_background_color' id='arp_body_odd_background' data-column='' class='color_picker_font font_color_picker background_column_picker arp_body_odd_background jscolor arp_custom_css_colorpicker' data-column_id='".$arp_template_odd_row_bg_color."' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_body_odd_background)\",valueElement:\"arp_body_odd_background_hidden\"}' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='".$arp_template_odd_row_bg_color."' name='arp_body_odd_background_color' id='arp_body_odd_background_hidden' />";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column arp_body_font_color_id' id='arp_body_font_color_id'>";
                                        $tablestring .= "<div id='arp_body_font_custom_color' data-custom-input='arp_body_font_custom_color_input' data-color='".$arp_body_font_custom_color_input."' data-column-id='".$arp_body_font_custom_color_input."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_body_font_custom_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_body_font_custom_color)\",valueElement:\"arp_body_font_custom_color_hidden\"}' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color ' value='".$arp_body_font_custom_color_input."' name='arp_body_font_custom_color' id='arp_body_font_custom_color_hidden' >";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_row'>";
                                    $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Even', 'ARPrice'). "</div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column arp_body_background_div_id' id='arp_body_background_div_id'>";
                                        $tablestring .= "<div data-color='". $arp_template_even_row_bg_color . "' data-custom-input='arp_body_even_row_background_color' id='arp_body_even_background' data-column='' class='color_picker_font font_color_picker background_column_picker arp_body_even_background jscolor arp_custom_css_colorpicker' data-column_id='' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_body_even_background)\",valueElement:\"arp_body_even_background_hidden\"}' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='". $arp_template_even_row_bg_color . "' name='arp_body_even_background_color' id='arp_body_even_background_hidden' />";
                                    $tablestring .= "</div>";

                                    $tablestring .= "<div class='col_opt_input_div three_column arp_body_font_color_id' id='arp_body_font_color_id'>";
                                        $tablestring .= "<div data-color='". $arp_body_even_font_custom_color_input . "' data-custom-input='arp_body_even_font_custom_color_input' id='arp_body_even_font_custom_color' data-column='' class='color_picker_font font_color_picker background_column_picker arp_body_even_font_custom_color jscolor arp_custom_css_colorpicker' data-column_id='' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_body_even_font_custom_color)\",valueElement:\"arp_body_even_font_custom_color_hidden\"}' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='". $arp_body_even_font_custom_color_input . "' name='arp_body_even_font_custom_color_color' id='arp_body_even_font_custom_color_hidden' />";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";

                                $tablestring .= "<div class='col_opt_row' style='padding-left:0 !important;'>";
                                    $tablestring .= "<div class='col_opt_title_div col_opt_title_div_sub_head'>". esc_html__('Submit Loader Colors', 'ARPrice'). "</div>";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_row'>";
                                    $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Background', 'ARPrice'). "</div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column arp_analytics_bgcolor_id' id='arp_analytics_bgcolor_id'>";
                                        $tablestring .= "<div data-color='". $arp_analytics_bgcolor . "' id='arp_analytics_bgcolor' data-column='' class='color_picker_font font_color_picker background_column_picker arp_analytics_bgcolor jscolor arp_custom_css_colorpicker' data-column_id='' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_analytics_bgcolor)\",valueElement:\"arp_analytics_bgcolor_hidden\"}' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='". $arp_analytics_bgcolor. "' name='arp_analytics_bgcolor' id='arp_analytics_bgcolor_hidden' />";
                                    $tablestring .= "</div>";
                                    
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_row'>";
                                    $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Foreground', 'ARPrice'). "</div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column arp_analytics_forgcolor_id' id='arp_analytics_forgcolor_id'>";
                                        $tablestring .= "<div data-color='". $arp_analytics_forgcolor. "' id='arp_analytics_forgcolor' data-column='' class='color_picker_font font_color_picker background_column_picker arp_analytics_forgcolor jscolor arp_custom_css_colorpicker' data-column_id='' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_analytics_forgcolor)\",valueElement:\"arp_analytics_forgcolor_hidden\"}' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='". $arp_analytics_forgcolor. "' name='arp_analytics_forgcolor' id='arp_analytics_forgcolor_hidden' />";
                                    $tablestring .= "</div>";
                                    
                                $tablestring .= "</div>";

                                $tablestring .= "<div class='col_opt_row' style='padding-left:0 !important;'>";
                                    $tablestring .= "<div class='col_opt_title_div col_opt_title_div_sub_head'>" . esc_html('Border Colors','ARPrice') . "</div>";
                                $tablestring .= "</div>";

                                $tablestring .= "<div class='col_opt_row' style='padding:0 !important;'>";
                                    $tablestring .= "<div class='col_opt_title_div three_column txt_align_center'></div>";
                                        $tablestring .= "<div class='col_opt_title_div three_column txt_align_center' data-id='background_color' style='padding-top:5px !important;'>". esc_html__('Column', 'ARPrice')."</div>";
                                    $tablestring .= "<div class='col_opt_title_div three_column txt_align_center' data-id='font_color' style='padding-top:5px !important;'>". esc_html__('Row', 'ARPrice')."</div>";
                                $tablestring .= "</div>";

                                $tablestring .= "<div class='col_opt_row'>";
                                    $tablestring .= "<div class='col_opt_title_div three_column three_column_title'></div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column'>";
                                        $column_settings['arp_column_border_color'] = isset($column_settings['arp_column_border_color']) ? $column_settings['arp_column_border_color'] : "#c9c9c9";
                                        $tablestring .= "<div class='color_picker_font arp_custom_css_colorpicker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_column_border_color)\",valueElement:\"arp_column_border_color_hidden\"}' data-column-id='arp_column_border_color' id='arp_column_border_color' style='background:" . $column_settings['arp_column_border_color'] . ";' data-color='" . $column_settings['arp_column_border_color'] . "' ></div>";
                                        $tablestring .= "<input type='hidden' id='arp_column_border_color_hidden' name='arp_column_border_color' value='" . $column_settings['arp_column_border_color'] . "' />";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column'>";
                                        $column_settings['arp_row_border_color'] = isset($column_settings['arp_row_border_color']) ? $column_settings['arp_row_border_color'] : '';
                                        $tablestring .= "<div class='color_picker_font arp_custom_css_colorpicker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_row_border_color)\",valueElement:\"arp_row_border_color_hidden\"}' data-id='arp_row_border_color_hidden' id='arp_row_border_color' style='background:" . $column_settings['arp_row_border_color'] . ";' data-color='" . $column_settings['arp_row_border_color'] . "' data-column-id='arp_row_border_color'></div>";
                                        $tablestring .= "<input type='hidden' id='arp_row_border_color_hidden' data-column-id='arp_row_border_color' data-id='arp_row_border_color' name='arp_row_border_color' value='" . $column_settings['arp_row_border_color'] . "' />";
                                    $tablestring .= "</div>";

                                $tablestring .= "</div>";

                            $tablestring .= "</div>";
                        $tablestring .= "</div>";
                        $tablestring .= "<div id='arp_hover_background_color' style='display:none;'>";
                            $tablestring .= "<div class='col_opt_row' id='arp_column_hover_color_div' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Column', 'ARPrice'). "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_column_background_div_id' id='arp_column_background_div_id'>";
                                    $tablestring .= "<div data-color='". $arp_column_bg_hover_color. "' data-custom-input='arp_column_bg_hover_color' id='arp_column_hover_background' data-column_id='". $arp_column_bg_hover_color. "' data-column='' class='color_picker_font font_color_picker background_column_picker arp_column_hover_background jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_column_hover_background)\",valueElement:\"arp_column_hover_background_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='". $arp_column_bg_hover_color. "' name='arp_column_bg_hover_color' id='arp_column_hover_background_hidden' />";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='col_opt_row' id='arp_header_hover_bg_color' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>";
                                    $tablestring .= esc_html__('Header', 'ARPrice');
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_header_background_div_id'>";
                                    $tablestring .= "<div data-color='". $arp_header_bg_hover_color. "' data-custom-input='arp_header_bg_hover_color' id='arp_header_hover_background_color' data-column-id='". $arp_header_bg_hover_color. "' data-column='' class='color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker' data-column_id='' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_header_hover_background_color)\",valueElement:\"arp_header_hover_background_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='". $arp_header_bg_hover_color. "' name='arp_header_hover_background_color' id='arp_header_hover_background_color_hidden' >";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_header_font_color_div_id'>";
                                    $tablestring .= "<div id='arp_header_font_custom_hover_color' data-color='". $arp_header_font_custom_hover_color_input. "' data-custom-input='arp_header_font_custom_hover_color_input' data-column-id='". $arp_header_font_custom_hover_color_input. "' data-column='' class='color_picker_font font_color_picker background_column_picker arp_header_font_custom_hover_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_header_font_custom_hover_color)\",valueElement:\"arp_header_font_custom_hover_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='". $arp_header_font_custom_hover_color_input. "' name='arp_header_font_custom_hover_color' id='arp_header_font_custom_hover_color_hidden' />";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='col_opt_row' id='arp_shortcode_hover_bg_color' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>";
                                    $tablestring .= esc_html__('Shortcode', 'ARPrice');
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_shortcode_background_div_id'>";
                                    $tablestring .= "<div data-color='". $arp_shortcode_bg_hover_color. "' data-custom-input='arp_shortcode_bg_hover_color' id='arp_shortcode_hover_background_color' data-column-id='' data-column='' class='color_picker_font font_color_picker background_column_picker arp_shortcode_background_color jscolor arp_custom_css_colorpicker' data-column_id='' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_shortcode_hover_background_color)\",valueElement:\"arp_shortcode_hover_background_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='". $arp_shortcode_bg_hover_color. "' name='arp_shortcode_hover_background_color' id='arp_shortcode_hover_background_color_hidden' >";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_shortcode_font_color_div_id'>";
                                    $tablestring .= "<div id='arp_shortcode_font_custom_hover_color' data-custom-input='arp_shortcode_font_custom_hover_color_input' data-color='". $arp_shortcode_font_hover_color . "' data-column-id='". $arp_shortcode_font_hover_color. "' data-column='' class='color_picker_font font_color_picker background_column_picker arp_shortcode_font_custom_hover_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_shortcode_font_custom_hover_color)\",valueElement:\"arp_shortcode_font_custom_hover_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='". $arp_shortcode_font_hover_color. "' name='arp_shortcode_font_custom_hover_color' id='arp_shortcode_font_custom_hover_color_hidden' />";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='col_opt_row' id='arp_column_desc_hover_background_color_data' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Description', 'ARPrice'). "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_column_desc_background_color_div_id'>";
                                    $tablestring .= "<div data-color='".$arp_template_column_desc_hover_bg_color."' id='arp_column_desc_hover_bg_custom_color' data-custom-input='arp_column_desc_hover_background_color_input' data-column-id='".$arp_template_column_desc_hover_bg_color."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_column_desc_hover_bg_custom_color)\",valueElement:\"arp_column_desc_hover_bg_custom_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='".$arp_template_column_desc_hover_bg_color."' name='arp_column_desc_hover_bg_custom_color' id='arp_column_desc_hover_bg_custom_color_hidden' />";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_desc_font_custom_color_div_id'>";
                                    $tablestring .= "<div id='arp_desc_font_custom_hover_color' data-color='". $arp_desc_font_custom_hover_color_input. "' data-custom-input='arp_desc_font_custom_hover_color_input' data-column-id='". $arp_desc_font_custom_hover_color_input. "' data-column='' class='color_picker_font font_color_picker background_column_picker arp_desc_font_custom_hover_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_desc_font_custom_hover_color)\",valueElement:\"arp_desc_font_custom_hover_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='". $arp_desc_font_custom_hover_color_input. "' name='arp_desc_font_custom_hover_color' id='arp_desc_font_custom_hover_color_hidden' />";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='col_opt_row' id='arp_pricing_background_hover_color_div' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Pricing', 'ARPrice'). "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_pricing_background_div_id'>";
                                    $tablestring .= "<div data-color='".$arp_price_bg_hover_color."' id='arp_column_price_hover_background' data-custom-input='arp_price_bg_hover_color' data-column_id='".$arp_price_bg_hover_color."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_column_price_hover_background jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_column_price_hover_background)\",valueElement:\"arp_column_price_hover_background_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='".$arp_price_bg_hover_color."' name='arp_column_price_hover_background' id='arp_column_price_hover_background_hidden' />";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_pricing_font_color_div_id'>";
                                    $tablestring .= "<div id='arp_price_font_custom_hover_color' data-custom-input='arp_price_font_custom_hover_color_input' data-color='". $arp_price_font_custom_hover_color_input. "' data-column-id='". $arp_price_font_custom_hover_color_input. "' data-column='' class='color_picker_font font_color_picker background_column_picker arp_price_font_custom_hover_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_price_font_custom_hover_color)\",valueElement:\"arp_price_font_custom_hover_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='". $arp_price_font_custom_hover_color_input. "' name='arp_price_font_custom_hover_color' id='arp_price_font_custom_hover_color_hidden' >";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='col_opt_row' id='arp_footer_hover_background_color' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Footer', 'ARPrice'). "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_footer_background_div_id'>";
                                    $tablestring .= "<div data-color='".$arp_footer_hover_background_color."' id='arp_footer_hover_background' data-custom-input='arp_footer_hover_bg_color' data-column_id='".$arp_footer_hover_background_color."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_footer_hover_background jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_footer_hover_background)\",valueElement:\"arp_footer_hover_background_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='".$arp_footer_hover_background_color."' name='arp_footer_hover_background' id='arp_footer_hover_background_hidden' />";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column arp_footer_font_color_div_id'>";
                                    $tablestring .= "<div id='arp_footer_font_custom_hover_color' data-custom-input='arp_footer_font_custom_hover_color_input' data-color='". $arp_footer_font_custom_hover_color_input. "' data-column-id='". $arp_footer_font_custom_hover_color_input. "' data-column='' class='color_picker_font font_color_picker background_column_picker arp_footer_font_custom_hover_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_footer_font_custom_hover_color)\",valueElement:\"arp_footer_font_custom_hover_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='". $arp_footer_font_custom_hover_color_input. "' name='arp_footer_font_custom_hover_color' id='arp_footer_font_custom_hover_color_hidden' >";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='col_opt_row' id='arp_btn_hover_color_div' style='display:none'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Button', 'ARPrice'). "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column'>";
                                    $tablestring .= "<div data-color='".$arp_button_bg_hover_color."' id='arp_column_btn_hover_background' data-custom-input='arp_button_bg_hover_color' data-column_id='".$arp_button_bg_hover_color."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_column_btn_hover_background jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_column_btn_hover_background)\",valueElement:\"arp_column_btn_hover_background_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='".$arp_button_bg_hover_color."' name='arp_column_btn_bg_hover_color' id='arp_column_btn_hover_background_hidden' />";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_input_div three_column'>";
                                    $tablestring .= "<div id='arp_button_font_custom_hover_color' data-custom-input='arp_button_font_custom_hover_color_input' data-color='". $arp_button_font_custom_hover_color_input. "' data-column-id='". $arp_button_font_custom_hover_color_input. "' data-column='' class='color_picker_font font_color_picker background_column_picker arp_button_font_custom_hover_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_button_font_custom_hover_color)\",valueElement:\"arp_button_font_custom_hover_color_hidden\"}' >";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='". $arp_button_font_custom_hover_color_input. "' name='arp_button_font_custom_hover_color' id='arp_button_font_custom_hover_color_hidden' >";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='col_opt_row' id='arp_body_hover_background_color' style='display:none;". $arp_style. "'>";
                                $tablestring .= "<div id='' class='col_opt_row' style='padding-left:0 !important;'>";
                                    $tablestring .= "<div class='col_opt_title_div col_opt_title_div_sub_head'>". esc_html__('Body Row Colors', 'ARPrice'). "</div>";
                                    
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_row'>";
                                    $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Odd', 'ARPrice'). "</div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column arp_body_background_div_id'>";
                                        $tablestring .= "<div data-color='".$arp_template_odd_row_hover_bg_color."' id='arp_body_hover_odd_background' data-custom-input='arp_body_odd_row_hover_background_color' data-column_id='".$arp_template_odd_row_hover_bg_color."' data-column='' class='color_picker_font font_color_picker background_column_picker arp_body_hover_odd_background jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_body_hover_odd_background)\",valueElement:\"arp_body_hover_odd_background_hidden\"}' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='".$arp_template_odd_row_hover_bg_color."' name='arp_body_hover_odd_background_color' id='arp_body_hover_odd_background_hidden' />";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column arp_body_font_color_div_id'>";
                                        $tablestring .= "<div id='arp_body_font_custom_hover_color' data-custom-input='arp_body_font_custom_hover_color_input' data-color='". $arp_body_font_custom_hover_color_input. "' data-column-id='". $arp_body_font_custom_hover_color_input. "' data-column='' class='color_picker_font font_color_picker background_column_picker arp_body_font_custom_hover_color jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_body_font_custom_hover_color)\",valueElement:\"arp_body_font_custom_hover_color_hidden\"}' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='". $arp_body_font_custom_hover_color_input. "' name='arp_body_font_custom_hover_color' id='arp_body_font_custom_hover_color_hidden' >";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='col_opt_row'>";
                                    $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>". esc_html__('Even', 'ARPrice'). "</div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column arp_body_background_div_id'>";
                                        $tablestring .= "<div data-color='".$arp_template_even_row_hover_bg_color."' id='arp_body_hover_even_background' data-custom-input='arp_body_even_row_hover_background_color' data-column='' class='color_picker_font font_color_picker background_column_picker arp_body_hover_even_background jscolor arp_custom_css_colorpicker' data-column_id='".$arp_template_even_row_hover_bg_color."' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_body_hover_even_background)\",valueElement:\"arp_body_hover_even_background_hidden\"}' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='".$arp_template_even_row_hover_bg_color."' name='arp_body_hover_even_background_color' id='arp_body_hover_even_background_hidden' />";
                                    $tablestring .= "</div>";
                                    $tablestring .= "<div class='col_opt_input_div three_column arp_body_font_color_id' id='arp_body_font_color_id'>";
                                        $tablestring .= "<div data-color='". $arp_body_even_font_custom_hover_color_input. "' data-custom-input='arp_body_even_font_custom_hover_color_input' id='arp_body_even_font_custom_hover_color' data-column='' class='color_picker_font font_color_picker background_column_picker arp_body_even_font_custom_hover_color jscolor arp_custom_css_colorpicker' data-column_id='' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_body_even_font_custom_hover_color)\",valueElement:\"arp_body_even_font_custom_hover_color_hidden\"}' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color' value='". $arp_body_even_font_custom_hover_color_input. "' name='arp_body_even_font_custom_hover_color_hidden' id='arp_body_even_font_custom_hover_color_hidden' />";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";
                        $tablestring .= "</div>";

                    $tablestring .= "</div>";
                } else {
                    $tablestring .= "<div class='column_custom_background' table_id='".$id."'  style='width:340px;' id='arp_custom_color_scheme_popup'>";
                        $tablestring .= "<div>";
                            $tablestring .= "<div class='col_opt_title_div'>";
                                $admin_css_url = admin_url('admin.php?page=arp_global_settings');
                                $tablestring .= "You are using Unlicensed Copy. To enable this feature, <br>Please activate license from <a href='" . $admin_css_url . "'>here</a>.";
                            $tablestring .= "</div>";

                        $tablestring .= "</div>";
                    $tablestring .= "</div>";
                }

                $tablestring .= "<div class='column_content_light_row column_opt_row arp_tooltip_color_section' style='border-bottom:none;'>";

                $tablestring .= "<div class='column_opt_label arp_fix_height'>" . esc_html__('Toggle Button Colors', 'ARPrice') . "</div>";

                $tablestring .= "</div>";

                $tablestring .= "<div class='column_custom_background' style='padding-top:0px;'>";
                    $tablestring .= "<div class='arp_normal_background_color'>";
                        $tablestring .= "<div class='col_opt_row'>";
                            $tab_opt_style = ($arp_is_rtl) ? "float:right;" : "float:left;";

                            $tablestring .= "<div class='col_opt_row' style='padding:0 !important;'>";
                                $tablestring .= "<div class='col_opt_title_div three_column txt_align_center'></div>";
                                    $tablestring .= "<div class='col_opt_title_div three_column txt_align_center' data-id='background_color' style='padding-top:5px !important;'>". esc_html__('Background', 'ARPrice')."</div>";
                                $tablestring .= "<div class='col_opt_title_div three_column txt_align_center' data-id='font_color' style='padding-top:5px !important;'>". esc_html__('Text Color', 'ARPrice')."</div>";
                            $tablestring .= "</div>";
                            
                            $tablestring .= "<div class='col_opt_row' style='border-bottom:none;padding:5px 20px;'>";

                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>" . esc_html__('Active Tab', 'ARPrice') . "</div>";

                                $tablestring .= "<div class='col_opt_input_div three_column'>";
                                    $general_option['general_settings']['toggle_active_color'] = $general_option['general_settings']['toggle_active_color'] ? $general_option['general_settings']['toggle_active_color'] : '#ffffff';
                                    $tablestring .= "<div class='color_picker_font font_color_picker background_column_picker jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,toggle_active_color)\",valueElement:\"toggle_active_color_hidden\"}' data-id='toggle_active_color_hidden' id='toggle_active_color' style='{$tab_opt_style} background:" . $general_option['general_settings']['toggle_active_color'] . ";' data-color='" . $general_option['general_settings']['toggle_active_color'] . "'>";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";

                                $tablestring .= "<div class='col_opt_input_div three_column'>";
                                    $general_option['general_settings']['toggle_active_text_color'] = $general_option['general_settings']['toggle_active_text_color'] ? $general_option['general_settings']['toggle_active_text_color'] : '#000000';
                                    $tablestring .= "<div class='color_picker_font font_color_picker arp_custom_css_colorpicker jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,toggle_active_text_color)\",valueElement:\"toggle_active_text_color_hidden\"}' data-id='toggle_active_text_color_hidden' id='toggle_active_text_color' style='{$tab_opt_style} background:" . $general_option['general_settings']['toggle_active_text_color'] . ";' data-color='" . $general_option['general_settings']['toggle_active_text_color'] . "' >";
                                        $tablestring .= "</div>";
                                        $tablestring .= "<input type='hidden' id='toggle_active_color_hidden' name='toggle_active_color' value='" . $general_option['general_settings']['toggle_active_color'] . "' />";
                                        $tablestring .= "<input type='hidden' id='toggle_active_text_color_hidden' name='toggle_active_text_color' value='" . $general_option['general_settings']['toggle_active_text_color'] . "' />";
                                $tablestring .= "</div>";

                            $tablestring .= "</div>";


                            $tablestring .= "<div class='col_opt_row' style='border-bottom:none;padding:5px 20px;'>";

                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title' >" . esc_html__('Inactive Tab', 'ARPrice') . "</div>";

                                $tablestring .= "<div class='col_opt_input_div three_column'>";
                                    $general_option['general_settings']['toggle_inactive_color'] = $general_option['general_settings']['toggle_inactive_color'] ? $general_option['general_settings']['toggle_inactive_color'] : '#000000';
                                    $tablestring .= "<div class='color_picker_font font_color_picker color_picker_round jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,toggle_inactive_color)\",valueElement:\"toggle_inactive_color_hidden\"}' data-id='toggle_inactive_color_hidden' id='toggle_inactive_color' style='{$tab_opt_style} background:" . $general_option['general_settings']['toggle_inactive_color'] . ";' data-color='" . $general_option['general_settings']['toggle_inactive_color'] . "' >";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";

                                $tablestring .= "<div class='col_opt_input_div three_column'>";
                                    $general_option['general_settings']['toggle_button_font_color'] = $general_option['general_settings']['toggle_button_font_color'] ? $general_option['general_settings']['toggle_button_font_color'] : '#ffffff';
                                    $tablestring .= "<div class='color_picker_font color_picker_round jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,toggle_button_font_color)\",valueElement:\"toggle_button_font_color_hidden\"}' data-id='toggle_button_font_color_hidden' id='toggle_button_font_color' style='{$tab_opt_style} background:" . $general_option['general_settings']['toggle_button_font_color'] . ";' data-color='" . $general_option['general_settings']['toggle_button_font_color'] . "' >";
                                    $tablestring .= "</div>";

                                    $tablestring .= "<input type='hidden' id='toggle_inactive_color_hidden' name='toggle_inactive_color' value='" . $general_option['general_settings']['toggle_inactive_color'] . "' />";
                                    $tablestring .= "<input type='hidden' id='toggle_button_font_color_hidden' name='toggle_button_font_color' value='" . $general_option['general_settings']['toggle_button_font_color'] . "' />";
                                $tablestring .= "</div>";

                            $tablestring .= "</div>";

                            $tablestring .= "<div class='col_opt_row toggle_main_background_div' style='border-bottom:none;padding:5px 20px;'>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title arp_toggle_main_belt_label'>" . esc_html__('Main Belt', 'ARPrice') . "</div>";
                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title arp_toggle_title_font_label column_opt_label_height'>" . esc_html__('Title Font', 'ARPrice') . "</div>";

                                $tablestring .= "<div class='col_opt_input_div toggle_belt_background_color_div three_column'>";
                                    $general_option['general_settings']['toggle_main_color'] = $general_option['general_settings']['toggle_main_color'] ? $general_option['general_settings']['toggle_main_color'] : '#000000';
                                    $tablestring .= "<div class='color_picker_font jscolor color_picker_round arp_custom_css_colorpicker' data-id='toggle_main_color_hidden' data-jscolor='{valueElement:\"toggle_main_color_hidden\",hash:true,onFineChange:\"arp_update_color(this,toggle_main_color)\"}' id='toggle_main_color' style='{$tab_opt_style} background:" . $general_option['general_settings']['toggle_main_color'] . ";' data-color='" . $general_option['general_settings']['toggle_main_color'] . "' >";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";

                                $tablestring .= "<div class='col_opt_input_div three_column align_right'>";
                                    $general_option['general_settings']['toggle_title_font_color'] = $general_option['general_settings']['toggle_title_font_color'] ? $general_option['general_settings']['toggle_title_font_color'] : '#000000';
                                    $tablestring .= "<div class='color_picker_font arp_custom_css_colorpicker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,toggle_title_font_color)\",valueElement:\"toggle_title_font_color_hidden\"}' data-id='toggle_title_font_color_hidden' id='toggle_title_font_color' style='{$tab_opt_style} background:" . $general_option['general_settings']['toggle_title_font_color'] . ";' data-color='" . $general_option['general_settings']['toggle_title_font_color'] . "' >";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";

                                $tablestring .= "<input type='hidden' id='toggle_main_color_hidden' name='toggle_main_color' value='" . $general_option['general_settings']['toggle_main_color'] . "' />";
                                $tablestring .= "<input type='hidden' id='toggle_title_font_color_hidden' name='toggle_title_font_color' value='" . $general_option['general_settings']['toggle_title_font_color'] . "' />";

                            $tablestring .= "</div>";

                        $tablestring .= "</div>";
                    $tablestring .= "</div>";

                $tablestring .= "</div>";

                $tablestring .= "<div class='column_content_light_row column_opt_row arp_tooltip_row arp_tooltip_color_section' style='border-bottom:none;'>";
                    $tablestring .= "<div class='column_opt_label arp_fix_height'>" . esc_html__('Tooltip Color', 'ARPrice') . "</div>";

                    $tablestring .= "<input type='hidden' id='tooltip_bgcolor_hidden' name='tooltip_bgcolor' value='" . $tooltip_settings['background_color'] . "' />";
                    $tablestring .= "<input type='hidden' id='tooltip_txtcolor_hidden' name='tooltip_txtcolor' value='" . $tooltip_settings['text_color'] . "' />";

                $tablestring .= "</div>"; 

                $arp_tooltip_color_style = ($arp_is_rtl) ? "float:right;" : "float:left;";
                $tablestring .= "<div class='column_custom_background' style='padding-top:0px !important;'>";
                    $tablestring .= "<div class='arp_normal_background_color'>";
                        
                        $tablestring .= "<div class='col_opt_row' style='padding-top:0px !important;'>";

                            $tablestring .= "<div class='col_opt_row' style='padding:0 !important;'>";
                                $tablestring .= "<div class='col_opt_title_div three_column txt_align_center'></div>";
                                    $tablestring .= "<div class='col_opt_title_div three_column txt_align_center' data-id='background_color' style='padding-top:5px !important;'>". esc_html__('Background', 'ARPrice')."</div>";
                                $tablestring .= "<div class='col_opt_title_div three_column txt_align_center' data-id='font_color' style='padding-top:5px !important;'>". esc_html__('Text Color', 'ARPrice')."</div>";
                            $tablestring .= "</div>";

                            $tablestring .= "<div class='col_opt_row' style='border-bottom: none;'>";

                                $tablestring .= "<div class='col_opt_title_div three_column three_column_title'>&nbsp;</div>";

                                $tablestring .= "<div class='col_opt_input_div three_column'>";
                                    $tablestring .= "<div class='color_picker_font color_picker_round jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,tooltip_bgcolor_div)\",valueElement:\"tooltip_bgcolor_hidden\"}' data-id='tooltip_bgcolor_hidden' id='tooltip_bgcolor_div' style='background:" . $tooltip_settings['background_color'] . ";float:left;' data-color='" . $tooltip_settings['background_color'] . "' >";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";

                                $tablestring .= "<div class='col_opt_input_div three_column'>";
                                     $tablestring .= "<div class='color_picker_font color_picker_round jscolor arp_custom_css_colorpicker' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,tooltip_txtcolor_div)\",valueElement:\"tooltip_txtcolor_hidden\"}' data-id='tooltip_txtcolor_hidden' id='tooltip_txtcolor_div' style='background:" . $tooltip_settings['text_color'] . ";float:left;' data-color='" . $tooltip_settings['text_color'] . "' >";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";

                            $tablestring .= "</div>";
                        $tablestring .= "</div>";

                    $tablestring .= "</div>";

                $tablestring .= "</div>";
               
            $tablestring .= "</div>";

        $tablestring .= "</div>";

        /*Color Option Code End*/



        $tablestring .= "<div class='general_toggle_options_tab enable global_opts' id='all_font_options'>";
        $tablestring .= "<div class='arprice_option_belt_title'>" . esc_html__('Font Settings', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_settings_options_dropdown arp_offset_container'>";

            
            $arp_common_font_family_global = isset($general_option['column_settings']['arp_common_font_family_global']) ? $general_option['column_settings']['arp_common_font_family_global'] : 'Helvetica';

            $tablestring .= "<div class='column_content_light_row column_opt_row'>";
            $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_options_group_title' style='padding:0'>" . esc_html__('Set Default Font', 'ARPrice') . "</div></div>";
            $tablestring .= "<div class='column_opt_opts arp_font_family arp_common_font_family_opts'>";
            $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Family', 'ARPrice') . "</div>";
            $tablestring .= "<div class='font_title_font_family_div'>";
            $tablestring .= "<input type='hidden' id='arp_common_font_family_global' name='arp_common_font_family_global' value='" . $arp_common_font_family_global . "' />";
            $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='arp_common_font_font_family_dd' data-name='arp_common_font_font_family_dd' data-id='arp_common_font_family_global' style=''>";
            if ($arp_common_font_family_global){
                $arp_selectbox_placeholder = $arp_common_font_family_global;
            } else {
                $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');
            }
            if( $arp_selectbox_placeholder == 'inherit' ){
                $arp_selectbox_placeholder = esc_html__( 'Inherit from Theme', 'ARPrice' );
            }

            $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $arp_common_font_family_global . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
            $tablestring .= "<dd>";
            $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='arp_common_font_family_global'>";

            $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";
            
            $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";
            
            $tablestring .= $default_fonts_string;

            $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";

            $tablestring .= "</ul>";

            $tablestring .= "</dd>";

            $tablestring .= "</dl>";

            $common_font_google_note_style = '';
            if( !in_array($arp_common_font_family_global, $google_fonts) ){
                $common_font_google_note_style = 'display:none;';
            }

            $tablestring .= "<div class='arp_google_font_preview_note' style='margin-right:12px;$common_font_google_note_style'><a target='_blank'  class='arp_google_font_preview_link' id='arp_common_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $arp_common_font_family_global . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";
            $tablestring .= "</div>";
            $tablestring .= "</div>";

            $tablestring .= "</div>";

            


        $arp_font_settings = $arprice_default_settings->arp_font_settings();
        $arp_font_settings = $arp_font_settings[$reference_template];

        if (in_array('arp_header_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        $header_font_family_global = isset($general_option['column_settings']['header_font_family_global']) ? $general_option['column_settings']['header_font_family_global'] : 'Helvetica';

        
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . " border-bottom: none;'>";
        $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_options_group_title' style='padding: 0px 0px 16px 0px;'>" . esc_html__('Customize Font Sectionwise', 'ARPrice') . "</div></div>";


        
        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Header Fonts', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Family', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='header_font_family_global' class='arp_custom_font_family_options' name='header_font_family_global' value='" . $header_font_family_global . "' data-default-font='" . $header_font_family_global . "' />";
        $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='header_font_font_family_dd' data-name='header_font_font_family_dd' data-id='header_font_family_global' style=''>";
        if ($header_font_family_global){
            $arp_selectbox_placeholder = $header_font_family_global;
        } else {
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');
        }

        if( $arp_selectbox_placeholder == 'inherit' ){
            $arp_selectbox_placeholder = esc_html__( 'Inherit from Theme', 'ARPrice' );
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['header_font_family_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='header_font_family_global'>";

        $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";
        
        $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";

        $tablestring .= $default_fonts_string;

        $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $header_font_family_style = '';
        if( !in_array($header_font_family_global,$google_fonts) ){
            $header_font_family_style = 'display:none;';
        }

        $tablestring .= "<div class='arp_google_font_preview_note' style='$header_font_family_style'><a target='_blank'  class='arp_google_font_preview_link' id='header_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $header_font_family_global . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height' >" . esc_html__('Font Size', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='header_font_size_global'  name='header_font_size_global' value='" . $general_option['column_settings']['header_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox header_font_size_global_dd arp_font_option_dd' data-name='header_font_size_global' data-id='header_font_size_global' style='width : 83% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['header_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['header_font_size_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='header_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_align'>";
        $header_text_align = isset($general_option['column_settings']['arp_header_text_alignment']) ? $general_option['column_settings']['arp_header_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div_new('header_text_alignment', $header_text_align, 'arp_header_text_alignment', '', 'header_section');
        $tablestring .= "</div>";

        if ($general_option['column_settings']['arp_header_text_bold_global'] == 'bold') {
            $header_title_style_bold_selected = 'selected';
        } else {
            $header_title_style_bold_selected = '';
        }

        
        if ($general_option['column_settings']['arp_header_text_italic_global'] == 'italic') {
            $header_title_style_italic_selected = 'selected';
        } else {
            $header_title_style_italic_selected = '';
        }

        
        if ($general_option['column_settings']['arp_header_text_decoration_global'] == 'underline') {
            $header_title_style_underline_selected = 'selected';
        } else {
            $header_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_header_text_decoration_global'] == 'line-through') {
            $header_title_style_linethrough_selected = 'selected';
        } else {
            $header_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='' id='arp_header_text_style_global'>";

        $tablestring .= "<div class='font_title_font_family_div' data-level = 'header_level_options' level-id='header_button_global'>";

        $tablestring .= "<div class='arp_style_btn " . $header_title_style_bold_selected . " arptooltipster' data-align='left' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fas fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $header_title_style_italic_selected . " arptooltipster' data-align='center' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fas fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $header_title_style_underline_selected . " arptooltipster' data-align='right' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fas fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $header_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fas fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='header_style_bold_global' name='header_style_bold_global' value='" . $general_option['column_settings']['arp_header_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='header_style_italic_global' name='header_style_italic_global' value='" . $general_option['column_settings']['arp_header_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='header_style_decoration_global' name='header_style_decoration_global' value='" . $general_option['column_settings']['arp_header_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        

        if (in_array('arp_desc_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        

        $arp_description_font_global = isset($general_option['column_settings']['description_font_family_global']) ? $general_option['column_settings']['description_font_family_global'] : '';

        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . " border-bottom: none;'>";
        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Description Fonts', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Family', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='description_font_family_global' class='arp_custom_font_family_options' name='description_font_family_global' value='" . $arp_description_font_global . "' data-default-font='" . $arp_description_font_global . "' />";
        $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='description_font_font_family_dd' data-name='description_font_font_family_dd' data-id='description_font_family_global' style=''>";
        if ($general_option['column_settings']['description_font_family_global'])
            $arp_selectbox_placeholder = $arp_description_font_global;
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        if( $arp_selectbox_placeholder == 'inherit' ){
            $arp_selectbox_placeholder = esc_html__( 'Inherit from Theme', 'ARPrice' );
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['description_font_family_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='description_font_family_global'>";

        $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";
        
        $tablestring .= $default_fonts_string;

        $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";
        $desc_font_family_style = '';
        if( !in_array($arp_description_font_global,$google_fonts) ){
            $desc_font_family_style = 'display:none;';
        }
        $tablestring .= "<div class='arp_google_font_preview_note' style='$desc_font_family_style'><a target='_blank'  class='arp_google_font_preview_link' id='description_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $arp_description_font_global . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Size', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='description_font_size_global'  name='description_font_size_global' value='" . $general_option['column_settings']['description_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox description_font_size_global_dd arp_font_option_dd' data-name='description_font_size_global' data-id='description_font_size_global' style='width : 83% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['description_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['description_font_size_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='description_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_align'>";
        $description_text_alignment = isset($general_option['column_settings']['arp_description_text_alignment']) ? $general_option['column_settings']['arp_description_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div_new('description_text_alignment', $description_text_alignment, 'arp_description_text_alignment', '', 'column_description_section');
        $tablestring .= "</div>";

        if ($general_option['column_settings']['arp_description_text_bold_global'] == 'bold') {
            $description_title_style_bold_selected = 'selected';
        } else {
            $description_title_style_bold_selected = '';
        }

        
        if ($general_option['column_settings']['arp_description_text_italic_global'] == 'italic') {
            $description_title_style_italic_selected = 'selected';
        } else {
            $description_title_style_italic_selected = '';
        }

        
        if ($general_option['column_settings']['arp_description_text_decoration_global'] == 'underline') {
            $description_title_style_underline_selected = 'selected';
        } else {
            $description_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_description_text_decoration_global'] == 'line-through') {
            $description_title_style_linethrough_selected = 'selected';
        } else {
            $description_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='' id='arp_description_text_style_global'>";

        $tablestring .= "<div class='font_title_font_family_div' data-level = 'description_level_options' level-id='description_button_global'>";

        $tablestring .= "<div class='arp_style_btn " . $description_title_style_bold_selected . " arptooltipster' data-align='left' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fas fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $description_title_style_italic_selected . " arptooltipster' data-align='center' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fas fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $description_title_style_underline_selected . " arptooltipster' data-align='right' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fas fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $description_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fas fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='description_style_bold_global' name='description_style_bold_global' value='" . $general_option['column_settings']['arp_description_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='description_style_italic_global' name='description_style_italic_global' value='" . $general_option['column_settings']['arp_description_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='description_style_decoration_global' name='description_style_decoration_global' value='" . $general_option['column_settings']['arp_description_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        


        if (in_array('arp_price_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        

        $price_font_family_global = isset($general_option['column_settings']['price_font_family_global']) ? $general_option['column_settings']['price_font_family_global'] : '';
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . " border-bottom: none;'>";
        
        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Pricing Fonts', 'ARPrice') . "</div>";	
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Family', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='price_font_family_global' class='arp_custom_font_family_options' name='price_font_family_global' value='" . $price_font_family_global . "' data-default-font='" . $price_font_family_global . "' />";
        $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='price_font_font_family_dd' data-name='price_font_font_family_dd' data-id='price_font_family_global' style=''>";
        if ($general_option['column_settings']['price_font_family_global'])
            $arp_selectbox_placeholder = $general_option['column_settings']['price_font_family_global'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        if( $arp_selectbox_placeholder == 'inherit' ){
            $arp_selectbox_placeholder = esc_html__( 'Inherit from Theme', 'ARPrice' );
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['price_font_family_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='price_font_family_global'>";

        $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";
        
        $tablestring .= $default_fonts_string;

        $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";


        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $price_font_family_style = '';
        if( !in_array($price_font_family_global,$google_fonts) ){
            $price_font_family_style = 'display:none;';
        }

        $tablestring .= "<div class='arp_google_font_preview_note' style='$price_font_family_style'><a target='_blank'  class='arp_google_font_preview_link' id='price_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $general_option['column_settings']['price_font_family_global'] . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Size', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='price_font_size_global'  name='price_font_size_global' value='" . $general_option['column_settings']['price_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox price_font_size_global_dd arp_font_option_dd' data-name='price_font_size_global' data-id='price_font_size_global' style='width : 83% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['price_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['price_font_size_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='price_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_align'>";
        $price_text_alignment = isset($general_option['column_settings']['arp_price_text_alignment']) ? $general_option['column_settings']['arp_price_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div_new('price_text_alignment', $price_text_alignment, 'arp_price_text_alignment', '', 'pricing_section');
        $tablestring .= "</div>";

        if ($general_option['column_settings']['arp_price_text_bold_global'] == 'bold') {
            $price_title_style_bold_selected = 'selected';
        } else {
            $price_title_style_bold_selected = '';
        }

        
        if ($general_option['column_settings']['arp_price_text_italic_global'] == 'italic') {
            $price_title_style_italic_selected = 'selected';
        } else {
            $price_title_style_italic_selected = '';
        }

        
        if ($general_option['column_settings']['arp_price_text_decoration_global'] == 'underline') {
            $price_title_style_underline_selected = 'selected';
        } else {
            $price_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_price_text_decoration_global'] == 'line-through') {
            $price_title_style_linethrough_selected = 'selected';
        } else {
            $price_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='' id='arp_price_text_style_global'>";

        $tablestring .= "<div class='font_title_font_family_div' data-level = 'price_level_options' level-id='price_button_global'>";

        $tablestring .= "<div class='arp_style_btn " . $price_title_style_bold_selected . " arptooltipster' data-align='left' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fas fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $price_title_style_italic_selected . " arptooltipster' data-align='center' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fas fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $price_title_style_underline_selected . " arptooltipster' data-align='right' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fas fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $price_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fas fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='price_style_bold_global' name='price_style_bold_global' value='" . $general_option['column_settings']['arp_price_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='price_style_italic_global' name='price_style_italic_global' value='" . $general_option['column_settings']['arp_price_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='price_style_decoration_global' name='price_style_decoration_global' value='" . $general_option['column_settings']['arp_price_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        


        if (in_array('arp_body_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . " border-bottom: none;'>";
        
        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Body Fonts', 'ARPrice') . "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Family', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='body_font_family_global' class='arp_custom_font_family_options' name='body_font_family_global' value='" . $general_option['column_settings']['body_font_family_global'] . "' data-default-font='" . $general_option['column_settings']['body_font_family_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='body_font_font_family_dd' data-name='body_font_font_family_dd' data-id='body_font_family_global' style=''>";
        if ($general_option['column_settings']['body_font_family_global'])
            $arp_selectbox_placeholder = $general_option['column_settings']['body_font_family_global'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        if( $arp_selectbox_placeholder == 'inherit' ){
            $arp_selectbox_placeholder = esc_html__( 'Inherit from Theme', 'ARPrice' );
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['body_font_family_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='body_font_family_global'>";

        $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";
        
        $tablestring .= $default_fonts_string;

        $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";


        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $body_font_family_style = '';
        if( !in_array($general_option['column_settings']['body_font_family_global'],$google_fonts) ){
            $body_font_family_style = 'display:none;';
        }

        $tablestring .= "<div class='arp_google_font_preview_note' style='$body_font_family_style'><a target='_blank'  class='arp_google_font_preview_link' id='body_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $general_option['column_settings']['body_font_family_global'] . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Size', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='body_font_size_global'  name='body_font_size_global' value='" . $general_option['column_settings']['body_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox body_font_size_global_dd arp_font_option_dd' data-name='body_font_size_global' data-id='body_font_size_global' style='width : 83% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['body_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['body_font_size_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='body_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_align'>";
        $body_text_alignment = isset($general_option['column_settings']['arp_body_text_alignment']) ? $general_option['column_settings']['arp_body_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div_new('body_text_alignment', $body_text_alignment, 'arp_body_text_alignment', '', 'body_section');
        $tablestring .= "</div>";

        if ($general_option['column_settings']['arp_body_text_bold_global'] == 'bold') {
            $body_title_style_bold_selected = 'selected';
        } else {
            $body_title_style_bold_selected = '';
        }

        
        if ($general_option['column_settings']['arp_body_text_italic_global'] == 'italic') {
            $body_title_style_italic_selected = 'selected';
        } else {
            $body_title_style_italic_selected = '';
        }

        
        if ($general_option['column_settings']['arp_body_text_decoration_global'] == 'underline') {
            $body_title_style_underline_selected = 'selected';
        } else {
            $body_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_body_text_decoration_global'] == 'line-through') {
            $body_title_style_linethrough_selected = 'selected';
        } else {
            $body_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='' id='arp_body_text_style_global'>";

        $tablestring .= "<div class='font_title_font_family_div' data-level = 'body_level_options' level-id='body_button_global'>";

        $tablestring .= "<div class='arp_style_btn " . $body_title_style_bold_selected . " arptooltipster' data-align='left' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fas fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $body_title_style_italic_selected . " arptooltipster' data-align='center' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fas fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $body_title_style_underline_selected . " arptooltipster' data-align='right' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fas fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $body_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fas fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='body_style_bold_global' name='body_style_bold_global' value='" . $general_option['column_settings']['arp_body_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='body_style_italic_global' name='body_style_italic_global' value='" . $general_option['column_settings']['arp_body_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='body_style_decoration_global' name='body_style_decoration_global' value='" . $general_option['column_settings']['arp_body_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        


        if (in_array('arp_footer_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . " border-bottom: none;'>";
        
        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Footer Fonts', 'ARPrice') . "</div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Family', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='footer_font_family_global' class='arp_custom_font_family_options' name='footer_font_family_global' value='" . $general_option['column_settings']['footer_font_family_global'] . "' data-default-font='" . $general_option['column_settings']['footer_font_family_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='footer_font_font_family_dd' data-name='footer_font_font_family_dd' data-id='footer_font_family_global' style=''>";
        if ($general_option['column_settings']['footer_font_family_global'])
            $arp_selectbox_placeholder = $general_option['column_settings']['footer_font_family_global'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        if( $arp_selectbox_placeholder == 'inherit' ){
            $arp_selectbox_placeholder = esc_html__( 'Inherit from Theme', 'ARPrice' );
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['footer_font_family_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='footer_font_family_global'>";

        $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";
        
        $tablestring .= $default_fonts_string;

        $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $footer_font_family_style = '';
        if( !in_array($general_option['column_settings']['footer_font_family_global'],$google_fonts) ){
            $footer_font_family_style = 'display:none;';
        }

        $tablestring .= "<div class='arp_google_font_preview_note' style='$footer_font_family_style'><a target='_blank'  class='arp_google_font_preview_link' id='footer_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $general_option['column_settings']['footer_font_family_global'] . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Size', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='footer_font_size_global'  name='footer_font_size_global' value='" . $general_option['column_settings']['footer_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox footer_font_size_global_dd arp_font_option_dd' data-name='footer_font_size_global' data-id='footer_font_size_global' style='width : 83% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['footer_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['footer_font_size_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='footer_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_align'>";
        $footer_text_alignment = isset($general_option['column_settings']['arp_footer_text_alignment']) ? $general_option['column_settings']['arp_footer_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div_new('footer_text_alignment', $footer_text_alignment, 'arp_footer_text_alignment', '', 'footer_section');
        $tablestring .= "</div>";

        if ($general_option['column_settings']['arp_footer_text_bold_global'] == 'bold') {
            $footer_title_style_bold_selected = 'selected';
        } else {
            $footer_title_style_bold_selected = '';
        }

        
        if ($general_option['column_settings']['arp_footer_text_italic_global'] == 'italic') {
            $footer_title_style_italic_selected = 'selected';
        } else {
            $footer_title_style_italic_selected = '';
        }

        
        if ($general_option['column_settings']['arp_footer_text_decoration_global'] == 'underline') {
            $footer_title_style_underline_selected = 'selected';
        } else {
            $footer_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_footer_text_decoration_global'] == 'line-through') {
            $footer_title_style_linethrough_selected = 'selected';
        } else {
            $footer_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='' id='arp_footer_text_style_global'>";

        $tablestring .= "<div class='font_title_font_family_div' data-level = 'footer_level_options' level-id='footer_button_global'>";

        $tablestring .= "<div class='arp_style_btn " . $footer_title_style_bold_selected . " arptooltipster' data-align='left' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fas fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $footer_title_style_italic_selected . " arptooltipster' data-align='center' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fas fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $footer_title_style_underline_selected . " arptooltipster' data-align='right' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fas fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $footer_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fas fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='footer_style_bold_global' name='footer_style_bold_global' value='" . $general_option['column_settings']['arp_footer_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='footer_style_italic_global' name='footer_style_italic_global' value='" . $general_option['column_settings']['arp_footer_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='footer_style_decoration_global' name='footer_style_decoration_global' value='" . $general_option['column_settings']['arp_footer_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        


        if (in_array('arp_button_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . " border-bottom: none;'>";
        
        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Button Fonts', 'ARPrice') . "</div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Family', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='button_font_family_global' class='arp_custom_font_family_options' name='button_font_family_global' value='" . $general_option['column_settings']['button_font_family_global'] . "' data-default-font='" . $general_option['column_settings']['button_font_family_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='button_font_font_family_dd' data-name='button_font_font_family_dd' data-id='button_font_family_global' style=''>";
        if ($general_option['column_settings']['button_font_family_global'])
            $arp_selectbox_placeholder = $general_option['column_settings']['button_font_family_global'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        if( $arp_selectbox_placeholder == 'inherit' ){
            $arp_selectbox_placeholder = esc_html__( 'Inherit from Theme', 'ARPrice' );
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['button_font_family_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='button_font_family_global'>";

        $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";
        
        $tablestring .= $default_fonts_string;

        $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $button_font_family_style = '';
        if( !in_array($general_option['column_settings']['button_font_family_global'],$google_fonts) ){
            $button_font_family_style = 'display:none;';
        }

        $tablestring .= "<div class='arp_google_font_preview_note' style='$button_font_family_style'><a target='_blank'  class='arp_google_font_preview_link' id='button_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $general_option['column_settings']['button_font_family_global'] . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Size', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='button_font_size_global'  name='button_font_size_global' value='" . $general_option['column_settings']['button_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox button_font_size_global_dd arp_font_option_dd' data-name='button_font_size_global' data-id='button_font_size_global' style='width : 83% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['button_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['button_font_size_global'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='button_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";


        if ($general_option['column_settings']['arp_button_text_bold_global'] == 'bold') {
            $button_title_style_bold_selected = 'selected';
        } else {
            $button_title_style_bold_selected = '';
        }

        
        if ($general_option['column_settings']['arp_button_text_italic_global'] == 'italic') {
            $button_title_style_italic_selected = 'selected';
        } else {
            $button_title_style_italic_selected = '';
        }

        
        if ($general_option['column_settings']['arp_button_text_decoration_global'] == 'underline') {
            $button_title_style_underline_selected = 'selected';
        } else {
            $button_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_button_text_decoration_global'] == 'line-through') {
            $button_title_style_linethrough_selected = 'selected';
        } else {
            $button_title_style_linethrough_selected = '';
        }
        $col_font_style = ($arp_is_rtl) ? "float:left" : "float:right";
        $tablestring .= "<div class='column_opt_opts font_style_div' style='{$col_font_style}' id='arp_button_text_style_global'>";

        $tablestring .= "<div class='font_title_font_family_div' data-level = 'button_level_options' level-id='button_level_global'>";

        $tablestring .= "<div class='arp_style_btn " . $button_title_style_bold_selected . " arptooltipster' data-align='left' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fas fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $button_title_style_italic_selected . " arptooltipster' data-align='center' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fas fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $button_title_style_underline_selected . " arptooltipster' data-align='right' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fas fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $button_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fas fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='button_style_bold_global' name='button_style_bold_global' value='" . $general_option['column_settings']['arp_button_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='button_style_italic_global' name='button_style_italic_global' value='" . $general_option['column_settings']['arp_button_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='button_style_decoration_global' name='button_style_decoration_global' value='" . $general_option['column_settings']['arp_button_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        
        
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='border-bottom: none;'>";
        
        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Tooltip Fonts', 'ARPrice') . "</div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Family', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='tooltip_font_family' class='arp_custom_font_family_options' name='tooltip_font_family' value='" . $tooltip_settings['tooltip_font_family'] . "' data-default-font='" . $tooltip_settings['tooltip_font_family'] . "' />";
        $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='tooltip_font_family_dd' data-name='tooltip_font_family' data-id='tooltip_font_family'  style=''>";

        if ($tooltip_settings['tooltip_font_family'])
            $arp_selectbox_placeholder = $tooltip_settings['tooltip_font_family'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        if( $arp_selectbox_placeholder == 'inherit' ){
            $arp_selectbox_placeholder = esc_html__( 'Inherit from Theme', 'ARPrice' );
        }

        $tablestring .= "<dt><span style='float:left;'>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $tooltip_settings['tooltip_font_family'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul class='arp_tooltip_font_setting' data-id='tooltip_font_family'>";

        $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";
        
        $tablestring .= $default_fonts_string;

        $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tooltip_font_preview_style = '';
        if( !in_array($tooltip_settings['tooltip_font_family'],$google_fonts) ){
            $tooltip_font_preview_style = 'display:none;';
        }

        $tablestring .= "<div class='arp_google_font_preview_note' style='$tooltip_font_preview_style'><a target='_blank'  class='arp_google_font_preview_link' id='arp_tooltip_font_family_preview' href='" . $googlefontpreviewurl . $tooltip_settings['tooltip_font_family'] . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts font_settings_div'>";

        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Size', 'ARPrice') . "</div>";

        $tablestring .= "<div class='font_title_font_family_div'>";

        $tablestring .= "<input type='hidden' id='tooltip_font_size' name='tooltip_font_size' value='" . $tooltip_settings['tooltip_font_size'] . "' />";
        $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='tooltip_font_size_dd' data-name='tooltip_font_size' data-id='tooltip_font_size'  style='width : 83% !important;'>";
        if ($tooltip_settings['tooltip_font_size'])
            $arp_selectbox_placeholder = $tooltip_settings['tooltip_font_size'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        $tablestring .= "<dt><span style='float:left;'>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $tooltip_settings['tooltip_font_size'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul class='arp_tooltip_font_setting' data-id='tooltip_font_size'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (isset($tooltip_settings['tooltip_font_style_bold']) && $tooltip_settings['tooltip_font_style_bold'] == 'bold') {
            $tooltip_style_bold_selected = 'selected';
        } else {
            $tooltip_style_bold_selected = '';
        }

        
        if (isset($tooltip_settings['tooltip_font_style_italic']) && $tooltip_settings['tooltip_font_style_italic'] == 'italic') {
            $tooltip_style_italic_selected = 'selected';
        } else {
            $tooltip_style_italic_selected = '';
        }

        
        if (isset($tooltip_settings['tooltip_font_style_decoration']) && $tooltip_settings['tooltip_font_style_decoration'] == 'underline') {
            $tooltip_style_underline_selected = 'selected';
        } else {
            $tooltip_style_underline_selected = '';
        }


        if (isset($tooltip_settings['tooltip_font_style_decoration']) && $tooltip_settings['tooltip_font_style_decoration'] == 'line-through') {
            $tooltip_style_linethrough_selected = 'selected';
        } else {
            $tooltip_style_linethrough_selected = '';
        }


        $col_font_style = ($arp_is_rtl) ? "float:left" : "float:right";
        $tablestring .= "<div class='column_opt_opts font_style_div' style='{$col_font_style}' id='arp_tooltip_text_style_global'>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'tooltip_font_style' level-id='tooltip_font_style'>";
        $tablestring .= "<div class='arp_style_btn " . $tooltip_style_bold_selected . " arptooltipster' data-align='left' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fas fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $tooltip_style_italic_selected . " arptooltipster' data-align='center' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fas fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $tooltip_style_underline_selected . " arptooltipster' data-align='right' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fas fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $tooltip_style_linethrough_selected . " arptooltipster' data-align='right' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fas fa-strikethrough'></i>";
        $tablestring .= "</div>";


        
        $tooltip_settings['tooltip_font_style_bold'] = isset($tooltip_settings['tooltip_font_style_bold']) ? $tooltip_settings['tooltip_font_style_bold'] : '';
        $tablestring .= "<input type='hidden' id='tooltip_font_style_bold' name='tooltip_font_style_bold' value='" . $tooltip_settings['tooltip_font_style_bold'] . "' /> ";
        $tooltip_settings['tooltip_font_style_italic'] = isset($tooltip_settings['tooltip_font_style_italic']) ? $tooltip_settings['tooltip_font_style_italic'] : '';
        $tablestring .= "<input type='hidden' id='tooltip_font_style_italic' name='tooltip_font_style_italic' value='" . $tooltip_settings['tooltip_font_style_italic'] . "' /> ";
        $tooltip_settings['tooltip_font_style_decoration'] = isset($tooltip_settings['tooltip_font_style_decoration']) ? $tooltip_settings['tooltip_font_style_decoration'] : '';
        $tablestring .= "<input type='hidden' id='tooltip_font_style_decoration' name='tooltip_font_style_decoration' value='" . $tooltip_settings['tooltip_font_style_decoration'] . "' /> ";


        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        

        

        $tablestring .= "<div class='column_content_light_row column_opt_row' style='border-bottom: none;'>";

        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Toggle Title Fonts', 'ARPrice') . "</div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Family', 'ARPrice') . "</div>";


        $tablestring .= "<div class='font_title_font_family_div'>";
        $general_option['general_settings']['toggle_title_font_family'] = $general_option['general_settings']['toggle_title_font_family'] ? $general_option['general_settings']['toggle_title_font_family'] : 'Ubuntu';
        $tablestring .= "<input type='hidden' id='toggle_title_font_family' class='arp_custom_font_family_options' name='toggle_title_font_family' value='" . $general_option['general_settings']['toggle_title_font_family'] . "' data-default-font='" . $general_option['general_settings']['toggle_title_font_family'] . "' />";

        $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='toggle_title_font_family_dd' data-name='toggle_title_font_family' data-id='toggle_title_font_family' style=''>";


        if ($general_option['general_settings']['toggle_title_font_family'])
            $arp_selectbox_placeholder = $general_option['general_settings']['toggle_title_font_family'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        if( $arp_selectbox_placeholder == 'inherit' ){
            $arp_selectbox_placeholder = esc_html__( 'Inherit from Theme', 'ARPrice' );
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['general_settings']['toggle_title_font_family'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='toggle_title_font_family'>";

        $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";
        
        $tablestring .= $default_fonts_string;

        $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";


        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_toggle_title_font_family_preview' href='" . $googlefontpreviewurl . $general_option['general_settings']['toggle_title_font_family'] . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";



        
        
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Size', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";

        $general_option['general_settings']['toggle_title_font_size'] = $general_option['general_settings']['toggle_title_font_size'] ? $general_option['general_settings']['toggle_title_font_size'] : 16;
        $tablestring .= "<input type='hidden' id='toggle_title_font_size'  name='toggle_title_font_size' value='" . $general_option['general_settings']['toggle_title_font_size'] . "' />";

        $tablestring .= "<dl class='arp_selectbox toggle_title_font_size_dd arp_font_option_dd' data-name='toggle_title_font_size' data-id='toggle_title_font_size' style='width : 83% !important;' >";

        $tablestring .= "<dt><span>" . $general_option['general_settings']['toggle_title_font_size'] . "</span><input type='text' style='display:none;' value='" . $general_option['general_settings']['toggle_title_font_size'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='toggle_title_font_size'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        
        
        $col_font_style = ($arp_is_rtl) ? "float:left" : "float:right";
        $tablestring .= "<div class='column_opt_opts font_style_div' style='{$col_font_style}' id='arp_toggle_title_text_style_global'>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'toggle_title_font_style' level-id='toggle_title_font_style'>";

        
        if ($general_option['general_settings']['toggle_title_font_style_bold'] == 'bold') {
            $toggle_title_style_bold_selected = 'selected';
        } else {
            $toggle_title_style_bold_selected = '';
        }

        
        if ($general_option['general_settings']['toggle_title_font_style_italic'] == 'italic') {
            $toggle_title_style_italic_selected = 'selected';
        } else {
            $toggle_title_style_italic_selected = '';
        }

        
        if ($general_option['general_settings']['toggle_title_font_style_decoration'] == 'underline') {
            $toggle_title_style_underline_selected = 'selected';
        } else {
            $toggle_title_style_underline_selected = '';
        }


        if ($general_option['general_settings']['toggle_title_font_style_decoration'] == 'line-through') {
            $toggle_title_style_linethrough_selected = 'selected';
        } else {
            $toggle_title_style_linethrough_selected = '';
        }

        $tablestring .= "<div class='arp_style_btn " . $toggle_title_style_bold_selected . " arptooltipster' data-align='left' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fas fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $toggle_title_style_italic_selected . " arptooltipster' data-align='center' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fas fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $toggle_title_style_underline_selected . " arptooltipster' data-align='right' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fas fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='' class='arp_style_btn " . $toggle_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fas fa-strikethrough'></i>";
        $tablestring .= "</div>";






        $tablestring .= "<input type='hidden' id='toggle_title_font_style_bold' name='toggle_title_font_style_bold' value='" . $general_option['general_settings']['toggle_title_font_style_bold'] . "' /> ";
        $tablestring .= "<input type='hidden' id='toggle_title_font_style_italic' name='toggle_title_font_style_italic' value='" . $general_option['general_settings']['toggle_title_font_style_italic'] . "' /> ";
        $tablestring .= "<input type='hidden' id='toggle_title_font_style_decoration' name='toggle_title_font_style_decoration' value='" . $general_option['general_settings']['toggle_title_font_style_decoration'] . "' /> ";

        $tablestring .= "</div>";

        $tablestring .= "</div>";


        $tablestring .= "</div>";





        

        
        $tablestring .= "<div class='column_content_light_row column_opt_row arp_no_border' style='border-bottom: none;'>";
        
        $tablestring .= "<div class='column_opt_label two_cols column_opt_title_height' >" . esc_html__('Toggle Tab Fonts', 'ARPrice') . "</div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Family', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $general_option['general_settings']['toggle_button_font_family'] = $general_option['general_settings']['toggle_button_font_family'] ? $general_option['general_settings']['toggle_button_font_family'] : 'Ubuntu';
        $tablestring .= "<input type='hidden' id='toggle_button_font_family' class='arp_custom_font_family_options' name='toggle_button_font_family' value='" . $general_option['general_settings']['toggle_button_font_family'] . "' data-default-font='" . $general_option['general_settings']['toggle_button_font_family'] . "' />";

        $tablestring .= "<dl class='arp_selectbox arp_font_option_dd' id='toggle_button_font_family_dd' data-name='toggle_button_font_family' data-id='toggle_button_font_family' style=''>";

        if ($general_option['general_settings']['toggle_button_font_family'])
            $arp_selectbox_placeholder = $general_option['general_settings']['toggle_button_font_family'];
        else
            $arp_selectbox_placeholder = esc_html__('Choose Option', 'ARPrice');

        if( $arp_selectbox_placeholder == 'inherit' ){
            $arp_selectbox_placeholder = esc_html__( 'Inherit from Theme', 'ARPrice' );
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['general_settings']['toggle_button_font_family'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul class='arp_togglebutton_font_setting' data-id='toggle_button_font_family'>";

        $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";
        
        $tablestring .= $default_fonts_string;

        $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_toggle_button_font_family_preview' href='" . $googlefontpreviewurl . $general_option['general_settings']['toggle_button_font_family'] . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";


        
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label arp_fontsetting_label_height'>" . esc_html__('Font Size', 'ARPrice') . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $general_option['general_settings']['toggle_button_font_size'] = $general_option['general_settings']['toggle_button_font_size'] ? $general_option['general_settings']['toggle_button_font_size'] : 16;
        $tablestring .= "<input type='hidden' id='toggle_button_font_size'  name='toggle_button_font_size' value='" . $general_option['general_settings']['toggle_button_font_size'] . "' />";

        $tablestring .= "<dl class='arp_selectbox toggle_button_font_size_dd arp_font_option_dd' data-name='toggle_button_font_size' data-id='toggle_button_font_size' style='width : 83% !important;'>";

        $tablestring .= "<dt><span>" . $general_option['general_settings']['toggle_button_font_size'] . "</span><input type='text' style='display:none;' value='" . $general_option['general_settings']['toggle_button_font_size'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='toggle_button_font_size'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";


        
        
        $col_font_style = ($arp_is_rtl) ? "float:left" : "float:right";
        $tablestring .= "<div class='column_opt_opts font_style_div' style='{$col_font_style}' id='toggle_button_font_style'>";

        $tablestring .= "<div class='font_title_font_family_div' data-level = 'toggle_button_font_style' level-id='toggle_button_font_style'>";

        
        if ($general_option['general_settings']['toggle_button_font_style_bold'] == 'bold') {
            $toggle_button_style_bold_selected = 'selected';
        } else {
            $toggle_button_style_bold_selected = '';
        }

        
        if ($general_option['general_settings']['toggle_button_font_style_italic'] == 'italic') {
            $toggle_button_style_italic_selected = 'selected';
        } else {
            $toggle_button_style_italic_selected = '';
        }

        
        if ($general_option['general_settings']['toggle_button_font_style_decoration'] == 'underline') {
            $toggle_button_style_underline_selected = 'selected';
        } else {
            $toggle_button_style_underline_selected = '';
        }

        if ($general_option['general_settings']['toggle_button_font_style_decoration'] == 'line-through') {
            $toggle_button_style_linethrough_selected = 'selected';
        } else {
            $toggle_button_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='arp_style_btn " . $toggle_button_style_bold_selected . " arptooltipster' data-align='left' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fas fa-bold'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='arp_style_btn " . $toggle_button_style_italic_selected . " arptooltipster' data-align='center' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fas fa-italic'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='arp_style_btn " . $toggle_button_style_underline_selected . " arptooltipster' data-align='right' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fas fa-underline'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $toggle_button_style_linethrough_selected . " arptooltipster' data-align='right' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fas fa-strikethrough'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<input type='hidden' id='toggle_button_font_style_bold' name='toggle_button_font_style_bold' value='" . $general_option['general_settings']['toggle_button_font_style_bold'] . "' /> ";
        $tablestring .= "<input type='hidden' id='toggle_button_font_style_italic' name='toggle_button_font_style_italic' value='" . $general_option['general_settings']['toggle_button_font_style_italic'] . "' /> ";
        $tablestring .= "<input type='hidden' id='toggle_button_font_style_decoration' name='toggle_button_font_style_decoration' value='" . $general_option['general_settings']['toggle_button_font_style_decoration'] . "' /> ";

        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        

        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";



        

        $tablestring .= "</div>";

        global $arp_mainoptionsarr;

        $template_feature = $arp_mainoptionsarr['general_options']['template_options']['features'][$ref_template];

        $template_css = '';

        if ($is_template == 1) {
            $template_name = $sql->template_name;
        } else {
            $template_name = $table_id;
        }

        $tablestring .= "<style type='text/css' id='border_radius_styles'>";

        if ( empty( $column_border_radius_top_left ) && empty( $column_border_radius_top_right ) && empty( $column_border_radius_bottom_right ) &&  empty( $column_border_radius_bottom_left ) ) {
            
        } else {
            $is_template_animated = isset($template_feature['is_animated']) ? $template_feature['is_animated'] : 0;
            if ($is_template_animated == 0) {
                
                if ($ref_template == 'arptemplate_10') {
                    $tablestring .= ".arptemplate_$template_name .ArpPricingTableColumnWrapper{";

                    $tablestring .= "border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-moz-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-webkit-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-o-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px  !important;";

                    $tablestring .= "}";

                    $tablestring .= ".arptemplate_$template_name .arppricingtablebodycontent ul.arp_opt_options li:last-child{";

                    $tablestring .= "border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-moz-border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-webkit-border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-o-border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px  !important;";

                    $tablestring .= "}";
                } else if( in_array($ref_template,array('arptemplate_25','arptemplate_2','arptemplate_22')) ){
                    if( $ref_template == 'arptemplate_25'){
                        $tablestring .= ".arptemplate_$template_name .ArpPricingTableColumnWrapper .column_description,";
                    }
                    $tablestring .= ".arptemplate_$template_name .ArpPricingTableColumnWrapper .arp_column_content_wrapper{";

                    $tablestring .= "border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-moz-border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-webkit-border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-o-border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px  !important;";

                    $tablestring .= "}";

                } else {
                    $tablestring .= ".arptemplate_$template_name .ArpPricingTableColumnWrapper .arp_column_content_wrapper{";

                    $tablestring .= "border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-moz-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-webkit-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-o-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px  !important;";

                    $tablestring .= "overflow:hidden !important;";

                    $tablestring .= "}";
                }

                if ($ref_template == 'arptemplate_6' || $ref_template == 'arptemplate_9') {

                    $tablestring .= ".arptemplate_$template_name .maincaptioncolumn .arpcaptiontitle{";

                    $tablestring .= "border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px 0 0 !important;";

                    $tablestring .= "-moz-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px 0 0 !important;";

                    $tablestring .= "-webkit-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px 0 0 !important;";

                    $tablestring .= "-o-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px 0 0 !important;";

                    $tablestring .= "}";
                }
            } else {
                $tablestring .= ".arptemplate_$template_name .ArpPricingTableColumnWrapper .arp_column_content_wrapper{ ";

                $tablestring .= "border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;overflow:hidden !important;";

                $tablestring .= " -moz-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;overflow:hidden !important;";

                $tablestring .= "-webkit-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;overflow:hidden !important;";

                $tablestring .= "-o-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;overflow:hidden !important;";

                $tablestring .= "}";
            }
        }

        $tablestring .= "</style>";

        if ($is_template == 1) {
            global $arprice_images_css_version;
            if (file_exists(PRICINGTABLE_DIR . '/css/templates/arptemplate_' . $sql->template_name . '_v' . $arprice_images_css_version . '.css')) {

                $template_css =ARPFilecontroller::arp_get_file_content(PRICINGTABLE_DIR . "/css/templates/arptemplate_" . $sql->template_name . '_v' . $arprice_images_css_version . ".css");

                $template_css = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $template_css);
            }
        } else {
            if (file_exists(PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $id . '.css')) {

                $template_css = ARPFilecontroller::arp_get_file_content(PRICINGTABLE_UPLOAD_DIR . "/css/arptemplate_" . $id . ".css");
            }
        }

        $tablestring .= "<style id='arptemplatecss' type='text/css'>" . $template_css . "</style>";



        $arp_front_css = ARPFilecontroller::arp_get_file_content(PRICINGTABLE_DIR . "/css/arprice_front.css");

        $arp_front_css = str_replace('../images', PRICINGTABLE_IMAGES_URL, $arp_front_css);

        $arp_front_css = str_replace('../fonts/', PRICINGTABLE_URL . '/fonts/', $arp_front_css);

        $tablestring .= "<style id='arpfrontcss' type='text/css'>" . $arp_front_css . "</style>";

        $col_ord_arr = json_decode($general_settings['column_order']);

        $animation_margin = '';
        if ($column_animation['is_animation'] == 'yes') {
            $animation_margin = 'margin-bottom:45px;';
        }
        if ($column_animation['is_animation'] == 0) {
            $animation_margin = 'margin-bottom:-5px;';
        }
        if (isset($column_animation['is_animation']) and $column_animation['is_animation'] == 'yes' and $column_animation['is_pagination'] == 1 and ( $column_animation['pagination_position'] == 'Top' or $column_animation['pagination_position'] == 'Both' ))
            $tablestring .= "<div class='arp_pagination " . $column_animation['pagination_style'] . " arp_pagination_top' id='arp_slider_" . $id . "_pagination_top'></div>";

        $container_width = $wrapper_width_value . 'px;';
        $tablestring .= "<div class='ArpTemplate_main arp_template_main_editor' id=\"ArpTemplate_main\" style='clear:both;" . $animation_margin . "width:$container_width'>";

        $tablestring .= "<div class='arp_width_guide_line'>";
        $tablestring .= "<div class='arp_width_guide_line_box' id='arp_width_guide_line_box'>";
        $tablestring .= $wrapper_width_value . "px";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<style type='text/css' media='all'>";


        $tablestring .= $arprice_form->arp_render_customcss($template_name, $general_option, 0, $opts, $is_animated);

        if ($general_option['tooltip_settings']['style'] == 'normal') {
            $tablestring .= " .arp_tooltip_" . $id . " {
			border-radius:4px;
				-moz-border-radius:4px;
				-webkit-border-radius:4px;
				-o-border-radius:4px;

		}";
        } else if ($general_option['tooltip_settings']['style'] == 'glass') {
            $tablestring .= " .arp_tooltip_" . $id . " {
			border-radius:7px;
				-moz-border-radius:7px;
				-webkit-border-radius:7px;
				-o-border-radius:7px;
			box-shadow:0px 0px 20px rgba(0,0,0,0.3);
			 -moz-box-shadow:0px 0px 20px rgba(0,0,0,0.3);
			 -webkit-box-shadow:0px 0px 20px rgba(0,0,0,0.3);
			 -o-box-shadow:0px 0px 20px rgba(0,0,0,0.3);
		}";
        } else if ($general_option['tooltip_settings']['style'] == 'drop') {
            $tablestring .= ".arp_tooltip_" . $id . " {
			border-radius:20px;
				-moz-border-radius:20px;
				-webkit-border-radius:20px;
				-o-border-radius:20px;
			padding:10px;
			text-align:center;
		}";
        }

        $tablestring .= "</style>";

        $tltp_bgcolor = $arprice_form->hex2rgb($general_option['tooltip_settings']['background_color']);

        if ($general_option['tooltip_settings']['style'] == 'normal' || $general_option['tooltip_settings']['style'] == 'drop') {
            $tooltip_bg_color = 'rgb(' . $tltp_bgcolor['red'] . ',' . $tltp_bgcolor['green'] . ',' . $tltp_bgcolor['blue'] . ')';
        } else if ($general_option['tooltip_settings']['style'] == 'glass') {
            $tooltip_bg_color = 'rgba(' . $tltp_bgcolor['red'] . ',' . $tltp_bgcolor['green'] . ',' . $tltp_bgcolor['blue'] . ',0.9)';
        } else if ($general_option['tooltip_settings']['style'] == 'alert') {
            $tooltip_bg_color = 'rgba(' . $tltp_bgcolor['red'] . ',' . $tltp_bgcolor['green'] . ',' . $tltp_bgcolor['blue'] . ',0.7)';
        }

        if ($general_option['tooltip_settings']['tooltip_width'] == '')
            $tooltip_max_width = 'null';
        else
            $tooltip_max_width = $general_option['tooltip_settings']['tooltip_width'];

        $tablestring .= "<div id='arp_inlinestyle'><style>";
        $tablestring .= $general_settings['arp_custom_css'];
        $tablestring .= "</style></div> ";

        $tablestring .= "<div class='arp_inlinescript'><script type='text/javascript'>
	                        
                        </script>";

        $global_column_width = "";

        if ($column_settings['all_column_width'] && $column_settings['all_column_width'] > 0) {
            $global_column_width = 'width:' . $column_settings['all_column_width'] . 'px;';
        }


        $tablestring .= "<input type='hidden' name='template' id='arp_template_id_new_editor' value='" . $template_settings['template'] . "' />";
        $tablestring .= "<input type='hidden' name='template_type' id='arp_template_type_editor' value='" . $template_type . "' />";
        $tablestring .= "<input type='hidden' name='is_tbl_preview' id='is_tbl_preview' value='" . $is_tbl_preview . "' /></div>";
        $tablestring .= "<input type='hidden' name='column_level_dynamic_array' id='column_level_dynamic_array' />";

        $tablestring .= "<input type='hidden' id='arp_template_name' name='arp_template_name' value='arptemplate_" . $template_name . "' />";

        $template_id = $template_settings['template'];
        $color_scheme = 'arp' . $template_settings['skin'];
        if ($hover_type == 0 and $is_tbl_preview != 2) {
            $hover_class = 'hover_effect';
        } else if ($hover_type == 1 and $is_tbl_preview != 2) {
            $hover_class = 'shadow_effect';
        } else {
            $hover_class = 'no_effect';
        }

        if ($is_animation != "" and $is_tbl_preview != 2) {
            $animation_class = 'has_animation';
        } else {
            $animation_class = 'no_animation';
        }

        if ($column_animation['is_animation'] == 'yes' and $column_animation['is_pagination'] == 1 and $is_tbl_preview != 2) {
            $slider_pagination_container = 'arp_slider_pagination';
            if ($column_animation['pagination_position'] == 'Top')
                $slider_pagination_container .= ' Top';
            else if ($column_animation['pagination_position'] == 'Both')
                $slider_pagination_container .= ' Both';
            else if ($column_animation['pagination_position'] == 'Bottom')
                $slider_pagination_container .= ' Bottom';
        }
        else {
            $slider_pagination_container = '';
        }


        $tablestring .= "<div class='ArpPriceTable arp_admin_template_editor arp_price_table_" . $template_name . " arptemplate_" . $template_name . " " . $color_scheme . " " . $slider_pagination_container . "'";

        if (isset($column_animation['is_animation']) and $column_animation['is_animation'] == 'yes' and $is_tbl_preview != 2 and $is_tbl_preview != 3) {
            $data_items = $column_animation['visible_column'] ? $column_animation['visible_column'] : 1;
            $data_tablet_items = $column_animation['visible_columns_tablet'] ? $column_animation['visible_columns_tablet'] : 1;
            $scrolling_columns = $column_animation['scrolling_columns'] ? $column_animation['scrolling_columns'] : 1;
            $navigation = ( $column_animation['navigation'] == 1 ) ? 1 : 0;
            $autoplay = ( $column_animation['autoplay'] == 1 ) ? 1 : 0;
            $sliding_effect = $column_animation['sliding_effect'] ? $column_animation['sliding_effect'] : 'slide';
            $transition_speed = $column_animation['transition_speed'] ? $column_animation['transition_speed'] : '500';
            $hide_caption = $column_animation['hide_caption'] ? $column_animation['hide_caption'] : 0;
            $infinite = $column_animation['is_infinite'] ? $column_animation['is_infinite'] : 0;
            $easing_effect = $column_animation['easing_effect'] ? $column_animation['easing_effect'] : 'swing';

            $tablestring .= "data-animate='true' data-id='" . $table_id . "' data-items='" . $data_items . "' data-scroll='" . $scrolling_columns . "' data-autoplay='" . $autoplay . "' data-effect='" . $sliding_effect . "' data-speed='" . $transition_speed . "' data-caption='" . $hide_caption . "' data-infinite='" . $infinite . "' data-easing='" . $easing_effect . "' data-tablet-items='". $data_tablet_items . "'";
        }
        $tablestring .= ">";

        $navigation = "";
        if ($column_animation['is_animation'] == 'yes' and $is_tbl_preview != 2) {
            $navigation = ( $column_animation['navigation'] == 1 ) ? 1 : 0;
        }
        $tablestring .= "<div class='arp_prev_div'";
        if (!$navigation) {
            $tablestring .= " style='display:none;'";
        } $tablestring .= ">";
        $tablestring .= "<div id='arp_prev_btn_" . $table_id . "' class='arp_prev_btn " . $column_animation['navigation_style'] . "'></div>";
        $tablestring .= "</div>";
        $ref_template = $general_settings['reference_template'];

        

        $one_toggle_selected = ' toggle_selected active_toggle';
        $toggle_container = ( $general_settings['enable_toggle_price'] == 1 ) ? "" : "display:none;";
        $toggle_style = $general_settings['arp_toggle_main'];
        $toggle_step_count = isset($general_settings['arp_step_main']) ? $general_settings['arp_step_main'] : 2;

        $togglestep_keys = $arp_pricingtable->arp_toggle_step_label_with_db($general_option['general_settings']);

        switch ($toggle_style) {
            case 0:
                $toggle_wrapper_style = 'arp_button_style_switch';
                break;
            case 1:
                $toggle_wrapper_style = 'arp_radio_style_switch';
                break;
            case 2:
                $toggle_wrapper_style = 'arp_border_button_style_switch';
                break;
            case 3:
                $toggle_wrapper_style = 'arp_slide_button_style_switch';
                break;
            case 4:
                $toggle_wrapper_style = 'arp_stepy_style_switch';
                break;
            default:
                $toggle_wrapper_style = 'arp_button_style_switch';
                break;
        }

        $toggle_wrapper_style_button = ( $toggle_wrapper_style == "arp_button_style_switch" ) ? "" : "display:none;";

        $switch_container = array();

        $switch_tab_container = "";

        $radio_tab_container = "";

        $border_button_tab_container = $slide_button_tab_container = $stepy_tab_container = "";

        $setas_default_toggle = isset($general_settings['setas_default_toggle']) ? intval($general_settings['setas_default_toggle']) : 0;

        $switch_counter = "";
        if(isset($togglestep_keys[$toggle_step_count])){
            $scounter = explode('|',$togglestep_keys[$toggle_step_count]);    
            $switch_counter = $scounter[count($scounter) - 3];
        }
        if( isset($arp_toggle_counter) ){
	        for($t = 0; $t <= $arp_toggle_counter; $t++ ){

	            $count = $t + 1;

	            $toggle_data = $togglestep_keys[$count];
	            $toggle_data_array = explode('|',$toggle_data);
	            $toggle_db_key = $toggle_data_array[0];
	            $toggle_label = $toggle_data_array[1];
	            $toggle_id = $toggle_data_array[2];
	            $data_value = $toggle_data_array[4];

	            $selected_cls = '';
	            $selected_cls_radio = 'far fa-circle fa-lg';

	            if( $setas_default_toggle == $t  ){
	                $selected_cls = ' selected ';
	                $selected_cls_radio = 'far fa-dot-circle fa-lg';
	            }

	            $display_switch = '';
	            $last_stepy_cls = '';
	            if( $count > 2 ){
	                if( $default_arp_step_main == $count ){
	                    $display_switch = '';
	                    $last_stepy_cls = 'arp_last_stepy_box';
	                } else if( $count > $default_arp_step_main ){
	                    $display_switch = 'display:none;';
	                }
	            } else {
	                if( $default_arp_step_main == $count ){
	                    $last_stepy_cls = 'arp_last_stepy_box';
	                }
	            }

	            $random_step = rand(1, 9999);

	            $switch_tab_container .= "<div class='button_switch_box {$switch_counter} {$selected_cls}' data-count='{$t}' id='arptemplate_{$template_name}_{$random_step}_toggle_step_{$t}' data-value='{$data_value}' style='{$display_switch}' >";

	            $switch_tab_container .= $toggle_label;

	            $switch_tab_container .= "</div>";

	            $radio_tab_container .= "<div class='radio_button_box {$selected_cls}' data-count='{$t}' id='arptemplate_{$template_name}_{$random_step}_toggle_step_{$t}' data-value='{$data_value}' style='{$display_switch}'>";

	            $radio_tab_container .= "<span class='{$selected_cls_radio}'></span>";

	            $radio_tab_container .= "<label class='toggle_content_label_txt'>".$toggle_label."</label>";

	            $radio_tab_container .= "</div>";

	            $border_button_tab_container .= "<div class='border_button_box {$selected_cls}' data-count='{$t}' id='arptemplate_{$template_name}_{$random_step}_toggle_step_{$t}' data-value='{$data_value}' style='{$display_switch}'>";

	            $border_button_tab_container .= $toggle_label;

	            $border_button_tab_container .= "</div>";

	            $slide_button_tab_container .= "<div class='slide_button_box {$switch_counter} {$selected_cls}' data-count='{$t}' id='arptemplate_{$template_name}_{$random_step}_toggle_step_{$t}' data-value='{$data_value}' style='{$display_switch}'>";

	            $slide_button_tab_container .= $toggle_label;

	            $slide_button_tab_container .= "</div>";

	            $stepy_tab_container .= "<div class='stepy_box {$switch_counter} {$selected_cls} {$last_stepy_cls}' data-count='{$t}' id='arptemplate_{$template_name}_{$random_step}_toggle_step_{$t}' data-value='{$data_value}' style='{$display_switch}'>";

	            $stepy_tab_container .= "<div class='stepy_box_selected'><div class='arp_icon'><i class='fas fa-check'></i></div></div>";

	            $stepy_tab_container .= "<span>".$toggle_label."</span>";

	            $stepy_tab_container .= "</div>";

	        }
        }

        

        $toggle_label_position = ($general_settings['arp_label_position_main'] === '') ? 1 : $general_settings['arp_label_position_main'];
        $toggle_label_yearly = $general_settings['togglestep_yearly'];
        $toggle_label_monthly = $general_settings['togglestep_monthly'];
        $toggle_label_quarterly = $general_settings['togglestep_quarterly'];
        $toggle_sub_label_yearly = isset($general_settings['togglestep_sub_yearly']) ? $general_settings['togglestep_sub_yearly'] : '';
        $toggle_sub_label_monthly = isset($general_settings['togglestep_sub_monthly']) ? $general_settings['togglestep_sub_monthly'] : '';
        $toggle_sub_label_quarterly = isset($general_settings['togglestep_sub_quarterly']) ? $general_settings['togglestep_sub_quarterly'] : '';

        

        $one_toggle_selected = $two_toggle_selected = $three_toggle_selected = '';
        $yearly_toggle_selected = $monthly_toggle_selected = $quarterly_toggle_selected = '';
        $one_selected_fa_class = $two_selected_fa_class = $three_selected_fa_class = 'fas fa-circle-thin fa-lg';
        $toggle_content_default_value = 'two_step_one';
        $one_toggle_selected = 'toggle_selected active_toggle';
        if( $general_settings['enable_toggle_price'] == '1' ){
            if ($setas_default_toggle == 1) {
                $monthly_toggle_selected = ' selected ';
                $two_toggle_selected = ' toggle_selected active_toggle ';
                $toggle_content_default_value = 'two_step_two';
                $two_selected_fa_class = "fas fa-dot-circle-o fa-lg";
            } else if ($setas_default_toggle == 2) {
                $quarterly_toggle_selected = ' selected ';
                $three_toggle_selected = ' toggle_selected active_toggle ';
                $toggle_content_default_value = 'two_step_three';
                $three_selected_fa_class = "fas fa-dot-circle-o fa-lg";
            } else {
                $yearly_toggle_selected = ' selected ';
                $one_toggle_selected = ' toggle_selected active_toggle ';
                $toggle_content_default_value = 'two_step_one';
                $one_selected_fa_class = "fas fa-dot-circle-o fa-lg";
            }
        } 

        if ($toggle_label_position == 0) {
            $toggle_wrapper_cls = 'arp_toggle_left_position';
        } else if ($toggle_label_position == 1) {
            $toggle_wrapper_cls = 'arp_toggle_top_position';
        } else {
            $toggle_wrapper_cls = 'arp_toggle_right_position';
        }

        $toggle_button_verticle_space = isset($general_settings['toggle_button_verticle_space']) ? $general_settings['toggle_button_verticle_space'] : 40 ;
        $toggle_container .= "margin-bottom : ".$toggle_button_verticle_space."px;";
        $toggle_wrapper_cls_10 = ($ref_template == 'arptemplate_10') ? 'toggle_arptemp10_template' : '';

        $tablestring .= "<div class='toggle_content_wrapper $toggle_wrapper_style $toggle_wrapper_cls_10 $toggle_wrapper_cls' style='$toggle_container'>";

        $tablestring .= "<div class='toggle_content_title $switch_counter' >";
            $tablestring .= $general_settings['toggle_label_content'];
        $tablestring .= "</div>";

        $tablestring .= "<div class='toggle_content_switches $switch_counter $toggle_wrapper_style'>";

            $toggle_wrapper_style_radio = ( $toggle_wrapper_style == "arp_radio_style_switch" ) ? "" : "display:none;";

            $tablestring .= "<div id='arp_radio_style_switch' style='$toggle_wrapper_style_radio'>";

            $tablestring .= $radio_tab_container;
            
                

            $tablestring .= "</div>";

            $toggle_wrapper_style_button = ( $toggle_wrapper_style == "arp_button_style_switch" ) ? "" : "display:none;";
            
            $tablestring .= "<div id='arp_button_style_switch' style='$toggle_wrapper_style_button'>";

                
                $tablestring .= $switch_tab_container;

                

                $tablestring .= "<div class='button_switch_box button_switch_box_selected'></div>";

                $tablestring .= "</div>";

                $toggle_wrapper_style_border_button = ( $toggle_wrapper_style == "arp_border_button_style_switch" ) ? "" : "display:none;";

                $tablestring .= "<div id='arp_border_button_style_switch' style='$toggle_wrapper_style_border_button'>";

                $tablestring .= $border_button_tab_container;

                $tablestring .= "</div>";

                $toggle_wrapper_style_slide_button = ( $toggle_wrapper_style == "arp_slide_button_style_switch" ) ? "" : "display:none;";

                $tablestring .= "<div id='arp_slide_button_style_switch' style='$toggle_wrapper_style_slide_button'>";

                $tablestring .= $slide_button_tab_container;

                $tablestring .= "<div class='slide_button_box slide_button_box_selected'></div>";

                $tablestring .= "</div>";

                $toggle_wrapper_style_stepy = ( $toggle_wrapper_style == "arp_stepy_style_switch" ) ? "" : "display:none;";

                $tablestring .= "<div id='arp_stepy_style_switch' style='$toggle_wrapper_style_stepy'>";

                $tablestring .= $stepy_tab_container;

                $tablestring .= "</div>";


                $tablestring .= "<input type='hidden' name='arprice_toggle_content_value' id='arprice_toggle_content_value' class='switch_front_radio_btn' value='" . $toggle_content_default_value . "'/>";
            $tablestring .= "</div>";

        $tablestring .= "</div>";

        

        $tablestring .= "<div id='ArpPricingTableColumns'";
        if ($navigation) {
            $tablestring .= " style='display:table-cell;'";
        }

        $tablestring .= ">";

        $x = 0;
        if ($opts['columns'] and count($opts['columns']) > 0) {

            
            $header_img = array();
            foreach ($opts['columns'] as $j => $columns) {
                $header_img[] = 0;
                if (isset($columns['arp_header_shortcode']) && $columns['arp_header_shortcode'] != '')
                    $header_img[] = 1;
                if (isset($columns['arp_header_shortcode_second']) && $columns['arp_header_shortcode_second'] != '')
                    $header_img[] = 1;
                if (isset($columns['arp_header_shortcode_third']) && $columns['arp_header_shortcode_third'] != '')
                    $header_img[] = 1;
            }
            $new_arr = array();
            if (is_array($col_ord_arr) && count($col_ord_arr) > 0) {
                foreach ($col_ord_arr as $key => $value) {
                    $new_value = str_replace('main_', '', $value);
                    $new_col_id = $new_value;
                    foreach ($opts['columns'] as $j => $columns) {
                        if ($new_col_id == $j) {
                            if ($columns['is_caption'] != 1) {
                                $new_arr['columns'][$new_col_id] = $columns;
                            }
                        }
                    }
                }
            } else {
                $new_arr = $opts;
            }

            $tablestring .= "<div class='arp_allcolumnsdiv' id='arp_allcolumnsdiv' style='float:none'>";
            foreach ($opts['columns'] as $j => $column) {
                if (isset($column['is_caption']) && $column['is_caption'] == 1) {
                    $caption_column[] = 'yes';
                } else {
                    $caption_column[] = 'no';
                }
            }

            if (in_array('yes', $caption_column)) {
                $has_caption = 1;
            } else {
                $has_caption = 0;
            }
            $column_count = 1;
            foreach ($opts['columns'] as $j => $columns) {
                $columns['is_caption'] = isset($columns['is_caption']) ? $columns['is_caption'] : '';
                if ($columns['is_caption'] == 1 and $template_feature['caption_style'] == 'default') {
                    $inlinecolumnwidth = "";
                    if ($columns["column_width"] != "" && $columns['column_width'] != 0 ) {
                        $inlinecolumnwidth = 'width:' . $columns["column_width"] . 'px';
                    } else {
                        if ($column_settings['is_responsive'] != 1) {
                            $inlinecolumnwidth = $global_column_width;
                        }
                    }
                    $column_highlight = $opts['columns'][$j]['column_highlight'];
                    if ($column_highlight && $column_highlight == 1 and $is_table_preview != 2)
                        $highlighted_column = 'column_highlight';

                    $column_hide = isset($opts['columns'][$j]['column_hide']) ? $opts['columns'][$j]['column_hide'] : 0;


                    if ($columns['is_caption'] == 1 && $shadow_style == 'shadow_style_5' && ($reference_template == 'arptemplate_6' || $reference_template == 'arptemplate_9')) {
                        $shadow_style_caption = 'shadow_style_none';
                    } else {
                        $shadow_style_caption = $shadow_style;
                    }

                    $toggle_step ='';
                    if(isset($toggle_content_default_value) ){
                        $toggle_step = 'arp_toggle_column_' . ($setas_default_toggle + 1);
                    }

                    $tablestring .= "<div class='ArpPricingTableColumnWrapper no_transition  maincaptioncolumn arppricingtablecaptioncolumn " . $animation_class . " style_" . $j . " $shadow_style_caption ".$toggle_step."' data-col-id='main_".$j."' style='";
                    if ($column_settings['hide_caption_column'] && $column_settings['hide_caption_column'] == 1) {
                        $tablestring .= "display:none;";
                    } $tablestring .= $inlinecolumnwidth . "' id='main_" . $j . "'  is_caption='1' data-template_id='" . $ref_template . "' data-level='column_level_options' data-type='caption_column_buttons' >";

                    $tablestring .= '<input type="hidden" value="1" name="caption_column_0" id="caption_column">';



                    $tablestring .= "<div class='arpplan ";
                    if ($columns['is_caption'] == 1) {
                        $tablestring .= "maincaptioncolumn";
                    } else {
                        $tablestring .= $j . " ";
                    } if ($x % 2 == 0) {
                        $tablestring .= " arpdark-bg ArpPriceTablecolumndarkbg";
                    } $tablestring .= "' style='";
                    $tablestring .= "' >";
                    if ($ref_template == 'arptemplate_15' || $ref_template == 'arptemplate_23'){
                        $tablestring .= "<div class='arp_template_rocket'><div></div></div>";
                    }
                    $tablestring .= "<div class='planContainer'>";
                    $tablestring .= "<div class='arp_column_content_wrapper'>";

                    if (( $ref_template == 'arptemplate_4' || $ref_template == 'arptemplate_12') && in_array(1, $header_img))
                        $header_cls = 'has_header_code';

                    $tablestring .= $arprice_class->arp_get_column_header_part( $columns, $ref_template, $template_feature, $j, $total_tabs, $setas_default_toggle, $general_option );

                    $tablestring .= $arprice_class->arp_get_column_feature_part( $columns, $ref_template, $template_feature, $j, $total_tabs, $setas_default_toggle, $opts, $maxrowcount, $column_count, $general_option );

                    $tablestring .= $arprice_class->arp_get_column_footer_part( $columns, $ref_template, $template_feature, $j, $total_tabs, $setas_default_toggle, $general_option );

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";


                    $col_no = explode('_', $j);

                    $tablestring .= "<div class='column_level_settings' id='column_level_settings_new' data-column='main_column_0'>";
                    $tablestring .= "<div class='btn-main'>";

                        $tablestring .= "<div class='column_level_button_wrapper'>";

                            $tablestring .= "<div class='arp_btn' id='column_level_options__button_1' data-level='column_level_options' style='display:none;' title='" . esc_html__('Column Settings', 'ARPrice') . "' data-title='" . esc_html__('Column Settings', 'ARPrice') . "' ></div>";

                            if( $setact == 1 ){
                                $tablestring .= "<div class='arp_btn' id='column_level_options__button_2' data-level='column_level_options' style='display:none;' title='" . esc_html__('Background and Font Colors', 'ARPrice') . "' data-title='" . esc_html__('Background and Font Colors', 'ARPrice') . "' ></div>";
                            } else {
                                $tablestring .= "<div class='arp_btn' id='column_level_options__button_3' data-level='column_level_options' style='display:none;' title='" . esc_html__('Background and Font Colors', 'ARPrice') . "' data-title='" . esc_html__('Background and Font Colors', 'ARPrice') . "' ></div>";
                            }


                            $tablestring .= "<div class='arp_btn action_btn' col-id=" . $col_no[1] . " data-level='column_level_options' id='delete_column' style='display:none;' title='" . esc_html__('Delete Column', 'ARPrice') . "' data-title='" . esc_html__('Delete Column', 'ARPrice') . "'>";
                            

                            $tablestring .= "<div class='delete_column_container' id='delete_column_container_" . $col_no[1] . "'>";
                            $tablestring .= "<div class='delete_column_arrow'></div>";
                            $tablestring .= "<div class='delete_column_title'>";
                            $tablestring .= esc_html__('Are you sure want to delete this column?', 'ARPrice');
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='delete_column_buttons'>";
                            $tablestring .= "<button col-id='" . $col_no[1] . "' type='button' class='ribbon_insert_btn arp_delete_column_btn delete_column'>" . esc_html__('Ok', 'ARPrice') . "</button>";
                            $tablestring .= "<button col-id='" . $col_no[1] . "' type='button' class='ribbon_cancel_btn arp_cancel_delete_column_btn'>" . esc_html__('Cancel', 'ARPrice') . "</button>";
                            $tablestring .= "</div>";
                            $tablestring .= "</div>";

                            
                            $tablestring .= "</div>";

                            $tablestring .= "<div class='arp_btn debug_action_btn' col-id=" . $col_no[1] . " data-level='column_level_options' id='css_debug' style='display:none;' title='" . esc_html__('CSS Class Information', 'ARPrice') . "' data-title='" . esc_html__('CSS Class Information', 'ARPrice') . "'></div>";


                        $tablestring .= "</div>";

                        $tablestring .= "<div class='header_level_button_wrapper'>";

                            $tablestring .= "<div class='arp_btn' id='header_level_options__button_1' data-level='header_level_options' title='" . esc_html__('Header Settings', 'ARPrice') . "' data-title='" . esc_html__('Header Settings', 'ARPrice') . "' style='display:none;'></div>";

                        $tablestring .= "</div>";

                        $tablestring .= "<div class='footer_level_button_wrapper'>";

                            
                            $tablestring .= "<div class='arp_btn' id='footer_level_options__button_1' data-level='footer_level_options' title='" . esc_html__("Footer General Settings", 'ARPrice') . "' data-title='" . esc_html__("Footer General Settings", 'ARPrice') . "' style='display:none;'></div>";
                            

                        $tablestring .= "</div>";

                        $tablestring .= "<div class='body_level_button_wrapper'>";

                            $tablestring .= "<div class='arp_btn' id='body_level_options__button_1' data-level='body_level_options' style='display:none;' title='" . esc_html__('Content Settings', 'ARPrice') . "' data-title='" . esc_html__('Content Settings', 'ARPrice') . "'></div>";
                            $tablestring .= "<div class='arp_btn action_btn' id='add_new_row' data-level='body_level_options' title='" . esc_html__('Add New Row', 'ARPrice') . "' data-title='" . esc_html__('Add New Row', 'ARPrice') . "' data-id='" . $col_no[1] . "' style='display:none;'></div>";

                        $tablestring .= "</div>";

                        $tablestring .= "<div class='body_li_level_button_wrapper'>";

                            $tablestring .= "<div class='arp_btn' id='body_li_level_options__button_1' data-level='body_li_level_options' title='" . esc_html__('Description Settings', 'ARPrice') . "' data-title='" . esc_html__('Description Settings', 'ARPrice') . "' style='display:none;'></div>";
                            
                            $tablestring .= "<div class='arp_btn' id='body_li_level_options__button_2' data-level='body_li_level_options' title='" . esc_html__('Tooltip Settings', 'ARPrice') . "' data-title='" . esc_html__('Tooltip Settings', 'ARPrice') . "' style='display:none;'></div>";

                            $tablestring .= "<div class='arp_btn' id='body_li_level_options__button_3' data-level='body_li_level_options' title='" . esc_html__('CSS Properites', 'ARPrice') . "' data-title='" . esc_html__('Custom CSS Settings', 'ARPrice') . "' style='display:none;'></div>";
                            
                            $tablestring .= "<div class='arp_btn' id='body_li_level_options__button_4' data-level='body_li_level_options' title='" . esc_html__('Button Image Settings', 'ARPrice') . "' data-title='" . esc_html__('Button Image Settings', 'ARPrice') . "' style='display:none;'></div>";

                            $tablestring .= "<div class='arp_btn' id='body_li_level_options__button_5' data-level='body_li_level_options' title='" . esc_html__('Button Link/Script Settings', 'ARPrice') . "' data-title='" . esc_html__('Button Link Settings', 'ARPrice') . "' style='display:none;'></div>";
                            
                            $tablestring .= "<div class='arp_btn action_btn' id='copy_row' alt='' data-level='body_li_level_options' title='" . esc_html__('Duplicate Row', 'ARPrice') . "' data-title='" . esc_html__('Duplicate Row', 'ARPrice') . "' col-id='" . $col_no[1] . "' style='display:none;'></div>";

                            $tablestring .= "<div class='arp_btn action_btn' id='remove_row' row-id='' data-level='body_li_level_options' title='" . esc_html__('Delete Row', 'ARPrice') . "' data-title='" . esc_html__('Delete Row', 'ARPrice') . "' col-id='" . $col_no[1] . "' style='display:none;'>";
                                $tablestring .= "<div class='delete_row_container' id='delete_row_container_" . $col_no[1] . "'>";
                                    $tablestring .= "<div class='delete_row_arrow'></div>";
                                    $tablestring .= "<div class='delete_row_title'>";
                                        $tablestring .= esc_html__('Are you sure want to delete this row?', 'ARPrice');
                                    $tablestring .= "</div>";
                                    $tablestring .= "<div class='delete_row_buttons'>";
                                        $tablestring .= "<button col-id='" . $col_no[1] . "' type='button' class='ribbon_insert_btn arp_delete_row_btn delete_row' row-id=''>" . esc_html__('Ok', 'ARPrice') . "</button>";
                                        $tablestring .= "<button col-id='" . $col_no[1] . "' type='button' class='ribbon_cancel_btn arp_cancel_delete_row_btn' row-id=''>" . esc_html__('Cancel', 'ARPrice') . "</button>";
                                    $tablestring .= "</div>";
                                $tablestring .= "</div>";
                            $tablestring .= "</div>";

                            
                        $tablestring .= "</div>";
                        
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='column_level_options'>";

                    $tablestring .= "<div class='column_option_div' level-id='column_level_options__button_1' style='display:none;'>";
                    $tablestring .= "</div>";

                    

                  
                    $tablestring .= "<div class='column_option_div' level-id='column_level_options__button_2' >";
                    $tablestring .= "</div>";
                               


                    $tablestring .= "<div class='column_option_div ".$footer_btn_cls."' level-id='footer_level_options__button_1'>";
                    $tablestring .= "</div>";
                    

                    $tablestring .= "<div class='column_option_div' level-id='header_level_options__button_1' style='display:none;'>";
                    $tablestring .= "</div>";
                    
                    $tablestring .= "<div class='column_option_div' level-id='body_level_options__button_1' style='display:none;'>";
                    $tablestring .= "</div>";


                    
                    $tablestring .= "<input type='hidden' id='total_rows' value='" . count($columns['rows']) . "' name='total_rows_" . $col_no[1] . "' />";

                    $tablestring .= "<div class='column_option_div width_362' level-id='body_li_level_options__button_1' style='display:none;'>";

                    $tablestring .= "</div>";

                    

					$tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_2' style='display:none;'>";
                    $tablestring .= "</div>";

                    foreach ($columns['rows'] as $n => $row) {
                        $row_no = explode('_', $n);
                        $splitedid = explode('_', $n);
                        $tablestring .= "<style id=arp_row_css_column_" . $col_no[1] . "_row_" . $row_no[1] . " class='arp_row_custom_css'>";
                        $row_inline_script_old = isset($row['row_custom_css']) ? $row['row_custom_css'] : '';
                        $row_inline_script_old = trim($row_inline_script_old);
                        $row_inline_script_old = str_replace("/\r|\n/", "", $row_inline_script_old);
                        $row_inline_script_old = explode(';', $row_inline_script_old);
                        $row_inline_script = '';
                        if (!empty($row_inline_script_old)) {
                            foreach ($row_inline_script_old as $new_css) {
                                if ($new_css != '') {
                                    $new_css = explode(':', $new_css);
                                    $row_inline_script .= $new_css[0] . ' : ' . trim(str_replace("!important", "", $new_css[1])) . ' !important;';
                                }
                            }
                        }
                        $tablestring .= " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_transition.style_column_" . $col_no[1] . " ul.arp_opt_options li#arp_row_" . $row_no[1] . "{" . $row_inline_script;
                        $tablestring .= "}</style>";
                    }
                    
                    
					$tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_3' style='display:none;'>";
                    $tablestring .= "test CSS Propery";
                    $tablestring .= "</div>";


                    $tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_4' style='display:none;'>";
                    $tablestring .= "image ";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_5' style='display:none;'>";              
                    $tablestring .= "</div>";


                    $tablestring .= "</div>";

                    $tablestring .= "</div>";


                    $tablestring .= "</div>";

                    $x++;
                } 
                else if ($columns['is_caption'] == 1 and $template_feature['caption_style'] == 'style_1') {
                    for ($i = 0; $i <= $maxrowcount; $i++) {
                        $rows = isset($opts['columns'][$j]['rows']['row_' . $i]) ? $opts['columns'][$j]['rows']['row_' . $i] : array();
                        $caption_li[$i] = stripslashes_deep($rows['row_description']);
                    }
                } else if ($columns['is_caption'] == 1 and $template_feature['caption_style'] == 'style_2') {
                    for ($i = 0; $i <= $maxrowcount; $i++) {
                        $rows = isset($opts['columns'][$j]['rows']['row_' . $i]) ? $opts['columns'][$j]['rows']['row_' . $i] : array();
                        $caption_li[$i] = stripslashes_deep($rows['row_description']);
                    }
                }
            }
            
            

            $c = $x;
            if ($c == 0) {
                $c = $x = 1;
            }
            $new_arr = array();
            if (is_array($col_ord_arr) && count($col_ord_arr) > 0) {
                foreach ($col_ord_arr as $key => $value) {
                    $new_value = str_replace('main_', '', $value);
                    $new_col_id = $new_value;
                    foreach ($opts['columns'] as $j => $columns) {
                        if ($new_col_id == $j) {
                            if ($columns['is_caption'] != 1) {
                                $new_arr['columns'][$new_col_id] = $columns;
                            }
                        }
                    }
                }
            } else {
                $new_arr = $opts;
            }

            $counter = 1;

            foreach ($new_arr['columns'] as $j => $columns) {
                if ($columns['is_caption'] == 0) {
                    $shortcode_class = '';
                    $shortcode_class_array = $arprice_default_settings->arp_shortcode_custom_type();
                    $columns['arp_shortcode_customization_size'] = isset($columns['arp_shortcode_customization_size']) ? $columns['arp_shortcode_customization_size'] :'';
                    if (isset($columns['arp_shortcode_customization_style'])) {
                        $shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'] = isset($shortcode_class_array[$columns['arp_shortcode_customization_style']]['class']) ? $shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'] : '';
                        $shortcode_class .= $columns['arp_shortcode_customization_size'] . ' ' . $shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'];
                    }
                    $inlinecolumnwidth = "";
                    if ($columns["column_width"] != "" && $columns['column_width'] != 0 ) {
                        $inlinecolumnwidth = 'width:' . $columns["column_width"] . 'px';
                    } else {
                        if ($column_settings['is_responsive'] != 1) {
                            $inlinecolumnwidth = $global_column_width;
                        }
                    }

                    $column_highlight = $opts['columns'][$j]['column_highlight'];
                    if ($column_highlight && $column_highlight == 1 and $is_tbl_preview != 2)
                        $highlighted_column = 'column_highlight ';
                    else
                        $highlighted_column = '';

                    $column_hide = isset($opts['columns'][$j]['column_hide']) ? $opts['columns'][$j]['column_hide'] : 0;

                    $col_no = explode('_', $j);

                    $toggle_step ='';
                    if(isset($toggle_content_default_value) ){
                        $toggle_step = 'arp_toggle_column_' . ($setas_default_toggle + 1);
                    }

                    $tablestring .= "<div class='" . $highlighted_column . " ArpPricingTableColumnWrapper arpricemaincolumn no_transition style_" . $j . " " . $hover_class . " " . $animation_class . " $shadow_style ".$toggle_step."' id='main_column_" . $col_no[1] . "' data-col-id='main_column_" . $col_no[1] . "'  style='";  if ($c == 0) {
                        $tablestring .= "border-left:1px solid #DADADA;";
                    } $tablestring .= $inlinecolumnwidth . "' is_caption='0' data-order='" . $counter . "' data-template_id='" . $ref_template . "' data-level='column_level_options' data-type='other_columns_buttons' "
                            . "data-column-footer-position='{$columns['footer_content_position']}'"
                            . ">";


                    $tablestring .= "<div class='arpplan ";
                    if ($columns['is_caption'] == 1) {
                        $tablestring .= "maincaptioncolumn";
                    } else {
                        $tablestring .= "column_" . $c;
                    } if ($x % 2 == 0) {
                        $tablestring .= " arpdark-bg ArpPriceTablecolumndarkbg";
                    } $tablestring .= "'>";

                    if ($ref_template == 'arptemplate_15' || $ref_template == 'arptemplate_23'){
                        $tablestring .= "<div class='arp_template_rocket'><div></div></div>";
                    }
                    
                    if( !isset( $columns['ribbon_setting'] ) ){
                        $columns['ribbon_setting'] = array();
                    }
                    $columns['ribbon_setting']['arp_ribbon'] = isset($columns['ribbon_setting']['arp_ribbon']) ? $columns['ribbon_setting']['arp_ribbon'] : "";
                    $tablestring .= "<div class='planContainer " . $columns['ribbon_setting']['arp_ribbon'] . "'>";
                    $tablestring .= "<div class='arp_column_content_wrapper'>";
                    $header_cls = '';

                    $default_scode_position = array('arptemplate_1', 'arptemplate_12', 'arptemplate_5', 'arptemplate_11');
				    $position_scode_1 = array('arptemplate_4');
				    $position_scode_2 = array('arptemplate_3', 'arptemplate_7', 'arptemplate_8');

				    if( in_array($reference_template,$default_scode_position) ){
	                    if ($columns['arp_header_shortcode'] != ''){
	                        $header_cls = 'has_arp_shortcode';
	                    }
	                    if (isset($columns['arp_header_shortcode_second']) && $columns['arp_header_shortcode_second'] != ''){
	                        $header_cls = 'has_arp_shortcode';
	                    }
	                    if (isset($columns['arp_header_shortcode_third']) && $columns['arp_header_shortcode_third'] != ''){
	                        $header_cls = 'has_arp_shortcode';
	                    }
				    }
                    $columns_custom_ribbon_position = '';
                    if (isset($columns['ribbon_setting']) && $columns['ribbon_setting'] and $columns['ribbon_setting']['arp_ribbon'] != '' and ( $columns['ribbon_setting']['arp_ribbon_content'] != '' || $columns['ribbon_setting']['arp_ribbon_content_second'] != '' || $columns['ribbon_setting']['arp_ribbon_content_third'] != '' || $columns['ribbon_setting']['arp_custom_ribbon'] != '' || $columns['ribbon_setting']['arp_custom_ribbon_second'] || $columns['ribbon_setting']['arp_custom_ribbon'] != '' || $columns['ribbon_setting']['arp_custom_ribbon_third'])) {
                        if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6') {
                            if ($columns['ribbon_setting']['arp_ribbon_position'] == 'left') {
                                if( isset($columns['ribbon_setting']['arp_ribbon_custom_position_rl']) && $columns['ribbon_setting']['arp_ribbon_custom_position_rl'] != ""){
                                    $columns_custom_ribbon_position .= "left:{$columns['ribbon_setting']['arp_ribbon_custom_position_rl']}px;";
                                }
                            } else {
                                if( isset($columns['ribbon_setting']['arp_ribbon_custom_position_rl']) && $columns['ribbon_setting']['arp_ribbon_custom_position_rl'] != ""){
                                    $columns_custom_ribbon_position .= "right:{$columns['ribbon_setting']['arp_ribbon_custom_position_rl']}px;";
                                }
                            }
                            if( isset($columns['ribbon_setting']['arp_ribbon_custom_position_top']) && $columns['ribbon_setting']['arp_ribbon_custom_position_top'] != ""){
                                $columns_custom_ribbon_position .= "top:{$columns['ribbon_setting']['arp_ribbon_custom_position_top']}px;";
                            }
                        }
                        $basic_col = $arp_mainoptionsarr['general_options']['arp_basic_colors'];
                        $ribbon_bg_col = $columns['ribbon_setting']['arp_ribbon_bgcol'];
                        $base_color = $ribbon_bg_col;
                        $base_color_key = array_search($base_color, $basic_col);
                        $gradient_color = $arp_mainoptionsarr['general_options']['arp_basic_colors_gradient'][$base_color_key];
                        $ribbon_border_color = $arp_mainoptionsarr['general_options']['arp_ribbon_border_color'][$base_color_key];
                        if ($columns['ribbon_setting']['arp_ribbon'] != 'arp_ribbon_6') {
                            $tablestring .= "<style type='text/css' id='arp_ribbon_style_text'>";
                            if (in_array($base_color, $basic_col)) {
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_1') {
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content:before, #main_" . $j . " .arp_ribbon_content:after{";
                                    $tablestring .= "border-top-color:" . $gradient_color . " !important;";
                                    $tablestring .= "}";
                                }
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3') {
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content:before, #main_" . $j . " .arp_ribbon_content:after{";
                                    $tablestring .= "border-top-color:" . $base_color . " !important;";
                                    $tablestring .= "}";
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content{";
                                    $tablestring .= "border-top:75px solid " . $base_color . ";";
                                    $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                    $tablestring .= "}";
                                } else {
                                    if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_1') {
                                        $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .{$columns['ribbon_setting']['arp_ribbon']} .arp_ribbon_content{";
                                        $tablestring .= "background:" . $gradient_color . ";";
                                        $tablestring .= "background-color:" . $gradient_color . ";";
                                        $tablestring .= "background-image:-moz-linear-gradient(0deg," . $gradient_color . "," . $base_color . "," . $gradient_color . ");";
                                        $tablestring .= "background-image:-webkit-gradient(linear, 0 0, 0 0, color-stop(0%," . $gradient_color . "), color-stop(50%," . $base_color . "), color-stop(100%," . $gradient_color . "));";
                                        $tablestring .= "background-image:-webkit-linear-gradient(left," . $gradient_color . " 0%, " . $base_color . " 51%, " . $gradient_color . " 100%);";
                                        $tablestring .= "background-image:-o-linear-gradient(left," . $gradient_color . " 0%, " . $base_color . " 51%, " . $gradient_color . " 100%);";
                                        $tablestring .= "background-image:linear-gradient(90deg," . $gradient_color . "," . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "background-image:-ms-linear-gradient(left," . $gradient_color . "," . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='" . $base_color . "', endColorstr='" . $gradient_color . "', GradientType=1);";
                                        $tablestring .= '-ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="' . $base_color . '", endColorstr="' . $gradient_color . '", GradientType=1)";';
                                        $tablestring .= "background-repeat:repeat-x;";
                                        $tablestring .= "border-top:1px solid {$ribbon_border_color};";
                                        $tablestring .= "box-shadow:3px 1px 2px rgba(0,0,0,0.6);";
                                        $tablestring .= "-webkit-box-shadow:3px 1px 2px rgba(0,0,0,0.6);";
                                        $tablestring .= "-moz-box-shadow:3px 1px 2px rgba(0,0,0,0.6);";
                                        $tablestring .= "-o-box-shadow:3px 1px 2px rgba(0,0,0,0.6);";
                                        $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                        $tablestring .= "text-shadow:0 0 1px rgba(0,0,0,0.4);";
                                        $tablestring .= "}";
                                    } else {
                                        $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .{$columns['ribbon_setting']['arp_ribbon']} .arp_ribbon_content{";
                                        $tablestring .= "background:" . $base_color . ";";
                                        $tablestring .= "background-color:" . $base_color . ";";
                                        $tablestring .= "background-image:-moz-linear-gradient(top, " . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "background-image:-webkit-gradient(linear, 0 0, 0 100%, from(" . $base_color . "), to(" . $gradient_color . "));";
                                        $tablestring .= "background-image:-webkit-linear-gradient(top, " . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "background-image:-o-linear-gradient(top, " . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "background-image:linear-gradient(to bottom, " . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "background-repeat:repeat-x;";
                                        $tablestring .= "filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='" . $base_color . "', endColorstr='" . $gradient_color . "', GradientType=0);";
                                        $tablestring .= '-ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="' . $base_color . '", endColorstr="' . $gradient_color . '", GradientType=0)";';
                                        if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_2') {
                                            $tablestring .= "box-shadow:0 -1px 1px rgba(0,0,0,0.4);";
                                            $tablestring .= "-webkit-box-shadow:0 -1px 1px rgba(0,0,0,0.4);";
                                            $tablestring .= "-moz-box-shadow:0 -1px 1px rgba(0,0,0,0.4);";
                                            $tablestring .= "-o-box-shadow:0 -1px 1px rgba(0,0,0,0.4);";
                                        } else if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_5') {
                                            $tablestring .= "box-shadow:-2px 2px 1px rgba(0, 0, 0, 0.3);";
                                            $tablestring .= "-webkit-box-shadow:-2px 2px 1px rgba(0, 0, 0, 0.3);";
                                            $tablestring .= "-moz-box-shadow:-2px 2px 1px rgba(0, 0, 0, 0.3);";
                                            $tablestring .= "-o-box-shadow:-2px 2px 1px rgba(0, 0, 0, 0.3);";
                                        } else {
                                            $tablestring .= "box-shadow:0 0 3px rgba(0,0,0,0.3);";
                                            $tablestring .= "-webkit-box-shadow:0 0 3px rgba(0,0,0,0.3);";
                                            $tablestring .= "-moz-box-shadow:0 0 3px rgba(0,0,0,0.3);";
                                            $tablestring .= "-o-box-shadow:0 0 3px rgba(0,0,0,0.3);";
                                        }
                                        $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                        $tablestring .= "}";
                                    }
                                }
                            } else {
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_1' or $columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3') {
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content:before,#main_" . $j . " .arp_ribbon_content:after{";
                                    $tablestring .= "border-top-color:" . $base_color . "  !important;";
                                    $tablestring .= "}";
                                }
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3') {
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content{";
                                    $tablestring .= "border-top:75px solid " . $base_color . ";";
                                    $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                    $tablestring .= "}";
                                } else {
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content{";
                                    $tablestring .= "background:" . $base_color . ";";
                                    $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                    $tablestring .= "}";
                                }
                            }
                            $tablestring .= "</style>";
                        }

                        $g = 0;
                        $is_enable_toggle = $general_option['general_settings']['enable_toggle_price'];
                        foreach($total_tabs as $key => $tab_name){

                            if( $g == 0 ){
                                $ribbon_content = 'arp_ribbon_content';
                                $custom_ribbon = 'arp_custom_ribbon';
                            } else {
                                $ribbon_content = 'arp_ribbon_content_'.$tab_name[2];
                                $custom_ribbon = 'arp_custom_ribbon_'.$tab_name[2];
                            }
                            if( $is_enable_toggle ){
                                $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                            } else {
                                $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                            }

                            $ribbon_position = strtolower($columns['ribbon_setting']['arp_ribbon_position']);
                            if( (isset($columns['ribbon_setting'][$ribbon_content]) && $columns['ribbon_setting'][$ribbon_content] != '' && $columns['ribbon_setting']['arp_ribbon'] != 'arp_ribbon_6') || (isset($columns['ribbon_setting'][$custom_ribbon]) && $columns['ribbon_setting'][$custom_ribbon] != '' && $columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6') ){
                                $tablestring .= "<div id='arp_ribbon_container' class='arp_ribbon_container {$selected} toggle_step_{$tab_name[2]} arp_ribbon_{$ribbon_position} {$columns['ribbon_setting']['arp_ribbon']}' style='{$columns_custom_ribbon_position}'>";
                                    
                                    $tablestring .= "<div class='arp_ribbon_content arp_ribbon_{$ribbon_position}'>";
                                        if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3'){
                                            $tablestring .= "<span>";
                                        }
                                        if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6') {
                                            $tablestring .= "<img src='" . $columns['ribbon_setting'][$custom_ribbon] . "' />";
                                        } else {
                                            $tablestring .= $columns['ribbon_setting'][$ribbon_content];
                                        }

                                        if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3'){
                                            $tablestring .= "</span>";
                                        }
                                    $tablestring .= "</div>";

                                $tablestring .= "</div>";
                            }

                            $g++;
                        }

                        
                    }

                    $tablestring .= $arprice_class->arp_get_column_header_part($columns, $ref_template, $template_feature, $j, $total_tabs, $setas_default_toggle, $general_option);

                    $columns['column_description_second'] = isset($columns['column_description_second']) ? $columns['column_description_second'] : '';
                    $columns['column_description_third'] = isset($columns['column_description_third']) ? $columns['column_description_third'] : '';

                    if( 'position_3' == $template_feature['button_position'] ){
                        $tablestring .= "<div style='float:left;width:100%;'>";
                        $tablestring .= $arprice_class->arp_get_column_description_part( $columns, $ref_template, $template_feature, $j, $total_tabs, $setas_default_toggle, $general_option );

                        $tablestring .= $arprice_class->arp_get_column_footer_part( $columns, $ref_template, $template_feature, $j, $total_tabs, $setas_default_toggle, $general_option );
                        $tablestring .= "</div>";
                    }

                    $tablestring .= $arprice_class->arp_get_column_feature_part( $columns, $ref_template, $template_feature, $j, $total_tabs, $setas_default_toggle, $new_arr, $maxrowcount, $column_count, $general_option );


                    if ($template_feature['amount_style'] == 'style_3') {
                        $tablestring .= $arprice_class->arp_get_column_pricing_part( $columns, $ref_template, $template_feature, $j, $total_tabs, $setas_default_toggle, $general_option );
                    }

                    if ($template_feature['button_position'] == 'default') {
                        $tablestring .= $arprice_class->arp_get_column_footer_part( $columns, $ref_template, $template_feature, $j, $total_tabs, $setas_default_toggle, $general_option );
                    }

                    if ($template_feature['column_description'] == 'enable' and $template_feature['column_description_style'] == 'after_button') {
                        $tablestring .= $arprice_class->arp_get_column_description_part( $columns, $ref_template, $template_feature, $j, $total_tabs, $setas_default_toggle, $general_option );
                    }

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";


                    
                    $col_no = explode('_', $j);
                    include(PRICINGTABLE_CLASSES_DIR . '/class.arprice_preview_editor_option.php');
                    $tablestring .= "</div>";  



                    $c++;

                    if ($x % 5 == 0) {
                        $c = 1;
                    }
                    
                    $x++;
                }
                $counter++;
            }

            $tablestring .= "</div>";
        } else {
            $tablestring .= esc_html__('Please select valid table', 'ARPrice');
        }



        $tablestring .= "<div id='arp_all_font_listing' style='display:none;'>";

        $tablestring .= "<li class='arp_selectbox_option' data-value='inherit' data-label='" . esc_html__('Inherit from Theme', 'ARPrice' ) . "'>" . esc_html__('Inherit from Theme', 'ARPrice' ) . "</li>";

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . esc_html__('Default Fonts', 'ARPrice') . "</ol>";
        
        $tablestring .= $default_fonts_string;

        $tablestring .= "<ol class='arp_selectbox_group_label google_fonts_string_retrive' data-id='google_fonts_wrapper'>" . esc_html__('Google Fonts', 'ARPrice') . "</ol>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_next_div' ";
        if (!$navigation) {
            $tablestring .= "style='display:none;'";
        } $tablestring .= ">";
        $tablestring .= "<div id='arp_next_btn_" . $table_id . "' class='arp_next_btn " . $column_animation['navigation_style'] . "'></div>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";
        if (isset($column_animation['is_animation']) and $column_animation['is_animation'] == 'yes' and $is_tbl_preview != 2 and $column_animation['is_pagination'] == 1 and ( $column_animation['pagination_position'] == 'Bottom' or $column_animation['pagination_position'] == 'Both' )) {
            $tablestring .= "<div class='arp_pagination" . $column_animation['pagination_style'] . " arp_pagination_bottom' id='arp_slider_" . $id . "_pagination_bottom'></div>";
        }

        $tablestring = $arp_pricingtable->arprice_font_icon_size_parser($tablestring);
        $tablestring .='<div class="google_fonts_string_block" style="display:none;">'.$google_fonts_string.'</div>';
        return $tablestring;
    }

}
?>