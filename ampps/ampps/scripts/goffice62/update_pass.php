<?php

@unlink('update_pass.php');
 
$resp = password_hash('[[admin_pass]]', PASSWORD_DEFAULT);
echo '<update_pass>'.$resp.'</update_pass>';

?>