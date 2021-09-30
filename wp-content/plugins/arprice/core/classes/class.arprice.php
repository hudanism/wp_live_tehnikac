<?php

class arprice {

    function __construct() {

        add_action('wp_ajax_arprice_pagination', array($this, 'arprice_pagination'));

        add_action('wp_ajax_arprice_delete', array($this, 'arprice_delete'));

        add_action('wp_ajax_arpactivatelicense', array($this, 'arpreqact'));

        add_action('wp_ajax_arpdeactlic', array($this, 'arpreqlicdeact'));

        add_action('wp_ajax_arp_send_form_data_admin',array($this,'arp_upload_image_from_admin') );

        add_filter('upgrader_pre_install', array($this, 'arp_backup'), 10, 2);

        add_action('admin_init', array($this, 'upgrade_data'));

        add_action('wp_ajax_import_old_templates', array($this, 'arp_import_old_templates'));

        add_action('wp_ajax_arp_check_table_differance', array($this,'arp_pricing_table_comparison'));

        add_action('wp_ajax_arp_import_pricing_table_data',array($this,'arp_import_pricing_table_data_callback'));

        add_action('wp_ajax_arp_fix_broken_html',array($this,'arp_fix_broken_html'));

        add_action('wp_ajax_arprice_get_sample_template_list',array($this,'arprice_get_sample_template_list'));

        add_action('wp_ajax_arprice_get_sample_template',array($this,'arprice_get_sample_template'));
		
	add_action('wp_ajax_arprenewlicense', array($this, 'arp_renew_license'));

        add_action('arp_remove_backup_data', array( $this, 'arp_remove_backup_data') );       
		
        global $arp_chk_version;
        $arp_chk_version = "check_arp_version";
    }

    public function arp_remove_backup_data(){
        global $wpdb;

        $wpdb->query( $wpdb->prepare( "DROP TABLE IF EXISTS `".$wpdb->prefix."arp_arprice_backup_v3.5`" ) );
        $wpdb->query( $wpdb->prepare( "DROP TABLE IF EXISTS `".$wpdb->prefix."arp_arprice_options_backup_v3.5`" ) );

        $wp_upload_dir = wp_upload_dir();
        $backup_dir = $wp_upload_dir['basedir'].'/arprice_backup_v35';
        if( is_dir($backup_dir) ){
            arp_rmdir( $backup_dir );
        }
    }

    public function arp_get_column_header_part( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option ){

        global $arprice_form,$arprice_default_settings;

        $default_scode_position = array('arptemplate_1', 'arptemplate_12', 'arptemplate_5', 'arptemplate_11');

        $position_scode_1 = array('arptemplate_4');

        $position_scode_2 = array('arptemplate_3', 'arptemplate_7', 'arptemplate_8');

        $header_cls = '';

        $is_enable_toggle = $general_option['general_settings']['enable_toggle_price'];

        if( in_array($ref_template_id,$default_scode_position) ){
            if (isset($columns['arp_header_shortcode']) && '' != $columns['arp_header_shortcode'] ){
                $header_cls = 'has_arp_shortcode';
            }
            if (isset($columns['arp_header_shortcode_second']) && '' != $columns['arp_header_shortcode_second'] ){
                $header_cls = 'has_arp_shortcode';
            }
            if (isset($columns['arp_header_shortcode_third']) && '' != $columns['arp_header_shortcode_third'] ){
                $header_cls = 'has_arp_shortcode';
            }
        }

        $shortcode_class = '';
        $shortcode_class_array = $arprice_default_settings->arp_shortcode_custom_type();
        $columns['arp_shortcode_customization_size'] = isset($columns['arp_shortcode_customization_size']) ? $columns['arp_shortcode_customization_size'] :'';
        if (isset($columns['arp_shortcode_customization_style'])) {
            $shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'] = isset($shortcode_class_array[$columns['arp_shortcode_customization_style']]['class']) ? $shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'] : '';
            $shortcode_class .= $columns['arp_shortcode_customization_size'] . ' ' . $shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'];
        }

        $arp_header_part = '';
        
        $arp_header_part .= "<div data-editable='true' class='arpcolumnheader ".$header_cls."'>";

            if( 'default' == $template_feature['header_shortcode_position'] && ( 'arptemplate_2' == $ref_template_id || 'arptemplate_5' == $ref_template_id || 'arptemplate_26' == $ref_template_id )  ){
                $arp_header_part .= "<div class='arp_header_selection_new' data-template_id='" . $ref_template_id . "' data-level='header_level_options' data-type='other_columns_buttons' data-column='main_" . $col_id . "'>";
            }


            if( 'position_1' == $template_feature['header_shortcode_position'] ){
                if( 'arptemplate_8' == $ref_template_id || 'arptemplate_7' == $ref_template_id ){
                    $arp_header_part .= "<div class='arp_header_selection_new' data-template_id='" . $ref_template_id . "' data-level='header_level_options' data-type='other_columns_buttons'  data-column='main_" . $col_id . "'>";
                }
                $g = 0;
                foreach( $total_tabs as $key => $tab_name ){
                    $selected = '';
                    if ($is_enable_toggle) {
                        $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                    }else{
                        $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                    }
                    $arp_header_part .= "<div class='arp_header_shortcode toggle_step_{$tab_name[2]} {$selected}'>";
                        if( $g == 0 ){
                            if( 'normal' == $template_feature['header_shortcode_type'] ){
                                $arp_header_part .= isset($columns['arp_header_shortcode']) ? $arprice_form->arp_get_video_image($columns['arp_header_shortcode']) : '';
                            } else {
                                $arp_header_part .= "<div class='rounded_corner_wrapper {$shortcode_class}'>";
                                    $arp_header_part .= "<div class='rounded_corder {$shortcode_class}'>";
                                        $arp_header_part .= isset($columns['arp_header_shortcode']) ? do_shortcode($columns['arp_header_shortcode']) : "";
                                    $arp_header_part .= "</div>";
                                $arp_header_part .= "</div>";
                            }
                        } else {
                            if( 'normal' == $template_feature['header_shortcode_type'] ){
                                $arp_header_part .= isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? $arprice_form->arp_get_video_image($columns['arp_header_shortcode_'.$tab_name[2]]) : '';
                            } else {
                                $arp_header_part .= "<div class='rounded_corner_wrapper {$shortcode_class}'>";
                                    $arp_header_part .= "<div class='rounded_corder {$shortcode_class}'>";
                                        $arp_header_part .= isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? do_shortcode($columns['arp_header_shortcode_'.$tab_name[2]]) : "";
                                    $arp_header_part .= "</div>";
                                $arp_header_part .= "</div>";
                            }
                        }
                    $arp_header_part .= "</div>";
                    $g++;
                }
            }

            if( isset($columns['is_caption']) && 1 == $columns['is_caption'] ){
                $arp_header_part .= "<div class='arpcaptiontitle' id='column_header' data-template_id='" . $ref_template_id . "' data-level='header_level_options' data-type='other_columns_buttons'  data-column='main_" . $col_id . "'>";
                $g = 0;
                foreach( $total_tabs as $key => $tab_name ){
                    $selected = '';
                    if ($is_enable_toggle) {
                        $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                    }else{
                        $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                    }
                    $arp_header_part .= "<div class='html_content_{$tab_name[2]} toggle_step_{$tab_name[2]} {$selected}'>";
                        if( 0 == $g ){
                            $arp_header_part .= isset($columns['html_content']) ? do_shortcode($columns['html_content']) : '';
                        } else {
                            $arp_header_part .= isset($columns['html_content_'.$tab_name[2]]) ? do_shortcode($columns['html_content_'.$tab_name[2]]) : '';
                        }
                    $arp_header_part .= "</div>";
                    $g++;
                }
                $arp_header_part .= "</div>";
            } else {
                $arp_header_part .= "<div class='arppricetablecolumntitle' id='column_header' data-template_id='" . $ref_template_id . "' data-level='header_level_options' data-type='other_columns_buttons' data-column='main_" . $col_id . "'>";

                    $g = 0;
                    foreach($total_tabs as $key => $tab_name){
                        
                        $selected = '';
                        if ($is_enable_toggle) {
                            $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                        }else{
                            $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                        }
                        $arp_header_part .= "<div class='bestPlanTitle package_title_" . $tab_name[2] . " toggle_step_" . $tab_name[2] ." ". $selected . "'>";
                            if( $g == 0 ){
                                $arp_header_part .= isset($columns['package_title']) ? do_shortcode($columns['package_title']) : "";
                            } else {
                                $arp_header_part .= isset($columns['package_title_'.$tab_name[2]]) ? do_shortcode($columns['package_title_'.$tab_name[2]]) : "";
                            }
                        $arp_header_part .= "</div>";
                        $g++;
                    }

                    if ( 'position_1' == $template_feature['header_shortcode_position'] && ( 'arptemplate_8' == $ref_template_id || 'arptemplate_7' == $ref_template_id )) {
                        $arp_header_part .= "</div>";
                    }

                $arp_header_part .= "</div>";

                if( 'enable' == $template_feature['column_description'] && 'style_3' == $template_feature['column_description_style'] ){
                    $arp_header_part .= $this->arp_get_column_description_part( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option );
                }

                if( 'position_2' == $template_feature['button_position'] ){
                    $arp_header_part .= $this->arp_get_column_footer_part( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option );
                }

                if( 'default' == $template_feature['header_shortcode_position'] ) {

                    if ( 'normal' == $template_feature['header_shortcode_type'] ){
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $selected = ($g == $setas_default_toggle) ? "toggle_selected active_toggle" : "";
                            $arp_header_part .= "<div class='arp_header_shortcode toggle_step_{$tab_name[2]} {$selected}'>";
                                if( $g == 0 ){
                                    if( 'arptemplate_5' == $ref_template_id) {
                                        $arp_header_part .= isset($columns['arp_header_shortcode']) ? $arprice_form->arp_get_video_image($columns['arp_header_shortcode']) : '';
                                    } else {
                                        $arp_header_part .= isset($columns['arp_header_shortcode']) ? do_shortcode($columns['arp_header_shortcode']) : '';
                                    }
                                } else {
                                    if( 'arptemplate_5' == $ref_template_id) {
                                        $arp_header_part .= isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? $arprice_form->arp_get_video_image($columns['arp_header_shortcode_'.$tab_name[2]]) : "";
                                    } else {
                                        $arp_header_part .= isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? do_shortcode($columns['arp_header_shortcode_'.$tab_name[2]]) : "";
                                    }
                                }
                            $arp_header_part .= "</div>";
                            $g++;
                        }
                    } else if ( 'rounded_border' == $template_feature['header_shortcode_type'] ) {
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $selected = ($g == $setas_default_toggle) ? "toggle_selected  active_toggle" : "";
                            
                            $arp_header_part .= "<div class='arp_rounded_{$tab_name[2]} arp_rounded_shortcode_wrapper toggle_step_{$tab_name[2]} {$selected}'>";
                            $arp_header_part .= "<div class='rounded_corner_wrapper {$shortcode_class}'>";
                            $arp_header_part .= "<div class='rounded_corder {$shortcode_class}'>";
                                if( $g == 0 ){
                                    $arp_header_part .= isset($columns['arp_header_shortcode']) ? do_shortcode($columns['arp_header_shortcode']) : '';
                                } else {
                                    $arp_header_part .= isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? do_shortcode($columns['arp_header_shortcode_'.$tab_name[2]]) : "";
                                }
                            $arp_header_part .= "</div>";
                            $arp_header_part .= "</div>";
                            $arp_header_part .= "</div>";

                            $g++;
                        }
                    }
                }

                if( 'default' == $template_feature['header_shortcode_position'] && ( 'arptemplate_2' == $ref_template_id || 'arptemplate_5' == $ref_template_id || 'arptemplate_26' == $ref_template_id )  ){
                    $arp_header_part .= "</div>";
                }

                if( 'style_3' != $template_feature['amount_style'] ){
                    $arp_header_part .= $this->arp_get_column_pricing_part( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option );
                }
            }

            if ($template_feature['header_shortcode_position'] == 'position_2') {

                $g = 0;
                foreach( $total_tabs as $key => $tab_name ){

                    $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';

                    $arp_header_part .= "<div class='arp_header_shortcode toggle_step_{$tab_name[2]} {$selected}'>";
                        if( $g == 0 ){
                            if( $template_feature['header_shortcode_type'] == 'normal' ){
                                $arp_header_part .= isset($columns['arp_header_shortcode']) ? $arprice_form->arp_get_video_image($columns['arp_header_shortcode']) : '';
                            } else {
                                $arp_header_part .= "<div class='rounded_corner_wrapper {$shortcode_class}'>";
                                    $arp_header_part .= "<div class='rounded_corder {$shortcode_class}'>";
                                        $arp_header_part .= isset($columns['arp_header_shortcode']) ? do_shortcode($columns['arp_header_shortcode']) : "";
                                    $arp_header_part .= "</div>";
                                $arp_header_part .= "</div>";
                            }
                        } else {
                            if( $template_feature['header_shortcode_type'] == 'normal' ){
                                $arp_header_part .= isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? $arprice_form->arp_get_video_image($columns['arp_header_shortcode_'.$tab_name[2]]) : '';
                            } else {
                                $arp_header_part .= "<div class='rounded_corner_wrapper {$shortcode_class}'>";
                                    $arp_header_part .= "<div class='rounded_corder {$shortcode_class}'>";
                                        $arp_header_part .= isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? do_shortcode($columns['arp_header_shortcode_'.$tab_name[2]]) : "";
                                    $arp_header_part .= "</div>";
                                $arp_header_part .= "</div>";
                            }
                        }
                    $arp_header_part .= "</div>";

                    $g++;
                }
            }

        $arp_header_part .= "</div>";

        return $arp_header_part;

    }

    public function arf_get_column_header_part_opt( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option ){
        global $arp_pricingtable, $arp_tempbuttonsarr,$arprice_form;
        $arp_header_opt = '';
        $j = $col_id;
        $ref_template = $ref_template_id;
        $arp_is_rtl = is_rtl();
        if (is_ssl()) {
            $googlefontpreviewurl = "https://www.google.com/fonts/specimen/";
        } else {
            $googlefontpreviewurl = "http://www.google.com/fonts/specimen/";
        }

        $arp_header_col_key = 'other_columns_buttons';
        if( $columns['is_caption'] ){
            $arp_header_col_key = 'caption_column_buttons';
        }
        
        $arp_header_opt .= '<div class="arp_row_temp_wrapper" data-level="header">';

            $arp_header_opt .= "<div class='edit_in_place_row' id='column_title'>";
                
                $arp_header_opt .= "<div class='col_opt_title_div' id='col_opt_title_div'>" . esc_html__('Column Title', 'ARPrice') . "</div>";
                
                $arp_header_opt .= "<div class='col_opt_input_div' id='col_opt_input_div'>";
                
                    $col_no = explode('_', $j);
                    if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options'][$arp_header_col_key]['header_level_options__button_1']) || in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options'][$arp_header_col_key]['header_level_options__button_1'])) {

                        $is_enable_toggle = $general_option['general_settings']['enable_toggle_price'];

                        $display_edit_in_place_tabs = 'display:none;';

                        if( $is_enable_toggle  ){
                            $display_edit_in_place_tabs = '';
                        }
                        $arp_header_opt .= "<div class='column_tabs' style='{$display_edit_in_place_tabs}'>";

                        $total_tabs = $arp_pricingtable->arp_toggle_step_name();

                        $g = 0;
                        foreach($total_tabs as $key => $tab_name){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }
                        
                            $arp_header_opt .= "<div class='option_title {$sel} {$tab_name[0]}' data-id='{$tab_name[1]}' id='header_{$key}_tab' data-column='{$col_no[1]}'>";
                                $arp_header_opt .= isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                            $arp_header_opt .= "</div>";
                            $g++;
                        }

                        $arp_header_opt .= "</div>";

                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ) {
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }

                            $txtarea_cls = '';
                            if( $columns['is_caption'] == 1 ){

                                $name = ($g == 0) ? 'html_content_'.$col_no[1] : 'html_content_'.$tab_name[2].'_'.$col_no[1];

                                $id = ($g == 0) ? 'column_caption_title_input' : 'column_caption_title_input_'.$tab_name[2];

                                $txtarea_cls = 'column_caption_title_input_'.$tab_name[2];

                                $package_title = isset( $columns['html_content'] ) ? $columns['html_content'] : '';

                                if( $g > 0 ){
                                    $package_title = isset($columns['html_content_'.$tab_name[2]]) ? $columns['html_content_'.$tab_name[2]] : '';
                                }

                            } else {

                                $name = ($g == 0) ? 'column_title_'.$col_no[1] : 'column_title_'.$tab_name[2].'_'.$col_no[1];
                            
                                $id = ($g == 0) ? 'column_title_input' : 'column_title_'.$tab_name[2];

                                $package_title = isset($columns['package_title']) ? $columns['package_title'] : '';

                                $txtarea_cls = 'column_title_'.$tab_name[2];
                                
                                if( $g > 0 ){
                                    $package_title = isset($columns['package_title_'.$tab_name[2]]) ? $columns['package_title_'.$tab_name[2]] : '';
                                }
                            }

                            $display = '';
                            if( $g > 0 ){
                                $display = 'display:none;';
                            }
			    
			     $column_step = $tab_name[2];

                            $arp_header_opt .= "<div class='option_tab' id='header_{$key}_tab' style='{$display}'>";
                                $arp_header_opt .= "<textarea name='{$name}' id='{$id}' data-column-step='{$column_step}' data-column='main_{$j}' class='col_opt_textarea {$txtarea_cls}'>";
                                    $arp_header_opt .= htmlspecialchars($package_title);
                                $arp_header_opt .= "</textarea>";
                            $arp_header_opt .= "</div>";
                            $g++;
                        }
                    }

                $arp_header_opt .= "</div>";

                $arp_label_btn_style = ($arp_is_rtl) ? "float:right;" : "float:left;";

                $arp_header_opt .= "<div class='col_opt_button' id='col_opt_button'>";

                    if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options'][$arp_header_col_key]['header_level_options__button_1'])) {
                        $arp_header_opt .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='column_title_input' data-column='main_" . $j . "' title='" . esc_html__('Add Media', 'ARPrice') . "' data-title='" . esc_html__('Add Media', 'ARPrice') . "'>";
                        $arp_header_opt .= "</button>";
                        $arp_header_opt .= "<label style='{$arp_label_btn_style} width:10px;'>&nbsp;</label>";
                    }

                    if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options'][$arp_header_col_key]['header_level_options__button_1'])) {

                        $arp_header_opt .= "<button type='button' class='col_opt_btn_icon arptooltipster add_header_fontawesome align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='column_title_input' data-column='main_" . $j . "' title='" . esc_html__('Add Font Icon', 'ARPrice') . "' data-title='" . esc_html__('Add Font Icon', 'ARPrice') . "' >";
                        $arp_header_opt .= "</button>";

                        $arp_header_opt .= "<div class='arp_font_awesome_model_box_container'>";

                        $arp_header_opt .= "</div>";
                    }
                    foreach ($total_tabs as $key => $tab_name) {
                        $arp_header_opt .= "<div class='arp_add_image_container'>";
                            $arp_header_opt .= "<div class='arp_add_image_arrow'></div>";

                            $arp_header_opt .= "<div class='arp_add_img_content'>";

                                $arp_header_opt .= "<div class='arp_add_img_row'>";
                                    $arp_header_opt .= "<div class='arp_add_img_label'>";
                                        $arp_header_opt .= esc_html__('Image URL', 'ARPrice');
                                        $arp_header_opt .= "<span class='arp_model_close_btn' id='arp_add_image_container_".$tab_name[2]."'><i class='fas fa-times'></i></span>";
                                    $arp_header_opt .= "</div>";
                                    $arp_header_opt .= "<div class='arp_add_img_option'>";
                                        $arp_header_opt .= "<input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url_".$tab_name[2]."' name='arp_header_image_url' />";
                                        $arp_header_opt .= "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
                                            $arp_header_opt .= esc_html__('Add File', 'ARPrice');
                                        $arp_header_opt .= "</button>";
                                    $arp_header_opt .= "</div>";
                                $arp_header_opt .= "</div>";

                                $arp_header_opt .= "<div class='arp_add_img_row'>";
                                    $arp_header_opt .= "<div class='arp_add_img_label'>";
                                        $arp_header_opt .= esc_html__('Dimension ( height X width )', 'ARPrice');
                                    $arp_header_opt .= "</div>";
                                    $arp_header_opt .= "<div class='arp_add_img_option'>";
                                        $arp_header_opt .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_height_".$tab_name[2]."' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>";
                                        $arp_header_opt .= "<label>x</label>";
                                        $arp_header_opt .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_width_".$tab_name[2]."' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>";
                                    $arp_header_opt .= "</div>";
                                $arp_header_opt .= "</div>";

                                $arp_header_opt .= "<div class='arp_add_img_row' style='margin-top:10px;'>";
                                    $arp_header_opt .= "<div class='arp_add_img_label'>";
                                        $arp_header_opt .= '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn_'.$tab_name[2].'">';
                                            $arp_header_opt .= esc_html__('Add', 'ARPrice');
                                        $arp_header_opt .= '</button>';
                                        $arp_header_opt .= '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn_'.$tab_name[2].'">';
                                            $arp_header_opt .= esc_html__('Remove', 'ARPrice');
                                        $arp_header_opt .= '</button>';
                                    $arp_header_opt .= "</div>";
                                $arp_header_opt .= "</div>";

                            $arp_header_opt .= "</div>";
                        $arp_header_opt .= "</div>";
                    }

                $arp_header_opt .= "</div>";
            $arp_header_opt .= "</div>";

            $header_text_align = isset($columns['header_font_align']) ? $columns['header_font_align'] : 'center';

            if( in_array('header_text_alignment', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options'][$arp_header_col_key]['header_level_options__button_1']) ){
                $arp_header_opt .= $arprice_form->arp_create_alignment_div('header_text_alignment', $header_text_align, 'arp_header_text_alignment', $col_no[1], 'header_section',true);
            }

            if( in_array('header_other_background_image', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options'][$arp_header_col_key]['header_level_options__button_1']) ){
                $arp_header_opt .= "<div class='edit_in_place_row' id='header_other_background_image'>";
                    $arp_header_opt .= "<div class='col_opt_title_div two_column'>" . esc_html__('Background Image', 'ARPrice') . "</div>";
                    $arp_header_opt .= "<div class='col_opt_input_div two_column'>";
                        $arp_header_opt .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='arp_header_background_image_" . $col_no[1] . "' id='arp_header_background_image' data-insert='arp_header_background_image_input' data-column='main_" . $j . "' title='" . esc_html__('Add Header Background Image', 'ARPrice') . "' data-title='" . esc_html__('Add Header Background Image', 'ARPrice') . "' style='float:right;'></button>";
                        $columns['header_background_image'] = isset($columns['header_background_image']) ? $columns['header_background_image'] : '';
                        $arp_header_opt .= "<input type='hidden' name='arp_header_background_image_" . $col_no[1] . "' value='" . isset($columns['header_background_image']) ? $columns['header_background_image'] : '' . "' id='arp_header_background_image_input' />";

                        foreach ($total_tabs as $key => $tab_name) {
                            $arp_header_opt .= "<div class='arp_add_image_container arp_header_image_container'>";
                                $arp_header_opt .= "<div class='arp_add_image_arrow'></div>";
                                $arp_header_opt .= "<div class='arp_add_img_content'>";

                                    $arp_header_opt .= "<div class='arp_add_img_row'>";
                                        $arp_header_opt .= "<div class='arp_add_img_label'>";
                                            $arp_header_opt .= esc_html__('Image URL', 'ARPrice');
                                            $arp_header_opt .= "<span class='arp_model_close_btn' id='arp_add_image_container_".$tab_name[2]."'><i class='fas fa-times'></i></span>";
                                        $arp_header_opt .= "</div>";
                                        $arp_header_opt .= "<div class='arp_add_img_option'>";
                                            $arp_header_opt .= "<input type='text' value='" . $columns['header_background_image'] . "' class='arp_modal_txtbox img' id='arp_header_image_url_headbackground_".$tab_name[2]."' name='arp_header_image_url' />";
                                            $arp_header_opt .= "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
                                                $arp_header_opt .= esc_html__('Add File', 'ARPrice');
                                            $arp_header_opt .= "</button>";
                                        $arp_header_opt .= "</div>";
                                    $arp_header_opt .= "</div>";

                                    $arp_header_opt .= "<div class='arp_add_img_row' style='margin-top:10px;'>";
                                        $arp_header_opt .= "<div class='arp_add_img_label'>";
                                            $arp_header_opt .= '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn_'.$tab_name[2].'">';
                                                $arp_header_opt .= esc_html__('Add', 'ARPrice');
                                            $arp_header_opt .= '</button>';
                                        $arp_header_opt .= "</div>";
                                    $arp_header_opt .= "</div>";

                                $arp_header_opt .= "</div>";
                            $arp_header_opt .= "</div>";
                        }
                    $arp_header_opt .= "</div>";

                    $remove_link = "display:none;";
                    if ($columns['header_background_image'] != '') {
                        $remove_link = "";
                    }

                    $arp_header_opt .= "<div class='arp_google_font_preview_note' id='arp_remove_header_image_link' style='$remove_link'>";
                        $arp_header_opt .= "<a href='javascript:arp_remove_object(\"main_column_" . $col_no[1] . "\",\"arp_header_background_image_input\")'  class='arp_google_font_preview_link' id='remove_header_image_link'>";
                            $arp_header_opt .= esc_html__('Remove Image', 'ARPrice');
                        $arp_header_opt .= "</a>";
                    $arp_header_opt .= "</div>";
                $arp_header_opt .= "</div>";
            }

            if( in_array('header_caption_font_family', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options'][$arp_header_col_key]['header_level_options__button_1'] ) ){
                $arp_header_opt .= "<div class='edit_in_place_row' id='header_other_font_family'>";
                    $arp_header_opt .= "<div class='col_opt_title_div'>" . esc_html__('Font Family', 'ARPrice') . "</div>";
                    $arp_header_opt .= "<div class='col_opt_input_div'>";

                        $arp_header_opt .= "<input type='hidden' id='header_font_family' name='header_font_family_" . $col_no[1] . "' value='" . $columns['header_font_family'] . "' data-column='main_" . $j . "' />";
                        $arp_header_opt .= "<dl class='arp_selectbox column_level_dd' data-name='header_font_family_" . $col_no[1] . "' data-id='header_font_family_" . $col_no[1] . "'>";
                            $arp_header_opt .= "<dt><span>" . $columns['header_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['header_font_family'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
                            $arp_header_opt .= "<dd>";
                                $arp_header_opt .= "<ul data-id='header_font_family' data-column='" . $j . "'>";

                                $arp_header_opt .= "</ul>";
                            $arp_header_opt .= "</dd>";
                        $arp_header_opt .= "</dl>";
                        $gf_prev_id = 'arp_header_font_family_preview';
                        if( $columns['is_caption'] == 1 ){
                            $gf_prev_id = 'arp_caption_header_font_family_preview';
                        }
                        $arp_header_opt .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='{$gf_prev_id}' href='" . $googlefontpreviewurl . $columns['header_font_family'] . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>";

                    $arp_header_opt .= "</div>";
                $arp_header_opt .= "</div>";
            }

            if( in_array('header_caption_font_size', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options'][$arp_header_col_key]['header_level_options__button_1'] ) ){
                $arp_header_opt .= "<div class='edit_in_place_row' id='header_other_font_size'>";
                    $arp_header_opt .= "<div class='btn_type_size'>";
                        $arp_header_opt .= "<div class='col_opt_title_div two_column'>" . esc_html__('Font Size', 'ARPrice') . "</div>";
                        $arp_header_opt .= "<div class='col_opt_input_div two_column'>";

                            $arp_header_opt .= "<input type='hidden' id='header_font_size' name='header_font_size_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['header_font_size'] . "' />";
                            $arp_header_opt .= "<dl class='arp_selectbox column_level_size_dd' data-name='header_font_size_" . $col_no[1] . "' data-id='header_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
                                $arp_header_opt .= "<dt><span>" . $columns['header_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['header_font_size'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
                                $arp_header_opt .= "<dd>";
                                    $arp_header_opt .= "<ul data-id='header_font_size' data-column='" . $j . "'>";
                                        $size_arr = array();
                                        for ($s = 8; $s <= 20; $s++){
                                            $size_arr[] = $s;
                                        }
                                        for ($st = 22; $st <= 70; $st+=2){
                                            $size_arr[] = $st;
                                        }
                                        foreach ($size_arr as $size) {
                                            $arp_header_opt .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
                                        }
                                    $arp_header_opt .= "</ul>";
                                $arp_header_opt .= "</dd>";
                            $arp_header_opt .= "</dl>";
                        $arp_header_opt .= "</div>";
                    $arp_header_opt .= "</div>";
                $arp_header_opt .= "</div>";
            }

            if( in_array('header_caption_font_style', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options'][$arp_header_col_key]['header_level_options__button_1'] ) ){
                $arp_header_opt .= "<div class='edit_in_place_row' id='header_other_font_color'>";
                    $arp_header_opt .= "<div class='col_opt_title_div two_column'>" . esc_html__('Font Style', 'ARPrice') . "</div>";
                    $arp_header_opt .= "<div class='col_opt_input_div' data-level='header_level_options' level-id='header_button1' >";
                        if ($columns['header_style_bold'] == 'bold') {
                            $header_style_bold_selected = 'selected';
                        } else {
                            $header_style_bold_selected = '';
                        }

                        if ($columns['header_style_italic'] == 'italic') {
                            $header_style_italic_selected = 'selected';
                        } else {
                            $header_style_italic_selected = '';
                        }

                        if ($columns['header_style_decoration'] == 'underline') {
                            $header_style_underline_selected = 'selected';
                        } else {
                            $header_style_underline_selected = '';
                        }

                        if ($columns['header_style_decoration'] == 'line-through') {
                            $header_style_linethrough_selected = 'selected';
                        } else {
                            $header_style_linethrough_selected = '';
                        }

                        $arp_header_opt .= "<div class='arp_style_btn " . $header_style_bold_selected . "  arptooltipster' data-align='left' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
                            $arp_header_opt .= "<i class='fas fa-bold'></i>";
                        $arp_header_opt .= "</div>";

                        $arp_header_opt .= "<div class='arp_style_btn " . $header_style_italic_selected . " arptooltipster' data-align='center' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
                            $arp_header_opt .= "<i class='fas fa-italic'></i>";
                        $arp_header_opt .= "</div>";

                        $arp_header_opt .= "<div class='arp_style_btn " . $header_style_underline_selected . " arptooltipster' data-align='right' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
                            $arp_header_opt .= "<i class='fas fa-underline'></i>";
                        $arp_header_opt .= "</div>";

                        $arp_header_opt .= "<div class='arp_style_btn " . $header_style_linethrough_selected . " arptooltipster' data-align='right' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
                            $arp_header_opt .= "<i class='fas fa-strikethrough'></i>";
                        $arp_header_opt .= "</div>";

                        $arp_header_opt .= "<input type='hidden' id='header_style_bold' name='header_style_bold_" . $col_no[1] . "' value='" . $columns['header_style_bold'] . "' /> ";
                        $arp_header_opt .= "<input type='hidden' id='header_style_italic' name='header_style_italic_" . $col_no[1] . "' value='" . $columns['header_style_italic'] . "' /> ";
                        $arp_header_opt .= "<input type='hidden' id='header_style_decoration' name='header_style_decoration_" . $col_no[1] . "' value='" . $columns['header_style_decoration'] . "' /> ";

                    $arp_header_opt .= "</div>";
                $arp_header_opt .= "</div>";
            }


            $arp_header_opt .= "<div class='edit_in_place_row arp_ok_div width_342' id='header_level_other_arp_ok_div__button_1'>";
                $arp_header_opt .= "<div class='col_opt_btn_div'>";
                    
                    $arp_header_opt .= "<button type='button' id='arp_ok_btn' data-level='header' class='col_opt_btn arp_ok_btn_edit_in_place' >";
                        $arp_header_opt .= esc_html__('Ok', 'ARPrice');
                    $arp_header_opt .= "</button>";
                $arp_header_opt .= "</div>";
            $arp_header_opt .= "</div>";

        $arp_header_opt .= '</div>';

        return $arp_header_opt;
    }

    public function arp_get_column_pricing_part( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option ){
        global $arprice_default_settings;
        $arp_pricing_part = '';

        $shortcode_class = '';
        $is_enable_toggle = $general_option['general_settings']['enable_toggle_price'];
        $shortcode_class_array = $arprice_default_settings->arp_shortcode_custom_type();
        $columns['arp_shortcode_customization_size'] = isset($columns['arp_shortcode_customization_size']) ? $columns['arp_shortcode_customization_size'] :'';
        if (isset($columns['arp_shortcode_customization_style'])) {
            $shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'] = isset($shortcode_class_array[$columns['arp_shortcode_customization_style']]['class']) ? $shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'] : '';
            $shortcode_class .= $columns['arp_shortcode_customization_size'] . ' ' . $shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'];
        }

        $amount_style_cls = '';
        if ( 'style_2' == $template_feature['amount_style'] ){
            $amount_style_cls = 'style_2';
        }

        $column_bgi_class = '';
        if( !empty($columns['column_background_image']) && 'arptemplate_21' == $columns['column_background_image'] ){
            $column_bgi_class = ' hide_col_bg_img ';
        }

        $temp_css_3 = '';
        

        $arp_pricing_part .= "<div class='arppricetablecolumnprice $column_bgi_class" . ( isset($amount_style_cls) ? $amount_style_cls : "" ) . "' data-column='main_" . $col_id . "' data-template_id='" . $ref_template_id . "' data-editable='true' data-level='pricing_level_options' data-type='other_columns_buttons' style='".$temp_css_3."'>";

            if( 'default' == $template_feature['amount_style'] ){
                if( 'arptemplate_4' == $ref_template_id ){
                    $arp_pricing_part .="<div class='rounded_corner_wrapper $shortcode_class' data-column='main_" . $col_id . "' data-template_id='" . $ref_template_id . "' data-level='pricing_level_options' data-type='other_columns_buttons'>";
                    $arp_pricing_part .= "<div class='arp_price_wrapper rounded_corder $shortcode_class' >";
                } else {
                    $arp_pricing_part .= "<div class='arp_price_wrapper'>";
                }

                $g = 0;
                foreach( $total_tabs as $key => $tab_name ){
                    $selected = '';
                    if ($is_enable_toggle) {
                        $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                    }else{
                        $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                    }
                    
                    $arp_pricing_part .= "<span class='price_text_{$tab_name[2]}_step toggle_step_{$tab_name[2]} {$selected}'>";
                        if( $g == 0 ){
                            $arp_pricing_part .= isset($columns['price_text']) ? do_shortcode($columns['price_text']) : '';
                        } else {
                            $arp_pricing_part .= isset($columns['price_text_'.$tab_name[3].'_step']) ? do_shortcode($columns['price_text_'.$tab_name[3].'_step']) : "";
                        }
                    $arp_pricing_part .= "</span>";

                    $g++;
                }

                $arp_pricing_part .= "</div>";
                if ( 'arptemplate_4' == $ref_template_id) {
                    $arp_pricing_part .= "</div>";
                }
                $arp_pricing_part .= isset($columns['html_content']) ? $columns['html_content'] : "";
            } else if ( 'style_1' == $template_feature['amount_style'] ){
                $arp_pricing_part .= "<div class='arp_pricename' data-column='main_" . $col_id . "' data-template_id='" . $ref_template_id . "' data-type='other_columns_buttons' data-level='pricing_level_options'>";
                    $arp_pricing_part .= "<div class='arp_price_wrapper' data-column='main_" . $col_id . "' data-template_id='" . $ref_template_id . "' data-type='other_columns_buttons' data-level='pricing_level_options' >";
                    
                    $g = 0;
                    foreach( $total_tabs as $key => $tab_name ){
                        $selected = '';
                        if ($is_enable_toggle) {
                            $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                        }else{
                            $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                        }
                        
                        $arp_pricing_part .= "<span class='price_text_{$tab_name[2]}_step toggle_step_{$tab_name[2]} {$selected}'>";
                            if( $g == 0 ){
                                $arp_pricing_part .= isset($columns['price_text']) ? do_shortcode($columns['price_text']) : '';
                            } else {
                                $arp_pricing_part .= isset($columns['price_text_'.$tab_name[3].'_step']) ? do_shortcode($columns['price_text_'.$tab_name[3].'_step']) : "";
                            }
                        $arp_pricing_part .= "</span>";

                        $g++;
                    }

                    $arp_pricing_part .= "</div>";
                $arp_pricing_part .= "</div>";
                $columns['html_content'] = isset($columns['html_content']) ? $columns['html_content'] : "";
                $arp_pricing_part .= do_shortcode($columns['html_content']);
            } else if( 'style_2' == $template_feature['amount_style'] ){
                $arp_pricing_part .= "<div class='arp_price_wrapper'>";
                if ($ref_template_id == 'arptemplate_11') {
                    $arp_pricing_part .= "<div class='arp_pricename_selection_new' data-column='main_" . $col_id . "' data-template_id='" . $ref_template_id . "' data-level='pricing_level_options' data-type='other_columns_buttons'>";
                }

                $g = 0;
                foreach( $total_tabs as $key => $tab_name ){
                    $selected = '';
                    if ($is_enable_toggle) {
                        $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                    }else{
                        $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                    }
                    
                    $arp_pricing_part .= "<span class='price_text_{$tab_name[2]}_step toggle_step_{$tab_name[2]} {$selected}'>";
                        if( $g == 0 ){
                            $arp_pricing_part .= isset($columns['price_text']) ? do_shortcode($columns['price_text']) : '';
                        } else {
                            $arp_pricing_part .= isset($columns['price_text_'.$tab_name[3].'_step']) ? do_shortcode($columns['price_text_'.$tab_name[3].'_step']) : "";
                        }
                    $arp_pricing_part .= "</span>";

                    $g++;
                }

                if ($ref_template_id == 'arptemplate_11') {
                    $arp_pricing_part .= "</div>";
                }
                $arp_pricing_part .= "</div>";
                $columns['html_content'] = isset($columns['html_content']) ? $columns['html_content'] : "";
                $arp_pricing_part .= do_shortcode($columns['html_content']);
            } else if( 'style_3' == $template_feature['amount_style'] ){
                $arp_pricing_part .= "<div class='arp_price_wrapper' data-column='main_" . $col_id . "'>";
                $g = 0;
                foreach($total_tabs as $key => $tab_name){
                    $selected = '';
                    if ($is_enable_toggle) {
                        $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                    }else{
                        $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                    }

                    $arp_pricing_part .= "<span class='price_text_{$tab_name[2]}_step toggle_step_{$tab_name[2]} {$selected}'>";

                    if( $g == 0 ){
                        $arp_pricing_part .= isset($columns['price_text']) ? $columns['price_text'] : "";
                    } else {
                        $arp_pricing_part .= isset($columns['price_text_'.$tab_name[3].'_step']) ? $columns['price_text_'.$tab_name[3].'_step'] : "";
                    }

                    $arp_pricing_part .= "</span>";
                    $g++;
                }
                $arp_pricing_part .= "</div>";
                $columns['html_content'] = isset($columns['html_content']) ? $columns['html_content'] : "";
                $arp_pricing_part .= do_shortcode($columns['html_content']);
            }

            if( 'enable' == $template_feature['column_description'] && ('style_2' == $template_feature['column_description_style'] || 'style_4' == $template_feature['column_description_style'] ) ){
                $arp_pricing_part .= $this->arp_get_column_description_part( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option );
            }

            if( 'position_1' == $template_feature['button_position'] || 'position_4' == $template_feature['button_position'] ){
                $arp_pricing_part .= $this->arp_get_column_footer_part( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option );
            }

        $arp_pricing_part .= "</div>";

        return $arp_pricing_part;
    }

    function arf_get_column_pricing_part_opt( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option ){
        global $arp_pricingtable,$arp_tempbuttonsarr,$arprice_default_settings;

        $arp_pricing_part = '';

        $j = $col_id;
        $col_no = explode('_',$j);
        $template_type = $general_option['template_setting']['template_type'];
        $ref_template = $ref_template_id;
        $reference_template = $ref_template_id;
        $arp_is_rtl = is_rtl();
        $arp_label_btn_style = ($arp_is_rtl) ? "float:right;" : "float:left;";
        if (is_ssl()) {
            $googlefontpreviewurl = "https://www.google.com/fonts/specimen/";
        } else {
            $googlefontpreviewurl = "http://www.google.com/fonts/specimen/";
        }

        $arp_pricing_part .= '<div class="arp_row_temp_wrapper" data-level="pricing">';

            $arp_pricing_part .= "<div class='edit_in_place_row' id='price_text'>";
                $arp_pricing_part .= "<div class='col_opt_title_div'>" . esc_html__('Price Text', 'ARPrice') . "</div>";
                $arp_pricing_part .= "<div class='col_opt_input_div width_342'>";
                    if ($template_type == 'normal') {
                        $col_opt_txtarea_cls = 'col_opt_textarea_big';
                        $arp_price_yearly_text_tab_id = 'price_yearly_tab';
                        $arp_price_monthly_text_tab_id = 'price_monthly_tab';
                        $arp_price_quarterly_text_tab_id = 'price_quarterly_tab';
                    } else {
                        $col_opt_txtarea_cls = '';
                        $arp_price_yearly_text_tab_id = 'price_yearly_value_tab';
                        $arp_price_monthly_text_tab_id = 'price_monthly_value_tab';
                        $arp_price_quarterly_text_tab_id = 'price_quarterly_value_tab';
                    }

                    $is_enable_toggle = $general_option['general_settings']['enable_toggle_price'];

                    $display_edit_in_place_tabs = 'display:none;';

                    if( $is_enable_toggle  ){
                        $display_edit_in_place_tabs = '';
                    }
                    $arp_pricing_part .= "<div class='column_tabs' style='{$display_edit_in_place_tabs}'>";
                        $total_tabs = $arp_pricingtable->arp_toggle_step_name();
                        $g = 0;
                        foreach($total_tabs as $key => $tab_name){
                            $sel = '';

                            if( $g == 0 ){
                                $sel = 'selected';
                            }
                            
                            if( $template_type== 'normal' ){
                                $price_id = 'price_'.$key.'_tab';
                            } else {
                                $price_id = 'price_'.$key.'_value_tab';
                            }
                
                            $arp_pricing_part .= "<div class='option_title {$sel} {$tab_name[0]}' data-id='{$tab_name[1]}' id='{$price_id}' data-column='{$col_no[1]}'>";
                                $arp_pricing_part .= isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                            $arp_pricing_part .= "</div>";
                            $g++;
                        }
                    $arp_pricing_part .= "</div>";

                    $g = 0;
                    foreach($total_tabs as $key => $tab_name){
                        $sel = '';
                        if( $g == 0 ){
                            $sel = 'selected';
                        }

                        $name = ($g == 0) ? 'price_text_'.$col_no[1] : 'price_text_'.$tab_name[3].'_step_'.$col_no[1];

                        $id = ($g == 0) ? 'price_text_input' : 'price_text_'.$tab_name[3].'_step';

                        $price_text = isset($columns['price_text']) ? $columns['price_text'] : '';

                        if( $g > 0 ){
                            $price_text = isset($columns['price_text_'.$tab_name[3].'_step']) ? $columns['price_text_'.$tab_name[3].'_step'] : '';
                        }

                        $display = '';
                        if( $g > 0 ){
                            $display = 'display:none;';
                        }

                        if( $template_type == 'normal' ){
                            $div_id = 'price_'.$key.'_tab';
                        } else {
                            $div_id = 'price_'.$key.'_value_tab';
                        }

                        $arp_pricing_part .= "<div class='option_tab' id='{$div_id}' style='{$display}'>";
                            $arp_pricing_part .= "<textarea name='{$name}' id='{$id}' data-column-step='{$tab_name[2]}' data-column='main_{$j}' class='col_opt_textarea price_text_{$tab_name[3]}_step {$col_opt_txtarea_cls}'>";
                                $arp_pricing_part .= htmlspecialchars($price_text);
                            $arp_pricing_part .= "</textarea>";
                        $arp_pricing_part .= "</div>";
                        $g++;
                    }

                    if ($template_type == 'normal') {
                        $col_opt_txtarea_cls = 'col_opt_textarea_big';
                    } else {
                        $col_opt_txtarea_cls = '';
                    }

                    $arp_pricing_part .= "<div class='option_tab' id='price_monthly_value_tab' style='display:none;'>";

                        $arp_pricing_part .= "<textarea id='price_text_two_step_only_price' name='price_text_input_two_step_price_" . $col_no[1] . "' class='col_opt_textarea " . $col_opt_txtarea_cls . " price_text_two_step_only_price' data-column='main_" . $j . "' style='min-height:60px;max-width:100%;width:100%;margin-bottom:10px;'>";
                        $arp_pricing_part .= isset($columns['price_text_input_two_step_price']) ? htmlspecialchars($columns['price_text_input_two_step_price']) : '';
                        $arp_pricing_part .= "</textarea>";

                    $arp_pricing_part .= "</div>";

                    if ($template_type == 'normal') {
                        $col_opt_txtarea_cls = 'col_opt_textarea_big';
                    } else {
                        $col_opt_txtarea_cls = '';
                    }

                    $arp_pricing_part .= "<div class='option_tab' id='price_quarterly_value_tab' style='display:none;'>";
                        $arp_pricing_part .= "<textarea id='price_text_three_step_only_price' name='price_text_input_three_step_price_" . $col_no[1] . "' class='col_opt_textarea " . $col_opt_txtarea_cls . " price_text_three_step_only_price' data-column='main_" . $j . "' style='min-height:60px;max-width:100%;width:100%;margin-bottom:10px;'>";
                            $arp_pricing_part .= isset($columns['price_text_input_three_step_price']) ? htmlspecialchars($columns['price_text_input_three_step_price']) : '';
                        $arp_pricing_part .= "</textarea>";
                    $arp_pricing_part .= "</div>";

                    if (isset($column_settings['toggle_column_animation']) && $column_settings['toggle_column_animation'] == 1) {
                        $arp_style = 'display: block;';
                    } else {
                        $arp_style = 'display: none;';
                    }

                    $arp_pricing_part .= "<div class='arp_toogle_price_note' id='arp_toogle_price_note' style='" . $arp_style . "'>" . sprintf( esc_html__('Use class %s for price animation. It will only work with numbers. If you have the price with comma(,) as a decimal separator then add %s class in the span tag.', 'ARPrice'), '<b>arp_price_amount</b>', '<b>arp_comma_decimal</b>') . "</div>";
                    $arp_pricing_part .= "<div class='col_opt_button'>";

                        $arp_pricing_font_awesome_icon = "arp_single_icon_arrow";

                        if($ref_template != 'arptemplate_25'){
                            if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {
                                $arp_pricing_part .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='price_text_input' data-column='main_" . $j . "' title='" . esc_html__('Add Media', 'ARPrice') . "' data-title='" . esc_html__('Add Media', 'ARPrice') . "'>";
                                $arp_pricing_part .= "</button>";
                                $arp_pricing_part .= "<label style='{$arp_label_btn_style} width:10px;'>&nbsp;</label>";
                                $arp_pricing_font_awesome_icon = "";
                            }

                            if ( isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {

                                $arp_pricing_part .= "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='price_text_input' data-column='main_" . $j . "' title='" . esc_html__('Add Font Icon', 'ARPrice') . "' data-title='" . esc_html__('Add Font Icon', 'ARPrice') . "' >";
                                $arp_pricing_part .= "</button>";

                                $arp_pricing_part .= "<div class='arp_font_awesome_model_box_container'>";

                                $arp_pricing_part .= "</div>";
                            }
                        }

                        foreach ($total_tabs as $key => $tab_name) {
                            $arp_pricing_part .= "<div class='arp_add_image_container'>";
                                $arp_pricing_part .= "<div class='arp_add_image_arrow'></div>";
                                $arp_pricing_part .= "<div class='arp_add_img_content'>";

                                    $arp_pricing_part .= "<div class='arp_add_img_row'>";
                                        
                                        $arp_pricing_part .= "<div class='arp_add_img_label'>";
                                            $arp_pricing_part .= esc_html__('Image URL', 'ARPrice');
                                            $arp_pricing_part .= "<span class='arp_model_close_btn' id='arp_add_image_container_".$tab_name[2]."'><i class='fas fa-times'></i></span>";
                                        $arp_pricing_part .= "</div>";
                                        
                                        $arp_pricing_part .= "<div class='arp_add_img_option'>";
                                            $arp_pricing_part .= "<input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url_".$tab_name[2]."' name='arp_header_image_url' />";
                                            $arp_pricing_part .= "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
                                                $arp_pricing_part .= esc_html__('Add File', 'ARPrice');
                                            $arp_pricing_part .= "</button>";
                                        $arp_pricing_part .= "</div>";

                                    $arp_pricing_part .= "</div>";

                                    $arp_pricing_part .= "<div class='arp_add_img_row'>";
                                        $arp_pricing_part .= "<div class='arp_add_img_label'>";
                                            $arp_pricing_part .= esc_html__('Dimension ( height X width )', 'ARPrice');
                                        $arp_pricing_part .= "</div>";
                                        $arp_pricing_part .= "<div class='arp_add_img_option'>";
                                            $arp_pricing_part .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_height_".$tab_name[2]."' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>";
                                            $arp_pricing_part .= "<label>x</label>";
                                            $arp_pricing_part .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_width_".$tab_name[2]."' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>";
                                        $arp_pricing_part .= "</div>";
                                    $arp_pricing_part .= "</div>";

                                    $arp_pricing_part .= "<div class='arp_add_img_row' style='margin-top:10px;'>";
                                        $arp_pricing_part .= "<div class='arp_add_img_label'>";
                                            $arp_pricing_part .= '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn_'.$tab_name[2].'">';
                                                $arp_pricing_part .= esc_html__('Add', 'ARPrice');
                                            $arp_pricing_part .= '</button>';
                                            $arp_pricing_part .= '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn_'.$tab_name[2].'">';
                                                $arp_pricing_part .= esc_html__('Remove', 'ARPrice');
                                            $arp_pricing_part .= '</button>';
                                        $arp_pricing_part .= "</div>";
                                    $arp_pricing_part .= "</div>";

                                $arp_pricing_part .= "</div>";
                            $arp_pricing_part .= "</div>";
                        }

                    $arp_pricing_part .= "</div>";
                $arp_pricing_part .= "</div>";
            $arp_pricing_part .= "</div>";

            if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_shortcode_customization_style_div', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {
                $arprice_customization_style = $arprice_default_settings->arp_shortcode_custom_type();
                if ($reference_template == 'arptemplate_26') {
                    unset($arprice_customization_style['none']);
                }
                $arp_pricing_part .= "<div class='col_opt_row width_342' id='arp_shortcode_customization_style_div'>";
                    $arp_pricing_part .= "<div class='col_opt_title_div' style='width : 20%;margin-top:6px;'>" . esc_html__('Style', 'ARPrice') . "</div>";
                    $float_style = ($arp_is_rtl) ? "float:left;" : "float:right;";
                    $arp_pricing_part .= "<div class='col_opt_input_div' style='width : 58%;{$float_style}'>";

                        $columns['arp_shortcode_customization_style'] = isset($columns['arp_shortcode_customization_style']) ? $columns['arp_shortcode_customization_style'] :'';
                        
                        $arprice_customization_style[$columns['arp_shortcode_customization_style']]['name'] = isset($arprice_customization_style[$columns['arp_shortcode_customization_style']]['name']) ? $arprice_customization_style[$columns['arp_shortcode_customization_style']]['name'] : '';

                        $arp_pricing_part .= "<input type='hidden' id='arp_shortcode_customization_style' name='arp_shortcode_customization_style_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['arp_shortcode_customization_style'] . "' />";
                        $arp_pricing_part .= "<dl class='arp_selectbox column_level_size_dd' data-name='arp_shortcode_customization_style_" . $col_no[1] . "' data-id='arp_shortcode_customization_style_" . $col_no[1] . "' style='width:190px;'>";
                            $arp_pricing_part .= "<dt style='width : 180px;'><span>" . $arprice_customization_style[$columns['arp_shortcode_customization_style']]['name'] . "</span><input type='text' style='display:none;' value='" . $arprice_customization_style[$columns['arp_shortcode_customization_style']]['name'] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
                            $arp_pricing_part .= "<dd style='width : 195px;'>";
                                $arp_pricing_part .= "<ul data-id='arp_shortcode_customization_style' data-column='" . $j . "'>";

                                    foreach ($arprice_customization_style as $key => $style) {
                                        $arp_pricing_part .= "<li data-value='" . $key . "' data-label='" . $style['name'] . "'>" . $style['name'] . "</li>";
                                    }
                                $arp_pricing_part .= "</ul>";
                            $arp_pricing_part .= "</dd>";
                        $arp_pricing_part .= "</dl>";

                    $arp_pricing_part .= "</div>";
                $arp_pricing_part .= "</div>";
            }

            if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_shortcode_customization_size_div', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {
                $arp_pricing_part .= "<div class='col_opt_row width_342' id='arp_shortcode_customization_size_div'>";

                    $arp_pricing_part .= "<div class='col_opt_title_div' style='width : 40%;margin-top:6px;'>" . esc_html__('Size', 'ARPrice') . "</div>";
                    $float_style = ($arp_is_rtl) ? "float:left;" : "float:right;";
                    $arp_pricing_part .= "<div class='col_opt_input_div' style='width : 43%; {$float_style}'>";

                        $columns['arp_shortcode_customization_size'] = isset($columns['arp_shortcode_customization_size']) ? $columns['arp_shortcode_customization_size'] : '';
                        $arp_coloptionsarr['column_button_options']['button_size'][$columns['arp_shortcode_customization_size']] = isset($arp_coloptionsarr['column_button_options']['button_size'][$columns['arp_shortcode_customization_size']]) ? $arp_coloptionsarr['column_button_options']['button_size'][$columns['arp_shortcode_customization_size']] : '';

                        $arp_pricing_part .= "<input type='hidden' id='arp_shortcode_customization_size' name='arp_shortcode_customization_size_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['arp_shortcode_customization_size'] . "' />";
                        $arp_pricing_part .= "<dl class='arp_selectbox column_level_size_dd' data-name='arp_shortcode_customization_size_" . $col_no[1] . "' data-id='arp_shortcode_customization_size_" . $col_no[1] . "' style='width:190px;'>";
                            $arp_pricing_part .= "<dt style='width : 130px;'><span>" . $arp_coloptionsarr['column_button_options']['button_size'][$columns['arp_shortcode_customization_size']] . "</span><input type='text' style='display:none;' value='" . $arp_coloptionsarr['column_button_options']['button_size'][$columns['arp_shortcode_customization_size']] . "' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
                            $arp_pricing_part .= "<dd style='width : 146px;'>";
                                $arp_pricing_part .= "<ul data-id='arp_shortcode_customization_size' data-column='" . $j . "'>";
                                    $arprice_customization_size = isset($arp_coloptionsarr['column_button_options']['button_size']) ? $arp_coloptionsarr['column_button_options']['button_size'] : '';
                                    foreach ($arprice_customization_size as $key => $style) {
                                        $arp_pricing_part .= "<li data-value='" . $key . "' data-label='" . $style . "'>" . $style . "</li>";
                                    }
                                $arp_pricing_part .= "</ul>";
                            $arp_pricing_part .= "</dd>";
                        $arp_pricing_part .= "</dl>";
                    $arp_pricing_part .= "</div>";
                $arp_pricing_part .= "</div>";
            }

            
            $arp_pricing_part .= "<div class='edit_in_place_row arp_ok_div width_342' id='pricing_level_other_arp_ok_div__button_1'>";
                $arp_pricing_part .= "<div class='col_opt_btn_div'>";
                    
                    $arp_pricing_part .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn_edit_in_place' data-level='pricing' >";
                        $arp_pricing_part .= esc_html__('Ok', 'ARPrice');
                    $arp_pricing_part .= "</button>";
                $arp_pricing_part .= "</div>";
            $arp_pricing_part .= "</div>";

        $arp_pricing_part .= '</div>';

        return $arp_pricing_part;
    }
	
	function arp_renew_license() {
       
        $lidata = "";

        $lidata = $_POST["purchase_info"];

        $verifycode = get_option("arpSortOrder");
        
        $valstring =  $lidata;
        $urltopost = "https://www.reputeinfosystems.com/tf/plugins/arprice/verify/lic_renew_arp.php";


        $response = wp_remote_post($urltopost, array(
            'method' => 'POST',
            'timeout' => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(),
            'body' => array('verifyrenew' => $valstring, 'verifycode' => $verifycode),
            'cookies' => array()
                )
        );
		
		//print_r($response);exit;

        if (array_key_exists('body', $response) && isset($response["body"]) && $response["body"] != "")
            $responsemsg = $response["body"];
        else
            $responsemsg = "";


        if ($responsemsg != "") {
            $responsemsg = explode("|^|", $responsemsg);
            if (is_array($responsemsg) && count($responsemsg) > 0) {

                if (isset($responsemsg[0]) && $responsemsg[0] != "") {
                    $msg = $responsemsg[0];
                } else {
                    $msg = "";
                }
                
                if (isset($responsemsg[1]) && $responsemsg[1] != "") {
                    $info = $responsemsg[1];
                } else {
                    $info = "";
                }

                if ($msg == "1") {
                    update_option("arpSortInfo", $info);
                    echo "VERIFIED";
                    exit;
                }
                else 
                {
                	echo $msg;
                	exit;
            	}
            }
        } else {
            echo "Invalid Request";
            exit;
        }
    }

    public function arp_get_column_feature_part( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $new_arr, $maxrowcount, $column_count, $general_option ){

        global $arprice_default_settings;

        $arp_global_button_class = '';

        $arp_global_button_class_array = $arprice_default_settings->arp_button_type();

        $arp_feature_part = '';

        $is_enable_toggle = $general_option['general_settings']['enable_toggle_price']; 
        
        $column_data_type = 'other_columns_buttons';
        if( isset( $new_arr['columns'][$col_id]['is_caption'] ) && 1 == $new_arr['columns'][$col_id]['is_caption'] ){
            $column_data_type = 'caption_column_buttons';
        }

        $arp_feature_part .= "<div class='arpbody-content arppricingtablebodycontent' id='arppricingtablebodycontent' data-column='main_" . $col_id . "' data-template_id='" . $ref_template_id . "' data-level='body_level_options' data-type='".$column_data_type."'>";

            $arp_feature_part .= "<ul class='arp_opt_options arppricingtablebodyoptions' id='column_" . $col_id . "' style='text-align:" . $columns['body_text_alignment'] . ";'>";

                $r = 0;

                $row_order = isset($new_arr['columns'][$col_id]['row_order']) ? $new_arr['columns'][$col_id]['row_order'] : array();

                if ($row_order && is_array($row_order)) {
                    $rows = array();
                    asort($row_order);
                    $ji = 0;
                    $maxorder = max($row_order) ? max($row_order) : 0;
                    foreach ($new_arr['columns'][$col_id]['rows'] as $rowno => $row) {
                        $row_order[$rowno] = isset($row_order[$rowno]) ? $row_order[$rowno] : ($maxorder + 1);
                    }

                    foreach ($row_order  as $row_id => $order_id) {
                        if ($new_arr['columns'][$col_id]['rows'][$row_id]) {
                            $rows['row_' . $ji] = $new_arr['columns'][$col_id]['rows'][$row_id];
                            $ji++;
                        }
                    }

                    $new_arr['columns'][$col_id]['rows'] = $rows;
                }

                $column_count++;
                $row_count = 0;

                for ($ri = 0; $ri <= $maxrowcount; $ri++) {
                    $rows = isset($new_arr['columns'][$col_id]['rows']['row_' . $ri]) ? $new_arr['columns'][$col_id]['rows']['row_' . $ri] : array();

                    if ($columns['is_caption'] == 1) {
                        if (($ri + 1) % 2 == 0) {
                            $cls = 'rowlightcolorstyle';
                        } else {
                            $cls = '';
                        }
                    } else {

                        if ($column_count % 2 == 0) {
                            if (($ri + 1) % 2 == 0) {
                                $cls = 'rowdarkcolorstyle';
                            } else {
                                $cls = '';
                            }
                        } else {
                            if (($ri + 1) % 2 == 0) {
                                $cls = 'rowlightcolorstyle';
                            } else {
                                $cls = '';
                            }
                        }
                    }

                    if (($ri + 1 ) % 2 == 0) {
                        $cls .= " arp_even_row";
                    } else {
                        $cls .= " arp_odd_row";
                    }

                    if ($columns['button_background_color'] != '') {
                        $button_background_color = $columns['button_background_color'];
                    } else {
                         $button_background_color = '';
                    }

                    if (!isset($rows['row_description']) || $rows['row_description'] == '') {
                        $rows['row_description'] = '';
                    }
                    $arp_li_content_type = ( isset($template_feature['allow_row_level_button'] ) && true == $template_feature['allow_row_level_button'] && isset( $rows['row_content_type']) && $rows['row_content_type'] != '' ) ? $rows['row_content_type'] : 0;

                    if ($template_feature['list_alignment'] != 'default') {
                        $li_class = '';
                        $arp_feature_part .= "<li data-template_id='" . $ref_template_id . "' data-level='body_li_level_options' data-type='other_columns_buttons' data-column='main_" . $col_id . "' class='arpbodyoptionrow arp_" . $col_id . "_row_" . $row_count . " " . $cls . " " . $li_class . "' id='arp_row_" . $ri . "' data-row-id='arp_row_" . $ri . "' style='text-align:" . $template_feature['list_alignment'] . "' >";

                        $arp_feature_part .= "<span class=''>";
                        $g = 0;
                        foreach($total_tabs as $key => $tab_name){

                            $selected = '';
                            if ($is_enable_toggle) {
                                $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                            }else{
                                $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                            }

                            $arp_feature_part .= "<div class='row_description_{$tab_name[2]}_step toggle_step_{$tab_name[2]} {$selected}'>";

                            if($arp_li_content_type == 1){  

                                $btn_img_key = ($g == 0) ? 'image_row' : 'image_row'.$tab_name[2];
                                $btn_height_key = ($g == 0) ? 'image_height_row' : 'image_height_row_'.$tab_name[2];
                                $btn_width_key = ($g == 0) ? 'image_width_row' : 'image_width_row_'.$tab_name[2];

                                $arp_feature_part .= "<div class='arppricetablerowbutton toggle_step_" . $tab_name[2] . " {$selected}' data-column='main_" . $col_id . "' style='text-align:center; padding: 0px;'>";

                                $arp_feature_part .= "<button type='button' class='bestPlanRowButton bestPlanButton 
                                newplanbutton_" . $col_id . "_row_". $ri ." toggle_btn_" . $col_id ."_row_".$ri."_". $tab_name[2]." $arp_global_button_class' id='bestPlanRowButton' data-template_id='" . $ref_template . "' data-column-step='{$tab_name[2]}' data-level='body_li_level_options' data-type='other_columns_buttons' data-column='main_" . $col_id . "'";

                               $rows[$btn_img_key] = isset($rows[$btn_img_key]) ? $rows[$btn_img_key] : '';
                                if ($rows[$btn_img_key] != "") {
                                    $arp_feature_part .= "style='background:" . $columns['button_background_color'] . " url(" . $rows[$btn_img_key] . ") no-repeat !important;width:" . $rows[$btn_width_key] . "px;height:" . $rows[$btn_height_key] . "px;'";
                                } else {
                                    $arp_feature_part .= "style='background:" . $button_background_color . "'";
                                }
                                $arp_feature_part .= ">";

                                if ($rows[$btn_img_key] == "") {

                                    $arp_feature_part .= "<span class='btn_content_{$tab_name[2]} toggle_step_{$tab_name[2]} {$selected}'>";
                                        if( $g == 0 ){
                                            $arp_feature_part .= isset($rows['row_description']) ? $rows['row_description'] : "";
                                        } else {
                                            $arp_feature_part .= isset($rows['row_description_'.$tab_name[2]]) ? $rows['row_description_'.$tab_name[2]] : "";
                                        }
                                    $arp_feature_part .= "</span>";
                                }

                                $arp_feature_part .="</button>";
                                $arp_feature_part .="</div>";
                            } else {
                                if( $g == 0 ){
                                    $arp_feature_part .= isset($rows['row_description']) ? $rows['row_description'] : "";
                                } else {
                                    $arp_feature_part .= isset($rows['row_description_'.$tab_name[2]]) ? $rows['row_description_'.$tab_name[2]] : "";
                                }
                            }

                            $arp_feature_part .= "</div>";
                            $g++;
                        }
                        
                            $arp_feature_part .= "</span>";
                            
                        $arp_feature_part .= "</li>";
                    } else {
                        $li_class = '';
                        $arp_feature_part .= "<li data-editable='true' data-template_id='" . $ref_template_id . "' data-level='body_li_level_options' data-type='other_columns_buttons' data-column='main_" . $col_id . "' class='arpbodyoptionrow arp_" . $col_id . "_row_" . $row_count . " " . $cls . " " . $li_class . "' data-row-id='arp_row_" . $ri . "' id='arp_row_" . $ri . "' >";
                        
                        $arp_feature_part .= "<span class=''>";
                        $g = 0;
                        foreach($total_tabs as $key => $tab_name){
                            $selected = '';
                            if ($is_enable_toggle) {
                                $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                            }else{
                                $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                            }

                            $arp_feature_part .= "<div class='row_description_{$tab_name[2]}_step toggle_step_{$tab_name[2]} {$selected}'>";

                            if($arp_li_content_type == 1){

                                $btn_img_key = ($g == 0) ? 'image_row' : 'image_row_'.$tab_name[2];
                                $btn_height_key = ($g == 0) ? 'image_height_row' : 'image_height_row_'.$tab_name[2];
                                $btn_width_key = ($g == 0) ? 'image_width_row' : 'image_width_row_'.$tab_name[2]; 

                                $arp_feature_part .= "<div class='arppricetablerowbutton toggle_step_" . $tab_name[2] . " {$selected}' data-column='main_" . $col_id . "' style='text-align:center; padding: 0px;'>";

                                $arp_feature_part .= "<button type='button' class='bestPlanRowButton bestPlanButton 
                                newplanbutton_" . $col_id . "_row_". $ri ."  toggle_btn_" . $col_id ."_row_".$ri."_". $tab_name[2]." $arp_global_button_class' id='bestPlanRowButton' data-template_id='" . $ref_template_id . "' data-column-step='{$tab_name[2]}' data-level='body_li_level_options' data-type='other_columns_buttons' data-column='main_" . $col_id . " '";

                                 $rows[$btn_img_key] = isset($rows[$btn_img_key]) ? $rows[$btn_img_key] : '';

                                if ($rows[$btn_img_key] != "") {
                                    $arp_feature_part .= "style='background:" . $columns['button_background_color'] . " url(" . $rows[$btn_img_key] . ") no-repeat !important;width:" . $rows[$btn_width_key] . "px;height:" . $rows[$btn_height_key] . "px;'";
                                } else {
                                    $arp_feature_part .= "style='background:" . $button_background_color . ";padding:0;'";
                                }
                            $arp_feature_part .= ">";

                            if ($rows[$btn_img_key] == "") {

                                $arp_feature_part .= "<span class='btn_content_{$tab_name[2]} toggle_step_{$tab_name[2]} {$selected}'>";
                                    if( $g == 0 ){
                                        $arp_feature_part .= isset($rows['row_description']) ? $rows['row_description'] : "";
                                    } else {
                                        $arp_feature_part .= isset($rows['row_description_'.$tab_name[2]]) ? $rows['row_description_'.$tab_name[2]] : "";
                                    }
                                $arp_feature_part .= "</span>";
                            }

                                $arp_feature_part .="</button>";
                                $arp_feature_part .="</div>";
                            } else {

                                if( $g == 0 ){
                                    $arp_feature_part .= isset($rows['row_description']) ? $rows['row_description'] : "";
                                } else {
                                    $arp_feature_part .= isset($rows['row_description_'.$tab_name[2]]) ? $rows['row_description_'.$tab_name[2]] : "";
                                }
                            }
                            $arp_feature_part .= "</div>";
                            $g++;
                        }

                        

                        $arp_feature_part .= "</span>";

                        $arp_feature_part .= " </li>";
                    }
                    $row_count++;
                }

            $arp_feature_part .= "</ul>";

        $arp_feature_part .= "</div>";


        return $arp_feature_part;

    }

    public function arf_get_column_feature_part_opt( $columns, $rows, $n, $ref_template, $j, $total_tabs, $setas_default_toggle, $general_option ){
        global $arp_pricingtable,$arp_tempbuttonsarr;
        $arp_li_opt = '';
        $col_id = str_replace('column_','',$j);
        if ( isset( $columns['rows'][$n]) && is_array($columns['rows'][$n]) && !empty($columns['rows'][$n])) {
            $row_no = explode('_', $n);
            $splitedid = explode('_', $n);
            $row = $columns['rows'][$n];
            $arp_li_opt .= "<div id='arp_" . $n . "' class='arp_row_temp_wrapper' data-level='feature'>";

            if (in_array('label', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_1'])) {


                $arp_li_opt .= "<div class='edit_in_place_row arp_" . $n . "' id='label" . $splitedid[1] . "'>";
                $arp_li_opt .= "<div class='col_opt_title_div'>" . esc_html__('Label', 'ARPrice') . "</div>";
                $arp_li_opt .= "<div class='col_opt_input_div'>";
                $is_enable_toggle = $general_option['general_settings']['enable_toggle_price'];

                $display_edit_in_place_tabs = 'display:none;';

                if( $is_enable_toggle  ){
                    $display_edit_in_place_tabs = '';
                }

                $arp_li_opt .= "<div class='column_tabs' style='{$display_edit_in_place_tabs}'>";
                
                $total_tabs = $arp_pricingtable->arp_toggle_step_name();

                $g = 0;
                
                foreach($total_tabs as $key => $tab_name){
                    $sel = '';
                    if( $g == 0 ){
                        $sel = 'selected';
                    }
                    
                    $arp_li_opt .= "<div class='option_title {$sel} {$tab_name[0]}' data-id='{$tab_name[1]}' id='description_label_{$key}_tab' data-column='{$col_no[1]}'>";
                        $arp_li_opt .= isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                    $arp_li_opt .= "</div>";
                    $g++;
                }

                

                $arp_li_opt .= "</div>";

                $g = 0;
                foreach($total_tabs as $key => $tab_name){
                    $sel = '';
                    if( $g == 0 ){
                        $sel = 'selected';
                    }
                    
                    $name = ($g == 0) ? 'row_'.$col_id.'_label_'.$row_no[1] : 'row_' . $col_id . '_label_'.$tab_name[2].'_' . $row_no[1];

                    $id = ($g == 0) ? 'label' : 'label_'.$tab_name[2];

                    $column_description = isset($row['row_label']) ? $row['row_label'] : '';

                    if( $g > 0 ){
                        $column_description = isset($row['row_label_'.$tab_name[2]]) ? $row['row_label_'.$tab_name[2]] : '';
                    }

                    $display = '';
                    if( $g > 0 ){
                        $display = 'display:none;';
                    }

                    $arp_li_opt .= "<div class='option_tab' id='description_label_{$key}_tab' style='{$display}'>";
                        $arp_li_opt .= "<textarea name='{$name}' id='{$id}' data-column-step='{$tab_name[2]}' data-column='main_column_{$col_id}' class='col_opt_textarea row_label_{$tab_name[2]}'>";
                            $arp_li_opt .= htmlspecialchars($column_description);
                        $arp_li_opt .= "</textarea>";
                    $arp_li_opt .= "</div>";
                    $g++;
                }

                

                if ($row['row_caption_style_bold'] == 'bold') {
                    $bodylevel_li_style_bold_selected = 'selected';
                } else {
                    $bodylevel_li_style_bold_selected = '';
                }

                

                if ($row['row_caption_style_italic'] == 'italic') {
                    $bodylevel_li_style_italic_selected = 'selected';
                } else {
                    $bodylevel_li_style_italic_selected = '';
                }

                

                if ($row['row_caption_style_decoration'] == 'underline') {
                    $bodylevel_li_style_underline_selected = 'selected';
                } else {
                    $bodylevel_li_style_underline_selected = '';
                }

                if ($row['row_caption_style_decoration'] == 'line-through') {
                    $bodylevel_li_style_linethrough_selected = 'selected';
                } else {
                    $bodylevel_li_style_linethrough_selected = '';
                }


                $arp_li_opt .= "<div data-level='body_li_level_options_caption' style='margin-top:2px;'>";
                $arp_li_opt .= "<div class='arp_style_btn " . $bodylevel_li_style_bold_selected . " arptooltipster' title='" . esc_html__('Bold', 'ARPrice') . "' data-title='" . esc_html__('Bold', 'ARPrice') . "' data-align='left' data-column='main_column_" . $col_id . "' data-row='arp_row_" . $row_no[1] . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
                $arp_li_opt .= "<i class='fas fa-bold'></i>";
                $arp_li_opt .= "</div>";

                $arp_li_opt .= "<div class='arp_style_btn " . $bodylevel_li_style_italic_selected . " arptooltipster' title='" . esc_html__('Italic', 'ARPrice') . "' data-title='" . esc_html__('Italic', 'ARPrice') . "' data-align='center' data-column='main_column_" . $col_id . "' data-row='arp_row_" . $row_no[1] . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
                $arp_li_opt .= "<i class='fas fa-italic'></i>";
                $arp_li_opt .= "</div>";

                $arp_li_opt .= "<div class='arp_style_btn " . $bodylevel_li_style_underline_selected . " arptooltipster' title='" . esc_html__('Underline', 'ARPrice') . "' data-title='" . esc_html__('Underline', 'ARPrice') . "' data-align='right' data-column='main_column_" . $col_id . "' data-row='arp_row_" . $row_no[1] . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
                $arp_li_opt .= "<i class='fas fa-underline'></i>";
                $arp_li_opt .= "</div>";

                $arp_li_opt .= "<div class='arp_style_btn " . $bodylevel_li_style_linethrough_selected . " arptooltipster' title='" . esc_html__('Line-through', 'ARPrice') . "' data-title='" . esc_html__('Line-through', 'ARPrice') . "' data-align='right' data-column='main_column_" . $col_id . "' data-row='arp_row_" . $row_no[1] . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
                $arp_li_opt .= "<i class='fas fa-strikethrough'></i>";
                $arp_li_opt .= "</div>";

                $arp_li_opt .= "</div>";
                $arp_li_opt .= "<input type='hidden' id='body_li_style_bold_caption' name='body_li_style_bold_caption_column_" . $col_id . "_arp_row_" . $row_no[1] . "' value='" . $row['row_caption_style_bold'] . "' /> ";
                $arp_li_opt .= "<input type='hidden' id='body_li_style_italic_caption' name='body_li_style_italic_caption_column_" . $col_id . "_arp_row_" . $row_no[1] . "' value='" . $row['row_caption_style_italic'] . "' /> ";
                $arp_li_opt .= "<input type='hidden' id='body_li_style_decoration_caption' name='body_li_style_decoration_caption_column_" . $col_id . "_arp_row_" . $row_no[1] . "' value='" . $row['row_caption_style_decoration'] . "' /> ";



                $arp_li_opt .= "</div>";
                $arp_li_opt .= "</div>";


                if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_1'])) {

                    if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_1'])) {
                        $arp_li_opt .= "<div class='edit_in_place_row arp_" . $n . "' id='body_tooltip_add_shortcode" . $splitedid[1] . "' >";
                        $arp_li_opt .= "<div class='col_opt_btn_div'>";
                        $arp_li_opt .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster arp_add_label_shortcode' id='arp_add_label_shortcode' name='row_" . $col_id . "_add_tooltip_shortcode_btn_" . $row_no[1] . "' col-id=" . $col_id . " data-id='" . $col_id . "' data-row-id='label_" . $splitedid[1] . "' title='" . esc_html__('Add Font Icon', 'ARPrice') . "' data-title='" . esc_html__('Add Font Icon', 'ARPrice') . "' >";
                        
                        $arp_li_opt .= "</button>";

                        $arp_li_opt .= "<div class='arp_font_awesome_model_box_container'>";

                        $arp_li_opt .= "</div>";

                        $arp_li_opt .= "</div>";
                        $arp_li_opt .= "</div>";
                    }
                }
            }

            $arp_content_style = 'display:block;';
            $arp_content_class = '';
            if ($ref_template == 'arptemplate_25') {
                $arp_content_style = 'display:none;';
                $arp_content_class = 'arp_hide_row_button_options';
            }

            $arp_li_opt .= "<div class='edit_in_place_row arp_" . $n . " width_342 ".$arp_content_class."' id='arp_li_content_type" . $splitedid[1] . "' style='".$arp_content_style."' >";
                $arp_li_opt .= "<div class='col_opt_input_div width_342 col_opt_input_div_bottom_margin'>";

                if (!isset($row['row_content_type']) || (isset($row['row_content_type']) && $row['row_content_type'] == '')) {
                    $row['row_content_type'] = 0;
                } else {
                    $row['row_content_type'] = $row['row_content_type'];
                }

            $arp_li_opt .= "<span class='arp_price_radio_wrapper_standard arp_radio_dark_bg'><input type='radio' class='arp_checkbox dark_bg arp_content_type_options arp_content_type_html' value='0' id='row_content_type0_{$col_id}_{$row_no[1]}' name='row_".$col_id."_content_type_".$row_no[1]."'" . checked(0, $row['row_content_type'], false) . " data-column='main_column_{$col_id}' /><span></span> <label id='row_content_html_{$col_id}_{$row_no[1]}' for='row_content_type0_{$col_id}_{$row_no[1]}'>".esc_html__("HTML/Text", 'ARPrice')."</label></span>";
            $arp_li_opt .= "<span class='arp_price_radio_wrapper_standard arp_radio_dark_bg'><input type='radio' class='arp_checkbox dark_bg arp_content_type_options arp_content_type_btn' value='1' id='row_content_type1_{$col_id}_{$row_no[1]}' name='row_".$col_id."_content_type_".$row_no[1]."'" . checked(1, $row['row_content_type'], false) . " data-column='main_column_{$col_id}' /><span></span> <label id='row_content_btn_{$col_id}_{$row_no[1]}' for='row_content_type1_{$col_id}_{$row_no[1]}'>".esc_html__("Button", 'ARPrice')."</label></span>";

            $arp_li_opt .= "</div>";
            $arp_li_opt .= "</div>";


            $arp_li_opt .= "<div class='edit_in_place_row arp_" . $n . " width_342' id='description" . $splitedid[1] . "'>";
            $arp_li_opt .= "<div class='col_opt_title_div'>" . esc_html__('Description', 'ARPrice') . "</div>";
            $arp_li_opt .= "<div class='col_opt_input_div width_342'>";
            $is_enable_toggle = $general_option['general_settings']['enable_toggle_price'];

            $display_edit_in_place_tabs = 'display:none;';

            if( $is_enable_toggle  ){
                $display_edit_in_place_tabs = '';
            }
            $arp_li_opt .= "<div class='column_tabs' style='{$display_edit_in_place_tabs}'>";

            $total_tabs = $arp_pricingtable->arp_toggle_step_name();

            $g = 0;

            foreach($total_tabs as $key => $tab_name){
                $sel = '';
                if( $g == 0 ){
                    $sel = 'selected';
                }
                
                $arp_li_opt .= "<div class='option_title {$sel} {$tab_name[0]}' data-id='{$tab_name[1]}' id='description_{$key}_tab' data-column='{$col_id}'>";
                    $arp_li_opt .= isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                $arp_li_opt .= "</div>";
                $g++;
            }

            

            $arp_li_opt .= "</div>";

            $g = 0;
            foreach($total_tabs as $key => $tab_name){
                $sel = '';
                if( $g == 0 ){
                    $sel = 'selected';
                }
                
                $name = ($g == 0) ? 'row_'.$col_id.'_description_'.$row_no[1] : 'row_' . $col_id . '_description_'.$tab_name[2].'_' . $row_no[1];

                $id = ($g == 0) ? 'arp_li_description' : 'row_description_'.$tab_name[2];

                $column_description = isset($row['row_description']) ? $row['row_description'] : '';

                if( $g > 0 ){
                    $column_description = isset($row['row_description_'.$tab_name[2]]) ? $row['row_description_'.$tab_name[2]] : '';
                }

                $display = '';
                if( $g > 0 ){
                    $display = 'display:none;';
                }

                $arp_li_opt .= "<div class='option_tab' id='description_{$key}_tab' style='{$display}'>";
                    $arp_li_opt .= "<textarea name='{$name}' id='{$id}' data-column-step='{$tab_name[2]}' data-column='main_column_{$col_id}' class='col_opt_textarea row_description_{$tab_name[2]}'>";
                        $arp_li_opt .= htmlspecialchars($column_description);
                    $arp_li_opt .= "</textarea>";
                $arp_li_opt .= "</div>";
                $g++;
            }

            $arp_li_opt .= "</div>";
            $arp_li_opt .= "</div>";
            $arp_li_opt .= "<div class='edit_in_place_row arp_" . $n . " width_342' id='body_li_add_shortcode" . $splitedid[1] . "' >";
            $arp_li_opt .= "<div class='col_opt_btn_div'>";

            $display = '';

            if ( isset($row['row_content_type']) == 1 && $row['row_content_type'] != '') {

                 $arp_li_opt .= 'display:none;';
             }else {

            $arp_li_opt .= "<button type='button' class='col_opt_btn_icon arp_add_row_object arptooltipster align_left' name='" . $col_id . "_add_body_li_object_" . $row_no[1] . "' id='arp_add_row_object' data-insert='arp_" . $n . " textarea#arp_li_description' data-column='main_column_" . $col_id . "' title='" . esc_html__('Add Media', 'ARPrice') . "' data-title='" . esc_html__('Add Media', 'ARPrice') . "'>";
            $arp_li_opt .= "</button>";

             }

            $arp_li_opt .= "<label style='float:left;width:10px;'>&nbsp;</label>";


            $arp_li_opt .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster arp_add_row_shortcode' id='arp_add_row_shortcode' name='row_" . $col_id . "_add_description_shortcode_btn_" . $row_no[1] . "' col-id=" . $col_id . " data-id='" . $col_id . "' data-row-id='' title='" . esc_html__('Add Font Icon', 'ARPrice') . "' data-title='" . esc_html__('Add Font Icon', 'ARPrice') . "' >";
            $arp_li_opt .= "</button>";

            $arp_li_opt .= "<div class='arp_font_awesome_model_box_container'>";

            $arp_li_opt .= "</div>";

                $arp_li_opt .= "<div class='arp_add_image_container'>";
                    $arp_li_opt .= "<div class='arp_add_image_arrow'></div>";
                    $arp_li_opt .= "<div class='arp_add_img_content'>";

                        $arp_li_opt .= "<div class='arp_add_img_row'>";
                            $arp_li_opt .= "<div class='arp_add_img_label'>";
                                $arp_li_opt .= esc_html__('Image URL', 'ARPrice');
                                $arp_li_opt .= "<span class='arp_model_close_btn' id='arp_add_image_container_row_image'><i class='fas fa-times'></i></span>";
                            $arp_li_opt .= "</div>";
                            $arp_li_opt .= "<div class='arp_add_img_option'>";
                            $arp_li_opt .= "<input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url_row_image' name='arp_header_image_url' />";
                            $arp_li_opt .= "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
                            $arp_li_opt .= esc_html__('Add File', 'ARPrice');
                            $arp_li_opt .= "</button>";
                        $arp_li_opt .= "</div>";
                    $arp_li_opt .= "</div>";

                    $arp_li_opt .= "<div class='arp_add_img_row'>";
                        $arp_li_opt .= "<div class='arp_add_img_label'>";
                        $arp_li_opt .= esc_html__('Dimension ( height X width )', 'ARPrice');
                        $arp_li_opt .= "</div>";
                        $arp_li_opt .= "<div class='arp_add_img_option'>";
                            $arp_li_opt .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_height_row_image' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>";
                            $arp_li_opt .= "<label>x</label>";
                            $arp_li_opt .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_width_row_image' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>";
                        $arp_li_opt .= "</div>";
                    $arp_li_opt .= "</div>";

                    $arp_li_opt .= "<div class='arp_add_img_row' style='margin-top:10px;'>";
                        $arp_li_opt .= "<div class='arp_add_img_label'>";
                            $arp_li_opt .= '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn_row_image">';
                            $arp_li_opt .= esc_html__('Add', 'ARPrice');
                            $arp_li_opt .= '</button>';
                            $arp_li_opt .= '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn_row_image">';
                            $arp_li_opt .= esc_html__('Remove', 'ARPrice');
                            $arp_li_opt .= '</button>';
                        $arp_li_opt .= "</div>";
                    $arp_li_opt .= "</div>";
                $arp_li_opt .= "</div>";
            $arp_li_opt .= "</div>";

            $arp_li_opt .= "</div>";
            $arp_li_opt .= "</div>";


            

            $arp_li_opt .= "<div class='edit_in_place_row arp_ok_div arp_" . $n . " width_342' id='body_li_level_other_arp_ok_div__button_1" . $splitedid[1] . "' >";
            $arp_li_opt .= "<div class='col_opt_btn_div'>";

                

            $arp_li_opt .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn_edit_in_place' data-level='body_li' >";
            $arp_li_opt .= esc_html__('Ok', 'ARPrice');
            $arp_li_opt .= "</button>";
            $arp_li_opt .= "</div>";
            $arp_li_opt .= "</div>";

            $arp_li_opt .= "</div>";
        }

        return $arp_li_opt;
    }

    public function arp_get_column_footer_part( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option ){

        global $arprice_default_settings;

        $arp_global_button_class = '';
        $is_enable_toggle = $general_option['general_settings']['enable_toggle_price'];
        $footer_hover_class = '';
        if ( ( !empty( $columns['footer_content'] ) || !empty($columns['footer_content_second'] ) || !empty( $columns['footer_content_third'] ) || !empty( $columns['footer_content_fourth'] ) || !empty( $columns['footer_content_fifth'] ) || !empty( $columns['footer_content_sixth'] ) || !empty( $columns['footer_content_seventh'] ) || !empty($columns['footer_content_eighth'] ) ) && 1 == $template_feature['has_footer_content'] ) {
            $footer_hover_class .= ' has_footer_content ';
            if ($columns['footer_content_position'] == 0) {
                $footer_hover_class .= " footer_below_content ";
            } else {
                $footer_hover_class .= " footer_above_content ";
            }
        } else {
            $footer_hover_class = "";
        }

        $column_settings = $general_option['column_settings'];

        $is_caption = ($columns['is_caption'] == 1) ? true : false;

        $arp_global_button_class_array = $arprice_default_settings->arp_button_type();
        $arp_global_button_size = $arprice_default_settings->arp_button_size_new();
        $arp_global_button_type = isset($column_settings['arp_global_button_type']) ? $column_settings['arp_global_button_type'] : 'flat';
        if ($arp_global_button_type !== 'none') {
            $arp_global_button_class_array[$arp_global_button_type]['class'] = isset($arp_global_button_class_array[$arp_global_button_type]['class']) ? $arp_global_button_class_array[$arp_global_button_type]['class'] : '';
            if (!isset($column_settings['enable_button_hover_effect']) || $column_settings['enable_button_hover_effect'] != 1) {
                $arp_global_button_class = $arp_global_button_class_array[$arp_global_button_type]['class'] . ' arp_button_hover_disable arp_editor';
            } else {
                $arp_global_button_class = $arp_global_button_class_array[$arp_global_button_type]['class'] . ' arp_editor';
            }
        }

        $arp_col_footer_part = '';
        $footer_data_type_class = 'other_columns_buttons';
        if( $is_caption ){
            $footer_data_type_class = 'caption_column_buttons';
        }

        $arp_col_footer_part .= "<div class='arpcolumnfooter " . $footer_hover_class . "' id='arpcolumnfooter' data-column='main_" . $col_id . "' data-template_id='" . $ref_template_id . "' data-level='footer_level_options' data-type='".$footer_data_type_class."' >";

            $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";

            $footer_content_above_btn = "display:block;";
            if ( ( !empty( $columns['footer_content'] ) || !empty($columns['footer_content_second'] ) || !empty( $columns['footer_content_third'] ) || !empty( $columns['footer_content_fourth'] ) || !empty( $columns['footer_content_fifth'] ) || !empty( $columns['footer_content_sixth'] ) || !empty( $columns['footer_content_seventh'] ) || !empty($columns['footer_content_eighth'] ) ) && 1 == $columns['footer_content_position'] && $template_feature['has_footer_content'] == 1){
                $footer_content_above_btn = "display:block;";
            } else {
                if( 1 != $columns['is_caption'] ){
                    $footer_content_above_btn = "display:none;";
                }
            }
            if (isset($template_feature['has_footer_content']) && $template_feature['has_footer_content'] == 1) {

                $footer_content_class = ( $columns['is_caption'] == 1 )  ? 'arp_footer_caption_column' : '';

                $arp_col_footer_part .= "<div class='arp_footer_content arp_btn_before_content ".$footer_content_class."' style='{$footer_content_above_btn}'>";
                    $g = 0;
                    foreach( $total_tabs as $key => $tab_name ){
                        $selected = '';
                        if ($is_enable_toggle) {
                            $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                        } else {
                            $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                        }
                        $arp_col_footer_part .= "<span class='footer_content_{$tab_name[2]}_step toggle_step_{$tab_name[2]} {$selected}'>";
                            if( $g == 0 ){
                                $arp_col_footer_part .= isset($columns['footer_content']) ? $columns['footer_content'] : '';
                            } else {
                                $arp_col_footer_part .= isset($columns['footer_content_'.$tab_name[2]]) ? $columns['footer_content_'.$tab_name[2]] : '';
                            }
                        $arp_col_footer_part .= "</span>";
                        $g++;    
                    }
                $arp_col_footer_part .= "</div>";
            }

            if ($columns['button_background_color'] != '') {
                $button_background_color = $columns['button_background_color'];
            } else {
                $button_background_color = '';
            }
            

            if( !$is_caption ){
                $arp_global_button_size[$columns['button_size']] = isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '';
                $col_num = str_replace('column_', '', $col_id);

                $g = 0;
                foreach($total_tabs as $key => $tab_name){
                    $selected = '';
                    if ($is_enable_toggle) {
                        $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                    } else {
                        $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                    }

                    $btn_img_key = ($g == 0) ? 'btn_img' : 'btn_img_'.$tab_name[2];
                    $btn_height_key = ($g == 0) ? 'btn_img_height' : 'btn_img_height_'.$tab_name[2];
                    $btn_width_key = ($g == 0) ? 'btn_img_width' : 'btn_img_width_'.$tab_name[2];

                   $arp_col_footer_part .= "<div class='arppricetablebutton toggle_step_" . $tab_name[2] . " {$selected}'  data-column='main_" . $col_id . "'  style='text-align:center;' >";
                    $arp_col_footer_part .= "<button type='button' class='bestPlanButton toggle_btn_" . $col_num ."_". $tab_name[2]." $arp_global_button_class" . strtolower($arp_global_button_size[$columns['button_size']]) . "' id='bestPlanButton_" . $col_num ."' data-column-step='{$tab_name[2]}' data-column='main_" . $col_id . "' data-template_id='" . $ref_template_id . "' data-level='button_options' data-type='other_columns_buttons' ";

                        $columns[$btn_img_key] = isset($columns[$btn_img_key]) ? $columns[$btn_img_key] : '';
                        if ($columns[$btn_img_key] != "") {
                            $arp_col_footer_part .= "style='background:" . $columns['button_background_color'] . " url(" . $columns[$btn_img_key] . ") no-repeat !important;width:" . $columns[$btn_width_key] . "px;height:" . $columns[$btn_height_key] . "px;'";
                        } else {
                            $arp_col_footer_part .= "style='background:" . $button_background_color . "'";
                        }
                        $arp_col_footer_part .= ">";

                        if ($columns[$btn_img_key] == "") {
                            
                            $arp_col_footer_part .= "<span class='btn_content_{$tab_name[2]}_step toggle_step_{$tab_name[2]} {$selected}'>";
                                if( $g == 0 ){
                                    $arp_col_footer_part .= isset($columns['button_text']) ? $columns['button_text'] : '';
                                } else {
                                    $arp_col_footer_part .= isset($columns['btn_content_'.$tab_name[2]]) ? $columns['btn_content_'.$tab_name[2]] : '';
                                }
                            $arp_col_footer_part .= "</span>";
                        }
                    $arp_col_footer_part .= "</button>";
                $arp_col_footer_part .= "</div>";

                $g++;
            }

                $footer_content_below_btn = "";
                if ( ( !empty( $columns['footer_content'] ) || !empty($columns['footer_content_second'] ) || !empty( $columns['footer_content_third'] ) || !empty( $columns['footer_content_fourth'] ) || !empty( $columns['footer_content_fifth'] ) || !empty( $columns['footer_content_sixth'] ) || !empty( $columns['footer_content_seventh'] ) || !empty($columns['footer_content_eighth'] ) ) && $columns['footer_content_position'] == 0){
                    $footer_content_below_btn = "display:block;";
                } else {
                    $footer_content_below_btn = "display:none;";
                }

                if (isset($template_feature['has_footer_content']) && $template_feature['has_footer_content'] == 1) {
                    $arp_col_footer_part .= "<div class='arp_footer_content arp_btn_after_content' style='{$footer_content_below_btn}'>";
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $selected = '';
                            if ($is_enable_toggle) {
                                $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
                            }else{
                                $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
                            }
                            $arp_col_footer_part .= "<span class='footer_content_{$tab_name[2]}_step toggle_step_{$tab_name[2]} {$selected}'>";
                                if( $g == 0 ){
                                    $arp_col_footer_part .= isset($columns['footer_content']) ? $columns['footer_content'] : '';
                                } else {
                                    $arp_col_footer_part .= isset($columns['footer_content_'.$tab_name[2]]) ? $columns['footer_content_'.$tab_name[2]] : '';
                                }
                            $arp_col_footer_part .= "</span>";
                            $g++;    
                        }
                    $arp_col_footer_part .= "</div>";
                }
            }
            
            if ( 'arptemplate_16' == $ref_template_id ) {
                $arp_col_footer_part .= "<div class='arp_bottom_image'>";
                    $arp_col_footer_part .= "<ul class='arp_boat_img'><li></li></ul>";
                    $arp_col_footer_part .= "<ul class='arp_water_imgs'>";
                        $arp_col_footer_part .= "<li class='arp_water_img_1'></li>";
                        $arp_col_footer_part .= "<li class='arp_water_img_2'></li>";
                    $arp_col_footer_part .= "</ul>";
                $arp_col_footer_part .= "</div>";
            }

        $arp_col_footer_part .= "</div>";

        return $arp_col_footer_part;

    }

    public function arp_get_column_description_part( $columns, $ref_template_id, $template_feature, $col_id, $total_tabs, $setas_default_toggle, $general_option ){

        $arp_col_desc_part = '';
        $is_enable_toggle = $general_option['general_settings']['enable_toggle_price'];
        if( 'style_2' == $template_feature['column_description_style'] ){
            $arp_col_desc_part .= "<div class='custom_ribbon_wrapper'>";
        }

        $g = 0;
        foreach( $total_tabs as $key => $tab_name ){
            $selected = '';
            if ($is_enable_toggle) {
                $selected = ($g == $setas_default_toggle) ? 'toggle_selected active_toggle' : '';
            }else{
                $selected = ($g == 0) ? 'toggle_selected active_toggle' : '';
            }
            
            $arp_col_desc_part .= "<div class='column_description column_description_" . $tab_name[2] . "_step toggle_step_" . $tab_name[2] . " " . $selected . "' data-column_name='main_".$col_id."' data-template_id='".$ref_template_id."' data-type='other_columns_buttons' data-level='column_description_level'>";
            if( $g == 0 ){
                $arp_col_desc_part .= isset($columns['column_description']) ? $columns['column_description'] : '';
            } else {
                $arp_col_desc_part .= isset($columns['column_description_'.$tab_name[2]]) ? $columns['column_description_'.$tab_name[2]] : '';
            }
            $arp_col_desc_part .= "</div>";
            $g++;
        }

        if( 'style_2' == $template_feature['column_description_style'] ){
            $arp_col_desc_part .= "</div>";
        }
        
        return $arp_col_desc_part;

    }

    function arprice_get_sample_template_list(){

        $return = array();

        $arp_sample_page = isset($_REQUEST['sample_page']) ? $_REQUEST['sample_page'] : 1;

        $return['current_page'] = $arp_sample_page;
        $return['is_last_page'] = 0;
        $return['arp_content'] = '';

        $arp_posturl = 'https://www.arpriceplugin.com/download_samples/arp_samples_list.php';

        $arp_response = wp_remote_post($arp_posturl, array(
            'method' => 'POST',
            'timeout' => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(),
            'body' => array('arp_req_page' => $arp_sample_page),
            'cookies' => array()
        ));

        if (is_wp_error($arp_response) || $arp_response['response']['code'] != 200) {
            $return['error'] = true;
        } else {
            $return['error'] = false;
            $arp_samples = maybe_unserialize(base64_decode($arp_response['body']));

            $arp_content = '';

            if(isset($arp_samples['is_last_page'])){
                $return['is_last_page'] = 1;
                unset($arp_samples['is_last_page']);
            }

            foreach ($arp_samples as $arp_slug => $arp_sample) {
                $arpsample_image = isset($arp_sample['image']) ? $arp_sample['image'] : '';
                $arpsample_redirect = ( isset($arp_sample['redirect_url']) && $arp_sample['redirect_url'] != '' ) ? $arp_sample['redirect_url'] : '#';
                $arpsample_id = ( isset($arp_sample['template_id']) && $arp_sample['template_id'] != '' ) ? $arp_sample['template_id'] : '';

                $arp_content .= '<div class="arprice_select_template_container_item arprice_download_sample_container_item">';
                $arp_content .= '<div class="arprice_select_template_inner_container arprice_download_sample_inner_container">';
                $arp_content .= '<div class="arprice_select_template_bg_img arprice_download_sample_bg_img" style="background:url('.$arpsample_image.') no-repeat top left;"></div>';
                $arp_content .= '<div class="arprice_select_template_action_div arprice_download_sample_action_div">';
                $arp_content .= '<div class="arprice_select_template_action_btn arprice_download_sample_action_btn arprice_download_sample" id="arprice_download_sample" title="'.esc_html__('Install', 'ARPrice').'" onClick="arp_download_sample(\''.$arpsample_id.'\');"></div>';
                $arp_content .= '<div class="arprice_select_template_action_btn arprice_download_sample_action_btn arprice_redirect_sample" id="arprice_redirect_sample" title="'.esc_html__('Preview', 'ARPrice').'" onClick="arp_redirect_to_sample(\''.$arpsample_redirect.'\');"></div>';
                $arp_content .= '</div>';
                $arp_content .= '</div>';
                $arp_content .= '</div>';
            }

            $return['arp_content'] = $arp_content;
        }

        echo json_encode($return);
        die;
    }

    function arprice_get_sample_template(){

        $return = array();
        $arp_template_id = isset($_POST['template_id']) ? $_POST['template_id'] : '';

        if($arp_template_id == '' || $arp_template_id < 0 ){
            die();
        }

        $is_license_active = $this->arp_is_license_active();

        if ($is_license_active != 1) {
            $return['error'] = true;
            $return['error_type'] = 'license_error';
            $return['message'] = esc_html__('Please activate license to install the templates.', 'ARPrice');

            echo json_encode($return);
            exit;
        }

        $arp_pcode = "";

        $get_purchased_info = get_option('arpSortInfo');
        $sortorderval = base64_decode($get_purchased_info);
        $ordering = explode("^", $sortorderval);
        if(is_array($ordering)) {
            $arp_pcode = (isset($ordering[0]) && $ordering[0]!= "") ? $ordering[0] : "";
        }


        $arp_posturl = 'https://www.arpriceplugin.com/download_samples/arp_download_samples.php';

        $arp_response = wp_remote_post($arp_posturl, array(
            'method' => 'POST',
            'timeout' => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(),
            'body' => array('arp_template' => $arp_template_id, 'arp_pcode' => $arp_pcode),
            'cookies' => array()
        ));

        if (is_wp_error($arp_response) || $arp_response['response']['code'] != 200) {
            $return['error'] = true;
            $return['error_type'] = '';
            $return['message'] = esc_html__('Something went wrong, while installing sample template. Please try again', 'ARPrice');
        } else {

            $arp_error_type = $arp_error_msg = "";
            $arp_error = base64_decode($arp_response['body']);
            $arp_error_arr = explode("|~^~|", $arp_error);
            if (is_array($arp_error_arr) && count($arp_error_arr) > 0) {
                $arp_error_type = (isset($arp_error_arr[0]) && $arp_error_arr[0] != "") ? $arp_error_arr[0] : "";
                $arp_error_msg = (isset($arp_error_arr[1]) && $arp_error_arr[1] != "") ? $arp_error_arr[1] : "";
            }

            if( $arp_error_type != "" && in_array( $arp_error_type, array('empty_pcode','invalid_pcode','lic_expired','exceed_limit') ) ) {
                $return['error'] = true;
                $return['error_type'] = 'license_error';
                $return['message'] = esc_html__($arp_error_msg, 'ARPrice');

            } else {
                $arp_import = $this->arp_import_sample_template($arp_response['body']);
                if($arp_import > 0){
                    $return['error'] = false;
                    $return['new_id'] = $arp_import;
                    $return['message'] = esc_html__('Sample template is installed successfully.', 'ARPrice');
                } else {
                    $return['error'] = true;
                    $return['error_type'] = '';
                    $return['message'] = esc_html__('Something went wrong, while installing sample template. Please try again', 'ARPrice');
                }
            }
        }

        echo json_encode($return);
        die;

    }

    function arp_import_sample_template($xml_content = ''){

        if( $xml_content == ''){
            return 0;
        }

        global $arprice_import_export, $wpdb, $arprice_images_css_version, $arp_pricingtable;

        $xml = base64_decode($xml_content);

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($xml);

        if ($xml === false) {
            return 0;
        }

        $table = $wpdb->prefix . 'arp_arprice';
        $table_opt = $wpdb->prefix . 'arp_arprice_options';
        $_SESSION['arprice_image_array'] = array();

        @ini_set('max_execution_time', 0);

        $wp_upload_dir = wp_upload_dir();

        $output_url = $wp_upload_dir['baseurl'] . '/arprice/';
        $output_dir = $wp_upload_dir['basedir'] . '/arprice/';

        $upload_dir_path = $wp_upload_dir['basedir'] . '/arprice/';
        $upload_dir_url = $wp_upload_dir['baseurl'] . '/arprice/';

        

        if (isset($xml->arp_table)) {
            $j=1;
            foreach ($xml->children() as $key_main => $val_main) {
                $attr = $val_main->attributes();
                $old_id = $attr['id'];
                $status = trim($val_main->status);
                
                $is_template = trim($val_main->is_template);
                $template_name = trim($val_main->template_name);
                $is_animated = trim($val_main->is_animated);
                $arprice_import_version = trim($val_main->arp_plugin_version);

                $table_name = trim($val_main->arp_table_name);
               
                $arp_template_css = $val_main->arp_template_css;

                $arp_template_img = $val_main->arp_template_img;
                $arp_template_img_big = $val_main->arp_template_img_big;
                $arp_template_img_large = $val_main->arp_template_img_large;

                $date = current_time('mysql');
                foreach ($val_main->options->children() as $key => $val) {

                    if ($key == 'general_options') {
                        $general_options = (string) $val;

                        $general_options_new = unserialize($general_options);

                        $arp_main_reference_template = $general_options_new['general_settings']['reference_template'];

                        
                        if(isset($general_options_new['tooltip_settings']['tooltip_informative_icon'])){
                            $value = $general_options_new['tooltip_settings']['tooltip_informative_icon'];
                            if($value!= ""){
                                $general_options_new['tooltip_settings']['tooltip_informative_icon'] = $arprice_import_export->update_fa_font_class($value);
                            }
                        }
                        
                        
                        if (version_compare($arprice_import_version, '2.0', '<')) {

                            $general_options_new['column_settings']['arp_load_first_time_after_migration'] = 1;
                            $general_options_new['column_settings']['column_wrapper_width_txtbox'] = 1000;
                            $general_options_new['column_settings']['display_col_mobile'] = 1;
                            $general_options_new['column_settings']['display_col_tablet'] = 3;

                            $general_options_new['column_animation']['pagi_nav_btn'] = "pagination_bottom";
                            $general_options_new['column_animation']['navi_nav_btn'] = "navigation";

                            $col_hover_effect = $general_options_new['column_settings']['column_highlight_on_hover'];
                            if ($col_hover_effect == '0') {
                                $general_options_new['column_settings']['column_highlight_on_hover'] = 'hover_effect';
                            } else if ($col_hover_effect == '1') {
                                $general_options_new['column_settings']['column_highlight_on_hover'] = 'shadow_effect';
                            } else {
                                $general_options_new['column_settings']['column_highlight_on_hover'] = 'no_effect';
                            }

                            $general_options_new['column_settings']['column_box_shadow_effect'] = 'shadow_style_none';
                            if ($arp_main_reference_template == 'arptemplate_2') {
                                $general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 7;
                            } else if ($arp_main_reference_template == 'arptemplate_23') {
                                $general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 6;
                            } else if ($arp_main_reference_template == 'arptemplate_22') {
                                $general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 4;
                            } else {
                                $general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 0;
                            }

                            $general_options_new['tooltip_settings']['tooltip_trigger_type'] = 'hover';
                            $general_options_new['tooltip_settings']['tooltip_display_style'] = 'default';
                        }

                        $arp_custom_css = isset($general_options_new['general_settings']['arp_custom_css']) ? $general_options_new['general_settings']['arp_custom_css'] : '';

                        $reference_template = $general_options_new['general_settings']['reference_template'];

                        $general_options_new = $arprice_import_export->arprice_recursive_array_function($general_options_new, 'import');

                        $general_options = serialize($general_options_new);

                    } else if ($key == 'column_options') {

                        $column_options = (string) $val;
                        
                        $column_opts = unserialize($column_options);

                        $total_tabs = $arp_pricingtable->arp_toggle_step_name();

                        $column_opts = $arprice_import_export->arprice_recursive_array_function($column_opts, 'import');
                        foreach ($column_opts['columns'] as $c => $columns) {

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
                                    $columns['arp_header_shortcode_'.$tab_name[2]] = isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['arp_header_shortcode_'.$tab_name[2]]) : '';
                                    $columns['price_text_'.$tab_name[3].'_step'] = isset($columns['price_text_'.$tab_name[3].'_step']) ? $arprice_import_export->update_fa_font_class($columns['price_text_'.$tab_name[3].'_step']) : '';
                                    $columns['column_description_'.$tab_name[2]] = isset($columns['column_description_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['column_description_'.$tab_name[2]]) : '';
                                    $columns['btn_content_'.$tab_name[2]] = isset($columns['btn_content_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class($columns['btn_content_'.$tab_name[2]]) : '';
                                }
                                $g++;
                            }

                            $column_opts['columns'][$c] = $columns;

                            $g = 0;
                            foreach( $total_tabs as $k => $tab_name ){
                                if( $g == 0 ){
                                    $column_opts['columns'][$c]['html_content'] = $arprice_import_export->arprice_copy_image_from_content($columns['html_content']);
                                    $column_opts['columns'][$c]['package_title'] = $arprice_import_export->arprice_copy_image_from_content($columns['package_title']);
                                    $column_opts['columns'][$c]['price_text'] = $arprice_import_export->arprice_copy_image_from_content($columns['price_text']);
                                    $column_opts['columns'][$c]['arp_header_shortcode'] = $arprice_import_export->arprice_copy_image_from_content($columns['arp_header_shortcode']);
                                    $column_opts['columns'][$c]['column_description'] = $arprice_import_export->arprice_copy_image_from_content($columns['column_description']);

                                } else {
                                    $column_opts['columns'][$c]['html_content_'.$tab_name[2]] = isset($columns['html_content_'.$tab_name[2]]) ? $arprice_import_export->arprice_copy_image_from_content($columns['html_content_'.$tab_name[2]]) : '';
                                    $column_opts['columns'][$c]['package_title_'.$tab_name[2]] = isset($columns['package_title_'.$tab_name[2]]) ? $arprice_import_export->arprice_copy_image_from_content($columns['package_title_'.$tab_name[2]]) : '';
                                    $column_opts['columns'][$c]['price_text_'.$tab_name[3].'_step'] = isset($columns['price_text_'.$tab_name[3].'_step']) ? $arprice_import_export->arprice_copy_image_from_content($columns['price_text_'.$tab_name[3].'_step']) : '';
                                    $column_opts['columns'][$c]['arp_header_shortcode_'.$tab_name[2]] = isset($columns['arp_header_shortcode_'.$tab_name[2]]) ? $arprice_import_export->arprice_copy_image_from_content($columns['arp_header_shortcode_'.$tab_name[2]]) : '';
                                    $column_opts['columns'][$c]['column_description_'.$tab_name[2]] = isset($columns['column_description_'.$tab_name[2]]) ? $arprice_import_export->arprice_copy_image_from_content($columns['column_description_'.$tab_name[2]]) : '';
                                }
                                $g++;
                            }

                            if( is_array( $columns['rows']) && count($columns['rows']) > 0 ){
                                
                                foreach( $columns['rows'] as $r => $row ){

                                    $g = 0;
                                    foreach( $total_tabs as $key => $tab_name ){

                                        if( $g == 0 ){
                                            $row['row_description'] = $arprice_import_export->update_fa_font_class($row['row_description']);
                                            $column_opts['columns'][$c]['rows'][$r]['row_description'] = $arprice_import_export->arprice_copy_image_from_content($row['row_description']);
                                            $column_opts['columns'][$c]['rows'][$r]['row_tooltip'] = $arprice_import_export->arprice_copy_image_from_content($row['row_tooltip']);
                                        } else {
                                            $row['row_description_'.$tab_name[2]] = isset($row['row_description_'.$tab_name[2]]) ? $arprice_import_export->update_fa_font_class( $row['row_description_'.$tab_name[2]] ) : '';
                                            $column_opts['columns'][$c]['rows'][$r]['row_description_'.$tab_name[2]] = isset($row['row_description_'.$tab_name[2]]) ? $arprice_import_export->arprice_copy_image_from_content($row['row_description_'.$tab_name[2]]) : '';
                                            $column_opts['columns'][$c]['rows'][$r]['row_tooltip_'.$tab_name[2]] = isset($row['row_tooltip_'.$tab_name[2]]) ? $arprice_import_export->arprice_copy_image_from_content($row['row_tooltip_'.$tab_name[2]]) : '';
                                        }

                                        $g++;
                                    }
                                    
                                }
                                
                            }

                            $g = 0;
                            foreach( $total_tabs as $key => $tab_name ){
                                
                                if( $g == 0 ){
                                    $column_opts['columns'][$c]['footer_content'] = $arprice_import_export->arprice_copy_image_from_content($columns['footer_content']);
                                    $column_opts['columns'][$c]['button_text'] = $arprice_import_export->arprice_copy_image_from_content($columns['button_text']);
                                } else {
                                    $column_opts['columns'][$c]['footer_content_'.$tab_name[2]] = isset($columns['footer_content_'.$tab_name[2]]) ? $arprice_import_export->arprice_copy_image_from_content($columns['footer_content_'.$tab_name[2]]) : '';
                                    $column_opts['columns'][$c]['btn_text_'.$tab_name[2]] = isset($columns['btn_text_'.$tab_name[2]]) ? $arprice_import_export->arprice_copy_image_from_content($columns['btn_text_'.$tab_name[2]]) : '';
                                }

                                $g++;
                            }

                            $g = 0;
                            foreach( $total_tabs as $key => $tab_name ){

                                $header_img = ($g == 0) ? $c.'_img' : $c.'_img_'.$tab_name[2];

                                if( $val_main->$header_img ){

                                }
                                $g++;
                            }

                            $header_img = $c . '_img';
                            $header_img_second = $c . '_img_second';
                            $header_img_third = $c . '_img_third';

                            $btn_img = $c . '_btn_img';
                            $column_back_image = $c . '_background_image';

                            $gmap_marker = $c . '_gmap_marker';

                            $html5_mp4_video = $c . '_html5_mp4_video';
                            $html5_mp4_video_second = $c . '_html5_mp4_video_second';
                            $html5_mp4_video_third = $c . '_html5_mp4_video_third';

                            $html5_webm_video = $c . '_html5_webm_video';
                            $html5_webm_video_second = $c . '_html5_webm_video_second';
                            $html5_webm_video_third = $c . '_html5_webm_video_third';

                            $html5_ogg_video = $c . '_html5_ogg_video';
                            $html5_ogg_video_second = $c . '_html5_ogg_video_second';
                            $html5_ogg_video_third = $c . '_html5_ogg_video_third';

                            $html5_video_poster = $c . '_html5_video_poster';
                            $html5_video_poster_second = $c . '_html5_video_poster_second';
                            $html5_video_poster_third = $c . '_html5_video_poster_third';

                            $html5_mp3_audio = $c . '_html5_mp3_audio';
                            $html5_mp3_audio_second = $c . '_html5_mp3_audio_second';
                            $html5_mp3_audio_third = $c . '_html5_mp3_audio_third';

                            $html5_ogg_audio = $c . '_html5_ogg_audio';
                            $html5_ogg_audio_second = $c . '_html5_ogg_audio_second';
                            $html5_ogg_audio_third = $c . '_html5_ogg_audio_third';

                            $html5_wav_audio = $c . '_html5_wav_audio';
                            $html5_wav_audio_second = $c . '_html5_wav_audio_second';
                            $html5_wav_audio_third = $c . '_html5_wav_audio_third';

                            if ($val_main->$header_img != "") {
                                $header_image = $c . '_img';
                                $image_width = $c . '_img_width';
                                $image_height = $c . '_img_height';
                                $img_class = $c . '_img_class';
                                $image = $val_main->$header_image;
                                $img_name = explode('/', $image);
                                $img_nm = $img_name[count($img_name) - 1];
                                $img_name = 'arp_' . time() . '_' . $img_nm;
                                
                                $base_url = trim($image);
                                $new_path = $upload_dir_path . $img_name;
                                $new_url = $upload_dir_url . $img_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                $html = "<img src='" . $new_url . "'";
                                if (isset($val_main->$image_height) and ! empty($val_main->$image_height)) {
                                    $html .= " height='" . $val_main->$image_height . "'";
                                }
                                if (isset($val_main->$image_width) and ! empty($val_main->$image_width)) {
                                    $html .= " width='" . $val_main->$image_width . "'";
                                }

                                if (isset($val_main->$img_class) and ! empty($val_main->$img_class)) {
                                    $html .= " class='" . $val_main->$img_class . "'";
                                }
                                $html .= " >";
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $html;
                            }
                            if ($val_main->$header_img_second != "") {
                                $header_image = $c . '_img_second';
                                $image_width = $c . '_img_second_width';
                                $image_height = $c . '_img_second_height';
                                $img_class = $c . '_img_second_class';
                                $image = $val_main->$header_img_second;
                                $img_name = explode('/', $image);
                                $img_nm = $img_name[count($img_name) - 1];
                                $img_name = 'arp_' . time() . '_' . $img_nm;
                                
                                $base_url = trim($image);
                                $new_path = $upload_dir_path . $img_name;
                                $new_url = $upload_dir_url . $img_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                
                                $html = "<img src='" . $new_url . "'";
                                if (isset($val_main->$image_height) and ! empty($val_main->$image_height)) {
                                    $html .= " height='" . $val_main->$image_height . "'";
                                }
                                if (isset($val_main->$image_width) and ! empty($val_main->$image_width)) {
                                    $html .= " width='" . $val_main->$image_width . "'";
                                }
                                if (isset($val_main->$img_class) and ! empty($val_main->$img_class)) {
                                    $html .= " class='" . $val_main->$img_class . "'";
                                }
                                $html .= " >";
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $html;
                            }
                            if ($val_main->$header_img_third != "") {
                                $header_image = $c . '_img_third';
                                $image_width = $c . '_img_third_width';
                                $image_height = $c . '_img_third_height';
                                $img_class = $c . '_img_third_class';
                                $image = $val_main->$header_img_third;
                                $img_name = explode('/', $image);
                                $img_nm = $img_name[count($img_name) - 1];
                                $img_name = 'arp_' . time() . '_' . $img_nm;
                                
                                $base_url = trim($image);
                                $new_path = $upload_dir_path . $img_name;
                                $new_url = $upload_dir_url . $img_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $html = "<img src='" . $new_url . "'";
                                if (isset($val_main->$image_height) and ! empty($val_main->$image_height)) {
                                    $html .= " height='" . $val_main->$image_height . "'";
                                }
                                if (isset($val_main->$image_width) and ! empty($val_main->$image_width)) {
                                    $html .= " width='" . $val_main->$image_width . "'";
                                }
                                if (isset($val_main->$img_class) and ! empty($val_main->$img_class)) {
                                    $html .= " class='" . $val_main->$img_class . "'";
                                }
                                $html .= " >";
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $html;
                            }

                            if ($val_main->$gmap_marker != "") {
                                $gmap_img = $c . "_gmap_marker";
                                $gmap_image = $val_main->$gmap_img;
                                $gmap_img_nm = explode('/', $gmap_image);
                                $gmap_img_nm = $gmap_img_nm[count($gmap_img_nm) - 1];
                                $gmap_img_name = 'arp_' . time() . '_' . $gmap_img_nm;
                                
                                $base_url = trim($gmap_image);
                                $new_path = $upload_dir_path . $gmap_img_name;
                                $new_url = $upload_dir_url . $gmap_img_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                
                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(marker_image)="[^"]+"#', ' marker_image="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }

                            if ($val_main->$html5_mp4_video != "") {
                                $html5_mp4_video = $c . "_html5_mp4_video";
                                $h5_mp4_video = $val_main->$html5_mp4_video;
                                $h5_mp4_video_nm = explode('/', $h5_mp4_video);
                                $h5_mp4_video_nm = $h5_mp4_video_nm[count($h5_mp4_video_nm) - 1];
                                $h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;
                                
                                $base_url = trim($h5_mp4_video);
                                $new_path = $upload_dir_path . $h5_mp4_video_name;
                                $new_url = $upload_dir_url . $h5_mp4_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

                                    $arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'mp4' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                
                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                                $column_opts['columns'][$c]['arp_header_shortcode'];
                            }
                            if ($val_main->$html5_mp4_video_second != "") {
                                $html5_mp4_video = $c . "_html5_mp4_video_second";
                                $h5_mp4_video = $val_main->$html5_mp4_video_second;
                                $h5_mp4_video_nm = explode('/', $h5_mp4_video);
                                $h5_mp4_video_nm = $h5_mp4_video_nm[count($h5_mp4_video_nm) - 1];
                                $h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm; 

                                $base_url = trim($h5_mp4_video);
                                $new_path = $upload_dir_path . $h5_mp4_video_name;
                                $new_url = $upload_dir_url . $h5_mp4_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'mp4' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_mp4_video_third != "") {
                                $html5_mp4_video = $c . "_html5_mp4_video_third";
                                $h5_mp4_video = $val_main->$html5_mp4_video_third;
                                $h5_mp4_video_nm = explode('/', $h5_mp4_video);
                                $h5_mp4_video_nm = $h5_mp4_video_nm[count($h5_mp4_video_nm) - 1];
                                $h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;

                                $base_url = trim($h5_mp4_video);
                                $new_path = $upload_dir_path . $h5_mp4_video_name;
                                $new_url = $upload_dir_url . $h5_mp4_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'mp4' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_webm_video != "") {
                                $html5_webm_video = $c . "_html5_webm_video";
                                $h5_webm_video = $val_main->$html5_webm_video;
                                $h5_webm_video_nm = explode('/', $h5_webm_video);
                                $h5_webm_video_nm = $h5_webm_video_nm[count($h5_webm_video_nm) - 1];
                                $h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

                                $base_url = trim($h5_webm_video);
                                $new_path = $upload_dir_path . $h5_webm_video_name;
                                $new_url = $upload_dir_url . $h5_webm_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'webm' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_webm_video_second != "") {
                                $html5_webm_video = $c . "_html5_webm_video_second";
                                $h5_webm_video = $val_main->$html5_webm_video_second;
                                $h5_webm_video_nm = explode('/', $h5_webm_video);
                                $h5_webm_video_nm = $h5_webm_video_nm[count($h5_webm_video_nm) - 1];
                                $h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

                                $base_url = trim($h5_webm_video);
                                $new_path = $upload_dir_path . $h5_webm_video_name;
                                $new_url = $upload_dir_url . $h5_webm_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'webm' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_webm_video_third != "") {
                                $html5_webm_video = $c . "_html5_webm_video_third";
                                $h5_webm_video = $val_main->$html5_webm_video_third;
                                $h5_webm_video_nm = explode('/', $h5_webm_video);
                                $h5_webm_video_nm = $h5_webm_video_nm[count($h5_webm_video_nm) - 1];
                                $h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

                                $base_url = trim($h5_webm_video);
                                $new_path = $upload_dir_path . $h5_webm_video_name;
                                $new_url = $upload_dir_url . $h5_webm_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'webm' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_ogg_video != "") {
                                $html5_ogg_video = $c . "_html5_ogg_video";
                                $h5_ogg_video = $val_main->$html5_ogg_video;
                                $h5_ogg_video_nm = explode('/', $h5_ogg_video);
                                $h5_ogg_video_nm = $h5_ogg_video_nm[count($h5_ogg_video_nm) - 1];
                                $h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

                                $base_url = trim($h5_ogg_video);
                                $new_path = $upload_dir_path . $h5_ogg_video_name;
                                $new_url = $upload_dir_url . $h5_ogg_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'ogg', 'ogv', 'oga', 'ogx', 'ogm', 'spx', 'opus' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_ogg_video_second != "") {
                                $html5_ogg_video = $c . "_html5_ogg_video_second";
                                $h5_ogg_video = $val_main->$html5_ogg_video_second;
                                $h5_ogg_video_nm = explode('/', $h5_ogg_video);
                                $h5_ogg_video_nm = $h5_ogg_video_nm[count($h5_ogg_video_nm) - 1];
                                $h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

                                $base_url = trim($h5_ogg_video);
                                $new_path = $upload_dir_path . $h5_ogg_video_name;
                                $new_url = $upload_dir_url . $h5_ogg_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'ogg', 'ogv', 'oga', 'ogx', 'ogm', 'spx', 'opus' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_ogg_video_third != "") {
                                $html5_ogg_video = $c . "_html5_ogg_video_third";
                                $h5_ogg_video = $val_main->$html5_ogg_video_third;
                                $h5_ogg_video_nm = explode('/', $h5_ogg_video);
                                $h5_ogg_video_nm = $h5_ogg_video_nm[count($h5_ogg_video_nm) - 1];
                                $h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

                                $base_url = trim($h5_ogg_video);
                                $new_path = $upload_dir_path . $h5_ogg_video_name;
                                $new_url = $upload_dir_url . $h5_ogg_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'ogg', 'ogv', 'oga', 'ogx', 'ogm', 'spx', 'opus' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_video_poster != "") {
                                $html5_video_poster = $c . '_html5_video_poster';
                                $h5_video_poster = $val_main->$html5_video_poster;
                                $h5_video_poster_nm = explode('/', $h5_video_poster);
                                $h5_video_poster_nm = $h5_video_poster_nm[count($h5_video_poster_nm) - 1];
                                $h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

                                $base_url = trim($h5_video_poster);
                                $new_path = $upload_dir_path . $h5_video_poster_name;
                                $new_url = $upload_dir_url . $h5_video_poster_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_video_poster_second != "") {
                                $html5_video_poster = $c . '_html5_video_poster_second';
                                $h5_video_poster = $val_main->$html5_video_poster_second;
                                $h5_video_poster_nm = explode('/', $h5_video_poster);
                                $h5_video_poster_nm = $h5_video_poster_nm[count($h5_video_poster_nm) - 1];
                                $h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

                                $base_url = trim($h5_video_poster);
                                $new_path = $upload_dir_path . $h5_video_poster_name;
                                $new_url = $upload_dir_url . $h5_video_poster_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_video_poster_third != "") {
                                $html5_video_poster = $c . '_html5_video_poster_third';
                                $h5_video_poster = $val_main->$html5_video_poster_third;
                                $h5_video_poster_nm = explode('/', $h5_video_poster);
                                $h5_video_poster_nm = $h5_video_poster_nm[count($h5_video_poster_nm) - 1];
                                $h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

                                $base_url = trim($h5_video_poster);
                                $new_path = $upload_dir_path . $h5_video_poster_name;
                                $new_url = $upload_dir_url . $h5_video_poster_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_mp3_audio != "") {
                                $h5_mp3_audio = $val_main->$html5_mp3_audio;
                                $h5_mp3_audio_nm = explode('/', $h5_mp3_audio);
                                $h5_mp3_audio_nm = $h5_mp3_audio_nm[count($h5_mp3_audio_nm) - 1];
                                $h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

                                $base_url = trim($h5_mp3_audio);
                                $new_path = $upload_dir_path . $h5_mp3_audio_name;
                                $new_url = $upload_dir_url . $h5_mp3_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'mp3' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_mp3_audio_second != "") {
                                $h5_mp3_audio = $val_main->$html5_mp3_audio_second;
                                $h5_mp3_audio_nm = explode('/', $h5_mp3_audio);
                                $h5_mp3_audio_nm = $h5_mp3_audio_nm[count($h5_mp3_audio_nm) - 1];
                                $h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

                                $base_url = trim($h5_mp3_audio);
                                $new_path = $upload_dir_path . $h5_mp3_audio_name;
                                $new_url = $upload_dir_url . $h5_mp3_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'mp3' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_mp3_audio_third != "") {
                                $h5_mp3_audio = $val_main->$html5_mp3_audio_third;
                                $h5_mp3_audio_nm = explode('/', $h5_mp3_audio);
                                $h5_mp3_audio_nm = $h5_mp3_audio_nm[count($h5_mp3_audio_nm) - 1];
                                $h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

                                $base_url = trim($h5_mp3_audio);
                                $new_path = $upload_dir_path . $h5_mp3_audio_name;
                                $new_url = $upload_dir_url . $h5_mp3_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'mp3' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_ogg_audio != "") {
                                $h5_ogg_audio = $val_main->$html5_ogg_audio;
                                $h5_ogg_audio_nm = explode('/', $h5_ogg_audio);
                                $h5_ogg_audio_nm = $h5_ogg_audio_nm[count($h5_ogg_audio_nm) - 1];
                                $h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

                                $base_url = trim($h5_ogg_audio);
                                $new_path = $upload_dir_path . $h5_ogg_audio_name;
                                $new_url = $upload_dir_url . $h5_ogg_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'ogg', 'ogv', 'oga', 'ogx', 'ogm', 'spx', 'opus' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_ogg_audio_second != "") {
                                $h5_ogg_audio = $val_main->$html5_ogg_audio_second;
                                $h5_ogg_audio_nm = explode('/', $h5_ogg_audio);
                                $h5_ogg_audio_nm = $h5_ogg_audio_nm[count($h5_ogg_audio_nm) - 1];
                                $h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

                                $base_url = trim($h5_ogg_audio);
                                $new_path = $upload_dir_path . $h5_ogg_audio_name;
                                $new_url = $upload_dir_url . $h5_ogg_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'ogg', 'ogv', 'oga', 'ogx', 'ogm', 'spx', 'opus' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_ogg_audio_third != "") {
                                $h5_ogg_audio = $val_main->$html5_ogg_audio_third;
                                $h5_ogg_audio_nm = explode('/', $h5_ogg_audio);
                                $h5_ogg_audio_nm = $h5_ogg_audio_nm[count($h5_ogg_audio_nm) - 1];
                                $h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

                                $base_url = trim($h5_ogg_audio);
                                $new_path = $upload_dir_path . $h5_ogg_audio_name;
                                $new_url = $upload_dir_url . $h5_ogg_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'ogg', 'ogv', 'oga', 'ogx', 'ogm', 'spx', 'opus' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_wav_audio != "") {
                                $h5_wav_audio = $val_main->$html_wav_audio;
                                $h5_wav_audio_nm = explode('/', $h5_wav_audio);
                                $h5_wav_audio_nm = $h5_wav_audio_nm[count($h5_wav_audio_nm) - 1];
                                $h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

                                $base_url = trim($h5_wav_audio);
                                $new_path = $upload_dir_path . $h5_wav_audio_name;
                                $new_url = $upload_dir_url . $h5_wav_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'wav' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_wav_audio_second != "") {
                                $h5_wav_audio = $val_main->$html_wav_audio_second;
                                $h5_wav_audio_nm = explode('/', $h5_wav_audio);
                                $h5_wav_audio_nm = $h5_wav_audio_nm[count($h5_wav_audio_nm) - 1];
                                $h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

                                $base_url = trim($h5_wav_audio);
                                $new_path = $upload_dir_path . $h5_wav_audio_name;
                                $new_url = $upload_dir_url . $h5_wav_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'wav' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_wav_audio_third != "") {
                                $h5_wav_audio = $val_main->$html_wav_audio_third;
                                $h5_wav_audio_nm = explode('/', $h5_wav_audio);
                                $h5_wav_audio_nm = $h5_wav_audio_nm[count($h5_wav_audio_nm) - 1];
                                $h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

                                $base_url = trim($h5_wav_audio);
                                $new_path = $upload_dir_path . $h5_wav_audio_name;
                                $new_url = $upload_dir_url . $h5_wav_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_specific_ext = true;
                                    $arpfileobj->allowed_ext = array( 'wav' );

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$btn_img != "") {
                                $btn_image = $c . "_btn_img";
                                $button_img = $val_main->$btn_image;
                                $image_name = explode('/', $button_img);
                                $image_nm = $image_name[count($image_name) - 1];
                                $image_name = 'arp_' . time() . '_' . $image_nm;

                                $base_url = trim($button_img);
                                $new_path = $upload_dir_path . $image_name;
                                $new_url = $upload_dir_url . $image_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $column_opts['columns'][$c]['btn_img'] = $new_url;
                            }

                            if ($val_main->$column_back_image != "") {
                                $col_image = $c . "_background_image";
                                $column_img = $val_main->$column_back_image;
                                $col_image_name = explode('/', $column_img);
                                $col_image_nm = $col_image_name[count($col_image_name) - 1];
                                $col_image_name = 'arp_' . time() . '_' . $col_image_nm;
                                
                                $base_url = trim($column_img);
                                $new_path = $upload_dir_path . $col_image_name;
                                $new_url = $upload_dir_url . $col_image_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    $arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $column_opts['columns'][$c]['column_background_image'] = $new_url;
                            }
                        }

                        $column_options = serialize($column_opts);
                    }
                }

                $wpdb->query($wpdb->prepare('INSERT INTO ' . $table . ' (table_name,general_options,is_template,is_animated,status,create_date,arp_last_updated_date) VALUES (%s,%s,%d,%d,%s,%s,%s)', $table_name, $general_options, 0, $is_animated, $status, $date, $date));

                $new_id = $wpdb->insert_id;

                $select = $wpdb->get_results($wpdb->prepare('SELECT general_options FROM ' . $table . ' WHERE ID = %d', $new_id));
                $options = maybe_unserialize($select[0]->general_options);
                $arp_custom_css = isset($options['general_settings']['arp_custom_css']) ? $options['general_settings']['arp_custom_css'] : '';
                $arp_custom_css = preg_replace('/arptemplate_(\d+)/', 'arptemplate_' . $new_id, $arp_custom_css);
                $arp_custom_css = preg_replace('/arp_price_table_(\d+)/', 'arp_price_table_' . $new_id, $arp_custom_css);
                $options['general_settings']['arp_custom_css'] = ($arp_custom_css);
                $general_options = maybe_serialize($options);

                $wpdb->query($wpdb->prepare("UPDATE " . $table . " SET general_options = %s WHERE ID = %d", $general_options, $new_id));

                $ref_id = str_replace('arptemplate_', '', $reference_template);

                if ($ref_id >= 20) {
                    $ref_id = $ref_id - 3;
                    $reference_template = 'arptemplate_' . $ref_id;
                }

                $file = PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css';

                $content = ARPFilecontroller::arp_get_file_content($file);

                $css_content = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $new_id, $content);

                $css_content = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_content);

                $css_file_name = 'arptemplate_' . $new_id . '.css';

                $template_img_name = 'arptemplate_' . $new_id . '.png';
                $template_img_big_name = 'arptemplate_' . $new_id . '_big.png';
                $template_img_large_name = 'arptemplate_' . $new_id . '_large.png';

                $arpfileobj = new ARPFilecontroller( $arp_template_img, true );

                $arpfileobj->check_cap = true;
                $arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

                $arpfileobj->check_nonce = true;
                $arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
                $arpfileobj->nonce_action = 'arprice_wp_nonce';

                $arpfileobj->check_only_image = true;

                $destination = $upload_dir_path . 'template_images/' . $template_img_name;

                $arpfileobj->arp_process_upload( $destination );

                if ( false == $arpfileobj ) {
                    $arpfileobj = new ARPFilecontroller( PRICINGTABLE_DIR . '/images/' . $arp_main_reference_template . '.png', true );

                    $arpfileobj->check_cap = true;
                    $arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

                    $arpfileobj->check_nonce = true;
                    $arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
                    $arpfileobj->nonce_action = 'arprice_wp_nonce';

                    $arpfileobj->check_only_image = true;

                    $destination = $upload_dir_path . 'template_images/' . $template_img_name;

                    $arpfileobj->arp_process_upload( $destination );
                }

                $arpfileobj = new ARPFilecontroller( $arp_template_img_big, true );

                $arpfileobj->check_cap = true;
                $arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

                $arpfileobj->check_nonce = true;
                $arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
                $arpfileobj->nonce_action = 'arprice_wp_nonce';

                $arpfileobj->check_only_image = true;

                $destination = $upload_dir_path . 'template_images/' . $template_img_big_name;

                $arpfileobj->arp_process_upload( $destination );

                if ( false == $arpfileobj ) {
                    $arpfileobj = new ARPFilecontroller( PRICINGTABLE_DIR . '/images/' . $arp_main_reference_template . '_big.png', true );

                    $arpfileobj->check_cap = true;
                    $arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

                    $arpfileobj->check_nonce = true;
                    $arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
                    $arpfileobj->nonce_action = 'arprice_wp_nonce';

                    $arpfileobj->check_only_image = true;

                    $destination = $upload_dir_path . 'template_images/' . $template_img_big_name;

                    $arpfileobj->arp_process_upload( $destination );
                }

                $arpfileobj = new ARPFilecontroller( $arp_template_img_large, true );

                $arpfileobj->check_cap = true;
                $arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

                $arpfileobj->check_nonce = true;
                $arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
                $arpfileobj->nonce_action = 'arprice_wp_nonce';

                $arpfileobj->check_only_image = true;

                $destination = $upload_dir_path . 'template_images/' . $template_img_large_name;

                $arpfileobj->arp_process_upload( $destination );

                if ( false == $arpfileobj ) {
                    $arpfileobj = new ARPFilecontroller( PRICINGTABLE_DIR . '/images/' . $arp_main_reference_template . '_large.png', true );

                    $arpfileobj->check_cap = true;
                    $arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

                    $arpfileobj->check_nonce = true;
                    $arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
                    $arpfileobj->nonce_action = 'arprice_wp_nonce';

                    $arpfileobj->check_only_image = true;

                    $destination = $upload_dir_path . 'template_images/' . $template_img_large_name;

                    $arpfileobj->arp_process_upload( $destination );
                }


                global $wp_filesystem;

                $wp_filesystem->put_contents(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name, $css_content, 0777);

                $wpdb->query($wpdb->prepare('INSERT INTO ' . $table_opt . ' (table_id,table_options) VALUES (%d,%s)', $new_id, $column_options));
                $j++;
            }

            unset($_SESSION['arprice_image_array']);
            return $new_id;
        } else if (!isset($xml->arp_table)) {
            unset($_SESSION['arprice_image_array']);
            return 0;
        }

    }

    function arp_is_license_active(){
	return true;

        $setact = 0;

        global $arprice_class, $arp_chk_version;

        $setact = 1;

        return $setact;

    }

    function arp_fix_broken_html(){

        $arphtml = isset($_REQUEST['arpContent']) ? $_REQUEST['arpContent'] : '';
        $arphtml = stripslashes($arphtml);

        $arpdom = new DOMDocument();
        $arpdom->loadHTML( $arphtml );

        $arphtml = $arpdom->saveHTML( $arpdom->getElementsByTagName('body')->item(0) );
        $arphtml = preg_replace( '/<\/?body>/', '', $arphtml );

        echo $arphtml;
        exit;
    }

    function arp_import_pricing_table_data_callback(){
        global $wpdb,$arp_pricingtable;

        $old_data = isset($_REQUEST['old_table']) ? $_REQUEST['old_table'] : '';
        $new_data = isset($_REQUEST['new_table']) ? $_REQUEST['new_table'] : '';
        $return = array();
        if( $old_data == '' ){
            $return['error'] = true;
            $return['message'] = esc_html__('Something went wrong, while importing data. Please try again','ARPrice');
        } else if( $new_data == '' ){
            $return['error'] = true;
            $return['message'] = esc_html__('Something went wrong, while importing data. Please try again','ARPrice');
        } else {

            $old_data_array = explode('||',$old_data);
            $new_data_array = explode('||',$new_data);

            $old_data_id = $old_data_array[1];
            $new_data_id = $new_data_array[1];

            $old_table_options = $wpdb->get_row( $wpdb->prepare("SELECT table_options FROM `".$wpdb->prefix."arp_arprice_options` WHERE table_id = %d",$old_data_id));
            $new_table_options = $wpdb->get_row( $wpdb->prepare("SELECT table_options FROM `".$wpdb->prefix."arp_arprice_options` WHERE table_id = %d",$new_data_id));

            $migrated_table = array();
            $migrated_table['columns'] = array();

            if( $new_table_options == '' ){
                $return['error'] = true;
                $return['message'] = esc_html__('Something went wrong, while importing data. Please try again','ARPrice');
            } else {
                $new_table_opt = maybe_unserialize($new_table_options->table_options);
                $old_table_opt = maybe_unserialize($old_table_options->table_options);

                $new_table_columns = $new_table_opt['columns'];
                $old_table_columns = $old_table_opt['columns'];

                $old_table_count = count($old_table_columns);
                $new_table_count = count($new_table_columns);

                $old_table_first_col_id = $this->arprice_get_array_first_key( $old_table_columns );
                $new_table_first_col_id = $this->arprice_get_array_first_key( $new_table_columns );

                $column_no = 0;
                $arp_old_template_caption_column = 0;
                if( $new_table_columns[$new_table_first_col_id]['is_caption'] == 0 && $old_table_columns[$old_table_first_col_id]['is_caption'] == 1 ){
                    $column_no = 1;
                    $arp_old_template_caption_column = 1;
                    $old_table_count = $old_table_count - 1;
                    $migrated_table['columns']['column_0'] = $old_table_columns[$old_table_first_col_id];
                    $migrated_table['columns']['column_0']['rows'] = array();
                }
                $add_extra_column = false;
                $more_column_from = 0;
                if( $new_table_count > $old_table_count ){
                    $add_extra_column = true;
                    $more_column_from = $new_table_count - $old_table_count;
                }

                $column_keys = $arp_pricingtable->arp_import_column_data_keys();

                $column_order = array();

                $sorted_new_columns = array();
                $old_col_id = 0;

                foreach( $new_table_columns as $i => $n ){
                    $sorted_new_columns['column_'.$old_col_id] = $n;
                    $old_col_id++;
                }

                foreach( $sorted_new_columns as $k => $val ){
                    if( $k == $old_table_first_col_id && $val['is_caption'] == 1 && $old_table_columns[$old_table_first_col_id]['is_caption'] == 0 ){
                        continue;
                    } else {

                        foreach( $val as $i => $v ){
                            
                            if( $i != 'rows' && in_array($i,$column_keys) ){
                                $migrated_table['columns']['column_'.$column_no][$i] = isset($sorted_new_columns[$k][$i]) ? $sorted_new_columns[$k][$i] : '';
                            } else {
                                if( $i == 'rows' ){
                                    foreach( $val['rows'] as $j => $m ){
                                        if( in_array($j,$column_keys['rows']) ){
                                            $migrated_table['columns']['column_'.$column_no][$i][$j] = isset($sorted_new_columns[$k][$i][$j]) ? $sorted_new_columns[$k][$i][$j] : '';
                                        } else {
                                            $migrated_table['columns']['column_'.$column_no][$i][$j] = isset($sorted_new_columns[$k][$i][$j]) ? $sorted_new_columns[$k][$i][$j] : '';
                                        }

                                        if( $k == $old_table_first_col_id && $arp_old_template_caption_column == 1 ){

                                            if( isset($old_table_columns[$old_table_first_col_id][$i][$j]) ){
                                                $migrated_table['columns']['column_0'][$i][$j] = $old_table_columns[$old_table_first_col_id][$i][$j];
                                            } else {
                                                foreach ($m as $mk => $mv) {
                                                    $migrated_table['columns']['column_0'][$i][$j][$mk] = '';
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    if( $add_extra_column == true && $more_column_from <= $column_no ){
                                        $ik = $more_column_from;
                                        $prev_k = 'column_'.$ik;
                                        $migrated_table['columns']['column_'.$column_no][$i] = isset($old_table_columns[$prev_k][$i]) ? $old_table_columns[$prev_k][$i] : '';
                                    } else {
                                        if( $arp_old_template_caption_column == 1 ){
                                            $migrated_table['columns']['column_'.$column_no][$i] = isset($old_table_columns['column_'.$column_no][$i]) ? $old_table_columns['column_'.$column_no][$i] : '';
                                        } else {
                                            $migrated_table['columns']['column_'.$column_no][$i] = isset($old_table_columns[$k][$i]) ? $old_table_columns[$k][$i] : '';
                                        }
                                    }
                                }
                            }
                        }

                        if( $k == $old_table_first_col_id && $arp_old_template_caption_column == 1 ){
                            array_push($column_order,'main_column_0');
                        }
                    }
                    array_push($column_order,'main_column_'.$column_no);
                    $column_no++;
                }

                $new_column_counter = count($migrated_table['columns']);

                $migrated_column = maybe_serialize($migrated_table);
                
                if( $wpdb->update( $wpdb->prefix.'arp_arprice_options',array('table_options'=>$migrated_column),array('table_id'=>$old_data_id) ) ){

                    $table_opts = $wpdb->get_row($wpdb->prepare("SELECT general_options FROM `".$wpdb->prefix."arp_arprice` WHERE ID = %d",$old_data_id));

                    $general_opt = maybe_unserialize($table_opts->general_options);

                    $general_opt['general_settings']['column_order'] = json_encode($column_order);;

                    $wpdb->update( $wpdb->prefix.'arp_arprice', array('general_options' => maybe_serialize($general_opt)),array('ID' => $old_data_id) );

                    $return['error'] = false;
                    $return['message'] = esc_html__('Data Imported Successfully. Please wait while loading table with new data','ARPrice').'....';
                } else {
                    $return['error'] = true;
                    $return['message'] = esc_html__('Something went wrong, while importing data. Please try again','ARPrice');
                }
            }

        }

        echo json_encode($return);
        die;
    }


    function arp_upload_image_from_admin(){
        global $arp_pricingtable;
        $fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

        if( $fn ){
            $wp_upload_dir = wp_upload_dir();

            $upload_main_dir = $wp_upload_dir['basedir'] . '/arprice/template_background_image/';

            $arpfileobj = new ARPFilecontroller( $_FILES['files'], false );

            if( !$arpfileobj ){
                echo 'error~|~'. $arpfileobj->error_message;
                die;
            }

            $arpfileobj->check_cap = true;
            $arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

            $arpfileobj->check_nonce = true;
            $arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
            $arpfileobj->nonce_action = 'arprice_wp_nonce';

            $arpfileobj->check_only_image = true;

            $arpfileobj->check_specific_ext = false;
            $arpfileobj->allowed_ext = array();

            $destination = $upload_main_dir . $fn;

            $upload_file = $arpfileobj->arp_process_upload( $destination );

            if( false == $upload_file ){
                echo "error~|~" . $arpfileobj->error_message;
                die;
            } else {
                echo $fn;
            }


        }
        die;
    }

    function arp_backup() {
        $databaseversion = get_option('arprice_version');
        update_option('old_db_version', $databaseversion);
    }

    function upgrade_data() {
        global $arp_newdbversion;

        if (!isset($arp_newdbversion) || $arp_newdbversion == "")
            $arp_newdbversion = get_option('arprice_version');
        
        if (version_compare($arp_newdbversion, '3.9', '<')) {
            $path = PRICINGTABLE_VIEWS_DIR . '/upgrade_latest_data.php';
            include($path);
        }
    }

    function arpreqlicdeact() {
        global $arprice_class;
        $plugres = $arprice_class->arpdeactivatelicense();

        if (isset($plugres) && $plugres != "") {
            echo $plugres;
            exit;
        } else {
            echo "Invalid Request";
            exit;
        }
        exit;
    }

    function arpdeactivatelicense() {
        global $arprice_class;
        $siteinfo = array();

        $siteinfo[] = get_bloginfo('name');
        $siteinfo[] = $_SERVER['SERVER_ADDR'];
        $siteinfo[] = $_SERVER["HTTP_HOST"];
        $siteinfo[] = ARPURL;
        $siteinfo[] = get_option("arprice_version");

        $newstr = implode("||", $siteinfo);
        $postval = base64_encode($newstr);

        $verifycode = get_option("arpSortOrder");

        if (isset($verifycode) && $verifycode != "") {
            $urltopost = "http://www.reputeinfosystems.com/tf/plugins/arprice/verify/lic_de_act.php";


            $response = wp_remote_post($urltopost, array(
                'method' => 'POST',
                'timeout' => 45,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(),
                'body' => array('verifypurchase' => $verifycode, 'postval' => $postval),
                'cookies' => array()
                    )
            );

            if (array_key_exists('body', $response) && isset($response["body"]) && $response["body"] != "") {
                $responsemsg = $response["body"];
            } else {
                $responsemsg = "";
            }

            $chkplugver = $arprice_class->chkplugversionth($responsemsg);

            return $chkplugver;
            exit;
        }
        else {
            $resp = "Invalid Request";
            return $resp;
            exit;
        }
    }

    function getwpversion() {
        global $arprice_class;
        global $arprice_version;
        $bloginformation = array();
        $str = $arprice_class->get_rand_alphanumeric(10);

        if (is_multisite()) {
            $multisiteenv = "Multi Site";
        } else {
            $multisiteenv = "Single Site";
        }

        $bloginformation[] = get_bloginfo('name');
        $bloginformation[] = get_bloginfo('description');
        $bloginformation[] = home_url();
        $bloginformation[] = '';
        $bloginformation[] = get_bloginfo('version');
        $bloginformation[] = get_bloginfo('language');
        $bloginformation[] = $arprice_version;
        $bloginformation[] = $_SERVER['REMOTE_ADDR'];
        $bloginformation[] = $str;
        $bloginformation[] = $multisiteenv;

        $arprice_class->checksite($str);

        $valstring = implode("||", $bloginformation);
        $encodedval = base64_encode($valstring);

        $urltopost = "http://reputeinfosystems.net/arprice/wp_in.php";
        $response = wp_remote_post($urltopost, array(
            'method' => 'POST',
            'timeout' => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(),
            'body' => array('wpversion' => $encodedval),
            'cookies' => array()
                )
        );
    }

    function get_rand_alphanumeric($length) {
        global $arprice_class;
        global $MdlDb;
        if ($length > 0) {
            $rand_id = "";
            for ($i = 1; $i <= $length; $i++) {
                mt_srand((double) microtime() * 1000000);
                $num = mt_rand(1, 36);
                $rand_id .= $arprice_class->assign_rand_value($num);
            }
        }
        return $rand_id;
    }

    function assign_rand_value($num) {

        switch ($num) {
            case "1" : $rand_value = "a";
                break;
            case "2" : $rand_value = "b";
                break;
            case "3" : $rand_value = "c";
                break;
            case "4" : $rand_value = "d";
                break;
            case "5" : $rand_value = "e";
                break;
            case "6" : $rand_value = "f";
                break;
            case "7" : $rand_value = "g";
                break;
            case "8" : $rand_value = "h";
                break;
            case "9" : $rand_value = "i";
                break;
            case "10" : $rand_value = "j";
                break;
            case "11" : $rand_value = "k";
                break;
            case "12" : $rand_value = "l";
                break;
            case "13" : $rand_value = "m";
                break;
            case "14" : $rand_value = "n";
                break;
            case "15" : $rand_value = "o";
                break;
            case "16" : $rand_value = "p";
                break;
            case "17" : $rand_value = "q";
                break;
            case "18" : $rand_value = "r";
                break;
            case "19" : $rand_value = "s";
                break;
            case "20" : $rand_value = "t";
                break;
            case "21" : $rand_value = "u";
                break;
            case "22" : $rand_value = "v";
                break;
            case "23" : $rand_value = "w";
                break;
            case "24" : $rand_value = "x";
                break;
            case "25" : $rand_value = "y";
                break;
            case "26" : $rand_value = "z";
                break;
            case "27" : $rand_value = "0";
                break;
            case "28" : $rand_value = "1";
                break;
            case "29" : $rand_value = "2";
                break;
            case "30" : $rand_value = "3";
                break;
            case "31" : $rand_value = "4";
                break;
            case "32" : $rand_value = "5";
                break;
            case "33" : $rand_value = "6";
                break;
            case "34" : $rand_value = "7";
                break;
            case "35" : $rand_value = "8";
                break;
            case "36" : $rand_value = "9";
                break;
        }
        return $rand_value;
    }

    function checksite($str) {
        update_option('arp_wp_get_version', $str);
    }

    function chkplugversionth($myresponse) {
        if ($myresponse != "" && $myresponse == 1) {
            global $arprice_class;
            global $MdlDb;
            $new_key = '';

            $new_key = rand();

            $thresp = $arprice_class->checkthisvalidresp($new_key);

            if ($thresp == 1) {
                return "License Deactivted Sucessfully.";
                exit;
            } else {
                $resp = "Invalid Request";
                return $resp;
                exit;
            }
        } else {
            $resp = "Invalid Request";
            return $resp;
            exit;
        }
    }

    function checkthisvalidresp($new_key) {
        if ($new_key != "") {
            delete_option("arpIsSorted");
            delete_option("arpSortOrder");
            delete_option("arpSortId");
            delete_option("arpSortInfo");

            delete_site_option("arpIsSorted");
            delete_site_option("arpSortOrder");
            delete_site_option("arpSortId");
            delete_site_option("arpSortInfo");

            return "1";
            exit;
        } else {
            $resp = "Invalid Request";
            return $resp;
            exit;
        }
    }

    function arpreqact() {
        global $arprice_class;
        $plugres = $arprice_class->arpverifypurchasecode();

        if (isset($plugres) && $plugres != "") {
            $responsetext = $plugres;

            if ($responsetext == "License Activated Successfully.") {
                echo "VERIFIED";
                exit;
            } else {
                echo $plugres;
                exit;
            }
        } else {
            echo "Invalid Request";
            exit;
        }
    }

    function check_arp_version() {
        global $arnotifymodel;

        $sortorder = get_option("arpSortOrder");
        $sortid = get_option("arpSortId");
        $issorted = get_option("arpIsSorted");
        $isinfo = get_option("arpSortInfo");

        if ($sortorder == "" || $sortid == "" || $issorted == "") {
            return 0;
        } else {
            $sortfield = $sortorder;
            $sortorderval = base64_decode($sortfield);

            $ordering = array();
            $ordering = explode("^", $sortorderval);

            $domain_name = str_replace('www.', '', $ordering[3]);
            $recordid = $ordering[4];
            $ipaddress = $ordering[5];

            $mysitename = get_bloginfo('name');
            $siteipaddr = $_SERVER['SERVER_ADDR'];
            $mysitedomain = str_replace('www.', '', $_SERVER["SERVER_NAME"]);
			$mysitedomain1 = str_replace('www.', '', $_SERVER["HTTP_HOST"]);
			$mysitedomain2 = str_replace('www.', '', $_SERVER["SERVER_ADDR"]);
			
            if (($domain_name == $mysitedomain || $domain_name == $mysitedomain1 || $domain_name == $mysitedomain2) && ($recordid == $sortid)) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    function arpverifypurchasecode() {
        global $arprice_class;
        $lidata = array();

        $lidata[] = $_POST["cust_name"];
        $lidata[] = $_POST["cust_email"];
        $lidata[] = $_POST["license_key"];
        $lidata[] = $_POST["domain_name"];

        $pluginuniquecode = $arprice_class->generateplugincode();
        $lidata[] = $pluginuniquecode;
        $lidata[] = ARPURL;
        $lidata[] = get_option("arprice_version");

        $valstring = implode("||", $lidata);
        $encodedval = base64_encode($valstring);

        $urltopost = "http://www.reputeinfosystems.com/tf/plugins/arprice/verify/lic_act_with_resp.php";

        $response = wp_remote_post($urltopost, array(
            'method' => 'POST',
            'timeout' => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(),
            'body' => array('verifypurchase' => $encodedval),
            'cookies' => array()
                )
        );

        if (array_key_exists('body', $response) && isset($response["body"]) && $response["body"] != "")
            $responsemsg = $response["body"];
        else
            $responsemsg = "";


        if ($responsemsg != "") {
            $responsemsg = explode("|^|", $responsemsg);
            if (is_array($responsemsg) && count($responsemsg) > 0) {

                if (isset($responsemsg[0]) && $responsemsg[0] != "") {
                    $msg = $responsemsg[0];
                } else {
                    $msg = "";
                }
                if (isset($responsemsg[1]) && $responsemsg[1] != "") {
                    $code = $responsemsg[1];
                } else {
                    $code = "";
                }
                if (isset($responsemsg[2]) && $responsemsg[2] != "") {
                    $info = $responsemsg[2];
                } else {
                    $info = "";
                }

                if ($msg == "1") {
                    $checklic = $arprice_class->checksoringcode($code, $info);

                    if ($checklic == "1") {
                        return "License Activated Successfully.";
                        exit;
                    } else {
                        return "Invalid Request";
                        exit;
                    }
                } else if ($msg == "THIS PURCHASED CODE IS ALREADY USED FOR ANOTHER DOMAIN") {

                    return $responsemsg[0] . '||' . $responsemsg[1];
                    exit;
                } else {
                    return $responsemsg[0];
                    exit;
                }
            } else {
                return $responsemsg;
                exit;
            }
        } else {
            return "Invalid Request";
            exit;
        }
    }

    function checksoringcode($code, $info) {
        global $arprice_class;

        $mysortid = base64_decode($code);
        $mysortid = explode("^", $mysortid);

        if ($mysortid != "" && count($mysortid) > 0) {
            $setdata = $arprice_class->setdata($code, $info);

            return $setdata;
            exit;
        } else {
            return 0;
            exit;
        }
    }

    function setdata($code, $info) {
        if ($code != "") {
            $mysortid = base64_decode($code);
            $mysortid = explode("^", $mysortid);
            $mysortid = $mysortid[4];

            update_option("arpIsSorted", "Yes");
            update_option("arpSortOrder", $code);
            update_option("arpSortId", $mysortid);
            update_option("arpSortInfo", $info);

            return 1;
            exit;
        } else {
            return 0;
            exit;
        }
    }

    function generateplugincode() {
        $siteinfo = array();

        $siteinfo[] = get_bloginfo('name');
        $siteinfo[] = get_bloginfo('description');
        $siteinfo[] = home_url();
        $siteinfo[] = get_bloginfo('admin_email');
        $siteinfo[] = $_SERVER['SERVER_ADDR'];

        $newstr = implode("^", $siteinfo);
        $postval = base64_encode($newstr);

        return $postval;
    }

    function arprice_delete() {
        global $wpdb;
        $id = $_REQUEST['id'];
        $table = $wpdb->prefix . 'arp_arprice';
        $tbl_option = $wpdb->prefix . 'arp_arprice_options';
        $table_analytics = $wpdb->prefix . 'arp_arprice_analytics';

        $sql = $wpdb->get_row($wpdb->prepare('SELECT is_template FROM '. $table .' WHERE ID = %d', $id));

        $is_template = $sql->is_template;

        if ($is_template != 1) {
            if (file_exists(PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $id . '.css')) {
                unlink(PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $id . '.css');
            }
            if (file_exists(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $id . '.png')) {
                unlink(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $id . '.png');
                unlink(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $id . '_big.png');
                unlink(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $id . '_large.png');
            }
        }

        $wpdb->query($wpdb->prepare('DELETE FROM ' . $table . ' WHERE ID = %d', $id));

        $wpdb->query($wpdb->prepare('DELETE FROM ' . $tbl_option . ' WHERE table_id = %d', $id));

        $wpdb->query($wpdb->prepare('DELETE FROM ' . $table_analytics . ' WHERE pricing_table_id = %d', $id));

        die();
    }

    function arpgetapiurl() {
        $api_url = 'https://www.arpluginshop.com/';
        return $api_url;
    }

    function table_dropdown_widget($field_name = '', $field_id = '', $default_value = '') {
        global $wpdb;
        $tables = $wpdb->get_results($wpdb->prepare("SELECT ID, table_name FROM " . $wpdb->prefix . "arp_arprice WHERE status = '%s' and is_template != '%d'", array('published', '1')));
        $price_tabel = '';
        if ($tables) {
            $price_tabel .= '<select name="' . $field_name . '" id="' . $field_id . '" class="arp_table_list">';
            foreach ($tables as $table) {
                $price_tabel .= '<option value="' . $table->ID . '" ' . selected($table->ID, $default_value, false) . '>' . $table->table_name . ' (ID:'.$table->ID.')' . '</option>';
            }
            $price_tabel .= '</select>';
        }
        return $price_tabel;
    }

    function arp_import_old_templates() {
        WP_Filesystem();

        global $wpdb, $wp_filesystem, $arprice_version, $arprice_images_css_version;

        $is_new_installation = get_option('arp_is_new_installation');

        $arp_arprice_temp = $wpdb->prefix . 'arp_arprice_temp';
        $arp_arprice_options_temp = $wpdb->prefix . 'arp_arprice_options_temp';
        $arp_arprice_analytics_temp = $wpdb->prefix . 'arp_arprice_analytics_temp';

        $arp_arprice = $wpdb->prefix . 'arp_arprice';
        $arp_arprice_options = $wpdb->prefix . 'arp_arprice_options';
        $arp_arprice_analytics = $wpdb->prefix . 'arp_arprice_analytics';

        $old_templates = json_decode(stripslashes_deep($_POST['old_templates']), true);
        $css_directory = PRICINGTABLE_DIR . '/css/templates';
        if (empty($old_templates)) {
            $images = array();
            if ($wp_filesystem->is_dir($css_directory)) {
                $dir = $wp_filesystem->dirlist($css_directory);
                if (!empty($dir)) {
                    foreach ($dir as $template => $val) {
                        if (!preg_match('/' . $arprice_version . '/', $template)) {
                            $wp_filesystem->delete($css_directory . '/' . $template);
                            if (empty($images)) {
                                $images[] = str_replace('.css', '', $template);
                            } else {
                                array_push($images, str_replace('.css', '', $template));
                            }
                        }
                    }
                }
            }
            $img_dir = PRICINGTABLE_DIR . '/images';

            if (!empty($images)) {
                foreach ($images as $img) {
                    if (file_exists($img_dir . '/' . $img . '.png')) {
                        $wp_filesystem->delete($img_dir . '/' . $img . '.png');
                    }
                    if (file_exists($img_dir . '/' . $img . '_big.png')) {
                        $wp_filesystem->delete($img_dir . '/' . $img . '_big.png');
                    }
                    if (file_exists($img_dir . '/' . $img . '_large.png')) {
                        $wp_filesystem->delete($img_dir . '/' . $img . '_large.png');
                    }
                }
            }
        } else {
            $css_dir = PRICINGTABLE_DIR . '/css/templates';
            $img_dir = PRICINGTABLE_DIR . '/images/';

            foreach ($old_templates as $template) {

                $get_old_template = $wpdb->get_results($wpdb->prepare("SELECT * FROM $arp_arprice_temp WHERE ID = %d", $template));

                $result = $get_old_template[0];

                $imported_id = $result->ID;

                $reference_id = $result->template_name;

                $general_options = maybe_unserialize($result->general_options);

                $reference_template = $general_options['general_settings']['reference_template'];

                $general_options['column_settings']['column_wrapper_width_txtbox'] = 1000;
                $general_options['column_settings']['display_col_mobile'] = 1;
                $general_options['column_settings']['display_col_tablet'] = 3;

                $general_options['column_settings']['arp_load_first_time_after_migration'] = 1;

                $general_options['column_animation']['pagi_nav_btn'] = "pagination_bottom";
                $general_options['column_animation']['navi_nav_btn'] = "navigation";

                $column_hover_effect = $general_options['column_settings']['column_highlight_on_hover'];

                if ($col_hover_effect == '0') {
                    $general_options['column_settings']['column_highlight_on_hover'] = 'hover_effect';
                } else if ($col_hover_effect == '1') {
                    $general_options['column_settings']['column_highlight_on_hover'] = 'shadow_effect';
                } else {
                    $general_options['column_settings']['column_highlight_on_hover'] = 'no_effect';
                }

                $general_options['column_settings']['column_box_shadow_effect'] = 'shadow_style_none';
                if ($reference_template == 'arptemplate_2') {
                    $general_options['column_settings']['column_border_radius_top_left'] = $general_options['column_settings']['column_border_radius_top_right'] = $general_options['column_settings']['column_border_radius_bottom_left'] = $general_options['column_settings']['column_border_radius_bottom_right'] = 7;
                } else if ($reference_template == 'arptemplate_23') {
                    $general_options['column_settings']['column_border_radius_top_left'] = $general_options['column_settings']['column_border_radius_top_right'] = $general_options['column_settings']['column_border_radius_bottom_left'] = $general_options['column_settings']['column_border_radius_bottom_right'] = 6;
                } else if ($reference_template == 'arptemplate_22') {
                    $general_options['column_settings']['column_border_radius_top_left'] = $general_options['column_settings']['column_border_radius_top_right'] = $general_options['column_settings']['column_border_radius_bottom_left'] = $general_options['column_settings']['column_border_radius_bottom_right'] = 4;
                } else {
                    $general_options['column_settings']['column_border_radius_top_left'] = $general_options['column_settings']['column_border_radius_top_right'] = $general_options['column_settings']['column_border_radius_bottom_left'] = $general_options['column_settings']['column_border_radius_bottom_right'] = 0;
                }

                $general_options['tooltip_settings']['tooltip_trigger_type'] = 'hover';
                $general_options['tooltip_settings']['tooltip_display_style'] = 'default';

                $general_options = maybe_serialize($general_options);

                $query = $wpdb->prepare("INSERT INTO $arp_arprice ( table_name, template_name, general_options, is_template, is_animated, status, create_date, arp_last_updated_date ) VALUES ( %s,%d,%s,%d,%d,%s,%s,%s )", $result->table_name, 0, $general_options, 0, $result->is_animated, $result->status, $result->create_date, $result->arp_last_updated_date);

                $wpdb->query($query);

                $table_id = $wpdb->insert_id;

                $qry_analytic = $wpdb->prepare("UPDATE `$arp_arprice_analytics` SET `pricing_table_id` = %d WHERE `ref_template_id` = %d", $table_id, $template);

                $wpdb->query($qry_analytic);

                $get_old_options = $wpdb->get_results($wpdb->prepare("SELECT * FROM $arp_arprice_options_temp WHERE ID = %d", $imported_id));

                $result_opt = $get_old_options[0];

                $qry_opt = $wpdb->prepare("INSERT INTO $arp_arprice_options ( table_id, table_options ) VALUES ( %d, %s )", $table_id, $result_opt->table_options);

                $wpdb->query($qry_opt);

                $file = $css_directory . '/arptemplate_' . $reference_id . '.css';

                $new_file = PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $table_id . '.css';

                if ($reference_id == 0) {
                    $reference_id = $result->ref_table_name;
                    $file = PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $reference_id . '.css';
                }

                $file = $css_directory . '/' . $reference_template . '_v' . $arprice_images_css_version . '.css';

                $css = ARPFilecontroller::arp_get_file_content($file);

                $css_content = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $table_id, $css);
                $css_content = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_content);

                $wp_filesystem->put_contents($new_file, $css_content, 0777);

                
                $image_path = PRICINGTABLE_DIR . '/images';

                $upload_path = PRICINGTABLE_UPLOAD_DIR . '/template_images';

                $img_normal = $image_path . '/arptemplate_' . $reference_id . '.png';

                if ($result->is_template == 0) {
                    $img_normal = $upload_path . '/arptemplate_' . $reference_id . '.png';
                }

                $img_large = $image_path . '/arptemplate_' . $reference_id . '_large.png';

                if ($result->is_template == 0) {
                    $img_large = $upload_path . '/arptemplate_' . $reference_id . '_large.png';
                }

                $img_big = $image_path . '/arptemplate_' . $reference_id . '_big.png';

                if ($result->is_template == 0) {
                    $img_big = $upload_path . '/arptemplate_' . $reference_id . '_big.png';
                }

                $new_img_normal = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $table_id . '.png';

                $new_img_large = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $table_id . '_large.png';
                $new_img_big = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $table_id . '_big.png';

                $wp_filesystem->move($img_normal, $new_img_normal, true);

                $wp_filesystem->delete($img_normal);

                $wp_filesystem->move($img_large, $new_img_large, true);

                $wp_filesystem->delete($img_large);

                $wp_filesystem->move($img_big, $new_img_big, true);

                $wp_filesystem->delete($img_big);
            }

            $imported_ids = implode(',', $old_templates);
            $wpdb->query("DELETE FROM $arp_arprice_analytics WHERE ref_template_id NOT IN ( $imported_ids )");

            $wpdb->query("ALTER TABLE `$arp_arprice_analytics` DROP COLUMN `ref_template_id`");

            $sel_temp_tbl = $wpdb->get_results("SELECT ref_table_name,is_template FROM `$arp_arprice_temp` ORDER BY ID ASC ");

            if (!empty($sel_temp_tbl)) {
                $img_dir = PRICINGTABLE_DIR . '/images';
                $img_upload_dir = PRICINGTABLE_UPLOAD_DIR . '/template_images/';
                $css_dir = PRICINGTABLE_DIR . '/css/templates';
                $css_upload_dir = PRICINGTABLE_UPLOAD_DIR . '/css/';
                foreach ($sel_temp_tbl as $key => $val) {

                    $ref_table_name = $val->ref_table_name;
                    $is_template = $val->is_template;

                    $cssname = 'arptemplate_' . $ref_table_name . '.css';
                    $imgname = 'arptemplate_' . $ref_table_name . '.png';
                    $imglnme = 'arptemplate_' . $ref_table_name . '_big.png';
                    $imgbnme = 'arptemplate_' . $ref_table_name . '_large.png';

                    if ($is_template == 1) {
                        if (file_exists($css_dir . '/' . $cssname)) {
                            $wp_filesystem->delete($css_dir . '/' . $cssname);
                        }
                        if (file_exists($img_dir . '/' . $imgname)) {
                            $wp_filesystem->delete($img_dir . '/' . $imgname);
                        }
                        if (file_exists($img_dir . '/' . $imglnme)) {
                            $wp_filesystem->delete($img_dir . '/' . $imglnme);
                        }
                        if (file_exists($img_dir . '/' . $imgbnme)) {
                            $wp_filesystem->delete($img_dir . '/' . $imgbnme);
                        }
                    } else {
                        if (file_exists($css_upload_dir . '/' . $cssname)) {
                            $wp_filesystem->delete($css_upload_dir . '/' . $cssname);
                        }
                        if (file_exists($img_upload_dir . '/' . $imgname)) {
                            $wp_filesystem->delete($img_upload_dir . '/' . $imgname);
                        }
                        if (file_exists($img_upload_dir . '/' . $imglnme)) {
                            $wp_filesystem->delete($img_upload_dir . '/' . $imglnme);
                        }
                        if (file_exists($img_upload_dir . '/' . $imgbnme)) {
                            $wp_filesystem->delete($img_upload_dir . '/' . $imgbnme);
                        }
                    }
                }
            }


            $wpdb->query("DROP TABLE `$arp_arprice_temp` ");

            $wpdb->query("DROP TABLE `$arp_arprice_options_temp` ");
        }
        update_option('arp_is_dashboard_visited', 1);
        die();
    }

    function arp_get_remote_post_params($plugin_info = "") {
        global $wpdb;

        $action = "";
        $action = $plugin_info;

        if (!function_exists('get_plugins')) {
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        $plugin_list = get_plugins();
        $site_url = home_url();
        $plugins = array();

        $active_plugins = get_option('active_plugins');

        foreach ($plugin_list as $key => $plugin) {
            $is_active = in_array($key, $active_plugins);
            if (strpos(strtolower($plugin["Title"]), "arprice") !== false) {
                $name = substr($key, 0, strpos($key, "/"));
                $plugins[] = array("name" => $name, "version" => $plugin["Version"], "is_active" => $is_active);
            }
        }
        $plugins = json_encode($plugins);

        $theme = wp_get_theme();
        $theme_name = $theme->get("Name");
        $theme_uri = $theme->get("ThemeURI");
        $theme_version = $theme->get("Version");
        $theme_author = $theme->get("Author");
        $theme_author_uri = $theme->get("AuthorURI");

        $im = is_multisite();
        $sortorder = get_option("arpSortOrder");

        $post = array("wp" => get_bloginfo("version"), "php" => phpversion(), "mysql" => $wpdb->db_version(), "plugins" => $plugins, "tn" => $theme_name, "tu" => $theme_uri, "tv" => $theme_version, "ta" => $theme_author, "tau" => $theme_author_uri, "im" => $im, "sortorder" => $sortorder);

        return $post;
    }

    function arp_pricing_table_comparison(){
        $return = array();
        if( isset($_REQUEST['action']) && $_REQUEST['action'] == 'arp_check_table_differance' ){
            global $wpdb,$arp_pricingtable;

            $current_table = isset($_REQUEST['current_template']) ? $_REQUEST['current_template'] : '';
            $compare_table = isset($_REQUEST['selected_template']) ? $_REQUEST['selected_template'] : '';

            if( $current_table == '' ){
                $return['error'] = true;
                $return['error_msg'] = esc_html__('Table not found','ARPrice');
            } else if( $compare_table == '' ){
                $return['error'] = true;
                $return['error_msg'] = esc_html__('Table not found','ARPrice');
            } else {

                $current_table_opt = explode('||',$current_table);

                $current_table_id = $current_table_opt[1];

                $get_col_options = $wpdb->get_row($wpdb->prepare("SELECT table_options FROM `".$wpdb->prefix."arp_arprice_options` WHERE table_id = %d",$current_table_id));

                $current_table_options = maybe_unserialize($get_col_options->table_options);

                $total_columns = count($current_table_options['columns']);

                $first_column_id = $this->arprice_get_array_first_key( $current_table_options['columns'] );

                $total_rows = count($current_table_options['columns'][$first_column_id]['rows']);

                $current_table_arr = array(
                    'columns' => $total_columns,
                    'rows' => $total_rows
                );

                $compare_table_opt = explode('||',$compare_table);

                $new_table_id = $compare_table_opt[1];

                $new_template_options = $wpdb->get_row($wpdb->prepare("SELECT table_options FROM `".$wpdb->prefix."arp_arprice_options` WHERE table_id = %d",$new_table_id));

                $new_table_opts = maybe_unserialize($new_template_options->table_options);

                $new_total_columns = count($new_table_opts['columns']);

                $first_column_id = $this->arprice_get_array_first_key( $new_table_opts['columns'] );

                $new_total_rows = count($new_table_opts['columns'][$first_column_id]['rows']);

                $new_table_arr = array(
                    'columns' => $new_total_columns,
                    'rows' => $new_total_rows
                );

                $comparison_array = $arp_pricingtable->arp_pricing_table_compare();

                $current_table_section = $comparison_array[$current_table_opt[0]];
                $compare_table_section = $comparison_array[$compare_table_opt[0]];

                $different_sections = array_intersect( $compare_table_section,$current_table_section );

                $different_sections['current_table_status'] = $current_table_arr;
                $different_sections['new_table_status'] = $new_table_arr;

                $return['error'] = false;
                $return['success_msg'] = $different_sections;
            }

        } else {
            $return['error'] = true;
            $return['error_msg'] = esc_html__('Something went wrong while comparing table. Please try again.','ARPrice');
        }
        echo json_encode($return);
        die;
    }

    function arprice_get_array_first_key( $array ){

        if( function_exists( 'array_key_first') ){
            $first_array_key = array_key_first($array);
        } else {
            reset($array);
            $first_array_key = key($array);
        }
    
        return $first_array_key;

    }

}

?>