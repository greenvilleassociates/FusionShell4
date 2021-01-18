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

global $__settings, $globals, $setupcontinue, $software, $error, $replace_data;

	$__settings['admin_username'] = optPOST('admin_username');
	$__settings['admin_pass'] = optPOST('admin_pass');
	
	// Do we need to reset the password ?
	if(!empty($__settings['admin_pass'])){
	
		// We need the username
		if(empty($__settings['admin_username'])){
			$error[] = '{{err_no_username}}';
			return false;
		}
		//We need the username and old password values 
		$file = sfile($installation['softpath'].'/site/accounts/'.$__settings['admin_username'].'.php');
		
		if(empty($file)){
			$error[] = '{{err_openconfig}} or the username does not match.';
			return false;
		}
		
		soft_preg_replace('/username:(\s*?)(.*?)\npassword/is', $file, $user, 2);	
		soft_preg_replace('/username:(\s*?)(.*?)\npassword:(\s*?)>\n(\s*?)(.*?)\nemail/is', $file, $pass, 5);
		
		if($__settings['admin_username'] != $user){
			$error[] = '{{err_no_such_user}}';
			return false;
		}else{	
		
			// This is to obtain password method from install.php
			sp_include_once($software['path'].'/install.php');
			
			$replace_data[$pass] = __ad_pass($__settings['admin_pass']);
			
			sclone_replace($replace_data, $installation['softpath'].'/site/accounts/'.$__settings['admin_username'].'.php', true);
			
		}
	}
}

?>