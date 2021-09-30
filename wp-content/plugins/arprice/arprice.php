<?php
/* Plugin Name: ARPrice - Premium WordPress Pricing Table Plugin
  Description: Most Popular Pricing Table Plugin to Create Beautiful Responsive Pricing Tables as well as Team Showcases. It comes with 300+ ready samples.
  Version: 3.9
  Plugin URI: https://www.arpriceplugin.com
  Author: Repute InfoSystems
  Author URI: https://www.arpriceplugin.com
  Text Domain: ARPrice
 */


if (is_ssl())
    define('ARPURL', str_replace('http://', 'https://', WP_PLUGIN_URL . '/arprice'));
else
    define('ARPURL', WP_PLUGIN_URL . '/arprice');

define('PRICINGTABLE_DIR', WP_PLUGIN_DIR . '/arprice');
define('PRICINGTABLE_URL', ARPURL);
define('PRICINGTABLE_CORE_DIR', PRICINGTABLE_DIR . '/core');
define('PRICINGTABLE_CLASSES_DIR', PRICINGTABLE_DIR . '/core/classes');
define('PRICINGTABLE_CLASSES_URL', PRICINGTABLE_URL . '/core/classes');
define('PRICINGTABLE_IMAGES_URL', PRICINGTABLE_URL . '/images');
define('PRICINGTABLE_INC_DIR', PRICINGTABLE_DIR . '/inc');
define('PRICINGTABLE_VIEWS_DIR', PRICINGTABLE_DIR . '/core/views');
define('PRICINGTABLE_MODEL_DIR', PRICINGTABLE_DIR . '/core/models');

if( ! defined('FS_METHOD') ){
    define('FS_METHOD', 'direct');
}

define('ARPRICECSURL', PRICINGTABLE_URL . '/arprice_cs');
define('ARPRICECSDIR', PRICINGTABLE_DIR . '/arprice_cs');

$geoip_file = PRICINGTABLE_CORE_DIR.'/geoip/autoload.php';
if( file_exists($geoip_file) ){
    include $geoip_file;
}
use GeoIp2\Database\Reader;

$wpupload_dir = wp_upload_dir();
$upload_dir = $wpupload_dir['basedir'] . '/arprice';
$upload_url = $wpupload_dir['baseurl'] . '/arprice';

if (is_ssl()) {
    $upload_url = str_replace("http://", "https://", $wpupload_dir['baseurl'] . '/arprice');
    $bg_img_upload_url = str_replace("http://", "https://", $wpupload_dir['baseurl'] . '/arprice/template_background_image/');
} else {
    $upload_url = $wpupload_dir['baseurl'] . '/arprice';
    $bg_img_upload_url = $wpupload_dir['baseurl'] . '/arprice/template_background_image/';
}

wp_mkdir_p($upload_dir);

$css_upload_dir = $upload_dir . '/css';
wp_mkdir_p($css_upload_dir);

$template_images_upload_dir = $upload_dir . '/template_images';
wp_mkdir_p($template_images_upload_dir);

$arp_import_dir = $upload_dir . '/import';
wp_mkdir_p($arp_import_dir);

$arp_table_background_img = $upload_dir . '/template_background_image';
wp_mkdir_p($arp_table_background_img);

define('PRICINGTABLE_UPLOAD_DIR', $upload_dir);

define('PRICINGTABLE_UPLOAD_URL', $upload_url);
define('PRICINGTABLE_BG_IMG_UPLOAD_URL', $bg_img_upload_url);

global $arp_chk_version;

global $pagenow;

global $arp_template_loaded;
$arp_template_loaded = false;

global $arp_pricingtable;
$arp_pricingtable = new ARP_PricingTable();


global $arprice_version;
$arprice_version = '3.9';

global $arprice_images_css_version;
$arprice_images_css_version = '3.0';

global $arprice_images_css_previous_version;
$arprice_images_css_previous_version = '2.0';

global $allrole;
$allrole = array("editor", "author", "contributor", "subscriber");

global $pricingtableajaxurl;
$pricingtableajaxurl = admin_url('admin-ajax.php');

global $arp_update_table;
$arp_update_table = false;

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice.php'))
    require_once( PRICINGTABLE_CLASSES_DIR . '/class.arprice.php' );

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice_form.php'))
    require_once( PRICINGTABLE_CLASSES_DIR . '/class.arprice_form.php' );

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice_analytics.php'))
    require_once( PRICINGTABLE_CLASSES_DIR . '/class.arprice_analytics.php' );

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice_import_export.php'))
    require_once( ( PRICINGTABLE_CLASSES_DIR . '/class.arprice_import_export.php' ) );

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arp_fonts.php'))
    require_once( ( PRICINGTABLE_CLASSES_DIR . '/class.arp_fonts.php' ) );

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arp_default_settings.php'))
    require_once( (PRICINGTABLE_CLASSES_DIR . '/class.arp_default_settings.php'));

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice_old_template_css_array.php'))
    require_once( (PRICINGTABLE_CLASSES_DIR . '/class.arprice_old_template_css_array.php'));

if( file_exists( PRICINGTABLE_CLASSES_DIR . '/class.arprice_ab_testing.php' ) ){
    require_once( (PRICINGTABLE_CLASSES_DIR . '/class.arprice_ab_testing.php' ) );
}

if( file_exists( PRICINGTABLE_CLASSES_DIR . '/class.arprice_file_handler.php' ) ){
    require_once( PRICINGTABLE_CLASSES_DIR . '/class.arprice_file_handler.php' );
}

if( !function_exists('is_plugin_active') ){
	include_once(ABSPATH . 'wp-admin/includes/plugin.php' );
}
if (is_plugin_active('elementor/elementor.php') && file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice_elementor.php')){
    require_once( (PRICINGTABLE_CLASSES_DIR . '/class.arprice_elementor.php'));

    global $arprice_elementor;
	$arprice_elementor = new arpriceelementcontroller();
}

if(is_plugin_active('kingcomposer/kingcomposer.php') && file_exists(PRICINGTABLE_CLASSES_DIR. '/class.arprice_kc_element.php')){

    require_once((PRICINGTABLE_CLASSES_DIR .'/class.arprice_kc_element.php'));

    global $arprice_king_composer;
    $arprice_king_composer = new arpricekccontroller();
}
if(is_plugin_active('beaver-builder-lite-version/fl-builder.php') || is_plugin_active('bb-plugin/fl-builder.php') && file_exists(PRICINGTABLE_CLASSES_DIR.'/class.arprice_bb_element.php')){
    require_once(PRICINGTABLE_CLASSES_DIR .'/class.arprice_bb_element.php');
}

global $arprice_class;
$arprice_class = new arprice();

global $arprice_form;
$arprice_form = new arprice_form();

global $arprice_analytics;
$arprice_analytics = new arprice_analytics;

global $arprice_import_export;
$arprice_import_export = new arprice_import_export();

global $arprice_fonts;
$arprice_fonts = new arprice_fonts();

global $arprice_default_settings;
$arprice_default_settings = new arp_default_settings();

global $arprice_old_template_css;
$arprice_old_template_css = new ARPrice_old_template_css();

global $arprice_ab_testing;
$arprice_ab_testing = new ARPrice_AB_testing();

global $arp_api_url, $arp_plugin_slug, $wp_version;

global $arp_mainoptionsarr;
global $arp_coloptionsarr;
global $arp_tempbuttonsarr;
global $arp_templateorderarr;
global $arp_templatecssinfoarr;
global $arp_templateresponsivearr;
global $arp_template_editor_arr;
global $arp_templatesectionsarr;
global $arp_templatecustomskinarr;
global $arp_templatehoverclassarr;

global $arp_is_animation, $arp_has_tooltip, $arp_has_fontawesome, $arp_effect_css, $arp_is_lightbox, $arp_animate_price, $arp_has_material_icons, $arp_has_typicons, $arp_has_ionicons;
$arp_is_animation = 0;
$arp_has_tooltip = 0;
$arp_has_fontawesome = 0;
$arp_has_material_icons = 0;
$arp_has_typicons = 0;
$arp_has_ionicons = 0;
$arp_effect_css = 0;
$arp_is_lightbox = 0;
$arp_animate_price = 0;

if (class_exists('WP_Widget')) {
    require_once(PRICINGTABLE_DIR . '/core/widgets/arprice_widget.php');

    add_action('widgets_init', 'arp_init_widget');

    function arp_init_widget(){
        return register_widget("arprice_widget");
    }
}


if (file_exists(PRICINGTABLE_CORE_DIR . '/vc/class_vc_extend.php')) {
    require_once( ( PRICINGTABLE_CORE_DIR . '/vc/class_vc_extend.php' ) );
    global $arprice_vdextend;
    $arprice_vdextend = new ARPrice_VCExtendArp();
}

register_uninstall_hook(__FILE__, 'uninstall');

function uninstall() {

    global $wpdb;
    if (is_multisite()) {
        $blogs = $wpdb->get_results("SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A);
        if ($blogs) {
            foreach ($blogs as $blog) {
                switch_to_blog($blog['blog_id']);

                delete_option('arprice_version');
                delete_option("arpIsSorted");
                delete_option("arpSortOrder");
                delete_option("arpSortId");
                delete_option("arpSortInfo");
                delete_option('arprice_tour_guide_value');
                delete_option('arp_mobile_responsive_size');
                delete_option('arp_tablet_responsive_size');
                delete_option('arp_desktop_responsive_size');
                delete_option('arp_global_custom_css');
                delete_option('arp_css_character_set');
                delete_option('arp_wp_get_version');
                delete_option('arp_previewoptions');
                delete_option('arp_tablegeneraloption');
                delete_option('arp_tablecolumnoption');

                delete_option('arp_is_new_installation');
                delete_option('arp_is_dashboard_visited');
                delete_option('arp_load_js_css');
                delete_option('arp_update_token');
                delete_option('widget_arp_widget');
                delete_option('arp_is_new_installation');
                delete_option('arp_enable_analytics');
                delete_option('arp_enable_loader');

                delete_option('arp_enable_ab_testing');

				delete_transient('arpnotice-two');

                $wpdb->query("DELETE FROM " . $wpdb->options . " WHERE option_name LIKE '%arp_previewtabledata_%'");
                $table = $wpdb->prefix . 'arp_arprice';
                $table_opt = $wpdb->prefix . 'arp_arprice_options';
                $table_analytics = $wpdb->prefix . 'arp_arprice_analytics';
                $table_ab_testing = $wpdb->prefix . 'arp_ab_testing';
                $wpdb->query("DROP TABLE IF EXISTS $table");
                $wpdb->query("DROP TABLE IF EXISTS $table_opt");
                $wpdb->query("DROP TABLE IF EXISTS $table_analytics");
                $wpdb->query("DROP TABLE IF EXISTS $table_ab_testing");
            }
            restore_current_blog();
        }
    } else {
        delete_option('arprice_version');
        delete_option("arpIsSorted");
        delete_option("arpSortOrder");
        delete_option("arpSortId");
        delete_option("arpSortInfo");
        delete_option('arprice_tour_guide_value');
        delete_option('arp_mobile_responsive_size');
        delete_option('arp_tablet_responsive_size');
        delete_option('arp_desktop_responsive_size');
        delete_option('arp_global_custom_css');
        delete_option('arp_css_character_set');
        delete_option('arp_wp_get_version');
        delete_option('arp_previewoptions');
        delete_option('arp_tablegeneraloption');
        delete_option('arp_tablecolumnoption');
        delete_option('arp_load_js_css');
        delete_option('arp_update_token');
        delete_option('widget_arp_widget');
        delete_option('arp_is_new_installation');
        delete_option('arp_enable_analytics');
        delete_option('arp_enable_loader');
        delete_option('arp_enable_ab_testing');

		delete_transient('arpnotice-two');

        $wpdb->query("DELETE FROM " . $wpdb->options . " WHERE option_name LIKE '%arp_previewtabledata_%'");
        $table = $wpdb->prefix . 'arp_arprice';
        $table_opt = $wpdb->prefix . 'arp_arprice_options';
        $table_analytics = $wpdb->prefix . 'arp_arprice_analytics';
        $table_ab_testing = $wpdb->prefix . 'arp_ab_testing';
        $wpdb->query("DROP TABLE IF EXISTS $table");
        $wpdb->query("DROP TABLE IF EXISTS $table_opt");
        $wpdb->query("DROP TABLE IF EXISTS $table_analytics");
        $wpdb->query("DROP TABLE IF EXISTS $table_ab_testing");
    }
}

class ARP_PricingTable {

    function __construct() {
        global $arprice_version;
        register_activation_hook(__FILE__, array('ARP_PricingTable', 'install'));

        register_activation_hook(__FILE__, array('ARP_PricingTable', 'arprice_check_network_activation'));

        add_action('admin_menu', array($this, 'pricingtable_menu'), 27);

        add_action('adminmenu', array($this, 'arp_set_doc_link'));

        add_action('wp_ajax_editplan', array($this, 'editplan'));

        add_action('wp_ajax_editpackage', array($this, 'editpackage'));

        add_action('admin_enqueue_scripts', array($this, 'set_css'), 10);

        add_action('admin_enqueue_scripts', array($this, 'set_js'), 10);

        add_action('admin_footer', array($this, 'set_js'), 10);

        add_action('wp_head', array($this, 'set_front_css'), 1);

        add_action('wp_head', array($this, 'set_front_js'), 1);

        add_action('admin_head', array($this, 'arp_menu_css'));

        add_action('init', array($this, 'arp_pricing_table_main_settings'));

        add_action('plugins_loaded', array($this, 'arp_pricing_table_load_textdomain'));

        add_action('wp_head', array($this, 'arp_enqueue_template_css'), 1, 0);
        add_action('wp_head', array($this, 'arp_front_assets'), 1, 0);

        add_action('enqueue_preview_style', array($this, 'arp_enqueue_preview_css'), 1, 4);

        add_action('admin_init', array($this, 'arp_db_check'));

        add_filter('admin_footer_text', array($this, 'replace_footer_admin'));

        add_filter('update_footer', array($this, 'replace_footer_version'), '1234');

        add_action('admin_head', array($this, 'arp_hide_update_notice_to_all_admin_users'), 10000);

        add_action('wp_footer', array($this, 'footer_js'), 1, 0);

        add_filter('arp_append_googlemap_js', array($this, 'append_googlemap_js'), 1, 1);

        if( !function_exists('is_plugin_active')){
        	include_once(ABSPATH . 'wp-admin/includes/plugin.php' );
        }
        if( is_plugin_active('cornerstone/cornerstone.php')) {
            add_action('cornerstone_register_elements', array($this, 'arprice_cs_register_elements'));
            add_filter('cornerstone_icon_map', array($this, 'arprice_cs_icon_map'));
        }

        if( is_plugin_active('wp-rocket/wp-rocket.php') && !is_admin() ){
            add_filter('script_loader_tag', array($this, 'arp_prevent_rocket_loader_script'), 10, 2);
        }

        add_action('user_register', array($this, 'arp_add_capabilities_to_new_user'));

        add_action('set_user_role',array($this,'arp_add_capabilities_change_user_role'), 10, 3);

        add_action('enqueue_block_editor_assets',array($this,'arp_gutenberg_capability'));


        add_action( 'admin_print_scripts', array($this, 'arp_remove_other_plugin_notice') );

        add_action('admin_footer', array($this, 'arp_add_new_version_release_note'), 1);

        add_action('wp_ajax_arp_dont_show_upgrade_notice',array($this,'arp_dont_show_upgrade_notice') );

        add_filter( 'safe_style_css', array( $this, 'arp_allow_style_attr' ) );

        add_action( 'wp_ajax_arp_regenerate_nonces', array( $this, 'arp_regenerate_nonces'));

        add_action( 'login_footer', array( $this, 'arp_login_footer' ), 30 );

    }

    function arp_login_footer(){

        $arp_script = '<script type="text/javascript" data-cfasync="false">';
            $arp_script .= 'if( typeof window.parent.adminpage != "undefined" && window.parent.adminpage == "toplevel_page_arprice" ){';
                $arp_script .= 'if( document.getElementById("loginform") == null && window.parent.arprice_regenerate_nonce != null ){';
                    $arp_script .= ' window.parent.arprice_regenerate_nonce(); ';
                $arp_script .= '}';
            $arp_script .= '} else if( window.opener != null && typeof window.opener.adminpage != "undefined" && window.opener.adminpage == "toplevel_page_arprice"){';
                $arp_script .= 'if( document.getElementById("loginform") == null && window.opener != null && window.opener.arprice_regenerate_nonce != null ){';
                    $arp_script .= ' window.opener.arprice_regenerate_nonce(); ';
                    $arp_script .= ' window.close() ';
                $arp_script .= '}';
            $arp_script .= '}';
        $arp_script .= '</script>';

        echo $arp_script;
    }

    function arp_remove_other_plugin_notice() {
        global $wp_filter;
        if(isset($_REQUEST['page']) && ($_REQUEST['page'] == 'arprice' || $_REQUEST['page'] == 'arp_import_export' || $_REQUEST['page'] == 'arp_global_settings')){

            if ( isset( $wp_filter['user_admin_notices'] ) ) {
                unset( $wp_filter['user_admin_notices'] );
            }
            elseif ( isset( $wp_filter['admin_notices'] ) ) {
                unset( $wp_filter['admin_notices'] );
            }
            elseif ( isset( $wp_filter['all_admin_notices'] ) ) {
                unset( $wp_filter['all_admin_notices'] );
            }
        }

    }


    function arp_gutenberg_capability(){

        global $wpdb;

        wp_register_script('arprice_script_for_gutenberg',ARPURL.'/js/arprice_gutenberg.js',array('wp-blocks','wp-element','wp-i18n', 'wp-components'));

        wp_enqueue_script('arprice_script_for_gutenberg');

        $pricing_table = $wpdb->prefix . 'arp_arprice';

        $pricing_table_data = $wpdb->get_results("SELECT ID,table_name FROM `".$pricing_table."` WHERE is_template != 1 ORDER BY ID DESC");

        $pricing_table_list = array();
        $n = 0;
        foreach( $pricing_table_data as $k => $value ){
            $pricing_table_list[$n]['id'] = $value->ID;
            $pricing_table_list[$n]['label'] = $value->table_name . ' (ID: '.$value->ID.')';
            $n++;
        }

        wp_localize_script('arprice_script_for_gutenberg','arprice_list_for_gutenberg',$pricing_table_list);
    }

    function arp_pricing_table_compare(){
        $comparison = array(
            'arptemplate_25' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => false,
                'features' => true,
                'footer' => true,
                'button' => false,
            ),
            'arptemplate_20' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => false,
                'button' => true,
            ),
            'arptemplate_21' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => false,
                'button' => true,
            ),
            'arptemplate_26' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => true,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => false,
                'features' => true,
                'footer' => false,
                'button' => true,
            ),
            'arptemplate_23' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => true,
                'ribbon_support' => false,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_2' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => true,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_24' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_1' => array(
                'caption' => true,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_22' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_3' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => true,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_4' => array(
                'caption' => true,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_5' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => true,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_6' => array(
                'caption' => true,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_7' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => true,
                'column_description' => true,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_8' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => true,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_9' => array(
                'caption' => true,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => false,
                'button' => true,
            ),
            'arptemplate_10' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => true,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_11' => array( 
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => true,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_13' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_14' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_15' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => true,
                'button' => true,
            ),
            'arptemplate_16' => array(
                'caption' => false,
                'header' => true,
                'header_shortcode' => false,
                'column_description' => false,
                'ribbon_support' => true,
                'price' => true,
                'features' => true,
                'footer' => false,
                'button' => true,
            ),
        );

        return $comparison;
    }

    function arp_import_column_data_keys(){
        $columns = array(
            'package_title',
            'column_description',
            'custom_ribbon_txt',
            'is_caption',
            'price_text',
            'price_label',
            'arp_header_shortcode',
            'rows' => array(
                'row_description',
                'row_label',
                'row_tooltip',
                'size',
                'height',
                'image',
                'image_height',
                'image_width'
            ),
            'button_text',
            'button_url',
            'paypal_code',
            'is_new_window',
            'footer_content',
            'footer_content_position',
            'is_post_variables',
            'post_variables_content'
        );
        return $columns;
    }

    function replace_footer_admin() {
        echo '<span id="footer-thankyou"></span>';
    }

    function replace_footer_version() {
        return ' ';
    }

    function arp_add_capabilities_to_new_user($user_id) {

        if ($user_id == '') {
            return;
        }
        if (user_can($user_id, 'administrator')) {
            global $arp_pricingtable;
            $arproles = $arp_pricingtable->arp_capabilities();
            $userObj = new WP_User($user_id);
            foreach ($arproles as $arprole => $arproledescription) {
                $userObj->add_cap($arprole);
            }
            unset($arprole);
            unset($arsroles);
            unset($arproledescription);
        }
    }

    function arp_add_capabilities_change_user_role($user_id, $role, $old_roles){

        if ($user_id == '') {
            return;
        }
        if($role=='administrator' && $user_id){
            global $arp_pricingtable;
            $arproles = $arp_pricingtable->arp_capabilities();
            $userObj = new WP_User($user_id);
            foreach ($arproles as $arprole => $arproledescription) {
                if (!user_can($user_id, $arprole)) {
                    $userObj->add_cap($arprole);
                }
            }
            unset($arprole);
            unset($arproles);
            unset($arsroledescription);
        }
    }

    function arp_pricing_table_load_textdomain() {
        load_plugin_textdomain('ARPrice', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    public static function arprice_check_network_activation($network_wide) {
        if (!$network_wide)
            return;

        deactivate_plugins(plugin_basename(__FILE__), TRUE, TRUE);

        header('Location: ' . network_admin_url('plugins.php?deactivate=true'));
        exit;
    }

    function arp_pricing_table_main_settings() {
        global $arp_mainoptionsarr, $arp_pricingtable, $arprice_default_settings;
        $arp_mainoptionsarr = $arp_pricingtable->arp_mainoptions();

        global $arp_coloptionsarr;
        $arp_coloptionsarr = $arp_pricingtable->arp_columnoptions();

        global $arp_tempbuttonsarr;
        $arp_tempbuttonsarr = $arp_pricingtable->arp_tempbuttonsoptions();

        global $arp_templateorderarr;
        $arp_templateorderarr = $arp_pricingtable->arp_template_order();

        global $arp_templatecssinfoarr;
        $arp_templatecssinfoarr = $arp_pricingtable->arp_templatecss_info();

        global $arp_templateresponsivearr;
        $arp_templateresponsivearr = $arp_pricingtable->arp_template_responsive_type_array();

        global $arp_template_editor_arr;
        $arp_template_editor_arr = $arp_pricingtable->arp_template_editor_array();

        global $arp_templatesectionsarr;
        $arp_templatesectionsarr = $arprice_default_settings->arp_template_sections_array();

        global $arp_templatecustomskinarr;
        $arp_templatecustomskinarr = $arprice_default_settings->arp_template_custom_skin_array();

        global $arp_templatehoverclassarr;
        $arp_templatehoverclassarr = $arprice_default_settings->arp_template_hover_class_array();
    }


    function arp_mainoptions() {
        $arpoptionsarr = apply_filters('arp_pricing_table_available_main_settings', array(
            'general_options' => array(
                'template_options' => array(
                    'templates' => array('arptemplate_1', 'arptemplate_4', 'arptemplate_12', 'arptemplate_3', 'arptemplate_5', 'arptemplate_7', 'arptemplate_8', 'arptemplate_11', 'arptemplate_10', 'arptemplate_6', 'arptemplate_2', 'arptemplate_9', 'arptemplate_13', 'arptemplate_15', 'arptemplate_14', 'arptemplate_16', 'arpmtemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26'),
                    'skins' => array('arptemplate_1' => array('green', 'yellow', 'darkorange', 'darkred', 'red', 'violet', 'pink', 'blue', 'darkblue', 'lightgreen', 'darkestblue', 'cyan', 'black', 'multicolor'), 'arptemplate_4' => array('darkgreen', 'darkred', 'green', 'blue', 'pink', 'violet', 'orange', 'skyblue', 'lightblue', 'yellow', 'darkpink', 'darkblue', 'grayishblue'), 'arptemplate_12' => array('blue', 'cyan', 'orange', 'green', 'red', 'skyblue', 'maroon', 'purple', 'darkgray', 'brightorange', 'multicolor'), 'arptemplate_3' => array('black', 'green', 'orange', 'red', 'teal', 'yellow', 'blue', 'darkgreen', 'maroon', 'purple'), 'arptemplate_5' => array('red', 'yellow', 'blue', 'green', 'violet', 'cyan', 'pink', 'limegreen', 'orange', 'darkblue', 'multicolor'), 'arptemplate_7' => array('blue', 'black', 'cyan', 'lightblue', 'red', 'yellow', 'olive', 'darkpurple', 'darkred', 'pink', 'brown'), 'arptemplate_8' => array('purple', 'skyblue', 'red', 'green', 'blue', 'orange', 'darkcyan', 'yellow', 'pink', 'teal', 'multicolor'), 'arptemplate_11' => array('yellow', 'limegreen', 'red', 'blue', 'pink', 'cyan', 'lightpink', 'violet', 'gray', 'green'), 'arptemplate_10' => array('red', 'teal', 'orange', 'blue', 'green', 'lightteal', 'pink', 'lightgreen', 'darkorange', 'purple', 'darkblue', 'gray', 'multicolor'), 'arptemplate_6' => array('green', 'blue', 'red', 'cyan', 'limegreen', 'darkblue', 'pink', 'darkcyan', 'violet', 'black'), 'arptemplate_2' => array('blue', 'lightviolet', 'yellow', 'limegreen', 'orange', 'softblue', 'limecyan', 'brightred', 'red', 'pink', 'lightblue', 'darkpink', 'darkcyan'), 'arptemplate_9' => array('darkyellow', 'limegreen', 'darkviolet', 'darkred', 'lightorange', 'orange', 'cyan', 'magenta', 'yellow', 'red', 'multicolor'), 'arptemplate_13' => array('darkblue', 'cyan', 'green', 'red', 'blue', 'brown', 'darkcyan', 'darkmagenta'), 'arptemplate_15' => array('yellow', 'red', 'green', 'cyan', 'blue', 'pink', 'purple', 'orange', 'darkyellow', 'limegreen'), 'arptemplate_14' => array('orange', 'limegreen', 'blue', 'violet', 'lightorange', 'cyan', 'red', 'yellow', 'gray', 'darkblue'), 'arptemplate_16' => array('orange', 'darkgreen', 'darkred', 'magenta', 'blue', 'darkblue', 'darkcyan', 'red', 'darklimegreen', 'gray'), 'arptemplate_20' => array('blue', 'pink', 'red', 'yellow', 'green', 'cyan', 'strongviolet', 'violet', 'lightviolet', 'darkyellow', 'grey', 'black'), 'arptemplate_21' => array('pink', 'red', 'yellow', 'green', 'darklimegreen', 'limecyan', 'cyan', 'lightblue', 'blue', 'strongviolet', 'purepink', 'darkred', 'gray'), 'arptemplate_22' => array('red', 'darkpink', 'orange', 'lightorange', 'limegreen', 'green', 'cyan', 'lightblue', 'blue', 'brightblue', 'violet', 'softviolet', 'gray', 'black'), 'arptemplate_23' => array('orange', 'blue', 'brightblue', 'green', 'limegreen', 'darkblue', 'darkviolet', 'violet', 'pink', 'red', 'gray', 'black'), 'arptemplate_24' => array('darkblue', 'pink', 'red', 'orange', 'darkgreen', 'darkcyan', 'lightblue', 'blue', 'violet', 'strongpink', 'gray', 'black'), 'arptemplate_25' => array('blue', 'green', 'red', 'lightviolet', 'lightred', 'orange', 'lightgreen', 'darkgreen', 'black', 'turquoise', 'royalblue', 'violet', 'yellow', 'dogerblue'), 'arptemplate_26' => array('blue', 'red', 'lightblue', 'cyan', 'yellow', 'pink', 'lightviolet', 'gray', 'orange', 'darkblue', 'turquoise', 'grayishyellow', 'green')),
                    'skin_color_code' => array('arptemplate_1' => array('6dae2e', 'fbb400', 'e75c01', 'c32929', 'e52937', '713887', 'EB005C', '29A1D3', '2F3687', '1BA341', '2F4251', '009E7B', '5C5C5C', 'Multicolor'), 'arptemplate_4' => array('28ae4d', 'ec4152', '2bc489', '0084ff', 'f50d7b', '4a148c', 'ff7510', '48c8f5', '626cef', 'ffcc00', 'ad1457', '112b50', '4a4957'), 'arptemplate_12' => array('143B86', '059B90', 'E38B05', '23A359', 'C10F0F', '2284C1', '8A0135', '7B1EC7', '474F62', 'D03509', 'Multicolor'), 'arptemplate_3' => array('39434D', '24B968', 'E87C3C', 'E84C3D', '6DBEBF', 'EBBF44', '316493', '7FB45C', '9A272A', '6F4786'), 'arptemplate_5' => array('E52937', 'FBB400', '20AEFF', '199800', '734EAB', '00D8CD', 'FF1D77', '91D100', 'FE7D22', '2F3687', 'Multicolor'), 'arptemplate_7' => array('3473DC', '3E3E3C', '1EAE8B', '1BACE1', 'F33C3E', 'FFA800', '8FB021', '5B48A2', '79302A', 'ED1374', 'B11D00'), 'arptemplate_8' => array('AB6ED7', '44B7E4', 'F15859', '7FB948', '595EB7', 'FF6E3D', '54CAB0', 'FFC74B', 'EC3E9A', '25D0D7', 'Multicolor'), 'arptemplate_11' => array('EFA738', '43B34D', 'FF3241', '09B1F8', 'E3328C', '11B0B6', 'F15F74', '8F4AFF', '949494', '78C335'), 'arptemplate_10' => array('E92526', '00A392', 'FFAD00', '50B8F5', '01A358', '1FC4C8', 'E83473', '66AD33', 'FF622B', '8250A9', '3E38A4', '89888D', 'Multicolor'), 'arptemplate_6' => array('87BD41', '29A1D3', 'E84C3D', '1FC4C8', '2ECB72', '5165A2', 'C31F5B', '009E7B', '703784', '6D7383'), 'arptemplate_2' => array('02a3ff', '6c62d3', 'ffba00', '6ed563', 'ff9525', '4476d9', '37ba5a', 'f34044', 'de1a4c', 'de199a', '1a5fde', 'a51143', '11a599'), 'arptemplate_9' => array('AFBA5A', '00c140', '7003AE', 'AF1D04', 'F2B10F', 'FE7D22', '03B88B', 'B037C0', 'CBB963', 'AC113D', 'Multicolor'), 'arptemplate_13' => array('01325b', '03735D', '168737', 'C61C1C', '00A0EA', '883D13', '005760', '602B63'), 'arptemplate_15' => array('EAA700', 'EC155B', '18B949', '09D1B5', '10A4FA', 'EC3F8F', '755EC6', 'FA5655', 'BE8E44', '8CA91D'), 'arptemplate_14' => array('F15A23', '2DCC70', '3598DB', '9661D7', 'F49C14', '1BBC9B', 'E52937', '9CC31A', '757575', '384C81'), 'arptemplate_16' => array('FE7C22', '6DAE2E', 'B41E1F', 'A859B5', '29A1D3', '2F3687', '009E7B', 'E52937', '3D735B', '6D7C7F'), 'arptemplate_20' => array('00BAFF', 'D81A60', 'F73300', 'FFC22C', '8ACA01', '57CC7D', '4617B5', '6900B4', 'A23BCA', 'D8C022', '858585', '1D1D1D'), 'arptemplate_21' => array('D81A60', 'F73300', 'FFC22C', '8ACA01', '169800', '57CC7D', '00D2D3', '41C3FF', '008EE2', '6900B4', 'F900A6', 'BE0022', '5E5E5E'), 'arptemplate_22' => array('E40031', 'D90051', 'FAA71B', 'FFC22C', '60C150', '57CC7D', '57DEE1', '41C3FF', '008EE2', '3E52F3', '6F04F4', '8656E0', '33363F', '1D1D1D'), 'arptemplate_23' => array('FDB515', '4DC8F4', '43B2E7', 'A2CC3A', '70C27A', '5A79BC', '5F5CA9', '744F9C', 'DC397A', 'E01E38', '4A4957', '35343A'), 'arptemplate_24' => array('5C57B1', 'D81A60', 'EB3102', 'FF892B', '6DB000', '0C898B', '41C3FF', '008EE2', '6900B4', 'CC0288', '5E5E5E', '1D1D1D'), 'arptemplate_25' => array('2FB8FF', '00D29D', 'FF2476', '5178F7', 'F65052', 'FEA60E', '6FC033', '34C159', '2C2F42', '01DFF4', '5B58E3', '824BFF', 'EACD03', '4196FF'), 'arptemplate_26' => array('2fb8ff', 'ff2d46', '4196ff', '00d29d', 'f1bc16', 'ff2476', '6b68ff', 'b7bdcb', 'fd9a25', '337cff', '00dbef', 'cfc5a1', '16d784')),
                    'template_type' => array('arptemplate_1' => 'normal', 'arptemplate_4' => 'normal', 'arptemplate_12' => 'advanced', 'arptemplate_3' => 'normal', 'arptemplate_5' => 'normal', 'arptemplate_7' => 'normal', 'arptemplate_8' => 'normal', 'arptemplate_11' => 'normal', 'arptemplate_10' => 'normal', 'arptemplate_6' => 'normal', 'arptemplate_2' => 'normal', 'arptemplate_9' => 'normal', 'arptemplate_13' => 'normal', 'arptemplate_15' => 'normal', 'arptemplate_14' => 'normal', 'arptemplate_16' => 'normal', 'arptemplate_20' => 'normal', 'arptemplate_21' => 'normal', 'arptemplate_22' => 'normal', 'arptemplate_23' => 'normal', 'arptemplate_24' => 'normal', 'arptemplate_25' => 'normal', 'arptemplate_26' => 'normal'),
                    'features' => array(
                        'arptemplate_1' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_2' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'rounded_border', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_3' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_4', 'caption_style' => 'default', 'amount_style' => 'style_3', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_3', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_4' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_5' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => true, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => false),
                        'arptemplate_6' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'style_1', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_7' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_1', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_3', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'position_1', 'tooltip_position' => 'top-left', 'tooltip_style' => 'style_1', 'second_btn' => false, 'additional_shortcode' => true, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_8' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'position_2', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'rounded_corner', 'header_shortcode_position' => 'position_1', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'additional_shortcode' => true, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_9' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_10' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_3', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_11' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_1', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_4', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_12' => array('column_description' => 'enable', 'custom_ribbon' => 'enable', 'button_position' => 'position_1', 'caption_style' => 'default', 'amount_style' => 'style_1', 'list_alignment' => 'default', 'ribbon_type' => 'custom_style_1', 'column_description_style' => 'style_2', 'caption_title' => 'style_1', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => false),
                        'arptemplate_13' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'after_button', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_14' => array('column_description' => 'disable', 'custom_ribbon' => 'enable', 'button_position' => 'position_1', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'custom_style_2', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_15' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_16' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_1', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_20' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => false),
                        'arptemplate_21' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => false),
                        'arptemplate_22' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1, 'allow_row_level_button' => false),
                        'arptemplate_23' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_4', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => false),
                        'arptemplate_24' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1, 'allow_row_level_button' => true),
                        'arptemplate_25' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'after_button', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'button_border_customization' => 1, 'allow_row_level_button' => false),
                        'arptemplate_26' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'rounded_border', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0, 'button_border_customization' => 1, 'allow_row_level_button' => false)
                    ),
                    'arp_ribbons' => array('arp_ribbon_1' => 'Ribbon Style 1', 'arp_ribbon_2' => 'Ribbon Style 2', 'arp_ribbon_3' => 'Ribbon Style 3', 'arp_ribbon_4' => 'Ribbon Style 4', 'arp_ribbon_5' => 'Ribbon Style 5', 'arp_ribbon_6' => 'Custom Ribbon'),
                    'arp_template_ribbons' => array(
                        'arptemplate_1' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_2' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_3' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_4' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_5' => array('arp_ribbon_2', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_6' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_7' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_6'),
                        'arptemplate_8' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_9' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_6'),
                        'arptemplate_10' => array('arp_ribbon_2', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_11' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_12' => array('arp_ribbon_2', 'arp_ribbon_4'),
                        'arptemplate_13' => array('arp_ribbon_2', 'arp_ribbon_4'),
                        'arptemplate_14' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_15' => array('arp_ribbon_2', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_16' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_20' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_21' => array('arp_ribbon_2', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_22' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_23' => array(),
                        'arptemplate_24' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_25' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_26' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                    ),
                    'arp_tablet_view_width' => array(
                        'arptemplate_1' => '19.5',
                        'arptemplate_2' => '23',
                        'arptemplate_3' => '23',
                        'arptemplate_4' => '19.5',
                        'arptemplate_5' => '23.5',
                        'arptemplate_6' => '19',
                        'arptemplate_7' => '23',
                        'arptemplate_8' => '23',
                        'arptemplate_9' => '19',
                        'arptemplate_10' => '23',
                        'arptemplate_11' => '23',
                        'arptemplate_12' => '32',
                        'arptemplate_13' => '23',
                        'arptemplate_14' => '23',
                        'arptemplate_15' => '23',
                        'arptemplate_16' => '23',
                        'arptemplate_20' => '19.5',
                        'arptemplate_21' => '23',
                        'arptemplate_22' => '23',
                        'arptemplate_23' => '23',
                        'arptemplate_24' => '23',
                        'arptemplate_25' => '23',
                        'arptemplate_26' => '23',
                    )
                ),
                'arp_basic_colors' => array('#ff7525', '#ffcf33', '#e3e500', '#00d2d7', '#4fe3fe', '#ff67b4', '#c96098', '#ff1515', '#ffcea6', '#ffc22f', '#dbd423', '#0bc124', '#00e430', '#00a9ff', '#a1bed6', '#006be1', '#90d73d', '#00825f', '#04d2ab', '#ff5c77', '#6951ff', '#ac3f07', '#b5fe01', '#666666', '#ffe217', '#5d9cec', '#bbea8a', '#496b90', '#9943d8', '#d6a153', '#bd0101', '#0385a0', '#45487d', '#8d5d17', '#f2f2f2', '#514e4e'),
                'arp_basic_colors_gradient' => array('#d24c00', '#c99a00', '#8aa301', '#00a5a9', '#46aec1', '#ce0f70', '#7b164c', '#c80202', '#d47f46', '#f48a00', '#876705', '#006400', '#00951f', '#0182c4', '#5f7c97', '#003a7a', '#145502', '#003f32', '#16a086', '#a0132a', '#2105cc', '#5e1d0b', '#699001', '#3c3c3c', '#c09505', '#3a72b9', '#699f2f', '#1e2a36', '#531084', '#8f6229', '#590101', '#02414e', '#151845', '#633b00', '#c0c0c0', '#0c0b0b'),
                'arp_ribbon_border_color' => array('#f1732b', '#f1732b', '#a0b419', '#00b3b8', '#33a0b4', '#dc2783', '#a33c73', '#ff1515', '#ed9e67', '#ed9e67', '#b3a015', '#07a318', '#00af25', '#0095e0', '#809cb6', '#0052ab', '#559921', '#003f32', '#14a68a', '#d73b54', '#472de7', '#7f2b09', '#8dc401', '#4e4e4e', '#d3ac07', '#4680ca', '#7cb144', '#2b3e52', '#6d23a4', '#aa7a39', '#650101', '#035a6d', '#272a5a', '#714608', '#b5b5b5', '#1a1818'),
                'fontoption' => array(
                    'header_fonts' => array('font_family' => 'Arial', 'font_size' => '32', 'font_color' => '#ffffff', 'font_style' => 'normal'),
                    'price_fonts' => array('font_family' => 'Arial', 'font_size' => '16', 'font_color' => '#ffffff', 'font_style' => 'normal'),
                    'price_text_fonts' => array('font_family' => 'Arial', 'font_size' => '16', 'font_color' => '#ffffff', 'font_style' => 'normal'),
                    'content_fonts' => array('font_family' => 'Arial', 'font_size' => '12', 'font_color' => '#364762', 'font_style' => 'bold'),
                    'button_fonts' => array('font_family' => 'Arial', 'font_size' => '14', 'font_color' => '#ffffff', 'font_style' => 'bold')
                ),
                'column_animation' => array(
                    'is_enable' => 0,
                    'visible_column_count' => 2,
                    'visible_columns_tablet' => 2,
                    'columns_to_scroll' => 2,
                    'is_navigation' => 1,
                    'autoplay' => 1,
                    'sliding_effect' => array('slide', 'fade', 'crossfade', 'directscroll', 'cover', 'uncover'),
                    'sliding_transition_speed' => 750,
                    'navigation_style' => array('arp_nav_style_1', 'arp_nav_style_2'),
                    'pagination' => 1,
                    'pagination_style' => array('arp_paging_style_1', 'arp_paging_style_2'),
                    'pagination_position' => array('Top', 'Bottom', 'Both'),
                    'easing_effect' => array('swing', 'linear', 'cubic', 'elastic', 'quadratic'),
                    'infinite' => 1,
                    'sticky_caption' => 0,
                    'pagi_nav_btns' => array('pagination_top' => 'Top', 'pagination_bottom' => 'Bottom', 'none' => 'Off'),
                    'navi_nav_btns' => array('navigation' => 'On', 'none' => 'Off'),
                    'def_pagin_nav' => 'both'

                ),
                'is_spacebetweencolumns' => 'no',
                'spacebetweencolumns' => '0px',
                'tooltipsetting' => array(
                    'width' => '0',
                    'background_color' => '#000000',
                    'text_color' => '#FFFFFF',
                    'animation' => array('grow', 'fade', 'swing', 'slide', 'fall'),
                    'position' => array('top', 'bottom', 'left', 'right'),
                    'style' => array('normal', 'alert', 'glass'),
                    'trigger_on' => array('hover', 'click'),
                    'tooltip_display_style' => array('default', 'informative'),
                    'informative_tootip_icon' => array('<i class="fas fa-info-circle arpfa-tp"></i>'),
                    'icon_position' => array('float_to_content' => 'Float to Content', 'right_align' => 'Right Align'),
                ),
                'is_responsive' => 1,
                'hide_caption_column' => 0,
                'highlightcolumnonhover' => array(
                    'hover_effect' => 'Hover Effect',
                    'shadow_effect' => 'Shadow effect',
                    'arp-pulse' => 'Pulse',
                    'arp-shake' => 'Shake',
                    'arp-swing' => 'Swing',
                    'arp-hang' => 'Hang',
                    'arp-wobble-horizontal' => 'Wobble',
                    'no_effect' => 'None'
                ),
                'button_settings' => array(
                    'button_shadow_color' => '#FFFFFF',
                    'button_radius' => 0
                ),
                'column_opacity' => array(1, 0.90, 0.80, 0.70, 0.60, 0.50, 0.40, 0.30, 0.20, 0.10),
                'wrapper_width' => '1000',
                'wrapper_width_style' => array('px', '%'),
                'default_column_radius_value' => array(
                    'arptemplate_1' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_2' => array('top_left' => 7, 'top_right' => 7, 'bottom_right' => 7, 'bottom_left' => 7),
                    'arptemplate_3' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_4' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_5' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_6' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_7' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_8' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_9' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_10' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_11' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_12' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_13' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_14' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_15' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_16' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_20' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 6, 'bottom_left' => 6),
                    'arptemplate_21' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_22' => array('top_left' => 4, 'top_right' => 4, 'bottom_right' => 4, 'bottom_left' => 4),
                    'arptemplate_23' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_24' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_25' => array('top_left' => 8, 'top_right' => 8, 'bottom_right' => 8, 'bottom_left' => 8),
                    'arptemplate_26' => array('top_left' => 15, 'top_right' => 15, 'bottom_right' => 15, 'bottom_left' => 15),
                ),
                'footer_content_position' => array(esc_html__('Below Button', 'ARPrice'), esc_html__('Above Button', 'ARPrice')),
                'column_box_shadow_effect' => array('shadow_style_none' => 'None', 'shadow_style_1' => 'Style1', 'shadow_style_2' => 'Style2', 'shadow_style_3' => 'Style3', 'shadow_style_4' => 'Style4', 'shadow_style_5' => 'Style5'),
                'arp_color_skin_template_types' => array(
                    'type_1' => array('arptemplate_1', 'arptemplate_8', 'arptemplate_2', 'arptemplate_5', 'arptemplate_4', 'arptemplate_9', 'arptemplate_6', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26'),
                    'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_17', 'arptemplate_20'),
                    'type_3' => array('arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16'),
                    'type_4' => array('arptemplate_6')
                ),
                'template_bg_section_classes' => array(
                    'arptemplate_1' => array(
                        'caption_column' => array(
                            'header_section' => 'arpcolumnheader',
                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
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
                            'column_section' => '.arp_column_content_wrapper',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_3' => array('caption_column' => array(),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle',
                            'desc_selection' => 'column_description',
                            'button_section' => 'bestPlanButton',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_4' => array('caption_column' => array(
                            'header_section' => 'arpcolumnheader',
                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                        'other_column' => array(
                            'header_section' => 'arpcolumnheader',
                            'desc_selection' => 'column_description',
                            'button_section' => 'bestPlanButton',
                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_5' => array('caption_column' => array(
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                        'other_column' => array(
                            'header_section' => 'arpcolumnheader',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
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
                            'button_section' => 'bestPlanButton',
                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_7' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle',
                            'button_section' => 'bestPlanButton',
                            'desc_selection' => 'column_description,arppricetablecolumnprice',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_8' => array('caption_column' => array(
                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                        'other_column' => array(
                            'header_section' => 'arpcolumnheader',
                            'button_section' => 'bestPlanButton',
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
                            'column_section' => '.arp_column_content_wrapper',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_10' => array('caption_column' => array(
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
                            'button_section' => 'bestPlanButton',
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
                            'button_section' => 'bestPlanButton',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                    ),
                    'arptemplate_12' => array(
                        'caption_column' => array(
                            'header_section' => 'arpcaptiontitle',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_13' => array(
                        'caption_columns' => array(),
                        'other_column' => array(
                            'column_section' => '.arpplan',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
                        )
                    ),
                    'arptemplate_14' => array(
                        'caption_columns' => array(),
                        'other_column' => array(
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_15' => array(
                        'caption_columns' => array(),
                        'other_column' => array(
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
                        )
                    ),
                    'arptemplate_16' => array(
                        'caption_columns' => array(),
                        'other_column' => array(
                            'button_section' => 'bestPlanButton',
                        )
                    ),
                    'arptemplate_20' => array('caption_column' => array(),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle',
                            'column_section' => '.arp_column_content_wrapper',
                            'button_section' => 'bestPlanButton',
                        )
                    ),
                    'arptemplate_21' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'column_section' => '.arppricetablecolumntitle,.arppricetablecolumnprice,.arppricingtablebodycontent',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_22' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'column_section' => '.arp_column_content_wrapper',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_23' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'column_section' => '.arp_column_content_wrapper::after',
                            'pricing_section' => 'arp_price_wrapper',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_24' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'column_section' => '.arp_column_content_wrapper',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_25' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'column_section' => '.arppricingtablebodycontent',
                            'header_section' => 'arppricetablecolumntitle',
                            'button_section' => 'bestPlanButton',
                            'desc_selection' => 'column_description',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_26' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle,rounded_corder',
                            'column_section' => '.arp_column_content_wrapper',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                ),
                'template_border_color' => array(
                    'arptemplate_1' => array(
                        'caption_column' => array(
                            'border_color' => '#E3E3E3',
                        ),
                    ),
                    'arptemplate_5' => array(
                        'caption_column' => array(
                            'border_color' => '#f4f4f4',
                        ),
                    ),
                    'arptemplate_6' => array(
                        'caption_column' => array(
                            'border_class' => 'arpcaptiontitle',
                            'border_color' => '#cccccc',
                        ),
                    ),
                ),
            )
        ));
        return $arpoptionsarr;
    }

    function arp_toggle_effect_array(){
        $toggle_effect_arr = array(
            'fade' => array(
                'class' => 'arp_toggle_fade',
                'label' => esc_html__('Fade', 'ARPrice')
            ),
            'flip' => array(
                'class' => 'arp_toggle_flip',
                'label' => esc_html__('Flip 180', 'ARPrice')
            ),
            'flip2' => array(
                'class' => 'arp_toggle_complete_flip',
                'label' => esc_html__('Flip 360', 'ARPrice')
            ),
            'pulse' => array(
                'class' => 'arp_toggle_pulse',
                'label' => esc_html__('Pulse', 'ARPrice')
            ),
            'shake' => array(
                'class' => 'arp_toggle_shake',
                'label' => esc_html__('Shake', 'ARPrice')
            ),
            'zoom_in' => array(
                'class' => 'arp_toggle_zoom_in',
                'label' => esc_html__('Zoom In', 'ARPrice')
            )
        );

        return apply_filters( 'arp_toggle_effect_outside', $toggle_effect_arr );
    }

    function arp_columnoptions() {
        $arptempbutoptionsarr = apply_filters('arp_pricing_table_available_column_settings', array(
            'column_options' => array('width' => 'auto', 'alignment' => array('left', 'center', 'right'), 'column_highlight' => 0, 'show_column' => 1, 'ribbon_icon' => array(), 'ribbon_position' => array('left', 'right')),
            'header_options' => array(
                'column_title' => '',
                'price' => '',
                'html_content' => '',
                'html_shortcode_options' => array(
                    'image' => array('image' => esc_html__('Image', 'ARPrice')),
                    'video' => array(
                        'youtube' => esc_html__('Youtube video', 'ARPrice'),
                        'vimeo' => esc_html__('Vimeo Video', 'ARPrice'),
                        'video' => esc_html__('html5 Video', 'ARPrice'),
                        'dailymotion' => esc_html__('Dailymotion Video', 'ARPrice'),
                        'metacafe' => esc_html__('Metacafe Video', 'ARPrice'),
                    ),
                    'audio' => array(
                        'audio' => esc_html__('html5 Audio', 'ARPrice'),
                        'soundcloud' => esc_html__('Soundcloud Audio', 'ARPrice'),
                        'mixcloud' => esc_html__('Mixcloud Audio', 'ARPrice'),
                        'beatport' => esc_html__('Beatport Audio', 'ARPrice'),
                    ),
                    'other' => array(
                        'googlemap' => esc_html__('Google Map', 'ARPrice'),
                        'embed' => esc_html__('Embed Block', 'ARPrice'),
                    ),
                ),
                'image_shortcode_options' => array(
                    'url' => esc_html__('Image URL', 'ARPrice'),
                    'height' => esc_html__('Height', 'ARPrice'),
                    'width' => esc_html__('Width', 'ARPrice'),
                ),
                'youtube_shortcode_options' => array(
                    'id' => esc_html__('Video id', 'ARPrice'),
                    'height' => esc_html__('Height', 'ARPrice'),
                    'autoplay' => esc_html__('Autoplay', 'ARPrice'),
                ),
                'vimeo_shortcode_options' => array(
                    'id' => esc_html__('Video id', 'ARPrice'),
                    'height' => esc_html__('Height', 'ARPrice'),
                    'autoplay' => esc_html__('Autoplay', 'ARPrice'),
                ),
                'screenr_shortcode_options' => array(
                    'id' => esc_html__('Video id', 'ARPrice'),
                    'height' => esc_html__('Height', 'ARPrice'),
                ),
                'video_shortcode_options' => array(
                    'mp4' => esc_html__('MP4 source', 'ARPrice'),
                    'webm' => esc_html__('Webm source', 'ARPrice'),
                    'ogg' => esc_html__('Ogg source', 'ARPrice'),
                    'poster' => esc_html__('Poster image source', 'ARPrice'),
                    'autoplay' => esc_html__('Autoplay', 'ARPrice'),
                    'loop' => esc_html__('Loop', 'ARPrice'),
                ),
                'audio_shortcode_options' => array(
                    'autoplay' => esc_html__('Autoplay', 'ARPrice'),
                    'loop' => esc_html__('Loop', 'ARPrice'),
                    'mp3' => esc_html__('MP3 source', 'ARPrice'),
                    'ogg' => esc_html__('Ogg source', 'ARPrice'),
                    'wav' => esc_html__('Wav source', 'ARPrice'),
                ),
                'googlemap_shortcode_options' => array(
                    'address' => esc_html__('Address', 'ARPrice'),
                    'height' => esc_html__('Height', 'ARPrice'),
                    'zoom_level' => esc_html__('Zoom level', 'ARPrice'),
                    'marker_image' => esc_html__('Marker image source', 'ARPrice'),
                    'mapinfo_title' => esc_html__('Marker title', 'ARPrice'),
                    'mapinfo_content' => esc_html__('Map info window content', 'ARPrice'),
                    'mapinfo_show_default' => esc_html__('Info window by default?', 'ARPrice'),
                ),
                'dailymotion_shortcode_options' => array(
                    'id' => esc_html__('Video id', 'ARPrice'),
                    'height' => esc_html__('Height', 'ARPrice'),
                    'autoplay' => esc_html__('Autoplay', 'ARPrice'),
                ),
                'metacafe_shortcode_options' => array(
                    'id' => esc_html__('Video id', 'ARPrice'),
                    'height' => esc_html__('Height', 'ARPrice'),
                    'autoplay' => esc_html__('Autoplay', 'ARPrice'),
                ),
                'soundcloud_shortcode_options' => array(
                    'id' => esc_html__('Track id', 'ARPrice'),
                    'height' => esc_html__('Height', 'ARPrice'),
                    'autoplay' => esc_html__('Autoplay', 'ARPrice'),
                ),
                'mixcloud_shortcode_options' => array(
                    'url' => esc_html__('Track url', 'ARPrice'),
                    'height' => esc_html__('Height', 'ARPrice'),
                    'autoplay' => esc_html__('Autoplay', 'ARPrice'),
                ),
                'beatport_shortcode_options' => array(
                    'id' => esc_html__('Track id', 'ARPrice'),
                    'height' => esc_html__('Height', 'ARPrice'),
                    'autoplay' => esc_html__('Autoplay', 'ARPrice'),
                ),
                'embed_shortcode_options' => array(
                    'id' => esc_html__('Embed', 'ARPrice'),
                ),
            ),
            'column_body_options' => array('body_description' => '', 'description_shortcode_options' => array('icons', 'icon_alignment'), 'icon_shortcode_options' => array(), 'description_alignment' => 'center', 'tooltip_text' => ''),
            'column_button_options' => array(
                'button_size' => array(
                    'small' => esc_html__('Small', 'ARPrice'),
                    'medium' => esc_html__('Medium', 'ARPrice'),
                    'large' => esc_html__('Large', 'ARPrice'),
                ),
                'button_type' => array(
                    'button' => esc_html__('Button', 'ARPrice'),
                    'submit_button' => esc_html__('Submit', 'ARPrice'),
                ),
                'button_text' => '',
                'button_icon' => array(),
                'button_link' => '',
                'open_link_in_new_window' => '0',
                'button_custom_image' => ''
            ),
        ));

        return $arptempbutoptionsarr;
    }

    function arp_template_editor_hover_css(){
        $template_editor_hover_css = array(
            'arptemplate_1' => array(
                '.ArpPricingTableColumnWrapper.maincaptioncolumn' => array(
                    'column_level_settings' => array('column_level_options__button_1','column_level_options__button_2','column_level_options__button_3')
                ),
                '.ArpPricingTableColumnWrapper:not(.maincaptioncolumn)' => array(
                    'column_level_settings' => array('column_level_options__button_1','column_level_options__button_2','column_level_options__button_3')
                )
            )

        );

        $template_editor_hover_css = apply_filters('arp_pricing_table_editor_hover_css_outside',$template_editor_hover_css);
        return $template_editor_hover_css;
    }


    function arp_tempbuttonsoptions() {
        $rpttempbutoptionsarr = apply_filters('arp_pricing_table_available_column_button_settings', array(
            'template_button_options' => array(
                'features' => array(
                    'arptemplate_1' => array(
                        'column_level_options' => array(
                            'caption_column_buttons' => array(
                                'column_level_options__button_1' => array(
                                    'column_width',
                                    'caption_border',
                                    'caption_row_border',
                                    'set_hidden',
                                    'column_level_caption_arp_ok_div__button_1'
                                ),
                                'column_level_options__button_2' => array(
                                    'arp_custom_color_tab_column',
                                    'arp_normal_custom_color_tab_column',
                                    'arp_header_color_div',
                                    'header_background_color_div',
                                    'header_font_color_div',
                                    'arp_header_hover_color_div',
                                    'header_hover_background_color_div',
                                    'header_hover_font_color_div',
                                    'arp_footer_color_div',
                                    'footer_background_color_div',
                                    'footer_font_color_div',
                                    'arp_body_background_color_div',
                                    'arp_body_background_color_div_title',
                                    'arp_odd_color_div',
                                    'odd_background_color_div',
                                    'odd_font_color_div',
                                    'arp_even_color_div',
                                    'even_background_color_div',
                                    'even_font_color_div',
                                    'arp_footer_hover_color_div',
                                    'footer_hover_background_color_div',
                                    'footer_hover_font_color_div',
                                    'arp_body_hover_background_color_div',
                                    'arp_body_hover_background_color_div_title',
                                    'arp_odd_hover_color_div',
                                    'odd_hover_background_color_div',
                                    'odd_hover_font_color_div',
                                    'arp_even_hover_color_div',
                                    'even_hover_background_color_div',
                                    'even_hover_font_color_div',
                                    'column_level_other_arp_ok_div__button_2',
                                    'arp_border_color_div',
                                    'arp_border_color_div_sub',
                                    'row_border_color_div',
                                    'column_border_color_div'
                                ),
                                'column_level_options__button_3' => array(
                                    'arp_custom_color_tab_column'
                                )
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array(
                                    'column_other_background_image',
                                    'column_highlight',
                                    'set_hidden',
                                    'select_ribbon',
                                    'is_post_variable',
                                    'post_variables_content',
                                    'column_level_other_arp_ok_div__button_1',
                                    'is_column_clickable_wrapper'
                                ),
                                'column_level_options__button_2' => array(
                                    'arp_custom_color_tab_column',
                                    'arp_custom_color_tab_other_column',
                                    'arp_normal_custom_color_tab_column',
                                    'arp_header_color_div',
                                    'header_background_color_div_other_col',
                                    'header_font_color_div',
                                    'arp_header_hover_color_div',
                                    'header_hover_background_color_div',
                                    'header_hover_font_color_div',
                                    'arp_price_color_div',
                                    'price_background_color_div',
                                    'price_font_color_div',
                                    'arp_price_hover_color_div',
                                    'price_hover_background_color_div',
                                    'price_hover_font_color_div',
                                    'arp_footer_color_div',
                                    'footer_background_color_div',
                                    'footer_font_color_div',
                                    'arp_button_color_div',
                                    'button_background_color_div',
                                    'button_font_color_div',
                                    'arp_body_background_color_div',
                                    'arp_body_background_color_div_title',
                                    'arp_odd_color_div',
                                    'odd_background_color_div',
                                    'odd_font_color_div',
                                    'arp_even_color_div',
                                    'even_background_color_div',
                                    'even_font_color_div',
                                    'arp_footer_hover_color_div',
                                    'footer_hover_background_color_div',
                                    'footer_hover_font_color_div',
                                    'arp_hover_button_color_div',
                                    'button_hover_background_color_div',
                                    'button_hover_font_color_div',
                                    'arp_body_hover_background_color_div',
                                    'arp_body_hover_background_color_div_title',
                                    'arp_odd_hover_color_div',
                                    'odd_hover_background_color_div',
                                    'odd_hover_font_color_div',
                                    'arp_even_hover_color_div',
                                    'even_hover_background_color_div',
                                    'even_hover_font_color_div',
                                    'column_level_other_arp_ok_div__button_2'
                                ),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_background_color', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'arp_object', 'arp_fontawesome', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_li_content_type', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                'body_li_level_options__button_4' => array('button_image', 'add_shortcode',
                                    'body_li_level_caption_arp_ok_div__button_4'),
                                'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' => array(
                            'caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_text_alignment', 'footer_level_options_font_family', 'footer_level_options_background', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_4' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'caption_border', 'caption_row_border', 'set_hidden', 'column_level_caption_arp_ok_div__button_1'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_body_background_color_div', 'footer_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'column_level_other_arp_ok_div__button_2', 'arp_border_color_div', 'arp_border_color_div_sub', 'row_border_color_div', 'column_border_color_div'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_background_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_background_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'price_hover_background_color_div', 'price_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_background_color', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'arp_fontawesome', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'arp_shortcode_customization_size_div', 'arp_shortcode_customization_style_div', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_alternate_bgcolor', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_text_alignment', 'footer_level_options_font_family', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_12' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'set_hidden', 'column_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_caption_font_family', 'header_caption_background_color', 'header_other_hover_background_color', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'arp_fontawesome', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                                'pricing_level_options__button_2' => array('price_label', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_2'),
                                'pricing_level_options__button_3' => array('column_description', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_alternate_bgcolor', 'body_li_other_alternate_hover_bgcolor', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'button_size', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_3' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'set_hidden', 'column_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'is_post_variable', 'post_variables_content', 'select_ribbon', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_level_options_background', 'footer_level_options_font_family', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_object', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                    ),
                    'arptemplate_5' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                                'header_level_options__button_2' => array('additional_shortcode', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_7' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                                'header_level_options__button_2' => array('additional_shortcode', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type', 'body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                    ),
                    'arptemplate_8' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_shortcode_div', 'arp_shortcode_background', 'arp_shortcode_font_color', 'arp_shortcode_hover_div', 'arp_shortcode_hover_background', 'arp_shortcode_hover_font_color', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                                'header_level_options__button_2' => array('additional_shortcode', 'arp_object', 'arp_fontawesome', 'arp_shortcode_customization_style_div', 'arp_shortcode_customization_size_div', 'header_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type', 'body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_11' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type', 'body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_10' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'is_post_variable', 'post_variables_content', 'select_ribbon', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_object', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array(),
                            ),
                            'other_columns_buttons' => array(
                            ),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' =>
                            array('body_li_level_options__button_1' =>
                                array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'), 'body_li_level_options__button_2' => array('tooltip', 'body_li_level_caption_arp_ok_div__button_2'),
                                    'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','arp_object', 'body_li_add_shortcode', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_6' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'caption_border', 'caption_row_border', 'set_hidden', 'column_level_caption_arp_ok_div__button_1'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_footer_color_div', 'footer_background_color_div', 'footer_font_color_div', 'column_level_other_arp_ok_div__button_2', 'arp_border_color_div', 'arp_border_color_div_sub', 'row_border_color_div', 'column_border_color_div'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_background_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_background_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_background_color', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'arp_object', 'arp_fontawesome', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_alternate_bgcolor', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                            ),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_text_alignment', 'footer_level_options_font_family', 'footer_level_options_background', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_2' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_shortcode_div', 'arp_shortcode_background', 'arp_shortcode_font_color', 'arp_shortcode_hover_div', 'arp_shortcode_hover_background', 'arp_shortcode_hover_font_color', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                                'header_level_options__button_2' => array('additional_shortcode', 'arp_object', 'arp_fontawesome', 'arp_shortcode_customization_style_div', 'arp_shortcode_customization_size_div', 'header_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                            ),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_9' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'caption_border', 'caption_row_border', 'set_hidden', 'column_level_caption_arp_ok_div__button_1'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2', 'arp_border_color_div', 'arp_border_color_div_sub', 'row_border_color_div', 'column_border_color_div'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'is_post_variable', 'post_variables_content', 'select_ribbon', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_background_color', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'arp_object', 'arp_fontawesome', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_alternate_bgcolor', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                            ),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_13' => array('column_level_options' => array('caption_column_buttons' => array(
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                    ),
                    'arptemplate_15' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_14' => array(
                        'column_level_options' => array(
                            'caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array(
                                    'column_highlight',
                                    'set_hidden',
                                    'select_ribbon',
                                    'is_post_variable',
                                    'post_variables_content',
                                    'column_level_other_arp_ok_div__button_1',
                                    'is_column_clickable_wrapper'
                                ),
                                'column_level_options__button_2' => array(
                                    'arp_custom_color_tab_column',
                                    'arp_normal_custom_color_tab_column',
                                    'arp_header_color_div',
                                    'header_font_color_div',
                                    'arp_header_hover_color_div',
                                    'header_hover_font_color_div',
                                    'arp_price_color_div',
                                    'price_font_color_div',
                                    'arp_price_hover_color_div',
                                    'price_hover_font_color_div',
                                    'arp_button_color_div',
                                    'button_background_color_div',
                                    'button_font_color_div',
                                    'arp_body_background_color_div',
                                    'arp_body_background_color_div_title',
                                    'arp_odd_color_div',
                                    'odd_font_color_div',
                                    'arp_even_color_div',
                                    'even_font_color_div',
                                    'arp_hover_button_color_div',
                                    'button_hover_background_color_div',
                                    'button_hover_font_color_div',
                                    'arp_body_hover_background_color_div',
                                    'arp_body_hover_background_color_div_title',
                                    'arp_odd_hover_color_div',
                                    'odd_hover_font_color_div',
                                    'arp_even_hover_color_div',
                                    'even_hover_font_color_div',
                                    'column_level_other_arp_ok_div__button_2'
                                ),
                                'column_level_options__button_3' => array(
                                    'arp_custom_color_tab_column'
                                )
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_16' => array('column_level_options' => array('caption_column_buttons' => array(
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_20' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_21' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'is_column_clickable_wrapper', 'column_background', 'column_hover_background', 'column_level_other_arp_ok_div__button_1', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            )
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_22' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'even_hover_background_color_div', 'odd_hover_background_color_div', 'odd_background_color_div', 'even_background_color_div', 'price_hover_background_color_div', 'price_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_text_alignment', 'footer_level_options_font_family', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_23' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'price_background_color_div', 'price_hover_background_color_div', 'arp_desc_color_div', 'desc_font_color_div',
                                    'arp_desc_hover_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_level_options_font_family', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_24' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_li_content_type','body_li_add_shortcode', 'arp_object', 'description', 'button_size','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                                 'body_li_level_options__button_4' => array('button_image', 'add_shortcode','body_li_level_caption_arp_ok_div__button_4'),
                                 'body_li_level_options__button_5' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'body_li_level_caption_arp_ok_div__button_5'),
                            ),
                        ),

                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_25' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_object', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                        ),

                        'footer_level_options' => array(
                            'caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_26' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div_other_col', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_hover_button_color_div', 'arp_shortcode_div', 'arp_shortcode_background', 'arp_shortcode_font_color', 'arp_shortcode_hover_div', 'arp_shortcode_hover_background', 'arp_shortcode_hover_font_color', 'column_level_other_arp_ok_div__button_2'),
                                'column_level_options__button_3' => array('arp_custom_color_tab_column')
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                                'header_level_options__button_2' => array('additional_shortcode', 'arp_object', 'arp_fontawesome', 'arp_shortcode_customization_style_div', 'arp_shortcode_customization_size_div', 'header_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description','body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                                'body_li_level_options__button_3' => array('custom_css', 'body_li_level_caption_arp_ok_div__button_3'),
                            ),
                        ),

                        'footer_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'nofollow_link_option', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    )
                ),
            )
        ));
        return $rpttempbutoptionsarr;
    }

    function arp_templatecss_info() {
        $arptempcssinfo = apply_filters('arp_pricing_table_available_css_info', array(
            'templates' => array(
                'arptemplate_1' => array(
                    'caption_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcaptiontitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcaptiontitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    ),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fifth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_2' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on full column wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'shortcode_level_classes' => array(
                            esc_html__('Shortcode Level Classes || (Please use following css class if you want to add custom property on round box in header level', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_rounded_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on rounded section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode',
                                    'note' => esc_html__('It will apply on rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_rounded_shortcode_solid',
                                    'note' => esc_html__('When you place properties for this class, it will apply on solid rounded section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode_solid',
                                    'note' => esc_html__('It will apply on solid rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_square_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on square rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_square_shortcode',
                                    'note' => esc_html__('It will apply on square rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_square_shortcode_solid',
                                    'note' => esc_html__('When you place properties for this class, it will apply on solid square rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_square_shortcode_solid',
                                    'note' => esc_html__('It will apply on solid square rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_semiround_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on semi rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_semiround_shortcode',
                                    'note' => esc_html__('It will apply on semi rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_semiround_shortcode_solid',
                                    'note' => esc_html__('When you place properties for this class, it will apply on solid semi rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_semiround_shortcode_solid',
                                    'note' => esc_html__('It will apply on solid semi rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_none_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on shortcode section with none style','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_none_shortcode',
                                    'note' => esc_html__('It will apply on shortcode section with none style when you hover on any column.','ARPrice')
                                )
                            )
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                ),
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fifth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    ),
                ),
                'arptemplate_3' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'column_description_classes' => array(
                            esc_html__('Column Description Classes || (Please use following css class if you want to add custom property on description level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column description.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => esc_html__('It will apply on column description when you hover on any column.','ARPrice')
                                )
                            )
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fifth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_4' => array(
                    'caption_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcolumnheader',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcolumnheader',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice'),
                                )
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    ),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fifth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_5' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_6' => array(
                    'caption_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcaptiontitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcaptiontitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    ),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice'),
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_7' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'column_description_classes' => array(
                            esc_html__('Column Description Classes || (Please use following css class if you want to add custom property on description level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column description.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => esc_html__('It will apply on column description when you hover on any column.','ARPrice')
                                ),
                            )
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_8' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'shortcode_level_classes' => array(
                            esc_html__('Shortcode Level Classes || (Please use following css class if you want to add custom property on round box in header level', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_rounded_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on rounded section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode',
                                    'note' => esc_html__('It will apply on rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_rounded_shortcode_solid',
                                    'note' => esc_html__('When you place properties for this class, it will apply on solid rounded section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode_solid',
                                    'note' => esc_html__('It will apply on solid rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_square_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on square rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_square_shortcode',
                                    'note' => esc_html__('It will apply on square rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_square_shortcode_solid',
                                    'note' => esc_html__('When you place properties for this class, it will apply on solid square rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_square_shortcode_solid',
                                    'note' => esc_html__('It will apply on solid square rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_semiround_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on semi rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_semiround_shortcode',
                                    'note' => esc_html__('It will apply on semi rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_semiround_shortcode_solid',
                                    'note' => esc_html__('When you place properties for this class, it will apply on solid semi rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_semiround_shortcode_solid',
                                    'note' => esc_html__('It will apply on solid semi rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_none_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on shortcode section with none style','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_none_shortcode',
                                    'note' => esc_html__('It will apply on shortcode section with none style when you hover on any column.','ARPrice')
                                )
                            )
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fifth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_9' => array(
                    'caption_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcaptiontitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcaptiontitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    ),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice'),
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_10' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpplan',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpplan',
                                    'note' => esc_html__('It will apply on column section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'column_description_classes' => array(
                            esc_html__('Column Description Classes || (Please use following css class if you want to add custom property on description level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column description.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => esc_html__('It will apply on column description when you hover on any column.','ARPrice')
                                ),
                            )
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_11' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'column_description_classes' => array(
                            esc_html__('Column Description Classes || (Please use following css class if you want to add custom property on description level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column description.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => esc_html__('It will apply on column description when you hover on any column.','ARPrice')
                                ),
                            )
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_12' => array(
                    'caption_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcolumnheader',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcolumnheader',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    ),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_13' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'column_desc_classes' => array(
                            esc_html__('Column Description Classes || (Please use following css class if you want to add custom property on column description)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column description.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => esc_html__('It will apply on column description when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_14' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fifth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_15' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),

                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_16' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fifth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_20' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on full column wrapper when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_21' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will appy on price level when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fifth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_22' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column section.','ARPrice'),
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on column section when you hover on any column','ARPrice')
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section. eg.(Column Title : Basic)','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_23' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpplan',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpplan',
                                    'note' => esc_html__('It will apply on full column wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'column_description_classes' => array(
                            esc_html__('Column Description Classes || (Please use following css class if you want to add custom property on description level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column description.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => esc_html__('It will apply on column description when you hover on any column.','ARPrice')
                                ),
                            )
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_24' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on full column wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            esc_html__('Price Level Classes || (Please use following css class if you want to add custom property on price level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => esc_html__('When you place properties for this class, it will apply on price level.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => esc_html__('It will apply on price section when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            esc_html__('Footer Classes || (Please use following css class if you want to add custom property on footer level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => esc_html__('When you place properties for this class, it will apply on footer section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => esc_html__('It will apply on footer section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fifth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    ),
                ),
                'arptemplate_25' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on full column wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'column_description_classes' => array(
                            esc_html__('Column Description Classes || (Please use following css class if you want to add custom property on description level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column description.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => esc_html__('It will apply on column description when you hover on any column.','ARPrice')
                                ),
                            )
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    ),
                ),
                'arptemplate_26' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            esc_html__('Column Level Classes || (Please use following css class if you want to add custom property on column level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => esc_html__('When you place properties for this class, it will apply on column wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => esc_html__('It will apply on full column wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            esc_html__('Header Level Classes || (Please use following css class if you want to add custom property on header level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => esc_html__('When you place properties for this class, it will apply on header section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => esc_html__('It will apply on header section when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'shortcode_level_classes' => array(
                            esc_html__('Shortcode Level Classes || (Please use following css class if you want to add custom property on round box in header level', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_rounded_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on rounded section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode',
                                    'note' => esc_html__('It will apply on rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_rounded_shortcode_solid',
                                    'note' => esc_html__('When you place properties for this class, it will apply on solid rounded section.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode_solid',
                                    'note' => esc_html__('It will apply on solid rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_square_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on square rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_square_shortcode',
                                    'note' => esc_html__('It will apply on square rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_square_shortcode_solid',
                                    'note' => esc_html__('When you place properties for this class, it will apply on solid square rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_square_shortcode_solid',
                                    'note' => esc_html__('It will apply on solid square rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_semiround_shortcode',
                                    'note' => esc_html__('When you place properties for this class, it will apply on semi rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_semiround_shortcode',
                                    'note' => esc_html__('It will apply on semi rounded section when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_semiround_shortcode_solid',
                                    'note' => esc_html__('When you place properties for this class, it will apply on solid semi rounded section','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_semiround_shortcode_solid',
                                    'note' => esc_html__('It will apply on solid semi rounded section when you hover on any column.','ARPrice')
                                )
                            )
                        ),
                        'body_level_classes' => array(
                            esc_html__('Body Level Classes || (Please use following css class if you want to add custom property on body level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions',
                                    'note' => esc_html__('When you place properties for this class, it will apply on row wrapper.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions',
                                    'note' => esc_html__('It will apply on row wrapper when you hover on any column.','ARPrice')
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            esc_html__('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => esc_html__('When you place properties for this class, it will apply on each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => esc_html__('It will apply on each row when you hover on any column.','ARPrice')
                                ),
                            ),
                        ),
                        'body_li_level_button_classes' => array(
                            esc_html__('Feature Level Button Classes || (Please use following css class if you want to add custom property on feature level button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button in each row.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanRowButton',
                                    'note' => esc_html__('It will apply on button in each row when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanRowButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any row level button.','ARPrice')
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            esc_html__('Button Classes || (Please use following css class if you want to add custom property on button)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => esc_html__('When you place properties for this class, it will apply on button.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => esc_html__('It will apply on button when you hover on any column.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => esc_html__('It will apply when you hover on any button.','ARPrice')
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            esc_html__('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', 'ARPrice') => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on first ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on second ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on third ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on fourth ribbon style.','ARPrice')
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_6 .arp_ribbon_content',
                                    'note' => esc_html__('It will apply on custom ribbon style.','ARPrice')
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            esc_html__('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', 'ARPrice') => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => esc_html__('It will apply on main wrapper of toggle switch.','ARPrice'),
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => esc_html__('It will apply on button style / slide button style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => esc_html__('It will apply on button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => esc_html__('It will apply on radio style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => esc_html__('It will apply on radio style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.border_button_box',
                                    'note' => esc_html__('It will apply on border button style switch of inactive tab.','ARPrice')
                                ),
                                array(
                                    'class' => '.border_button_box.selected',
                                    'note' => esc_html__('It will apply on border button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.slide_button_box_selected',
                                    'note' => esc_html__('It will apply on slide button style switch of active tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box:after, .stepy_box:before, .stepy_box_selected',
                                    'note' => esc_html__('It will apply on stepy style switch of inactive tab.','ARPrice'),
                                ),
                                array(
                                    'class' => '.stepy_box.selected .stepy_box_selected, .stepy_box_selected .arp_icon ',
                                    'note' => esc_html__('It will apply on stepy style switch of active tab.','ARPrice'),
                                ),
                            )
                        )
                    ),
                )
            )
            )
        );

        return $arptempcssinfo;
    }

    function arprice_allowed_html_tags(){

        $arp_allowed_html = array(
            'a' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes(),
                array(
                    'href' => array(),
                    'rel' => array(),
                    'target' => array(),
                    'data-cb-plan-id' => array(),
                    'data-cb-type' => array()
                )
            ),
            'b' => $this->arprice_global_attributes(),
            'br' => $this->arprice_global_attributes(),
            'button' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes(),
                array(
                    'autofocus' => array(),
                    'disabled' => array(),
                    'formaction' => array(),
                    'name' => array(),
                    'type' => array(),
                    'value' => array()
                )
            ),
            'code' => $this->arprice_global_attributes(),
            'del' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'cite' => array(),
                    'datetime' => array()
                )
            ),
            'div' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes()
            ),
            'embed' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'height' => array(),
                    'onabort' => array(),
                    'oncanplay' => array(),
                    'onerror' => array(),
                    'src' => array(),
                    'type' => array(),
                    'width' => array(),
                )
            ),
            'font' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'color' => array(),
                    'face' => array(),
                    'size' => array()
                )
            ),
            'form' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'accept-charset' => array(),
                    'action' => array(),
                    'autocomplete' => array(),
                    'enctype' => array(),
                    'method' => array(),
                    'name' => array(),
                    'novalidate' => array(),
                    'onreset' => array(),
                    'onsubmit' => array(),
                    'target' => array()
                )
            ),
            'h1' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes()
            ),
            'h2' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes()
            ),
            'h3' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes()
            ),
            'h4' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes()
            ),
            'h5' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes()
            ),
            'h6' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes()
            ),
            'hr' => $this->arprice_global_attributes(),
            'i' => $this->arprice_global_attributes(),
            'img' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes(),
                array(
                    'alt' => array(),
                    'height' => array(),
                    'ismap' => array(),
                    'onabort' => array(),
                    'onerror' => array(),
                    'onload' => array(),
                    'sizes' => array(),
                    'src' => array(),
                    'srcset' => array(),
                    'usemap' => array(),
                    'width' => array()
                )
            ),
            'input' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes(),
                array(
                    'accept' => array(),
                    'alt' => array(),
                    'autocomplete' => array(),
                    'autofocus' => array(),
                    'checked' => array(),
                    'dirname' => array(),
                    'disabled' => array(),
                    'height' => array(),
                    'list' => array(),
                    'max' => array(),
                    'maxlength' => array(),
                    'min' => array(),
                    'multiple' => array(),
                    'name' => array(),
                    'onload' => array(),
                    'onsearch' => array(),
                    'pattern' => array(),
                    'placeholder' => array(),
                    'readonly' => array(),
                    'required' => array(),
                    'size' => array(),
                    'src' => array(),
                    'step' => array(),
                    'type' => array(),
                    'value' => array(),
                    'width' => array()
                )
            ),
            'ins' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'cite' => array(),
                    'datetime' => array()
                )
            ),
            'label' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes(),
                array(
                    'for' => array(),
                )
            ),
            'li' => $this->arprice_global_attributes(),
            'object' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'data' => array(),
                    'height' => array(),
                    'name' => array(),
                    'onabort' => array(),
                    'oncanplay' => array(),
                    'onerror' => array(),
                    'type' => array(),
                    'usemap' => array(),
                    'width' => array(),
                )
            ),
            'ol' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'reversed' => array(),
                    'start' => array()
                )
            ),
            'optgroup' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'disabled' => array(),
                    'label' => array()
                )
            ),
            'option' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'disabled' => array(),
                    'label' => array(),
                    'selected' => array(),
                    'value' => array()
                )
            ),
            'p' => $this->arprice_global_attributes(),
            'pre' => $this->arprice_global_attributes(),
            'script' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'async' => array(),
                    'charset' => array(),
                    'defer' => array(),
                    'onerror' => array(),
                    'onload' => array(),
                    'src' => array(),
                    'type' => array()
                )
            ),
            'section' => $this->arprice_global_attributes(),
            'select' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes(),
                array(
                    'autofocus' => array(),
                    'disabled' => array(),
                    'multiple' => array(),
                    'name' => array(),
                    'required' => array(),
                    'size' => array()
                )
            ),
            'small' => $this->arprice_global_attributes(),
            'span' => $this->arprice_global_attributes(),
            'strike' => $this->arprice_global_attributes(),
            'strike' => $this->arprice_global_attributes(),
            'strong' => $this->arprice_global_attributes(),
            'sub' => $this->arprice_global_attributes(),
            'sup' => $this->arprice_global_attributes(),
            'table' => $this->arprice_global_attributes(),
            'tbody' => $this->arprice_global_attributes(),
            'thead' => $this->arprice_global_attributes(),
            'tfooter' => $this->arprice_global_attributes(),
            'th' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'colspan' => array(),
                    'headers' => array(),
                    'rowspan' => array(),
                    'scope' => array()
                )
            ),
            'td' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'colspan' => array(),
                    'headers' => array(),
                    'rowspan' => array()
                )
            ),
            'tr' => $this->arprice_global_attributes(),
            'textarea' => array_merge(
                $this->arprice_global_attributes(),
                $this->arprice_visible_tag_attributes(),
                array(
                    'autofocus' => array(),
                    'cols' => array(),
                    'dirname' => array(),
                    'disabled' => array(),
                    'maxlength' => array(),
                    'name' => array(),
                    'placeholder' => array(),
                    'readonly' => array(),
                    'required' => array(),
                    'rows' => array(),
                    'wrap' => array()
                )
            ),
            'time' => array_merge(
                $this->arprice_global_attributes(),
                array(
                    'datetime' => array()
                )
            ),
            'u' => $this->arprice_global_attributes(),
            'ul' => $this->arprice_global_attributes(),
        );

        return $arp_allowed_html;
    }

    function arprice_global_attributes(){
        return array(
            'class' => array(),
            'id' => array(),
            'title' => array(),
            'tabindex' => array(),
            'lang' => array(),
            'style' => array(),
        );
    }

    function arprice_visible_tag_attributes(){
        return array(
            'onblur' => array(),
            'onchange' => array(),
            'onclick' => array(),
            'oncontextmenu' => array(),
            'oncopy' => array(),
            'oncut' => array(),
            'ondblclick' => array(),
            'ondrag' => array(),
            'ondragend' => array(),
            'ondragenter' => array(),
            'ondragleave' => array(),
            'ondragover' => array(),
            'ondragstart' => array(),
            'ondrop' => array(),
            'onfocus' => array(),
            'oninput' => array(),
            'oninvalid' => array(),
            'onkeydown' => array(),
            'onkeypress' => array(),
            'onkeyup' => array(),
            'onmousedown' => array(),
            'onmousemove' => array(),
            'onmouseout' => array(),
            'onmouseover' => array(),
            'onmouseup' => array(),
            'onmousewheel' => array(),
            'onpaste' => array(),
            'onscroll' => array(),
            'onselect' => array(),
            'onwheel' => array()
        );
    }

    function set_css() {
        global $arprice_version;

        $_REQUEST['arp_action'] = isset($_REQUEST['arp_action']) ? $_REQUEST['arp_action'] : '';

        wp_register_style('arprice_admin_rtl_css', PRICINGTABLE_URL . '/css/arprice_admin_rtl.css', array(), $arprice_version);

        wp_register_style('arprice_admin_css', PRICINGTABLE_URL . '/css/arprice_admin.css', array(), $arprice_version);

        wp_register_style('arprice_admin_3.0_css', PRICINGTABLE_URL . '/css/arprice_admin_3.0.css', array(), $arprice_version);
        wp_register_style('arprice_media_css', PRICINGTABLE_URL . '/css/arprice_media.css', array(), $arprice_version);

        wp_register_style( 'arprice_fontawesome_css', PRICINGTABLE_URL . '/css/font-awesome.css', array(), $arprice_version );


        $arp_disabled_fonts = (get_option('disable_font_loading_icon')) ? get_option('disable_font_loading_icon') : array();

        if(!in_array('enable_material_design_icon', $arp_disabled_fonts)){
            wp_register_style('arp_material_icons', PRICINGTABLE_URL . '/css/material-design-iconic-font.css', array(), $arprice_version);
        }
        if(!in_array('enable_typicons', $arp_disabled_fonts)){
            wp_register_style('arp_type_icons', PRICINGTABLE_URL . '/css/typicons.min.css', array(), $arprice_version);
        }
        if(!in_array('enable_ionicons', $arp_disabled_fonts)){
            wp_register_style('arp_ionicons_icons', PRICINGTABLE_URL . '/css/ionicons.min.css', array(), $arprice_version);
        }

        wp_register_style('arprice_tooltip_css', PRICINGTABLE_URL . '/css/tipso.min.css', array(), $arprice_version);

        wp_register_style('arprice_animate_css', PRICINGTABLE_URL . '/css/arprice_effects.css', array(), $arprice_version);

        wp_register_style('arprice_font_css_admin', PRICINGTABLE_URL . '/fonts/arp_fonts.css', array(), $arprice_version);

        wp_register_style('arprice_bootstrap_tour_css', PRICINGTABLE_URL . '/css/bootstrap-tour-standalone.css', array(), $arprice_version);

        wp_register_style('arp_jsgrid', PRICINGTABLE_URL . '/css/jsgrid.css', array(), $arprice_version);

        wp_register_style('arp_jsgrid_theme', PRICINGTABLE_URL . '/css/theme.css', array(), $arprice_version);

        wp_register_style('arp_daterangepicker', PRICINGTABLE_URL . '/css/daterangepicker.css', array(), $arprice_version);



        if (isset($_REQUEST['page']) && ( $_REQUEST['page'] == 'arprice' || $_REQUEST['page'] == 'arp_add_pricing_table' || $_REQUEST['page'] == 'arp_analytics' || $_REQUEST['page'] == 'arp_import_export' || $_REQUEST['page'] == 'arp_global_settings' || $_REQUEST['page'] == 'arp_ab_testing' )) {
            if (version_compare($GLOBALS['wp_version'], '3.4', '>') and version_compare($GLOBALS['wp_version'], '3.6', '<')) {
                wp_enqueue_style('arprice_admin_css_3.5', PRICINGTABLE_URL . '/css/arprice_admin_3.5.css', array(), $arprice_version);
            } else if (version_compare($GLOBALS['wp_version'], '3.5', '>') and version_compare($GLOBALS['wp_version'], '3.8', '<')) {
                wp_enqueue_style('arprice_admin_css_3.6', PRICINGTABLE_URL . '/css/arprice_admin_3.6.css', array(), $arprice_version);
            } else if (version_compare($GLOBALS['wp_version'], '3.7', '>')) {

                if(is_rtl()){
                    wp_enqueue_style('arprice_admin_rtl_css_3.8', PRICINGTABLE_URL . '/css/arprice_admin_rtl_3.8.css', array(), $arprice_version);
                }
                    wp_enqueue_style('arprice_admin_css_3.8', PRICINGTABLE_URL . '/css/arprice_admin_3.8.css', array(), $arprice_version);


            }

            if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'arp_global_settings') {
                if (version_compare($GLOBALS['wp_version'], '4.9.0', '>=')) {
                    wp_enqueue_style('wp-codemirror');
                }
            }

            if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'arprice' && $_REQUEST['arp_action'] != '') {

                if(!in_array('enable_material_design_icon', $arp_disabled_fonts)){
                    wp_enqueue_style('arp_material_icons');
                }
                if(!in_array('enable_ionicons', $arp_disabled_fonts)){
                    wp_enqueue_style('arp_ionicons_icons');
                }
                if(!in_array('enable_typicons', $arp_disabled_fonts)){
                    wp_enqueue_style('arp_type_icons');
                }
                wp_enqueue_style('arprice_fontawesome_css');

                wp_enqueue_style('arprice_bootstrap_tour_css');
            }

            if( isset($_REQUEST['page']) && $_REQUEST['page'] == 'arp_ab_testing' ){
                wp_enqueue_style('arprice_fontawesome_css');
            }

            if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'arprice' && $_REQUEST['arp_action'] == '') {

                wp_enqueue_style('arp_jsgrid');

                wp_enqueue_style('arp_jsgrid_theme');

                wp_enqueue_style('arp_daterangepicker');

                wp_enqueue_style('arprice_bootstrap_tour_css');

                wp_enqueue_style('arprice_fontawesome_css');
            }

            if(is_rtl()){
                wp_enqueue_style('arprice_admin_rtl_css');
            }
            wp_enqueue_style('arprice_admin_css');
            wp_enqueue_style('arprice_admin_3.0_css');
            wp_enqueue_style('arprice_media_css');


            if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arprice' || 'arp_ab_testing' == $_REQUEST['page'] ) {
                wp_enqueue_style('arprice_tooltip_css');
            }
        }
    }


    function set_front_css() {
        global $arprice_version;
        if (!is_admin()) {
            wp_register_style('arprice_front_css', PRICINGTABLE_URL . '/css/arprice_front.css', array(), $arprice_version);

            wp_register_style('arprice_front_tooltip_css', PRICINGTABLE_URL . '/css/tipso.min.css', array(), $arprice_version);

            wp_register_style('arprice_front_animate_css', PRICINGTABLE_URL . '/css/arprice_effects.css', array(), $arprice_version);

            wp_register_style('arprice_font_css_front', PRICINGTABLE_URL . '/fonts/arp_fonts.css', array(), $arprice_version);

            $arp_disabled_fonts = (get_option('disable_font_loading_icon')) ? get_option('disable_font_loading_icon') : array();

            if(!in_array('enable_fontawesome_icon', $arp_disabled_fonts)){
                wp_register_style('arp_fontawesome_css', PRICINGTABLE_URL . '/css/font-awesome.css', array(), $arprice_version);
            }

            if(!in_array('enable_typicons', $arp_disabled_fonts)){
                wp_register_style('arp_type_icons_css', PRICINGTABLE_URL . '/css/typicons.min.css', array(), $arprice_version);
            }

            if(!in_array('enable_material_design_icon', $arp_disabled_fonts)){
                wp_register_style('arp_material_icons_css', PRICINGTABLE_URL . '/css/material-design-iconic-font.css', array(), $arprice_version);
            }

            if(!in_array('enable_ionicons', $arp_disabled_fonts)){
                wp_register_style('arp_ionicons_icons', PRICINGTABLE_URL . '/css/ionicons.min.css', array(), $arprice_version);
            }
        }
    }



    function arp_enqueue_template_css() {

        global $post, $arprice_form, $arprice_version;

        $upload_main_url = PRICINGTABLE_UPLOAD_URL . '/css';

        $post_content = isset($post->post_content) ? $post->post_content : '';
        $parts = explode("[ARPrice", $post_content);
        if (is_array($parts) && key_exists(1, $parts)) {
            $myidpart = explode("id=", $parts[1]);
            if (isset($myidpart) && key_exists(1, $myidpart)) {
                $myid = explode("]", $myidpart[1]);
            }
        }

        if (!is_admin()) {
            global $wp_query;
            $posts = $wp_query->posts;
            $pattern = '\[(\[?)(ARPrice)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)';
            $frm_ids = array();
            if (is_array($posts)) {

                foreach ($posts as $post) {
                    if (preg_match_all('/' . $pattern . '/s', $post->post_content, $matches) && array_key_exists(2, $matches) && in_array('ARPrice', $matches[2])) {
                        $frm_ids[] = $matches;
                    }
                }

                $formids = array();
                if (is_array($frm_ids) && count($frm_ids) > 0) {

                    foreach ($frm_ids as $mat) {

                        if (is_array($mat) and count($mat) > 0) {
                            foreach ($mat as $k => $v) {

                                foreach ($v as $key => $val) {
                                    $parts = explode("id=", $val);
                                    if ($parts > 0 && isset($parts[1])) {

                                        if (isset($parts[1]) && stripos($parts[1], ']') !== false) {
                                            $partsnew = explode("]", $parts[1]);
                                            $formids[] = $partsnew[0];
                                        } else if (isset($parts[1]) && stripos($parts[1], ' ') !== false) {

                                            $partsnew = explode(" ", $parts[1]);
                                            $formids[] = $partsnew[0];
                                        } else {

                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $newvalarr = array();

            if (isset($formids) and is_array($formids) && count($formids) > 0) {
                foreach ($formids as $newkey => $newval) {
                    $newval = str_replace('"', '', $newval);
                    $newval = str_replace("'", "", $newval);
                    if (stripos($newval, ' ') !== false) {
                        $partsnew = explode(" ", $newval);
                        $newvalarr[] = $partsnew[0];
                    } else {
                        $newvalarr[] = $newval;
                    }
                }
            }

            if ($newvalarr) {
                $newvalues_enqueue = $arprice_form->get_table_enqueue_data($newvalarr);
            }

            if (isset($newvalues_enqueue) && is_array($newvalues_enqueue) && count($newvalues_enqueue) > 0) {
                $to_google_map = 0;
                $templates = array();
                $is_template = 0;

                foreach ($newvalues_enqueue as $n => $newqnqueue) {
                    if ($newqnqueue['googlemap']) {
                        $to_google_map = 1;
                    }

                    if ($newqnqueue['template_name'] != 0) {
                        $templates[] = $newqnqueue['template_name'];
                    } else {
                        $templates[] = $n;
                    }

                    if (!empty($newqnqueue['is_template'])) {
                        $is_template = $newqnqueue['is_template'];
                    }
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

                    wp_enqueue_style('arprice_front_css');

                    wp_enqueue_script('arprice_js');

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

    function arp_front_assets() {
        global $arprice_version;
        $arp_load_js_css = get_option('arp_load_js_css');
        if (isset($arp_load_js_css) && $arp_load_js_css == 'arp_load_js_css') {

            wp_enqueue_style('arprice_front_tooltip_css');

            $arp_disabled_fonts = (get_option('disable_font_loading_icon')) ? get_option('disable_font_loading_icon') : array();
            if(!in_array('enable_fontawesome_icon', $arp_disabled_fonts)){
                wp_enqueue_style('arp_fontawesome_css');
            }

            if(!in_array('enable_material_design_icon', $arp_disabled_fonts)){
                wp_enqueue_style('arp_material_icons_css');
            }

            if(!in_array('enable_ionicons', $arp_disabled_fonts)){
                wp_enqueue_style('arp_ionicons_icons');
            }

            if(!in_array('enable_typicons', $arp_disabled_fonts)){
                wp_enqueue_style('arp_type_icons_css');
            }
            wp_enqueue_style('arprice_front_animate_css');

            wp_enqueue_style('arprice_front_css', PRICINGTABLE_URL . '/css/arprice_front.css', array(), $arprice_version);
            wp_enqueue_style('arprice_animate_css', PRICINGTABLE_URL . '/css/arprice_effects.css', array(), $arprice_version);
            wp_enqueue_style('arprice_media_css', PRICINGTABLE_URL . '/css/arprice_media.css', array(), $arprice_version);

            wp_enqueue_script('arprice_js', PRICINGTABLE_URL . '/js/arprice_front.js', array(), $arprice_version);

            wp_enqueue_script('arprice_slider_js', PRICINGTABLE_URL . '/js/jquery.carouFredSel.js', array(), $arprice_version);

            wp_enqueue_script('arp_tooltip_front', PRICINGTABLE_URL . '/js/tipso.min.js', array(), $arprice_version);

            wp_enqueue_script('arp_animate_numbers', PRICINGTABLE_URL . '/js/jquery.animateNumber.js', array(), $arprice_version);

        }
    }



    function set_front_js() {
        global $arprice_version;
        if (!is_admin()) {

            wp_enqueue_script('jquery');

            wp_register_script('arprice_js', PRICINGTABLE_URL . '/js/arprice_front.js', array(), $arprice_version);

            wp_register_script('arprice_slider_js', PRICINGTABLE_URL . '/js/jquery.carouFredSel.js', array(), $arprice_version);

            wp_register_script('arp_tooltip_front', PRICINGTABLE_URL . '/js/tipso.min.js', array(), $arprice_version);

            wp_register_script('arp_animate_numbers', PRICINGTABLE_URL . '/js/jquery.animateNumber.js', array(), $arprice_version);
        }
    }


    function set_js() {
        global $pagenow, $arprice_version;
        if ($pagenow == 'edit.php' || $pagenow == 'post.php' || $pagenow == 'post-new.php') {
            return;
        }

        $_REQUEST['arp_action'] = isset($_REQUEST['arp_action']) ? $_REQUEST['arp_action'] : '';

        wp_register_script('arprice_admin_js', PRICINGTABLE_URL . '/js/arprice.js', array(), $arprice_version);

        wp_register_script('arprice_filedrag_js', PRICINGTABLE_URL . '/js/filedrag/filedrag.js', array(), $arprice_version);

        wp_register_script('arprice_dashboard_js', PRICINGTABLE_URL . '/js/arprice_dashboard.js', array(), $arprice_version);

	   wp_register_script('arprice-sortable-js', PRICINGTABLE_URL . '/js/sortable.min.js', array(), $arprice_version);

        wp_register_script('arprice_sortable_resizable_js', PRICINGTABLE_URL . '/js/arprice_sortable_resizable.js', array(), $arprice_version);

        wp_register_script('arprice_highchart_js', PRICINGTABLE_URL . '/js/highchart/highcharts.js', array(), $arprice_version);


        wp_register_script('arp_tooltip', PRICINGTABLE_URL . '/js/tipso.min.js', array(), $arprice_version);

        wp_register_script('arprice_jscolor', PRICINGTABLE_URL . '/js/jscolor.js', array(), $arprice_version);

        wp_register_script('arprice_editor_js', PRICINGTABLE_URL . '/js/arprice_editor.js', array(), $arprice_version);

        wp_register_script('arprice_html2canvas_js', PRICINGTABLE_URL . '/js/html2canvas.js', array(), $arprice_version);

        wp_register_script('arprice_bootstrap_tour_js', PRICINGTABLE_URL . '/js/bootstrap-tour-standalone.js', array(), $arprice_version);

        wp_register_script('arprice_tour_guide', PRICINGTABLE_URL . '/js/arprice_tour_guide.js', array(), $arprice_version);

        wp_register_script('arp_jsgrid_core', PRICINGTABLE_URL . '/js/jsgrid.core.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_field', PRICINGTABLE_URL . '/js/jsgrid.field.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_load_strategies', PRICINGTABLE_URL . '/js/jsgrid.load-strategies.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_sort_strategies', PRICINGTABLE_URL . '/js/jsgrid.sort-strategies.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_load_indicator', PRICINGTABLE_URL . '/js/jsgrid.load-indicator.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_field_text', PRICINGTABLE_URL . '/js/jsgrid.field.text.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_field_number', PRICINGTABLE_URL . '/js/jsgrid.field.number.js', array(), $arprice_version);

        if( version_compare( $GLOBALS['wp_version'], '5.0', '<' ) ){
            wp_register_script('moment', PRICINGTABLE_URL . '/js/moment.min.js', array(), $arprice_version);
        }

        wp_register_script('arp_daterangepicker', PRICINGTABLE_URL . '/js/daterangepicker.js', array('moment'), $arprice_version);

        wp_register_script('arp_import_table', PRICINGTABLE_URL . '/js/arprice_import_table.js', array(), $arprice_version);

		// Dismiss admin notice code

		$current_screen = get_current_screen();
		$is_dashboard_base = $current_screen->base;
		$is_dashboard_id = $current_screen->id;
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
        if(($is_dashboard_base=="dashboard" || $is_dashboard_id=="dashboard"))
		{
			wp_enqueue_script('arp-admin-dismissible-notices', PRICINGTABLE_URL . '/js/dismiss_arp_admin_notice.js', array(), $arprice_version);
			wp_localize_script(
                'dismissible-notices',
                'dismissible_notice',
                array(
                    'nonce' => wp_create_nonce( 'dismissible-notice' ),
                )
            );
		}


        if (isset($_REQUEST['page']) && ( $_REQUEST['page'] == 'arprice' || $_REQUEST['page'] == 'arp_add_pricing_table' || $_REQUEST['page'] == 'arp_analytics' || $_REQUEST['page'] == 'arp_import_export' || $_REQUEST['page'] == 'arp_global_settings' || $_REQUEST['page'] == 'arp_ab_testing' ) && ($pagenow !== 'edit.php' && $pagenow !== 'post.php' && $pagenow !== 'post-new.php')) {
            wp_enqueue_script('jquery');

            if (isset($_REQUEST['page']) and ( $_REQUEST['page'] == 'arprice' || $_REQUEST['page'] == 'arp_global_settings' || 'arp_ab_testing' == $_REQUEST['page'] )) {

                if (isset($_REQUEST['arp_action']) && ($_REQUEST['arp_action'] == 'edit' || $_REQUEST['arp_action'] == 'new')) {
                    wp_enqueue_script('arprice_admin_js');

                    wp_enqueue_script('arprice_filedrag_js');

                    wp_enqueue_script('arprice_sortable_resizable_js');

                    wp_enqueue_script('arprice-sortable-js');

                    wp_enqueue_script('arprice_editor_js');

                    wp_enqueue_script('jquery-effects-slide');

                    wp_enqueue_script('jquery-ui-slider');

                    wp_enqueue_script('arprice_jscolor');

                    if (version_compare($GLOBALS['wp_version'], '4.9.0', '>=')) {
                        $cm_settings['codeEditor'] = wp_enqueue_code_editor(array('type' => 'text/css'));
                        wp_localize_script('jquery', 'cm_settings', $cm_settings);
                        wp_enqueue_script('wp-theme-plugin-editor');
                    }

                    wp_enqueue_script('arprice_html2canvas_js');

                    if( isset($_REQUEST['tour_guid']) && true == $_REQUEST['tour_guid'] ){

                        wp_enqueue_script('arprice_bootstrap_tour_js');

                        wp_enqueue_script('arprice_tour_guide');
                    }

                    wp_localize_script( 'arprice_editor_js', 'arp_editor_obj', array(
                        'inherit_font' => esc_html__( 'Inherit from Theme', 'ARPrice')
                    ) );
                }

                if ($_REQUEST['arp_action'] == '' && ($_REQUEST['page'] == 'arprice' || $_REQUEST['page'] == 'arp_global_settings' || 'arp_ab_testing' == $_REQUEST['page'] )) {

                    wp_enqueue_script('arprice_dashboard_js');
                    $traslated_text = "
                    var __CLICKTOCOPY  = '" . addslashes( esc_html__( 'Click to copy', 'ARPrice' ) ) . "';
                    var __COPIED = '" . addslashes( esc_html__( 'Copied', 'ARPrice' ) ) . "';
                    var __RESET_ANALYSIS = '" . addslashes( esc_html__( 'Reset Analytics', 'ARPrice' ) ) . "';";

                    wp_add_inline_script( 'arprice_dashboard_js', $traslated_text );

                    if ( $_REQUEST['page'] == 'arprice' || 'arp_ab_testing' == $_REQUEST['page'] ) {

                        wp_enqueue_script('arprice_highchart_js');

                        wp_enqueue_script('arp_jsgrid_core');
                        wp_enqueue_script('arp_jsgrid_field');
                        wp_enqueue_script('arp_jsgrid_load_strategies');
                        wp_enqueue_script('arp_jsgrid_sort_strategies');
                        wp_enqueue_script('arp_jsgrid_load_indicator');
                        wp_enqueue_script('arp_jsgrid_field_text');
                        wp_enqueue_script('arp_jsgrid_field_number');

                        wp_enqueue_script('moment');

                        wp_enqueue_script('arp_daterangepicker');

                        wp_enqueue_script('arprice_bootstrap_tour_js');

                        if( $_REQUEST['page'] == 'arprice' ){
                            wp_enqueue_script('arprice_tour_guide');
                        }
                    }
                    if ($_REQUEST['page'] == 'arp_global_settings') {
                        if (version_compare($GLOBALS['wp_version'], '4.9.0', '>=')) {
                            $cm_settings['codeEditor'] = wp_enqueue_code_editor(array('type' => 'text/css'));
                            wp_localize_script('jquery', 'cm_settings', $cm_settings);
                            wp_enqueue_script('wp-theme-plugin-editor');
                        }
                    }
                }

                wp_enqueue_script('jquery-ui-core');


                wp_enqueue_script('media-upload');

                wp_enqueue_script('arp_tooltip');

                wp_enqueue_script('sack');

            }
            if(is_plugin_active('arprice-responsive-pricing-table/arprice-responsive-pricing-table.php')){
                global $arpricelite_version;
                if (version_compare($arpricelite_version, '2.0', '>=')) {
                    if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arp_import_export') {
                        wp_enqueue_script('arp_import_table');
                    }
                }
            }

        }
    }



    function get_free_menu_position($start, $increment = 0.1) {
        foreach ($GLOBALS['menu'] as $key => $menu) {
            $menus_positions[] = floatval($key);
        }
        if (!in_array($start, $menus_positions)) {
            $start = strval($start);
            return $start;
        } else {
            $start += $increment;
        }

        while (in_array(strval($start), $menus_positions)) {
            $start += $increment;
        }
        $start = strval($start);
        return $start;
    }



    function arp_capabilities() {
        $cap = array(
            'arp_view_pricingtables' => esc_html__('View And Manage Pricing Tables', 'ARPrice'),
            'arp_add_udpate_pricingtables' => esc_html__('Add/Edit Pricing Tables', 'ARPrice'),
            'arp_analytics_pricingtables' => esc_html__('View Analytics of Pricing Tables', 'ARPrice'),
            'arp_import_export_pricingtables' => esc_html__('Import/Export Pricing Tables', 'ARPrice'),
            'arp_global_settings_pricingtables' => esc_html__('Import/Export Pricing Tables', 'ARPrice'),
            'arp_ab_testing_pricingtables' => esc_html__('A/B Testing', 'ARPrice'),
        );

        return $cap;
    }

    function pricingtable_menu() {
        global $arp_pricingtable;
        $place = $arp_pricingtable->get_free_menu_position(26.1, .1);

        $arp_disabled_fonts = (get_option('disable_font_loading_icon')) ? get_option('disable_font_loading_icon') : array();

        add_menu_page('ARPrice', 'ARPrice', 'arp_view_pricingtables', 'arprice', array($this, 'route'), PRICINGTABLE_IMAGES_URL . '/pricing_table_icon.png', $place);

        do_action('add_licensed_menu');

        add_submenu_page('arprice', esc_html__('Import/Export', 'ARPrice'), esc_html__('Import/Export', 'ARPrice'), 'arp_import_export_pricingtables', 'arp_import_export', array($this, 'route'));

        $arp_enable_ab_testing = get_option('arp_enable_ab_testing');
        if( $arp_enable_ab_testing == 1 ){
            add_submenu_page('arprice', esc_html__('A/B Testing', 'ARPrice'), esc_html__('A/B testing', 'ARPrice'), 'arp_ab_testing_pricingtables', 'arp_ab_testing', array($this, 'route'));
        }

        add_submenu_page('arprice', esc_html__('Settings', 'ARPrice'), esc_html__('Settings', 'ARPrice'), 'arp_global_settings_pricingtables', 'arp_global_settings', array($this, 'route'));

    }

    function arp_set_doc_link(){
        $doc_link = ARPURL.'/documentation/';

        $arp_admin_menu_script = "<script type='text/javascript'>";
        $arp_admin_menu_script .= "jQuery(document).ready(function($){
            var menues = jQuery('li.toplevel_page_arprice');
            var li_menu = '<li><a href=\"{$doc_link}\" target=\"_blank\">".esc_html__('Documentation','ARPrice')."</a>';
            menues.find('ul.wp-submenu').append(li_menu);
        });";

        $arp_admin_menu_script .= "</script>";

        echo $arp_admin_menu_script;
    }

    function arp_menu_css() {
        ?>
        <style type="text/css">
            #adminmenu #toplevel_page_arprice .wp-menu-image img{
                padding-top:5px;
            }
        </style>
        <?php

    }

    function route() {
        global $arp_pricingtable, $arprice_form;
        if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arprice') {
            if (isset($_REQUEST['arp_action']) && $_REQUEST['arp_action'] == 'edit') {
                $arp_pricingtable->edit_template();
            } else if (isset($_REQUEST['arp_action']) and $_REQUEST['arp_action'] == 'new') {
                $arp_pricingtable->edit_template();
            } else {
                $arp_pricingtable->addnew();
            }
        } else if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arp_add_pricing_table') {
            if (isset($_REQUEST['arpaction']) and $_REQUEST['arpaction'] == 'create_new') {
                $arprice_form->edit_template();
            } else {
                $arp_pricingtable->addnew();
            }
        } else if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arp_analytics') {
            $arp_pricingtable->analytics();
        } else if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arp_import_export') {
            $arp_pricingtable->import_export();
        } else if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arp_global_settings') {
            $arp_pricingtable->load_global_settings();
        }else if(isset($_REQUEST['page']) and $_REQUEST['page'] == 'arp_ab_testing'){
            $arp_pricingtable->load_abtesting_settings();
        }
        else {
            $arp_pricingtable->addnew();
        }
    }

    function addnew() {
        if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arprice_template_listing_3.0.php')){
            include( PRICINGTABLE_VIEWS_DIR . '/arprice_template_listing_3.0.php');
        }
    }

    function edit_template() {
        if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arprice_listing_editor.php')){
            include( PRICINGTABLE_VIEWS_DIR . '/arprice_listing_editor.php' );
        }
    }

    function import_export() {
        if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arprice_import_export.php')){
            include( PRICINGTABLE_VIEWS_DIR . '/arprice_import_export.php' );
        }
    }

    function load_global_settings() {
        if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arprice_global_settings.php')){
            include( PRICINGTABLE_VIEWS_DIR . '/arprice_global_settings.php' );
        }
    }

    function load_abtesting_settings(){
        if( file_exists( PRICINGTABLE_VIEWS_DIR . '/arprice_ab_testing.php' ) ){
            include( PRICINGTABLE_VIEWS_DIR . '/arprice_ab_testing.php' );
        }
    }

   public static function arp_db_check() {
        global $arp_pricingtable;
        $arprice_version = get_option('arprice_version');

        if (!isset($arprice_version) || $arprice_version == '' && is_multisite()) {
            $arp_pricingtable->install();
        }
    }

    public static function install() {
        global $arp_pricingtable;

        $arprice_version = get_option('arprice_version');

        if (!isset($arprice_version) || $arprice_version == '') {
            $arp_pricingtable->arp_pricing_table_main_settings();

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            global $wpdb, $arprice_version;

            $charset_collate = '';

            if ($wpdb->has_cap('collation')) {

                if (!empty($wpdb->charset))
                    $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

                if (!empty($wpdb->collate))
                    $charset_collate .= " COLLATE $wpdb->collate";
            }

            update_option('arprice_version', $arprice_version);
            update_option('arp_is_new_installation', 1);
            update_option('arp_enable_analytics','arp_enable_analytics');
            update_option('arprice_tour_guide_value', 'yes');

            $table = $wpdb->prefix . 'arp_arprice';

            $sql_table = "CREATE TABLE IF NOT EXISTS `{$table}`(
                 ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                 table_name VARCHAR(255) NOT NULL,
                 template_name int(11) NOT NULL,
                 general_options LONGTEXT NOT NULL,
                 is_template int(1) NOT NULL,
                 is_animated int(1) NOT NULL,
                 status VARCHAR(255) NOT NULL,
                 create_date DATETIME NOT NULL,
                 arp_last_updated_date DATETIME NOT NULL
             ){$charset_collate}";

            dbDelta($sql_table);

            $table_opt = $wpdb->prefix . 'arp_arprice_options';

            $sql_table_opt = "CREATE TABLE IF NOT EXISTS `{$table_opt}`(
                ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                table_id INT(11) NOT NULL,
                table_options LONGTEXT NOT NULL
            ){$charset_collate}";

            dbDelta($sql_table_opt);

            $tablecreate = $wpdb->prefix . 'arp_arprice_analytics';

            $sqltable = "CREATE TABLE IF NOT EXISTS `{$tablecreate}`(
                tracking_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
                pricing_table_id int NOT NULL,
                browser_name VARCHAR(255) NOT NULL,
                browser_version VARCHAR(255) NOT NULL,
                page_url varchar(255) NOT NULL,
                ip_address varchar(255) NOT NULL,
                country_name varchar(255) NOT NULL,
                session_id varchar(255) NOT NULL,
                added_date DATETIME NOT NULL,
                is_click int(1) NOT NULL DEFAULT '0',
                plan_id varchar(25) NOT NULL,
                unique_view tinyint(1) NOT NULL DEFAULT '1'
            ){$charset_collate}";
            dbDelta($sqltable);

            $ab_table = $wpdb->prefix . 'arp_ab_testing';

            $ab_table_sql = "CREATE TABLE IF NOT EXISTS `{$ab_table}`(
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                options LONGTEXT NOT NULL,
                created_date DATETIME NOT NULL,
                last_updated_date DATETIME NOT NULL
            ){$charset_collate}";

            dbDelta($ab_table_sql);

            $arp_pricingtable->arp_pricing_table_templates();  //install default templates



            $wpdb->query("ALTER TABLE `{$table}` AUTO_INCREMENT = 100");

            $wpdb->query("ALTER TABLE `{$table_opt}` AUTO_INCREMENT = 100");

            $arp_pricingtable->arp_set_global_settings();
            global $arprice_class;
            $arprice_class->getwpversion();
        }

        $args = array(
            'role' => 'administrator',
            'fields' => 'id'
        );
        $users = get_users($args);
        if (count($users) > 0) {
            foreach ($users as $key => $user_id) {

                $arp_roles = $arp_pricingtable->arp_capabilities();

                $userObj = new WP_User($user_id);
                foreach ($arp_roles as $arprole => $arproledescription) {
                    $userObj->add_cap($arprole);
                }
                unset($arprole);
                unset($arp_roles);
                unset($arproledescription);
            }
        }
    }



   public static function arp_pricing_table_templates() {
        include(PRICINGTABLE_CLASSES_DIR . '/class.arprice_default_templates.php');
    }

    function arp_enqueue_preview_css($id, $template_id, $is_admin_preview, $is_template) {
        global $arprice_version, $arprice_images_css_version;
        if ($is_template == 1) {

            wp_register_style('arprice_preview_css_' . $id . '_v' . $arprice_images_css_version, PRICINGTABLE_URL . '/css/templates/arptemplate_' . $template_id . '_v' . $arprice_images_css_version . '.css', array(), $arprice_version);

            wp_print_styles('arprice_preview_css_' . $id . '_v' . $arprice_images_css_version);
        } else {
            wp_register_style('arprice_preview_css_' . $id, PRICINGTABLE_UPLOAD_URL . '/css/arptemplate_' . $template_id . '.css', array(), $arprice_version);

            wp_print_styles('arprice_preview_css_' . $id);
        }

        if ($is_admin_preview == 1) {
            wp_register_style('arprice_front_css', PRICINGTABLE_URL . '/css/arprice_front.css', array(), $arprice_version);

            wp_register_script('arp_tooltip_front', PRICINGTABLE_URL . '/js/tipso.min.js', array(), $arprice_version);

            wp_register_script('arprice_js', PRICINGTABLE_URL . '/js/arprice_front.js', array(), $arprice_version);
            wp_register_script('arp_animate_numbers', PRICINGTABLE_URL . '/js/jquery.animateNumber.js', array(), $arprice_version);
        }

        wp_enqueue_script('jquery-ui-core');

        wp_enqueue_script('jquery-effects-slide');

        wp_print_scripts('arprice_js');

        wp_print_scripts('arprice_slider_js');

        wp_print_scripts('arp_tooltip_front');
    }

    function arp_hide_update_notice_to_all_admin_users() {
        if (isset($_GET) and ( isset($_GET['page']) and preg_match('/arp*/', $_GET['page']))) {
            remove_all_actions('network_admin_notices', 10000);
            remove_all_actions('user_admin_notices', 10000);
            remove_all_actions('admin_notices', 10000);
            remove_all_actions('all_admin_notices', 10000);
        }
    }

    function footer_js($location = 'footer') {
        global $arp_is_animation, $arp_has_tooltip, $arp_has_fontawesome, $arp_effect_css, $arp_is_lightbox, $arp_animate_price, $arp_has_material_icons, $arp_has_typicons, $arp_has_ionicons, $arp_template_loaded;

        $arp_load_js_css = get_option('arp_load_js_css');

        wp_enqueue_script('jquery-ui-core');

        wp_enqueue_script('jquery-effects-slide');

        if( !empty( $arp_template_loaded ) ){
            wp_enqueue_style('arprice_front_css');
            
            wp_enqueue_script( 'arprice_js' );
        }

        if ($arp_is_animation == 1)
            wp_enqueue_script('arprice_slider_js');

        if ($arp_has_tooltip == 1) {
            wp_enqueue_style('arprice_front_tooltip_css');
            if( !isset($arp_load_js_css) || $arp_load_js_css == '' || $arp_load_js_css != 'arp_load_js_css'){
                wp_enqueue_script('arp_tooltip_front');
            }
        }

        if ($arp_has_fontawesome == 1) {
            wp_enqueue_style('arp_fontawesome_css');
        }
        $arp_disabled_fonts = (get_option('disable_font_loading_icon')) ? get_option('disable_font_loading_icon') : array();
        if ($arp_has_material_icons == 1 && !in_array('enable_material_design_icon', $arp_disabled_fonts)) {
            wp_enqueue_style('arp_material_icons_css');
        }

        if ($arp_has_typicons == 1 && !in_array('enable_typicons', $arp_disabled_fonts)) {
            wp_enqueue_style('arp_type_icons_css');
        }

        if ($arp_has_ionicons == 1 && !in_array('enable_ionicons', $arp_disabled_fonts)) {
            wp_enqueue_style('arp_ionicons_icons');
        }

        if ($arp_effect_css == 1) {
            wp_enqueue_style('arprice_front_animate_css');
        }

        if ($arp_animate_price == 1) {
            wp_enqueue_script('arp_animate_numbers');
        }

    }

    function append_googlemap_js($newvalarr) {

        global $arp_pricingtable, $arprice_form, $arprice_version;
        $arr[] = $newvalarr;

        $newvalues_enqueue = $arprice_form->get_table_enqueue_data($arr);

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
        }
    }

    function arp_template_order() {


        $arptmparr = apply_filters('arp_pricing_template_order_managed', array(
            'arptemplate_25' => 1,
            'arptemplate_20' => 2,
            'arptemplate_21' => 3,
            'arptemplate_26' => 4,
            'arptemplate_23' => 5,
            'arptemplate_2' => 6,
            'arptemplate_24' => 7,
            'arptemplate_1' => 8,
            'arptemplate_22' => 9,
            'arptemplate_3' => 10,
            'arptemplate_4' => 11,
            'arptemplate_5' => 12,
            'arptemplate_6' => 13,
            'arptemplate_7' => 14,
            'arptemplate_8' => 15,
            'arptemplate_9' => 16,
            'arptemplate_10' => 17,
            'arptemplate_11' => 18,
            'arptemplate_12' => 19,
            'arptemplate_13' => 20,
            'arptemplate_14' => 21,
            'arptemplate_15' => 21,
            'arptemplate_16' => 23,
            )
        );



        return $arptmparr;
    }

    function arp_set_global_settings() {
        add_option('arp_mobile_responsive_size', 480);
        add_option('arp_tablet_responsive_size', 768);
        add_option('arp_desktop_responsive_size', 0);
        add_option('arp_global_custom_css', '');
        add_option('arp_css_character_set', '');
    }

    function arp_template_responsive_type_array() {

        $array = apply_filters('arprice_responsive_type_array_filter', array(
            'header_level_types' => array(
                'type_1' => array('arptemplate_9', 'arptemplate_12'),
                'type_2' => array('arptemplate_4'),
                'type_3' => array('arptemplate_16', 'arptemplate_10'),
                'type_4' => array('arptemplate_6'),
                'type_5' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_5', 'arptemplate_8', 'arptemplate_11', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26'),
                'type_6' => array('arptemplate_7', 'arptemplate_5'),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'header_title_types' => array(
                'type_1' => array('arptemplate_1'),
                'type_2' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'header_level_types_front_array_1' => array(
                'type_1' => array('arptemplate_1'),
                'type_2' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array('arptemplate_6'),
                'type_4' => array('arptemplate_7', 'arptemplate_5'),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'header_level_types_front_array_2' => array(
                'type_1' => array('arptemplate_9'),
                'type_2' => array('arptemplate_12'),
                'type_3' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_7', 'arptemplate_8', 'arptemplate_10', 'arptemplate_11', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_4' => array('arptemplate_1'),
                'type_5' => array('arptemplate_6'),
                'type_6' => array('arptemplate_7', 'arptemplate_5'),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_wrapper_height' => array(
                'type_1' => array('arptemplate_6'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'price_wrapper_types' => array(
                'type_1' => array('arptemplate_2', 'arptemplate_11', 'arptemplate_3', 'arptemplate_8', 'arptemplate_10', 'arptemplate_13', 'arptemplate_14', 'arptemplate_16', 'arptemplate_23', 'arptemplate_21', 'arptemplate_22', 'arptemplate_5'),
                'type_2' => array('arptemplate_7'),
                'type_3' => array('arptemplate_9', 'arptemplate_15', 'arptemplate_20', 'arptemplate_6'),
                'type_4' => array(),
                'type_5' => array('arptemplate_1'),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'price_level_types' => array(
                'type_1' => array('arptemplate_1', 'arptemplate_4', 'arptemplate_12', 'arptemplate_5', 'arptemplate_7', 'arptemplate_11', 'arptemplate_9', 'arptemplate_22', 'arptemplate_24'),
                'type_2' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_8', 'arptemplate_10', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_23', 'arptemplate_25'),
                'type_3' => array('arptemplate_11', 'arptemplate_6'),
                'type_4' => array('arptemplate_22', 'arptemplate_24'),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'price_label_level_types' => array(
                'type_1' => array('arptemplate_4', 'arptemplate_12', 'arptemplate_5', 'arptemplate_7', 'arptemplate_11', 'arptemplate_6', 'arptemplate_9', 'arptemplate_22', 'arptemplate_24'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_8', 'arptemplate_10', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_23', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array('arptemplate_22', 'arptemplate_24'),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'body_li_level_types' => array(
                'type_1' => array('arptemplate_8', 'arptemplate_10'),
                'type_2' => array(),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_description_types' => array(
                'type_1' => array('arptemplate_1', 'arptemplate_4', 'arptemplate_12', 'arptemplate_5', 'arptemplate_8', 'arptemplate_6', 'arptemplate_2', 'arptemplate_9', 'arptemplate_14', 'arptemplate_15', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_24'),
                'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10', 'arptemplate_11', 'arptemplate_13', 'arptemplate_16', 'arptemplate_23', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'button_level_types' => array(
                'type_1' => array('arptemplate_8', 'arptemplate_13', 'arptemplate_11'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'slider_types' => array(
                'type_1' => array('arptemplate_8'),
                'type_2' => array('arptemplate_10'),
                'type_3' => array('arptemplate_13', 'arptemplate_14', 'arptemplate_15'),
                'type_4' => array('arptemplate_16'),
                'type_5' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_9', 'arptemplate_11', 'arptemplate_12', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
        ));

        return $array;
    }

    function arp_template_editor_array() {

        $arptemplate_editor_array = apply_filters('arptemplate_editor_handler', array(
            'column_header_click_handler' => array(
                'type_1' => array('arptemplate_12', 'arptemplate_8', 'arptemplate_11'),
                'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10'),
                'type_3' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_9', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_header_click_handler_type_1' => array(
                'type_1' => array('arptemplate_10'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_button_click_handler' => array(
                'type_1' => array('arptemplate_12', 'arptemplate_8', 'arptemplate_11'),
                'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10'),
                'type_3' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_9', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'body_li_click_handler' => array(
                'type_1' => array('arptemplate_12', 'arptemplate_8', 'arptemplate_11'),
                'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10'),
                'type_3' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_9', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_price_click_handler' => array(
                'type_1' => array('arptemplate_12', 'arptemplate_8', 'arptemplate_11'),
                'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10', 'arptemplate_4',),
                'type_3' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_5', 'arptemplate_6', 'arptemplate_9', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'price_text_keyup_handler' => array(
                'type_1' => array('arptemplate_1', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24'),
                'type_2' => array('arptemplate_11'),
                'type_3' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_25'),
                'type_4' => array(''),
                'type_5' => array(''),
                'type_6' => array(''),
                'type_7' => array(''),
                'type_8' => array(''),
            ),
            'price_label_keyup_handler' => array(
                'type_1' => array('arptemplate_1', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24'),
                'type_2' => array('arptemplate_11'),
                'type_3' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_25'),
                'type_4' => array(''),
                'type_5' => array(''),
                'type_6' => array(''),
                'type_7' => array(''),
                'type_8' => array(''),
            ),
            'price_font_size_handler' => array(
                'type_1' => array('arptemplate_15'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'price_text_font_size_handler' => array(
                'type_1' => array('arptemplate_15'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_title_handler' => array(
                'type_1' => array('arptemplate_12'),
                'type_2' => array( 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array('arptemplate_1'),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array()
            ),
            'column_style_btn_handler' => array(
                'type_1' => array('arptemplate_1', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24'),
                'type_2' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array()
            )
        ));

        return $arptemplate_editor_array;
    }

    function arprice_font_icon_size_parser($string = '') {


        $pattern = "/<i (.*?)>(.*?)<\/i>/i";

        $size_pattern = "/arpsize-ico-[0-9]*/";
        preg_match_all($pattern, $string, $matches, PREG_SET_ORDER);

        if (is_array($matches) and ! empty($matches)) {
            foreach ($matches as $key => $value) {

                preg_match($size_pattern, $value[0], $matches_n);

                if (!empty($matches_n[0])) {
                    $font_size = str_replace('arpsize-ico-', '', $matches_n[0]);
                    $style = "font-size:" . $font_size . "px;";
                    $dom = new DOMDocument();
                    $dom->loadHTML($value[0]);
                    $n = new DOMXPath($dom);
                    foreach ($n->query("//i") as $node) {
                        $added_style = $node->getAttribute('style');

                        $font_size_pattern = '/(font-size)\:(.*?)(\;|$)/';
                        $added_style = preg_replace($font_size_pattern,'',$added_style);

                        $node->setAttribute("style", $style.$added_style);
                    }
                    $newHTML = $dom->saveHTML();

                    preg_match_all($pattern, $newHTML, $matches_);

                    if (is_array($matches_[0]) && !empty($matches_[0])) {
                        foreach ($matches_[0] as $key => $mat) {
                            $string = str_replace($value[0], $mat, $string);
                        }
                    }
                }
            }
        }

        return $string;
    }



    function arprice_cs_icon_map($icon_map) {
        $icon_map['AR-PRICE'] = ARPRICECSURL . '/assets/svg/ar_price.svg';
        return $icon_map;
    }

    function arprice_cs_register_elements() {
        if (function_exists('cornerstone_register_element')) {
            cornerstone_register_element('ARPrice_CS', 'arprice-cs', ARPRICECSDIR . '/includes/arprice-cs');
        }
    }

    function arp_prevent_rocket_loader_script($tag, $handle) {

        $script = htmlspecialchars($tag);
        $pattern2 = '/\/(wp\-content\/plugins\/arprice)|(wp\-includes\/js)/';
        preg_match($pattern2,$script,$match_script);

        if( !isset($match_script[0]) || $match_script[0] == '' ){
            return $tag;
        }

        $pattern = '/(.*?)(data\-cfasync\=)(.*?)/';
        preg_match_all($pattern, $tag, $matches);
        if (!is_array($matches)) {
            return str_replace(' src', ' data-cfasync="false" src', $tag);
        } else if (!empty($matches) && !empty($matches[2]) && !empty($matches[2][0]) && strtolower(trim($matches[2][0])) != 'data-cfasync=') {
            return str_replace(' src', ' data-cfasync="false" src', $tag);
        } else if (!empty($matches) && empty($matches[2])) {
            return str_replace(' src', ' data-cfasync="false" src', $tag);
        } else {
            return $tag;
        }
    }

    function arp_toggle_counter(){
        $counter = 7;
        return apply_filters('arp_toggle_counter_set_outside',$counter);
    }

    function arp_toggle_switch_tab_width(){
        $switch_width = array(
            '2' => '49.3%',
            '3' => '32.4%',
            '4' => '31.9%',
            '5' => '31.9%',
            '6' => '31.9%',
            '7' => '31.9%',
            '8' => '31.9%'
        );

        return $switch_width;
    }

    function arp_toggle_switch_label_name(){
        $switch_labels = array(
            'one'   => 'first',
            'two'   => 'second',
            'three' => 'third',
            'four'  => 'fourth',
            'five'  => 'fifth',
            'six'   => 'sixth',
            'seven' => 'seventh',
            'eight' => 'eighth'
        );

        return $switch_labels;
    }

    function arp_toggle_step_name(){
        $step_name = array(
            'yearly' => array('toggle_step_first_tab','togglestep_yearly', 'first','one'),
            'monthly' => array('toggle_step_second_tab','togglestep_monthly', 'second','two'),
            'quarterly' => array('toggle_step_third_tab','togglestep_quarterly', 'third','three'),
            'weekly' => array('toggle_step_fourth_tab','togglestep_weekly', 'fourth','four'),
            'daily' => array('toggle_step_fifth_tab','togglestep_daily', 'fifth','five'),
            'step6' => array('toggle_step_sixth_tab','togglestep_step6', 'sixth','six'),
            'step7' => array('toggle_step_seventh_tab','togglestep_step7', 'seventh','seven'),
            'step8' => array('toggle_step_eighth_tab', 'togglestep_step8', 'eighth', 'eight')
        );

        return $step_name;
    }

    function arp_toggle_step_label(){
        $step_label = array(
            '1' => 'togglestep_yearly|Yearly|setas_default_toggle_yearly|arp_two_switch|two_step_one|toggle_step_first',
            '2' => 'togglestep_monthly|Monthly|setas_default_toggle_monthly|arp_two_switch|two_step_two|toggle_step_second',
            '3' => 'togglestep_quarterly|Quarterly|setas_default_toggle_quarterly|arp_three_switch|two_step_three|toggle_step_third',
            '4' => 'togglestep_weekly|Weekly|setas_default_toggle_weekly|arp_four_switch|two_step_four|toggle_step_fourth',
            '5' => 'togglestep_daily|Daily|setas_default_toggle_daily|arp_five_switch|two_step_five|toggle_step_fifth',
            '6' => 'togglestep_step6|Step 6|setas_default_toggle_step6|arp_six_switch|two_step_six|toggle_step_sixth',
            '7' => 'togglestep_step7|Step 7|setas_default_toggle_step7|arp_seven_switch|two_step_seven|toggle_step_seventh',
            '8' => 'togglestep_step8|Step 8|setas_default_toggle_step8|arp_eight_switch|two_step_eight|toggle_step_eighth',
        );

        return apply_filters('arp_toggle_step_label_outside',$step_label);
    }

    function arp_toggle_switch_wrapper_class(){
        $wrapper_cls = array(
            'arp_two_switch',
            'arp_three_switch',
            'arp_four_switch',
            'arp_five_switch',
            'arp_six_switch',
            'arp_seven_switch',
            'arp_eight_switch',
        );

        return apply_filters('arp_toggle_switch_wrapper_class_outside',$wrapper_cls);
    }

    function arp_toggle_switch_position(){

        $arp_width = array(
            '2' => array(
                '0' => '0.7%',
                '1' => '49.2%'
            ),
            '3' => array(
                '0' => '0.7%',
                '1' => '33.33%',
                '2' => '66.35%'
            ),
            '4' => array(
                '0' => '0.4%',
                '1' => '24.8%',
                '2' => '49.6%',
                '3' => '74.7%',
            ),
            '5' => array(
                '0' => '0.4%',
                '1' => '19.8%',
                '2' => '39.6%',
                '3' => '59.4%',
                '4' => '79.7%'
            ),
            '6' => array(
                '0' => '0.4%',
                '1' => '16.6%',
                '2' => '32.32%',
                '3' => '49.0%',
                '4' => '66.0%',
                '5' => '83.0%'
            ),
            '7' => array(
                '0' => '0.4%',
                '1' => '14.28%',
                '2' => '28.56%',
                '3' => '42.9%',
                '4' => '57.0%',
                '5' => '71.40%',
                '6' => '85.0%'
            ),
            '8' => array(
                '0' => '0.4%',
                '1' => '12.5%',
                '2' => '25%',
                '3' => '37.5%',
                '4' => '50%',
                '5' => '62.5%',
                '6' => '75%',
                '7' => '87.0%'
            )
        );

        return $arp_width;
    }

    function arp_toggle_slide_button_position(){

        $arp_width = array(
            '2' => array(
                '0' => '-0.2%',
                '1' => '50.2%'
            ),
            '3' => array(
                '0' => '-0.2%',
                '1' => '33.33%',
                '2' => '67.35%'
            ),
            '4' => array(
                '0' => '-0.2%',
                '1' => '24.8%',
                '2' => '49.6%',
                '3' => '75.7%',
            ),
            '5' => array(
                '0' => '-0.2%',
                '1' => '19.8%',
                '2' => '39.6%',
                '3' => '59.4%',
                '4' => '80.7%'
            ),
            '6' => array(
                '0' => '-0.2%',
                '1' => '16.6%',
                '2' => '32.32%',
                '3' => '49.0%',
                '4' => '66.0%',
                '5' => '83.0%'
            ),
            '7' => array(
                '0' => '-0.2%',
                '1' => '14.28%',
                '2' => '28.56%',
                '3' => '42.9%',
                '4' => '57.0%',
                '5' => '71.40%',
                '6' => '85.0%'
            ),
            '8' => array(
                '0' => '-0.2%',
                '1' => '12.5%',
                '2' => '25%',
                '3' => '37.5%',
                '4' => '50%',
                '5' => '62.5%',
                '6' => '75%',
                '7' => '87.0%'
            )
        );

        return $arp_width;
    }

    function arp_toggle_class_hide_show(){
        $arp_toggle_class = array(
            '2' => array(
                'hide' => 'two_step_three,two_step_four,two_step_five,two_step_six,two_step_seven,two_step_eight',
                'show' => 'two_step_one,two_step_two'
            ),
            '3' => array(
                'hide' => 'two_step_four,two_step_five,two_step_six,two_step_seven,two_step_eight',
                'show' => 'two_step_one,two_step_two,two_step_three'
            ),
            '4' => array(
                'hide' => 'two_step_five,two_step_six,two_step_seven,two_step_eight',
                'show' => 'two_step_one,two_step_two,two_step_three,two_step_four'
            ),
            '5' => array(
                'hide' => 'two_step_six,two_step_seven,two_step_eight',
                'show' => 'two_step_one,two_step_two,two_step_three,two_step_four,two_step_five'
            ),
            '6' => array(
                'hide' => 'two_step_seven,two_step_eight',
                'show' => 'two_step_one,two_step_two,two_step_three,two_step_four,two_step_five,two_step_six'
            ),
            '7' => array(
                'hide' => 'two_step_eight',
                'show' => 'two_step_one,two_step_two,two_step_three,two_step_four,two_step_five,two_step_six,two_step_seven'
            ),
            '8' => array(
                'hide' => '',
                'show' => 'two_step_one,two_step_two,two_step_three,two_step_four,two_step_five,two_step_six,two_step_seven,two_step_eight'
            )
        );

        return $arp_toggle_class;
    }

    function arp_toggle_step_label_with_db($settings){

        $total_steps = $this->arp_toggle_counter();
        $steps_data = $this->arp_toggle_step_label();
        $return_array = array();
        for($x = 0; $x <= $total_steps; $x++ ){
            $counter = $x + 1;
            $current_data = $steps_data[$counter];
            $data_array = explode('|',$current_data);
            $string = "";
            foreach( $data_array as $i => $darray ){
                if( $i == 1 ){
                    $string .= isset($settings[$data_array[0]]) ? $settings[$data_array[0]] : $darray;
                } else {
                    $string .= $darray;
                }
                $string .= '|';
            }
            $string = rtrim($string,'|');
            $return_array[$counter] = $string;
        }

        return apply_filters('arp_toggle_step_label_with_db_outside',$return_array,$settings);
    }

    function arp_copy_folder($source, $dest, $permissions = 0755){

        if (is_file($source)) {
            $arpfileobj = new ARPFilecontroller( $source, true );

            $arpfileobj->check_cap = true;
            $arpfileobj->capabilities = array( 'activate_plugins' );

            $arpfileobj->check_nonce = false;

            $arpfileobj->arp_process_upload( $dest );
        }

        if (!is_dir($dest)) {
            wp_mkdir_p($dest, $permissions);
        }

        $dir = dir($source);
        while (false !== $entry = $dir->read()) {

            if ($entry == '.' || $entry == '..') {
                continue;
            }

            $this->arp_copy_folder("$source/$entry", "$dest/$entry", $permissions);
        }

        $dir->close();
        return true;
    }

    function arp_add_new_version_release_note() {
        global $wp, $wpdb, $pagenow, $pricingtableajaxurl, $plugin_slug, $wp_version, $arprice_version;

        $popupData = '';
        $arp_slugs = array('arprice', 'arp_import_export', 'arp_global_settings');

        if (isset($_REQUEST['page']) && in_array($_REQUEST['page'], (array) $arp_slugs)) {

            $show_document_video = get_option('arprice_version_updated', 0);

            if ($show_document_video == '0') {
                return;
            }

            $popupData = '<div class="arp_admin_modal_overlay arp_view_whatsnew_modal arp_active">
                <div class="arp_modal_box arp_whatsnew_popup_modal_box">
                        <div class="modal_top_belt"><div class="modal_title">'.esc_html__("What's New in ARPrice", 'ARPrice'). ' '.$arprice_version.'</div></div>
                        <div class="arpwhatsnew_modal_content arp_whatsnew_popup_content_container">

                            <div class="arp_whatsnew_popup_row">
                                <div class="arp_whatsnew_popup_inner_content">
                                    <ul style="list-style-type: disc;">
                                        <li>Added facility to manage row level button\'s options separately.</li>
                                        <li>Added facility to upload button images for toggle button steps.</li>
                                        <li>Added support of Thrive Builder Tabs.</li>
                                        <li>Improved pricing table editor to manage WordPress user session.</li>
                                        <li>Other minor bug fixes.</li>
                                    </ul>
                                </div>';

                    $popupData .= '</div></div>
                        <div class="arp_popup_footer arp_view_whatsnew_modal_footer">
                            <button class="arp_rounded_button arp_btn_dark_blue" style="margin-right:7px;" name="arp_update_whatsnew_button" onclick="arp_hide_update_notice();">'. esc_html__('OK','ARPrice').'</button>
                        </div>
                </div>
            </div>';

            $popupData .= '<script type="text/javascript">';
            $popupData .= 'jQuery(document).ready(function(){ jQuery("html").css("overflow","hidden");  });';
            $popupData .= 'function arp_hide_update_notice(){
                var ishide = 1;
                jQuery.ajax({
                type: "POST",
                url: "'.$pricingtableajaxurl.'",
                data: "action=arp_dont_show_upgrade_notice&is_hide=" + ishide,
                success: function (res) {
                        jQuery(".arp_view_whatsnew_modal.arp_active").parents(".arp_modal_overlay.arp_active").removeClass("arp_active");
                        jQuery(".arp_view_whatsnew_modal.arp_active").removeClass("arp_active");
                        jQuery("html").css("overflow","");
                        return false;

                }
    });
    return false;
}';
            $popupData .= '</script>';
            echo $popupData;
        }
    }

    function arp_dont_show_upgrade_notice() {
        global $wp, $wpdb;
        delete_option('arprice_version_updated');
        die();
    }

    function arp_regenerate_nonces(){


        echo json_encode(
            array(
                '_wpnonce_arprice' => wp_create_nonce( 'arprice_wp_nonce' )
            )
        );
        die;

    }

    function arprice_check_user_cap($arprice_cap = '',$arprice_is_ajax_call = false){
        $errors = array();
        if( true == $arprice_is_ajax_call ){
            if( ! current_user_can($arprice_cap) ){
                $msg = esc_html__('Sorry, you do not have permission to perform this action','ARPrice');

                array_push($errors,$msg);
                array_push($errors,'capability_error');
                return json_encode($errors);
            }
        }

        $wpnonce = isset($_REQUEST['_wpnonce_arprice']) ? $_REQUEST['_wpnonce_arprice'] : '';
        if( '' == $wpnonce ){
            $wpnonce = isset($_POST['_wpnonce_arprice']) ? $_POST['_wpnonce_arprice'] : '';
        }

        $arpice_verify_nonce_flag = wp_verify_nonce($wpnonce,'arprice_wp_nonce');

        if( !$arpice_verify_nonce_flag ){
            $msg = esc_html__('Sorry, your request cannot be processed due to security reason.','ARPrice');
            array_push($errors,$msg);
            array_push($errors,'security_error');
            return json_encode($errors);
        }

        return 'success';
    }

    function arp_allow_style_attr( $styles ) {
        $styles[] = 'display';
        return $styles;
    }

    function arp_check_valid_file($file_content = ''){
        if( '' == $file_content ){
            return true;
        }

        $arp_valid_pattern = '/(\<\?(php))/';

        if( preg_match($arp_valid_pattern,$file_content) ){
            return false;
        }

        return true;
    }

    function arp_min_height_row_arr(){

        $min_row_arr = array(
            'arptemplate_1' => 40,
            'arptemplate_2' => 37,
            'arptemplate_3' => 37,
            'arptemplate_4' => 44,
            'arptemplate_5' => 40,
            'arptemplate_6' => 35,
            'arptemplate_7' => 35,
            'arptemplate_8' => 60,
            'arptemplate_9' => 40,
            'arptemplate_10' => 50,
            'arptemplate_11' => 45,
            'arptemplate_12' => 40,
            'arptemplate_13' => 32,
            'arptemplate_14' => 26,
            'arptemplate_15' => 36,
            'arptemplate_16' => 33,
            'arptemplate_17' => 60,
            'arptemplate_18' => 60,
            'arptemplate_19' => 53,
            'arptemplate_20' => 60,
            'arptemplate_21' => 60,
            'arptemplate_22' => 53,
            'arptemplate_23' => 53,
            'arptemplate_24' => 60,
            'arptemplate_25' => 85,
            'arptemplate_26' => 52,
        );

        return $min_row_arr;
    }

}

function arprice_load_table($id = '') {

    global $arprice_form, $arprice_version;

    $formids = array();

    $formids[] = $id;

    if (isset($formids) and is_array($formids) && count($formids) > 0) {
        foreach ($formids as $newkey => $newval) {
            $newval = str_replace('"', '', $newval);
            $newval = str_replace("'", "", $newval);
            if (stripos($newval, ' ') !== false) {
                $partsnew = explode(" ", $newval);
                $newvalarr[] = $partsnew[0];
            } else {
                $newvalarr[] = $newval;
            }
        }
    }

    if ($newvalarr) {
        $newvalues_enqueue = $arprice_form->get_table_enqueue_data($newvalarr);
    }

    if (is_array($newvalues_enqueue) && count($newvalues_enqueue) > 0) {
        $to_google_map = 0;
        $templates = array();
        $is_template = 0;

        foreach ($newvalues_enqueue as $n => $newqnqueue) {
            if ($newqnqueue['googlemap']) {
                $to_google_map = 1;
            }

            if ($newqnqueue['template_name'] != 0) {
                $templates[] = $newqnqueue['template_name'];
            } else {
                $templates[] = $n;
            }

            if (!empty($newqnqueue['is_template'])) {
                $is_template = $newqnqueue['is_template'];
            }
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
            wp_enqueue_script('arprice_js');

            wp_enqueue_style('arprice_front_css');

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
    return do_shortcode('[ARPrice id=' . $id . ']');
}

global $arprice_class;

$arp_api_url = $arprice_class->arpgetapiurl();
$arp_plugin_slug = basename(dirname(__FILE__));

add_filter('pre_set_site_transient_update_plugins', 'arp_check_for_plugin_update');

function arp_check_for_plugin_update($checked_data) {
    global $arp_api_url, $arp_plugin_slug, $wp_version, $arprice_class, $arprice_version;

    if (empty($checked_data->checked)) {
        return $checked_data;
    }

    $args = array(
        'slug' => $arp_plugin_slug,
        'version' => $arprice_version,
        'other_variables' => $arprice_class->arp_get_remote_post_params(),
    );

    $request_string = array(
        'body' => array(
            'action' => 'basic_check',
            'request' => serialize($args),
            'api-key' => md5(home_url())
        ),
        'user-agent' => 'ARP-WordPress/' . $wp_version . '; ' . home_url()
    );

    $raw_response = wp_remote_post($arp_api_url, $request_string);

    if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200)){
        $response = maybe_unserialize($raw_response['body']);
    }

    if (isset($response) && !empty($response) && isset($response->token) && $response->token != "") {
        update_option('arp_update_token', $response->token);
    }

    if (isset($response) && is_object($response) && is_object($checked_data) && !empty($response)) {
        $checked_data->response[$arp_plugin_slug . '/' . $arp_plugin_slug . '.php'] = $response;
    }

    return $checked_data;
}

add_filter('plugins_api', 'arp_plugin_api_call', 10, 3);

function arp_plugin_api_call($def, $action, $args) {
    global $arp_plugin_slug, $arp_api_url, $wp_version;

    if (!isset($args->slug) || ($args->slug != $arp_plugin_slug)) {
        return false;
    }

    $plugin_info = get_site_transient('update_plugins');
    $current_version = $plugin_info->checked[$arp_plugin_slug . '/' . $arp_plugin_slug . '.php'];
    $args->version = $current_version;

    $request_string = array(
        'body' => array(
            'action' => $action,
            'update_token' => get_site_option('arp_update_token'),
            'request' => serialize($args),
            'api-key' => md5(home_url())
        ),
        'user-agent' => 'ARP-WordPress/' . $wp_version . '; ' . home_url()
    );

    $request = wp_remote_post($arp_api_url, $request_string);

    if (is_wp_error($request)) {
        $error = sprintf( esc_html__('An Unexpected HTTP error occurred during the API request. %s Try again %s','ARPrice'), '</p> <p><a href="?" onclick="document.location.reload(); return false;">', '</a>' );
        $res = new WP_Error('plugins_api_failed',$error);
    } else {
        $res = maybe_unserialize($request['body']);

        if ($res === false)
            $res = new WP_Error('plugins_api_failed', esc_html__('An unknown error occurred', 'ARPrice'), $request['body']);
    }

    return $res;
}

function arp_is_admin_notice_active( $arg )
{
    $array       = explode( '-', $arg );
    $length      = array_pop( $array );
    $option_name = implode( '-', $array );
    $db_record   = get_site_transient( $option_name );

    if($db_record == "")
       return true;

    if ( 'forever' == $db_record ) {
        return false;
    } elseif ( absint( $db_record ) >= time() ) {
      return false;
    } else {
      return true;
    }
}

add_action('admin_notices','arp_license_admin_notices');
add_action( 'wp_ajax_arp_dismiss_admin_notice','arp_dismiss_admin_notice');

function arp_dismiss_admin_notice() {

            $option_name        = sanitize_text_field( $_POST['option_name'] );
            $dismissible_length = sanitize_text_field( $_POST['dismissible_length'] );
            $transient          = 0;
            if ( 'forever' != $dismissible_length ) {
                $dismissible_length = 1;
                $transient          = time() + ($dismissible_length * MONTH_IN_SECONDS);
                $dismissible_length = strtotime( absint( $dismissible_length ) . ' month' );
            }
            $return = set_site_transient( $option_name, $dismissible_length, $transient );
            wp_die();
}

function arp_license_admin_notices(){

		   $current_screen = get_current_screen();
			$is_dashboard_base = $current_screen->base;
			$is_dashboard_id = $current_screen->id;

			$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';

			if(($is_dashboard_base=="dashboard" || $is_dashboard_id=="dashboard"))
			{

		   $class = 'notice notice-error arp-notice-update-warning is-dismissible';

			global $arprice_class;
			$setact = 0;
			global $arp_chk_version;
			$setact = 1;

           
            $get_purchased_info = get_option('arpSortInfo');
            $sortorderval = base64_decode($get_purchased_info);
            $ordering = array();

            $pcodeinfo = "";
            $pcodedate = "";
            $pcodedateexp = "";
            $pcodelastverified = "";
            $pcodecustemail = "";

            if (is_array($ordering)) {
                $ordering = explode("^", $sortorderval);
                if (is_array($ordering)) {

					if (isset($ordering[2]) && $ordering[2] != "") {
						$pcodedateexp = $ordering[2];
					} else {
						$pcodedateexp = "";
					}

					if($pcodedateexp != "")
					{
						$exp_date=strtotime($pcodedateexp);
						$today = strtotime("today");

						if($exp_date < $today)
						{
							if (arp_is_admin_notice_active( 'arpnotice-two-2' ) )
							{

								$admin_css_url = admin_url('admin.php?page=arp_global_settings');
								printf( '<div data-dismissible="arpnotice-two-2" class="%1$s"><p><b>It seems your ARPrice support period is expired. To continue receiving our prompt support you need to renew your support. Please <a href="%2$s">click  here</a> to extend support.</b></p></div>', esc_attr( $class ), esc_html( $admin_css_url ));
							}
						}
					}
                }
            }

			}
        }

function arp_get_country_from_ip($ip_address = ''){
    if( '' == $ip_address ){
        return '';
    }

    $country_reader = new Reader(PRICINGTABLE_CORE_DIR.'/geoip/inc/GeoLite2-Country.mmdb');
    $country_name = "";
    try{
        $record = $country_reader->country($ip_address);
        $country_name = $record->country->name;
    } catch(Exception $e){
        $country_name = "";
    }
    return $country_name;
}

function arp_rmdir($src){
    if (file_exists($src)) {
        $dir = opendir($src);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                $full = $src . '/' . $file;
                if (is_dir($full)) {
                    arp_rmdir($full);
                } else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }
}
?>