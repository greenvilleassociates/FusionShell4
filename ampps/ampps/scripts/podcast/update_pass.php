<?php

/**
 * A Compatibility library with PHP 5.5's simplified password hashing API.
 *
 * @author Anthony Ferrara <ircmaxell@php.net>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @copyright 2012 The Authors
 */

@unlink('update_pass.php');

if(!defined('PASSWORD_BCRYPT')){
	define('PASSWORD_BCRYPT', 1);
}

define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);

$resp = password_hash('[[admin_pass]]', PASSWORD_DEFAULT);
$resp1 = str_replace("\$", "\\\$", $resp);
echo '<update_pass>'.$resp1.'</update_pass>';

?>