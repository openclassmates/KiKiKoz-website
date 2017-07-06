<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/home/tchappui/sites/openclassmates.io/kikikoz/user/config/plugins/email.yaml',
    'modified' => 1499326441,
    'data' => [
        'enabled' => true,
        'from' => 'kikikoz.website@openclassmates.org',
        'from_name' => 'KiKiKoz website',
        'to' => 'tchappui@openclassmates.org',
        'to_name' => 'Thierry Chappuis',
        'mailer' => [
            'engine' => 'smtp',
            'smtp' => [
                'server' => 'mail.gandi.net',
                'port' => 465,
                'encryption' => 'tls',
                'user' => 'admin@openclassmates.org',
                'password' => 'ellea.mujigka'
            ]
        ],
        'content_type' => 'text/plain',
        'debug' => false
    ]
];
