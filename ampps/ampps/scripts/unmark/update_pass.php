<?php

function __generateToken($len=20){
    $token  = NULL;
    $chars  = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $i      = 1;
    while ($i <= $len) {
        $token  .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        $i      += 1;
    }
    return $token;
}

function __generateHash($str){
    $salt = __generateToken(50);

    if (CRYPT_SHA512 == 1) {
        return crypt($str, '$6$rounds=5000$' . $salt . '$');
    }

    if (CRYPT_SHA256 == 1) {
        return crypt($str, '$5$rounds=5000$' . $salt . '$');
    }

    if (CRYPT_BLOWFISH == 1) {
        return crypt($str, '$2a$07$' . $salt . '$');
    }

    if (CRYPT_MD5 == 1) {
        return crypt($str, '$1$' . $salt . '$');
    }

    if (CRYPT_EXT_DES == 1) {
        return crypt($str, '_J9' . $salt);
    }

    if (CRYPT_STD_DES == 1) {
        return crypt($str, $salt);
    }

    return false;
    // Throw exception once everything is hooked up
}

$resp = __generateHash('[[admin_pass]]');
echo '<update_pass>'.$resp.'</update_pass>';

// We do not need this file any more
@unlink('update_pass.php');

?>