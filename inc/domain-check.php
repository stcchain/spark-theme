<?php

function spark_wdc_display_func(){
	check_ajax_referer( 'wdc_nonce', 'security' );

	if(isset($_POST['domain']))
	{
		$domain = str_replace(array('www.', 'http://'), NULL, $_POST['domain']);
		$split = explode('.', $domain);
		$domainName = $domain;

			if(count($split) == 1) {
				$domain = $domain.".com";
			}
			
		$domain = preg_replace("/[^-a-zA-Z0-9.]+/", "", $domain);
		if(strlen($domain) > 0)
		{
			if( file_exists(  ABSPATH . 'wp-content/plugins/spark-theme-support/thirdparty/DomainAvailability.php' ) ) {
				include  ABSPATH . 'wp-content/plugins/spark-theme-support/thirdparty/DomainAvailability.php';
			}

			$Domains = new DomainAvailability();
			$available = $Domains->is_available($domain);
			$custom_found_result_text = esc_html__('Congratulations! ', 'spark-theme') . " <i> ". esc_url($domain) ." </i> " . esc_html__(' is available!', 'spark-theme');
	    	$custom_not_found_result_text = esc_html__('Sorry! ', 'spark-theme') . '<span> '. esc_url($domain) . esc_html__(' is already taken!', 'spark-theme') . ' </span> ' . esc_html__('Try search another.', 'spark-theme');
			
			if ($available == '1') {
					$result = array('status'=>1,'domain'=> esc_url($domain), 'text'=> '<p class="available">'.$custom_found_result_text.'</p>', 'domain_name' => $domainName);
			    	echo json_encode($result);
			} elseif ($available == '0') {
					$result = array('status'=>0,'domain'=> esc_url($domain), 'text'=> '<p class="not-available">'.$custom_not_found_result_text.'</p>');
			    	echo json_encode($result);
			}elseif ($available == '2'){
					$result = array('status'=>0,'domain'=> esc_url($domain), 'text'=> '<p class="not-available">'. __('WHOIS server not found for that TLD', 'spark-theme') .'</p>');
			    	echo json_encode($result);
			}
			
		}
		else
		{
			echo esc_html__('Please enter the domain name', 'spark-theme');
		}
	}
	die();
}

add_action('wp_ajax_wdc_display','spark_wdc_display_func');
add_action('wp_ajax_nopriv_wdc_display','spark_wdc_display_func');

