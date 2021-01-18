<?php

@unlink('update_pass.php');

if(!defined('PASSWORD_BCRYPT')){
	define('PASSWORD_BCRYPT', 1);
	define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);
	define('PASSWORD_BCRYPT_DEFAULT_COST', 10);
}

$resp = password_hash('[[admin_pass]]', PASSWORD_DEFAULT);
echo '<update_pass>'.$resp.'</update_pass>';
