<?php
	global $wpdb,$arp_pricingtable,$arprice_ab_testing,$arpricelite_version;
	if (is_ssl()){
	    $google_font_url = "https://fonts.googleapis.com/css?family=Ubuntu:400,500,700";
	} else {
	    $google_font_url = "http://fonts.googleapis.com/css?family=Ubuntu:400,500,700";
	}

	$template_list = $wpdb->get_results( $wpdb->prepare( "SELECT id,table_name FROM `".$wpdb->prefix."arp_arprice` WHERE is_template = %d AND status = %s ORDER BY id DESC", 0, 'published' ) );

	$get_table_data = $wpdb->get_row( "SELECT options,last_updated_date FROM `".$wpdb->prefix."arp_ab_testing` ORDER BY id ASC LIMIT 1" );

	$table_data = array();
	$variation_tables = array();
	$shortcodeCls = "";
	if( !empty( $get_table_data ) ){
		$table_data = json_decode( $get_table_data->options,true );
		$variation_tables = $table_data['variation_table'];
		$shortcodeCls = "active";
	}
	
	
        global $arprice_class;
        $setact = 0;
        global $arp_chk_version;
        $setact = 1;

        $table_last_updated = isset( $get_table_data->last_updated_date ) ? $get_table_data->last_updated_date : '';
?>
<input type="hidden" id="arp_ab_analytic_title" value="<?php echo esc_html_e('A/B Testing Analytics','ARPrice').' ( ' . esc_html__( 'From', 'ARPrice' ) . ' ' . $table_last_updated . ' ' . esc_html__('till now','ARPrice').' )'; ?>" />
<input type="hidden" id="yAxis_title" value="<?php esc_html_e('Clicks & Views in %','ARPrice'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $google_font_url; ?>" />
<style type="text/css">
	#wpcontent, #wpfooter,#wpwrap{
        background: #fff;
    }
</style>
<div class="success_message" id="arp_ab_testing_success_msg">
	<div class="message_description"></div>
</div>
<div class="dashboard_error_message" id="arp_ab_testing_error_message">
    <div class="message_description"></div>
</div>
<div class="arp_ab_testing_main">	
	<?php
            if ($setact != 1) {
                $admin_css_url = admin_url('admin.php?page=arp_global_settings');
                ?>
				<div class="arp_ab_testing_main_title" style="margin-bottom:10px;"><?php esc_html_e('A/B Testing','ARPrice'); ?></div>
                <div style="border-left: 4px solid #ffba00;box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-moz-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);-o-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);height:20px;width:99%;padding:10px 25px 10px 0px;background-color:#FFFFFF;text-align:right;color:#000000;font-size:17px;display:block;visibility:visible;margin-bottom:40px;" >ARPrice license is not activated. Please activate license from <a href="<?php echo $admin_css_url; ?>">here</a></div>
            <?php } else { ?>
				<div class="arp_ab_testing_main_title"><?php esc_html_e('A/B Testing','ARPrice'); ?></div>
			<?php } ?>
	<div class="arp_ab_testing_main_inner">
		<div class="arprice_ab_testing">
			<div class="arp_ab_testing_sub_title"><?php esc_html_e('A/B Testing','ARPrice'); ?> 
			<?php if( is_rtl() ){?>
				<span class="arp_ab_testing_shortcode <?php echo $shortcodeCls; ?>">
					<span class="arp_ab_testing_shortcode_text" title="click to copy" data-shortcode="[ARPrice_ab]">[ARPrice_ab]</span>
					<span class="arp_abtest_shortcode_label">Shortcode:</span>
				</span><input type="text" id="arp_ab_testing_shortcode" value="[ARPrice_ab]" style="position: absolute;left:-999%" />
			<?php }else{ ?>
				<span class="arp_ab_testing_shortcode <?php echo $shortcodeCls; ?>">
					<span class="arp_abtest_shortcode_label">Shortcode:</span>
					<span class="arp_ab_testing_shortcode_text" title="click to copy" data-shortcode="[ARPrice_ab]">[ARPrice_ab]</span>
				</span><input type="text" id="arp_ab_testing_shortcode" value="[ARPrice_ab]" style="position: absolute;left:-999%" />
			<?php }?>
			</div>
			
			<form id="arp_ab_testing_form" method="post">
				<div class="arprice_ab_testing_inner_container">
					<div class="arprice_ab_testing_header_row">
						<?php esc_html_e('Primary Table','ARPrice'); ?>
					</div>
					<div class="arprice_ab_testing_primary_table_row">
						<div class="arprice_ab_testing_label_wrapper">
							<div class="arprice_ab_testing_row_label"><?php esc_html_e('Select Primary Table','ARPrice'); ?></div>
							<div class="arprice_ab_testing_impression_label" id="arprice_ab_testing_primary_impression"><?php esc_html_e('Weightage','ARPrice'); ?></div>
						</div>
						<div class="arprice_ab_testing_row_input">
							<?php
								$primary_table = isset( $table_data['primary_table'] ) ? $table_data['primary_table'] : '';
								$primary_table_name = esc_html__('Select Table','ARPrice');
								if( '' != $primary_table ){
									$table_db_data = $wpdb->get_row( $wpdb->prepare("SELECT id,table_name FROM `".$wpdb->prefix."arp_arprice` WHERE id = %d",$primary_table) );
									$primary_table_name = $table_db_data->table_name.' (ID:'.$table_db_data->id.')';
								}
							?>
							<input type="hidden" name="arprice_ab_testing_primary_table" id="arprice_ab_testing_primary_table" value="<?php echo $primary_table; ?>" />
							<dl class="arprice_selectbox" data-id="arprice_ab_testing_primary_table">
								<dt>
									<span><?php echo $primary_table_name; ?></span>
									<svg viewBox="0 0 2000 1000" width="15px" height="15px"><g fill="#000000"><path d="M1024 320q0 -26 -19 -45t-45 -19h-896q-26 0 -45 19t-19 45t19 45l448 448q19 19 45 19t45 -19l448 -448q19 -19 19 -45z"></path></g></svg>
								</dt>
								<dd>
									<ul data-id="arprice_ab_testing_primary_table">
										<li data-value="" data-label="<?php esc_html_e('Select Table','ARPrice'); ?>"><?php esc_html_e('Select Table','ARPrice'); ?></li>
										<?php
										foreach( $template_list as $template ){
										?>
										<li data-value="<?php echo $template->id; ?>" data-label="<?php echo $template->table_name.' (ID:'.$template->id.')'; ?>"><?php echo $template->table_name.' (ID:'.$template->id.')'; ?></li>
										<?php
										}
										?>
									</ul>
								</dd>
							</dl>
						</div>
						<?php 
							$primary_table_impression = isset( $table_data['primary_table_impression'] ) ? $table_data['primary_table_impression'] : '';
						?>
						<div class="arprice_ab_testing_impression_wrapper">
							<div class="arprice_db_testing_impression_input_wrapper primary_tbl_prtg_wrap" >
								<input type="text" name="arp_ab_primary_tbl_impression" class="arprice_db_testing_primary_impression_input arp_numeric primary_tbl_prtg_wrap" readonly="readonly" value="<?php echo $primary_table_impression; ?>"/>
								<span>%</span>
							</div>
						</div>
						<!-- ////////////////// changelog -->
					</div>
					<div class="arprice_ab_testing_header_row">
						<div id="variation_table_tile"><?php esc_html_e('Variation Tables','ARPrice'); ?></div>
						<span class="column_opt_label_help" id="arp_variation_title_msg"><?php esc_html_e( '( You can add more than one variation table. The total weightage of variation table should be less than 100. The rest of the weightage will be applied to the primary table. )', 'ARPrice' ); ?></span>
					
					</div>
					<div class="arprice_ab_testing_variation_table_row">
						<div id="arprice_ab_testing_variation_tables">
							<div class="arprice_ab_testing_row_input_wrapper">
								<div class="arprice_ab_testing_label_wrapper">
									<div class="arprice_ab_testing_row_label"><?php esc_html_e('Select Variation Table','ARPrice'); ?></div>
									
								</div>
							</div>
								<?php if( !isset($variation_tables) || count($variation_tables) < 1) {?>
									<div class="arprice_ab_testing_row_input_wrapper">
										<div class="arprice_ab_testing_row_input">
											<input type="hidden" name="arprice_ab_testing_variation_table[]" id="arprice_ab_testing_variation_table_0" />
											<dl class="arprice_selectbox" data-id="arprice_ab_testing_variation_table_0">
												<dt>
													<span><?php esc_html_e('Select table','ARPrice'); ?></span>
													<svg viewBox="0 0 2000 1000" width="15px" height="15px"><g fill="#000000"><path d="M1024 320q0 -26 -19 -45t-45 -19h-896q-26 0 -45 19t-19 45t19 45l448 448q19 19 45 19t45 -19l448 -448q19 -19 19 -45z"></path></g></svg>
												</dt>
												<dd>
													<ul data-id="arprice_ab_testing_variation_table_0">
														<li data-value="" data-label="<?php esc_html_e('Select Table','ARPrice'); ?>"><?php esc_html_e('Select Table','ARPrice'); ?></li>
														<?php
														foreach( $template_list as $template ){
														?>
														<li data-value="<?php echo $template->id; ?>" data-label="<?php echo $template->table_name.' (ID:'.$template->id.')'; ?>"><?php echo $template->table_name.' (ID:'.$template->id.')'; ?></li>
														<?php
														}
														?>
													</ul>
												</dd>
											</dl>
										</div>
										<div class="arprice_ab_testing_impression_wrapper">
											<div class="arprice_db_testing_impression_input_wrapper">
												<input type="text" name="arprice_ab_testing_impression[]" data-row-id="0" class="arprice_db_testing_impression_input arp_numeric" />
												<span>%</span>
											</div>
										</div>
										<div class="arprice_db_testing_action_button_wrapper">
											<span id="arprice_add_ab_testing_table" class="arprice_ab_testing_button"><i class="fas fa-plus fa-lg"></i></span>
										</div>
									</div>
								<?php
								} else {
									$n = 0;
									$variation_table_label = esc_html__('Select Table','ARPrice');
									foreach( $variation_tables as $vkey => $vtable ){
										$vtable_id = $vtable['id'];
										$vtable_name = $wpdb->get_var( $wpdb->prepare( "SELECT table_name FROM `".$wpdb->prefix."arp_arprice` WHERE id = %d", $vtable_id ) );
										$variation_table_label = $vtable_name.' (ID:'.$vtable_id.')';
										$vtable_impression = $vtable['impression'];
										$data_id = '';
										if( $n > 0 ){
											$data_id = $n;
										}
									?>
									<div class="arprice_ab_testing_row_input_wrapper" data-row-id="<?php echo $data_id; ?>">
									<div class="arprice_ab_testing_row_input">
										<input type="hidden" name="arprice_ab_testing_variation_table[]" id="arprice_ab_testing_variation_table_<?php echo $n; ?>" value="<?php echo $vtable_id; ?>" />
										<dl class="arprice_selectbox" data-id="arprice_ab_testing_variation_table_<?php echo $n; ?>">
											<dt>
												<span><?php echo $variation_table_label; ?></span>
												<svg viewBox="0 0 2000 1000" width="15px" height="15px"><g fill="#000000"><path d="M1024 320q0 -26 -19 -45t-45 -19h-896q-26 0 -45 19t-19 45t19 45l448 448q19 19 45 19t45 -19l448 -448q19 -19 19 -45z"></path></g></svg>
											</dt>
											<dd>
												<ul data-id="arprice_ab_testing_variation_table_<?php echo $n; ?>">
													<li data-value="" data-label="<?php esc_html_e('Select Table','ARPrice'); ?>"><?php esc_html_e('Select Table','ARPrice'); ?></li>
													<?php
													foreach( $template_list as $template ){
													?>
													<li data-value="<?php echo $template->id; ?>" data-label="<?php echo $template->table_name.' (ID:'.$template->id.')'; ?>"><?php echo $template->table_name.' (ID:'.$template->id.')'; ?></li>
													<?php
													}
													?>
												</ul>
											</dd>
										</dl>
									</div>
									<div class="arprice_ab_testing_impression_wrapper">
										<div class="arprice_db_testing_impression_input_wrapper">
											<input type="text" name="arprice_ab_testing_impression[]" data-row-id="<?php echo $n; ?>" class="arprice_db_testing_impression_input arp_numeric" value="<?php echo $vtable_impression; ?>" />
											<span>%</span>
										</div>
									</div>
									<div class="arprice_db_testing_action_button_wrapper">
										<span id="arprice_add_ab_testing_table" class="arprice_ab_testing_button"><i class="fas fa-plus fa-lg"></i></span>
									</div>
								<?php
									if( $n > 0 ){
								?>
										<span id="arprice_remove_ab_testing_table" data-row-id="<?php echo $n; ?>" class="arprice_ab_testing_remove_button"><i class="far fa-trash-alt fa-lg"></i></span>
								<?php
									}
								?></div><?php
									$n++;
									}
								} ?>
						</div>
					</div>
					
					<div class="arp_save_ab_testing_shortcode_wrapper">
						<button type="button" id="save_ab_testing_shortcode" class="save_ab_testing_shortcode"><?php esc_html_e('Save','ARPrice'); ?></button>
						<div class="arp_save_ab_testing_notice_wrapper">
							<span><?php esc_html_e('Saving the A/B testing settings will reset the Analytics. Do you want to continue?', 'ARPrice') ?></span>
							<div class="arp_save_ab_testing_notice_button_wrapper">
								<span class="arp_save_ab_setting_btns arp_ok_btn" id="arp_ab_save_settings_ok"><?php esc_html_e('OK','ARPrice'); ?></span>
								<span class="arp_save_ab_setting_btns arp_cancel_btn" id="arp_ab_save_settings_cancel"><?php esc_html_e('Cancel','ARPrice'); ?></span>
							</div>
						</div>
					</div>
					<i class="fas fa-spinner fa-spin arp_ab_testing_shortcode_loader"></i>
				</div>
			</form>
			<div class="arp_ab_testing_sub_title arp_no_overflow"><?php esc_html_e('A/B Testing Analytics','ARPrice'); ?>
				<div class="arp_ab_testing_reset_analytic shortcode_class_none">

					<div class="tipso_style arp_reset_analytics_btn" data-title="Reset Analytics">
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="redo" class="svg-inline--fa fa-redo fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style=" height: 35px; width: 20px;"><path fill="currentColor" d="M500.33 0h-47.41a12 12 0 0 0-12 12.57l4 82.76A247.42 247.42 0 0 0 256 8C119.34 8 7.9 119.53 8 256.19 8.1 393.07 119.1 504 256 504a247.1 247.1 0 0 0 166.18-63.91 12 12 0 0 0 .48-17.43l-34-34a12 12 0 0 0-16.38-.55A176 176 0 1 1 402.1 157.8l-101.53-4.87a12 12 0 0 0-12.57 12v47.41a12 12 0 0 0 12 12h200.33a12 12 0 0 0 12-12V12a12 12 0 0 0-12-12z"></path></svg>

					</div>
					<div class="arp_ab_testing_reset_notice_wrapper">
						<span><?php esc_html_e('Are you sure you want to reset the Analytics?','ARPrice'); ?></span>
						<div class="arp_reset_notice_button_wrapper">
							<span class="arp_reset_analytics_settings arp_ok_btn" id="arp_reset_analytics_ok_btn"><?php esc_html_e('OK','ARPrice'); ?></span>
							<span class="arp_reset_analytics_settings arp_cancel_btn" id="arp_reset_analytics_cancel"><?php esc_html_e('Cancel','ARPrice'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="arprice_ab_testing_inner_container">
				<div id="arprice_ab_testing_chart_container" class="arprice_ab_testing_chart_container"></div>
			</div>
		</div>
	</div>
</div>

<div id="arprice_analytic_table" class="arprice_analytic_table" style="display:none;">
	<table id="chart_data">
		<thead>
			<tr>
				<th></th>
				<th><?php esc_html_e('Views','ARPrice'); ?></th>
				<th><?php esc_html_e('Clicks','ARPrice'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$ab_analytics_data = $arprice_ab_testing->arp_get_table_analytics_data();
				if( count( $ab_analytics_data) > 0 ){
					foreach( $ab_analytics_data as $abkey => $abval ){
					?>
					<tr>
						<th><?php echo $abval['name']; ?></th>
						<td><?php echo $abval['view']; ?></td>
						<td><?php echo $abval['click']; ?></td>
					</tr>
					<?php
					}
				}
			?>
		</tbody>
	</table>
</div>

<div class="arprice_ab_testing_raw_wrapper" style="display: none;">
	<div class="arprice_ab_testing_row_input_wrapper" data-row-id="{index}">
		<div class="arprice_ab_testing_row_input" >
			<input type="hidden" name="arprice_ab_testing_variation_table[]" id="arprice_ab_testing_variation_table_{index}" />
			<dl class="arprice_selectbox" data-id="arprice_ab_testing_variation_table_{index}">
				<dt>
					<span><?php esc_html_e('Select table','ARPrice'); ?></span>
					<svg viewBox="0 0 2000 1000" width="15px" height="15px"><g fill="#000000"><path d="M1024 320q0 -26 -19 -45t-45 -19h-896q-26 0 -45 19t-19 45t19 45l448 448q19 19 45 19t45 -19l448 -448q19 -19 19 -45z"></path></g></svg>
				</dt>
				<dd>
					<ul data-id="arprice_ab_testing_variation_table_{index}">
						<li data-value="" data-label="<?php esc_html_e('Select Table','ARPrice'); ?>"><?php esc_html_e('Select Table','ARPrice'); ?></li>
						<?php
						foreach( $template_list as $template ){
						?>
						<li data-value="<?php echo $template->id; ?>" data-label="<?php echo $template->table_name.' (ID:'.$template->id.')'; ?>"><?php echo $template->table_name.' (ID:'.$template->id.')'; ?></li>
						<?php
						}
						?>
					</ul>
				</dd>
			</dl>
		</div>
		<div class="arprice_ab_testing_impression_wrapper">
			<div class="arprice_db_testing_impression_input_wrapper">
				<input type="text" name="arprice_ab_testing_impression[]" data-row-id="{index}" class="arprice_db_testing_impression_input arp_numeric" />
				<span>%</span>
			</div>
		</div>
		<div class="arprice_db_testing_action_button_wrapper">
			<span id="arprice_add_ab_testing_table" class="arprice_ab_testing_button"><i class="fas fa-plus fa-lg"></i></span>
		</div>
		<span id="arprice_remove_ab_testing_table" data-row-id="{index}" class="arprice_ab_testing_remove_button"><i class="far fa-trash-alt fa-lg"></i></span>
	</div>
</div>