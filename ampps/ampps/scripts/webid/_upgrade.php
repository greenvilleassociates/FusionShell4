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

global $__settings, $error, $software, $globals, $setupcontinue;

	// There upgrade utility doesn't work for version 1.1.1 to 1.1.2. So we have added this procedure by refring to their forum
	// http://www.webidsupport.com/forums/showthread.php?8357-Upgrade-from-1-1-1-to-1-1-2-stop-in-step-2&p=43363&viewfull=1#post43363
	// http://www.webidsupport.com/forums/showthread.php?8362-Version-change-not-showing&p=43394&viewfull=1#post43394
	if(sversion_compare($__settings['ver'], '1.1.1', '==') && $software['ver'] == '1.1.2'){		
		// We need the Database Prefix to make upgrade query
		$file = sfile($__settings['softpath'].'/includes/config.inc.php');
		
		if(empty($file)){
			$error[] = 'Could not read the config file to get the database prefix.';
			return false;
		}
		
		preg_replace('/'.preg_quote('$DbHost', '/').'(\s*?)=(\s*?)("|\')(.*?)("|\')(\s*?);/ies', '$r[\'softdbhost\'] = trim(\'$4\')', $file);
	
		preg_replace('/'.preg_quote('$DbUser', '/').'(\s*?)=(\s*?)("|\')(.*?)("|\')(\s*?);/ies', '$r[\'softdbuser\'] = trim(\'$4\')', $file);
	
		preg_replace('/'.preg_quote('$DbPassword', '/').'(\s*?)=(\s*?)("|\')(.*?)("|\')(\s*?);/ies', '$r[\'softdbpass\'] = trim(\'$4\')', $file);
	
		preg_replace('/'.preg_quote('$DbDatabase', '/').'(\s*?)=(\s*?)("|\')(.*?)("|\')(\s*?);/ies', '$r[\'softdb\'] = trim(\'$4\')', $file);
	
		preg_replace('/'.preg_quote('$DBPrefix', '/').'(\s*?)=(\s*?)("|\')(.*?)("|\')(\s*?);/ies', '$prefix = trim(\'$4\')', $file);
	
		$result = sdb_query("UPDATE `".$prefix."settings` SET `version` = '1.1.2' WHERE `version` = '1.1.1';", $r['softdbhost'], $r['softdbuser'], $r['softdbpass'], $r['softdb']);
		
		$setupcontinue = '';
		srm($__settings['softpath'].'/install/');
		
	}else{
		
		//CHMOD
		@schmod($__settings['softpath'].'/includes/membertypes.inc.php', $globals['ofc']);
		@schmod($__settings['softpath'].'/language/EN/categories.inc.php', $globals['ofc']);
		@schmod($__settings['softpath'].'/language/EN/categories_select_box.inc.php', $globals['ofc']);
		@schmod($__settings['softpath'].'/cache/', $globals['odc']);
		@schmod($__settings['softpath'].'/uploaded/', $globals['odc']);
		@schmod($__settings['softpath'].'/uploaded/banners/', $globals['odc']);
		@schmod($__settings['softpath'].'/uploaded/cache/', $globals['odc']);
	}
}

//Check whether the Minimum Software configuration matches
function __requirements(){

global $__settings, $error, $software;

	//If there are some shorfalls then pass it to $error and return false
	
	return true;
}

//The Upgrade Files
function __pre_unzip(){

global $__settings, $error, $software, $globals, $__delete_folders, $__delete_files;
	
	__deleteUnexistingFiles();
	
	foreach($__delete_folders as $dk => $dv){
		@srm($__settings['softpath'].$dv);
	}
	
	foreach($__delete_files as $fk => $fv){
		@srm($__settings['softpath'].$fv);
	}
	
	// To rebuild installation.php
	sfileindex($software['path'].'/fileindex.php');
}

// This is taken from install/scripts/1.2.1.php
function __deleteUnexistingFiles(){
	
global $__delete_folders, $__delete_files;

	$__delete_files = array(
			'/admin/bar.php',
			'/inc/calendar.css',
			'/inc/img/cal.gif',
			'/inc/img/next_mon.gif',
			'/inc/img/next_year.gif',
			'/inc/img/no_cal.gif',
			'/inc/img/pixel.gif',
			'/inc/img/prev_mon.gif',
			'/inc/img/prev_year.gif',
			'/inc/img/shade_bl.png',
			'/inc/img/shade_bm.png',
			'/inc/img/shade_br.png',
			'/inc/img/shade_mr.png',
			'/inc/img/shade_tr.png',
			'/includes/class_db_handle.php',
			'/includes/class_template_compile.php',
			'/includes/class_user.php',
			'/includes/converter.inc.php',
			'/includes/countries.inc.php',
			'/includes/currencies.php',
			'/includes/email_auction_confirmation.php',
			'/includes/email_endauction_cumulative.php',
			'/includes/email_endauction_nowinner.php',
			'/includes/email_endauction_winner.php',
			'/includes/email_endauction_youwin.php',
			'/includes/email_endauction_youwin_nodutch.php',
			'/includes/email_outbid.php',
			'/includes/email_user_approved.php',
			'/includes/email_user_confirmation.php',
			'/includes/email_user_needapproval.php',
			'/includes/htmLawed.php',
			'/includes/template.php',
			'/includes/useragent.inc.php',
			'/js/calendar.php',
			'/js/google_converter.js',
			'/js/jquery.dimensions.js',
			'/captcha.php',
			'/captcha_play.php',
			'/converter.php',
			'/loader.php',
			'/includes/functions_rebuild.php',
			'/includes/membertypes.inc.php',
	);

	// Delete folders
	$__delete_folders = array(
			'/fck',
			'/ckeditor',
			'/inc/captcha',
			'/includes/captcha',
			'/inc/checks',
			'/inc/flags',
			'/includes/flags',
			'/inc/plupload',
			'/themes/admin',
			'/themes/default',
	);
}

?>