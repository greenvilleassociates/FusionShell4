<?php
$config->installed       = true;
$config->debug           = false;
$config->requestType     = 'GET';
$config->timezone        = 'US/Eastern';
$config->db->host        = '[[softdbhost]]';
$config->db->port        = '3306';
$config->db->name        = '[[softdb]]';
$config->db->user        = '[[softdbuser]]';
$config->db->encoding    = 'UTF8';
$config->db->password    = '[[softdbpass]]';
$config->db->prefix      = '[[dbprefix]]';
$config->webRoot         = getWebRoot();
$config->default->lang   = '[[language]]';
