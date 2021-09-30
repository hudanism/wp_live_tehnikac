<?php

global $wpdb, $arp_pricingtable, $arp_newdbversion;

@ini_set('max_execution_time', 0);

/* REMOVING BACKUP OF TABLES */

$wpdb->query( "DROP TABLE IF EXISTS `".$wpdb->prefix . "arp_arprice_temp`" );
$wpdb->query( "DROP TABLE IF EXISTS `".$wpdb->prefix . "arp_arprice_options_temp`" );
$wpdb->query( "DROP TABLE IF EXISTS `".$wpdb->prefix . "arp_arprice_temp_latest`" );
$wpdb->query( "DROP TABLE IF EXISTS `".$wpdb->prefix . "arp_arprice_backup_v3.0`" );
$wpdb->query( "DROP TABLE IF EXISTS `".$wpdb->prefix . "arp_arprice_options_backup_v3.0`" );

$wp_upload_dir = wp_upload_dir();
$backup_dir = $wp_upload_dir['basedir'].'/arprice_backup_v3';
if( is_dir($backup_dir) ){
	arp_rmdir( $backup_dir );
}

/* CREATING BACKUP OF TABLES */

$arp_price_backup_tbl = $wpdb->prefix.'arp_arprice_backup_v3.5';
$arp_price_options_backup_tbl = $wpdb->prefix.'arp_arprice_options_backup_v3.5';

$wpdb->query("CREATE TABLE `".$arp_price_backup_tbl."` LIKE `".$wpdb->prefix."arp_arprice`");
$wpdb->query("INSERT `".$arp_price_backup_tbl."` SELECT * FROM `".$wpdb->prefix."arp_arprice`");

$wpdb->query("CREATE TABLE `".$arp_price_options_backup_tbl."` LIKE `".$wpdb->prefix."arp_arprice_options`");
$wpdb->query("INSERT `".$arp_price_options_backup_tbl."` SELECT * FROM `".$wpdb->prefix."arp_arprice_options`");


$wp_upload_dir = wp_upload_dir();
$source_dir = $wp_upload_dir['basedir'].'/arprice';
$destination_dir = $wp_upload_dir['basedir'].'/arprice_backup_v35';

$arp_pricingtable->arp_copy_folder($source_dir,$destination_dir,0755);

update_option( 'arp_3_5_update_date', date( 'Y-m-d H:i:s' ) );
$timestamp = strtotime('+1 month');
wp_schedule_single_event( $timestamp, 'arp_remove_backup_data' );

/* Removing Preview Table Data */
$wpdb->query("DELETE FROM " . $wpdb->options . " WHERE option_name LIKE '%arp_previewtabledata_%'");

/* REINSTALLING TEMPLATES */
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


/* ADD NEW OPTION FOR WRAPPER ALIGNMENT AND MODIFING COLUMN/BUTTON HOVER EFFECT */

$all_created_tables = $wpdb->get_results( $wpdb->prepare("SELECT * FROM `".$wpdb->prefix."arp_arprice` WHERE `is_template` = %d AND `status` = %s",0,'published'));
require_once(ABSPATH . 'wp-admin/includes/file.php');
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

	$disable_hover_effect = isset( $general_options['column_settings']['disable_hover_effect'] ) ? $general_options['column_settings']['disable_hover_effect'] : 0;
	$disable_button_hover_effect = isset( $general_options['column_settings']['disable_button_hover_effect'] ) ? $general_options['column_settings']['disable_button_hover_effect'] : 0;

	$enable_hover_effect = 1;
	if( $disable_hover_effect == 1 ){
		$enable_hover_effect = 0;
	}

	$enable_button_hover_effect = 1;
	if( $disable_button_hover_effect == 1 ){
		$enable_button_hover_effect = 0;
	}

	$general_options_updated['column_settings']['enable_hover_effect'] = $enable_hover_effect;
	$general_options_updated['column_settings']['enable_button_hover_effect'] = $enable_button_hover_effect;

	$final_updated_opts = maybe_serialize($general_options_updated);

	$wpdb->update(
		$wpdb->prefix.'arp_arprice',
		array( 'general_options' => $final_updated_opts ),
		array( 'ID' => $table_id ),
		array( '%s' ),
		array( '%d' )
	);

	WP_Filesystem();

	global $wp_filesystem,$arprice_images_css_version;

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
}

/* APPLYING NEW CAPABILITIES TO ALL ADMINISTRATOR */
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

if ($wpdb->has_cap('collation')) {

    if (!empty($wpdb->charset))
        $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

    if (!empty($wpdb->collate))
        $charset_collate .= " COLLATE $wpdb->collate";
}

$ab_table_name = $wpdb->prefix.'arp_ab_testing';

$ab_table_sql = "CREATE TABLE IF NOT EXISTS `{$ab_table_name}`(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    options LONGTEXT NOT NULL,
    created_date DATETIME NOT NULL,
    last_updated_date DATETIME NOT NULL
){$charset_collate}";

$wpdb->query( $ab_table_sql );

/* MODIFYING ANALYTICS TABLE */
$analytics_table_name = $wpdb->prefix.'arp_arprice_analytics';
$wpdb->query( "ALTER TABLE `{$analytics_table_name}` ADD `unique_view` TINYINT(1) NOT NULL DEFAULT '1' AFTER `plan_id`;" );