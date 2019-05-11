<?php

return [

    /*
    |--------------------------------------------------------------------------
    | The PushToPushe config file.
    |--------------------------------------------------------------------------
    |
    */

    'app_ids' => [
        'appId-1',
    ],

    'token' => 'your-pushe-service-token',

    'user_model' => 'App\User',

    'grab_pushe_ids' => false,

    'middleware' => 'web',

    'route' => 'push-to-pushe/register',

    'ssl_verify' => false,
];
