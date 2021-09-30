jQuery(document).on('click','.ARPrice_Shortode_field',function(e){
	jQuery(".arp_param_block").find('.ARPrice_Shortode_field').removeClass('arp_active');
	var id = jQuery(this).attr('id');
	jQuery(this).addClass('arp_active');
	if(id)
	{
		jQuery(".arp_param_block").find(".wpb_vc_param_value").val(id);
	}
});
