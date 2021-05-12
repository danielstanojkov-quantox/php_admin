<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application URL Root
    |--------------------------------------------------------------------------
    |
    */
    'URL_ROOT' => 'http://localhost/php_admin',

    /*
    |--------------------------------------------------------------------------
    | Application name
    |--------------------------------------------------------------------------
    */
    'SITE_NAME' => 'phpAdmin',

    /*
    |--------------------------------------------------------------------------
    | Application Root Folder
    |--------------------------------------------------------------------------
    */
    'APP_ROOT' => dirname(__FILE__, 2),

    /*
    |--------------------------------------------------------------------------
    | Application Users Storage
    |--------------------------------------------------------------------------
    */
    'USERS' => dirname(__FILE__, 2) . "/storage/users.json",

    /*
    |--------------------------------------------------------------------------
    | Cookie Expiration Time
    |--------------------------------------------------------------------------
    */
    'EXPIRATION_TIME' => 60
];
