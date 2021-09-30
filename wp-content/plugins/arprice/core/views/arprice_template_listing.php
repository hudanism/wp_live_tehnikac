<?php
global $arprice_analytics, $arprice_form, $arprice_images_css_version,$arprice_version;

        global $arprice_class;
        global $arp_chk_version;
        $setact = 1;
?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu" />
<input type="hidden" name="arp_version" id="arp_version" value="<?php echo $arprice_version; ?>" />
<input type="hidden" name="arp_request_version" id="arp_request_version" value="<?php echo get_bloginfo('version'); ?>" />
<input type="hidden" name="arp_restrict_dashboard" id="arp_restrict_dashboard" value="<?php echo get_option('arp_is_dashboard_visited'); ?>" />
<input type="hidden" name="arp_tour_guide_value" id="arp_tour_guide_value" value="<?php echo get_option('arprice_tour_guide_value'); ?>" />
<div class="main_box">
    <div class="pricingtablename">
        <div class="repute_pricing_table_content">
            <input type="hidden" name="ajaxurl" id="ajaxurl" value="<?php echo admin_url('admin-ajax.php'); ?>" />
            <div class="arp_tables_container">
                <input type="hidden" id="is_display_analytics" value="<?php echo $setact; ?>" name="is_display_analytics" />
                <input type="hidden" value="arp_add_pricing_table" name="page">
                <div class="arprice_logo"></div>
                <?php
            if ($setact != 1) {
                $admin_css_url = admin_url('admin.php?page=arp_global_settings');
                ?>
                <div style="border-left: 4px solid #ffba00;box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-moz-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-o-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);height:20px;position:absolute;width:97%;padding:10px 25px 10px 0px;background-color:#FFFFFF;text-align:right;color:#000000;font-size:17px;display:block;visibility:visible;" >ARPrice license is not activated. Please activate license from <a href="<?php echo $admin_css_url; ?>">here</a></div>
            <?php } ?>
                <div class="arprice_my_table_container">
                
                    <label class="arprice_label"><?php esc_html_e('My Pricing Tables', 'ARPrice'); ?></label>
                    <?php
                    /**
                     * Retrieving Editable Templates
                     * @since ARPrcie 2.0
                     */
                    global $wpdb;

                    $editable_templates = "SELECT t.*, COUNT(a.pricing_table_id) as views FROM ".$wpdb->prefix."arp_arprice t LEFT JOIN ".$wpdb->prefix."arp_arprice_analytics a ON t.ID = a.pricing_table_id WHERE t.is_template = %d GROUP BY t.ID ORDER BY t.ID DESC";
                    $arp_my_templates = $wpdb->get_results($wpdb->prepare($editable_templates, 0));
                    ?>
                    <div class="arp_tables_container">
                        <?php
                        foreach ($arp_my_templates as $key => $template) {
                            $template_opt = maybe_unserialize($template->general_options);
                            $template_name = $template_opt['template_setting']['template'];
                            $reference_template = $template_opt['general_settings']['reference_template'];
                            $table_name = $template->table_name;
                            $arp_template_id = $template->ID;
                            $total_visit = $template->views;
                            ?>
                            <div id="arp_template_<?php echo $arp_template_id; ?>" class="arp_editable_templates" ondblclick="window.location.href = '<?php echo admin_url('admin.php?page=arprice&arp_action=edit&eid=' . $arp_template_id); ?>'">
                                <div class="arprice_template_inner_content">
                                    <div class="arp_editable_templates_img" id="arptemplate_<?php echo $arp_template_id; ?>">
                                        <div id="img">
                                        </div>
                                        <script type="text/javascript">
                                            if (screen.width > 1900) {
                                                var img = '<img class="template_large_img" src="<?php echo PRICINGTABLE_UPLOAD_URL . '/template_images/arptemplate_' . $arp_template_id . '_large.png'; ?>" alt="<?php echo esc_html($table_name); ?>" align="absmiddle" />';
    <?php
    if (!file_exists(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $arp_template_id . '_large.png')) {
        ?>
                                                    jQuery('.arp_editable_templates_img#arptemplate_' +<?php echo $arp_template_id; ?>).find('#img').html('<span class="no_image_text">No Image</span>');
        <?php
    } else {
        ?>
                                                    jQuery('.arp_editable_templates_img#arptemplate_' +<?php echo $arp_template_id; ?>).find('#img').html(img);
    <?php } ?>
                                            } else if (screen.width >= 1600) {
                                                var img = '<img class="template_big_img" src="<?php echo PRICINGTABLE_UPLOAD_URL . '/template_images/arptemplate_' . $arp_template_id . '_big.png'; ?>" alt="<?php echo esc_html($table_name); ?>" align="absmiddle" />';
    <?php
    if (!file_exists(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $arp_template_id . '_big.png')) {
        ?>
                                                    jQuery('.arp_editable_templates_img#arptemplate_' +<?php echo $arp_template_id; ?>).find('#img').html('<span class="no_image_text">No Image</span>');
        <?php
    } else {
        ?>
                                                    jQuery('.arp_editable_templates_img#arptemplate_' +<?php echo $arp_template_id; ?>).find('#img').html(img);
    <?php } ?>
                                            } else {
                                                var img = '<img  class="template_img" src="<?php echo PRICINGTABLE_UPLOAD_URL . '/template_images/arptemplate_' . $arp_template_id . '.png'; ?>" align="absmiddle" alt="<?php echo esc_html($table_name); ?>" height="150px" />';
    <?php
    if (!file_exists(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $arp_template_id . '.png')) {
        ?>
                                                    jQuery('.arp_editable_templates_img#arptemplate_' +<?php echo $arp_template_id; ?>).find('#img').html('<span class="no_image_text">No Image</span>');
        <?php
    } else {
        ?>
                                                    jQuery('.arp_editable_templates_img#arptemplate_' +<?php echo $arp_template_id; ?>).find('#img').html(img);
    <?php } ?>
                                            }
                                        </script>
                                    </div>
                                    <ul class="arp_editable_template_info">
                                        <li class="arp_editable_template_info_item">
                                            <label class="arp_template_info_left"><?php esc_html_e('Title', 'ARPrice'); ?></label>
                                            <label class="arp_template_info_right"><?php echo $template->table_name; ?></label>
                                        </li>
                                        <li class="arp_editable_template_info_item">
                                            <label class="arp_template_info_left"><?php esc_html_e('Last modified', 'ARPrice'); ?></label>
                                            </label>
                                            <label class="arp_template_info_right">
                                                <?php
                                                $date_format = get_option('date_format');
                                                $last_update_date = $template->arp_last_updated_date;
                                                if ($last_update_date == "0000-00-00 00:00:00")
                                                    $last_update_date = $template->create_date;
                                                echo date($date_format, strtotime($last_update_date));
                                                ?>
                                            </label>
                                        </li>
                                        <li class="arp_editable_template_info_item">
                                            <label class="arp_template_info_left"><?php esc_html_e('Statistics', 'ARPrice'); ?></label>
                                            <label class="arp_template_info_right">
                                                <?php echo $total_visit . ' ( Visits )'; ?>

                                                <div class="arprice_chart_icon arptooltipster" data-template-views="<?php echo  $total_visit; ?>" title="<?php esc_html_e('Statistics', 'ARPrice'); ?>" id="arprice_get_analytics" data-template-id="<?php echo $arp_template_id; ?>" ></div>

                                            </label>
                                        </li>
                                        <li class="arp_editable_template_info_item" id="arprice_shortcode_wrapper">
                                            <label class="arp_template_info_left"><?php esc_html_e('Shortcode', 'ARPrice'); ?></label>
                                            <label class="arp_template_info_right arprice_shortcode" data-field='arp_dashboard_shortcode'>
                                                <input type="text" class="arp_input_shortcode_dashboard" name="arp_dashboard_shortcode" value="[ARPrice id=<?php echo $arp_template_id; ?>]" onClick="this.select();" readonly/>    
                                            </label>

                                        </li>
                                    </ul>
                                </div>
                                <div class="arp_editable_template_action_btn">
                                    <div class='template_action_button preview_template' id='preview_btn' onClick='arp_price_preview_home("<?php echo $arprice_form->get_direct_link($template->ID, true) ?>");' title='<?php esc_html_e('Preview', 'ARPrice'); ?>' ></div>
                                    <div id="edit_template" class="template_action_button edit_template" title="<?php esc_html_e('Select Table', 'ARPrice'); ?>" onclick="window.location.href = '<?php echo admin_url('admin.php?page=arprice&arp_action=edit&eid=' . $template->ID) ?>'"></div>
                                    <div id="clone_template" class="template_action_button clone_template" onclick="window.location.href = '<?php echo admin_url('admin.php?page=arprice&arp_action=new&eid=' . $template->ID); ?>'" title="<?php esc_html_e('Clone Table', 'ARPrice'); ?>"></div>
                                    <div id="delete_template" class="template_action_button delete_template" data-template-id="<?php echo $template->ID; ?>" title="<?php esc_html_e('Delete Table', 'ARPrice'); ?>"></div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="arp_tables_container arp_default_templates_listing" id="arp_default_templates_listing">
                <div class="arp_default_template_menu_title_belt arp_download_button" >
                    <div class="arp_top_edit_menu_inner">
                        <div class="top_edit_menu_title"><?php esc_html_e('Please Select Your Template', 'ARPrice'); ?></div>
                        <button class="arp_temp_down_btn" type="button"><?php esc_html_e('Download Free Samples', 'ARPrice'); ?></button>
                    </div>
                </div>
                <?php
                /**
                 * Retrieving Default Templates
                 * @since ARPrice 2.0
                 */
                global $arp_pricingtable;
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
                <div class="arp_tables_content_container">
                    <div class="arp_tables_inner_container">
                        <div class="arp_tables_list_container">
                            <div class="arp_tables_listing">
                                <?php
                                foreach ($template_new_orders as $key => $template) {
                                    $template_opt = maybe_unserialize($template->general_options);
                                    $template_name = $template_opt['template_setting']['template'];
                                    $reference_template = $template_opt['general_settings']['reference_template'];
                                    $table_name = $template->table_name;
                                    $arp_template_id = $template->ID;
                                    ?>
                                    <div id="arp_template_<?php echo $template->ID; ?>" data-reference-table='<?php echo $reference_template; ?>' class="arp_template_scheme custom_template" is_template='0'>
                                        <div class="template_action_div_belt">
                                            <div class="template_action_div_inner_belt">
                                                <div id="clone_template" onclick="window.location.href = '<?php echo admin_url('admin.php?page=arprice&arp_action=new&eid=' . $template->ID); ?>'" class="template_action_button clone_template" title=""></div>
                                                <div class='template_action_button preview_template' id='preview_btn' onClick='arp_price_preview_home("<?php echo $arprice_form->get_direct_link($template->ID, true) ?>");' title='' ></div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            if (screen.width > 1900) {
                                                var img = '<img class="template_large_img" src="<?php echo PRICINGTABLE_IMAGES_URL . '/' . $reference_template . '_large_v' . $arprice_images_css_version . '.png'; ?>" alt="<?php echo esc_html($table_name); ?>" align="absmiddle" />';
                                                jQuery("#arp_template_<?php echo $template->ID ?>").find('.template_action_div_belt').after(img);
                                            } else if (screen.width >= 1600 && screen.width < 1900) {

                                                if (Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0) {


                                                    var img = '<img  class="template_img" src="<?php echo PRICINGTABLE_IMAGES_URL . '/' . $reference_template . '_v' . $arprice_images_css_version . '.png'; ?>" align="absmiddle" alt="<?php echo esc_html($table_name); ?>" />';
                                                    jQuery("#arp_template_<?php echo $template->ID ?>").find('.template_action_div_belt').after(img);
                                                }
                                                else
                                                {
                                                    var img = '<img class="template_big_img" src="<?php echo PRICINGTABLE_IMAGES_URL . '/' . $reference_template . '_big_v' . $arprice_images_css_version . '.png'; ?>" alt="<?php echo esc_html($table_name); ?>" align="absmiddle" />';
                                                    jQuery("#arp_template_<?php echo $template->ID ?>").find('.template_action_div_belt').after(img);

                                                }
                                            } else {
                                                var img = '<img  class="template_img" src="<?php echo PRICINGTABLE_IMAGES_URL . '/' . $reference_template . '_v' . $arprice_images_css_version . '.png'; ?>" align="absmiddle" alt="<?php echo esc_html($table_name); ?>" />';
                                                jQuery("#arp_template_<?php echo $template->ID ?>").find('.template_action_div_belt').after(img);
                                            }
                                        </script>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="arp_user_help_section">
                <div class="arp_guid_btn" title="Documentation" id="arp_documentation" onclick="javascript:open_documentation('<?php echo ARPURL; ?>/documentation/index.html');"><img src="<?php echo PRICINGTABLE_URL; ?>/images/documentation-icon.png" /></div>
                <div class="arp_guid_btn" id="arp_tour_guide_start" title="Tour Guide"><img src="<?php echo PRICINGTABLE_URL; ?>/images/tour-guid-icon.png" /></div>
                <br /><br />
                <img src="<?php echo ARPURL; ?>/images/dot.png" height="15" width="15" onclick="javascript:open_documentation('<?php echo ARPURL; ?>/documentation/assets/sysinfo.php');" />
            </div>

            <!-- Template Preview Model -->
            <div class="arp_admin_modal_overlay">
                <div class="arp_admin_modal arp_desktop_view" id="arp_pricing_table_preview">
                    <div class="arp_model_preview_belt">
                        <div class="device_icon active" id="computer_icon">
                            <div class="computer_icon">&#xf108;</div>
                        </div>
                        <div class="device_icon" id="tablet_icon">
                            <div class="tablet_icon">&#xf3fa;</div>
                        </div>
                        <div class="device_icon" id="mobile_icon">
                            <div class="mobile_icon">&#xf3cd;</div>
                        </div>
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
            <div class="arp_admin_modal_overlay">
                <div class="arp_model_delete_box" id="arp_tour_guide_model" style="background:white;">
                    <div class="modal_top_belt">
                        <span class="modal_title"><?php esc_html_e('ARPrice Guided Tour', 'ARPrice'); ?></span>
                        <span id="nav_style_close" class="arp_tour_guide_start_model arp_modal_close_btn b-close"></span>
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
                            <button id="Model_Delete_Template"  type="button" class="ribbon_insert_btn delete_template">Okay</button>
                            <button id="Model_Delete_Template"  class="ribbon_cancel_btn" type="button">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Remove template -->

            

            <!-- ARPrice Template Analytic Model Window -->
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
                            <button id='daily_button' class="arp_daily_weekly_button">Daily</button>
                            <button id='weekly_button' class="arp_daily_weekly_button_hover">Weekly</button>
                        </div>
                        <div class="arp_date_picker">
                            <input id="analytic_start_date" name="analytic_start_date" type="hidden" value="<?php echo date('d-') . date("m", strtotime("-1 month")) . '-' . date("Y", strtotime("-1 month")); ?>" />
                            <input id="analytic_end_date"  name="analytic_end_date" type="hidden"  value="<?php echo date('d-m-Y'); ?>"/>

                            <div id="arp_range_datepicker" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px;  width: 100%;z-index:999999;">
                            <i class="glyphicon glyphicon-calendar fas fa-calendar"></i>&nbsp;
                                <span><?php
                                    $last_month = date("M", strtotime("-1 month"));
                                    echo $last_month . ',' . date('d')
                                    ?> - <?php echo date('M,d'); ?></span> <b class="caret"></b>
                            <div class="fas fa-angle-down fa-lg" style="margin-left: 4px;"></div>
                            </div>
                        </div>

                        <div class="arprice_analytic_content">
                            <div class="arp_analysis">
                                <div class="arp_view">
                                    <div class="arp_view_icon">
                                        <img src="<?php echo PRICINGTABLE_IMAGES_URL . '/view_icon.png'; ?>">                            
                                    </div>
                                    <div class="arp_no_views"></div>
                                    <div class="clear"></div>
                                    <div class="arp_view_label">total views</div>
                                </div>
                                <div class="arp_click">
                                    <div class="arp_click_icon">
                                        <img src="<?php echo PRICINGTABLE_IMAGES_URL . '/clicks_icon.png'; ?>">                            
                                    </div>
                                    <div class="arp_no_clicks"></div>
                                    <div class="clear"></div>
                                    <div class="arp_view_label">total clicks</div>
                                </div>
                                <div class="arp_conversion">
                                    <div class="arp_conversation_icon">
                                        <img src="<?php echo PRICINGTABLE_IMAGES_URL . '/conversation_icon.png'; ?>">                            
                                    </div>
                                    <div class="arp_no_conversion"></div>
                                    <div class="clear"></div>
                                    <div class="arp_view_label">conversation</div>
                                </div>                    
                            </div>
                            <div class="arprice_basic_area" id="arprice_basic_area">
                            </div>
                            <div class="arp_chart_devider">
                            </div>
                            <div class="arprice_donut_chart" id="arprice_donut_chart">
                            </div>  
                        </div>            
                        <div class="clear"></div>
                        <div class="arp_chart_title">
                            <div class='arp_chart_title_1'>Visits & Clicks</div>
                            <div class='arp_chart_title_2'>Country Wise Visit</div>
                        </div>
                        <div class="arp_analytic_devider"></div>
                        <div class="arp_analytic_table_box">
                            <div class="arp_analytic_table_title"> Visitor Listing</div>
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
                            startdate = jQuery('#analytic_start_date').val();
                            enddate = jQuery('#analytic_end_date').val();
                            jQuery('#arp_range_datepicker').daterangepicker({
                                locale: {
                                    format: 'DD-MM-YYYY'
                                },
                                startDate: startdate,
                                endDate: enddate,
                                opens: "left"
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
                                        jQuery('.arp_no_clicks').html('');
                                        jQuery('.arp_no_views').html('');
                                        jQuery('.arp_no_conversion').html('');
                                        jQuery('.arp_no_views').html(result.browser.no_of_views);
                                        jQuery('.arp_no_clicks').html(result.browser.no_of_clicks);
                                        jQuery('.arp_no_conversion').html(result.browser.conversion + ' %');
                                        jQuery('#arprice_basic_area').highcharts(result.browser);
                                    }
                                });

                            });
                            jQuery('.daterangepicker').attr('style', '');
                            jQuery('.daterangepicker').css('z-index', '11111111');
                        });
                    </script>
                </div>
            </div>
            <!-- ARPrice Template Analytic Model Window -->

            <!-- ARPrice Restrict Dashboard Model Window-->
            <?php
            $table = $wpdb->get_results("SHOW TABLES LIKE '" . $wpdb->prefix . "arp_arprice_temp' ");
            if (count($table) > 0) {
                ?>
                <div class="arp_admin_modal_overlay">
                    <div class="arp_modal_box" id="arprice_restrice_dashboard_model" style="background:white;display:inline-block;">
                        <div class="modal_top_belt" style="height:auto;">
                            <span class="modal_title" style="height:71px;line-height:normal;"><?php esc_html_e('Template Migration Process', 'ARPrice'); ?>
                                <br />
                                <?php esc_html_e('<span style="font-size:14px;">Please select your tables/templates which you want to migrate to new version.</span>', 'ARPrice'); ?>
                                <br />
                                <?php esc_html_e('<span style="color:red;font-weight:bold;font-size:14px;">This facility will not be available again, You can migrate only once.</span>', 'ARPrice'); ?></span>
                                <!--<span class="modal_close_btn b-close"></span>-->
                        </div>
                        <div class="arp_restrict_dashboard_content" id="arp_restrict_dashboard_content" >
                            <?php
                            $val = $wpdb->get_results("select 1 from " . $wpdb->prefix . "arp_arprice_temp LIMIT 1");

                            if ($val !== FALSE) {
                                $old_templates = $wpdb->get_results("SELECT ID,table_name FROM " . $wpdb->prefix . "arp_arprice_temp ORDER BY ID ASC");
                            } else {
                                $old_templates = array();
                            }

                            foreach ($old_templates as $old_template) {
                                ?>
                                <div class="arprice_dashboard_restict_old_table_listing">
                                    <input type="checkbox" name="arprice_old_templates[]" id="arprice_old_templates_<?php echo $old_template->ID; ?>" class="arp_checkbox light_bg modal_single arprice_old_templates" value="<?php echo $old_template->ID; ?>" />
                                    &nbsp;&nbsp;<label for="arprice_old_templates_<?php echo $old_template->ID; ?>"><?php echo $old_template->table_name ?></label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="arprice_dashboard_model_button_wrapper">
                            <div class="arprice_dashboard_model_notice">
                                <input type="checkbox" name="arprice_import_old_template_notice" id="arprice_import_old_template_notice" value="1" class="arp_checkbox light_bg modal_single" />&nbsp;&nbsp;<label for="arprice_import_old_template_notice"> <?php esc_html_e('I accept that my old templates will be gone if I don\'t migrate old tables now.', 'ARPrice'); ?></label>
                            </div>
                            <div class="arprice_dashboard_notice_button">
                                <input type="button" name="arprice_import_old_template_button" id="arprice_import_old_template_button" class="disabled arprice_dashboard_model_button" value="<?php esc_html_e('Import', 'ARPrice'); ?>" /> <span class="arprice_migration_process_loader" id="arprice_migration_process_loader" ><img src="<?php echo PRICINGTABLE_IMAGES_URL ?>/ajax_loader_add_new_column.gif" width="20" height="20" /></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <!-- ARPrice Restrict Dashboard Model Window-->
        </div>
    </div>
</div>