<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\Users;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    private $entityManager;
    private $userManager;
    public function __construct($entityManager,$userManager)
    {
        $this->entityManager=$entityManager;
        $this->userManager=$userManager;

    }

    protected function attachDefaultListeners()
    {
        parent::attachDefaultListeners();

        $events = $this->getEventManager();
        $events->attach(MvcEvent::EVENT_DISPATCH, [$this, 'globalVariable']);
    }

    public function globalVariable()
    {
        $users = $this->entityManager->getRepository(Users::class)->findBy(array('role' => 1));
        //dd($users);//ham tu tao dump va die
        $this->layout()->setVariable('us',$users);
    }

    public function indexAction()
    {
        $this->layout('layout/layout-index');
        return new ViewModel();
    }
    public function aboutAction()
    {
        return new ViewModel();
    }
    public function productAction()
    {
        return new ViewModel();
    }
    public function contactAction()
    {
        return new ViewModel();
    }
}
