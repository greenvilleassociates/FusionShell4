<?php

global $key, $error;

$key = base64_decode('[[APP_KEY]]');

//Required to autoload the namespaces
require_once 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$uuid5 = (string)Uuid::uuid5(Uuid::NAMESPACE_URL, 'firefly-iii.org');

//This is to generate public and private key pairs(of 4096 bits) using phpseclib's RSA class's createKey() function and store the keys in database
$Rsa = new \phpseclib\Crypt\RSA();

$keys = $Rsa->createKey(4096);

$private_key = $keys['privatekey'];

$public_key = $keys['publickey'];

echo '<private_key>'.$private_key.'</private_key>';
echo '<public_key>'.$public_key.'</public_key>';

//Encrypting the keys
$uuid5_enc =  json_encode($uuid5);
$private_key_enc =  json_encode(__encrypt($private_key));
$public_key_enc =  json_encode(__encrypt($public_key));

echo '<installation_id>'.$uuid5_enc.'</installation_id>';
echo '<private_key_enc>'.$private_key_enc.'</private_key_enc>';
echo '<public_key_enc>'.$public_key_enc.'</public_key_enc>';

function __encrypt($value, $serialize = true)
{
	global $key, $error;
	$cipher = 'AES-256-CBC';
	//$this->cipher
	$iv = random_bytes(openssl_cipher_iv_length($cipher));

	// First we will encrypt the value using OpenSSL. After this is encrypted we
	// will proceed to calculating a MAC for the encrypted value so that this
	// value can be verified later as not having been changed by the users.
	$value = openssl_encrypt(
		$serialize ? serialize($value) : $value,
		$cipher, $key, 0, $iv
	);

	if ($value === false) {
		$error[] = 'Could not encrypt the data.';
	}

	// Once we get the encrypted value we'll go ahead and base64_encode the input
	// vector and create the MAC for the encrypted value so we can then verify
	// its authenticity. Then, we'll JSON the data into the "payload" array.
	$mac = __hash($iv = base64_encode($iv), $value);

	$json = json_encode(compact('iv', 'value', 'mac'));

	if (json_last_error() !== JSON_ERROR_NONE) {
		$error[] = 'Could not encrypt the data.';
	}

	return base64_encode($json);
}

function __hash($iv, $value)
{
	global $key;
	return hash_hmac('sha256', $iv.$value, $key);
}

@unlink('update_keys.php');

?>