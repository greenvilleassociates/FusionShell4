<?php
$ini = <<<EOD
bootstrap_file = "index.php"
db_server = "[[softdbhost]]"
db_server_username = "[[softdbuser]]"
db_server_password = "[[softdbpass]]"
db_database = "[[softdb]]"
db_table_prefix = "[[dbprefix]]"
store_sessions = "MySQL"
time_zone = "America/New_York"
db_server_persistent_connections = "false"
EOD;
