<?php return array (
  'application' => 
  array (
    'debug' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'mysql' => 
      array (
        'host' => '[[softdbhost]]',
        'user' => '[[softdbuser]]',
        'password' => '[[softdbpass]]',
        'dbname' => '[[softdb]]',
        'prefix' => '[[dbprefix]]',
      ),
    ),
  ),
  'system' => 
  array (
    'secret' => '[[secret]]',
  ),
);