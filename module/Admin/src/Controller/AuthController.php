<?php
namespace Admin\Controller;

use Zend\Authentication\Result;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController{

    private $entityManager,$userManager,$authManager,$authService;


    public function __construct($entityManager,$userManager,$authManager,$authService)
    {
        $this->entityManager = $entityManager;
        $this->userManager = $userManager;
        $this->authManager = $authManager;
        $this->authService = $authService;
    }
    public function loginAction(){
        $auth_session = new Container('auth_session');
        if ($this->getRequest()->isPost()){
            $data = $this->params()->fromPost();
            $remember ='';
            if (count($data)<=2)
            {
                $remember = 0;
            }
            $result=$this->authManager->login($data['email'],$data['password'],$remember);
            if ($result->getCode()== Result::SUCCESS){
                $auth_session->offsetSet('email', $data['email']);
                $this->redirect()->toUrl('/blog/admin/index');
            }
            else{
                $message = current($result->getMessages());
                $this->flashMessenger()->addErrorMessage($message);
                $this->redirect()->toUrl('/blog/admin/login');
            }
        }
        $this->layout('layout/layout-admin');
        return new ViewModel();
    }
    public function logoutAction(){
        $this->authManager->logout();
        $this->redirect()->toUrl('/blog/admin/login');
    }

}