<?php

$pass = password_hash(strtolower(md5('[[admin_pass]]')), PASSWORD_DEFAULT);

echo '<update_pass>' . $pass . '</update_pass>';

@unlink('update_pass.php');

?>