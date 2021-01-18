<?php

//////////////////////////////////////////////////////////////
//===========================================================
// upgrade.php(For individual softwares)
//===========================================================
// SOFTACULOUS 
// Version : 1.0
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

/////////////////////////////////////////
// All functions in this PAGE must begin
// with TWO UNDERSCORE '__' to avoid 
// clashes with SOFTACULOUS Functions
// e.g. __funcname()
/////////////////////////////////////////

//////////////////////////////////////////
// Note : The path of the upgrade package 
//        is $software['path'].'/' . So to
//        access other files use 
//        $software['path'].'/other_file.ext'
//////////////////////////////////////////

// NOTE: $__settings will contain the installation information like PATH, URL. They are :
//       $__settings['ver'] - The version of the current installation
//		 $__settings['itime'] - When the software was installed
//		 $__settings['softpath'] - The current PATH
//		 $__settings['softurl'] - The URL of the software
//		 IF database was made by Softaclous
//		 $__settings['softdb'] - The Database name
//		 $__settings['softdbuser'] - Database User
//		 $__settings['softdbhost'] - Database Host
//		 $__settings['softdbpass'] - Database Password

//The Upgrade process
function __upgrade($version_from){

global $__settings, $globals, $setupcontinue, $software, $error;

	$temp = parse_url($__settings['softurl']);
	$__settings['relativeurl'] = $temp['path'];
	$__settings['domhost'] = $temp['host'];
	
	/* // Steps for upgarde 3.2.x to 4.0.x
	if(sversion_compare($__settings['ver'], '3.2.0', '>=') && sversion_compare($__settings['ver'], '4.0.0', '<')){
		
		$file = sfile($__settings['softpath'].'/core/b2db_bootstrap.inc.php');
		
		soft_preg_replace('/self::setDSN\(\'mysql:host=(.*?);dbname/is', $file, $__settings['softdbhost'], 1);
	
		soft_preg_replace('/self::setUname\(\'(.*?)\'\);/is', $file, $__settings['softdbuser'], 1);
	
		soft_preg_replace('/self::setPasswd\(\'(.*?)\'\);/is', $file, $__settings['softdbpass'], 1);
	
		soft_preg_replace('/self::setDSN\(\'mysql:host=(.*?);dbname=(.*?)\'\);/is', $file, $__settings['softdb'], 2);
		
		soft_preg_replace('/self::setTablePrefix\(\'(.*?)\'\);/is', $file, $__settings['dbprefix'], 1);
		
	
		sconfigure('.htaccess', '/public/.htaccess', false, 0, 1);
		sconfigure('b2db.yml', '/core/config/b2db.yml');
		
		@smkdir($__settings['softpath'].'/cache/', $globals['odc']);
	} */		
		@scopy($software['path'].'/upgrade', $__settings['softpath'].'/upgrade');
		
		// CHMOD
		@schmod($__settings['softpath'].'/installed', $globals['ofc']);
		@schmod($__settings['softpath'].'/upgrade', $globals['ofc']);
		
		@schmod($__settings['softpath'].'/cache/', $globals['odc']);
		@schmod($__settings['softpath'].'/core/cache/', $globals['odc']);
		@schmod($__settings['softpath'].'/core/cache/B2DB/', $globals['odc']);
		
		if($globals['os'] != 'windows'){
		
		// Have to remove this files so symlinks can be created
		srm($__settings['softpath'].'/public/images');
		
		// create sym links
		@shell_exec('ln -s '.$__settings['softpath'].'/themes/oxygen/images'.' '.$__settings['softpath'].'/public/images');
		
		if(sversion_compare($__settings['ver'], '4.3.0', '<')){
			srm($__settings['softpath'].'/vendor/bin/html-to-markdown');
			@shell_exec('ln -s '.$__settings['softpath'].'/vendor/league/html-to-markdown/bin/html-to-markdown'.' '.$__settings['softpath'].'/vendor/bin/html-to-markdown');
		}
		
		}

}

//The Upgrade Files
function __pre_unzip(){

global $__settings, $error, $software, $globals;

	srm($__settings['softpath'].'/core/cache/');
	srm($__settings['softpath'].'/core/cache/B2DB/');
	
}

//Check whether the Minimum Software configuration matches
function __requirements(){

global $__settings, $error, $software, $globals;	
	
	/* if(sversion_compare($__settings['ver'], '4.0.0', '<') && !sis_autoupgrading() && !checkbox('force_upgrade')){
		$error[] = '<input type="checkbox" name="force_upgrade" '.POSTChecked('force_upgrade').' /> 
					Upgrading from 3.x to 4.x requires you to change the password of all your users. This can be done by The Bug Genie upgrade utility. Do you want to continue ? ';
	} */

	//If there are some shorfalls then pass it to $error and return false
	
	if($globals['os'] == 'windows'){
		$error[] = 'The Bug Genie is not supported on windows.';
	}
	
	return true;

}

?>