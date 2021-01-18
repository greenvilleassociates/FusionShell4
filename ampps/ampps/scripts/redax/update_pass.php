<?php

if(function_exists('password_hash')){
	$resp =  password_hash('[[admin_pass]]', PASSWORD_DEFAULT);
	echo '<update_pass>'.$resp.'</update_pass>';
} /* else {
	$resp =  hash('sha512', '[[admin_pass]]');
	echo '<update_pass>'.$resp.'</update_pass>';
} */

@unlink('update_pass.php');
?>