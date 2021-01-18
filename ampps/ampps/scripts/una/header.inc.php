<?php

define('BX_DOL', 1);

define('BX_DOL_URL_ROOT', '[[softurl]]/'); ///< site url

define('BX_DIRECTORY_PATH_ROOT', '[[softpath]]/'); ///< site path

define('BX_DATABASE_HOST', '[[softdbhost]]'); ///< db host
define('BX_DATABASE_SOCK', ''); ///< db socket
define('BX_DATABASE_PORT', ''); ///< db port
define('BX_DATABASE_USER', '[[softdbuser]]'); ///< db user
define('BX_DATABASE_PASS', '[[softdbpass]]'); ///< db password
define('BX_DATABASE_NAME', '[[softdb]]'); ///< db name
define('BX_DATABASE_ENGINE', 'MYISAM'); ///< db engine

define('BX_SYSTEM_JAVA', 'java:'); ///< path to java binary
define('BX_SYSTEM_FFMPEG', '[[softpath]]/plugins/ffmpeg/ffmpeg.exe'); ///< path to ffmpeg binary
define('BX_DOL_SECRET', '[[secret]]'); ///< secret word

define('BX_DB_FULL_VISUAL_PROCESSING', true); ///< upon db error - show error message
define('BX_DB_FULL_DEBUG_MODE', false); ///< upon db error - show detailed report (turn off in production mode)
define('BX_DB_DO_EMAIL_ERROR_REPORT', true); ///< upon db error - send email with detailed report

error_reporting(E_ALL);
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');
date_default_timezone_set('UTC');

require_once('params.inc.php');

bx_check_maintenance_mode (true);
bx_check_minimal_requirements(true);
bx_check_redirect_to_correct_hostname(true);
bx_check_redirect_to_remove_install_folder(true);

