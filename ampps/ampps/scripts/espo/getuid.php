<?php

$owner = function_exists('posix_getuid') ? posix_getuid() : 0;
$group = function_exists('posix_getegid') ? posix_getegid() : 0;
echo '<owner>'.$owner.'</owner>
<group>'.$group.'</group>';

// this is to handle secret key generation
$SecretKey = __generateSecretKey();
echo '<secretkey>'.$SecretKey.'</secretkey>';

function __generateSecretKey()
{
	if (!function_exists('random_bytes')) {
		return uniqid() . substr(md5(rand()), 0, 4);
	}
	return bin2hex(random_bytes(16));
}

?>