<?php

// Allows the user to login straight to SitePas
function __sp_sign_on(){

global $__settings, $error, $software, $globals, $notes, $softpanel;

	// Lets fill in the necessary stuff
	$abc['username'] = $softpanel->user['name'];
	$abc['email'] = $__settings['email'];

	// BRANDING OPTIONS
	if(!empty($globals['sm_brand'])){
		$abc['sm_brand'] = $globals['sm_brand'];
	}
	
	if(!empty($globals['sm_brand_url'])){
		$abc['sm_brand_url'] = $globals['sm_brand_url'];
	}
	
	if(!empty($globals['sm_brand_editor'])){
		$abc['sm_brand_editor'] = $globals['sm_brand_editor'];
	}
	
	if(!empty($globals['sm_logo_url'])){
		$abc['sm_brand_logo'] = $globals['sm_logo_url'];
	}
	
	if(!empty($globals['sm_sitename'])){
		$abc['sm_brand_app'] = $globals['sm_sitename'];
	}
	
	if(!empty($globals['sm_brand_demos'])){
		
		// We need the http:// prefix
		$abc['sm_brand_demos'] = substr($globals['sm_brand_demos'], 0, 4) != 'http' ? 'http://'.$globals['sm_brand_demos'] : $globals['sm_brand_demos'];
		
		// Add a trailing slash
		$abc['sm_brand_demos'] = substr($abc['sm_brand_demos'], -1) != '/' ? $abc['sm_brand_demos'].'/' : $abc['sm_brand_demos'];
	}
	
	// Lets update the database with our vars
	softmysqlfile("INSERT INTO `".$__settings['dbprefix']."options` 
				SET option_name = 'sitepad_vars',
				option_value = '".addslashes(serialize($abc))."'
					ON DUPLICATE KEY 
					UPDATE option_value = '".addslashes(serialize($abc))."';",
				$__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
	
	// Also add the login details
	$tmp['sp-login'] = generateRandStr(32);
	$tmp['time'] = time();
	
	$q = "INSERT INTO `".$__settings['dbprefix']."options` 
				SET option_name = 'sp-login',
				option_value = '".addslashes(serialize($tmp))."'
					ON DUPLICATE KEY 
					UPDATE option_value = '".addslashes(serialize($tmp))."';";
	softmysqlfile($q, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
	
	//r_print($error);r_print($q);r_print($__settings);r_print($tmp);die();
	
	// Redirect the user
	redirect($__settings['softurl'].'/?sp-login='.md5($tmp['sp-login']), true, true);
	die();
	
}