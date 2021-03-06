<?php
namespace Admin\Service\Factory;

use Admin\Service\AuthManager;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Session\SessionManager;

class AuthManagerFactory implements FactoryInterface{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $authenticationService = $container->get(AuthenticationService::class);
        $sessionManager = $container->get(SessionManager::class);
        $config = $container->get('Config');
        if (isset($config['access_filter'])){
            $config = $config['access_filter'];
        }
        else
            $config = [];
        return new AuthManager($authenticationService,$sessionManager,$config);

    }
}