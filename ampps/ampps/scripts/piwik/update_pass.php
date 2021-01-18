<?php

$resp = password_hash(md5('[[admin_pass]]'), PASSWORD_BCRYPT);
echo '<update_pass>'.$resp.'</update_pass>';

@unlink('update_pass.php');