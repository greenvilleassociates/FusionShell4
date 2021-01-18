<?php
ini_set('error_log', 'data/icehrm.log');

define('APP_NAME', 'Ice Hrm');
define('FB_URL', 'Ice Hrm');
define('TWITTER_URL', 'Ice Hrm');

define('CLIENT_NAME', 'app');
define('APP_BASE_PATH', '[[softpath]]/core/');
define('CLIENT_BASE_PATH', '[[softpath]]/app/');
define('BASE_URL','[[softurl]]/web/');
define('CLIENT_BASE_URL','[[softurl]]/app/');

define('APP_DB', '[[softdb]]');
define('APP_USERNAME', '[[softdbuser]]');
define('APP_PASSWORD', '[[softdbpass]]');
define('APP_HOST', '[[softdbhost]]');
define('APP_CON_STR', 'mysqli://'.APP_USERNAME.':'.APP_PASSWORD.'@'.APP_HOST.'/'.APP_DB);

//file upload
define('FILE_TYPES', 'jpg,png,jpeg');
define('MAX_FILE_SIZE_KB', 10 * 1024);
