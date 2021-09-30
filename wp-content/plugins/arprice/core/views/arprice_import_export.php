<div id="arp_loader_div" class="arp_loader" style="display: none;">
    <div class="arp_loader_img"></div>
</div>
<?php
if (is_ssl())
    $google_font_url = "https://fonts.googleapis.com/css?family=Ubuntu:400,500,700";
else
    $google_font_url = "http://fonts.googleapis.com/css?family=Ubuntu:400,500,700";

global $arprice_class;
$setact = 0;
global $arp_chk_version;
$setact = 1;

?>
<link rel="stylesheet" type="text/css" href="<?php echo $google_font_url; ?>" />
<?php
global $wpdb, $arprice_import_export;

if( isset( $_FILES['arp_pt_import_file'] ) ){
    global $wpdb, $arp_pricingtable;

    $file = $_FILES['arp_pt_import_file'];

    $arpfileobj = new ARPFilecontroller( $file, false );

    if( false == $arpfileobj ){
        echo "Error: " . $arpfileobj->error_msg . "<br/>";
    } else {

        $wp_upload_dir = wp_upload_dir();
        $upload_dir = $wp_upload_dir['basedir'] . '/arprice/import/';

        $output_dir = $upload_dir;
        $output_url = $wp_upload_dir['baseurl'] . '/arprice/import/';

        if (!is_dir($output_dir)){
            wp_mkdir_p($output_dir);
        }

        $arpfileobj->check_cap = true;
        $arpfileobj->capabilities = array( 'arp_import_export_pricingtables' );

        $arpfileobj->check_nonce = true;
        $arpfileobj->nonce_data = isset( $_POST['_wpnonce_arprice'] ) ? $_POST['_wpnonce_arprice'] : '';
        $arpfileobj->nonce_action = 'arprice_import_nonce';

        $arpfileobj->check_only_image = false;

        $arpfileobj->check_specific_ext = true;
        $arpfileobj->allowed_ext = array( 'txt' );

        $destination = $output_dir . $file['name'];

        $arpfileobj->arp_process_upload( $destination );

        if( false == $arpfileobj ){
            echo "Error :" . $arpfileobj->error_msg . "<br/>";
        } else {
            $explodezipfilename = explode(".", $file["name"]);
            $zipfilename = $explodezipfilename[0];
            $arprice_nonce_field = wp_create_nonce('arprice_wp_nonce');
            ?>
            <script>
                jQuery('#arp_loader_div').show();
                var file_name = '<?php echo $zipfilename; ?>';
                var arprice_nonce = '<?php echo $arprice_nonce_field ?>'
                jQuery.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: 'action=import_table&xml_file=' + file_name + '&_wpnonce_arprice=' + arprice_nonce,
                    success: function (res){
                        if( /error/.test(res) ){
                            var result = res.split('~|~');
                            jQuery('#import_capability_error_message').html( result[1] );
                            jQuery("#arp_loader_div").hide();
                            jQuery("#import_capability_error_message").css('display','');
                            setTimeout(function(){
                                jQuery('#import_capability_error_message').fadeOut('slow');
                            }, 3000);
                        } else {
                            if (res == 1){
                                jQuery('#arp_loader_div').hide();
                                jQuery('#import_success_message').animate({width: 'toggle'}, 'slow');
                                jQuery('#import_success_message').delay(3000).animate({width: 'toggle'}, 'slow');
                                jQuery.ajax({
                                    type: 'POST',
                                    url: ajaxurl,
                                    data: 'action=get_table_list',
                                    success: function (res) {
                                        jQuery("#arp_export_table_lists").html(res);
                                    }
                                });
                            } else if (res == 0) {
                                jQuery('#arp_loader_div').hide();
                                jQuery("#import_validation_zip_error_message").css('display', '');
                                setTimeout(function hide_err_msg() {
                                    jQuery("#import_validation_zip_error_message").fadeOut('slow');
                                }, 3000);
                            }
                        }
                    }
                });
            </script>
            <?php
        }

    }
}
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#arp_pt_import_file').on('change', function () {
            var filename = jQuery(this).val();

            if (filename == "") {
                jQuery('#arp_pt_import_file_name').html('No file Selected');
            } else {
                if (/C\:\\fakepath\\/gi.test(filename)) {
                    filename = filename.split('\\');
                    var flength = filename.length;
                    flength = flength - 1;
                    filename = filename[flength];
                }
                jQuery('#arp_pt_import_file_name').html(filename);
            }
        });

        if (typeof select2 === 'function') {

            jQuery('select#arp_table_to_export').select2('distroy');
        }
    });



    
    function check_valid_imported_file()
    {
        var importFile = jQuery("#arp_pt_import_file").val();
        var extension = importFile.substr((importFile.lastIndexOf('.') + 1));
        var file_nm = importFile.split('_');
        if (importFile == null || importFile == "")
        {
            jQuery("#import_invalid_zip_error_message").css('display', 'none');
            jQuery("#import_blank_zip_error_message").css('display', '');
            jQuery(window.opera ? 'html' : 'html, body').animate({scrollTop: jQuery('#import_blank_zip_error_message').offset().top - 250}, 'slow');
            return false;
        }
        else if (extension != 'txt')
        {
            jQuery("#import_blank_zip_error_message").css('display', 'none');
            jQuery("#import_invalid_zip_error_message").css('display', '');
            jQuery(window.opera ? 'html' : 'html, body').animate({scrollTop: jQuery('#import_invalid_zip_error_message').offset().top - 250}, 'slow');
            return false;
        }
        
        else
        {
            return true;
        }
    }

    
    function import_export_table()
    {

        var form = jQuery("#arp_export").serialize();
        if (jQuery("#arp_table_to_export").val() == "" || jQuery("#arp_table_to_export").val() == null)
        {
            jQuery("#export_blank_error_message").css('display', '');

            return false;
        }
        else
        {
            return true;

        }
        return false;
    }

</script>

<style type="text/css">
    #wpcontent, #wpfooter{
        background: #fff;
    }
</style>

<div class="arp_import_export_main" style="background: #fff;">

    <div class="arp_import_export_main_title"><?php esc_html_e('Import / Export Pricing Tables', 'ARPrice'); ?></div>
    <?php
    if ($setact != 1) {
        $admin_css_url = admin_url('admin.php?page=arp_global_settings');
        ?>

        <div style="margin-top:-35px;margin-bottom:20px;border-left: 4px solid #ffba00;box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);height:20px;width:99%;padding:10px 25px 10px 0px;background-color:#FFFFFF;color:#000000;font-size:17px;display:block;visibility:visible;text-align:right;" >ARPrice license is not activated. Please activate license from <a href="<?php echo $admin_css_url; ?>">here</a></div>
    <?php } ?>
    <div class="clear" style="clear:both;"></div>
    <div class="success_message" id="import_success_message" style="">
        <?php esc_html_e('Table Imported Successfully', 'ARPrice'); ?>
    </div> 
    <div class="error_message arp_message_padding" id="import_validation_zip_error_message" style="display:none;">
        <?php esc_html_e('Please Select file exported from ARPrice Plugin.', 'ARPrice'); ?>
    </div>
    <div class="error_message arp_message_padding" id="import_invalid_zip_error_message" style="display:none;">
        <?php esc_html_e('Please Select Valid File.', 'ARPrice'); ?>
    </div>
    <div class="error_message arp_message_padding" id="import_blank_zip_error_message" style="display:none;">
        <?php esc_html_e('Please Select File.', 'ARPrice'); ?>
    </div>
    <div class="error_message arp_message_padding" id="export_blank_error_message" style="display:none;">
        <?php esc_html_e('Please Select Table.', 'ARPrice'); ?>
    </div>
    <div class="error_message arp_message_padding" id="import_capability_error_message" style="display:none;">
    </div>
    <div class="clear" style="clear:both;"></div>
    <div class="arp_import_export_main_inner">

        <div class="arp_export_section">

            <div class="arp_import_export_sub_title"><?php esc_html_e('Export Pricing Tables', 'ARPrice'); ?></div>

            <div class="import_export_list_main">
                <form  name="arp_export" method="post" action="" id="arp_export" onsubmit="return import_export_table();">
                    <div class="arp_import_export_frm_title"><?php esc_html_e('Please Select Table(s)', 'ARPrice'); ?></div>
                    <div class="arp_import_export_frm_select" id="arp_export_table_lists"><?php $arprice_import_export->get_table_list(); ?></div>

                    <div class="clear" style="clear:both;"></div>
                    <div class="arp_import_export_frm_submit">
                        <button class="arp_import_export_btn" type="submit" name="export_tables"><span><?php esc_html_e('Export', 'ARPrice'); ?></span></button> 
                    </div>
                </form>

            </div>
        </div> 


        <div class="arp_import_section">
            <div class="arp_import_export_sub_title"><?php esc_html_e('Import Pricing Tables', 'ARPrice'); ?></div>

            <div class="import_export_list_main">
                <form name="arp_import" id="arp_import" method="post" enctype="multipart/form-data" onsubmit="return check_valid_imported_file();" >

                    <table align="left" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="3"><div class="arp_import_export_frm_title"><?php esc_html_e('Please Upload text file exported from ARPrice plugin', 'ARPrice'); ?></div></td>
                        </tr>
                        <tr>
                            <td><div class="arp_import_export_select_title"><?php esc_html_e('Select File :', 'ARPrice'); ?></div></td>                                
                        </tr>

                        <tr>
                            <td>
                                <input type="file" style="opacity:0;width:0px !important;height:0px !important;padding:0px !important;" id="arp_pt_import_file" name="arp_pt_import_file"  />
                                <input type='hidden' name="_wpnonce_arprice" value="<?php echo wp_create_nonce('arprice_import_nonce'); ?>" />
                                <label for="arp_pt_import_file" class="arp_import_file_main">
                                    <div class="text pd_input_control pd_input_small helpdesk_txt">
                                        <div class="arp_import_export_file_btn"><?php esc_html_e('Add File', 'ARPrice'); ?></div>
                                        <div id="arp_pt_import_file_name" class= "arp_import_file_name">
                                            <?php esc_html_e('No file Selected', 'ARPrice'); ?>
                                        </div>
                                    </div>
                                </label>    
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="arp_import_export_frm_submit">
                                    <button class="arp_import_export_btn" type="submit" name="imprort_file" id="import_file" style="margin-top: 20px;"><span><?php esc_html_e('Import', 'ARPrice'); ?></span></button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <?php
            if(is_plugin_active('arprice-responsive-pricing-table/arprice-responsive-pricing-table.php')){
               $arprice_lite_version = get_option('arpricelite_version');

               if( !$arprice_lite_version){
                    $arplite_plugin_data = get_plugin_data(WP_PLUGIN_DIR.'/arprice-responsive-pricing-table/arprice-responsive-pricing-table.php'); 
                    $arprice_lite_version = $arplite_plugin_data['Version'];
               }

               if( version_compare($arprice_lite_version, '2.0', '>=' ) ){
               
                    ?>
                    <div class="clear" style="clear:both;"></div>
                    
                    <div class="arp_import_section_arprice_lite">
                <div class="arp_import_export_sub_title"><?php esc_html_e('Import Pricing Tables From ARPrice Lite', 'ARPrice'); ?></div>

                        <div class="import_export_list_main">
                            <div class="error_message arp_message_padding" id="import_lite_template_error_message" style="display:none;"><?php esc_html_e('Sorry something went wrong while processing Importing.', 'ARPrice'); ?></div>
                            <form  name="arp_import_arprice_lite_form" method="post" action="" id="arp_export" onsubmit="return import_export_table();">
                                <div class="arp_import_export_frm_title"><?php esc_html_e('Please Select Table(s)', 'ARPrice'); ?></div>
                                <div class="arp_import_export_frm_select" id="arp_export_table_lists"><?php $arprice_import_export->get_arprice_lite_table_list_new(); ?></div>

                                <div class="clear" style="clear:both;"></div>
                               
                            </form>

                        </div>
                        
                    </div>
                    <?php 
                }
            } ?>

    </div>
</div>    