<?php

class arprice_import_export {

	function __construct() {

		add_action( 'wp_ajax_import_table', array( $this, 'import_table' ) );

		add_action( 'wp_ajax_get_table_list', array( $this, 'export_table_list' ) );

		add_action( 'init', array( $this, 'arp_export_pricing_tables' ) );

		add_action( 'wp_ajax_arp_import_lite_table', array( $this, 'arp_import_lite_table' ) );

	}

	function arp_import_lite_table() {

		if ( isset( $_POST['template_id'] ) && $_POST['template_id'] != '' ) {
			$template_ids = array( $_POST['template_id'] );

			global $wpdb, $arpricelite_import_export, $arp_pricingtable;

				$arp_db_version = get_option( 'arpricelite_version' );

				$wp_upload_dir       = wp_upload_dir();
				$upload_dir          = $wp_upload_dir['basedir'] . '/arprice-responsive-pricing-table/';
				$upload_dir_url      = $wp_upload_dir['url'];
				$upload_dir_base_url = $wp_upload_dir['baseurl'] . '/arprice-responsive-pricing-table/';
				$charset             = get_option( 'blog_charset' );

				@ini_set( 'max_execution_time', 0 );

					$table_ids = implode( ',', $template_ids );

					$file_name = 'arplite_' . time();

					$filename = $file_name . '.txt';

					$sql_main = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'arplite_arprice WHERE ID in(' . $table_ids . ')' );

					$xml  = '';
					$xml .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

					$xml .= "<arplite>\n";

			foreach ( $sql_main as $key => $result ) {

				$xml .= "\t<arplite_table id='" . $result->ID . "'>\n";

				$xml .= "\t\t<site_url><![CDATA[" . site_url() . "]]></site_url>\n";

				$xml .= "\t\t<arp_plugin_version><![CDATA[" . $arp_db_version . "]]></arp_plugin_version>\n";

				$xml .= "\t\t<arp_table_name><![CDATA[" . $result->table_name . "]]></arp_table_name>\n";

				$xml .= "\t\t<status><![CDATA[" . $result->status . "]]></status>\n";

				$xml .= "\t\t<is_template><![CDATA[" . $result->is_template . "]]></is_template>\n";

				$xml .= "\t\t<template_name><![CDATA[" . $result->template_name . "]]></template_name>\n";

				$xml .= "\t\t<is_animated><![CDATA[" . $result->is_animated . "]]></is_animated>\n";

				if ( $arp_db_version > '1.0' ) {
					$arp_db_version1 = '1.0';
				}

				$general_options_new = unserialize( $result->general_options );

				$arp_main_reference_template = $general_options_new['general_settings']['reference_template'];

				$arp_exp_arp_main_reference_template = explode( '_', $arp_main_reference_template );

				$arp_new_arp_main_reference_template = $arp_exp_arp_main_reference_template[1];

				if ( $result->is_template == 1 ) {

					$xml .= "\t\t<arp_template_img><![CDATA[" . ARPLITE_PRICINGTABLE_URL . '/images/arplitetemplate_' . $arp_new_arp_main_reference_template . '_v' . $arp_db_version1 . '.png' . ']]></arp_template_img>';
					$xml .= "\t\t<arp_template_img_big><![CDATA[" . ARPLITE_PRICINGTABLE_URL . '/images/arplitetemplate_' . $arp_new_arp_main_reference_template . '_v' . $arp_db_version1 . '_big.png' . ']]></arp_template_img_big>';
					$xml .= "\t\t<arp_template_img_large><![CDATA[" . ARPLITE_PRICINGTABLE_URL . '/images/arplitetemplate_' . $arp_new_arp_main_reference_template . '_' . $arp_db_version1 . '_large.png' . ']]></arp_template_img_large>';
				} else {
					$xml .= "\t\t<arp_template_img><![CDATA[" . $upload_dir_base_url . 'template_images/arplitetemplate_' . $result->ID . '.png' . ']]></arp_template_img>';
					$xml .= "\t\t<arp_template_img_big><![CDATA[" . $upload_dir_base_url . 'template_images/arplitetemplate_' . $result->ID . '_big.png' . ']]></arp_template_img_big>';
					$xml .= "\t\t<arp_template_img_large><![CDATA[" . $upload_dir_base_url . 'template_images/arplitetemplate_' . $result->ID . '_large.png' . ']]></arp_template_img_large>';
				}

				$xml .= "\t\t<options>\n";

				$xml .= "\t\t\t<general_options>";

				$arp_general_options = unserialize( $result->general_options );

				$arp_gen_opt_new    = array();
				$arp_mainoptionsarr = $arp_pricingtable->arp_mainoptions();

				$ref_template_id = str_replace( 'arplitetemplate_', '', $arp_general_options['general_settings']['reference_template'] );
				if ( $ref_template_id == 26 ) {
					$ref_template_id = 23;
				}
				$ref_temp_options = '';
				if ( $ref_template_id ) {
					   $sql_template_data = $wpdb->get_results( 'SELECT general_options FROM ' . $wpdb->prefix . 'arp_arprice WHERE template_name =' . $ref_template_id );

					if ( isset( $sql_template_data[0]->general_options ) ) {
							  $ref_temp_options = maybe_unserialize( $sql_template_data[0]->general_options );
					}
				}

				if ( isset( $ref_temp_options ) && $ref_temp_options != '' ) {
					$arp_general_options = array_unique( array_merge( $ref_temp_options, $arp_general_options ), SORT_REGULAR );

				}

				$arp_general_options['template_setting']['template']                            = str_replace( 'arplitetemplate_', 'arptemplate_', $arp_general_options['template_setting']['template'] );
				$arp_general_options['general_settings']['reference_template']                  = str_replace( 'arplitetemplate_', 'arptemplate_', $arp_general_options['general_settings']['reference_template'] );
				$arp_general_options['general_settings']['arp_custom_css']                      = '';
				$arp_general_options['general_settings']['enable_toggle_price']                 = 0;
				$arp_general_options['general_settings']['arp_label_position_main']             = 1;
				$arp_general_options['general_settings']['arp_toggle_main']                     = 0;
				$arp_general_options['general_settings']['arp_step_main']                       = 2;
				$arp_general_options['general_settings']['setas_default_toggle']                = 0;
				$arp_general_options['general_settings']['toggle_active_color']                 = '#404040';
				$arp_general_options['general_settings']['toggle_active_text_color']            = '#ffffff';
				$arp_general_options['general_settings']['toggle_inactive_color']               = '#ffffff';
				$arp_general_options['general_settings']['toggle_button_font_color']            = '#000000';
				$arp_general_options['general_settings']['toggle_main_color']                   = '#E8E9EB';
				$arp_general_options['general_settings']['toggle_title_font_color']             = '#000000';
				$arp_general_options['general_settings']['toggle_title_font_family']            = 'Ubuntu';
				$arp_general_options['general_settings']['toggle_title_font_size']              = 16;
				$arp_general_options['general_settings']['toggle_title_font_style_bold']        = '';
				$arp_general_options['general_settings']['toggle_title_font_style_italic']      = '';
				$arp_general_options['general_settings']['toggle_title_font_style_decoration']  = '';
				$arp_general_options['general_settings']['toggle_button_font_family']           = 'Ubuntu';
				$arp_general_options['general_settings']['toggle_button_font_size']             = 16;
				$arp_general_options['general_settings']['toggle_button_font_style_bold']       = '';
				$arp_general_options['general_settings']['toggle_button_font_style_italic']     = '';
				$arp_general_options['general_settings']['toggle_button_font_style_decoration'] = '';
				$arp_general_options['general_settings']['togglestep_yearly']                   = 'Yearly';
				$arp_general_options['general_settings']['togglestep_monthly']                  = 'Monthly';
				$arp_general_options['general_settings']['togglestep_quarterly']                = 'Quarterly';

				$arp_general_options['column_settings']['display_col_mobile']    = 1;
				$arp_general_options['column_settings']['display_col_tablet']    = 3;
				$arp_general_options['column_settings']['column_opacity']        = 1;
				$arp_general_options['column_settings']['full_column_clickable'] = 0;
				$arp_general_options['column_settings']['enable_hover_effect']   = 1;
				$arp_general_options['column_settings']['enable_hover_effect']   = 1;

				$new_general_options = $this->arprice_recursive_array_function( $arp_general_options, 'export' );

				$general_opt = serialize( $new_general_options );

				$xml .= '<![CDATA[' . $general_opt . ']]>';

				$xml .= "</general_options>\n";

				$sql = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'arplite_arprice_options WHERE table_id = %d', $result->ID ) );

				$xml .= "\t\t\t<column_options>";

				$table_opts = unserialize( $sql[0]->table_options );

				$ref_temp_coptions = '';
				if ( $ref_template_id ) {
					   $sql_template_codata = $wpdb->get_results( 'SELECT table_options FROM ' . $wpdb->prefix . 'arp_arprice_options WHERE table_id =' . $ref_template_id );

					if ( isset( $sql_template_codata[0]->table_options ) ) {
							  $ref_temp_coptions = maybe_unserialize( $sql_template_codata[0]->table_options );
					}
				}

				if ( isset( $ref_temp_coptions ) && $ref_temp_coptions != '' ) {
					$table_opts = array_unique( array_merge( $ref_temp_coptions, $table_opts ), SORT_REGULAR );

				}
				$table_opts['columns']['column_0']['is_post_variables'] = 0;
				$table_opts['columns']['column_1']['is_post_variables'] = 0;
				$table_opts['columns']['column_2']['is_post_variables'] = 0;
				$table_opts['columns']['column_3']['is_post_variables'] = 0;
				$table_opts['columns']['column_4']['is_post_variables'] = 0;
				$arp_tbl_opt = array();

				$new_array = $this->arprice_recursive_array_function( $table_opts, 'export' );

				$table_opts = serialize( $new_array );

				$xml .= '<![CDATA[' . $table_opts . ']]>';

				$xml .= "</column_options>\n";

				$xml .= "\t\t</options>\n";

				$table_opt = unserialize( $sql[0]->table_options );

				foreach ( $table_opt['columns'] as $c => $res ) {
					$str = isset( $res['arp_header_shortcode'] ) ? $res['arp_header_shortcode'] : '';

					$btn_img = isset( $res['btn_img'] ) ? $res['btn_img'] : '';

					if ( $btn_img != '' ) {
						$btn_img_src   = $btn_img;
						$img_file_name = explode( '/', $btn_img_src );
						$btn_img_file  = $img_file_name[ count( $img_file_name ) - 1 ];

						$arpfileobj = new ARPFilecontroller( $btn_img, true );

						$arpfileobj->check_cap = true;
						$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

						$arpfileobj->check_nonce = true;
						$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
						$arpfileobj->nonce_action = 'arprice_wp_nonce';

						$arpfileobj->check_only_image = true;

						$destination = $upload_dir . 'temp_' . $btn_img_file;

						$arpfileobj->arp_process_upload( $destination );

						if ( file_exists( $upload_dir . 'temp_' . $btn_img_file ) ) {

							$filename_arry[] = 'temp_' . $btn_img_file;

							$button_img = 'temp_' . $file_name;

							$xml .= "\t\t<" . $c . '_btn_img>' . $btn_img_src . '</' . $c . "_btn_img>\n";
						}
					}

					if ( $str != '' ) {

						$header_img = esc_html( stristr( $str, '<img' ) );

						if ( $header_img != '' ) {
							$img_src = $arprice_import_export->getAttribute( 'src', $str );

							$img_height = $arprice_import_export->getAttribute( 'height', $header_img );

							$img_width = $arprice_import_export->getAttribute( 'width', $header_img );

							$img_class = $arprice_import_export->getAttribute( 'class', $header_img );

							$img_src    = trim( $img_src, '&quot;' );
							$img_src    = trim( $img_src, '"' );
							$img_height = trim( $img_height, '&quot;' );
							$img_height = trim( $img_height, '"' );
							$img_width  = trim( $img_width, '&quot;' );
							$img_width  = trim( $img_width, '"' );
							$img_class  = trim( $img_class, '&quot;' );
							$img_class  = trim( $img_class, '"' );

							$img_height = ( ! empty( $img_height ) ) ? $img_height : '';
							$img_width  = ( ! empty( $img_width ) ) ? $img_width : '';
							$img_class  = ( ! empty( $img_class ) ) ? $img_class : '';
							$img_src    = ( ! empty( $img_src ) ) ? $img_src : '';

							$explodefilename = explode( '/', $img_src );

							$header_img_name = $explodefilename[ count( $explodefilename ) - 1 ];

							$header_img = $header_img_name;

							if ( $header_img != '' ) {
								$newfilename1 = $header_img;

								$arpfileobj = new ARPFilecontroller( $img_src, true );

								$arpfileobj->check_cap = true;
								$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

								$arpfileobj->check_nonce = true;
								$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
								$arpfileobj->nonce_action = 'arprice_wp_nonce';

								$arpfileobj->check_only_image = true;

								$destination = $upload_dir . 'temp_' . $newfilename1;

								$arpfileobj->arp_process_upload( $destination );

								if ( file_exists( $upload_dir . 'temp_' . $newfilename1 ) ) {

									$filename_arry[] = 'temp_' . $newfilename1;

									$header_img = 'temp_' . $newfilename1;
								}
							}

							if ( file_exists( $upload_dir . 'temp_' . $newfilename1 ) ) {

								$xml .= "\t\t<" . $c . '_img>' . $img_src . '</' . $c . "_img>\n";

								$xml .= "\t\t<" . $c . '_img_width>' . $img_width . '</' . $c . "_img_width>\n";

								$xml .= "\t\t<" . $c . '_img_height>' . $img_height . '</' . $c . "_img_height>\n";

								$xml .= "\t\t<" . $c . '_img_class>' . $img_class . '</' . $c . "_img_class>\n";
							}
						}
					}
				}

				$xml .= "\t</arplite_table>\n\n";
			}

					$xml .= '</arplite>';

					$xml = base64_encode( $xml );

					$this->arp_import_lite_table_in_price( $xml );

		}
		exit;
	}

	function arp_import_lite_table_in_price( $xml_content ) {
		if ( $xml_content ) {

			global $wpdb, $arprice_images_css_version, $arp_pricingtable, $arprice_import_export;
				$_SESSION['arprice_image_array'] = array();
				WP_Filesystem();
				$table     = $wpdb->prefix . 'arp_arprice';
				$table_opt = $wpdb->prefix . 'arp_arprice_options';
				@ini_set( 'max_execution_time', 0 );
				$wp_upload_dir = wp_upload_dir();

				$output_url = $wp_upload_dir['baseurl'] . '/arprice/';
				$output_dir = $wp_upload_dir['basedir'] . '/arprice/';

				$upload_dir_path = $wp_upload_dir['basedir'] . '/arprice/';
				$upload_dir_url  = $wp_upload_dir['baseurl'] . '/arprice/';

				$xml = base64_decode( $xml_content );
				$xml = simplexml_load_string( $xml );

				$ik = 1;

			if ( isset( $xml->arplite_table ) ) {
				$j = 1;
				foreach ( $xml->children() as $key_main => $val_main ) {
					$attr                   = $val_main->attributes();
					$old_id                 = $attr['id'];
					$status                 = $val_main->status;
					$is_template            = $val_main->is_template;
					$template_name          = $val_main->template_name;
					$is_animated            = $val_main->is_animated;
					$arprice_import_version = $val_main->arp_plugin_version;

					$new_column_order = array();
					$new_edited_cols  = array();
					$table_name       = $val_main->arp_table_name;

					$arp_template_css = $val_main->arp_template_css;

					$arp_template_img       = $val_main->arp_template_img;
					$arp_template_img_big   = $val_main->arp_template_img_big;
					$arp_template_img_large = $val_main->arp_template_img_large;

					$date = current_time( 'mysql' );
					foreach ( $val_main->options->children() as $key => $val ) {

						if ( $key == 'general_options' ) {
							$general_options = (string) $val;

							$general_options_new = unserialize( $general_options );

							$arp_main_reference_template = $general_options_new['general_settings']['reference_template'];

							if ( isset( $general_options_new['tooltip_settings']['tooltip_informative_icon'] ) ) {
								$value = $general_options_new['tooltip_settings']['tooltip_informative_icon'];
								if ( $value != '' ) {
									$general_options_new['tooltip_settings']['tooltip_informative_icon'] = $this->update_fa_font_class( $value );
								}
							}

							if ( version_compare( $arprice_import_version, '2.0', '<' ) ) {

								$general_options_new['column_settings']['arp_load_first_time_after_migration'] = 1;
								$general_options_new['column_settings']['column_wrapper_width_txtbox']         = 1000;

								$general_options_new['column_settings']['display_col_mobile'] = 1;
								$general_options_new['column_settings']['display_col_tablet'] = 3;

								$general_options_new['column_animation']['pagi_nav_btn'] = 'pagination_bottom';
								$general_options_new['column_animation']['navi_nav_btn'] = 'navigation';

								$col_hover_effect = $general_options_new['column_settings']['column_highlight_on_hover'];
								if ( $col_hover_effect == '0' ) {
									$general_options_new['column_settings']['column_highlight_on_hover'] = 'hover_effect';
								} elseif ( $col_hover_effect == '1' ) {
									$general_options_new['column_settings']['column_highlight_on_hover'] = 'shadow_effect';
								} else {
									$general_options_new['column_settings']['column_highlight_on_hover'] = 'no_effect';
								}

								$general_options_new['column_settings']['column_box_shadow_effect'] = 'shadow_style_none';
								if ( $arp_main_reference_template == 'arptemplate_2' ) {
									$general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 7;
								} elseif ( $arp_main_reference_template == 'arptemplate_23' ) {
									$general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 6;
								} elseif ( $arp_main_reference_template == 'arptemplate_22' ) {
									$general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 4;
								} else {
									$general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 0;
								}

								$general_options_new['tooltip_settings']['tooltip_trigger_type']  = 'hover';
								$general_options_new['tooltip_settings']['tooltip_display_style'] = 'default';
							}

							$arp_custom_css = isset( $general_options_new['general_settings']['arp_custom_css'] ) ? $general_options_new['general_settings']['arp_custom_css'] : '';

							$reference_template = $general_options_new['general_settings']['reference_template'];

							if ( version_compare( $arprice_import_version, '3.0', '<' ) ) {
								$toggle_yearly_text    = $general_options_new['general_settings']['togglestep_yearly'];
								$toggle_monthly_text   = $general_options_new['general_settings']['togglestep_monthly'];
								$toggle_quarterly_text = $general_options_new['general_settings']['togglestep_quarterly'];

								if ( $toggle_yearly_text != '' ) {
									$general_options_new['general_settings']['togglestep_yearly'] = $this->update_fa_font_class( $toggle_yearly_text );
								}

								if ( $toggle_monthly_text != '' ) {
									$general_options_new['general_settings']['togglestep_monthly'] = $this->update_fa_font_class( $toggle_monthly_text );
								}

								if ( $toggle_quarterly_text != '' ) {
									$general_options_new['general_settings']['togglestep_quarterly'] = $this->update_fa_font_class( $toggle_quarterly_text );
								}
							} else {
								$toggle_yearly_text    = $general_options_new['general_settings']['togglestep_yearly'];
								$toggle_monthly_text   = $general_options_new['general_settings']['togglestep_monthly'];
								$toggle_quarterly_text = $general_options_new['general_settings']['togglestep_quarterly'];
								$toggle_weekly_text    = $general_options_new['general_settings']['togglestep_weekly'];
								$toggle_daily_text     = $general_options_new['general_settings']['togglestep_daily'];
								$toggle_step6_text     = $general_options_new['general_settings']['togglestep_step6'];
								$toggle_step7_text     = $general_options_new['general_settings']['togglestep_step7'];
								$toggle_step8_text     = $general_options_new['general_settings']['togglestep_step8'];

								if ( $toggle_yearly_text != '' ) {
									$general_options_new['general_settings']['togglestep_yearly'] = $this->update_fa_font_class( $toggle_yearly_text );
								}

								if ( $toggle_monthly_text != '' ) {
									$general_options_new['general_settings']['togglestep_monthly'] = $this->update_fa_font_class( $toggle_monthly_text );
								}

								if ( $toggle_quarterly_text != '' ) {
									$general_options_new['general_settings']['togglestep_quarterly'] = $this->update_fa_font_class( $toggle_quarterly_text );
								}

								if ( $toggle_weekly_text != '' ) {
									$general_options_new['general_settings']['togglestep_weekly'] = $this->update_fa_font_class( $toggle_weekly_text );
								}

								if ( $toggle_daily_text != '' ) {
									$general_options_new['general_settings']['togglestep_daily'] = $this->update_fa_font_class( $toggle_daily_text );
								}

								if ( $toggle_step6_text != '' ) {
									$general_options_new['general_settings']['togglestep_step6'] = $this->update_fa_font_class( $toggle_step6_text );
								}

								if ( $toggle_step7_text != '' ) {
									$general_options_new['general_settings']['togglestep_step7'] = $this->update_fa_font_class( $toggle_step7_text );
								}

								if ( $toggle_step8_text != '' ) {
									$general_options_new['general_settings']['togglestep_step8'] = $this->update_fa_font_class( $toggle_step8_text );
								}
							}

							$general_options_new = $this->arprice_recursive_array_function( $general_options_new, 'import' );

							$new_column_order = json_decode( $general_options_new['general_settings']['column_order'] );
							$new_edited_cols  = $general_options_new['general_settings']['user_edited_columns'];
							$general_options  = serialize( $general_options_new );

						} elseif ( $key == 'column_options' ) {

							$column_options = (string) $val;

							$column_opts = unserialize( $column_options );

							$total_tabs = $arp_pricingtable->arp_toggle_step_name();

							$column_opts = $this->arprice_recursive_array_function( $column_opts, 'import' );

							foreach ( $column_opts['columns'] as $c => $columns ) {

								$g = 0;
								foreach ( $total_tabs as $k => $tab_name ) {
									if ( $g == 0 ) {
										$columns['package_title']        = isset( $columns['package_title'] ) ? $this->update_fa_font_class( $columns['package_title'] ) : '';
										$columns['arp_header_shortcode'] = isset( $columns['arp_header_shortcode'] ) ? $this->update_fa_font_class( $columns['arp_header_shortcode'] ) : '';
										$columns['price_text']           = isset( $columns['price_text'] ) ? $this->update_fa_font_class( $columns['price_text'] ) : '';
										$columns['column_description']   = isset( $columns['column_description'] ) ? $this->update_fa_font_class( $columns['column_description'] ) : '';
										$columns['button_text']          = isset( $columns['button_text'] ) ? $this->update_fa_font_class( $columns['button_text'] ) : '';
									} else {
										$columns[ 'package_title_' . $tab_name[2] ]        = isset( $columns[ 'package_title_' . $tab_name[2] ] ) ? $this->update_fa_font_class( $columns[ 'package_title_' . $tab_name[2] ] ) : '';
										$columns[ 'arp_header_shortcode_' . $tab_name[2] ] = isset( $columns[ 'arp_header_shortcode_' . $tab_name[2] ] ) ? $this->update_fa_font_class( $columns[ 'arp_header_shortcode_' . $tab_name[2] ] ) : '';
										$columns[ 'price_text_' . $tab_name[3] . '_step' ] = isset( $columns[ 'price_text_' . $tab_name[3] . '_step' ] ) ? $this->update_fa_font_class( $columns[ 'price_text_' . $tab_name[3] . '_step' ] ) : '';
										$columns[ 'column_description_' . $tab_name[2] ]   = isset( $columns[ 'column_description_' . $tab_name[2] ] ) ? $this->update_fa_font_class( $columns[ 'column_description_' . $tab_name[2] ] ) : '';
										$columns[ 'btn_content_' . $tab_name[2] ]          = isset( $columns[ 'btn_content_' . $tab_name[2] ] ) ? $this->update_fa_font_class( $columns[ 'btn_content_' . $tab_name[2] ] ) : '';
									}
									$g++;
								}

								$column_opts['columns'][ $c ] = $columns;

								$g = 0;
								foreach ( $total_tabs as $k => $tab_name ) {
									if ( $g == 0 ) {
										$column_opts['columns'][ $c ]['html_content']         = isset( $columns['html_content'] ) ? $this->arprice_copy_image_from_content( $columns['html_content'] ) : '';
										$column_opts['columns'][ $c ]['package_title']        = isset( $columns['package_title'] ) ? $this->arprice_copy_image_from_content( $columns['package_title'] ) : '';
										$column_opts['columns'][ $c ]['price_text']           = isset( $columns['price_text'] ) ? $this->arprice_copy_image_from_content( $columns['price_text'] ) : '';
										$column_opts['columns'][ $c ]['arp_header_shortcode'] = isset( $columns['arp_header_shortcode'] ) ? $this->arprice_copy_image_from_content( $columns['arp_header_shortcode'] ) : '';
										$column_opts['columns'][ $c ]['column_description']   = isset( $columns['column_description'] ) ? $this->arprice_copy_image_from_content( $columns['column_description'] ) : '';

									} else {
										$column_opts['columns'][ $c ][ 'html_content_' . $tab_name[2] ]         = isset( $columns[ 'html_content_' . $tab_name[2] ] ) ? $this->arprice_copy_image_from_content( $columns[ 'html_content_' . $tab_name[2] ] ) : '';
										$column_opts['columns'][ $c ][ 'package_title_' . $tab_name[2] ]        = isset( $columns[ 'package_title_' . $tab_name[2] ] ) ? $this->arprice_copy_image_from_content( $columns[ 'package_title_' . $tab_name[2] ] ) : '';
										$column_opts['columns'][ $c ][ 'price_text_' . $tab_name[3] . '_step' ] = isset( $columns[ 'price_text_' . $tab_name[3] . '_step' ] ) ? $this->arprice_copy_image_from_content( $columns[ 'price_text_' . $tab_name[3] . '_step' ] ) : '';
										$column_opts['columns'][ $c ][ 'arp_header_shortcode_' . $tab_name[2] ] = isset( $columns[ 'arp_header_shortcode_' . $tab_name[2] ] ) ? $this->arprice_copy_image_from_content( $columns[ 'arp_header_shortcode_' . $tab_name[2] ] ) : '';
										$column_opts['columns'][ $c ][ 'column_description_' . $tab_name[2] ]   = isset( $columns[ 'column_description_' . $tab_name[2] ] ) ? $this->arprice_copy_image_from_content( $columns[ 'column_description_' . $tab_name[2] ] ) : '';
									}
									$g++;
								}

								if ( isset( $columns['rows'] ) && is_array( $columns['rows'] ) && count( $columns['rows'] ) > 0 ) {

									foreach ( $columns['rows'] as $r => $row ) {

										$g = 0;
										foreach ( $total_tabs as $key => $tab_name ) {

											if ( $g == 0 ) {
												$row['row_description']                                        = $this->update_fa_font_class( $row['row_description'] );
												$column_opts['columns'][ $c ]['rows'][ $r ]['row_description'] = $this->arprice_copy_image_from_content( $row['row_description'] );
												$column_opts['columns'][ $c ]['rows'][ $r ]['row_tooltip']     = isset( $row['row_tooltip'] ) ? $this->arprice_copy_image_from_content( $row['row_tooltip'] ) : '';
											} else {
												$row[ 'row_description_' . $tab_name[2] ]                                        = isset( $row[ 'row_description_' . $tab_name[2] ] ) ? $this->update_fa_font_class( $row[ 'row_description_' . $tab_name[2] ] ) : '';
												$column_opts['columns'][ $c ]['rows'][ $r ][ 'row_description_' . $tab_name[2] ] = isset( $row[ 'row_description_' . $tab_name[2] ] ) ? $this->arprice_copy_image_from_content( $row[ 'row_description_' . $tab_name[2] ] ) : '';
												$column_opts['columns'][ $c ]['rows'][ $r ][ 'row_tooltip_' . $tab_name[2] ]     = isset( $row[ 'row_tooltip_' . $tab_name[2] ] ) ? $this->arprice_copy_image_from_content( $row[ 'row_tooltip_' . $tab_name[2] ] ) : '';
											}

											$g++;
										}
									}
								}

								$g = 0;
								foreach ( $total_tabs as $key => $tab_name ) {

									if ( $g == 0 ) {
										$column_opts['columns'][ $c ]['footer_content'] = isset( $columns['footer_content'] ) ? $this->arprice_copy_image_from_content( $columns['footer_content'] ) : '';
										$column_opts['columns'][ $c ]['button_text']    = isset( $columns['button_text'] ) ? $this->arprice_copy_image_from_content( $columns['button_text'] ) : '';
									} else {
										$column_opts['columns'][ $c ][ 'footer_content_' . $tab_name[2] ] = isset( $columns[ 'footer_content_' . $tab_name[2] ] ) ? $this->arprice_copy_image_from_content( $columns[ 'footer_content_' . $tab_name[2] ] ) : '';
										$column_opts['columns'][ $c ][ 'btn_text_' . $tab_name[2] ]       = isset( $columns[ 'btn_text_' . $tab_name[2] ] ) ? $this->arprice_copy_image_from_content( $columns[ 'btn_text_' . $tab_name[2] ] ) : '';
									}

									$g++;
								}

								$g = 0;
								foreach ( $total_tabs as $key => $tab_name ) {

									$header_img = ( $g == 0 ) ? $c . '_img' : $c . '_img_' . $tab_name[2];

									if ( $val_main->$header_img ) {

									}
									$g++;
								}

								$header_img        = $c . '_img';
								$header_img_second = $c . '_img_second';
								$header_img_third  = $c . '_img_third';

								$btn_img           = $c . '_btn_img';
								$column_back_image = $c . '_background_image';

								$gmap_marker = $c . '_gmap_marker';

								$html5_mp4_video        = $c . '_html5_mp4_video';
								$html5_mp4_video_second = $c . '_html5_mp4_video_second';
								$html5_mp4_video_third  = $c . '_html5_mp4_video_third';

								$html5_webm_video        = $c . '_html5_webm_video';
								$html5_webm_video_second = $c . '_html5_webm_video_second';
								$html5_webm_video_third  = $c . '_html5_webm_video_third';

								$html5_ogg_video        = $c . '_html5_ogg_video';
								$html5_ogg_video_second = $c . '_html5_ogg_video_second';
								$html5_ogg_video_third  = $c . '_html5_ogg_video_third';

								$html5_video_poster        = $c . '_html5_video_poster';
								$html5_video_poster_second = $c . '_html5_video_poster_second';
								$html5_video_poster_third  = $c . '_html5_video_poster_third';

								$html5_mp3_audio        = $c . '_html5_mp3_audio';
								$html5_mp3_audio_second = $c . '_html5_mp3_audio_second';
								$html5_mp3_audio_third  = $c . '_html5_mp3_audio_third';

								$html5_ogg_audio        = $c . '_html5_ogg_audio';
								$html5_ogg_audio_second = $c . '_html5_ogg_audio_second';
								$html5_ogg_audio_third  = $c . '_html5_ogg_audio_third';

								$html5_wav_audio        = $c . '_html5_wav_audio';
								$html5_wav_audio_second = $c . '_html5_wav_audio_second';
								$html5_wav_audio_third  = $c . '_html5_wav_audio_third';

								if ( $val_main->$header_img != '' ) {
									$header_image = $c . '_img';
									$image_width  = $c . '_img_width';
									$image_height = $c . '_img_height';
									$img_class    = $c . '_img_class';
									$image        = $val_main->$header_image;
									$img_name     = explode( '/', $image );
									$img_nm       = $img_name[ count( $img_name ) - 1 ];
									$img_name     = 'arp_' . time() . '_' . $img_nm;

									$base_url = trim( $image );
									$new_path = $upload_dir_path . $img_name;
									$new_url  = $upload_dir_url . $img_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
									} else {
										$arpfileobj = new ARPFilecontroller( $base_url, true );

										$arpfileobj->check_cap = true;
										$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

										$arpfileobj->check_nonce = true;
										$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
										$arpfileobj->nonce_action = 'arprice_wp_nonce';

										$arpfileobj->check_only_images = true;

										$arpfileobj->arp_process_upload( $new_path );
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}
									$html = "<img src='" . $new_url . "'";
									if ( isset( $val_main->$image_height ) and ! empty( $val_main->$image_height ) ) {
										$html .= " height='" . $val_main->$image_height . "'";
									}
									if ( isset( $val_main->$image_width ) and ! empty( $val_main->$image_width ) ) {
										$html .= " width='" . $val_main->$image_width . "'";
									}

									if ( isset( $val_main->$img_class ) and ! empty( $val_main->$img_class ) ) {
										$html .= " class='" . $val_main->$img_class . "'";
									}
									$html .= ' >';
									$column_opts['columns'][ $c ]['arp_header_shortcode'] = $html;
								}
								if ( $val_main->$header_img_second != '' ) {
									$header_image = $c . '_img_second';
									$image_width  = $c . '_img_second_width';
									$image_height = $c . '_img_second_height';
									$img_class    = $c . '_img_second_class';
									$image        = $val_main->$header_img_second;
									$img_name     = explode( '/', $image );
									$img_nm       = $img_name[ count( $img_name ) - 1 ];
									$img_name     = 'arp_' . time() . '_' . $img_nm;

									$base_url = trim( $image );
									$new_path = $upload_dir_path . $img_name;
									$new_url  = $upload_dir_url . $img_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
									} else {
										$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$html = "<img src='" . $new_url . "'";
									if ( isset( $val_main->$image_height ) and ! empty( $val_main->$image_height ) ) {
										$html .= " height='" . $val_main->$image_height . "'";
									}
									if ( isset( $val_main->$image_width ) and ! empty( $val_main->$image_width ) ) {
										$html .= " width='" . $val_main->$image_width . "'";
									}
									if ( isset( $val_main->$img_class ) and ! empty( $val_main->$img_class ) ) {
										$html .= " class='" . $val_main->$img_class . "'";
									}
									$html .= ' >';
									$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $html;
								}
								if ( $val_main->$header_img_third != '' ) {
									$header_image = $c . '_img_third';
									$image_width  = $c . '_img_third_width';
									$image_height = $c . '_img_third_height';
									$img_class    = $c . '_img_third_class';
									$image        = $val_main->$header_img_third;
									$img_name     = explode( '/', $image );
									$img_nm       = $img_name[ count( $img_name ) - 1 ];
									$img_name     = 'arp_' . time() . '_' . $img_nm;

									$base_url = trim( $image );
									$new_path = $upload_dir_path . $img_name;
									$new_url  = $upload_dir_url . $img_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
									} else {
										$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$html = "<img src='" . $new_url . "'";
									if ( isset( $val_main->$image_height ) and ! empty( $val_main->$image_height ) ) {
										$html .= " height='" . $val_main->$image_height . "'";
									}
									if ( isset( $val_main->$image_width ) and ! empty( $val_main->$image_width ) ) {
										$html .= " width='" . $val_main->$image_width . "'";
									}
									if ( isset( $val_main->$img_class ) and ! empty( $val_main->$img_class ) ) {
										$html .= " class='" . $val_main->$img_class . "'";
									}
									$html .= ' >';
									$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $html;
								}

								if ( $val_main->$gmap_marker != '' ) {
									$gmap_img      = $c . '_gmap_marker';
									$gmap_image    = $val_main->$gmap_img;
									$gmap_img_nm   = explode( '/', $gmap_image );
									$gmap_img_nm   = $gmap_img_nm[ count( $gmap_img_nm ) - 1 ];
									$gmap_img_name = 'arp_' . time() . '_' . $gmap_img_nm;

									$base_url = trim( $gmap_image );
									$new_path = $upload_dir_path . $gmap_img_name;
									$new_url  = $upload_dir_url . $gmap_img_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
									} else {
										$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
									$dt = preg_replace( '#\s(marker_image)="[^"]+"#', ' marker_image="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
								}

								if ( $val_main->$html5_mp4_video != '' ) {
									$html5_mp4_video   = $c . '_html5_mp4_video';
									$h5_mp4_video      = $val_main->$html5_mp4_video;
									$h5_mp4_video_nm   = explode( '/', $h5_mp4_video );
									$h5_mp4_video_nm   = $h5_mp4_video_nm[ count( $h5_mp4_video_nm ) - 1 ];
									$h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;

									$base_url = trim( $h5_mp4_video );
									$new_path = $upload_dir_path . $h5_mp4_video_name;
									$new_url  = $upload_dir_url . $h5_mp4_video_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
									$dt = preg_replace( '#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
									$column_opts['columns'][ $c ]['arp_header_shortcode'];
								}
								if ( $val_main->$html5_mp4_video_second != '' ) {
									$html5_mp4_video   = $c . '_html5_mp4_video_second';
									$h5_mp4_video      = $val_main->$html5_mp4_video_second;
									$h5_mp4_video_nm   = explode( '/', $h5_mp4_video );
									$h5_mp4_video_nm   = $h5_mp4_video_nm[ count( $h5_mp4_video_nm ) - 1 ];
									$h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;

									$base_url = trim( $h5_mp4_video );
									$new_path = $upload_dir_path . $h5_mp4_video_name;
									$new_url  = $upload_dir_url . $h5_mp4_video_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
									$dt = preg_replace( '#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
								}
								if ( $val_main->$html5_mp4_video_third != '' ) {
									$html5_mp4_video   = $c . '_html5_mp4_video_third';
									$h5_mp4_video      = $val_main->$html5_mp4_video_third;
									$h5_mp4_video_nm   = explode( '/', $h5_mp4_video );
									$h5_mp4_video_nm   = $h5_mp4_video_nm[ count( $h5_mp4_video_nm ) - 1 ];
									$h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;

									$base_url = trim( $h5_mp4_video );
									$new_path = $upload_dir_path . $h5_mp4_video_name;
									$new_url  = $upload_dir_url . $h5_mp4_video_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
									$dt = preg_replace( '#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
								}

								if ( $val_main->$html5_webm_video != '' ) {
									$html5_webm_video   = $c . '_html5_webm_video';
									$h5_webm_video      = $val_main->$html5_webm_video;
									$h5_webm_video_nm   = explode( '/', $h5_webm_video );
									$h5_webm_video_nm   = $h5_webm_video_nm[ count( $h5_webm_video_nm ) - 1 ];
									$h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

									$base_url = trim( $h5_webm_video );
									$new_path = $upload_dir_path . $h5_webm_video_name;
									$new_url  = $upload_dir_url . $h5_webm_video_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
									$dt = preg_replace( '#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
								}
								if ( $val_main->$html5_webm_video_second != '' ) {
									$html5_webm_video   = $c . '_html5_webm_video_second';
									$h5_webm_video      = $val_main->$html5_webm_video_second;
									$h5_webm_video_nm   = explode( '/', $h5_webm_video );
									$h5_webm_video_nm   = $h5_webm_video_nm[ count( $h5_webm_video_nm ) - 1 ];
									$h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

									$base_url = trim( $h5_webm_video );
									$new_path = $upload_dir_path . $h5_webm_video_name;
									$new_url  = $upload_dir_url . $h5_webm_video_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
									$dt = preg_replace( '#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
								}
								if ( $val_main->$html5_webm_video_third != '' ) {
									$html5_webm_video   = $c . '_html5_webm_video_third';
									$h5_webm_video      = $val_main->$html5_webm_video_third;
									$h5_webm_video_nm   = explode( '/', $h5_webm_video );
									$h5_webm_video_nm   = $h5_webm_video_nm[ count( $h5_webm_video_nm ) - 1 ];
									$h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

									$base_url = trim( $h5_webm_video );
									$new_path = $upload_dir_path . $h5_webm_video_name;
									$new_url  = $upload_dir_url . $h5_webm_video_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
									$dt = preg_replace( '#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
								}

								if ( $val_main->$html5_ogg_video != '' ) {
									$html5_ogg_video   = $c . '_html5_ogg_video';
									$h5_ogg_video      = $val_main->$html5_ogg_video;
									$h5_ogg_video_nm   = explode( '/', $h5_ogg_video );
									$h5_ogg_video_nm   = $h5_ogg_video_nm[ count( $h5_ogg_video_nm ) - 1 ];
									$h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

									$base_url = trim( $h5_ogg_video );
									$new_path = $upload_dir_path . $h5_ogg_video_name;
									$new_url  = $upload_dir_url . $h5_ogg_video_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
									$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
								}
								if ( $val_main->$html5_ogg_video_second != '' ) {
									$html5_ogg_video   = $c . '_html5_ogg_video_second';
									$h5_ogg_video      = $val_main->$html5_ogg_video_second;
									$h5_ogg_video_nm   = explode( '/', $h5_ogg_video );
									$h5_ogg_video_nm   = $h5_ogg_video_nm[ count( $h5_ogg_video_nm ) - 1 ];
									$h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

									$base_url = trim( $h5_ogg_video );
									$new_path = $upload_dir_path . $h5_ogg_video_name;
									$new_url  = $upload_dir_url . $h5_ogg_video_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
									$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
								}
								if ( $val_main->$html5_ogg_video_third != '' ) {
									$html5_ogg_video   = $c . '_html5_ogg_video_third';
									$h5_ogg_video      = $val_main->$html5_ogg_video_third;
									$h5_ogg_video_nm   = explode( '/', $h5_ogg_video );
									$h5_ogg_video_nm   = $h5_ogg_video_nm[ count( $h5_ogg_video_nm ) - 1 ];
									$h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

									$base_url = trim( $h5_ogg_video );
									$new_path = $upload_dir_path . $h5_ogg_video_name;
									$new_url  = $upload_dir_url . $h5_ogg_video_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}
									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
									$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
								}

								if ( $val_main->$html5_video_poster != '' ) {
									$html5_video_poster   = $c . '_html5_video_poster';
									$h5_video_poster      = $val_main->$html5_video_poster;
									$h5_video_poster_nm   = explode( '/', $h5_video_poster );
									$h5_video_poster_nm   = $h5_video_poster_nm[ count( $h5_video_poster_nm ) - 1 ];
									$h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

									$base_url = trim( $h5_video_poster );
									$new_path = $upload_dir_path . $h5_video_poster_name;
									$new_url  = $upload_dir_url . $h5_video_poster_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
									} else {
										$arpfileobj = new ARPFilecontroller( $base_url, true );

										$arpfileobj->check_cap = true;
										$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

										$arpfileobj->check_nonce = true;
										$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
										$arpfileobj->nonce_action = 'arprice_wp_nonce';

										$arpfileobj->check_only_images = true;

										$arpfileobj->arp_process_upload( $new_path );
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
									$dt = preg_replace( '#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
								}
								if ( $val_main->$html5_video_poster_second != '' ) {
									$html5_video_poster   = $c . '_html5_video_poster_second';
									$h5_video_poster      = $val_main->$html5_video_poster_second;
									$h5_video_poster_nm   = explode( '/', $h5_video_poster );
									$h5_video_poster_nm   = $h5_video_poster_nm[ count( $h5_video_poster_nm ) - 1 ];
									$h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

									$base_url = trim( $h5_video_poster );
									$new_path = $upload_dir_path . $h5_video_poster_name;
									$new_url  = $upload_dir_url . $h5_video_poster_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
									} else {
										$arpfileobj = new ARPFilecontroller( $base_url, true );

										$arpfileobj->check_cap = true;
										$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

										$arpfileobj->check_nonce = true;
										$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
										$arpfileobj->nonce_action = 'arprice_wp_nonce';

										$arpfileobj->check_only_images = true;

										$arpfileobj->arp_process_upload( $new_path );
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}
									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
									$dt = preg_replace( '#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
								}
								if ( $val_main->$html5_video_poster_third != '' ) {
									$html5_video_poster   = $c . '_html5_video_poster_third';
									$h5_video_poster      = $val_main->$html5_video_poster_third;
									$h5_video_poster_nm   = explode( '/', $h5_video_poster );
									$h5_video_poster_nm   = $h5_video_poster_nm[ count( $h5_video_poster_nm ) - 1 ];
									$h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

									$base_url = trim( $h5_video_poster );
									$new_path = $upload_dir_path . $h5_video_poster_name;
									$new_url  = $upload_dir_url . $h5_video_poster_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
									} else {
										$arpfileobj = new ARPFilecontroller( $base_url, true );

										$arpfileobj->check_cap = true;
										$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

										$arpfileobj->check_nonce = true;
										$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
										$arpfileobj->nonce_action = 'arprice_wp_nonce';

										$arpfileobj->check_only_images = true;

										$arpfileobj->arp_process_upload( $new_path );
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
									$dt = preg_replace( '#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
								}

								if ( $val_main->$html5_mp3_audio != '' ) {
									$h5_mp3_audio      = $val_main->$html5_mp3_audio;
									$h5_mp3_audio_nm   = explode( '/', $h5_mp3_audio );
									$h5_mp3_audio_nm   = $h5_mp3_audio_nm[ count( $h5_mp3_audio_nm ) - 1 ];
									$h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

									$base_url = trim( $h5_mp3_audio );
									$new_path = $upload_dir_path . $h5_mp3_audio_name;
									$new_url  = $upload_dir_url . $h5_mp3_audio_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}
									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
									$dt = preg_replace( '#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
								}
								if ( $val_main->$html5_mp3_audio_second != '' ) {
									$h5_mp3_audio      = $val_main->$html5_mp3_audio_second;
									$h5_mp3_audio_nm   = explode( '/', $h5_mp3_audio );
									$h5_mp3_audio_nm   = $h5_mp3_audio_nm[ count( $h5_mp3_audio_nm ) - 1 ];
									$h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

									$base_url = trim( $h5_mp3_audio );
									$new_path = $upload_dir_path . $h5_mp3_audio_name;
									$new_url  = $upload_dir_url . $h5_mp3_audio_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
									$dt = preg_replace( '#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
								}
								if ( $val_main->$html5_mp3_audio_third != '' ) {
									$h5_mp3_audio      = $val_main->$html5_mp3_audio_third;
									$h5_mp3_audio_nm   = explode( '/', $h5_mp3_audio );
									$h5_mp3_audio_nm   = $h5_mp3_audio_nm[ count( $h5_mp3_audio_nm ) - 1 ];
									$h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

									$base_url = trim( $h5_mp3_audio );
									$new_path = $upload_dir_path . $h5_mp3_audio_name;
									$new_url  = $upload_dir_url . $h5_mp3_audio_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
									$dt = preg_replace( '#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
								}

								if ( $val_main->$html5_ogg_audio != '' ) {
									$h5_ogg_audio      = $val_main->$html5_ogg_audio;
									$h5_ogg_audio_nm   = explode( '/', $h5_ogg_audio );
									$h5_ogg_audio_nm   = $h5_ogg_audio_nm[ count( $h5_ogg_audio_nm ) - 1 ];
									$h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

									$base_url = trim( $h5_ogg_audio );
									$new_path = $upload_dir_path . $h5_ogg_audio_name;
									$new_url  = $upload_dir_url . $h5_ogg_audio_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
									$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
								}
								if ( $val_main->$html5_ogg_audio_second != '' ) {
									$h5_ogg_audio      = $val_main->$html5_ogg_audio_second;
									$h5_ogg_audio_nm   = explode( '/', $h5_ogg_audio );
									$h5_ogg_audio_nm   = $h5_ogg_audio_nm[ count( $h5_ogg_audio_nm ) - 1 ];
									$h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

									$base_url = trim( $h5_ogg_audio );
									$new_path = $upload_dir_path . $h5_ogg_audio_name;
									$new_url  = $upload_dir_url . $h5_ogg_audio_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
									$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
								}
								if ( $val_main->$html5_ogg_audio_third != '' ) {
									$h5_ogg_audio      = $val_main->$html5_ogg_audio_third;
									$h5_ogg_audio_nm   = explode( '/', $h5_ogg_audio );
									$h5_ogg_audio_nm   = $h5_ogg_audio_nm[ count( $h5_ogg_audio_nm ) - 1 ];
									$h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

									$base_url = trim( $h5_ogg_audio );
									$new_path = $upload_dir_path . $h5_ogg_audio_name;
									$new_url  = $upload_dir_url . $h5_ogg_audio_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
									$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
								}

								if ( $val_main->$html5_wav_audio != '' ) {
									$h5_wav_audio      = $val_main->$html_wav_audio;
									$h5_wav_audio_nm   = explode( '/', $h5_wav_audio );
									$h5_wav_audio_nm   = $h5_wav_audio_nm[ count( $h5_wav_audio_nm ) - 1 ];
									$h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

									$base_url = trim( $h5_wav_audio );
									$new_path = $upload_dir_path . $h5_wav_audio_name;
									$new_url  = $upload_dir_url . $h5_wav_audio_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
									$dt = preg_replace( '#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
								}
								if ( $val_main->$html5_wav_audio_second != '' ) {
									$h5_wav_audio      = $val_main->$html_wav_audio_second;
									$h5_wav_audio_nm   = explode( '/', $h5_wav_audio );
									$h5_wav_audio_nm   = $h5_wav_audio_nm[ count( $h5_wav_audio_nm ) - 1 ];
									$h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

									$base_url = trim( $h5_wav_audio );
									$new_path = $upload_dir_path . $h5_wav_audio_name;
									$new_url  = $upload_dir_url . $h5_wav_audio_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
									$dt = preg_replace( '#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
								}
								if ( $val_main->$html5_wav_audio_third != '' ) {
									$h5_wav_audio      = $val_main->$html_wav_audio_third;
									$h5_wav_audio_nm   = explode( '/', $h5_wav_audio );
									$h5_wav_audio_nm   = $h5_wav_audio_nm[ count( $h5_wav_audio_nm ) - 1 ];
									$h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

									$base_url = trim( $h5_wav_audio );
									$new_path = $upload_dir_path . $h5_wav_audio_name;
									$new_url  = $upload_dir_url . $h5_wav_audio_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
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
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
									$dt = preg_replace( '#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt );
									$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
								}

								if ( $val_main->$btn_img != '' ) {
									$btn_image  = $c . '_btn_img';
									$button_img = $val_main->$btn_image;
									$image_name = explode( '/', $button_img );
									$image_nm   = $image_name[ count( $image_name ) - 1 ];
									$image_name = 'arp_' . time() . '_' . $image_nm;

									$base_url = trim( $button_img );
									$new_path = $upload_dir_path . $image_name;
									$new_url  = $upload_dir_url . $image_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
									} else {
										$arpfileobj = new ARPFilecontroller( $base_url, true );

										$arpfileobj->check_cap = true;
										$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

										$arpfileobj->check_nonce = true;
										$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
										$arpfileobj->nonce_action = 'arprice_wp_nonce';

										$arpfileobj->check_only_images = true;

										$arpfileobj->arp_process_upload( $new_path );
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$column_opts['columns'][ $c ]['btn_img'] = $new_url;
								}

								if ( $val_main->$column_back_image != '' ) {
									$col_image      = $c . '_background_image';
									$column_img     = $val_main->$column_back_image;
									$col_image_name = explode( '/', $column_img );
									$col_image_nm   = $col_image_name[ count( $col_image_name ) - 1 ];
									$col_image_name = 'arp_' . time() . '_' . $col_image_nm;

									$base_url = trim( $column_img );
									$new_path = $upload_dir_path . $col_image_name;
									$new_url  = $upload_dir_url . $col_image_name;
									if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
										$new_url = $_SESSION['arprice_image_array'][ $base_url ];
									} else {
										$arpfileobj = new ARPFilecontroller( $base_url, true );

										$arpfileobj->check_cap = true;
										$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

										$arpfileobj->check_nonce = true;
										$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
										$arpfileobj->nonce_action = 'arprice_wp_nonce';

										$arpfileobj->check_only_images = true;

										$arpfileobj->arp_process_upload( $new_path );
										$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
									}

									$column_opts['columns'][ $c ]['column_background_image'] = $new_url;
								}
							}

							$column_options = serialize( $column_opts );
						}
					}
					$general_options_new['general_settings']['column_order']        = json_encode( $new_column_order );
					$general_options_new['general_settings']['user_edited_columns'] = $new_edited_cols;

					$general_options = serialize( $general_options_new );
					$table_name      = (string) $table_name;
					$is_animated     = (string) $is_animated;
					$status          = (string) $status;

					$wpdb->query( $wpdb->prepare( 'INSERT INTO ' . $table . ' (table_name,general_options,is_template,is_animated,status,create_date,arp_last_updated_date) VALUES (%s,%s,%d,%d,%s,%s,%s)', $table_name, $general_options, 0, $is_animated, $status, $date, $date ) );

					$new_id = $wpdb->insert_id;

					$ref_id = str_replace( 'arptemplate_', '', $reference_template );

					if ( $ref_id >= 20 ) {
						$ref_id             = $ref_id - 3;
						$reference_template = 'arptemplate_' . $ref_id;
					}

					$file = PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css';

					$content = ARPFilecontroller::arp_get_file_content( $file );

					$css_content = preg_replace( '/arptemplate_([\d]+)/', 'arptemplate_' . $new_id, $content );

					$css_content = str_replace( '../../images', PRICINGTABLE_IMAGES_URL, $css_content );

					$css_file_name = 'arptemplate_' . $new_id . '.css';

					$template_img_name       = 'arptemplate_' . $new_id . '.png';
					$template_img_big_name   = 'arptemplate_' . $new_id . '_big.png';
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

					$wp_filesystem->put_contents( PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name, $css_content, 0777 );

					$wpdb->query( $wpdb->prepare( 'INSERT INTO ' . $table_opt . ' (table_id,table_options) VALUES (%d,%s)', $new_id, $column_options ) );
					$j++;
				}

				echo admin_url() . 'admin.php?page=arprice&arp_action=edit&eid=' . $new_id;
			} elseif ( ! isset( $xml->arplite_table ) ) {
				echo 0;
			}
					unset( $_SESSION['arprice_image_array'] );

		}
	}

	function arp_export_pricing_tables() {

		if ( is_admin() ) {

			if ( isset( $_POST['export_tables'] ) && ( $_REQUEST['page'] = 'arp_import_export' || $_REQUEST['page'] = 'arprice' ) ) {
				global $wpdb, $arprice_import_export, $arp_pricingtable;

				$arp_db_version = get_option( 'arprice_version' );

				$wp_upload_dir       = wp_upload_dir();
				$upload_dir          = $wp_upload_dir['basedir'] . '/arprice/';
				$upload_dir_url      = $wp_upload_dir['url'];
				$upload_dir_base_url = $wp_upload_dir['baseurl'] . '/arprice/';
				$charset             = get_option( 'blog_charset' );

				@ini_set( 'max_execution_time', 0 );

				if ( ! empty( $_REQUEST['arp_table_to_export'] ) ) {
					$table_ids = implode( ',', $_REQUEST['arp_table_to_export'] );

					$file_name = 'arp_' . time();

					$filename = $file_name . '.txt';

					$sql_main = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'arp_arprice WHERE ID in(' . $table_ids . ')' );

					$xml  = '';
					$xml .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

					$xml .= "<arp_tables>\n";

					foreach ( $sql_main as $key => $result ) {

						$xml .= "\t<arp_table id='" . $result->ID . "'>\n";

						$xml .= "\t\t<site_url><![CDATA[" . site_url() . "]]></site_url>\n";

						$xml .= "\t\t<arp_plugin_version><![CDATA[" . $arp_db_version . "]]></arp_plugin_version>\n";

						$xml .= "\t\t<arp_table_name><![CDATA[" . $result->table_name . "]]></arp_table_name>\n";

						$xml .= "\t\t<status><![CDATA[" . $result->status . "]]></status>\n";

						$xml .= "\t\t<is_template><![CDATA[" . $result->is_template . "]]></is_template>\n";

						$xml .= "\t\t<template_name><![CDATA[" . $result->template_name . "]]></template_name>\n";

						$xml .= "\t\t<is_animated><![CDATA[" . $result->is_animated . "]]></is_animated>\n";

						if ( $arp_db_version > '2.0' ) {
							$arp_db_version1 = '2.0';
						}

						$general_options_new = unserialize( $result->general_options );

						$arp_main_reference_template = $general_options_new['general_settings']['reference_template'];

						$arp_exp_arp_main_reference_template = explode( '_', $arp_main_reference_template );

						$arp_new_arp_main_reference_template = $arp_exp_arp_main_reference_template[1];

						if ( $result->is_template == 1 ) {

							$xml .= "\t\t<arp_template_img><![CDATA[" . PRICINGTABLE_URL . '/images/arptemplate_' . $arp_new_arp_main_reference_template . '_v' . $arp_db_version1 . '.png' . ']]></arp_template_img>';
							$xml .= "\t\t<arp_template_img_big><![CDATA[" . PRICINGTABLE_URL . '/images/arptemplate_' . $arp_new_arp_main_reference_template . '_v' . $arp_db_version1 . '_big.png' . ']]></arp_template_img_big>';
							$xml .= "\t\t<arp_template_img_large><![CDATA[" . PRICINGTABLE_URL . '/images/arptemplate_' . $arp_new_arp_main_reference_template . '_' . $arp_db_version1 . '_large.png' . ']]></arp_template_img_large>';

						} else {
							$xml .= "\t\t<arp_template_img><![CDATA[" . $upload_dir_base_url . 'template_images/arptemplate_' . $result->ID . '.png' . ']]></arp_template_img>';
							$xml .= "\t\t<arp_template_img_big><![CDATA[" . $upload_dir_base_url . 'template_images/arptemplate_' . $result->ID . '_big.png' . ']]></arp_template_img_big>';
							$xml .= "\t\t<arp_template_img_large><![CDATA[" . $upload_dir_base_url . 'template_images/arptemplate_' . $result->ID . '_large.png' . ']]></arp_template_img_large>';

						}

						$xml .= "\t\t<options>\n";

						$xml .= "\t\t\t<general_options>";

						$arp_general_options = unserialize( $result->general_options );

						$arp_gen_opt_new = array();

						$new_general_options = $this->arprice_recursive_array_function( $arp_general_options, 'export' );

						$general_opt = serialize( $new_general_options );

						$xml .= '<![CDATA[' . $general_opt . ']]>';

						$xml .= "</general_options>\n";

						$sql = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'arp_arprice_options WHERE table_id = %d', $result->ID ) );

						$xml .= "\t\t\t<column_options>";

						$table_opts = unserialize( $sql[0]->table_options );

						$arp_tbl_opt = array();

						$new_array = $this->arprice_recursive_array_function( $table_opts, 'export' );

						$table_opts = serialize( $new_array );

						$xml .= '<![CDATA[' . $table_opts . ']]>';

						$xml .= "</column_options>\n";

						$xml .= "\t\t</options>\n";

						$table_opt = unserialize( $sql[0]->table_options );

						$total_tabs = $arp_pricingtable->arp_toggle_step_name();

						foreach ( $table_opt['columns'] as $c => $res ) {

							$btn_img = isset( $res['btn_img'] ) ? $res['btn_img'] : '';

							$column_back_image = isset( $res['column_background_image'] ) ? $res['column_background_image'] : '';

							if ( $btn_img != '' ) {
								$btn_img_src   = $btn_img;
								$img_file_name = explode( '/', $btn_img_src );
								$btn_img_file  = $img_file_name[ count( $img_file_name ) - 1 ];

								$arpfileobj = new ARPFilecontroller( $btn_img, true );

								$arpfileobj->check_cap = true;
								$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

								$arpfileobj->check_nonce = true;
								$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
								$arpfileobj->nonce_action = 'arprice_wp_nonce';

								$arpfileobj->check_only_image = true;

								$destination = $upload_dir . 'temp_' . $btn_img_file;

								$arpfileobj->arp_process_upload( $destination );

								if ( file_exists( $upload_dir . 'temp_' . $btn_img_file ) ) {

									$filename_arry[] = 'temp_' . $btn_img_file;

									$button_img = 'temp_' . $file_name;

									$xml .= "\t\t<" . $c . '_btn_img>' . $btn_img_src . '</' . $c . "_btn_img>\n";
								}
							}

							if ( $column_back_image != '' ) {
								$column_img_src = $column_back_image;
								$img_file_name  = explode( '/', $column_img_src );
								$btn_img_file   = $img_file_name[ count( $img_file_name ) - 1 ];

								$arpfileobj = new ARPFilecontroller( $column_back_image, true );

								$arpfileobj->check_cap = true;
								$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

								$arpfileobj->check_nonce = true;
								$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
								$arpfileobj->nonce_action = 'arprice_wp_nonce';

								$arpfileobj->check_only_image = true;

								$destination = $upload_dir . 'temp_' . $btn_img_file;

								$arpfileobj->arp_process_upload( $destination );

								if ( file_exists( $upload_dir . 'temp_' . $btn_img_file ) ) {

									$filename_arry[] = 'temp_' . $btn_img_file;

									$button_img = 'temp_' . $file_name;

									$xml .= "\t\t<" . $c . '_background_image>' . $column_img_src . '</' . $c . "_background_image>\n";
								}
							}

							$g = 0;
							foreach ( $total_tabs as $key => $tab_name ) {
								$str_key = ( $g == 0 ) ? 'arp_header_shortcode' : 'arp_header_shortcode_' . $tab_name[2];

								$str = isset( $res[ $str_key ] ) ? $res[ $str_key ] : '';

								if ( $str != '' ) {
									$header_img        = esc_html( stristr( $str, '<img' ) );
									$google_map_marker = stristr( $str, '[arp_googlemap' );
									$html5_video       = stristr( $str, '[arp_html5_video' );
									$html5_audio       = stristr( $str, '[arp_html5_audio' );

									if ( $header_img != '' ) {
										$img_src = $arprice_import_export->getAttribute( 'src', $str );

										$img_height = $arprice_import_export->getAttribute( 'height', $header_img );

										$img_width = $arprice_import_export->getAttribute( 'width', $header_img );

										$img_class = $arprice_import_export->getAttribute( 'class', $header_img );

										$img_src    = trim( $img_src, '&quot;' );
										$img_src    = trim( $img_src, '"' );
										$img_height = trim( $img_height, '&quot;' );
										$img_height = trim( $img_height, '"' );
										$img_width  = trim( $img_width, '&quot;' );
										$img_width  = trim( $img_width, '"' );
										$img_class  = trim( $img_class, '&quot;' );
										$img_class  = trim( $img_class, '"' );

										$img_height = ( ! empty( $img_height ) ) ? $img_height : '';
										$img_width  = ( ! empty( $img_width ) ) ? $img_width : '';
										$img_class  = ( ! empty( $img_class ) ) ? $img_class : '';
										$img_src    = ( ! empty( $img_src ) ) ? $img_src : '';

										$explodefilename = explode( '/', $img_src );

										$header_img_name = $explodefilename[ count( $explodefilename ) - 1 ];

										$header_img = $header_img_name;

										if ( $header_img != '' ) {
											$newfilename1 = $header_img;

											$arpfileobj = new ARPFilecontroller( $img_src, true );

											$arpfileobj->check_cap = true;
											$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

											$arpfileobj->check_nonce = true;
											$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
											$arpfileobj->nonce_action = 'arprice_wp_nonce';

											$arpfileobj->check_only_image = true;

											$destination = $upload_dir . 'temp_' . $newfilename1;

											$arpfileobj->arp_process_upload( $destination );

											if ( file_exists( $upload_dir . 'temp_' . $newfilename1 ) ) {

												$filename_arry[] = 'temp_' . $newfilename1;

												$header_img = 'temp_' . $newfilename1;
											}
										}

										if ( file_exists( $upload_dir . 'temp_' . $newfilename1 ) ) {

											if ( $g == 0 ) {

												$xml .= "\t\t<" . $c . '_img>' . $img_src . '</' . $c . "_img>\n";

												$xml .= "\t\t<" . $c . '_img_width>' . $img_width . '</' . $c . "_img_width>\n";

												$xml .= "\t\t<" . $c . '_img_height>' . $img_height . '</' . $c . "_img_height>\n";

												$xml .= "\t\t<" . $c . '_img_class>' . $img_class . '</' . $c . "_img_class>\n";
											} else {
												$xml .= "\t\t<" . $c . '_img_' . $tab_name[2] . '>' . $img_src . '</' . $c . '_img_' . $tab_name[2] . ">\n";

												$xml .= "\t\t<" . $c . '_img_' . $tab_name[2] . '_width>' . $img_width . '</' . $c . '_img_' . $tab_name[2] . "_width>\n";

												$xml .= "\t\t<" . $c . '_img_' . $tab_name[2] . '_height>' . $img_height . '</' . $c . '_img_' . $tab_name[2] . "_height>\n";

												$xml .= "\t\t<" . $c . '_img_' . $tab_name[2] . '_class>' . $img_class . '</' . $c . '_img_' . $tab_name[2] . "_class>\n";
											}
										}
									}

									if ( $google_map_marker != '' ) {

										$gmap_marker_img = $res['gmap_marker'];
										$gmap_img        = explode( '/', $gmap_marker_img );
										$gmap_img        = $gmap_img[ count( $gmap_img ) - 1 ];

										$arpfileobj = new ARPFilecontroller( $gmap_marker_img, true );

										$arpfileobj->check_cap = true;
										$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

										$arpfileobj->check_nonce = true;
										$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
										$arpfileobj->nonce_action = 'arprice_wp_nonce';

										$arpfileobj->check_only_image = true;

										$destination = $upload_dir . 'temp_' . $gmap_img;

										$arpfileobj->arp_process_upload( $destination );

										if ( file_exists( $upload_dir . 'temp_' . $gmap_img ) ) {

											$filename_arry[] = 'temp_' . $gmap_img;

											$marker_image = 'temp_' . $gmap_img;

											$xml .= "\t\t<" . $c . '_gmap_marker>' . $gmap_marker_img . '</' . $c . "_gmap_marker>\n";
										}
									}

									if ( $html5_video != '' ) {
										$pattern = get_shortcode_regex();
										preg_match( '/' . $pattern . '/s', $res[ $str_key ], $preg_matches );
										$string = $preg_matches[3];

										$mp4_video = $arprice_import_export->getAttribute( 'mp4', $res[ $str_key ] );
										$mp4_video = trim( $mp4_video, '"' );

										if ( $mp4_video != '' ) {
											$mp4_video_name = explode( '/', $mp4_video );
											$mp4_video_name = $mp4_video_name[ count( $mp4_video_name ) - 1 ];

											$arpfileobj = new ARPFilecontroller( $mp4_video, true );

											$arpfileobj->check_cap = true;
											$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

											$arpfileobj->check_nonce = true;
											$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
											$arpfileobj->nonce_action = 'arprice_wp_nonce';

											$arpfileobj->check_only_image = true;

											$destination = $upload_dir . 'temp_' . $mp4_video_name;

											$arpfileobj->arp_process_upload( $destination );

											if ( file_exists( $upload_dir . 'temp_' . $mp4_video_name ) ) {

												$filename_arry[] = 'temp_' . $mp4_video_name;

												$mp4_video_name = 'temp_' . $mp4_video_name;

												if ( $g == 0 ) {
													$xml .= "\t\t<" . $c . '_html5_mp4_video>' . $mp4_video . '</' . $c . "_html5_mp4_video>\n";
												} else {
													$xml .= "\t\t<" . $c . '_html5_mp4_video_' . $tab_name[2] . '>' . $mp4_video . '</' . $c . '_html5_mp4_video_' . $tab_name[2] . ">\n";
												}
											}
										}

										$webm_video = $arprice_import_export->getAttribute( 'webm', $res[ $str_key ] );
										$webm_video = trim( $webm_video, '"' );

										if ( $webm_video != '' ) {
											$webm_video_name = explode( '/', $webm_video );
											$webm_video_name = $webm_video_name[ count( $webm_video_name ) - 1 ];

											$arpfileobj = new ARPFilecontroller( $webm_video, true );

											$arpfileobj->check_cap = true;
											$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

											$arpfileobj->check_nonce = true;
											$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
											$arpfileobj->nonce_action = 'arprice_wp_nonce';

											$arpfileobj->check_only_image = true;

											$destination = $upload_dir . 'temp_' . $webm_video_name;

											$arpfileobj->arp_process_upload( $destination );

											if ( file_exists( $upload_dir . 'temp_' . $webm_video_name ) ) {

												$filename_arry[] = 'temp_' . $webm_video_name;

												$webm_video_name = 'temp_' . $webm_video_name;
												if ( $g == 0 ) {
													$xml .= "\t\t<" . $c . '_html5_webm_video>' . $webm_video . '</' . $c . "_html5_webm_video>\n";
												} else {
													$xml .= "\t\t<" . $c . '_html5_webm_video_' . $tab_name[2] . '>' . $webm_video . '</' . $c . '_html5_webm_video_' . $tab_name[2] . ">\n";
												}
											}
										}

										$ogg_video = $arprice_import_export->getAttribute( 'ogg', $res[ $str_key ] );
										$ogg_video = trim( $ogg_video, '"' );

										if ( $ogg_video != '' ) {
											$ogg_video_name = explode( '/', $ogg_video );
											$ogg_video_name = $ogg_video_name[ count( $ogg_video_name ) - 1 ];

											$arpfileobj = new ARPFilecontroller( $ogg_video, true );

											$arpfileobj->check_cap = true;
											$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

											$arpfileobj->check_nonce = true;
											$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
											$arpfileobj->nonce_action = 'arprice_wp_nonce';

											$arpfileobj->check_only_image = true;

											$destination = $upload_dir . 'temp_' . $ogg_video_name;

											$arpfileobj->arp_process_upload( $destination );

											if ( file_exists( $upload_dir . 'temp_' . $ogg_video_name ) ) {

												$filename_arry[] = 'temp_' . $ogg_video_name;

												$ogg_video_name = 'temp_' . $ogg_video_name;

												if ( $g == 0 ) {
													$xml .= "\t\t<" . $c . '_html5_ogg_video>' . $ogg_video . '</' . $c . "_html5_ogg_video>\n";
												} else {
													$xml .= "\t\t<" . $c . '_html5_ogg_video_' . $tab_name[2] . '>' . $ogg_video . '</' . $c . '_html5_ogg_video_' . $tab_name[2] . ">\n";
												}
											}
										}

										$poster_img = $arprice_import_export->getAttribute( 'poster', $res[ $str_key ] );
										$poster_img = trim( $poster_img, '"' );

										if ( $poster_img != '' ) {
											$poster_img_nm = explode( '/', $poster_img );
											$poster_img_nm = $poster_img_nm[ count( $poster_img_nm ) - 1 ];

											$arpfileobj = new ARPFilecontroller( $poster_img, true );

											$arpfileobj->check_cap = true;
											$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

											$arpfileobj->check_nonce = true;
											$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
											$arpfileobj->nonce_action = 'arprice_wp_nonce';

											$arpfileobj->check_only_image = true;

											$destination = $upload_dir . 'temp_' . $poster_img_nm;

											$arpfileobj->arp_process_upload( $destination );

											if ( file_exists( $upload_dir . 'temp_' . $poster_img_nm ) ) {

												$filename_arry[] = 'temp_' . $poster_img_nm;

												$poster_img_nm = 'temp_' . $poster_img_nm;
												if ( $g == 0 ) {
													$xml .= "\t\t<" . $c . '_html5_video_poster>' . $poster_img . '</' . $c . "_html5_video_poster>\n";
												} else {
													$xml .= "\t\t<" . $c . '_html5_video_poster_' . $tab_name[2] . '>' . $poster_img . '</' . $c . '_html5_video_poster_' . $tab_name[2] . ">\n";
												}
											}
										}
									}

									if ( $html5_audio != '' ) {
										$pattern = get_shortcode_regex();
										preg_match( '/' . $pattern . '/s', $res[ $str_key ], $preg_matches );
										$string = $preg_matches[3];

										$mp3_audio = $arprice_import_export->getAttribute( 'mp3', $res[ $str_key ] );
										$mp3_audio = trim( $mp3_audio, '"' );

										if ( $mp3_audio != '' ) {
											$mp3_audio_name = explode( '/', $mp3_audio );
											$mp3_audio_name = $mp3_audio_name[ count( $mp3_audio_name ) - 1 ];

											$arpfileobj = new ARPFilecontroller( $mp3_audio, true );

											$arpfileobj->check_cap = true;
											$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

											$arpfileobj->check_nonce = true;
											$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
											$arpfileobj->nonce_action = 'arprice_wp_nonce';

											$arpfileobj->check_only_image = true;

											$destination = $upload_dir . 'temp_' . $mp3_audio_name;

											$arpfileobj->arp_process_upload( $destination );

											if ( file_exists( $upload_dir . 'temp_' . $mp3_audio_name ) ) {

												$filename_arry[] = 'temp_' . $mp3_audio_name;

												$mp3_audio_name = 'temp_' . $mp3_audio_name;

												if ( $g == 0 ) {
													$xml .= "\t\t<" . $c . '_html5_mp3_audio>' . $mp3_audio . '</' . $c . "_html5_mp3_audio>\n";
												} else {
													$xml .= "\t\t<" . $c . '_html5_mp3_audio_' . $tab_name[2] . '>' . $mp3_audio . '</' . $c . '_html5_mp3_audio_' . $tab_name[2] . ">\n";
												}
											}
										}

										$ogg_audio = $arprice_import_export->getAttribute( 'ogg', $res[ $str_key ] );
										$ogg_audio = trim( $ogg_audio, '"' );

										if ( $ogg_audio != '' ) {
											$ogg_audio_name = explode( '/', $ogg_audio );
											$ogg_audio_name = $ogg_audio_name[ count( $ogg_audio_name ) - 1 ];

											$arpfileobj = new ARPFilecontroller( $ogg_audio, true );

											$arpfileobj->check_cap = true;
											$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

											$arpfileobj->check_nonce = true;
											$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
											$arpfileobj->nonce_action = 'arprice_wp_nonce';

											$arpfileobj->check_only_image = true;

											$destination = $upload_dir . 'temp_' . $ogg_audio_name;

											$arpfileobj->arp_process_upload( $destination );

											if ( file_exists( $upload_dir . 'temp_' . $ogg_audio_name ) ) {

												$filename_arry[] = 'temp_' . $ogg_audio_name;

												$ogg_audio_name = 'temp_' . $ogg_audio_name;

												if ( $g == 0 ) {
													$xml .= "\t\t<" . $c . '_html5_ogg_audio>' . $ogg_audio . '</' . $c . "_html5_ogg_audio>\n";
												} else {
													$xml .= "\t\t<" . $c . '_html5_ogg_audio_' . $tab_name[2] . '>' . $ogg_audio . '</' . $c . '_html5_ogg_audio_' . $tab_name[2] . ">\n";
												}
											}
										}

										$wav_audio = $arprice_import_export->getAttribute( 'wav', $res[ $str_key ] );
										$wav_audio = trim( $wav_audio, '"' );

										if ( $wav_audio != '' ) {
											$wav_audio_name = explode( '/', $wav_audio );
											$wav_audio_name = $wav_audio_name[ count( $wav_audio_name ) - 1 ];

											$arpfileobj = new ARPFilecontroller( $wav_audio, true );

											$arpfileobj->check_cap = true;
											$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

											$arpfileobj->check_nonce = true;
											$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
											$arpfileobj->nonce_action = 'arprice_wp_nonce';

											$arpfileobj->check_only_image = true;

											$destination = $upload_dir . 'temp_' . $wav_audio_name;

											$arpfileobj->arp_process_upload( $destination );

											if ( file_exists( $upload_dir . 'temp_' . $wav_audio_name ) ) {

												$filename_arry[] = 'temp_' . $wav_audio_name;

												$wav_audio_name = 'temp_' . $wav_audio_name;

												if ( $g == 0 ) {
													$xml .= "\t\t<" . $c . '_html5_wav_audio>' . $wav_audio . '</' . $c . "_html5_wav_audio>\n";
												} else {
													$xml .= "\t\t<" . $c . '_html5_wav_audio_' . $tab_name[2] . '>' . $wav_audio . '</' . $c . '_html5_wav_audio_' . $tab_name[2] . ">\n";
												}
											}
										}
									}
								}

								$g++;
							}
						}

						$xml .= "\t</arp_table>\n\n";
					}

					$xml .= '</arp_tables>';

					$xml = base64_encode( $xml );

					header( 'Content-type: text/plain' );
					header( 'Content-Disposition: attachment; filename=' . $filename );

					ob_start();
					echo $xml;
					die;
				}
			}
		}
	}

	function Create_zip( $source, $destination, $destindir ) {
		$filename = array();
		$filename = unserialize( $source );

		$zip = new ZipArchive();
		if ( $zip->open( $destination, ZipArchive::CREATE ) === true ) {
			$i = 0;
			foreach ( $filename as $file ) {
				$zip->addFile( $destindir . $file, $file );
				$i++;
			}
			$zip->close();
		}

		foreach ( $filename as $file1 ) {
			unlink( $destindir . $file1 );
		}
	}

	function getAttribute( $att, $tag = '' ) {
		$re = '/' . $att . '=([\'])?((?(1).+?|[^\s>]+))(?(1)\1)/is';

		if ( preg_match( $re, $tag, $match ) ) {
			return urldecode( $match[2] );
		}
		return false;
	}

	function get_table_list() {

		global $wpdb;

		$table = $wpdb->prefix . 'arp_arprice';

		$res_default_template = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $table . ' WHERE  status = %s ORDER BY ID ASC ', 'published' ) );
		?>
		<select multiple="multiple" name="arp_table_to_export[]" id="arp_table_to_export">
			<?php
			foreach ( $res_default_template as $r ) {
				?>
				<option value="<?php echo $r->ID; ?>"><?php echo ( $r->is_template == '0' ) ? esc_html__( 'Template', 'ARPrice' ) : esc_html__( 'Table', 'ARPrice' ); ?> ::&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $r->table_name; ?>&nbsp;&nbsp;&nbsp;&nbsp;[<?php echo $r->ID; ?>]</option>
				<?php
			}
			?>
		</select>
		<?php
	}

	function get_arprice_lite_table_list_new() {
			  global $wpdb;
			  $table                = $wpdb->prefix . 'arplite_arprice';
			  $res_default_template = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . "arplite_arprice WHERE is_template = '0' ORDER BY ID DESC" );
		?>
				<div id="arprice_lite">
				<?php
				foreach ( $res_default_template as $r ) {
					?>
							<div id="arp_lite_btn">
								<div id="template_lite_name"><?php echo $r->table_name; ?></div>
								<div class="arp_import_export_frm_submit_2">
									<button class="arp_import_export_btn_2" type="submit" data-id="<?php echo $r->ID; ?>" name="export_tables"><span><?php esc_html_e( 'Import', 'ARPrice' ); ?></span></button> 
								</div>
							</div>
								
					<?php
				}
				?>
				</div>
		<?php
	}

	function export_table_list() {
		global $arprice_import_export;
		$arprice_import_export->get_table_list();
		die();
	}

	function extract_zip( $filename, $output_dir ) {
		$zip = new ZipArchive();
		if ( $zip->open( $filename ) === true ) {
			$zip->extractTo( $output_dir );
			$zip->close();
			return 'ok';
		} else {
			return 'failed';
		}
	}

	function import_table() {
		$_SESSION['arprice_image_array'] = array();

		if( !function_exists('WP_Filesystem' ) ){
            require_once(ABSPATH . 'wp-admin/includes/file.php');
        }

		WP_Filesystem();
		global $wp_filesystem;

		global $wpdb, $arprice_images_css_version, $arp_pricingtable,$arprice_import_export;

		$check_caps = $arp_pricingtable->arprice_check_user_cap( 'arp_add_udpate_pricingtables', true );

		if ( $check_caps != 'success' ) {
			$check_caps_msg = json_decode( $check_caps, true );
			echo 'error~|~' . $check_caps_msg[0];
			die;
		}

		$table = $wpdb->prefix . 'arp_arprice';

		$table_opt = $wpdb->prefix . 'arp_arprice_options';

		$file_name = $_REQUEST['xml_file'];

		@ini_set( 'max_execution_time', 0 );

		$wp_upload_dir = wp_upload_dir();

		$output_url = $wp_upload_dir['baseurl'] . '/arprice/';
		$output_dir = $wp_upload_dir['basedir'] . '/arprice/';

		$upload_dir_path = $wp_upload_dir['basedir'] . '/arprice/';
		$upload_dir_url  = $wp_upload_dir['baseurl'] . '/arprice/';

		$xml_file = $output_dir . 'import/' . $file_name . '.txt';

		$xml_content = $wp_filesystem->get_contents( $xml_file );

		$xml = base64_decode( $xml_content );
		$xml = simplexml_load_string( $xml );



		$ik = 1;
		if ( isset( $xml->arp_table ) ) {
			$j = 1;
			foreach ( $xml->children() as $key_main => $val_main ) {
				$attr                   = $val_main->attributes();
				$old_id                 = $attr['id'];
				$status                 = $val_main->status;
				$is_template            = $val_main->is_template;
				$template_name          = $val_main->template_name;
				$is_animated            = $val_main->is_animated;
				$arprice_import_version = $val_main->arp_plugin_version;

				$new_column_order = array();
				$new_edited_cols  = array();
				$table_name       = $val_main->arp_table_name;

				$arp_template_css = $val_main->arp_template_css;

				$arp_template_img       = $val_main->arp_template_img;
				$arp_template_img_big   = $val_main->arp_template_img_big;
				$arp_template_img_large = $val_main->arp_template_img_large;

				$date = current_time( 'mysql' );
				foreach ( $val_main->options->children() as $key => $val ) {

					if ( $key == 'general_options' ) {
						$general_options = (string) $val;

						$general_options_new = unserialize( $general_options );

						$arp_main_reference_template = $general_options_new['general_settings']['reference_template'];

						if ( isset( $general_options_new['tooltip_settings']['tooltip_informative_icon'] ) ) {
							$value = $general_options_new['tooltip_settings']['tooltip_informative_icon'];
							if ( $value != '' ) {
								$general_options_new['tooltip_settings']['tooltip_informative_icon'] = $this->update_fa_font_class( $value );
							}
						}

						if ( version_compare( $arprice_import_version, '2.0', '<' ) ) {

							$general_options_new['column_settings']['arp_load_first_time_after_migration'] = 1;
							$general_options_new['column_settings']['column_wrapper_width_txtbox']         = 1000;

							$general_options_new['column_settings']['display_col_mobile'] = 1;
							$general_options_new['column_settings']['display_col_tablet'] = 3;

							$general_options_new['column_animation']['pagi_nav_btn'] = 'pagination_bottom';
							$general_options_new['column_animation']['navi_nav_btn'] = 'navigation';

							$col_hover_effect = $general_options_new['column_settings']['column_highlight_on_hover'];
							if ( $col_hover_effect == '0' ) {
								$general_options_new['column_settings']['column_highlight_on_hover'] = 'hover_effect';
							} elseif ( $col_hover_effect == '1' ) {
								$general_options_new['column_settings']['column_highlight_on_hover'] = 'shadow_effect';
							} else {
								$general_options_new['column_settings']['column_highlight_on_hover'] = 'no_effect';
							}

							$general_options_new['column_settings']['column_box_shadow_effect'] = 'shadow_style_none';
							if ( $arp_main_reference_template == 'arptemplate_2' ) {
								$general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 7;
							} elseif ( $arp_main_reference_template == 'arptemplate_23' ) {
								$general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 6;
							} elseif ( $arp_main_reference_template == 'arptemplate_22' ) {
								$general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 4;
							} else {
								$general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 0;
							}

							$general_options_new['tooltip_settings']['tooltip_trigger_type']  = 'hover';
							$general_options_new['tooltip_settings']['tooltip_display_style'] = 'default';
						}

						$arp_custom_css = isset( $general_options_new['general_settings']['arp_custom_css'] ) ? $general_options_new['general_settings']['arp_custom_css'] : '';

						$reference_template = $general_options_new['general_settings']['reference_template'];

						if ( version_compare( $arprice_import_version, '3.0', '<' ) ) {
							$toggle_yearly_text    = $general_options_new['general_settings']['togglestep_yearly'];
							$toggle_monthly_text   = $general_options_new['general_settings']['togglestep_monthly'];
							$toggle_quarterly_text = $general_options_new['general_settings']['togglestep_quarterly'];

							if ( $toggle_yearly_text != '' ) {
								$general_options_new['general_settings']['togglestep_yearly'] = $this->update_fa_font_class( $toggle_yearly_text );
							}

							if ( $toggle_monthly_text != '' ) {
								$general_options_new['general_settings']['togglestep_monthly'] = $this->update_fa_font_class( $toggle_monthly_text );
							}

							if ( $toggle_quarterly_text != '' ) {
								$general_options_new['general_settings']['togglestep_quarterly'] = $this->update_fa_font_class( $toggle_quarterly_text );
							}
						} else {
							$toggle_yearly_text    = $general_options_new['general_settings']['togglestep_yearly'];
							$toggle_monthly_text   = $general_options_new['general_settings']['togglestep_monthly'];
							$toggle_quarterly_text = $general_options_new['general_settings']['togglestep_quarterly'];
							$toggle_weekly_text    = $general_options_new['general_settings']['togglestep_weekly'];
							$toggle_daily_text     = $general_options_new['general_settings']['togglestep_daily'];
							$toggle_step6_text     = $general_options_new['general_settings']['togglestep_step6'];
							$toggle_step7_text     = $general_options_new['general_settings']['togglestep_step7'];
							$toggle_step8_text     = $general_options_new['general_settings']['togglestep_step8'];

							if ( $toggle_yearly_text != '' ) {
								$general_options_new['general_settings']['togglestep_yearly'] = $this->update_fa_font_class( $toggle_yearly_text );
							}

							if ( $toggle_monthly_text != '' ) {
								$general_options_new['general_settings']['togglestep_monthly'] = $this->update_fa_font_class( $toggle_monthly_text );
							}

							if ( $toggle_quarterly_text != '' ) {
								$general_options_new['general_settings']['togglestep_quarterly'] = $this->update_fa_font_class( $toggle_quarterly_text );
							}

							if ( $toggle_weekly_text != '' ) {
								$general_options_new['general_settings']['togglestep_weekly'] = $this->update_fa_font_class( $toggle_weekly_text );
							}

							if ( $toggle_daily_text != '' ) {
								$general_options_new['general_settings']['togglestep_daily'] = $this->update_fa_font_class( $toggle_daily_text );
							}

							if ( $toggle_step6_text != '' ) {
								$general_options_new['general_settings']['togglestep_step6'] = $this->update_fa_font_class( $toggle_step6_text );
							}

							if ( $toggle_step7_text != '' ) {
								$general_options_new['general_settings']['togglestep_step7'] = $this->update_fa_font_class( $toggle_step7_text );
							}

							if ( $toggle_step8_text != '' ) {
								$general_options_new['general_settings']['togglestep_step8'] = $this->update_fa_font_class( $toggle_step8_text );
							}
						}

						$general_options_new = $this->arprice_recursive_array_function( $general_options_new, 'import' );

						$new_column_order = json_decode( $general_options_new['general_settings']['column_order'] );
						$new_edited_cols  = $general_options_new['general_settings']['user_edited_columns'];
						$general_options  = serialize( $general_options_new );

					} elseif ( $key == 'column_options' ) {

						$column_options = (string) $val;

						$column_opts = unserialize( $column_options );

						$total_tabs = $arp_pricingtable->arp_toggle_step_name();

						$column_opts = $this->arprice_recursive_array_function( $column_opts, 'import' );
						
						foreach ( $column_opts['columns'] as $c => $columns ) {
							
							$g = 0;
							foreach ( $total_tabs as $k => $tab_name ) {
								if ( $g == 0 ) {
									$columns['package_title']        = $this->update_fa_font_class( $columns['package_title'] );
									$columns['arp_header_shortcode'] = $this->update_fa_font_class( $columns['arp_header_shortcode'] );
									$columns['price_text']           = $this->update_fa_font_class( $columns['price_text'] );
									$columns['column_description']   = $this->update_fa_font_class( $columns['column_description'] );
									$columns['button_text']          = $this->update_fa_font_class( $columns['button_text'] );
								} else {
									if ( ! empty( $columns[ 'package_title_' . $tab_name[2] ] ) ) {
										$columns[ 'package_title_' . $tab_name[2] ] = $this->update_fa_font_class( $columns[ 'package_title_' . $tab_name[2] ] );
									}
									if ( ! empty( $columns[ 'arp_header_shortcode_' . $tab_name[2] ] ) ) {
										$columns[ 'arp_header_shortcode_' . $tab_name[2] ] = $this->update_fa_font_class( $columns[ 'arp_header_shortcode_' . $tab_name[2] ] );
									}
									if ( ! empty( $columns[ 'price_text_' . $tab_name[3] . '_step' ] ) ) {
										$columns[ 'price_text_' . $tab_name[3] . '_step' ] = $this->update_fa_font_class( $columns[ 'price_text_' . $tab_name[3] . '_step' ] );
									}
									if ( ! empty( $columns[ 'column_description_' . $tab_name[2] ] ) ) {
										$columns[ 'column_description_' . $tab_name[2] ] = $this->update_fa_font_class( $columns[ 'column_description_' . $tab_name[2] ] );
									}
									if ( ! empty( $columns[ 'btn_content_' . $tab_name[2] ] ) ) {
										$columns[ 'btn_content_' . $tab_name[2] ] = $this->update_fa_font_class( $columns[ 'btn_content_' . $tab_name[2] ] );
									}
								}
								$g++;
							}

							$column_opts['columns'][ $c ] = $columns;

							$g = 0;
							foreach ( $total_tabs as $k => $tab_name ) {
								if ( $g == 0 ) {
									if ( ! empty( $columns['html_content'] ) ) {
										$column_opts['columns'][ $c ]['html_content'] = $this->arprice_copy_image_from_content( $columns['html_content'] );
									}

									$column_opts['columns'][ $c ]['package_title']        = $this->arprice_copy_image_from_content( $columns['package_title'] );
									$column_opts['columns'][ $c ]['price_text']           = $this->arprice_copy_image_from_content( $columns['price_text'] );
									$column_opts['columns'][ $c ]['arp_header_shortcode'] = $this->arprice_copy_image_from_content( $columns['arp_header_shortcode'] );
									$column_opts['columns'][ $c ]['column_description']   = $this->arprice_copy_image_from_content( $columns['column_description'] );

								} else {
									if ( ! empty( $columns[ 'html_content_' . $tab_name[2] ] ) ) {
										$column_opts['columns'][ $c ][ 'html_content_' . $tab_name[2] ] = $this->arprice_copy_image_from_content( $columns[ 'html_content_' . $tab_name[2] ] );
									}
									if ( ! empty( $columns[ 'package_title_' . $tab_name[2] ] ) ) {
										$column_opts['columns'][ $c ][ 'package_title_' . $tab_name[2] ] = $this->arprice_copy_image_from_content( $columns[ 'package_title_' . $tab_name[2] ] );
									}
									if ( ! empty( $columns[ 'price_text_' . $tab_name[3] . '_step' ] ) ) {
										$column_opts['columns'][ $c ][ 'price_text_' . $tab_name[3] . '_step' ] = $this->arprice_copy_image_from_content( $columns[ 'price_text_' . $tab_name[3] . '_step' ] );
									}
									if ( ! empty( $columns[ 'arp_header_shortcode_' . $tab_name[2] ] ) ) {
										$column_opts['columns'][ $c ][ 'arp_header_shortcode_' . $tab_name[2] ] = $this->arprice_copy_image_from_content( $columns[ 'arp_header_shortcode_' . $tab_name[2] ] );
									}
									if ( ! empty( $columns[ 'column_description_' . $tab_name[2] ] ) ) {
										$column_opts['columns'][ $c ][ 'column_description_' . $tab_name[2] ] = $this->arprice_copy_image_from_content( $columns[ 'column_description_' . $tab_name[2] ] );
									}
								}
								$g++;
							}

							if ( isset( $columns['rows'] ) && is_array( $columns['rows'] ) && count( $columns['rows'] ) > 0 ) {

								foreach ( $columns['rows'] as $r => $row ) {

									$g = 0;
									foreach ( $total_tabs as $key => $tab_name ) {

										if ( $g == 0 ) {
											$row['row_description']                                        = $this->update_fa_font_class( $row['row_description'] );
											$column_opts['columns'][ $c ]['rows'][ $r ]['row_description'] = $this->arprice_copy_image_from_content( $row['row_description'] );
											$column_opts['columns'][ $c ]['rows'][ $r ]['row_tooltip']     = $this->arprice_copy_image_from_content( $row['row_tooltip'] );
										} else {
											if ( ! empty( $row[ 'row_description_' . $tab_name[2] ] ) ) {
												$row[ 'row_description_' . $tab_name[2] ] = $this->update_fa_font_class( $row[ 'row_description_' . $tab_name[2] ] );
											}
											if ( ! empty( $row[ 'row_description_' . $tab_name[2] ] ) ) {
												$column_opts['columns'][ $c ]['rows'][ $r ][ 'row_description_' . $tab_name[2] ] = $this->arprice_copy_image_from_content( $row[ 'row_description_' . $tab_name[2] ] );
											}
											if ( ! empty( $row[ 'row_tooltip_' . $tab_name[2] ] ) ) {
												$column_opts['columns'][ $c ]['rows'][ $r ][ 'row_tooltip_' . $tab_name[2] ] = $this->arprice_copy_image_from_content( $row[ 'row_tooltip_' . $tab_name[2] ] );
											}
										}

										$g++;
									}
								}
							}

							$g = 0;
							foreach ( $total_tabs as $key => $tab_name ) {

								if ( $g == 0 ) {
									$column_opts['columns'][ $c ]['footer_content'] = $this->arprice_copy_image_from_content( $columns['footer_content'] );
									$column_opts['columns'][ $c ]['button_text']    = $this->arprice_copy_image_from_content( $columns['button_text'] );
								} else {
									if ( ! empty( $columns[ 'footer_content_' . $tab_name[2] ] ) ) {
										$column_opts['columns'][ $c ][ 'footer_content_' . $tab_name[2] ] = $this->arprice_copy_image_from_content( $columns[ 'footer_content_' . $tab_name[2] ] );
									}
									if ( ! empty( $columns[ 'btn_text_' . $tab_name[2] ] ) ) {
										$column_opts['columns'][ $c ][ 'btn_text_' . $tab_name[2] ] = $this->arprice_copy_image_from_content( $columns[ 'btn_text_' . $tab_name[2] ] );
									}
								}

								$g++;
							}

							$g = 0;
							foreach ( $total_tabs as $key => $tab_name ) {

								$header_img = ( $g == 0 ) ? $c . '_img' : $c . '_img_' . $tab_name[2];

								if ( $val_main->$header_img ) {

								}
								$g++;
							}

							$header_img        = $c . '_img';
							$header_img_second = $c . '_img_second';
							$header_img_third  = $c . '_img_third';

							$btn_img           = $c . '_btn_img';
							$column_back_image = $c . '_background_image';

							$gmap_marker = $c . '_gmap_marker';

							$html5_mp4_video        = $c . '_html5_mp4_video';
							$html5_mp4_video_second = $c . '_html5_mp4_video_second';
							$html5_mp4_video_third  = $c . '_html5_mp4_video_third';

							$html5_webm_video        = $c . '_html5_webm_video';
							$html5_webm_video_second = $c . '_html5_webm_video_second';
							$html5_webm_video_third  = $c . '_html5_webm_video_third';

							$html5_ogg_video        = $c . '_html5_ogg_video';
							$html5_ogg_video_second = $c . '_html5_ogg_video_second';
							$html5_ogg_video_third  = $c . '_html5_ogg_video_third';

							$html5_video_poster        = $c . '_html5_video_poster';
							$html5_video_poster_second = $c . '_html5_video_poster_second';
							$html5_video_poster_third  = $c . '_html5_video_poster_third';

							$html5_mp3_audio        = $c . '_html5_mp3_audio';
							$html5_mp3_audio_second = $c . '_html5_mp3_audio_second';
							$html5_mp3_audio_third  = $c . '_html5_mp3_audio_third';

							$html5_ogg_audio        = $c . '_html5_ogg_audio';
							$html5_ogg_audio_second = $c . '_html5_ogg_audio_second';
							$html5_ogg_audio_third  = $c . '_html5_ogg_audio_third';

							$html5_wav_audio        = $c . '_html5_wav_audio';
							$html5_wav_audio_second = $c . '_html5_wav_audio_second';
							$html5_wav_audio_third  = $c . '_html5_wav_audio_third';

							if ( $val_main->$header_img != '' ) {
								$header_image = $c . '_img';
								$image_width  = $c . '_img_width';
								$image_height = $c . '_img_height';
								$img_class    = $c . '_img_class';
								$image        = $val_main->$header_image;
								$img_name     = explode( '/', $image );
								$img_nm       = $img_name[ count( $img_name ) - 1 ];
								$img_name     = 'arp_' . time() . '_' . $img_nm;

								$base_url = trim( $image );
								$new_path = $upload_dir_path . $img_name;
								$new_url  = $upload_dir_url . $img_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}
								$html = "<img src='" . $new_url . "'";
								if ( isset( $val_main->$image_height ) and ! empty( $val_main->$image_height ) ) {
									$html .= " height='" . $val_main->$image_height . "'";
								}
								if ( isset( $val_main->$image_width ) and ! empty( $val_main->$image_width ) ) {
									$html .= " width='" . $val_main->$image_width . "'";
								}

								if ( isset( $val_main->$img_class ) and ! empty( $val_main->$img_class ) ) {
									$html .= " class='" . $val_main->$img_class . "'";
								}
								$html .= ' >';
								$column_opts['columns'][ $c ]['arp_header_shortcode'] = $html;
							}
							if ( $val_main->$header_img_second != '' ) {
								$header_image = $c . '_img_second';
								$image_width  = $c . '_img_second_width';
								$image_height = $c . '_img_second_height';
								$img_class    = $c . '_img_second_class';
								$image        = $val_main->$header_img_second;
								$img_name     = explode( '/', $image );
								$img_nm       = $img_name[ count( $img_name ) - 1 ];
								$img_name     = 'arp_' . time() . '_' . $img_nm;

								$base_url = trim( $image );
								$new_path = $upload_dir_path . $img_name;
								$new_url  = $upload_dir_url . $img_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );

									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$html = "<img src='" . $new_url . "'";
								if ( isset( $val_main->$image_height ) and ! empty( $val_main->$image_height ) ) {
									$html .= " height='" . $val_main->$image_height . "'";
								}
								if ( isset( $val_main->$image_width ) and ! empty( $val_main->$image_width ) ) {
									$html .= " width='" . $val_main->$image_width . "'";
								}
								if ( isset( $val_main->$img_class ) and ! empty( $val_main->$img_class ) ) {
									$html .= " class='" . $val_main->$img_class . "'";
								}
								$html .= ' >';
								$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $html;
							}
							if ( $val_main->$header_img_third != '' ) {
								$header_image = $c . '_img_third';
								$image_width  = $c . '_img_third_width';
								$image_height = $c . '_img_third_height';
								$img_class    = $c . '_img_third_class';
								$image        = $val_main->$header_img_third;
								$img_name     = explode( '/', $image );
								$img_nm       = $img_name[ count( $img_name ) - 1 ];
								$img_name     = 'arp_' . time() . '_' . $img_nm;

								$base_url = trim( $image );
								$new_path = $upload_dir_path . $img_name;
								$new_url  = $upload_dir_url . $img_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$html = "<img src='" . $new_url . "'";
								if ( isset( $val_main->$image_height ) and ! empty( $val_main->$image_height ) ) {
									$html .= " height='" . $val_main->$image_height . "'";
								}
								if ( isset( $val_main->$image_width ) and ! empty( $val_main->$image_width ) ) {
									$html .= " width='" . $val_main->$image_width . "'";
								}
								if ( isset( $val_main->$img_class ) and ! empty( $val_main->$img_class ) ) {
									$html .= " class='" . $val_main->$img_class . "'";
								}
								$html .= ' >';
								$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $html;
							}

							if ( $val_main->$gmap_marker != '' ) {
								$gmap_img      = $c . '_gmap_marker';
								$gmap_image    = $val_main->$gmap_img;
								$gmap_img_nm   = explode( '/', $gmap_image );
								$gmap_img_nm   = $gmap_img_nm[ count( $gmap_img_nm ) - 1 ];
								$gmap_img_name = 'arp_' . time() . '_' . $gmap_img_nm;

								$base_url = trim( $gmap_image );
								$new_path = $upload_dir_path . $gmap_img_name;
								$new_url  = $upload_dir_url . $gmap_img_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
								$dt = preg_replace( '#\s(marker_image)="[^"]+"#', ' marker_image="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
							}

							if ( $val_main->$html5_mp4_video != '' ) {
								$html5_mp4_video   = $c . '_html5_mp4_video';
								$h5_mp4_video      = $val_main->$html5_mp4_video;
								$h5_mp4_video_nm   = explode( '/', $h5_mp4_video );
								$h5_mp4_video_nm   = $h5_mp4_video_nm[ count( $h5_mp4_video_nm ) - 1 ];
								$h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;

								$base_url = trim( $h5_mp4_video );
								$new_path = $upload_dir_path . $h5_mp4_video_name;
								$new_url  = $upload_dir_url . $h5_mp4_video_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
								$dt = preg_replace( '#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
								$column_opts['columns'][ $c ]['arp_header_shortcode'];
							}
							if ( $val_main->$html5_mp4_video_second != '' ) {
								$html5_mp4_video   = $c . '_html5_mp4_video_second';
								$h5_mp4_video      = $val_main->$html5_mp4_video_second;
								$h5_mp4_video_nm   = explode( '/', $h5_mp4_video );
								$h5_mp4_video_nm   = $h5_mp4_video_nm[ count( $h5_mp4_video_nm ) - 1 ];
								$h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;

								$base_url = trim( $h5_mp4_video );
								$new_path = $upload_dir_path . $h5_mp4_video_name;
								$new_url  = $upload_dir_url . $h5_mp4_video_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
								$dt = preg_replace( '#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
							}
							if ( $val_main->$html5_mp4_video_third != '' ) {
								$html5_mp4_video   = $c . '_html5_mp4_video_third';
								$h5_mp4_video      = $val_main->$html5_mp4_video_third;
								$h5_mp4_video_nm   = explode( '/', $h5_mp4_video );
								$h5_mp4_video_nm   = $h5_mp4_video_nm[ count( $h5_mp4_video_nm ) - 1 ];
								$h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;

								$base_url = trim( $h5_mp4_video );
								$new_path = $upload_dir_path . $h5_mp4_video_name;
								$new_url  = $upload_dir_url . $h5_mp4_video_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
								$dt = preg_replace( '#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
							}

							if ( $val_main->$html5_webm_video != '' ) {
								$html5_webm_video   = $c . '_html5_webm_video';
								$h5_webm_video      = $val_main->$html5_webm_video;
								$h5_webm_video_nm   = explode( '/', $h5_webm_video );
								$h5_webm_video_nm   = $h5_webm_video_nm[ count( $h5_webm_video_nm ) - 1 ];
								$h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

								$base_url = trim( $h5_webm_video );
								$new_path = $upload_dir_path . $h5_webm_video_name;
								$new_url  = $upload_dir_url . $h5_webm_video_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
								$dt = preg_replace( '#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
							}
							if ( $val_main->$html5_webm_video_second != '' ) {
								$html5_webm_video   = $c . '_html5_webm_video_second';
								$h5_webm_video      = $val_main->$html5_webm_video_second;
								$h5_webm_video_nm   = explode( '/', $h5_webm_video );
								$h5_webm_video_nm   = $h5_webm_video_nm[ count( $h5_webm_video_nm ) - 1 ];
								$h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

								$base_url = trim( $h5_webm_video );
								$new_path = $upload_dir_path . $h5_webm_video_name;
								$new_url  = $upload_dir_url . $h5_webm_video_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
								$dt = preg_replace( '#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
							}
							if ( $val_main->$html5_webm_video_third != '' ) {
								$html5_webm_video   = $c . '_html5_webm_video_third';
								$h5_webm_video      = $val_main->$html5_webm_video_third;
								$h5_webm_video_nm   = explode( '/', $h5_webm_video );
								$h5_webm_video_nm   = $h5_webm_video_nm[ count( $h5_webm_video_nm ) - 1 ];
								$h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

								$base_url = trim( $h5_webm_video );
								$new_path = $upload_dir_path . $h5_webm_video_name;
								$new_url  = $upload_dir_url . $h5_webm_video_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
								$dt = preg_replace( '#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
							}

							if ( $val_main->$html5_ogg_video != '' ) {
								$html5_ogg_video   = $c . '_html5_ogg_video';
								$h5_ogg_video      = $val_main->$html5_ogg_video;
								$h5_ogg_video_nm   = explode( '/', $h5_ogg_video );
								$h5_ogg_video_nm   = $h5_ogg_video_nm[ count( $h5_ogg_video_nm ) - 1 ];
								$h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

								$base_url = trim( $h5_ogg_video );
								$new_path = $upload_dir_path . $h5_ogg_video_name;
								$new_url  = $upload_dir_url . $h5_ogg_video_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
								$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
							}
							if ( $val_main->$html5_ogg_video_second != '' ) {
								$html5_ogg_video   = $c . '_html5_ogg_video_second';
								$h5_ogg_video      = $val_main->$html5_ogg_video_second;
								$h5_ogg_video_nm   = explode( '/', $h5_ogg_video );
								$h5_ogg_video_nm   = $h5_ogg_video_nm[ count( $h5_ogg_video_nm ) - 1 ];
								$h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

								$base_url = trim( $h5_ogg_video );
								$new_path = $upload_dir_path . $h5_ogg_video_name;
								$new_url  = $upload_dir_url . $h5_ogg_video_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
								$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
							}
							if ( $val_main->$html5_ogg_video_third != '' ) {
								$html5_ogg_video   = $c . '_html5_ogg_video_third';
								$h5_ogg_video      = $val_main->$html5_ogg_video_third;
								$h5_ogg_video_nm   = explode( '/', $h5_ogg_video );
								$h5_ogg_video_nm   = $h5_ogg_video_nm[ count( $h5_ogg_video_nm ) - 1 ];
								$h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

								$base_url = trim( $h5_ogg_video );
								$new_path = $upload_dir_path . $h5_ogg_video_name;
								$new_url  = $upload_dir_url . $h5_ogg_video_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}
								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
								$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
							}

							if ( $val_main->$html5_video_poster != '' ) {
								$html5_video_poster   = $c . '_html5_video_poster';
								$h5_video_poster      = $val_main->$html5_video_poster;
								$h5_video_poster_nm   = explode( '/', $h5_video_poster );
								$h5_video_poster_nm   = $h5_video_poster_nm[ count( $h5_video_poster_nm ) - 1 ];
								$h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

								$base_url = trim( $h5_video_poster );
								$new_path = $upload_dir_path . $h5_video_poster_name;
								$new_url  = $upload_dir_url . $h5_video_poster_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
								$dt = preg_replace( '#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
							}
							if ( $val_main->$html5_video_poster_second != '' ) {
								$html5_video_poster   = $c . '_html5_video_poster_second';
								$h5_video_poster      = $val_main->$html5_video_poster_second;
								$h5_video_poster_nm   = explode( '/', $h5_video_poster );
								$h5_video_poster_nm   = $h5_video_poster_nm[ count( $h5_video_poster_nm ) - 1 ];
								$h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

								$base_url = trim( $h5_video_poster );
								$new_path = $upload_dir_path . $h5_video_poster_name;
								$new_url  = $upload_dir_url . $h5_video_poster_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}
								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
								$dt = preg_replace( '#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
							}
							if ( $val_main->$html5_video_poster_third != '' ) {
								$html5_video_poster   = $c . '_html5_video_poster_third';
								$h5_video_poster      = $val_main->$html5_video_poster_third;
								$h5_video_poster_nm   = explode( '/', $h5_video_poster );
								$h5_video_poster_nm   = $h5_video_poster_nm[ count( $h5_video_poster_nm ) - 1 ];
								$h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

								$base_url = trim( $h5_video_poster );
								$new_path = $upload_dir_path . $h5_video_poster_name;
								$new_url  = $upload_dir_url . $h5_video_poster_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
								$dt = preg_replace( '#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
							}

							if ( $val_main->$html5_mp3_audio != '' ) {
								$h5_mp3_audio      = $val_main->$html5_mp3_audio;
								$h5_mp3_audio_nm   = explode( '/', $h5_mp3_audio );
								$h5_mp3_audio_nm   = $h5_mp3_audio_nm[ count( $h5_mp3_audio_nm ) - 1 ];
								$h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

								$base_url = trim( $h5_mp3_audio );
								$new_path = $upload_dir_path . $h5_mp3_audio_name;
								$new_url  = $upload_dir_url . $h5_mp3_audio_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}
								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
								$dt = preg_replace( '#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
							}
							if ( $val_main->$html5_mp3_audio_second != '' ) {
								$h5_mp3_audio      = $val_main->$html5_mp3_audio_second;
								$h5_mp3_audio_nm   = explode( '/', $h5_mp3_audio );
								$h5_mp3_audio_nm   = $h5_mp3_audio_nm[ count( $h5_mp3_audio_nm ) - 1 ];
								$h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

								$base_url = trim( $h5_mp3_audio );
								$new_path = $upload_dir_path . $h5_mp3_audio_name;
								$new_url  = $upload_dir_url . $h5_mp3_audio_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
								$dt = preg_replace( '#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
							}
							if ( $val_main->$html5_mp3_audio_third != '' ) {
								$h5_mp3_audio      = $val_main->$html5_mp3_audio_third;
								$h5_mp3_audio_nm   = explode( '/', $h5_mp3_audio );
								$h5_mp3_audio_nm   = $h5_mp3_audio_nm[ count( $h5_mp3_audio_nm ) - 1 ];
								$h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

								$base_url = trim( $h5_mp3_audio );
								$new_path = $upload_dir_path . $h5_mp3_audio_name;
								$new_url  = $upload_dir_url . $h5_mp3_audio_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
								$dt = preg_replace( '#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
							}

							if ( $val_main->$html5_ogg_audio != '' ) {
								$h5_ogg_audio      = $val_main->$html5_ogg_audio;
								$h5_ogg_audio_nm   = explode( '/', $h5_ogg_audio );
								$h5_ogg_audio_nm   = $h5_ogg_audio_nm[ count( $h5_ogg_audio_nm ) - 1 ];
								$h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

								$base_url = trim( $h5_ogg_audio );
								$new_path = $upload_dir_path . $h5_ogg_audio_name;
								$new_url  = $upload_dir_url . $h5_ogg_audio_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
								$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
							}
							if ( $val_main->$html5_ogg_audio_second != '' ) {
								$h5_ogg_audio      = $val_main->$html5_ogg_audio_second;
								$h5_ogg_audio_nm   = explode( '/', $h5_ogg_audio );
								$h5_ogg_audio_nm   = $h5_ogg_audio_nm[ count( $h5_ogg_audio_nm ) - 1 ];
								$h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

								$base_url = trim( $h5_ogg_audio );
								$new_path = $upload_dir_path . $h5_ogg_audio_name;
								$new_url  = $upload_dir_url . $h5_ogg_audio_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
								$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
							}
							if ( $val_main->$html5_ogg_audio_third != '' ) {
								$h5_ogg_audio      = $val_main->$html5_ogg_audio_third;
								$h5_ogg_audio_nm   = explode( '/', $h5_ogg_audio );
								$h5_ogg_audio_nm   = $h5_ogg_audio_nm[ count( $h5_ogg_audio_nm ) - 1 ];
								$h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

								$base_url = trim( $h5_ogg_audio );
								$new_path = $upload_dir_path . $h5_ogg_audio_name;
								$new_url  = $upload_dir_url . $h5_ogg_audio_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
								$dt = preg_replace( '#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
							}

							if ( $val_main->$html5_wav_audio != '' ) {
								$h5_wav_audio      = $val_main->$html_wav_audio;
								$h5_wav_audio_nm   = explode( '/', $h5_wav_audio );
								$h5_wav_audio_nm   = $h5_wav_audio_nm[ count( $h5_wav_audio_nm ) - 1 ];
								$h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

								$base_url = trim( $h5_wav_audio );
								$new_path = $upload_dir_path . $h5_wav_audio_name;
								$new_url  = $upload_dir_url . $h5_wav_audio_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode'];
								$dt = preg_replace( '#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode'] = $dt;
							}
							if ( $val_main->$html5_wav_audio_second != '' ) {
								$h5_wav_audio      = $val_main->$html_wav_audio_second;
								$h5_wav_audio_nm   = explode( '/', $h5_wav_audio );
								$h5_wav_audio_nm   = $h5_wav_audio_nm[ count( $h5_wav_audio_nm ) - 1 ];
								$h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

								$base_url = trim( $h5_wav_audio );
								$new_path = $upload_dir_path . $h5_wav_audio_name;
								$new_url  = $upload_dir_url . $h5_wav_audio_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_second'];
								$dt = preg_replace( '#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_second'] = $dt;
							}
							if ( $val_main->$html5_wav_audio_third != '' ) {
								$h5_wav_audio      = $val_main->$html_wav_audio_third;
								$h5_wav_audio_nm   = explode( '/', $h5_wav_audio );
								$h5_wav_audio_nm   = $h5_wav_audio_nm[ count( $h5_wav_audio_nm ) - 1 ];
								$h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

								$base_url = trim( $h5_wav_audio );
								$new_path = $upload_dir_path . $h5_wav_audio_name;
								$new_url  = $upload_dir_url . $h5_wav_audio_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$dt = $column_opts['columns'][ $c ]['arp_header_shortcode_third'];
								$dt = preg_replace( '#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt );
								$column_opts['columns'][ $c ]['arp_header_shortcode_third'] = $dt;
							}

							if ( $val_main->$btn_img != '' ) {
								$btn_image  = $c . '_btn_img';
								$button_img = $val_main->$btn_image;
								$image_name = explode( '/', $button_img );
								$image_nm   = $image_name[ count( $image_name ) - 1 ];
								$image_name = 'arp_' . time() . '_' . $image_nm;

								$base_url = trim( $button_img );
								$new_path = $upload_dir_path . $image_name;
								$new_url  = $upload_dir_url . $image_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$column_opts['columns'][ $c ]['btn_img'] = $new_url;
							}

							if ( $val_main->$column_back_image != '' ) {
								$col_image      = $c . '_background_image';
								$column_img     = $val_main->$column_back_image;
								$col_image_name = explode( '/', $column_img );
								$col_image_nm   = $col_image_name[ count( $col_image_name ) - 1 ];
								$col_image_name = 'arp_' . time() . '_' . $col_image_nm;

								$base_url = trim( $column_img );
								$new_path = $upload_dir_path . $col_image_name;
								$new_url  = $upload_dir_url . $col_image_name;
								if ( array_key_exists( $base_url, $_SESSION['arprice_image_array'] ) ) {
									$new_url = $_SESSION['arprice_image_array'][ $base_url ];
								} else {
									$arpfileobj = new ARPFilecontroller( $base_url, true );

									$arpfileobj->check_cap = true;
									$arpfileobj->capabilities = array( 'arp_add_udpate_pricingtables' );

									$arpfileobj->check_nonce = true;
									$arpfileobj->nonce_data = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
									$arpfileobj->nonce_action = 'arprice_wp_nonce';

									$arpfileobj->check_only_images = true;

									$arpfileobj->arp_process_upload( $new_path );
									$_SESSION['arprice_image_array'][ $base_url ] = $new_url;
								}

								$column_opts['columns'][ $c ]['column_background_image'] = $new_url;
							}
						}

						$column_options = serialize( $column_opts );
					}
				}
				$general_options_new['general_settings']['column_order']        = json_encode( $new_column_order );
				$general_options_new['general_settings']['user_edited_columns'] = $new_edited_cols;

				$general_options = serialize( $general_options_new );
				$table_name      = (string) $table_name;
				$is_animated     = (string) $is_animated;
				$status          = (string) $status;

				$wpdb->query( $wpdb->prepare( 'INSERT INTO ' . $table . ' (table_name,general_options,is_template,is_animated,status,create_date,arp_last_updated_date) VALUES (%s,%s,%d,%d,%s,%s,%s)', $table_name, $general_options, 0, $is_animated, $status, $date, $date ) );

				$new_id = $wpdb->insert_id;

				$select                                        = $wpdb->get_results( $wpdb->prepare( 'SELECT general_options FROM ' . $table . ' WHERE ID = %d', $new_id ) );
				$options                                       = maybe_unserialize( $select[0]->general_options );
				$arp_custom_css                                = isset( $options['general_settings']['arp_custom_css'] ) ? $options['general_settings']['arp_custom_css'] : '';
				$arp_custom_css                                = preg_replace( '/arptemplate_(\d+)/', 'arptemplate_' . $new_id, $arp_custom_css );
				$arp_custom_css                                = preg_replace( '/arp_price_table_(\d+)/', 'arp_price_table_' . $new_id, $arp_custom_css );
				$options['general_settings']['arp_custom_css'] = ( $arp_custom_css );
				$general_options                               = maybe_serialize( $options );

				$wpdb->query( $wpdb->prepare( 'UPDATE ' . $table . ' SET general_options = %s WHERE ID = %d', $general_options, $new_id ) );

				$ref_id = str_replace( 'arptemplate_', '', $reference_template );

				if ( $ref_id >= 20 ) {
					$ref_id             = $ref_id - 3;
					$reference_template = 'arptemplate_' . $ref_id;
				}

				$file = PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css';

				$content = ARPFilecontroller::arp_get_file_content( $file );

				$css_content = preg_replace( '/arptemplate_([\d]+)/', 'arptemplate_' . $new_id, $content );

				$css_content = str_replace( '../../images', PRICINGTABLE_IMAGES_URL, $css_content );

				$css_file_name = 'arptemplate_' . $new_id . '.css';

				$template_img_name       = 'arptemplate_' . $new_id . '.png';
				$template_img_big_name   = 'arptemplate_' . $new_id . '_big.png';
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

				$wp_filesystem->put_contents( PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name, $css_content, 0777 );

				$wpdb->query( $wpdb->prepare( 'INSERT INTO ' . $table_opt . ' (table_id,table_options) VALUES (%d,%s)', $new_id, $column_options ) );
				$j++;
			}
			if ( file_exists( $wp_upload_dir['basedir'] . '/arprice/import/' . $file_name . '.zip' ) ) {
				unlink( $wp_upload_dir['basedir'] . '/arprice/import/' . $file_name . '.zip' );
			}

			echo 1;
		} elseif ( ! isset( $xml->arp_table ) ) {
			echo 0;
		}
		unset( $_SESSION['arprice_image_array'] );
		die();
	}

	function arprice_recursive_array_function( $array = array(), $type = 'export' ) {

		$temp = array();
		if ( is_array( $array ) and ! empty( $array ) ) {
			foreach ( $array as $key => $value ) {
				if ( is_array( $value ) ) {
					$temp[ $key ] = $this->arprice_recursive_array_function( $value, $type );
				} else {
					if ( $type == 'export' ) {
						$temp[ $key ] = str_replace( '&lt;br /&gt;', '[ENTERKEY]', str_replace( '&lt;br/&gt;', '[ENTERKEY]', str_replace( '&lt;br&gt;', '[ENTERKEY]', str_replace( '<br />', '[ENTERKEY]', str_replace( '<br/>', '[ENTERKEY]', str_replace( '<br>', '[ENTERKEY]', trim( preg_replace( '/\s\s+/', ' ', $value ) ) ) ) ) ) ) );
						$temp[ $key ] = str_replace( '&amp;', '[AND]', $temp[ $key ] );
					} elseif ( $type == 'import' ) {
						$temp[ $key ] = str_replace( '[ENTERKEY]', '<br>', $value );
						$temp[ $key ] = str_replace( '[AND]', '&amp;', $temp[ $key ] );
					}
				}
			}
		}

		return $temp;
	}

	function arprice_copy_image_from_content( $content = '' ){
		if( empty( $content ) ){
			return $content;
		}

		$pattern = "#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#";
		$matches = array();
		preg_match_all( $pattern, $content, $matches );

		if( !empty( $matches[0] ) && is_array( $matches[0] ) && count( $matches[0] ) > 0 ){
			
			$wp_upload_dir = wp_upload_dir();

			$upload_dir_path = $wp_upload_dir['basedir'] . '/arprice/';
			$upload_dir_url  = $wp_upload_dir['baseurl'] . '/arprice/';

			if ( is_ssl() ) {
				$upload_dir_url = str_replace( 'http://', 'https://', $upload_dir_url );
			}

			foreach( $matches[0] as $key => $link ){
				$link_source = trim( $link, '"' );
				$file_name = basename( $link_source );

				$image_name = 'arp_' . time() . '_' . $file_name;

				$base_url = trim( $link_source );
				$new_path = $upload_dir_path . $image_name;
				$new_url  = $upload_dir_url . $image_name;

				if( !empty( $_SESSION['arprice_image_array'] ) && in_array( $base_url, $_SESSION['arprice_image_array'] ) ){
					$new_url   = $_SESSION['arprice_image_array'][ $base_url ];
					$nlinkpart = explode( '/', $new_url );
					$nlastpart = end( $nlinkpart );
					$new_path  = $upload_dir_path . $nlastpart;
				} else {
					$arpfileobj = new ARPFilecontroller( $link_source, true );

					$arpfileobj->check_cap = true;
					$arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

					$arpfileobj->check_nonce = true;
					$arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
					$arpfileobj->nonce_action = 'arprice_wp_nonce';

					$arpfileobj->check_only_image = true;

					$arpfileobj->arp_process_upload( $new_path );

					if ( file_exists( $new_path ) ) {
						$newlink = $new_url;
						$content = str_replace( $link, $newlink, $content );
					} else {
						$content = $content;
					}
				}
			}
		}

		return $content;

	}


	function update_fa_font_class( $value ) {
		$fa_font_arr = array();
		if ( file_exists( PRICINGTABLE_CLASSES_DIR . '/arprice_font_awesome_array_new.php' ) ) {
			include_once PRICINGTABLE_CLASSES_DIR . '/arprice_font_awesome_array_new.php';
			$fa_font_arr = arprice_font_awesome_font_array();
		}

		if ( preg_match( '/(arp_fa_icon_(\d+){1,})/', $value ) ) {
			$value = preg_replace( '/(arp_fa_icon_(\d+){1,})/', ' ', $value );
		}

		if ( preg_match( '/\s{2,}/', $value ) ) {
			$value = preg_replace( '/\s{2,}/', ' ', $value );
		}

		$pattern              = '/"fa(\s+)fa-(.*?)"/';
		$is_matched_availabel = preg_match_all( $pattern, $value, $match_arr );

		if ( $is_matched_availabel > 0 ) {
			foreach ( $match_arr[0] as $match_val ) {
				$match_val = preg_replace( '!\s+!', ' ', $match_val );
				$exp       = explode( ' ', $match_val );

				$font_key = trim( str_replace( '"', '', $exp[0] ) . ' ' . str_replace( '"', '', $exp[1] ) );

				$font_key2 = '';

				if ( $exp[1] == 'fa-gears' ) {
					$font_key2 = trim( str_replace( '"', '', $exp[0] ) . ' ' . 'fa-cogs' );
				} elseif ( $exp[1] == 'fa-gear' ) {
					$font_key2 = trim( str_replace( '"', '', $exp[0] ) . ' ' . 'fa-cog' );
				}

				if ( isset( $fa_font_arr[ $font_key ] ) ) {
					$replace_val = $fa_font_arr[ $font_key ]['style'] . ' ' . $fa_font_arr[ $font_key ]['code'];
					$value       = str_replace( $font_key, $replace_val, $value );
				}
				if ( isset( $fa_font_arr[ $font_key2 ] ) ) {
					$replace_val = $fa_font_arr[ $font_key2 ]['style'] . ' ' . $fa_font_arr[ $font_key2 ]['code'];
					$value       = str_replace( $font_key, $replace_val, $value );
				}
			}
		} else {

			$pattern              = "/'fa(\s)fa-(.*?)'/";
			$is_matched_availabel = preg_match_all( $pattern, $value, $match_arr );

			if ( $is_matched_availabel > 0 ) {
				foreach ( $match_arr[0] as $match_val ) {
					$match_val = preg_replace( '!\s+!', ' ', $match_val );
					$exp       = explode( ' ', $match_val );
					$font_key  = trim( str_replace( "'", '', $exp[0] ) . ' ' . str_replace( "'", '', $exp[1] ) );
					$font_key2 = '';

					if ( $exp[1] == 'fa-gears' ) {
						$font_key2 = trim( str_replace( '"', '', $exp[0] ) . ' ' . 'fa-cogs' );
					} elseif ( $exp[1] == 'fa-gear' ) {
						$font_key2 = trim( str_replace( '"', '', $exp[0] ) . ' ' . 'fa-cog' );
					}

					if ( isset( $fa_font_arr[ $font_key ] ) ) {
						$replace_val = $fa_font_arr[ $font_key ]['style'] . ' ' . $fa_font_arr[ $font_key ]['code'];
						$value       = str_replace( $font_key, $replace_val, $value );
					}
					if ( isset( $fa_font_arr[ $font_key2 ] ) ) {
						$replace_val = $fa_font_arr[ $font_key2 ]['style'] . ' ' . $fa_font_arr[ $font_key2 ]['code'];
						$value       = str_replace( $font_key, $replace_val, $value );
					}
				}
			}
		}

		$value = str_replace( 'arpfab arpfa-', 'fab fa-', $value );
		$value = str_replace( 'arpfas arpfa-', 'fas fa-', $value );
		$value = str_replace( 'arpfar arpfa-', 'far fa-', $value );
		$value = str_replace( 'arpfa arpfa-', 'fas fa-', $value );

		return $this->arp_update_ionicon_fonts( $value );
	}

	function arp_update_ionicon_fonts( $content ) {
        $font_icons = array(
            'ion-chevron-up'                      => 'icon-chevron-up',
			'ion-chevron-down'                    => 'icon-chevron-down',
			'ion-log-in'                          => 'icon-log-in',
			'ion-log-out'                         => 'icon-log-out',
			'ion-checkmark'                       => 'icon-checkmark',
			'ion-close'                           => 'icon-close',
			'ion-information'                     => 'icon-information',
			'ion-help'                            => 'icon-help',
			'ion-backspace-outline'               => 'icon-backspace-outline',
			'ion-backspace'                       => 'icon-backspace',
			'ion-help-buoy'                       => 'icon-help-buoy',
			'ion-alert'                           => 'icon-alert',
			'ion-refresh'                         => 'icon-refresh',
			'ion-shuffle'                         => 'icon-shuffle',
			'ion-home'                            => 'icon-home-sharp',
			'ion-search'                          => 'icon-search',
			'ion-flag'                            => 'icon-flag',
			'ion-star'                            => 'icon-star',
			'ion-heart'                           => 'icon-heart',
			'ion-settings'                        => 'icon-construct',
			'ion-hammer'                          => 'icon-hammer',
			'ion-document'                        => 'icon-document-outline',
			'ion-document-text'                   => 'icon-document-text',
			'ion-clipboard'                       => 'icon-clipboard',
			'ion-funnel'                          => 'icon-funnel',
			'ion-bookmark'                        => 'icon-bookmark',
			'ion-folder'                          => 'icon-folder',
			'ion-archive'                         => 'icon-archive',
			'ion-share'                           => 'icon-share',
			'ion-link'                            => 'icon-link',
			'ion-briefcase'                       => 'icon-briefcase',
			'ion-medkit'                          => 'icon-medkit',
			'ion-at'                              => 'icon-at',
			'ion-cloud'                           => 'icon-cloud',
			'ion-grid'                            => 'icon-apps-sharp',
			'ion-calendar'                        => 'icon-calendar',
			'ion-compass'                         => 'icon-compass',
			'ion-pin'                             => 'icon-pin',
			'ion-navigate'                        => 'icon-navigate',
			'ion-location'                        => 'icon-location',
			'ion-map'                             => 'icon-map',
			'ion-key'                             => 'icon-key',
			'ion-chatbubble'                      => 'icon-chatbubble',
			'ion-chatbubbles'                     => 'icon-chatbubbles',
			'ion-chatbox'                         => 'icon-chatbox',
			'ion-person'                          => 'icon-person',
			'ion-person-add'                      => 'icon-person-add',
			'ion-woman'                           => 'icon-woman',
			'ion-man'                             => 'icon-man',
			'ion-female'                          => 'icon-female',
			'ion-male'                            => 'icon-male',
			'ion-transgender'                     => 'icon-transgender',
			'ion-beer'                            => 'icon-beer',
			'ion-pizza'                           => 'icon-pizza',
			'ion-power'                           => 'icon-power',
			'ion-battery-full'                    => 'icon-battery-full',
			'ion-battery-half'                    => 'icon-battery-half',
			'ion-battery-charging'                => 'icon-battery-charging',
			'ion-wifi'                            => 'icon-wifi',
			'ion-bluetooth'                       => 'icon-bluetooth',
			'ion-calculator'                      => 'icon-calculator',
			'ion-camera'                          => 'icon-camera',
			'ion-eye'                             => 'icon-eye',
			'ion-flash'                           => 'icon-flash',
			'ion-flash-off'                       => 'icon-flash-off',
			'ion-image'                           => 'icon-image',
			'ion-images'                          => 'icon-images',
			'ion-contrast'                        => 'icon-contrast',
			'ion-aperture'                        => 'icon-aperture',
			'ion-crop'                            => 'icon-crop',
			'ion-easel'                           => 'icon-easel',
			'ion-laptop'                          => 'icon-laptop',
			'ion-bug'                             => 'icon-bug',
			'ion-code'                            => 'icon-code',
			'ion-code-working'                    => 'icon-code-working',
			'ion-code-download'                   => 'icon-code-download',
			'ion-disc'                            => 'icon-disc',
			'ion-volume-high'                     => 'icon-volume-high',
			'ion-volume-medium'                   => 'icon-volume-medium',
			'ion-volume-low'                      => 'icon-volume-low',
			'ion-play'                            => 'icon-play',
			'ion-pause'                           => 'icon-pause',
			'ion-stop'                            => 'icon-stop',
			'ion-card'                            => 'icon-card',
			'ion-cash'                            => 'icon-cash',
			'ion-pricetag'                        => 'icon-pricetag',
			'ion-pricetags'                       => 'icon-pricetags',
			'ion-happy-outline'                   => 'icon-happy-outline',
			'ion-happy'                           => 'icon-happy',
			'ion-sad-outline'                     => 'icon-sad-outline',
			'ion-sad'                             => 'icon-sad',
			'ion-tshirt'                          => 'icon-shirt',
			'ion-podium'                          => 'icon-podium',
			'ion-magnet'                          => 'icon-magnet',
			'ion-beaker'                          => 'icon-beaker',
			'ion-egg'                             => 'icon-egg',
			'ion-earth'                           => 'icon-earth',
			'ion-planet'                          => 'icon-planet',
			'ion-cube'                            => 'icon-cube',
			'ion-leaf'                            => 'icon-leaf',
			'ion-flame'                           => 'icon-flame',
			'ion-bonfire'                         => 'icon-bonfire',
			'ion-umbrella'                        => 'icon-umbrella',
			'ion-nuclear'                         => 'icon-nuclear',
			'ion-thermometer'                     => 'icon-thermometer',
			'ion-speedometer'                     => 'icon-speedometer',
			'ion-ionic'                           => 'icon-logo-ionic',
			'ion-arrow-up-b'                      => 'icon-caret-up',
			'ion-arrow-right-b'                   => 'icon-caret-forward',
			'ion-arrow-down-b'                    => 'icon-caret-down',
			'ion-arrow-left-b'                    => 'icon-caret-back',
			'ion-arrow-up-c'                      => 'icon-arrow-up',
			'ion-arrow-right-c'                   => 'icon-arrow-forward',
			'ion-arrow-left-c'                    => 'icon-arrow-back',
			'ion-arrow-down-c'                    => 'icon-arrow-down',
			'ion-arrow-swap'                      => 'icon-swap-horizontal',
			'ion-arrow-expand'                    => 'icon-expand',
			'ion-arrow-move'                      => 'icon-move',
			'ion-arrow-resize'                    => 'icon-resize',
			'ion-chevron-right'                   => 'icon-chevron-forward',
			'ion-chevron-left'                    => 'icon-chevron-back',
			'ion-checkmark-circled'               => 'icon-checkmark-circle',
			'ion-close-circled'                   => 'icon-close-circle',
			'ion-plus'                            => 'icon-add',
			'ion-plus-circled'                    => 'icon-add-circle',
			'ion-minus'                           => 'icon-remove',
			'ion-minus-circled'                   => 'icon-remove-circle',
			'ion-information-circled'             => 'icon-information-circle',
			'ion-help-circled'                    => 'icon-help-circle',
			'ion-alert-circled'                   => 'icon-warning',
			'ion-toggle-filled'                   => 'icon-switch',
			'ion-toggle'                          => 'icon-switch-outline',
			'ion-trash-a'                         => 'icon-trash',
			'ion-email'                           => 'ion-email',
			'ion-email-unread'                    => 'icon-mail-notification',
			'ion-paper-airplane'                  => 'icon-paper-plane',
			'ion-paperclip'                       => 'icon-attach',
			'ion-compose'                         => 'icon-create-outline',
			'ion-upload'                          => 'icon-cloud-upload',
			'ion-more'                            => 'icon-ellipsis-horizontal-sharp',
			'ion-locked'                          => 'icon-lock-closed',
			'ion-unlocked'                        => 'icon-lock-open',
			'ion-arrow-graph-up-right'            => 'icon-trending-up',
			'ion-arrow-graph-down-right'          => 'icon-trending-down',
			'ion-stats-bars'                      => 'icon-stats-chart',
			'ion-connection-bars'                 => 'icon-cellular',
			'ion-pie-graph'                       => 'icon-pie-chart',
			'ion-chatbubble-working'              => 'icon-chatbubble-ellipses',
			'ion-chatbox-working'                 => 'icon-chatbox-ellipses',
			'ion-wrench'                          => 'icon-build',
			'ion-wineglass'                       => 'icon-wine',
			'ion-icecream'                        => 'icon-ice-cream',
			'ion-battery-empty'                   => 'icon-battery-dead',
			'ion-eye-disabled'                    => 'icon-eye-off',
			'ion-qr-scanner'                      => 'icon-qr-code',
			'ion-wand'                            => 'icon-color-wand',
			'ion-paintbrush'                      => 'icon-brush',
			'ion-paintbucket'                     => 'icon-color-fill',
			'ion-printer'                         => 'icon-print',
			'ion-network'                         => 'icon-git-network',
			'ion-pull-request'                    => 'icon-git-compare',
			'ion-merge'                           => 'icon-git-merge',
			'ion-xbox'                            => 'icon-logo-xbox',
			'ion-playstation'                     => 'icon-logo-playstation',
			'ion-steam'                           => 'icon-logo-steam',
			'ion-closed-captioning'               => 'icon-logo-closed-captioning',
			'ion-headphone'                       => 'icon-headset',
			'ion-music-note'                      => 'icon-musical-notes',
			'ion-radio-waves'                     => 'icon-radio',
			'ion-mic-a'                           => 'icon-mic',
			'ion-skip-forward'                    => 'icon-play-forward',
			'ion-skip-backward'                   => 'icon-play-skip-forward',
			'ion-thumbsup'                        => 'icon-thumbs-up',
			'ion-thumbsdown'                      => 'icon-thumbs-down',
			'ion-tshirt-outline'                  => 'icon-shirt-outline',
			'ion-trophy'                          => 'icon-trophy',
			'ion-ribbon-b'                        => 'icon-ribbon',
			'ion-university'                      => 'icon-school',
			'ion-erlenmeyer-flask'                => 'icon-flask',
			'ion-lightbulb'                       => 'icon-bulb',
			'ion-waterdrop'                       => 'icon-water',
			'ion-scissors'                        => 'icon-cut',
			'ion-no-smoking'                      => 'icon-logo-no-smoking',
			'ion-model-s'                         => 'icon-car-sport',
			'ion-plane'                           => 'icon-airplane',
			'ion-ios-plus-outline'                => 'icon-add-circle-outline',
			'ion-ios-plus'                        => 'icon-add-circle-sharp',
			'ion-ios-close-outline'               => 'icon-close-circle-outline',
			'ion-ios-close'                       => 'icon-close-circle-sharp',
			'ion-ios-minus-outline'               => 'icon-remove-circle-outline',
			'ion-ios-minus'                       => 'icon-remove-circle-sharp',
			'ion-ios-information'                 => 'icon-information-circle',
			'ion-ios-help'                        => 'icon-help-circle',
			'ion-ios-search'                      => 'icon-search',
			'ion-ios-star'                        => 'icon-star',
			'ion-ios-checkmark-outline'           => 'icon-checkmark-circle-outline',
			'ion-ios-checkmark'                   => 'icon-checkmark-circle',
			'ion-ios-information-outline'         => 'icon-information-circle-outline',
			'ion-ios-help-outline'                => 'icon-help-circle-outline',
			'ion-ios-star-half'                   => 'icon-star-half-sharp',
			'ion-ios-star-outline'                => 'icon-star-outline',
			'ion-ios-heart'                       => 'icon-heart-sharp',
			'ion-ios-heart-outline'               => 'icon-heart-outline',
			'ion-ios-more'                        => 'icon-ellipsis-horizontal-sharp',
			'ion-ios-more-outline'                => 'icon-ellipsis-horizontal-outline',
			'ion-ios-home'                        => 'icon-home',
			'ion-ios-home-outline'                => 'icon-home-outline',
			'ion-ios-cloud'                       => 'icon-cloud-sharp',
			'ion-ios-cloud-outline'               => 'icon-cloud-outline',
			'ion-ios-cloud-upload'                => 'icon-cloud-upload-sharp',
			'ion-ios-cloud-upload-outline'        => 'icon-cloud-upload-outline',
			'ion-ios-cloud-download'              => 'icon-cloud-download-sharp',
			'ion-ios-cloud-download-outline'      => 'icon-cloud-download-outline',
			'ion-ios-download'                    => 'icon-download',
			'ion-ios-download-outline'            => 'icon-download-outline',
			'ion-ios-refresh'                     => 'icon-refresh-circle-sharp',
			'ion-ios-refresh-outline'             => 'icon-refresh-circle-outline',
			'ion-ios-reload'                      => 'icon-reload',
			'ion-ios-loop-strong'                 => 'icon-sync',
			'ion-ios-loop'                        => 'icon-sync-sharp',
			'ion-ios-bookmarks'                   => 'icon-bookmarks',
			'ion-ios-bookmarks-outline'           => 'icon-bookmarks-outline',
			'ion-ios-book'                        => 'icon-book',
			'ion-ios-book-outline'                => 'icon-book-outline',
			'ion-ios-flag'                        => 'icon-flag-sharp',
			'ion-ios-flag-outline'                => 'icon-flag-outline',
			'ion-ios-glasses'                     => 'icon-glasses',
			'ion-ios-glasses-outline'             => 'icon-glasses-outline',
			'ion-ios-browsers'                    => 'icon-browsers',
			'ion-ios-browsers-outline'            => 'icon-browsers-outline',
			'ion-ios-at'                          => 'icon-at-circle',
			'ion-ios-at-outline'                  => 'icon-at-circle-outline',
			'ion-ios-pricetag'                    => 'icon-pricetag-sharp',
			'ion-ios-pricetag-outline'            => 'icon-pricetag-outline',
			'ion-ios-pricetags'                   => 'icon-pricetags-sharp',
			'ion-ios-pricetags-outline'           => 'ion-ios-pricetags-outline',
			'ion-ios-cart'                        => 'icon-cart-sharp',
			'ion-ios-cart-outline'                => 'icon-cart-outline',
			'ion-ios-chatbubble'                  => 'icon-chatbubble-sharp',
			'ion-ios-chatbubble-outline'          => 'icon-chatbubble-outline',
			'ion-ios-cog'                         => 'icon-cog',
			'ion-ios-cog-outline'                 => 'icon-cog-outline',
			'ion-ios-settings'                    => 'icon-options-outline',
			'ion-ios-settings-strong'             => 'icon-options',
			'ion-ios-pie'                         => 'icon-pie-chart-sharp',
			'ion-ios-pie-outline'                 => 'icon-pie-chart-outline',
			'ion-ios-pulse'                       => 'icon-pulse',
			'ion-ios-pulse-strong'                => 'icon-pulse-sharp',
			'ion-ios-compose'                     => 'icon-create-sharp',
			'ion-ios-compose-outline'             => 'icon-create-outline',
			'ion-ios-trash'                       => 'icon-trash-sharp',
			'ion-ios-trash-outline'               => 'icon-trash-outline',
			'ion-ios-copy'                        => 'icon-copy',
			'ion-ios-copy-outline'                => 'ion-ios-copy-outline',
			'ion-ios-email'                       => 'icon-mail-sharp',
			'ion-ios-email-outline'               => 'ion-ios-email-outline',
			'ion-ios-undo'                        => 'icon-arrow-undo',
			'ion-ios-undo-outline'                => 'icon-arrow-undo-outline',
			'ion-ios-redo'                        => 'icon-arrow-redo',
			'ion-ios-redo-outline'                => 'icon-arrow-redo-outline',
			'ion-ios-paperplane'                  => 'icon-paper-plane-sharp',
			'ion-ios-paperplane-outline'          => 'icon-paper-plane-outline',
			'ion-ios-folder'                      => 'icon-folder-sharp',
			'ion-ios-folder-outline'              => 'icon-folder-outline',
			'ion-ios-paper'                       => 'icon-newspaper',
			'ion-ios-paper-outline'               => 'ion-ios-paper-outline',
			'ion-ios-list'                        => 'icon-list',
			'ion-ios-list-outline'                => 'icon-list-outline',
			'ion-ios-world'                       => 'icon-globe',
			'ion-ios-world-outline'               => 'icon-globe-outline',
			'ion-ios-alarm'                       => 'icon-alarm',
			'ion-ios-alarm-outline'               => 'icon-alarm-outline',
			'ion-ios-speedometer'                 => 'icon-speedometer-sharp',
			'ion-ios-speedometer-outline'         => 'icon-speedometer-outline',
			'ion-ios-stopwatch'                   => 'icon-stopwatch',
			'ion-ios-stopwatch-outline'           => 'icon-stopwatch-outline',
			'ion-ios-timer'                       => 'icon-timer',
			'ion-ios-timer-outline'               => 'icon-timer-outline',
			'ion-ios-time'                        => 'icon-time',
			'ion-ios-time-outline'                => 'icon-time-outline',
			'ion-ios-calendar'                    => 'icon-calendar-sharp',
			'ion-ios-calendar-outline'            => 'icon-calendar-outline',
			'ion-ios-albums'                      => 'icon-albums',
			'ion-ios-albums-outline'              => 'icon-albums-outline',
			'ion-ios-camera'                      => 'icon-camera-sharp',
			'ion-ios-camera-outline'              => 'icon-camera-outline',
			'ion-ios-reverse-camera'              => 'icon-camera-reverse',
			'ion-ios-reverse-camera-outline'      => 'icon-camera-reverse-outline',
			'ion-ios-eye'                         => 'icon-eye-sharp',
			'ion-ios-eye-outline'                 => 'icon-eye-outline',
			'ion-ios-bolt'                        => 'icon-flash-sharp',
			'ion-ios-bolt-outline'                => 'icon-flash-outline',
			'ion-ios-color-wand'                  => 'icon-color-wand-sharp',
			'ion-ios-color-wand-outline'          => 'icon-color-wand-outline',
			'ion-ios-color-filter'                => 'icon-color-filter',
			'ion-ios-color-filter-outline'        => 'icon-color-filter-outline',
			'ion-ios-crop-strong'                 => 'icon-crop-sharp',
			'ion-ios-crop'                        => 'icon-crop-outline',
			'ion-ios-barcode'                     => 'icon-barcode',
			'ion-ios-barcode-outline'             => 'icon-barcode-outline',
			'ion-ios-briefcase'                   => 'icon-briefcase-sharp',
			'ion-ios-briefcase-outline'           => 'icon-briefcase-outline',
			'ion-ios-medkit'                      => 'icon-medkit-sharp',
			'ion-ios-medkit-outline'              => 'icon-medkit-outline',
			'ion-ios-medical'                     => 'icon-medical',
			'ion-ios-medical-outline'             => 'icon-medical-outline',
			'ion-ios-infinite'                    => 'icon-infinite',
			'ion-ios-infinite-outline'            => 'icon-infinite-outline',
			'ion-ios-calculator-outline'          => 'icon-calculator-outline',
			'ion-ios-calculator'                  => 'icon-calculator-sharp',
			'ion-ios-infinite-outline'            => 'icon-infinite-outline',
			'ion-ios-keypad'                      => 'icon-keypad',
			'ion-ios-keypad-outline'              => 'icon-keypad-outline',
			'ion-ios-telephone'                   => 'icon-call',
			'ion-ios-telephone-outline'           => 'icon-call-outline',
			'ion-ios-location'                    => 'icon-location-sharp',
			'ion-ios-location-outline'            => 'icon-location-outline',
			'ion-ios-navigate'                    => 'icon-navigate-circle',
			'ion-ios-navigate-outline'            => 'icon-navigate-circle-outline',
			'ion-ios-locked'                      => 'icon-lock-closed-sharp',
			'ion-ios-locked-outline'              => 'icon-lock-closed-outline',
			'ion-ios-unlocked'                    => 'icon-lock-open-sharp',
			'ion-ios-unlocked-outline'            => 'icon-lock-open-outline',
			'ion-ios-printer'                     => 'icon-print-sharp',
			'ion-ios-printer-outline'             => 'icon-print-outline',
			'ion-ios-game-controller-b'           => 'icon-game-controller',
			'ion-ios-game-controller-b-outline'   => 'icon-game-controller-outline',
			'ion-ios-americanfootball'            => 'icon-american-football',
			'ion-ios-americanfootball-outline'    => 'icon-american-football-outline',
			'ion-ios-baseball'                    => 'icon-baseball',
			'ion-ios-baseball-outline'            => 'icon-baseball-outline',
			'ion-ios-basketball'                  => 'icon-basketball',
			'ion-ios-basketball-outline'          => 'icon-basketball-outline',
			'ion-ios-tennisball'                  => 'icon-tennisball',
			'ion-ios-tennisball-outline'          => 'icon-tennisball-outline',
			'ion-ios-football'                    => 'icon-football',
			'ion-ios-football-outline'            => 'icon-football-outline',
			'ion-ios-body'                        => 'icon-body',
			'ion-ios-body-outline'                => 'icon-body-outline',
			'ion-ios-person'                      => 'icon-person-sharp',
			'ion-ios-person-outline'              => 'icon-person-outline',
			'ion-ios-personadd'                   => 'icon-person-add-sharp',
			'ion-ios-personadd-outline'           => 'icon-person-add-outline',
			'ion-ios-people'                      => 'icon-people',
			'ion-ios-people-outline'              => 'icon-people-outline',
			'ion-ios-musical-notes'               => 'icon-musical-notes-sharp',
			'ion-ios-musical-note'                => 'icon-musical-note',
			'ion-ios-bell'                        => 'icon-notifications',
			'ion-ios-bell-outline'                => 'icon-notifications-outline',
			'ion-ios-mic'                         => 'icon-mic-sharp',
			'ion-ios-mic-outline'                 => 'icon-mic-outline',
			'ion-ios-mic-off'                     => 'icon-mic-off',
			'ion-ios-volume-high'                 => 'icon-volume-high-sharp',
			'ion-ios-volume-low'                  => 'icon-volume-low-sharp',
			'ion-ios-play'                        => 'icon-play-sharp',
			'ion-ios-play-outline'                => 'icon-play-outline',
			'ion-ios-pause'                       => 'icon-pause-sharp',
			'ion-ios-pause-outline'               => 'ion-ios-pause-outline',
			'ion-ios-recording'                   => 'icon-recording',
			'ion-ios-recording-outline'           => 'icon-recording-outline',
			'ion-ios-fastforward'                 => 'icon-play-forward',
			'ion-ios-fastforward-outline'         => 'icon-play-forward-outline',
			'ion-ios-rewind'                      => 'icon-play-back-sharp',
			'ion-ios-rewind-outline'              => 'icon-play-back-outline',
			'ion-ios-skipbackward'                => 'icon-play-skip-back-sharp',
			'ion-ios-skipbackward-outline'        => 'icon-play-skip-back-outline',
			'ion-ios-skipforward'                 => 'icon-play-skip-forward-sharp',
			'ion-ios-skipforward-outline'         => 'icon-play-skip-forward-outline',
			'ion-ios-shuffle-strong'              => 'icon-shuffle-sharp',
			'ion-ios-shuffle'                     => 'icon-shuffle',
			'ion-ios-videocam'                    => 'icon-videocam',
			'ion-ios-videocam-outline'            => 'icon-videocam-outline',
			'ion-ios-film'                        => 'icon-film',
			'ion-ios-film-outline'                => 'icon-film-outline',
			'ion-ios-flask'                       => 'icon-flask-sharp',
			'ion-ios-flask-outline'               => 'icon-flask-outline',
			'ion-ios-lightbulb'                   => 'icon-bulb-sharp',
			'ion-ios-lightbulb-outline'           => 'icon-bulb-outline',
			'ion-ios-wineglass'                   => 'icon-wine-sharp',
			'ion-ios-wineglass-outline'           => 'icon-wine-outline',
			'ion-ios-pint'                        => 'icon-pint',
			'ion-ios-pint-outline'                => 'icon-pint-outline',
			'ion-ios-nutrition'                   => 'icon-nutrition',
			'ion-ios-nutrition-outline'           => 'icon-nutrition-outline',
			'ion-ios-flower'                      => 'icon-flower',
			'ion-ios-flower-outline'              => 'icon-flower-outline',
			'ion-ios-rose'                        => 'icon-rose',
			'ion-ios-rose-outline'                => 'icon-rose-outline',
			'ion-ios-paw'                         => 'icon-paw',
			'ion-ios-paw-outline'                 => 'icon-paw-outline',
			'ion-ios-flame'                       => 'icon-flame-sharp',
			'ion-ios-flame-outline'               => 'icon-flame-outline',
			'ion-ios-sunny'                       => 'icon-sunny',
			'ion-ios-sunny-outline'               => 'icon-sunny-outline',
			'ion-ios-partlysunny'                 => 'icon-partly-sunny',
			'ion-ios-partlysunny-outline'         => 'icon-partly-sunny-outline',
			'ion-ios-cloudy'                      => 'icon-cloudy',
			'ion-ios-cloudy-outline'              => 'icon-cloudy-outline',
			'ion-ios-rainy'                       => 'icon-rainy',
			'ion-ios-rainy-outline'               => 'icon-rainy-outline',
			'ion-ios-thunderstorm'                => 'icon-thunderstorm',
			'ion-ios-thunderstorm-outline'        => 'icon-thunderstorm-outline',
			'ion-ios-snowy'                       => 'icon-snow',
			'ion-ios-moon'                        => 'icon-moon',
			'ion-ios-moon-outline'                => 'icon-moon-outline',
			'ion-ios-cloudy-night'                => 'icon-cloudy-night',
			'ion-ios-cloudy-night-outline'        => 'icon-cloudy-night-outline',
			'ion-android-arrow-dropup'            => 'icon-caret-up',
			'ion-android-arrow-dropup-circle'     => 'icon-caret-up-circle',
			'ion-android-arrow-dropright'         => 'icon-caret-forward',
			'ion-android-arrow-dropright-circle'  => 'icon-caret-forward-circle',
			'ion-android-arrow-dropdown'          => 'icon-caret-down',
			'ion-android-arrow-dropdown-circle'   => 'icon-caret-down-circle',
			'ion-android-arrow-dropleft'          => 'icon-caret-back',
			'ion-android-arrow-dropleft-circle'   => 'icon-caret-back-circle',
			'ion-android-add'                     => 'icon-add',
			'ion-android-add-circle'              => 'icon-add-circle',
			'ion-android-remove'                  => 'icon-remove',
			'ion-android-remove-circle'           => 'icon-remove-circle',
			'ion-android-close'                   => 'icon-close',
			'ion-android-cancel'                  => 'icon-close-circle',
			'ion-android-radio-button-off'        => 'icon-radio-off',
			'ion-android-radio-button-on'         => 'icon-radio-on',
			'ion-android-checkmark-circle'        => 'icon-checkmark-circle',
			'ion-android-checkbox-outline'        => 'icon-checkbox-outline',
			'ion-android-checkbox'                => 'icon-checkbox',
			'ion-android-done'                    => 'icon-checkmark',
			'ion-android-done-all'                => 'icon-checkmark-done-sharp',
			'ion-android-menu'                    => 'icon-menu',
			'ion-android-more-horizontal'         => 'icon-ellipsis-horizontal-sharp',
			'ion-android-more-vertical'           => 'icon-ellipsis-vertical-sharp',
			'ion-android-refresh'                 => 'icon-refresh',
			'ion-android-sync'                    => 'icon-sync',
			'ion-android-wifi'                    => 'icon-wifi',
			'ion-android-call'                    => 'icon-call',
			'ion-android-apps'                    => 'icon-apps',
			'ion-android-settings'                => 'icon-settings',
			'ion-android-options'                 => 'icon-options',
			'ion-android-funnel'                  => 'icon-funnel',
			'ion-android-search'                  => 'icon-search',
			'ion-android-home'                    => 'icon-home-sharp',
			'ion-android-cloud-outline'           => 'icon-cloud-outline',
			'ion-android-cloud'                   => 'icon-cloud-sharp',
			'ion-android-download'                => 'icon-cloud-download',
			'ion-android-upload'                  => 'icon-cloud-upload',
			'ion-android-cloud-done'              => 'icon-cloud-done',
			'ion-android-cloud-circle'            => 'icon-cloud-circle',
			'ion-android-favorite-outline'        => 'icon-heart-outline',
			'ion-android-favorite'                => 'icon-heart',
			'ion-android-star-outline'            => 'icon-star-outline',
			'ion-android-star-half'               => 'icon-star-half',
			'ion-android-star'                    => 'icon-star',
			'ion-android-calendar'                => 'icon-calendar',
			'ion-android-time'                    => 'icon-time',
			'ion-android-stopwatch'               => 'icon-stopwatch',
			'ion-android-watch'                   => 'icon-watch',
			'ion-android-locate'                  => 'icon-locate',
			'ion-android-navigate'                => 'icon-navigate',
			'ion-android-pin'                     => 'icon-location',
			'ion-android-compass'                 => 'icon-compass',
			'ion-android-map'                     => 'icon-map',
			'ion-android-walk'                    => 'icon-walk',
			'ion-android-bicycle'                 => 'icon-bicycle',
			'ion-android-car'                     => 'icon-car',
			'ion-android-bus'                     => 'icon-bus',
			'ion-android-subway'                  => 'icon-subway',
			'ion-android-train'                   => 'icon-train',
			'ion-android-boat'                    => 'icon-boat',
			'ion-android-plane'                   => 'icon-airplane',
			'ion-android-restaurant'              => 'icon-restaurant',
			'ion-android-bar'                     => 'icon-wine-sharp',
			'ion-android-cart'                    => 'icon-cart',
			'ion-android-camera'                  => 'icon-camera',
			'ion-android-image'                   => 'icon-image',
			'ion-android-film'                    => 'icon-film',
			'ion-android-color-palette'           => 'icon-color-palette',
			'ion-android-create'                  => 'icon-create',
			'ion-android-mail'                    => 'icon-mail',
			'ion-android-drafts'                  => 'icon-mail-open',
			'ion-android-send'                    => 'icon-send',
			'ion-android-archive'                 => 'icon-archive',
			'ion-android-attach'                  => 'icon-attach',
			'ion-android-share'                   => 'icon-share',
			'ion-android-share-alt'               => 'icon-share-social',
			'ion-android-bookmark'                => 'icon-bookmark',
			'ion-android-clipboard'               => 'icon-clipboard',
			'ion-android-document'                => 'icon-document',
			'ion-android-list'                    => 'icon-list',
			'ion-android-folder-open'             => 'icon-folder-open-outline',
			'ion-android-folder'                  => 'icon-folder',
			'ion-android-print'                   => 'icon-print',
			'ion-android-open'                    => 'icon-open',
			'ion-android-exit'                    => 'icon-exit',
			'ion-android-contract'                => 'icon-contract',
			'ion-android-expand'                  => 'icon-expand',
			'ion-android-globe'                   => 'icon-globe',
			'ion-android-textsms'                 => 'icon-chatbox-ellipses',
			'ion-android-happy'                   => 'icon-happy-outline',
			'ion-android-sad'                     => 'icon-sad-outline',
			'ion-android-person'                  => 'icon-person',
			'ion-android-people'                  => 'icon-people',
			'ion-android-person-add'              => 'icon-person-add',
			'ion-android-contact'                 => 'icon-person-circle',
			'ion-android-contacts'                => 'icon-people-circle',
			'ion-android-playstore'               => 'icon-logo-google-playstore',
			'ion-android-lock'                    => 'icon-lock-closed',
			'ion-android-unlock'                  => 'icon-lock-open',
			'ion-android-notifications-none'      => 'icon-notifications-outline',
			'ion-android-notifications'           => 'icon-notifications-sharp',
			'ion-android-notifications-off'       => 'icon-notifications-off',
			'ion-android-volume-mute'             => 'icon-volume-off',
			'ion-android-volume-down'             => 'icon-volume-low',
			'ion-android-volume-up'               => 'icon-volume-high',
			'ion-android-volume-off'              => 'ion-android-volume-mute',
			'ion-android-hand'                    => 'icon-hand-left',
			'ion-android-desktop'                 => 'icon-desktop-outline',
			'ion-android-laptop'                  => 'icon-laptop-outline',
			'ion-android-phone-portrait'          => 'icon-phone-portrait-sharp',
			'ion-android-phone-landscape'         => 'icon-phone-landscape-sharp',
			'ion-android-bulb'                    => 'icon-bulb',
			'ion-android-sunny'                   => 'icon-sunny-outline',
			'ion-android-alert'                   => 'icon-alert-circle',
			'ion-android-warning'                 => 'icon-warning',
			'ion-social-twitter'                  => 'icon-logo-twitter',
			'ion-social-facebook'                 => 'icon-logo-facebook',
			'ion-social-google'                   => 'icon-logo-google',
			'ion-social-dribbble'                 => 'ion-social-dribbble',
			'ion-social-octocat'                  => 'icon-logo-octocat',
			'ion-social-github'                   => 'icon-logo-github',
			'ion-social-instagram-outline'        => 'icon-logo-instagram',
			'ion-social-whatsapp-outline'         => 'icon-logo-whatsapp',
			'ion-social-snapchat'                 => 'icon-logo-snapchat',
			'ion-social-foursquare'               => 'icon-logo-foursquare',
			'ion-social-pinterest'                => 'icon-logo-pinterest',
			'ion-social-rss'                      => 'icon-logo-rss',
			'ion-social-tumblr'                   => 'icon-logo-tumblr',
			'ion-social-wordpress'                => 'icon-logo-wordpress',
			'ion-social-reddit'                   => 'icon-logo-reddit',
			'ion-social-hackernews'               => 'icon-logo-hackernews',
			'ion-social-designernews'             => 'icon-logo-designernews',
			'ion-social-yahoo'                    => 'icon-logo-yahoo',
			'ion-social-buffer'                   => 'icon-logo-buffer',
			'ion-social-skype'                    => 'icon-logo-skype',
			'ion-social-linkedin'                 => 'icon-logo-linkedin',
			'ion-social-vimeo'                    => 'icon-logo-vimeo',
			'ion-social-twitch'                   => 'icon-logo-twitch',
			'ion-social-youtube'                  => 'icon-logo-youtube',
			'ion-social-dropbox'                  => 'icon-logo-dropbox',
			'ion-social-apple'                    => 'icon-logo-apple',
			'ion-social-android'                  => 'icon-logo-android',
			'ion-social-windows'                  => 'icon-logo-windows',
			'ion-social-html5'                    => 'icon-logo-html5',
			'ion-social-css3'                     => 'icon-logo-css3',
			'ion-social-javascript'               => 'icon-logo-javascript',
			'ion-social-angular'                  => 'icon-logo-angular',
			'ion-social-nodejs'                   => 'icon-logo-nodejs',
			'ion-social-sass'                     => 'icon-logo-sass',
			'ion-social-python'                   => 'icon-logo-python',
			'ion-social-chrome'                   => 'icon-logo-chrome',
			'ion-social-codepen'                  => 'icon-logo-codepen',
			'ion-social-markdown'                 => 'icon-logo-markdown',
			'ion-social-tux'                      => 'icon-logo-tux',
			'ion-social-usd'                      => 'icon-logo-usd',
			'ion-social-bitcoin'                  => 'icon-logo-bitcoin',
			'ion-social-yen'                      => 'icon-logo-yen',
			'ion-social-euro'                     => 'icon-logo-euro',
			'ion-arrow-shrink'                    => 'icon-contract',
			'ion-navicon-round'                   => 'icon-reorder-three',
			'ion-navicon'                         => 'icon-reorder-three-outline',
			'ion-checkmark-round'                 => 'icon-checkmark-sharp',
			'ion-close-round'                     => 'icon-close-sharp',
			'ion-plus-round'                      => 'icon-add-sharp',
			'ion-minus-round'                     => 'icon-remove-sharp',
			'ion-gear-b'                          => 'icon-settings-sharp',
			'ion-filing'                          => 'icon-albums-sharp',
			'ion-reply'                           => 'icon-arrow-undo-sharp',
			'ion-forward'                         => 'icon-arrow-redo-sharp',
			'ion-ios-arrow-back'                  => 'icon-chevron-back',
			'ion-ios-arrow-forward'               => 'icon-chevron-forward',
			'ion-ios-arrow-up'                    => 'icon-chevron-up',
			'ion-ios-arrow-right'                 => 'icon-chevron-forward',
			'ion-ios-arrow-down'                  => 'icon-chevron-down',
			'ion-ios-arrow-left'                  => 'icon-chevron-back',
			'ion-ios-checkmark-empty'             => 'icon-checkmark-outline',
			'ion-ios-plus-empty'                  => 'icon-add-outline',
			'ion-ios-close-empty'                 => 'icon-close-outline',
			'ion-ios-minus-empty'                 => 'icon-remove-outline',
			'ion-ios-information-empty'           => 'icon-information-outline',
			'ion-ios-help-empty'                  => 'icon-help-outline',
			'ion-ios-search-strong'               => 'icon-search-sharp',
			'ion-ios-upload'                      => 'icon-share',
			'ion-ios-upload-outline'              => 'icon-share-outline',
			'ion-ios-refresh-empty'               => 'icon-refresh-outline',
			'ion-ios-gear'                        => 'icon-settings-sharp',
			'ion-ios-gear-outline'                => 'icon-settings-outline',
			'ion-ios-filing'                      => 'icon-file-tray',
			'ion-ios-filing-outline'              => 'ion-ios-filing-outline',
			'ion-android-arrow-up'                => 'icon-arrow-up',
			'ion-android-arrow-forward'           => 'icon-arrow-forward',
			'ion-android-arrow-down'              => 'icon-arrow-down',
			'ion-android-arrow-back'              => 'icon-arrow-back',
			'ion-android-checkbox-outline-blank'  => 'icon-square-outline',
			'ion-android-checkbox-blank'          => 'icon-square',
			'ion-ios-circle-outline'              => 'icon-radio-off-outline',
			'ion-android-chat'                    => 'icon-chatbubbles',
			'ion-chatboxes'                       => 'icon-chatbubbles',
			'ion-ios-chatboxes'                   => 'icon-chatbubbles-sharp',
			'ion-ios-chatboxes-outline'           => 'icon-chatbubbles-outline',
			'ion-clock'                           => 'icon-time-outline',
			'ion-ios-clock'                       => 'icon-time-sharp',
			'ion-ios-clock-outline'               => 'icon-time-outline',
			'ion-gear-a'                          => 'icon-settings-sharp',
			'ion-edit'                            => 'icon-pencil',
			'ion-trash-b'                         => 'icon-trash-bin',
			'ion-android-delete'                  => 'icon-trash-sharp',
			'ion-android-alarm-clock'             => 'icon-alarm-sharp',
			'ion-bag'                             => 'icon-basket',
			'ion-drag'                            => 'icon-reorder-three',
			'ion-ios-circle-filled'               => 'icon-ellipse',
			'ion-record'                          => 'icon-ellipse-sharp',
			'ion-ios-drag'                        => 'icon-reorder-three-outline',
			'ion-loop'                            => 'icon-sync-sharp',
			'ion-coffee'                          => 'icon-cafe',
			'ion-person-stalker'                  => 'icon-people',
			'ion-ios-arrow-thin-up'               => 'icon-arrow-up-outline',
			'ion-ios-arrow-thin-right'            => 'icon-arrow-forward-outline',
			'ion-ios-arrow-thin-down'             => 'icon-arrow-down-outline',
			'ion-ios-arrow-thin-left'             => 'icon-arrow-back-outline',
			'ion-speakerphone'                    => 'icon-megaphone',
			'ion-monitor'                         => 'icon-desktop-sharp',
			'ion-ios-monitor'                     => 'icon-desktop',
			'ion-ios-monitor-outline'             => 'icon-desktop-outline',
			'ion-ipad'                            => 'icon-tablet-portrait-sharp',
			'ion-iphone'                          => 'icon-phone-portrait-sharp',
			'ion-ipod'                            => 'icon-phone-portrait-outline'
        );

        foreach( $font_icons as $key => $value ){
            $pattern = '/icon(\s+)('. str_replace( '-', '\\-', $key ) . '\s)(|\s+)/';
            if( preg_match( $pattern, $content ) ){
                $content = preg_replace( $pattern, 'icon$1'.$value.' $3', $content );
                break;
            }

        }

        return $content;
    }
}
?>
