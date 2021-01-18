<?php

if (!defined('PASSWORD_DEFAULT')) {
    define('PASSWORD_BCRYPT', 1);
    define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);
}

$pass = password_hash('[[admin_pass]]', PASSWORD_DEFAULT);
echo '<update_pass>' . $pass . '</update_pass>';

@unlink('update_pass.php');

?>