<?php

class arprice_analytics {

    function __construct() {

        add_action('wp_ajax_arp_analytics_pagination', array($this, 'arp_analytics_pagination'));

        add_shortcode('ARPrice', array($this, 'arprice_Shortcode'));

        add_action('wp_ajax_arprice_get_template_chart', array($this, 'arprice_get_template_charts'));

        add_action('wp_ajax_arp_insert_plan_id', array($this, 'arp_insert_plan_id'));

        add_action('wp_ajax_nopriv_arp_insert_plan_id', array($this, 'arp_insert_plan_id'));

        add_action('wp_ajax_arp_analytic_table', array($this, 'arp_analytic_table'));
        
        add_action('wp_ajax_arp_get_basic_area_weekly',array($this,'arp_get_basic_area_weekly'));
        
        add_action('wp_ajax_arp_get_basic_area_daily',array($this,'arp_get_basic_area_daily'));

        add_action( 'init', array( $this, 'arp_start_session'), 1 );
        
    }

    function arp_start_session( $force = false ){

        if (version_compare(PHP_VERSION, '7.0.0') >= 0) {
            if( ( function_exists('session_status') && session_status() == PHP_SESSION_NONE && !is_admin() ) || $force == true ) {
                @session_start(
                    array(
                        'read_and_close' => false
                    )
                );
            }
        } else if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
            if ( ( function_exists('session_status') && session_status() == PHP_SESSION_NONE && !is_admin()  ) || $force == true ) {
                @session_start();
            }
        } else {
            if( ( session_id() == '' && !is_admin() )  || $force == true ) {
                @session_start();
            }
        }

    }

    function arprice_Shortcode($atts) {

	global $wpdb, $arprice_analytics;

	extract(
		shortcode_atts
			(
			array(
	    'id' => '1',
			), $atts
		)
	);
        
	$table_id = isset($atts['id']) ? $atts['id'] : "-100";
	if ($table_id == "") {
	    $table_id = 1;
	}
        if( isset($GLOBALS['arp_data']) && isset($GLOBALS['arp_data'][$table_id]) ){
            $result = $GLOBALS['arp_data'][$table_id];
        } else {
            $result = $wpdb->get_row($wpdb->prepare("select * from " . $wpdb->prefix . "arp_arprice where ID=%d", $table_id));
            $GLOBALS['arp_data'][$table_id] = $result;
        }
        $pricetable_name = (isset($result) ) ? $result->table_name : '';
        if ($pricetable_name == "") {
            return "Please Select Valid Pricing Table";
        } else if ($result->status != 'published') {
            return "Please Select Valid Pricing Table";
        } else if ($result->is_template == 1) {
            return "";
        }


    	$country_name = arp_get_country_from_ip($_SERVER['REMOTE_ADDR']);

	$d = date("Y/m/d H:i:s");

	$brow = $_SERVER['HTTP_USER_AGENT'];

	$pageurl = $_SERVER['REQUEST_URI'];

	$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

	$ip = $_SERVER['REMOTE_ADDR'];

	$ses_id = session_id();

	$browser = $arprice_analytics->getBrowser($brow);

    if( isset($GLOBALS['arp_analytic_data']) && isset($GLOBALS['arp_analytic_data'][$table_id]) && isset($GLOBALS['arp_analytic_data'][$table_id][$ses_id]) ){
        $sel = $GLOBALS['arp_analytic_data'][$table_id][$ses_id];
    } else {
        $sel = $wpdb->get_row($wpdb->prepare("SELECT tracking_id, session_id FROM " . $wpdb->prefix . "arp_arprice_analytics WHERE pricing_table_id = %d AND session_id = %s", $table_id, $ses_id));
        $GLOBALS['arp_analytic_data'][$table_id][$ses_id] = $sel;
    }

    $unique_flag = 1;

    if ($sel) {

        $unique_flag = 0;
        
   }

	$res = $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "arp_arprice_analytics (pricing_table_id,browser_name,browser_version,page_url,ip_address,country_name,session_id,added_date,unique_view ) VALUES (%d,%s,%s,%s,%s,%s,%s,%s,%d)", $table_id, $browser['browser_name'], $browser['version'], $pageurl, $ip, $country_name, $ses_id, $d, $unique_flag));


	require_once PRICINGTABLE_DIR . '/core/views/arprice_front.php';

	$contents = arp_get_pricing_table_string($table_id);

	$contents = apply_filters('arp_predisplay_pricingtable', $contents, $table_id);

	return $contents;
    }

    function arp_analytics_pagination() {
	global $wpdb, $arprice_analytics;

	$per_page_rec = 10;
	$no_per_pages = 5;
	$page = 1;

	if ($_REQUEST['pageno'] != "") {
	    $page = intval($_REQUEST['pageno']);
	    if ($page < 1)
		$page = 1;
	} else {
	    $page = 1;
	}

	$start_frm = ($page - 1) * $per_page_rec;

	$table = $wpdb->prefix . 'arp_arprice_analytics';
	$sel = "SELECT * FROM $table ORDER BY added_date DESC";

	$limit = $wpdb->prepare("LIMIT %d, %d", $start_frm, $per_page_rec);

	$total_rows = $wpdb->get_var("SELECT COUNT(*) FROM $table");

	$total_pages = $total_rows / $per_page_rec;

	$total_pages = ceil($total_pages);

	if ($total_pages > 1) {
	    $sel = $sel . " " . $limit;
	}
	if ($total_pages > 1) {
	    $range = array('start' => 1, 'end' => $total_pages);

	    if ($total_pages > $no_per_pages) {
		if ($page < $no_per_pages) {
		    $range['start'] = 1;
		    $range['end'] = $no_per_pages;
		} elseif ($page == $no_per_pages) {
		    $range['start'] = $page;
		    $range['end'] = $page + $no_per_pages - 1;
		} elseif ($page > $no_per_pages) {
		    for ($i = $page; $i <= $total_pages; $i++) {
			if ($page == ((2 * $no_per_pages) - 1)) {
			    $range['start'] = $page;
			    $range['end'] = $page + $no_per_pages - 1;
			} elseif ($page == $total_pages) {
			    $range['start'] = $page - 2;
			    $range['end'] = $page;
			} else {
			    $range['start'] = $page - 1;
			    $range['end'] = $page + ($no_per_pages - 2);
			}
		    }
		}
	    }
	}
	if ($wpdb->get_var($sel) > 0) {
	    $row = $wpdb->get_results($sel);
	    foreach ($row as $i => $data) {
		if (($i + 1) % 2 == 0) {
		    $background = "background:#FFFFFF;";
		} else {
		    $background = "background:#F8F8F8;";
		}
		$date_format = get_option('date_format');
		$time_format = get_option('time_format');
		$pricetable_id = $data->pricing_table_id;

                $result = $wpdb->get_row($wpdb->prepare("select * from " . $wpdb->prefix . "arp_arprice where ID = %d", $pricetable_id));
                $pricetable_name = $result->table_name;
                $browser = $arprice_analytics->getBrowser($data->browser_info);
                ?>	
                <tr style="float:left;width:100%;border:1px solid #DEDEDE;border-bottom:none;<?php echo $background; ?>">
                    <td width="11%"><?php echo $pricetable_name; ?></label></td>
                <td width="14%"><?php echo $data->browser_name . " <br>( Version " . $data->browser_version . " )"; ?></label></td>
                <td width="9%"><?php echo $data->country_name; ?></label></td>
                <td width="9%"><?php echo $data->ip_address; ?></label></td>
                <td width="34%"><?php echo $data->referer; ?></label></td>
                <td width="15%" class="last_td"><label style="float:left;margin-top:5px;"><?php echo date($date_format . ' ' . $time_format, strtotime($data->added_date)); ?></label></td>

		</tr>
		<?php
	    }
	}
	?>
	<input type="hidden" value="<?php echo ($i + 1); ?>" id="analytics_rows"  />
	<input type="hidden" value="<?php echo $total_rows; ?>" id="analytics_total_records" />
	<input type="hidden" id="analytics_starting_value" value="<?php echo $start_frm ?>" />
	<input type="hidden" id="analytics_ending_value" value="<?php echo $per_page_rec; ?>"  />
	<input type="hidden" id="analytics_range_start" value="<?php echo $range['start']; ?>"  />
	<input type="hidden" id="analytics_range_end" value="<?php echo $range['end']; ?>" />
	<?php
	die();
    }

    function getBrowser($user_agent) {
	$u_agent = $user_agent;
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version = "";
	$ub = "";

	if (preg_match('/linux/i', $u_agent)) {
	    $platform = 'linux';
	} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	    $platform = 'mac';
	} elseif (preg_match('/windows|win32/i', $u_agent)) {
	    $platform = 'windows';
	}

	if ($platform != 'Unknown') {

            if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
                $bname = 'Internet Explorer';
                $ub = "MSIE";
            } elseif (preg_match('/Firefox/i', $u_agent)) {
                $bname = 'Mozilla Firefox';
                $ub = "Firefox";
            } elseif (preg_match('/Opera/i', $u_agent)) {
                $bname = 'Opera';
                $ub = "Opera";
            } elseif (preg_match('/OPR/i', $u_agent)) {
                $bname = 'Opera';
                $ub = "OPR";
            } elseif (preg_match('/Netscape/i', $u_agent)) {
                $bname = 'Netscape';
                $ub = "Netscape";
            } elseif (strpos($user_agent, 'Trident') !== FALSE) { 
                $bname = 'Internet Explorer';
                $ub = "Trident";
            } else if (preg_match('/Edge/i', $u_agent)) {
                $bname = 'Microsoft Edge';
		$ub = "Edge";
            } else if(preg_match('/OPR/i', $u_agent)){
                $bname = 'Opera';
		$ub = "Opera";
            } elseif (preg_match('/Chrome/i', $u_agent)) {
		$bname = 'Google Chrome';
		$ub = "Chrome";
	    } elseif (preg_match('/Safari/i', $u_agent)) {
		$bname = 'Apple Safari';
		$ub = "Safari";
	    } 
	}


	$known = array('Version', $ub, 'other');
	$pattern = '#(?<browser>' . join('|', $known) .
		')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)) {
	    
	}


	$i = count($matches['browser']);
	if ($i != 1) {

	    if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
            $version = isset($matches['version'][0]) ? $matches['version'][0] : '';
	    } else {
            $version = isset($matches['version'][1]) ? $matches['version'][1] : '';
	    }
	} else {
	    $version = $matches['version'][0];
	}

	if ($ub == "Trident") {
	    $version = "11";
	}


	if ($version == null || $version == "") {
	    $version = "?";
	}
	return array('browser_name' => $bname, 'version' => $version);
    }
    
    function arp_retrieve_template_views( $template_id ){
        global $wpdb;
        $table = $wpdb->prefix . 'arp_arprice_analytics';

        $counter = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND is_click=%d", $template_id, 0));

        return $counter;
    }

    function arprice_get_template_charts() {
        global $wpdb, $arprice_analytics;
        $template_id = $_POST['template_id'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $table = $wpdb->prefix . 'arp_arprice_analytics';

        $browser_chart = array();
        $country_chart = array();
        
        $data = array();
        $get_country_list = $wpdb->get_results($wpdb->prepare("SELECT country_name FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND is_click=%d", $template_id, 1, 0));

        foreach ($get_country_list as $key => $country) {
            $country_name = $country->country_name;
            $country_counter = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND country_name = %s AND is_click=%d", $template_id, 1, $country_name, 0));

            $data['country'][$country_name] = $country_counter;
        }
        
        $get_browser_list = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT browser_name FROM ".$table." WHERE pricing_table_id = %d AND unique_view = %d", $template_id, 1));
        foreach( $get_browser_list as $key => $browser ){
            $browser_name = $browser->browser_name;
            $browser_counter = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM ".$table." WHERE pricing_table_id = %d AND unique_view = %d AND browser_name = %s", $template_id, 1, $browser_name));
            $data['browser'][$browser_name] = $browser_counter;
        }
        
        $browser_chart['chart'] = array(
            'type' => "area",
        );
        $browser_chart['colors'] = array(
            //'#49c5f8','#c9ffdf'
            '#f4316d','#395dfb'
        );
        
        $browser_chart['title'] = array(
            'text' => ''
        );

        $browser_chart['credits'] = array(
            'enabled' => false
        );
        
        $dt = new DateTime($start_date, new DateTimeZone('UTC'));
        $browser_chart['xAxis'] = array(
            'title' => array(
                'text' => 'Time Period'
            ),
            'pointStart'=> $dt->getTimestamp()*1000,
            'type'=>'datetime',
            'minTickInterval'=> 24 * 3600 * 1000 * 7,
            'labels'=>array(
            'rotation'=> -70,
                ),
            'tickPixelInterval'=>10
        );

        $browser_chart['yAxis'] = array(
            'title' => array(
                'text' => 'Clicks And Visits',
                'style'=> array( 
                ),
            ),            
        );
        $dt = new DateTime($start_date, new DateTimeZone('UTC'));
        $browser_chart['plotOptions']=array(
            'area'=>array(
                'pointStart'=> $dt->getTimestamp()*1000,
                'pointInterval'=> 24 * 3600 * 1000,                 
                
                'marker'=>  array(
                    'enabled'=>false,
                    'symbol'=>'circle',
                    'radius'=>2,
                    'states'=>array(
                        'hover'=>array(
                            'enabled'=>true,
                        )
                    )
                    
                ),
            ),
        );
        
        $browser_chart['no_of_views'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($start_date)), date('Y-m-d 23:59:59',strtotime($end_date)), 0));
        $browser_chart['no_of_clicks'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s and is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($start_date)), date('Y-m-d 23:59:59',strtotime($end_date)), 1));
        if($browser_chart['no_of_clicks']!=0)
        {
            $browser_chart['conversion'] =($browser_chart['no_of_clicks']*100) / $browser_chart['no_of_views'];
            $browser_chart['conversion'] = number_format((float)$browser_chart['conversion'],2);
        }
        else
        {
            $browser_chart['conversion']=0;
        }
        
        $start =  new DateTime($start_date);
        $end = new DateTime($end_date);
        $interval = new DateInterval('P1D');
        $start->setTime(0, 0);
        $end->setTime(0, 0)->add($interval);
        $periods = new DatePeriod($start, $interval, $end);

        $view_data = array();
        $click_data = array();
        if (!empty($periods)) {
            foreach ($periods as $key => $interval_date) {   
                
                $final_views['views'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($interval_date->format('Y-m-d'))), date('Y-m-d 23:59:59',strtotime($interval_date->format('Y-m-d'))), 0));
                $final_views['clicks'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d  AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($interval_date->format('Y-m-d'))), date('Y-m-d 23:59:59',strtotime($interval_date->format('Y-m-d'))), 1));
                
                array_push($view_data,(int)$final_views['views']);                
                array_push($click_data,(int)$final_views['clicks']);
            }
        }
        
        $series = array(
            array(
                'name' => "Visits",
                'data' => $view_data,
            ),
            array(
                'name' => "Clicks",
                'data' => $click_data,
            ),
        );
        

        $browser_chart['series'] = $series;
        
        $browser_chart['legend'] =array(
            'symbolHeight'=> 10,
            'symbolWidth'=> 10,
            'symbolRadius'=> 5,
        );

        $country_chart['chart'] = array(
            'type' => 'pie',
        );
		
        $country_chart['title'] = array(
            'text' => ''
        );
        
        $country_chart['credits'] = array(
            'enabled' => false
        );
        
        $country_chart['tooltip'] = array(
            'tooltip' => array(
                'pointFormat' => '<b>{point.name}:{point.y}</b>'
            )
        );

        $country_chart['legend'] =array(
            'align'=> 'right',
            'verticalAlign'=> 'top',
            'layout'=> 'vertical',
            'x'=> 0,
            'y'=> 100,
            'symbolHeight'=> 10,
            'symbolWidth'=> 10,
            'symbolRadius'=> 5
        );
                
        $country_chart['plotOptions'] = array(
            'pie' => array(
                'depth' => 100,
		'innerSize' => 70,
                'showInLegend'=>true,
            ),
            
        );

        $country_chart_color['colors'] = array('#6ec1e9','#01d7cb','#56d456','#bad709','#f9d900','#ffa801','#ef6565','#f471cf','#9b4e96','#395dfb');
        $color_counter = count($country_chart_color['colors']);
        $data_chart_c = array();
        $data_color = array();
        $series_data_country = array();
        arsort($data['country']);
        $other_entry=0;
        if (!empty($data['country'])) {
            $i=0; 
            $y=0; 
            
            foreach ($data['country'] as $country => $counter)
            {
                if($y<=8 && $country!='')
                {                    
                    $data_chart_c['name'] = $country;
                    $data_chart_c['y'] = (int) $counter;
                    $data_chart_c['color'] = $country_chart_color['colors'][$i];
                    $i++;
                    $y++;
                    array_push($series_data_country, $data_chart_c);
                }
                else
                {
                    $other_entry=1;
                    $other_country=0;
                    $other_country=$other_country+$counter;
                }
            }
            if($other_entry==1)
            {
                $data_chart_c['name'] = 'Others';
                $data_chart_c['y']=$other_country;
                $data_chart_c['color'] = $country_chart_color['colors'][$color_counter-1];
                array_push($series_data_country, $data_chart_c);                
            }
        }
        
        $country_series = array(
            array(
                'name' => 'Countries',
                'data' => $series_data_country
            )
        );
        
        $country_chart['series'] = $country_series;
        
        $final_data['browser'] = $browser_chart;
        $final_data['country'] = $country_chart;
        $final_data['arp_table'] = $arprice_analytics->arp_analytic_table($template_id, $start_date, $end_date);
        echo json_encode($final_data);
        die();
    }
    
    function arp_analytic_table($template_id, $start_date, $end_date) {
        global $wpdb;
        $arp_table = array();       
            
        $table = $wpdb->prefix . 'arp_arprice_analytics';
        $sel = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table WHERE pricing_table_id = %d  AND unique_view = %d AND added_date BETWEEN %s AND %s", $template_id, 1, date('Y-m-d 00:00:00',strtotime($start_date)), date('Y-m-d 23:59:59',strtotime($end_date))));
        
        $arp_table_row_data = array();
        $arp_row_data= array();
        $i=0;
        $date_format = get_option('date_format');
        $time_format = get_option('time_format');
        if (!empty($sel)) {
            foreach($sel as $key => $value){
                $i = $i + 1;
                $arp_row_data['sr_no']=$i;
                $arp_row_data['date'] =date($date_format.' '.$time_format, strtotime($value->added_date));
                $arp_row_data['browser'] =$value->browser_name.' ('.$value->browser_version.')';
                $arp_row_data['ip_address'] =$value->ip_address;
                $arp_row_data['country'] =$value->country_name;
               
                if($value->is_click == 0)
                {                    
                    $arp_row_data['click']='No';
                    array_push($arp_table_row_data,$arp_row_data);
                }
                else
                {  
                    if ($value->is_click == 1) {
                        $plan_id = explode("_",$value->plan_id);
                        $arp_row_data['click']='Yes (Plan '.$plan_id[2].')';         
                        array_push($arp_table_row_data,$arp_row_data);
                    }   
                }
            }
        }
                    
        return $arp_table_row_data;             
    }
        
    function arp_insert_plan_id() {
        
        global $wpdb, $arprice_analytics;
                
        $arp_plan_id = isset($_POST['arp_plan_id']) ? $_POST['arp_plan_id'] : '';
        
        $arp_template_id = isset($_POST['arp_template_id']) ? $_POST['arp_template_id'] : '';
        
        $caption_column = $_POST['caption_column'];
        
        if($caption_column==0)
        {
            $plan_id = explode("_",$arp_plan_id);
            $plan_id[2]=$plan_id[2]+1;
            $arp_plan_id='plan_id_'.$plan_id[2];
        }
        if($caption_column==1)
        {
            $plan_id = explode("_",$arp_plan_id);
            $arp_plan_id='plan_id_'.$plan_id[2];
        }
      
    
    	$country_name = arp_get_country_from_ip($_SERVER['REMOTE_ADDR']);

        $d = date("Y/m/d H:i:s");

        $brow = $_SERVER['HTTP_USER_AGENT'];

	    $pageurl = $_SERVER['REQUEST_URI'];

        $ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        $ip = $_SERVER['REMOTE_ADDR'];

        $ses_id = session_id();

        if( $ses_id == '' ){
            $this->arp_start_session(true);
            $ses_id = session_id();
        }

        $browser = $arprice_analytics->getBrowser($brow);

        $sel = $wpdb->get_row($wpdb->prepare("SELECT plan_id,is_click,tracking_id FROM " . $wpdb->prefix . "arp_arprice_analytics WHERE pricing_table_id = %d AND ip_address = %s AND is_click=%d AND plan_id=%s AND session_id = %s", $arp_template_id, $ip, 1, $arp_plan_id, $ses_id));
        
        if ($sel) {
            $is_click = 1;
            $res = $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "arp_arprice_analytics (pricing_table_id,browser_name,browser_version,page_url,ip_address,country_name,session_id,added_date,is_click,plan_id,unique_view ) VALUES (%d,%s,%s,%s,%s,%s,%s,%s,%d,%s,%d)", $arp_template_id, $browser['browser_name'], $browser['version'], $pageurl, $ip, $country_name, $ses_id, $d, $is_click, $arp_plan_id,0));
        } else {
            $is_click = 1;
            $res = $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "arp_arprice_analytics (pricing_table_id,browser_name,browser_version,page_url,ip_address,country_name,session_id,added_date,is_click,plan_id ) VALUES (%d,%s,%s,%s,%s,%s,%s,%s,%d,%s)", $arp_template_id, $browser['browser_name'], $browser['version'], $pageurl, $ip, $country_name, $ses_id, $d, $is_click, $arp_plan_id));
        }

        die();
    }
    
    function arp_analytics_pagination_popup() {
        global $wpdb, $arprice_analytics;

        $per_page_rec = 10;
        $no_per_pages = 5;
        $page = 1;

        if ($_REQUEST['pageno'] != "") {
            $page = intval($_REQUEST['pageno']);
            if ($page < 1)
                $page = 1;
        }
        else {
            $page = 1;
        }

        if ($_REQUEST['template_id'] != "") {
            $template_id = intval($_REQUEST['template_id']);
        }

        $start_frm = ($page - 1) * $per_page_rec;

        $table = $wpdb->prefix . 'arp_arprice_analytics';
        $sel = "SELECT * FROM $table WHERE pricing_table_id = %d ORDER BY added_date DESC";

        $limit = $wpdb->prepare("LIMIT %d, %d", $start_frm, $per_page_rec);

        $total_rows = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table WHERE pricing_table_id = %d", $template_id));

        $total_pages = $total_rows / $per_page_rec;

        $total_pages = ceil($total_pages);

        if ($total_pages > 1) {
            $sel = $sel . " " . $limit;
        }
        if ($total_pages > 1) {
            $range = array('start' => 1, 'end' => $total_pages);

            if ($total_pages > $no_per_pages) {
                if ($page < $no_per_pages) {
                    $range['start'] = 1;
                    $range['end'] = $no_per_pages;
                } elseif ($page == $no_per_pages) {
                    $range['start'] = $page;
                    $range['end'] = $page + $no_per_pages - 1;
                } elseif ($page > $no_per_pages) {
                    for ($i = $page; $i <= $total_pages; $i++) {
                        if ($page == ((2 * $no_per_pages) - 1)) {
                            $range['start'] = $page;
                            $range['end'] = $page + $no_per_pages - 1;
                        } elseif ($page == $total_pages) {
                            $range['start'] = $page - 2;
                            $range['end'] = $page;
                        } else {
                            $range['start'] = $page - 1;
                            $range['end'] = $page + ($no_per_pages - 2);
                        }
                    }
                }
            }
        }
        if ($wpdb->get_var($wpdb->prepare($sel, $template_id)) > 0) {
            $row = $wpdb->get_results($wpdb->prepare($sel, $template_id));
            foreach ($row as $i => $data) {
                if (($i + 1) % 2 == 0) {
                    $background = "background:#FFFFFF;";
                } else {
                    $background = "background:#F8F8F8;";
                }
                $date_format = get_option('date_format');
                $time_format = get_option('time_format');
                $pricetable_id = $data->pricing_table_id;

                $result = $wpdb->get_row($wpdb->prepare("select * from " . $wpdb->prefix . "arp_arprice where ID = %d", $pricetable_id));
                $pricetable_name = $result->table_name;
                $browser = $arprice_analytics->getBrowser($data->browser_info);
                ?>	
                <tr style="float:left;width:100%;border:1px solid #DEDEDE;border-bottom:none;<?php echo $background; ?>">
                    <td width="11%"><?php echo $pricetable_name; ?></label></td>
                <td width="14%"><?php echo $data->browser_name . " <br>( Version " . $data->browser_version . " )"; ?></label></td>
                <td width="9%"><?php echo $data->country_name; ?></label></td>
                <td width="9%"><?php echo $data->ip_address; ?></label></td>
                <td width="34%"><?php echo $data->page_url; ?></label></td>
                <td width="15%" class="last_td"><label style="float:left;margin-top:5px;"><?php echo date($date_format . ' ' . $time_format, strtotime($data->added_date)); ?></label></td>

                </tr>
                <?php
            }
        }
        ?>
        <input type="hidden" value="<?php echo ($i + 1); ?>" id="analytics_rows"  />
        <input type="hidden" value="<?php echo $total_rows; ?>" id="analytics_total_records" />
        <input type="hidden" id="analytics_starting_value" value="<?php echo $start_frm ?>" />
        <input type="hidden" id="analytics_ending_value" value="<?php echo $per_page_rec; ?>"  />
        <input type="hidden" id="analytics_range_start" value="<?php echo $range['start']; ?>"  />
        <input type="hidden" id="analytics_range_end" value="<?php echo $range['end']; ?>" />
        <?php
        die();
    }
    
    function arp_get_basic_area_weekly() {
        global $wpdb, $arprice_analytics;
        $template_id = $_POST['template_id'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $table = $wpdb->prefix . 'arp_arprice_analytics';
        
        $browser_chart['no_of_views'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($start_date)), date('Y-m-d 23:59:59',strtotime($end_date)), 0));

        $browser_chart['no_of_clicks'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($start_date)), date('Y-m-d 23:59:59',strtotime($end_date)), 1));
        
        if($browser_chart['no_of_clicks']!=0)
        {
            $browser_chart['conversion'] =($browser_chart['no_of_clicks']*100) / $browser_chart['no_of_views'];
            $browser_chart['conversion'] = number_format((float)$browser_chart['conversion'],2);
        }
        else
        {
            $browser_chart['conversion']=0;
        }
        
        $browser_chart['colors'] = array(
            '#49c5f8','#c9ffdf'
        );
        
        $browser_chart['chart'] = array(
            'type' => "area",
        );

        $browser_chart['title'] = array(
            'text' => ''
        );

        $browser_chart['xAxis'] = array(
            'title' => array(
                'text' => 'Time Period'
            ),
            'type'=>'datetime',
            'tickInterval' => 7 * 24 * 3600 * 1000,
            'labels'=>array(
            'rotation'=> -70,
                ),
        );

        $browser_chart['yAxis'] = array(
            'title' => array(
                'text' => 'Clicks And Visits'
            ),            
        );
        
        $browser_chart['legend'] =array(
            'symbolHeight'=> 10,
            'symbolWidth'=> 10,
            'symbolRadius'=> 5,
        );
        
        $dt = new DateTime($start_date, new DateTimeZone('UTC'));
        $browser_chart['plotOptions']=array(
            'area'=>array(
                'pointStart'=> $dt->getTimestamp()*1000,
                'pointInterval'=>  24 * 3600 * 1000 ,                 
                
                'marker'=>  array(
                    'enabled'=>false,
                    'symbol'=>'circle',
                    'radius'=>2,
                    'states'=>array(
                        'hover'=>array(
                            'enabled'=>true,
                        )
                    )
                    
                ),
            ),
        );

        $start =  new DateTime($start_date);
        $end = new DateTime($end_date);
        $interval = new DateInterval('P1D');
        $start->setTime(0, 0);
        $end->setTime(0, 0)->add($interval);
        $periods = new DatePeriod($start, $interval, $end);

        $view_data = array();
        $click_data = array();
        if (!empty($periods)) {
            foreach ($periods as $key => $interval_date) {
                    $final_views['views'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($interval_date->format('Y-m-d'))), date('Y-m-d 23:59:59',strtotime($interval_date->format('Y-m-d'))), 0));
                    $final_views['clicks'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($interval_date->format('Y-m-d'))), date('Y-m-d 23:59:59',strtotime($interval_date->format('Y-m-d'))), 1));

                    $count_click = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($interval_date->format('Y-m-d'))), date('Y-m-d 23:59:59',strtotime($interval_date->format('Y-m-d'))), 1)); 
                    
                array_push($view_data,(int)$final_views['views']);                
                array_push($click_data,(int)$final_views['clicks']);
            }
        }

        $series = array(
            array(
                'name' => "Visits",
                'data' => $view_data,
            ),
            array(
                'name' => "Clicks",
                'data' => $click_data,
            ),
        );
        

        $browser_chart['series'] = $series;
        

        $final_data['browser'] = $browser_chart;

        echo json_encode($final_data);

        die();
    }
    
    function arp_get_basic_area_daily() {
        global $wpdb, $arprice_analytics;
        $template_id = $_POST['template_id'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $table = $wpdb->prefix . 'arp_arprice_analytics';
        
        $browser_chart['no_of_views'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($start_date)), date('Y-m-d 23:59:59',strtotime($end_date)), 0));
        $browser_chart['no_of_clicks'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s and is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($start_date)), date('Y-m-d 23:59:59',strtotime($end_date)), 1));
        if($browser_chart['no_of_clicks']!=0)
        {
            $browser_chart['conversion'] =($browser_chart['no_of_clicks']*100) / $browser_chart['no_of_views'];
            $browser_chart['conversion'] = number_format((float)$browser_chart['conversion'],2);
        }
        else
        {
            $browser_chart['conversion']=0;
        }
        
        $browser_chart['chart'] = array(
            'type' => "area",
        );
        
        $browser_chart['colors'] = array(
            '#49c5f8','#c9ffdf'
        );

        $browser_chart['title'] = array(
            'text' => ''
        );

        $browser_chart['xAxis'] = array(
            'title' => array(
                'text' => 'Time Period'
            ),
            'type'=>'datetime',
            'tickInterval' => 24 * 3600 * 1000,
            'labels'=>array(
            'rotation'=> -70,
                ),
        );

        $browser_chart['yAxis'] = array(
            'title' => array(
                'text' => 'Clicks And Visits'
            ),            
        );
        $dt = new DateTime($start_date, new DateTimeZone('UTC'));
        $browser_chart['plotOptions']=array(
            'area'=>array(
                'pointStart'=> $dt->getTimestamp()*1000,
                'pointInterval'=> 24 * 3600 * 1000 ,                 
                
                'marker'=>  array(
                    'enabled'=>false,
                    'symbol'=>'circle',
                    'radius'=>2,
                    'states'=>array(
                        'hover'=>array(
                            'enabled'=>true,
                        )
                    )
                    
                ),
            ),
        );

        $start =  new DateTime($start_date);
        $end = new DateTime($end_date);
        $interval = new DateInterval('P1D');
        $start->setTime(0, 0);
        $end->setTime(0, 0)->add($interval);
        $periods = new DatePeriod($start, $interval, $end);

        $view_data = array();
        $click_data = array();
        if (!empty($periods)) {
            foreach ($periods as $key => $interval_date) {
                    $final_views['views'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($interval_date->format('Y-m-d'))), date('Y-m-d 23:59:59',strtotime($interval_date->format('Y-m-d'))), 0));
                    $final_views['clicks'] = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM " . $table . " WHERE pricing_table_id = %d AND unique_view = %d AND added_date BETWEEN %s AND %s AND is_click=%d", $template_id, 1, date('Y-m-d 00:00:00',strtotime($interval_date->format('Y-m-d'))), date('Y-m-d 23:59:59',strtotime($interval_date->format('Y-m-d'))), 1));
              
                array_push($view_data,(int)$final_views['views']);                
                array_push($click_data,(int)$final_views['clicks']);
            }
        }           

        $series = array(
            array(
                'name' => "Visits",
                'data' => $view_data,
            ),
            array(
                'name' => "Clicks",
                'data' => $click_data,
            ),
        );        
        $browser_chart['legend'] =array(
            'symbolHeight'=> 10,
            'symbolWidth'=> 10,
            'symbolRadius'=> 5,
        );
        
        $browser_chart['series'] = $series;        

        $final_data['browser'] = $browser_chart;

        echo json_encode($final_data);

        die();
    }

    function arp_get_unique_view_counter( $table_id ){
        global $wpdb;
        
        if( '' == $table_id ){
            return 0;
        }

        $total_views = $wpdb->get_var( $wpdb->prepare("SELECT COUNT(*) FROM `" . $wpdb->prefix . "arp_arprice_analytics` WHERE pricing_table_id = %d AND unique_view = %d", $table_id, 1) );

        return $total_views;

    }

}
?>