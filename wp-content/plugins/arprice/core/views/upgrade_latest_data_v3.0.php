<?php

global $wpdb,$arp_update_table,$arprice_import_export,$arp_pricingtable,$arprice_images_css_version;


update_option('arp_db_version_before_3.0',$arp_newdbversion);


$arp_price_backup_tbl = $wpdb->prefix.'arp_arprice_backup_v3.0';
$arp_price_options_backup_tbl = $wpdb->prefix.'arp_arprice_options_backup_v3.0';

$wpdb->query("CREATE TABLE `".$arp_price_backup_tbl."` LIKE `".$wpdb->prefix."arp_arprice`");
$wpdb->query("INSERT `".$arp_price_backup_tbl."` SELECT * FROM `".$wpdb->prefix."arp_arprice`");

$wpdb->query("CREATE TABLE `".$arp_price_options_backup_tbl."` LIKE `".$wpdb->prefix."arp_arprice_options`");
$wpdb->query("INSERT `".$arp_price_options_backup_tbl."` SELECT * FROM `".$wpdb->prefix."arp_arprice_options`");


$wp_upload_dir = wp_upload_dir();
$source_dir = $wp_upload_dir['basedir'].'/arprice';
$destination_dir = $wp_upload_dir['basedir'].'/arprice_backup_v3';

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

    
    global $arprice_images_css_previous_version;
	if( $arprice_images_css_previous_version == '' ){
	    $arprice_images_css_previous_version = '2.0';
	}
	$source_template_dir = PRICINGTABLE_DIR.'/css/templates';

	$template_dir = opendir($source_template_dir);

	while(($file = readdir($template_dir)) != false ){
	    if( $file != '' && file_exists($source_template_dir.'/'.$file)  ){
	        $pattern = '/arptemplate_(\d+)_v'.$arprice_images_css_previous_version.'.css/';
	        if( preg_match($pattern,$file) ){
	        	unlink($source_template_dir.'/'.$file);
	        }
	    }
	}

	unlink(PRICINGTABLE_DIR.'/js/jquery.bpopup.min.js');

	update_option('arp_enable_loader','arp_enable_loader');

}