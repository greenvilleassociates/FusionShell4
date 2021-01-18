<?php 
defined('FCPATH') || exit('No direct script access allowed'); 

/* Database Host */ 
define('DB_HOST', '[[softdbhost]]'); 

/* Database Username */ 
define('DB_USERNAME', '[[softdbuser]]'); 

/* Database Password */ 
define('DB_PASS', '[[softdbpass]]'); 

/* Database Name */ 
define('DB_NAME', '[[softdb]]'); 

/* Base URL */ 
define('BASE_URL', '[[softurl]]'); 

/* Email Domain */ 
define('EMAIL_DOMAIN', '[[domhost]]'); 

/* Time Zone */ 
define('TIME_ZONE', 'America/New_York'); 

/* The full DSN string describe a connection to the database. For connect other DB without MySQLi */ 
define('DB_DSN', ''); 

/* The database driver. e.g.: mysqli, mssql, postgre, sqlite, sqlite3 */ 
define('DB_DRIVER', 'mysqli'); 

