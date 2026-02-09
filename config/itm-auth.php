<?php

return [
    'enabled' => true,
    'public_key' => env('IAM_PUBLIC_KEY'),
    'algo' => env('IAM_ALGO', 'RS256'),
    'claim_mapping' => [
        'tv' => 'token_version',
        'per' => 'permissions',
        'rol' => 'roles',
        'com' => 'company_id',
    ],
    'header' => env('IAM_HEADER', 'Authorization'),
    'prefix' => env('IAM_PREFIX', 'Bearer'),
    'leeway' => (int) env('IAM_LEEWAY', 60),
];
