<?php

use Laravel\Jetstream\Http\Middleware\AuthenticateSession;

return [

    'middleware' => ['web'],
    'auth_session' => AuthenticateSession::class,
    'guard' => 'auth:sanctum',


    'prefix' => [
        'cms_dashboard' => env('VEDIAN_CMS_PREFIX_DASHBOARD', 'dashboard/cms'),
    ],
];
