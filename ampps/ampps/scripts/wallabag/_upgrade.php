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

	//Make the required directories
	@smkdir($__settings['softpath'].'/var/cache/', $globals['odc']);
	@smkdir($__settings['softpath'].'/var/cache/prod', $globals['odc']);
	@schmod($__settings['softpath'].'/var/', $globals['odc']);
	@schmod($__settings['softpath'].'/var/cache/', $globals['odc'], 1);
	
	if(sversion_compare($__settings['ver'], '2.1.1', '==')){
		
		//Configure the files the software wants to
		$__settings['secret'] = srandstr(30);
		sconfigure('parameters.yml', 'app/config/parameters.yml');
	
	}
	
	if(sversion_compare($__settings['ver'], '2.0.0', '>=') && sversion_compare($__settings['ver'], '2.1.1', '<')){
	
		if($globals['os'] != 'windows'){
		
			srm($__settings['softpath'].'/web/bundles/wallabagcore/themes/_global/img');
			symlink($__settings['softpath'].'/app/Resources/static/themes/_global/img', $__settings['softpath'].'/web/bundles/wallabagcore/themes/_global/img');
		}
			
		//Configure the files the software wants to
		$__settings['secret'] = srandstr(30);
		sconfigure('parameters.yml', 'app/config/parameters.yml');
		
		$file = sfile($__settings['softpath'].'/app/config/parameters.yml');

		soft_preg_replace('/database_table_prefix:(\s*?)(.*?)\n/is', $file, $r['dbprefix'], 2);
		
		// Alter the databse
		$query = 'ALTER TABLE `'.$r['dbprefix'].'entry` ADD `uuid` LONGTEXT DEFAULT NULL;';
		$result = sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
		
		$query = 'INSERT INTO `'.$r['dbprefix'].'craue_config_setting` (`name`, `value`, `section`) VALUES ("share_public", "1", "entry");';
		$result = sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
		
		$query = 'ALTER TABLE `'.$r['dbprefix'].'oauth2_clients` ADD `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL;';
		$result = sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
		
		$query = 'INSERT INTO `'.$r['dbprefix'].'craue_config_setting` (`name`, `value`, `section`) VALUES ("import_with_redis", "0", "import");';
		$result = sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
		
		$query = 'INSERT INTO `'.$r['dbprefix'].'craue_config_setting` (`name`, `value`, `section`) VALUES ("import_with_rabbitmq", "0", "import");';
		$result = sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
		
		$query = 'ALTER TABLE `'.$r['dbprefix'].'config` ADD `pocket_consumer_key` VARCHAR(255) DEFAULT NULL;';
		$result = sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
		
		$query = 'DELETE FROM `'.$r['dbprefix'].'craue_config_setting` WHERE `name` = "pocket_consumer_key";';
		$result = sdb_query($query, $__settings['softdbhost'], $__settings['softdbuser'], $__settings['softdbpass'], $__settings['softdb']);
	
	}
	
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

//The Upgrade Files
function __pre_unzip(){

global $__settings, $error, $software, $globals, $notes;

	@schmod($__settings['softpath'].'/var/cache/', $globals['odc']);
	srm($__settings['softpath'].'/var/cache/');
	
	if(!aefer() && sis_dir($__settings['softpath'].'/var/cache/prod/')){
		sconfigure('soft_delete.php', false, 0, 1);
		swget($__settings['softurl'].'/soft_delete.php');
		sunlink($__settings['softpath'].'/soft_delete.php');
	}
	
	if(sis_dir($__settings['softpath'].'/var/cache/prod/')){
		$notes = 'Please delete <b>'.$__settings['softpath'].'/var/cache/prod </b> directory before visiting upgrade links.';
	}
}


?>