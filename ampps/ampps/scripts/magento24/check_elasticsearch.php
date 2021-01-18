<?php

@unlink('check_elasticsearch.php');

$elasticsearch_ip = '[[elasticsearch_ip]]';
$elasticsearch_port = '[[elasticsearch_port]]';
$elasticsearch_ver_req = '[[elasticsearch_ver_req]]';
$elasticsearch_username = '[[elasticsearch_username]]';
$elasticsearch_password = '[[elasticsearch_password]]';

$verifyes = __magento24_curl_call($elasticsearch_ip.":".$elasticsearch_port, 0, 5, '', '', '', $elasticsearch_username, $elasticsearch_password);
	
if(!empty($verifyes)){
	$value = json_decode($verifyes, true);
	if(!empty($value["version"]["number"]) && version_compare($value["version"]["number"], $elasticsearch_ver_req, '>=')){
		$verifyesstatus = __magento24_curl_call($elasticsearch_ip.":".$elasticsearch_port."/_cluster/health?pretty", 0, 5, '', '', '', $elasticsearch_username, $elasticsearch_password);
		$value = json_decode($verifyesstatus, true);
		if($value["status"] != 'green' && $value["status"] != 'yellow'){
			$error = 'Elasticsearch is not running. Elasticsearch '.$elasticsearch_ver_req.' or higher is required to install Magento 2.4.x';
		}
	}else{
		$error = 'Elasticsearch version found '.$value["version"]["number"].'. Required '.$elasticsearch_ver_req.' or higher to install Magento 2.4.x';
	}
}else{
	$error = 'Elasticsearch is not installed. Elasticsearch '.$elasticsearch_ver_req.' or higher is required to install Magento 2.4.x';
}

if(!empty($error)){
	echo '<es_installed>0</es_installed>
	<es_error>'.$error.'</es_error>';
}else{
	echo '<es_installed>1</es_installed>';
}

function __magento24_curl_call($url, $header = 1, $time = 1, $post = array(), $cookie = '', $nodns = 0, $username = '', $password = ''){
	
	global $globals, $softpanel;
	
	// Some servers respond slow so we allow them to set a custom timeout
	if(!empty($globals['curl_timeout']) && $globals['curl_timeout'] > $time){
		$time = (int) $globals['curl_timeout'];
	}
	
	// Set the curl parameters.
	$ch = curl_init();
	
	$HTTPHEADER = array();
	
	// Do not load the content from cached URL
	// Some hosts have cache enabled and we do not want the content to be loaded from cache
	$HTTPHEADER[] = 'Cache-Control: no-cache';
	
	if(!empty($nodns) && !empty($server_ip)){
		
		$url = str_replace($domain, $server_ip, $url);
		
		curl_setopt($ch, CURLOPT_URL, $url);
		$HTTPHEADER[] = 'Host: '.$domain;
	}else{
		curl_setopt($ch, CURLOPT_URL, $url);
	}
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, $HTTPHEADER);
	
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $time);

	//Set proxy 
	
	// Turn off the server and peer verification (TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	
	$no_follow_location = 0;
	if(function_exists('ini_get')){
		$open_basedir = ini_get('open_basedir'); // Followlocation does not work if open_basedir is enabled
		if(!empty($open_basedir)){
			$no_follow_location = 1;
		}
	}

	if(empty($no_follow_location)){		
		// Follow redirects
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);		
	}
			
	if(!empty($post)){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	}
	
	// Is there a Cookie
	if(!empty($cookie)){
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	}
	
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:2.0.1) Gecko/20100101 Firefox/4.0.1');
	
	if($header){
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_NOBODY, true);
	}

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	//To check ES service with username and password
	if(!empty($username) && !empty($password)){
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	}

	// Get response from the server.
	$resp = curl_exec($ch);

	$curl_errno = curl_error($ch);
	//echo $curl_errno;
	curl_close($ch);
	
	return $resp;
	
}