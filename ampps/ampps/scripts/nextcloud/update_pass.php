<?php

/**
 * A Compatibility library with PHP 5.5's simplified password hashing API.
 *
 * @author Anthony Ferrara <ircmaxell@php.net>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @copyright 2012 The Authors
 */

if(!defined('PASSWORD_BCRYPT')){
	define(PASSWORD_BCRYPT, 1);
}
$default = PASSWORD_BCRYPT;

if(defined('PASSWORD_ARGON2I')){
	$default = PASSWORD_ARGON2I;
}

$resp = password_hash('[[admin_pass]]', $default);
echo '<update_pass>'.$resp.'</update_pass>';

@unlink('update_pass.php');
?>