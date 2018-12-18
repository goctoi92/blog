<?php
namespace Admin\Service\Factory;

use Admin\Service\TopicManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class TopicManagerFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new TopicManager($entityManager);
    }
}


?>