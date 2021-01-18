<?php return array (
  'components' => 
  array (
    'db' => 
    array (
      'class' => 'yii\\db\\Connection',
      'dsn' => 'mysql:host=[[softdbhost]];dbname=[[softdb]]',
      'username' => '[[softdbuser]]',
      'password' => '[[softdbpass]]',
    ),
    'user' => 
    array (
    ),
    'mailer' => 
    array (
      'transport' => 
      array (
        'class' => 'Swift_MailTransport',
      ),
    ),
    'cache' => 
    array (
      'class' => 'yii\\caching\\FileCache',
      'keyPrefix' => 'humhub',
    ),
  ),
  'params' => 
  array (
    'installer' => 
    array (
      'db' => 
      array (
        'installer_hostname' => '[[softdbhost]]',
        'installer_database' => '[[softdb]]',
      ),
    ),
    'config_created_at' => [[timestamp]],
    'horImageScrollOnMobile' => '1',
    'databaseInstalled' => true,
    'installed' => true,
  ),
  'name' => '[[site_name]]',
  'language' => '[[language]]',
); ?>