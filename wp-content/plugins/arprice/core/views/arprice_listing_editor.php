<?php
global $arp_pricingtable, $arprice_default_settings, $arprice_analytics, $arprice_fonts, $arprice_version, $arprice_font_awesome_icons, $arprice_images_css_version;

$arp_disabled_fonts = (get_option('disable_font_loading_icon')) ? get_option('disable_font_loading_icon') : array();
?>

<div style="display:none;" >
   
</div>

<?php

require_once(PRICINGTABLE_VIEWS_DIR . '/arprice_font_awesome_array.php');
$arprice_font_awesome_icons = arprice_font_awesome_font_array();

$default_fonts = $arprice_fonts->get_default_fonts();
$google_fonts = $arprice_fonts->google_fonts_list();

$font_array = array_chunk($google_fonts, 150);

if (is_ssl()) {
    $googlefontpreviewurl = "https://www.google.com/fonts/specimen/";
} else {
    $googlefontpreviewurl = "http://www.google.com/fonts/specimen/";
}

foreach ($font_array as $key => $font_values) {
    $google_fonts_string = implode('|', $font_values);
    $google_font_url_one = '';
    if (is_ssl()) {
        $google_font_url_one = "https://fonts.googleapis.com/css?family=" . $google_fonts_string;
    } else {
        $google_font_url_one = "http://fonts.googleapis.com/css?family=" . $google_fonts_string;
    }   
    echo '<link rel = "stylesheet" type = "text/css" href = "' . $google_font_url_one . '" />';
}

        global $arprice_class;

        global $arp_chk_version;
        $setact = 1;
        
?>



<style type="text/css">
    #adminmenuwrap{
        z-index: 998;
    }
</style>
<script type="text/javascript">
    var arp_column_background_color_json = <?php echo ARPFilecontroller::arp_get_file_content(PRICINGTABLE_VIEWS_DIR . '/arp_column_background_color_min.json');  ?>;
</script>
<script type="text/javascript">
    function global_template_options()
    {
        var tmpbuttonoptions;
        tmpbuttonoptions = <?php global $arp_tempbuttonsarr; echo json_encode($arp_tempbuttonsarr); ?>;
        return tmpbuttonoptions;
    }

    function global_ribbon_array() {
        var arpribbonarr;
        arpribbonarr = <?php global $arp_mainoptionsarr; echo json_encode($arp_mainoptionsarr['general_options']['template_options']['arp_template_ribbons']); ?>;
        return arpribbonarr;
    }

    function ribbon_basic_colors() {
        var arp_basic_ribbon_colors;
        arp_basic_ribbon_colors = '<?php global $arp_mainoptionsarr; echo json_encode($arp_mainoptionsarr['general_options']['arp_basic_colors']); ?>';
        return arp_basic_ribbon_colors;
    }

    function ribbon_gradient_colors() {
        var arp_gradient_ribbon_colors;
        arp_gradient_ribbon_colors = '<?php global $arp_mainoptionsarr; echo json_encode($arp_mainoptionsarr['general_options']['arp_basic_colors_gradient']); ?>';
        return arp_gradient_ribbon_colors;
    }

    function ribbon_border_colors() {
        var arp_ribbon_border_color;
        arp_ribbon_border_color = '<?php global $arp_mainoptionsarr; echo json_encode($arp_mainoptionsarr['general_options']['arp_ribbon_border_color']);
    ?>';
        return arp_ribbon_border_color;
    }

    function arp_template_css_class_info() {
        var arp_templatecssinfo;
        arp_templatecssinfo = <?php global $arp_templatecssinfoarr; echo json_encode($arp_templatecssinfoarr); ?>;
        return arp_templatecssinfo;
    }

    function arp_template_responsive_array_types() {
        var arp_template_responsive_array;
        arp_template_responsive_array = <?php global $arp_templateresponsivearr; echo json_encode($arp_templateresponsivearr); ?>;
        return arp_template_responsive_array;
    }

    function arp_template_editor_handler() {
        var arp_template_editro_handler_var;
        arp_template_editro_handler_var = <?php global $arp_template_editor_arr; echo json_encode($arp_template_editor_arr); ?>;
        return arp_template_editro_handler_var;
    }

    function global_column_footer_type_templates() {
        var arp_column_footer_templates;
        arp_column_footer_templates = <?php echo json_encode($arprice_default_settings->arp_footer_section_template_types()); ?>;
        return arp_column_footer_templates;
    }

    function global_arp_color_skin_templats() {
        var arp_column_color_skin_templates;
        arp_column_color_skin_templates = <?php echo json_encode($arprice_default_settings->arp_color_skin_template_types()); ?>;
        return arp_column_color_skin_templates;
    }

    function global_column_sections_array() {
        var arp_column_sections_colors_array;
        arp_column_sections_colors_array = <?php global $arp_templatesectionsarr; echo json_encode($arp_templatesectionsarr); ?>;
        return arp_column_sections_colors_array;
    }

    function arp_global_skin_array() {
        var arp_template_custom_skin;
        arp_template_custom_skin = <?php global $arp_templatecustomskinarr; echo json_encode($arp_templatecustomskinarr); ?>;
        return arp_template_custom_skin;
    }

    function arp_global_default_gradient_templates() {
        var arp_template_gradient_templates;
        arp_template_gradient_templates = <?php echo json_encode($arprice_default_settings->arp_default_gradient_templates()); ?>;
        return arp_template_gradient_templates;
    }

    function arp_global_default_gradient_colors() {
        var arp_global_default_gradient_color;
        arp_global_default_gradient_color = <?php echo json_encode($arprice_default_settings->arp_default_gradient_templates_colors()); ?>;
        return arp_global_default_gradient_color;
    }

    function arp_global_default_rgba_colors() {
        var arp_global_rgba_colors;
        arp_global_rgba_colors = <?php echo json_encode($arprice_default_settings->arp_default_rgba_color_array()); ?>;
        return arp_global_rgba_colors;
    }

    function arp_depended_section_color_codes() {
        var arp_global_depended_section_colors;
        arp_global_depended_section_colors = <?php echo json_encode($arprice_default_settings->arp_depended_section_color_codes()); ?>;
        return arp_global_depended_section_colors;
    }

    function arp_custom_skin_selection_section_color() {
        var arp_custom_skin_selection_colors;
        arp_custom_skin_selection_colors = <?php echo json_encode($arprice_default_settings->arp_custom_skin_selection_section_color()); ?>;
        return arp_custom_skin_selection_colors
    }

    function arp_background_image_section_array() {
        var arp_background_image_section_array;
        arp_background_image_section_array = <?php echo json_encode($arprice_default_settings->arp_background_image_section_array()); ?>;
        return arp_background_image_section_array;
    }

    function arprice_default_template_skins() {
        var arprice_default_template_skins_array;
        arprice_default_template_skins_array = <?php echo json_encode($arprice_default_settings->arprice_default_template_skins()); ?>;
        return arprice_default_template_skins_array;
    }

    function arprice_css_pseudo_elements() {
        var arprice_css_pseudo_elements;
        arprice_css_pseudo_elements = <?php echo json_encode($arprice_default_settings->arp_css_pseudo_elements_array()); ?>;
        var string = '';
        jQuery(arprice_css_pseudo_elements).each(function (i) {
            string += arprice_css_pseudo_elements[i] + '|';
        });
        var strlen = string.length;
        var str = '';
        for (var n = 0; n < strlen - 1; n++) {
            str += string[n];
        }
        var regex = new RegExp('(' + str + ')', 'ig');
        return regex;
    }

    function arp_exclude_caption_column_for_color_skin() {
        var arprice_exclude_caption;
        arprice_exclude_caption = '<?php echo json_encode($arprice_default_settings->arp_exclude_caption_column_for_color_skin()) ?>';
        return arprice_exclude_caption;
    }

    function arp_select_previous_skin_for_multicolor_array() {
        var arp_select_previous_skin_for_multicolor;
        arp_select_previous_skin_for_multicolor = '<?php echo json_encode($arprice_default_settings->arp_select_previous_skin_for_multicolor()) ?>';
        return arp_select_previous_skin_for_multicolor;
    }

    function arp_editor_width() {
        var arp_editor_width;
        arp_editor_width = '<?php echo json_encode($arprice_default_settings->arprice_responsive_width_array()); ?>';
        return arp_editor_width;
    }

    function arp_column_background_image_section_array() {
        var arp_column_background_image_section_array;
        arp_column_background_image_section_array = <?php echo json_encode($arprice_default_settings->arp_column_background_image_section_array()); ?>;
        return arp_column_background_image_section_array;
    }

    function arp_template_bg_section_classes_array() {
        var arp_template_bg_section_classes_array;
        arp_template_bg_section_classes_array = <?php echo json_encode($arprice_default_settings->arp_template_bg_section_classes()); ?>;
        return arp_template_bg_section_classes_array;
    }

    function arp_section_text_alignment() {
        var arp_section_text_alignment_array;
        arp_section_text_alignment_array = <?php echo json_encode($arprice_default_settings->arp_section_text_alignment()); ?>;
        return arp_section_text_alignment_array;
    }

    function arp_template_bg_section_inputs_json_array(){
        var arp_template_bg_section_inputs_json_array;
        arp_template_bg_section_inputs_json_array = <?php echo json_encode($arprice_default_settings->arp_template_bg_section_inputs_json()); ?>;
        return arp_template_bg_section_inputs_json_array;
    }

    function arp_template_bg_section_inputs_array() {
        var arp_template_bg_section_inputs_array;
        arp_template_bg_section_inputs_array = <?php echo json_encode($arprice_default_settings->arp_template_bg_section_inputs()); ?>;
        return arp_template_bg_section_inputs_array;
    }

    function arp_hide_section_class_global() {
        var arp_hide_section_class;
        arp_hide_section_class = '<?php echo json_encode($arprice_default_settings->arprice_hide_section_array()); ?>';
        return arp_hide_section_class;
    }

    function arp_column_border_array_global() {
        var arp_column_border_array;
        arp_column_border_array = '<?php echo json_encode($arprice_default_settings->arp_column_border_array()); ?>';
        return arp_column_border_array;
    }

    function arp_row_level_border_global() {
        var arp_row_level_border_array;
        arp_row_level_border_array = '<?php echo json_encode($arprice_default_settings->arp_row_level_border()); ?>';
        return arp_row_level_border_array;
    }

    function arp_row_level_border_remove_from_last_child_global() {
        var arp_row_level_border_remove_from_last_child_array;
        arp_row_level_border_remove_from_last_child_array = '<?php echo json_encode($arprice_default_settings->arp_row_level_border_remove_from_last_child()); ?>';
        return arp_row_level_border_remove_from_last_child_array;
    }

    function arp_custom_css_inner_sections() {
        var arp_custom_css_inner_sections;
        arp_custom_css_inner_sections = '<?php echo json_encode($arprice_default_settings->arp_custom_css_inner_sections()); ?>';
        return arp_custom_css_inner_sections;
    }

    function arp_custom_button_type() {
        var arp_custom_button_type_sections;
        arp_custom_button_type_sections = '<?php echo json_encode($arprice_default_settings->arp_button_type()); ?>';
        return arp_custom_button_type_sections;
    }

    function arp_shortcode_custom_type_array() {
        var arp_shortcode_custom_type_sections;
        arp_shortcode_custom_type_sections = '<?php echo json_encode($arprice_default_settings->arp_shortcode_custom_type()); ?>';
        return arp_shortcode_custom_type_sections;
    }

    function arp_button_size_new_array() {
        var arp_button_size_new_class_array;
        arp_button_size_new_class_array = '<?php echo json_encode($arprice_default_settings->arp_button_size_new()); ?>';
        return arp_button_size_new_class_array;
    }
    
    function arp_column_image_bg_color(){
        var arp_column_image_bg_color;
        arp_column_image_bg_color = <?php echo json_encode($arprice_default_settings->arp_column_bg_image_colors()); ?>;
        return arp_column_image_bg_color;
    }

    __DISABLED_RIBBON = '<?php esc_html_e('This ribbon is not supported in this template.', 'ARPrice') ?>';
    __OK_BUTTON_TEXT = '<?php esc_html_e('Ok', 'ARPrice'); ?>';
    __CANCEL_BUTTON_TXT = '<?php esc_html_e('Cancel', 'ARPrice') ?>';
    __DELETE_COLUMN_TXT = '<?php esc_html_e('Are you sure want to delete this column?', 'ARPrice'); ?>';
    __HIDE_FOOTER_TXT = '<?php esc_html_e('Footer section is hidden.', 'ARPrice'); ?>';
    __HIDE_HEADER_TXT = '<?php esc_html_e('Header section is hidden.', 'ARPrice'); ?>';
    __HIDE_PRICE_TXT = '<?php esc_html_e('Price section is hidden.', 'ARPrice'); ?>';
    __HIDE_FEATURE_TXT = '<?php esc_html_e('Body section is hidden.', 'ARPrice'); ?>';
    __HIDE_DISCRIPTION_TXT = '<?php esc_html_e('Description section is hidden.', 'ARPrice'); ?>';
    __HIDE_HEADER_SHORTCODE_TXT = '<?php esc_html_e('Header shortcode section is hidden.', 'ARPrice'); ?>';
    __HIDE_COLUMN_TXT = '<?php esc_html_e('Column is hidden.', 'ARPrice'); ?>';
    __DESCRIPTION_TEXT = '<?php echo esc_html__('Description','ARPrice'); ?>';
    __ADD_MEDIA_TEXT = '<?php echo esc_html__('Add Media','ARPrice'); ?>';
    __ADD_FONT_ICON = '<?php echo esc_html__('Add Font Icon','ARPrice'); ?>';
    __IMAGE_URL_TEXT = '<?php echo esc_html__('Image URL', 'ARPrice'); ?>';
    __IMAGE_DIMENSION = '<?php echo esc_html__('Dimension ( height X width )', 'ARPrice'); ?>';
    __ADD_FILE = '<?php echo esc_html__('Add File', 'ARPrice'); ?>';
    __ADD_TEXT = '<?php echo esc_html__('Add', 'ARPrice'); ?>';
    __REMOVE_TEXT = '<?php echo esc_html__('Remove', 'ARPrice'); ?>';
    __CSS_PROPERTY_TEXT = '<?php echo esc_html__('CSS Property', 'ARPrice'); ?>';
    __NORMAL_STATE_TEXT = '<?php echo esc_html__('Normat State', 'ARPrice'); ?>';
    __HOVER_STATE_TEXT = '<?php echo esc_html__('Hover State', 'ARPrice'); ?>';
    __FOR_EXAMPLE_TEXT = '<?php echo esc_html__('For Example', 'ARPrice'); ?>';
    __TOOLTIP_TEXT = '<?php echo esc_html__('Tooltip','ARPrice'); ?>';
    __LABEL_TEXT = '<?php echo esc_html__('Label','ARPrice'); ?>';
    __OK_TEXT = '<?php echo esc_html__('Ok','ARPrice'); ?>';
    __ARP_HTML_TEXT = '<?php echo esc_html__('HTML/Text','ARPrice'); ?>';
    __ARP_BUTTON_TEXT = '<?php echo esc_html__('Button','ARPrice'); ?>';
    __SETACT = '<?php echo $setact; ?>';
</script>
<?php
global $wpdb, $arprice_form, $arprice_fonts;
$arpaction = isset($_GET['arp_action']) ? $_GET['arp_action'] : 'blank';
$arpreference = isset($_GET['ref']) ? $_GET['ref'] : '';
$id = isset($_GET['eid']) ? $_GET['eid'] : '';

if(isset($id) && $id !='') {
    $sql = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d", $id));    
}
if (isset($arpaction) and $arpaction == 'edit' and isset($id) && $id) {
    if (!$sql) {
        echo '<script type="text/javascript">window.location.href = "' . admin_url('admin.php?page=arprice') . '";</script>';
        exit;
    }
}
$has_caption = 0;
$table_cols = -1;
$arp_template_type = '';
$arp_is_rtl = is_rtl();

if (isset($arpaction) and $arpaction == 'edit' and isset($table_id) && $table_id) {
    $arpaction = 'edit';
    $id = $table_id;
} else if (isset($arpaction) and $arpaction == 'new') {
    $arpaction = 'new';
}
if ($arpaction == 'edit') {
    ?>
    <style>
        .empty {
            height:80px;
        }
    </style>
<?php } ?>
<?php if ($setact != 1) { ?>
    <style>
        .repute_pricing_table_content{
            margin-top:75px;
        }
    </style>
<?php } else { ?>
    <style>
        .repute_pricing_table_content{
            margin-top:60px;
        }
    </style>

<?php } ?>

<div class="main_box" >
  
    <form name="price_table" id="price_table_form" method="post" onsubmit="return check_package_validation();">
        <input type="hidden" id="is_display_analytics" value="<?php echo $setact; ?>" name="is_display_analytics" />
        <input type="hidden" name="ajaxurl" id="ajaxurl" value="<?php echo admin_url('admin-ajax.php'); ?>"  />
        <input type="hidden" name="url" id="listing_url" value="admin.php?page=arprice" />
        <input type="hidden" name="template_type_old" id="template_type_old" value="<?php echo $id; ?>" />
        <input type="hidden" value="<?php echo $id; ?>" id="template_type_new" name="template_type_new">
        <input type="hidden" name="pricing_table_img_url" id="pricing_table_img_url" value="<?php echo PRICINGTABLE_IMAGES_URL; ?>" />
        <input type="hidden" name="pricing_table_main_dir" id="pricing_table_main_dir" value="<?php echo PRICINGTABLE_DIR; ?>"  />
        <input type="hidden" name="pricing_table_main_url" id="pricing_table_main_url" value="<?php echo PRICINGTABLE_URL; ?>" />
        <input type="hidden" name="pricing_table_upload_dir" id="pricing_table_upload_dir" value="<?php echo PRICINGTABLE_UPLOAD_DIR; ?>" />
        <input type="hidden" name="pricing_table_upload_url" id="pricing_table_upload_url" value="<?php echo PRICINGTABLE_UPLOAD_URL; ?>" />
        <input type="hidden" name="pricing_table_bg_img_upload_url" id="pricing_table_bg_img_upload_url" value="<?php echo PRICINGTABLE_BG_IMG_UPLOAD_URL; ?>" />
        <input type="hidden" name="pricing_table_admin" id="pricing_table_admin" value="<?php echo is_admin(); ?>" />
        <input type="hidden" name="arp_wp_version" id="arp_wp_version" value="<?php echo $GLOBALS['wp_version']; ?>" />
        <input type="hidden" name="arp_responsive_mobile_width" id="arp_responsive_mobile_width" value="<?php echo get_option('arp_mobile_responsive_size'); ?>" />
        <input type="hidden" name="arp_responsive_tablet_width" id="arp_responsive_tablet_width" value="<?php echo get_option('arp_tablet_responsive_size'); ?>" />
        <input type="hidden" name="arp_responsive_desktop_width" id="arp_responsive_desktop_width" value="<?php echo get_option('arp_desktop_responsive_size'); ?>" />
        
        <input type="hidden" name="arp_version" id="arp_version" value="<?php global $arprice_version; echo $arprice_version;?>" />
        <input type="hidden" name="arp_request_version" id="arp_request_version" value="<?php echo get_bloginfo('version'); ?>" />
        
        <?php $arprice_nonce_field = wp_create_nonce('arprice_wp_nonce'); ?>
        <input type="hidden" name="_wpnonce_arprice" value="<?php echo $arprice_nonce_field; ?>" />
        
        <?php
        
        if ($arpaction == 'edit' || $arpaction == 'new') {
            global $wpdb, $arp_mainoptionsarr;

            if( !$sql ){
                echo "<script type='text/javascript'>window.location.href='" . admin_url('admin.php?page=arprice') . "'</script>";
                die;
            }
            $table_name = $sql[0]->table_name;
            $is_template = $sql[0]->is_template;
            $status = $sql[0]->status;
            $template_name = $sql[0]->template_name;
            if (( $is_template == 1 && $arpreference == '' && $id != $arpreference && $arpaction == 'edit') || $status == 'draft') {
                echo "<script type='text/javascript'>window.location.href='" . admin_url('admin.php?page=arprice') . "'</script>";
            }
            $table_gen_opt = maybe_unserialize($sql[0]->general_options);
            
            $template_background_img=isset($table_gen_opt['column_animation']['template_bg_img']) ? $table_gen_opt['column_animation']['template_bg_img'] : '';

            $arp_template = $table_gen_opt['template_setting']['template'];
            $arp_template_skin = $table_gen_opt['template_setting']['skin'];
            $arp_template_type = $table_gen_opt['template_setting']['template_type'];

            $sqls = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $id));
            if( !isset($GLOBALS['arp_opt_data']) || !isset($GLOBALS['arp_opt_data'][$id]) ){
                $GLOBALS['arp_opt_data'][$id] = $sqls[0];
            }
            $table_opt = $sqls[0]->table_options;
            $uns_table_opt = maybe_unserialize($table_opt);
            $total_packages = count($uns_table_opt['columns']);
            $caption_column = isset( $uns_table_opt['columns']['column_0']) ? $uns_table_opt['columns']['column_0']['is_caption'] : 0;
            $reference_template = $table_gen_opt['general_settings']['reference_template'];
            $template_feature = $arp_mainoptionsarr['general_options']['template_options']['features'][$reference_template];

            if (is_array($template_feature) && in_array('column_description', $template_feature)) {
                $has_column_desc = 1;
                $col_desc_pos = array_search('column_description', $template_feature);
            } else {
                $has_column_desc = 0;
            }
            $is_toggle_enabled = isset($table_gen_opt['general_settings']['enable_toggle_price']) ? $table_gen_opt['general_settings']['enable_toggle_price'] : 0;
            ?>
            <input type="hidden" name="arp_template_bg_img" id="arp_template_bg_img" value="<?php echo $template_background_img; ?>">
            <input type="hidden" name="is_template" id="is_template" value="<?php echo $is_template; ?>"/>
            <input type="hidden" name="pt_action" id="pt_action" value="<?php echo $arpaction; ?>" />
            <input type="hidden" name="added_package" id="total_packages" value="<?php echo $total_packages; ?>" />
            <input type="hidden" name="table_id" id="table_id" value="<?php echo $id; ?>" />
            <input type="hidden" name="arp_template_type" id="arp_template_type" value="<?php echo $arp_template_type; ?>" />
            <input type="hidden" name="has_caption_column" id="has_caption_column" value="<?php echo $caption_column; ?>"  />
            <input type="hidden" name="template_feature" id="arp_template_feature" value='<?php echo stripslashes(json_encode($template_feature)); ?>' />
            <?php $column_order = str_replace('"', '\'', $table_gen_opt['general_settings']['column_order']); ?>
            <input type="hidden" name="pricing_table_column_order" id="pricing_table_column_order" value="<?php echo $column_order; ?>" />
            <input type="hidden" name="arp_reference_template" id="arp_reference_template" value="<?php echo $reference_template; ?>" />
            <?php $user_edited_columns = ( $table_gen_opt['general_settings']['user_edited_columns'] == '' ) ? '' : stripslashes(json_encode($table_gen_opt['general_settings']['user_edited_columns'])); ?>
            <input type="hidden" name="arp_user_edited_columns" id="arp_user_edited_columns" value='<?php echo $user_edited_columns; ?>' />
            <input type="hidden" name="arp_is_toggle_enabled" id="arp_is_toggle_enabled" value='<?php echo $is_toggle_enabled; ?>' />
            <?php


        } else {
            global $wpdb, $arp_mainoptionsarr;
            $template_feature = $arp_mainoptionsarr['general_options']['template_options']['features']['arptemplate_1'];
            ?>
            <input type="hidden" name="is_template" id="is_template" value="0" />
            <input type="hidden" name="pt_action" id="pt_action" value="new" />
            <input type="hidden" name="added_package" id="total_packages" value="<?php echo ($table_cols + $has_caption); ?>" />
            <input type="hidden" name="pt_coloumn_order" id="pt_coloumn_order" value="" />
            <input type="hidden" name="table_id" id="table_id" value="" />
            <input type="hidden" name="arp_template_type" id="arp_template_type" value="<?php echo $arp_template_type; ?>" />
            <input type="hidden" name="has_caption_column" id="has_caption_column" value="<?php echo $has_caption; ?>"  />
            <input type="hidden" name="template_feature" id="arp_template_feature" value='<?php echo stripslashes(json_encode($template_feature)); ?>' />
            <input type="hidden" name="pricing_table_column_order" id="pricing_table_column_order" value="" />
            <input type="hidden" name="arp_reference_template" id="arp_reference_template" value="" />
            <input type="hidden" name="arp_user_edited_columns" id="arp_user_edited_columns" value="" />
            <?php
        }
        global $arp_mainoptionsarr, $arprice_form, $wp_version;
        $pricingtable_menu_belt_style = '';
        if ($arpaction == 'edit') {
            $pricingtable_menu_belt_style = 'display:block;';
        }
        ?>
        <div class="pricingtablename">
            <div class="empty" style="height:80px;">    </div>

            <div class="success_message" id="success_message"> 
                <div class="message_descripiton"><?php esc_html_e('Pricing table saved successfully.', 'ARPrice'); ?></div>     
            </div>

            <div class="editor_error_message" id="editor_error_message">
                <div class="message_descripiton"></div>
            </div>

            <?php
            if ($setact != 1) {
                $admin_css_url = admin_url('admin.php?page=arp_global_settings');
                ?>
                <div style="margin-top:65px;border-left: 4px solid #ffba00;box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1); -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-moz-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-o-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);margin-left:-5px;height:20px;position:absolute;width:99%;padding:10px 25px 10px 0px;background-color:#FFFFFF;text-align:right;color:#000000;font-size:17px;display:block;visibility:visible;" >ARPrice license is not activated. Please activate license from <a href="<?php echo $admin_css_url; ?>">here</a></div>
            <?php } ?>

            <div class="repute_pricing_table_content">
                <div class="arprice_editor" id="arprice_editor">
                    <div class="main_package_part">

                        <div id="main_package_div">

                            <div class="main_package" id="main_package">
                                <div class="ex" style="">
                                    <ul id="packages">
                                        <?php
                                        require_once PRICINGTABLE_DIR . '/core/classes/class.arprice_preview_editor.php';
                                        global $arprice_form, $wpdb;
                                        $table_options = isset($table_opt) ? $table_opt : '';
                                        if ($arpaction == 'edit') {
                                            echo arp_get_pricing_table_string_editor($id, $table_name, 2, '', '', '', $table_options);
                                        } else if ($arpaction == 'new') {
                                            echo arp_get_pricing_table_string_editor($id, $table_name, 2, '', '', 1, $table_options);
                                        }
                                        ?>
                                    </ul>
                                    <div style="height:auto;width:10px;float:left;"></div>
                                    <div id="addnewpackage_loader"> </div>
                                    <div class="add_new_package enabled" align="center" id="addnewpackage">
                                        <label class="add_new_package_label"><?php esc_html_e('Add Column', 'ARPrice'); ?></label>
                                        <div class="add_new_package_icon">
                                            <span class="fa-stack fa-5x">
                                                <i class="far fa-circle fa-stack-2x"></i>
                                                <i class="fas fa-plus fa-stack-1x"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="empty"> </div>
            <div id="arp_invalid_html_content_message" style="display: none !important;">
                <div class="arp_invalid_html_wrapper">
                    <div class="arp_invalid_html_msg"><?php esc_html_e("Your HTML content is broken, do you want to fix it?",'ARPrice'); ?></div>
                    <div class="arp_invalid_html_actions">
                        <button type="button" id="arp_fix_ok" class="col_opt_btn arp_fix_ok"><i class="fas fa-check"></i></button>
                        <button type="button" id="arp_fix_cancel" class="col_opt_btn arp_fix_cancel"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
            <?php
            $arp_template = isset($arp_template) ? $arp_template : '';
            $arp_template_skin = isset($arp_template_skin) ? $arp_template_skin : '';
            ?>
            <input type="hidden" name="arp_template" id="arp_template_id_new" value="<?php echo ($id) ? 'arptemplate_' . $id : ''; ?>" />
            <input type="hidden" name="arp_template_old" id="arp_template_old" value="<?php echo $arp_template; ?>" />
            <input type="hidden" name="arp_template_skin" id="arp_template_skin" value="<?php echo $arp_template_skin; ?>" />
            <input type="hidden" name="arp_is_generate_html_canvas" id="arp_is_generate_html_canvas" value="no" />
        </div>
    </form>
    <div style="clear:both;"></div>
    <div class="arp_loader" id="arp_loader_div">
        <div class="arp_loader_img"></div>
    </div>
</div>

<form  name="arp_export" method="post" action="" id="arp_editor_export">
    <input type="hidden" name="export_tables" id="export_tables" value="export_tables">
    <input type="hidden" name="arp_table_to_export[]" id="arp_table_to_export" value="<?php echo $id; ?>">
</form>

<div style="clear:both;"></div>
<div class="arp_admin_modal_overlay" style="background: none; z-index: 999999999;">
    <div id="arp_fileupload_iframe" class="arp_modal_box" style="height:430px; width:720px;">
        <div class="modal_top_belt">
            <span class="modal_title"><?php esc_html_e('Choose File', 'ARPrice'); ?></span>
            <span class="arp_modal_close_btn b-close"></span>
        </div>
        <div id="arp_iframeContent">
        </div>
    </div>
</div>


<script type="text/javascript" language="javascript">
    __ARP_GROUP_IMG = '<?php esc_html_e('Image', 'ARPrice'); ?>';
    __ARP_GROUP_VIDEO = '<?php esc_html_e('Video', 'ARPrice'); ?>';
    __ARP_GROUP_AUDIO = '<?php esc_html_e('Audio', 'ARPrice'); ?>';
    __ARP_GROUP_OTHER = '<?php esc_html_e('Other', 'ARPrice'); ?>';

</script>

<div class="arp_modal_box" id="arp_fontawesome_modal" style="display: none;">

    <div class="modal_top_belt">
        <span class="modal_title"><?php esc_html_e('Choose Icon', 'ARPrice'); ?></span>
        <span class="arp_modal_close_btn b-close"></span>
    </div>
    <form name="select_font_awesome_form" id="select_font_awesome_form" method="post" enctype="multipart/form-data" onSubmit="return false;">
        <input type="hidden" name="fa_to_insertcol" id="fa_to_insertcol" value="" />
        <input type="hidden" name="fa_to_insertrow" id="fa_to_insertrow" value="" />
        <input type="hidden" name="fa_to_inserttooltip" id="fa_to_inserttooltip" value="" />
        <input type="hidden" name="fa_to_insertlabel" id="fa_to_insertlabel" value="" />
        <input type="hidden" name="fontselected_1" id="fontselected_1" value="" />
        <input type="hidden" name="fontselected_2" id="fontselected_2" value="" />
        <input type="hidden" name="add_to_sec_btn" id="add_to_sec_btn" value="" />
        <input type="hidden" name="arp_fa_text" id="arp_fa_text" value="" />
        <div id="arp_fontawesome_content" class="arp_fontawesome_content">
        </div>
    </form>    

</div>
<!-- Font Awesome -->

<!-- Pricing Table Preview -->
<div class="arp_admin_modal_overlay">
    <div class="arp_model_box" id="arp_pricing_table_preview" style="background:white;">
        <div class="arp_model_preview_belt">
            <div class="device_icon active" id="computer_icon"></div>
            <div class="device_icon" id="tablet_icon"></div>
            <div class="device_icon" id="mobile_icon"></div>
            <div class="preview_close" id="prev_close_icon">
                <span class="arp_modal_close_btn b-close"></span>
            </div>
        </div>
        <div class="preview_model" style="float:left;width:100%;height:90%;">
        </div>
    </div>
</div>

<!-- Pricing Table Preview -->


<!-- Ribbon Modal -->
<?php global $arp_mainoptionsarr; ?>
<div class="arp_admin_modal_overlay">
    <div class="arp_model_box arp_offset_container" id="arp_ribbon_modal_window">
        <div class="modal_top_belt">
            <span class="modal_title"><?php esc_html_e('Select Ribbon', 'ARPrice'); ?></span>
            <span class="arp_modal_close_btn b-close"></span>
        </div>

        <form name="arp_ribbon_settings" onsubmit="return add_column_ribbon();" id="arp_ribbon_settings">
            <input type="hidden" value="" id="arp_ribbon_to_insert_column" />
            <input type="hidden" value="" id="arp_ribbon_bg_color" />
            <input type="hidden" value="" id="arp_ribbon_textcolor" />
            
            <div class="arp_ribbon_modal_content" style="height:525px;">
            <?php
                $arp_ribbon_style = ($arp_is_rtl) ? "padding:5px 38px 5px 5px;" : "padding:5px 5px 5px 38px;";
                $arp_ribbon_drop_style = ($arp_is_rtl) ? "float:right;" : "float:left;";
            ?>
                <div class="arp_ribbon_text_title single" style="<?php echo $arp_ribbon_style; ?> height:auto;">
                    <div class="arp_select_ribbon_dropdown_menu" id="arp_select_ribbon_dropdown_menu">
                        <span class="arp_ribbon_text_title single"><?php esc_html_e('Ribbon Style', 'ARPrice'); ?></span>
                        <input type="hidden" id="arp_ribbon_style" />
                        <dl id="arp_ribbon_style" class="arp_selectbox" data-id="arp_ribbon_style" data-name="arp_ribbon_style" style="width:75% !important;margin-top:15px; <?php echo $arp_ribbon_drop_style; ?>">
                            <dt>
                            <span><?php esc_html_e('Select Ribbon', 'ARPrice'); ?></span>
                            <input type="text" value="<?php echo 'Select Ribbon'; ?>" style="display:none;" class="arp_autocomplete" />
                            <i class='fas fa-caret-down fa-lg'></i>
                            </dt>
                            <dd>
                                <ul class="arp_ribbon_style" data-id="arp_ribbon_style">
                                    <ol class="arp_selectbox_group_label"><?php esc_html_e('Preset Ribbons', 'ARPrice'); ?></ol>
                                    <?php
                                    foreach ($arp_mainoptionsarr['general_options']['template_options']['arp_ribbons'] as $value => $label) {
                                        if ($value == 'arp_ribbon_6') {
                                            ?>
                                            <ol class="arp_selectbox_group_label"><?php esc_html_e('Custom Ribbon', 'ARPrice'); ?></ol>
                                            <li class="arp_selectbox_option arp_ribbon_icons" id="arp_ribbon_icons" data-ribbon="<?php echo $value; ?>" data-label="<?php echo $label; ?>" data-value="<?php echo $value; ?>"><?php echo $label; ?></li>
                                            <?php
                                        } else {
                                            ?>
                                            <li class="arp_selectbox_option arp_ribbon_icons" id="arp_ribbon_icons" data-ribbon="<?php echo $value; ?>" data-label="<?php echo $label; ?>" data-value="<?php echo $value; ?>"><?php echo $label; ?></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </dd>
                        </dl>

                        <span class="arp_ribbon_text_title single"><?php esc_html_e('Ribbon Position', 'ARPrice'); ?></span>
                        <dl style="width:75% !important; <?php echo $arp_ribbon_drop_style; ?>" data-id="arp_ribbon_position" data-name="arp_ribbon_position" id="select_arp_ribbon_position" class="arp_selectbox">
                            <dt><span style="float: left; max-width: 100px;"><?php esc_html_e('Right', 'ARPrice'); ?></span><input type="text" value="Right" class="arp_autocomplete" style="display: none;" id='arp_ribbon_position'><i class="fas fa-caret-down fa-lg"></i></dt>
                            <dd>
                                <ul style="margin-top: 18px; display: none;" data-id="arp_ribbon_position">
                                    <li data-label="<?php esc_html_e('Right', 'ARPrice'); ?>" data-value="right"><?php esc_html_e('Right', 'ARPrice'); ?></li>
                                    <li data-label="<?php esc_html_e('Left', 'ARPrice'); ?>" data-value="left"><?php esc_html_e('Left', 'ARPrice'); ?></li>
                                </ul>
                            </dd>
                        </dl>
                    </div>

                    <div class="arp_selected_ribbon_preview" id="arp_selected_ribbon_preview">
                        <style id="preview_arp_ribbon_1">
                            .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_1:before,
                            .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_1:after{
                                border-top-color:#0c0b0b;
                            }

                            .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_1{
                                background:#0c0b0b;
                                background-color:#0c0b0b;
                                background-image:-moz-linear-gradient(0deg,#0c0b0b,#514e4e,#0c0b0b);
                                background-image:-webkit-gradient(linear, 0 0, 0 0, color-stop(0%,#0c0b0b), color-stop(50%,#514e4e), color-stop(100%,#0c0b0b));
                                background-image:-webkit-linear-gradient(left,#0c0b0b 0%, #514e4e 51%, #0c0b0b 100%);
                                background-image:-o-linear-gradient(left,#0c0b0b 0%, #514e4e 51%, #0c0b0b 100%);
                                background-image:linear-gradient(90deg,#0c0b0b,#514e4e, #0c0b0b);
                                background-image:-ms-linear-gradient(left,#0c0b0b,#514e4e, #0c0b0b);
                                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#514e4e', endColorstr='#0c0b0b', GradientType=1);
                                -ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="#514e4e", endColorstr="#0c0b0b", GradientType=1)";
                                background-repeat:repeat-x;
                                border-top:1px solid #1a1818;
                                box-shadow:13px 1px 2px rgba(0,0,0,0.6);
                                -webkit-box-shadow:13px 1px 2px rgba(0,0,0,0.6);
                                -moz-box-shadow:13px 1px 2px rgba(0,0,0,0.6);
                                -o-box-shadow:13px 1px 2px rgba(0,0,0,0.6);
                                color:#ffffff;
                                text-shadow:0 0 1px rgba(0,0,0,0.4);
                            }
                        </style>
                        <style id="preview_arp_ribbon_2">
                            .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_2{
                                background:#514e4e;
                                background-color:#514e4e;
                                background-image:-moz-linear-gradient(top, #514e4e, #0c0b0b);
                                background-image:-webkit-gradient(linear, 0 0, 0 100%, from(#514e4e), to(#0c0b0b));
                                background-image:-webkit-linear-gradient(top, #514e4e, #0c0b0b);
                                background-image:-o-linear-gradient(top, #514e4e, #0c0b0b);
                                background-image:linear-gradient(to bottom, #514e4e, #0c0b0b);
                                background-repeat:repeat-x;
                                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#514e4e', endColorstr='#0c0b0b', GradientType=0);
                                -ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="#514e4e", endColorstr="#0c0b0b", GradientType=0)";
                                box-shadow:0 -1px 1px rgba(0,0,0,0.4);
                                -webkit-box-shadow:0 -1px 1px rgba(0,0,0,0.4);
                                -moz-box-shadow:0 -1px 1px rgba(0,0,0,0.4);
                                -o-box-shadow:0 -1px 1px rgba(0,0,0,0.4);
                                color:#ffffff;
                            }
                        </style>
                        <style id="preview_arp_ribbon_3">
                            .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_3:before, .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_3:after{
                                border-top-color:#514e4e !important;
                            }
                            .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_3{
                                border-top:75px solid #514e4e;
                                color:#ffffff;
                            }
                        </style>
                        <style id="preview_arp_ribbon_4">
                            .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_4{
                                background:#514e4e;
                                background-color:#514e4e;
                                background-image:-moz-linear-gradient(top, #514e4e, #0c0b0b);
                                background-image:-webkit-gradient(linear, 0 0, 0 100%, from(#514e4e), to(#0c0b0b));
                                background-image:-webkit-linear-gradient(top, #514e4e, #0c0b0b);
                                background-image:-o-linear-gradient(top, #514e4e, #0c0b0b);
                                background-image:linear-gradient(to bottom, #514e4e, #0c0b0b);
                                background-repeat:repeat-x;
                                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#514e4e', endColorstr='#0c0b0b', GradientType=0);
                                -ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="#514e4e", endColorstr="#0c0b0b", GradientType=0)";
                                box-shadow:0 0 3px rgba(0,0,0,0.3);
                                -webkit-box-shadow:0 0 3px rgba(0,0,0,0.3);
                                -moz-box-shadow:0 0 3px rgba(0,0,0,0.3);
                                -o-box-shadow:0 0 3px rgba(0,0,0,0.3);
                                color:#ffffff;
                            }
                        </style>
                        <style id="preview_arp_ribbon_5">
                            .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_5{
                                background:#514e4e;
                                background-color:#514e4e;
                                background-image:-moz-linear-gradient(top, #514e4e, #0c0b0b);
                                background-image:-webkit-gradient(linear, 0 0, 0 100%, from(#514e4e), to(#0c0b0b));
                                background-image:-webkit-linear-gradient(top, #514e4e, #0c0b0b);
                                background-image:-o-linear-gradient(top, #514e4e, #0c0b0b);
                                background-image:linear-gradient(to bottom, #514e4e, #0c0b0b);
                                background-repeat:repeat-x;
                                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#514e4e', endColorstr='#0c0b0b', GradientType=0);
                                -ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="#514e4e", endColorstr="#0c0b0b", GradientType=0)";
                                box-shadow:-2px 2px 1px rgba(0, 0, 0, 0.3);
                                -webkit-box-shadow:-2px 2px 1px rgba(0, 0, 0, 0.3);
                                -moz-box-shadow:-2px 2px 1px rgba(0, 0, 0, 0.3);
                                -o-box-shadow:-2px 2px 1px rgba(0, 0, 0, 0.3);
                                color:#ffffff;
                            }
                        </style>
                        <div id="arp_ribbon_style_preview" class="arp_ribbon_style_preview_container">
                            <div class="arp_ribbon_container arp_ribbon_right arp_ribbon_1">
                                <div class="arp_ribbon_content arp_ribbon_right arp_ribbon_1">
                                    <span>20% off</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php

                $total_tabs = $arp_pricingtable->arp_toggle_step_name();

                $g = 0;

                $ribbon_string = "";
                foreach( $total_tabs as $key => $tab_name){
                    $display = "";
                    $data = "";
                    $div_id = "arp_ribbon_text";
                    if( $g > 0 ){
                        $display = "display:none;";
                        $data = $tab_name[2];
                        $div_id = "arp_ribbon_text_{$data}";
                    }

                    $ribbon_string .= "<div class='arp_ribbon_text_content three arp_ribbon_text_container' id='{$div_id}' style='margin-top:10px;{$display}'>";
                    $style = "style='line-height:normal;'";
                    if($g==1){
                        $style = "style='line-height:normal; width:140px;'";
                    }
                        $ribbon_string .= "<div class='arp_ribbon_text_title single' ".$style.">";
                            $ribbon_string .= esc_html__('Ribbon Text','ARPrice').'<br/>('.ucfirst($tab_name[2]).' '.esc_html__('Toggle tab','ARPrice').')';
                        $ribbon_string .= "</div>";
                        $ribbon_string .= "<div class='arp_ribbon_text_input single'>";
                        if( $g== 0){
                            $ribbon_text_id = 'arp_ribbon_content';
                            $value = '';
                        } else {
                            $ribbon_text_id = 'arp_ribbon_content_'.$tab_name[2];
                            $value = '';
                        }
                        $ribbon_string .= "<input type='text' id='{$ribbon_text_id}' data-column-step='".$tab_name[2]."' value='{$value}' class='arp_modal_txtbox ribbon_content_txt' />";
                        
                        $ribbon_string .= "</div>";
                    $ribbon_string .= "</div>";
                    $g++;
                }

                echo $ribbon_string;

                ?>

                <div class="arp_ribbon_text_content single" id="arp_ribbon_background_color_title" style="margin-top:20px;">
                    <span style="font-family:Open Sans Bold;font-size:14px;"><?php esc_html_e('Set Colors', 'ARPrice'); ?></span>
                </div>

                <div class="arp_ribbon_text_content multiple" id="arp_ribbon_background_color" style="width:25%;<?php echo ($arp_is_rtl) ? "padding-left:0px;" : "padding-right:0px;"; ?>">
                    <div class="arp_ribbon_text_input multiple" style="width:95%;">
                        <div class="arp_ribbon_bgcolor_wrapper" id="arp_ribbon_bgcolor_wrapper">
                            <input type="text" id="arp_ribbon_bgcolor" name="arp_ribbon_bgcolor" value="#514e4e" />
                            <div class="arp_ribbon_bgcolor_picker"><i class="fas fa-eye-dropper fa-lg"></i></div>
                        </div>
                    </div>
                    <div class="arp_ribbon_text_title single" style="font-family:Ubuntu;line-height:normal;width:90%;text-align:center;"><?php esc_html_e('Background', 'ARPrice'); ?></div>
                </div>

                <div class="arp_ribbon_text_content multiple" id="arp_ribbon_text_color" style="width:22%;<?php echo ($arp_is_rtl) ? "padding-right:10px;padding-left:6px;" : "padding-left:10px;padding-right:6px;"; ?>">
                    <div class="arp_ribbon_text_input multiple" style="width:95%;">
                        <div class="arp_ribbon_txtcolor_wrapper" id="arp_ribbon_txtcolor_wrapper">
                            <input type="text" id="arp_ribbon_txtcolor" name="arp_ribbon_textcolor" value="#ffffff" />
                            <div class="arp_ribbon_textcolor_picker"><i class="fas fa-eye-dropper fa-lg"></i></div>
                        </div>
                    </div>
                    <div class="arp_ribbon_text_title single" style="font-family:Ubuntu;line-height:normal;width:90%;text-align:center;"><?php esc_html_e('Text Color', 'ARPrice'); ?></div>
                </div>

                <?php
                    $g = 0;

                    $custom_ribbon_string = "";
                    foreach( $total_tabs as $key => $tab_name){
                        
                        if( $g == 0 ){
                            $custom_ribbon_id = "arp_ribbon_custom_image";
                            $custom_ribbon_input_id  = "arp_ribbon_content_custom";
                        } else {
                            $custom_ribbon_id = "arp_ribbon_custom_image_".$tab_name[2];
                            $custom_ribbon_input_id  = "arp_ribbon_content_custom_".$tab_name[2];
                        }

                        $custom_ribbon_string .= "<div class='arp_ribbon_text_content single' id='".$custom_ribbon_id."' style='display:None;margin-top20px;'>";
                            $custom_ribbon_string .= "<div class='arp_ribbon_text_title single'>".esc_html__('Custom Ribbon','ARPrice')."(".esc_html__(ucfirst($tab_name[2])." Toggle Tab",'ARPrice').")</div>";
                            $custom_ribbon_string .= "<div class='arp_ribbon_text_input multiple' style='position:relative; top: 0px; margin-top:0px;'>";
                                $custom_ribbon_string .= "<div class='arp_ribbon_txtcolor_wrapper'>";
                                    $custom_ribbon_string .= "<input type='text' id='".$custom_ribbon_input_id."' value='' class='arp_modal_txtbox custom_ribbon_img' style='width:50% !important;' />";
                                    $custom_ribbon_string .= "<button data-column='' class='add_arp_ribbon_object' type='button' name='add_arp_ribbon_object' id='add_arp_ribbon_object_".$tab_name[2]."' data-insert='arp_ribbon_image_object' data-id='arp_ribbon_image_url' data-input-id='".$custom_ribbon_input_id."'>".esc_html__('Add Ribbon','ARPrice')."</button>";
                                $custom_ribbon_string .= "</div>";
                            $custom_ribbon_string .= "</div>";
                        $custom_ribbon_string .= "</div>";
                        $g++;
                    }

                    echo $custom_ribbon_string;
                ?>

               
                <?php $pos_input_style = ($arp_is_rtl) ? "margin-left:5px;" : "margin-right:5px;"; ?>
                <div style="float:left;width:100%;display:none;" id="ribbon_custom_position" >
                    <div class="arp_ribbon_text_content">
                        <div class="arp_ribbon_text_title"><?php esc_html_e('Custom Position:', 'ARPrice'); ?></div>
                    </div>
                    <div class="arp_ribbon_text_content multiple" style="box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-o-box-sizing:border-box; width:22%;margin-top:16px;">
                        <div class="arp_ribbon_text_input single" style="position:relative;top:-5px;line-height:35px;">
                            <input type="text" name="arp_ribbon_custom_position_rl" id="arp_ribbon_custom_position_rl_modal" class="arp_modal_txtbox" value="0" style="width:60px;<?php echo $pos_input_style; ?>" /><?php esc_html_e('Px', 'ARPrice'); ?>
                        </div>
                        <div class="arp_ribbon_text_title single" style="font-family:ubuntu;line-height:normal;"><?php esc_html_e('Left / Right', 'ARPrice'); ?></div>
                    </div>
                    <div class="arp_ribbon_text_content multiple" style="box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-o-box-sizing:border-box; width:22%;margin-top:16px;">
                        <div class="arp_ribbon_text_input single" style="position:relative;top:-5px;line-height:35px;">
                            <input type="text" name="arp_ribbon_custom_position_top" id="arp_ribbon_custom_position_top_modal" class="arp_modal_txtbox" value="0" style="width:60px;<?php echo $pos_input_style; ?>" /><?php esc_html_e('Px', 'ARPrice'); ?>
                        </div>
                        <div class="arp_ribbon_text_title single" style="font-family:ubuntu;line-height:normal;">
                            <?php esc_html_e('Top', 'ARPrice'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="arp_ribbon_colorpicker_wrapper" id="arp_ribbon_colorpicker_wrapper" data-insert="arp_rbn_textcolor">
                <div class="arp_ribbon_colorpicker" id="arp_ribbon_colorpicker">
                    <div class="ribbon_modal_top_belt">

                        <span class="modal_title"><?php esc_html_e('Choose Color', 'ARPrice'); ?></span>
                        <span class="ribbon_modal_close_btn"><i class="fas fa-times"></i></span>
                    </div>
                    <div class="arp_ribbon_colorpicker_tabs">
                        <div class="arp_basic_color_tab" id="arp_basic_color_tab">
                            <?php
                            global $arp_mainoptionsarr;

                            $basic_colors = $arp_mainoptionsarr['general_options']['arp_basic_colors'];
                            ?>
                            <ul class="arp_basic_colors">
                                <style type="text/css">
                                    <?php
                                    foreach ($basic_colors as $key => $colors) {
                                        $base_color = $colors;
                                        $base_color_key = array_search($base_color, $basic_colors);
                                        $gradient_color = $arp_mainoptionsarr['general_options']['arp_basic_colors_gradient'][$base_color_key];
                                        ?>
                                            .basic_color_box.basic_color_<?php echo $key; ?>{
                                                background:<?php echo $base_color; ?>;
                                                background-color:<?php echo $base_color; ?>;
                                                background-image:-moz-linear-gradient(top, <?php echo $base_color; ?>, <?php echo $gradient_color; ?>);";
                                                background-image:-webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $base_color; ?>), to(<?php echo $gradient_color; ?>));
                                                background-image:-webkit-linear-gradient(top, <?php echo $base_color; ?>, <?php echo $gradient_color; ?>);
                                                background-image:-o-linear-gradient(top, <?php echo $base_color; ?>, <?php echo $gradient_color; ?>);
                                                background-image:linear-gradient(to bottom, <?php echo $base_color; ?>, <?php echo $gradient_color; ?>);
                                                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $base_color; ?>', endColorstr='<?php echo $gradient_color; ?>', GradientType=0);
                                                -ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="<?php echo $base_color; ?>", endColorstr="<?php echo $gradient_color; ?>", GradientType=0)";
                                                    background-repeat:repeat-x;
                                            }
                                        <?php
                                    }
                                    ?>
                                </style>
                                <?php
                                foreach ($basic_colors as $key => $colors) {
                                    ?>

                                    <li class="basic_color_box basic_color_<?php echo $key; ?>" title="<?php echo $colors; ?>" data-color="<?php echo $colors; ?>" >&nbsp;</li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <div class="arp_ribbon_colorpicker_okbtn">
                                <button type="button" id="arp_close_colorpicker" class='col_opt_btn' style="float:right;margin-right:10px;position:relative;top:-10px !important;"><?php esc_html_e('Ok', 'ARPrice'); ?></button>
                            </div>
                        </div>
                        <div class="arp_advanced_color_tab" id="arp_advanced_color_tab" data-insert="">
                            <div class="arp_advanced_color_picker jscolor" id='arp_advanced_color_picker' data-elm='arp_ribbon_txtcolor' data-color="#ffffff" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_advanced_color_picker)',valueElement:'arp_ribbon_txtcolor',required:false}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="arp_ribbon_btn_content">
            <div class="arp_ribbon_btn">
                <button type="submit" name="add_ribbon_insert" onclick="jQuery('#arp_ribbon_settings').submit()" id="add_ribbon_insert" class="ribbon_insert_btn">
                    <?php esc_html_e('Add Ribbon', 'ARPrice') ?>
                </button>
            </div>
            <div class="arp_ribbon_btn">
                <button type="button" name="add_ribbon_cancel" id="add_ribbon_cancel" class="ribbon_cancel_btn">
                    <?php esc_html_e('Cancel', 'ARPrice'); ?>
                </button>
            </div>

        </div>
    </div>
</div>
<!-- Ribbon Modal -->


        <!-- Header Shortcode Modal -->

        <?php
        global $arp_coloptionsarr;

        $header_options = isset($arp_coloptionsarr['header_options']) ? $arp_coloptionsarr['header_options'] : array();
        ?>

        <input type="hidden" name="shortcode_to_insert" id="shortcode_to_insert" value="" />
        <div class="arp_admin_modal_overlay"></div>
        <div class="arp_modal_box arp_offset_container" id="new_template_modal">
            <div class="modal_top_belt">
                <span class="modal_title"><?php esc_html_e('Add Shortcode', 'ARPrice'); ?></span>
                <span class="arp_modal_close_btn b-close"></span>
            </div>
            <form name="add_header_shortcode_form" id="add_header_shortcode_form" method="POST" onsubmit="return add_headershortcodeform();">
                <input type="hidden" name="arpaction" id="arpaction" value="create_new" />
                <input type="hidden" name="page" value="arp_add_pricing_table" />
                <input type="hidden" name="arp_shortcode_types_hidden" id="arp_shortcode_types_hidden" value='<?php echo json_encode($header_options['html_shortcode_options']); ?>' />
                <input type="hidden" name="arp_shortcode_type_value" id="arp_shortcode_type_value" value="" />
                <input type="hidden" name="arpcol_insert_header" id="arpcol_insert_header" value="" />
                <div class="arp_modal_content shortcode_modal_content">
                    <div class="modal_content_inner">
                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <div class="modal_content_label"><?php esc_html_e('Create Shortcode', 'ARPrice'); ?></div>
                                <div class="modal_content_input" id="arp_shortcode_type_dd">


                                    <input type="hidden" name="arp_shortcode_type" id="arp_shortcode_type" />
                                    <dl id="select_arp_shortcode_type" class='arp_selectbox' data-name="arp_shortcode_type" data-id="arp_shortcode_type" style="width:235px;">
                                        <dt><span style="float:left;"><?php esc_html_e('Choose Shortcode Type', 'ARPrice'); ?></span><i class="fas fa-caret-down fa-lg"></i></dt>
                                        <dd>
                                            <ul data-id="arp_shortcode_type" style="margin-top:18px; min-height:420px;">
                                                <?php
                                                if (count($header_options['html_shortcode_options']) > 0) {

                                                    foreach ($header_options['html_shortcode_options'] as $group_name) {
                                                        if ($group_name == 'image') {
                                                            echo "<ol class='arp_selectbox_group_label'>&nbsp;&nbsp;" . esc_html__('Image', 'ARPrice') . "</ol>";
                                                            foreach ($header_options['html_shortcode_options'][$group_name] as $shortcode_id => $shortcode_name) {
                                                                echo '<li data-value="' . $shortcode_id . '" data-label="' . $shortcode_name . '">' . $shortcode_name . '</li>';
                                                            }
                                                        }

                                                        if ($group_name == 'video') {
                                                            echo "<ol class='arp_selectbox_group_label'>&nbsp;&nbsp;" . esc_html__('Video', 'ARPrice') . "</ol>";
                                                            foreach ($header_options['html_shortcode_options'][$group_name] as $shortcode_id => $shortcode_name) {
                                                                echo '<li data-value="' . $shortcode_id . '" data-label="' . $shortcode_name . '">' . $shortcode_name . '</li>';
                                                            }
                                                        }
                                                        if ($group_name == 'audio') {
                                                            echo "<ol class='arp_selectbox_group_label'>&nbsp;&nbsp;" . esc_html__('Audio', 'ARPrice') . "</ol>";
                                                            foreach ($header_options['html_shortcode_options'][$group_name] as $shortcode_id => $shortcode_name) {
                                                                echo '<li data-value="' . $shortcode_id . '" data-label="' . $shortcode_name . '">' . $shortcode_name . '</li>';
                                                            }
                                                        }
                                                        if ($group_name == 'other') {
                                                            echo "<ol class='arp_selectbox_group_label'>&nbsp;&nbsp;" . esc_html__('Other', 'ARPrice') . "</ol>";
                                                            foreach ($header_options['html_shortcode_options'][$group_name] as $shortcode_id => $shortcode_name) {
                                                                echo '<li data-value="' . $shortcode_id . '" data-label="' . $shortcode_name . '">' . $shortcode_name . '</li>';
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="modal_content_cell">
                            </div>
                        </div>

                        <!-- Header Shortcode Image -->

                        <div id="arp_image_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">
                            <?php
                            if ($header_options['image_shortcode_options']) {
                                foreach ($header_options['image_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">
                                            <label class="modal_content_label" for="arp_image_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                            <?php
                                            if ($field_id == 'url') {
                                                ?>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_image_<?php echo $field_id; ?>" id="arp_image_<?php echo $field_id; ?>" class="arp_modal_txtbox img" />
                                                    <button data-insert="image" data-id="arp_image_url" type="button" id="arp_button_image_<?php echo $field_id; ?>" class="arp_modal_add_file_btn"><?php esc_html_e('Add File', 'ARPrice'); ?></button>
                                                </div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_image_<?php echo $field_id; ?>" id="arp_image_<?php echo $field_id; ?>" class="arp_modal_txtbox" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <div class="modal_content_row">
                                <div class="modal_content_cell shortcode_modal_content_cell">
                                    <div class="modal_content_input modal_single shortcode_chk_div">
                                        <span class='arp_price_checkbox_wrapper'>
                                            <input type="checkbox" name="arp_image_open_lightbox" id="arp_image_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                            <span></span>
                                        </span>
                                    </div>
                                    <label for="arp_image_open_lightbox"  class="modal_content_label modal_single shortcode_box_label"><?php esc_html_e('Open in Lightbox', 'ARPrice'); ?></label>
                                </div>
                            </div>


                        </div>

                        <!-- Header Shortcode Image -->

                        <div id="arp_youtube_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">
                            <?php
                            if ($header_options['youtube_shortcode_options']) {
                                foreach ($header_options['youtube_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell shortcode_modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single shortcode_chk_div">
                                                    <span class='arp_price_checkbox_wrapper'>
                                                        <input type="checkbox" name="arp_youtube_<?php echo $field_id; ?>" id="arp_youtube_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                        <span></span>
                                                    </span>
                                                </div>
                                                <label class="modal_content_label modal_single shortcode_box_label" for="arp_youtube_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label" for="arp_youtube_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_youtube_<?php echo $field_id; ?>" id="arp_youtube_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($field_id == 'height') {
                                        ?>

                                        <div class="modal_content_row">
                                            <div class="modal_content_cell">
                                                <label for="rpt_btn_image_width" class="modal_content_label"><?php esc_html_e('Width', 'ARPrice'); ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_youtube_width" name="rpt_btn_image_width">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>

                            <div class="modal_content_row">
                                <div class="modal_content_cell shortcode_modal_content_cell">
                                    <div class="modal_content_input modal_single shortcode_chk_div">
                                        <span class="arp_price_checkbox_wrapper">
                                            <input type="checkbox" name="arp_youtube_open_lightbox" id="arp_youtube_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                            <span></span>
                                        </span>
                                    </div>
                                    <label  class="modal_content_label modal_single shortcode_box_label" for="arp_youtube_open_lightbox"><?php esc_html_e('Open in Lightbox', 'ARPrice'); ?></label>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Header Shortcode Youtube Video -->

                        <!-- Header Shortcode Vimeo Video -->

                        <div id="arp_vimeo_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">
                            <?php
                            if ($header_options['vimeo_shortcode_options']) {
                                foreach ($header_options['vimeo_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell shortcode_modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>
                                                <div class="modal_content_input modal_single shortcode_chk_div">
                                                    <span class="arp_price_checkbox_wrapper">
                                                        <input type="checkbox" name="arp_vimeo_<?php echo $field_id; ?>" id="arp_vimeo_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                        <span></span>
                                                    </span>
                                                </div>
                                                <label class="modal_content_label modal_single shortcode_box_label" for="arp_vimeo_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label for="arp_vimeo_<?php echo $field_id; ?>" class="modal_content_label"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_vimeo_<?php echo $field_id; ?>" id="arp_vimeo_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($field_id == 'height') {
                                        ?>

                                        <div class="modal_content_row">
                                            <div class="modal_content_cell">
                                                <label for="rpt_btn_image_width" class="modal_content_label"><?php esc_html_e('Width', 'ARPrice'); ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_vimeo_width" name="rpt_btn_image_width">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell shortcode_modal_content_cell">
                                    <div class="modal_content_input modal_single shortcode_chk_div">
                                        <span class="arp_price_checkbox_wrapper">
                                            <input type="checkbox" name="arp_vimeo_open_lightbox" id="arp_vimeo_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                            <span></span>
                                        </span>
                                    </div>
                                    <label  class="modal_content_label modal_single shortcode_box_label" for="arp_vimeo_open_lightbox"><?php esc_html_e('Open in Lightbox', 'ARPrice'); ?></label>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Header Shortcode Vimeo Video -->

                        <!-- Header Shortcode Screenr Video -->

                        <div id="arp_screenr_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['screenr_shortcode_options']) {
                                foreach ($header_options['screenr_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">
                                            <label class="modal_content_label" for="arp_screenr_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                            <div class="modal_content_input">
                                                <input type="text" name="arp_screenr_<?php echo $field_id; ?>" id="arp_screenr_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($field_id == 'height') {
                                        ?>

                                        <div class="modal_content_row">
                                            <div class="modal_content_cell">
                                                <label for="rpt_btn_image_width" class="modal_content_label"><?php esc_html_e('Width', 'ARPrice'); ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_screenr_width" name="rpt_btn_image_width">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell shortcode_modal_content_cell">
                                    <div class="modal_content_input modal_single shortcode_chk_div">
                                        <span class="arp_price_checkbox_wrapper">
                                            <input type="checkbox" name="arp_screenr_open_lightbox" id="arp_screenr_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                            <span></span>
                                        </span>
                                    </div>
                                    <label  class="modal_content_label modal_single shortcode_box_label" for="arp_screenr_open_lightbox"><?php esc_html_e('Open in Lightbox', 'ARPrice'); ?></label>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Header Shortcode Screenr Video -->

                        <!-- Header Shortcode HTML5 Video -->

                        <div id="arp_video_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">
                            <?php
                            if ($header_options['video_shortcode_options']) {
                                $options = count($header_options['video_shortcode_options']);
                                $key = array();
                                $value = array();
                                foreach ($header_options['video_shortcode_options'] as $field_id => $field_key) {
                                    $key[] = $field_id;
                                    $value[] = $field_key;
                                }

                                $row = $options / 2;
                                $row = ceil($row);
                                $y = 0;
                                for ($i = 0; $i < $row; $i++) {
                                    ?>
                                    <div class="modal_content_row">
                                        <?php
                                        for ($x = $i; $x <= $i + 1; $x++) {
                                            if ($y == $options) {
                                                break;
                                            }
                                            ?>
                                            <div class="modal_content_cell shortcode_modal_content_cell">
                                                <?php if ($key[$y] != 'autoplay' and $key[$y] != 'loop') { ?>
                                                    <label class="modal_content_label" for="arp_video_<?php echo $key[$y]; ?>"><?php echo $value[$y]; ?></label>
                                                <?php } ?>
                                                <div class="shortcode_chk_div modal_content_input <?php
                                                if ($key[$y] == 'autoplay' || $key[$y] == 'loop') {
                                                    echo 'modal_single';
                                                }
                                                ?>">
                                                         <?php
                                                         if ($key[$y] == 'autoplay' || $key[$y] == 'loop') {
                                                             ?>
                                                             <span class="arp_price_checkbox_wrapper">
                                                                <input type="checkbox" class="arp_checkbox light_bg" name="arp_video_<?php echo $key[$y]; ?>" id="arp_video_<?php echo $key[$y]; ?>" value="1" />
                                                                <span></span>
                                                            </span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="text" name="arp_video_<?php echo $key[$y]; ?>" id="arp_video_<?php echo $key[$y]; ?>" class="arp_modal_txtbox img" value=""  />
                                                        <button data-insert="video" data-id="arp_video_<?php echo $key[$y]; ?>" type="button" class="arp_modal_add_file_btn"><?php esc_html_e('Add File', 'ARPrice'); ?></button>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php if ($key[$y] == 'autoplay' or $key[$y] == 'loop') { ?>
                                                    <label class="modal_content_label modal_single shortcode_box_label" for="arp_video_<?php echo $key[$y]; ?>"><?php echo $value[$y]; ?></label>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            $y++;
                                        }
                                        ?>                               
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell shortcode_modal_content_cell">
                                    <div class="modal_content_input modal_single shortcode_chk_div">
                                        <span class="arp_price_checkbox_wrapper">
                                            <input type="checkbox" name="arp_video_open_lightbox" id="arp_video_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                            <span></span>
                                        </span>
                                    </div>
                                    <label  class="modal_content_label modal_single shortcode_box_label" for="arp_video_open_lightbox"><?php esc_html_e('Open in Lightbox', 'ARPrice'); ?></label>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Header Shortcode HTML5 Video -->

                        <!-- Header Shortcode HTML5 Audio -->

                        <div id="arp_audio_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">
                            <?php
                            if ($header_options['audio_shortcode_options']) {

                                $options = count($header_options['audio_shortcode_options']);

                                $row = $options / 2;

                                $row = ceil($row);

                                $key = array();

                                $value = array();

                                foreach ($header_options['audio_shortcode_options'] as $field_id => $field_title) {
                                    $key[] = $field_id;
                                    $value[] = $field_title;
                                }
                                $y = 0;

                                for ($i = 0; $i < $row; $i++) {
                                    ?>
                                    <div class="modal_content_row">
                                        <?php
                                        for ($x = $i; $x <= $i + 1; $x++) {
                                            if ($y == $options) {
                                                break;
                                            }
                                            ?>
                                            <div class="modal_content_cell shortcode_modal_content_cell">
                                                <?php if ($key[$y] != 'autoplay' and $key[$y] != 'loop') { ?>
                                                    <label for="arp_audio_<?php echo $key[$y]; ?>" class="modal_content_label <?php
                                                    if ($key[$y] == 'autoplay' || $key[$y] == 'loop') {
                                                        echo 'modal_single';
                                                    }
                                                    ?>"><?php echo $value[$y]; ?></label>
                                                       <?php } ?>
                                                <div class="shortcode_chk_div modal_content_input  <?php
                                                if ($key[$y] == 'autoplay' || $key[$y] == 'loop') {
                                                    echo 'modal_single';
                                                }
                                                ?>">
                                                         <?php
                                                         if ($key[$y] == 'autoplay' || $key[$y] == 'loop') {
                                                             ?>
                                                             <span class="arp_price_checkbox_wrapper">
                                                                <input type="checkbox" class="arp_checkbox light_bg" name="arp_audio_<?php echo $key[$y]; ?>" id="arp_audio_<?php echo $key[$y]; ?>" value="1" />
                                                                <span></span>
                                                            </span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="text" class="arp_modal_txtbox img"  name="arp_audio_<?php echo $key[$y]; ?>" id="arp_audio_<?php echo $key[$y]; ?>"  value="" />

                                                        <button data-insert="audio" data-id="arp_audio_<?php echo $key[$y]; ?>" type="button" class="arp_modal_add_file_btn"><?php esc_html_e('Add File', 'ARPrice'); ?></button>


                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php if ($key[$y] == 'autoplay' or $key[$y] == 'loop') { ?>
                                                    <label class="modal_content_label modal_single shortcode_box_label" for="arp_audio_<?php echo $key[$y]; ?>"><?php echo $value[$y]; ?></label>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            $y++;
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            
                        </div>

                        <!-- Header Shortcode HTML5 Video -->

                        <!-- Header Shortcode Google Map -->

                        <div id="arp_googlemap_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top:20px;">
                            <?php
                            if ($header_options['googlemap_shortcode_options']) {
                                $options = count($header_options['googlemap_shortcode_options']);

                                $row = $options / 2;

                                $row = ceil($row);

                                $key = array();
                                $value = array();

                                foreach ($header_options['googlemap_shortcode_options'] as $field_id => $field_title) {
                                    $key[] = $field_id;
                                    $value[] = $field_title;
                                }

                                $y = 0;

                                for ($i = 0; $i < $row; $i++) {
                                    ?>
                                    <div class="modal_content_row">
                                        <?php
                                        for ($x = $i; $x <= $i + 1; $x++) {
                                            if ($y == $options) {
                                                break;
                                            }
                                            ?>
                                            <?php 
                                            $content_cell_class = "";
                                            $shortcode_chk_div = "";
                                            $shortcode_box_label = "";
                                                if($key[$y] == 'mapinfo_show_default'){
                                                    $content_cell_class = "shortcode_modal_content_cell";
                                                    $shortcode_chk_div = "shortcode_chk_div";
                                                    $shortcode_box_label = "shortcode_box_label";
                                                }
                                            ?>
                                            <div class="modal_content_cell <?php echo $content_cell_class; ?>">
                                                <?php if ($key[$y] != 'mapinfo_show_default') { ?>
                                                    <label for="arp_googlemap_<?php echo $key[$y]; ?>" class="modal_content_label <?php if ($key[$y] == 'mapinfo_show_default') echo 'modal_single'; ?>"><?php echo $value[$y] ?></label>
                                                <?php } ?>
                                                <div class="<?php echo $shortcode_chk_div; ?> modal_content_input <?php if ($key[$y] == 'mapinfo_show_default') echo 'modal_single'; ?>" id="<?php echo $key[$y]; ?>">
                                                    <?php
                                                    if ($key[$y] == 'mapinfo_show_default') {
                                                        ?>
                                                        <span class="arp_price_checkbox_wrapper">
                                                            <input type="checkbox" value="1" name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" class="arp_checkbox light_bg" />
                                                            <span></span>
                                                        </span>
                                                        <?php
                                                    } else if ($key[$y] == 'zoom_level') {
                                                        ?>

                                                        <input type="hidden" name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" />
                                                        <dl class="arp_selectbox" data-name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" data-id="arp_googlemap_<?php echo $key[$y]; ?>" style="width:235px;">
                                                            <dt><span>14</span><input class="arp_autocomplete" type="hidden" value="14" /><i class="fas fa-caret-down fa-lg"></i></dt>
                                                            <dd>
                                                                <ul data-id="arp_googlemap_<?php echo $key[$y]; ?>">
                                                                    <?php
                                                                    for ($i = 1; $i <= 20; $i++) {
                                                                        ?>
                                                                        <li data-value="<?php echo $i; ?>" data-label="<?php echo $i; ?>"><?php echo $i; ?></li>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </dd>
                                                        </dl>
                                                        <?php
                                                    } else if ($key[$y] == 'mapinfo_content') {
                                                        ?>
                                                        <textarea name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" class="arp_modal_txtarea" ></textarea>   
                                                        <?php
                                                    } else if ($key[$y] == 'address'){
                                                     ?>
                                                        <textarea name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" class="arp_modal_txtarea" ></textarea> 
                                                    <?php }
                                                     else {
                                                        ?>
                                                        <input type="text" class="arp_modal_txtbox <?php if ($key[$y] == 'marker_image') echo 'img'; ?>"  name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" />
                                                        <?php
                                                        if ($key[$y] == 'marker_image') {
                                                            ?>
                                                            <button data-insert="map" data-id="arp_googlemap_<?php echo $key[$y]; ?>" type="button" class="arp_modal_add_file_btn"><?php esc_html_e('Add File', 'ARPrice'); ?></button>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <?php if ($key[$y] == 'mapinfo_show_default') { ?>
                                                    <label class="modal_content_label modal_single shortcode_box_label" for="arp_googlemap_<?php echo $key[$y]; ?>"><?php echo $value[$y]; ?></label>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            $y++;
                                        }
                                        ?>
                                        <input type="hidden" name="arp_map_api_key" id="arp_map_api_key_<?php echo $i; ?>" value="<?php echo get_option("arp_google_map_api_key"); ?>" />
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            
                        </div>

                        <!-- Header Shortcode Google Map -->

                        <!-- Dailymotion Shortcode Image -->

                        <div id="arp_dailymotion_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['dailymotion_shortcode_options']) {
                                foreach ($header_options['dailymotion_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell shortcode_modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single shortcode_chk_div">
                                                    <span class="arp_price_checkbox_wrapper">
                                                        <input type="checkbox" name="arp_dailymotion_<?php echo $field_id; ?>" id="arp_dailymotion_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" 
                                                        value="1" />
                                                        <span></span>
                                                    </span>
                                                </div>
                                                <label class="modal_content_label modal_single shortcode_box_label" for="arp_dailymotion_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label shortcode_box_label" for="arp_dailymotion_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_dailymotion_<?php echo $field_id; ?>" id="arp_dailymotion_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($field_id == 'height') {
                                        ?>

                                        <div class="modal_content_row">
                                            <div class="modal_content_cell">
                                                <label for="rpt_btn_image_width" class="modal_content_label"><?php esc_html_e('Width', 'ARPrice'); ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_dailymotion_width" name="rpt_btn_image_width">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell shortcode_modal_content_cell">
                                    <div class="modal_content_input modal_single shortcode_chk_div">
                                        <span class="arp_price_checkbox_wrapper">
                                            <input type="checkbox" name="arp_dailymotion_open_lightbox" id="arp_dailymotion_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                            <span></span>
                                        </span>
                                    </div>
                                    <label  class="modal_content_label modal_single shortcode_box_label" for="arp_dailymotion_open_lightbox"><?php esc_html_e('Open in Lightbox', 'ARPrice'); ?></label>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Header Shortcode Dailymotion Video -->


                        <!-- Metacafe Shortcode Image -->

                        <div id="arp_metacafe_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['metacafe_shortcode_options']) {
                                foreach ($header_options['metacafe_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell shortcode_modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single shortcode_chk_div">
                                                    <span class="arp_price_checkbox_wrapper">
                                                        <input type="checkbox" name="arp_metacafe_<?php echo $field_id; ?>" id="arp_metacafe_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                        <span></span>
                                                    </span>
                                                </div>
                                                <label class="modal_content_label modal_single shortcode_box_label" for="arp_metacafe_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label shortcode_box_label" for="arp_metacafe_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_metacafe_<?php echo $field_id; ?>" id="arp_metacafe_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($field_id == 'height') {
                                        ?>

                                        <div class="modal_content_row">
                                            <div class="modal_content_cell">
                                                <label for="rpt_btn_image_width" class="modal_content_label"><?php esc_html_e('Width', 'ARPrice'); ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_metacafe_width" name="rpt_btn_image_width">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell shortcode_modal_content_cell">
                                    <div class="modal_content_input modal_single shortcode_chk_div">
                                        <span class="arp_price_checkbox_wrapper">
                                            <input type="checkbox" name="arp_dailymotion_metacafe_lightbox" id="arp_metacafe_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                            <span></span>
                                        </span>
                                    </div>
                                    <label  class="modal_content_label modal_single shortcode_box_label" for="arp_metacafe_open_lightbox"><?php esc_html_e('Open in Lightbox', 'ARPrice'); ?></label>
                                </div>
                            </div>

                        </div>

                        <!-- Header Shortcode Metacafe Video -->


                        <!-- Soundcloud Shortcode Image -->

                        <div id="arp_soundcloud_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['soundcloud_shortcode_options']) {
                                foreach ($header_options['soundcloud_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell shortcode_modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single shortcode_chk_div">
                                                    <span class="arp_price_checkbox_wrapper">
                                                        <input type="checkbox" name="arp_soundcloud_<?php echo $field_id; ?>" id="arp_soundcloud_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                        <span></span>
                                                    </span>
                                                </div>
                                                <label class="modal_content_label modal_single shortcode_box_label" for="arp_soundcloud_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label shortcode_box_label" for="arp_soundcloud_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_soundcloud_<?php echo $field_id; ?>" id="arp_soundcloud_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                        </div>

                        <!-- Header Shortcode Soundcloud Video -->


                        <!-- Mixcloud Shortcode Image -->

                        <div id="arp_mixcloud_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['mixcloud_shortcode_options']) {
                                foreach ($header_options['mixcloud_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell shortcode_modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single shortcode_chk_div">
                                                    <span class="arp_price_checkbox_wrapper">
                                                        <input type="checkbox" name="arp_mixcloud_<?php echo $field_id; ?>" id="arp_mixcloud_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                        <span></span>
                                                    </span>
                                                </div>
                                                <label class="modal_content_label modal_single shortcode_box_label" for="arp_mixcloud_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label shortcode_box_label" for="arp_mixcloud_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_mixcloud_<?php echo $field_id; ?>" id="arp_mixcloud_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            
                        </div>

                        <!-- Header Shortcode mixcloud Video -->



                        <!-- beatport Shortcode Image -->

                        <div id="arp_beatport_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['beatport_shortcode_options']) {
                                foreach ($header_options['beatport_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell shortcode_modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single shortcode_chk_div">
                                                    <span class="arp_price_checkbox_wrapper">
                                                        <input type="checkbox" name="arp_beatport_<?php echo $field_id; ?>" id="arp_beatport_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                        <span></span>
                                                    </span>
                                                </div>
                                                <label class="modal_content_label modal_single shortcode_box_label" for="arp_beatport_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label shortcode_box_label" for="arp_beatport_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_beatport_<?php echo $field_id; ?>" id="arp_beatport_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                        </div>

                        <!-- Header Shortcode Embed -->

                        <div id="arp_embed_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['embed_shortcode_options']) {
                                foreach ($header_options['embed_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell shortcode_modal_content_cell" style="width:90%;">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single shortcode_chk_div">
                                                    <span class="arp_price_checkbox_wrapper">
                                                        <input type="checkbox" name="arp_embed_<?php echo $field_id; ?>" id="arp_embed_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                        <span></span>
                                                    </span>
                                                </div>
                                                <label class="modal_content_label modal_single shortcode_box_label" for="arp_embed_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label shortcode_box_label" for="arp_embed_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">

                                                    <textarea name="arp_embed_<?php echo $field_id; ?>" id="arp_embed_<?php echo $field_id; ?>" class="arp_modal_txtarea" ></textarea>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                        </div>

                        <!-- Header Shortcode Embed -->

                    </div>
                </div>
            </form>
            <div class="arp_shortcode_modal_footer_container">
                <div id="arp_image_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <input type="submit" class="arp_modal_insert_shortcode_btn" name="arp_image_btn" onclick="jQuery('#add_header_shortcode_form').submit()" id="arp_image_btn" value="<?php esc_html_e('Insert Shortcode', 'ARPrice') ?>">    
                </div>
                
                <div id="arp_youtube_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" class="arp_modal_insert_shortcode_btn" name="arp_youtube_btn" id="arp_youtube_btn" onclick="jQuery('#add_header_shortcode_form').submit()"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

                <div id="arp_vimeo_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" onclick="jQuery('#add_header_shortcode_form').submit()" class="arp_modal_insert_shortcode_btn" name="arp_vimeo_btn" id="arp_vimeo_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

                <div id="arp_video_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" onclick="jQuery('#add_header_shortcode_form').submit()" class="arp_modal_insert_shortcode_btn" name="arp_video_btn" id="arp_video_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

                <div id="arp_dailymotion_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" onclick="jQuery('#add_header_shortcode_form').submit()" class="arp_modal_insert_shortcode_btn" name="arp_dailymotion_btn" id="arp_dailymotion_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

                <div id="arp_metacafe_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" onclick="jQuery('#add_header_shortcode_form').submit()" class="arp_modal_insert_shortcode_btn" name="arp_metacafe_btn" id="arp_metacafe_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

                <div id="arp_audio_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" onclick="jQuery('#add_header_shortcode_form').submit()" class="arp_modal_insert_shortcode_btn" name="arp_audio_btn" id="arp_audio_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

                <div id="arp_soundcloud_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" onclick="jQuery('#add_header_shortcode_form').submit()" class="arp_modal_insert_shortcode_btn" name="arp_soundcloud_btn" id="arp_soundcloud_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

                <div id="arp_mixcloud_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" onclick="jQuery('#add_header_shortcode_form').submit()" class="arp_modal_insert_shortcode_btn" name="arp_mixcloud_btn" id="arp_mixcloud_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

                <div id="arp_beatport_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" onclick="jQuery('#add_header_shortcode_form').submit()" class="arp_modal_insert_shortcode_btn" name="arp_beatport_btn" id="arp_beatport_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

                <div id="arp_googlemap_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" onclick="jQuery('#add_header_shortcode_form').submit()" class="arp_modal_insert_shortcode_btn" name="arp_googlemap_btn" id="arp_googlemap_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

                <div id="arp_embed_btn_div" class="arp_shortcode_modal_footer_container_div" style="display: none;">
                    <button type="submit" onclick="jQuery('#add_header_shortcode_form').submit()" class="arp_modal_insert_shortcode_btn" name="arp_embed_btn" id="arp_embed_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice') ?></button>
                </div>

            </div>
        </div>


        <!-- Header Shortcode Modal -->

        <!-- Slider Navigation Modal -->
        <div class="arp_model_box" id="arp_select_navigation_style" style="display:none;background:white;">
            <div class="modal_top_belt">
                <span class="modal_title"><?php esc_html_e('Choose Navigation Style', 'ARPrice'); ?></span>
                <span id="nav_style_close" class="modal_close_btn b-close"></span>
            </div>
            <div class="arp_modal_content slider_pagination_navigation">
                <?php
                global $arp_mainoptionsarr;
                foreach ($arp_mainoptionsarr['general_options']['column_animation']['navigation_style'] as $style) {
                    ?>
                    <div class="navigation_style_wrapper <?php echo ( isset($opt['column_animation']['navigation_style']) && $opt['column_animation']['navigation_style'] == $style ) ? 'selected' : ''; ?>" id="<?php echo $style; ?>">
                        <div class="<?php echo $style; ?>" ></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <!-- Slider Navigation Modal -->

        <!-- Slider Pagination Modal -->

        <div class="arp_modal_box" id="arp_select_pagination_style" style="display:none;background:#ffffff;">
            <div class="modal_top_belt">
                <span class="modal_title"><?php esc_html_e('Choose Pagination Style', 'ARPrice'); ?></span>
                <span id="paging_style_close" class="modal_close_btn b-close"></span>
            </div>
            <div class="arp_modal_content slider_pagination_navigation">
                <?php
                global $arp_mainoptionsarr;
                foreach ($arp_mainoptionsarr['general_options']['column_animation']['pagination_style'] as $style) {
                    ?>
                    <div class="pagination_style_wrapper <?php echo ( isset($opt['column_animation']['pagination_style']) && $opt['column_animation']['pagination_style'] == $style ) ? 'selected' : ''; ?>" id="<?php echo $style; ?>">
                        <?php
                        for ($i = 1; $i <= 3; $i++) {
                            ?>
                            <div class="<?php echo $style . ' page_' . $i; ?>" ></div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <!-- Slider Pagination Modal -->

        <!-- Button Shortcode Modal -->

        <div class="arp_modal_box" id="arp_button_template_modal" style="display:none; background:#ffffff;">
            <form name="add_button_shortcode_form" id="add_button_shortcode_form" method="post" onsubmit="return add_rpt_btn_shortcode();">
                <input type="hidden" name="rptaction" id="rptaction" value="create_new" />
                <input type="hidden" name="page" value="rpt_add_pricing_table" />
                <div class="modal_top_belt">
                    <span class="modal_title"><?php esc_html_e('Add Shortcode', 'ARPrice'); ?></span>
                    <span id="button_style_close" class="arp_modal_close_btn b-close"></span>
                </div>
                <div class="arp_modal_content arp_button_template">
                    <div id="rpt_btn_image_shortcode_div" class="rpt_shortcode_div" style="margin-top: 20px;">
                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <label for="rpt_btn_image_url" class="modal_content_label"><?php esc_html_e('Image URL', 'ARPrice'); ?></label>
                                <div class="modal_content_input">
                                    <input type="text" value="" class="arp_modal_txtbox img" id="arp_btn_image_url_btn_shortcode" name="rpt_btn_image_url">
                                    <button data-insert="btn_image" data-id="arp_btn_image_url" type="button" class="arp_modal_add_file_btn"><?php esc_html_e('Add File', 'ARPrice'); ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <label for="rpt_btn_image_height" class="modal_content_label"><?php esc_html_e('Height', 'ARPrice'); ?></label>
                                <div class="modal_content_input">
                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_btn_image_height" name="rpt_btn_image_height">
                                </div>
                            </div>
                        </div>

                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <label for="rpt_btn_image_width" class="modal_content_label"><?php esc_html_e('Width', 'ARPrice'); ?></label>
                                <div class="modal_content_input">
                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_btn_image_width" name="rpt_btn_image_width">
                                </div>
                            </div>
                        </div>

                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <div class="modal_content_label"></div>
                                <div class="modal_content_input"><button type="submit" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_insert_shortcode_image_btn"><?php esc_html_e('Insert Shortcode', 'ARPrice'); ?></button></div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <!-- Button Shortcode Modal -->

        <!-- Remove Row Modal -->
        <div class="arp_model_delete_box" id="arp_remove_row" style="display:none;background:white;">
            <div class="modal_top_belt">
                <span class="modal_title"><?php esc_html_e('Delete Row', 'ARPrice'); ?></span>
                <span id="nav_style_close" class="arp_modal_close_btn b-close"></span>
            </div>
            <div class="arp_modal_delete_content">
                <div class="arp_delete_modal_msg"><?php esc_html_e('Are you sure want to delete this row?', 'ARPrice' ); ?></div>

                <div class="arp_delete_modal_btn">
                    <button id="Model_Delete_Row_Button" col-id='' row-id='' type="button" class="ribbon_insert_btn delete_row"><?php esc_html_e('Okay', 'ARPrice' ); ?></button>
                    <button id="Model_Delete_Row_Button"  class="ribbon_cancel_btn" type="button"><?php esc_html_e('Cancel', 'ARPrice' ); ?></button>
                </div>

            </div>
        </div>

        <!-- Remove Row Modal -->

        <!-- Remove column -->
        <div class="arp_admin_modal_overlay">
            <div class="arp_model_delete_box" id="arp_remove_column_last" style="background:white;">
                <div class="modal_top_belt">
                    <span class="modal_title"><?php esc_html_e('Delete Column', 'ARPrice'); ?></span>
                    <span id="nav_style_close" class="arp_modal_close_btn b-close"></span>
                </div>
                <div class="arp_modal_delete_content">
                    <div class="arp_delete_modal_msg"><?php esc_html_e("You can not delete all columns", 'ARPrice'); ?></div>
                    <div class="arp_delete_modal_btn">
                        <button id="Model_Delete_Column_last"  class="ribbon_insert_btn Model_Delete_Column_last_btn" type="button"><?php esc_html_e("Okay", 'ARPrice'); ?></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Remove column -->

        <!-- Hide column -->
        <div class="arp_admin_modal_overlay">
            <div class="arp_model_delete_box" id="arp_hide_column_last" style="background:white;">
                <div class="modal_top_belt">
                    <span class="modal_title"><?php esc_html_e('Hide Column', 'ARPrice'); ?></span>
                    <span id="nav_style_close" class="arp_modal_close_btn b-close"></span>
                </div>
                <div class="arp_modal_delete_content">
                    <div class="arp_delete_modal_msg"><?php esc_html_e("You can not hide all columns", 'ARPrice'); ?></div>
                    <div class="arp_delete_modal_btn">
                        <button id="Model_Hide_Column_last"  class="ribbon_insert_btn Model_Hide_Column_last_btn" type="button"><?php esc_html_e("Okay", 'ARPrice'); ?></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hide column -->



        <!--Empty Selection modal box-->
        <div class="arp_model_empty_box" id="arp_empty_temp" style="display:none;background:white;">
            <div class="modal_top_belt_emptybox">
                <span class="modal_title_emptybox"><?php esc_html_e('Please Select a Template', 'ARPrice'); ?></span>

            </div>
            <div class="arp_modal_delete_content">


                <div class="arp_empty_modal_btn">
                    <button id=""  type="button" class="ribbon_insert_btn b-close"><?php esc_html_e('Okay', 'ARPrice' ); ?></button>
                </div>

            </div>
        </div>
        <!---->

        <!-- Header Object Modal Box -->
        <?php 
        foreach ($total_tabs as $key => $tab_name) { ?>
            <div class="arp_object_modal_box" id="arp_object_modal_box" style="display:none; background:#ffffff;">
                <form name="add_arp_object" id="add_arp_object_<?php echo $tab_name[2]; ?>" method="post" onsubmit="return false;">
                    <input type="hidden" id="arpcol_to_insert_object_<?php echo $tab_name[2]; ?>" name="arpcol_to_insert_object" />
                    <input type="hidden" id="arpcol_insert_<?php echo $tab_name[2]; ?>" name="arpcol_insert" />
                    <div class="modal_top_belt">
                        <span class="modal_title"><?php esc_html_e('Add Shortcode', 'ARPrice'); ?></span>
                        <span id="button_style_close" class="arp_modal_close_btn b-close"></span>
                    </div>
                    <div class="arp_modal_content" style="padding:20px;">

                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <label for="rpt_btn_image_url" class="modal_content_label"><?php esc_html_e('Image URL', 'ARPrice'); ?></label>
                                <div class="modal_content_input">
                                    <input type="text" value="" class="arp_modal_txtbox img" id="arp_header_image_url_headerobj_<?php echo $tab_name[2]; ?>" name="arp_header_image_url">
                                    <button data-insert="header_object" data-id="arp_header_image_url" type="button" class="arp_header_object"><?php esc_html_e('Add File', 'ARPrice'); ?></button>
                                </div>
                            </div>
                        </div>


                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <label for="arp_header_image_height" class="modal_content_label"><?php esc_html_e('Height', 'ARPrice'); ?></label>
                                <div class="modal_content_input">
                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_header_image_height_headerobj_<?php echo $tab_name[2]; ?>" name="arp_header_image_height">
                                </div>
                            </div>
                        </div>

                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <label for="arp_header_image_width_<?php echo $tab_name[2]; ?>" class="modal_content_label"><?php esc_html_e('Width', 'ARPrice'); ?></label>
                                <div class="modal_content_input">
                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_header_image_width_headerobj_<?php echo $tab_name[2]; ?>" name="arp_header_image_width">
                                </div>
                            </div>
                        </div>

                        <div class="modal_content_row">
                            <div class="modal_content_cell" id="modal_content_cell">
                                <div class="modal_content_label"></div>
                                <div class="modal_content_input">

                                    <button type="submit" onclick="arp_add_object();" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_image_btn_<?php echo $tab_name[2]; ?>"><?php esc_html_e('Add Image', 'ARPrice'); ?></button><button type="button" style="display:none;margin-left:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn_<?php echo $tab_name[2]; ?>"><?php esc_html_e('Remove Image', 'ARPrice'); ?></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        <?php
        }
        ?>
        
        <!---->
        <!--================================================-->

        <div class="arp_object_modal_box" id="arp_object_modal_box_ribbon" style="display:none; background:#ffffff;width:650px;height:530px;">
            <form name="add_arp_ribbon_object" id="add_arp_ribbon_object" method="post" onsubmit="return false;">
                <input type="hidden" id="arpcol_to_insert_ribbon_object" name="arpcol_to_insert_ribbon_object" />
                <input type="hidden" id="arpcol_ribbon_insert" name="arpcol_ribbon_insert" />
                <div class="modal_top_belt">
                    <span class="modal_title"><?php esc_html_e('Ribbon Url', 'ARPrice'); ?></span>
                    <span id="button_style_close" class="arp_modal_close_btn b-close"></span>
                </div>
                <div class="arp_modal_content" style="padding:20px;">

                    <div class="modal_content_row">
                        <div class="modal_content_cell">
                            <label for="rpt_btn_image_url" class="modal_content_label"><?php esc_html_e('Image URL', 'ARPrice'); ?></label>
                            <div class="modal_content_input">
                                <input type="text" value="" class="arp_modal_txtbox img" id="arp_ribbon_image_url" name="arp_ribbon_image_url" style="width:208px;">
                                <button data-insert="arp_ribbon_image_object" data-id="arp_ribbon_image_url" type="button" class="arp_ribbon_image_object"><?php esc_html_e('Add File', 'ARPrice'); ?></button>
                            </div>
                        </div>
                    </div>

                    <div class="modal_content_row">
                        <div class="modal_content_cell">
                            <div class="modal_content_label"></div>
                            <div class="modal_content_input"><button type="submit" onclick="arp_add_ribbon_object();" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_ribbon_image_btn"><?php esc_html_e('Add Image', 'ARPrice'); ?></button></div>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <!--================================================-->


        <!-- Font Awesome -->
        <div class="arp_modal_box" id="arp_obj_fontawesome_modal" style="display: none;">

            <div class="modal_top_belt">
                <span class="modal_title"><?php esc_html_e('Choose Icon', 'ARPrice'); ?></span>
                <span class="arp_modal_close_btn b-close"></span>
            </div>
            <form name="select_font_awesome_form" id="arp_obj_select_font_awesome_form" method="post" enctype="multipart/form-data" onSubmit="return false;">
                <input type="hidden" name="arpcol_to_insert_font" id="arpcol_to_insert_font" value="" />
                <input type="hidden" name="arpcol_insert_font" id="arpcol_insert_font" value="" />
                <div id="arp_fontawesome_content" class="arp_fontawesome_content">
            
                </div>
            </form>    

        </div>


        <!-- CSS Class Model -->
        <div class="arp_admin_modal_overlay">
            <div class="arp_model_css_info_box" id="arp_model_css_info_box" style="background:white;">
                <div class="modal_top_belt">
                    <span class="modal_title"><?php esc_html_e('ARPrice CSS Class Information', 'ARPrice'); ?></span>
                    <span class="arp_modal_close_btn b-close"></span>
                </div>
                <div class="arp_css_info_model_content" id="arp_css_info_model_content">

                </div>
            </div>
        </div>

        <!-- CSS Class Model -->
        <?php
        if (isset($id) && $id != "") {
            $sql = $wpdb->get_row($wpdb->prepare("SELECT general_options FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d AND status = %s ", $id, 'published'));
            $table_id = isset($sql->ID) ? $sql->ID : '';
            $general_option = maybe_unserialize($sql->general_options);
        } else {
            $id = "";
        }
        ?>

        <!-- ARPrice Font Icons Model -->
        <div class="arp_font_icons" id="arp_font_icons" style="display:none;">
            <?php
            $fonticon = '';
            $fonticon .= "<div class='arp_font_awesome_arrow'></div>";
            $fonticon .= "<div class='font_awesome_icon_list'>";

            $fonticon .= "<div class='arp_icon_search'><input class='arp_icon_search_input' id='arp_icon_search_input' name='arp_icon_search_input' placeholder='search' /></div>";
            foreach ($arprice_font_awesome_icons as $name => $icon) {

                if ($name == 'font_awesome' && !in_array('enable_fontawesome_icon', $arp_disabled_fonts)) {
                    $fonticon .= '<div class="arp_icon_text_title" id="arp_font_awaesome_icon">'.esc_html__('Font Awesome','ARPrice').'</div><div class="clear"></div>';
                    foreach ($icon as $icon_name => $icon_arr) {
                        $icon_class = $icon_arr['code'];
                        $icon_style = ( isset($icon_arr['style']) && $icon_arr['style'] != '' ) ? $icon_arr['style'] : 'fas';
                        $fonticon .= "<div class='arp_fainsideimge' data-arp-cls='".$icon_arr['style']."' data-arpicon='fontawesome' id='" . $icon_class . "' title='" . $icon_name . "'>";
                        $fonticon .= "<i class='".$icon_style." " . $icon_class . "'></i>";
                        $fonticon .= "</div>";
                    }
                }
                if ($name == 'material_design' && !in_array('enable_material_design_icon', $arp_disabled_fonts)) {
                    $fonticon .= '<div class="clear"></div><div class="arp_icon_text_title" id="arp_font_material_icon">'.esc_html__('Material Design Icons','ARPrice').'</div><div class="clear"></div>';
                    foreach ($icon as $icon_name => $icon_class) {
                        $fonticon .= "<div class='arp_fainsideimge' data-arpicon='material' id='" . $icon_class . "' title='" . $icon_name . "'>";
                        $fonticon .= "<i class='material-icons'>" . $icon_class . "</i>";
                        $fonticon .= "</div>";
                    }
                }
                if ($name == 'typicons' && !in_array('enable_typicons', $arp_disabled_fonts)) {
                    $fonticon .= '<div class="clear"></div><div class="arp_icon_text_title" id="arp_font_typicons_icon">'.esc_html__('Typicons','ARPrice').'</div><div class="clear"></div>';
                    foreach ($icon as $icon_name => $icon_class) {
                        $fonticon .= "<div class='arp_fainsideimge' data-arpicon='typicons' id='" . $icon_class . "' title='" . $icon_name . "'>";
                        $fonticon .= "<i class='typcn " . $icon_class . "'></i>";
                        $fonticon .= "</div>";
                    }
                }
                if ($name == 'ionicons' && !in_array('enable_ionicons', $arp_disabled_fonts)) {
                    $fonticon .= '<div class="clear"></div><div class="arp_icon_text_title" id="arp_font_ionicons_icon">Ionicons</div><div class="clear"></div>';
                    foreach ($icon as $icon_name => $icon_class) {
                        $fonticon .= "<div class='arp_fainsideimge' data-arpicon='ionicons' id='" . $icon_class . "' title='" . $icon_name . "'>";
                        $fonticon .= "<i class='icon " . $icon_class . "'></i>";
                        $fonticon .= "</div>";
                    }
                }
            }


            $fonticon .= "</div>";
            $fonticon .= "<div class='arp_fontawesome_preview_div' style='display:none;'>";
            
            $fonticon .= "</div>";
            echo $fonticon;
            ?>
        </div>
        <!-- ARPrice Font Icons Model -->

        <!-- Alert Box For Copy Toggle Data -->
        <div class="arp_admin_modal_overlay">
            <div class="arp_model_delete_box arp_copy_toggle_data_modal" id="arp_model_toggle_copy_data" style="background:white;">
                <div class="modal_top_belt">
                    <span class="modal_title"><?php esc_html_e('Transfer toggle data', 'ARPrice'); ?></span>
                    <span id="nav_style_close" class="arp_modal_close_btn b-close"></span>
                </div>
                <div class="arp_modal_delete_content">
                    <div class="arp_delete_modal_msg"><?php esc_html_e("Are you sure you want to copy first tab data? This section will overwrite all existing data of all other tabs.", 'ARPrice'); ?></div>
                                        
                    <div class="arp_delete_modal_btn">
                        <button type="button" class="ribbon_insert_btn arp_copy_toggle_data"><?php esc_html_e('Okay', 'ARPrice'); ?></button>
                        <button class="ribbon_cancel_btn arp_copy_toggle_data_cancel" type="button"><?php esc_html_e('Cancel', 'ARPrice'); ?></button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Alert Box For Copy Toggle Data -->

        <!-- Migrate Template -->
        <div class="arp_admin_modal_overlay">
            <div class="arp_model_migrate_box" id="arp_migrate_table_design">
                <div class="modal_top_belt">
                    <span class="modal_title"><?php esc_html_e('Import table data','ARPrice'); ?></span>
                    <span id="nav_style_close" class="arp_modal_close_btn b-close"></span>
                </div>
                <div class="arp_modal_migrate_table_content">
                    <input type='hidden' id='arp_template_to_migrate' name='arp_template_to_migrate' />
                    <input type='hidden' id='arp_template_migration_process_step' value='1' />
                    <input type='hidden' id='arp_current_template' name='arp_current_template' value='<?php echo $reference_template.'||'.$id; ?>' />
                    <div class='arp_modal_container_loader' id='arp_modal_loader_for_migrate_design'></div>
                    <div class="arp_modal_inner_container_for_migrate_design migration_proccess_one" style="display:none;">
                        <div class="arp_modal_table_selection_container" id="arp_modal_table_selection_container">
                        </div>
                        <div class="arp_modal_table_comparison_container">
                        <div class="arp_modal_table_comparison_inner_container">
                            <div class="arp_modal_compare_feature_table">
                                <div class="arp_modal_compare_table_title"><?php esc_html_e('Features','ARPrice'); ?></div>
                                <div class="arp_modal_compare_table_container">
                                    <div class="arp_comparison_row arp_column_row_status"><?php esc_html_e('Total Columns','ARPrice'); ?>: <span id='total_cols'></span></div>
                                    <div class="arp_comparison_row arp_column_row_status"><?php esc_html_e('Total Rows','ARPrice'); ?>: <span id='total_rows'></span></div>
                                    <div class="arp_comparison_row"><?php esc_html_e('Caption Column','ARPrice'); ?></div>
                                    <div class="arp_comparison_row"><?php esc_html_e('Column Title','ARPrice'); ?></div>
                                    <div class="arp_comparison_row"><?php esc_html_e('Additional Shortcode','ARPrice'); ?></div>
                                    <div class="arp_comparison_row"><?php esc_html_e('Column Description','ARPrice'); ?></div>
                                    <div class="arp_comparison_row"><?php esc_html_e('Featured Text','ARPrice'); ?></div>
                                    <div class="arp_comparison_row"><?php esc_html_e('Column Price','ARPrice'); ?></div>
                                    <div class="arp_comparison_row"><?php esc_html_e('Column Body Content','ARPrice'); ?></div>
                                    <div class="arp_comparison_row"><?php esc_html_e('Column Footer Content','ARPrice'); ?></div>
                                    <div class="arp_comparison_row" style="border-bottom:none;"><?php esc_html_e('Column Button','ARPrice'); ?></div>
                                </div>
                            </div>
                            <div class="arp_modal_compare_current_table">
                                <div class="arp_modal_compare_table_title"><?php esc_html_e('Current Table','ARPrice'); ?></div>
                                <div class="arp_modal_compare_table_container">
                                    <?php
                                        $comparison_sections = $arp_pricingtable->arp_pricing_table_compare();
                                        $comparison = $comparison_sections[$reference_template];
                                    ?>
                                    <div class="arp_comparison_row arp_column_row_status"><?php esc_html_e('Total Columns','ARPrice'); ?>: <span id='total_cols'></span></div>
                                    <div class="arp_comparison_row arp_column_row_status"><?php esc_html_e('Total Rows','ARPrice'); ?>: <span id='total_rows'></span></div>
                                    <div class="arp_comparison_row">
                                        <?php
                                            if( isset($comparison['caption']) && $comparison['caption'] == true ){
                                                echo "<span class='arp_compare_status_icon arp_compare_check'></span>";
                                            } else {
                                                echo "<span class='arp_compare_status_icon arp_compare_cross'></span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="arp_comparison_row">
                                        <?php
                                            if( isset($comparison['header']) && $comparison['header'] == true ){
                                                echo "<span class='arp_compare_status_icon arp_compare_check'></span>";
                                            } else {
                                                echo "<span class='arp_compare_status_icon arp_compare_cross'></span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="arp_comparison_row">
                                        <?php
                                            if( isset($comparison['header_shortcode']) && $comparison['header_shortcode'] == true ){
                                                echo "<span class='arp_compare_status_icon arp_compare_check'></span>";
                                            } else {
                                                echo "<span class='arp_compare_status_icon arp_compare_cross'></span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="arp_comparison_row">
                                        <?php
                                            if( isset($comparison['column_description']) && $comparison['column_description'] == true ){
                                                echo "<span class='arp_compare_status_icon arp_compare_check'></span>";
                                            } else {
                                                echo "<span class='arp_compare_status_icon arp_compare_cross'></span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="arp_comparison_row">
                                        <?php
                                            if( isset($comparison['ribbon_support']) && $comparison['ribbon_support'] == true ){
                                                echo "<span class='arp_compare_status_icon arp_compare_check'></span>";
                                            } else {
                                                echo "<span class='arp_compare_status_icon arp_compare_cross'></span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="arp_comparison_row">
                                        <?php
                                            if( isset($comparison['price']) && $comparison['price'] == true ){
                                                echo "<span class='arp_compare_status_icon arp_compare_check'></span>";
                                            } else {
                                                echo "<span class='arp_compare_status_icon arp_compare_cross'></span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="arp_comparison_row">
                                        <?php
                                            if( isset($comparison['features']) && $comparison['features'] == true ){
                                                echo "<span class='arp_compare_status_icon arp_compare_check'></span>";
                                            } else {
                                                echo "<span class='arp_compare_status_icon arp_compare_cross'></span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="arp_comparison_row">
                                        <?php
                                            if( isset($comparison['footer']) && $comparison['footer'] == true ){
                                                echo "<span class='arp_compare_status_icon arp_compare_check'></span>";
                                            } else {
                                                echo "<span class='arp_compare_status_icon arp_compare_cross'></span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="arp_comparison_row" style="border-bottom:none;">
                                        <?php
                                            if( isset($comparison['button']) && $comparison['button'] == true ){
                                                echo "<span class='arp_compare_status_icon arp_compare_check'></span>";
                                            } else {
                                                echo "<span class='arp_compare_status_icon arp_compare_cross'></span>";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="arp_modal_compare_new_table">
                                <div class="arp_modal_compare_table_title"><?php esc_html_e('New Table','ARPrice'); ?></div>
                                <div class="arp_modal_compare_table_container">
                                    <div class="arp_comparison_row arp_column_row_status"><?php esc_html_e('Total Columns','ARPrice'); ?>: <span id='total_cols'></span></div>
                                    <div class="arp_comparison_row arp_column_row_status"><?php esc_html_e('Total Rows','ARPrice'); ?>: <span id='total_rows'></span></div>
                                    <div class="arp_comparison_row" id='caption_col'>
                                        <span class="arp_compare_status_icon"></span>
                                    </div>
                                    <div class="arp_comparison_row" id='col_header'>
                                        <span class="arp_compare_status_icon"></span>
                                    </div>
                                    <div class="arp_comparison_row" id='additional_shortcode'>
                                        <span class="arp_compare_status_icon"></span>
                                    </div>
                                    <div class="arp_comparison_row" id='column_description'>
                                        <span class="arp_compare_status_icon"></span>
                                    </div>
                                    <div class="arp_comparison_row" id='column_ribbon'>
                                        <span class="arp_compare_status_icon"></span>
                                    </div>
                                    <div class="arp_comparison_row" id='column_price'>
                                        <span class="arp_compare_status_icon"></span>
                                    </div>
                                    <div class="arp_comparison_row" id='column_body'>
                                        <span class="arp_compare_status_icon"></span>
                                    </div>
                                    <div class="arp_comparison_row" id='column_footer'>
                                        <span class="arp_compare_status_icon"></span>
                                    </div>
                                    <div class="arp_comparison_row" id='column_botton' style="border-bottom:none;">
                                        <span class="arp_compare_status_icon"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="arp_modal_table_comparison_confirmation">
                            <div class="arp_table_comparison_confirmation_loader">
                                <span class="arprice_import_data_loader_wrapper">
                                    <span class="left">
                                        <span class="anim"></span>
                                    </span>
                                    <span class="right">
                                        <span class="anim"></span>
                                    </span>
                                    <label id="count" class="count">100%</label>
                                </span>
                            </div>
                            <div class="arp_table_comparison_confirmation_message" id="migration_confirmation_msg"><?php esc_html_e('Analysing New Table','ARPrice'); ?>....</div>
                        </div>
                    </div>
                </div>
           
                <div class="arp_modal_migrate_table_footer">
                    <div class="arp_migrate_design_next_btn" id='arp_migrate_design_next_btn'><span id="arp_other_steps"><?php esc_html_e('Continue','ARPrice'); ?></span><span id="arp_final_steps" style="display: none;"><?php esc_html_e('Import','ARPrice'); ?></span></div>
                    <div class="arp_migrate_design_prev_btn" id='arp_migrate_design_prev_btn' style="display:none;"><?php esc_html_e('Back','ARPrice'); ?></div>
                    <div class="arp_migrate_design_loader_btn">

                    </div>
                </div>

            </div>
        </div>
        <!-- Migrate Template -->

        <!-- Confirm import -->
        <div class="arp_admin_modal_overlay">
            <div class="arp_model_delete_box" id="arp_confirm_importdata">
                <input type="hidden" id="import_table_id" value="" />
                <div class="modal_top_belt">
                    <span class="modal_title"><?php esc_html_e('Import New table data', 'ARPrice'); ?></span>
                    <span id="confirm_import_table" class="arp_modal_close_btn b-close"></span>
                </div>
                <div class="arp_modal_delete_content">
                    <div class="arp_delete_modal_msg"><?php esc_html_e('Are you sure you want to import new table data? this will overwrite current table data and will not be restore.', 'ARPrice'); ?></div>
                    <div class="arp_delete_modal_btn">
                        <button id="confirm_import_table"  type="button" class="ribbon_insert_btn import_template"><?php esc_html_e('Okay', 'ARPrice'); ?></button>
                        <button id="confirm_import_table"  class="ribbon_cancel_btn" type="button"><?php esc_html_e('Cancel', 'ARPrice'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Confirm import -->

        <?php
            $total_tabs = $arp_pricingtable->arp_toggle_step_name();
            $btn_float_style = ($arp_is_rtl) ? "float:left;" : "float:right;";
            $arp_label_btn_style = ($arp_is_rtl) ? "float:right;" : "float:left;";
            $general_settings = $general_option['general_settings'];
            $ref_template = $general_settings['reference_template'];
            $column_settings = $general_option['column_settings'];
        ?>
        <div class="arp_row_description_skeleton" style="display: none;">
            <div class="arp_row_wrapper" id="arp_{row_id}">

                <div class="col_opt_row arp_{row_id} arp_hide_on_caption width_342" id="arp_li_content_type{row_no}" style="display:none;">
                    <div class="col_opt_input_div width_342 col_opt_input_div_bottom_margin">
                        <span class="arp_price_radio_wrapper_standard arp_radio_dark_bg">
                            <input type="radio" class="arp_checkbox dark_bg arp_content_type_options arp_content_type_html" value="0" id="row_content_type0_{col_no}_{row_no}" name="row_{col_no}_content_type_{row_no}" data-column="main_{col_id}" data-row-id="{row_id}"/>
                            <span></span>
                            <label id="row_content_html_{col_no}_{row_no}" for="row_content_type0_{col_no}_{row_no}"><?php esc_html_e("HTML/Text", 'ARPrice') ?></label>
                        </span>
                        <span class="arp_price_radio_wrapper_standard arp_radio_dark_bg">
                            <input type="radio" class="arp_checkbox dark_bg arp_content_type_options arp_content_type_btn" value="1" id="row_content_type1_{col_no}_{row_no}" name="row_{col_no}_content_type_{row_no}" data-column="main_{col_id}" data-row-id="{row_id}"/>
                            <span></span>
                            <label id="row_content_btn_{col_no}_{row_no}" for="row_content_type1_{col_no}_{row_no}"><?php esc_html_e("Button", 'ARPrice') ?></label>
                        </span>
                    </div>
                </div>

                <div class="col_opt_row arp_{row_id} width_342" id="description{row_no}">
                    <div class="col_opt_title_div"><?php esc_html_e('Description','ARPrice'); ?></div>
                    <div class="col_opt_input_div width_342">   
                        <div class="arp_column_tabs_container">
                            <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                            
                            <ul class="column_tabs scrollable_tabs" id="scroll-tabs">
                                <?php
                                $total_tabs = $arp_pricingtable->arp_toggle_step_name();
                                $g = 0;
                                foreach($total_tabs as $key => $tab_name){
                                    $sel = '';
                                    if( $g == 0 ){
                                        $sel = 'selected';
                                    }
                                    
                                    $display = '';
                                    if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    }

                                    echo '<li class="option_title ' . $sel . ' ' . $tab_name[0] . '" data-id="' . $tab_name[1] . '" id="description_' . $key . '_tab" data-column="{col_no}" style="'.$display.'">';
                                    echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                    echo '</li>';
                                    $g++;
                                }
                                ?>
                            </ul>

                            <span class="arp_right_toggle_change_btn"> <i class="fas fa-chevron-right" aria-hidden="true"></i> </span>
                        </div>
                        <?php
                            $g = 0;
                            foreach( $total_tabs as $key => $tab_name ){
                                $sel = '';
                                if( $g == 0 ){
                                    $sel = 'selected';
                                }

                                $name = ($g == 0) ? 'row_{col_no}_description_{row_no}' : 'row_{col_no}_description_'.$tab_name[2].'_{row_no}';

                                $id = ($g == 0) ? 'arp_li_description' : 'row_description_'.$tab_name[2];

                                $display = '';
                                $first_step_content = "";
                                if( $g > 0 ){
                                    $display = "display:none;";
                                    $first_step_content = "data-first-step-name='row_{col_no}_description_{row_no}'";
                                }
                                echo '<div class="option_tab" id="description_'.$key.'_tab" style="'.$display.'">';
                                    echo '<textarea name="'.$name.'" '.$first_step_content.' id="'.$id.'" data-column-step="'.$tab_name[2].'" row-id="{row_no}" data-column="main_{col_id}" class="col_opt_textarea row_description_'.$tab_name[2].'"></textarea>';
                                echo '</div>';
                                $g++;
                            }
                        ?>
                    </div>
                </div>

                <div class="col_opt_row arp_{row_id} width_342" id="body_li_add_shortcode{row_no}">
                    <div class="col_opt_btn_div">

                        <button type='button' class='col_opt_btn_icon arp_add_row_object arptooltipster align_left' name='{col_no}_add_body_li_object_{row_no}' id='arp_add_row_object' data-insert='arp_{row_id} textarea#arp_li_description' data-column='main_{col_id}' title='<?php esc_html_e('Add Media', 'ARPrice'); ?>' data-title='<?php esc_html_e('Add Media', 'ARPrice'); ?>'>
                        </button>
                        <label style='float:left;width:10px;'>&nbsp;</label>	
                        <button type='button' class='col_opt_btn_icon arp_add_row_shortcode arptooltipster align_left' name='{col_no}_add_description_shortcode_btn_{row_no}' id='arp_add_row_shortcode' data-id='{col_no}' column-id='{col_no}' data-row-id="{row_id}" title='<?php esc_html_e('Add Font Icon', 'ARPrice'); ?>' data-title='<?php esc_html_e('Add Font Icon', 'ARPrice'); ?>'>
                        </button>

                        <div class='arp_font_awesome_model_box_container'></div>
                        <div class='arp_add_image_container arp_add_image_container_row_shortcode'>
                            <div class='arp_add_image_arrow'></div>
                            <div class='arp_add_img_content'>
                                <div class='arp_add_img_row'>
                                    <div class='arp_add_img_label'>
                                        <?php esc_html_e('Image URL', 'ARPrice'); ?>
                                        <span class='arp_model_close_btn' id='arp_add_image_container_row_shortcode'><i class='fas fa-times'></i></span>
                                    </div>
                                    <div class='arp_add_img_option'>
                                        <input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url_row_shortcode' name='arp_header_image_url' />
                                        <button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'><?php esc_html_e('Add File', 'ARPrice') ?></button>
                                    </div>
                                </div>
                                <div class='arp_add_img_row'>
                                    <div class='arp_add_img_label'>
                                        <?php esc_html_e('Dimension ( height X width )', 'ARPrice'); ?>
                                    </div>
                                    <div class='arp_add_img_option'>
                                        <input type='text' class='arp_modal_txtbox' id='arp_header_image_height_row_shortcode' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>
                                        <label>x</label>
                                        <input type='text' class='arp_modal_txtbox' id='arp_header_image_width_row_shortcode' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>
                                    </div>
                                </div>
                                <div class='arp_add_img_row' style='margin-top:10px;'>
                                    <div class='arp_add_img_label'>
                                        <button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn_row_shortcode">
                                            <?php esc_html_e('Add', 'ARPrice'); ?>
                                        </button>
                                        <button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn_row_shortcode">
                                            <?php esc_html_e('Remove', 'ARPrice'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row_options_width_height">
                <div class="col_opt_title_div two_column" style='width:200px;height:60px; margin-left: 10px;'><?php esc_html_e('Button Width','ARPrice'); ?></div>
                <div class="col_opt_input_div two_column" style="<?php echo $btn_float_style; ?>">
                    <div class="arp_button_slider" data-column="{col_no}" data-row-id='{row_id}' col-id='{col_id}'></div>
                    <input type="hidden" id="button_size_input1" name="button_size_row_{col_no}" data-column="main_{col_id}" data-row-id="{row_id}" col-id='{col_id}'/>
                </div>
                <div class="col_opt_input_div two_column" style="float:right;">
                    <div class="arp_slider_float_left">80px</div><div class="arp_slider_float_right" style='margin-right: 20px;'>200px</div>
                </div>

                <div class="col_opt_title_div two_column" style='width:200px; margin-left: 10px;'><?php esc_html_e('Button Height','ARPrice'); ?></div>
                <div class="col_opt_input_div two_column" style="float:right;">
                <div class="arp_button_height_slider" data-column="{col_no}" data-row-id='{row_id}' col-id='{col_id}'></div>
                    <input type="hidden" id="button_height_input1" name="button_height_row_{col_no}" data-column="main_{col_id}" data-row-id="{row_id}" col-id='{col_id}'/>
                </div>
                <div class="col_opt_input_div two_column" style="float:right;">
                    <div class="arp_slider_float_left">30px</div><div class="arp_slider_float_right" style='margin-right: 20px;'>60px</div>
                </div>
            </div>
            </div>

                <div class="col_opt_row arp_ok_div arp_{row_id} width_342" id="body_li_level_other_arp_ok_div__button_1">
                    <div class='col_opt_btn_div'>
                        <div class='col_opt_navigation_div'>
                            <i class='fas fa-arrow-up arp_navigation_arrow' id='row_up_arrow' data-column='{col_no}' 
                            data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_1'></i>&nbsp;
                            <i class='fas fa-arrow-down arp_navigation_arrow' id='row_down_arrow' data-column='{col_no}' 
                            data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_1'></i>&nbsp;
                            <i class='fas fa-arrow-left arp_navigation_arrow' id='row_left_arrow' data-column='{col_no}' 
                            data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_1'></i>&nbsp;
                            <i class='fas fa-arrow-right arp_navigation_arrow' id='row_right_arrow' data-column='{col_no}' 
                            data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_1'></i>&nbsp;
                        </div>
                        <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >
                            <?php esc_html_e('Ok', 'ARPrice'); ?>
                        </button>
                    </div>
                </div>         
        </div>

        
        <div class="arp_row_tooltip_skeleton" style="display: none;">
            <div class="col_opt_row arp_{row_id}" id="tooltip{row_no}">
                <div class="col_opt_title_div" id="col_opt_title_div"><?php esc_html_e('Tooltip','ARPrice'); ?></div>
                <div class="col_opt_input_div" id="col_opt_input_div">
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                            
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs">
                            <?php
                            $g = 0;
                            foreach($total_tabs as $key => $tab_name){
                                $sel = '';
                                if( $g == 0 ){
                                    $sel = 'selected';
                                }

                                $display = 'display:inline-block';
                                if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                }

                                echo '<li class="option_title ' . $sel . ' ' . $tab_name[0] . '" data-id="' . $tab_name[1] . '" id="tooltip_' . $key . '_tab" data-column="{col_no}" style="'.$display.'">';
                                echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                echo '</li>';
                                $g++;
                            }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                    <?php
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }

                            $name = ($g == 0) ? 'row_{col_no}_tooltip_{row_no}' : 'row_{col_no}_tooltip_'.$tab_name[2].'_{row_no}';
                            
                            $id = ($g == 0) ? 'arp_li_tooltip' : 'arp_li_tooltip_'.$tab_name[2];

                            $display = '';
                            $first_step_content = '';
                            if( $g > 0 ){
                                $display = 'display:none;';
                                $first_step_content = "data-first-step-name='row_{col_no}_tooltip_{row_no}'";

                            }

                            echo '<div class="option_tab" id="tooltip_'.$key.'_tab" style="'.$display.'">';
                                echo '<textarea name="'.$name.'" '.$first_step_content.' id="'.$id.'" data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" class="col_opt_textarea row_tooltip_'.$tab_name[2].'"></textarea>';
                            echo '</div>';
                            $g++;
                        }
                    ?>
                </div>
            </div>

            <div class="col_opt_row arp_{row_id}" id="arp_fontawesome{row_no}">
                <div class="col_opt_btn_div">
                    
                    <button type='button' class='col_opt_btn_icon align_left arptooltipster arp_add_tooltip_shortcode' name='{row_id}_add_tooltip_shortcode_btn_{row_no}' id='arp_add_tooltip_shortcode' col-id='{col_no}' data-id="{col_no}" data-row-id="tooltip_{row_no}" title='<?php esc_html_e('Add Font Icon', 'ARPrice'); ?>' data-title='<?php esc_html_e('Add Font Icon', 'ARPrice'); ?>'>
                    </button>

                    <div class='arp_font_awesome_model_box_container'></div>

                    
                </div>
            </div>

            <div class="col_opt_row arp_ok_div arp_{row_id} width_342" id="body_li_level_other_arp_ok_div__button_1{row_no}">
                <div class='col_opt_btn_div'>
                    <div class='col_opt_navigation_div'>
                        <i class='fas fa-arrow-up arp_navigation_arrow' id='row_up_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_2'></i>&nbsp;
                        <i class='fas fa-arrow-down arp_navigation_arrow' id='row_down_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_2'></i>&nbsp;
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='row_left_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_2'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='row_right_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_2'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >
                        <?php esc_html_e('Ok', 'ARPrice'); ?>
                    </button>
                </div>
            </div>
        </div>
        
        
        <div class="arp_row_css_property_skeleton" style="display: none;">
            <div class="col_opt_row arp_{row_id} width_342" id="custom_css{row_no}">
                <div class="col_opt_title_div" id="col_opt_title_div"><?php esc_html_e('CSS Property','ARPrice'); ?></div>
                
                <div class="col_opt_input_div width_342" id="col_opt_input_div">
                    <ul class="column_tabs_row_css" id="column_tabs_row_css_{row_no}">
                        <li class="option_title selected" id="normal_css" data-column="{col_no}" onClick='arp_row_css_tabs_select("normal_css", "hover_css","{col_no}","{row_no}")'><?php esc_html_e('Normal State','ARPrice'); ?></li>
                        <li class="option_title" id="hover_css" data-column="{col_no}" onClick='arp_row_css_tabs_select("hover_css", "normal_css","{col_no}","{row_no}")'><?php esc_html_e('Hover State','ARPrice'); ?></li>
                    </ul>
                    <textarea id="arp_row_level_custom_css" col-id="{col_no}" row-id="{row_no}" class="col_opt_textarea" name="row_{col_no}_custom_css_{row_no}"></textarea>
                    <textarea id="arp_row_level_hover_custom_css" col-id="{col_no}" row-id="{row_no}" class="col_opt_textarea" name="row_hover_{col_no}_custom_css_{row_no}" style="display:none;"></textarea>
                    
                </div>
                <div class="col_opt_input_div width_342" id="col_opt_input_div">
                    <div class='col_opt_title_div width_342'><?php esc_html_e('For Example','ARPrice'); ?></div>
                    <div class='arp_row_custom_css' data-code='color:#c9c9c9;' style='width:13%;'>color</div>
                    <div class='arp_row_custom_css' data-code='font-size:20px;' style='width:21%;'>font-size</div>
                    <div class='arp_row_custom_css' data-code='text-align:center;' style='width:25%;'>alignment</div>
                    <div class='arp_row_custom_css' data-code='font-weight:bold;'>font-weight</div>
                    
                </div>
            </div>

            <div class="col_opt_row arp_ok_div arp_{row_id} width_342" id="body_li_level_other_arp_ok_div__button_1{row_no}">
                <div class='col_opt_btn_div'>
                    <div class='col_opt_navigation_div'>
                        <i class='fas fa-arrow-up arp_navigation_arrow' id='row_up_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_3'></i>&nbsp;
                        <i class='fas fa-arrow-down arp_navigation_arrow' id='row_down_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_3'></i>&nbsp;
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='row_left_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_3'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='row_right_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_3'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >
                        <?php esc_html_e('Ok', 'ARPrice'); ?>
                    </button>
                </div>
            </div>
        </div>

        <div class="arp_button_image_skeleton_row" style="display:none;">
            <div class="col_opt_row arp_{row_id} width_342" id="button_image{row_no}">
                <div class="col_opt_title_div"><?php esc_html_e('Button Image URL', 'ARPrice'); ?></div>
                <div class="col_opt_input_div">
                     <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                            
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs">
                            <?php
                            $g = 0;
                            foreach($total_tabs as $key => $tab_name){
                                $sel = '';
                                if( $g == 0 ){
                                    $sel = 'selected';
                                }

                                $display = '';
                                if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                }

                                echo '<li class="option_title ' . $sel . ' ' . $tab_name[0] . '" data-id="' . $tab_name[1] . '" id="image_' . $key . '_tab" data-column="{col_no}" style="'.$display.'">';
                                echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                echo '</li>';
                                $g++;
                            }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"> <i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>

                    <?php
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }
                            
                            $name = ($g == 0) ? 'btn_img_url_row_{col_no}' : 'btn_img_url_row_'.$tab_name[2].'_{col_no}';

                            $id = ($g == 0) ? 'btn_img_url_row' : 'btn_img_url_row_'.$tab_name[2];

                            $display = '';
                            $first_step_content = '';
                            if( $g > 0 ){
                                $display = 'display:none;';
                                $first_step_content = "data-first-step-name='btn_img_url_row_{col_no}'";
                            }

                            echo '<div class="option_tab" id="image_'.$key.'_tab" style="'.$display.'" >';
                                echo '<input type="text" name="'.$name.'" id="'.$id.'" data-row-id="{row_id}" '.$first_step_content.' data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" data-column-id="main_{col_id}" class="col_opt_input arpbtn_img_url btn_img_url_'.$tab_name[2].'"/>';
                            

                                 $name1 = ($g == 0) ? 'add_button_scode' : 'add_button_scode_'.$tab_name[2];

                            echo '<button onclick="add_arp_button_scode_row(this, false);" type="button" class="col_opt_btn_icon align_left arptooltipster" name="'.$name1.'" id="add_button_scode" data-row-id="{row_id}" data-column-step="'.$tab_name[2].'" data-column-id="main_{col_id}" title="'.esc_html__("Add Button Image","ARPrice").'" data-title="'.esc_html__("Add Button Image","ARPrice").'"></button>';

                            $name3 = ($g == 0) ? 'remove_button_scode_row_{col_no}' : 'remove_button_scode_row_'.$tab_name[2].'_{col_no}';

                            $id3 = ($g == 0) ? 'arp_remove_btn_image_link_row' : 'arp_remove_btn_image_link_row_'.$tab_name[2];

                            echo '<div class="arp_google_font_preview_note" id="'.$id3.'" style="display:none;">';
                                echo '<a onClick="remove_arp_button_scode_row(this, false)" name="'.$name3.'" class="arp_google_font_preview_link" data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" data-row-id="{row_id}" style="cursor:pointer;">'.esc_html__("Remove Image","ARPrice").'</a>';
                            echo '</div>';

                                $name2 = ($g == 0) ? 'rpt_btn_image_url_row' : 'rpt_btn_image_url_row_'.$tab_name[2];

                                $id2 = ($g == 0) ? 'arp_btn_image_url_btn_skeleton_row' : 'arp_btn_image_url_btn_skeleton_row_'.$tab_name[2];

                            echo '<div class="arp_add_image_container add_btn_image_container">';
                        echo '<div class="arp_add_image_arrow"></div>';
                        echo '<div class="arp_add_img_content">';
                            echo '<div class="arp_add_img_row">';
                                echo '<div class="arp_add_img_label">'.esc_html__("Image URL","ARPrice").'<span class="arp_model_close_btn" id="add_btn_image_container"><i class="fas fa-times"></i></span></div>';
                                echo '<div class="arp_add_img_option">';
                                    echo '<input type="text" class="arp_modal_txtbox img sec_toggle_btn_'.$tab_name[2].'" id="'.$id2.'" data-row-id="{row_id}" name="'.$name2.'" data-column-id="main_{col_id}" data-column-step="'.$tab_name[2].'" data-column="main_{col_id}"/>';

                                    $id4 = ($g == 0) ? 'arp_btn_image_url_row' : 'arp_btn_image_url_row_'.$tab_name[2]; 

                                    $id8 = ($g == 0) ? 'arp_add_btn_image_link_row' : 'arp_add_btn_image_link_row_'.$tab_name[2];

                                    echo '<button id="'.$id8.'" data-column-id="main_{col_id}" data-row-id="{row_id}" data-insert="btn_image" data-id="'.$id4.'" type="button" data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" class="arp_modal_add_file_btn">'.esc_html__("Add File","ARPrice").'</button>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="arp_add_img_row" style="margin-top:10px;">';
                                echo '<div class="arp_add_img_label">';

                                $name5 = ($g == 0) ? 'rpt_image_btn_row_{col_no}' : 'rpt_image_btn_row_'.$tab_name[2].'_{col_no}';

                                $id5 = ($g == 0) ? 'rpt_add_btn_image_row' : 'rpt_add_btn_image_row_'.$tab_name[2];
                                    
                                    echo '<button type="button" onclick="add_arp_btn_shortcode_row(0,this);" class="arp_modal_insert_shortcode_btn add_btn_img" name="'.$name5.'" id="'.$id5.'" data-column-step="'.$tab_name[2].'" data-row-id="{row_id}" data-column-id="main_{col_id}" data-column="main_{col_id}">'.esc_html__("Add","ARPrice").'';
                                    echo '</button>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';

                            $name6 = ( $g == 0) ? 'button_img_height_row_{col_no}' : 'button_img_height_row_'.$tab_name[2].'_{col_no}';

                            $id6 = ( $g == 0) ? 'arpbtn_img_height_row' : 'arpbtn_img_height_row_'.$tab_name[2];

                                echo '<input type="hidden" class="arpbtn_img_height" id="'.$id6.'" data-row-id="{row_id}" name="'.$name6.'" data-column-step="'.$tab_name[2].'" />';

                            $name7 = ( $g == 0) ? 'button_img_width_row_{col_no}' : 'button_img_width_row_'.$tab_name[2].'_{col_no}';

                            $id7 = ( $g == 0) ? 'arpbtn_img_width_row' : 'arpbtn_img_width_row_'.$tab_name[2];

                                echo '<input type="hidden" class="arpbtn_img_width" id="'.$id7.'" data-row-id="{row_id}" name="'.$name7.'" data-column-step="'.$tab_name[2].'"/>';

                            echo '</div>';

                            $g++;
                        }
                    ?>

                
                </div>
            </div>

                 <div class="col_opt_row arp_ok_div arp_{row_id} width_342" id="body_li_level_other_arp_ok_div__button_1{row_no}">
                <div class='col_opt_btn_div'>
                    <div class='col_opt_navigation_div'>
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='row_left_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_4'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='row_right_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_4'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn'>
                        <?php esc_html_e('Ok', 'ARPrice'); ?>
                    </button>
                </div>
            </div>
        </div>

        <div class="arp_button_link_skeleton_row" style="display:none;">
            <div class="col_opt_row" id="redirect_link">
                <div class="col_opt_title_div"><?php esc_html_e('Button Link', 'ARPrice'); ?></div>
                <div class="col_opt_input_div">
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                        
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs" row-id="{row_no}">
                            <?php
                                $g = 0;
                                foreach($total_tabs as $key => $tab_name){
                                    $sel = '';
                                    if( $g == 0 ){
                                        $sel = 'selected';
                                    }

                                    $display = '';
                                    if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    }

                                    echo '<li class="option_title '.$sel.' '.$tab_name[0].'" data-id="'.$tab_name[1].'" id="button_link_'.$key.'_tab" data-column="{col_no}" row-id="{row_no}" style="'.$display.'">';
                                        echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';;
                                    echo '</li>';
                                    $g++;
                                }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                    <?php
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }
                            $name = ($g == 0) ? 'btn_link_row_{col_no}' : 'btn_link_row_'.$tab_name[2].'_{col_no}';

                            $id = ($g == 0) ? 'btn_link_row' : 'btn_link_row_'.$tab_name[2];

                            $display = '';
                            $first_step_content = "";
                            if( $g > 0 ){
                                $display = 'display:none;';
                                $first_step_content = "data-first-step-name='btn_link_row_{col_no}'";
                            }

                            echo '<div class="option_tab" id="button_link_'.$key.'_tab" row-id="{row_no}" style="'.$display.'">';
                                echo '<textarea name="'.$name.'" id="'.$id.'" '.$first_step_content.' data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" row-id="{row_no}" class="col_opt_textarea btn_link_'.$tab_name[2].'"></textarea>';
                            echo '</div>';

                            $g++;
                        }
                    ?>
                </div>
            </div>

            <div class="col_opt_row" id="external_btn" row-id="{row_no}">
                <div class="col_opt_title_div"><?php esc_html_e('Embed Script (e.g. PayPal Code)','ARPrice'); ?></div>
                <div class="col_opt_input_div">
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                            
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs" row-id="{row_no}">
                            <?php
                                $g = 0;
                                foreach( $total_tabs as $key => $tab_name ){
                                    $sel = '';
                                    if( $g == 0 ){
                                        $sel = 'selected';
                                    }

                                    $display = '';
                                    if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    }

                                    echo '<li class="option_title '.$sel.' '.$tab_name[0].'" data-id="'.$tab_name[1].'" id="button_embed_'.$key.'_tab" data-column="{col_no}" row-id="{row_no}" style="'.$display.'">';
                                        echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                    echo '</li>';
                                    $g++;
                                }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                    <?php
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }
                            
                            $name = ($g == 0) ? 'paypal_code_row_{col_no}' : 'paypal_code_row_'.$tab_name[2].'_{col_no}';

                            $id = ($g == 0) ? 'arp_paypal_code_row' : 'arp_paypal_code_row_'.$tab_name[2];
                            
                            $display = '';
                            $first_step_content = '';
                            if( $g > 0 ){
                                $display = 'display:none;';
                                $first_step_content = "data-first-step-name='paypal_code_row_{col_no}'";
                            }

                            echo '<div class="option_tab" id="button_embed_'.$key.'_tab" style="'.$display.'">';
                                echo '<textarea name="'.$name.'" id="'.$id.'" '.$first_step_content.' row-id="{row_no}" data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" class="col_opt_textarea paypal_code_'.$tab_name[2].'"></textarea>';
                            echo '</div>';
                            $g++;
                        }
                    ?>
                </div>
            </div>

            <div class="col_opt_row" id="hide_default_btn" row-id="{row_no}">
                <div class="col_opt_title_div two_column more_size"><?php esc_html_e('Hide default button', 'ARPrice'); ?></div>
                <div class="col_opt_input_div two_column small_size">
                    <div class="arp_checkbox_div">
                        <span class="arp_price_checkbox_wrapper">
                            <input type="checkbox" class="arp_checkbox dark_bg" id="arp_hide_default_btn_row" row-id="{row_no}" data-column="main_{col_id}" value="1" name="arp_hide_default_btn_row_{col_no}" />
                            <span></span>
                        </span>
                        <label class="arp_checkbox_label" for="arp_hide_default_btn_row"><?php esc_html_e('Yes','ARPrice'); ?></label>
                    </div>
                </div>
            </div>

            <div class="col_opt_row" id="open_in_new_window" row-id="{row_no}">
                <div class="col_opt_title_div two_column more_size"><?php esc_html_e('Open in New Tab?', 'ARPrice'); ?></div>
                <div class="col_opt_input_div two_column small_size">
                    <div class="arp_checkbox_div">
                        <span class="arp_price_checkbox_wrapper">
                            <input type="checkbox" class="arp_checkbox dark_bg" id="new_window_row" row-id="{row_no}" value="1" data-column="main_{col_id}" name="new_window_row_{col_no}" />
                            <span></span>
                        </span>
                        <label class="arp_checkbox_label" for="new_window_row"><?php esc_html_e('Yes','ARPrice'); ?></label>
                    </div>
                </div>
                <div class="column_opt_label_help opt_note_alignment">(<?php esc_html_e('This feature will work on the frontend only.', 'ARPrice') ?>)</div>
            </div>

            <div class="col_opt_row" id="open_in_new_window_actual" row-id="{row_no}">
                <div class="col_opt_title_div two_column more_size"><?php esc_html_e('Open in New Window?', 'ARPrice'); ?></div>
                <div class="col_opt_input_div two_column small_size">
                    <div class="arp_checkbox_div">
                        <span class="arp_price_checkbox_wrapper">
                            <input type="checkbox" class="arp_checkbox dark_bg" id="new_window_actual_row" row-id="{row_no}" data-column="main_{col_id}" value="1" name="new_window_actual_row_{col_no}" />
                            <span></span>
                        </span>
                        <label class="arp_checkbox_label" for="new_window_actual_row"><?php esc_html_e('Yes','ARPrice'); ?></label>
                    </div>
                </div>
                <div class="column_opt_label_help opt_note_alignment">(<?php esc_html_e('This feature will work on the frontend only.', 'ARPrice') ?>)</div>
            </div>

            <div class="col_opt_row" id="nofollow_link_option" row-id="{row_no}">
                <div class="col_opt_title_div two_column more_size"><?php esc_html_e('Add Nofollow Link?', 'ARPrice'); ?></div>
                <div class="col_opt_input_div two_column small_size">
                    <div class="arp_checkbox_div">
                        <span class="arp_price_checkbox_wrapper">
                            <input type="checkbox" class="arp_checkbox dark_bg" id="nofollow_link_row" row-id="{row_no}" value="1" data-column="main_{col_id}" name="nofollow_link_row_{col_no}" />
                            <span></span>
                        </span>
                        <label class="arp_checkbox_label" for="nofollow_link_row"><?php esc_html_e('Yes','ARPrice'); ?></label>
                    </div>
                </div>
            </div>

            <div class="col_opt_row arp_ok_div arp_{row_id} width_342" id="body_li_level_other_arp_ok_div__button_1{row_no}">
                <div class='col_opt_btn_div'>
                    <div class='col_opt_navigation_div'>
                        <i class='fas fa-arrow-up arp_navigation_arrow' id='row_up_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_5'></i>&nbsp;
                        <i class='fas fa-arrow-down arp_navigation_arrow' id='row_down_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_5'></i>&nbsp;
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='row_left_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_5'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='row_right_arrow' data-column='{col_no}' data-row-id='arp_{row_id}' data-button-id='body_li_level_options__button_5'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn'>
                        <?php esc_html_e('Ok', 'ARPrice'); ?>
                    </button>
                </div>
            </div>
        </div>

        <div class="arp_button_setting_skeleton" style="display:none;">
            <div class="col_opt_row width_342" id="button_text">
                <div class="col_opt_title_div width_342"><?php esc_html_e('Button Content','ARPrice'); ?></div>
                <div class="col_opt_input_div width_342">
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                            
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs">
                            <?php
                            $g = 0;
                            foreach($total_tabs as $key => $tab_name){
                                $sel = '';
                                if( $g == 0 ){
                                    $sel = 'selected';
                                }

                                $display = '';
                                if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                }

                                echo '<li class="option_title ' . $sel . ' ' . $tab_name[0] . '" data-id="' . $tab_name[1] . '" id="button_' . $key . '_tab" data-column="{col_no}" style="'.$display.'">';
                                echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                echo '</li>';
                                $g++;
                            }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"> <i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                    <?php
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }
                            
                            $name = ($g == 0) ? 'btn_content_{col_no}' : 'btn_content_'.$tab_name[2].'_{col_no}';

                            $id = ($g == 0) ? 'btn_content' : 'btn_content_'.$tab_name[2];

                            $display = '';
                            $first_step_content = '';
                            if( $g > 0 ){
                                $display = 'display:none;';
                                $first_step_content = "data-first-step-name='btn_content_{col_no}'";
                            }

                            echo '<div class="option_tab" id="button_'.$key.'_tab" style="'.$display.'" >';
                                echo '<textarea name="'.$name.'" id="'.$id.'" '.$first_step_content.' data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" class="col_opt_textarea btn_content_'.$tab_name[2].'"></textarea>';
                            echo '</div>';
                            $g++;
                        }
                    ?>
                </div>
            </div>

            <div class="col_opt_row width_342" id="add_icon">
                <div class="col_opt_btn_div">
                    <button type="button" onclick="add_arp_button_shortcode(this, false);" class="col_opt_btn_icon align_left arptooltipster" name="add_button_shortcode_{col_no}" id="add_button_shortcode" title="<?php esc_html_e('Add Font Icon', 'ARPrice') ?>" data-title="<?php esc_html_e('Add Font Icon', 'ARPrice') ?>" ></button>
                    <div class='arp_font_awesome_model_box_container'></div>
                </div>
            </div>
            
            <div class='col_opt_row width_342' id='button_size' style='display:none;'>
                <div class="col_opt_title_div two_column" style='width:200px;height:60px;'><?php esc_html_e('Button Width','ARPrice'); ?></div>
                <div class="col_opt_input_div two_column" style="<?php echo $btn_float_style; ?>">
                    <div class="arp_button_slider" data-column="{col_no}"></div>
                    <input type="hidden" id="button_size_input" name="button_size_{col_no}" data-column="main_{col_id}" />
                </div>
                <div class="col_opt_input_div two_column" style="float:right;">
                    <div class="arp_slider_float_left">80px</div><div class="arp_slider_float_right">200px</div>
                </div>

                <div class="col_opt_title_div two_column" style='width:200px;'><?php esc_html_e('Button Height','ARPrice'); ?></div>
                <div class="col_opt_input_div two_column" style="float:right;">
                    <div class="arp_button_height_slider" data-column="{col_no}"></div>
                    <input type="hidden" id="button_height_input" name="button_height_{col_no}" data-column="main_{col_id}" />
                </div>
                <div class="col_opt_input_div two_column" style="float:right;">
                    <div class="arp_slider_float_left">30px</div><div class="arp_slider_float_right">60px</div>
                </div>
            </div>

            <div class="col_opt_row width_342 arp_ok_div" id="button_options_other_arp_ok_div__button_1">
                <div class="col_opt_btn_div">
                    <div class="col_opt_navigation_div">
                        <i class="fas fa-arrow-left arp_navigation_arrow" id="button_left_arrow" data-column="{col_no}" data-button-id="footer_level_options__button_2"></i>&nbsp;
                        <i class="fas fa-arrow-right arp_navigation_arrow" id="button_right_arrow" data-column="{col_no}" data-button-id="footer_level_options__button_2"></i>
                    </div>
                    <button type="button" id="arp_ok_btn" class="col_opt_btn arp_ok_btn">
                        <?php esc_html_e('Ok', 'ARPrice'); ?>
                    </button>
                </div>
            </div>
        </div>

        <div class="arp_button_image_skeleton" style="display:none;">
            <div class="col_opt_row" id="button_image">
                <div class="col_opt_title_div"><?php esc_html_e('Button Image URL', 'ARPrice'); ?></div>
                <div class="col_opt_input_div">
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                            
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs">
                            <?php
                            $g = 0;
                            foreach($total_tabs as $key => $tab_name){
                                $sel = '';
                                if( $g == 0 ){
                                    $sel = 'selected';
                                }

                                $display = '';
                                if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                }

                                echo '<li class="option_title ' . $sel . ' ' . $tab_name[0] . '" data-id="' . $tab_name[1] . '" id="image_' . $key . '_tab" data-column="{col_no}" style="'.$display.'">';
                                echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                echo '</li>';
                                $g++;
                            }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"> <i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>

                     <?php
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }
                            
                            $name = ($g == 0) ? 'btn_img_url_{col_no}' : 'btn_img_url_'.$tab_name[2].'_{col_no}';

                            $id = ($g == 0) ? 'btn_img_url' : 'btn_img_url_'.$tab_name[2];

                            $display = '';
                            $first_step_content = '';
                            if( $g > 0 ){
                                $display = 'display:none;';
                                $first_step_content = "data-first-step-name='btn_img_url_{col_no}'";
                            }

                            echo '<div class="option_tab" id="image_'.$key.'_tab" style="'.$display.'" >';
                                echo '<input type="text" name="'.$name.'" id="'.$id.'" '.$first_step_content.' data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" data-column-id="main_{col_id}" class="col_opt_input arpbtn_img_url btn_img_url_'.$tab_name[2].'"/>';
                            

                                 $name1 = ($g == 0) ? 'add_button_scode' : 'add_button_scode_'.$tab_name[2];

                            echo '<button onclick="add_arp_button_scode(this, false);" type="button" class="col_opt_btn_icon align_left arptooltipster" name="'.$name1.'" id="add_button_scode" data-column-step="'.$tab_name[2].'" data-column-id="main_{col_id}" title="'.esc_html__("Add Button Image","ARPrice").'" data-title="'.esc_html__("Add Button Image","ARPrice").'"></button>';

                            $name3 = ($g == 0) ? 'remove_button_scode_{col_no}' : 'remove_button_scode_'.$tab_name[2].'_{col_no}';

                            $id3 = ($g == 0) ? 'arp_remove_btn_image_link' : 'arp_remove_btn_image_link_'.$tab_name[2];

                            echo '<div class="arp_google_font_preview_note" id="'.$id3.'" style="display:none;">';
                                echo '<a onClick="remove_arp_button_scode(this, false)" name="'.$name3.'" class="arp_google_font_preview_link" data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" style="cursor:pointer;">'.esc_html__("Remove Image","ARPrice").'</a>';
                            echo '</div>';

                                $name2 = ($g == 0) ? 'rpt_btn_image_url' : 'rpt_btn_image_url_'.$tab_name[2];

                                $id2 = ($g == 0) ? 'arp_btn_image_url_btn_skeleton' : 'arp_btn_image_url_btn_skeleton_'.$tab_name[2];

                            echo '<div class="arp_add_image_container add_btn_image_container">';
                        echo '<div class="arp_add_image_arrow"></div>';
                        echo '<div class="arp_add_img_content">';
                            echo '<div class="arp_add_img_row">';
                                echo '<div class="arp_add_img_label">'.esc_html__("Image URL","ARPrice").'<span class="arp_model_close_btn" id="add_btn_image_container"><i class="fas fa-times"></i></span></div>';
                                echo '<div class="arp_add_img_option">';
                                    echo '<input type="text" class="arp_modal_txtbox img sec_toggle_btn_'.$tab_name[2].'" id="'.$id2.'" name="'.$name2.'" data-column-id="main_{col_id}" data-column-step="'.$tab_name[2].'" data-column="main_{col_id}"/>';

                                    $id4 = ($g == 0) ? 'arp_btn_image_url' : 'arp_btn_image_url_'.$tab_name[2]; 

                                    $id8 = ($g == 0) ? 'arp_add_btn_image_link' : 'arp_add_btn_image_link_'.$tab_name[2];

                                    echo '<button id="'.$id8.'" data-column-id="main_{col_id}" data-insert="btn_image" data-id="'.$id4.'" type="button" data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" class="arp_modal_add_file_btn">'.esc_html__("Add File","ARPrice").'</button>';
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="arp_add_img_row" style="margin-top:10px;">';
                                echo '<div class="arp_add_img_label">';

                                $name5 = ($g == 0) ? 'rpt_image_btn_{col_no}' : 'rpt_image_btn_'.$tab_name[2].'_{col_no}';

                                $id5 = ($g == 0) ? 'rpt_add_btn_image' : 'rpt_add_btn_image_'.$tab_name[2];
                                    
                                    echo '<button type="button" onclick="add_arp_btn_shortcode(0,this);" class="arp_modal_insert_shortcode_btn add_btn_img" name="'.$name5.'" id="'.$id5.'" data-column-step="'.$tab_name[2].'" data-column-id="main_{col_id}" data-column="main_{col_id}">'.esc_html__("Add","ARPrice").'';
                                    echo '</button>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';

                            $name6 = ( $g == 0) ? 'button_img_height_{col_no}' : 'button_img_height_'.$tab_name[2].'_{col_no}';

                            $id6 = ( $g == 0) ? 'arpbtn_img_height' : 'arpbtn_img_height_'.$tab_name[2];

                                echo '<input type="hidden" class="arpbtn_img_height" id="'.$id6.'" name="'.$name6.'" data-column-step="'.$tab_name[2].'" />';

                            $name7 = ( $g == 0) ? 'button_img_width_{col_no}' : 'button_img_width_'.$tab_name[2].'_{col_no}';

                            $id7 = ( $g == 0) ? 'arpbtn_img_width' : 'arpbtn_img_width_'.$tab_name[2];

                                echo '<input type="hidden" class="arpbtn_img_width" id="'.$id7.'" name="'.$name7.'" data-column-step="'.$tab_name[2].'"/>';

                            echo '</div>';

                            $g++;
                        }
                    ?>

                
                </div>
            </div>
            <div class="col_opt_row arp_ok_div" id="button_options_other_arp_ok_div__button_2">
                <div class="col_opt_btn_div">
                    <div class="col_opt_navigation_div">
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='button_left_arrow' data-column='{col_no}' data-button-id='footer_level_options__button_3'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='button_right_arrow' data-column='{col_no}' data-button-id='footer_level_options__button_3'></i>
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' ><?php esc_html_e('OK','ARPrice'); ?></button>
                </div>
            </div>
        </div>

        <div class="arp_button_link_skeleton" style="display:none;">
            <div class="col_opt_row" id="redirect_link">
                <div class="col_opt_title_div"><?php esc_html_e('Button Link', 'ARPrice'); ?></div>
                <div class="col_opt_input_div">
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                        
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs">
                            <?php
                                $g = 0;
                                foreach($total_tabs as $key => $tab_name){
                                    $sel = '';
                                    if( $g == 0 ){
                                        $sel = 'selected';
                                    }

                                    $display = '';
                                    if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    }

                                    echo '<li class="option_title '.$sel.' '.$tab_name[0].'" data-id="'.$tab_name[1].'" id="button_link_'.$key.'_tab" data-column="{col_no}" style="'.$display.'">';
                                        echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';;
                                    echo '</li>';
                                    $g++;
                                }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                    <?php
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }
                            $name = ($g == 0) ? 'btn_link_{col_no}' : 'btn_link_'.$tab_name[2].'_{col_no}';

                            $id = ($g == 0) ? 'btn_link' : 'btn_link_'.$tab_name[2];

                            $display = '';
                            $first_step_content = '';
                            if( $g > 0 ){
                                $display = 'display:none;';
                                $first_step_content = "data-first-step-name='btn_link_{col_no}'";
                            }

                            echo '<div class="option_tab" id="button_link_'.$key.'_tab" style="'.$display.'">';
                                echo '<textarea name="'.$name.'" id="'.$id.'" '.$first_step_content.' data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" class="col_opt_textarea btn_link_'.$tab_name[2].'"></textarea>';
                            echo '</div>';

                            $g++;
                        }
                    ?>
                </div>
            </div>

            <div class="col_opt_row" id="external_btn">
                <div class="col_opt_title_div"><?php esc_html_e('Embed Script (e.g. PayPal Code)','ARPrice'); ?></div>
                <div class="col_opt_input_div">
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                            
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs">
                            <?php
                                $g = 0;
                                foreach( $total_tabs as $key => $tab_name ){
                                    $sel = '';
                                    if( $g == 0 ){
                                        $sel = 'selected';
                                    }

                                    $display = '';
                                    if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    }

                                    echo '<li class="option_title '.$sel.' '.$tab_name[0].'" data-id="'.$tab_name[1].'" id="button_embed_'.$key.'_tab" data-column="{col_no}" style="'.$display.'">';
                                        echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                    echo '</li>';
                                    $g++;
                                }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                    <?php
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }
                            
                            $name = ($g == 0) ? 'paypal_code_{col_no}' : 'paypal_code_'.$tab_name[2].'_{col_no}';

                            $id = ($g == 0) ? 'arp_paypal_code' : 'arp_paypal_code_'.$tab_name[2];
                            
                            $display = '';
                            $first_step_content = '';
                            if( $g > 0 ){
                                $display = 'display:none;';
                                $first_step_content = "data-first-step-name='paypal_code_{col_no}'";
                            }

                            echo '<div class="option_tab" id="button_embed_'.$key.'_tab" style="'.$display.'">';
                                echo '<textarea name="'.$name.'" id="'.$id.'" '.$first_step_content.' data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" class="col_opt_textarea paypal_code_'.$tab_name[2].'"></textarea>';
                            echo '</div>';
                            $g++;
                        }
                    ?>
                </div>
            </div>

            <div class="col_opt_row" id="hide_default_btn">
                <div class="col_opt_title_div two_column more_size"><?php esc_html_e('Hide default button', 'ARPrice'); ?></div>
                <div class="col_opt_input_div two_column small_size">
                    <div class="arp_checkbox_div">
                        <span class="arp_price_checkbox_wrapper">
                            <input type="checkbox" class="arp_checkbox dark_bg" id="arp_hide_default_btn" data-column="main_{col_id}" value="1" name="arp_hide_default_btn_{col_no}" />
                            <span></span>
                        </span>
                        <label class="arp_checkbox_label" for="arp_hide_default_btn"><?php esc_html_e('Yes','ARPrice'); ?></label>
                    </div>
                </div>
            </div>

            <div class="col_opt_row" id="open_in_new_window">
                <div class="col_opt_title_div two_column more_size"><?php esc_html_e('Open in New Tab?', 'ARPrice'); ?></div>
                <div class="col_opt_input_div two_column small_size">
                    <div class="arp_checkbox_div">
                        <span class="arp_price_checkbox_wrapper">
                            <input type="checkbox" class="arp_checkbox dark_bg" id="new_window" value="1" data-column="main_{col_id}" name="new_window_{col_no}"/>
                            <span></span>
                        </span>
                        <label class="arp_checkbox_label" for="new_window"><?php esc_html_e('Yes','ARPrice'); ?></label>
                    </div>
                </div>
                <div class="column_opt_label_help opt_note_alignment">(<?php esc_html_e('This feature will work on the frontend only.', 'ARPrice') ?>)</div>
            </div>

            <div class="col_opt_row" id="open_in_new_window_actual">
                <div class="col_opt_title_div two_column more_size"><?php esc_html_e('Open in New Window?', 'ARPrice'); ?></div>
                <div class="col_opt_input_div two_column small_size">
                    <div class="arp_checkbox_div">
                        <span class="arp_price_checkbox_wrapper">
                            <input type="checkbox" class="arp_checkbox dark_bg" id="new_window_actual" data-column="main_{col_id}" value="1" name="new_window_actual_{col_no}" />
                            <span></span>
                        </span>
                        <label class="arp_checkbox_label" for="new_window_actual"><?php esc_html_e('Yes','ARPrice'); ?></label>
                    </div>
                </div>
                <div class="column_opt_label_help opt_note_alignment">(<?php esc_html_e('This feature will work on the frontend only.', 'ARPrice') ?>)</div>
            </div>

            <div class="col_opt_row" id="nofollow_link_option">
                <div class="col_opt_title_div two_column more_size"><?php esc_html_e('Add Nofollow Link?', 'ARPrice'); ?></div>
                <div class="col_opt_input_div two_column small_size">
                    <div class="arp_checkbox_div">
                        <span class="arp_price_checkbox_wrapper">
                            <input type="checkbox" class="arp_checkbox dark_bg" id="nofollow_link" value="1" data-column="main_{col_id}" name="nofollow_link_{col_no}" />
                            <span></span>
                        </span>
                        <label class="arp_checkbox_label" for="nofollow_link"><?php esc_html_e('Yes','ARPrice'); ?></label>
                    </div>
                </div>
            </div>

            <div class="col_opt_row arp_ok_div" id="button_options_other_arp_ok_div__button_4">
                <div class="col_opt_btn_div">
                    <div class="col_opt_navigation_div">
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='button_left_arrow' data-column='{col_no}' data-button-id='footer_level_options__button_4'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='button_right_arrow' data-column='{col_no}' data-button-id='footer_level_options__button_4'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn'><?php esc_html_e('Ok','ARPrice'); ?></button>
                </div>
            </div>
        </div>

        <div class="arp_footer_content_skeleton" style="display:none;">
            <div class="col_opt_row" id="footer_text">
                <div class="col_opt_title_div two_column"><?php esc_html_e('Footer Content', 'ARPrice'); ?></div>
                <div class="col_opt_input_div">
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                            
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs">
                            <?php
                                $g = 0;
                                foreach($total_tabs as $key => $tab_name){
                                    $sel = '';
                                    if( $g == 0 ){
                                        $sel = 'selected';
                                    }

                                    $display = '';
                                    if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    }

                                    echo '<li class="option_title '.$sel.' '.$tab_name[0].'" data-id="'.$tab_name[1].'" id="footer_'.$key.'_tab" data-column="{col_no}" style="'.$display.'">';
                                        echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                    echo '</li>';
                                    $g++;
                                }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                    <?php
                        $g = 0;
                        foreach($total_tabs as $key => $tab_name){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }

                            $name = ($g == 0) ? 'footer_content_{col_no}' : 'footer_content_'.$tab_name[2].'_{col_no}';
                            $id = ($g == 0) ? 'footer_content' : 'footer_content_'.$tab_name[2];

                            $display = '';
                            $first_step_content = "";
                            if( $g > 0 ){
                                $display = 'display:none;';
                                $first_step_content = "data-first-step-name='footer_content_{col_no}'";
                            }

                            echo '<div class="option_tab" id="footer_'.$key.'_tab" style="'.$display.'">';
                                echo '<textarea name="'.$name.'" id="'.$id.'" '.$first_step_content.' data-column-step="'.$tab_name[2].'"  data-column="main_{col_id}" class="col_opt_textarea footer_content_'.$tab_name[2].'"></textarea>';
                            echo '</div>';

                            $g++;
                        }
                    ?>
                </div>
            </div>

            <div class="col_opt_row arp_hide_on_caption" id="above_below_button">
                <div class="col_opt_title_div two_column"><?php esc_html_e('Position','ARPrice'); ?></div>
                <div class="col_opt_input_div col_opt_input_div_bottom_margin">
                    <?php
                        foreach ($arp_mainoptionsarr['general_options']['footer_content_position'] as $key => $above_below_array) {
                            echo '<span class="arp_price_radio_wrapper_standard arp_radio_dark_bg">';
                                echo '<input type="radio" class="arp_checkbox dark_bg" value="'.$key.'" id="footer_content_position_'.$key.'_{col_no}" name="footer_content_position_{col_no}" data-column="main_{col_id}" />';
                                echo '<span></span>';
                                echo '<label id="footer_content_position_'.$key.'_{col_no}" for="footer_content_position_'.$key.'_{col_no}">'.$above_below_array.'</label>';
                            echo '</span>';
                        }
                    ?>
                </div>
            </div>
            
            <div class="col_opt_row arp_show_on_caption" id="footer_text_alignment" style="display:none;">
                <div class="col_opt_title_div"><?php esc_html_e('Text Alignment','ARPrice'); ?></div>
                <div class="col_opt_input_div">
                    <?php if (is_rtl()) { ?>
                        <div class="arp_alignment_btn align_right_btn" data-align="right" id="align_right_btn" data-id="{col_no}" data-level="footer_section">
                            <i class='fas fa-align-right fa-flip-vertical'></i>
                        </div>

                        <div class="arp_alignment_btn align_center_btn" data-align="center" id="align_center_btn" data-id="{col_no}" data-level="footer_section">
                            <i class='fas fa-align-center fa-flip-vertical'></i>
                        </div>

                        <div class="arp_alignment_btn align_left_btn" data-align="left" id="align_left_btn" data-id="{col_no}" data-level="footer_section">
                            <i class='fas fa-align-left fa-flip-vertical'></i>
                        </div>

                    <?php } else{?>
                        <div class="arp_alignment_btn align_left_btn" data-align="left" id="align_left_btn" data-id="{col_no}" data-level="footer_section">
                            <i class='fas fa-align-left fa-flip-vertical'></i>
                        </div>

                        <div class="arp_alignment_btn align_center_btn" data-align="center" id="align_center_btn" data-id="{col_no}" data-level="footer_section">
                            <i class='fas fa-align-center fa-flip-vertical'></i>
                        </div>

                        <div class="arp_alignment_btn align_right_btn" data-align="right" id="align_right_btn" data-id="{col_no}" data-level="footer_section">
                            <i class='fas fa-align-right fa-flip-vertical'></i>
                        </div>
                    <?php } ?>
                    
                    <input type="hidden" id="arp_footer_text_alignment" name="arp_footer_text_alignment_{col_no}" />
                </div>
            </div>
            <div class="col_opt_row arp_show_on_caption" id="footer_level_options_font_family" style="display:none;">
                <div class="col_opt_title_div"><?php esc_html_e('Font Family','ARPrice'); ?></div>
                <div class="col_opt_input_div">
                    <input type="hidden" id="footer_level_options_font_family" name="footer_level_options_font_family_{col_no}" data-column="main_{col_id}" />
                    <dl class='arp_selectbox column_level_dd' data-name='footer_level_options_font_family_{col_no}' data-id='footer_level_options_font_family_{col_no}'>
                        <dt>
                            <span></span>
                            <input type='text' style='display:none;' value="" class='arp_autocomplete' />
                            <i class='fas fa-caret-down fa-lg'></i>
                        </dt>
                        <dd>
                            <ul data-id='footer_level_options_font_family' data-column='{col_id}'></ul>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class='col_opt_row arp_show_on_caption' id='footer_level_options_font_size' style="display:none;">
                <div class='btn_type_size'>
                    <div class='col_opt_title_div two_column'><?php esc_html_e('Font Size', 'ARPrice'); ?></div>
                    <div class='col_opt_input_div two_column'>
                        <input type='hidden' id='footer_level_options_font_size' data-column='main_{col_id}' name='footer_level_options_font_size_{col_no}' />
                        <dl class='arp_selectbox column_level_size_dd' data-name='footer_level_options_font_size_{col_no}' data-id='footer_level_options_font_size_{col_no}' style='width:115px;max-width:115px;'>
                            <dt>
                                <span></span>
                                <input type='text' style='display:none;' class='arp_autocomplete' />
                                <i class='fas fa-caret-down fa-lg'></i>
                            </dt>
                            <dd>
                                <?php
                                    $size_arr = array();
                                    echo "<ul data-id='footer_level_options_font_size' data-column='{col_id}'>";
                                        for ($s = 8; $s <= 20; $s++){
                                            $size_arr[] = $s;
                                        }
                                        for ($st = 22; $st <= 70; $st+=2){
                                            $size_arr[] = $st;
                                        }
                                        foreach ($size_arr as $size) {
                                            echo "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
                                        }
                                    echo "</ul>";
                                ?>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class='col_opt_row arp_show_on_caption' id='footer_level_options_font_style' style="display:none;">
                <div class='col_opt_title_div two_column'><?php esc_html_e('Font Style', 'ARPrice'); ?></div>
                <div class='col_opt_input_div' data-level='footer_level_options_font_style' level-id='footer_level_options_font_style'>
                    <div class='arp_style_btn arptooltipster' title='<?php esc_html_e('Bold', 'ARPrice'); ?>' data-title='<?php esc_html_e('Bold', 'ARPrice'); ?>' data-column='main_{col_id}' id='arp_style_bold' data-id='{col_no}'>
                        <i class='fas fa-bold'></i>
                    </div>

                    <div class='arp_style_btn arptooltipster' title='<?php esc_html_e('Italic', 'ARPrice'); ?>' data-title='<?php esc_html_e('Italic', 'ARPrice'); ?>' data-column='main_{col_id}' id='arp_style_italic' data-id='{col_no}'>
                        <i class='fas fa-italic'></i>
                    </div>

                    <div class='arp_style_btn arptooltipster' title='<?php esc_html_e('Underline', 'ARPrice'); ?>' data-title='<?php esc_html_e('Underline', 'ARPrice'); ?>' data-column='main_{col_id}' id='arp_style_underline' data-id='{col_noe}'>
                        <i class='fas fa-underline'></i>
                    </div>

                    <div class='arp_style_btn arptooltipster' title='<?php esc_html_e('Line-through', 'ARPrice'); ?>' data-title='<?php esc_html_e('Line-through', 'ARPrice'); ?>' data-column='main_{col_id}' id='arp_style_strike' data-id='{col_no}'>
                        <i class='fas fa-strikethrough'></i>
                    </div>

                    <input type='hidden' id='footer_level_options_font_style_bold' name='footer_level_options_font_style_bold_{col_no}' />
                    <input type='hidden' id='footer_level_options_font_style_italic' name='footer_level_options_font_style_italic_{col_no}' />
                    <input type='hidden' id='footer_level_options_font_style_decoration' name='footer_level_options_font_style_decoration_{col_no}' />
                </div>
            </div>
            <div class='col_opt_row arp_ok_div' id='footer_level_options_arp_ok_div__button_1'>
                <div class='col_opt_btn_div'>
                    <div class='col_opt_navigation_div'>
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='footer_left_arrow' data-column='{col_no}' data-button-id='footer_level_options__button_1'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='footer_right_arrow' data-column='{col_no}' data-button-id='footer_level_options__button_1'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn'><?php esc_html_e('Ok', 'ARPrice'); ?></button>
                </div>
            </div>
        </div>

        <div class="arp_pricing_content_skeleton" style="display:none;">
            <div class="col_opt_row" id="price_text">
                <div class="col_opt_title_div"><?php esc_html_e('Price Text','ARPrice'); ?></div>
                <div class="col_opt_input_div width_342">
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                            
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs">
                            <?php
                                $g = 0;
                                foreach($total_tabs as $key => $tab_name){
                                    $sel = '';
                                    if( $g == 0 ){
                                        $sel = 'selected';
                                    }

                                    $price_id = 'price_'.$key.'_tab';

                                    $display = '';
                                    if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    }
                                    
                                    echo '<li class="option_title '.$sel.' '.$tab_name[0].'" data-id="'.$tab_name[1].'" id="'.$price_id.'" data-column="{col_no}" style="'.$display.'">';
                                        echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                    echo "</li>";
                                    $g++;
                                }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                    <?php
                    $g = 0;
                    foreach( $total_tabs as $key => $tab_name ){
                        $sel = '';
                        if( $g == 0 ){
                            $sel = 'selected';
                        }

                        $name = ($g == 0) ? 'price_text_{col_no}' : 'price_text_'.$tab_name[3].'_step_{col_no}';

                        $id = ($g == 0) ? 'price_text_input' : 'price_text_'.$tab_name[3].'_step';

                        $display = '';
                        $first_step_content = '';
                        if( $g > 0 ){
                            $display = 'display:none;';
                            $first_step_content = "data-first-step-name='price_text_{col_no}'";
                        }

                        echo '<div class="option_tab" id="price_'.$key.'_tab" style="'.$display.'">';
                            echo '<textarea name="'.$name.'" id="'.$id.'" '.$first_step_content.' data-column="main_{col_id}" data-column-step="'.$tab_name[2].'" class="col_opt_textarea price_text_'.$tab_name[3].'_step col_opt_textarea_big"></textarea>';
                        echo '</div>';
                        $g++;
                    }
                    ?>
                    
                    <?php
                        if (isset($column_settings['toggle_column_animation']) && $column_settings['toggle_column_animation'] == 1) {
                            $arp_style = 'display: block;';
                        } else {
                            $arp_style = 'display: none;';
                        }
                    ?>
                    <div class="arp_toogle_price_note" id="arp_toogle_price_note" style="<?php echo $arp_style; ?>"><?php echo sprintf( esc_html__('Use class %s for price animation. It will only work with numbers. If you have the price with comma(,) as a decimal separator then add %s class in the span tag.', 'ARPrice'), '<b>arp_price_amount</b>', '<b>arp_comma_decimal</b>'); ?></div>
                    <div class="col_opt_button">
                        <?php
                        if( 'arptemplate_25' != $ref_template){

                            if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {
                                echo "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_{col_no}' id='add_arp_object' data-insert='price_text_input' data-column='main_{col_id}' title='" . esc_html__('Add Media', 'ARPrice') . "' data-title='" . esc_html__('Add Media', 'ARPrice') . "'></button>";

                                echo "<label style='{$arp_label_btn_style} width:10px;'>&nbsp;</label>";
                                $arp_pricing_font_awesome_icon = "";
                            }

                            if ( isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])){

                                echo "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_{col_no}' id='add_header_fontawesome' data-insert='price_text_input' data-column='main_{col_id}' title='" . esc_html__('Add Font Icon', 'ARPrice') . "' data-title='" . esc_html__('Add Font Icon', 'ARPrice') . "' ></button>";

                                echo "<div class='arp_font_awesome_model_box_container'></div>";
                            }
                        }
                        ?>
                        <?php foreach ($total_tabs as $key => $tab_name) { ?>
                            <div class='arp_add_image_container arp_add_image_container_<?php echo $tab_name[2]; ?>'>
                                <div class='arp_add_image_arrow'></div>
                                <div class='arp_add_img_content'>

                                    <div class='arp_add_img_row'>
                                        <div class='arp_add_img_label'>
                                            <?php esc_html_e('Image URL', 'ARPrice'); ?>
                                            <span class='arp_model_close_btn' id='arp_add_image_container_<?php echo $tab_name[2]; ?>'><i class='fas fa-times'></i></span>
                                        </div>
                                        <div class='arp_add_img_option'>
                                            <input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url_price_<?php echo $tab_name[2]; ?>' name='arp_header_image_url' />
                                            <button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>
                                                <?php esc_html_e('Add File', 'ARPrice'); ?>
                                            </button>
                                        </div>
                                    </div>

                                    <div class='arp_add_img_row'>
                                        <div class='arp_add_img_label'>
                                            <?php esc_html_e('Dimension ( height X width )', 'ARPrice'); ?>
                                        </div>
                                        <div class='arp_add_img_option'>
                                            <input type='text' class='arp_modal_txtbox' id='arp_header_image_height_price_<?php echo $tab_name[2]; ?>' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>
                                            <label>x</label>
                                            <input type='text' class='arp_modal_txtbox' id='arp_header_image_width_price_<?php echo $tab_name[2]; ?>' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>
                                        </div>
                                    </div>

                                    <div class='arp_add_img_row' style='margin-top:10px;'>
                                        <div class='arp_add_img_label'>
                                            <button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn_<?php echo $tab_name[2]; ?>">
                                                <?php esc_html_e('Add', 'ARPrice'); ?>
                                            </button>
                                            <button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn_<?php echo $tab_name[2]; ?>">
                                                <?php esc_html__('Remove', 'ARPrice'); ?>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
                if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_shortcode_customization_style_div', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {

                    $arprice_customization_style = $arprice_default_settings->arp_shortcode_custom_type();

                    if ($reference_template == 'arptemplate_26') {
                        unset($arprice_customization_style['none']);
                    }

                    echo "<div class='col_opt_row width_342' id='arp_shortcode_customization_style_div'>";
                        
                        echo "<div class='col_opt_title_div' style='width : 20%;margin-top:6px;'>" . esc_html__('Style', 'ARPrice') . "</div>";
                        
                        $float_style = ($arp_is_rtl) ? "float:left;" : "float:right;";
                        
                        echo "<div class='col_opt_input_div' style='width : 58%;{$float_style}'>";

                            echo "<input type='hidden' id='arp_shortcode_customization_style' name='arp_shortcode_customization_style_{col_no}' data-column='main_{col_id}' />";
                            echo "<dl class='arp_selectbox column_level_size_dd' data-name='arp_shortcode_customization_style_{col_no}' data-id='arp_shortcode_customization_style_{col_no}' style='width:190px;'>";
                                echo "<dt style='width : 180px;'><span></span><input type='text' style='display:none;' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
                                echo "<dd style='width : 195px;'>";
                                    echo "<ul data-id='arp_shortcode_customization_style' data-column='{col_id}'>";
                                    foreach ($arprice_customization_style as $key => $style) {
                                        echo "<li data-value='" . $key . "' data-label='" . $style['name'] . "'>" . $style['name'] . "</li>";
                                    }
                                    echo "</ul>";
                                echo "</dd>";
                            echo "</dl>";
                        echo "</div>";
                    echo "</div>";
                }

                if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_shortcode_customization_size_div', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {
                    echo "<div class='col_opt_row width_342' id='arp_shortcode_customization_size_div'>";

                        echo "<div class='col_opt_title_div' style='width : 40%;margin-top:6px;'>" . esc_html__('Size', 'ARPrice') . "</div>";

                        $float_style = ($arp_is_rtl) ? "float:left;" : "float:right;";
                        echo "<div class='col_opt_input_div' style='width : 43%; {$float_style}'>";

                            echo "<input type='hidden' id='arp_shortcode_customization_size' name='arp_shortcode_customization_size_{col_no}' data-column='main_{col_id}' />";
                            echo "<dl class='arp_selectbox column_level_size_dd' data-name='arp_shortcode_customization_size_{col_no}' data-id='arp_shortcode_customization_size_{col_no}' style='width:190px;'>";
                                echo "<dt style='width : 130px;'><span></span><input type='text' style='display:none;' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
                                echo "<dd style='width : 146px;'>";
                                    echo "<ul data-id='arp_shortcode_customization_size' data-column='{col_id}'>";
                                        $arprice_customization_size = isset($arp_coloptionsarr['column_button_options']['button_size']) ? $arp_coloptionsarr['column_button_options']['button_size'] : '';
                                        foreach ($arprice_customization_size as $key => $style) {
                                            echo "<li data-value='" . $key . "' data-label='" . $style . "'>" . $style . "</li>";
                                        }
                                    echo "</ul>";
                                echo "</dd>";
                            echo "</dl>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>
            <div class='col_opt_row arp_ok_div width_342' id='pricing_level_other_arp_ok_div__button_1' style='display:none;'>
                <div class='col_opt_btn_div'>
                    <div class='col_opt_navigation_div'>
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='price_left_arrow' data-column='{col_no}' data-button-id='pricing_level_options__button_1'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='price_right_arrow' data-column='{col_no}' data-button-id='pricing_level_options__button_1'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >
                        <?php esc_html_e('Ok', 'ARPrice'); ?>
                    </button>
                </div>
            </div>
        </div>

        <div class="arp_header_section_skeleton" style="display:none;">
            <div class="col_opt_row" id="column_title">
                <div class="col_opt_title_div"><?php esc_html_e('Column Title', 'ARPrice'); ?></div>
                <div class="col_opt_input_div">
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                            
                        <ul class="column_tabs scrollable_tabs" id="scroll-tabs">
                            <?php
                                $g = 0;
                                foreach ($total_tabs as $key => $tab_name) {
                                    $sel = '';
                                    if( $g == 0 ){
                                        $sel = 'selected';
                                    }

                                    $display = '';
                                    if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                        $display = 'display:none;';
                                    }

                                    echo '<li class="option_title '.$sel.' '.$tab_name[0].'" data-id="'.$tab_name[1].'" id="header_{wrapper_key}_'.$key.'_tab" data-column="{col_no}" style="'.$display.'">';
                                        echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';;
                                    echo '</li>';
                                    $g++;
                                }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                    <?php
                        $g = 0;
                        foreach( $total_tabs as $key => $tab_name ){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }

                            $name = ($g == 0) ? '{col_title_name}_{col_no}' : '{col_title_name}_'.$tab_name[2].'_{col_no}';

                            $id = ($g == 0) ? '{column_title_id}' : '{column_title_id}_'.$tab_name[2];

                            $wrapper_id = 'header_{wrapper_key}_'.$key.'_tab';
                            $textarea_cls = '{column_title_input_cls}_'. $tab_name[2];

                            $display = "";
                            $first_step_content = "";
                            if( $g > 0 ){
                                $display = "display:none;";
                                $first_step_content = "data-first-step-name='{col_title_name}_{col_no}'";
                            }

                            echo '<div class="option_tab" id="'.$wrapper_id.'" style="'.$display.'">';
                                echo '<textarea name="'.$name.'" id="'.$id.'" data-column="main_{col_id}" data-column-step="'.$tab_name[2].'" '.$first_step_content.' class="col_opt_textarea '.$textarea_cls.'"></textarea>';
                            echo '</div>';

                            $g++;
                        }
                    ?>
                </div>
                <div class="col_opt_button arp_show_on_caption">
                    <?php
                        if (isset( $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['caption_column_buttons']['header_level_options__button_1'] ) && is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['caption_column_buttons']['header_level_options__button_1'])) {
                            if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['caption_column_buttons']['header_level_options__button_1'])) {
                                echo "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_{col_no}' id='add_arp_object' data-insert='column_caption_title_input' data-column='main_{col_id}' title='" . esc_html__('Add Media', 'ARPrice') . "' data-title='" . esc_html__('Add Media', 'ARPrice') . "'>";
                                echo "</button>";
                                echo "<label style='{$arp_label_btn_style} width:10px;'>&nbsp;</label>";

                                echo "<div class='arp_add_image_container'>";
                                echo "<div class='arp_add_image_arrow'></div>";
                                echo "<div class='arp_add_img_content'>";

                                echo "<div class='arp_add_img_row'>";
                                echo "<div class='arp_add_img_label'>";
                                echo esc_html__('Image URL', 'ARPrice');
                                echo "<span class='arp_model_close_btn' id='arp_add_image_container'><i class='fas fa-times'></i></span>";
                                echo "</div>";
                                echo "<div class='arp_add_img_option'>";
                                echo "<input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url_caption' name='arp_header_image_url' />";
                                echo "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
                                echo esc_html__('Add File', 'ARPrice');
                                echo "</button>";
                                echo "</div>";
                                echo "</div>";

                                echo "<div class='arp_add_img_row'>";
                                echo "<div class='arp_add_img_label'>";
                                echo esc_html__('Dimension ( height X width )', 'ARPrice');
                                echo "</div>";
                                echo "<div class='arp_add_img_option'>";
                                echo "<input type='text' class='arp_modal_txtbox' id='arp_header_image_height_caption' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>";
                                echo "<label>x</label>";
                                echo "<input type='text' class='arp_modal_txtbox' id='arp_header_image_width_caption' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>";
                                echo "</div>";
                                echo "</div>";

                                echo "<div class='arp_add_img_row' style='margin-top:10px;'>";
                                echo "<div class='arp_add_img_label'>";
                                echo '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn">';
                                echo esc_html__('Add', 'ARPrice');
                                echo '</button>';
                                echo '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn_header_show_caption">';
                                echo esc_html__('Remove', 'ARPrice');
                                echo '</button>';
                                echo "</div>";
                                echo "</div>";

                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        if (isset( $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['caption_column_buttons']['header_level_options__button_1'] ) && is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['caption_column_buttons']['header_level_options__button_1'])) {
                            if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['caption_column_buttons']['header_level_options__button_1'])) {

                                echo "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_{col_no}' id='add_header_fontawesome_caption' data-insert='column_caption_title_input' data-column='main_{col_id}' title='" . esc_html__('Add Font Icon', 'ARPrice') . "' data-title='" . esc_html__('Add Font Icon', 'ARPrice') . "' >";
                                echo "</button>";
                            }
                        }

                        
                        echo "<div class='arp_font_awesome_model_box_container'></div>";
                    ?>
                </div>
                <div class="col_opt_button arp_hide_on_caption">
                    <?php
                        if (isset( $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_1'] ) && is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_1'])) {
                            if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_1'])) {
                                echo "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_{col_no}' id='add_arp_object' data-insert='column_title_input' data-column='main_{col_id}' title='" . esc_html__('Add Media', 'ARPrice') . "' data-title='" . esc_html__('Add Media', 'ARPrice') . "'>";
                                echo "</button>";
                                echo "<label style='{$arp_label_btn_style} width:10px;'>&nbsp;</label>";

                                echo "<div class='arp_add_image_container'>";
                                echo "<div class='arp_add_image_arrow'></div>";
                                echo "<div class='arp_add_img_content'>";

                                echo "<div class='arp_add_img_row'>";
                                echo "<div class='arp_add_img_label'>";
                                echo esc_html__('Image URL', 'ARPrice');
                                echo "<span class='arp_model_close_btn' id='arp_add_image_container'><i class='fas fa-times'></i></span>";
                                echo "</div>";
                                echo "<div class='arp_add_img_option'>";
                                echo "<input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url_hide_caption' name='arp_header_image_url' />";
                                echo "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
                                echo esc_html__('Add File', 'ARPrice');
                                echo "</button>";
                                echo "</div>";
                                echo "</div>";

                                echo "<div class='arp_add_img_row'>";
                                echo "<div class='arp_add_img_label'>";
                                echo esc_html__('Dimension ( height X width )', 'ARPrice');
                                echo "</div>";
                                echo "<div class='arp_add_img_option'>";
                                echo "<input type='text' class='arp_modal_txtbox' id='arp_header_image_height_hide_caption' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>";
                                echo "<label>x</label>";
                                echo "<input type='text' class='arp_modal_txtbox' id='arp_header_image_width_hide_caption' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>";
                                echo "</div>";
                                echo "</div>";

                                echo "<div class='arp_add_img_row' style='margin-top:10px;'>";
                                echo "<div class='arp_add_img_label'>";
                                echo '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn">';
                                echo esc_html__('Add', 'ARPrice');
                                echo '</button>';
                                echo '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn_header_hide_caption">';
                                echo esc_html__('Remove', 'ARPrice');
                                echo '</button>';
                                echo "</div>";
                                echo "</div>";

                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        if (isset( $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_1'] ) && is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_1'])) {
                            if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_1'])) {

                                echo "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_{col_no}' id='add_header_fontawesome' data-insert='column_title_input' data-column='main_{col_id}' title='" . esc_html__('Add Font Icon', 'ARPrice') . "' data-title='" . esc_html__('Add Font Icon', 'ARPrice') . "' >";
                                echo "</button>";
                            }
                        }
                        echo "<div class='arp_font_awesome_model_box_container'></div>";
                    ?>
                </div>
            </div>

            <div class="col_opt_row arp_show_on_caption" id="header_text_alignment" style="display:none;">
                <div class="col_opt_title_div"><?php esc_html_e('Text Alignment','ARPrice'); ?></div>
                <div class="col_opt_input_div">
                     <?php if (is_rtl()) { ?>
                        <div class="arp_alignment_btn align_right_btn" data-align="right" id="align_right_btn" data-id="{col_no}" data-level="header_section">
                            <i class='fas fa-align-right fa-flip-vertical'></i>
                        </div>

                        <div class="arp_alignment_btn align_center_btn" data-align="center" id="align_center_btn" data-id="{col_no}" data-level="header_section">
                            <i class='fas fa-align-center fa-flip-vertical'></i>
                        </div>
                        
                        <div class="arp_alignment_btn align_left_btn" data-align="left" id="align_left_btn" data-id="{col_no}" data-level="header_section">
                            <i class='fas fa-align-left fa-flip-vertical'></i>
                        </div>
                    <?php } else{?>
                        <div class="arp_alignment_btn align_left_btn" data-align="left" id="align_left_btn" data-id="{col_no}" data-level="header_section">
                            <i class='fas fa-align-left fa-flip-vertical'></i>
                        </div>

                        <div class="arp_alignment_btn align_center_btn" data-align="center" id="align_center_btn" data-id="{col_no}" data-level="header_section">
                            <i class='fas fa-align-center fa-flip-vertical'></i>
                        </div>

                        <div class="arp_alignment_btn align_right_btn" data-align="right" id="align_right_btn" data-id="{col_no}" data-level="header_section">
                            <i class='fas fa-align-right fa-flip-vertical'></i>
                        </div>
                    <?php } ?>
                    
                    <input type="hidden" id="arp_header_text_alignment" name="arp_header_text_alignment_{col_no}" />
                </div>
            </div>

            <div class='col_opt_row arp_show_on_caption' id='header_caption_font_family'>
                <div class='col_opt_title_div'><?php esc_html_e('Font Family', 'ARPrice'); ?></div>
                <div class='col_opt_input_div'>
                    <input type='hidden' id='header_font_family' name='header_font_family_{col_no}' data-column='main_{col_id}' />
                    <dl class='arp_selectbox column_level_dd' data-name='header_font_family_{col_no}' data-id='header_font_family_{col_no}'>
                        <dt>
                            <span></span>
                            <input type='text' style='display:none;' class='arp_autocomplete' />
                            <i class='fas fa-caret-down fa-lg'></i>
                        </dt>
                        <dd>
                            <ul data-id='header_font_family' data-column='{col_id}'></ul>
                        </dd>
                    </dl>
                    <!-- <div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_caption_header_font_family_preview' href='" . $googlefontpreviewurl . $columns['header_font_family'] . "'>" . esc_html__('Font Preview', 'ARPrice') . "</a></div>"; -->
                </div>
            </div>

            <div class='col_opt_row arp_show_on_caption' id='header_caption_font_size'>
                <div class='btn_type_size'>
                    <div class='col_opt_title_div two_column'><?php esc_html_e('Font Size', 'ARPrice'); ?></div>
                    <div class='col_opt_input_div two_column'>
                        <input type='hidden' id='header_font_size' name='header_font_size_{col_no}' data-column='main_{col_id}' />
                        <dl class='arp_selectbox column_level_size_dd' data-name='header_font_size_{col_no}' data-id='header_font_size_{col_no}' style='width:115px;max-width:115px;'>
                            <dt>
                                <span></span>
                                <input type='text' style='display:none;' class='arp_autocomplete' />
                                <i class='fas fa-caret-down fa-lg'></i>
                            </dt>
                            <dd>
                                <?php
                                    $size_arr = array();
                                ?>
                                <ul data-id='header_font_size' data-column='{col_id}'>
                                    <?php
                                        for ($s = 8; $s <= 20; $s++){
                                            $size_arr[] = $s;
                                        }
                                        for ($st = 22; $st <= 70; $st+=2){
                                            $size_arr[] = $st;
                                        }
                                        foreach ($size_arr as $size) {
                                            echo "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
                                        }
                                    ?>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class='col_opt_row arp_show_on_caption' id='header_caption_font_color'>
                <div class='col_opt_title_div two_column'><?php esc_html_e('Font Style', 'ARPrice'); ?></div>
                <div class='col_opt_input_div' data-level='header_level_options' level-id='header_button1' >
                    <div class='arp_style_btn arptooltipster' title='<?php esc_html_e('Bold', 'ARPrice'); ?>' data-title='<?php esc_html_e('Bold', 'ARPrice'); ?>' data-column='main_{col_id}' id='arp_style_bold' data-id='{col_no}'>
                        <i class='fas fa-bold'></i>
                    </div>

                    <div class='arp_style_btn arptooltipster' title='<?php esc_html_e('Italic', 'ARPrice'); ?>' data-title='<?php esc_html_e('Italic', 'ARPrice'); ?>' data-column='main_{col_id}' id='arp_style_italic' data-id='{col_no}'>
                        <i class='fas fa-italic'></i>
                    </div>

                    <div class='arp_style_btn arptooltipster' title='<?php esc_html_e('Underline', 'ARPrice'); ?>' data-title='<?php esc_html_e('Underline', 'ARPrice'); ?>' data-column='main_{col_id}' id='arp_style_underline' data-id='{col_no}'>
                        <i class='fas fa-underline'></i>
                    </div>

                    <div class='arp_style_btn arptooltipster' title='<?php esc_html_e('Line-through', 'ARPrice'); ?>' data-title='<?php esc_html_e('Line-through', 'ARPrice'); ?>' data-align='right' data-column='main_{col_id}' id='arp_style_strike' data-id='{col_no}'>
                        <i class='fas fa-strikethrough'></i>
                    </div>

                    <input type='hidden' id='header_style_bold' name='header_style_bold_{col_no}' />
                    <input type='hidden' id='header_style_italic' name='header_style_italic_{col_no}' />
                    <input type='hidden' id='header_style_decoration' name='header_style_decoration_{col_no}'/>
                </div>
            </div>

            <div class='col_opt_row arp_ok_div' id='header_level_caption_arp_ok_div__button_1' >
                <div class='col_opt_btn_div'>
                    <div class='col_opt_navigation_div'>
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='header_left_arrow' data-button-id='header_level_options__button_1' data-column='{col_no}'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='header_right_arrow' data-button-id='header_level_options__button_1' data-column='{col_no}'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn'>
                        <?php esc_html_e('Ok', 'ARPrice'); ?>
                    </button>
                </div>
            </div>
        </div>

        <div class="arp_header_object_skeleton" style="display:none;">
            <?php $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'] = isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2']) ? $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'] : "";
            if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {
                
                if (in_array('additional_shortcode', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {

                    if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2']) || in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {
                        $header_shortcode_txtarea_cls = 'editable_shortcode';
                    } else {
                        $header_shortcode_txtarea_cls = '';
                    }

                    echo "<div class='col_opt_row width_342' id='additional_shortcode'>";

                    echo "<div class='col_opt_title_div'>" . esc_html__('Additional Shortcode', 'ARPrice') . "</div>";
                    echo "<div class='col_opt_input_div width_342'>";
                    echo "<div class='arp_column_tabs_container'>";
                    echo '<span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>';
                    echo "<ul class='column_tabs scrollable_tabs' id='scroll-tabs'>";

                    $g = 0;
                    foreach($total_tabs as $key => $tab_name){
                        $sel = '';
                        if( $g == 0 ){
                            $sel = 'selected';
                        }

                        $display = '';
                        if ($general_option['general_settings']['arp_step_main'] == 2 && ($tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab')) {
                            $display = 'display:none;';
                        } elseif($general_option['general_settings']['arp_step_main'] == 3 && ($tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab')){
                            $display = 'display:none;';
                        } elseif($general_option['general_settings']['arp_step_main'] == 4 && ($tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab')){
                            $display = 'display:none;';
                        } elseif($general_option['general_settings']['arp_step_main'] == 5 && ($tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab')){
                            $display = 'display:none;';
                        } elseif($general_option['general_settings']['arp_step_main'] == 6 && ($tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab')){
                            $display = 'display:none;';
                        } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                            $display = 'display:none;';
                        }
                        
                        echo "<li class='option_title {$sel} {$tab_name[0]}' data-id='{$tab_name[1]}' id='header_shortcode_{$key}_tab' data-column='{col_no}' style='{$display}'>"; 
                            echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                        echo "</li>";
                        $g++;
                    }

                    echo "</ul>";
                    echo '<span class="arp_right_toggle_change_btn"> <i class="fas fa-chevron-right" aria-hidden="true"></i> </span>';
                    echo "</div>";
                    $g = 0;
                    foreach($total_tabs as $key => $tab_name){
                        $sel = '';
                        if( $g == 0 ){
                            $sel = 'selected';
                        }
                        
                        $name = ($g == 0) ? 'additional_shortcode_{col_no}' : 'additional_shortcode_'.$tab_name[2].'_{col_no}';

                        $id = ($g == 0) ? 'additional_shortcode_input' : 'additional_shortcode_input_'.$tab_name[2];

                        $display = '';
                        $first_step_content = '';
                        if( $g > 0 ){
                            $display = 'display:none;';
                            $first_step_content = "data-first-step-name='additional_shortcode_{col_no}'";
                        }

                        echo "<div class='option_tab' id='header_shortcode_{$key}_tab' style='{$display}'>";
                            echo "<textarea name='{$name}' id='{$id}' {$first_step_content} data-column='main_{col_id}' data-column-step='{$tab_name[2]}' class='col_opt_textarea header_shortcode_{$key} {$header_shortcode_txtarea_cls}'></textarea>";
                        echo "</div>";
                        $g++;
                    }                   

                    echo "</div>";

                    $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'] = isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2']) ? $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'] : array();

                    if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2']) || in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {
                        echo "<div class='col_opt_button width_342'>";

                        if ($ref_template == 'arptemplate_5' || $ref_template == 'arptemplate_7') {
                            echo "<button type='button' class='col_opt_btn_icon align_left arptooltipster add_header_shortcode' onclick='add_header_shortcode_fn(this);' name='add_header_shortcode_btn_{col_no}' id='add_header_shortcode' data-insert='additional_shortcode_input' title='" . esc_html__('Add Media', 'ARPrice') . "' data-title='" . esc_html__('Add Media', 'ARPrice') . "'>";

                            
                            echo "</button>";
                            echo "<label style='{$arp_label_btn_style} width:10px;'>&nbsp;</label>";
                        }

                        if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {
                            echo "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left add_header_shortcode' name='add_header_object_{col_no}' id='add_header_shortcode' data-insert='additional_shortcode_input' data-column='main_{col_id}' title='" . esc_html__('Add Media', 'ARPrice') . "' data-title='" . esc_html__('Add Media', 'ARPrice') . "'>";
                            echo "</button>";
                            echo "<label style='{$arp_label_btn_style} width:10px;'>&nbsp;</label>";
                        }

                        if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {
                            echo "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left add_header_shortcode' name='add_header_fontawesome_{col_no}' id='add_header_fontawesome' data-insert='additional_shortcode_input' data-column='main_{col_id}' title='" . esc_html__('Add Font Icon', 'ARPrice') . "' data-title='" . esc_html__('Add Font Icon', 'ARPrice') . "' >";
                            echo "</button>";

                            echo "<div class='arp_font_awesome_model_box_container'></div>";
                        }

                        echo "<div class='arp_add_image_container'>";
                        echo "<div class='arp_add_image_arrow'></div>";
                        echo "<div class='arp_add_img_content'>";

                        echo "<div class='arp_add_img_row'>";
                        echo "<div class='arp_add_img_label'>";
                        echo esc_html__('Image URL', 'ARPrice');
                        echo "<span class='arp_model_close_btn' id='arp_add_image_container'><i class='fas fa-times'></i></span>";
                        echo "</div>";
                        echo "<div class='arp_add_img_option'>";
                        echo "<input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url_addshortcode' name='arp_header_image_url' />";
                        echo "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
                        echo esc_html__('Add File', 'ARPrice');
                        echo "</button>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='arp_add_img_row'>";
                        echo "<div class='arp_add_img_label'>";
                        echo esc_html__('Dimension ( height X width )', 'ARPrice');
                        echo "</div>";
                        echo "<div class='arp_add_img_option'>";
                        echo "<input type='text' class='arp_modal_txtbox' id='arp_header_image_height_addshortcode' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>";
                        echo "<label>x</label>";
                        echo "<input type='text' class='arp_modal_txtbox' id='arp_header_image_width_addshortcode' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='arp_add_img_row' style='margin-top:10px;'>";
                        echo "<div class='arp_add_img_label'>";
                        echo '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn">';
                        echo esc_html__('Add', 'ARPrice');
                        echo '</button>';
                        echo '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn">';
                        echo esc_html__('Remove', 'ARPrice');
                        echo '</button>';
                        echo "</div>";
                        echo "</div>";

                        echo "</div>";
                        echo "</div>";

                        echo "</div>";
                    } else {
                        echo "<div class='col_opt_button'>";
                        echo "<button type='button' class='col_opt_btn_icon align_left arptooltipster add_header_shortcode' onclick='add_header_shortcode_fn(this);' name='add_header_shortcode_btn_{col_no}' id='add_header_shortcode' data-insert='additional_shortcode_input' title='" . esc_html__('Add Media', 'ARPrice') . "' data-title='" . esc_html__('Add Media', 'ARPrice') . "'>";
                        echo "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/audio-icon.png' />";
                        echo "</button>";
                        echo "</div>";
                    }
                    echo "</div>";
                }

                if (in_array('arp_shortcode_customization_style_div', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {
                    $arprice_customization_style = $arprice_default_settings->arp_shortcode_custom_type();
                    if ($reference_template == 'arptemplate_26') {
                        unset($arprice_customization_style['none']);
                    }
                    echo "<div class='col_opt_row width_342' id='arp_shortcode_customization_style_div'>";
                    echo "<div class='col_opt_title_div' style='width : 20%;margin-top:6px;'>" . esc_html__('Style', 'ARPrice') . "</div>";
                    $float_style = ($arp_is_rtl) ? "float:left;" : "float:right;";
                    echo "<div class='col_opt_input_div' style='width : 64%;{$float_style}'>";

                    echo "<input type='hidden' id='arp_shortcode_customization_style' name='arp_shortcode_customization_style_{col_no}' data-column='main_{col_id}' />";
                    echo "<dl class='arp_selectbox column_level_size_dd' data-name='arp_shortcode_customization_style_{col_no}' data-id='arp_shortcode_customization_style_{col_no}' style='width:190px;'>";
                    echo "<dt style='width : 197px;'><span></span><input type='text' style='display:none;' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
                    echo "<dd style='width : 213px;'>";
                    echo "<ul data-id='arp_shortcode_customization_style' data-column='{col_id}'>";

                    foreach ($arprice_customization_style as $key => $style) {
                        echo "<li class='arp_shortcode_nowrap' data-value='" . $key . "' data-label='" . $style['name'] . "'>" . $style['name'] . "</li>";
                    }
                    echo "</ul>";
                    echo "</dd>";
                    echo "</dl>";
                    echo "</div>";
                    echo "</div>";
                }

                if (in_array('arp_shortcode_customization_size_div', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {
                    echo "<div class='col_opt_row width_342' id='arp_shortcode_customization_size_div'>";


                    echo "<div class='col_opt_title_div' style='width : 40%;margin-top:6px;'>" . esc_html__('Size', 'ARPrice') . "</div>";
                    $float_style = ($arp_is_rtl) ? "float:left;" : "float:right;";
                    echo "<div class='col_opt_input_div' style='width : 43%; {$float_style}'>";

                    echo "<input type='hidden' id='arp_shortcode_customization_size' name='arp_shortcode_customization_size_{col_no}' data-column='main_{col_id}' />";
                    echo "<dl class='arp_selectbox column_level_size_dd' data-name='arp_shortcode_customization_size_{col_no}' data-id='arp_shortcode_customization_size_{col_no}' style='width:190px;'>";
                    echo "<dt style='width : 130px;'><span></span><input type='text' style='display:none;' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i></dt>";
                    echo "<dd style='width : 146px;'>";
                    echo "<ul data-id='arp_shortcode_customization_size' data-column='{col_id}'>";
                    $arprice_customization_size = isset($arp_coloptionsarr['column_button_options']['button_size']) ? $arp_coloptionsarr['column_button_options']['button_size'] : '';
                    foreach ($arprice_customization_size as $key => $style) {
                        echo "<li data-value='" . $key . "' data-label='" . $style . "'>" . $style . "</li>";
                    }
                    echo "</ul>";
                    echo "</dd>";
                    echo "</dl>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            ?>
            <div class='col_opt_row arp_ok_div width_342' id='header_level_other_arp_ok_div__button_2' style='display:none;'>
                <div class='col_opt_btn_div'>
                    <div class='col_opt_navigation_div'>
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='header_left_arrow' data-column='{col_no}' data-button-id='header_level_options__button_2'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='header_right_arrow' data-column='{col_no}' data-button-id='header_level_options__button_2'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' ><?php esc_html_e('Ok', 'ARPrice'); ?></button>
                </div>
            </div>
        </div>

        <div class="arp_col_description_skeleton" style="display:none;">
            <?php
                if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['column_description_level']['other_columns_buttons']['column_description_level__button_1']) && is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['column_description_level']['other_columns_buttons']['column_description_level__button_1'])) {
                    if (in_array('column_description', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['column_description_level']['other_columns_buttons']['column_description_level__button_1'])) {
                        echo "<div class='col_opt_row width_342' id='column_description'>";
                            echo "<div class='col_opt_title_div'>" . esc_html__('Column Description', 'ARPrice') . "</div>";
                            echo "<div class='col_opt_input_div width_342'>";
                                echo "<div class='arp_column_tabs_container'>";
                                    echo '<span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>';
                                    echo "<ul class='column_tabs scrollable_tabs' id='scroll-tabs'>";
                                        $g = 0;
                                        foreach($total_tabs as $key => $tab_name){
                                            $sel = '';
                                            if( $g == 0 ){
                                                $sel = 'selected';
                                            }

                                            $display = '';
                                            if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                                $display = 'display:none;';
                                            } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                                $display = 'display:none;';
                                            } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                                $display = 'display:none;';
                                            } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                                $display = 'display:none;';
                                            } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                                $display = 'display:none;';
                                            } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                                $display = 'display:none;';
                                            }
                                            
                                            echo "<li class='option_title {$sel} {$tab_name[0]}' data-id='{$tab_name[1]}' id='column_description_{$key}_tab' data-column='{col_no}' style='{$display}'>";
                                                echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                            echo "</li>";
                                            $g++;
                                        }
                                    echo "</ul>";
                                    echo '<span class="arp_right_toggle_change_btn"> <i class="fas fa-chevron-right" aria-hidden="true"></i> </span>';
                                echo "</div>";
                                $g = 0;
                                foreach($total_tabs as $key => $tab_name){
                                    $sel = '';
                                    if( $g == 0 ){
                                        $sel = 'selected';
                                    }
                                    
                                    $name = ($g == 0) ? 'arp_column_description_{col_no}' : 'arp_column_description_'.$tab_name[2].'_{col_no}';

                                    $id = ($g == 0) ? 'arp_column_description' : 'arp_column_description_'.$tab_name[2];

                                    $display = '';
                                    $first_step_content = '';
                                    if( $g > 0 ){
                                        $display = 'display:none;';
                                        $first_step_content = "data-first-step-name='arp_column_description_{col_no}'";
                                    }

                                    echo "<div class='option_tab' id='column_description_{$key}_tab' style='{$display}'>";
                                        echo "<textarea name='{$name}' id='{$id}' {$first_step_content} data-column-step='{$tab_name[2]}' data-column='main_{col_id}' class='col_opt_textarea arp_column_description_{$tab_name[2]}'></textarea>";
                                    echo "</div>";
                                    $g++;
                                }
                            echo "</div>";
                            echo "<div class='col_opt_button'>";
                                if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['column_description_level']['other_columns_buttons']['column_description_level__button_1'])) {
                                    echo "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_{col_no}' id='add_arp_object' data-insert='arp_column_description' data-column='main_{col_id}' title='" . esc_html__('Add Media', 'ARPrice') . "' data-title='" . esc_html__('Add Media', 'ARPrice') . "'></button>";
                                    echo "<label style='{$arp_label_btn_style} width:10px;'>&nbsp;</label>";
                                }

                            if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['column_description_level']['other_columns_buttons']['column_description_level__button_1'])) {
                                echo "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_{col_no}' id='add_header_fontawesome' data-insert='arp_column_description' data-column='main_{col_id}' title='" . esc_html__('Add Font Icon', 'ARPrice') . "' data-title='" . esc_html__('Add Font Icon', 'ARPrice') . "' ></button>";

                                echo "<div class='arp_font_awesome_model_box_container'></div>";
                            }

                            echo "<div class='arp_add_image_container'>";
                                echo "<div class='arp_add_image_arrow'></div>";
                                echo "<div class='arp_add_img_content'>";

                                    echo "<div class='arp_add_img_row'>";
                                        
                                        echo "<div class='arp_add_img_label'>";
                                            echo esc_html__('Image URL', 'ARPrice');
                                            echo "<span class='arp_model_close_btn' id='arp_add_image_container'><i class='fas fa-times'></i></span>";
                                        echo "</div>";

                                        echo "<div class='arp_add_img_option'>";
                                            echo "<input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url' name='arp_header_image_url' />";
                                                echo "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
                                                    echo esc_html__('Add File', 'ARPrice');
                                                echo "</button>";
                                            echo "</div>";
                                        echo "</div>";

                                        echo "<div class='arp_add_img_row'>";
                                            echo "<div class='arp_add_img_label'>";
                                                echo esc_html__('Dimension ( height X width )', 'ARPrice');
                                            echo "</div>";
                                            echo "<div class='arp_add_img_option'>";
                                                echo "<input type='text' class='arp_modal_txtbox' id='arp_header_image_height' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>";
                                                echo "<label>x</label>";
                                                echo "<input type='text' class='arp_modal_txtbox' id='arp_header_image_width' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>";
                                            echo "</div>";
                                        echo "</div>";

                                        echo "<div class='arp_add_img_row' style='margin-top:10px;'>";
                                            echo "<div class='arp_add_img_label'>";
                                                echo '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn">';
                                                    echo esc_html__('Add', 'ARPrice');
                                                echo '</button>';
                                                echo '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn">';
                                                    echo esc_html__('Remove', 'ARPrice');
                                                echo '</button>';
                                            echo "</div>";
                                        echo "</div>";

                                    echo "</div>";
                                echo "</div>";

                            echo "</div>";
                        echo "</div>";
                    }
                }

                echo "<div class='col_opt_row arp_ok_div width_342' id='column_description_level_other_arp_ok_div__button_1' style='display:none;'>";
                    echo "<div class='col_opt_btn_div'>";
                        echo "<div class='col_opt_navigation_div'>";
                            echo "<i class='fas fa-arrow-left arp_navigation_arrow' id='description_left_arrow' data-column='{col_no}' data-button-id='column_description_level__button_1'></i>&nbsp;";
                            echo "<i class='fas fa-arrow-right arp_navigation_arrow' id='description_right_arrow' data-column='{col_no}' data-button-id='column_description_level__button_1'></i>&nbsp;";
                        echo "</div>";
                        echo "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
                            echo esc_html__('Ok', 'ARPrice');
                        echo "</button>";
                    echo "</div>";
                echo "</div>";
            ?>
        </div>

        <div class="arp_colorpicker_skeleton" style="display: none;">
            <?php
                if( $caption_column == 1 ){
                    ?>
                    <div class='col_opt_row arp_show_on_caption' id='arp_custom_color_tab_column'>
                        <div class="col_opt_title_div" style="padding:5px 5px 10px !important;"><?php esc_html_e('Column Color Settings (Normal State)', 'ARPrice') ?></div>
                    </div>
                    <div class="col_opt_row arp_show_on_caption arp_caption_color" id="arp_normal_custom_color_tab_column" style="padding-bottom: 0 !important; ">
                        <div class="arp_color_wrapper_container arp_no_bottom_border">
                            <div class="col_opt_title_div two_column"></div>
                            <div class="col_opt_title_div first_picker two_column" data-id="background_color"><?php esc_html_e('Background', 'ARPrice'); ?></div>
                            <div class="col_opt_title_div second_picker two_column" data-id="font_color" style="padding-left:0px !important; margin-left: -3px;"><?php esc_html_e('Text Color', 'ARPrice'); ?></div>

                            <div class="col_opt_row sub_row" id="arp_header_color_div" style="display:none">
                                <div class="col_opt_title_div two_column"><?php esc_html_e('Header', 'ARPrice'); ?></div>
                                <div class="col_opt_input_div two_column first_picker header_background_color_div" id="header_background_color_div">
                                    <?php
                                        echo $arprice_form->font_color_new('header_background_color_{col_no}','main_{col_id}','','header_background_color','','header_background_color','general_color_box_background_color');
                                    ?>
                                </div>
                                <div class="col_opt_input_div two_column second_picker header_font_color_div" id="header_font_color_div">
                                    <?php echo $arprice_form->font_color_new('header_font_color_{col_id}', 'main_{col_id}', '', 'header_font_color', ''); ?>
                                </div>
                            </div>

                            <div class="col_opt_row sub_row" id="arp_footer_color_div" style="display:none">
                                <div class="col_opt_title_div two_column"><?php esc_html_e('Footer', 'ARPrice'); ?></div>
                                <div class="col_opt_input_div two_column first_picker footer_background_color_div" id="footer_background_color_div">
                                    <?php echo $arprice_form->font_color_new("footer_bg_color_{col_no}", "main_{col_id}", '', 'footer_background_color', '', 'footer_background_color_picker', ''); ?>
                                </div>
                                <div class="col_opt_input_div two_column second_picker footer_font_color_div" id="footer_font_color_div">
                                    <?php echo $arprice_form->font_color_new('footer_level_options_font_color_{col_no}', 'main_{col_id}', '', 'footer_level_options_font_color', ''); ?>
                                </div>
                            </div>

                            <div class="col_opt_row arp_show_on_caption" id="arp_body_background_color_div">
                                <div class="col_opt_title_div" style="padding-left: 10px !important;"><?php esc_html_e("Body Row Colors", 'ARPrice'); ?></div>
                                <div class="col_opt_title_div two_column"></div>
                                <div class="col_opt_title_div first_picker two_column" data-id="background_color"><?php esc_html_e('Background', 'ARPrice'); ?></div>
                                <div class="col_opt_title_div second_picker two_column" data-id="font_color" style="padding-left:0px !important; margin-left: -3px;"><?php esc_html_e('Text Color', 'ARPrice'); ?></div>
                            </div>

                            <div class="col_opt_row sub_row" id="arp_odd_color_div" style="display:none">
                                <div class="col_opt_title_div two_column"><?php esc_html_e('Odd', 'ARPrice'); ?></div>
                                <div class="col_opt_input_div two_column first_picker odd_background_color_div" id="odd_background_color_div">
                                    <?php echo $arprice_form->font_color_new('content_odd_color_{col_no}', 'main_{col_id}', '', 'content_odd_color', ''); ?>
                                </div>
                                <div class="col_opt_input_div two_column second_picker odd_font_color_div" id="odd_font_color_div">
                                    <?php echo $arprice_form->font_color_new('content_font_color_{col_no}', 'main_{col_id}', '', 'content_font_color', ''); ?>
                                </div>
                            </div>

                            <div class="col_opt_row sub_row" id="arp_even_color_div" style="display:none">
                                <div class="col_opt_title_div two_column"><?php esc_html_e('Even', 'ARPrice'); ?></div>
                                <div class="col_opt_input_div two_column first_picker even_background_color_div" id="even_background_color_div">
                                    <?php echo $arprice_form->font_color_new('content_even_color_{col_no}', 'main_{col_id}', '', 'content_even_color', ''); ?>
                                </div>
                                <div class="col_opt_input_div two_column second_picker even_font_color_div" id="even_font_color_div">
                                    <?php echo $arprice_form->font_color_new('content_even_font_color_{col_no}', 'main_{col_id}', '', 'content_even_font_color', ''); ?>
                                </div>
                            </div>
                       </div>

                    </div>
                    <div class="col_opt_row arp_show_on_caption arp_caption_color" id="arp_border_color_div" style="padding-top:0 !important; padding-bottom: 0 !important;">
                        <div class="arp_color_wrapper_container arp_no_top_border arp_no_bottom_border">
                            <div class="col_opt_title_div" style="padding-left: 15px !important;width:100%;box-sizing:border-box !important;"><?php esc_html_e("Border Colors", 'ARPrice'); ?></div>
                            <div class="col_opt_title_div two_column"></div>
                            <div class="col_opt_title_div first_picker two_column" data-id="background_color" style="text-align:center;"><?php esc_html_e('Column', 'ARPrice'); ?></div>
                            <div class="col_opt_title_div second_picker two_column" data-id="font_color" style="text-align:center;margin-left: -8px !important;"><?php esc_html_e('Row', 'ARPrice'); ?></div>
                       </div>
                    </div>
                    <div class="col_opt_row arp_show_on_caption arp_caption_color sub_row" id='arp_border_color_div_sub' style="display:none; padding-top:0 !important; border-top: none !important; margin-bottom: 10px;">
                        <div class="arp_color_wrapper_container arp_no_top_border">
                            <div class="col_opt_title_div two_column"></div>
                            <div class="col_opt_input_div two_column first_picker column_border_color_div" id="column_border_color_div" style="margin-left: 6px;">
                                <div class='color_picker color_picker_round jscolor opt_bg_box_alignment' data-jscolor='{hash:true,onFineChange:"arp_update_color(this,arp_caption_border_color_div)",valueElement:"arp_caption_border_color"}' data-id='arp_caption_border_color' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_caption_border_color_div)' jscolor-valueelement="arp_caption_border_color" data-column="main_{col_id}" data-column-id='arp_caption_border_color' id='arp_caption_border_color_div'></div>
                                <input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' id='arp_caption_border_color' />
                            </div>
                            <div class="col_opt_input_div two_column second_picker border_caption_color row_border_color_div" id="row_border_color_div" style="margin-right: 23px;">
                                <div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:"arp_update_color(this,arp_caption_row_border_color_div)",valueElement:"arp_caption_row_border_color"}'  data-column="main_{col_id}" data-id='arp_caption_row_border_color' data-column-id='arp_caption_row_border_color' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_caption_row_border_color_div)' jscolor-valueelement="arp_caption_row_border_color" id='arp_caption_row_border_color_div'></div>

                                <input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' name='arp_caption_row_border_color' id='arp_caption_row_border_color'  />
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            ?>

            <div class="col_opt_row row_dark arp_hide_on_caption" id="arp_custom_color_tab_column" style="padding: 7px 6px 0px 7px !important;">
                <div class='col_opt_title_div' style='padding:10px 5px 10px !important'><?php esc_html_e('Column Color Settings', 'ARPrice'); ?></div>
                <div class="col_opt_title_div two_column arp_color_tab_column selected" data-id="arp_normal" style="margin-left: 3px;">Normal</div>
                <div class="col_opt_title_div two_column arp_color_tab_column" data-id="arp_hover">Hover</div>
            </div>

            <div class="col_opt_row arp_hide_on_caption arp_column_colors" id="arp_normal_custom_color_tab_column" style="padding-top:0 !important;">

                <div class="arp_color_wrapper_container arp_no_top_border">
                    <div class="col_opt_title_div two_column"></div>
                    <div class="col_opt_title_div first_picker two_column" data-id="background_color"><?php esc_html_e('Background', 'ARPrice'); ?></div>
                    <div class="col_opt_title_div second_picker two_column" data-id="font_color" style="padding-left:2px !important;"><?php esc_html_e('Text Color', 'ARPrice'); ?></div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_column_color_div" style="display:none;">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Column', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker column_background_color_div" id="column_background_color_div">
                            <?php echo $arprice_form->font_color_new('column_background_color_{col_no}', 'main_{col_id}', '', 'column_background_color', '', 'background_column_picker column_level_background', 'general_color_box_background_color background_color_{col_id}'); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_header_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Header', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker header_background_color_div" id="header_background_color_div_other_col">
                            <?php echo $arprice_form->font_color_new('header_background_color_{col_no}', 'main_{col_id}', '', 'header_background_color', '', 'header_background_color', 'general_color_box_background_color'); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker header_font_color_div" id="header_font_color_div">
                            <?php echo $arprice_form->font_color_new('header_font_color_{col_no}', 'main_{col_id}', '', 'header_font_color', ''); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_shortcode_div" style="display:none">
                        <div class="col_opt_title_div two_column" style="line-height:1.5"><?php esc_html_e('Shortcode Section', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker arp_shortcode_background" id="arp_shortcode_background" style="display:none;">
                            <?php echo $arprice_form->font_color_new('shortcode_background_color_{col_no}', 'main_{col_id}', '', 'shortcode_background_color', '', 'shortcode_background_color', 'general_color_box_background_color'); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker arp_shortcode_font_color" id="arp_shortcode_font_color" style="display:none;">
                            <?php echo $arprice_form->font_color_new('shortcode_font_color_{col_no}', 'main_{col_id}', '', 'shortcode_font_color', ''); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_desc_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Description', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker desc_background_color_div" id="desc_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('column_desc_background_color_{col_no}', 'main_{col_id}', '', 'column_desc_background_color', ''); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker desc_font_color_div" id="desc_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('column_description_font_color_{col_no}', 'main_{col_id}', '', 'column_description_font_color', ''); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_price_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Pricing', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker price_background_color_div" id="price_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('price_background_color_{col_no}', 'main_{col_id}', '', 'price_background_color', '', 'background_column_picker', 'general_color_box_background_color'); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker price_font_color_div" id="price_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('price_font_color_{col_no}', 'main_{col_id}', '', 'price_font_color', ''); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_footer_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Footer', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker footer_background_color_div" id="footer_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new("footer_bg_color_{col_no}", "main_{col_id}", '', 'footer_background_color', '', 'footer_background_color_picker', ''); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker footer_font_color_div" id="footer_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('footer_level_options_font_color_{col_no}', 'main_{col_id}', '', 'footer_level_options_font_color', ''); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_button_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Button', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker button_background_color_div" id="button_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('button_background_color_{col_no}', 'main_{col_id}', '', 'button_background_color', '', 'background_column_picker button_background_color', 'general_color_box_background_color'); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker button_font_color_div" id="button_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('button_font_color_{col_no}', 'main_{col_id}', '', 'button_font_color', ''); ?>
                            <div class="col_opt_input_div" id="button_font_notice_div" style="display:none;">(For <br> Button <br>Hover)</div>
                        </div>
                    </div>

                    <div class="col_opt_row arp_hide_on_caption" id="arp_body_background_color_div">
                        <div class="col_opt_title_div"><?php esc_html_e("Body Row Colors", 'ARPrice'); ?></div>
                        <div class="col_opt_title_div two_column"></div>
                        <div class="col_opt_title_div first_picker two_column" data-id="background_color"><?php esc_html_e('Background', 'ARPrice'); ?></div>
                        <div class="col_opt_title_div second_picker two_column" data-id="font_color" style="padding-left:2px !important;"><?php esc_html_e('Text Color', 'ARPrice'); ?></div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_odd_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Odd', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker odd_background_color_div" id="odd_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('content_odd_color_{col_no}', 'main_{col_id}', '', 'content_odd_color', ''); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker odd_font_color_div" id="odd_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('content_font_color_{col_no}', 'main_{col_id}', '', 'content_font_color', ''); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_even_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Even', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker even_background_color_div" id="even_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('content_even_color_{col_no}', 'main_{col_id}', '', 'content_even_color', ''); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker even_font_color_div" id="even_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('content_even_font_color_{col_no}', 'main_{col_id}', '', 'content_even_font_color', ''); ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col_opt_row arp_hide_on_caption arp_column_colors" id="arp_hover_background_color_column" style="padding-top:0 !important;">
                <div class="arp_color_wrapper_container arp_no_top_border">
                    <div class="col_opt_title_div two_column"></div>
                    <div class="col_opt_title_div two_column" data-id="background_color"><?php esc_html_e('Background', 'ARPrice'); ?></div>
                    <div class="col_opt_title_div two_column" data-id="font_color" style="padding-left:2px !important;"><?php esc_html_e('Text Color', 'ARPrice'); ?></div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_column_hover_color_div_column" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Column', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker column_hover_background_color_div" id="column_hover_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('column_hover_background_color_{col_no}', 'main_{col_id}', '', 'column_hover_background_color', '', 'background_column_picker column_level_hover_background', 'general_color_box_background_color background_color_{col_id}'); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_header_hover_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Header', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker header_hover_background_color_div" id="header_hover_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('header_hover_background_color_{col_no}', 'main_{col_id}', '', 'header_hover_background_color', '', 'background_column_picker header_hover_background_color', 'general_color_box_background_color'); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker header_hover_font_color_div" id="header_hover_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('header_hover_font_color_{col_no}', 'main_{col_id}', '', 'header_hover_font_color', '', 'background_column_picker header_hover_font_color', 'general_color_box_background_color'); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_shortcode_hover_div" style="display:none">
                        <div class="col_opt_title_div two_column"  style="line-height:1.5"><?php esc_html_e('Shortcode Section', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker arp_shortcode_hover_background" id="arp_shortcode_hover_background" style="display:none;">
                            <?php echo $arprice_form->font_color_new('shortcode_hover_background_color_{col_no}', 'main_{col_id}', '', 'shortcode_hover_background_color', '', 'shortcode_hover_background_color', 'general_color_box_background_color'); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker arp_shortcode_hover_font_color" id="arp_shortcode_hover_font_color" style="display:none;">
                            <?php echo $arprice_form->font_color_new('shortcode_hover_font_color_{col_no}', 'main_{col_id}', '', 'shortcode_hover_font_color', ''); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_desc_hover_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Description', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker desc_hover_background_color_div" id="desc_hover_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('column_desc_hover_background_color_{col_no}', 'main_{col_id}', '', 'column_desc_hover_background_color', ''); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker desc_hover_font_color_div" id="desc_hover_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('column_description_hover_font_color_{col_no}', 'main_{col_id}', '', 'column_description_hover_font_color', '', 'background_column_picker column_description_hover_font_color', 'general_color_box_background_color'); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_price_hover_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Pricing', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker price_hover_background_color_div" id="price_hover_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('price_hover_background_color_{col_no}', 'main_{col_id}', '', 'price_hover_background_color', '', 'background_column_picker', 'general_color_box_background_color'); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker price_hover_font_color_div" id="price_hover_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('price_hover_font_color_{col_no}', 'main_{col_id}', '', 'price_hover_font_color', '', 'background_column_picker price_hover_font_color', 'general_color_box_background_color'); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_footer_hover_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Footer', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker footer_hover_background_color_div" id="footer_hover_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new("footer_hover_bg_color_{col_no}", "main_{col_id}", '', 'footer_hover_background_color', '', 'footer_hover_background_color_picker', ''); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker footer_hover_font_color_div" id="footer_hover_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('footer_level_options_hover_font_color_{col_no}', 'main_{col_id}', '', 'footer_hover_font_color', '', 'background_column_picker footer_hover_font_color', 'general_color_box_background_color'); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_hover_button_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Button', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker button_hover_background_color_div" id="button_hover_background_color_div" style="display:none;">
                             <?php echo $arprice_form->font_color_new('button_hover_background_color_{col_no}', 'main_{col_id}', '', 'button_hover_background_color', '', 'background_column_picker button_hover_background_color', 'general_color_box_background_color'); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker button_hover_font_color_div" id="button_hover_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('button_hover_font_color_{col_id}', 'main_{col_id}', '', 'button_hover_font_color', '', 'background_column_picker button_hover_font_color', 'general_color_box_background_color'); ?>
                        </div>
                    </div>

                    <div class="col_opt_row arp_hide_on_caption" id="arp_body_hover_background_color_div">
                        <div class="col_opt_title_div"><?php esc_html_e("Body Row Colors", 'ARPrice'); ?></div>
                        <div class="col_opt_title_div two_column"></div>
                        <div class="col_opt_title_div two_column" data-id="background_color"><?php esc_html_e('Background', 'ARPrice'); ?></div>
                        <div class="col_opt_title_div two_column" data-id="font_color" style="padding-left:2px !important;"><?php esc_html_e('Text Color', 'ARPrice'); ?></div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_odd_hover_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Odd', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker odd_hover_background_color_div" id="odd_hover_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('content_odd_hover_color_{col_no}', 'main_{col_id}', '', 'content_odd_hover_color', ''); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker odd_hover_font_color_div" id="odd_hover_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('content_hover_font_color_{col_no}', 'main_{col_id}', '', 'content_hover_font_color', '', 'background_column_picker content_hover_font_color', 'general_color_box_background_color'); ?>
                        </div>
                    </div>

                    <div class="col_opt_row sub_row arp_hide_on_caption" id="arp_even_hover_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php esc_html_e('Even', 'ARPrice'); ?></div>
                        <div class="col_opt_input_div two_column first_picker even_hover_background_color_div" id="even_hover_background_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('content_even_hover_color_{col_no}', 'main_{col_id}', '', 'content_even_hover_color', ''); ?>
                        </div>
                        <div class="col_opt_input_div two_column second_picker even_font_color_div" id="even_hover_font_color_div" style="display:none;">
                            <?php echo $arprice_form->font_color_new('content_even_hover_font_color_{col_no}', 'main_{col_id}', '', 'content_even_hover_font_color', '', 'background_column_picker content_even_hover_font_color', 'general_color_box_background_color'); ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class='col_opt_row arp_ok_div' id='column_level_other_arp_ok_div__button_2'>
                <div class='col_opt_btn_div'>
                    <div class='col_opt_navigation_div'>
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='column_left_arrow' data-column='{col_no}' data-button-id='column_level_options__button_2'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='column_right_arrow' data-column='{col_no}' data-button-id='column_level_options__button_2'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' ><?php esc_html_e('Ok', 'ARPrice'); ?></button>
                </div>
            </div>
        </div>

        <div class="arp_column_opt_skeleton" style="display:none;">
            <div class='col_opt_row arp_show_on_caption' id='column_width' style='display:none;'>
                <div class='col_opt_title_div two_column'><?php esc_html_e('width (optional)', 'ARPrice'); ?></div>
                <div class='col_opt_input_div two_column'>
                    <div class='col_opt_input'>
                        <input type='text' name='column_width_{col_no}' id='column_width_input_{col_id}' data-column='main_{col_id}' class='col_opt_input' />
                        <span><?php esc_html_e('Px', 'ARPrice'); ?></span>
                    </div>
                </div>
            </div>

            <div class='col_opt_row arp_show_on_caption' id='caption_border' style='display:none;'>
                <div class='col_opt_title_div'><?php esc_html_e('Column Borders', 'ARPrice'); ?></div>
                <div class='col_opt_title_div two_column'><?php esc_html_e('Border Size', 'ARPrice'); ?></div>
                <div class='col_opt_input_div two_column'>
                    <div>
                        <input type='hidden' name='arp_caption_border_size' id='arp_caption_border_size' data-column="main_{col_id}" />
                        <dl id='arp_caption_border_size' class='arp_selectbox' data-id='arp_caption_border_size' data-name='arp_caption_border_size' style='margin-top: 15px; width: 101px !important;'>
                            <dt>
                                <span></span>
                                <input type='text' style='display:none;' class='arp_autocomplete' />
                                <i class='fas fa-caret-down fa-lg'></i>
                            </dt>
                            <dd>
                                <ul class='arp_caption_border_size' data-id='arp_caption_border_size' style='width: 117px;'>
                                    <?php
                                    for ($i = 0; $i <= 10; $i++) {
                                        echo"<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
                                    }
                                    ?>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class='col_opt_title_div two_column'><?php esc_html_e('Border Style', 'ARPrice'); ?></div>
                <div class='col_opt_input_div two_column'>
                    <div>
                        <input type='hidden' name='arp_caption_border_style' id='arp_caption_border_style' data-column="main_{col_id}" />
                        <dl id='arp_caption_border_style' class='arp_selectbox' data-id='arp_caption_border_style' data-name='arp_caption_border_style' style='margin-top: 15px; width: 101px !important;'>
                            <dt>
                                <span></span>
                                <input type='text' style='display:none;' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i>
                            </dt>
                            <dd>
                                <ul class='arp_caption_border_style' data-id='arp_caption_border_style' style='width: 117px;'>
                                    <li style='margin:0' class='arp_selectbox_option' data-value='solid' data-label='Solid'>Solid</li>
                                    <li style='margin:0' class='arp_selectbox_option' data-value='dotted' data-label='Dotted'>Dotted</li>
                                    <li style='margin:0' class='arp_selectbox_option' data-value='dashed' data-label='Dashed'>Dashed</li>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class='col_opt_title_div two_column'><?php esc_html_e('Borders', 'ARPrice'); ?></div>
                <div class='col_opt_input_div two_column' style='width: 80px;'>

                    <span class='arp_price_checkbox_wrapper' style='margin: 10px 5px 5px 5px;'>
                        <input type='checkbox' name='arp_caption_border_left' id='arp_caption_border_left' data-column="main_{col_id}"  class='arp_checkbox light_bg' value='1' />
                        <span></span>
                    </span>
                    <label class='arp_checkbox_label' style='margin:10px 5px 5px 5px;' for='arp_caption_border_left'><?php esc_html_e('Left', 'ARPrice'); ?></label>
                    
                    <div style='width:100%;height:1px;float:left;'></div>

                    <span class='arp_price_checkbox_wrapper' style='margin: 10px 5px 5px 5px;'>
                        <input type='checkbox' name='arp_caption_border_right' id='arp_caption_border_right' data-column="main_{col_id}"  class='arp_checkbox light_bg' value='1' />
                        <span></span>
                    </span>
                    <label class='arp_checkbox_label' style='margin:10px 3px 5px 5px;' for='arp_caption_border_right'><?php esc_html_e('Right', 'ARPrice'); ?></label>
                    <div style='width:100%;height:1px;float:left;'></div>

                    <span class='arp_price_checkbox_wrapper' style='margin: 10px 5px 5px 5px;'>
                        <input type='checkbox' name='arp_caption_border_top' id='arp_caption_border_top' data-column="main_{col_id}"  class='arp_checkbox light_bg' value='1' />
                        <span></span>
                    </span>
                    <label class='arp_checkbox_label' style='margin:10px 5px 5px 5px;' for='arp_caption_border_top'><?php esc_html_e('Top', 'ARPrice'); ?></label>
                    <div style='width:100%;height:1px;float:left;'></div>
                    
                    <span class='arp_price_checkbox_wrapper' style='margin: 10px 5px 5px 5px;'>
                        <input type='checkbox' name='arp_caption_border_bottom' id='arp_caption_border_bottom' data-column="main_{col_id}"  class='arp_checkbox light_bg' value='1' />
                        <span></span>
                    </span>
                    <label class='arp_checkbox_label' style='margin:10px 1px 1px 5px;' for='arp_caption_border_bottom'><?php esc_html_e('Bottom', 'ARPrice'); ?></label>
                    <div style='width:100%;height:1px;float:left;'></div>

                </div>
            </div>

            <div class='col_opt_row arp_hide_on_caption' id='column_other_background_image'>
                <div class='col_opt_title_div two_column'><?php esc_html_e('Background Image', 'ARPrice'); ?></div>
                <div class='col_opt_input_div two_column'>
                    <?php $arp_btn_style = ($arp_is_rtl) ? "float:left;" : "float:right;"; ?>
                    <button type='button' class='col_opt_btn_icon add_arp_object arptooltipster' name='arp_column_background_image_{col_no}' id='arp_column_background_image' data-insert='arp_column_background_image_input' data-column='main_{col_id}' title='<?php esc_html_e('Add Column Background Image', 'ARPrice'); ?>' data-title='<?php esc_html_e('Add Column Background Image', 'ARPrice'); ?>' style='<?php echo $arp_btn_style; ?>'></button>
                    <input type='hidden' name='arp_column_background_image_{col_no}'  data-column="main_{col_id}" id='arp_column_background_image_input' />
                    <input type='hidden' name='arp_column_background_image_height_{col_no}' data-column="main_{col_id}" id='arp_column_background_image_height_input' />
                    <input type='hidden' name='arp_column_background_image_width_{col_no}' data-column="main_{col_id}" id='arp_column_background_image_width_input' />

                    <div class='arp_add_image_container arp_background'>
                        <div class='arp_add_image_arrow' style='margin-left:78px;'></div>
                        <div class='arp_add_img_content'>
                            <div class='arp_add_img_row'>
                                <div class='arp_add_img_label'>
                                    <?php esc_html_e('Image URL', 'ARPrice'); ?>
                                    <span class='arp_model_close_btn' id='arp_add_image_container'><i class='fas fa-times'></i></span>
                                </div>
                                <div class='arp_add_img_option'>
                                    <input type='text' class='arp_modal_txtbox img' id='arp_header_image_url_background_img_' name='arp_header_image_url' />
                                    <button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>
                                        <?php esc_html_e('Add File', 'ARPrice'); ?>
                                    </button>
                                </div>
                            </div>

                            <div class='arp_add_img_row'>
                                <div class='arp_add_img_option arp_image_scale arp_price_radio_wrapper_standard'>
                                    <input type='radio' class='arp_column_background_scaling_radio' id='do_not_scale_image_col' name='column_background_scaling_{col_no}' value='do_not_scale_image' data-column='main_column_{col_no}' />
                                    <span></span>
                                    <label data-for='do_not_scale_image_col' class='arp_add_img_note arp_back_scale'><?php esc_html_e('Do not scale image', 'ARPrice'); ?></label>
                                </div>
                                
                                <div class='arp_add_img_option arp_image_scale arp_price_radio_wrapper_standard'>
                                    <input type='radio' class='arp_column_background_scaling_radio' id='fit_to_container_col' name='column_background_scaling_{col_no}' value='fit_to_container' data-column='main_column_{col_no}' />
                                    <span></span>
                                    <label data-for='fit_to_container_col' class='arp_add_img_note arp_back_scale'><?php esc_html_e('Fit to container', 'ARPrice'); ?></label>
                                </div>
                            </div>

                            <div class='arp_add_img_row' id='arp_background_position' >
                                
                                <div class='arp_add_img_label'><?php esc_html_e('Background Position', 'ARPrice'); ?></div>
                                
                                <div class='arp_add_img_option'>
                                    <input type='text' class='arp_modal_txtbox' id='column_background_min_positon_col' name='column_background_min_positon_{col_no}' data-column='main_column_{col_no}' />
                                    <label class='arp_add_img_note'>(%)</label>
                                    <label></label>
                                    <input type='text' class='arp_modal_txtbox' id='column_background_max_positon_col' name='column_background_max_positon_{col_no}' data-column='main_column_{col_no}' />
                                    <label class='arp_add_img_note'>(%)</label>
                                </div>

                                <div class='arp_add_img_option'>
                                    <label class='arp_add_img_note arp_sub_title' style='width: 33%;'>x-axis</label>
                                    <label class='arp_add_img_note arp_sub_title' style='width: 35%;'>y-axis</label>
                                </div>

                                <div class='arp_add_img_label arp_sub'>
                                    <?php esc_html_e('(Minimum value can be 0 and maximum value can be 100.)', 'ARPrice'); ?>
                                </div>
                            </div>

                            <div class='arp_add_img_row' style='margin-top:10px;margin-bottom:10px;'>
                                <div class='arp_add_img_label'>
                                    <button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_add_shortcode_image_btn_col">
                                        <?php esc_html_e('Add', 'ARPrice'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='arp_google_font_preview_note' id='arp_remove_column_image_link' style="display: none;">
                    <a href='javascript:arp_remove_object("main_column_{col_no}","arp_column_background_image_input")'  class='arp_google_font_preview_link' id='remove_column_image_link'>
                        <?php esc_html_e('Remove Image', 'ARPrice'); ?>
                    </a>
                </div>
            </div>

            <div class='col_opt_row arp_hide_on_caption' id='column_highlight'>
                <div class='col_opt_title_div two_column'><?php esc_html_e('Highlight Column', 'ARPrice'); ?></div>
                <div class='col_opt_input_div two_column'>
                    <div class='arp_checkbox_div'>
                        <span class='arp_price_checkbox_wrapper'>
                            <input type='checkbox' class='arp_checkbox dark_bg' value='1' id='column_highlight_input' name='column_highlight_{col_no}' data-column='main_{col_id}' />
                            <span></span>
                        </span>
                        <label class='arp_checkbox_label' for='column_highlight_input'><?php esc_html_e('Yes', 'ARPrice'); ?></label>
                    </div>
                </div>
            </div>

            <div class='col_opt_row arp_hide_on_caption' id='select_ribbon'>
                <div class='col_opt_title_div two_column'><?php esc_html_e('Ribbon', 'ARPrice'); ?></div>
                <div class='col_opt_input_div two_column'>
                    <?php $arp_btn_style = ($arp_is_rtl) ? "float:left;" : "float:right;"; ?>

                    <button type='button' class='col_opt_btn' onclick='arp_select_ribbon(this)' name='ribbon_select_{col_id}' id='ribbon_select' style='<?php echo $arp_btn_style; ?>' data-column='main_{col_id}'><?php esc_html_e('Select Ribbon', 'ARPrice'); ?></button>
                
                    <input type='hidden' id='arp_ribbon_style_main' name='arp_ribbon_style_{col_no}' />
            
                    <input type='hidden' id='arp_ribbon_bgcol_main' name='arp_ribbon_bgcol_{col_no}' />
            
                    <input type='hidden' id='arp_ribbon_textcol_main' name='arp_ribbon_textcol_{col_no}' />
            
                    <input type='hidden' id='arp_ribbon_position_main' name='arp_ribbon_position_{col_no}' />
            
                    <input type='hidden' id='arp_ribbon_content_main' name='arp_ribbon_content_{col_no}' />

                    <input type='hidden' id='arp_ribbon_content_main_second' name='arp_ribbon_content_second_{col_no}' />

                    <input type='hidden' id='arp_ribbon_content_main_third' name='arp_ribbon_content_third_{col_no}' />

                    <input type='hidden' id='arp_ribbon_content_main_fourth' name='arp_ribbon_content_fourth_{col_no}' />

                    <input type='hidden' id='arp_ribbon_content_main_fifth' name='arp_ribbon_content_fifth_{col_no}' />

                    <input type='hidden' id='arp_custom_ribbon_url' name='arp_custom_ribbon_url_{col_no}' />

                    <input type='hidden' id='arp_custom_ribbon_url_second' name='arp_custom_ribbon_url_second_{col_no}' />

                    <input type='hidden' id='arp_custom_ribbon_url_third' name='arp_custom_ribbon_url_third_{col_no}' />

                    <input type='hidden' id='arp_custom_ribbon_url_fourth' name='arp_custom_ribbon_url_fourth_{col_no}' />

                    <input type='hidden' id='arp_custom_ribbon_url_fifth' name='arp_custom_ribbon_url_fifth_{col_no}' />

                    <input type='hidden' id='arp_ribbon_custom_position_rl' name='arp_ribbon_custom_position_rl_{col_no}' />

                    <input type='hidden' id='arp_ribbon_custom_position_top' name='arp_ribbon_custom_position_top_{col_no}' />
                </div>

                <div class='arp_google_font_preview_note' id='arp_remove_ribbon_container_{col_no}' style="display:none;">
                    <a class='arp_google_font_preview_link' data-column='main_column_{col_no}' id='arp_ribbon_remove' style='text-decoration:none;cursor:pointer;'><?php esc_html_e('Remove Ribbon', 'ARPrice'); ?></a>
                </div>
            </div>

            <div class='col_opt_row arp_hide_on_caption' id='post_variables_content'>
                <div class='col_opt_title_div'><?php esc_html_e('Pass variables in URL', 'ARPrice'); ?></div>
                <div class='col_opt_input_div'>
                    <div class="arp_column_tabs_container">
                        <span class="arp_left_toggle_change_btn"> <i class="fas fa-chevron-left" aria-hidden="true"></i> </span>
                        <ul class='column_tabs scrollable_tabs' id='scroll-tabs'>
                            <?php
                            $g = 0;
                            foreach($total_tabs as $key => $tab_name){
                                $sel = '';
                                if( $g == 0 ){
                                    $sel = 'selected';
                                }

                                $display = '';
                                if ($general_option['general_settings']['arp_step_main'] == 2 && $tab_name[0] == 'toggle_step_third_tab' || $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab') {
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 3 && $tab_name[0] == 'toggle_step_fourth_tab' || $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 4 && $tab_name[0] == 'toggle_step_fifth_tab' || $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 5 && $tab_name[0] == 'toggle_step_sixth_tab' || $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 6 && $tab_name[0] == 'toggle_step_seventh_tab' || $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                } elseif($general_option['general_settings']['arp_step_main'] == 7 && $tab_name[0] == 'toggle_step_eighth_tab'){
                                    $display = 'display:none;';
                                }

                                echo '<li class="option_title '.$sel.' '.$tab_name[0].'" data-id="'.$tab_name[1].'" id="post_variable_'.$key.'_tab" data-column="{col_no}" style="'.$display.'">';
                                    echo isset($general_option['general_settings'][$tab_name[1]]) ? $general_option['general_settings'][$tab_name[1]] : '';
                                echo '</li>';
                                $g++;
                            }
                            ?>
                        </ul>
                        <span class="arp_right_toggle_change_btn"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                    <?php
                        $g = 0;
                        foreach($total_tabs as $key => $tab_name){
                            $sel = '';
                            if( $g == 0 ){
                                $sel = 'selected';
                            }
                            
                            $name = ($g == 0) ? 'post_variables_content_{col_no}' : 'post_variables_content_'.$tab_name[2].'_{col_no}';

                            $id = ($g == 0) ? 'post_variables_content' : 'post_variables_content_'.$tab_name[2];

                            $display = '';
                            $first_step_content = '';
                            if( $g > 0 ){
                                $display = 'display:none;';
                                $first_step_content = "data-first-step-name='post_variables_content_{col_no}'";
                            }

                            echo '<div class="option_tab" id="post_variable_'.$key.'_tab" style="'.$display.'">';
                                echo '<textarea name="'.$name.'" id="'.$id.'" '.$first_step_content.' data-column-step="'.$tab_name[2].'" data-column="main_{col_id}" class="col_opt_textarea post_variable_'.$tab_name[2].'"></textarea>';
                            echo '</div>';
                            $g++;
                        }
                    ?>
                    <span class='arp_note' id='post_variable_content_ex'>e.g. plan_id={col_no};type=arprice;</span>
                    <span class='arp_note' id='post_variable_content_ex'><?php esc_html_e('Add your variables with seperated by ; (semicolon). These variables will pass by GET method to specified URL upon button click.', 'ARPrice'); ?></span>
                </div>
            </div>

            <div class='col_opt_row arp_ok_div' id='column_level_caption_arp_ok_div__button_1' >
                <div class='col_opt_btn_div'>
                    <div class='col_opt_navigation_div'>
                        <i class='fas fa-arrow-left arp_navigation_arrow' id='column_left_arrow' data-button-id='column_level_options__button_1' data-column='{col_no}'></i>&nbsp;
                        <i class='fas fa-arrow-right arp_navigation_arrow' id='column_right_arrow' data-button-id='column_level_options__button_1' data-column='{col_no}'></i>&nbsp;
                    </div>
                    <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn'><?php esc_html_e('Ok', 'ARPrice'); ?></button>
                </div>
            </div>
        </div>

        <?php
             if( $caption_column == 1 ){
        ?>
                <div class="arp_column_body_opt_skeleton" style="display:none;">

                    <div class='col_opt_row' id='text_alignment'>
                        <div class='col_opt_title_div'><?php esc_html_e('Text Alignment', 'ARPrice'); ?></div>
                        <div class='col_opt_input_div'>
                            <?php if (is_rtl()) { ?>
                                <div class='alignment_btn align_right_btn ' data-align='right' id='align_right_btn' data-id='{col_no}'>
                                    <i class='fas fa-align-right fa-flip-vertical'></i>
                                </div>
                                <div class='alignment_btn align_center_btn' data-align='center' id='align_center_btn' data-id='{col_no}'>
                                    <i class='fas fa-align-center fa-flip-vertical'></i>
                                </div>
                                <div class='alignment_btn align_left_btn' data-align='left' id='align_left_btn' data-id='{col_no}'>
                                    <i class='fas fa-align-left fa-flip-vertical'></i>
                                </div>
                            <?php } else{?>
                                <div class='alignment_btn align_left_btn' data-align='left' id='align_left_btn' data-id='{col_no}'>
                                    <i class='fas fa-align-left fa-flip-vertical'></i>
                                </div>

                                <div class='alignment_btn align_center_btn' data-align='center' id='align_center_btn' data-id='{col_no}'>
                                    <i class='fas fa-align-center fa-flip-vertical'></i>
                                </div>

                                <div class='alignment_btn align_right_btn ' data-align='right' id='align_right_btn' data-id='{col_no}'>
                                    <i class='fas fa-align-right fa-flip-vertical'></i>
                                </div>
                            <?php } ?>

                            <input type='hidden' id='body_text_alignment' name='body_text_alignment_{col_no}'>

                        </div>
                    </div>

                    <div class='col_opt_row' id='body_li_caption_font_family'>
                        <div class='col_opt_title_div'><?php esc_html_e('Font Family', 'ARPrice'); ?></div>
                        <div class='col_opt_input_div'>
                            <input type='hidden' id='content_font_family' name='content_font_family_{col_no}' data-column='main_{col_id}' />
                            <dl class='arp_selectbox column_level_dd' data-name='content_font_family_{col_no}' data-id='content_font_family_{col_no}'>
                                <dt>
                                    <span></span>
                                    <input type='text' style='display:none;' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i>
                                </dt>
                                <dd>
                                    <ul data-id='content_font_family' data-column='{col_id}'></ul>
                                </dd>
                            </dl>
                            <div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_content_font_family_preview'><?php esc_html_e('Font Preview', 'ARPrice'); ?></a></div>
                        </div>
                    </div>


                    <div class='col_opt_row' id='body_li_caption_font_size'>
                        <div class='btn_type_size'>
                            <div class='col_opt_title_div two_column'><?php esc_html_e('Font Size', 'ARPrice'); ?></div>
                            <div class='col_opt_input_div two_column'>
                                <input type='hidden' id='content_font_size' name='content_font_size_{col_no}' data-column='main_{col_id}' />
                                <dl class='arp_selectbox column_level_size_dd' data-name='content_font_size_{col_no}' data-id='content_font_size_{col_no}' style='width:115px;max-width:115px;'>
                                    <dt>
                                        <span></span>
                                        <input type='text' style='display:none;' class='arp_autocomplete' /><i class='fas fa-caret-down fa-lg'></i>
                                    </dt>
                                    <dd>
                                        <?php
                                            $size_arr = array();
                                            echo "<ul data-id='content_font_size' data-column='{col_id}'>";
                                            for ($s = 8; $s <= 20; $s++){
                                                $size_arr[] = $s;
                                            }
                                            for ($st = 22; $st <= 70; $st+=2){
                                                $size_arr[] = $st;
                                            }
                                            foreach ($size_arr as $size) {
                                                echo "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
                                            }
                                            echo "</ul>";
                                        ?>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class='col_opt_row arp_ok_div' id='body_level_caption_arp_ok_div__button_1' >
                        <div class='col_opt_btn_div'>
                            <button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' ><?php esc_html_e('Ok', 'ARPrice'); ?> </button>
                        </div>
                    </div>
                </div>
        <?php
             }
        ?>