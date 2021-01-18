<?php
@unlink('update_pass.php');

if(!defined('PASSWORD_BCRYPT')){
	define('PASSWORD_BCRYPT', 1);
	define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);
}

$resp = password_hash('[[admin_pass]]', PASSWORD_BCRYPT);
echo '<update_pass>'.$resp.'</update_pass>';
?>