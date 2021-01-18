<?php
if (!defined('GNUSOCIAL')) { exit(1); }

$config['site']['name'] = '[[site_name]]';

$config['site']['server'] = '[[domhost]]';
$config['site']['path'] = '[[relativeurl_]]'; 

$config['site']['ssl'] = '[[sitessl]]'; 

$config['db']['database'] = 'mysqli://[[softdbuser]]:[[softdbpass]]@[[softdbhost]]/[[softdb]]';

$config['db']['type'] = 'mysql';

// Uncomment below for better performance. Just remember you must run
// php scripts/checkschema.php whenever your enabled plugins change!
//$config['db']['schemacheck'] = 'script';

$config['site']['profile'] = '[[site_profile]]';

