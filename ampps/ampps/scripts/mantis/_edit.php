<?php

//////////////////////////////////////////////////////////////
//===========================================================
// edit.php(For individual softwares)
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

//The Edit process
function __edit($installation){

global $__settings, $globals, $setupcontinue, $software, $error;
	
	$__settings['admin_username'] = optPOST('admin_username');
	$__settings['admin_pass'] = optPOST('admin_pass');
		
	// Do we need to reset the password ?
	if(!empty($__settings['admin_pass'])){
	
		// We need the username
		if(empty($__settings['admin_username'])){
			$error[] = '{{err_no_username}}';
			return false;
		}
				
		if(!empty($error)){
			return false;
		}
		
		
		// This is to get dbprefix from import.php
		sp_include_once($software['path'].'/import.php');
		$r = call_user_func('__import_'.$software['softname'], $installation['softpath']);
		$__settings['dbprefix'] = $r['dbprefix'];
		
		if($__settings['dbprefix'] != ''){
			$query = "SELECT `id` FROM `".$__settings['dbprefix']."user_table` WHERE `username` = '".$__settings['admin_username']."';";
		}else{		
			$query = "SELECT `id` FROM `mantis_user_table` WHERE `username` = '".$__settings['admin_username']."';";
		}
		
		// Does this user exist ?
		$result = sdb_query($query, $installation['softdbhost'], $installation['softdbuser'], $installation['softdbpass'], $installation['softdb']);
		
		$userid = $result[0]['id'];
		
		if(empty($userid)){
			$error[] = '{{err_no_such_user}}';
			return false;			
		}else{			
			// This is to obtain password method from install.php
			sp_include_once($software['path'].'/install.php');			
		
			// creating password using install.php __ad_pass() function
			$__settings['admin_pass'] = __ad_pass($__settings['admin_pass']);
			
			if(!empty($error)){
				return false;
			}

			// Update the password now
			if($__settings['dbprefix'] != ''){
				$update_query = "UPDATE `".$__settings['dbprefix']."user_table` SET `password` = '".$__settings['admin_pass']."' WHERE `id` = '".$userid."';";
			}else{
				$update_query = "UPDATE `mantis_user_table` SET `password` = '".$__settings['admin_pass']."' WHERE `id` = '".$userid."';";
			}
		
			$result = sdb_query($update_query, $installation['softdbhost'], $installation['softdbuser'], $installation['softdbpass'], $installation['softdb']);
		}
	}
}

?>