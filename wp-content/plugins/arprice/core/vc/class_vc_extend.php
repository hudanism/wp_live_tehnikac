<?php

if (!defined('WPINC')) {
    die;
}

class ARPrice_VCExtendArp {

    protected static $instance = null;

    public function __construct() {
        add_action('init', array($this, 'ARPintegrateWithVC'));
        add_action('init', array($this, 'callmyfunction'));
    }


    public static function arp_get_instance() {
        if (self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

   
    public function ARPintegrateWithVC() {
        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('ARPrice', 'ARPrice'),
                'description' => esc_html__('Ultimate Wordpress Pricing Table Plugin', 'ARPrice'),
                'base' => 'ARPrice',
                'category' => esc_html__('Content', 'ARPrice'),
                'class' => '',
                'controls' => 'full',
                'admin_enqueue_css' => array(PRICINGTABLE_URL . '/core/vc/arprice_vc.css'),
                'front_enqueue_css' => PRICINGTABLE_URL . '/core/vc/arprice_vc.css',
                'icon' => 'arprice_vc_icon',
                'params' => array(
                    array(
                        "type" => "ARPrice_Shortode",
                        'heading' => false,
                        'param_name' => 'id',
                        'value' => false,
                        'description' => esc_html__('&nbsp;', 'ARPrice'),
                        'admin_label' => true
                    )
                )
            ));
        }
    }

    public function callmyfunction() {
        if (function_exists('vc_add_shortcode_param')) {
            vc_add_shortcode_param('ARPrice_Shortode', array($this, 'arprice_param_html'), PRICINGTABLE_URL . '/core/vc/arprice_vc.js');
        }
    }

    public function arprice_param_html($settings, $value) {
		$html = '';
        if ($settings) {
            $html .= '<style>';
            $html .= '.arp_param_block .arp_vc_title{float: left; font-size: 17px; margin: 0 0 10px; width: 100%; font-weight: bold;}';
            $html .= '.arp_param_block{width:666px; margin:20px auto;}';
            $html .= '.arp_vd_img_list{margin:5px; padding:5px; float: left; cursor: pointer; border:1px solid #cccccc; opacity:}';
            $html .= '.arp_vd_img_list img{opacity:0.7}';
            $html .= '.arp_vd_img_list img:hover, .arp_vd_img_list img.arp_active{
									opacity:1;
									box-shadow:0 0 0 3px rgba(86,178,11, 1);
									 -webkit-box-shadow:0 0 0 3px rgba(86,178,11, 1);
									 -moz-box-shadow:0 0 0 3px rgba(86,178,11, 1);
									 -o-box-shadow:0 0 0 3px rgba(86,178,11, 1);
									}';
            $html .='</style>';

            $html .= '<input type="hidden" name="' . $settings['param_name'] . '" value="' . $value . '" class="wpb_vc_param_value">';


            global $wpdb;
            $arp_short_code_data = array();
            $templates = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE status = %s and is_template != %d  ORDER BY ID ASC", 'published', 1));

            if (!empty($templates)) {
                foreach ($templates as $key => $template) {
                    $active_class = "";
                    $active_class = ($template->ID == $value) ? ' arp_active ' : '';
                    $html .= '<div class="arp_vd_img_list" title="' . esc_attr($template->table_name) . ' ">';
                    if ($template->is_template == '1') {
                        $html .= '<img width="200" height="90"  alt="' . esc_attr($template->table_name) . '" id="' . $template->ID . '"  class="' . $active_class . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '_field"   src="' . PRICINGTABLE_IMAGES_URL . '/arptemplate_' . $template->ID . '.png">';
                    } else {
                        $html .= '<img width="200" height="90" alt="' . esc_attr($template->table_name) . '" id="' . $template->ID . '"  class="' . $active_class . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '_field"   src="' . PRICINGTABLE_UPLOAD_URL . '/template_images/arptemplate_' . $template->ID . '.png">';
                    }
                    $html .= '</div>';
                }
            }
        }
        if (!empty($templates)) {
            return '<div class="arp_param_block"><div class="arp_vc_title">' . esc_html__('Please Select Your Pricing Table', 'ARPrice') . '</div>' . $html . '</div>';
        } else{
            return '<div class="arp_param_block"><div class="arp_vc_title">' . esc_html__('Pricing Table Not Found', 'ARPrice') . '</div></div>';
        }           
    }

}

?>