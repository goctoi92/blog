<?php
namespace Admin\Service\Factory;

use Admin\Service\AuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Session\SessionManager;

class AuthenticationServiceFactory implements FactoryInterface{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $authAdapter = $container->get(AuthAdapter::class);
        $sessionManager = $container->get(SessionManager::class);
        $authStorage = new Session('Zend','session',$sessionManager);
        return new AuthenticationService($authStorage,$authAdapter);
    }
}