<?php

/**
 * A Compatibility library with PHP 5.5's simplified password hashing API.
 *
 * @author Anthony Ferrara <ircmaxell@php.net>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @copyright 2012 The Authors
 */

$plain_pass = '[[admin_pass]]';

if(!defined('PASSWORD_BCRYPT')){
	define(PASSWORD_BCRYPT, 1);
}

$default = PASSWORD_BCRYPT;
$password = __processPlainPassword($plain_pass);

if(defined('PASSWORD_ARGON2I')){
	
	$default = PASSWORD_ARGON2I;
	$password = $plain_pass;
}


$resp = password_hash($password, $default, array('cost' => 12));
echo '<update_pass>'.$resp.'</update_pass>';

function __processPlainPassword($password)
{
    return base64_encode(hash('sha384', $password, true));
}

@unlink('update_pass.php');
?>