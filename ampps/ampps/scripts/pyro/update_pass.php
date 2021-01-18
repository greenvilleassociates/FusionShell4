<?php
echo password_hash('[[admin_pass]]', PASSWORD_BCRYPT, array('cost' => 10));


@unlink('update_pass.php');

?>