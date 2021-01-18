<?php

$resp = __encrypt_password('[[admin_pass]]', '[[salt]]', '$2a$' . '12' . '$', '[[passwordsaltmain]]');
echo '<update_pass>'.$resp.'</update_pass>';

function __encrypt_password($password, $salt='', $alg='$6$', $sitesalt='') {
	if ($salt == '') {
		$salt = substr(md5(rand(1000000, 9999999)), 2, 8);
	}
	if ($alg == '$6$') { // $6$ is the identifier for the SHA512 algorithm
		// Return a hash which is sha512(originalHash, salt), where original is sha1(salt + password)
		$password = sha1($salt . $password);
		// Generate a salt based on a supplied salt and the passwordsaltmain
		$fullsalt = substr(md5($sitesalt . $salt), 0, 16); // SHA512 expects 16 chars of salt
	}
	else { // This is most likely bcrypt $2a$, but any other algorithm can take up to 22 chars of salt
		// Generate a salt based on a supplied salt and the passwordsaltmain
		$fullsalt = substr(md5($sitesalt . $salt), 0, 22); // bcrypt expects 22 chars of salt
	}
	$hash = crypt($password, $alg . $fullsalt);
	// Strip out the computed salt
	// We strip out the salt hide the computed salt (in case the sitesalt was used which isn't in the database)
	$hash = substr($hash, 0, strlen($alg)) . substr($hash, strlen($alg)+strlen($fullsalt));
	return $hash;
}

@unlink('update_pass.php');
?>
