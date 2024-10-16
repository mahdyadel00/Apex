<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'google' => [
        'client_id' => '647794391249-t2sahnkc1lan9kfacfm3ciekelgk9p3g.apps.googleusercontent.com', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => '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', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'https://grow.geexar.dev/google/callback'
    ],
    'facebook' => [
        'client_id' => '576524384517307', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => 'f54c7f2131ce6e01a1e4962e95447aad', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'https://grow.geexar.dev/facebook/callback'
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
