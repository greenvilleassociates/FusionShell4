<?php

$resp = __hashPassword('[[admin_pass]]');
echo '<update_pass>'.$resp.'</update_pass>';

function __hashPassword($password,$cost=13){
	global $error;
	__checkBlowfish();
	$salt=__generateSalt($cost);
	$hash=crypt($password,$salt);

	if(!is_string($hash) || (function_exists('mb_strlen') ? mb_strlen($hash, '8bit') : strlen($hash))<32)
		$error[] = 'Internal error while generating hash.';

	return $hash;
}

function __checkBlowfish(){
	global $error;
		if(!function_exists('crypt')){
			$error[] = 'requires the PHP crypt() function. This system does not have it.';
		}

		if(!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH){
			$error[] = 'requires the Blowfish option of the PHP crypt() function. This system does not have it.';
		}
    }
	
function __generateSalt($cost=13){
	global $error;
	
	if(($random=__generateRandomString(22,true))===false)
		if(($random=__generateRandomString(22,false))===false)
			 $error[] = 'Unable to generate random string.';
	return sprintf('$2y$%02d$',$cost).strtr($random,array('_'=>'.','~'=>'/'));
}

function __generateRandomString($length,$cryptographicallyStrong=true){
	if(($randomBytes=__generateRandomBytes($length+2,$cryptographicallyStrong))!==false)
		return strtr(substr(base64_encode($randomBytes),0,$length),array('+'=>'_','/'=>'~'));
	return false;
}
	
function __generateRandomBytes($length,$cryptographicallyStrong=true){
		$bytes='';
		if(function_exists('openssl_random_pseudo_bytes'))
		{
			$bytes=openssl_random_pseudo_bytes($length,$strong);
			if(strlen($bytes)>=$length && ($strong || !$cryptographicallyStrong))
				return substr($bytes,0,$length);
		}

		if(function_exists('mcrypt_create_iv') &&
			($bytes=mcrypt_create_iv($length, MCRYPT_DEV_URANDOM))!==false &&
			strlen($bytes)>=$length)
		{
			return substr($bytes,0,$length);
		}

		if(($file=@fopen('/dev/urandom','rb'))!==false &&
			($bytes=@fread($file,$length))!==false &&
			(fclose($file) || true) &&
			strlen($bytes)>=$length)
		{
			return substr($bytes,0,$length);
		}

		$i=0;
		while(strlen($bytes)<$length &&
			($byte=__generateSessionRandomBlock())!==false &&
			++$i<3)
		{
			$bytes.=$byte;
		}
		if(strlen($bytes)>=$length)
			return substr($bytes,0,$length);

		if ($cryptographicallyStrong)
			return false;

		while(strlen($bytes)<$length)
			$bytes.=__generatePseudoRandomBlock();
		return substr($bytes,0,$length);
}
	

function __generateSessionRandomBlock(){
	
		ini_set('session.entropy_length',20);
		if(ini_get('session.entropy_length')!=20)
			return false;

		// These calls are (supposed to be, according to PHP manual) safe even if
		// there is already an active session for the calling script.
		@session_start();
		@session_regenerate_id();

		$bytes=session_id();
		if(!$bytes)
			return false;

		// $bytes has 20 bytes of entropy but the session manager converts the binary
		// random bytes into something readable. We have to convert that back.
		// SHA-1 should do it without losing entropy.
		return sha1($bytes,true);
}


function __generatePseudoRandomBlock(){
		$bytes='';

		if (function_exists('openssl_random_pseudo_bytes')
			&& ($bytes=openssl_random_pseudo_bytes(512))!==false
			&& strlen($bytes)>=512)
		{
			return substr($bytes,0,512);
		}

		for($i=0;$i<32;++$i)
			$bytes.=pack('S',mt_rand(0,0xffff));

		// On UNIX and UNIX-like operating systems the numerical values in `ps`, `uptime` and `iostat`
		// ought to be fairly unpredictable. Gather the non-zero digits from those.
		foreach(array('ps','uptime','iostat') as $command) {
			@exec($command,$commandResult,$retVal);
			if(is_array($commandResult) && !empty($commandResult) && $retVal==0)
				$bytes.=preg_replace('/[^1-9]/','',implode('',$commandResult));
		}

		// Gather the current time's microsecond part. Note: this is only a source of entropy on
		// the first call! If multiple calls are made, the entropy is only as much as the
		// randomness in the time between calls.
		$bytes.=substr(microtime(),2,6);

		// Concatenate everything gathered, mix it with sha512. hash() is part of PHP core and
		// enabled by default but it can be disabled at compile time but we ignore that possibility here.
		return hash('sha512',$bytes,true);
}

@unlink('update_pass.php');

?>