<?php

if (!defined('BASEPATH')) {
    die();
}

/*
 * TangoBB Configuration File.
 * TangoBB (http://tangobb.net)
 */
define('MYSQL_HOST', '[[softdbhost]]');
define('MYSQL_USERNAME', '[[softdbuser]]');
define('MYSQL_PASSWORD', '[[softdbpass]]');
define('MYSQL_DATABASE', '[[softdb]]');
define('MYSQL_PREFIX', '[[dbprefix]]');
define('MYSQL_PORT', 3306);

/*
 * Iko Local Details
 */
define('SITE_URL', '[[softurl]]');//Without the ending "/"
define('TANGOBB_VERSION', '1.5.1');
define('TANGO_SESSION_TIMEOUT', 31536000);//In seconds.
define('USER_PASSWORD_HASH_COST', 10);

/*
 * Usergroup Details.
 * DO NOT CHANGE IF YOU DON'T KNOW WHAT THIS WILL DO.
 */
define('ADMIN_ID', '4');
define('MOD_ID', '3');
define('BAN_ID', '2');

/*
 * Forum Configuration.
 */
define('THREAD_RESULTS_PER_PAGE', 12);
define('POST_RESULTS_PER_PAGE', 9);

?>
