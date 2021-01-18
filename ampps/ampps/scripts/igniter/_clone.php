<?php

//////////////////////////////////////////////////////////////
//===========================================================
// clone.php
//===========================================================
// SOFTACULOUS 
// Version : 4.2.8
// Inspired by the DESIRE to be the BEST OF ALL
// ----------------------------------------------------------
// Started by: Alons
// Date:       10th Jan 2009
// Time:       21:00 hrs
// Site:       http://www.softaculous.com/ (SOFTACULOUS)
// ----------------------------------------------------------
// Please Read the Terms of use at http://www.softaculous.com
// ----------------------------------------------------------
//===========================================================
// (c)Softaculous Inc.
//===========================================================
//////////////////////////////////////////////////////////////

if(!defined('SOFTACULOUS')){

	die('Hacking Attempt');

}

//The Install process
function __clone(){

global $__settings, $error, $software, $globals, $replace_data, $source_data;
	
	//Do we meet the Minimum software requirements
	__requirements();
	
	if(!empty($error)){
		return false;
	}
	
	$file = sfile($__settings['softpath'].'/application/config/config.php');
	
	if(empty($file)){
		$error[] = 'Could not read the config file.';
		return false;
	}
	
	soft_preg_replace('/\$config\[("|\')encryption_key("|\')\](\s*?)=(\s*?)("|\')(.*?)("|\');/is', $file, $encryption_key, 6);
	$__settings['enc_key'] = srandstr(8);
	$replace_data[$encryption_key] = $__settings['enc_key'];

	sclone_replace($replace_data, $__settings['softpath'].'/application/config/config.php', true);
	sclone_replace($replace_data, $__settings['softpath'].'/application/config/database.php', true);
	
	if(sfile_exists($__settings['softpath'].'/.htaccess')){
	
		// If the installation is on root domain we need to change the below relative URL
		if(is_dom_root($source_data['softpath'])){
			$replace_data['RewriteBase /'] = 'RewriteBase '.$__settings['relativeurl'].'/';
		}elseif(is_dom_root($__settings['softpath'])){
			$replace_data['RewriteBase '.$source_data['relativeurl'].'/'] = 'RewriteBase /';
		}
		
		sclone_replace($replace_data, $__settings['softpath'].'/.htaccess', true);		
	}
}

//Check whether the Minimum Software configuration matches
function __requirements(){

global $__settings, $error, $software;
	
	return true;

}

?>