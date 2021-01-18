<?php
return array (
  'environment' => 'production',
  'salt' => '[[salt]]',
  'base_url' => '[[softurl]]/p',
  'auto_update_url' => 'https://update.freshrss.org',
  'language' => 'en',
  'title' => 'FreshRSS',
  'meta_description' => '',
  'default_user' => '[[admin_username]]',
  'force_email_validation' => false,
  'allow_anonymous' => false,
  'allow_anonymous_refresh' => false,
  'auth_type' => 'form',
  'http_auth_auto_register' => true,
  'http_auth_auto_register_email_field' => '',
  'api_enabled' => false,
  'unsafe_autologin_enabled' => false,
  'simplepie_syslog_enabled' => true,
  'pubsubhubbub_enabled' => true,
  'allow_robots' => false,
  'allow_referrer' => false,
  'limits' => 
  array (
    'cookie_duration' => 2592000,
    'cache_duration' => 800,
    'timeout' => 15,
    'max_inactivity' => 9223372036854775807,
    'max_feeds' => 16384,
    'max_categories' => 16384,
    'max_registrations' => 1,
  ),
  'curl_options' => 
  array (
  ),
  'db' => 
  array (
    'type' => 'mysql',
    'host' => '[[softdbhost]]',
    'user' => '[[softdbuser]]',
    'password' => '[[softdbpass]]',
    'base' => '[[softdb]]',
    'prefix' => '[[dbprefix]]',
    'connection_uri_params' => '',
    'pdo_options' => 
    array (
    ),
  ),
  'mailer' => 'mail',
  'smtp' => 
  array (
    'hostname' => '',
    'host' => 'localhost',
    'port' => 25,
    'auth' => false,
    'auth_type' => '',
    'username' => '',
    'password' => '',
    'secure' => '',
    'from' => 'root@localhost',
  ),
  'extensions_enabled' => 
  array (
    'Google-Groups' => true,
    'Tumblr-GDPR' => true,
  ),
  'disable_update' => false,
);