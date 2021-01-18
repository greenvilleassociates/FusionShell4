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
	
	sunzip($software['path'].'/update/microweber-update.zip', $__settings['softpath'], 1);
	
	//Needed before the upgrade is hit
	@schmod($__settings['softpath'].'/config/microweber.php', $globals['ofc']);
	@schmod($__settings['softpath'].'/userfiles/', $globals['odc']);
	@schmod($__settings['softpath'].'/userfiles/media/', $globals['odc'], 1);
	@schmod($__settings['softpath'].'/userfiles/cache/', $globals['odc']);
	@schmod($__settings['softpath'].'/vendor/', $globals['odc']);
	@schmod($__settings['softpath'].'/storage/cache/', $globals['odc'], 1);
	@schmod($__settings['softpath'].'/storage/framework/', $globals['odc'], 1);
	@schmod($__settings['softpath'].'/storage/logs/', $globals['odc'], 1);
	
	$auto_upgrading = sis_autoupgrading();
	
	//This swget shall update the database and make the required changes.
	$get = swget($__settings['softurl'].'/admin');
	
	if(!empty($_GET['debug'])){
		echo $get.'<br />';
	}
	
	// If it was sucessful dont give the Setuplocation
	if(preg_match('/Back(\s*?)to(\s*?)My(\s*?)WebSite/is', $get)){
		$setupcontinue = '';
	}elseif(!empty($auto_upgrading)){
		$error[] = '{{err_auto_upgrade}}';
	}
	
	@schmod($__settings['softpath'].'/config/microweber.php', $globals['ocfc']);
}

//Check whether the Minimum Software configuration matches
function __requirements(){

global $__settings, $error, $software;

	//If there are some shorfalls then pass it to $error and return false
	
	return true;

}


//===========================
// Software Vendors Functions
//===========================

//Just Validate an email
function __email_address($email){

global $error;

	if(!emailvalidation($email)){
		$error[] = '{{err_wrongemail}}';
	}		
	return $email;
}


?>