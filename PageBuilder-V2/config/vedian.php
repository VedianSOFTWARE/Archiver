<?php

use Laravel\Jetstream\Http\Middleware\AuthenticateSession;

return [

    'middleware' => ['web'],
    'auth_session' => AuthenticateSession::class,
    'guard' => 'auth:sanctum',

    'prefix' => env('VEDIAN_CMS_PREFIX', 'dashboard/cms'),
];
