<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/home/tchappui/sites/openclassmates.io/kikikoz/user/config/site.yaml',
    'modified' => 1499326507,
    'data' => [
        'title' => 'KiKiKoz',
        'default_lang' => 'fr',
        'author' => [
            'name' => 'Thierry Chappuis',
            'email' => 'thierry@openclassmates.org'
        ],
        'taxonomies' => [
            0 => 'category',
            1 => 'tag'
        ],
        'metadata' => [
            'description' => 'RTFM Skeleton'
        ],
        'summary' => [
            'enabled' => true,
            'format' => 'short',
            'size' => 300,
            'delimiter' => '==='
        ],
        'blog' => [
            'route' => '/blog'
        ]
    ]
];
