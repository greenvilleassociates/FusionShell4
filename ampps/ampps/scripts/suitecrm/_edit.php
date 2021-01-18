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
			$error[] = 'Please provide the username to reset the password';
			return false;
		}
				
		if(!empty($error)){
			return false;
		}
		
		$query = "SELECT `id` FROM `users` WHERE `user_name` = '".$__settings['admin_username']."';";
		
		// Does this user exist ?
		$result = sdb_query($query, $installation['softdbhost'], $installation['softdbuser'], $installation['softdbpass'], $installation['softdb']);
		
		$userid = $result[0]['id'];
		
		if(empty($userid)){
			$error[] = 'The Admin username is incorrect and does not exist!';
			return false;			
		}else{
		
			// creating password using install.php __ad_pass() function
			$__settings['admin_pass'] = __ad_pass($__settings['admin_pass']);
			
			if(!empty($error)){
				return false;
			}
										
			// Update the password now
			$update_query = "UPDATE `users` SET `user_hash` = '".$__settings['admin_pass']."' WHERE `id` = '".$userid."';";
			$result = sdb_query($update_query, $installation['softdbhost'], $installation['softdbuser'], $installation['softdbpass'], $installation['softdb']);
		}
	}
}	
function __ad_pass($password){

global $__settings;

	// Do not change phpversion() to sphpversion()
	if(sversion_compare(phpversion(), '5.3', '<')){
		sconfigure('update_pass.php', false, 0, 1);
		// We are setting this blank because the current value is plain text pass and we are trying to fetch the encrypted pass if we do not get the encrypted pass we have an error check below
		$__settings['admin_pass'] = '';
		
		$resp = swget($__settings['softurl'].'/update_pass.php');
		
		if(empty($resp)){
			$error[] = '{{no_domain_verify}}';
			return false;
		}
		
		if(preg_match('/<update_pass>(.*?)<\/update_pass>/is', $resp, $matches)){
			$__settings['admin_pass'] = $matches[1];
		}
		
		if(empty($__settings['admin_pass'])){
			$error[] = '{{no_pass_encrypt}}';
			return false;
		}
		
		sunlink($__settings['softpath'].'/update_pass.php');
	}else{
		$__settings['admin_pass'] = __getPasswordHash($__settings['admin_pass']);
	}
	
	return $__settings['admin_pass'];
}

function __getPasswordHash($password){
	if(!defined('CRYPT_MD5') || !constant('CRYPT_MD5')) {
		// does not support MD5 crypt - leave as is
		if(defined('CRYPT_EXT_DES') && constant('CRYPT_EXT_DES')) {
			return crypt(strtolower(md5($password)),
				"_.012".substr(str_shuffle('./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), -4));
		}
		// plain crypt cuts password to 8 chars, which is not enough
		// fall back to old md5
		return strtolower(md5($password));
	}
	return crypt(strtolower(md5($password)));
}

?>