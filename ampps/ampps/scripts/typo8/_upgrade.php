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

global $__settings, $error, $software, $globals, $notes;

	swrite($__settings['softpath'].'/typo3conf/ENABLE_INSTALL_TOOL', '', 1);
	@smkdir($__settings['softpath'].'/typo3temp/cs', $globals['odc']);
	@smkdir($__settings['softpath'].'/typo3_src/', $globals['odc']);
	@schmod($__settings['softpath'].'/typo3conf/ENABLE_INSTALL_TOOL', $globals['odc']);
	@schmod($__settings['softpath'].'/typo3conf/localconf.php', $globals['ofc']);
	@schmod($__settings['softpath'].'/typo3conf/LocalConfiguration.php', $globals['ofc']);
	@schmod($__settings['softpath'].'/typo3temp/cs', $globals['odc']);
	@schmod($__settings['softpath'].'/typo3_src/', $globals['odc']);
	@schmod($__settings['softpath'].'/uploads/tx_felogin/', $globals['odc']);
	@schmod($__settings['softpath'].'/fileadmin/user_upload/_temp_/', $globals['odc']);
	@schmod($__settings['softpath'].'/fileadmin/user_upload/_temp_/importexport/', $globals['odc']);
		
	$notes = 'To upgrade the database please use the Install tool password you have set. <br />The default Install tool password is the <b>ADMIN PASSWORD</b> which you have set at the time of installation.<br/>Please <q>Flush Cache</q> during upgrade';
	
}

//Check whether the Minimum Software configuration matches
function __requirements(){

global $__settings, $error, $software, $globals;

	//If there are some shorfalls then pass it to $error and return false
	// Refer notes
	if($globals['os'] == 'windows'){
		$error[] = 'Cannot be upgraded on Windows Environment';
		return false;
	}
	
	if(!sis_autoupgrading() && !checkbox('create_backup') && !checkbox('force_upgrade')){
			$error[] = '<input type="checkbox" name="force_upgrade" '.POSTChecked('force_upgrade').' /> It seems you have not chosen to back up your installation. If you have made changes into default files then please take backup. Continue anyway ? ';
	}
	
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