<?php if (defined('GX_LIB') === false) die("Direct Access Not Allowed!");
/**
 * GeniXCMS - Content Management System
 *
 * PHP Based Content Management System and Framework
 *
 * @package GeniXCMS
 * @since 0.0.1 build date 20140925
 * @version 1.1.8
 * @link https://github.com/semplon/GeniXCMS
 * 
 * @author Puguh Wijayanto (www.metalgenix.com)
 * @copyright 2014-2020 Puguh Wijayanto
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 *
*/error_reporting(0);

// DB CONFIG
define('DB_HOST', '[[softdbhost]]');
define('DB_NAME', '[[softdb]]');
define('DB_PASS', '[[softdbpass]]');
define('DB_USER', '[[softdbuser]]');
define('DB_DRIVER', 'mysqli');

define('SMART_URL', false); //set 'true' if you want use SMART URL (SEO Friendly URL)
define('GX_URL_PREFIX', '.html');

define('ADMIN_DIR', 'gxadmin');
define('USE_MEMCACHED', false);
define('SITE_ID', '[[SITE_ID]]');











##################################// 
# DON't REMOVE or EDIT THIS. 
# ==================================
# YOU WON'T BE ABLE TO LOG IN 
# IF IT CHANGED. PLEASE BE AWARE
##################################//
define('SECURITY_KEY', '[[SECURITY_KEY]]'); // for security purpose, will be used for creating password

        