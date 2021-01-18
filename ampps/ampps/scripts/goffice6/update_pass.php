<?php

if(function_exists('password_hash')){
	$resp =  password_hash('[[admin_pass]]', PASSWORD_DEFAULT);
	echo '<update_pass>'.$resp.'</update_pass>';
}else{
	
	$salt = uniqid();

	if(function_exists("mcrypt_create_iv")) {
		$salt = base64_encode(mcrypt_create_iv(24, MCRYPT_DEV_URANDOM));
	}
	if (CRYPT_SHA256 == 1) {
		$salt = '$5$'.$salt;
	}
	
	$resp = crypt('[[admin_pass]]', $salt);
	echo '<update_pass>'.$resp.'</update_pass>';
	
}

@unlink('update_pass.php');
?>