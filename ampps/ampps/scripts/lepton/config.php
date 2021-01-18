<?php

if(defined('LEPTON_PATH')) { die('By security reasons it is not permitted to load \'config.php\' twice!! Forbidden call from \''.$_SERVER['SCRIPT_NAME'].'\'!'); }

// config file created by LEPTON 5.0.0

define('LEPTON_PATH', dirname(dirname(__FILE__)));
define('LEPTON_URL', '[[softurl]]');
define('ADMIN_PATH', LEPTON_PATH.'/backend');
define('ADMIN_URL', LEPTON_URL.'/backend');

define('LEPTON_GUID', '[[leptonguid]]');

define('WB_URL', LEPTON_URL);
define('WB_PATH', LEPTON_PATH);

if (!defined('LEPTON_INSTALL')) require_once(LEPTON_PATH.'/framework/initialize.php');

?>