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

global $__settings, $error, $software, $globals, $replace_data, $source_data;
	
	//Do we meet the Minimum software requirements
	__requirements();
	
	if(!empty($error)){
		return false;
	}
	
	$temp = parse_url($source_data['softurl']);
	$source_data['relativeurl'] = $temp['path'];
	
	$temp = parse_url($__settings['softurl']);
	$__settings['relativeurl'] = $temp['path'];
	$__settings['protocol'] = $temp['scheme'];
	$__settings['domhost'] = $temp['host'];
	
	// LocalSettings.php
	$file = sfile($__settings['softpath'].'/LocalSettings.php');
	
	if(empty($file)){
		$error[] = 'Could not read the config file.';
		return false;
	}
	
	soft_preg_replace('/\$wgServer(\s*?)=(\s*?)("|\')(.*?)("|\');/is', $file, $wgServer, 4);
	$replace_data[$wgServer] = $__settings['protocol']."://".$__settings['domhost'];
	
	soft_preg_replace('/\$wgSecretKey(\s*?)=(\s*?)("|\')(.*?)("|\');/is', $file, $wgSecretKey, 4);
	
	//Media Wiki Requires This!!
	$urandom = @fopen( "/dev/urandom", "r" );
	if ( $urandom ) {
		$__settings['secretkey'] = bin2hex( fread( $urandom, 32 ) );
		fclose( $urandom );
	} else {
		$__settings['secretkey'] = "";
		for ( $i=0; $i<8; $i++ ) {
			$__settings['secretkey'] .= dechex(mt_rand(0, 0x7fffffff));
		}
	}
	
	$replace_data[$wgSecretKey] = $__settings['secretkey'];
	
	soft_preg_replace('/\$wgUpgradeKey(\s*?)=(\s*?)("|\')(.*?)("|\');/is', $file, $wgUpgradeKey, 4);
	$replace_data[$wgUpgradeKey] = srandstr(16);
	
	// If the installation is on root domain we need to change the below relative URL
		if(is_dom_root($source_data['softpath'])){
			$replace_data['$wgScriptPath       = "";'] = '$wgScriptPath       = "'.$__settings['relativeurl'].'";';
		}elseif(is_dom_root($__settings['softpath'])){
			$replace_data['$wgScriptPath       = "'.$source_data['relativeurl'].'";'] = '$wgScriptPath       = "";';
		}
	
	sclone_replace($replace_data, $__settings['softpath'].'/LocalSettings.php', true);
	
	soft_preg_replace('/\$wgDBprefix(\s*?)=(\s*?)("|\')(.*?)("|\');/is', $file, $__settings['dbprefix'], 4);
	
	if(empty($__settings['dbprefix'])){
		$error[] = 'Could not get the database prefix.';
		return false;
	}
	
	//sql
	$temp = addslashes(json_encode($__settings['softpath']));
	$md_dep1 = substr( $temp , 5 , strlen($temp)-4 );
	
	$temp = addslashes(json_encode($source_data['softpath']));
	$md_dep2 = substr( $temp , 5 , strlen($temp)-4 );
	
	$user_token = srandstr(32);
	
	$query = "UPDATE `".$__settings['dbprefix']."module_deps` SET `md_deps` = REPLACE(`md_deps`, '".$md_dep2."', '".$md_dep1."');";
	sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
	
	$query = "UPDATE `".$__settings['dbprefix']."user` SET user_token = '".$user_token."' where user_id = 1;";
	sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
	
	$query = "TRUNCATE `".$__settings['dbprefix']."objectcache`;";
	sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
	
	$query = "TRUNCATE `".$__settings['dbprefix']."l10n_cache`;";
	sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
	
	if(sfile_exists($__settings['softpath'].'/.htaccess')){
	
		// If the installation is on root domain we need to change the below relative URL
		if(is_dom_root($source_data['softpath'])){
			$replace_data['RewriteBase \'/\''] = 'RewriteBase \''.$__settings['relativeurl'].'\'';
			$replace_data['RewriteBase /'] = 'RewriteBase '.$__settings['relativeurl'];
		}elseif(is_dom_root($__settings['softpath'])){
			$replace_data['RewriteBase \''.$source_data['relativeurl'].'\''] = 'RewriteBase \'/\'';
			$replace_data['RewriteBase '.$source_data['relativeurl']] = 'RewriteBase /';
		}
		
		sclone_replace($replace_data, $__settings['softpath'].'/.htaccess', true);		
	}
}

//Check whether the Minimum Software configuration matches
function __requirements(){

global $__settings, $error, $software;
	
	return true;

}

?>