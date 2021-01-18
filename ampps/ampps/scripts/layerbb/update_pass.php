<?php

/**
 * Hash the password using the specified algorithm
 *
 * @param string $password The password to hash
 * @param int    $algo     The algorithm to use (Defined by PASSWORD_* constants)
 * @param array  $options  The options for the algorithm to use
 *
 * @return string|false The hashed password, or false on error.
 */

@unlink('update_pass.php');

if (!defined('PASSWORD_BCRYPT')) {
	define('PASSWORD_BCRYPT', 1);
	define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);
}

$resp = password_hash('[[admin_pass]]' , PASSWORD_BCRYPT, array('cost' => 10));

echo '<update_pass>'.$resp.'</update_pass>';


?>