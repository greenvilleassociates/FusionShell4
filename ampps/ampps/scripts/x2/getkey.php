<?php

if(function_exists('openssl_random_pseudo_bytes')){
	$EncryptionIV = __genIV();
	$EncryptionKEY = __genKey();
}
	
echo '<Encryptioniv>'.$EncryptionIV.'</Encryptioniv>';
echo '<Encryptionkey>'.$EncryptionKEY.'</Encryptionkey>';

function __genKey($length = 32){
	$key = openssl_random_pseudo_bytes($length, $strong);
	return ($strong ? $key : false);
}

function __genIV() {
	$nonceSize = openssl_cipher_iv_length('aes-256-ctr');
	return openssl_random_pseudo_bytes($nonceSize);
}

?>