<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Admin\Controller\AuthController;
use Admin\Service\AuthManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    public function getAutoLoaderConfig(){
        return [
            'Zend\Loader\StandardAutoloader'=>[
                'namespace'=>[
                    __NAMESPACE__=>__DIR__.'/src/'.__NAMESPACE__
                ]
            ]
        ];
    }
    public function onBootstrap(MvcEvent $event){
        $eventManager = $event->getApplication()->getEventManager();
        $shareEventManager = $eventManager->getSharedManager();
        $shareEventManager->attach(AbstractActionController::class,MvcEvent::EVENT_DISPATCH,[$this,'onDisPath'],100);
    }
    public function onDisPath(MvcEvent $event){
        $controllerName = $event->getRouteMatch()->getParam('controller',null);
        $actionName = $event->getRouteMatch()->getParam('action',null);

        $authManager = $event->getApplication()->getServiceManager()->get(AuthManager::class);
        if (!$authManager->filterAccess($controllerName,$actionName)&& $controllerName != AuthController::class){
            //khong co quyen -> return ve form login

            $controller = $event->getTarget();
            return $controller->redirect()->toRoute('login');
            //$this->redirect()->toUrl('/blog/admin/login');
        }
    }



}
