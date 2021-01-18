<?php
//-------------------------------------------------------------------------//
//  Nuked-KlaN - PHP Portal                                                //
//  http://www.nuked-klan.org                                              //
//-------------------------------------------------------------------------//
//  This program is free software. you can redistribute it and/or modify   //
//  it under the terms of the GNU General Public License as published by   //
//  the Free Software Foundation; either version 2 of the License.         //
//-------------------------------------------------------------------------//

$nk_version = '1.7.15';

$global['db_host'] = '[[softdbhost]]';
$global['db_user'] = '[[softdbuser]]';
$global['db_pass'] = '[[softdbpass]]';
$global['db_name'] = '[[softdb]]';
$db_prefix = '[[dbprefix]]';

define('NK_INSTALLED', true);
define('NK_OPEN', true);
define('NK_GZIP', false);
// NE PAS SUPPRIMER! / DO NOT DELETE
define('HASHKEY', '[[hashkey]]');

?>