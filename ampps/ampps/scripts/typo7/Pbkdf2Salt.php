<?php

$resp = __getHashedPassword('[[admin_pass]]');
echo '<update_pass>'.$resp.'</update_pass>';

function __getHashedPassword($password, $salt = null){
	$saltedPW = null;
	$salt = random_bytes('16');
	$hash = hash_pbkdf2('sha256', $password, $salt, '25000', 0, true);
	$saltedPW = __applySettingsToSalt($salt) . '$' . __base64Encode($hash, strlen($hash));
	
	return $saltedPW;
}

function __base64Encode($input, $count){
    $input = substr($input, 0, $count);
    return rtrim(str_replace('+', '.', base64_encode($input)), " =\r\n\t\0\x0B");
}


function __applySettingsToSalt($salt){
	$saltWithSettings = $salt;
	$saltWithSettings = '$pbkdf2-sha256$' . sprintf('%02u', '25000') . '$' . __base64Encode($salt, '16');

	return $saltWithSettings;
}

@unlink('Pbkdf2Salt.php');
	
?>