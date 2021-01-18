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
	
	$__settings = $installation;
	
	$__settings['admin_email'] = optPOST('admin_email');
	$__settings['admin_pass'] = optPOST('admin_pass');
	
	// Do we need to reset the password ?
	if(!empty($__settings['admin_pass'])){
	
		// We need the username
		if(empty($__settings['admin_email'])){
			$error[] = '{{err_no_email}}';
			return false;
		}
		
		if(!empty($error)){
			return false;
		}
		
		$query = "SELECT `ID` FROM `Member` WHERE `Email` = '".$__settings['admin_email']."';";
		
		// Does this user exist ?
		$result = sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
		
		$userid = $result[0]['ID'];

		if(empty($userid)){
			$error[] = '{{err_no_such_email}}';
			return false;			
		}else{	
		
				//Fetching salt from the database 
				$query = "SELECT `Salt` FROM `Member` WHERE `Email` = '".$__settings['admin_email']."';";				
				$result = sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
				
				$__settings['salt']  = $result[0]['Salt'];				
				$__settings['methodAndSalt'] = '$2y$' . $__settings['salt'];
				
				//creating password 
				sconfigure('update_pass.php', '/public/update_pass.php', false, 0, 1);
		
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
				
				@sunlink($__settings['softpath'].'/public/update_pass.php');
			}
		
			if(!empty($error)){
				return false;
			}
			
			// Update the password now
			$update_query = "UPDATE `Member` SET `Password` = '".$__settings['admin_pass']."' WHERE `ID` = '".$userid."';";
			$result = sdb_query($update_query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
		
		}
	}


?>