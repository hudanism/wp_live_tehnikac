<?php
global $wpdb, $arp_mainoptionsarr, $arp_coloptionsarr, $arprice_form;

/**
 * ARPrice Template 1
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 1';
$values['is_template'] = 1;
$values['template_name'] = 1;
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

$arp_pt_template_settings['template'] = 'arptemplate_1';
$arp_pt_template_settings['skin'] = 'multicolor';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3","main_column_4"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_1';
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


$arp_pt_column_settings['column_space'] = 0;
$arp_pt_column_settings['column_highlight_on_hover'] = 'hover_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 200;
$arp_pt_column_settings['hide_caption_colunmn'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1000;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 4;
$arp_pt_column_settings['arp_global_button_type'] = 'shadow';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '0';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';


$arp_pt_column_settings['arp_caption_row_border_size'] = '0';
$arp_pt_column_settings['arp_caption_row_border_style'] = 'solid';
$arp_pt_column_settings['arp_caption_row_border_color'] = '#c9c9c9';


$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#cecece';

$arp_pt_column_settings['arp_column_border_left'] = 0;
$arp_pt_column_settings['arp_column_border_right'] = 0;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;


$arp_pt_column_settings['arp_caption_border_size'] = '1';
$arp_pt_column_settings['arp_caption_border_style'] = 'solid';
$arp_pt_column_settings['arp_caption_border_color'] = '#cecece';

$arp_pt_column_settings['arp_caption_border_left'] = 1;
$arp_pt_column_settings['arp_caption_border_right'] = 0;
$arp_pt_column_settings['arp_caption_border_top'] = 1;
$arp_pt_column_settings['arp_caption_border_bottom'] = 1;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;




$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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

$arp_pt_column_settings['header_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['header_font_size_global'] = 28;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['price_font_size_global'] = 18;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Arial';
$arp_pt_column_settings['body_font_size_global'] = 16;
$arp_pt_column_settings['arp_body_text_alignment'] = 'center';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['footer_font_size_global'] = 12;
$arp_pt_column_settings['arp_footer_text_alignment'] = 'center';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['button_font_size_global'] = 17;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#85d538";
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = "#70b828";
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = "#e9e9e9";
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = "#e3e3e3";
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#85d538";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#5d9527';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = '#85d538';
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#70b828';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = '#e9e9e9';
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = '#e3e3e3';
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#364762';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#364762';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#364762';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#364762';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = '#364762';
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = '#364762';
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = '';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['column_align'] = 'left';

$column['column_0']['header_background_color'] = '#ffffff';
$column['column_0']['header_hover_background_color'] = '#ffffff';
$column['column_0']['header_font_family'] = 'Open Sans';
$column['column_0']['header_font_size'] = 26;
$column['column_0']['header_font_color'] = '#333333';
$column['column_0']['header_hover_font_color'] = '#333333';
$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_background_color'] = '';
$column['column_0']['price_hover_background_color'] = '';
$column['column_0']['price_font_family'] = 'Open Sans';
$column['column_0']['price_font_size'] = 18;

$column['column_0']['price_font_color'] = '#ffffff';
$column['column_0']['price_hover_font_color'] = '#ffffff';
$column['column_0']['price_label_style_bold'] = 'bold';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';



$column['column_0']['price_text_font_family'] = 'Open Sans';
$column['column_0']['price_text_font_size'] = 18;

$column['column_0']['price_text_font_color'] = '#ffffff';
$column['column_0']['price_text_hover_font_color'] = '#ffffff';
$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = '';
$column['column_0']['column_description_font_size'] = '';

$column['column_0']['column_description_font_color'] = '';
$column['column_0']['column_description_hover_font_color'] = '';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = 'Arial';
$column['column_0']['content_font_size'] = 16;

$column['column_0']['content_font_color'] = '#364762';
$column['column_0']['content_even_font_color'] = '#364762';
$column['column_0']['content_hover_font_color'] = '#364762';
$column['column_0']['content_even_hover_font_color'] = '#364762';
$column['column_0']['content_odd_color'] = '#f6f4f5';
$column['column_0']['content_odd_hover_color'] = '#f6f4f5';
$column['column_0']['content_even_color'] = '#f1f1f1';
$column['column_0']['content_even_hover_color'] = '#f1f1f1';

$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['button_background_color'] = '';
$column['column_0']['button_hover_background_color'] = '';
$column['column_0']['button_font_family'] = 'Open Sans Bold';
$column['column_0']['button_font_size'] = 17;

$column['column_0']['button_font_color'] = '#ffffff';
$column['column_0']['button_hover_font_color'] = '#ffffff';
$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['is_caption'] = 1;

$column['column_0']['column_highlight'] = '';
$column['column_0']['html_content'] = "Hosting Plans";
$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_0']['row_description'] = 'Data Storage';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_1']['row_description'] = 'MySQL Databases';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_2']['row_description'] = 'Daily Backup';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_3']['row_description'] = 'Free Domains';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_4']['row_description'] = 'Online Support';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '';
$column['column_0']['button_height'] = '';
$column['column_0']['button_type'] = '';
$column['column_0']['button_text'] = '';
$column['column_0']['button_url'] = '';
$column['column_0']['is_new_window'] = 0;



$column['column_0']['footer_content'] = '';
$column['column_0']['footer_content_position'] = 0;
$column['column_0']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_0']['footer_level_options_font_size'] = 12;
$column['column_0']['footer_level_options_font_color'] = '#364762';
$column['column_0']['footer_level_options_hover_font_color'] = '#364762';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';
$column['column_0']['footer_background_color'] = '#e3e3e3';
$column['column_0']['footer_hover_background_color'] = '#e3e3e3';


$column['column_1']['package_title'] = 'Bronze';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['column_align'] = 'left';


$column['column_1']['header_background_color'] = '#6dae2e';
$column['column_1']['header_hover_background_color'] = '#6dae2e';
$column['column_1']['header_font_family'] = 'Open Sans';
$column['column_1']['header_font_size'] = 28;

$column['column_1']['header_font_color'] = '#ffffff';
$column['column_1']['header_hover_font_color'] = '#ffffff';
$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_background_color'] = '#528a1b';
$column['column_1']['price_hover_background_color'] = '#528a1b';
$column['column_1']['price_font_family'] = 'Open Sans';
$column['column_1']['price_font_size'] = 18;

$column['column_1']['price_font_color'] = '#ffffff';
$column['column_1']['price_hover_font_color'] = '#ffffff';
$column['column_1']['price_label_style_bold'] = 'bold';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';



$column['column_1']['price_text_font_family'] = 'Open Sans';
$column['column_1']['price_text_font_size'] = 18;

$column['column_1']['price_text_font_color'] = '#ffffff';
$column['column_1']['price_text_hover_font_color'] = '#ffffff';
$column['column_1']['price_text_style_bold'] = 'bold';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = '';
$column['column_1']['column_description_font_size'] = '';

$column['column_1']['column_description_font_color'] = '';
$column['column_1']['column_description_hover_font_color'] = '';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = 'Arial';
$column['column_1']['content_font_size'] = 16;

$column['column_1']['content_font_color'] = '#364762';
$column['column_1']['content_even_font_color'] = '#364762';
$column['column_1']['content_hover_font_color'] = '#364762';
$column['column_1']['content_even_hover_font_color'] = '#364762';
$column['column_1']['content_odd_color'] = '#ffffff';
$column['column_1']['content_odd_hover_color'] = '#ffffff';
$column['column_1']['content_even_color'] = '#f1f1f1';
$column['column_1']['content_even_hover_color'] = '#f1f1f1';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#6dae2e';
$column['column_1']['button_hover_background_color'] = '#4c7a20';
$column['column_1']['button_font_family'] = 'Open Sans Bold';
$column['column_1']['button_font_size'] = 17;

$column['column_1']['button_font_color'] = '#ffffff';
$column['column_1']['button_hover_font_color'] = '#ffffff';
$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';

$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>20</span><span class='arp_price_duration'> / month</span>";
$column['column_1']['price_label'] = '';
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '20GB';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '15 Databases';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = 'No';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '2 Domains';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = 'No';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '140';
$column['column_1']['button_height'] = '45';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Purchase';
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
$column['column_1']['footer_level_options_font_color'] = '#364762';
$column['column_1']['footer_level_options_hover_font_color'] = '#364762';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['footer_background_color'] = '#e3e3e3';
$column['column_1']['footer_hover_background_color'] = '#e3e3e3';

$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Silver';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['column_align'] = 'left';


$column['column_2']['header_background_color'] = '#fbb400';
$column['column_2']['header_hover_background_color'] = '#fbb400';
$column['column_2']['header_font_family'] = 'Open Sans';
$column['column_2']['header_font_size'] = 28;

$column['column_2']['header_font_color'] = '#ffffff';
$column['column_2']['header_hover_font_color'] = '#ffffff';
$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_background_color'] = '#c28a01';
$column['column_2']['price_hover_background_color'] = '#c28a01';
$column['column_2']['price_font_family'] = 'Open Sans';
$column['column_2']['price_font_size'] = 18;

$column['column_2']['price_font_color'] = '#ffffff';
$column['column_2']['price_hover_font_color'] = '#ffffff';
$column['column_2']['price_label_style_bold'] = 'bold';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';



$column['column_2']['price_text_font_family'] = 'Open Sans';
$column['column_2']['price_text_font_size'] = 18;

$column['column_2']['price_text_font_color'] = '#ffffff';
$column['column_2']['price_text_hover_font_color'] = '#ffffff';
$column['column_2']['price_text_style_bold'] = 'bold';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = '';
$column['column_2']['column_description_font_size'] = '';

$column['column_2']['column_description_font_color'] = '';
$column['column_2']['column_description_hover_font_color'] = '';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = 'Arial';
$column['column_2']['content_font_size'] = 16;

$column['column_2']['content_font_color'] = '#364762';
$column['column_2']['content_even_font_color'] = '#364762';
$column['column_2']['content_hover_font_color'] = '#364762';
$column['column_2']['content_even_hover_font_color'] = '#364762';
$column['column_2']['content_odd_color'] = '#ffffff';
$column['column_2']['content_odd_hover_color'] = '#ffffff';
$column['column_2']['content_even_color'] = '#f9f9f9';
$column['column_2']['content_even_hover_color'] = '#f9f9f9';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#fbb400';
$column['column_2']['button_hover_background_color'] = '#b07e00';
$column['column_2']['button_font_family'] = 'Open Sans Bold';
$column['column_2']['button_font_size'] = 17;

$column['column_2']['button_font_color'] = '#ffffff';
$column['column_2']['button_hover_font_color'] = '#ffffff';
$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';

$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>50</span><span class='arp_price_duration'> / month</span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '80GB';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '100 Databases';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = 'No';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '5 Domains';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = 'No';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '140';
$column['column_2']['button_height'] = '45';
$column['column_2']['button_type'] = 'button';
$column['column_2']['button_text'] = 'Purchase';
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
$column['column_2']['footer_level_options_font_color'] = '#364762';
$column['column_2']['footer_level_options_hover_font_color'] = '#364762';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['footer_background_color'] = '#e3e3e3';
$column['column_2']['footer_hover_background_color'] = '#e3e3e3';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Gold';
$column['column_3']['column_description'] = '';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['column_align'] = 'left';


$column['column_3']['header_background_color'] = '#ea6d00';
$column['column_3']['header_hover_background_color'] = '#ea6d00';
$column['column_3']['header_font_family'] = 'Open Sans';
$column['column_3']['header_font_size'] = 28;

$column['column_3']['header_font_color'] = '#ffffff';
$column['column_3']['header_hover_font_color'] = '#ffffff';
$column['column_3']['header_style_bold'] = '';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';


$column['column_3']['price_background_color'] = '#b44404';
$column['column_3']['price_hover_background_color'] = '#b44404';
$column['column_3']['price_font_family'] = 'Open Sans';
$column['column_3']['price_font_size'] = 18;

$column['column_3']['price_font_color'] = '#ffffff';
$column['column_3']['price_hover_font_color'] = '#ffffff';
$column['column_3']['price_label_style_bold'] = 'bold';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';



$column['column_3']['price_text_font_family'] = 'Open Sans';
$column['column_3']['price_text_font_size'] = 18;

$column['column_3']['price_text_font_color'] = '#ffffff';
$column['column_3']['price_text_hover_font_color'] = '#ffffff';
$column['column_3']['price_text_style_bold'] = 'bold';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = '';
$column['column_3']['column_description_font_size'] = '';

$column['column_3']['column_description_font_color'] = '';
$column['column_3']['column_description_hover_font_color'] = '';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = 'Arial';
$column['column_3']['content_font_size'] = 16;

$column['column_3']['content_font_color'] = '#364762';
$column['column_3']['content_even_font_color'] = '#364762';
$column['column_3']['content_hover_font_color'] = '#364762';
$column['column_3']['content_even_hover_font_color'] = '#364762';
$column['column_3']['content_odd_color'] = '#ffffff';
$column['column_3']['content_odd_hover_color'] = '#ffffff';
$column['column_3']['content_even_color'] = '#f1f1f1';
$column['column_3']['content_even_hover_color'] = '#f1f1f1';
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#ea6d00';
$column['column_3']['button_hover_background_color'] = '#a44c00';
$column['column_3']['button_font_family'] = 'Open Sans Bold';
$column['column_3']['button_font_size'] = 17;

$column['column_3']['button_font_color'] = '#ffffff';
$column['column_3']['button_hover_font_color'] = '#ffffff';
$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';


$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';

$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>60</span><span class='arp_price_duration'> / month</span>";
$column['column_3']['price_label'] = '';
$column['column_3']['arp_header_shortcode'] = '';
$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = '150GB';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = '150 Databases';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = 'Yes';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = '10 Domains';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = 'Yes';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = '140';
$column['column_3']['button_height'] = '45';
$column['column_3']['button_type'] = 'button';
$column['column_3']['button_text'] = 'Purchase';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['is_new_window'] = 0;
$column['column_3']['s_is_new_window'] = '';



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#364762';
$column['column_3']['footer_level_options_hover_font_color'] = '#364762';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['footer_background_color'] = '#e3e3e3';
$column['column_3']['footer_hover_background_color'] = '#e3e3e3';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$column['column_4']['package_title'] = 'Platinum';
$column['column_4']['column_description'] = '';
$column['column_4']['custom_ribbon_txt'] = '';
$column['column_4']['column_width'] = '';
$column['column_4']['column_align'] = 'left';


$column['column_4']['header_background_color'] = '#c32929';
$column['column_4']['header_hover_background_color'] = '#c32929';
$column['column_4']['header_font_family'] = 'Open Sans';
$column['column_4']['header_font_size'] = 28;

$column['column_4']['header_font_color'] = '#ffffff';
$column['column_4']['header_hover_font_color'] = '#ffffff';
$column['column_4']['header_style_bold'] = '';
$column['column_4']['header_style_italic'] = '';
$column['column_4']['header_style_decoration'] = '';


$column['column_4']['price_background_color'] = '#a50b0b';
$column['column_4']['price_hover_background_color'] = '#a50b0b';
$column['column_4']['price_font_family'] = 'Open Sans';
$column['column_4']['price_font_size'] = 18;

$column['column_4']['price_font_color'] = '#ffffff';
$column['column_4']['price_hover_font_color'] = '#ffffff';
$column['column_4']['price_label_style_bold'] = 'bold';
$column['column_4']['price_label_style_italic'] = '';
$column['column_4']['price_label_style_decoration'] = '';



$column['column_4']['price_text_font_family'] = 'Open Sans';
$column['column_4']['price_text_font_size'] = 18;

$column['column_4']['price_text_font_color'] = '#ffffff';
$column['column_4']['price_text_hover_font_color'] = '#ffffff';
$column['column_4']['price_text_style_bold'] = 'bold';
$column['column_4']['price_text_style_italic'] = '';
$column['column_4']['price_text_style_decoration'] = '';



$column['column_4']['column_description_font_family'] = '';
$column['column_4']['column_description_font_size'] = '';

$column['column_4']['column_description_font_color'] = '';
$column['column_4']['column_description_hover_font_color'] = '';
$column['column_4']['column_description_style_bold'] = '';
$column['column_4']['column_description_style_italic'] = '';
$column['column_4']['column_description_style_decoration'] = '';



$column['column_4']['content_font_family'] = 'Arial';
$column['column_4']['content_font_size'] = 16;

$column['column_4']['content_font_color'] = '#364762';
$column['column_4']['content_even_font_color'] = '#364762';
$column['column_4']['content_hover_font_color'] = '#364762';
$column['column_4']['content_even_hover_font_color'] = '#364762';
$column['column_4']['content_odd_color'] = '#ffffff';
$column['column_4']['content_odd_hover_color'] = '#ffffff';
$column['column_4']['content_even_color'] = '#f9f9f9';
$column['column_4']['content_even_hover_color'] = '#f9f9f9';
$column['column_4']['body_li_style_bold'] = '';
$column['column_4']['body_li_style_italic'] = '';
$column['column_4']['body_li_style_decoration'] = '';



$column['column_4']['button_background_color'] = '#c32929';
$column['column_4']['button_hover_background_color'] = '#8C1E1E';
$column['column_4']['button_font_family'] = 'Open Sans Bold';
$column['column_4']['button_font_size'] = 17;

$column['column_4']['button_font_color'] = '#ffffff';
$column['column_4']['button_hover_font_color'] = '#ffffff';
$column['column_4']['button_style_bold'] = '';
$column['column_4']['button_style_italic'] = '';
$column['column_4']['button_style_decoration'] = '';


$column['column_4']['is_caption'] = 0;

$column['column_4']['column_highlight'] = '';

$column['column_4']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>99</span><span class='arp_price_duration'> / month</span>";
$column['column_4']['price_label'] = "";
$column['column_4']['arp_header_shortcode'] = '';
$column['column_4']['body_text_alignment'] = 'center';
$column['column_4']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_0']['row_description'] = 'Unlimited';
$column['column_4']['rows']['row_0']['row_tooltip'] = '';
$column['column_4']['rows']['row_0']['row_label'] = '';
$column['column_4']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_4']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_4']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_4']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_4']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_4']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_4']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_1']['row_description'] = 'Unlimited Databases';
$column['column_4']['rows']['row_1']['row_tooltip'] = '';
$column['column_4']['rows']['row_1']['row_label'] = '';
$column['column_4']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_4']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_4']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_4']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_4']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_4']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_4']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_2']['row_description'] = 'Yes';
$column['column_4']['rows']['row_2']['row_tooltip'] = '';
$column['column_4']['rows']['row_2']['row_label'] = '';
$column['column_4']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_4']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_4']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_4']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_4']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_4']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_4']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_3']['row_description'] = '20 Domains';
$column['column_4']['rows']['row_3']['row_tooltip'] = '';
$column['column_4']['rows']['row_3']['row_label'] = '';
$column['column_4']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_4']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_4']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_4']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_4']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_4']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_4']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_4']['row_description'] = 'Yes';
$column['column_4']['rows']['row_4']['row_tooltip'] = '';
$column['column_4']['rows']['row_4']['row_label'] = '';
$column['column_4']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_4']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_4']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_4']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_4']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_4']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_4']['button_size'] = '140';
$column['column_4']['button_height'] = '45';
$column['column_4']['button_type'] = 'button';
$column['column_4']['button_text'] = 'Purchase';
$column['column_4']['button_url'] = '#';
$column['column_4']['button_s_size'] = '';
$column['column_4']['button_s_type'] = '';
$column['column_4']['button_s_text'] = '';
$column['column_4']['button_s_url'] = '';
$column['column_4']['s_is_new_window'] = '';
$column['column_4']['is_new_window'] = 0;



$column['column_4']['footer_content'] = '';
$column['column_4']['footer_content_position'] = 0;
$column['column_4']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_4']['footer_level_options_font_size'] = 12;
$column['column_4']['footer_level_options_font_color'] = '#364762';
$column['column_4']['footer_level_options_hover_font_color'] = '#364762';
$column['column_4']['footer_level_options_font_style_bold'] = '';
$column['column_4']['footer_level_options_font_style_italic'] = '';
$column['column_4']['footer_level_options_font_style_decoration'] = '';
$column['column_4']['footer_background_color'] = '#e3e3e3';
$column['column_4']['footer_hover_background_color'] = '#e3e3e3';
$column['column_4']['is_post_variables'] = 0;
$column['column_4']['post_variables_content'] = 'plan_id=4;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);

/**
 * ARPrice Template 2
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 2';
$values['is_template'] = 1;
$values['status'] = 'published';
$values['template_name'] = 2;
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

$arp_pt_template_settings['template'] = 'arptemplate_2';
$arp_pt_template_settings['skin'] = 'lightviolet';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'rounded_border', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_2';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 240;


$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 7;
$arp_pt_column_settings['column_border_radius_top_right'] = 7;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 7;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 7;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1000;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 3;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 3;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 3;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 3;
$arp_pt_column_settings['arp_global_button_type'] = 'shadow';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

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
$arp_pt_column_settings['header_font_family_global'] = 'Lato';
$arp_pt_column_settings['header_font_size_global'] = 26;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Lato';
$arp_pt_column_settings['price_font_size_global'] = 40;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Lato';
$arp_pt_column_settings['body_font_size_global'] = 18;
$arp_pt_column_settings['arp_body_text_alignment'] = 'center';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['footer_font_size_global'] = 12;
$arp_pt_column_settings['arp_footer_text_alignment'] = 'center';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Lato';
$arp_pt_column_settings['button_font_size_global'] = 22;
$arp_pt_column_settings['arp_button_text_alignment'] = 'center';
$arp_pt_column_settings['arp_button_text_bold_global'] = '';
$arp_pt_column_settings['arp_button_text_italic_global'] = '';
$arp_pt_column_settings['arp_button_text_decoration_global'] = '';
$arp_pt_column_settings['description_font_family_global'] = '';
$arp_pt_column_settings['description_font_size_global'] = '';
$arp_pt_column_settings['arp_description_text_alignment'] = 'center';
$arp_pt_column_settings['arp_description_text_bold_global'] = '';
$arp_pt_column_settings['arp_description_text_italic_global'] = '';
$arp_pt_column_settings['arp_description_text_decoration_global'] = '';
$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';
$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = "#6c62d3";
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = "#F6F6F6";
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = "#6c62d3";
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#6c62d3';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#313234';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_shortocode_background'] = '#ffffff';
$arp_pt_custom_skin_array['arp_shortocode_font_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_shortcode_bg_hover_color'] = '#6c62d3';
$arp_pt_custom_skin_array['arp_shortcode_font_hover_color'] = '#6c62d3';
$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Basic';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';
$column['column_0']['column_background_color'] = "#6c62d3";
$column['column_0']['column_hover_background_color'] = "#f6f6f6";


$column['column_0']['header_font_family'] = 'Lato';
$column['column_0']['header_font_size'] = 26;
$column['column_0']['header_font_color'] = "#ffffff";
$column['column_0']['header_hover_font_color'] = "#6c62d3";

$column['column_0']['header_style_bold'] = 'bold';
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



$column['column_0']['content_font_family'] = "Lato";
$column['column_0']['content_font_size'] = 18;
$column['column_0']['content_font_color'] = "#ffffff";
$column['column_0']['content_even_font_color'] = "#ffffff";
$column['column_0']['content_hover_font_color'] = "#000000";
$column['column_0']['content_even_hover_font_color'] = "#000000";

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



$column['column_0']['button_background_color'] = '#ffffff';
$column['column_0']['button_hover_background_color'] = '#6c62d3';
$column['column_0']['button_font_family'] = "Lato";
$column['column_0']['button_font_size'] = 22;
$column['column_0']['button_font_color'] = "#313234";
$column['column_0']['button_hover_font_color'] = "#ffffff";

$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>19.00</span><span class='arp_price_duration' style='font-size:18px;'> monthly </span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = "<i class='arpfar arpfa-file-text arpsize-ico-48'></i>";
$column['column_0']['body_text_alignment'] = 'center';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = '10 GB Disk Space';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_1']['row_description'] = '5 Databases';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_2']['row_description'] = '5 Domains';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_3']['row_description'] = 'No online Support';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '158';
$column['column_0']['button_height'] = '48';
$column['column_0']['button_type'] = 'Button';
$column['column_0']['button_text'] = 'Buy Now';
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

$column['column_0']['shortcode_background_color'] = '#ffffff';
$column['column_0']['shortcode_font_color'] = '#ffffff';
$column['column_0']['shortcode_hover_background_color'] = '#6c62d3';
$column['column_0']['shortcode_hover_font_color'] = '#6c62d3';
$column['column_0']['arp_shortcode_customization_style'] = 'rounded';
$column['column_0']['arp_shortcode_customization_size'] = 'medium';

$column['column_1']['shortcode_background_color'] = '#ffffff';
$column['column_1']['shortcode_font_color'] = '#ffffff';
$column['column_1']['shortcode_hover_background_color'] = '#6c62d3';
$column['column_1']['shortcode_hover_font_color'] = '#6c62d3';
$column['column_1']['arp_shortcode_customization_style'] = 'rounded';
$column['column_1']['arp_shortcode_customization_size'] = 'medium';
$column['column_1']['package_title'] = 'Personal';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';
$column['column_1']['column_background_color'] = "#6c62d3";
$column['column_1']['column_hover_background_color'] = "#f6f6f6";


$column['column_1']['header_font_family'] = 'Lato';
$column['column_1']['header_font_size'] = 26;
$column['column_1']['header_font_color'] = "#ffffff";
$column['column_1']['header_hover_font_color'] = "#6c62d3";
$column['column_1']['header_style_bold'] = 'bold';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';



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



$column['column_1']['content_font_family'] = "Lato";
$column['column_1']['content_font_size'] = 18;
$column['column_1']['content_font_color'] = "#ffffff";
$column['column_1']['content_even_font_color'] = "#ffffff";
$column['column_1']['content_hover_font_color'] = "#000000";
$column['column_1']['content_even_hover_font_color'] = "#000000";

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



$column['column_1']['button_background_color'] = '#ffffff';
$column['column_1']['button_hover_background_color'] = '#6c62d3';
$column['column_1']['button_font_family'] = "Lato";
$column['column_1']['button_font_size'] = 22;
$column['column_1']['button_font_color'] = "#313234";
$column['column_1']['button_hover_font_color'] = "#ffffff";
$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>29.00</span><span class='arp_price_duration' style='font-size:18px;'> monthly </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = "<i class='fas fa-user arpsize-ico-48'></i>";
$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '50 GB Disk Space';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '25 Databases';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '25 Domains';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = 'No online Support';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '158';
$column['column_1']['button_height'] = '48';
$column['column_1']['button_type'] = 'Button';
$column['column_1']['button_text'] = 'Buy Now';
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
$column['column_1']['footer_level_options_hover_font_color'] = '#000000';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['shortcode_background_color'] = '#ffffff';
$column['column_2']['shortcode_font_color'] = '#ffffff';
$column['column_2']['shortcode_hover_background_color'] = '#6c62d3';
$column['column_2']['shortcode_hover_font_color'] = '#6c62d3';
$column['column_2']['arp_shortcode_customization_style'] = 'rounded';
$column['column_2']['arp_shortcode_customization_size'] = 'medium';
$column['column_2']['package_title'] = 'Standard';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = 1;
$column['column_2']['column_background_color'] = "#6c62d3";
$column['column_2']['column_hover_background_color'] = "#f6f6f6";


$column['column_2']['header_font_family'] = 'Lato';
$column['column_2']['header_font_size'] = 26;
$column['column_2']['header_font_color'] = "#ffffff";
$column['column_2']['header_hover_font_color'] = "#6c62d3";
$column['column_2']['header_style_bold'] = 'bold';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';



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
$column['column_2']['column_description_font_size'] = 13;
$column['column_2']['column_description_font_color'] = '#7c7c7c';
$column['column_2']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = "Lato";
$column['column_2']['content_font_size'] = 18;
$column['column_2']['content_font_color'] = "#ffffff";
$column['column_2']['content_even_font_color'] = "#ffffff";
$column['column_2']['content_hover_font_color'] = "#000000";
$column['column_2']['content_even_hover_font_color'] = "#000000";

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



$column['column_2']['button_background_color'] = '#ffffff';
$column['column_2']['button_hover_background_color'] = '#6c62d3';
$column['column_2']['button_font_family'] = "Lato";
$column['column_2']['button_font_size'] = 22;
$column['column_2']['button_font_color'] = "#313234";
$column['column_2']['button_hover_font_color'] = "#ffffff";
$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>39.00</span><span class='arp_price_duration' style='font-size:18px;'> monthly </span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = "<i class='fas fa-check arpsize-ico-48'></i>";
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '80 GB Disk Space';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '30 Databases';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '30 Domains';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = 'Online Support';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '158';
$column['column_2']['button_height'] = '48';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Buy Now';
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


$column['column_3']['shortcode_background_color'] = '#ffffff';
$column['column_3']['shortcode_font_color'] = '#ffffff';
$column['column_3']['shortcode_hover_background_color'] = '#6c62d3';
$column['column_3']['shortcode_hover_font_color'] = '#6c62d3';
$column['column_3']['arp_shortcode_customization_style'] = 'rounded';
$column['column_3']['arp_shortcode_customization_size'] = 'medium';
$column['column_3']['package_title'] = 'Ultimate Pro';
$column['column_3']['column_description'] = '';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['column_align'] = 'left';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';
$column['column_3']['column_background_color'] = "#6c62d3";
$column['column_3']['column_hover_background_color'] = "#f6f6f6";


$column['column_3']['header_font_family'] = 'Lato';
$column['column_3']['header_font_size'] = 26;
$column['column_3']['header_font_color'] = "#ffffff";
$column['column_3']['header_hover_font_color'] = "#6c62d3";
$column['column_3']['header_style_bold'] = 'bold';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';



$column['column_3']['price_font_family'] = "Lato";
$column['column_3']['price_font_size'] = 40;
$column['column_3']['price_font_color'] = "#ffffff";
$column['column_3']['price_hover_font_color'] = "#000000";
$column['column_3']['price_label_style_bold'] = 'bold';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Lato';
$column['column_3']['price_text_font_size'] = 18;
$column['column_3']['price_text_font_color'] = "#ffffff";
$column['column_3']['price_text_hover_font_color'] = "#000000";
$column['column_3']['price_text_style_bold'] = 'bold';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = 'Arial';
$column['column_3']['column_description_font_size'] = 13;
$column['column_3']['column_description_font_color'] = '#7c7c7c';
$column['column_3']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = "Lato";
$column['column_3']['content_font_size'] = 18;
$column['column_3']['content_font_color'] = "#ffffff";
$column['column_3']['content_even_font_color'] = "#ffffff";
$column['column_3']['content_hover_font_color'] = "#000000";
$column['column_3']['content_even_hover_font_color'] = "#000000";
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['content_label_font_family'] = 'Arial';
$column['column_3']['content_label_font_size'] = 15;
$column['column_3']['content_label_font_color'] = '#2a2e31';
$column['column_3']['content_label_hover_font_color'] = '#2a2e31';
$column['column_3']['body_label_style_bold'] = 'bold';
$column['column_3']['body_label_style_italic'] = '';
$column['column_3']['body_label_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#ffffff';
$column['column_3']['button_hover_background_color'] = '#6c62d3';
$column['column_3']['button_font_family'] = "Lato";
$column['column_3']['button_font_size'] = 22;
$column['column_3']['button_font_color'] = "#313234";
$column['column_3']['button_hover_font_color'] = "#ffffff";
$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';


$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>99.00</span><span class='arp_price_duration' style='font-size:18px;'> monthly </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = "<i class='fas fa-building arpsize-ico-48'></i>";
$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = 'Unlimited Disk Space';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = 'Unlimited Database';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = '30 Domains';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = 'Online Support';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = '158';
$column['column_3']['button_height'] = '48';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Buy Now';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_hover_font_color'] = '#000000';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);
$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 3
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 3';
$values['is_template'] = 1;
$values['template_name'] = 3;
$values['status'] = 'published';
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

$arp_pt_template_settings['template'] = 'arptemplate_3';
$arp_pt_template_settings['skin'] = 'black';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_4', 'caption_style' => 'style_1', 'amount_style' => 'style_3', 'list_alignment' => 'right', 'ribbon_type' => 'default', 'column_description_style' => 'style_3', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'position_1', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0);


$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_3';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 240;


$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1024;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 3;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 3;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 3;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 3;
$arp_pt_column_settings['arp_global_button_type'] = 'flat';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '0';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';

$arp_pt_column_settings['arp_column_border_size'] = '1';
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
$arp_pt_column_settings['header_font_family_global'] = 'Abel';
$arp_pt_column_settings['header_font_size_global'] = 30;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Abel';
$arp_pt_column_settings['price_font_size_global'] = 46;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Abel';
$arp_pt_column_settings['body_font_size_global'] = 17;
$arp_pt_column_settings['arp_body_text_alignment'] = 'center';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['footer_font_size_global'] = 12;
$arp_pt_column_settings['arp_footer_text_alignment'] = 'center';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Abel';
$arp_pt_column_settings['button_font_size_global'] = 20;
$arp_pt_column_settings['arp_button_text_alignment'] = 'center';
$arp_pt_column_settings['arp_button_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_button_text_italic_global'] = '';
$arp_pt_column_settings['arp_button_text_decoration_global'] = '';
$arp_pt_column_settings['description_font_family_global'] = 'Lucida Sans Unicode';
$arp_pt_column_settings['description_font_size_global'] = 14;
$arp_pt_column_settings['arp_description_text_alignment'] = 'center';
$arp_pt_column_settings['arp_description_text_bold_global'] = '';
$arp_pt_column_settings['arp_description_text_italic_global'] = '';
$arp_pt_column_settings['arp_description_text_decoration_global'] = '';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
$arp_pt_column_animation['scrolling_columns'] = 2;
$arp_pt_column_animation['navigation'] = 1;
$arp_pt_column_animation['autoplay'] = 1;
$arp_pt_column_animation['sliding_effect'] = 'slide';
$arp_pt_column_animation['transition_speed'] = 750;
$arp_pt_column_animation['navigation_style'] = $arp_mainoptionsarr['general_options']['column_animation']['navigation_style'][0];
$arp_pt_column_animation['pagination'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination'];
$arp_pt_column_animation['pagination_style'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_style'][0];
$arp_pt_column_animation['pagination_position'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_position'][2];
$arp_pt_column_animation['easing_effect'] = $arp_mainoptionsarr['general_options']['column_animation']['easing_effect'][4];
$arp_pt_column_animation['infinite'] = $arp_mainoptionsarr['general_options']['column_animation']['infinite'];

$arp_pt_column_animation['navi_nav_btn'] = 'navigation';
$arp_pt_column_animation['pagi_nav_btn'] = 'pagination_bottom';
$arp_pt_column_animation['sticky_caption'] = 0;

$arp_pt_tooltip_settings['background_color'] = '#000000';
$arp_pt_tooltip_settings['text_color'] = '#FFFFFF';
$arp_pt_tooltip_settings['animation'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['animation'][0];
$arp_pt_tooltip_settings['position'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['position'][0];
$arp_pt_tooltip_settings['style'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['style'][0];
$arp_pt_tooltip_settings['tooltip_width'] = '';
$arp_pt_tooltip_settings['tooltip_font_family'] = 'Arial';
$arp_pt_tooltip_settings['tooltip_font_size'] = 16;
$arp_pt_tooltip_settings['tooltip_font_style'] = 'normal';
$arp_pt_tooltip_settings['tooltip_trigger_type'] = 'hover';
$arp_pt_tooltip_settings['tooltip_display_style'] = 'default';
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = "#39434d";
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = "#ebeff2";
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = "#39434d";
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = "#e94b3f";
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#e94b3f';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = '#EBEFF2';
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#39434d';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#e94b3f';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = '#605f5f';
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = '#605f5f';
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#494c4f';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#494c4f';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#e94b3f';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#494c4f';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#444649';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#444649';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);


$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Basic';
$column['column_0']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel.';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';

$column['column_0']['price_text'] = "<span class='arp_price_duration' style='font-size:13px;'> per month </span><span class='arp_price_value'><span class='arp_currency'>$</span>20</span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = '';

$column['column_0']['header_background_color'] = '#ffffff';
$column['column_0']['header_hover_background_color'] = '#ffffff';
$column['column_0']['header_font_family'] = "Abel";
$column['column_0']['header_font_size'] = 30;
$column['column_0']['header_font_color'] = "#454648";
$column['column_0']['header_hover_font_color'] = "#e94b3f";

$column['column_0']['header_style_bold'] = 'bold';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';

$column['column_0']['price_background_color'] = '#39434d';
$column['column_0']['price_hover_background_color'] = '#e94b3f';
$column['column_0']['price_font_family'] = "Abel";
$column['column_0']['price_font_size'] = 46;
$column['column_0']['price_font_color'] = "#ffffff";
$column['column_0']['price_hover_font_color'] = "#ffffff";

$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Open Sans';
$column['column_0']['price_text_font_size'] = 13;
$column['column_0']['price_text_font_color'] = "#ffffff";
$column['column_0']['price_text_hover_font_color'] = "#ffffff";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';


$column['column_0']['column_description_font_family'] = 'Lucida Sans Unicode';
$column['column_0']['column_description_font_size'] = 14;

$column['column_0']['column_description_font_color'] = '#605f5f';
$column['column_0']['column_description_hover_font_color'] = '#605f5f';
$column['column_0']['column_desc_background_color'] = '#ffffff';
$column['column_0']['column_desc_hover_background_color'] = '#ffffff';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';


$column['column_0']['content_font_family'] = "Abel";
$column['column_0']['content_font_size'] = 17;
$column['column_0']['content_font_color'] = "#494c4f";
$column['column_0']['content_even_font_color'] = "#494c4f";
$column['column_0']['content_hover_font_color'] = "#E94B3F";
$column['column_0']['content_even_hover_font_color'] = "#494c4f";

$column['column_0']['content_odd_color'] = '#ffffff';
$column['column_0']['content_odd_hover_color'] = '#ffffff';
$column['column_0']['content_even_color'] = '#ebeff2';
$column['column_0']['content_even_hover_color'] = '#ebeff2';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';


$column['column_0']['content_label_font_family'] = '';
$column['column_0']['content_label_font_size'] = '';
$column['column_0']['content_label_font_style'] = '';

$column['column_0']['body_label_style_bold'] = '';
$column['column_0']['body_label_style_italic'] = '';
$column['column_0']['body_label_style_decoration'] = '';


$column['column_0']['button_background_color'] = '#ffffff';
$column['column_0']['button_hover_background_color'] = '#ffffff';
$column['column_0']['button_font_family'] = "Abel";
$column['column_0']['button_font_size'] = 20;
$column['column_0']['button_font_color'] = "#444649";
$column['column_0']['button_hover_font_color'] = "#444649";

$column['column_0']['button_style_bold'] = 'bold';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['body_text_alignment'] = 'center';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = '25 Domains';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_1']['row_description'] = '200MB Disk Space';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_2']['row_description'] = '20GB Traffic';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_3']['row_description'] = 'PHP / Mysql Database';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_4']['row_description'] = '25 Email Account';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '170';
$column['column_0']['button_height'] = '39';
$column['column_0']['button_type'] = 'button';
$column['column_0']['button_text'] = 'Choose Plan';
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

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';


$column['column_1']['package_title'] = 'Team';
$column['column_1']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel.';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';

$column['column_1']['price_text'] = "<span class='arp_price_duration' style='font-size:13px;'> per month </span><span class='arp_price_value'><span class='arp_currency'>$</span>99</span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';

$column['column_1']['header_background_color'] = '#ffffff';
$column['column_1']['header_hover_background_color'] = '#ffffff';
$column['column_1']['header_font_family'] = "Abel";
$column['column_1']['header_font_size'] = 30;
$column['column_1']['header_font_color'] = "#454648";
$column['column_1']['header_hover_font_color'] = "#e94b3f";

$column['column_1']['header_style_bold'] = 'bold';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';

$column['column_1']['price_background_color'] = '#39434d';
$column['column_1']['price_hover_background_color'] = '#e94b3f';
$column['column_1']['price_font_family'] = "Abel";
$column['column_1']['price_font_size'] = 46;
$column['column_1']['price_font_color'] = "#ffffff";
$column['column_1']['price_hover_font_color'] = "#ffffff";

$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Open Sans';
$column['column_1']['price_text_font_size'] = 13;
$column['column_1']['price_text_font_color'] = "#ffffff";
$column['column_1']['price_text_hover_font_color'] = "#ffffff";

$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';


$column['column_1']['column_description_font_family'] = 'Lucida Sans Unicode';
$column['column_1']['column_description_font_size'] = 14;

$column['column_1']['column_description_font_color'] = '#605f5f';
$column['column_1']['column_description_hover_font_color'] = '#605f5f';
$column['column_1']['column_desc_background_color'] = '#ffffff';
$column['column_1']['column_desc_hover_background_color'] = '#ffffff';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';


$column['column_1']['content_font_family'] = "Abel";
$column['column_1']['content_font_size'] = 17;
$column['column_1']['content_font_color'] = "#494c4f";
$column['column_1']['content_even_font_color'] = "#494c4f";
$column['column_1']['content_hover_font_color'] = "#E94B3F";
$column['column_1']['content_even_hover_font_color'] = "#494c4f";

$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';


$column['column_1']['content_label_font_family'] = '';
$column['column_1']['content_label_font_size'] = '';
$column['column_1']['content_label_font_style'] = '';

$column['column_1']['content_odd_color'] = '#ffffff';
$column['column_1']['content_odd_hover_color'] = '#ffffff';
$column['column_1']['content_even_color'] = '#ebeff2';
$column['column_1']['content_even_hover_color'] = '#ebeff2';
$column['column_1']['body_label_style_bold'] = '';
$column['column_1']['body_label_style_italic'] = '';
$column['column_1']['body_label_style_decoration'] = '';


$column['column_1']['button_background_color'] = '#ffffff';
$column['column_1']['button_hover_background_color'] = '#ffffff';
$column['column_1']['button_font_family'] = "Abel";
$column['column_1']['button_font_size'] = 20;
$column['column_1']['button_font_color'] = "#444649";
$column['column_1']['button_hover_font_color'] = "#444649";

$column['column_1']['button_style_bold'] = 'bold';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '50 Domains';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '400MB Disk Space';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '40GB Traffic';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = 'PHP / Mysql Database';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = '50 Email Account';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '170';
$column['column_1']['button_height'] = '39';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Choose Plan';
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
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Premium';
$column['column_2']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel.';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = 1;

$column['column_2']['header_background_color'] = '#ffffff';
$column['column_2']['header_hover_background_color'] = '#ffffff';
$column['column_2']['header_font_family'] = "Abel";
$column['column_2']['header_font_size'] = 30;
$column['column_2']['header_font_color'] = "#454648";
$column['column_2']['header_hover_font_color'] = "#e94b3f";

$column['column_2']['header_style_bold'] = 'bold';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_background_color'] = '#39434d';
$column['column_2']['price_hover_background_color'] = '#e94b3f';
$column['column_2']['price_font_family'] = "Abel";
$column['column_2']['price_font_size'] = 46;
$column['column_2']['price_font_color'] = "#ffffff";
$column['column_2']['price_hover_font_color'] = "#ffffff";

$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Open Sans';
$column['column_2']['price_text_font_size'] = 13;
$column['column_2']['price_text_font_color'] = "#ffffff";
$column['column_2']['price_text_hover_font_color'] = "#ffffff";

$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';


$column['column_2']['column_description_font_family'] = 'Lucida Sans Unicode';
$column['column_2']['column_description_font_size'] = 14;

$column['column_2']['column_description_font_color'] = '#605f5f';
$column['column_2']['column_description_hover_font_color'] = '#605f5f';
$column['column_2']['column_desc_background_color'] = '#ffffff';
$column['column_2']['column_desc_hover_background_color'] = '#ffffff';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';


$column['column_2']['content_font_family'] = "Abel";
$column['column_2']['content_font_size'] = 17;
$column['column_2']['content_font_color'] = "#494c4f";
$column['column_2']['content_even_font_color'] = "#494c4f";
$column['column_2']['content_hover_font_color'] = "#E94B3F";
$column['column_2']['content_even_hover_font_color'] = "#494c4f";

$column['column_2']['content_odd_color'] = '#ffffff';
$column['column_2']['content_odd_hover_color'] = '#ffffff';
$column['column_2']['content_even_color'] = '#ebeff2';
$column['column_2']['content_even_hover_color'] = '#ebeff2';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';


$column['column_2']['content_label_font_family'] = '';
$column['column_2']['content_label_font_size'] = '';
$column['column_2']['content_label_font_style'] = '';

$column['column_2']['body_label_style_bold'] = '';
$column['column_2']['body_label_style_italic'] = '';
$column['column_2']['body_label_style_decoration'] = '';


$column['column_2']['button_background_color'] = '#ffffff';
$column['column_2']['button_hover_background_color'] = '#ffffff';
$column['column_2']['button_font_family'] = "Abel";
$column['column_2']['button_font_size'] = 20;
$column['column_2']['button_font_color'] = "#444649";
$column['column_2']['button_hover_font_color'] = "#444649";

$column['column_2']['button_style_bold'] = 'bold';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';



$column['column_2']['price_text'] = "<span class='arp_price_duration' style='font-size:13px;'> per month </span><span class='arp_price_value'><span class='arp_currency'>$</span>149</span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '75 Domains';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '800MB Disk Space';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '60GB Traffic';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = 'PHP / Mysql Database';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = '75 Email Account';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '170';
$column['column_2']['button_height'] = '39';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Choose Plan';
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
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Corporate';
$column['column_3']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel.';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['column_align'] = 'left';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';

$column['column_3']['header_background_color'] = '#ffffff';
$column['column_3']['header_hover_background_color'] = '#ffffff';
$column['column_3']['header_font_family'] = "Abel";
$column['column_3']['header_font_size'] = 30;
$column['column_3']['header_font_color'] = "#454648";
$column['column_3']['header_hover_font_color'] = "#e94b3f";

$column['column_3']['header_style_bold'] = 'bold';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';


$column['column_3']['price_background_color'] = '#39434d';
$column['column_3']['price_hover_background_color'] = '#e94b3f';
$column['column_3']['price_font_family'] = "Abel";
$column['column_3']['price_font_size'] = 46;
$column['column_3']['price_font_color'] = "#ffffff";
$column['column_3']['price_hover_font_color'] = "#ffffff";

$column['column_3']['price_label_style_bold'] = '';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Open Sans';
$column['column_3']['price_text_font_size'] = 13;
$column['column_3']['price_text_font_color'] = "#ffffff";
$column['column_3']['price_text_hover_font_color'] = "#ffffff";

$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';


$column['column_3']['column_description_font_family'] = 'Lucida Sans Unicode';
$column['column_3']['column_description_font_size'] = 14;

$column['column_3']['column_description_font_color'] = '#605f5f';
$column['column_3']['column_description_hover_font_color'] = '#605f5f';
$column['column_3']['column_desc_background_color'] = '#ffffff';
$column['column_3']['column_desc_hover_background_color'] = '#ffffff';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';


$column['column_3']['content_font_family'] = "Abel";
$column['column_3']['content_font_size'] = 17;
$column['column_3']['content_font_color'] = "#494c4f";
$column['column_3']['content_even_font_color'] = "#494c4f";
$column['column_3']['content_hover_font_color'] = "#E94B3F";
$column['column_3']['content_even_hover_font_color'] = "#494c4f";

$column['column_3']['content_odd_color'] = '#ffffff';
$column['column_3']['content_odd_hover_color'] = '#ffffff';
$column['column_3']['content_even_color'] = '#ebeff2';
$column['column_3']['content_even_hover_color'] = '#ebeff2';
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';


$column['column_3']['content_label_font_family'] = '';
$column['column_3']['content_label_font_size'] = '';
$column['column_3']['content_label_font_style'] = '';

$column['column_3']['body_label_style_bold'] = '';
$column['column_3']['body_label_style_italic'] = '';
$column['column_3']['body_label_style_decoration'] = '';


$column['column_3']['button_background_color'] = '#ffffff';
$column['column_3']['button_hover_background_color'] = '#ffffff';
$column['column_3']['button_font_family'] = "Abel";
$column['column_3']['button_font_size'] = 20;
$column['column_3']['button_font_color'] = "#444649";
$column['column_3']['button_hover_font_color'] = "#444649";

$column['column_3']['button_style_bold'] = 'bold';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';



$column['column_3']['price_text'] = "<span class='arp_price_duration' style='font-size:13px;'> per month </span><span class='arp_price_value'><span class='arp_currency'>$</span>199</span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '';
$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = 'Unlimited Domains';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = 'Unlimited Disk Space';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = '99GB Traffic';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';

$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = 'PHP / Mysql Database';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = '100 Email Account';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = '170';
$column['column_3']['button_height'] = '39';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Choose Plan';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_hover_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);
$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 4
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 4';
$values['is_template'] = 1;
$values['template_name'] = 4;
$values['status'] = 'published';
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

$arp_pt_template_settings['template'] = 'arptemplate_4';
$arp_pt_template_settings['skin'] = 'darkgreen';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'position_2', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_4';
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


$arp_pt_column_settings['column_space'] = 0;
$arp_pt_column_settings['column_highlight_on_hover'] = 'hover_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 200;


$arp_pt_column_settings['hide_caption_column'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 800;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 4;
$arp_pt_column_settings['arp_global_button_type'] = 'flat';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '1';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#ffffff';


$arp_pt_column_settings['arp_caption_row_border_size'] = '1';
$arp_pt_column_settings['arp_caption_row_border_style'] = 'solid';
$arp_pt_column_settings['arp_caption_row_border_color'] = '#ffffff';


$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#dadada';

$arp_pt_column_settings['arp_column_border_left'] = 0;
$arp_pt_column_settings['arp_column_border_right'] = 0;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;


$arp_pt_column_settings['arp_caption_border_size'] = '1';
$arp_pt_column_settings['arp_caption_border_style'] = 'solid';
$arp_pt_column_settings['arp_caption_border_color'] = '#E3E3E3';

$arp_pt_column_settings['arp_caption_border_left'] = 1;
$arp_pt_column_settings['arp_caption_border_right'] = 0;
$arp_pt_column_settings['arp_caption_border_top'] = 1;
$arp_pt_column_settings['arp_caption_border_bottom'] = 1;



$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;
$arp_pt_column_settings['header_font_family_global'] = 'Lato';
$arp_pt_column_settings['header_font_size_global'] = 24;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Lato';
$arp_pt_column_settings['price_font_size_global'] = 26;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Roboto';
$arp_pt_column_settings['body_font_size_global'] = 16;
$arp_pt_column_settings['arp_body_text_alignment'] = 'center';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = 'Roboto';
$arp_pt_column_settings['footer_font_size_global'] = 12;
$arp_pt_column_settings['arp_footer_text_alignment'] = 'center';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Lato';
$arp_pt_column_settings['button_font_size_global'] = 19;
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
$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
$arp_pt_column_animation['scrolling_columns'] = 2;
$arp_pt_column_animation['navigation'] = 1;
$arp_pt_column_animation['autoplay'] = 1;
$arp_pt_column_animation['sliding_effect'] = 'slide';
$arp_pt_column_animation['transition_speed'] = 750;
$arp_pt_column_animation['navigation_style'] = $arp_mainoptionsarr['general_options']['column_animation']['navigation_style'][1];
$arp_pt_column_animation['pagination'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination'];
$arp_pt_column_animation['pagination_style'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_style'][1];
$arp_pt_column_animation['pagination_position'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_position'][1];
$arp_pt_column_animation['easing_effect'] = $arp_mainoptionsarr['general_options']['column_animation']['easing_effect'][1];
$arp_pt_column_animation['infinite'] = $arp_mainoptionsarr['general_options']['column_animation']['infinite'];
$arp_pt_column_animation['navi_nav_btn'] = 'navigation';
$arp_pt_column_animation['pagi_nav_btn'] = 'pagination_bottom';
$arp_pt_column_animation['sticky_caption'] = 0;

$arp_pt_tooltip_settings['background_color'] = '#000000';
$arp_pt_tooltip_settings['text_color'] = '#FFFFFF';
$arp_pt_tooltip_settings['animation'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['animation'][0];
$arp_pt_tooltip_settings['position'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['position'][1];
$arp_pt_tooltip_settings['style'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['style'][0];
$arp_pt_tooltip_settings['tooltip_width'] = '';
$arp_pt_tooltip_settings['tooltip_font_family'] = 'Open Sans';
$arp_pt_tooltip_settings['tooltip_font_size'] = 16;
$arp_pt_tooltip_settings['tooltip_font_style'] = 'normal';
$arp_pt_tooltip_settings['tooltip_trigger_type'] = 'hover';
$arp_pt_tooltip_settings['tooltip_display_style'] = 'default';
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#28ae4d";
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = "#f6fdf8";
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = "#d9ffe3";
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = "#28ae4d";
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = '#28ae4d';
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = '#28ae4d';
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = '#28ae4d';
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = '#28ae4d';
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#353738';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#353738';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#363535';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#363535';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#323232';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#323232';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#353738';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#353738';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);


$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['price_background_color'] = '#ffffff';
$column['column_0']['price_hover_background_color'] = '#ffffff';
$column['column_0']['arp_shortcode_customization_style'] = 'square_solid';
$column['column_0']['arp_shortcode_customization_size'] = 'small';
$column['column_0']['package_title'] = '';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 1;


$column['column_0']['header_background_color'] = '#f7f7f7';
$column['column_0']['header_hover_background_color'] = '#f7f7f7';
$column['column_0']['header_font_family'] = "Roboto";
$column['column_0']['header_font_size'] = 24;
$column['column_0']['header_font_color'] = "#373a3f";
$column['column_0']['header_hover_font_color'] = "#373a3f";
$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';



$column['column_0']['price_font_family'] = "Lato";
$column['column_0']['price_font_size'] = 26;
$column['column_0']['price_font_color'] = "#000000";
$column['column_0']['price_hover_font_color'] = "#000000";
$column['column_0']['price_label_style_bold'] = 'bold';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = "Arial";
$column['column_0']['price_text_font_size'] = 16;
$column['column_0']['price_text_font_color'] = "#7a7a7a";
$column['column_0']['price_text_hover_font_color'] = "#7a7a7a";
$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = '';
$column['column_0']['column_description_font_size'] = '';

$column['column_0']['column_description_font_color'] = '';
$column['column_0']['column_description_hover_font_color'] = '';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = "Roboto";
$column['column_0']['content_font_size'] = 16;
$column['column_0']['content_font_color'] = "#3d3b3b";
$column['column_0']['content_even_font_color'] = "#3d3b3b";
$column['column_0']['content_hover_font_color'] = "#ffffff";
$column['column_0']['content_even_hover_font_color'] = "#ffffff";
$column['column_0']['content_odd_color'] = '#ffffff';
$column['column_0']['content_odd_hover_color'] = '#ffffff';
$column['column_0']['content_even_color'] = '#f7f7f7';
$column['column_0']['content_even_hover_color'] = '#f7f7f7';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['button_background_color'] = '';
$column['column_0']['button_hover_background_color'] = '';
$column['column_0']['button_font_family'] = "Roboto Condensed";
$column['column_0']['button_font_size'] = 17;
$column['column_0']['button_font_color'] = "#000000";
$column['column_0']['button_hover_font_color'] = "#000000";
$column['column_0']['body_label_style_bold'] = 'bold';
$column['column_0']['body_label_style_italic'] = '';
$column['column_0']['body_label_style_decoration'] = '';



$column['column_0']['column_highlight'] = '';
$column['column_0']['html_content'] = "Hosting Plans";
$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_0']['row_description'] = 'Data Storage';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_1']['row_description'] = 'MySQL Databases';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_2']['row_description'] = 'Email Accounts';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_3']['row_description'] = 'Free Domain';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_4']['row_description'] = 'Online Support';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_5']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_5']['row_description'] = 'Support Tickets';
$column['column_0']['rows']['row_5']['row_tooltip'] = '';
$column['column_0']['rows']['row_5']['row_label'] = '';
$column['column_0']['rows']['row_5']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_5']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_5']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_5']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_5']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_5']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '';
$column['column_0']['button_height'] = '';
$column['column_0']['button_type'] = '';
$column['column_0']['button_text'] = '';
$column['column_0']['button_url'] = '';
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
$column['column_0']['footer_level_options_font_color'] = '#3d3b3b';
$column['column_0']['footer_level_options_hover_font_color'] = '#3d3b3b';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';
$column['column_0']['footer_background_color'] = '#ffffff';
$column['column_0']['footer_hover_background_color'] = '#ffffff';

$column['column_1']['price_background_color'] = '#ffffff';
$column['column_1']['price_hover_background_color'] = '#ffffff';
$column['column_1']['arp_shortcode_customization_style'] = 'square_solid';
$column['column_1']['arp_shortcode_customization_size'] = 'small';
$column['column_1']['package_title'] = 'Bronze';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['header_background_color'] = '#28ae4d';
$column['column_1']['header_hover_background_color'] = '#28ae4d';
$column['column_1']['header_font_family'] = "Lato";
$column['column_1']['header_font_size'] = 24;
$column['column_1']['header_font_color'] = "#ffffff";
$column['column_1']['header_hover_font_color'] = "#ffffff";
$column['column_1']['header_style_bold'] = 'bold';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';



$column['column_1']['price_font_family'] = "Lato";
$column['column_1']['price_font_size'] = 26;
$column['column_1']['price_font_color'] = "#353738";
$column['column_1']['price_hover_font_color'] = "#353738";
$column['column_1']['price_label_style_bold'] = 'bold';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = "Roboto";
$column['column_1']['price_text_font_size'] = 18;
$column['column_1']['price_text_font_color'] = "#363535";
$column['column_1']['price_text_hover_font_color'] = "#363535";
$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = '';
$column['column_1']['column_description_font_size'] = '';
$column['column_1']['column_description_font_color'] = '';
$column['column_1']['column_description_hover_font_color'] = '';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = "Roboto";
$column['column_1']['content_font_size'] = 16;
$column['column_1']['content_font_color'] = "#323232";
$column['column_1']['content_even_font_color'] = "#323232";
$column['column_1']['content_hover_font_color'] = "#ffffff";
$column['column_1']['content_even_hover_font_color'] = "#ffffff";
$column['column_1']['content_odd_color'] = '#f6fdf8';
$column['column_1']['content_odd_hover_color'] = '#28ae4d';
$column['column_1']['content_even_color'] = '#d9ffe3';
$column['column_1']['content_even_hover_color'] = '#28ae4d';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#f6f5fe';
$column['column_1']['button_hover_background_color'] = '#f6f5fe';
$column['column_1']['button_font_family'] = "Lato";
$column['column_1']['button_font_size'] = 19;
$column['column_1']['button_font_color'] = "#353738";
$column['column_1']['button_hover_font_color'] = "#353738";
$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';



$column['column_1']['column_highlight'] = '';

$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>20</span><span class='arp_price_duration' style='font-size:18px;font-weight:normal;'>month </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '10 GB';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = 'Every additional space of 1 GB costs $1.49';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '5 Databases';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = 'Every additional database costs $1.49';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '5 Email Accounts';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = 'Every additional email account costs $1.99';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '5 Free Domain';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = 'Every additional domain costs $1.49';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = 'No';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_5']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_5']['row_description'] = '2 tickets / month';
$column['column_1']['rows']['row_5']['row_label'] = '';
$column['column_1']['rows']['row_5']['row_tooltip'] = 'Every additional ticket costs $0.99';
$column['column_1']['rows']['row_5']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_5']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_5']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_5']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_5']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_5']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '140';
$column['column_1']['button_height'] = '45';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Purchase';
$column['column_1']['button_url'] = '#';
$column['column_1']['button_s_size'] = '';
$column['column_1']['button_s_type'] = '';
$column['column_1']['button_s_text'] = '';
$column['column_1']['button_s_url'] = '';
$column['column_1']['is_new_window'] = 0;
$column['column_1']['s_is_new_window'] = '';



$column['column_1']['footer_content'] = '';
$column['column_1']['footer_content_position'] = 0;
$column['column_1']['footer_level_options_font_family'] = 'Roboto';
$column['column_1']['footer_level_options_font_size'] = 12;
$column['column_1']['footer_level_options_font_color'] = '#ffffff';
$column['column_1']['footer_level_options_hover_font_color'] = '#ffffff';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['footer_background_color'] = '#28ae4d';
$column['column_1']['footer_hover_background_color'] = '#28ae4d';
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['price_background_color'] = '#ffffff';
$column['column_2']['price_hover_background_color'] = '#ffffff';
$column['column_2']['arp_shortcode_customization_style'] = 'square_solid';
$column['column_2']['arp_shortcode_customization_size'] = 'small';
$column['column_2']['package_title'] = 'Silver';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;


$column['column_2']['header_background_color'] = '#28ae4d';
$column['column_2']['header_hover_background_color'] = '#28ae4d';
$column['column_2']['header_font_family'] = "Lato";
$column['column_2']['header_font_size'] = 24;
$column['column_2']['header_font_color'] = "#ffffff";
$column['column_2']['header_hover_font_color'] = "#ffffff";
$column['column_2']['header_style_bold'] = 'bold';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_font_family'] = "Lato";
$column['column_2']['price_font_size'] = 26;
$column['column_2']['price_font_color'] = "#353738";
$column['column_2']['price_hover_font_color'] = "#353738";
$column['column_2']['price_label_style_bold'] = 'bold';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = "Roboto";
$column['column_2']['price_text_font_size'] = 18;
$column['column_2']['price_text_font_color'] = "#363535";
$column['column_2']['price_text_hover_font_color'] = "#363535";
$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = '';
$column['column_2']['column_description_font_size'] = '';
$column['column_2']['column_description_font_color'] = '';
$column['column_2']['column_description_hover_font_color'] = '';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = "Roboto";
$column['column_2']['content_font_size'] = 16;
$column['column_2']['content_font_color'] = "#323232";
$column['column_2']['content_even_font_color'] = "#323232";
$column['column_2']['content_hover_font_color'] = "#ffffff";
$column['column_2']['content_even_hover_font_color'] = "#ffffff";
$column['column_2']['content_odd_color'] = '#f6fdf8';
$column['column_2']['content_odd_hover_color'] = '#28ae4d';
$column['column_2']['content_even_color'] = '#d9ffe3';
$column['column_2']['content_even_hover_color'] = '#28ae4d';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#f6f5fe';
$column['column_2']['button_hover_background_color'] = '#f6f5fe';
$column['column_2']['button_font_family'] = "Lato";
$column['column_2']['button_font_size'] = 19;
$column['column_2']['button_font_color'] = "#353738";
$column['column_2']['button_hover_font_color'] = "#353738";
$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';



$column['column_2']['column_highlight'] = 1;


$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>50</span><span class='arp_price_duration' style='font-size:18px;font-weight:normal;'>month </span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '25 GB';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = 'Every additional space of 1 GB costs $1.49';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '10 Databases';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = 'Every additional database costs $1.49';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '10 Email Accounts';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = 'Every additional email account costs $1.99';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '10 Domains';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = 'Every additional domain costs $1.49';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = 'No';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_5']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_5']['row_description'] = '5 tickets / month';
$column['column_2']['rows']['row_5']['row_label'] = '';
$column['column_2']['rows']['row_5']['row_tooltip'] = 'Every additional ticket costs $0.99';
$column['column_2']['rows']['row_5']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_5']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_5']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_5']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_5']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_5']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '140';
$column['column_2']['button_height'] = '45';
$column['column_2']['button_type'] = 'button';
$column['column_2']['button_text'] = 'Purchase';
$column['column_2']['button_url'] = '#';
$column['column_2']['button_s_size'] = '';
$column['column_2']['button_s_type'] = '';
$column['column_2']['button_s_text'] = '';
$column['column_2']['button_s_url'] = '';
$column['column_2']['s_is_new_window'] = '';
$column['column_2']['is_new_window'] = 0;



$column['column_2']['footer_content'] = '';
$column['column_2']['footer_content_position'] = 0;
$column['column_2']['footer_level_options_font_family'] = 'Roboto';
$column['column_2']['footer_level_options_font_size'] = 12;
$column['column_2']['footer_level_options_font_color'] = '#ffffff';
$column['column_2']['footer_level_options_hover_font_color'] = '#ffffff';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['footer_background_color'] = '#28ae4d';
$column['column_2']['footer_hover_background_color'] = '#28ae4d';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['price_background_color'] = '#ffffff';
$column['column_3']['price_hover_background_color'] = '#ffffff';
$column['column_3']['arp_shortcode_customization_style'] = 'square_solid';
$column['column_3']['arp_shortcode_customization_size'] = 'small';
$column['column_3']['package_title'] = 'Gold';
$column['column_3']['column_description'] = '';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['is_caption'] = 0;

$column['column_3']['header_background_color'] = '#28ae4d';
$column['column_3']['header_hover_background_color'] = '#28ae4d';
$column['column_3']['header_font_family'] = "Lato";
$column['column_3']['header_font_size'] = 24;
$column['column_3']['header_font_color'] = "#ffffff";
$column['column_3']['header_hover_font_color'] = "#ffffff";
$column['column_3']['header_style_bold'] = 'bold';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';


$column['column_3']['price_font_family'] = "Lato";
$column['column_3']['price_font_size'] = 26;
$column['column_3']['price_font_color'] = "#353738";
$column['column_3']['price_hover_font_color'] = "#353738";
$column['column_3']['price_label_style_bold'] = 'bold';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = "Roboto";
$column['column_3']['price_text_font_size'] = 18;
$column['column_3']['price_text_font_color'] = "#363535";
$column['column_3']['price_text_hover_font_color'] = "#363535";
$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = '';
$column['column_3']['column_description_font_size'] = '';
$column['column_3']['column_description_font_color'] = '';
$column['column_3']['column_description_hover_font_color'] = '';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = "Roboto";
$column['column_3']['content_font_size'] = 16;
$column['column_3']['content_font_color'] = "#323232";
$column['column_3']['content_even_font_color'] = "#323232";
$column['column_3']['content_hover_font_color'] = "#ffffff";
$column['column_3']['content_even_hover_font_color'] = "#ffffff";
$column['column_3']['content_odd_color'] = '#f6fdf8';
$column['column_3']['content_odd_hover_color'] = '#28ae4d';
$column['column_3']['content_even_color'] = '#d9ffe3';
$column['column_3']['content_even_hover_color'] = '#28ae4d';
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#f6f5fe';
$column['column_3']['button_hover_background_color'] = '#f6f5fe';
$column['column_3']['button_font_family'] = "Lato";
$column['column_3']['button_font_size'] = 19;
$column['column_3']['button_font_color'] = "#353738";
$column['column_3']['button_hover_font_color'] = "#353738";
$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';



$column['column_3']['column_highlight'] = '';


$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>69</span><span class='arp_price_duration' style='font-size:18px;font-weight:normal;'>month </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '';
$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = '50 GB';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = 'Every additional space of 1 GB costs $1.49';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = '30 Databases';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = 'Every additional database costs $1.49';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = '20 Email Accounts';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = 'Every additional email account costs $1.99';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = '30 Domains';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = 'Every additional domain costs $1.49';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = 'Yes';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_5']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_5']['row_description'] = '10 tickets / month';
$column['column_3']['rows']['row_5']['row_label'] = '';
$column['column_3']['rows']['row_5']['row_tooltip'] = 'Every additional ticket costs $0.99';
$column['column_3']['rows']['row_5']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_5']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_5']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_5']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_5']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_5']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = '140';
$column['column_3']['button_height'] = '45';
$column['column_3']['button_type'] = 'button';
$column['column_3']['button_text'] = 'Purchase';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Roboto';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_hover_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['footer_background_color'] = '#28ae4d';
$column['column_3']['footer_hover_background_color'] = '#28ae4d';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);
$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);

/**
 * ARPrice Template 5
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 5';
$values['is_template'] = 1;
$values['template_name'] = 5;
$values['status'] = 'published';
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

$arp_pt_template_settings['template'] = 'arptemplate_5';
$arp_pt_template_settings['skin'] = 'multicolor';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0);



$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_5';
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


$arp_pt_column_settings['column_space'] = 0;
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 250;


$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1000;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['arp_global_button_type'] = 'none';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '0';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';

$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#ffffff';

$arp_pt_column_settings['arp_column_border_left'] = 0;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 0;
$arp_pt_column_settings['arp_column_border_bottom'] = 0;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;

$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['header_font_family_global'] = 'Roboto';
$arp_pt_column_settings['header_font_size_global'] = 20;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Jockey One';
$arp_pt_column_settings['price_font_size_global'] = 46;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['body_font_size_global'] = 15;
$arp_pt_column_settings['arp_body_text_alignment'] = 'left';
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
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
$arp_pt_column_animation['scrolling_columns'] = 2;
$arp_pt_column_animation['navigation'] = 1;
$arp_pt_column_animation['autoplay'] = 1;
$arp_pt_column_animation['sliding_effect'] = 'slide';
$arp_pt_column_animation['transition_speed'] = 750;
$arp_pt_column_animation['navigation_style'] = $arp_mainoptionsarr['general_options']['column_animation']['navigation_style'][0];
$arp_pt_column_animation['pagination'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination'];
$arp_pt_column_animation['pagination_style'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_style'][0];
$arp_pt_column_animation['pagination_position'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_position'][0];
$arp_pt_column_animation['easing_effect'] = $arp_mainoptionsarr['general_options']['column_animation']['easing_effect'][0];
$arp_pt_column_animation['infinite'] = $arp_mainoptionsarr['general_options']['column_animation']['infinite'];

$arp_pt_column_animation['navi_nav_btn'] = 'navigation';
$arp_pt_column_animation['pagi_nav_btn'] = 'pagination_bottom';
$arp_pt_column_animation['sticky_caption'] = 0;

$arp_pt_tooltip_settings['background_color'] = '#000000';
$arp_pt_tooltip_settings['text_color'] = '#FFFFFF';
$arp_pt_tooltip_settings['animation'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['animation'][0];
$arp_pt_tooltip_settings['position'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['position'][0];
$arp_pt_tooltip_settings['style'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['style'][0];
$arp_pt_tooltip_settings['tooltip_width'] = '';
$arp_pt_tooltip_settings['tooltip_font_family'] = 'Arial';
$arp_pt_tooltip_settings['tooltip_font_size'] = 15;
$arp_pt_tooltip_settings['tooltip_font_style'] = 'normal';
$arp_pt_tooltip_settings['tooltip_trigger_type'] = 'hover';
$arp_pt_tooltip_settings['tooltip_display_style'] = 'default';
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#e52937";
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = "#3f4448";
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = "#f4f4f4";
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#e52937";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = "#e52937";
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = "#e52937";
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#3f4448';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = '#F4F4F4';
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);


$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Basic';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';

$column['column_0']['header_background_color'] = '#e52937';
$column['column_0']['header_hover_background_color'] = '#e52937';
$column['column_0']['header_font_family'] = 'Roboto';
$column['column_0']['header_font_size'] = 20;
$column['column_0']['header_font_color'] = "#FFFFFF";
$column['column_0']['header_hover_font_color'] = "#FFFFFF";

$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';

$column['column_0']['price_background_color'] = '#3f4448';
$column['column_0']['price_hover_background_color'] = '#3f4448';
$column['column_0']['price_font_family'] = "Jockey One";
$column['column_0']['price_font_size'] = 46;
$column['column_0']['price_font_color'] = "#FFFFFF";
$column['column_0']['price_hover_font_color'] = "#FFFFFF";

$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Open Sans';
$column['column_0']['price_text_font_size'] = 17;
$column['column_0']['price_text_font_color'] = "#FFFFFF";
$column['column_0']['price_text_hover_font_color'] = "#FFFFFF";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = 'italic';
$column['column_0']['price_text_style_decoration'] = '';


$column['column_0']['column_description_font_family'] = 'Open Sans';
$column['column_0']['column_description_font_size'] = 10;

$column['column_0']['column_description_font_color'] = '#ffffff';
$column['column_0']['column_description_hover_font_color'] = '#ffffff';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';


$column['column_0']['content_font_family'] = "Open Sans";
$column['column_0']['content_font_size'] = 15;
$column['column_0']['content_font_color'] = "#333333";
$column['column_0']['content_even_font_color'] = "#333333";
$column['column_0']['content_hover_font_color'] = "#333333";
$column['column_0']['content_even_hover_font_color'] = "#333333";

$column['column_0']['content_odd_color'] = '#ffffff';
$column['column_0']['content_odd_hover_color'] = '#ffffff';
$column['column_0']['content_even_color'] = '#f4f4f4';
$column['column_0']['content_even_hover_color'] = '#f4f4f4';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';


$column['column_0']['button_background_color'] = '#e52937';
$column['column_0']['button_hover_background_color'] = '#e52937';
$column['column_0']['button_font_family'] = "Roboto";
$column['column_0']['button_font_size'] = 20;
$column['column_0']['button_font_color'] = "#FFFFFF";
$column['column_0']['button_hover_font_color'] = "#FFFFFF";

$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';



$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>49</span><span class='arp_price_duration' style='font-size:17px;font-style:italic;'> / month </span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = '[arp_youtube_video id="QpU_JbAO_Cg" height="145" autoplay="0"]';
$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_0']['row_description'] = '10 GB Disk Space';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_1']['row_description'] = '5 Databases';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_2']['row_description'] = '5 Email Accounts';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_3']['row_description'] = '5 Free Domain';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_4']['row_description'] = 'Online Support';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = 'Medium';
$column['column_0']['button_height'] = 'Medium';
$column['column_0']['button_type'] = 'Button';
$column['column_0']['button_text'] = 'Order Now';
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
$column['column_0']['footer_level_options_font_color'] = '#333333';
$column['column_0']['footer_level_options_hover_font_color'] = '#333333';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';

$column['column_1']['package_title'] = 'Small Business';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = 1;

$column['column_1']['header_background_color'] = '#fbb400';
$column['column_1']['header_hover_background_color'] = '#fbb400';
$column['column_1']['header_font_family'] = 'Roboto';
$column['column_1']['header_font_size'] = 20;
$column['column_1']['header_font_color'] = "#FFFFFF";
$column['column_1']['header_hover_font_color'] = "#FFFFFF";

$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_background_color'] = '#3f4448';
$column['column_1']['price_hover_background_color'] = '#3f4448';
$column['column_1']['price_font_family'] = "Jockey One";
$column['column_1']['price_font_size'] = 46;
$column['column_1']['price_font_color'] = "#FFFFFF";
$column['column_1']['price_hover_font_color'] = "#FFFFFF";

$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Open Sans';
$column['column_1']['price_text_font_size'] = 17;
$column['column_1']['price_text_font_color'] = "#FFFFFF";
$column['column_1']['price_text_hover_font_color'] = "#FFFFFF";

$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = 'italic';
$column['column_1']['price_text_style_decoration'] = '';


$column['column_1']['column_description_font_family'] = 'Open Sans';
$column['column_1']['column_description_font_size'] = 10;

$column['column_1']['column_description_font_color'] = '#ffffff';
$column['column_1']['column_description_hover_font_color'] = '#ffffff';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';


$column['column_1']['content_font_family'] = "Open Sans";
$column['column_1']['content_font_size'] = 15;
$column['column_1']['content_font_color'] = "#333333";
$column['column_1']['content_even_font_color'] = "#333333";
$column['column_1']['content_hover_font_color'] = "#333333";
$column['column_1']['content_even_hover_font_color'] = "#333333";

$column['column_1']['content_odd_color'] = '#ffffff';
$column['column_1']['content_odd_hover_color'] = '#ffffff';
$column['column_1']['content_even_color'] = '#f4f4f4';
$column['column_1']['content_even_hover_color'] = '#f4f4f4';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';


$column['column_1']['button_background_color'] = '#fbb400';
$column['column_1']['button_hover_background_color'] = '#fbb400';
$column['column_1']['button_font_family'] = "Roboto";
$column['column_1']['button_font_size'] = 20;
$column['column_1']['button_font_color'] = "#FFFFFF";
$column['column_1']['button_hover_font_color'] = "#FFFFFF";

$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';



$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>69</span><span class='arp_price_duration' style='font-size:17px;font-style:italic;'> / month </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '[arp_youtube_video id="l62OY19rZ7k" height="145" autoplay="0"]';
$column['column_1']['body_text_alignment'] = 'left';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_0']['row_description'] = '20 GB Disk Space';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_1']['row_description'] = '10 Databases';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_2']['row_description'] = '10 Email Accounts';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_3']['row_description'] = '10 Free Domain';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_4']['row_description'] = 'Online Support';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';

$column['column_1']['button_size'] = 'Medium';
$column['column_1']['button_height'] = 'Medium';
$column['column_1']['button_type'] = 'Button';
$column['column_1']['button_text'] = 'Order Now';
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
$column['column_1']['footer_level_options_font_color'] = '#333333';
$column['column_1']['footer_level_options_hover_font_color'] = '#333333';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Professional';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';

$column['column_2']['header_background_color'] = '#20aeff';
$column['column_2']['header_hover_background_color'] = '#20aeff';
$column['column_2']['header_font_family'] = 'Roboto';
$column['column_2']['header_font_size'] = 20;
$column['column_2']['header_font_color'] = "#FFFFFF";
$column['column_2']['header_hover_font_color'] = "#FFFFFF";

$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_background_color'] = '#3f4448';
$column['column_2']['price_hover_background_color'] = '#3f4448';
$column['column_2']['price_font_family'] = "Jockey One";
$column['column_2']['price_font_size'] = 46;
$column['column_2']['price_font_color'] = "#FFFFFF";
$column['column_2']['price_hover_font_color'] = "#FFFFFF";

$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Open Sans';
$column['column_2']['price_text_font_size'] = 17;
$column['column_2']['price_text_font_color'] = "#FFFFFF";
$column['column_2']['price_text_hover_font_color'] = "#FFFFFF";

$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = 'italic';
$column['column_2']['price_text_style_decoration'] = '';


$column['column_2']['column_description_font_family'] = 'Open Sans';
$column['column_2']['column_description_font_size'] = 10;

$column['column_2']['column_description_font_color'] = '#ffffff';
$column['column_2']['column_description_hover_font_color'] = '#ffffff';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';


$column['column_2']['content_font_family'] = "Open Sans";
$column['column_2']['content_font_size'] = 15;
$column['column_2']['content_font_color'] = "#333333";
$column['column_2']['content_even_font_color'] = "#333333";
$column['column_2']['content_hover_font_color'] = "#333333";
$column['column_2']['content_even_hover_font_color'] = "#333333";

$column['column_2']['content_odd_color'] = '#ffffff';
$column['column_2']['content_odd_hover_color'] = '#ffffff';
$column['column_2']['content_even_color'] = '#f4f4f4';
$column['column_2']['content_even_hover_color'] = '#f4f4f4';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';


$column['column_2']['button_background_color'] = '#20aeff';
$column['column_2']['button_hover_background_color'] = '#20aeff';
$column['column_2']['button_font_family'] = "Roboto";
$column['column_2']['button_font_size'] = 20;
$column['column_2']['button_font_color'] = "#FFFFFF";
$column['column_2']['button_hover_font_color'] = "#FFFFFF";

$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';



$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>79</span><span class='arp_price_duration' style='font-size:17px;font-style:italic;'> / month </span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '[arp_youtube_video id="JQwg9G99GJE" height="145" autoplay="0"]';
$column['column_2']['body_text_alignment'] = 'left';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_0']['row_description'] = '25 GB Disk Space';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_1']['row_description'] = '10 Databases';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_2']['row_description'] = '10 Email Accounts';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_3']['row_description'] = '10 Domains';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_4']['row_description'] = 'Online Support';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = 'Medium';
$column['column_2']['button_height'] = 'Medium';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Order Now';
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
$column['column_2']['footer_level_options_font_color'] = '#333333';
$column['column_2']['footer_level_options_hover_font_color'] = '#333333';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Enterprise';
$column['column_3']['column_description'] = '';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';

$column['column_3']['header_background_color'] = '#91d100';
$column['column_3']['header_hover_background_color'] = '#91d100';
$column['column_3']['header_font_family'] = 'Roboto';
$column['column_3']['header_font_size'] = 20;
$column['column_3']['header_font_color'] = "#FFFFFF";
$column['column_3']['header_hover_font_color'] = "#FFFFFF";

$column['column_3']['header_style_bold'] = '';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';

$column['column_3']['price_background_color'] = '#3f4448';
$column['column_3']['price_hover_background_color'] = '#3f4448';
$column['column_3']['price_font_family'] = "Jockey One";
$column['column_3']['price_font_size'] = 46;
$column['column_3']['price_font_color'] = "#FFFFFF";
$column['column_3']['price_hover_font_color'] = "#FFFFFF";

$column['column_3']['price_label_style_bold'] = '';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Open Sans';
$column['column_3']['price_text_font_size'] = 17;
$column['column_3']['price_text_font_color'] = "#FFFFFF";
$column['column_3']['price_text_hover_font_color'] = "#FFFFFF";

$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = 'italic';
$column['column_3']['price_text_style_decoration'] = '';


$column['column_3']['column_description_font_family'] = 'Open Sans';
$column['column_3']['column_description_font_size'] = 10;

$column['column_3']['column_description_font_color'] = '#ffffff';
$column['column_3']['column_description_hover_font_color'] = '#ffffff';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';


$column['column_3']['content_font_family'] = "Open Sans";
$column['column_3']['content_font_size'] = 15;
$column['column_3']['content_font_color'] = "#333333";
$column['column_3']['content_even_font_color'] = "#333333";
$column['column_3']['content_hover_font_color'] = "#333333";
$column['column_3']['content_even_hover_font_color'] = "#333333";

$column['column_3']['content_odd_color'] = '#ffffff';
$column['column_3']['content_odd_hover_color'] = '#ffffff';
$column['column_3']['content_even_color'] = '#f4f4f4';
$column['column_3']['content_even_hover_color'] = '#f4f4f4';
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';


$column['column_3']['button_background_color'] = '#91d100';
$column['column_3']['button_hover_background_color'] = '#91d100';
$column['column_3']['button_font_family'] = "Roboto";
$column['column_3']['button_font_size'] = 20;
$column['column_3']['button_font_color'] = "#FFFFFF";
$column['column_3']['button_hover_font_color'] = "#FFFFFF";

$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';



$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>99</span><span class='arp_price_duration' style='font-size:17px;font-style:italic;'> / month </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '[arp_youtube_video id="h_c3iQImXZg" height="145" autoplay="0"]';
$column['column_3']['body_text_alignment'] = 'left';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_0']['row_description'] = 'Unlimited Disk Space';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';

$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_1']['row_description'] = 'Unlimited Database';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_2']['row_description'] = '30 Email accounts';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_3']['row_description'] = '30 Free Domains';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_4']['row_description'] = 'Yes';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = 'Medium';
$column['column_3']['button_height'] = 'Medium';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Order Now';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#333333';
$column['column_3']['footer_level_options_hover_font_color'] = '#333333';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);
$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);

/**
 * ARPrice Template 6
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 6';
$values['is_template'] = 1;
$values['status'] = 'published';
$values['template_name'] = 6;
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

$arp_pt_template_settings['template'] = 'arptemplate_6';
$arp_pt_template_settings['skin'] = 'green';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'style_1', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_1', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0);



$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_6';
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


$arp_pt_column_settings['column_space'] = 0;
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 200;


$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 800;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 4;
$arp_pt_column_settings['arp_global_button_type'] = 'shadow';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;


$arp_pt_column_settings['arp_row_border_size'] = '1';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#cccccc';


$arp_pt_column_settings['arp_caption_row_border_size'] = '1';
$arp_pt_column_settings['arp_caption_row_border_style'] = 'solid';
$arp_pt_column_settings['arp_caption_row_border_color'] = '#87BD41';


$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#e3e3e3';

$arp_pt_column_settings['arp_column_border_left'] = 0;
$arp_pt_column_settings['arp_column_border_right'] = 0;
$arp_pt_column_settings['arp_column_border_top'] = 0;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;



$arp_pt_column_settings['arp_caption_border_size'] = '1';
$arp_pt_column_settings['arp_caption_border_style'] = 'solid';
$arp_pt_column_settings['arp_caption_border_color'] = '#cccccc';

$arp_pt_column_settings['arp_caption_border_left'] = 0;
$arp_pt_column_settings['arp_caption_border_right'] = 0;
$arp_pt_column_settings['arp_caption_border_top'] = 0;
$arp_pt_column_settings['arp_caption_border_bottom'] = 1;



$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;


$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_settings['header_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['header_font_size_global'] = 26;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['price_font_size_global'] = 65;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['body_font_size_global'] = 14;
$arp_pt_column_settings['arp_body_text_alignment'] = 'center';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['footer_font_size_global'] = 12;
$arp_pt_column_settings['arp_footer_text_alignment'] = 'center';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Roboto';
$arp_pt_column_settings['button_font_size_global'] = 15;
$arp_pt_column_settings['arp_button_text_alignment'] = 'center';
$arp_pt_column_settings['arp_button_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_button_text_italic_global'] = '';
$arp_pt_column_settings['arp_button_text_decoration_global'] = '';
$arp_pt_column_settings['description_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['description_font_size_global'] = 19;
$arp_pt_column_settings['arp_description_text_alignment'] = 'center';
$arp_pt_column_settings['arp_description_text_bold_global'] = '';
$arp_pt_column_settings['arp_description_text_italic_global'] = '';
$arp_pt_column_settings['arp_description_text_decoration_global'] = '';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
$arp_pt_column_animation['scrolling_columns'] = 2;
$arp_pt_column_animation['navigation'] = 1;
$arp_pt_column_animation['autoplay'] = 1;
$arp_pt_column_animation['sliding_effect'] = 'slide';
$arp_pt_column_animation['transition_speed'] = 750;
$arp_pt_column_animation['navigation_style'] = $arp_mainoptionsarr['general_options']['column_animation']['navigation_style'][0];
$arp_pt_column_animation['pagination'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination'];
$arp_pt_column_animation['pagination_style'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_style'][0];
$arp_pt_column_animation['pagination_position'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_position'][0];
$arp_pt_column_animation['easing_effect'] = $arp_mainoptionsarr['general_options']['column_animation']['easing_effect'][0];
$arp_pt_column_animation['infinite'] = $arp_mainoptionsarr['general_options']['column_animation']['infinite'];

$arp_pt_column_animation['navi_nav_btn'] = 'navigation';
$arp_pt_column_animation['pagi_nav_btn'] = 'pagination_bottom';
$arp_pt_column_animation['sticky_caption'] = 0;

$arp_pt_tooltip_settings['background_color'] = '#FFFFFF';
$arp_pt_tooltip_settings['text_color'] = '#000000';
$arp_pt_tooltip_settings['animation'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['animation'][0];
$arp_pt_tooltip_settings['position'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['position'][0];
$arp_pt_tooltip_settings['style'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['style'][0];
$arp_pt_tooltip_settings['tooltip_width'] = '';
$arp_pt_tooltip_settings['tooltip_font_family'] = 'Open Sans Bold';
$arp_pt_tooltip_settings['tooltip_font_size'] = 14;
$arp_pt_tooltip_settings['tooltip_font_style'] = 'normal';
$arp_pt_tooltip_settings['tooltip_trigger_type'] = 'hover';
$arp_pt_tooltip_settings['tooltip_display_style'] = 'default';
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#87bd41";
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = "#f1f1f1";
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = "#f4f4f4";
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = "#f4f4f4";
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#87bd41";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = "#87bd41";
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = '#5F842E';
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#87bd41';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = '#f4f4f4';
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = '#87bd41';
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#7c7c7c';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#7c7c7c';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#7c7c7c';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#7c7c7c';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#7c7c7c';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#7c7c7c';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = '#7c7c7c';
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = '#7c7c7c';
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#d83306';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();


$column['column_0']['package_title'] = '';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['column_align'] = 'left';


$column['column_0']['header_background_color'] = '#79ab3a';
$column['column_0']['header_hover_background_color'] = '#5f842e';
$column['column_0']['header_font_family'] = 'Open Sans Bold';
$column['column_0']['header_font_size'] = 19;

$column['column_0']['header_font_color'] = '#ffffff';
$column['column_0']['header_hover_font_color'] = '#ffffff';
$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_background_color'] = '';
$column['column_0']['price_hover_background_color'] = '';
$column['column_0']['price_font_family'] = 'Open Sans';
$column['column_0']['price_font_size'] = 18;

$column['column_0']['price_font_color'] = '#ffffff';
$column['column_0']['price_hover_font_color'] = '#ffffff';
$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';



$column['column_0']['price_text_font_family'] = 'Open Sans';
$column['column_0']['price_text_font_size'] = 18;

$column['column_0']['price_text_font_color'] = '#ffffff';
$column['column_0']['price_text_hover_font_color'] = '#ffffff';
$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = 'Open Sans';
$column['column_0']['column_description_font_size'] = 13;

$column['column_0']['column_description_font_color'] = '#ffffff';
$column['column_0']['column_description_hover_font_color'] = '#ffffff';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = 'Open Sans Bold';
$column['column_0']['content_font_size'] = 14;

$column['column_0']['content_font_color'] = '#ffffff';
$column['column_0']['content_even_font_color'] = '#ffffff';
$column['column_0']['content_hover_font_color'] = '#ffffff';
$column['column_0']['content_even_hover_font_color'] = '#ffffff';
$column['column_0']['content_odd_color'] = '#87bd41';
$column['column_0']['content_odd_hover_color'] = '#87bd41';
$column['column_0']['content_even_color'] = '#79ab3a';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['button_background_color'] = '';
$column['column_0']['button_hover_background_color'] = '';
$column['column_0']['button_font_family'] = 'Open Sans Bold';
$column['column_0']['button_font_size'] = 16;

$column['column_0']['button_font_color'] = '#ffffff';
$column['column_0']['button_hover_font_color'] = '#d83306';
$column['column_0']['button_style_bold'] = 'bold';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';



$column['column_0']['is_caption'] = 1;

$column['column_0']['column_highlight'] = '';
$column['column_0']['html_content'] = "Choose Your Plan";
$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_0']['row_description'] = 'Data Storage';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_1']['row_description'] = 'MySQL Databases';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_2']['row_description'] = 'Daily Backup';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_3']['row_description'] = 'Free Domains';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_4']['row_description'] = 'Online Support';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '';
$column['column_0']['button_height'] = '';
$column['column_0']['button_type'] = '';
$column['column_0']['button_text'] = '';
$column['column_0']['button_url'] = '';
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
$column['column_0']['footer_background_color'] = '#87bd41';
$column['column_0']['footer_hover_background_color'] = '';


$column['column_1']['package_title'] = "Basic <div style='font-size:13px;font-wight:normal;'>Aenean a placerat neque</div>";
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['column_align'] = 'left';


$column['column_1']['header_background_color'] = '#87bd41';
$column['column_1']['header_hover_background_color'] = '#5f842e';
$column['column_1']['header_font_family'] = 'Open Sans Bold';
$column['column_1']['header_font_size'] = 26;

$column['column_1']['header_font_color'] = '#ffffff';
$column['column_1']['header_hover_font_color'] = '#ffffff';
$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_background_color'] = '#f1f1f1';
$column['column_1']['price_hover_background_color'] = '#87bd41';
$column['column_1']['price_font_family'] = 'Open Sans Bold';
$column['column_1']['price_font_size'] = 65;

$column['column_1']['price_font_color'] = '#7C7C7C';
$column['column_1']['price_hover_font_color'] = '#ffffff';
$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';



$column['column_1']['price_text_font_family'] = 'Open Sans';
$column['column_1']['price_text_font_size'] = 15;

$column['column_1']['price_text_font_color'] = '#7C7C7C';
$column['column_1']['price_text_hover_font_color'] = '#ffffff';
$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = 'Open Sans';
$column['column_1']['column_description_font_size'] = 13;

$column['column_1']['column_description_font_color'] = '#ffffff';
$column['column_1']['column_description_hover_font_color'] = '#ffffff';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = 'Open Sans';
$column['column_1']['content_font_size'] = 14;

$column['column_1']['content_font_color'] = '#7C7C7C';
$column['column_1']['content_even_font_color'] = '#7C7C7C';
$column['column_1']['content_hover_font_color'] = '#7C7C7C';
$column['column_1']['content_even_hover_font_color'] = '#7C7C7C';
$column['column_1']['content_odd_color'] = '#f4f4f4';
$column['column_1']['content_odd_hover_color'] = '#f4f4f4';
$column['column_1']['content_even_color'] = '#ffffff';
$column['column_1']['content_even_hover_color'] = '#ffffff';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#87bd41';
$column['column_1']['button_hover_background_color'] = '#ffffff';
$column['column_1']['button_font_family'] = 'Roboto';
$column['column_1']['button_font_size'] = 15;

$column['column_1']['button_font_color'] = '#ffffff';
$column['column_1']['button_hover_font_color'] = '#d83306';
$column['column_1']['button_style_bold'] = 'bold';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';

$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>20</span><span class='arp_price_duration' style='font-size:17px;'> month </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '20GB';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '15 Databases';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = 'No';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '2 Domains';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = 'No';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '146';
$column['column_1']['button_height'] = '45';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Purchase';
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
$column['column_1']['footer_level_options_font_color'] = '#7C7C7C';
$column['column_1']['footer_level_options_hover_font_color'] = '#7C7C7C';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['footer_background_color'] = '#f4f4f4';
$column['column_1']['footer_hover_background_color'] = '#87bd41';
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = "Standard <div style='font-size:13px;'>Aenean a placerat neque</div>";
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['column_align'] = 'left';


$column['column_2']['header_background_color'] = '#87bd41';
$column['column_2']['header_hover_background_color'] = '#5f842e';
$column['column_2']['header_font_family'] = 'Open Sans Bold';
$column['column_2']['header_font_size'] = 26;

$column['column_2']['header_font_color'] = '#ffffff';
$column['column_2']['header_hover_font_color'] = '#ffffff';
$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_background_color'] = '#f1f1f1';
$column['column_2']['price_hover_background_color'] = '#87bd41';
$column['column_2']['price_font_family'] = 'Open Sans Bold';
$column['column_2']['price_font_size'] = 65;

$column['column_2']['price_font_color'] = '#7C7C7C';
$column['column_2']['price_hover_font_color'] = '#ffffff';
$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';



$column['column_2']['price_text_font_family'] = 'Open Sans';
$column['column_2']['price_text_font_size'] = 15;

$column['column_2']['price_text_font_color'] = '#7C7C7C';
$column['column_2']['price_text_hover_font_color'] = '#ffffff';
$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = 'Open Sans';
$column['column_2']['column_description_font_size'] = 13;

$column['column_2']['column_description_font_color'] = '#ffffff';
$column['column_2']['column_description_hover_font_color'] = '#ffffff';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = 'Open Sans';
$column['column_2']['content_font_size'] = 14;

$column['column_2']['content_font_color'] = '#7C7C7C';
$column['column_2']['content_even_font_color'] = '#7C7C7C';
$column['column_2']['content_hover_font_color'] = '#7C7C7C';
$column['column_2']['content_even_hover_font_color'] = '#7C7C7C';
$column['column_2']['content_odd_color'] = '#f4f4f4';
$column['column_2']['content_odd_hover_color'] = '#f4f4f4';
$column['column_2']['content_even_color'] = '#ffffff';
$column['column_2']['content_even_hover_color'] = '#ffffff';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#87bd41';
$column['column_2']['button_hover_background_color'] = '#ffffff';
$column['column_2']['button_font_family'] = 'Roboto';
$column['column_2']['button_font_size'] = 15;

$column['column_2']['button_font_color'] = '#ffffff';
$column['column_2']['button_hover_font_color'] = '#d83306';
$column['column_2']['button_style_bold'] = 'bold';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';

$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>30</span><span class='arp_price_duration' style='font-size:17px;'> month </span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '80GB';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '100 Databases';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = 'No';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '5 Domains';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = 'No';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '146';
$column['column_2']['button_height'] = '45';
$column['column_2']['button_type'] = 'button';
$column['column_2']['button_text'] = 'Purchase';
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
$column['column_2']['footer_level_options_font_color'] = '#7C7C7C';
$column['column_2']['footer_level_options_hover_font_color'] = '#7C7C7C';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['footer_background_color'] = '#f4f4f4';
$column['column_2']['footer_hover_background_color'] = '#87bd41';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = "Premium <div style='font-size:13px;'>Aenean a placerat neque</div>";
$column['column_3']['column_description'] = '';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['column_align'] = 'left';


$column['column_3']['header_background_color'] = '#87bd41';
$column['column_3']['header_hover_background_color'] = '#5f842e';
$column['column_3']['header_font_family'] = 'Open Sans Bold';
$column['column_3']['header_font_size'] = 26;

$column['column_3']['header_font_color'] = '#ffffff';
$column['column_3']['header_hover_font_color'] = '#ffffff';
$column['column_3']['header_style_bold'] = '';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';


$column['column_3']['price_background_color'] = '#f1f1f1';
$column['column_3']['price_hover_background_color'] = '#87bd41';
$column['column_3']['price_font_family'] = 'Open Sans Bold';
$column['column_3']['price_font_size'] = 65;

$column['column_3']['price_font_color'] = '#7C7C7C';
$column['column_3']['price_hover_font_color'] = '#ffffff';
$column['column_3']['price_label_style_bold'] = '';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';



$column['column_3']['price_text_font_family'] = 'Open Sans';
$column['column_3']['price_text_font_size'] = 15;

$column['column_3']['price_text_font_color'] = '#7C7C7C';
$column['column_3']['price_text_hover_font_color'] = '#ffffff';
$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = 'Open Sans';
$column['column_3']['column_description_font_size'] = 13;

$column['column_3']['column_description_font_color'] = '#ffffff';
$column['column_3']['column_description_hover_font_color'] = '#ffffff';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = 'Open Sans';
$column['column_3']['content_font_size'] = 14;

$column['column_3']['content_font_color'] = '#7C7C7C';
$column['column_3']['content_even_font_color'] = '#7C7C7C';
$column['column_3']['content_hover_font_color'] = '#7C7C7C';
$column['column_3']['content_even_hover_font_color'] = '#7C7C7C';
$column['column_3']['content_odd_color'] = '#f4f4f4';
$column['column_3']['content_odd_hover_color'] = '#f4f4f4';
$column['column_3']['content_even_color'] = '#ffffff';
$column['column_3']['content_even_hover_color'] = '#ffffff';
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#87bd41';
$column['column_3']['button_hover_background_color'] = '#ffffff';
$column['column_3']['button_font_family'] = 'Roboto';
$column['column_3']['button_font_size'] = 15;

$column['column_3']['button_font_color'] = '#ffffff';
$column['column_3']['button_hover_font_color'] = '#d83306';
$column['column_3']['button_style_bold'] = 'bold';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';


$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';

$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>40</span><span class='arp_price_duration' style='font-size:17px;'> month </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '';
$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = '150GB';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = '150 Databases';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = 'Yes';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = '10 Domains';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = 'Yes';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = '146';
$column['column_3']['button_height'] = '45';
$column['column_3']['button_type'] = 'button';
$column['column_3']['button_text'] = 'Purchase';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['is_new_window'] = 0;
$column['column_3']['s_is_new_window'] = '';



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#7C7C7C';
$column['column_3']['footer_level_options_hover_font_color'] = '#7C7C7C';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['footer_background_color'] = '#f4f4f4';
$column['column_3']['footer_hover_background_color'] = '#87bd41';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 7
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 7';
$values['is_template'] = 1;
$values['template_name'] = 7;
$values['status'] = 'published';
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

$arp_pt_template_settings['template'] = 'arptemplate_7';
$arp_pt_template_settings['skin'] = 'blue';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_1', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_3', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'position_1', 'tooltip_position' => 'top-left', 'tooltip_style' => 'style_1', 'second_btn' => false, 'is_animated' => 0);



$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_7';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;

$arp_pt_column_settings['all_column_width'] = 240;


$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1000;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['arp_global_button_type'] = 'shadow';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '1';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#e1e1e1';

$arp_pt_column_settings['arp_column_border_size'] = '2';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#dfdbdc';

$arp_pt_column_settings['arp_column_border_left'] = 1;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;


$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_settings['header_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['header_font_size_global'] = 19;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Anton';
$arp_pt_column_settings['price_font_size_global'] = 46;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Arial';
$arp_pt_column_settings['body_font_size_global'] = 14;
$arp_pt_column_settings['arp_body_text_alignment'] = 'left';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = '';
$arp_pt_column_settings['footer_font_size_global'] = '';
$arp_pt_column_settings['arp_footer_text_alignment'] = '';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Arial';
$arp_pt_column_settings['button_font_size_global'] = 18;
$arp_pt_column_settings['arp_button_text_alignment'] = 'center';
$arp_pt_column_settings['arp_button_text_bold_global'] = '';
$arp_pt_column_settings['arp_button_text_italic_global'] = '';
$arp_pt_column_settings['arp_button_text_decoration_global'] = '';
$arp_pt_column_settings['description_font_family_global'] = 'Arial';
$arp_pt_column_settings['description_font_size_global'] = 14;
$arp_pt_column_settings['arp_description_text_alignment'] = 'center';
$arp_pt_column_settings['arp_description_text_bold_global'] = '';
$arp_pt_column_settings['arp_description_text_italic_global'] = '';
$arp_pt_column_settings['arp_description_text_decoration_global'] = '';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
$arp_pt_column_animation['scrolling_columns'] = 2;
$arp_pt_column_animation['navigation'] = 1;
$arp_pt_column_animation['autoplay'] = 1;
$arp_pt_column_animation['sliding_effect'] = 'slide';
$arp_pt_column_animation['transition_speed'] = 750;
$arp_pt_column_animation['navigation_style'] = $arp_mainoptionsarr['general_options']['column_animation']['navigation_style'][0];
$arp_pt_column_animation['pagination'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination'];
$arp_pt_column_animation['pagination_style'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_style'][0];
$arp_pt_column_animation['pagination_position'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_position'][0];
$arp_pt_column_animation['easing_effect'] = $arp_mainoptionsarr['general_options']['column_animation']['easing_effect'][0];
$arp_pt_column_animation['infinite'] = $arp_mainoptionsarr['general_options']['column_animation']['infinite'];

$arp_pt_column_animation['navi_nav_btn'] = 'navigation';
$arp_pt_column_animation['pagi_nav_btn'] = 'pagination_bottom';
$arp_pt_column_animation['sticky_caption'] = 0;

$arp_pt_tooltip_settings['background_color'] = '#77b900';
$arp_pt_tooltip_settings['text_color'] = '#FFFFFF';
$arp_pt_tooltip_settings['animation'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['animation'][0];
$arp_pt_tooltip_settings['position'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['position'][2];
$arp_pt_tooltip_settings['style'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['style'][0];
$arp_pt_tooltip_settings['tooltip_width'] = '';
$arp_pt_tooltip_settings['tooltip_font_family'] = 'Arial';
$arp_pt_tooltip_settings['tooltip_font_size'] = 14;
$arp_pt_tooltip_settings['tooltip_font_style'] = 'normal';
$arp_pt_tooltip_settings['tooltip_trigger_type'] = 'hover';
$arp_pt_tooltip_settings['tooltip_display_style'] = 'default';
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#000000";
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = "#f2f2f2";
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#3473dc";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = "#3e3e3c";
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = '#f2f2f2';
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#3e3e3c';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#3e3e3c';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#898989';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#898989';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = '#7c7c7c';
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = '#7c7c7c';
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);


$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Basic';
$column['column_0']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel.';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';

$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>11</span><span class='arp_price_duration' style='font-size:16px;'> / month </span>";
$column['column_0']['price_label'] = "";


$column['column_0']['header_background_color'] = '#000000';
$column['column_0']['header_hover_background_color'] = '#000000';
$column['column_0']['header_font_family'] = 'Open Sans Bold';
$column['column_0']['header_font_size'] = 19;
$column['column_0']['header_font_color'] = "#ffffff";
$column['column_0']['header_hover_font_color'] = "#ffffff";

$column['column_0']['header_style_bold'] = 'bold';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_font_family'] = "Anton";
$column['column_0']['price_font_size'] = 46;
$column['column_0']['price_font_color'] = "#3E3E3C";
$column['column_0']['price_hover_font_color'] = "#3E3E3C";

$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Arial';
$column['column_0']['price_text_font_size'] = 16;
$column['column_0']['price_text_font_color'] = "#898989";
$column['column_0']['price_text_hover_font_color'] = "#898989";

$column['column_0']['price_text_style_bold'] = 'bold';
$column['column_0']['price_text_style_italic'] = 'italic';
$column['column_0']['price_text_style_decoration'] = '';


$column['column_0']['column_description_font_family'] = 'Arial';
$column['column_0']['column_description_font_size'] = 14;

$column['column_0']['column_description_font_color'] = '#7c7c7c';
$column['column_0']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_0']['column_desc_background_color'] = '#ffffff';
$column['column_0']['column_desc_hover_background_color'] = '#ffffff';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';


$column['column_0']['content_font_family'] = "Arial";
$column['column_0']['content_font_size'] = 14;
$column['column_0']['content_font_color'] = "#333333";
$column['column_0']['content_even_font_color'] = "#333333";
$column['column_0']['content_hover_font_color'] = "#333333";
$column['column_0']['content_even_hover_font_color'] = "#333333";

$column['column_0']['content_odd_color'] = '#ffffff';
$column['column_0']['content_odd_hover_color'] = '#ffffff';
$column['column_0']['content_even_color'] = '#f2f2f2';
$column['column_0']['content_even_hover_color'] = '#f2f2f2';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';


$column['column_0']['button_background_color'] = '#3473dc';
$column['column_0']['button_hover_background_color'] = '#3e3e3c';
$column['column_0']['button_font_family'] = "Arial";
$column['column_0']['button_font_size'] = 18;
$column['column_0']['button_font_color'] = "#ffffff";
$column['column_0']['button_hover_font_color'] = "#ffffff";

$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['arp_header_shortcode'] = '<img src="' . PRICINGTABLE_IMAGES_URL . '/arptemplate_7_1.jpg" />';
$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_0']['row_description'] = '<i class="fas fa-clock-o arpsize-ico-14"></i> 10 GB Disk Space';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_1']['row_description'] = '  <i class="fas fa-shopping-cart arpsize-ico-14"></i> 5 Databases';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_2']['row_description'] = '<i class="fas fa-star arpsize-ico-14"></i> 5 Email Accounts';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_3']['row_description'] = '<i class="fas fa-heart arpsize-ico-14"></i> 5 Free Domain';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '146';
$column['column_0']['button_height'] = '45';
$column['column_0']['button_type'] = 'Button';
$column['column_0']['button_text'] = 'Sign Up';
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
$column['column_0']['footer_level_options_font_color'] = '#333333';
$column['column_0']['footer_level_options_hover_font_color'] = '#333333';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';

$column['column_1']['package_title'] = 'Team';
$column['column_1']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel.';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = 1;

$column['column_1']['header_background_color'] = '#000000';
$column['column_1']['header_hover_background_color'] = '#000000';
$column['column_1']['header_font_family'] = 'Open Sans Bold';
$column['column_1']['header_font_size'] = 19;
$column['column_1']['header_font_color'] = "#ffffff";
$column['column_1']['header_hover_font_color'] = "#ffffff";

$column['column_1']['header_style_bold'] = 'bold';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_font_family'] = "Anton";
$column['column_1']['price_font_size'] = 46;
$column['column_1']['price_font_color'] = "#3E3E3C";
$column['column_1']['price_hover_font_color'] = "#3E3E3C";

$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Arial';
$column['column_1']['price_text_font_size'] = 16;
$column['column_1']['price_text_font_color'] = "#898989";
$column['column_1']['price_text_hover_font_color'] = "#898989";

$column['column_1']['price_text_style_bold'] = 'bold';
$column['column_1']['price_text_style_italic'] = 'italic';
$column['column_1']['price_text_style_decoration'] = '';


$column['column_1']['column_description_font_family'] = 'Arial';
$column['column_1']['column_description_font_size'] = 14;

$column['column_1']['column_description_font_color'] = '#7c7c7c';
$column['column_1']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_1']['column_desc_background_color'] = '#ffffff';
$column['column_1']['column_desc_hover_background_color'] = '#ffffff';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';


$column['column_1']['content_font_family'] = "Arial";
$column['column_1']['content_font_size'] = 14;
$column['column_1']['content_font_color'] = "#333333";
$column['column_1']['content_even_font_color'] = "#333333";
$column['column_1']['content_hover_font_color'] = "#333333";
$column['column_1']['content_even_hover_font_color'] = "#333333";

$column['column_1']['content_odd_color'] = '#ffffff';
$column['column_1']['content_odd_hover_color'] = '#ffffff';
$column['column_1']['content_even_color'] = '#f2f2f2';
$column['column_1']['content_even_hover_color'] = '#f2f2f2';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';


$column['column_1']['button_background_color'] = '#3473dc';
$column['column_1']['button_hover_background_color'] = '#3e3e3c';
$column['column_1']['button_font_family'] = "Arial";
$column['column_1']['button_font_size'] = 18;
$column['column_1']['button_font_color'] = "#ffffff";
$column['column_1']['button_hover_font_color'] = "#ffffff";

$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';



$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>22</span><span class='arp_price_duration' style='font-size:16px;'> / month </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '<img src="' . PRICINGTABLE_IMAGES_URL . '/arptemplate_7_2.jpg" />';
$column['column_1']['body_text_alignment'] = 'left';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_0']['row_description'] = '<i class="fas fa-clock-o arpsize-ico-14"></i> 20 GB Disk Space';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';

$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_1']['row_description'] = '<i class="fas fa-shopping-cart arpsize-ico-14"></i> 10 Databases';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';

$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_2']['row_description'] = '<i class="fas fa-star arpsize-ico-14"></i> 10 Email Accounts';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_3']['row_description'] = '<i class="fas fa-heart arpsize-ico-14"></i> 10 Free Domain';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '146';
$column['column_1']['button_height'] = '45';
$column['column_1']['button_type'] = 'Button';
$column['column_1']['button_text'] = 'Sign Up';
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
$column['column_1']['footer_level_options_font_color'] = '#333333';
$column['column_1']['footer_level_options_hover_font_color'] = '#333333';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Premium';
$column['column_2']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel.';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = 0;

$column['column_2']['header_background_color'] = '#000000';
$column['column_2']['header_hover_background_color'] = '#000000';
$column['column_2']['header_font_family'] = 'Open Sans Bold';
$column['column_2']['header_font_size'] = 19;
$column['column_2']['header_font_color'] = "#ffffff";
$column['column_2']['header_hover_font_color'] = "#ffffff";

$column['column_2']['header_style_bold'] = 'bold';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_font_family'] = "Anton";
$column['column_2']['price_font_size'] = 46;
$column['column_2']['price_font_color'] = "#3E3E3C";
$column['column_2']['price_hover_font_color'] = "#3E3E3C";

$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Arial';
$column['column_2']['price_text_font_size'] = 16;
$column['column_2']['price_text_font_color'] = "#898989";
$column['column_2']['price_text_hover_font_color'] = "#898989";

$column['column_2']['price_text_style_bold'] = 'bold';
$column['column_2']['price_text_style_italic'] = 'italic';
$column['column_2']['price_text_style_decoration'] = '';


$column['column_2']['column_description_font_family'] = 'Arial';
$column['column_2']['column_description_font_size'] = 14;

$column['column_2']['column_description_font_color'] = '#7c7c7c';
$column['column_2']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_2']['column_desc_background_color'] = '#ffffff';
$column['column_2']['column_desc_hover_background_color'] = '#ffffff';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';


$column['column_2']['content_font_family'] = "Arial";
$column['column_2']['content_font_size'] = 14;
$column['column_2']['content_font_color'] = "#333333";
$column['column_2']['content_even_font_color'] = "#333333";
$column['column_2']['content_hover_font_color'] = "#333333";
$column['column_2']['content_even_hover_font_color'] = "#333333";

$column['column_2']['content_odd_color'] = '#ffffff';
$column['column_2']['content_odd_hover_color'] = '#ffffff';
$column['column_2']['content_even_color'] = '#f2f2f2';
$column['column_2']['content_even_hover_color'] = '#f2f2f2';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';


$column['column_2']['button_background_color'] = '#3473dc';
$column['column_2']['button_hover_background_color'] = '#3e3e3c';
$column['column_2']['button_font_family'] = "Arial";
$column['column_2']['button_font_size'] = 18;
$column['column_2']['button_font_color'] = "#ffffff";
$column['column_2']['button_hover_font_color'] = "#ffffff";

$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';



$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>38</span><span class='arp_price_duration' style='font-size:16px;'> / month </span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '<img src="' . PRICINGTABLE_IMAGES_URL . '/arptemplate_7_3.jpg" />';
$column['column_2']['body_text_alignment'] = 'left';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_0']['row_description'] = '<i class="fas fa-clock-o arpsize-ico-14"></i> 25 GB Disk Space';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';

$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_1']['row_description'] = '<i class="fas fa-shopping-cart arpsize-ico-14"></i></i> 10 Databases';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_2']['row_description'] = '<i class="fas fa-star arpsize-ico-14"></i> 10 Email Accounts';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = 'Pertinax vel eum moleti';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_3']['row_description'] = '<i class="fas fa-heart arpsize-ico-14"></i> 10 Domains';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '146';
$column['column_2']['button_height'] = '45';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Sign Up';
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
$column['column_2']['footer_level_options_font_color'] = '#333333';
$column['column_2']['footer_level_options_hover_font_color'] = '#333333';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Corporate';
$column['column_3']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel.';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';

$column['column_3']['header_background_color'] = '#000000';
$column['column_3']['header_hover_background_color'] = '#000000';
$column['column_3']['header_font_family'] = 'Open Sans Bold';
$column['column_3']['header_font_size'] = 19;
$column['column_3']['header_font_color'] = "#ffffff";
$column['column_3']['header_hover_font_color'] = "#ffffff";

$column['column_3']['header_style_bold'] = 'bold';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';


$column['column_3']['price_font_family'] = "Anton";
$column['column_3']['price_font_size'] = 46;
$column['column_3']['price_font_color'] = "#3E3E3C";
$column['column_3']['price_hover_font_color'] = "#3E3E3C";

$column['column_3']['price_label_style_bold'] = '';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Arial';
$column['column_3']['price_text_font_size'] = 16;
$column['column_3']['price_text_font_color'] = "#898989";
$column['column_3']['price_text_hover_font_color'] = "#898989";

$column['column_3']['price_text_style_bold'] = 'bold';
$column['column_3']['price_text_style_italic'] = 'italic';
$column['column_3']['price_text_style_decoration'] = '';


$column['column_3']['column_description_font_family'] = 'Arial';
$column['column_3']['column_description_font_size'] = 14;

$column['column_3']['column_description_font_color'] = '#7c7c7c';
$column['column_3']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_3']['column_desc_background_color'] = '#ffffff';
$column['column_3']['column_desc_hover_background_color'] = '#ffffff';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';


$column['column_3']['content_font_family'] = "Arial";
$column['column_3']['content_font_size'] = 14;
$column['column_3']['content_font_color'] = "#333333";
$column['column_3']['content_even_font_color'] = "#333333";
$column['column_3']['content_hover_font_color'] = "#333333";
$column['column_3']['content_even_hover_font_color'] = "#333333";

$column['column_3']['content_odd_color'] = '#ffffff';
$column['column_3']['content_odd_hover_color'] = '#ffffff';
$column['column_3']['content_even_color'] = '#f2f2f2';
$column['column_3']['content_even_hover_color'] = '#f2f2f2';
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';


$column['column_3']['button_background_color'] = '#3473dc';
$column['column_3']['button_hover_background_color'] = '#3e3e3c';
$column['column_3']['button_font_family'] = "Arial";
$column['column_3']['button_font_size'] = 18;
$column['column_3']['button_font_color'] = "#ffffff";
$column['column_3']['button_hover_font_color'] = "#ffffff";

$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';



$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>49</span><span class='arp_price_duration' style='font-size:16px;'> / month </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '<img src="' . PRICINGTABLE_IMAGES_URL . '/arptemplate_7_4.jpg" />';
$column['column_3']['body_text_alignment'] = 'left';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_0']['row_description'] = '<i class="fas fa-clock-o arpsize-ico-14"></i> Unlimited Disk Space';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_1']['row_description'] = '<i class="fas fa-shopping-cart arpsize-ico-14"></i> Unlimited Databases';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_2']['row_description'] = '<i class="fas fa-star arpsize-ico-14"></i> 30 Email accounts';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_3']['row_description'] = '<i class="fas fa-heart arpsize-ico-14"></i> 30 Free Domains';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_3']['button_size'] = '146';
$column['column_3']['button_height'] = '45';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Sign Up';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#333333';
$column['column_3']['footer_level_options_hover_font_color'] = '#333333';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);
$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 8
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 8';
$values['is_template'] = 1;
$values['template_name'] = 8;
$values['status'] = 'published';
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

$arp_pt_template_settings['template'] = 'arptemplate_8';
$arp_pt_template_settings['skin'] = 'multicolor';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'position_2', 'caption_style' => 'default', 'amount_style' => 'style_2', 'list_alignment' => 'center', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'rounded_corner', 'header_shortcode_position' => 'position_1', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_8';
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


$arp_pt_column_settings['column_space'] = 0;
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 250;


$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1000;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 20;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 20;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 20;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 20;
$arp_pt_column_settings['arp_global_button_type'] = 'shadow';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '1';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#d4d4d4';

$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#dfdbdc';


$arp_pt_column_settings['arp_column_border_left'] = 1;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;

$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_settings['header_font_family_global'] = 'Open Sans Semibold';
$arp_pt_column_settings['header_font_size_global'] = 22;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Arial';
$arp_pt_column_settings['price_font_size_global'] = 40;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['body_font_size_global'] = 14;
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
$arp_pt_column_settings['button_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['button_font_size_global'] = 18;
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
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#ee4546";
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = "#f7f8fa";
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = '#ee4546';
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = '#000000';
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#323232';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#323232';
$arp_pt_custom_skin_array['arp_shortocode_background'] = '#ffffff';
$arp_pt_custom_skin_array['arp_shortocode_font_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_shortcode_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_shortcode_font_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);


$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['shortcode_background_color'] = '#ffffff';
$column['column_0']['shortcode_font_color'] = '#ffffff';
$column['column_0']['shortcode_hover_background_color'] = '#ffffff';
$column['column_0']['shortcode_hover_font_color'] = '#ffffff';
$column['column_0']['arp_shortcode_customization_style'] = 'rounded';
$column['column_0']['arp_shortcode_customization_size'] = 'small';

$column['column_0']['package_title'] = 'Basic Pro';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';

$column['column_0']['header_background_color'] = '#e92a4b';
$column['column_0']['header_hover_background_color'] = '#e92a4b';
$column['column_0']['header_font_family'] = 'Open Sans Semibold';
$column['column_0']['header_font_size'] = 22;
$column['column_0']['header_font_color'] = "#ffffff";
$column['column_0']['header_hover_font_color'] = "#ffffff";

$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';

$column['column_0']['price_background_color'] = '';
$column['column_0']['price_hover_background_color'] = '';
$column['column_0']['price_font_family'] = "Arial";
$column['column_0']['price_font_size'] = 40;
$column['column_0']['price_font_color'] = "#ffffff";
$column['column_0']['price_hover_font_color'] = "#ffffff";

$column['column_0']['price_label_style_bold'] = 'bold';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Arial';
$column['column_0']['price_text_font_size'] = 13;
$column['column_0']['price_text_font_color'] = "#ffffff";
$column['column_0']['price_text_hover_font_color'] = "#ffffff";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = 'Arial';
$column['column_0']['column_description_font_size'] = 13;

$column['column_0']['column_description_font_color'] = '#7c7c7c';
$column['column_0']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';


$column['column_0']['content_font_family'] = "Open Sans Bold";
$column['column_0']['content_font_size'] = 15;
$column['column_0']['content_font_color'] = "#333333";
$column['column_0']['content_even_font_color'] = "#333333";
$column['column_0']['content_hover_font_color'] = "#333333";
$column['column_0']['content_even_hover_font_color'] = "#333333";

$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';


$column['column_0']['content_label_font_family'] = 'Open Sans';
$column['column_0']['content_label_font_size'] = 14;

$column['column_0']['content_label_font_color'] = '#000000';
$column['column_0']['content_label_hover_font_color'] = '#000000';
$column['column_0']['content_odd_color'] = '#ffffff';
$column['column_0']['content_odd_hover_color'] = '#ffffff';
$column['column_0']['content_even_color'] = '#f7f8fa';
$column['column_0']['content_even_hover_color'] = '#ffffff';
$column['column_0']['body_label_style_bold'] = '';
$column['column_0']['body_label_style_italic'] = '';
$column['column_0']['body_label_style_decoration'] = '';



$column['column_0']['button_background_color'] = '#ffffff';
$column['column_0']['button_hover_background_color'] = '#ffffff';
$column['column_0']['button_font_family'] = "Open Sans Bold";
$column['column_0']['button_font_size'] = 18;
$column['column_0']['button_font_color'] = "#323232";
$column['column_0']['button_hover_font_color'] = "#323232";

$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['price_text'] = "<span class='arp_price_duration' style='font-size:13px;font-weight:normal;'> per month </span><span class='arp_price_value'><span class='arp_currency'>$</span>10</span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = '<i class="fas fa-bicycle arpsize-ico-48"></i>';
$column['column_0']['body_text_alignment'] = 'center';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = 'Data Usage <br/><b>10 GB</b>';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';

$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_1']['row_description'] = 'MySQL Databases <br/> <b>5</b>';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_2']['row_description'] = 'Email Accounts <br/> <b>5</b>';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_3']['row_description'] = 'Free Domain <br/> <b>5</b>';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '134';
$column['column_0']['button_height'] = '36';
$column['column_0']['button_type'] = 'Button';
$column['column_0']['button_text'] = 'Submit';
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
$column['column_0']['footer_level_options_font_color'] = '#333333';
$column['column_0']['footer_level_options_hover_font_color'] = '#333333';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';

$column['column_1']['shortcode_background_color'] = '#ffffff';
$column['column_1']['shortcode_font_color'] = '#ffffff';
$column['column_1']['shortcode_hover_background_color'] = '#ffffff';
$column['column_1']['shortcode_hover_font_color'] = '#ffffff';
$column['column_1']['arp_shortcode_customization_style'] = 'rounded';
$column['column_1']['arp_shortcode_customization_size'] = 'small';
$column['column_1']['package_title'] = 'Standard Pro';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';

$column['column_1']['header_background_color'] = '#21c77b';
$column['column_1']['header_hover_background_color'] = '#21c77b';
$column['column_1']['header_font_family'] = 'Open Sans Semibold';
$column['column_1']['header_font_size'] = 22;
$column['column_1']['header_font_color'] = "#ffffff";
$column['column_1']['header_hover_font_color'] = "#ffffff";

$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';

$column['column_1']['price_background_color'] = '';
$column['column_1']['price_hover_background_color'] = '';
$column['column_1']['price_font_family'] = "Arial";
$column['column_1']['price_font_size'] = 40;
$column['column_1']['price_font_color'] = "#ffffff";
$column['column_1']['price_hover_font_color'] = "#ffffff";

$column['column_1']['price_label_style_bold'] = 'bold';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Arial';
$column['column_1']['price_text_font_size'] = 13;
$column['column_1']['price_text_font_color'] = "#ffffff";
$column['column_1']['price_text_hover_font_color'] = "#ffffff";

$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';


$column['column_1']['column_description_font_family'] = 'Arial';
$column['column_1']['column_description_font_size'] = 13;

$column['column_1']['column_description_font_color'] = '#7c7c7c';
$column['column_1']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';


$column['column_1']['content_font_family'] = "Open Sans Bold";
$column['column_1']['content_font_size'] = 15;
$column['column_1']['content_font_color'] = "#333333";
$column['column_1']['content_even_font_color'] = "#333333";
$column['column_1']['content_hover_font_color'] = "#333333";
$column['column_1']['content_even_hover_font_color'] = "#333333";

$column['column_1']['content_odd_color'] = '#ffffff';
$column['column_1']['content_odd_hover_color'] = '#ffffff';
$column['column_1']['content_even_color'] = '#f7f8fa';
$column['column_1']['content_even_hover_color'] = '#ffffff';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';


$column['column_1']['content_label_font_family'] = 'Open Sans';
$column['column_1']['content_label_font_size'] = 14;

$column['column_1']['content_label_font_color'] = '#000000';
$column['column_1']['content_label_hover_font_color'] = '#000000';
$column['column_1']['body_label_style_bold'] = '';
$column['column_1']['body_label_style_italic'] = '';
$column['column_1']['body_label_style_decoration'] = '';


$column['column_1']['button_background_color'] = '#ffffff';
$column['column_1']['button_hover_background_color'] = '#ffffff';
$column['column_1']['button_font_family'] = "Open Sans Bold";
$column['column_1']['button_font_size'] = 18;
$column['column_1']['button_font_color'] = "#323232";
$column['column_1']['button_hover_font_color'] = "#323232";

$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';



$column['column_1']['price_text'] = "<span class='arp_price_duration' style='font-size:13px;font-weight:normal;'> per month </span><span class='arp_price_value'><span class='arp_currency'>$</span>20</span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '<i class="fas fa-motorcycle arpsize-ico-48"></i>';
$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = 'Data Storage <br/> <b>25 GB</b>';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = 'MySQL Databases <br/> <b>10</b>';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = 'Email Accounts <br/> <b>10</b>';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = 'Free Domain <br/> <b>10</b>';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_1']['button_size'] = '134';
$column['column_1']['button_height'] = '36';
$column['column_1']['button_type'] = 'Button';
$column['column_1']['button_text'] = 'Submit';
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
$column['column_1']['footer_level_options_font_color'] = '#333333';
$column['column_1']['footer_level_options_hover_font_color'] = '#333333';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['shortcode_background_color'] = '#ffffff';
$column['column_2']['shortcode_font_color'] = '#ffffff';
$column['column_2']['shortcode_hover_background_color'] = '#ffffff';
$column['column_2']['shortcode_hover_font_color'] = '#ffffff';
$column['column_2']['arp_shortcode_customization_style'] = 'rounded';
$column['column_2']['arp_shortcode_customization_size'] = 'small';
$column['column_2']['package_title'] = 'Advanced Pro';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = 1;

$column['column_2']['header_background_color'] = '#ffc000';
$column['column_2']['header_hover_background_color'] = '#ffc000';
$column['column_2']['header_font_family'] = 'Open Sans Semibold';
$column['column_2']['header_font_size'] = 22;
$column['column_2']['header_font_color'] = "#ffffff";
$column['column_2']['header_hover_font_color'] = "#ffffff";

$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';

$column['column_2']['price_background_color'] = '';
$column['column_2']['price_hover_background_color'] = '';
$column['column_2']['price_font_family'] = "Arial";
$column['column_2']['price_font_size'] = 40;
$column['column_2']['price_font_color'] = "#ffffff";
$column['column_2']['price_hover_font_color'] = "#ffffff";

$column['column_2']['price_label_style_bold'] = 'bold';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Arial';
$column['column_2']['price_text_font_size'] = 13;
$column['column_2']['price_text_font_color'] = "#ffffff";
$column['column_2']['price_text_hover_font_color'] = "#ffffff";

$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';


$column['column_2']['column_description_font_family'] = 'Arial';
$column['column_2']['column_description_font_size'] = 13;

$column['column_2']['column_description_font_color'] = '#7c7c7c';
$column['column_2']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';


$column['column_2']['content_font_family'] = "Open Sans Bold";
$column['column_2']['content_font_size'] = 15;
$column['column_2']['content_font_color'] = "#333333";
$column['column_2']['content_even_font_color'] = "#333333";
$column['column_2']['content_hover_font_color'] = "#333333";
$column['column_2']['content_even_hover_font_color'] = "#333333";

$column['column_2']['content_odd_color'] = '#ffffff';
$column['column_2']['content_odd_hover_color'] = '#ffffff';
$column['column_2']['content_even_color'] = '#f7f8fa';
$column['column_2']['content_even_hover_color'] = '#ffffff';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';


$column['column_2']['content_label_font_family'] = 'Open Sans';
$column['column_2']['content_label_font_size'] = 14;

$column['column_2']['content_label_font_color'] = '#000000';
$column['column_2']['content_label_hover_font_color'] = '#000000';
$column['column_2']['body_label_style_bold'] = '';
$column['column_2']['body_label_style_italic'] = '';
$column['column_2']['body_label_style_decoration'] = '';


$column['column_2']['button_background_color'] = '#ffffff';
$column['column_2']['button_hover_background_color'] = '#ffffff';
$column['column_2']['button_font_family'] = "Open Sans Bold";
$column['column_2']['button_font_size'] = 18;
$column['column_2']['button_font_color'] = "#323232";
$column['column_2']['button_hover_font_color'] = "#323232";

$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['price_text'] = "<span class='arp_price_duration' style='font-size:13px;font-weight:normal;'> per month </span><span class='arp_price_value'><span class='arp_currency'>$</span>30</span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '<i class="fas fa-car arpsize-ico-48"></i>';
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = 'Data Storage <br/> <b>50 GB</b>';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = 'MySQL Databases <br/> <b>30</b>';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = 'Email Accounts <br/> <b>20</b>';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = 'Free Domain <br/> <b>30</b>';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_2']['button_size'] = '134';
$column['column_2']['button_height'] = '36';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Submit';
$column['column_2']['button_url'] = '#';
$column['column_2']['button_s_size'] = '';
$column['column_2']['button_s_type'] = '';
$column['column_2']['button_s_text'] = '';
$column['column_2']['button_s_url'] = '';
$column['column_2']['s_is_new_window'] = '';
$column['column_2']['is_new_window'] = 0;


$column['column_3']['shortcode_background_color'] = '#ffffff';
$column['column_3']['shortcode_font_color'] = '#ffffff';
$column['column_3']['shortcode_hover_background_color'] = '#ffffff';
$column['column_3']['shortcode_hover_font_color'] = '#ffffff';
$column['column_3']['arp_shortcode_customization_style'] = 'rounded';
$column['column_3']['arp_shortcode_customization_size'] = 'small';
$column['column_2']['footer_content'] = '';
$column['column_2']['footer_content_position'] = 0;
$column['column_2']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_2']['footer_level_options_font_size'] = 12;
$column['column_2']['footer_level_options_font_color'] = '#333333';
$column['column_2']['footer_level_options_hover_font_color'] = '#333333';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Ultimate Pro';
$column['column_3']['column_description'] = '';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['column_align'] = 'left';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';

$column['column_3']['header_background_color'] = '#52c4ff';
$column['column_3']['header_hover_background_color'] = '#52c4ff';
$column['column_3']['header_font_family'] = 'Open Sans Semibold';
$column['column_3']['header_font_size'] = 22;
$column['column_3']['header_font_color'] = "#ffffff";
$column['column_3']['header_hover_font_color'] = "#ffffff";

$column['column_3']['header_style_bold'] = '';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';

$column['column_3']['price_background_color'] = '#761db5';
$column['column_3']['price_hover_background_color'] = '#761db5';
$column['column_3']['price_font_family'] = "Arial";
$column['column_3']['price_font_size'] = 40;
$column['column_3']['price_font_color'] = "#ffffff";
$column['column_3']['price_hover_font_color'] = "#ffffff";

$column['column_3']['price_label_style_bold'] = 'bold';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Arial';
$column['column_3']['price_text_font_size'] = 13;
$column['column_3']['price_text_font_color'] = "#ffffff";
$column['column_3']['price_text_hover_font_color'] = "#ffffff";

$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';


$column['column_3']['column_description_font_family'] = 'Arial';
$column['column_3']['column_description_font_size'] = 13;

$column['column_3']['column_description_font_color'] = '#7c7c7c';
$column['column_3']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';


$column['column_3']['content_font_family'] = "Open Sans Bold";
$column['column_3']['content_font_size'] = 15;
$column['column_3']['content_font_color'] = "#333333";
$column['column_3']['content_even_font_color'] = "#333333";
$column['column_3']['content_hover_font_color'] = "#333333";
$column['column_3']['content_even_hover_font_color'] = "#333333";

$column['column_3']['content_odd_color'] = '#ffffff';
$column['column_3']['content_odd_hover_color'] = '#ffffff';
$column['column_3']['content_even_color'] = '#f7f8fa';
$column['column_3']['content_even_hover_color'] = '#ffffff';
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';


$column['column_3']['content_label_font_family'] = 'Open Sans';
$column['column_3']['content_label_font_size'] = 14;

$column['column_3']['content_label_font_color'] = '#000000';
$column['column_3']['content_label_hover_font_color'] = '#000000';
$column['column_3']['body_label_style_bold'] = '';
$column['column_3']['body_label_style_italic'] = '';
$column['column_3']['body_label_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#ffffff';
$column['column_3']['button_hover_background_color'] = '#ffffff';
$column['column_3']['button_font_family'] = "Open Sans Bold";
$column['column_3']['button_font_size'] = 18;
$column['column_3']['button_font_color'] = "#323232";
$column['column_3']['button_hover_font_color'] = "#323232";

$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';


$column['column_3']['price_text'] = "<span class='arp_price_duration' style='font-size:13px;font-weight:normal;'> per month </span><span class='arp_price_value'><span class='arp_currency'>$</span>40</span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '<i class="fas fa-subway arpsize-ico-48"></i>';
$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = 'Data Usage <br/> <b>Unlimited</b>';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = 'MySQL Databases <br/><b>Unlimited Database</b>';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = 'Email Accounts <br/> <b>30</b>';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = 'Free Domain <br/> <b>30</b>';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_3']['button_size'] = '134';
$column['column_3']['button_height'] = '36';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Submit';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#333333';
$column['column_3']['footer_level_options_hover_font_color'] = '#333333';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);
$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 9
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 9';
$values['is_template'] = 1;
$values['template_name'] = 9;
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

$arp_pt_template_settings['template'] = 'arptemplate_9';
$arp_pt_template_settings['skin'] = 'darkyellow';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_9';
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


$arp_pt_column_settings['column_space'] = 0;
$arp_pt_column_settings['column_highlight_on_hover'] = 'hover_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 200;


$arp_pt_column_settings['hide_caption_colunmn'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 800;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 5;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 5;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 5;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 5;
$arp_pt_column_settings['arp_global_button_type'] = 'shadow';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '1';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#ffffff';


$arp_pt_column_settings['arp_caption_row_border_size'] = '1';
$arp_pt_column_settings['arp_caption_row_border_style'] = 'solid';
$arp_pt_column_settings['arp_caption_row_border_color'] = '#d9d9d9';


$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#cecece';

$arp_pt_column_settings['arp_column_border_left'] = 1;
$arp_pt_column_settings['arp_column_border_right'] = 0;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;


$arp_pt_column_settings['arp_caption_border_size'] = '1';
$arp_pt_column_settings['arp_caption_border_style'] = 'solid';
$arp_pt_column_settings['arp_caption_border_color'] = '#d9d9d9';
$arp_pt_column_settings['arp_caption_border_all'] = 0;
$arp_pt_column_settings['arp_caption_border_left'] = 1;
$arp_pt_column_settings['arp_caption_border_right'] = 0;
$arp_pt_column_settings['arp_caption_border_top'] = 1;
$arp_pt_column_settings['arp_caption_border_bottom'] = 0;



$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;


$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_settings['header_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['header_font_size_global'] = 24;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Arvo';
$arp_pt_column_settings['price_font_size_global'] = 40;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Raleway';
$arp_pt_column_settings['body_font_size_global'] = 14;
$arp_pt_column_settings['arp_body_text_alignment'] = 'center';
$arp_pt_column_settings['arp_body_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['footer_font_size_global'] = 12;
$arp_pt_column_settings['arp_footer_text_alignment'] = '';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['button_font_size_global'] = 17;
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
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = "#adbb5a";
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = "#e9eaee";
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = "#747577";
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#000000';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = '';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['column_align'] = 'left';
$column['column_0']['column_background_color'] = '';
$column['column_0']['column_hover_background_color'] = "";
$column['column_0']['arp_change_bgcolor'] = '';



$column['column_0']['header_background_color'] = '#ebeaef';
$column['column_0']['header_hover_background_color'] = '#ebeaef';
$column['column_0']['header_font_family'] = 'Open Sans Bold';
$column['column_0']['header_font_size'] = 23;

$column['column_0']['header_font_color'] = '#333333';
$column['column_0']['header_hover_font_color'] = '#000000';
$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';



$column['column_0']['price_font_family'] = 'Arvo';
$column['column_0']['price_font_size'] = 40;

$column['column_0']['price_font_color'] = '#ffffff';
$column['column_0']['price_hover_font_color'] = '#ffffff';
$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';



$column['column_0']['price_text_font_family'] = 'Open Sans';
$column['column_0']['price_text_font_size'] = 15;

$column['column_0']['price_text_font_color'] = '#ffffff';
$column['column_0']['price_text_hover_font_color'] = '#ffffff';
$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = '';
$column['column_0']['column_description_font_size'] = '';

$column['column_0']['column_description_font_color'] = '';
$column['column_0']['column_description_hover_font_color'] = '';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = 'Raleway';
$column['column_0']['content_font_size'] = 15;

$column['column_0']['content_odd_color'] = '#f3f3f5';
$column['column_0']['content_odd_hover_color'] = '#f3f3f5';
$column['column_0']['content_even_color'] = '#ebeaef';
$column['column_0']['content_even_hover_color'] = '#ebeaef';
$column['column_0']['content_font_color'] = '#7c7c7c';
$column['column_0']['content_even_font_color'] = '#7c7c7c';
$column['column_0']['content_hover_font_color'] = '#7c7c7c';
$column['column_0']['content_even_hover_font_color'] = '#7c7c7c';
$column['column_0']['body_li_style_bold'] = 'bold';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['button_background_color'] = '';
$column['column_0']['button_hover_background_color'] = '';
$column['column_0']['button_font_family'] = 'Open Sans Bold';
$column['column_0']['button_font_size'] = 17;

$column['column_0']['button_font_color'] = '#ffffff';
$column['column_0']['button_hover_font_color'] = '#ffffff';
$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['is_caption'] = 1;

$column['column_0']['column_highlight'] = '';
$column['column_0']['html_content'] = "Hosting Plans";
$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_0']['row_description'] = 'Data Storage';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = 'bold';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_1']['row_description'] = 'MySQL Databases';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = 'bold';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_2']['row_description'] = 'Daily Backup';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = 'bold';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_3']['row_description'] = 'Free Domains';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = 'bold';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_4']['row_description'] = 'Online Support';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = 'bold';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '';
$column['column_0']['button_height'] = '';
$column['column_0']['button_type'] = '';
$column['column_0']['button_text'] = '';
$column['column_0']['button_url'] = '';
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
$column['column_0']['footer_level_options_font_color'] = '#7c7c7c';
$column['column_0']['footer_level_options_hover_font_color'] = '#7c7c7c';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';


$column['column_1']['package_title'] = 'Basic';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['column_align'] = 'left';
$column['column_1']['column_background_color'] = '#adbb5a';
$column['column_1']['column_hover_background_color'] = "#e9eaee";
$column['column_1']['arp_change_bgcolor'] = 0;


$column['column_1']['header_font_family'] = 'Open Sans Bold';
$column['column_1']['header_font_size'] = 24;

$column['column_1']['header_font_color'] = '#ffffff';
$column['column_1']['header_hover_font_color'] = '#000000';
$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';



$column['column_1']['price_font_family'] = 'Arvo';
$column['column_1']['price_font_size'] = 40;

$column['column_1']['price_font_color'] = '#ffffff';
$column['column_1']['price_hover_font_color'] = '#ffffff';
$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';



$column['column_1']['price_text_font_family'] = 'Open Sans';
$column['column_1']['price_text_font_size'] = 15;

$column['column_1']['price_text_font_color'] = '#ffffff';
$column['column_1']['price_text_hover_font_color'] = '#ffffff';
$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = '';
$column['column_1']['column_description_font_size'] = '';

$column['column_1']['column_description_font_color'] = '';
$column['column_1']['column_description_hover_font_color'] = '';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = 'Raleway';
$column['column_1']['content_font_size'] = 15;

$column['column_1']['content_font_color'] = '#ffffff';
$column['column_1']['content_even_font_color'] = '#ffffff';
$column['column_1']['content_hover_font_color'] = '#000000';
$column['column_1']['content_even_hover_font_color'] = '#000000';
$column['column_1']['body_li_style_bold'] = 'bold';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#fdfdfd';
$column['column_1']['button_hover_background_color'] = '#747577';
$column['column_1']['button_font_family'] = 'Open Sans Bold';
$column['column_1']['button_font_size'] = 17;

$column['column_1']['button_font_color'] = '#000000';
$column['column_1']['button_hover_font_color'] = '#ffffff';
$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';

$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>20</span><span class='arp_price_duration' style='font-size:15px;'> per month </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '20GB';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = 'bold';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '15 Databases';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = 'bold';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = 'No';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = 'bold';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '2 Domains';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = 'bold';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = 'No';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = 'bold';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '128';
$column['column_1']['button_height'] = '45';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = "<i class='fas fa-sign-in arpsize-ico-22'></i>&nbsp;Sign Up";
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
$column['column_1']['footer_level_options_hover_font_color'] = '#000000';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Starter';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['column_align'] = 'left';
$column['column_2']['column_background_color'] = '#adbb5a';
$column['column_2']['column_hover_background_color'] = "#e9eaee";
$column['column_2']['arp_change_bgcolor'] = 0;


$column['column_2']['header_font_family'] = 'Open Sans Bold';
$column['column_2']['header_font_size'] = 26;

$column['column_2']['header_font_color'] = '#ffffff';
$column['column_2']['header_hover_font_color'] = '#000000';
$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';



$column['column_2']['price_font_family'] = 'Arvo';
$column['column_2']['price_font_size'] = 40;

$column['column_2']['price_font_color'] = '#ffffff';
$column['column_2']['price_hover_font_color'] = '#ffffff';
$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';



$column['column_2']['price_text_font_family'] = 'Open Sans';
$column['column_2']['price_text_font_size'] = 15;

$column['column_2']['price_text_font_color'] = '#ffffff';
$column['column_2']['price_text_hover_font_color'] = '#ffffff';
$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = '';
$column['column_2']['column_description_font_size'] = '';

$column['column_2']['column_description_font_color'] = '';
$column['column_2']['column_description_hover_font_color'] = '';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = 'Raleway';
$column['column_2']['content_font_size'] = 15;

$column['column_2']['content_font_color'] = '#ffffff';
$column['column_2']['content_even_font_color'] = '#ffffff';
$column['column_2']['content_hover_font_color'] = '#000000';
$column['column_2']['content_even_hover_font_color'] = '#000000';
$column['column_2']['body_li_style_bold'] = 'bold';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#fdfdfd';
$column['column_2']['button_hover_background_color'] = '#747577';
$column['column_2']['button_font_family'] = 'Open Sans Bold';
$column['column_2']['button_font_size'] = 17;

$column['column_2']['button_font_color'] = '#000000';
$column['column_2']['button_hover_font_color'] = '#ffffff';
$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['is_caption'] = 0;
$column['column_2']['column_highlight'] = '';
$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>50</span><span class='arp_price_duration' style='font-size:15px;'> per month </span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '80GB';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = 'bold';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '100 Databases';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = 'bold';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = 'No';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = 'bold';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '5 Domains';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = 'bold';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = 'No';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = 'bold';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '128';
$column['column_2']['button_height'] = '45';
$column['column_2']['button_type'] = 'button';
$column['column_2']['button_text'] = "<i class='fas fa-sign-in arpsize-ico-22'></i>&nbsp;Sign Up";
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

$column['column_3']['package_title'] = 'Gold';
$column['column_3']['column_description'] = '';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['column_align'] = 'left';
$column['column_3']['column_background_color'] = '#adbb5a';
$column['column_3']['column_hover_background_color'] = "#e9eaee";
$column['column_3']['arp_change_bgcolor'] = 0;


$column['column_3']['header_font_family'] = 'Open Sans Bold';
$column['column_3']['header_font_size'] = 26;

$column['column_3']['header_font_color'] = '#ffffff';
$column['column_3']['header_hover_font_color'] = '#000000';
$column['column_3']['header_style_bold'] = '';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';



$column['column_3']['price_font_family'] = 'Arvo';
$column['column_3']['price_font_size'] = 40;

$column['column_3']['price_font_color'] = '#ffffff';
$column['column_3']['price_hover_font_color'] = '#ffffff';
$column['column_3']['price_label_style_bold'] = '';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';



$column['column_3']['price_text_font_family'] = 'Open Sans';
$column['column_3']['price_text_font_size'] = 15;

$column['column_3']['price_text_font_color'] = '#ffffff';
$column['column_3']['price_text_hover_font_color'] = '#ffffff';
$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = '';
$column['column_3']['column_description_font_size'] = '';

$column['column_3']['column_description_font_color'] = '';
$column['column_3']['column_description_hover_font_color'] = '';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = 'Raleway';
$column['column_3']['content_font_size'] = 15;

$column['column_3']['content_font_color'] = '#ffffff';
$column['column_3']['content_even_font_color'] = '#ffffff';
$column['column_3']['content_hover_font_color'] = '#000000';
$column['column_3']['content_even_hover_font_color'] = '#000000';
$column['column_3']['body_li_style_bold'] = 'bold';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#fdfdfd';
$column['column_3']['button_hover_background_color'] = '#747577';
$column['column_3']['button_font_family'] = 'Open Sans Bold';
$column['column_3']['button_font_size'] = 17;

$column['column_3']['button_font_color'] = '#000000';
$column['column_3']['button_hover_font_color'] = '#ffffff';
$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';


$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';

$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>60</span><span class='arp_price_duration' style='font-size:15px;'> per month </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '';
$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = '150GB';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = 'bold';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';

$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = '150 Databases';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_label'] = '';

$column['column_3']['rows']['row_1']['row_des_style_bold'] = 'bold';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = 'Yes';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = 'bold';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = '10 Domains';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = 'bold';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = 'Yes';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = 'bold';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = '128';
$column['column_3']['button_height'] = '45';
$column['column_3']['button_type'] = 'button';
$column['column_3']['button_text'] = "<i class='fas fa-sign-in arpsize-ico-22'></i>&nbsp;Sign Up";
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['is_new_window'] = 0;
$column['column_3']['s_is_new_window'] = '';



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_hover_font_color'] = '#000000';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 10
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 10';
$values['is_template'] = 1;
$values['template_name'] = 10;
$values['status'] = 'published';
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

$arp_pt_template_settings['template'] = 'arptemplate_10';
$arp_pt_template_settings['skin'] = 'red';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_3', 'caption_style' => 'style_2', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0);





$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_10';
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


$arp_pt_column_settings['column_space'] = 0;
$arp_pt_column_settings['column_highlight_on_hover'] = 'hover_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 255;


$arp_pt_column_settings['hide_caption_column'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1024;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 4;
$arp_pt_column_settings['arp_global_button_type'] = 'flat';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '0';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';

$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#d7d7d7';

$arp_pt_column_settings['arp_column_border_left'] = 1;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;

$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';


$arp_pt_column_settings['header_font_family_global'] = 'Roboto';
$arp_pt_column_settings['header_font_size_global'] = 19;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Roboto';
$arp_pt_column_settings['price_font_size_global'] = 40;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Roboto';
$arp_pt_column_settings['body_font_size_global'] = 14;
$arp_pt_column_settings['arp_body_text_alignment'] = 'center';
$arp_pt_column_settings['arp_body_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = '';
$arp_pt_column_settings['footer_font_size_global'] = '';
$arp_pt_column_settings['arp_footer_text_alignment'] = '';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Roboto';
$arp_pt_column_settings['button_font_size_global'] = 19;
$arp_pt_column_settings['arp_button_text_alignment'] = 'center';
$arp_pt_column_settings['arp_button_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_button_text_italic_global'] = '';
$arp_pt_column_settings['arp_button_text_decoration_global'] = '';
$arp_pt_column_settings['description_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['description_font_size_global'] = 13;
$arp_pt_column_settings['arp_description_text_alignment'] = 'center';
$arp_pt_column_settings['arp_description_text_bold_global'] = '';
$arp_pt_column_settings['arp_description_text_italic_global'] = '';
$arp_pt_column_settings['arp_description_text_decoration_global'] = '';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
$arp_pt_column_animation['scrolling_columns'] = 2;
$arp_pt_column_animation['navigation'] = 1;
$arp_pt_column_animation['autoplay'] = 1;
$arp_pt_column_animation['sliding_effect'] = 'slide';
$arp_pt_column_animation['transition_speed'] = 750;
$arp_pt_column_animation['navigation_style'] = $arp_mainoptionsarr['general_options']['column_animation']['navigation_style'][0];
$arp_pt_column_animation['pagination'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination'];
$arp_pt_column_animation['pagination_style'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_style'][0];
$arp_pt_column_animation['pagination_position'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_position'][0];
$arp_pt_column_animation['easing_effect'] = $arp_mainoptionsarr['general_options']['column_animation']['easing_effect'][0];
$arp_pt_column_animation['infinite'] = $arp_mainoptionsarr['general_options']['column_animation']['infinite'];

$arp_pt_column_animation['navi_nav_btn'] = 'navigation';
$arp_pt_column_animation['pagi_nav_btn'] = 'pagination_bottom';
$arp_pt_column_animation['sticky_caption'] = 0;

$arp_pt_tooltip_settings['background_color'] = '#FFFFFF';
$arp_pt_tooltip_settings['text_color'] = '#000000';
$arp_pt_tooltip_settings['animation'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['animation'][0];
$arp_pt_tooltip_settings['position'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['position'][0];
$arp_pt_tooltip_settings['style'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['style'][0];
$arp_pt_tooltip_settings['tooltip_width'] = '';
$arp_pt_tooltip_settings['tooltip_font_family'] = 'Open Sans';
$arp_pt_tooltip_settings['tooltip_font_size'] = 14;
$arp_pt_tooltip_settings['tooltip_font_style'] = 'normal';
$arp_pt_tooltip_settings['tooltip_trigger_type'] = 'hover';
$arp_pt_tooltip_settings['tooltip_display_style'] = 'default';
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#e92526";
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = "#c41e1e";
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = "#ededed";
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#e92526";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = "#585E5E";
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = "#3c403f";
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = '#585E5E';
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#3C403F';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = '#ededed';
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = '#656565';
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = '#656565';
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);


$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();



$column['column_0']['package_title'] = 'Basic Package';
$column['column_0']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel. Ut sit amet congue lectus.';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';

$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>09.55</span><span class='arp_price_duration' style='font-size:13px;font-weight:normal;'> per month </span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = '';
$column['column_0']['column_background_color'] = '';
$column['column_0']['column_hover_background_color'] = "";

$column['column_0']['header_background_color'] = '#e92526';
$column['column_0']['header_hover_background_color'] = '#585e5e';
$column['column_0']['header_font_family'] = 'Roboto';
$column['column_0']['header_font_size'] = 19;
$column['column_0']['header_font_color'] = "#FFFFFF";
$column['column_0']['header_hover_font_color'] = "#FFFFFF";

$column['column_0']['header_style_bold'] = 'bold';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_background_color'] = '#c41e1e';
$column['column_0']['price_hover_background_color'] = '#3c403f';
$column['column_0']['price_font_family'] = "Roboto";
$column['column_0']['price_font_size'] = 40;
$column['column_0']['price_font_color'] = "#ffffff";
$column['column_0']['price_hover_font_color'] = "#ffffff";

$column['column_0']['price_label_style_bold'] = 'bold';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Roboto';
$column['column_0']['price_text_font_size'] = 14;
$column['column_0']['price_text_font_color'] = "#ffffff";
$column['column_0']['price_text_hover_font_color'] = "#ffffff";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';


$column['column_0']['column_description_font_family'] = 'Open Sans';
$column['column_0']['column_description_font_size'] = 13;

$column['column_0']['column_description_font_color'] = '#333333';
$column['column_0']['column_description_hover_font_color'] = '#333333';
$column['column_0']['column_desc_background_color'] = '#ffffff';
$column['column_0']['column_desc_hover_background_color'] = '#ffffff';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';


$column['column_0']['content_font_family'] = "Roboto";
$column['column_0']['content_font_size'] = 14;
$column['column_0']['content_font_color'] = "#333333";
$column['column_0']['content_even_font_color'] = "#333333";
$column['column_0']['content_hover_font_color'] = "#333333";
$column['column_0']['content_even_hover_font_color'] = "#333333";

$column['column_0']['content_odd_color'] = '#ffffff';
$column['column_0']['content_odd_hover_color'] = '#ffffff';
$column['column_0']['content_even_color'] = '#ededed';
$column['column_0']['content_even_hover_color'] = '#ededed';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';

$column['column_0']['content_label_font_family'] = 'Roboto';
$column['column_0']['content_label_font_size'] = 14;

$column['column_0']['content_label_font_color'] = '#656565';
$column['column_0']['content_label_hover_font_color'] = '#656565';
$column['column_0']['body_label_style_bold'] = 'bold';
$column['column_0']['body_label_style_italic'] = '';
$column['column_0']['body_label_style_decoration'] = '';


$column['column_0']['button_background_color'] = '#e92526';
$column['column_0']['button_hover_background_color'] = '#3c403f';
$column['column_0']['button_font_family'] = "Roboto";
$column['column_0']['button_font_size'] = 19;
$column['column_0']['button_font_color'] = "#ffffff";
$column['column_0']['button_hover_font_color'] = "#ffffff";

$column['column_0']['button_style_bold'] = 'bold';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['body_text_alignment'] = 'center';

$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = '10 <b> Domains </b>';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = 'bold';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_1']['row_description'] = '200MB <b>Disk space</b>';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = 'bold';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_2']['row_description'] = '25GB <b> Traffic </b>';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = 'bold';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_3']['row_description'] = '5 PHP/MYSQL <b>Database</b>';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = 'bold';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_4']['row_description'] = '10 email <b> Accounts </b>';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = 'bold';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';

$column['column_0']['button_size'] = '176';
$column['column_0']['button_height'] = '42';
$column['column_0']['button_type'] = 'Button';
$column['column_0']['button_text'] = 'Buy';
$column['column_0']['button_url'] = '#';
$column['column_0']['button_s_size'] = 'Medium';
$column['column_0']['button_s_type'] = 'Button';
$column['column_0']['button_s_text'] = 'More';
$column['column_0']['button_s_url'] = '#';
$column['column_0']['s_is_new_window'] = 1;
$column['column_0']['is_new_window'] = 0;



$column['column_0']['footer_content'] = '';
$column['column_0']['footer_content_position'] = 0;
$column['column_0']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_0']['footer_level_options_font_size'] = 12;
$column['column_0']['footer_level_options_font_color'] = '#333333';
$column['column_0']['footer_level_options_hover_font_color'] = '#333333';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';

$column['column_1']['package_title'] = 'Basic Package';
$column['column_1']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel. Ut sit amet congue lectus.';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';

$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>09.55</span><span class='arp_price_duration' style='font-size:13px;font-weight:normal;'> per month </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['column_background_color'] = '';
$column['column_1']['column_hover_background_color'] = "";

$column['column_1']['header_background_color'] = '#e92526';
$column['column_1']['header_hover_background_color'] = '#585e5e';
$column['column_1']['header_font_family'] = 'Roboto';
$column['column_1']['header_font_size'] = 19;
$column['column_1']['header_font_color'] = "#FFFFFF";
$column['column_1']['header_hover_font_color'] = "#FFFFFF";

$column['column_1']['header_style_bold'] = 'bold';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_background_color'] = '#c41e1e';
$column['column_1']['price_hover_background_color'] = '#3c403f';
$column['column_1']['price_font_family'] = "Roboto";
$column['column_1']['price_font_size'] = 40;
$column['column_1']['price_font_color'] = "#ffffff";
$column['column_1']['price_hover_font_color'] = "#ffffff";

$column['column_1']['price_label_style_bold'] = 'bold';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Roboto';
$column['column_1']['price_text_font_size'] = 14;
$column['column_1']['price_text_font_color'] = "#ffffff";
$column['column_1']['price_text_hover_font_color'] = "#ffffff";

$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';


$column['column_1']['column_description_font_family'] = 'Open Sans';
$column['column_1']['column_description_font_size'] = 13;

$column['column_1']['column_description_font_color'] = '#333333';
$column['column_1']['column_description_hover_font_color'] = '#333333';
$column['column_1']['column_desc_background_color'] = '#ffffff';
$column['column_1']['column_desc_hover_background_color'] = '#ffffff';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';


$column['column_1']['content_font_family'] = "Roboto";
$column['column_1']['content_font_size'] = 14;
$column['column_1']['content_font_color'] = "#333333";
$column['column_1']['content_even_font_color'] = "#333333";
$column['column_1']['content_hover_font_color'] = "#333333";
$column['column_1']['content_even_hover_font_color'] = "#333333";

$column['column_1']['content_odd_color'] = '#ffffff';
$column['column_1']['content_odd_hover_color'] = '#ffffff';
$column['column_1']['content_even_color'] = '#ededed';
$column['column_1']['content_even_hover_color'] = '#ededed';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';

$column['column_1']['content_label_font_family'] = 'Roboto';
$column['column_1']['content_label_font_size'] = 14;

$column['column_1']['content_label_font_color'] = '#656565';
$column['column_1']['content_label_hover_font_color'] = '#656565';
$column['column_1']['body_label_style_bold'] = 'bold';
$column['column_1']['body_label_style_italic'] = '';
$column['column_1']['body_label_style_decoration'] = '';


$column['column_1']['button_background_color'] = '#e92526';
$column['column_1']['button_hover_background_color'] = '#3c403f';
$column['column_1']['button_font_family'] = "Roboto";
$column['column_1']['button_font_size'] = 19;
$column['column_1']['button_font_color'] = "#ffffff";
$column['column_1']['button_hover_font_color'] = "#ffffff";

$column['column_1']['button_style_bold'] = 'bold';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '40';
$column['column_1']['rows']['row_0']['row_label'] = 'Domains';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = 'bold';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '350MB <b> Disk space </b>';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = 'bold';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '40GB <b> Traffic </b>';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = 'bold';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '20 PHP/MYSQL <b> Databases </b>';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = 'bold';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = '50 email <b> Accounts </b>';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = 'bold';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '176';
$column['column_1']['button_height'] = '42';
$column['column_1']['button_type'] = 'Button';
$column['column_1']['button_text'] = 'Buy';
$column['column_1']['button_url'] = '#';
$column['column_1']['button_s_size'] = 'Medium';
$column['column_1']['button_s_type'] = 'Button';
$column['column_1']['button_s_text'] = 'More';
$column['column_1']['button_s_url'] = '#';
$column['column_1']['s_is_new_window'] = 0;
$column['column_1']['is_new_window'] = 0;



$column['column_']['footer_content'] = '';
$column['column_1']['footer_content_position'] = 0;
$column['column_1']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_1']['footer_level_options_font_size'] = 12;
$column['column_1']['footer_level_options_font_color'] = '#656565';
$column['column_1']['footer_level_options_hover_font_color'] = '#656565';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';


$column['column_2']['package_title'] = 'Standard Package';
$column['column_2']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel. Ut sit amet congue lectus.';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';

$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>29.55</span><span class='arp_price_duration' style='font-size:13px;font-weight:normal;'> per month </span>";
$column['column_2']['price_label'] = "per month";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['column_background_color'] = '';
$column['column_2']['column_hover_background_color'] = "";

$column['column_2']['header_background_color'] = '#e92526';
$column['column_2']['header_hover_background_color'] = '#585e5e';
$column['column_2']['header_font_family'] = 'Roboto';
$column['column_2']['header_font_size'] = 19;
$column['column_2']['header_font_color'] = "#FFFFFF";
$column['column_2']['header_hover_font_color'] = "#FFFFFF";

$column['column_2']['header_style_bold'] = 'bold';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';

$column['column_2']['price_background_color'] = '#c41e1e';
$column['column_2']['price_hover_background_color'] = '#3c403f';
$column['column_2']['price_font_family'] = "Roboto";
$column['column_2']['price_font_size'] = 40;
$column['column_2']['price_font_color'] = "#ffffff";
$column['column_2']['price_hover_font_color'] = "#ffffff";

$column['column_2']['price_label_style_bold'] = 'bold';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Roboto';
$column['column_2']['price_text_font_size'] = 14;
$column['column_2']['price_text_font_color'] = "#ffffff";
$column['column_2']['price_text_hover_font_color'] = "#ffffff";

$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';


$column['column_2']['column_description_font_family'] = 'Open Sans';
$column['column_2']['column_description_font_size'] = 13;

$column['column_2']['column_description_font_color'] = '#333333';
$column['column_2']['column_description_hover_font_color'] = '#333333';
$column['column_2']['column_desc_background_color'] = '#ffffff';
$column['column_2']['column_desc_hover_background_color'] = '#ffffff';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';


$column['column_2']['content_font_family'] = "Roboto";
$column['column_2']['content_font_size'] = 14;
$column['column_2']['content_font_color'] = "#333333";
$column['column_2']['content_even_font_color'] = "#333333";
$column['column_2']['content_hover_font_color'] = "#333333";
$column['column_2']['content_even_hover_font_color'] = "#333333";

$column['column_2']['content_odd_color'] = '#ffffff';
$column['column_2']['content_odd_hover_color'] = '#ffffff';
$column['column_2']['content_even_color'] = '#ededed';
$column['column_2']['content_even_hover_color'] = '#ededed';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';

$column['column_2']['content_label_font_family'] = 'Roboto';
$column['column_2']['content_label_font_size'] = 14;

$column['column_2']['content_label_font_color'] = '#656565';
$column['column_2']['content_label_hover_font_color'] = '#656565';
$column['column_2']['body_label_style_bold'] = 'bold';
$column['column_2']['body_label_style_italic'] = '';
$column['column_2']['body_label_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#e92526';
$column['column_2']['button_hover_background_color'] = '#3c403f';
$column['column_2']['button_font_family'] = "Roboto";
$column['column_2']['button_font_size'] = 19;
$column['column_2']['button_font_color'] = "#ffffff";
$column['column_2']['button_hover_font_color'] = "#ffffff";

$column['column_2']['button_style_bold'] = 'bold';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['body_text_alignment'] = 'center';

$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '50 <b> Domains </b>';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = 'bold';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '500MB <b> Disk space </b>';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = 'bold';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';

$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '50GB <b> Traffic </b>';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = 'bold';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '30 PHP/MYSQL <b> Database </b>';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = 'bold';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = '75 email <b> Accounts </b>';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = 'bold';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';

$column['column_2']['button_size'] = '176';
$column['column_2']['button_height'] = '42';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Buy';
$column['column_2']['button_url'] = '#';
$column['column_2']['button_s_size'] = 'Medium';
$column['column_2']['button_s_type'] = 'Button';
$column['column_2']['button_s_text'] = 'More';
$column['column_2']['button_s_url'] = '#';
$column['column_2']['s_is_new_window'] = 0;
$column['column_2']['is_new_window'] = 0;



$column['column_2']['footer_content'] = '';
$column['column_2']['footer_content_position'] = 0;
$column['column_2']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_2']['footer_level_options_font_size'] = 12;
$column['column_2']['footer_level_options_font_color'] = '#333333';
$column['column_2']['footer_level_options_hover_font_color'] = '#333333';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Premium Package';
$column['column_3']['column_description'] = 'Aliquam euismod erat libero, eu condimentum nisl hendrerit vel. Ut sit amet congue lectus.';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';
$column['column_3']['column_background_color'] = '';
$column['column_3']['column_hover_background_color'] = "";

$column['column_3']['header_background_color'] = '#e92526';
$column['column_3']['header_hover_background_color'] = '#585e5e';
$column['column_3']['header_font_family'] = 'Roboto';
$column['column_3']['header_font_size'] = 19;
$column['column_3']['header_font_color'] = "#FFFFFF";
$column['column_3']['header_hover_font_color'] = "#FFFFFF";

$column['column_3']['header_style_bold'] = 'bold';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';

$column['column_3']['price_background_color'] = '#c41e1e';
$column['column_3']['price_hover_background_color'] = '#3c403f';
$column['column_3']['price_font_family'] = "Roboto";
$column['column_3']['price_font_size'] = 40;
$column['column_3']['price_font_color'] = "#ffffff";
$column['column_3']['price_hover_font_color'] = "#ffffff";

$column['column_3']['price_label_style_bold'] = 'bold';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Roboto';
$column['column_3']['price_text_font_size'] = 14;
$column['column_3']['price_text_font_color'] = "#ffffff";
$column['column_3']['price_text_hover_font_color'] = "#ffffff";

$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';


$column['column_3']['column_description_font_family'] = 'Open Sans';
$column['column_3']['column_description_font_size'] = 13;

$column['column_3']['column_description_font_color'] = '#333333';
$column['column_3']['column_description_hover_font_color'] = '#333333';
$column['column_3']['column_desc_background_color'] = '#ffffff';
$column['column_3']['column_desc_hover_background_color'] = '#ffffff';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';


$column['column_3']['content_font_family'] = "Roboto";
$column['column_3']['content_font_size'] = 14;
$column['column_3']['content_font_color'] = "#333333";
$column['column_3']['content_even_font_color'] = "#333333";
$column['column_3']['content_hover_font_color'] = "#333333";
$column['column_3']['content_even_hover_font_color'] = "#333333";

$column['column_3']['content_odd_color'] = '#ffffff';
$column['column_3']['content_odd_hover_color'] = '#ffffff';
$column['column_3']['content_even_color'] = '#ededed';
$column['column_3']['content_even_hover_color'] = '#ededed';
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';

$column['column_3']['content_label_font_family'] = 'Roboto';
$column['column_3']['content_label_font_size'] = 14;

$column['column_3']['content_label_font_color'] = '#656565';
$column['column_3']['content_label_hover_font_color'] = '#656565';
$column['column_3']['body_label_style_bold'] = 'bold';
$column['column_3']['body_label_style_italic'] = '';
$column['column_3']['body_label_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#e92526';
$column['column_3']['button_hover_background_color'] = '#3c403f';
$column['column_3']['button_font_family'] = "Roboto";
$column['column_3']['button_font_size'] = 19;
$column['column_3']['button_font_color'] = "#ffffff";
$column['column_3']['button_hover_font_color'] = "#ffffff";

$column['column_3']['button_style_bold'] = 'bold';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';



$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>39.55</span><span class='arp_price_duration' style='font-size:13px;font-weight:normal;'> per month </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '';
$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = '75 <b> Domains </b>';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = 'bold';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = '750MB <b> Disk space </b>';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = 'bold';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';

$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = '100GB <b> Traffic </b>';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = 'bold';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = '40 PHP/MYSQL <b> Database </b>';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = 'bold';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = '100 <b> Accounts </b>';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = 'bold';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';

$column['column_3']['button_size'] = '176';
$column['column_3']['button_height'] = '42';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Buy';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = 'Medium';
$column['column_3']['button_s_type'] = 'Button';
$column['column_3']['button_s_text'] = 'More';
$column['column_3']['button_s_url'] = '#';
$column['column_3']['s_is_new_window'] = 0;
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#333333';
$column['column_3']['footer_level_options_hover_font_color'] = '#333333';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);
$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);

/**
 * ARPrice Template 11
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 11';
$values['is_template'] = 1;
$values['template_name'] = 11;
$values['status'] = 'published';
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

$arp_pt_template_settings['template'] = 'arptemplate_11';
$arp_pt_template_settings['skin'] = 'yellow';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_1', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_4', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0);



$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_11';
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


$arp_pt_column_settings['column_space'] = 0;
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 250;


$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1000;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['arp_global_button_type'] = 'shadow';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '0';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';

$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#525252';

$arp_pt_column_settings['arp_column_border_left'] = 0;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 0;
$arp_pt_column_settings['arp_column_border_bottom'] = 0;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;


$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';

$arp_pt_column_settings['header_font_family_global'] = 'Roboto Condensed';
$arp_pt_column_settings['header_font_size_global'] = 28;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Roboto Condensed';
$arp_pt_column_settings['price_font_size_global'] = 48;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Roboto Condensed';
$arp_pt_column_settings['body_font_size_global'] = 18;
$arp_pt_column_settings['arp_body_text_alignment'] = 'left';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = '';
$arp_pt_column_settings['footer_font_size_global'] = '';
$arp_pt_column_settings['arp_footer_text_alignment'] = '';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Roboto Condensed';
$arp_pt_column_settings['button_font_size_global'] = 20;
$arp_pt_column_settings['arp_button_text_alignment'] = 'center';
$arp_pt_column_settings['arp_button_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_button_text_italic_global'] = '';
$arp_pt_column_settings['arp_button_text_decoration_global'] = '';
$arp_pt_column_settings['description_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['description_font_size_global'] = 14;
$arp_pt_column_settings['arp_description_text_alignment'] = 'center';
$arp_pt_column_settings['arp_description_text_bold_global'] = '';
$arp_pt_column_settings['arp_description_text_italic_global'] = '';
$arp_pt_column_settings['arp_description_text_decoration_global'] = '';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
$arp_pt_column_animation['scrolling_columns'] = 2;
$arp_pt_column_animation['navigation'] = 1;
$arp_pt_column_animation['autoplay'] = 1;
$arp_pt_column_animation['sliding_effect'] = 'slide';
$arp_pt_column_animation['transition_speed'] = 750;
$arp_pt_column_animation['navigation_style'] = $arp_mainoptionsarr['general_options']['column_animation']['navigation_style'][0];
$arp_pt_column_animation['pagination'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination'];
$arp_pt_column_animation['pagination_style'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_style'][0];
$arp_pt_column_animation['pagination_position'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_position'][0];
$arp_pt_column_animation['easing_effect'] = $arp_mainoptionsarr['general_options']['column_animation']['easing_effect'][0];
$arp_pt_column_animation['infinite'] = $arp_mainoptionsarr['general_options']['column_animation']['infinite'];

$arp_pt_column_animation['navi_nav_btn'] = 'navigation';
$arp_pt_column_animation['pagi_nav_btn'] = 'pagination_bottom';
$arp_pt_column_animation['sticky_caption'] = 0;

$arp_pt_tooltip_settings['background_color'] = '#FFFFFF';
$arp_pt_tooltip_settings['text_color'] = '#000000';
$arp_pt_tooltip_settings['animation'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['animation'][0];
$arp_pt_tooltip_settings['position'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['position'][0];
$arp_pt_tooltip_settings['style'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['style'][0];
$arp_pt_tooltip_settings['tooltip_width'] = '';
$arp_pt_tooltip_settings['tooltip_font_family'] = 'Roboto Condensed';
$arp_pt_tooltip_settings['tooltip_font_size'] = 14;
$arp_pt_tooltip_settings['tooltip_font_style'] = 'bold';
$arp_pt_tooltip_settings['tooltip_trigger_type'] = 'hover';
$arp_pt_tooltip_settings['tooltip_display_style'] = 'default';
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#414045";
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = "#37363b";
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = "#313035";
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = "#37363b";
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#efa738";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = "#46474c";
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = "#09B1F8";
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = '#51545D';
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#46474C';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = '#3E4044';
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = '#46474C';
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = '#46474C';
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);


$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Basic';
$column['column_0']['column_description'] = '"Aliquam euisod erat libero condimentum nisl hendrerit."';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';

$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>10</span><span class='arp_price_duration' style='font-size:18px;font-weight:normal;'> per month </span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = '';

$column['column_0']['header_background_color'] = '#414045';
$column['column_0']['header_hover_background_color'] = '#51545d';
$column['column_0']['header_font_family'] = 'Roboto Condensed';
$column['column_0']['header_font_size'] = 28;
$column['column_0']['header_font_color'] = "#ffffff";
$column['column_0']['header_hover_font_color'] = "#ffffff";

$column['column_0']['header_style_bold'] = 'bold';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_font_family'] = "Roboto Condensed";
$column['column_0']['price_font_size'] = 48;
$column['column_0']['price_font_color'] = "#ffffff";
$column['column_0']['price_hover_font_color'] = "#ffffff";

$column['column_0']['price_label_style_bold'] = 'bold';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Roboto Condensed';
$column['column_0']['price_text_font_size'] = 18;
$column['column_0']['price_text_font_color'] = "#ffffff";
$column['column_0']['price_text_hover_font_color'] = "#ffffff";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';


$column['column_0']['column_description_font_family'] = 'Open Sans';
$column['column_0']['column_description_font_size'] = 14;

$column['column_0']['column_description_font_color'] = '#ffffff';
$column['column_0']['column_description_hover_font_color'] = '#ffffff';
$column['column_0']['column_desc_background_color'] = '#37363b';
$column['column_0']['column_desc_hover_background_color'] = '#46474c';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';


$column['column_0']['content_font_family'] = "Roboto Condensed";
$column['column_0']['content_font_size'] = 18;
$column['column_0']['content_font_color'] = "#ffffff";
$column['column_0']['content_even_font_color'] = "#ffffff";
$column['column_0']['content_hover_font_color'] = "#ffffff";
$column['column_0']['content_even_hover_font_color'] = "#ffffff";

$column['column_0']['content_odd_color'] = '#313035';
$column['column_0']['content_odd_hover_color'] = '#3e4044';
$column['column_0']['content_even_color'] = '#37363b';
$column['column_0']['content_even_hover_color'] = '#46474c';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';


$column['column_0']['button_background_color'] = '#efa738';
$column['column_0']['button_hover_background_color'] = '#09b1f8';
$column['column_0']['button_font_family'] = "Roboto Condensed";
$column['column_0']['button_font_size'] = 20;
$column['column_0']['button_font_color'] = "#ffffff";
$column['column_0']['button_hover_font_color'] = "#ffffff";

$column['column_0']['button_style_bold'] = 'bold';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_0']['row_description'] = '<i class="fas fa-clock-o arpsize-ico-14"></i> sit dolor lobortis';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_1']['row_description'] = '<i class="fas fa-shopping-cart arpsize-ico-14"></i> Falli libris has id fa';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_2']['row_description'] = '<i class="fas fa-star arpsize-ico-14"></i> pertinax vel eum';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_3']['row_description'] = '<i class="fas fa-heart arpsize-ico-14"></i> taleni nolui gniferu';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '158';
$column['column_0']['button_height'] = '45';
$column['column_0']['button_type'] = 'Button';
$column['column_0']['button_text'] = 'Purchase';
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

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';


$column['column_1']['package_title'] = 'Personal';
$column['column_1']['column_description'] = '"Aliquam euisod erat libero condimentum nisl hendrerit."';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';

$column['column_1']['header_background_color'] = '#414045';
$column['column_1']['header_hover_background_color'] = '#51545d';
$column['column_1']['header_font_family'] = 'Roboto Condensed';
$column['column_1']['header_font_size'] = 28;
$column['column_1']['header_font_color'] = "#ffffff";
$column['column_1']['header_hover_font_color'] = "#ffffff";

$column['column_1']['header_style_bold'] = 'bold';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_font_family'] = "Roboto Condensed";
$column['column_1']['price_font_size'] = 48;
$column['column_1']['price_font_color'] = "#ffffff";
$column['column_1']['price_hover_font_color'] = "#ffffff";

$column['column_1']['price_label_style_bold'] = 'bold';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Roboto Condensed';
$column['column_1']['price_text_font_size'] = 18;
$column['column_1']['price_text_font_color'] = "#ffffff";
$column['column_1']['price_text_hover_font_color'] = "#ffffff";

$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';


$column['column_1']['column_description_font_family'] = 'Open Sans';
$column['column_1']['column_description_font_size'] = 14;

$column['column_1']['column_description_font_color'] = '#ffffff';
$column['column_1']['column_description_hover_font_color'] = '#ffffff';
$column['column_1']['column_desc_background_color'] = '#37363b';
$column['column_1']['column_desc_hover_background_color'] = '#46474c';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';


$column['column_1']['content_font_family'] = "Roboto Condensed";
$column['column_1']['content_font_size'] = 18;
$column['column_1']['content_font_color'] = "#ffffff";
$column['column_1']['content_even_font_color'] = "#ffffff";
$column['column_1']['content_hover_font_color'] = "#ffffff";
$column['column_1']['content_even_hover_font_color'] = "#ffffff";

$column['column_1']['content_odd_color'] = '#313035';
$column['column_1']['content_odd_hover_color'] = '#3e4044';
$column['column_1']['content_even_color'] = '#37363b';
$column['column_1']['content_even_hover_color'] = '#46474c';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';


$column['column_1']['button_background_color'] = '#efa738';
$column['column_1']['button_hover_background_color'] = '#09b1f8';
$column['column_1']['button_font_family'] = "Roboto Condensed";
$column['column_1']['button_font_size'] = 20;
$column['column_1']['button_font_color'] = "#ffffff";
$column['column_1']['button_hover_font_color'] = "#ffffff";

$column['column_1']['button_style_bold'] = 'bold';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';



$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>20</span><span class='arp_price_duration' style='font-size:18px;font-weight:normal;'> per month </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'left';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_0']['row_description'] = '<i class="fas fa-clock-o arpsize-ico-14"></i> sit dolor logortis';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_1']['row_description'] = '<i class="fas fa-shopping-cart arpsize-ico-14"></i> Falli libris has id fa';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';

$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_2']['row_description'] = '<i class="fas fa-star arpsize-ico-14"></i> pertinax vel eum';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_3']['row_description'] = '<i class="fas fa-heart arpsize-ico-14"></i> taleni nolui gniferu';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '158';
$column['column_1']['button_height'] = '45';
$column['column_1']['button_type'] = 'Button';
$column['column_1']['button_text'] = 'Purchase';
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
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Business';
$column['column_2']['column_description'] = '"Aliquam euisod erat libero condimentum nisl hendrerit."';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = 1;

$column['column_2']['header_background_color'] = '#414045';
$column['column_2']['header_hover_background_color'] = '#51545d';
$column['column_2']['header_font_family'] = 'Roboto Condensed';
$column['column_2']['header_font_size'] = 28;
$column['column_2']['header_font_color'] = "#ffffff";
$column['column_2']['header_hover_font_color'] = "#ffffff";

$column['column_2']['header_style_bold'] = 'bold';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_font_family'] = "Roboto Condensed";
$column['column_2']['price_font_size'] = 48;
$column['column_2']['price_font_color'] = "#ffffff";
$column['column_2']['price_hover_font_color'] = "#ffffff";

$column['column_2']['price_label_style_bold'] = 'bold';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Roboto Condensed';
$column['column_2']['price_text_font_size'] = 18;
$column['column_2']['price_text_font_color'] = "#ffffff";
$column['column_2']['price_text_hover_font_color'] = "#ffffff";

$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';


$column['column_2']['column_description_font_family'] = 'Open Sans';
$column['column_2']['column_description_font_size'] = 14;

$column['column_2']['column_description_font_color'] = '#ffffff';
$column['column_2']['column_description_hover_font_color'] = '#ffffff';
$column['column_2']['column_desc_background_color'] = '#37363b';
$column['column_2']['column_desc_hover_background_color'] = '#46474c';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';


$column['column_2']['content_font_family'] = "Roboto Condensed";
$column['column_2']['content_font_size'] = 18;
$column['column_2']['content_font_color'] = "#ffffff";
$column['column_2']['content_even_font_color'] = "#ffffff";
$column['column_2']['content_hover_font_color'] = "#ffffff";
$column['column_2']['content_even_hover_font_color'] = "#ffffff";

$column['column_2']['content_odd_color'] = '#313035';
$column['column_2']['content_odd_hover_color'] = '#3e4044';
$column['column_2']['content_even_color'] = '#37363b';
$column['column_2']['content_even_hover_color'] = '#46474c';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';


$column['column_2']['button_background_color'] = '#efa738';
$column['column_2']['button_hover_background_color'] = '#09b1f8';
$column['column_2']['button_font_family'] = "Roboto Condensed";
$column['column_2']['button_font_size'] = 20;
$column['column_2']['button_font_color'] = "#ffffff";
$column['column_2']['button_hover_font_color'] = "#ffffff";

$column['column_2']['button_style_bold'] = 'bold';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';



$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>50</span><span class='arp_price_duration' style='font-size:18px;'> per month </span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'left';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_0']['row_description'] = '<i class="fas fa-clock-o arpsize-ico-14"></i> sit dolor logortis';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_1']['row_description'] = '<i class="fas fa-shopping-cart arpsize-ico-14"></i> Falli libris has id fa';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_2']['row_description'] = '<i class="fas fa-star arpsize-ico-14"></i> pertinax vel eum';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_3']['row_description'] = '<i class="fas fa-heart arpsize-ico-14"></i> taleni nolui gniferu';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '158';
$column['column_2']['button_height'] = '45';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Purchase';
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
$column['column_2']['footer_level_options_hover_font_color'] = '#ffffff';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Enterprise';
$column['column_3']['column_description'] = '"Aliquam euisod erat libero condimentum nisl hendrerit."';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';

$column['column_3']['header_background_color'] = '#414045';
$column['column_3']['header_hover_background_color'] = '#51545d';
$column['column_3']['header_font_family'] = 'Roboto Condensed';
$column['column_3']['header_font_size'] = 28;
$column['column_3']['header_font_color'] = "#ffffff";
$column['column_3']['header_hover_font_color'] = "#ffffff";

$column['column_3']['header_style_bold'] = 'bold';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';


$column['column_3']['price_font_family'] = "Roboto Condensed";
$column['column_3']['price_font_size'] = 48;
$column['column_3']['price_font_color'] = "#ffffff";
$column['column_3']['price_hover_font_color'] = "#ffffff";

$column['column_3']['price_label_style_bold'] = 'bold';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Roboto Condensed';
$column['column_3']['price_text_font_size'] = 18;
$column['column_3']['price_text_font_color'] = "#ffffff";
$column['column_3']['price_text_hover_font_color'] = "#ffffff";

$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = 'Open Sans';
$column['column_3']['column_description_font_size'] = 14;

$column['column_3']['column_description_font_color'] = '#ffffff';
$column['column_3']['column_description_hover_font_color'] = '#ffffff';
$column['column_3']['column_desc_background_color'] = '#37363b';
$column['column_3']['column_desc_hover_background_color'] = '#46474c';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';


$column['column_3']['content_font_family'] = "Roboto Condensed";
$column['column_3']['content_font_size'] = 18;
$column['column_3']['content_font_color'] = "#ffffff";
$column['column_3']['content_even_font_color'] = "#ffffff";
$column['column_3']['content_hover_font_color'] = "#ffffff";
$column['column_3']['content_even_hover_font_color'] = "#ffffff";

$column['column_3']['content_odd_color'] = '#313035';
$column['column_3']['content_odd_hover_color'] = '#3e4044';
$column['column_3']['content_even_color'] = '#37363b';
$column['column_3']['content_even_hover_color'] = '#46474c';
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';


$column['column_3']['button_background_color'] = '#efa738';
$column['column_3']['button_hover_background_color'] = '#09b1f8';
$column['column_3']['button_font_family'] = "Roboto Condensed";
$column['column_3']['button_font_size'] = 20;
$column['column_3']['button_font_color'] = "#ffffff";
$column['column_3']['button_hover_font_color'] = "#ffffff";

$column['column_3']['button_style_bold'] = 'bold';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';



$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>69</span><span class='arp_price_duration' style='font-size:18px;font-weight:normal;'> per month </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '';
$column['column_3']['body_text_alignment'] = 'left';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_0']['row_description'] = '<i class="fas fa-clock-o arpsize-ico-14"></i> sit dolor logortis';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_1']['row_description'] = '<i class="fas fa-shopping-cart arpsize-ico-14"></i> Falli libris has id fa';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';

$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_2']['row_description'] = '<i class="fas fa-star arpsize-ico-14"></i> pertinax vel eum';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_3']['row_description'] = '<i class="fas fa-heart arpsize-ico-14"></i> taleni nolui gniferu';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = '158';
$column['column_3']['button_height'] = '45';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Purchase';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_hover_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);
$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 12
 * 
 * @since 1.0
 * @removed in 1.2
 */
$values['name'] = 'ARPrice Template 12';
$values['is_template'] = 1;
$values['template_name'] = 12;
$values['status'] = 'draft';
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

$arp_pt_template_settings['template'] = 'arptemplate_12';
$arp_pt_template_settings['skin'] = 'blue';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'enable', 'custom_ribbon' => 'enable', 'button_position' => 'position_1', 'caption_style' => 'default', 'amount_style' => 'style_1', 'list_alignment' => 'default', 'ribbon_type' => 'custom_style_1', 'column_description_style' => 'style_2', 'caption_title' => 'style_1', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0);



$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_12';
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

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 5;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 5;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 5;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 5;
$arp_pt_column_settings['arp_global_button_type'] = 'none';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '0';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;


$arp_pt_button_settings['button_shadow_color'] = '#ffffff';
$arp_pt_button_settings['button_radius'] = 0;

$arp_pt_column_settings['arp_column_border_size'] = '0';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#525252';

$arp_pt_column_settings['arp_column_border_left'] = 1;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;

$arp_pt_column_settings['space_between_column'] = 'no';
$arp_pt_column_settings['column_space'] = '0';
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 250;


$arp_pt_column_settings['hide_caption_column'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 100;
$arp_pt_column_settings['column_wrapper_width_style'] = '%';
$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
$arp_pt_column_animation['scrolling_columns'] = 2;
$arp_pt_column_animation['navigation'] = 1;
$arp_pt_column_animation['autoplay'] = 1;
$arp_pt_column_animation['sliding_effect'] = 'slide';
$arp_pt_column_animation['transition_speed'] = 750;
$arp_pt_column_animation['navigation_style'] = $arp_mainoptionsarr['general_options']['column_animation']['navigation_style'][0];
$arp_pt_column_animation['pagination'] = 0;
$arp_pt_column_animation['pagination_style'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_style'][0];
$arp_pt_column_animation['pagination_position'] = $arp_mainoptionsarr['general_options']['column_animation']['pagination_position'][0];
$arp_pt_column_animation['easing_effect'] = $arp_mainoptionsarr['general_options']['column_animation']['easing_effect'][2];
$arp_pt_column_animation['infinite'] = 0;
$arp_pt_column_animation['navi_nav_btn'] = 'navigation';
$arp_pt_column_animation['pagi_nav_btn'] = 'pagination_bottom';

$arp_pt_column_animation['sticky_caption'] = 0;

$arp_pt_tooltip_settings['background_color'] = '#000000';
$arp_pt_tooltip_settings['text_color'] = '#FFFFFF';
$arp_pt_tooltip_settings['animation'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['animation'][0];
$arp_pt_tooltip_settings['position'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['position'][3];
$arp_pt_tooltip_settings['style'] = $arp_mainoptionsarr['general_options']['tooltipsetting']['style'][0];
$arp_pt_tooltip_settings['tooltip_width'] = '';
$arp_pt_tooltip_settings['tooltip_font_family'] = 'Open Sans Semibold';
$arp_pt_tooltip_settings['tooltip_font_size'] = 14;
$arp_pt_tooltip_settings['tooltip_font_style'] = 'normal';
$arp_pt_tooltip_settings['tooltip_trigger_type'] = 'hover';
$arp_pt_tooltip_settings['tooltip_display_style'] = 'default';
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$values['options'] = maybe_serialize($arp_pt_gen_options);


$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = '';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 1;

$column['column_0']['column_highlight'] = '';
$column['column_0']['html_content'] = "Hosting Plans";


$column['column_0']['header_font_family'] = "Open Sans Bold";
$column['column_0']['header_font_size'] = 22;
$column['column_0']['header_font_color'] = "#666666";
$column['column_0']['header_hover_font_color'] = "#666666";

$column['column_0']['header_style_bold'] = 'bold';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';



$column['column_0']['price_font_family'] = "Arial";
$column['column_0']['price_font_size'] = 58;
$column['column_0']['price_font_color'] = "#FFFFFF";
$column['column_0']['price_hover_font_color'] = "#FFFFFF";

$column['column_0']['price_label_style_bold'] = 'bold';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Open Sans';
$column['column_0']['price_text_font_size'] = 13;
$column['column_0']['price_text_font_color'] = "#FFFFFF";
$column['column_0']['price_text_hover_font_color'] = "#FFFFFF";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = 'Open Sans';
$column['column_0']['column_description_font_size'] = 10;

$column['column_0']['column_description_font_color'] = '#ffffff';
$column['column_0']['column_description_hover_font_color'] = '#ffffff';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = "Open Sans Semibold";
$column['column_0']['content_font_size'] = 14;
$column['column_0']['content_font_color'] = "#333333";
$column['column_0']['content_even_font_color'] = "#333333";
$column['column_0']['content_hover_font_color'] = "#333333";
$column['column_0']['content_even_hover_font_color'] = "#333333";

$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['button_font_family'] = "Open Sans Bold";
$column['column_0']['button_font_size'] = 18;
$column['column_0']['button_font_color'] = "#143b86";
$column['column_0']['button_hover_font_color'] = "#143b86";
$column['column_0']['button_font_style'] = "bold";
$column['column_0']['button_style_bold'] = 'bold';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_0']['row_description'] = 'Data Storage';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_1']['row_description'] = 'MySQL Databases';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_2']['row_description'] = 'Email Accounts';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_3']['row_description'] = 'Free Domain';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_4']['row_description'] = 'Online Support';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_5']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_5']['row_description'] = 'Support Tickets';
$column['column_0']['rows']['row_5']['row_label'] = '';
$column['column_0']['rows']['row_5']['row_tooltip'] = '';
$column['column_0']['button_size'] = '';
$column['column_0']['button_height'] = '';
$column['column_0']['button_type'] = '';
$column['column_0']['button_text'] = '';
$column['column_0']['button_url'] = '';
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
$column['column_0']['footer_level_options_font_color'] = '#333333';
$column['column_0']['footer_level_options_hover_font_color'] = '#333333';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';

$column['column_1']['package_title'] = 'Basic Pro';
$column['column_1']['column_description'] = "<div class='custom_ribbon'>Save $15</div><div>Nunc at diam ornare, pretium sapien</div>";
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';


$column['column_1']['header_font_family'] = "Open Sans Bold";
$column['column_1']['header_font_size'] = 19;
$column['column_1']['header_font_color'] = "#ffffff";
$column['column_1']['header_hover_font_color'] = "#ffffff";

$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';



$column['column_1']['price_font_family'] = "Arial";
$column['column_1']['price_font_size'] = 54;
$column['column_1']['price_font_color'] = "#FFFFFF";
$column['column_1']['price_hover_font_color'] = "#FFFFFF";

$column['column_1']['price_label_style_bold'] = 'bold';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Open Sans';
$column['column_1']['price_text_font_size'] = 13;
$column['column_1']['price_text_font_color'] = "#FFFFFF";
$column['column_1']['price_text_hover_font_color'] = "#FFFFFF";

$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = 'Open Sans';
$column['column_1']['column_description_font_size'] = 10;

$column['column_1']['column_description_font_color'] = '#ffffff';
$column['column_1']['column_description_hover_font_color'] = '#ffffff';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = "Open Sans Semibold";
$column['column_1']['content_font_size'] = 14;
$column['column_1']['content_font_color'] = "#333333";
$column['column_1']['content_even_font_color'] = "#333333";
$column['column_1']['content_hover_font_color'] = "#333333";
$column['column_1']['content_even_hover_font_color'] = "#333333";

$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['button_font_family'] = "Open Sans Bold";
$column['column_1']['button_font_size'] = 18;
$column['column_1']['button_font_color'] = "#143b86";
$column['column_1']['button_hover_font_color'] = "#143b86";

$column['column_1']['button_style_bold'] = 'bold';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';



$column['column_1']['price_text'] = "<span class='arp_currency'>$</span>20";
$column['column_1']['price_label'] = "per month";
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '10 GB';
$column['column_1']['rows']['row_0']['row_tooltip'] = 'Every additional space of 1 GB costs $1.49';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '5 Databases';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = 'Every additional database costs $1.49';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '5 Email Accounts';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = 'Every additional email account costs $1.99';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '5 Free Domain';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = 'Every additional domain costs $1.49';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = 'No';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_5']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_5']['row_description'] = '2 tickets / month';
$column['column_1']['rows']['row_5']['row_label'] = '';
$column['column_1']['rows']['row_5']['row_tooltip'] = 'Every additional ticket costs $0.99';
$column['column_1']['button_size'] = 'Medium';
$column['column_1']['button_height'] = 'Medium';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Signup';
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
$column['column_1']['footer_level_options_font_color'] = '#333333';
$column['column_1']['footer_level_options_hover_font_color'] = '#333333';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Standard Pro';
$column['column_2']['column_description'] = "<div class='custom_ribbon'>Save $35</div><div>Nunc at diam ornare, pretium sapien</div>";
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = 1;


$column['column_2']['header_font_family'] = "Open Sans Bold";
$column['column_2']['header_font_size'] = 19;
$column['column_2']['header_font_color'] = "#ffffff";
$column['column_2']['header_hover_font_color'] = "#ffffff";

$column['column_2']['header_style_bold'] = 'bold';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';



$column['column_2']['price_font_family'] = "Arial";
$column['column_2']['price_font_size'] = 54;
$column['column_2']['price_font_color'] = "#FFFFFF";
$column['column_2']['price_hover_font_color'] = "#FFFFFF";

$column['column_2']['price_label_style_bold'] = 'bold';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Open Sans';
$column['column_2']['price_text_font_size'] = 13;
$column['column_2']['price_text_font_color'] = "#FFFFFF";
$column['column_2']['price_text_hover_font_color'] = "#FFFFFF";

$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = 'Open Sans';
$column['column_2']['column_description_font_size'] = 10;

$column['column_2']['column_description_font_color'] = '#ffffff';
$column['column_2']['column_description_hover_font_color'] = '#ffffff';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = "Open Sans Semibold";
$column['column_2']['content_font_size'] = 14;
$column['column_2']['content_font_color'] = "#333333";
$column['column_2']['content_even_font_color'] = "#333333";
$column['column_2']['content_hover_font_color'] = "#333333";
$column['column_2']['content_even_hover_font_color'] = "#333333";

$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['button_font_family'] = "Open Sans Bold";
$column['column_2']['button_font_size'] = 18;
$column['column_2']['button_font_color'] = "#143b86";
$column['column_2']['button_hover_font_color'] = "#143b86";

$column['column_2']['button_style_bold'] = 'bold';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';



$column['column_2']['price_text'] = "<span class='arp_currency'>$</span>50";
$column['column_2']['price_label'] = "per month";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '25 GB';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = 'Every additional space of 1 GB costs $1.49';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '10 Databases';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = 'Every additional database costs $1.49';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '10 Email Accounts';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = 'Every additional email account costs $1.99';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '10 Domains';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = 'Every additional domain costs $1.49';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = 'No';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_5']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_5']['row_description'] = '5 tickets / month';
$column['column_2']['rows']['row_5']['row_label'] = '';
$column['column_2']['rows']['row_5']['row_tooltip'] = 'Every additional ticket costs $0.99';
$column['column_2']['button_size'] = 'Medium';
$column['column_2']['button_height'] = 'Medium';
$column['column_2']['button_type'] = 'button';
$column['column_2']['button_text'] = 'Signup';
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
$column['column_2']['footer_level_options_font_color'] = '#364762';
$column['column_2']['footer_level_options_hover_font_color'] = '#364762';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Advanced Pro';
$column['column_3']['column_description'] = "<div class='custom_ribbon'>Save $45</div><div>Nunc at diam ornare, pretium sapien</div>";
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';

$column['column_3']['header_font_family'] = "Open Sans Bold";
$column['column_3']['header_font_size'] = 19;
$column['column_3']['header_font_color'] = "#ffffff";
$column['column_3']['header_hover_font_color'] = "#ffffff";

$column['column_3']['header_style_bold'] = 'bold';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';



$column['column_3']['price_font_family'] = "Arial";
$column['column_3']['price_font_size'] = 54;
$column['column_3']['price_font_color'] = "#FFFFFF";
$column['column_3']['price_hover_font_color'] = "#FFFFFF";

$column['column_3']['price_label_style_bold'] = 'bold';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Open Sans';
$column['column_3']['price_text_font_size'] = 13;
$column['column_3']['price_text_font_color'] = "#FFFFFF";
$column['column_3']['price_text_hover_font_color'] = "#FFFFFF";

$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = 'Open Sans';
$column['column_3']['column_description_font_size'] = 10;

$column['column_3']['column_description_font_color'] = '#ffffff';
$column['column_3']['column_description_hover_font_color'] = '#ffffff';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = "Open Sans Semibold";
$column['column_3']['content_font_size'] = 14;
$column['column_3']['content_font_color'] = "#333333";
$column['column_3']['content_even_font_color'] = "#333333";
$column['column_3']['content_hover_font_color'] = "#333333";
$column['column_3']['content_even_hover_font_color'] = "#333333";

$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['button_font_family'] = "Open Sans Bold";
$column['column_3']['button_font_size'] = 18;
$column['column_3']['button_font_color'] = "#143b86";
$column['column_3']['button_hover_font_color'] = "#143b86";

$column['column_3']['button_style_bold'] = 'bold';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';



$column['column_3']['price_text'] = "<span class='arp_currency'>$</span>69";
$column['column_3']['price_label'] = "per month";
$column['column_3']['arp_header_shortcode'] = '';
$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = '50 GB';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = 'Every additional space of 1 GB costs $1.49';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = '30 Databases';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = 'Every additional database costs $1.49';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = '20 Email Accounts';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = 'Every additional email account costs $1.99';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = '30 Domains';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = 'Every additional domain costs $1.49';
$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = 'Yes';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_5']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_5']['row_description'] = '10 tickets / month';
$column['column_3']['rows']['row_5']['row_label'] = '';
$column['column_3']['rows']['row_5']['row_tooltip'] = 'Every additional ticket costs $0.99';
$column['column_3']['button_size'] = 'Medium';
$column['column_3']['button_height'] = 'Medium';
$column['column_3']['button_type'] = 'button';
$column['column_3']['button_text'] = 'Signup';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#333333';
$column['column_3']['footer_level_options_hover_font_color'] = '#333333';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$column['column_4']['package_title'] = 'Ultimate Pro';
$column['column_4']['column_description'] = "<div class='custom_ribbon'>Save $50</div>Nunc at diam ornare, pretium sapien";
$column['column_4']['custom_ribbon_txt'] = '';
$column['column_4']['column_width'] = '';
$column['column_4']['column_align'] = 'left';
$column['column_4']['is_caption'] = 0;

$column['column_4']['column_highlight'] = '';

$column['column_4']['header_font_family'] = "Open Sans Bold";
$column['column_4']['header_font_size'] = 19;
$column['column_4']['header_font_color'] = "#ffffff";
$column['column_4']['header_hover_font_color'] = "#ffffff";

$column['column_4']['header_style_bold'] = 'bold';
$column['column_4']['header_style_italic'] = '';
$column['column_4']['header_style_decoration'] = '';


$column['column_4']['price_font_family'] = "Arial";
$column['column_4']['price_font_size'] = 54;
$column['column_4']['price_font_color'] = "#FFFFFF";
$column['column_4']['price_hover_font_color'] = "#FFFFFF";

$column['column_4']['price_label_style_bold'] = 'bold';
$column['column_4']['price_label_style_italic'] = '';
$column['column_4']['price_label_style_decoration'] = '';

$column['column_4']['price_text_font_family'] = 'Open Sans';
$column['column_4']['price_text_font_size'] = 13;
$column['column_4']['price_text_font_color'] = "#FFFFFF";
$column['column_4']['price_text_hover_font_color'] = "#FFFFFF";

$column['column_4']['price_text_style_bold'] = '';
$column['column_4']['price_text_style_italic'] = '';
$column['column_4']['price_text_style_decoration'] = '';


$column['column_4']['column_description_font_family'] = 'Open Sans';
$column['column_4']['column_description_font_size'] = 10;

$column['column_4']['column_description_font_color'] = '#ffffff';
$column['column_4']['column_description_hover_font_color'] = '#ffffff';
$column['column_4']['column_description_style_bold'] = '';
$column['column_4']['column_description_style_italic'] = '';
$column['column_4']['column_description_style_decoration'] = '';


$column['column_4']['content_font_family'] = "Open Sans Semibold";
$column['column_4']['content_font_size'] = 14;
$column['column_4']['content_font_color'] = "#333333";
$column['column_4']['content_even_font_color'] = "#333333";
$column['column_4']['content_hover_font_color'] = "#333333";
$column['column_4']['content_even_hover_font_color'] = "#333333";

$column['column_4']['body_li_style_bold'] = '';
$column['column_4']['body_li_style_italic'] = '';
$column['column_4']['body_li_style_decoration'] = '';


$column['column_4']['button_font_family'] = "Open Sans Bold";
$column['column_4']['button_font_size'] = 18;
$column['column_4']['button_font_color'] = "#143b86";
$column['column_4']['button_hover_font_color'] = "#143b86";

$column['column_4']['button_style_bold'] = 'bold';
$column['column_4']['button_style_italic'] = '';
$column['column_4']['button_style_decoration'] = '';



$column['column_4']['price_text'] = "<span class='arp_currency'>$</span>99";
$column['column_4']['price_label'] = "per month";
$column['column_4']['arp_header_shortcode'] = '';
$column['column_4']['body_text_alignment'] = 'center';
$column['column_4']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_0']['row_description'] = 'Unlimited';
$column['column_4']['rows']['row_0']['row_tooltip'] = 'Enjoy unlmited disk space';
$column['column_4']['rows']['row_0']['row_label'] = '';
$column['column_4']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_1']['row_description'] = 'Unlimited Database';
$column['column_4']['rows']['row_1']['row_tooltip'] = 'Enjoy unlimited databases';
$column['column_4']['rows']['row_1']['row_label'] = '';
$column['column_4']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_2']['row_description'] = '30 Email accounts';
$column['column_4']['rows']['row_2']['row_tooltip'] = 'Every additional email account costs $1.99';
$column['column_4']['rows']['row_2']['row_label'] = '';
$column['column_4']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_3']['row_description'] = '30 Free Domains';
$column['column_4']['rows']['row_3']['row_tooltip'] = 'Every additional domain costs $1.49';
$column['column_4']['rows']['row_3']['row_label'] = '';
$column['column_4']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_4']['row_description'] = 'Yes';
$column['column_4']['rows']['row_4']['row_tooltip'] = '';
$column['column_4']['rows']['row_4']['row_label'] = '';
$column['column_4']['rows']['row_5']['row_des_txt_align'] = 'center';
$column['column_4']['rows']['row_5']['row_description'] = '30 tickets / month';
$column['column_4']['rows']['row_5']['row_tooltip'] = 'Every additional ticket costs $0.99';
$column['column_4']['rows']['row_5']['row_label'] = '';
$column['column_4']['button_size'] = 'Medium';
$column['column_4']['button_height'] = 'Medium';
$column['column_4']['button_type'] = 'button';
$column['column_4']['button_text'] = 'Signup';
$column['column_4']['button_url'] = '#';
$column['column_4']['button_s_size'] = '';
$column['column_4']['button_s_type'] = '';
$column['column_4']['button_s_text'] = '';
$column['column_4']['button_s_url'] = '';
$column['column_4']['s_is_new_window'] = '';
$column['column_4']['is_new_window'] = 0;



$column['column_4']['footer_content'] = '';
$column['column_4']['footer_content_position'] = 0;
$column['column_4']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_4']['footer_level_options_font_size'] = 12;
$column['column_4']['footer_level_options_font_color'] = '#333333';
$column['column_4']['footer_level_options_hover_font_color'] = '#333333';
$column['column_4']['footer_level_options_font_style_bold'] = '';
$column['column_4']['footer_level_options_font_style_italic'] = '';
$column['column_4']['footer_level_options_font_style_decoration'] = '';
$column['column_4']['is_post_variables'] = 0;
$column['column_4']['post_variables_content'] = 'plan_id=4;';

$pt_columns = array('columns' => $column);
$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 13
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 13';
$values['is_template'] = 1;
$values['template_name'] = 13;
$values['status'] = 'published';
$values['is_animated'] = 1;

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

$arp_pt_template_settings['template'] = 'arptemplate_13';
$arp_pt_template_settings['skin'] = 'darkblue';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'after_button', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_13';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 240;


$arp_pt_column_settings['hide_caption_colunmn'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1000;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 3;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 3;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 3;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 3;
$arp_pt_column_settings['arp_global_button_type'] = 'flat';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '0';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';

$arp_pt_column_settings['arp_column_border_size'] = '0';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#d1d1d1';

$arp_pt_column_settings['arp_column_border_left'] = 1;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;


$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_settings['header_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['header_font_size_global'] = 19;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Anton';
$arp_pt_column_settings['price_font_size_global'] = 42;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['body_font_size_global'] = 16;
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
$arp_pt_column_settings['button_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['button_font_size_global'] = 17;
$arp_pt_column_settings['arp_button_text_alignment'] = 'center';
$arp_pt_column_settings['arp_button_text_bold_global'] = '';
$arp_pt_column_settings['arp_button_text_italic_global'] = '';
$arp_pt_column_settings['arp_button_text_decoration_global'] = '';
$arp_pt_column_settings['description_font_family_global'] = 'Open Sans Semibold';
$arp_pt_column_settings['description_font_size_global'] = 13;
$arp_pt_column_settings['arp_description_text_alignment'] = 'center';
$arp_pt_column_settings['arp_description_text_bold_global'] = '';
$arp_pt_column_settings['arp_description_text_italic_global'] = '';
$arp_pt_column_settings['arp_description_text_decoration_global'] = '';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = "#01325b";
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = "#e94c3d";
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#e94c3d";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = '#01325b';
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#e94c3d';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#e94c3d';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Basic Package';
$column['column_0']['column_description'] = 'Aliquam euismod erat conentum nisl hendreritvel. Devin euismod erat condimen.';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';
$column['column_0']['price_text'] = "<span class='arp_price_duration' style='font-size:15px;font-weight:normal;'> monthly </span><span class='arp_price_value'><span class='arp_currency'>$</span>10.55</span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = '';
$column['column_0']['column_background_color'] = '#01325b';
$column['column_0']['column_hover_background_color'] = "#01325b";


$column['column_0']['header_font_family'] = "Open Sans Bold";
$column['column_0']['header_font_size'] = 19;
$column['column_0']['header_font_color'] = "#ffffff";
$column['column_0']['header_hover_font_color'] = "#ffffff";

$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_background_color'] = '#e94c3d';
$column['column_0']['price_hover_background_color'] = '#e94c3d';
$column['column_0']['price_font_family'] = "Anton";
$column['column_0']['price_font_size'] = 42;
$column['column_0']['price_font_color'] = "#ffffff";
$column['column_0']['price_hover_font_color'] = "#ffffff";

$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Open Sans';
$column['column_0']['price_text_font_size'] = 16;
$column['column_0']['price_text_font_color'] = "#ffffff";
$column['column_0']['price_text_hover_font_color'] = "#ffffff";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_0']['column_description_font_size'] = 13;

$column['column_0']['column_description_font_color'] = '#ffffff';
$column['column_0']['column_description_hover_font_color'] = '#ffffff';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = "Open Sans Bold";
$column['column_0']['content_font_size'] = 16;
$column['column_0']['content_font_color'] = "#ffffff";
$column['column_0']['content_even_font_color'] = "#ffffff";
$column['column_0']['content_hover_font_color'] = "#ffffff";
$column['column_0']['content_even_hover_font_color'] = "#ffffff";

$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['content_label_font_family'] = 'Open Sans';
$column['column_0']['content_label_font_size'] = 16;

$column['column_0']['content_label_font_color'] = '#ffffff';
$column['column_0']['content_label_hover_font_color'] = '#ffffff';
$column['column_0']['body_label_style_bold'] = '';
$column['column_0']['body_label_style_italic'] = '';
$column['column_0']['body_label_style_decoration'] = '';



$column['column_0']['button_background_color'] = '#e94c3d';
$column['column_0']['button_hover_background_color'] = '#e94c3d';
$column['column_0']['button_font_family'] = "Open Sans Bold";
$column['column_0']['button_font_size'] = 17;
$column['column_0']['button_font_color'] = "#FFFFFF";
$column['column_0']['button_hover_font_color'] = "#FFFFFF";

$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['body_text_alignment'] = 'center';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = '2500 Contacts';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_1']['row_description'] = '8000 Email';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_2']['row_description'] = '20 Specialities';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_3']['row_description'] = '1 Assistance';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_4']['row_description'] = '10GB Bandwidth';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '152';
$column['column_0']['button_height'] = '39';
$column['column_0']['button_type'] = 'button';
$column['column_0']['button_text'] = 'Sign up Now';
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

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';

$column['column_1']['package_title'] = 'Standard Package';
$column['column_1']['column_description'] = 'Aliquam euismod erat conentum nisl hendreritvel. Devin euismod erat condimen.';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';
$column['column_1']['price_text'] = "<span class='arp_price_duration' style='font-size:15px;font-weight:normal;'> monthly </span><span class='arp_price_value'><span class='arp_currency'>$</span>20.55</span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['column_background_color'] = '#01325b';
$column['column_1']['column_hover_background_color'] = "#01325b";


$column['column_1']['header_font_family'] = "Open Sans Bold";
$column['column_1']['header_font_size'] = 19;
$column['column_1']['header_font_color'] = "#ffffff";
$column['column_1']['header_hover_font_color'] = "#ffffff";

$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_background_color'] = '#e94c3d';
$column['column_1']['price_hover_background_color'] = '#e94c3d';
$column['column_1']['price_font_family'] = "Anton";
$column['column_1']['price_font_size'] = 42;
$column['column_1']['price_font_color'] = "#ffffff";
$column['column_1']['price_hover_font_color'] = "#ffffff";

$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Open Sans';
$column['column_1']['price_text_font_size'] = 16;
$column['column_1']['price_text_font_color'] = "#ffffff";
$column['column_1']['price_text_hover_font_color'] = "#ffffff";

$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_1']['column_description_font_size'] = 13;

$column['column_1']['column_description_font_color'] = '#ffffff';
$column['column_1']['column_description_hover_font_color'] = '#ffffff';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = "Open Sans Bold";
$column['column_1']['content_font_size'] = 16;
$column['column_1']['content_font_color'] = "#ffffff";
$column['column_1']['content_even_font_color'] = "#ffffff";
$column['column_1']['content_hover_font_color'] = "#ffffff";
$column['column_1']['content_even_hover_font_color'] = "#ffffff";

$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['content_label_font_family'] = 'Open Sans';
$column['column_1']['content_label_font_size'] = 16;

$column['column_1']['content_label_font_color'] = '#ffffff';
$column['column_1']['content_label_hover_font_color'] = '#ffffff';
$column['column_1']['body_label_style_bold'] = '';
$column['column_1']['body_label_style_italic'] = '';
$column['column_1']['body_label_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#e94c3d';
$column['column_1']['button_hover_background_color'] = '#e94c3d';
$column['column_1']['button_font_family'] = "Open Sans Bold";
$column['column_1']['button_font_size'] = 17;
$column['column_1']['button_font_color'] = "#FFFFFF";
$column['column_1']['button_hover_font_color'] = "#FFFFFF";

$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '5000 Contacts';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '10000 Email';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '30 Specialities';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '2 Assistance';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = '20GB Bandwidth';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '152';
$column['column_1']['button_height'] = '39';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Sign up Now';
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
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Business Package';
$column['column_2']['column_description'] = 'Aliquam euismod erat conentum nisl hendreritvel. Devin euismod erat condimen.';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';
$column['column_2']['price_text'] = "<span class='arp_price_duration' style='font-size:15px;font-weight:normal;'> monthly </span><span class='arp_price_value'><span class='arp_currency'>$</span>30.55</span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['column_background_color'] = '#01325b';
$column['column_2']['column_hover_background_color'] = "#01325b";


$column['column_2']['header_font_family'] = "Open Sans Bold";
$column['column_2']['header_font_size'] = 19;
$column['column_2']['header_font_color'] = "#ffffff";
$column['column_2']['header_hover_font_color'] = "#ffffff";

$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_background_color'] = '#e94c3d';
$column['column_2']['price_hover_background_color'] = '#e94c3d';
$column['column_2']['price_font_family'] = "Anton";
$column['column_2']['price_font_size'] = 42;
$column['column_2']['price_font_color'] = "#ffffff";
$column['column_2']['price_hover_font_color'] = "#ffffff";

$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Open Sans';
$column['column_2']['price_text_font_size'] = 16;
$column['column_2']['price_text_font_color'] = "#ffffff";
$column['column_2']['price_text_hover_font_color'] = "#ffffff";

$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_2']['column_description_font_size'] = 13;

$column['column_2']['column_description_font_color'] = '#ffffff';
$column['column_2']['column_description_hover_font_color'] = '#ffffff';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = "Open Sans Bold";
$column['column_2']['content_font_size'] = 16;
$column['column_2']['content_font_color'] = "#ffffff";
$column['column_2']['content_even_font_color'] = "#ffffff";
$column['column_2']['content_hover_font_color'] = "#ffffff";
$column['column_2']['content_even_hover_font_color'] = "#ffffff";

$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['content_label_font_family'] = 'Open Sans';
$column['column_2']['content_label_font_size'] = 16;

$column['column_2']['content_label_font_color'] = '#ffffff';
$column['column_2']['content_label_hover_font_color'] = '#ffffff';
$column['column_2']['body_label_style_bold'] = '';
$column['column_2']['body_label_style_italic'] = '';
$column['column_2']['body_label_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#e94c3d';
$column['column_2']['button_hover_background_color'] = '#e94c3d';
$column['column_2']['button_font_family'] = "Open Sans Bold";
$column['column_2']['button_font_size'] = 17;
$column['column_2']['button_font_color'] = "#FFFFFF";
$column['column_2']['button_hover_font_color'] = "#FFFFFF";

$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '8000 Contacts';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '12000 Email';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '50 Specialities';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '5 Assistance';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = '50GB Bandwidth';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '152';
$column['column_2']['button_height'] = '39';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Sign up Now';
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
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Advanced Package';
$column['column_3']['column_description'] = 'Aliquam euismod erat conentum nisl hendreritvel. Devin euismod erat condimen.';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';
$column['column_3']['price_text'] = "<span class='arp_price_duration' style='font-size:15px;font-weight:normal;'> monthly </span><span class='arp_price_value'><span class='arp_currency'>$</span>40.55</span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '';
$column['column_3']['column_background_color'] = '#01325b';
$column['column_3']['column_hover_background_color'] = "#01325b";


$column['column_3']['header_font_family'] = "Open Sans Bold";
$column['column_3']['header_font_size'] = 19;
$column['column_3']['header_font_color'] = "#ffffff";
$column['column_3']['header_hover_font_color'] = "#ffffff";

$column['column_3']['header_style_bold'] = '';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';


$column['column_3']['price_background_color'] = '#e94c3d';
$column['column_3']['price_hover_background_color'] = '#e94c3d';
$column['column_3']['price_font_family'] = "Anton";
$column['column_3']['price_font_size'] = 42;
$column['column_3']['price_font_color'] = "#ffffff";
$column['column_3']['price_hover_font_color'] = "#ffffff";

$column['column_3']['price_label_style_bold'] = '';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Open Sans';
$column['column_3']['price_text_font_size'] = 16;
$column['column_3']['price_text_font_color'] = "#ffffff";
$column['column_3']['price_text_hover_font_color'] = "#ffffff";

$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_3']['column_description_font_size'] = 13;

$column['column_3']['column_description_font_color'] = '#ffffff';
$column['column_3']['column_description_hover_font_color'] = '#ffffff';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = "Open Sans Bold";
$column['column_3']['content_font_size'] = 16;
$column['column_3']['content_font_color'] = "#ffffff";
$column['column_3']['content_even_font_color'] = "#ffffff";
$column['column_3']['content_hover_font_color'] = "#ffffff";
$column['column_3']['content_even_hover_font_color'] = "#ffffff";

$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['content_label_font_family'] = 'Open Sans';
$column['column_3']['content_label_font_size'] = 16;

$column['column_3']['content_label_font_color'] = '#ffffff';
$column['column_3']['content_label_hover_font_color'] = '#ffffff';
$column['column_3']['body_label_style_bold'] = '';
$column['column_3']['body_label_style_italic'] = '';
$column['column_3']['body_label_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#e94c3d';
$column['column_3']['button_hover_background_color'] = '#e94c3d';
$column['column_3']['button_font_family'] = "Open Sans Bold";
$column['column_3']['button_font_size'] = 17;
$column['column_3']['button_font_color'] = "#FFFFFF";
$column['column_3']['button_hover_font_color'] = "#FFFFFF";

$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';


$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = '10000 Contacts';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = '15000 Email';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';

$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = '100 Specialities';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = '10 Assistance';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = '100GB Bandwidth';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';

$column['column_3']['button_size'] = '152';
$column['column_3']['button_height'] = '39';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Sign up Now';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_hover_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 14
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 14';
$values['is_template'] = 1;
$values['template_name'] = 14;
$values['status'] = 'published';
$values['is_animated'] = 1;

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

$arp_pt_template_settings['template'] = 'arptemplate_14';
$arp_pt_template_settings['skin'] = 'orange';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'enable', 'button_position' => 'position_1', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'custom_style_2', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_14';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 240;


$arp_pt_column_settings['hide_caption_colunmn'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1000;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 4;
$arp_pt_column_settings['arp_global_button_type'] = 'flat';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '0';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';

$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#d8e7f0';

$arp_pt_column_settings['arp_column_border_left'] = 1;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;


$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_settings['header_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['header_font_size_global'] = 19;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Francois One';
$arp_pt_column_settings['price_font_size_global'] = 40;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['body_font_size_global'] = 14;
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
$arp_pt_column_settings['button_font_family_global'] = 'Open Sans Bold';
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
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#f15a23";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#f15a23';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#000000';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#000000';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#0058b3';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#0058b3';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#444444';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#444444';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Basic Package';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';
$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>20</span><span class='arp_price_duration' style='font-size:15px;'> monthly </span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = '';


$column['column_0']['header_font_family'] = "Open Sans Bold";
$column['column_0']['header_font_size'] = 19;
$column['column_0']['header_font_color'] = "#000000";
$column['column_0']['header_hover_font_color'] = "#000000";

$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';



$column['column_0']['price_font_family'] = "Francois One";
$column['column_0']['price_font_size'] = 40;
$column['column_0']['price_font_color'] = "#0058B3";
$column['column_0']['price_hover_font_color'] = "#0058B3";

$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Open Sans Bold';
$column['column_0']['price_text_font_size'] = 14;
$column['column_0']['price_text_font_color'] = "#444444";
$column['column_0']['price_text_hover_font_color'] = "#444444";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_0']['column_description_font_size'] = 14;

$column['column_0']['column_description_font_color'] = '#ffffff';
$column['column_0']['column_description_hover_font_color'] = '#ffffff';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = "Open Sans Bold";
$column['column_0']['content_font_size'] = 14;
$column['column_0']['content_font_color'] = "#333333";
$column['column_0']['content_even_font_color'] = "#333333";
$column['column_0']['content_hover_font_color'] = "#333333";
$column['column_0']['content_even_hover_font_color'] = "#333333";

$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['content_label_font_family'] = 'Open Sans';
$column['column_0']['content_label_font_size'] = 14;

$column['column_0']['content_label_font_color'] = '#ffffff';
$column['column_0']['content_label_hover_font_color'] = '#ffffff';
$column['column_0']['body_label_style_bold'] = '';
$column['column_0']['body_label_style_italic'] = '';
$column['column_0']['body_label_style_decoration'] = '';



$column['column_0']['button_background_color'] = '#f15a23';
$column['column_0']['button_hover_background_color'] = '#f15a23';
$column['column_0']['button_font_family'] = "Open Sans Bold";
$column['column_0']['button_font_size'] = 20;
$column['column_0']['button_font_color'] = "#FFFFFF";
$column['column_0']['button_hover_font_color'] = "#FFFFFF";

$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['body_text_alignment'] = 'center';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = '2500 Contacts';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_1']['row_description'] = '8000 Email';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_2']['row_description'] = '20 Specialities';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_3']['row_description'] = '1 Assistance';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_4']['row_description'] = '10GB Bandwidth';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '146';
$column['column_0']['button_height'] = '45';
$column['column_0']['button_type'] = 'button';
$column['column_0']['button_text'] = 'Buy Now';
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
$column['column_0']['footer_level_options_font_color'] = '#333333';
$column['column_0']['footer_level_options_hover_font_color'] = '#333333';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';
$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';

$column['column_1']['package_title'] = 'Standard Package';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';
$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>30</span><span class='arp_price_duration' style='font-size:15px;'> monthly </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';


$column['column_1']['header_font_family'] = "Open Sans Bold";
$column['column_1']['header_font_size'] = 19;
$column['column_1']['header_font_color'] = "#000000";
$column['column_1']['header_hover_font_color'] = "#000000";

$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';



$column['column_1']['price_font_family'] = "Francois One";
$column['column_1']['price_font_size'] = 40;
$column['column_1']['price_font_color'] = "#0058B3";
$column['column_1']['price_hover_font_color'] = "#0058B3";

$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Open Sans Bold';
$column['column_1']['price_text_font_size'] = 14;
$column['column_1']['price_text_font_color'] = "#444444";
$column['column_1']['price_text_hover_font_color'] = "#444444";

$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_1']['column_description_font_size'] = 14;

$column['column_1']['column_description_font_color'] = '#ffffff';
$column['column_1']['column_description_hover_font_color'] = '#ffffff';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = "Open Sans Bold";
$column['column_1']['content_font_size'] = 14;
$column['column_1']['content_font_color'] = "#333333";
$column['column_1']['content_even_font_color'] = "#333333";
$column['column_1']['content_hover_font_color'] = "#333333";
$column['column_1']['content_even_hover_font_color'] = "#333333";

$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['content_label_font_family'] = 'Open Sans';
$column['column_1']['content_label_font_size'] = 16;

$column['column_1']['content_label_font_color'] = '#ffffff';
$column['column_1']['content_label_hover_font_color'] = '#ffffff';
$column['column_1']['body_label_style_bold'] = '';
$column['column_1']['body_label_style_italic'] = '';
$column['column_1']['body_label_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#f15a23';
$column['column_1']['button_hover_background_color'] = '#f15a23';
$column['column_1']['button_font_family'] = "Open Sans Bold";
$column['column_1']['button_font_size'] = 20;
$column['column_1']['button_font_color'] = "#FFFFFF";
$column['column_1']['button_hover_font_color'] = "#FFFFFF";

$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '5000 Contacts';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '10000 Email';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '30 Specialities';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '2 Assistance';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = '20GB Bandwidth';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '146';
$column['column_1']['button_height'] = '45';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Buy Now';
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
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Business Package';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';
$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>50</span><span class='arp_price_duration' style='font-size:15px;'> monthly </span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';


$column['column_2']['header_font_family'] = "Open Sans Bold";
$column['column_2']['header_font_size'] = 19;
$column['column_2']['header_font_color'] = "#000000";
$column['column_2']['header_hover_font_color'] = "#000000";

$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';



$column['column_2']['price_font_family'] = "Francois One";
$column['column_2']['price_font_size'] = 40;
$column['column_2']['price_font_color'] = "#0058B3";
$column['column_2']['price_hover_font_color'] = "#0058B3";

$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Open Sans Bold';
$column['column_2']['price_text_font_size'] = 14;
$column['column_2']['price_text_font_color'] = "#444444";
$column['column_2']['price_text_hover_font_color'] = "#444444";

$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_2']['column_description_font_size'] = 14;

$column['column_2']['column_description_font_color'] = '#ffffff';
$column['column_2']['column_description_hover_font_color'] = '#ffffff';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = "Open Sans Bold";
$column['column_2']['content_font_size'] = 14;
$column['column_2']['content_font_color'] = "#333333";
$column['column_2']['content_even_font_color'] = "#333333";
$column['column_2']['content_hover_font_color'] = "#333333";
$column['column_2']['content_even_hover_font_color'] = "#333333";

$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['content_label_font_family'] = 'Open Sans';
$column['column_2']['content_label_font_size'] = 16;

$column['column_2']['content_label_font_color'] = '#ffffff';
$column['column_2']['content_label_hover_font_color'] = '#ffffff';
$column['column_2']['body_label_style_bold'] = '';
$column['column_2']['body_label_style_italic'] = '';
$column['column_2']['body_label_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#f15a23';
$column['column_2']['button_hover_background_color'] = '#f15a23';
$column['column_2']['button_font_family'] = "Open Sans Bold";
$column['column_2']['button_font_size'] = 20;
$column['column_2']['button_font_color'] = "#FFFFFF";
$column['column_2']['button_hover_font_color'] = "#FFFFFF";

$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '8000 Contacts';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '12000 Email';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';

$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '50 Specialities';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '5 Assistance';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = '50GB Bandwidth';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '146';
$column['column_2']['button_height'] = '45';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Buy Now';
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
$column['column_2']['footer_level_options_font_color'] = '#333333';
$column['column_2']['footer_level_options_hover_font_color'] = '#333333';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Advanced Package';
$column['column_3']['column_description'] = '';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';
$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>90</span><span class='arp_price_duration' style='font-size:15px;'> monthly </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '';


$column['column_3']['header_font_family'] = "Open Sans Bold";
$column['column_3']['header_font_size'] = 19;
$column['column_3']['header_font_color'] = "#000000";
$column['column_3']['header_hover_font_color'] = "#000000";

$column['column_3']['header_style_bold'] = '';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';



$column['column_3']['price_font_family'] = "Francois One";
$column['column_3']['price_font_size'] = 40;
$column['column_3']['price_font_color'] = "#0058B3";
$column['column_3']['price_hover_font_color'] = "#0058B3";

$column['column_3']['price_label_style_bold'] = '';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Open Sans Bold';
$column['column_3']['price_text_font_size'] = 14;
$column['column_3']['price_text_font_color'] = "#444444";
$column['column_3']['price_text_hover_font_color'] = "#444444";

$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_3']['column_description_font_size'] = 14;

$column['column_3']['column_description_font_color'] = '#ffffff';
$column['column_3']['column_description_hover_font_color'] = '#ffffff';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = "Open Sans Bold";
$column['column_3']['content_font_size'] = 14;
$column['column_3']['content_font_color'] = "#333333";
$column['column_3']['content_even_font_color'] = "#333333";
$column['column_3']['content_hover_font_color'] = "#333333";
$column['column_3']['content_even_hover_font_color'] = "#333333";

$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['content_label_font_family'] = 'Open Sans';
$column['column_3']['content_label_font_size'] = 16;

$column['column_3']['content_label_font_color'] = '#ffffff';
$column['column_3']['content_label_hover_font_color'] = '#ffffff';
$column['column_3']['body_label_style_bold'] = '';
$column['column_3']['body_label_style_italic'] = '';
$column['column_3']['body_label_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#f15a23';
$column['column_3']['button_hover_background_color'] = '#f15a23';
$column['column_3']['button_font_family'] = "Open Sans Bold";
$column['column_3']['button_font_size'] = 20;
$column['column_3']['button_font_color'] = "#FFFFFF";
$column['column_3']['button_hover_font_color'] = "#FFFFFF";

$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';


$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = '10000 Contacts';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';

$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = '15000 Email';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';

$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = '100 Specialities';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = '10 Assistance';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = '100GB Bandwidth';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = '146';
$column['column_3']['button_height'] = '45';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Buy Now';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#333333';
$column['column_3']['footer_level_options_hover_font_color'] = '#333333';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);

/**
 * ARPrice Template 15
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 15';
$values['is_template'] = 1;
$values['template_name'] = 15;
$values['status'] = 'published';
$values['is_animated'] = 1;

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

$arp_pt_template_settings['template'] = 'arptemplate_15';
$arp_pt_template_settings['skin'] = 'yellow';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_15';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 240;


$arp_pt_column_settings['hide_caption_colunmn'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1000;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['arp_global_button_type'] = 'flat';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '1';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#ffffff';

$arp_pt_column_settings['arp_column_border_size'] = '0';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#d8e780';

$arp_pt_column_settings['arp_column_border_left'] = 1;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;


$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_settings['header_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['header_font_size_global'] = 22;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['price_font_size_global'] = 46;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['body_font_size_global'] = 14;
$arp_pt_column_settings['arp_body_text_alignment'] = 'left';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = '';
$arp_pt_column_settings['footer_font_size_global'] = '';
$arp_pt_column_settings['arp_footer_text_alignment'] = '';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Open Sans Bold';
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
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = "#f3f4f5";
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#eaa700";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#eaa700';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#f3f4f5';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#eaa700';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#eaa700';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#333333';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#333333';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Basic Package';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';
$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>10</span><span class='arp_price_duration' style='font-size:14px;'> monthly </span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = '';


$column['column_0']['header_font_family'] = "Open Sans Bold";
$column['column_0']['header_font_size'] = 22;
$column['column_0']['header_font_color'] = "#ffffff";
$column['column_0']['header_hover_font_color'] = "#ffffff";

$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_background_color'] = '#f3f4f5';
$column['column_0']['price_hover_background_color'] = '#f3f4f5';
$column['column_0']['price_font_family'] = "Open Sans Bold";
$column['column_0']['price_font_size'] = 46;
$column['column_0']['price_font_color'] = "#EAA700";
$column['column_0']['price_hover_font_color'] = "#EAA700";

$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Open Sans';
$column['column_0']['price_text_font_size'] = 14;
$column['column_0']['price_text_font_color'] = "#333333";
$column['column_0']['price_text_hover_font_color'] = "#333333";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_0']['column_description_font_size'] = 14;

$column['column_0']['column_description_font_color'] = '#ffffff';
$column['column_0']['column_description_hover_font_color'] = '#ffffff';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = "Open Sans Bold";
$column['column_0']['content_font_size'] = 14;
$column['column_0']['content_font_color'] = "#ffffff";
$column['column_0']['content_even_font_color'] = "#ffffff";
$column['column_0']['content_hover_font_color'] = "#ffffff";
$column['column_0']['content_even_hover_font_color'] = "#ffffff";

$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['content_label_font_family'] = 'Open Sans';
$column['column_0']['content_label_font_size'] = 16;

$column['column_0']['content_label_font_color'] = '#ffffff';
$column['column_0']['content_label_hover_font_color'] = '#ffffff';
$column['column_0']['body_label_style_bold'] = '';
$column['column_0']['body_label_style_italic'] = '';
$column['column_0']['body_label_style_decoration'] = '';



$column['column_0']['button_background_color'] = '#eaa700';
$column['column_0']['button_hover_background_color'] = '#eaa700';
$column['column_0']['button_font_family'] = "Open Sans Bold";
$column['column_0']['button_font_size'] = 20;
$column['column_0']['button_font_color'] = "#FFFFFF";
$column['column_0']['button_hover_font_color'] = "#FFFFFF";

$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = '2500 Contacts';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_1']['row_description'] = '8000 Email';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';

$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_2']['row_description'] = '20 Specialities';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_3']['row_description'] = '1 Assistance';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_4']['row_description'] = '10GB Bandwidth';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '116';
$column['column_0']['button_height'] = '45';
$column['column_0']['button_type'] = 'button';
$column['column_0']['button_text'] = 'Sign up';
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

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';

$column['column_1']['package_title'] = 'Standard Package';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';
$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>30</span><span class='arp_price_duration' style='font-size:14px;'> monthly </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';


$column['column_1']['header_font_family'] = "Open Sans Bold";
$column['column_1']['header_font_size'] = 22;
$column['column_1']['header_font_color'] = "#ffffff";
$column['column_1']['header_hover_font_color'] = "#ffffff";

$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_background_color'] = '#f3f4f5';
$column['column_1']['price_hover_background_color'] = '#f3f4f5';
$column['column_1']['price_font_family'] = "Open Sans Bold";
$column['column_1']['price_font_size'] = 46;
$column['column_1']['price_font_color'] = "#EAA700";
$column['column_1']['price_hover_font_color'] = "#EAA700";

$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Open Sans';
$column['column_1']['price_text_font_size'] = 14;
$column['column_1']['price_text_font_color'] = "#333333";
$column['column_1']['price_text_hover_font_color'] = "#333333";

$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_1']['column_description_font_size'] = 14;

$column['column_1']['column_description_font_color'] = '#ffffff';
$column['column_1']['column_description_hover_font_color'] = '#ffffff';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = "Open Sans Bold";
$column['column_1']['content_font_size'] = 14;
$column['column_1']['content_font_color'] = "#ffffff";
$column['column_1']['content_even_font_color'] = "#ffffff";
$column['column_1']['content_hover_font_color'] = "#ffffff";
$column['column_1']['content_even_hover_font_color'] = "#ffffff";

$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['content_label_font_family'] = 'Open Sans';
$column['column_1']['content_label_font_size'] = 16;

$column['column_1']['content_label_font_color'] = '#ffffff';
$column['column_1']['content_label_hover_font_color'] = '#ffffff';
$column['column_1']['body_label_style_bold'] = '';
$column['column_1']['body_label_style_italic'] = '';
$column['column_1']['body_label_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#eaa700';
$column['column_1']['button_hover_background_color'] = '#eaa700';
$column['column_1']['button_font_family'] = "Open Sans Bold";
$column['column_1']['button_font_size'] = 20;
$column['column_1']['button_font_color'] = "#FFFFFF";
$column['column_1']['button_hover_font_color'] = "#FFFFFF";

$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['body_text_alignment'] = 'left';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '5000 Contacts';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '10000 Email';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '30 Specialities';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '2 Assistance';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = '20GB Bandwidth';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '116';
$column['column_1']['button_height'] = '45';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Sign up';
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
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Business Package';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';
$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>50</span><span class='arp_price_duration' style='font-size:14px;'> monthly </span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';


$column['column_2']['header_font_family'] = "Open Sans Bold";
$column['column_2']['header_font_size'] = 22;
$column['column_2']['header_font_color'] = "#ffffff";
$column['column_2']['header_hover_font_color'] = "#ffffff";

$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_background_color'] = '#f3f4f5';
$column['column_2']['price_hover_background_color'] = '#f3f4f5';
$column['column_2']['price_font_family'] = "Open Sans Bold";
$column['column_2']['price_font_size'] = 46;
$column['column_2']['price_font_color'] = "#EAA700";
$column['column_2']['price_hover_font_color'] = "#EAA700";

$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Open Sans';
$column['column_2']['price_text_font_size'] = 14;
$column['column_2']['price_text_font_color'] = "#333333";
$column['column_2']['price_text_hover_font_color'] = "#333333";

$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_2']['column_description_font_size'] = 14;

$column['column_2']['column_description_font_color'] = '#ffffff';
$column['column_2']['column_description_hover_font_color'] = '#ffffff';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = "Open Sans Bold";
$column['column_2']['content_font_size'] = 14;
$column['column_2']['content_font_color'] = "#ffffff";
$column['column_2']['content_even_font_color'] = "#ffffff";
$column['column_2']['content_hover_font_color'] = "#ffffff";
$column['column_2']['content_even_hover_font_color'] = "#ffffff";

$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['content_label_font_family'] = 'Open Sans';
$column['column_2']['content_label_font_size'] = 16;

$column['column_2']['content_label_font_color'] = '#ffffff';
$column['column_2']['content_label_hover_font_color'] = '#ffffff';
$column['column_2']['body_label_style_bold'] = '';
$column['column_2']['body_label_style_italic'] = '';
$column['column_2']['body_label_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#eaa700';
$column['column_2']['button_hover_background_color'] = '#eaa700';
$column['column_2']['button_font_family'] = "Open Sans Bold";
$column['column_2']['button_font_size'] = 20;
$column['column_2']['button_font_color'] = "#FFFFFF";
$column['column_2']['button_hover_font_color'] = "#FFFFFF";

$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['body_text_alignment'] = 'left';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '8000 Contacts';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '12000 Email';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '50 Specialities';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '5 Assistance';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = '50GB Bandwidth';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';

$column['column_2']['button_size'] = '116';
$column['column_2']['button_height'] = '45';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Sign up';
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
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = 'Advanced Package';
$column['column_3']['column_description'] = 'Aliquam euismod erat conentum nisl hendreritvel. Devin euismod erat condimen.';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';
$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>90</span><span class='arp_price_duration' style='font-size:14px;'> monthly </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '';


$column['column_3']['header_font_family'] = "Open Sans Bold";
$column['column_3']['header_font_size'] = 22;
$column['column_3']['header_font_color'] = "#ffffff";
$column['column_3']['header_hover_font_color'] = "#ffffff";

$column['column_3']['header_style_bold'] = '';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';


$column['column_3']['price_background_color'] = '#f3f4f5';
$column['column_3']['price_hover_background_color'] = '#f3f4f5';
$column['column_3']['price_font_family'] = "Open Sans Bold";
$column['column_3']['price_font_size'] = 46;
$column['column_3']['price_font_color'] = "#EAA700";
$column['column_3']['price_hover_font_color'] = "#EAA700";

$column['column_3']['price_label_style_bold'] = '';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Open Sans';
$column['column_3']['price_text_font_size'] = 14;
$column['column_3']['price_text_font_color'] = "#333333";
$column['column_3']['price_text_hover_font_color'] = "#333333";

$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = 'Open Sans Semibold';
$column['column_3']['column_description_font_size'] = 14;

$column['column_3']['column_description_font_color'] = '#ffffff';
$column['column_3']['column_description_hover_font_color'] = '#ffffff';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = "Open Sans Bold";
$column['column_3']['content_font_size'] = 14;
$column['column_3']['content_font_color'] = "#ffffff";
$column['column_3']['content_even_font_color'] = "#ffffff";
$column['column_3']['content_hover_font_color'] = "#ffffff";
$column['column_3']['content_even_hover_font_color'] = "#ffffff";

$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['content_label_font_family'] = 'Open Sans';
$column['column_3']['content_label_font_size'] = 16;

$column['column_3']['content_label_font_color'] = '#ffffff';
$column['column_3']['content_label_hover_font_color'] = '#ffffff';
$column['column_3']['body_label_style_bold'] = '';
$column['column_3']['body_label_style_italic'] = '';
$column['column_3']['body_label_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#eaa700';
$column['column_3']['button_hover_background_color'] = '#eaa700';
$column['column_3']['button_font_family'] = "Open Sans Bold";
$column['column_3']['button_font_size'] = 20;
$column['column_3']['button_font_color'] = "#FFFFFF";
$column['column_3']['button_hover_font_color'] = "#FFFFFF";

$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';


$column['column_3']['body_text_alignment'] = 'left';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = '10000 Contacts';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = '15000 Email';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = '100 Specialities';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = '10 Assistance';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = '100GB Bandwidth';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = '116';
$column['column_3']['button_height'] = '45';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Sign up';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_hover_font_color'] = '#ffffff';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 16
 * 
 * @since 1.0
 */
$values['name'] = 'ARPrice Template 16';
$values['is_template'] = 1;
$values['template_name'] = 16;
$values['status'] = 'published';
$values['is_animated'] = 1;

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

$arp_pt_template_settings['template'] = 'arptemplate_16';
$arp_pt_template_settings['skin'] = 'orange';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_1', 'caption_title' => 'style_1', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_16';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 240;


$arp_pt_column_settings['hide_caption_colunmn'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1000;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 3;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 3;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 3;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 3;
$arp_pt_column_settings['arp_global_button_type'] = 'flat';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '0';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';

$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#d8e4ea';

$arp_pt_column_settings['arp_column_border_left'] = 1;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 1;
$arp_pt_column_settings['arp_column_border_bottom'] = 1;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;


$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';

$arp_pt_column_settings['header_font_family_global'] = 'Amaranth';
$arp_pt_column_settings['header_font_size_global'] = 24;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Fredoka One';
$arp_pt_column_settings['price_font_size_global'] = 42;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['body_font_size_global'] = 16;
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
$arp_pt_column_settings['button_font_family_global'] = 'Amaranth';
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
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#fe7c22";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#B75918';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#0b4a90';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#0b4a90';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#fe7c22';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#fe7c22';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#fe7c22';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#fe7c22';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = '#28292a';
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = '#28292a';
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#3e5d6c';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#3e5d6c';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#3e5d6c';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#3e5d6c';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = "Basic Package <br> <span style='font-size:14px'>Taleni nolui gniferu </span>";
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';
$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>20.00</span><span class='arp_price_duration' style='font-size:16px;'> monthly </span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = '';


$column['column_0']['header_font_family'] = "Amaranth";
$column['column_0']['header_font_size'] = 24;
$column['column_0']['header_font_color'] = "#0B4A90";
$column['column_0']['header_hover_font_color'] = "#0B4A90";

$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';



$column['column_0']['price_font_family'] = "Fredoka One";
$column['column_0']['price_font_size'] = 42;
$column['column_0']['price_font_color'] = "#E9510E";
$column['column_0']['price_hover_font_color'] = "#E9510E";

$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Amaranth';
$column['column_0']['price_text_font_size'] = 16;
$column['column_0']['price_text_font_color'] = "#E9510E";
$column['column_0']['price_text_hover_font_color'] = "#E9510E";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = 'Open Sans';
$column['column_0']['column_description_font_size'] = 14;

$column['column_0']['column_description_font_color'] = '#28292A';
$column['column_0']['column_description_hover_font_color'] = '#28292A';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = "Open Sans Bold";
$column['column_0']['content_font_size'] = 16;
$column['column_0']['content_font_color'] = "#3E5D6C";
$column['column_0']['content_even_font_color'] = "#3E5D6C";
$column['column_0']['content_hover_font_color'] = "#3E5D6C";
$column['column_0']['content_even_hover_font_color'] = "#3E5D6C";

$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['content_label_font_family'] = 'Open Sans';
$column['column_0']['content_label_font_size'] = 16;

$column['column_0']['content_label_font_color'] = '#ffffff';
$column['column_0']['content_label_hover_font_color'] = '#ffffff';
$column['column_0']['body_label_style_bold'] = '';
$column['column_0']['body_label_style_italic'] = '';
$column['column_0']['body_label_style_decoration'] = '';



$column['column_0']['button_background_color'] = "#fe7c22";
$column['column_0']['button_hover_background_color'] = "#b75918";
$column['column_0']['button_font_family'] = "Amaranth";
$column['column_0']['button_font_size'] = 20;
$column['column_0']['button_font_color'] = "#FFFFFF";
$column['column_0']['button_hover_font_color'] = "#FFFFFF";

$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['body_text_alignment'] = 'center';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = '2500 Contacts';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_1']['row_description'] = '8000 Email';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_2']['row_description'] = '20 Specialities';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_3']['row_description'] = '1 Assistance';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_4']['row_description'] = '10GB Bandwidth';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '140';
$column['column_0']['button_height'] = '42';
$column['column_0']['button_type'] = 'button';
$column['column_0']['button_text'] = 'Buy Now';
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
$column['column_0']['footer_level_options_font_color'] = '#3E5D6C';
$column['column_0']['footer_level_options_hover_font_color'] = '#3E5D6C';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';

$column['column_1']['package_title'] = "Standard Package <br> <span style='font-size:14px'>Taleni nolui gniferu </span>";
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';
$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>30.00</span><span class='arp_price_duration' style='font-size:16px;'> monthly </span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';


$column['column_1']['header_font_family'] = "Amaranth";
$column['column_1']['header_font_size'] = 24;
$column['column_1']['header_font_color'] = "#0B4A90";
$column['column_1']['header_hover_font_color'] = "#0B4A90";

$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';



$column['column_1']['price_font_family'] = "Fredoka One";
$column['column_1']['price_font_size'] = 42;
$column['column_1']['price_font_color'] = "#E9510E";
$column['column_1']['price_hover_font_color'] = "#E9510E";

$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Amaranth';
$column['column_1']['price_text_font_size'] = 16;
$column['column_1']['price_text_font_color'] = "#E9510E";
$column['column_1']['price_text_hover_font_color'] = "#E9510E";

$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = 'Open Sans';
$column['column_1']['column_description_font_size'] = 14;

$column['column_1']['column_description_font_color'] = '#28292A';
$column['column_1']['column_description_hover_font_color'] = '#28292A';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = "Open Sans Bold";
$column['column_1']['content_font_size'] = 16;
$column['column_1']['content_font_color'] = "#3E5D6C";
$column['column_1']['content_even_font_color'] = "#3E5D6C";
$column['column_1']['content_hover_font_color'] = "#3E5D6C";
$column['column_1']['content_even_hover_font_color'] = "#3E5D6C";

$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['content_label_font_family'] = 'Open Sans';
$column['column_1']['content_label_font_size'] = 16;

$column['column_1']['content_label_font_color'] = '#ffffff';
$column['column_1']['content_label_hover_font_color'] = '#ffffff';
$column['column_1']['body_label_style_bold'] = '';
$column['column_1']['body_label_style_italic'] = '';
$column['column_1']['body_label_style_decoration'] = '';



$column['column_1']['button_background_color'] = "#fe7c22";
$column['column_1']['button_hover_background_color'] = "#b75918";
$column['column_1']['button_font_family'] = "Amaranth";
$column['column_1']['button_font_size'] = 20;
$column['column_1']['button_font_color'] = "#FFFFFF";
$column['column_1']['button_hover_font_color'] = "#FFFFFF";

$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '5000 Contacts';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '10000 Email';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';

$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '30 Specialities';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';

$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '2 Assistance';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = '20GB Bandwidth';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '140';
$column['column_1']['button_height'] = '42';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Buy Now';
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
$column['column_1']['footer_level_options_font_color'] = '#3E5D6C';
$column['column_1']['footer_level_options_hover_font_color'] = '#3E5D6C';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = "Business Package <br> <span style='font-size:14px'>Taleni nolui gniferu </span>";
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';
$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>50.00</span><span class='arp_price_duration' style='font-size:16px;'> monthly </span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';


$column['column_2']['header_font_family'] = "Amaranth";
$column['column_2']['header_font_size'] = 24;
$column['column_2']['header_font_color'] = "#0B4A90";
$column['column_2']['header_hover_font_color'] = "#0B4A90";

$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';



$column['column_2']['price_font_family'] = "Fredoka One";
$column['column_2']['price_font_size'] = 42;
$column['column_2']['price_font_color'] = "#E9510E";
$column['column_2']['price_hover_font_color'] = "#E9510E";

$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Amaranth';
$column['column_2']['price_text_font_size'] = 16;
$column['column_2']['price_text_font_color'] = "#E9510E";
$column['column_2']['price_text_hover_font_color'] = "#E9510E";

$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = 'Open Sans';
$column['column_2']['column_description_font_size'] = 14;

$column['column_2']['column_description_font_color'] = '#28292A';
$column['column_2']['column_description_hover_font_color'] = '#28292A';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = "Open Sans Bold";
$column['column_2']['content_font_size'] = 16;
$column['column_2']['content_font_color'] = "#3E5D6C";
$column['column_2']['content_even_font_color'] = "#3E5D6C";
$column['column_2']['content_hover_font_color'] = "#3E5D6C";
$column['column_2']['content_even_hover_font_color'] = "#3E5D6C";

$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['content_label_font_family'] = 'Open Sans';
$column['column_2']['content_label_font_size'] = 16;

$column['column_2']['content_label_font_color'] = '#ffffff';
$column['column_2']['content_label_hover_font_color'] = '#ffffff';
$column['column_2']['body_label_style_bold'] = '';
$column['column_2']['body_label_style_italic'] = '';
$column['column_2']['body_label_style_decoration'] = '';



$column['column_2']['button_background_color'] = "#fe7c22";
$column['column_2']['button_hover_background_color'] = "#b75918";
$column['column_2']['button_font_family'] = "Amaranth";
$column['column_2']['button_font_size'] = 20;
$column['column_2']['button_font_color'] = "#FFFFFF";
$column['column_2']['button_hover_font_color'] = "#FFFFFF";

$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '8000 Contacts';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '12000 Email';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '50 Specialities';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '5 Assistance';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = '50GB Bandwidth';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '140';
$column['column_2']['button_height'] = '42';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Buy Now';
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
$column['column_2']['footer_level_options_font_color'] = '#3E5D6C';
$column['column_2']['footer_level_options_hover_font_color'] = '#3E5D6C';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$column['column_3']['package_title'] = "Advanced Package <br> <span style='font-size:14px'>Taleni nolui gniferu </span>";

$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';
$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>90.00</span><span class='arp_price_duration' style='font-size:16px;'> monthly </span>";
$column['column_3']['price_label'] = "";
$column['column_3']['arp_header_shortcode'] = '';


$column['column_3']['header_font_family'] = "Amaranth";
$column['column_3']['header_font_size'] = 24;
$column['column_3']['header_font_color'] = "#0B4A90";
$column['column_3']['header_hover_font_color'] = "#0B4A90";

$column['column_3']['header_style_bold'] = '';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';



$column['column_3']['price_font_family'] = "Fredoka One";
$column['column_3']['price_font_size'] = 42;
$column['column_3']['price_font_color'] = "#E9510E";
$column['column_3']['price_hover_font_color'] = "#E9510E";

$column['column_3']['price_label_style_bold'] = '';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';

$column['column_3']['price_text_font_family'] = 'Amaranth';
$column['column_3']['price_text_font_size'] = 16;
$column['column_3']['price_text_font_color'] = "#E9510E";
$column['column_3']['price_text_hover_font_color'] = "#E9510E";

$column['column_3']['price_text_style_bold'] = '';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = 'Open Sans';
$column['column_3']['column_description_font_size'] = 14;

$column['column_3']['column_description_font_color'] = '#28292A';
$column['column_3']['column_description_hover_font_color'] = '#28292A';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = "Open Sans Bold";
$column['column_3']['content_font_size'] = 16;
$column['column_3']['content_font_color'] = "#3E5D6C";
$column['column_3']['content_even_font_color'] = "#3E5D6C";
$column['column_3']['content_hover_font_color'] = "#3E5D6C";
$column['column_3']['content_even_hover_font_color'] = "#3E5D6C";

$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['content_label_font_family'] = 'Open Sans';
$column['column_3']['content_label_font_size'] = 16;

$column['column_3']['content_label_font_color'] = '#ffffff';
$column['column_3']['content_label_hover_font_color'] = '#ffffff';
$column['column_3']['body_label_style_bold'] = '';
$column['column_3']['body_label_style_italic'] = '';
$column['column_3']['body_label_style_decoration'] = '';



$column['column_3']['button_background_color'] = "#fe7c22";
$column['column_3']['button_hover_background_color'] = "#b75918";
$column['column_3']['button_font_family'] = "Amaranth";
$column['column_3']['button_font_size'] = 20;
$column['column_3']['button_font_color'] = "#FFFFFF";
$column['column_3']['button_hover_font_color'] = "#FFFFFF";

$column['column_3']['button_style_bold'] = '';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';


$column['column_3']['body_text_alignment'] = 'center';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_0']['row_description'] = '10000 Contacts';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_1']['row_description'] = '15000 Email';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_2']['row_description'] = '100 Specialities';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_3']['row_description'] = '10 Assistance';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_3']['rows']['row_4']['row_description'] = '100GB Bandwidth';
$column['column_3']['rows']['row_4']['row_label'] = '';
$column['column_3']['rows']['row_4']['row_tooltip'] = '';
$column['column_3']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_3']['button_size'] = '140';
$column['column_3']['button_height'] = '42';
$column['column_3']['button_type'] = 'Button';
$column['column_3']['button_text'] = 'Buy Now';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#3E5D6C';
$column['column_3']['footer_level_options_hover_font_color'] = '#3E5D6C';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);

/**
 * ARPrice Template 17
 * 
 * @since 1.2
 */
$values['name'] = 'ARPrice Template 17';
$values['is_template'] = 1;
$values['template_name'] = 17;
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

$arp_pt_template_settings['template'] = 'arptemplate_20';
$arp_pt_template_settings['skin'] = 'blue';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_20';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 280;


$arp_pt_column_settings['hide_caption_colunmn'] = 0;
$arp_pt_column_settings['column_opacity'] = 0.80;
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 870;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['arp_global_button_type'] = 'none';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

$arp_pt_column_settings['arp_row_border_size'] = '3';
$arp_pt_column_settings['arp_row_border_type'] = 'dotted';
$arp_pt_column_settings['arp_row_border_color'] = '#909090';

$arp_pt_column_settings['arp_column_border_size'] = '1';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#efefef';

$arp_pt_column_settings['arp_column_border_left'] = 1;
$arp_pt_column_settings['arp_column_border_right'] = 1;
$arp_pt_column_settings['arp_column_border_top'] = 0;
$arp_pt_column_settings['arp_column_border_bottom'] = 0;


$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;



$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';

$arp_pt_column_settings['header_font_family_global'] = 'Lato';
$arp_pt_column_settings['header_font_size_global'] = 36;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Lato';
$arp_pt_column_settings['price_font_size_global'] = 36;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['body_font_size_global'] = 17;
$arp_pt_column_settings['arp_body_text_alignment'] = 'left';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = '';
$arp_pt_column_settings['footer_font_size_global'] = '';
$arp_pt_column_settings['arp_footer_text_alignment'] = '';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Lato';
$arp_pt_column_settings['button_font_size_global'] = 22;
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
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = "#00baff";
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#00baff";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = '#00baff';
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#00baff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#00baff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = '#00baff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#1d1d1d';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#1d1d1d';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#00baff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Starter';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['column_align'] = 'left';
$column['column_0']['column_background_color'] = "#ffffff";
$column['column_0']['column_hover_background_color'] = '#00baff';

$column['column_0']['header_background_color'] = '#00baff';
$column['column_0']['header_hover_background_color'] = '#ffffff';
$column['column_0']['header_font_family'] = 'Lato';
$column['column_0']['header_font_size'] = 36;
$column['column_0']['header_font_color'] = '#ffffff';
$column['column_0']['header_hover_font_color'] = '#00baff';
$column['column_0']['header_style_bold'] = 'bold';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_background_color'] = '';
$column['column_0']['price_hover_background_color'] = '';
$column['column_0']['price_font_family'] = 'Lato';
$column['column_0']['price_font_size'] = 36;

$column['column_0']['price_font_color'] = '#00baff';
$column['column_0']['price_hover_font_color'] = '#ffffff';
$column['column_0']['price_label_style_bold'] = 'bold';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';



$column['column_0']['price_text_font_family'] = 'Lato';
$column['column_0']['price_text_font_size'] = 24;

$column['column_0']['price_text_font_color'] = '#00baff';
$column['column_0']['price_text_hover_font_color'] = '#ffffff';
$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = '';
$column['column_0']['column_description_font_size'] = '';

$column['column_0']['column_description_font_color'] = '';
$column['column_0']['column_description_hover_font_color'] = '';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = 'Open Sans';
$column['column_0']['content_font_size'] = 17;
$column['column_0']['content_font_color'] = '#1d1d1d';
$column['column_0']['content_even_font_color'] = '#1d1d1d';
$column['column_0']['content_hover_font_color'] = '#ffffff';
$column['column_0']['content_even_hover_font_color'] = '#ffffff';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';


$column['column_0']['button_font_family'] = 'Lato';
$column['column_0']['button_font_size'] = 22;
$column['column_0']['button_font_color'] = '#ffffff';
$column['column_0']['button_hover_font_color'] = '#00baff';
$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';

$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>19.00</span><span class='arp_price_duration' style='font-size:24px;font-weight:normal;'> / month</span>";
$column['column_0']['price_label'] = "";
$column['column_0']['arp_header_shortcode'] = '';
$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_0']['row_description'] = '<i class="fas fa-inbox arpsize-ico-24"></i> 10GB Storage Space';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_1']['row_description'] = "<i class='fas fa-server arpsize-ico-24'></i> 10GB Bandwidth";
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_2']['row_description'] = '<i class="fas fa-globe arpsize-ico-24"></i> 25 Free Sub-domains';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_3']['row_description'] = '<i class="arpfar arpfa-envelope arpsize-ico-24"></i> 100 E-mails Accounts';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_4']['row_description'] = '<i class="arpfar arpfa-file arpsize-ico-24"></i> No Shared 128bit SSL';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';

$column['column_0']['button_size'] = 'Medium';
$column['column_0']['button_height'] = 'Medium';
$column['column_0']['button_type'] = 'button';
$column['column_0']['button_text'] = "Subscribe Now <i class='fas fa-angle-right arpsize-ico-24'></i>";
$column['column_0']['button_url'] = '#';
$column['column_0']['button_s_size'] = '';
$column['column_0']['button_s_type'] = '';
$column['column_0']['button_s_text'] = '';
$column['column_0']['button_s_url'] = '';
$column['column_0']['s_is_new_window'] = '';
$column['column_0']['is_new_window'] = 0;
$column['column_0']['button_background_color'] = '#00baff';
$column['column_0']['button_hover_background_color'] = '#ffffff';



$column['column_0']['footer_content'] = '';
$column['column_0']['footer_content_position'] = 0;
$column['column_0']['footer_level_options_font_family'] = 'Lato';
$column['column_0']['footer_level_options_font_size'] = 12;
$column['column_0']['footer_level_options_font_color'] = '#FFFFFF';
$column['column_0']['footer_level_options_hover_font_color'] = '#FFFFFF';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=1;';

$column['column_1']['package_title'] = 'Small Office';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['column_align'] = 'left';
$column['column_1']['column_background_color'] = "#ffffff";
$column['column_1']['column_hover_background_color'] = "#00baff";
$column['column_1']['header_background_color'] = '#00baff';
$column['column_1']['header_hover_background_color'] = '#ffffff';
$column['column_1']['header_font_family'] = 'Lato';
$column['column_1']['header_font_size'] = 36;
$column['column_1']['header_font_color'] = '#ffffff';
$column['column_1']['header_hover_font_color'] = '#00baff';
$column['column_1']['header_style_bold'] = 'bold';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_background_color'] = '';
$column['column_1']['price_hover_background_color'] = '';
$column['column_1']['price_font_family'] = 'Lato';
$column['column_1']['price_font_size'] = 36;

$column['column_1']['price_font_color'] = '#00baff';
$column['column_1']['price_hover_font_color'] = '#ffffff';
$column['column_1']['price_label_style_bold'] = 'bold';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';



$column['column_1']['price_text_font_family'] = 'Lato';
$column['column_1']['price_text_font_size'] = 24;

$column['column_1']['price_text_font_color'] = '#00baff';
$column['column_1']['price_text_hover_font_color'] = '#ffffff';
$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = '';
$column['column_1']['column_description_font_size'] = '';

$column['column_1']['column_description_font_color'] = '';
$column['column_1']['column_description_hover_font_color'] = '';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = 'Open Sans';
$column['column_1']['content_font_size'] = 17;
$column['column_1']['content_font_color'] = '#1d1d1d';
$column['column_1']['content_even_font_color'] = '#1d1d1d';
$column['column_1']['content_hover_font_color'] = '#ffffff';
$column['column_1']['content_even_hover_font_color'] = '#ffffff';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#00baff';
$column['column_1']['button_hover_background_color'] = '#ffffff';
$column['column_1']['button_font_family'] = 'Lato';
$column['column_1']['button_font_size'] = 22;
$column['column_1']['button_font_color'] = '#ffffff';
$column['column_1']['button_hover_font_color'] = '#00baff';
$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';



$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';

$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>29.00</span><span class='arp_price_duration' style='font-size:24px;font-weight:normal;'> / month</span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'left';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_0']['row_description'] = '<i class="fas fa-inbox arpsize-ico-24"></i> 50GB Storage Space';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_1']['row_description'] = "<i class='fas fa-server arpsize-ico-24'></i> 20GB Bandwidth";
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_2']['row_description'] = '<i class="fas fa-globe arpsize-ico-24"></i> 50 Free Sub-domains';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_3']['row_description'] = '<i class="arpfar arpfa-envelope arpsize-ico-24"></i> 200 E-mails Accounts';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_4']['row_description'] = '<i class="arpfar arpfa-file arpsize-ico-24"></i> No Shared 128bit SSL';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';

$column['column_1']['button_size'] = 'Medium';
$column['column_1']['button_height'] = 'Medium';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = "Subscribe Now <i class='fas fa-angle-right arpsize-ico-24'></i>";
$column['column_1']['button_url'] = '#';
$column['column_1']['button_s_size'] = '';
$column['column_1']['button_s_type'] = '';
$column['column_1']['button_s_text'] = '';
$column['column_1']['button_s_url'] = '';
$column['column_1']['s_is_new_window'] = '';
$column['column_1']['is_new_window'] = 0;


$column['column_1']['footer_content'] = '';
$column['column_1']['footer_content_position'] = 0;
$column['column_1']['footer_level_options_font_family'] = 'Lato';
$column['column_1']['footer_level_options_font_size'] = 12;
$column['column_1']['footer_level_options_font_color'] = '#FFFFFF';
$column['column_1']['footer_level_options_hover_font_color'] = '#FFFFFF';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';

$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=2;';

$column['column_2']['package_title'] = 'Business';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['column_align'] = 'left';
$column['column_2']['column_background_color'] = "#ffffff";
$column['column_2']['column_hover_background_color'] = "#00baff";
$column['column_2']['header_background_color'] = '#00baff';
$column['column_2']['header_hover_background_color'] = '#ffffff';
$column['column_2']['header_font_family'] = 'Lato';
$column['column_2']['header_font_size'] = 36;
$column['column_2']['header_font_color'] = '#ffffff';
$column['column_2']['header_hover_font_color'] = '#00baff';
$column['column_2']['header_style_bold'] = 'bold';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';

$column['column_2']['price_background_color'] = '';
$column['column_2']['price_hover_background_color'] = '';
$column['column_2']['price_font_family'] = 'Lato';
$column['column_2']['price_font_size'] = 36;

$column['column_2']['price_font_color'] = '#00baff';
$column['column_2']['price_hover_font_color'] = '#ffffff';
$column['column_2']['price_label_style_bold'] = 'bold';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';



$column['column_2']['price_text_font_family'] = 'Lato';
$column['column_2']['price_text_font_size'] = 24;

$column['column_2']['price_text_font_color'] = '#00baff';
$column['column_2']['price_text_hover_font_color'] = '#ffffff';
$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = '';
$column['column_2']['column_description_font_size'] = '';

$column['column_2']['column_description_font_color'] = '';
$column['column_2']['column_description_hover_font_color'] = '';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = 'Open Sans';
$column['column_2']['content_font_size'] = 17;
$column['column_2']['content_font_color'] = '#1d1d1d';
$column['column_2']['content_even_font_color'] = '#1d1d1d';
$column['column_2']['content_hover_font_color'] = '#ffffff';
$column['column_2']['content_even_hover_font_color'] = '#ffffff';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#00baff';
$column['column_2']['button_hover_background_color'] = '#ffffff';
$column['column_2']['button_font_family'] = 'Lato';
$column['column_2']['button_font_size'] = 22;
$column['column_2']['button_font_color'] = '#ffffff';
$column['column_2']['button_hover_font_color'] = '#00baff';
$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';

$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>39.00</span><span class='arp_price_duration' style='font-size:24px;font-weight:normal;'> / month</span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'left';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_0']['row_description'] = '<i class="fas fa-inbox arpsize-ico-24"></i> 80GB Storage Space';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_1']['row_description'] = "<i class='fas fa-server arpsize-ico-24'></i> 30GB Bandwidth";
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_2']['row_description'] = '<i class="fas fa-globe arpsize-ico-24"></i> 80 Free Sub-domains';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_3']['row_description'] = '<i class="arpfar arpfa-envelope arpsize-ico-24"></i> 300 E-mails Accounts';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_4']['row_description'] = '<i class="arpfar arpfa-file arpsize-ico-24"></i> No Shared 128bit SSL';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = 'Medium';
$column['column_2']['button_height'] = 'Medium';
$column['column_2']['button_type'] = 'button';
$column['column_2']['button_text'] = "Subscribe Now <i class='fas fa-angle-right arpsize-ico-24'></i>";
$column['column_2']['button_url'] = '#';
$column['column_2']['button_s_size'] = '';
$column['column_2']['button_s_type'] = '';
$column['column_2']['button_s_text'] = '';
$column['column_2']['button_s_url'] = '';
$column['column_2']['s_is_new_window'] = '';
$column['column_2']['is_new_window'] = 0;


$column['column_2']['footer_content'] = '';
$column['column_2']['footer_content_position'] = 0;
$column['column_2']['footer_level_options_font_family'] = 'Lato';
$column['column_2']['footer_level_options_font_size'] = 12;
$column['column_2']['footer_level_options_font_color'] = '#FFFFFF';
$column['column_2']['footer_level_options_hover_font_color'] = '#FFFFFF';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';

$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=3;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);

/**
 * ARPrice Template 18
 * 
 * @since 2.0
 */
$values['name'] = 'ARPrice Template 18';
$values['is_template'] = 1;
$values['template_name'] = 18;
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

$arp_pt_template_settings['template'] = 'arptemplate_21';
$arp_pt_template_settings['skin'] = 'pink';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2","main_column_3"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_21';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 245;


$arp_pt_column_settings['hide_caption_colunmn'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 1024;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 0;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 0;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 10;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 10;
$arp_pt_column_settings['arp_global_button_type'] = 'none';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;



$arp_pt_column_settings['arp_row_border_size'] = '0';
$arp_pt_column_settings['arp_row_border_type'] = 'solid';
$arp_pt_column_settings['arp_row_border_color'] = '#c9c9c9';

$arp_pt_column_settings['arp_column_border_size'] = '0';
$arp_pt_column_settings['arp_column_border_type'] = 'solid';
$arp_pt_column_settings['arp_column_border_color'] = '#c9c9c9';

$arp_pt_column_settings['arp_column_border_left'] = 0;
$arp_pt_column_settings['arp_column_border_right'] = 0;
$arp_pt_column_settings['arp_column_border_top'] = 0;
$arp_pt_column_settings['arp_column_border_bottom'] = 0;



$arp_pt_column_settings['display_col_mobile'] = 1;
$arp_pt_column_settings['display_col_tablet'] = 3;



$arp_pt_column_settings['column_box_shadow_effect'] = 'shadow_style_none';
$arp_pt_column_settings['hide_blank_rows'] = 'no';
$arp_pt_column_settings['header_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['header_font_size_global'] = 36;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['price_font_size_global'] = 36;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['body_font_size_global'] = 18;
$arp_pt_column_settings['arp_body_text_alignment'] = 'left';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = '';
$arp_pt_column_settings['footer_font_size_global'] = '';
$arp_pt_column_settings['arp_footer_text_alignment'] = '';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['button_font_size_global'] = 17;
$arp_pt_column_settings['arp_button_text_alignment'] = 'center';
$arp_pt_column_settings['arp_button_text_bold_global'] = 'bold';
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
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = "#d81a60";
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#D81A60';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#D81A60';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#393939';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#393939';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#010509';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Bronze';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['column_align'] = 'left';
$column['column_0']['column_background_color'] = "#d81a60";
$column['column_0']['column_hover_background_color'] = "#ffffff";

$column['column_0']['header_background_color'] = '';
$column['column_0']['header_hover_background_color'] = '';
$column['column_0']['header_font_family'] = 'Open Sans';
$column['column_0']['header_font_size'] = 36;
$column['column_0']['header_font_color'] = '#ffffff';
$column['column_0']['header_hover_font_color'] = '#ffffff';
$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_background_color'] = '';
$column['column_0']['price_hover_background_color'] = '';
$column['column_0']['price_font_family'] = 'Open Sans';
$column['column_0']['price_font_size'] = 36;
$column['column_0']['price_font_color'] = '#ffffff';
$column['column_0']['price_hover_font_color'] = '#d81a60';
$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';



$column['column_0']['price_text_font_family'] = 'Open Sans';
$column['column_0']['price_text_font_size'] = 36;
$column['column_0']['price_text_font_color'] = '#ffffff';
$column['column_0']['price_text_hover_font_color'] = '#d81a60';
$column['column_0']['price_text_style_bold'] = 'bold';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = '';
$column['column_0']['column_description_font_size'] = '';
$column['column_0']['column_description_font_color'] = '';
$column['column_0']['column_description_hover_font_color'] = '';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = 'Open Sans';
$column['column_0']['content_font_size'] = 18;
$column['column_0']['content_font_color'] = '#ffffff';
$column['column_0']['content_even_font_color'] = '#ffffff';
$column['column_0']['content_hover_font_color'] = '#393939';
$column['column_0']['content_even_hover_font_color'] = '#393939';
$column['column_0']['content_odd_color'] = '';
$column['column_0']['content_odd_hover_color'] = '';
$column['column_0']['content_even_color'] = '';
$column['column_0']['content_even_hover_color'] = '';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['button_background_color'] = '#ffffff';
$column['column_0']['button_hover_background_color'] = '#d81a60';
$column['column_0']['button_font_family'] = 'Open Sans';
$column['column_0']['button_font_size'] = 17;
$column['column_0']['button_font_color'] = '#010509';
$column['column_0']['button_hover_font_color'] = '#FFFFFF';
$column['column_0']['button_style_bold'] = 'Bold';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';
$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>20</span><span class='arp_price_duration'> / month</span>";
$column['column_0']['price_label'] = '';
$column['column_0']['arp_header_shortcode'] = '';
$column['column_0']['body_text_alignment'] = 'left';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_0']['row_description'] = '<i class="fas fa-inbox arpsize-ico-24"></i> 10GB Space';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_1']['row_description'] = '<i class="fas fa-server arpsize-ico-24"></i> 15 Databases';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_2']['row_description'] = '<i class="fas fa-globe arpsize-ico-24"></i> 25 Free Domains';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_0']['rows']['row_3']['row_description'] = '<i class="arpfar arpfa-envelope arpsize-ico-24"></i> 100 Email Accounts';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_0']['button_size'] = 'Medium';
$column['column_0']['button_height'] = 'Medium';
$column['column_0']['button_type'] = 'button';
$column['column_0']['button_text'] = 'Subscribe Now';
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
$column['column_0']['footer_level_options_font_color'] = '#364762';
$column['column_0']['footer_level_options_hover_font_color'] = '#364762';
$column['column_0']['footer_level_options_font_style_bold'] = '';
$column['column_0']['footer_level_options_font_style_italic'] = '';
$column['column_0']['footer_level_options_font_style_decoration'] = '';
$column['column_0']['footer_background_color'] = '';
$column['column_0']['footer_hover_background_color'] = '';

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=1;';

$column['column_1']['package_title'] = 'Silver';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['column_align'] = 'left';
$column['column_1']['column_background_color'] = "#d81a60";
$column['column_1']['column_hover_background_color'] = "#ffffff";

$column['column_1']['header_background_color'] = '';
$column['column_1']['header_hover_background_color'] = '';
$column['column_1']['header_font_family'] = 'Open Sans';
$column['column_1']['header_font_size'] = 36;
$column['column_1']['header_font_color'] = '#ffffff';
$column['column_1']['header_hover_font_color'] = '#ffffff';
$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_background_color'] = '';
$column['column_1']['price_hover_background_color'] = '';
$column['column_1']['price_font_family'] = 'Open Sans';
$column['column_1']['price_font_size'] = 36;
$column['column_1']['price_font_color'] = '#ffffff';
$column['column_1']['price_hover_font_color'] = '#d81a60';
$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';



$column['column_1']['price_text_font_family'] = 'Open Sans';
$column['column_1']['price_text_font_size'] = 36;
$column['column_1']['price_text_font_color'] = '#ffffff';
$column['column_1']['price_text_hover_font_color'] = '#d81a60';
$column['column_1']['price_text_style_bold'] = 'bold';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';



$column['column_1']['column_description_font_family'] = '';
$column['column_1']['column_description_font_size'] = '';
$column['column_1']['column_description_font_color'] = '';
$column['column_1']['column_description_hover_font_color'] = '';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = 'Open Sans';
$column['column_1']['content_font_size'] = 18;
$column['column_1']['content_font_color'] = '#ffffff';
$column['column_1']['content_even_font_color'] = '#ffffff';
$column['column_1']['content_hover_font_color'] = '#393939';
$column['column_1']['content_even_hover_font_color'] = '#393939';
$column['column_1']['content_odd_color'] = '';
$column['column_1']['content_odd_hover_color'] = '';
$column['column_1']['content_even_color'] = '';
$column['column_1']['content_even_hover_color'] = '';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#ffffff';
$column['column_1']['button_hover_background_color'] = '#d81a60';
$column['column_1']['button_font_family'] = 'Open Sans';
$column['column_1']['button_font_size'] = 17;
$column['column_1']['button_font_color'] = '#010509';
$column['column_1']['button_hover_font_color'] = '#FFFFFF';
$column['column_1']['button_style_bold'] = 'Bold';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';
$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>50</span><span class='arp_price_duration'> / month</span>";
$column['column_1']['price_label'] = '';
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'left';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_0']['row_description'] = '<i class="fas fa-inbox arpsize-ico-24"></i> 50GB Space';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_1']['row_description'] = '<i class="fas fa-server arpsize-ico-24"></i> 30 Databases';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';

$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_2']['row_description'] = '<i class="fas fa-globe arpsize-ico-24"></i> 50 Free Domains';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_1']['rows']['row_3']['row_description'] = '<i class="arpfar arpfa-envelope arpsize-ico-24"></i> 180 Email Accounts';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_1']['button_size'] = 'Medium';
$column['column_1']['button_height'] = 'Medium';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Subscribe Now';
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
$column['column_1']['footer_level_options_font_color'] = '#364762';
$column['column_1']['footer_level_options_hover_font_color'] = '#364762';
$column['column_1']['footer_level_options_font_style_bold'] = '';
$column['column_1']['footer_level_options_font_style_italic'] = '';
$column['column_1']['footer_level_options_font_style_decoration'] = '';
$column['column_1']['footer_background_color'] = '';
$column['column_1']['footer_hover_background_color'] = '';

$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=2;';

$column['column_2']['package_title'] = 'Gold';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['column_align'] = 'left';
$column['column_2']['column_background_color'] = "#d81a60";
$column['column_2']['column_hover_background_color'] = "#ffffff";

$column['column_2']['header_background_color'] = '';
$column['column_2']['header_hover_background_color'] = '';
$column['column_2']['header_font_family'] = 'Open Sans';
$column['column_2']['header_font_size'] = 36;
$column['column_2']['header_font_color'] = '#ffffff';
$column['column_2']['header_hover_font_color'] = '#ffffff';
$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_background_color'] = '';
$column['column_2']['price_hover_background_color'] = '';
$column['column_2']['price_font_family'] = 'Open Sans';
$column['column_2']['price_font_size'] = 36;
$column['column_2']['price_font_color'] = '#ffffff';
$column['column_2']['price_hover_font_color'] = '#d81a60';
$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';



$column['column_2']['price_text_font_family'] = 'Open Sans';
$column['column_2']['price_text_font_size'] = 36;
$column['column_2']['price_text_font_color'] = '#ffffff';
$column['column_2']['price_text_hover_font_color'] = '#d81a60';
$column['column_2']['price_text_style_bold'] = 'bold';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = '';
$column['column_2']['column_description_font_size'] = '';
$column['column_2']['column_description_font_color'] = '';
$column['column_2']['column_description_hover_font_color'] = '';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = 'Open Sans';
$column['column_2']['content_font_size'] = 18;
$column['column_2']['content_font_color'] = '#ffffff';
$column['column_2']['content_even_font_color'] = '#ffffff';
$column['column_2']['content_hover_font_color'] = '#393939';
$column['column_2']['content_even_hover_font_color'] = '#393939';
$column['column_2']['content_odd_color'] = '';
$column['column_2']['content_odd_hover_color'] = '';
$column['column_2']['content_even_color'] = '';
$column['column_2']['content_even_hover_color'] = '';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#ffffff';
$column['column_2']['button_hover_background_color'] = '#d81a60';
$column['column_2']['button_font_family'] = 'Open Sans';
$column['column_2']['button_font_size'] = 17;
$column['column_2']['button_font_color'] = '#010509';
$column['column_2']['button_hover_font_color'] = '#FFFFFF';
$column['column_2']['button_style_bold'] = 'Bold';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';
$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>80</span><span class='arp_price_duration'> / month</span>";
$column['column_2']['price_label'] = '';
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'left';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_0']['row_description'] = '<i class="fas fa-inbox arpsize-ico-24"></i> 100GB Space';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_1']['row_description'] = '<i class="fas fa-server arpsize-ico-24"></i> 50 Databases';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';

$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_2']['row_description'] = '<i class="fas fa-globe arpsize-ico-24"></i> 100 Free Domains';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_2']['rows']['row_3']['row_description'] = '<i class="arpfar arpfa-envelope arpsize-ico-24"></i> 250 Email Accounts';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_2']['button_size'] = 'Medium';
$column['column_2']['button_height'] = 'Medium';
$column['column_2']['button_type'] = 'button';
$column['column_2']['button_text'] = 'Subscribe Now';
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
$column['column_2']['footer_level_options_font_color'] = '#364762';
$column['column_2']['footer_level_options_hover_font_color'] = '#364762';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';
$column['column_2']['footer_background_color'] = '';
$column['column_2']['footer_hover_background_color'] = '';

$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=3;';

$column['column_3']['package_title'] = 'Platinum';
$column['column_3']['column_description'] = '';
$column['column_3']['custom_ribbon_txt'] = '';
$column['column_3']['column_width'] = '';
$column['column_3']['column_align'] = 'left';
$column['column_3']['column_background_color'] = "#d81a60";
$column['column_3']['column_hover_background_color'] = "#ffffff";

$column['column_3']['header_background_color'] = '';
$column['column_3']['header_hover_background_color'] = '';
$column['column_3']['header_font_family'] = 'Open Sans';
$column['column_3']['header_font_size'] = 36;
$column['column_3']['header_font_color'] = '#ffffff';
$column['column_3']['header_hover_font_color'] = '#ffffff';
$column['column_3']['header_style_bold'] = '';
$column['column_3']['header_style_italic'] = '';
$column['column_3']['header_style_decoration'] = '';


$column['column_3']['price_background_color'] = '';
$column['column_3']['price_hover_background_color'] = '';
$column['column_3']['price_font_family'] = 'Open Sans';
$column['column_3']['price_font_size'] = 36;
$column['column_3']['price_font_color'] = '#ffffff';
$column['column_3']['price_hover_font_color'] = '#d81a60';
$column['column_3']['price_label_style_bold'] = '';
$column['column_3']['price_label_style_italic'] = '';
$column['column_3']['price_label_style_decoration'] = '';



$column['column_3']['price_text_font_family'] = 'Open Sans';
$column['column_3']['price_text_font_size'] = 36;
$column['column_3']['price_text_font_color'] = '#ffffff';
$column['column_3']['price_text_hover_font_color'] = '#d81a60';
$column['column_3']['price_text_style_bold'] = 'bold';
$column['column_3']['price_text_style_italic'] = '';
$column['column_3']['price_text_style_decoration'] = '';



$column['column_3']['column_description_font_family'] = '';
$column['column_3']['column_description_font_size'] = '';
$column['column_3']['column_description_font_color'] = '';
$column['column_3']['column_description_hover_font_color'] = '';
$column['column_3']['column_description_style_bold'] = '';
$column['column_3']['column_description_style_italic'] = '';
$column['column_3']['column_description_style_decoration'] = '';



$column['column_3']['content_font_family'] = 'Open Sans';
$column['column_3']['content_font_size'] = 18;
$column['column_3']['content_font_color'] = '#ffffff';
$column['column_3']['content_even_font_color'] = '#ffffff';
$column['column_3']['content_hover_font_color'] = '#393939';
$column['column_3']['content_even_hover_font_color'] = '#393939';
$column['column_3']['content_odd_color'] = '';
$column['column_3']['content_odd_hover_color'] = '';
$column['column_3']['content_even_color'] = '';
$column['column_3']['content_even_hover_color'] = '';
$column['column_3']['body_li_style_bold'] = '';
$column['column_3']['body_li_style_italic'] = '';
$column['column_3']['body_li_style_decoration'] = '';



$column['column_3']['button_background_color'] = '#ffffff';
$column['column_3']['button_hover_background_color'] = '#d81a60';
$column['column_3']['button_font_family'] = 'Open Sans';
$column['column_3']['button_font_size'] = 17;
$column['column_3']['button_font_color'] = '#010509';
$column['column_3']['button_hover_font_color'] = '#FFFFFF';
$column['column_3']['button_style_bold'] = 'Bold';
$column['column_3']['button_style_italic'] = '';
$column['column_3']['button_style_decoration'] = '';


$column['column_3']['is_caption'] = 0;

$column['column_3']['column_highlight'] = '';
$column['column_3']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>100</span><span class='arp_price_duration'> / month</span>";
$column['column_3']['price_label'] = '';
$column['column_3']['arp_header_shortcode'] = '';
$column['column_3']['body_text_alignment'] = 'left';
$column['column_3']['rows']['row_0']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_0']['row_description'] = '<i class="fas fa-inbox arpsize-ico-24"></i> 200GB Space';
$column['column_3']['rows']['row_0']['row_label'] = '';
$column['column_3']['rows']['row_0']['row_tooltip'] = '';
$column['column_3']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_1']['row_description'] = '<i class="fas fa-server arpsize-ico-24"></i> 100 Databases';
$column['column_3']['rows']['row_1']['row_label'] = '';
$column['column_3']['rows']['row_1']['row_tooltip'] = '';
$column['column_3']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_2']['row_description'] = '<i class="fas fa-globe arpsize-ico-24"></i> 150 Free Domains';
$column['column_3']['rows']['row_2']['row_label'] = '';
$column['column_3']['rows']['row_2']['row_tooltip'] = '';
$column['column_3']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_des_txt_align'] = 'left';
$column['column_3']['rows']['row_3']['row_description'] = '<i class="arpfar arpfa-envelope arpsize-ico-24"></i> 300 Email Accounts';
$column['column_3']['rows']['row_3']['row_label'] = '';
$column['column_3']['rows']['row_3']['row_tooltip'] = '';
$column['column_3']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_3']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_3']['button_size'] = 'Medium';
$column['column_3']['button_height'] = 'Medium';
$column['column_3']['button_type'] = 'button';
$column['column_3']['button_text'] = 'Subscribe Now';
$column['column_3']['button_url'] = '#';
$column['column_3']['button_s_size'] = '';
$column['column_3']['button_s_type'] = '';
$column['column_3']['button_s_text'] = '';
$column['column_3']['button_s_url'] = '';
$column['column_3']['s_is_new_window'] = '';
$column['column_3']['is_new_window'] = 0;



$column['column_3']['footer_content'] = '';
$column['column_3']['footer_content_position'] = 0;
$column['column_3']['footer_level_options_font_family'] = 'Open Sans Bold';
$column['column_3']['footer_level_options_font_size'] = 12;
$column['column_3']['footer_level_options_font_color'] = '#364762';
$column['column_3']['footer_level_options_hover_font_color'] = '#364762';
$column['column_3']['footer_level_options_font_style_bold'] = '';
$column['column_3']['footer_level_options_font_style_italic'] = '';
$column['column_3']['footer_level_options_font_style_decoration'] = '';
$column['column_3']['footer_background_color'] = '';
$column['column_3']['footer_hover_background_color'] = '';

$column['column_3']['is_post_variables'] = 0;
$column['column_3']['post_variables_content'] = 'plan_id=4;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 19
 * 
 * @since 2.0
 */
$values['name'] = 'ARPrice Template 19';
$values['is_template'] = 1;
$values['status'] = 'published';
$values['template_name'] = 19;
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

$arp_pt_template_settings['template'] = 'arptemplate_22';
$arp_pt_template_settings['skin'] = 'red';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_22';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'shadow_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 260;


$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 4;
$arp_pt_column_settings['column_border_radius_top_right'] = 4;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 4;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 4;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 810;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 50;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 50;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 50;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 50;
$arp_pt_column_settings['arp_global_button_type'] = 'shadow';
$arp_pt_column_settings['disable_button_hover_effect'] =0;

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

$arp_pt_column_settings['header_font_family_global'] = 'Open Sans Semibold';
$arp_pt_column_settings['header_font_size_global'] = 40;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['price_font_size_global'] = 36;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = '';
$arp_pt_column_settings['arp_price_text_italic_global'] = 'italic';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Open Sans';
$arp_pt_column_settings['body_font_size_global'] = 18;
$arp_pt_column_settings['arp_body_text_alignment'] = 'center';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = 'italic';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['footer_font_size_global'] = 12;
$arp_pt_column_settings['arp_footer_text_alignment'] = 'center';
$arp_pt_column_settings['arp_footer_text_bold_global'] = '';
$arp_pt_column_settings['arp_footer_text_italic_global'] = '';
$arp_pt_column_settings['arp_footer_text_decoration_global'] = '';
$arp_pt_column_settings['button_font_family_global'] = 'Open Sans Semibold';
$arp_pt_column_settings['button_font_size_global'] = 18;
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
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = "#e40031";
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#363636";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = '#E40031';
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#363636';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#e40031';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#e40031';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#5c5c5c';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#5c5c5c';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#5c5c5c';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#5c5c5c';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#ffffff';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Basic';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';
$column['column_0']['column_background_color'] = "#e40031";
$column['column_0']['column_hover_background_color'] = "#e40031";

$column['column_0']['header_font_family'] = 'Open Sans Semibold';
$column['column_0']['header_font_size'] = 40;
$column['column_0']['header_font_color'] = "#ffffff";
$column['column_0']['header_hover_font_color'] = "#ffffff";
$column['column_0']['header_style_bold'] = '';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_background_color'] = '#ffffff';
$column['column_0']['price_hover_background_color'] = '#ffffff';
$column['column_0']['price_font_family'] = "Open Sans";
$column['column_0']['price_font_size'] = 36;
$column['column_0']['price_font_color'] = "#e40031";
$column['column_0']['price_hover_font_color'] = "#e40031";

$column['column_0']['price_label_style_bold'] = '';
$column['column_0']['price_label_style_italic'] = 'italic';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Open Sans';
$column['column_0']['price_text_font_size'] = 36;
$column['column_0']['price_text_font_color'] = "#e40031";
$column['column_0']['price_text_hover_font_color'] = "#e40031";

$column['column_0']['price_text_style_bold'] = '';
$column['column_0']['price_text_style_italic'] = 'italic';
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
$column['column_0']['content_font_color'] = "#5c5c5c";
$column['column_0']['content_even_font_color'] = "#5c5c5c";
$column['column_0']['content_hover_font_color'] = "#5c5c5c";
$column['column_0']['content_even_hover_font_color'] = "#5c5c5c";
$column['column_0']['content_odd_color'] = '#ffffff';
$column['column_0']['content_odd_hover_color'] = '#ffffff';
$column['column_0']['content_even_color'] = '#ffffff';
$column['column_0']['content_even_hover_color'] = '#ffffff';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = 'italic';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['content_label_font_family'] = 'Open Sans';
$column['column_0']['content_label_font_size'] = 18;
$column['column_0']['content_label_font_color'] = '#5c5c5c';
$column['column_0']['content_label_hover_font_color'] = '#5c5c5c';
$column['column_0']['body_label_style_bold'] = '';
$column['column_0']['body_label_style_italic'] = 'italic';
$column['column_0']['body_label_style_decoration'] = '';



$column['column_0']['button_background_color'] = '#363636';
$column['column_0']['button_hover_background_color'] = '#363636';
$column['column_0']['button_font_family'] = "Open Sans Semibold";
$column['column_0']['button_font_size'] = 18;
$column['column_0']['button_font_color'] = "#ffffff";
$column['column_0']['button_hover_font_color'] = "#ffffff";
$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>19.00</span><span class='arp_price_duration'> / mo</span>";
$column['column_0']['price_label'] = '';
$column['column_0']['arp_header_shortcode'] = '';
$column['column_0']['body_text_alignment'] = 'center';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = '10 GB Disk Space';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = 'italic';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_1']['row_description'] = '5 Databases';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = 'italic';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_2']['row_description'] = '5 Domains';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = 'italic';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_3']['row_description'] = '24x7 online Support';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = 'italic';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '194';
$column['column_0']['button_height'] = '42';
$column['column_0']['button_type'] = 'Button';
$column['column_0']['button_text'] = 'Purchase Now';
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

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';

$column['column_1']['package_title'] = 'Personal';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';
$column['column_1']['column_background_color'] = "#e40031";
$column['column_1']['column_hover_background_color'] = "#e40031";

$column['column_1']['header_font_family'] = 'Open Sans Semibold';
$column['column_1']['header_font_size'] = 40;
$column['column_1']['header_font_color'] = "#ffffff";
$column['column_1']['header_hover_font_color'] = "#ffffff";
$column['column_1']['header_style_bold'] = '';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_background_color'] = '#ffffff';
$column['column_1']['price_hover_background_color'] = '#ffffff';
$column['column_1']['price_font_family'] = "Open Sans";
$column['column_1']['price_font_size'] = 36;
$column['column_1']['price_font_color'] = "#e40031";
$column['column_1']['price_hover_font_color'] = "#e40031";
$column['column_1']['price_label_style_bold'] = '';
$column['column_1']['price_label_style_italic'] = 'italic';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Open Sans';
$column['column_1']['price_text_font_size'] = 36;
$column['column_1']['price_text_font_color'] = "#e40031";
$column['column_1']['price_text_hover_font_color'] = "#e40031";
$column['column_1']['price_text_style_bold'] = '';
$column['column_1']['price_text_style_italic'] = 'italic';
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
$column['column_1']['content_font_color'] = "#5c5c5c";
$column['column_1']['content_even_font_color'] = "#5c5c5c";
$column['column_1']['content_hover_font_color'] = "#5c5c5c";
$column['column_1']['content_even_hover_font_color'] = "#5c5c5c";
$column['column_1']['content_odd_color'] = '#ffffff';
$column['column_1']['content_odd_hover_color'] = '#ffffff';
$column['column_1']['content_even_color'] = '#ffffff';
$column['column_1']['content_even_hover_color'] = '#ffffff';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = 'italic';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['content_label_font_family'] = 'Arial';
$column['column_1']['content_label_font_size'] = 15;
$column['column_1']['content_label_font_color'] = '#5c5c5c';
$column['column_1']['content_label_hover_font_color'] = '#5c5c5c';
$column['column_1']['body_label_style_bold'] = 'bold';
$column['column_1']['body_label_style_italic'] = '';
$column['column_1']['body_label_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#363636';
$column['column_1']['button_hover_background_color'] = '#363636';
$column['column_1']['button_font_family'] = "Open Sans Semibold";
$column['column_1']['button_font_size'] = 18;
$column['column_1']['button_font_color'] = "#ffffff";
$column['column_1']['button_hover_font_color'] = "#ffffff";
$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>29.00</span><span class='arp_price_duration'> / mo</span>";
$column['column_1']['price_label'] = '';
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '50 GB Disk Space';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = 'italic';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '25 Databases';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = 'italic';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '25 Domains';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = 'italic';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '24x7 online Support';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = 'italic';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '192';
$column['column_1']['button_height'] = '42';
$column['column_1']['button_type'] = 'Button';
$column['column_1']['button_text'] = 'Purchase Now';
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

$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Standard';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';
$column['column_2']['column_background_color'] = "#e40031";
$column['column_2']['column_hover_background_color'] = "#e40031";

$column['column_2']['header_font_family'] = 'Open Sans Semibold';
$column['column_2']['header_font_size'] = 40;
$column['column_2']['header_font_color'] = "#ffffff";
$column['column_2']['header_hover_font_color'] = "#ffffff";
$column['column_2']['header_style_bold'] = '';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_background_color'] = '#ffffff';
$column['column_2']['price_hover_background_color'] = '#ffffff';
$column['column_2']['price_font_family'] = "Open Sans";
$column['column_2']['price_font_size'] = 36;
$column['column_2']['price_font_color'] = "#e40031";
$column['column_2']['price_hover_font_color'] = "#e40031";
$column['column_2']['price_label_style_bold'] = '';
$column['column_2']['price_label_style_italic'] = 'italic';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Open Sans';
$column['column_2']['price_text_font_size'] = 16;
$column['column_2']['price_text_font_color'] = "#e40031";
$column['column_2']['price_text_hover_font_color'] = "#e40031";
$column['column_2']['price_text_style_bold'] = '';
$column['column_2']['price_text_style_italic'] = 'italic';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = 'Arial';
$column['column_2']['column_description_font_size'] = 13;
$column['column_2']['column_description_font_color'] = '#7c7c7c';
$column['column_2']['column_description_hover_font_color'] = '#7c7c7c';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = "Open Sans";
$column['column_2']['content_font_size'] = 18;
$column['column_2']['content_font_color'] = "#5c5c5c";
$column['column_2']['content_even_font_color'] = "#5c5c5c";
$column['column_2']['content_hover_font_color'] = "#5c5c5c";
$column['column_2']['content_even_hover_font_color'] = "#5c5c5c";
$column['column_2']['content_odd_color'] = '#ffffff';
$column['column_2']['content_odd_hover_color'] = '#ffffff';
$column['column_2']['content_even_color'] = '#ffffff';
$column['column_2']['content_even_hover_color'] = '#ffffff';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = 'italic';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['content_label_font_family'] = 'Arial';
$column['column_2']['content_label_font_size'] = 15;
$column['column_2']['content_label_font_color'] = '#5c5c5c';
$column['column_2']['content_label_hover_font_color'] = '#5c5c5c';
$column['column_2']['body_label_style_bold'] = 'bold';
$column['column_2']['body_label_style_italic'] = '';
$column['column_2']['body_label_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#363636';
$column['column_2']['button_hover_background_color'] = '#363636';
$column['column_2']['button_font_family'] = "Open Sans Semibold";
$column['column_2']['button_font_size'] = 18;
$column['column_2']['button_font_color'] = "#ffffff";
$column['column_2']['button_hover_font_color'] = "#ffffff";
$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>59.00</span><span class='arp_price_duration'> / mo</span>";
$column['column_2']['price_label'] = "";
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '80 GB Disk Space';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = 'italic';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '30 Databases';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = 'italic';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '30 Domains';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = 'italic';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '24x7 online Support';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = 'italic';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '192';
$column['column_2']['button_height'] = '42';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Purchase Now';
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
$column['column_2']['footer_level_options_hover_font_color'] = '#ffffff';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';

$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);

/**
 * ARPrice Template 20
 * 
 * @since 2.0
 */
$values['name'] = 'ARPrice Template 20';
$values['is_template'] = 1;
$values['status'] = 'published';
$values['template_name'] = 20;
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

$arp_pt_template_settings['template'] = 'arptemplate_23';
$arp_pt_template_settings['skin'] = 'orange';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_2', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_23';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'arp-shake';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 280;

$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 6;
$arp_pt_column_settings['column_border_radius_top_right'] = 6;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 6;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 6;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 870;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 8;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 8;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 8;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 8;
$arp_pt_column_settings['arp_global_button_type'] = 'border';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

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
$arp_pt_column_settings['header_font_family_global'] = 'Ubuntu';
$arp_pt_column_settings['header_font_size_global'] = 32;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Ubuntu';
$arp_pt_column_settings['price_font_size_global'] = 36;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Ubuntu';
$arp_pt_column_settings['body_font_size_global'] = 20;
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
$arp_pt_column_settings['button_font_family_global'] = 'Open Sans Semibold';
$arp_pt_column_settings['button_font_size_global'] = 18;
$arp_pt_column_settings['arp_button_text_alignment'] = 'center';
$arp_pt_column_settings['arp_button_text_bold_global'] = '';
$arp_pt_column_settings['arp_button_text_italic_global'] = '';
$arp_pt_column_settings['arp_button_text_decoration_global'] = '';
$arp_pt_column_settings['description_font_family_global'] = 'Ubuntu';
$arp_pt_column_settings['description_font_size_global'] = 22;
$arp_pt_column_settings['arp_description_text_alignment'] = 'center';
$arp_pt_column_settings['arp_description_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_description_text_italic_global'] = '';
$arp_pt_column_settings['arp_description_text_decoration_global'] = '';
$arp_pt_column_animation['is_animation'] = 'no';
$arp_pt_column_animation['visible_column'] = 2;
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = "#fdb515";
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = "#f6f9fd";
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = '#fdb515';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = '#f6f9fd';
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#a2a8b1';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#a2a8b1';
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
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#e8a623';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#e8a623';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Small Shop';
$column['column_0']['column_description'] = '<i class="fas fa-compress arpsize-ico-24"></i>&nbsp;&nbsp;<i class="fas fa-bicycle arpsize-ico-24"></i>&nbsp;&nbsp;<i class="fas fa-child arpsize-ico-24"></i>&nbsp;&nbsp;<i class="fas fa-car arpsize-ico-24"></i><br/>4WD<br/> Track Continues';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';
$column['column_0']['column_background_color'] = "#fdb515";
$column['column_0']['column_hover_background_color'] = "#fdb515";

$column['column_0']['header_font_family'] = 'Ubuntu';
$column['column_0']['header_font_size'] = 32;
$column['column_0']['header_font_color'] = "#ffffff";
$column['column_0']['header_hover_font_color'] = "#ffffff";
$column['column_0']['header_style_bold'] = 'bold';
$column['column_0']['header_style_italic'] = '';
$column['column_0']['header_style_decoration'] = '';


$column['column_0']['price_background_color'] = '#f6f9fD';
$column['column_0']['price_hover_background_color'] = '#f6f9fD';
$column['column_0']['price_font_family'] = "Ubuntu";
$column['column_0']['price_font_size'] = 36;
$column['column_0']['price_font_color'] = "#a2a8b1";
$column['column_0']['price_hover_font_color'] = "#a2a8b1";
$column['column_0']['price_label_style_bold'] = 'bold';
$column['column_0']['price_label_style_italic'] = '';
$column['column_0']['price_label_style_decoration'] = '';

$column['column_0']['price_text_font_family'] = 'Ubuntu';
$column['column_0']['price_text_font_size'] = 36;
$column['column_0']['price_text_font_color'] = "#a2a8b1";
$column['column_0']['price_text_hover_font_color'] = "#a2a8b1";
$column['column_0']['price_text_style_bold'] = 'bold';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = 'Ubuntu';
$column['column_0']['column_description_font_size'] = 22;
$column['column_0']['column_description_font_color'] = '#ffffff';
$column['column_0']['column_description_hover_font_color'] = '#ffffff';
$column['column_0']['column_description_style_bold'] = 'Bold';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = "Ubuntu";
$column['column_0']['content_font_size'] = 20;
$column['column_0']['content_font_color'] = "#ffffff";
$column['column_0']['content_even_font_color'] = "#ffffff";
$column['column_0']['content_hover_font_color'] = "#ffffff";
$column['column_0']['content_even_hover_font_color'] = "#ffffff";
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['content_label_font_family'] = 'Open Sans';
$column['column_0']['content_label_font_size'] = 18;
$column['column_0']['content_label_font_color'] = '#5c5c5c';
$column['column_0']['content_label_hover_font_color'] = '#5c5c5c';
$column['column_0']['body_label_style_bold'] = '';
$column['column_0']['body_label_style_italic'] = 'italic';
$column['column_0']['body_label_style_decoration'] = '';



$column['column_0']['button_background_color'] = '#ffffff';
$column['column_0']['button_hover_background_color'] = '#ffffff';
$column['column_0']['button_font_family'] = "Open Sans Semibold";
$column['column_0']['button_font_size'] = 18;
$column['column_0']['button_font_color'] = "#e8a623";
$column['column_0']['button_hover_font_color'] = "#e8a623";
$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>250</span><span class='arp_price_duration'></span>";
$column['column_0']['price_label'] = '';
$column['column_0']['arp_header_shortcode'] = '';
$column['column_0']['body_text_alignment'] = 'center';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = 'The best transport <br/> services in the world';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';

$column['column_0']['button_size'] = '164';
$column['column_0']['button_height'] = '45';
$column['column_0']['button_type'] = 'Button';
$column['column_0']['button_text'] = 'Book Now';
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

$column['column_0']['is_post_variables'] = 0;
$column['column_0']['post_variables_content'] = 'plan_id=0;';

$column['column_1']['package_title'] = 'Large Shop';
$column['column_1']['column_description'] = '<i class="fas fa-compress arpsize-ico-22"></i>&nbsp;&nbsp;<i class="fas fa-bicycle arpsize-ico-22"></i>&nbsp;&nbsp;<i class="fas fa-child arpsize-ico-22"></i>&nbsp;&nbsp;<i class="fas fa-car arpsize-ico-22"></i><br/>4WD<br/> Track Continues';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';
$column['column_1']['column_background_color'] = "#fdb515";
$column['column_1']['column_hover_background_color'] = "#fdb515";

$column['column_1']['header_font_family'] = 'Ubuntu';
$column['column_1']['header_font_size'] = 32;
$column['column_1']['header_font_color'] = "#ffffff";
$column['column_1']['header_hover_font_color'] = "#ffffff";
$column['column_1']['header_style_bold'] = 'bold';
$column['column_1']['header_style_italic'] = '';
$column['column_1']['header_style_decoration'] = '';


$column['column_1']['price_background_color'] = '#f6f9fd';
$column['column_1']['price_hover_background_color'] = '#f6f9fd';
$column['column_1']['price_font_family'] = "Ubuntu";
$column['column_1']['price_font_size'] = 36;
$column['column_1']['price_font_color'] = "#a2a8b1";
$column['column_1']['price_hover_font_color'] = "#a2a8b1";
$column['column_1']['price_label_style_bold'] = 'bold';
$column['column_1']['price_label_style_italic'] = '';
$column['column_1']['price_label_style_decoration'] = '';

$column['column_1']['price_text_font_family'] = 'Ubuntu';
$column['column_1']['price_text_font_size'] = 36;
$column['column_1']['price_text_font_color'] = "#a2a8b1";
$column['column_1']['price_text_hover_font_color'] = "#a2a8b1";
$column['column_1']['price_text_style_bold'] = 'bold';
$column['column_1']['price_text_style_italic'] = '';
$column['column_1']['price_text_style_decoration'] = '';


$column['column_1']['column_description_font_family'] = 'Ubuntu';
$column['column_1']['column_description_font_size'] = 22;
$column['column_1']['column_description_font_color'] = '#ffffff';
$column['column_1']['column_description_hover_font_color'] = '#ffffff';
$column['column_1']['column_description_style_bold'] = 'Bold';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = "Ubuntu";
$column['column_1']['content_font_size'] = 20;
$column['column_1']['content_font_color'] = "#ffffff";
$column['column_1']['content_even_font_color'] = "#ffffff";
$column['column_1']['content_hover_font_color'] = "#ffffff";
$column['column_1']['content_even_hover_font_color'] = "#ffffff";
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['content_label_font_family'] = 'Open Sans';
$column['column_1']['content_label_font_size'] = 18;
$column['column_1']['content_label_font_color'] = '#5c5c5c';
$column['column_1']['content_label_hover_font_color'] = '#5c5c5c';
$column['column_1']['body_label_style_bold'] = '';
$column['column_1']['body_label_style_italic'] = 'italic';
$column['column_1']['body_label_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#ffffff';
$column['column_1']['button_hover_background_color'] = '#ffffff';
$column['column_1']['button_font_family'] = "Open Sans Semibold";
$column['column_1']['button_font_size'] = 18;
$column['column_1']['button_font_color'] = "#e8a623";
$column['column_1']['button_hover_font_color'] = "#e8a623";
$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>350</span><span class='arp_price_duration'></span>";
$column['column_1']['price_label'] = '';
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = 'The best transport <br/> services in the world';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '164';
$column['column_1']['button_height'] = '45';
$column['column_1']['button_type'] = 'Button';
$column['column_1']['button_text'] = 'Book Now';
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

$column['column_1']['is_post_variables'] = 0;
$column['column_1']['post_variables_content'] = 'plan_id=1;';

$column['column_2']['package_title'] = 'Shopping Mall';
$column['column_2']['column_description'] = '<i class="fas fa-compress arpsize-ico-22"></i>&nbsp;&nbsp;<i class="fas fa-bicycle arpsize-ico-22"></i>&nbsp;&nbsp;<i class="fas fa-child arpsize-ico-22"></i>&nbsp;&nbsp;<i class="fas fa-car arpsize-ico-22"></i><br/>4WD<br/> Track Continues';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';
$column['column_2']['column_background_color'] = "#fdb515";
$column['column_2']['column_hover_background_color'] = "#fdb515";

$column['column_2']['header_font_family'] = 'Ubuntu';
$column['column_2']['header_font_size'] = 32;
$column['column_2']['header_font_color'] = "#ffffff";
$column['column_2']['header_hover_font_color'] = "#ffffff";
$column['column_2']['header_style_bold'] = 'bold';
$column['column_2']['header_style_italic'] = '';
$column['column_2']['header_style_decoration'] = '';


$column['column_2']['price_background_color'] = '#f6f9fd';
$column['column_2']['price_hover_background_color'] = '#f6f9fd';
$column['column_2']['price_font_family'] = "Ubuntu";
$column['column_2']['price_font_size'] = 36;
$column['column_2']['price_font_color'] = "#a2a8b1";
$column['column_2']['price_hover_font_color'] = "#a2a8b1";

$column['column_2']['price_label_style_bold'] = 'bold';
$column['column_2']['price_label_style_italic'] = '';
$column['column_2']['price_label_style_decoration'] = '';

$column['column_2']['price_text_font_family'] = 'Ubuntu';
$column['column_2']['price_text_font_size'] = 36;
$column['column_2']['price_text_font_color'] = "#a2a8b1";
$column['column_2']['price_text_hover_font_color'] = "#a2a8b1";

$column['column_2']['price_text_style_bold'] = 'bold';
$column['column_2']['price_text_style_italic'] = '';
$column['column_2']['price_text_style_decoration'] = '';



$column['column_2']['column_description_font_family'] = 'Ubuntu';
$column['column_2']['column_description_font_size'] = 22;
$column['column_2']['column_description_font_color'] = '#ffffff';
$column['column_2']['column_description_hover_font_color'] = '#ffffff';
$column['column_2']['column_description_style_bold'] = 'Bold';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = "Ubuntu";
$column['column_2']['content_font_size'] = 20;
$column['column_2']['content_font_color'] = "#ffffff";
$column['column_2']['content_even_font_color'] = "#ffffff";
$column['column_2']['content_hover_font_color'] = "#ffffff";
$column['column_2']['content_even_hover_font_color'] = "#ffffff";
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['content_label_font_family'] = 'Open Sans';
$column['column_2']['content_label_font_size'] = 18;
$column['column_2']['content_label_font_color'] = '#5c5c5c';
$column['column_2']['content_label_hover_font_color'] = '#5c5c5c';
$column['column_2']['body_label_style_bold'] = '';
$column['column_2']['body_label_style_italic'] = 'italic';
$column['column_2']['body_label_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#ffffff';
$column['column_2']['button_hover_background_color'] = '#ffffff';
$column['column_2']['button_font_family'] = "Open Sans Semibold";
$column['column_2']['button_font_size'] = 18;
$column['column_2']['button_font_color'] = "#e8a623";
$column['column_2']['button_hover_font_color'] = "#e8a623";
$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>550</span><span class='arp_price_duration'></span>";
$column['column_2']['price_label'] = '';
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = 'The best transport <br/> services in the world';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '164';
$column['column_2']['button_height'] = '45';
$column['column_2']['button_type'] = 'Button';
$column['column_2']['button_text'] = 'Book Now';
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
$column['column_2']['footer_level_options_hover_font_color'] = '#ffffff';
$column['column_2']['footer_level_options_font_style_bold'] = '';
$column['column_2']['footer_level_options_font_style_italic'] = '';
$column['column_2']['footer_level_options_font_style_decoration'] = '';

$column['column_2']['is_post_variables'] = 0;
$column['column_2']['post_variables_content'] = 'plan_id=2;';

$pt_columns = array('columns' => $column);

$opts = maybe_serialize($pt_columns);

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);


/**
 * ARPrice Template 21
 * 
 * @since 2.0
 */
$values['name'] = 'ARPrice Template 21';
$values['is_template'] = 1;
$values['template_name'] = 21;
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

$arp_pt_template_settings['template'] = 'arptemplate_24';
$arp_pt_template_settings['skin'] = 'darkblue';
$arp_pt_template_settings['template_type'] = 'normal';
$arp_pt_template_settings['features'] = array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0);

$arp_pt_general_settings['column_order'] = '["main_column_0","main_column_1","main_column_2"]';
$arp_pt_general_settings['reference_template'] = 'arptemplate_24';
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
$arp_pt_column_settings['column_highlight_on_hover'] = 'hover_effect';
$arp_pt_column_settings['is_responsive'] = 1;
$arp_pt_column_settings['full_column_clickable'] = 0;
$arp_pt_column_settings['enable_hover_effect'] = 1;
$arp_pt_column_settings['hide_footer_global'] = 0;
$arp_pt_column_settings['hide_header_global'] = 0;
$arp_pt_column_settings['hide_price_global'] = 0;
$arp_pt_column_settings['hide_feature_global'] = 0;
$arp_pt_column_settings['hide_description_global'] = 0;
$arp_pt_column_settings['hide_header_shortcode_global'] = 0;
$arp_pt_column_settings['all_column_width'] = 260;


$arp_pt_column_settings['hide_caption_colunmn'] = 0;
$arp_pt_column_settings['column_opacity'] = $arp_mainoptionsarr['general_options']['column_opacity'][0];
$arp_pt_column_settings['column_border_radius_top_left'] = 0;
$arp_pt_column_settings['column_border_radius_top_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_right'] = 0;
$arp_pt_column_settings['column_border_radius_bottom_left'] = 0;
$arp_pt_column_settings['column_wrapper_width_txtbox'] = 810;

$arp_pt_column_settings['global_button_border_width'] = 0;
$arp_pt_column_settings['global_button_border_type'] = 'solid';
$arp_pt_column_settings['global_button_border_color'] = '#c9c9c9';
$arp_pt_column_settings['global_button_border_radius_top_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_top_right'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_left'] = 4;
$arp_pt_column_settings['global_button_border_radius_bottom_right'] = 4;
$arp_pt_column_settings['arp_global_button_type'] = 'shadow';
$arp_pt_column_settings['disable_button_hover_effect'] = 1;

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
$arp_pt_column_settings['header_font_size_global'] = 28;
$arp_pt_column_settings['arp_header_text_alignment'] = 'center';
$arp_pt_column_settings['arp_header_text_bold_global'] = '';
$arp_pt_column_settings['arp_header_text_italic_global'] = '';
$arp_pt_column_settings['arp_header_text_decoration_global'] = '';
$arp_pt_column_settings['price_font_family_global'] = 'Roboto';
$arp_pt_column_settings['price_font_size_global'] = 40;
$arp_pt_column_settings['arp_price_text_alignment'] = 'center';
$arp_pt_column_settings['arp_price_text_bold_global'] = 'bold';
$arp_pt_column_settings['arp_price_text_italic_global'] = '';
$arp_pt_column_settings['arp_price_text_decoration_global'] = '';
$arp_pt_column_settings['body_font_family_global'] = 'Roboto';
$arp_pt_column_settings['body_font_size_global'] = 20;
$arp_pt_column_settings['arp_body_text_alignment'] = 'center';
$arp_pt_column_settings['arp_body_text_bold_global'] = '';
$arp_pt_column_settings['arp_body_text_italic_global'] = '';
$arp_pt_column_settings['arp_body_text_decoration_global'] = '';
$arp_pt_column_settings['footer_font_family_global'] = 'Open Sans Bold';
$arp_pt_column_settings['footer_font_size_global'] = 12;
$arp_pt_column_settings['arp_footer_text_alignment'] = 'center';
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
$arp_pt_column_animation['visible_columns_tablet'] = 2;
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
$arp_pt_tooltip_settings['tooltip_informative_icon'] = '<i class="fas fa-info-circle arpsize-ico-14"></i>';

$arp_pt_font_settings['header_fonts'] = $arp_header_font_settings;
$arp_pt_font_settings['price_fonts'] = $arp_price_font_settings;
$arp_pt_font_settings['price_text_fonts'] = $arp_price_text_font_settings;
$arp_pt_font_settings['content_fonts'] = $arp_content_font_settings;
$arp_pt_font_settings['button_fonts'] = $arp_button_font_settings;

$arp_pt_gen_options = array('template_setting' => $arp_pt_template_settings, 'font_settings' => $arp_pt_font_settings, 'column_settings' => $arp_pt_column_settings, 'column_animation' => $arp_pt_column_animation, 'tooltip_settings' => $arp_pt_tooltip_settings, 'general_settings' => $arp_pt_general_settings, 'button_settings' => $arp_pt_button_settings);

$arp_pt_custom_skin_array = array();

$arp_pt_custom_skin_array['arp_header_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_column_bg_custom_color'] = "#5c57b1";
$arp_pt_custom_skin_array['arp_column_desc_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_pricing_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_bg_color'] = null;
$arp_pt_custom_skin_array['arp_button_bg_custom_color'] = "#ffffff";
$arp_pt_custom_skin_array['arp_column_bg_hover_color'] = '#5c57b1';
$arp_pt_custom_skin_array['arp_button_bg_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_price_bg_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_odd_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_even_row_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_footer_content_hover_bg_color'] = null;
$arp_pt_custom_skin_array['arp_column_desc_hover_bg_custom_color'] = null;
$arp_pt_custom_skin_array['arp_header_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_header_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_price_duration_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_price_duration_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_desc_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_color'] = null;
$arp_pt_custom_skin_array['arp_body_label_font_custom_hover_color'] = null;
$arp_pt_custom_skin_array['arp_body_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_body_even_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_footer_font_custom_hover_color'] = '#ffffff';
$arp_pt_custom_skin_array['arp_button_font_custom_color'] = '#3c3b45';
$arp_pt_custom_skin_array['arp_button_font_custom_hover_color'] = '#3c3b45';

$arp_pt_gen_options['custom_skin_colors'] = $arp_pt_custom_skin_array;

$values['options'] = maybe_serialize($arp_pt_gen_options);

$table_id = $arprice_form->new_release_update($values);

$pt_columns = array();

$column = array();

$column['column_0']['package_title'] = 'Bronze';
$column['column_0']['column_description'] = '';
$column['column_0']['custom_ribbon_txt'] = '';
$column['column_0']['column_width'] = '';
$column['column_0']['column_align'] = 'left';
$column['column_0']['column_background_color'] = '#5c57b1';
$column['column_0']['column_hover_background_color'] = "#5c57b1";

$column['column_0']['header_background_color'] = '';
$column['column_0']['header_hover_background_color'] = '';
$column['column_0']['header_font_family'] = 'Roboto';
$column['column_0']['header_font_size'] = 28;
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
$column['column_0']['price_text_font_size'] = 40;
$column['column_0']['price_text_font_color'] = '#ffffff';
$column['column_0']['price_text_hover_font_color'] = '#ffffff';
$column['column_0']['price_text_style_bold'] = 'bold';
$column['column_0']['price_text_style_italic'] = '';
$column['column_0']['price_text_style_decoration'] = '';



$column['column_0']['column_description_font_family'] = '';
$column['column_0']['column_description_font_size'] = '';

$column['column_0']['column_description_font_color'] = '';
$column['column_0']['column_description_hover_font_color'] = '';
$column['column_0']['column_description_style_bold'] = '';
$column['column_0']['column_description_style_italic'] = '';
$column['column_0']['column_description_style_decoration'] = '';



$column['column_0']['content_font_family'] = 'Roboto';
$column['column_0']['content_font_size'] = 20;
$column['column_0']['content_font_color'] = '#ffffff';
$column['column_0']['content_even_font_color'] = '#ffffff';
$column['column_0']['content_hover_font_color'] = '#ffffff';
$column['column_0']['content_even_hover_font_color'] = '#ffffff';
$column['column_0']['body_li_style_bold'] = '';
$column['column_0']['body_li_style_italic'] = '';
$column['column_0']['body_li_style_decoration'] = '';



$column['column_0']['button_background_color'] = '#ffffff';
$column['column_0']['button_hover_background_color'] = '#ffffff';
$column['column_0']['button_font_family'] = 'Roboto';
$column['column_0']['button_font_size'] = 20;
$column['column_0']['button_font_color'] = '#3c3b45';
$column['column_0']['button_hover_font_color'] = '#3c3b45';
$column['column_0']['button_style_bold'] = '';
$column['column_0']['button_style_italic'] = '';
$column['column_0']['button_style_decoration'] = '';


$column['column_0']['is_caption'] = 0;

$column['column_0']['column_highlight'] = '';
$column['column_0']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>20</span><span class='arp_price_duration'> / month</span>";
$column['column_0']['price_label'] = '';
$column['column_0']['arp_header_shortcode'] = '';
$column['column_0']['body_text_alignment'] = 'center';
$column['column_0']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_0']['row_description'] = '20GB Disk Space';
$column['column_0']['rows']['row_0']['row_label'] = '';
$column['column_0']['rows']['row_0']['row_tooltip'] = '';
$column['column_0']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_1']['row_description'] = '15 Databases';
$column['column_0']['rows']['row_1']['row_label'] = '';
$column['column_0']['rows']['row_1']['row_tooltip'] = '';
$column['column_0']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_2']['row_description'] = '50GB Bandwidth';
$column['column_0']['rows']['row_2']['row_label'] = '';
$column['column_0']['rows']['row_2']['row_tooltip'] = '';
$column['column_0']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_2']['row_caption_style_decoration'] = '';

$column['column_0']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_3']['row_description'] = '2 Domains';
$column['column_0']['rows']['row_3']['row_label'] = '';
$column['column_0']['rows']['row_3']['row_tooltip'] = '';
$column['column_0']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_3']['row_caption_style_decoration'] = '';

$column['column_0']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_0']['rows']['row_4']['row_description'] = '24x7 Technical Support';
$column['column_0']['rows']['row_4']['row_label'] = '';
$column['column_0']['rows']['row_4']['row_tooltip'] = '';
$column['column_0']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_0']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_0']['button_size'] = '176';
$column['column_0']['button_height'] = '48';
$column['column_0']['button_type'] = 'button';
$column['column_0']['button_text'] = 'Subscribe';
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


$column['column_1']['package_title'] = 'Silver';
$column['column_1']['column_description'] = '';
$column['column_1']['custom_ribbon_txt'] = '';
$column['column_1']['column_width'] = '';
$column['column_1']['column_align'] = 'left';
$column['column_1']['column_background_color'] = '#5c57b1';
$column['column_1']['column_hover_background_color'] = "#5c57b1";

$column['column_1']['header_background_color'] = '';
$column['column_1']['header_hover_background_color'] = '';
$column['column_1']['header_font_family'] = 'Roboto';
$column['column_1']['header_font_size'] = 28;
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



$column['column_1']['column_description_font_family'] = '';
$column['column_1']['column_description_font_size'] = '';

$column['column_1']['column_description_font_color'] = '';
$column['column_1']['column_description_hover_font_color'] = '';
$column['column_1']['column_description_style_bold'] = '';
$column['column_1']['column_description_style_italic'] = '';
$column['column_1']['column_description_style_decoration'] = '';



$column['column_1']['content_font_family'] = 'Roboto';
$column['column_1']['content_font_size'] = 20;
$column['column_1']['content_font_color'] = '#ffffff';
$column['column_1']['content_even_font_color'] = '#ffffff';
$column['column_1']['content_hover_font_color'] = '#ffffff';
$column['column_1']['content_even_hover_font_color'] = '#ffffff';
$column['column_1']['body_li_style_bold'] = '';
$column['column_1']['body_li_style_italic'] = '';
$column['column_1']['body_li_style_decoration'] = '';



$column['column_1']['button_background_color'] = '#ffffff';
$column['column_1']['button_hover_background_color'] = '#ffffff';
$column['column_1']['button_font_family'] = 'Roboto';
$column['column_1']['button_font_size'] = 20;
$column['column_1']['button_font_color'] = '#3c3b45';
$column['column_1']['button_hover_font_color'] = '#3c3b45';
$column['column_1']['button_style_bold'] = '';
$column['column_1']['button_style_italic'] = '';
$column['column_1']['button_style_decoration'] = '';


$column['column_1']['is_caption'] = 0;

$column['column_1']['column_highlight'] = '';
$column['column_1']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>50</span><span class='arp_price_duration'> / month</span>";
$column['column_1']['price_label'] = "";
$column['column_1']['arp_header_shortcode'] = '';
$column['column_1']['body_text_alignment'] = 'center';
$column['column_1']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_0']['row_description'] = '80GB Disk Space';
$column['column_1']['rows']['row_0']['row_tooltip'] = '';
$column['column_1']['rows']['row_0']['row_label'] = '';
$column['column_1']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_1']['row_description'] = '100 Databases';
$column['column_1']['rows']['row_1']['row_tooltip'] = '';
$column['column_1']['rows']['row_1']['row_label'] = '';
$column['column_1']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_2']['row_description'] = '80GB Disk Space';
$column['column_1']['rows']['row_2']['row_tooltip'] = '';
$column['column_1']['rows']['row_2']['row_label'] = '';
$column['column_1']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_3']['row_description'] = '5 Domains';
$column['column_1']['rows']['row_3']['row_tooltip'] = '';
$column['column_1']['rows']['row_3']['row_label'] = '';
$column['column_1']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_1']['rows']['row_4']['row_description'] = '24x7 Technical Support';
$column['column_1']['rows']['row_4']['row_tooltip'] = '';
$column['column_1']['rows']['row_4']['row_label'] = '';
$column['column_1']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_1']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_1']['button_size'] = '176';
$column['column_1']['button_height'] = '48';
$column['column_1']['button_type'] = 'button';
$column['column_1']['button_text'] = 'Subscribe';
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

$column['column_2']['package_title'] = 'Gold';
$column['column_2']['column_description'] = '';
$column['column_2']['custom_ribbon_txt'] = '';
$column['column_2']['column_width'] = '';
$column['column_2']['column_align'] = 'left';
$column['column_2']['column_background_color'] = '#5c57b1';
$column['column_2']['column_hover_background_color'] = "#5c57b1";

$column['column_2']['header_background_color'] = '';
$column['column_2']['header_hover_background_color'] = '';
$column['column_2']['header_font_family'] = 'Roboto';
$column['column_2']['header_font_size'] = 28;
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



$column['column_2']['column_description_font_family'] = '';
$column['column_2']['column_description_font_size'] = '';

$column['column_2']['column_description_font_color'] = '';
$column['column_2']['column_description_hover_font_color'] = '';
$column['column_2']['column_description_style_bold'] = '';
$column['column_2']['column_description_style_italic'] = '';
$column['column_2']['column_description_style_decoration'] = '';



$column['column_2']['content_font_family'] = 'Roboto';
$column['column_2']['content_font_size'] = 20;
$column['column_2']['content_font_color'] = '#ffffff';
$column['column_2']['content_even_font_color'] = '#ffffff';
$column['column_2']['content_hover_font_color'] = '#ffffff';
$column['column_2']['content_even_hover_font_color'] = '#ffffff';
$column['column_2']['body_li_style_bold'] = '';
$column['column_2']['body_li_style_italic'] = '';
$column['column_2']['body_li_style_decoration'] = '';



$column['column_2']['button_background_color'] = '#ffffff';
$column['column_2']['button_hover_background_color'] = '#ffffff';
$column['column_2']['button_font_family'] = 'Roboto';
$column['column_2']['button_font_size'] = 20;
$column['column_2']['button_font_color'] = '#3c3b45';
$column['column_2']['button_hover_font_color'] = '#3c3b45';
$column['column_2']['button_style_bold'] = '';
$column['column_2']['button_style_italic'] = '';
$column['column_2']['button_style_decoration'] = '';


$column['column_2']['is_caption'] = 0;

$column['column_2']['column_highlight'] = '';
$column['column_2']['price_text'] = "<span class='arp_price_value'><span class='arp_currency'>$</span>60</span><span class='arp_price_duration'> / month</span>";
$column['column_2']['price_label'] = '';
$column['column_2']['arp_header_shortcode'] = '';
$column['column_2']['body_text_alignment'] = 'center';
$column['column_2']['rows']['row_0']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_0']['row_description'] = '150GB Disk Space';
$column['column_2']['rows']['row_0']['row_tooltip'] = '';
$column['column_2']['rows']['row_0']['row_label'] = '';
$column['column_2']['rows']['row_0']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_0']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_1']['row_description'] = '150 Databases';
$column['column_2']['rows']['row_1']['row_tooltip'] = '';
$column['column_2']['rows']['row_1']['row_label'] = '';
$column['column_2']['rows']['row_1']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_1']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_2']['row_description'] = '120GB Bandwidth';
$column['column_2']['rows']['row_2']['row_tooltip'] = '';
$column['column_2']['rows']['row_2']['row_label'] = '';
$column['column_2']['rows']['row_2']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_2']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_3']['row_description'] = '10 Domains';
$column['column_2']['rows']['row_3']['row_tooltip'] = '';
$column['column_2']['rows']['row_3']['row_label'] = '';
$column['column_2']['rows']['row_3']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_3']['row_caption_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_des_txt_align'] = 'center';
$column['column_2']['rows']['row_4']['row_description'] = '24x7 Technical Support';
$column['column_2']['rows']['row_4']['row_tooltip'] = '';
$column['column_2']['rows']['row_4']['row_label'] = '';
$column['column_2']['rows']['row_4']['row_des_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_des_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_des_style_decoration'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_bold'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_italic'] = '';
$column['column_2']['rows']['row_4']['row_caption_style_decoration'] = '';
$column['column_2']['button_size'] = '176';
$column['column_2']['button_height'] = '48';
$column['column_2']['button_type'] = 'button';
$column['column_2']['button_text'] = 'Subscribe';
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

$arprice_form->new_release_option_update($table_id, $opts);

unset($values);
?>