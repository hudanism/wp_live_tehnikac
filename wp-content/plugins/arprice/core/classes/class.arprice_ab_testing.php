<?php


class ARPrice_AB_testing{

	function __construct(){

		add_action('wp_ajax_arp_save_ab_testing', array($this,'arp_save_ab_testing_callback'));

		add_shortcode( 'ARPrice_ab', array( $this, 'arp_split_test_callback' ) );

        add_action('wp_ajax_arp_reset_ab_analytics', array($this,'arp_reset_ab_analytics_callback'));

	}

	function arp_save_ab_testing_callback(){
        global $wpdb;
        $return = array(
            'error' => false,
            'message' => esc_html__('Settings Saved Successfully','ARPrice')
        );
        $primary_table = isset($_REQUEST['arprice_ab_testing_primary_table']) ? $_REQUEST['arprice_ab_testing_primary_table'] : '';

        if( '' == $primary_table ){
            $return['error'] = true;
            $return['message'] = esc_html__('Primary table should not be empty','ARPrice');
        } else {

            $variation_tables = isset( $_REQUEST['arprice_ab_testing_variation_table'] ) ? $_REQUEST['arprice_ab_testing_variation_table'] : array();

            if( empty( $variation_tables ) ){
                $return['error'] = true;
                $return['message'] = esc_html__('Please select at least one variation table','ARPrice' );
            } else {
                $table_impression = isset( $_REQUEST['arprice_ab_testing_impression'] ) ? $_REQUEST['arprice_ab_testing_impression'] : array();

                if( empty( $table_impression ) ){
                    $return['error'] = true;
                    $return['message'] = esc_html__('Please set impression value','ARPrice' );
                } else {

                    $data_to_insert = array();
                    $data_to_insert['primary_table'] = $primary_table;
                    $x = 0;
                    $impression_total = 0;
                    $repeat_table = array();
                    foreach( $variation_tables as $key => $var_table ){
                        if( is_array( $repeat_table) && in_array($var_table, $repeat_table) ){
                            $return['error'] = true;
                            $return['message'] = esc_html__('Variation table should not be repeat','ARPrice');
                            break;
                        }
                        $data_to_insert['variation_table'][$x]['id'] = $var_table;
                        $data_to_insert['variation_table'][$x]['impression'] = $table_impression[$key];
                        $impression_total += $table_impression[$key];
                        array_push( $repeat_table, $var_table );
                        $x++;
                    }
                    
                    if( $impression_total >= 100 ){
                        $return['error'] = true;
                        $return['message'] = esc_html__('Impression total should be less than 100%','ARPrice' );
                    } else {
                        $data_to_insert['primary_table_impression'] = 100 - $impression_total;
                        $opts = json_encode( $data_to_insert );

                        $total_rec = $wpdb->get_var( "SELECT COUNT(*) AS TOTAL FROM `".$wpdb->prefix."arp_ab_testing`");

                        delete_option( 'arp_get_ab_testing_results' );

                        if( $total_rec > 0 ){
                            $get_table_id = $wpdb->get_row( "SELECT id FROM `".$wpdb->prefix."arp_ab_testing` ORDER BY id ASC LIMIT 1" );
                            $wpdb->update(
                                $wpdb->prefix.'arp_ab_testing',
                                array(
                                    'options' => $opts,
                                    'last_updated_date' => date('Y-m-d H:i:s')
                                ),
                                array(
                                    'id' => $get_table_id->id
                                )
                            );
                        } else {
                            $wpdb->insert(
                                $wpdb->prefix.'arp_ab_testing',
                                array(
                                    'options' => $opts,
                                    'created_date' => date('Y-m-d H:i:s'),
                                    'last_updated_date' => date('Y-m-d H:i:s'),
                                )
                            );
                        }
                    }
                }
            }

        }

        echo json_encode( $return );
        die;
    }

    function arp_reset_ab_analytics_callback(){
        global $wpdb;
        $get_table_id = $wpdb->get_row( "SELECT id FROM `".$wpdb->prefix."arp_ab_testing` ORDER BY id ASC LIMIT 1" );
        $wpdb->update(
            $wpdb->prefix.'arp_ab_testing',
            array(
                'last_updated_date' => date('Y-m-d H:i:s')
            ),
            array(
                'id' => $get_table_id->id
            )
        );
        die;
    }

	function arp_split_test_callback( $atts, $content ){
		global $wpdb;

		$content = '';

        $is_enable_testing = get_option('arp_enable_ab_testing');

        if( 0 == $is_enable_testing || '' == $is_enable_testing ){
            return '';
        }

		$testing_data = $wpdb->get_row( "SELECT options,last_updated_date FROM `" . $wpdb->prefix . "arp_ab_testing` ORDER BY id ASC LIMIT 1" );

		$options = json_decode( $testing_data->options, true );
		$min_date = $testing_data->last_updated_date;

		$table_shortcodes = array();

		$i = 0;
		
		$table_shortcodes[$options['primary_table']] = $options['primary_table_impression'];

		$i = 1;
		foreach( $options['variation_table'] as $vkey => $vtable ){
			$table_shortcodes[$vtable['id']] = (int)$vtable['impression'];
			$i++;
		}

		$next_table_id = $this->arp_get_random_element( $table_shortcodes );

        $arp_testing_result = json_decode( get_option('arp_get_ab_testing_results'), true );        

		$shortcode = '[ARPrice id=' . $next_table_id . ']';
		$content .= do_shortcode( $shortcode );

		return $content;
	}

	function arp_get_random_element( $weightedValues ){
		$rand = mt_rand(1, (int) array_sum($weightedValues));
		foreach ($weightedValues as $key => $value) {
			$rand -= $value;
			if ($rand <= 0) {
	        	return $key;
	      	}
	    }
	}

    function arp_get_table_analytics_data(){
        global $wpdb,$arprice_analytics;
        $table_data = $wpdb->get_row( "SELECT options,last_updated_date FROM `" . $wpdb->prefix . "arp_ab_testing` ORDER BY id ASC LIMIT 1" );

        $start_date = isset( $table_data->last_updated_date ) ? $table_data->last_updated_date : '';
        $table_opts = isset( $table_data->options ) ? json_decode( $table_data->options, true ) : array();

        $table_ids = array();

        $primary_table_id = isset($table_opts['primary_table']) ? $table_opts['primary_table'] : '';
        $primary_table_per = isset($table_opts['primary_table_impression']) ? $table_opts['primary_table_impression'] : '';

        $table_ids = "'" . $primary_table_id ."',";
        if( isset( $table_opts['variation_table']) && is_array( $table_opts['variation_table']) ){
            foreach( $table_opts['variation_table'] as $vk => $vtable ){
                $table_ids .= "'" . $vtable['id'] ."',";
            }
        }

        $table_ids = rtrim($table_ids,',');

        $table = $wpdb->prefix.'arp_arprice_analytics';

        $analytic_data = $wpdb->get_results( $wpdb->prepare( "SELECT pricing_table_id,added_date,COUNT(*) as total FROM " . $table . " WHERE pricing_table_id IN($table_ids) AND added_date >= %s GROUP BY pricing_table_id ", $start_date ) );

        $total_data = $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM `" . $table ."` WHERE pricing_table_id IN ($table_ids) AND added_date >= %s", $start_date ) );

        $x = 0;
        $table_array = array();
        foreach( $analytic_data as $k => $v ){
            
            $no_of_view = $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM `" . $table . "` WHERE pricing_table_id = %d AND added_date >= %s AND is_click = %d", $v->pricing_table_id, $start_date, 0 ));
            $no_of_click = $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM `" . $table . "` WHERE pricing_table_id = %d AND added_date >= %s AND is_click = %d", $v->pricing_table_id, $start_date, 1 ));
            $table_name = $wpdb->get_var( $wpdb->prepare( "SELECT table_name FROM `" . $wpdb->prefix . "arp_arprice` WHERE ID = %d", $v->pricing_table_id));

            if( $no_of_view < 1 ){
                $view_per = '0';
            } else {
                $view_per = ( $no_of_view * 100 ) / $total_data;                
            }

            $view_per = (float)number_format($view_per,2);

            if( $no_of_click < 1 ){
                $click_per = '0';
            } else {
                $click_per = ( $no_of_click * 100 ) / $total_data;
            }
            $click_per = (float)number_format($click_per,2);

            $table_array[$x]['name'] = $table_name . "(ID:".$v->pricing_table_id.")";
            $table_array[$x]['view'] = $view_per;
            $table_array[$x]['click'] = $click_per;

            $x++;
        }
        return $table_array;
    }

}