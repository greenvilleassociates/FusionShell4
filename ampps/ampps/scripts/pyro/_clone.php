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
	
	// Find the version
		$file = sfile($path.'/vendor/kriswallsmith/assetic/composer.json');
	
		if(!empty($file)){
		oft_preg_replace('/("|\')version("|\'):(\s*?)("|\')(.*?)("|\'),/is', $file, $ver, 5);
		}
		
		if($ver >= '3.0.1'){
			sclone_replace($replace_data, $__settings['softpath'].'/.env', true);
			}else{
			sclone_replace($replace_data, $__settings['softpath'].'/system/cms/config/database.php', true);
			}
	
	
	if(sfile_exists($__settings['softpath'].'/.htaccess')){
	
		// If the installation is on root domain we need to change the below relative URL
		if(is_dom_root($data['softpath'])){
			$replace_data['RewriteBase /'] = 'RewriteBase '.$__settings['relativeurl'].'/';
		}elseif(is_dom_root($__settings['softpath'])){
			$replace_data['RewriteBase '.$data['relativeurl'].'/'] = 'RewriteBase /';
		}
		
		sclone_replace($replace_data, $__settings['softpath'].'/.htaccess', true);		
	}
	
	srm($__settings['softpath'].'/system/cms/cache/default');
	
}

//Check whether the Minimum Software configuration matches
function __requirements(){

global $__settings, $error, $software;
	
	return true;

}

?>