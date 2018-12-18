<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonAdmin for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Admin\Entity\Users;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    private $entityManager;
    private $userManager;
    private $topicManager;

    public function __construct($entityManager,$userManager,$topicManager)
    {
        $this->entityManager=$entityManager;
        $this->userManager=$userManager;
        $this->topicManager=$topicManager;

    }

    public function indexAction()
    {
        $this->layout('layout/layout-dashboard');
        return new ViewModel();
    }
    public function registerAction()
    {
        if($this->getRequest()->isPost())
        {
            $data = $this->params()->fromPost();
            $user = $this->userManager->addUser($data);
            $this->redirect()->toUrl('/blog/admin/login');
        }

        $this->layout('layout/layout-admin');
        return new ViewModel();
    }
    public function ForgetPasswordAction()
    {
        $this->layout('layout/layout-admin');
        return new ViewModel();
    }
    public function UserAction()
    {
        $auth = new AuthenticationService();
        $result = $auth->getIdentity();

        echo "aaaaaaaaaaaaaaaaaaaaaa".$result;

        $users = $this->entityManager->getRepository(Users::class)->findAll();
        $this->layout('layout/layout-dashboard');
        return new ViewModel(['users'=>$users]);
    }
    public function EditUserAction()
    {
        $id= $this->params()->fromRoute('id',0);
        $user = $this->entityManager->getRepository(Users::class)->find($id);
        $this->layout('layout/layout-dashboard');
        return new ViewModel(['user' => $user]);
    }

    public function TopicAction(){
        $topic = $this->topicManager->getAllTopic();
        $this->layout('layout/layout-dashboard');
        return new ViewModel(['topic'=>$topic]);
    }
    public function EditTopicAction()
    {
        $id= $this->params()->fromRoute('id',0);
        $this->layout('layout/layout-dashboard');
        return new ViewModel();
    }
}
