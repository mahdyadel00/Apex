<?php

/*
|--------------------------------------------------------------------------
| API Versions
|--------------------------------------------------------------------------
|
| Here you may specify the API versions that you want to use.
|
*/
return [
    'debug'           => env('API_DEBUG', false),
    'current_version' => env('API_VERSION'),
    'versions'        => [
        'v1' => [
            'name'        => 'v1',
            'description' => 'First version of the API',
            'status'      => strtolower(env('API_VERSION')) === 'v1' ? 'active' : 'inactive',
            'date'        => '15-03-2023',
            'middlewares' => ['api', 'lang'],
            'files'       => [
                ['name' => 'api', 'prefix'   => 'web', 'middleware'   => ['pagination']],
                ['name' => 'admin', 'prefix' => 'admin', 'middleware' => ['pagination']],
                ['name' => 'auth', 'prefix'  => 'auth'],
                [
                    'name'       => 'teacher',
                    'prefix'     => 'teacher',
                    'middleware' => ['accessRoutes:teacher', 'auth:sanctum', 'verified', 'isBlocked', 'pagination','isApproved']
                ],
                [
                    'name'       => 'student',
                    'prefix'     => 'student',
                    'middleware' => ['accessRoutes:student', 'auth:sanctum', 'verified', 'isBlocked', 'pagination']
                ],
                [
                    'name'        => 'client',
                    'prefix'      => 'client',
                    'middleware'  => ['accessRoutes:guardian', 'auth:sanctum', 'pagination'],
                ],
            ],
        ],
    ],
];
