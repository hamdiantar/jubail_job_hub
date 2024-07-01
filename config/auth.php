<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'jobseekers',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'jobseekers',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'company' => [
            'driver' => 'session',
            'provider' => 'companies',
        ],

        'jobseeker' => [
            'driver' => 'session',
            'provider' => 'jobseekers',
        ],
    ],


    'providers' => [

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'companies' => [
            'driver' => 'eloquent',
            'model' => App\Models\Company::class,
        ],

        'jobseekers' => [
            'driver' => 'eloquent',
            'model' => App\Models\JobSeeker::class,
        ],
    ],

    'password_timeout' => 10800,

];
