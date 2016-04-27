<?php
/* */
return [
    'Reliv\PipeRat' => [
        'resource' => require __DIR__ . '../../pipe-rat/config/config.php',
    ],
    'service_manager' => [
        'config_factories' => [
            /* Resource Controller */
            'Reliv\PipeRat\Controller\DoctrineResourceController' => [
                'arguments' => [
                    'Doctrine\ORM\EntityManager',
                ],
            ],
            /* Resource Middleware */
            // ACL
            'Reliv\PipeRat\Middleware\Acl\RcmUserAcl' => [
            ],
            // InputFilter
            'Reliv\PipeRat\Middleware\InputFilter\ZfInputFilterClass' => [
            ],
            'Reliv\PipeRat\Middleware\InputFilter\ZfInputFilterConfig' => [
            ],
            'Reliv\PipeRat\Middleware\InputFilter\ZfInputFilterService' => [
            ],
            // Request Formatter
            'Reliv\PipeRat\Middleware\RequestFormat\JsonRequestFormat' => [
            ],
            // Response Formatter
            'Reliv\PipeRat\Middleware\ResponseFormat\JsonResponseFormat' => [
            ],
            'Reliv\PipeRat\Middleware\ResponseFormat\XmlResponseFormat' => [
            ],
            // Main
            'Reliv\PipeRat\Middleware\MainMiddleware' => [
                'class' => 'Reliv\PipeRat\Middleware\MainMiddleware',
                'arguments' => [
                    'Reliv\PipeRat\Provider\RouteModelProvider',
                    'Reliv\PipeRat\Provider\ErrorModelProvider',
                    'Reliv\PipeRat\Provider\ResourceModelProvider',
                ],
            ],
            'Reliv\PipeRat\Middleware\Router' => [
                'class' => 'Reliv\PipeRat\Middleware\Router\CurlyBraceVarRouter',
                'arguments' => [
                    'Reliv\PipeRat\Provider\RouteModelProvider',
                    'Reliv\PipeRat\Provider\ErrorModelProvider',
                    'Reliv\PipeRat\Provider\ResourceModelProvider',
                ],
            ],
            'Reliv\PipeRat\Middleware\Error\TriggerErrorHandler' => [],
            'Reliv\PipeRat\Middleware\Error\NonThrowingErrorHandler' => [],
            /* Model Providers */
            'Reliv\PipeRat\Provider\ErrorModelProvider' => [
                'class' => 'Reliv\PipeRat\Provider\ConfigErrorModelProvider',
                'arguments' => [
                    'Config',
                    'ServiceManager',
                ],
            ],
            'Reliv\PipeRat\Provider\ResourceModelProvider' => [
                'class' => 'Reliv\PipeRat\PipeRat\ConfigResourceModelProvider',
                'arguments' => [
                    'Config',
                    'ServiceManager',
                ],
            ],
            'Reliv\PipeRat\Provider\RouteModelProvider' => [
                'class' => 'Reliv\PipeRat\PipeRat\ConfigRouteModelProvider',
                'arguments' => [
                    'Config',
                    'ServiceManager',
                ],
            ],
        ],
    ],
];
