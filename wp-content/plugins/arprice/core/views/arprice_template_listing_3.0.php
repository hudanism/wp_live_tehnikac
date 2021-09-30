<?php
global $arprice_analytics, $arprice_form, $arprice_images_css_version,$arprice_version,$wpdb, $arprice_class, $arp_chk_version,$arp_pricingtable;


$setact = 1;

$editable_templates = "SELECT t.* FROM `" . $wpdb->prefix."arp_arprice` t WHERE t.is_template = %d GROUP BY t.ID ORDER BY t.ID DESC";
$arp_my_templates = $wpdb->get_results($wpdb->prepare($editable_templates, 0));

if( ! extension_loaded('dom') || !extension_loaded('gd') ){
    echo "<div class='notice notice-error'>";
        echo "<p>";
            echo esc_html__('ARPrice requires to have the following PHP modules/extensions to work properly. Kindly contact your hosting provider to install these modules/extensions.','ARPrice');
            echo "<ul class='arp_required_modules'>";
                echo "<li>PHP-XML/DOM</li>";
                echo "<li>GD Library</li>";
            echo "</ul>";
        echo "</p>";
    echo "</div>";
    return;
}


?>
<div id="arp_loader_div" class="arp_loader" style="display: none;">
    <div class="arp_loader_img"></div>
</div>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" />
<input type="hidden" name="arp_version" id="arp_version" value="<?php echo $arprice_version; ?>" />
<input type="hidden" name="arp_request_version" id="arp_request_version" value="<?php echo get_bloginfo('version'); ?>" />
<input type="hidden" name="arp_restrict_dashboard" id="arp_restrict_dashboard" value="<?php echo get_option('arp_is_dashboard_visited'); ?>" />
<input type="hidden" name="arp_tour_guide_value" id="arp_tour_guide_value" value="<?php echo get_option('arprice_tour_guide_value'); ?>" />
<input type="hidden" id="is_display_analytics" value="<?php echo $setact; ?>" name="is_display_analytics" />
<input type="hidden" name="ajaxurl" id="ajaxurl" value="<?php echo admin_url('admin-ajax.php'); ?>" />
<input type="hidden" name="arp_admin_url" id="arp_admin_url" value="<?php echo admin_url('admin.php?page=arprice'); ?>">
<input type="hidden" name="_wpnonce_arprice" id="_wpnonce_arprice" value="<?php echo wp_create_nonce( 'arprice_wp_nonce' ); ?>" />
<div class="arprice_container">
    <div class="arprice_template_listing_top_belt">
        <div class="arprice_template_listing_logo"></div>
        <ul class="arprice_template_listing_tab_wrapper">
            <?php
                $active_tab_class = 'arp_active';
                $active_template_tab = '';
                if( isset($arp_my_templates) && is_array($arp_my_templates) && count($arp_my_templates) > 0 ){
                    $active_tab_class = '';
                    $active_template_tab = 'arp_active';
            ?>
                <li class="arprice_template_listing_tab arp_active" id="arprice_templates"><?php esc_html_e('MY PRICING TABLES','ARPrice'); ?></li>
            <?php
            
                }
            ?>
            <li class="arprice_template_listing_tab <?php echo $active_tab_class; ?>" id="arp_create_new_template"><?php esc_html_e('CREATE NEW','ARPrice') ?></li>
        </ul>
        <?php if( isset($arp_my_templates) && is_array($arp_my_templates) && count($arp_my_templates) > 0 ){ ?>
        <button type="button" name="create_new_table" class="arp_create_new_pricing_table_btn arp_active" id="create_new_table"><?php esc_html_e('Add New','ARPrice'); ?></button>
        <?php } ?>
        <button type="button" name="arp_go_create_new_table" class="arp_go_create_new_pricing_table_arrow" id="arp_go_create_new_table"></button>
    </div>
    <div class="arprice_template_listing_container">
        <?php
            if ($setact != 1) {
                $admin_css_url = admin_url('admin.php?page=arp_global_settings');
                ?>
                <div style="border-left: 4px solid #ffba00;box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-moz-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-o-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);height:20px;position:absolute;width:97%;padding:10px 25px 10px 0px;background-color:#FFFFFF;text-align:right;color:#000000;font-size:17px;display:block;visibility:visible;margin-top:10px;z-index: 1;" >ARPrice license is not activated. Please activate license from <a href="<?php echo $admin_css_url; ?>">here</a></div>
        <?php } ?>
        <div class="arprice_template_listing_tab_container <?php echo $active_template_tab; ?>" id="arprice_templates" style="<?php echo ( $setact != 1 ) ? 'margin-top:10px;' : ''; ?>">
            <?php
                foreach( $arp_my_templates as $key => $template ){

                    $template_view = 0;

                    $template_opt = maybe_unserialize($template->general_options);
                    $template_name = $template_opt['template_setting']['template'];
                    $reference_template = $template_opt['general_settings']['reference_template'];
                    $table_name = $template->table_name;
                    $arp_template_id = $template->ID;
                    $total_visit = 0;// $template->views;
                    $total_visit = $arprice_analytics->arp_get_unique_view_counter($arp_template_id);
                    $last_update_date = $template->arp_last_updated_date;
                    $thumb_img_dir = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $arp_template_id . '_large.png';
                    $thumb_img_path = PRICINGTABLE_UPLOAD_URL . '/template_images/arptemplate_' . $arp_template_id . '_large.png';
                    $img_thumb_content = '<div class="arprice_template_thumb_box" style="background: #ffffff url('.$thumb_img_path.') no-repeat center;">
                            </div>';

                    if(!file_exists($thumb_img_dir)){
                        $img_thumb_content = '<div class="no_image_div"><span class="no_image_text">No Image</span></div>';    
                    }

                    if($total_visit>0){
                        $template_view = 1;
                    }

                    $date_format = get_option('date_format');
                    if ($last_update_date == "0000-00-00 00:00:00"){
                        $last_update_date = $template->create_date;
                    }
                    $date_to_display = date($date_format, strtotime($last_update_date));
                    
            ?>
                    <div class="arprice_editable_template_container" id="arp_template_<?php echo $arp_template_id; ?>">

                        <div class="arprice_editable_template_div">
                            <?php echo $img_thumb_content; ?>
                            <div class="arprice_template_options_container">    
                                
                                    <div class="arprice_template_options arprice_template_preview template_action_btn" onClick='arp_price_preview_home("<?php echo $arprice_form->get_direct_link($template->ID, true) ?>");' title="<?php esc_html_e('Preview', 'ARPrice'); ?>" ></div>
                                    <div class="arprice_template_options arprice_template_edit template_action_btn" title="<?php esc_html_e('Select Table', 'ARPrice'); ?>" onclick="window.location.href = '<?php echo admin_url('admin.php?page=arprice&arp_action=edit&eid=' . $template->ID) ?>'"></div>
                                    <div class="arprice_template_options arprice_template_clone template_action_btn" onclick="window.location.href = '<?php echo admin_url('admin.php?page=arprice&arp_action=new&eid=' . $template->ID); ?>'" title="<?php esc_html_e('Clone Table', 'ARPrice'); ?>"></div>
                                    <div id="delete_template" class="arprice_template_options arprice_template_delete template_action_btn" data-template-id="<?php echo $template->ID; ?>" title="<?php esc_html_e('Delete Table', 'ARPrice'); ?>"></div>    

                            </div>
                            <hr class="arprice_template_seperator">
                            <div class="arprice_template_description_container">
                                <div class="arprice_template_description_row">
                                    <div class="arprice_template_description_content arp_font_medium"><?php esc_html_e('Title', 'ARPrice'); ?></div>
                                    <div class="arprice_template_description_content arprice_template_listing_table_name" title="<?php echo $table_name; ?>" style="line-height: normal;padding:10px 0;"><?php echo $table_name; ?></div>
                                </div>
                                <div class="arprice_template_description_row">
                                    <div class="arprice_template_description_content arp_font_medium"><?php esc_html_e('Last Modified', 'ARPrice'); ?></div>
                                    <div class="arprice_template_description_content"><?php echo $date_to_display; ?></div>
                                </div>
                                <div class="arprice_template_description_row">
                                    <div class="arprice_template_description_content arp_font_medium"><?php esc_html_e('Statistics', 'ARPrice'); ?></div>
                                    <div class="arprice_template_description_content">
                                        <span class="float_left"><?php echo $total_visit; ?> <?php esc_html_e('(Visits)', 'ARPrice'); ?></span>
                                        <span class="float_right arprice_statistics_ico" id="arprice_get_analytics" data-template-id="<?php echo $arp_template_id; ?>" data-template-views="<?php echo $template_view; ?>" title="<?php esc_html_e('Analytics', 'ARPrice'); ?>"></span>
                                    </div>
                                </div>
                                <div class="arprice_template_description_row">
                                    <div class="arprice_template_description_content arp_font_medium"><?php esc_html_e('Shortcode','ARPrice'); ?></div>
                                    <div class="arprice_template_description_content" id="arprice_template_shortcode" data-copy-title="<?php esc_html_e('Click to Copy','ARPrice') ?>" data-copied-title="<?php esc_html_e('Copied to Clipboard','ARPrice'); ?>"><?php echo "[ARPrice id=".$arp_template_id."]" ?></div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
            <?php
                }
            ?>


        </div>
        <div class="arprice_template_listing_tab_container <?php echo $active_tab_class; ?>" id="arp_create_new_template" style="<?php echo ( $setact != 1 ) ? 'margin-top:10px;' : ''; ?>">
            <h2 class="arprice_create_new_template_title"><?php esc_html_e('Create New Table','ARPrice') ?></h2>
            <div class="arprice_add_new_pricing_table_wrapper">
                <div class="arprice_new_template_box arp_create_new">
                    <span class="arprice_box_background"></span>
                    <span class="arprice_new_template_box_title"><?php esc_html_e('Select Pricing Table','ARPrice'); ?></span>
                    <span class="arprice_new_template_box_subtitle"><?php esc_html_e('Choose your design','ARPrice'); ?></span>
                    <button class="arprice_box_button" id="arprice_create_new_template_button" type="button"><?php esc_html_e('Select Template','ARPrice'); ?></button>
                </div>
                <div class="arprice_new_template_box arp_download_sample">
                    <span class="arprice_box_background"></span>
                    <span class="arprice_new_template_box_title"><?php esc_html_e('Install Free Samples','ARPrice'); ?></span>
                    <span class="arprice_new_template_box_subtitle"><?php esc_html_e('Ready made pricing templates','ARPrice'); ?></span>
                    <button class="arprice_box_button" id="arprice_download_sample_button" type="button"><?php esc_html_e('Browse Samples','ARPrice'); ?></button>
                </div>
            </div>
        </div>
    </div>
    <div class="arprice_select_template_container" style="<?php echo ( $setact != 1 ) ? 'margin-top:30px;' : ''; ?>">
        <h2 class="arprice_select_template_title"><?php esc_html_e('Select Template','ARPrice'); ?></h2>
        <?php
        $default_templates = "SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE is_template = %d AND status = %s ORDER BY is_template DESC, is_animated ASC, ID ASC";
        $default_templates = $wpdb->get_results($wpdb->prepare($default_templates, 1, 'published'));
        $template_orders = $arp_pricingtable->arp_template_order();
        $template_new_orders = array();
        $x = 0;
        foreach ($template_orders as $key => $value) {
            foreach ($default_templates as $key1 => $template) {
                $template_opt = maybe_unserialize($template->general_options);
                $reference_template = $template_opt['general_settings']['reference_template'];
                if ($key == $reference_template) {
                    $template_new_orders[$x] = $default_templates[$key1];
                }
            }
            $x++;
        }
        ?>
        <div class="arprice_select_template_list_container arp_default_template_list">
            <?php
                foreach( $template_new_orders as $k => $template ){
                    $template_img = 'arp_template_'.$template->template_name.'.png';
                    $template_img_url = PRICINGTABLE_IMAGES_URL.'/template_images/'.$template_img;
                    $template_img_hover = 'arp_template_'.$template->template_name.'_hover.png';
                    $template_img_url_hover = PRICINGTABLE_IMAGES_URL.'/template_images/'.$template_img_hover;
                    $tour_guide_tpl_id='';
                    $tpl_id = "arp_template_".$template->template_name;
                    if($tpl_id=='arp_template_2'){
                        $tour_guide_tpl_id = 'id="arp_template_2"';
                    }

            ?>
            <div class="arprice_select_template_container_item" <?php echo $tour_guide_tpl_id; ?>>
                <div class="arprice_select_template_inner_container">
                    <div class="arprice_select_template_bg_img" style="background:url(<?php echo $template_img_url; ?>) no-repeat top left;" arp_template="<?php echo $template_img_url; ?>" arp_template_hover="<?php echo $template_img_url_hover; ?>"></div>
                    <div class="arprice_select_template_action_div">
                        <div class="arprice_select_template_action_btn arprice_preview_template" id="arprice_preview_template" title="<?php esc_html_e('Preview', 'ARPrice'); ?>" onClick='arp_price_preview_home("<?php echo $arprice_form->get_direct_link($template->ID, true) ?>");'></div>
                        <div class="arprice_select_template_action_btn arpice_clone_template" id="clone_template" title="<?php esc_html_e('Select', 'ARPrice'); ?>" onclick="window.location.href = '<?php echo admin_url('admin.php?page=arprice&arp_action=new&eid=' . $template->ID); ?>'"></div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>

    <div class="arprice_download_sample_container" style="<?php echo ( $setact != 1 ) ? 'margin-top:30px;' : ''; ?>">
        <div class="error_message arp_sample_download_error" id="arp_download_error_message"> 
            <?php esc_html_e('Something went wrong, while downloading sample template. Please try again', 'ARPrice'); ?>
        </div>
        <h2 class="arprice_select_template_title arprice_download_sample_title"><?php esc_html_e('Install Free Samples','ARPrice'); ?></h2>
        <div class="arp_sample_page_loader">
          <div class="arp_loader_img"></div>
        </div>
        <span class="arp_download_samples_note"><?php esc_html_e('There are no samples available.', 'ARPrice'); ?></span>

        <div class="arprice_select_template_list_container arprice_download_sample_list_container">
        </div>
        <div class="arp_load_more_samples_container">
            <button type="button" class="arp_load_more_samples_btn" id="arp_load_more_samples_btn"><?php esc_html_e('Browse More Samples','ARPrice'); ?></button>
        </div>
        <input type="hidden" name="is_last_arp_sample_page" id="is_last_arp_sample_page" value="0" />
        <input type="hidden" name="is_sample_page_loaded" id="is_sample_page_loaded" value="0" />
    </div>
</div>

<!-- Template Preview Model -->
<div class="arp_admin_modal_overlay">
    <div class="arp_admin_modal arp_desktop_view" id="arp_pricing_table_preview" style="">
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
<!-- Template Preview Model -->

<!-- Tour Guide Model -->
<div class="arp_admin_modal_overlay" id="arp_tour_guide_model">
    <div class="arp_model_delete_box">
        <div class="modal_top_belt">
            <span class="modal_title"><?php esc_html_e('ARPrice Guided Tour', 'ARPrice'); ?></span>
            <span id="nav_style_close" data-id="arp_tour_guide_start_no" class="arp_modal_close_btn b-close"></span>
        </div>
        <div class="arp_modal_delete_content">
            <div class="arp_delete_modal_msg"><?php esc_html_e('Please take a quick tour of basic functionalities.', 'ARPrice'); ?></div>
            <div class="arp_delete_modal_btn">
                
                <button id="arp_tour_guide_start_yes" class="arp_tour_guide_start_model ribbon_insert_btn b-close" type="button"><?php esc_html_e('Start Tour', 'ARPrice'); ?></button>
                <button id="arp_tour_guide_start_no" class="arp_tour_guide_start_model ribbon_insert_btn b-close" type="button" style="background:#373a3f;"><?php esc_html_e('Skip Tour', 'ARPrice'); ?></button>

            </div>
        </div>
    </div>
</div>
<!-- Tour Guide Model -->

<!-- Remove template -->
<div class="arp_admin_modal_overlay">
    <div class="arp_model_delete_box" id="arp_remove_template">
        <input type="hidden" id="delete_table_id" value="" />
        <div class="modal_top_belt">
            <span class="modal_title"><?php esc_html_e('Delete Table', 'ARPrice'); ?></span>
            <span id="nav_style_close" class="arp_modal_close_btn b-close"></span>
        </div>
        <div class="arp_modal_delete_content">
            <div class="arp_delete_modal_msg"><?php esc_html_e('Are you sure you want to delete this table?', 'ARPrice'); ?></div>
            <div class="arp_delete_modal_btn">
                <button id="Model_Delete_Template"  type="button" class="ribbon_insert_btn delete_template"><?php esc_html_e('OK', 'ARPrice'); ?></button>
                <button id="Model_Delete_Template"  class="ribbon_cancel_btn" type="button"><?php esc_html_e('Cancel', 'ARPrice'); ?></button>
            </div>
        </div>
    </div>
</div>
<!-- Remove template -->

<!-- Restrict sample download -->
<div class="arp_admin_modal_overlay">
    <div class="arp_model_delete_box" id="arp_restrict_sample_download">
        <div class="modal_top_belt">
            <span class="modal_title"><?php esc_html_e('Install Failed', 'ARPrice'); ?></span>
            <span id="nav_style_close" class="arp_modal_close_btn b-close"></span>
        </div>
        <div class="arp_modal_delete_content">
            <div class="arp_delete_modal_msg arp_sample_download_msg"></div>
            <div class="arp_delete_modal_btn arp_sample_download_btn">
                <button id="Model_Sample_Template_Btn" type="button" class="ribbon_insert_btn"><?php esc_html_e('OK', 'ARPrice'); ?></button>
            </div>
        </div>
    </div>
</div>
<!-- Restrict sample download -->


<div class="arp_admin_modal_overlay">
    <div class="arp_modal_box" id="arprice_analytic_model_window">
        <!--            <div class="arprice_analytic_model_window_titlebar">
        <?php esc_html_e('Analytics', 'ARPrice'); ?>
                        <span class="modal_analytic_close_btn b-close"></span>
                    </div>-->
        <div class="modal_top_belt">
            <span class="modal_title"><?php esc_html_e('Analytics', 'ARPrice'); ?></span>
            <span class="arp_modal_close_btn b-close"></span>
        </div>
        <input type="hidden" id="arp_analytic_template_id" value="" />
        <div class="arp_analytic_content_main" style="display:none;">
            <div class="arp_daily_weekly_box">
                <button id='daily_button' class="arp_daily_weekly_button"><?php esc_html_e('Daily', 'ARPrice'); ?></button>
                <button id='weekly_button' class="arp_daily_weekly_button_hover"><?php esc_html_e('Weekly', 'ARPrice'); ?></button>
            </div>
            <div class="arp_analysis">
                <div class="arp_view">
                    <div class="arp_no_views"><span class="arp_view_icon"></span><span class="arp_views_count"></span></div>
                    <div class="clear"></div>
                    <div class="arp_view_label"><?php esc_html_e('total views', 'ARPrice'); ?></div>
                </div>
                <div class="arp_click">
                    <div class="arp_no_clicks"><span class="arp_click_icon"></span><span class="arp_click_count"></span></div>
                    <div class="clear"></div>
                    <div class="arp_view_label"><?php esc_html_e('total clicks', 'ARPrice'); ?></div>
                </div>
                <div class="arp_conversion">
                    <div class="arp_no_conversion"><span class="arp_conversation_icon"></span><span class="arp_conversion_count"></span></div>
                    <div class="clear"></div>
                    <div class="arp_view_label"><?php esc_html_e('conversation', 'ARPrice'); ?></div>
                </div>                    
            </div>
            <div class="arp_date_picker">
                <input id="analytic_start_date" name="analytic_start_date" type="hidden" value="<?php echo date('d-') . date("m", strtotime("-1 month")) . '-' . date("Y", strtotime("-1 month")); ?>" />
                <input id="analytic_end_date"  name="analytic_end_date" type="hidden"  value="<?php echo date('d-m-Y'); ?>"/>

                <div id="arp_range_datepicker" class="pull-right" style="background: #fff; cursor: pointer; padding: 13px 10px;  width: 100%;z-index:999999;box-sizing: border-box;">
                <div class="arp_analytics_date_icon"></div>&nbsp;
                    <span><?php
                        $last_month = date("M", strtotime("-1 month"));
                        echo $last_month . ',' . date('d')
                        ?> - <?php echo date('M,d'); ?></span> <b class="caret"></b>
                <div class="fas fa-angle-down fa-lg" style="margin-left: 4px;"></div>
                </div>
            </div>

            <div class="arprice_analytic_content">
                <?php $arpchart_style = ''; if(is_rtl()){ $arpchart_style = 'style="direction: ltr;"'; } ?>
                <div class="arprice_basic_area" id="arprice_basic_area" <?php echo $arpchart_style; ?> >
                </div>
                <div class="arp_chart_devider">
                </div>
                <div class="arprice_donut_chart" id="arprice_donut_chart" <?php echo $arpchart_style; ?> >
                </div>  
            </div>
            <div class="clear"></div>
            <div class="arp_chart_title">
                <div class='arp_chart_title_1'><?php esc_html_e('Visits & Clicks', 'ARPrice'); ?></div>
                <div class='arp_chart_title_2'><?php esc_html_e('Country Wise Visit', 'ARPrice'); ?></div>
            </div>
            <div class="arp_analytic_devider"></div>
            <div class="arp_analytic_table_box">
                <div class="arp_analytic_table_title"><?php esc_html_e('Visitor Listing', 'ARPrice'); ?></div>
                <div class="arprice_analytic_table" id="arprice_analytic_table">
                </div>
                
            </div>
        </div>

        <div class="arprice_restrict_analytic" id="arprice_restrict_analytic" style="display:none;">
            <?php $admin_css_url = admin_url('admin.php?page=arp_global_settings'); ?>
            <span id="arp_nodata_msg"><?php esc_html_e('You are using Unlicensed Copy. To enable this feature, Please activate license from', 'ARPrice'); ?><a href="<?php echo $admin_css_url; ?>"><?php esc_html_e('here', 'ARPrice'); ?></a></span>
        </div>

        <div class="arprice_blank_analytic" id="arprice_blank_analytic" style="display:none;">
            <span id="arp_nodata_msg"><?php esc_html_e('There is no visits for this template', 'ARPrice'); ?></span>
        </div>
        <div class="arprice_analytic_loader" id="arprice_analytic_loader" style="display:none;">
        </div> 

        <script type="text/javascript" language="javascript">
            jQuery(document).ready(function () {
                var arpopens = "left";
                if(jQuery('body').hasClass('rtl')){
                    arpopens = "right";
                }
                startdate = jQuery('#analytic_start_date').val();
                enddate = jQuery('#analytic_end_date').val();
                jQuery('#arp_range_datepicker').daterangepicker({
                    locale: {
                        format: 'DD-MM-YYYY'
                    },
                    startDate: startdate,
                    endDate: enddate,
                    opens: arpopens
                }, function (start, end, label) {

                    jQuery('#analytic_start_date').val(start.format('DD-MM-YYYY'));
                    jQuery('#analytic_end_date').val(end.format('DD-MM-YYYY'));
                    if (jQuery('.arp_daily_weekly_box button#daily_button').hasClass('arp_daily_weekly_button_hover') == 1)
                    {
                        arp_action = 'arp_get_basic_area_daily';
                    }
                    else
                    {
                        arp_action = 'arp_get_basic_area_weekly';
                    }
                    jQuery('#arp_range_datepicker span').html(start.format('MMM, D ') + ' - ' + end.format('MMM, D '));
                    var template_id = jQuery('#arp_analytic_template_id').val();
                    var start_date = jQuery('#analytic_start_date').val();
                    var end_date = jQuery('#analytic_end_date').val();
                    var ajaxurl = jQuery("#ajaxurl").val();
                    jQuery.ajax({
                        url: ajaxurl,
                        method: 'POST',
                        data: {
                            action: arp_action,
                            template_id: template_id,
                            start_date: start_date,
                            end_date: end_date,
                        },
                        dataType: 'json',
                        success: function (result) {
                            jQuery('#arprice_basic_area').html('');
                            jQuery('#arprice_basic_area').highcharts(result.browser);
                            jQuery('.arp_views_count').html('');
                            jQuery('.arp_click_count').html('');
                            jQuery('.arp_conversion_count').html('');
                            jQuery('.arp_views_count').html(result.browser.no_of_views);
                            jQuery('.arp_click_count').html(result.browser.no_of_clicks);
                            jQuery('.arp_conversion_count').html(result.browser.conversion + ' %');
                        }
                    });

                });
                jQuery('.daterangepicker').attr('style', '');
                jQuery('.daterangepicker').css('z-index', '11111111');


            });
        </script>
    </div>
</div>

<div class="arprice_information_block">
    <a href="<?php echo ARPURL.'/documentation' ?>" target="_blank" class="arprice_info_icon arprice_doc_icon arp_guid_btn" title="<?php esc_html_e('Documentation','ARPrice'); ?>"></a>
    <div class="arprice_info_icon arprice_guide_icon arp_guid_btn" id="arp_tour_guide_start" title="<?php esc_html_e('Tour Guide','ARPrice'); ?>"></div>
    <br><br>
    <img src="<?php echo site_url(); ?>/wp-content/plugins/arprice/images/dot.png" height="15" width="15" onclick="javascript:open_documentation('<?php echo site_url(); ?>/wp-content/plugins/arprice/documentation/assets/sysinfo.php');">
</div>