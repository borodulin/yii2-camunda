<?php

return [
    'id' => 'test-api',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(__DIR__) . '/vendor',
    'components' => [
        'camunda' => [
            'class' => \borodulin\camunda\CamundaApi::class,
            'apiUrl' => 'http://camunda:8080/engine-rest'
        ],
    ],
];