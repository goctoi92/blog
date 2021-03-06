<?php
namespace Admin\Service\Factory;


use Admin\Service\AuthAdapter;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthAdapterFactory implements FactoryInterface{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager= $container->get('doctrine.entitymanager.orm_default');
        return new AuthAdapter($entityManager);
    }
}