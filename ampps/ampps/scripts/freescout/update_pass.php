<?php
/**
 * A Compatibility library with PHP 5.5's simplified password hashing API.
 *
 * @author Anthony Ferrara <ircmaxell@php.net>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @copyright 2012 The Authors
 */

@unlink('update_pass.php');

if (!defined('PASSWORD_BCRYPT')) {
	define('PASSWORD_BCRYPT', 1);
	define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);
}

$resp = password_hash('[[admin_pass]]', PASSWORD_BCRYPT, array('cost' => 10));
echo '<update_pass>'.$resp.'</update_pass>';

?>