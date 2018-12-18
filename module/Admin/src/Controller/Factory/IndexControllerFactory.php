<?php
namespace Admin\Controller\Factory;
use Admin\Controller\IndexController;
use Admin\Service\TopicManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceManager;
use  Admin\Service\UserManager;


class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $userManager = $container->get(UserManager::class);
        $topicManager = $container->get(TopicManager::class);
        return new IndexController($entityManager,$userManager,$topicManager);
    }
}