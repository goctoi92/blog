<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Zend\Authentication\AuthenticationService;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'admin' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'dashboard' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'login' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin/login',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action'     => 'login',
                    ],
                ],
            ],
            'logout' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin/logout',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action'     => 'logout',
                    ],
                ],
            ],

        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\AuthController::class => Controller\Factory\AuthControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout-admin.phtml',
            'admin/index/index'       => __DIR__ . '/../view/admin/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            __NAMESPACE__.'_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__.'/../src/Entity'
                ],
            ],

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => [
                'drivers' => [
                    // register `my_annotation_driver` for any entity under namespace `Users`
                    __NAMESPACE__.'\Entity' => __NAMESPACE__.'_driver',
                ],
            ],
        ],
    ],
    'service_manager' =>[
        'factories' => [
            Service\UserManager::class => Service\Factory\UserManagerFactory::class,
            Service\TopicManager::class => Service\Factory\TopicManagerFactory::class,
            Service\AuthManager::class => Service\Factory\AuthManagerFactory::class,
            Service\AuthAdapter::class => Service\Factory\AuthAdapterFactory::class,
            AuthenticationService::class =>Service\Factory\AuthenticationServiceFactory::class,
        ],
    ],
    'access_filter'=>[
        'controllers'=>[
            Controller\IndexController::class =>[
                [
                    'actions'=>['forget-password'],
                    'allow'=>"all"
                ],
                [
                    'actions'=>['index'],
                    'allow'=>"limit"
                ]
            ]
        ]
    ]
];
