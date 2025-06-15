<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Layanan Pihak Ketiga
    |--------------------------------------------------------------------------
    |
    | File ini untuk menyimpan kredensial layanan pihak ketiga seperti
    | Mailgun, Postmark, AWS dan lainnya. File ini menyediakan lokasi
    | standar untuk informasi semacam ini.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Konfigurasi Login Sosial (Socialite)
    |--------------------------------------------------------------------------
    */

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_REDIRECT_URI'),
        
        // Optional: Untuk request scope tambahan
        'scopes' => ['user:email'],
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
        
        // Optional: Untuk request offline access dan refresh token
        'access_type' => 'online',
        'approval_prompt' => 'auto',
    ],

    'microsoft' => [
        'client_id' => env('MICROSOFT_CLIENT_ID'),
        'client_secret' => env('MICROSOFT_CLIENT_SECRET'),
        'redirect' => env('MICROSOFT_REDIRECT_URI'),
        'tenant' => env('MICROSOFT_TENANT_ID', 'common'),
        
        // Scope untuk Microsoft Graph API
        'scopes' => [
            'openid',
            'profile',
            'email',
            'User.Read',
        ],
    ],
];