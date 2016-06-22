<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'loginfb' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/loginfb',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'loginfb',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'register' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/register',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Register',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'saveuser' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/saveuser',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Register',
                        'action'        => 'saveuser',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'saveuserfb' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/saveuserfb',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Register',
                        'action'        => 'saveuserfb',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'usersuccessful' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/usersuccessful',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Register',
                        'action'        => 'usersuccessful',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'erroruser' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/erroruser',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Register',
                        'action'        => 'erroruser',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'userexist' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/userexist',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Register',
                        'action'        => 'userexist',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'errordata' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/errordata',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Register',
                        'action'        => 'errordata',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'panel' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/panel',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Panel',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'editinfo' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/editinfo',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Panel',
                        'action'        => 'editinfo',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'editinfouser' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/editinfouser',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Panel',
                        'action'        => 'editinfouser',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'listuser' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/listuser',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Panel',
                        'action'        => 'listuser',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9_-]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'edituser' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/edituser[/[:action][/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Panel',
                        'action'        => 'edituser',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action][/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'deleteuser' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/deleteuser[/[:action][/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Panel',
                        'action'        => 'deleteuser',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action][/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'createuser' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/createuser[/[:action][/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Panel',
                        'action'        => 'createuser',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action][/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'savenewuser' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/savenewuser[/[:action][/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Panel',
                        'action'        => 'savenewuser',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action][/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'editinfouseradmin' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/editinfouseradmin[/[:action][/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Panel',
                        'action'        => 'editinfouseradmin',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action][/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            
            'closed' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/closed[/[:action][/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'closed',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action][/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'     => '[0-9]*'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Register' => 'Application\Controller\RegisterController',
            'Application\Controller\Panel' => 'Application\Controller\PanelController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/layoutAdmin'           => __DIR__ . '/../view/layout/layoutAdmin.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Application/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities'
                )
        ))),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    
    'view_helpers' => array(
        'invokables'=> array(
            'consultas' => 'Application\View\Helper\ConsultasHelper',
            'asignarApuestas' => 'Application\View\Helper\asignarApuestasHelper'
        )
    ),
);
