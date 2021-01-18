<?php

return [
    'default'     => 'mysql',
    'prefix'      => '[[dbprefix]]',
    'connections' => [
        'mysql' => [
            'driver'   => 'mysql',
            'hostname' => '[[softdbhost]]',
            'port'     => '3306',
            'username' => '[[softdbuser]]',
            'password' => '[[softdbpass]]',
            'database' => '[[softdb]]',
            'charset'  => 'utf8mb4'
        ]
    ]
];
