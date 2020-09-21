<?php

return [
    '__name' => 'api-product-recommendation',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/api-product-recommendation.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/api-product-recommendation' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'product-recommendation' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'ApiProductRecommendation\\Controller' => [
                'type' => 'file',
                'base' => 'modules/api-product-recommendation/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'api' => [
            'apiProductRecommendation' => [
                'path' => [
                    'value' => '/product/recommendation'
                ],
                'handler' => 'ApiProductRecommendation\\Controller\\Product::index',
                'method' => 'GET'
            ]
        ]
    ]
];