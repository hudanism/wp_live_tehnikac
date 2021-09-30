<?php

global $arprice_form, $arp_mainoptionsarr, $arp_coloptionsarr;

$arp_is_rtl = is_rtl();

$tablestring .= "<div class='column_level_settings' id='column_level_settings_new' data-column='main_" . $j . "'>";
$tablestring .= "<div class='btn-main'>";


$tablestring .= "<div class='column_level_button_wrapper'>";

	$tablestring .= "<div class='arp_btn' id='column_level_options__button_1' data-level='column_level_options' style='display:none;' title='" . esc_html__('Column Settings', 'ARPrice') . "' data-title='" . esc_html__('Column Settings', 'ARPrice') . "'></div>";

	

	$tablestring .= "<div class='arp_btn' id='column_level_options__button_2' data-level='column_level_options' style='display:none;' title='" . esc_html__('Background and Font Colors', 'ARPrice') . "' data-title='" . esc_html__('Background and Font Colors', 'ARPrice') . "' ></div>";
	

	$column_hide_input_classes = '';
	if($column_hide == 1){
	    $column_hide_input_classes = "selected arp_column_hide_enabled";
	}	

	$tablestring .= "<div class='arp_btn arp_btn_icon_wrapper ".$column_hide_input_classes."' id='arp_hide_column' col-id=" . $col_no[1] . " data-level='column_level_options' style='display:none;' title='" . esc_html__('Hide/Show Column', 'ARPrice') . "' data-title='" . esc_html__('Hide/Show Column', 'ARPrice') . "' ><input type='hidden' name='column_hide_".$col_no[1]."' id='column_hide_input_". $col_no[1] ."' value='".$column_hide."'> </div>";
	
	$tablestring .= "<div class='arp_btn action_btn' col-id=" . $col_no[1] . " data-level='column_level_options' id='duplicate_column' style='display:none;' title='" . esc_html__('Duplicate Column', 'ARPrice') . "'  data-title='" . esc_html__('Duplicate Column', 'ARPrice') . "'></div>";

	$tablestring .= "<div class='arp_btn action_btn' col-id=" . $col_no[1] . " data-level='column_level_options' id='delete_column' style='display:none;' title='" . esc_html__('Delete Column', 'ARPrice') . "'  data-title='" . esc_html__('Delete Column', 'ARPrice') . "'>";
		$tablestring .= "<div class='delete_column_container' id='delete_column_container_" . $col_no[1] . "'>";
			$tablestring .= "<div class='delete_column_arrow'></div>";
			$tablestring .= "<div class='delete_column_title'>";
				$tablestring .= esc_html__('Are you sure want to delete this column?', 'ARPrice');
			$tablestring .= "</div>";
			$tablestring .= "<div class='delete_column_buttons'>";
				$tablestring .= "<button col-id='" . $col_no[1] . "' type='button' class='ribbon_insert_btn arp_delete_column_btn delete_column'>" . esc_html__('Ok', 'ARPrice') . "</button>";
				$tablestring .= "<button col-id='" . $col_no[1] . "' type='button' class='ribbon_cancel_btn arp_cancel_delete_column_btn'>" . esc_html__('Cancel', 'ARPrice') . "</button>";
			$tablestring .= "</div>";
		$tablestring .= "</div>";
	$tablestring .= "</div>";

	$tablestring .= "<div class='arp_btn debug_action_btn' col-id=" . $col_no[1] . " data-level='column_level_options' id='css_debug' style='display:none;' title='" . esc_html__('CSS Class Information', 'ARPrice') . "' data-title='" . esc_html__('CSS Class Information', 'ARPrice') . "'></div>";

$tablestring .= "</div>";


$tablestring .= "<div class='body_li_level_button_wrapper'>";

	$tablestring .= "<div class='arp_btn' id='body_li_level_options__button_1' data-level='body_li_level_options' title='" . esc_html__('Description Settings', 'ARPrice') . "' data-title='" . esc_html__('Description Settings', 'ARPrice') . "' style='display:none;'></div>";

	$tablestring .= "<div class='arp_btn' id='body_li_level_options__button_2' data-level='body_li_level_options' title='" . esc_html__('Tooltip Settings', 'ARPrice') . "' data-title='" . esc_html__('Tooltip Settings', 'ARPrice') . "' style='display:none;'></div>";

	$tablestring .= "<div class='arp_btn' id='body_li_level_options__button_3' data-level='body_li_level_options' title='" . esc_html__('CSS Properties', 'ARPrice') . "' data-title='" . esc_html__('Custom CSS', 'ARPrice') . "' style='display:none;'></div>";

	$tablestring .= "<div class='arp_btn' id='body_li_level_options__button_4' data-level='body_li_level_options' title='" . esc_html__('Button Image Settings', 'ARPrice') . "' data-title='" . esc_html__('Button Image Settings', 'ARPrice') . "' style='display:none;'></div>";

	$tablestring .= "<div class='arp_btn' id='body_li_level_options__button_5' data-level='body_li_level_options' title='" . esc_html__('Button Link/Script Settings', 'ARPrice') . "' data-title='" . esc_html__('Button Link Settings', 'ARPrice') . "' style='display:none;'></div>";

	$tablestring .= "<div class='arp_btn action_btn' id='copy_row' alt='' col-id='" . $col_no[1] . "' title='" . esc_html__('Duplicate Row', 'ARPrice') . "' data-title='" . esc_html__('Duplicate Row', 'ARPrice') . "' data-level='body_li_level_options' style='display:none;'></div>";

	$tablestring .= "<div class='arp_btn action_btn' id='remove_row' row-id='' col-id='" . $col_no[1] . "' title='" . esc_html__('Delete Row', 'ARPrice') . "' data-title='" . esc_html__('Delete Row', 'ARPrice') . "' data-level='body_li_level_options' style='display:none;'>";
	
		$tablestring .= "<div class='delete_row_container' id='delete_row_container_" . $col_no[1] . "'>";
			$tablestring .= "<div class='delete_row_arrow'></div>";
			$tablestring .= "<div class='delete_row_title'>";
				$tablestring .= esc_html__('Are you sure want to delete this row?', 'ARPrice');
			$tablestring .= "</div>";
			$tablestring .= "<div class='delete_row_buttons'>";
				$tablestring .= "<button col-id='" . $col_no[1] . "' type='button' class='ribbon_insert_btn arp_delete_row_btn delete_row' row-id=''>" . esc_html__('Ok', 'ARPrice') . "</button>";
				$tablestring .= "<button col-id='" . $col_no[1] . "' type='button' class='ribbon_cancel_btn arp_cancel_delete_row_btn' row-id=''>" . esc_html__('Cancel', 'ARPrice') . "</button>";
			$tablestring .= "</div>";
		$tablestring .= "</div>";
	$tablestring .= "</div>";

$tablestring .= "</div>";

$tablestring .= "<div class='header_level_button_wrapper'>";
	$tablestring .= "<div class='arp_btn' id='header_level_options__button_1' data-level='header_level_options' title='" . esc_html__('Header Settings', 'ARPrice') . "' data-title='" . esc_html__('Header Settings', 'ARPrice') . "' style='display:none;'></div>";
	
	$tablestring .= "<div class='arp_btn' id='header_level_options__button_2' data-level='header_level_options' title='" . esc_html__('Media Settings', 'ARPrice') . "' data-title='" . esc_html__('Media Settings', 'ARPrice') . "' style='display:none;'></div>";
$tablestring .= "</div>";


$tablestring .= "<div class='pricing_level_button_wrapper'>";
	$tablestring .= "<div class='arp_btn' id='pricing_level_options__button_1' data-level='pricing_level_options' title='" . esc_html__('Price Settings', 'ARPrice') . "' data-title='" . esc_html__('Price Settings', 'ARPrice') . "'  style='display:none;'></div>";
$tablestring .= "</div>";



$tablestring .= "<div class='body_level_button_wrapper'>";

	$tablestring .= "<div class='arp_btn column_add_new_row_action_btn' id='add_new_row' data-id='" . $col_no[1] . "' title='" . esc_html__('Add New Row', 'ARPrice') . "' data-title='" . esc_html__('Add New Row', 'ARPrice') . "' data-level='body_level_options' style='display:none;'></div>";

	
$tablestring .= "</div>";

$tablestring .= "<div class='column_description_level_button'>";
	$tablestring .= "<div class='arp_btn' id='column_description_level__button_1' data-level='column_description_level' title='" . esc_html__('Column Description Settings', 'ARPrice') . "' data-title='" . esc_html__('Column Description Settings', 'ARPrice') . "' style='display:none;'></div>";
$tablestring .= "</div>";




$tablestring .= "<div class='footer_level_button_wrapper'>";
	$tablestring .= "<div class='arp_btn' id='footer_level_options__button_1' data-level='footer_level_options' title='" . esc_html__('Footer General Settings', 'ARPrice') . "' data-title='" . esc_html__('Footer General Settings', 'ARPrice') . "' style='display:none;'></div>";
	$tablestring .= "<div class='arp_btn' id='footer_level_options__button_2' data-level='footer_level_options' data-title='" . esc_html__('Button General Settings', 'ARPrice') . "' title='" . esc_html__('Button General Settings', 'ARPrice') . "' style='display:none;'></div>";
	$tablestring .= "<div class='arp_btn' id='footer_level_options__button_3' data-level='footer_level_options' data-title='" . esc_html__('Button Image Settings', 'ARPrice') . "' title='" . esc_html__('Button Image Settings', 'ARPrice') . "' style='display:none;'></div>";
	$tablestring .= "<div class='arp_btn' id='footer_level_options__button_4' data-level='footer_level_options' title='" . esc_html__('Button Link/Script Settings', 'ARPrice') . "' data-title='" . esc_html__('Button Link Settings', 'ARPrice') . "' style='display:none;'></div>";

$tablestring .= "</div>";
$tablestring .= "</div>";
$tablestring .= "<div class='column_level_options'>";

$tablestring .= "<div class='column_option_div ".$footer_btn_cls."' level-id='footer_level_options__button_1'>";
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='column_level_options__button_1'>";
$tablestring .= "</div>";

if ($reference_template == 'arptemplate_9') {
    $columns['arp_change_bgcolor'] = isset($columns['arp_change_bgcolor']) ? $columns['arp_change_bgcolor'] : "0";
    $tablestring .= "<input type='hidden' id='arp_change_bgcolor_". $col_no[1]."' name='arp_change_bgcolor_" . $col_no[1] . "' value='" . $columns['arp_change_bgcolor'] . "' />";
}


$tablestring .= "<div class='column_option_div' level-id='column_level_options__button_2'>";
$tablestring .= "</div>";

$arp_label_btn_style = ($arp_is_rtl) ? "float:right;" : "float:left;";

$tablestring .= "<div class='column_option_div width_362' level-id='header_level_options__button_1'>";
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div width_362' level-id='header_level_options__button_2' style='display:none;'>";
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div width_362' level-id='pricing_level_options__button_1' style='display:none;'>";
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div width_362' level-id='column_description_level__button_1' style='display:none;'>";
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div ".$footer_btn_cls."' level-id='footer_level_options__button_2' style='display:none;width:362px;'></div>";

$tablestring .= "<div class='column_option_div ".$footer_btn_cls."' level-id='footer_level_options__button_3' style='display:none;'>";
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div ".$footer_btn_cls."' level-id='footer_level_options__button_4' style='display:none;'>";
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div width_362' level-id='body_li_level_options__button_1' style='display:none;'>";
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_2' style='display:none;' id='body_li_level_options_button_2' >";
$tablestring .= "</div>";
if (!empty($columns['rows'])) {
 foreach ($columns['rows'] as $n => $row) {
        $row_no = explode('_', $n);
        $splitedid = explode('_', $n);
		$row_inline_script_old = isset($row['row_custom_css']) ? $row['row_custom_css'] : '';
		$row_inline_script_old = trim($row_inline_script_old);
		$row_inline_script_old = str_replace("/\r|\n/", "", $row_inline_script_old);
		$row_inline_script_old = explode(';', $row_inline_script_old);
		$row_inline_script = '';
		if (!empty($row_inline_script_old)) {
		    foreach ($row_inline_script_old as $new_css) {
		        if ($new_css != '') {
		            $new_css = explode(':', $new_css);
		            if (isset($new_css[0]) && isset($new_css[1]))
		                $row_inline_script .= trim($new_css[0]) . ' : ' . trim(str_replace("!important", "", $new_css[1])) . ' !important;';
		        }
		    }
		}
		$tablestring .= "<style id=arp_row_css_column_" . $col_no[1] . "_row_" . $row_no[1] . " class='arp_row_custom_css'>";
		$tablestring .= " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_transition.style_column_" . $col_no[1] . " ul.arp_opt_options li#arp_row_" . $row_no[1] . "{" . $row_inline_script;
		$tablestring .= "}</style>";
 }
}

$tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_3' style='display:none;' id='body_li_level_options_button_3' >";
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_4' style='display:none;' id='body_li_level_options_button_4' >";
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_5' style='display:none;' id='body_li_level_options_button_5' >";
$tablestring .= "</div>";

$tablestring .= "</div>";
$tablestring .= "</div>";
?>