<?php
return [
    'monitor' => [
        'diskcheck' => [
            'status' => 'enabled',
            'partition' => '[[softpath]]',
        ],
        'paths' => [
            'status' => 'enabled',
        ],
        'ircbot' => [
            'status' => 'enabled',
        ],
    ],
    'scm' => [],
    'smtp' => [
        'from' => '[[admin_email]]',
        'host' => '[[out_host_server]]',
        'port' => '[[out_m_port]]',
        'auth' => '0',
    ],
    'email_error' => [],
    'email_routing' => [
        'warning' => [],
    ],
    'note_routing' => [],
    'draft_routing' => [],
    'subject_based_routing' => [],
    'email_reminder' => [],
    'extensions' => [
        'Eventum\\Extension\\BuiltinLegacyLoaderExtension' => '[[softpath]]/src/Extension/BuiltinLegacyLoaderExtension.php',
    ],
    'xhgui_profiler' => [
        'status' => 'enabled',
    ],
    'handle_clock_in' => 'enabled',
    'issue_lock' => 300,
    'relative_date' => 'enabled',
    'markdown' => 'disabled',
    'audit_trail' => 'disabled',
    'attachments' => [
        'default_adapter' => 'pdo',
        'adapters' => [],
    ],
    'update' => 1,
    'closed' => 1,
    'emails' => 1,
    'files' => 1,
    'support_email' => 'enabled',
    'database' => [
        'hostname' => '[[softdbhost]]',
        'database' => '[[softdb]]',
        'username' => '[[softdbuser]]',
        'password' => '[[softdbpass]]',
        'port' => 3306,
        'charset' => 'utf8',
        'socket' => null,
    ],
    'auth' => [
        'adapter' => 'Eventum\\Auth\\Adapter\\MysqlAdapter',
        'options' => [
            'Eventum\\Auth\\Adapter\\MysqlAdapter' => null,
        ],
        'login_backoff' => [
            'count' => null,
            'minutes' => 15,
        ],
    ],
];
