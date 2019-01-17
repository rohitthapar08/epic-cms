<?php 

return [

    /*
    |--------------------------------------------------------------------------
    | Assign Global Variables Here
    |--------------------------------------------------------------------------
    |   access them using
    |   Config::get('globals.variable-name') or config('globals.variable-name') in php file
    |   Use {{ config('globals.variable-name') }} for Blade Template
    */

    'site_url_cms' => env('SITE_URL_CMS','http://epic.local.com/'),
    'site_url' => env('SITE_URL','http://epic.local.com/'),


];