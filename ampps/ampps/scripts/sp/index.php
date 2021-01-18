<?php

//print_r($_SERVER);die();

$sitepad['db_name'] = '[[db_name]]';
$sitepad['db_user'] = '[[db_user]]';
$sitepad['db_pass'] = '[[db_pass]]';
$sitepad['db_host'] = '[[db_host]]';
$sitepad['db_table_prefix'] = '[[db_table_prefix]]';
$sitepad['charset'] = '[[utf8]]';
$sitepad['collate'] = '[[collate]]';
$sitepad['serving_url'] = '[[domain]][[relativeurl]]';// URL without protocol but with directory as well
$sitepad['url'] = '[[softurl]]';
$sitepad['relativeurl'] = '[[relativeurl]]';
$sitepad['.sitepad'] = '[[softdir]]';
$sitepad['sitepad_plugin_path'] = '[[sitepad_path]]';
$sitepad['editor_path'] = '[[editor_path]]';
$sitepad['path'] = dirname(__FILE__);
$sitepad['AUTH_KEY'] = '[[AUTH_KEY]]';
$sitepad['SECURE_AUTH_KEY'] = '[[SECURE_AUTH_KEY]]';
$sitepad['LOGGED_IN_KEY'] = '[[LOGGED_IN_KEY]]';
$sitepad['NONCE_KEY'] = '[[NONCE_KEY]]';
$sitepad['AUTH_SALT'] = '[[AUTH_SALT]]';
$sitepad['SECURE_AUTH_SALT'] = '[[SECURE_AUTH_SALT]]';
$sitepad['LOGGED_IN_SALT'] = '[[LOGGED_IN_SALT]]';
$sitepad['NONCE_SALT'] = '[[NONCE_SALT]]';

if(!include_once($sitepad['editor_path'].'/site-inc/bootstrap.php')){
	die('Could not include the bootstrap.php. One of the reasons could be open_basedir restriction !');
}

