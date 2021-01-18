<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['save_tmpl_files'] = 'y';
// ExpressionEngine Config Items
// Find more configs and overrides at
// https://docs.expressionengine.com/latest/general/system_configuration_overrides.html

$config['app_version'] = '6.0.0';
$config['encryption_key'] = '[[encryption_key]]';
$config['session_crypt_key'] = '[[session_crypt_key]]';
$config['database'] = array(
	'expressionengine' => array(
		'hostname' => '[[softdbhost]]',
		'database' => '[[softdb]]',
		'username' => '[[softdbuser]]',
		'password' => '[[softdbpass]]',
		'dbprefix' => '[[dbprefix]]',
		'char_set' => 'utf8mb4',
		'dbcollat' => 'utf8mb4_unicode_ci',
		'port'     => ''
	),
);
$config['show_ee_news'] = 'y';

// EOF