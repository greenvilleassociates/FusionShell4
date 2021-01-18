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
	
	$temp = parse_url($source_data['softurl']);
	$source_data['relativeurl'] = $temp['path'];
	
	$temp = parse_url($__settings['softurl']);
	$__settings['relativeurl'] = $temp['path'];
	$__settings['domhost'] = $temp['host'];
	$__settings['protocol'] = $temp['scheme'];
	
	// config.php
	$file = sfile($__settings['softpath'].'/config.php');
	
	if(empty($file)){
		$error[] = 'Could not read the config file.';
		return false;
	}
	
	soft_preg_replace('/\$config\[("|\')host("|\')\]=("|\')(.*?)("|\');/is', $file, $host, 4);
	
	$replace_data["[\"host\"]='".$host] = "[\"host\"]='".$__settings['relativeurl'].'/';
	
	sclone_replace($replace_data, $__settings['softpath'].'/config.php', true);
	
	//sql
	$query = "UPDATE `go_settings` SET value='".__getUUID()."' WHERE name='uuid_namespace';";
	sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
	
	if(sfile_exists($__settings['softpath'].'/.htaccess')){
	
		// If the installation is on root domain we need to change the below relative URL
		if(is_dom_root($source_data['softpath'])){
			$replace_data['RewriteBase \'/\''] = 'RewriteBase \''.$__settings['relativeurl'].'\'';
			$replace_data['RewriteBase /'] = 'RewriteBase '.$__settings['relativeurl'];
		}elseif(is_dom_root($__settings['softpath'])){
			$replace_data['RewriteBase \''.$source_data['relativeurl'].'\''] = 'RewriteBase \'/\'';
			$replace_data['RewriteBase '.$source_data['relativeurl']] = 'RewriteBase /';
		}
		
		sclone_replace($replace_data, $__settings['softpath'].'/.htaccess', true);		
	}
	
	@srm($__settings['softpath'].'/tmp/cache/');
	@srm($__settings['softpath'].'/tmp/diskcache/');
	
	schmod($__settings['softpath'].'/tmp/', $globals['odc'],1);
	schmod($__settings['softdatadir'].'/', $globals['odc'],1);
}

//Check whether the Minimum Software configuration matches
function __requirements(){

global $__settings, $error, $software;
	
	return true;

}

function __getUUID(){
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
			);
}

?>