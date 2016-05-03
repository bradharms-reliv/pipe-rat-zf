<?php
/* */
return [
    'Reliv\\PipeRat' => require __DIR__ . '/../../pipe-rat/config/config.php',
    'service_manager' => [
        'config_factories' => [

            /* Extractors */
            'Reliv\PipeRat\Extractor\CollectionPropertyGetterExtractor' => [],
            'Reliv\PipeRat\Extractor\PropertyGetterExtractor'=> [],

            /* Resource Controller */
            'Reliv\PipeRat\ResourceController\DoctrineResourceController' => [
                'arguments' => [
                    'Doctrine\ORM\EntityManager',
                    'Reliv\PipeRat\Hydrator\PropertySetterHydrator'
                ],
            ],

            /* Hydrators */
            'Reliv\PipeRat\Hydrator\PropertySetterHydrator' => [],

            /* Resource Middleware */
            // ACL
            'Reliv\PipeRat\Middleware\Acl\RcmUserAcl' => [
                'arguments' => [
                    'RcmUser\Service\RcmUserService',
                ],
            ],
            // Extractor
            'Reliv\PipeRat\Middleware\Extractor\CollectionPropertyGetterExtractor' => [],
            'Reliv\PipeRat\Middleware\Extractor\PropertyGetterExtractor' => [],
            // InputFilter
            'Reliv\PipeRat\Middleware\InputFilter\ZfInputFilterClass' => [],
            'Reliv\PipeRat\Middleware\InputFilter\ZfInputFilterConfig' => [],
            'Reliv\PipeRat\Middleware\InputFilter\ZfInputFilterService' => [
                'arguments' => [
                    'ServiceManager',
                ],
            ],
            // Request Formatter
            'Reliv\PipeRat\Middleware\RequestFormat\JsonRequestFormat' => [],
            'Reliv\PipeRat\Middleware\RequestFormat\LimitFilterParamRequestFormat' => [],
            'Reliv\PipeRat\Middleware\RequestFormat\OrderByFilterParamRequestFormat' => [],
            'Reliv\PipeRat\Middleware\RequestFormat\PropertyFilterParamRequestFormat' => [],
            'Reliv\PipeRat\Middleware\RequestFormat\WhereFilterParamRequestFormat' => [],
            // Response Formatter
            'Reliv\PipeRat\Middleware\ResponseFormat\JsonResponseFormat' => [],
            'Reliv\PipeRat\Middleware\ResponseFormat\XmlResponseFormat' => [],
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
                'class' => 'Reliv\PipeRat\Provider\ConfigResourceModelProvider',
                'arguments' => [
                    'Config',
                    'ServiceManager',
                ],
            ],
            'Reliv\PipeRat\Provider\RouteModelProvider' => [
                'class' => 'Reliv\PipeRat\Provider\ConfigRouteModelProvider',
                'arguments' => [
                    'Config',
                    'ServiceManager',
                ],
            ],
        ],
    ],
];
