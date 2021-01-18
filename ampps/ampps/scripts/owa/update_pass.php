<?php

@unlink('update_pass.php');

define('PASSWORD_BCRYPT', 1);
define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);

$resp = __encryptPassword('[[admin_pass]]');

echo '<update_pass>'.$resp.'</update_pass>';

function __encryptOldPassword($password) {

	return md5(strtolower($password).strlen($password));
}

function __encryptPassword($password) {

	// check function exists to support older PHP
	if ( function_exists('password_hash') ) {
		return password_hash( $password, PASSWORD_DEFAULT );
	} else {
		return __encryptOldPassword($password);
	}
}

?>