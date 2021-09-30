<?php
class arprice_widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => esc_html__( "Display Pricing Table", 'ARPrice') );
		parent::__construct('arp_widget', esc_html__('ARPrice', 'ARPrice'), $widget_ops);
	}
	
	function form( $instance ) {
	
		global $arprice_class;
		$instance = wp_parse_args( (array) $instance, array('title' => false, 'table' => false) );
                $table_drop_down = $arprice_class->table_dropdown_widget( $this->get_field_name('table'), $this->get_field_id('table'), $instance['table']);
?>      
        <?php if(!empty($table_drop_down)){ ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'ARPrice') ?>:</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( stripslashes($instance['title']) ); ?>" /></p>
            <p>
                <label for="<?php echo $this->get_field_id('table'); ?>"><?php esc_html_e('Table', 'ARPrice') ?>:</label>
                <?php  echo $table_drop_down; ?>
            </p>
        <?php } else { ?>
        <p><label><?php esc_html_e('Pricing Table Not Found', 'ARPrice') ?></label></p>
        <?php } ?>
<?php 
	}
	
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
	
	function widget( $args, $instance ) {
       
        extract($args);

        global $wpdb, $arprice_form, $arprice_analytics,$arprice_version;
        $table_data='';
        if(isset($instance['table'])){
            $table_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d", $instance['table']));
        }

        if (!$table_data)
            return;

        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);

        echo $before_widget;
        echo '<div class="arp_widget_table">';
        if ($title)
            echo $before_title . stripslashes($title) . $after_title;

        $newvalues_enqueue = $arprice_form->get_table_enqueue_data(array($instance['table']));

        $formids = array();
        $formids[] = $instance['table'];

        $newvalarr = array();

        if (isset($formids) and is_array($formids) && count($formids) > 0) {
            foreach ($formids as $newkey => $newval) {
                if (stripos($newval, ' ') !== false) {
                    $partsnew = explode(" ", $newval);
                    $newvalarr[] = $partsnew[0];
                } else
                    $newvalarr[] = $newval;
            }
        }

        if (is_array($newvalues_enqueue) && count($newvalues_enqueue) > 0) {
            $to_google_map = 0;
            $templates = array();
            $is_template = 0;
            foreach ($newvalues_enqueue as $newqnqueue) {
                if ($newqnqueue['googlemap'])
                    $to_google_map = 1;



                if ($newqnqueue['template_name'] != 0) {
                    $templates[] = $newqnqueue['template_name'];
                } else {
                    $templates[] = $newvalarr[0];
                }

                if (!empty($newqnqueue['is_template'])) {
                    $is_template = $newqnqueue['is_template'];
                }
            }

            $templates = array_unique($templates);

            if ($to_google_map) {
                if(is_ssl()){
                    wp_register_script('arp_googlemap_js', 'https://maps.google.com/maps/api/js?sensor=false', array(), $arprice_version);
                } else {
                    wp_register_script('arp_googlemap_js', 'http://maps.google.com/maps/api/js?sensor=false', array(), $arprice_version);
                }

                wp_enqueue_script('arp_googlemap_js');

                wp_register_script('arp_gomap_js', PRICINGTABLE_URL . '/js/jquery.gomap-1.3.2.min.js', array(), $arprice_version);

                wp_enqueue_script('arp_gomap_js');
            }

            if ($templates) {
                wp_enqueue_script('arp_animate_numbers');
                wp_enqueue_script('arprice_slider_js');
                wp_enqueue_script('arp_tooltip_front');
                wp_enqueue_script('arprice_js');


                wp_enqueue_style('arprice_front_css');
                wp_enqueue_style('arprice_front_tooltip_css');
                wp_enqueue_style('arp_fontawesome_css');
                wp_enqueue_style('arprice_font_css_front');

                foreach ($templates as $template) {


                    if ($is_template) {
                        wp_register_style('arptemplate_' . $template . '_css', PRICINGTABLE_URL . '/css/templates/arptemplate_' . $template . '.css', array(), $arprice_version);
                        wp_enqueue_style('arptemplate_' . $template . '_css');
                    } else {
                        wp_register_style('arptemplate_' . $template . '_css', PRICINGTABLE_UPLOAD_URL . '/css/arptemplate_' . $template . '.css', array(), $arprice_version);
                        wp_enqueue_style('arptemplate_' . $template . '_css');
                    }
                }
            }
        }

        echo $arprice_analytics->arprice_Shortcode(array('id' => $instance['table']));

        echo '</div>';
        echo $after_widget;
    }

}
?>