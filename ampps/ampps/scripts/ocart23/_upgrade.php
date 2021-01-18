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

global $__settings, $error, $software, $globals, $setupcontinue, $notes;
	
	@schmod($__settings['softpath'].'/config.php', $globals['ofc']);
	@schmod($__settings['softpath'].'/admin/config.php', $globals['ofc']);
	$notes = 'If you get any token error after upgrading, Please clear the browser cache and try again.';
	
/*  	$auto_upgrading = sis_autoupgrading();
	
	// To upgrade without the UPGRADE URL
	$get = swget($__settings['softurl'].'/install/');
	
	if(preg_match('/Follow(\s*?)these(\s*?)steps(\s*?)carefully!/is', $get)){
		$result = curl_call($__settings['softurl'].'/install/index.php?route=upgrade', 0, 5, array('submit' => 'Continue'));
	}
	
	if(!empty($_GET['debug'])){
		echo $get;
		echo '<br />';	
		echo $result;	
	}
	
	// If it was sucessful dont give the Setuplocation
	if(preg_match('/Congratulations!(\s*?)You(\s*?)have(\s*?)successfully(\s*?)upgraded(\s*?)OpenCart/is', $result)){
		$setupcontinue = '';
		$notes = '';
		srm($__settings['softpath'].'/install/');
		@schmod($__settings['softpath'].'/config.php', $globals['ocfc']);
		@schmod($__settings['softpath'].'/admin/config.php', $globals['ocfc']);
	}elseif(!empty($auto_upgrading)){
		$error[] = '{{err_auto_upgrade}}';
	}  */
}

//Check whether the Minimum Software configuration matches
function __requirements(){

global $__settings, $error, $software;

	return true;

}

?>