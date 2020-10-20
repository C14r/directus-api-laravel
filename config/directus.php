<?php

return [

    'default' => env('DIRECTUS_CONNECTION', 'default'),

    'connections' => [

        'default' => [

            'base_url' => env('DIRECTUS_URL', 'https://database.account.directus.io'),
            'project' => env('DIRECTUS_PROJECT', ''),
            'api_key' => env('DIRECTUS_API_KEY', ''),
            //'username' => env('DIRECTUS_USERNAME', ''),
            //'password' => env('DIRECTUS_PASSWORD', ''),

        ],

    ],
    
];