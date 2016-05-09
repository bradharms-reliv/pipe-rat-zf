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
            /* Error Middleware */
            'Reliv\PipeRat\Middleware\Error\TriggerErrorHandler' => [],
            'Reliv\PipeRat\Middleware\Error\NonThrowingErrorHandler' => [],
            
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
            'Reliv\PipeRat\Middleware\RequestFormat\ParamRequestFormat' => [],
            'Reliv\PipeRat\Middleware\RequestFormat\LimitFilterParamRequestFormat' => [],
            'Reliv\PipeRat\Middleware\RequestFormat\OrderByFilterParamRequestFormat' => [],
            'Reliv\PipeRat\Middleware\RequestFormat\PropertyFilterParamRequestFormat' => [],
            'Reliv\PipeRat\Middleware\RequestFormat\SkipFilterParamRequestFormat' => [],
            'Reliv\PipeRat\Middleware\RequestFormat\WhereFilterParamRequestFormat' => [],
            // Response Formatter
            'Reliv\PipeRat\Middleware\ResponseFormat\JsonResponseFormat' => [],
            'Reliv\PipeRat\Middleware\ResponseFormat\XmlResponseFormat' => [],
            // Main
            'Reliv\PipeRat\Middleware\BasicConfigMiddleware' => [
                'class' => 'Reliv\PipeRat\Middleware\OperationMiddleware',
                'arguments' => [
                    'Reliv\PipeRat\Provider\BasicConfigRouteMiddlewareProvider',
                    'Reliv\PipeRat\Provider\BasicConfigErrorMiddlewareProvider',
                    'Reliv\PipeRat\Provider\BasicConfigMiddlewareProvider',
                ],
            ],
            'Reliv\PipeRat\Middleware\Router' => [
                'class' => 'Reliv\PipeRat\Middleware\Router\CurlyBraceVarRouter',
            ],
            /* Middleware Providers */
            'Reliv\PipeRat\Provider\BasicConfigErrorMiddlewareProvider' => [
                'arguments' => [
                    'Config',
                    'ServiceManager',
                ],
            ],
            'Reliv\PipeRat\Provider\BasicConfigMiddlewareProvider' => [
                'arguments' => [
                    'Config',
                    'ServiceManager',
                ],
            ],
            'Reliv\PipeRat\Provider\BasicConfigRouteMiddlewareProvider' => [
                'arguments' => [
                    'Config',
                    'ServiceManager',
                ],
            ],
        ],
    ],
];
