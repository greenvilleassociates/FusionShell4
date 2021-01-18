<?php

$resp = __get_user_password_hash('[[admin_pass]]');
echo '<update_pass>'.$resp.'</update_pass>';

function __get_user_password_hash($password, $tested_hash = null, $password_given_as_first_password_hash = false, $password_length_if_given_as_first_password_hash = null)
{
	if ($tested_hash == md5($password)) {
		return $tested_hash;
	}
	if (!$password_given_as_first_password_hash) {
		// Création d'un premier hash du mot de passe
		$first_password_hash = hash('sha256', 'k)I8#;z=TIxnXmIPdW2TRzt4Ov89|#V~cU@]'.$password);
		// set where salt will appear in hash
		$salt_start = strlen($password);
	} else {
		$first_password_hash = $password;
		$salt_start = $password_length_if_given_as_first_password_hash;
	}
	// if no salt given create random one
	if ($tested_hash == null) {
		$salt_hash = substr(hash('sha256', 'k)I8#;z=TIxnXmIPdW2TRzt4Ov89|#V~cU@]'. uniqid(mt_rand(), true)), 0, 6);
	} else {
		$salt_hash = substr($tested_hash, 0, 6);
	}
	// add salt into text hash at pass length position and hash it
	if ($salt_start > 0 && $salt_start < strlen($salt_hash)) {
		$first_password_hash_start = substr($first_password_hash, 0, $salt_start);
		$first_password_hash_end = substr($first_password_hash, $salt_start, strlen($salt_hash));
		$hash_rough = hash('sha256' , 'k)I8#;z=TIxnXmIPdW2TRzt4Ov89|#V~cU@]'. $first_password_hash_end . $salt_hash . $first_password_hash_start);
	} elseif ($salt_start > (strlen($salt_hash) - 1)) {
		$hash_rough = hash('sha256', 'k)I8#;z=TIxnXmIPdW2TRzt4Ov89|#V~cU@]' . $first_password_hash . $salt_hash);
	} else {
		$hash_rough = hash('sha256', 'k)I8#;z=TIxnXmIPdW2TRzt4Ov89|#V~cU@]' . $salt_hash . $first_password_hash);
	}
	// put salt at front of hash
	$password_hash = $salt_hash . substr($hash_rough, 0, 26);
	if (empty($tested_hash) || $tested_hash == $password_hash) {
		return $password_hash;
	}
}

@unlink('update_pass.php');

?>