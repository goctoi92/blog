<?php
namespace Admin\Controller\Factory;

use Admin\Controller\AuthController;
use Admin\Service\AuthManager;
use Admin\Service\UserManager;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthControllerFactory implements FactoryInterface{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $userManager = $container->get(UserManager::class);
        $authManager = $container->get(AuthManager::class);
        $authService = $container->get(AuthenticationService::class);

        return new AuthController($entityManager,$userManager,$authManager,$authService);
    }
}