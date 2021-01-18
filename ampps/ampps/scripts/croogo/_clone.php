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

global $__settings, $error, $software, $globals, $replace_data, $data;
	
	//Do we meet the Minimum software requirements
	__requirements();
	
	if(!empty($error)){
		return false;
	}
	
	// CHMOD
	@schmod($__settings['softpath'].'/tmp/', $globals['odc'], 1);
	
	sclone_replace($replace_data, $__settings['softpath'].'/Config/database.php', true);
	
	// Read the config file for dbprefix
	$file = sfile($__settings['softpath'].'/Config/database.php');
	
	if(empty($file)){
		$error[] = 'Could not read the config file to get the database prefix.';
		return false;
	}
	
	soft_preg_replace('/(\s*?)("|\')prefix("|\')(\s*?)=>(\s*?)("|\')(.*?)("|\'),/is', $file, $__settings['dbprefix'], 7);
	$__settings['activation_key'] = md5(uniqid());	
	$key_replace = "UPDATE ".$__settings['dbprefix']."users SET activation_key='".$__settings['activation_key']."' WHERE id='1';";
	sdb_query($key_replace, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
	
	if(sfile_exists($__settings['softpath'].'/.htaccess')){
	
		// If the installation is on root domain we need to change the below relative URL
		if(is_dom_root($data['softpath'])){
			$replace_data['RewriteBase /'] = 'RewriteBase '.$__settings['relativeurl'].'/';
		}elseif(is_dom_root($__settings['softpath'])){
			$replace_data['RewriteBase '.$data['relativeurl'].'/'] = 'RewriteBase /';
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