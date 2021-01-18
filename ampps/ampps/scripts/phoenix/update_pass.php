<?php

@unlink('update_pass.php');

$resp = __HashPassword('[[admin_pass]]');

echo '<update_pass>'.$resp.'</update_pass>';

function __HashPassword($password)
{
	$random = '';
	
	$iteration_count_log2 = 10;
	$portable_hashes = true;
	
	if (CRYPT_BLOWFISH === 1 && !$portable_hashes) {
		$random = __get_random_bytes(16);
		$hash =
			crypt($password, __gensalt_blowfish($random));
		if (strlen($hash) === 60)
			return $hash;
	}

	if (strlen($random) < 6)
		$random = __get_random_bytes(6);
	$hash =
		__crypt_private($password,
		__gensalt_private($random));
	if (strlen($hash) === 34)
		return $hash;

	# Returning '*' on error is safe here, but would _not_ be safe
	# in a crypt(3)-like function used _both_ for generating new
	# hashes and for validating passwords against existing hashes.
	return '*';
}

function __crypt_private($password, $setting)
{
	$itoa64 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$output = '*0';
	if (substr($setting, 0, 2) === $output)
		$output = '*1';

	$id = substr($setting, 0, 3);
	# We use "$P$", phpBB3 uses "$H$" for the same thing
	if ($id !== '$P$' && $id !== '$H$')
		return $output;

	$count_log2 = strpos($itoa64, $setting[3]);
	if ($count_log2 < 7 || $count_log2 > 30)
		return $output;

	$count = 1 << $count_log2;

	$salt = substr($setting, 4, 8);
	if (strlen($salt) !== 8)
		return $output;

	# We were kind of forced to use MD5 here since it's the only
	# cryptographic primitive that was available in all versions
	# of PHP in use.  To implement our own low-level crypto in PHP
	# would have resulted in much worse performance and
	# consequently in lower iteration counts and hashes that are
	# quicker to crack (by non-PHP code).
	$hash = md5($salt . $password, TRUE);
	do {
		$hash = md5($hash . $password, TRUE);
	} while (--$count);

	$output = substr($setting, 0, 12);
	$output .= __encode64($hash, 16);

	return $output;
}
	
function __gensalt_private($input)
{
	$itoa64 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$iteration_count_log2 = 10;
	$output = '$P$';
	$output .= $itoa64[min($iteration_count_log2 +
		((PHP_VERSION >= '5') ? 5 : 3), 30)];
	$output .= __encode64($input, 6);

	return $output;
}

function __encode64($input, $count)
{
	$itoa64 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$output = '';
	$i = 0;
	do {
		$value = ord($input[$i++]);
		$output .= $itoa64[$value & 0x3f];
		if ($i < $count)
			$value |= ord($input[$i]) << 8;
		$output .= $itoa64[($value >> 6) & 0x3f];
		if ($i++ >= $count)
			break;
		if ($i < $count)
			$value |= ord($input[$i]) << 16;
		$output .= $itoa64[($value >> 12) & 0x3f];
		if ($i++ >= $count)
			break;
		$output .= $itoa64[($value >> 18) & 0x3f];
	} while ($i < $count);

	return $output;
}

function __get_random_bytes($count)
{
	$output = '';
	$random_state = microtime();
		
	if (is_callable('random_bytes')) {
		$output = random_bytes($count);
	} elseif (@is_readable('/dev/urandom') &&
		($fh = @fopen('/dev/urandom', 'rb'))) {
		if (function_exists('stream_set_read_buffer')) {
			stream_set_read_buffer($fh, 0);
		}
		$output = fread($fh, $count);
		fclose($fh);
	} elseif ( function_exists('openssl_random_pseudo_bytes') ) {
		$output = openssl_random_pseudo_bytes($count, $orpb_secure);

		if ( $orpb_secure != true ) {
			$output = '';
		}
	}

	if (strlen($output) < $count) {
		$output = '';
		for ($i = 0; $i < $count; $i += 16) {
			$random_state =
				md5(microtime() . $random_state);
			$output .= md5($random_state, TRUE);
		}
		$output = substr($output, 0, $count);
	}

	return $output;
}

function __gensalt_blowfish($input)
{
	$iteration_count_log2 = 10;
	# This one needs to use a different order of characters and a
	# different encoding scheme from the one in encode64() above.
	# We care because the last character in our encoded string will
	# only represent 2 bits.  While two known implementations of
	# bcrypt will happily accept and correct a salt string which
	# has the 4 unused bits set to non-zero, we do not want to take
	# chances and we also do not want to waste an additional byte
	# of entropy.
	$itoa64 = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

	$output = '$2a$';
	$output .= chr(ord('0') + $iteration_count_log2 / 10);
	$output .= chr(ord('0') + $iteration_count_log2 % 10);
	$output .= '$';

	$i = 0;
	do {
		$c1 = ord($input[$i++]);
		$output .= $itoa64[$c1 >> 2];
		$c1 = ($c1 & 0x03) << 4;
		if ($i >= 16) {
			$output .= $itoa64[$c1];
			break;
		}

		$c2 = ord($input[$i++]);
		$c1 |= $c2 >> 4;
		$output .= $itoa64[$c1];
		$c1 = ($c2 & 0x0f) << 2;

		$c2 = ord($input[$i++]);
		$c1 |= $c2 >> 6;
		$output .= $itoa64[$c1];
		$output .= $itoa64[$c2 & 0x3f];
	} while (1);

	return $output;
}

?>