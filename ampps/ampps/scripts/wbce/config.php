<?php

define('DB_TYPE', 'mysql');
define('DB_HOST', '[[softdbhost]]');
define('DB_NAME', '[[softdb]]');
define('DB_USERNAME', '[[softdbuser]]');
define('DB_PASSWORD', '[[softdbpass]]');
define('DB_CHARSET', 'utf8');
define('TABLE_PREFIX', '[[dbprefix]]');

define('WB_URL', '[[softurl]]'); // no leading/trailing slash or backslash.
define('ADMIN_DIRECTORY', 'admin'); // no leading/trailing slash or backslash. A simple directory name only.


require_once(dirname(__FILE__).'/framework/initialize.php');
// end of file -------------

