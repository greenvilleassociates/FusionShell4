<?php

$resp = crypt('[[admin_pass]]', '$2a$07$'.'[[salt]]'.'$');
echo '<update_pass>'.$resp.'</update_pass>';

?>