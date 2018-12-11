<?php
namespace Admin\Service;

use Zend\Authentication\Result;

class AuthManager {
    private $authenticationService;
    private $sessionManager;
    private $config;
    public function __construct($authenticationService,$sessionManager,$config)
    {
        $this->authenticationService = $authenticationService;
        $this->sessionManager = $sessionManager;
        $this->config = $config;
    }

    public function login($email,$password,$rememberMe){
        if ($this->authenticationService->hasIdentity()){
            throw new \Exception('Ban da dang nhap.!!');
        }
        $authAdapter = $this->authenticationService->getAdapter();
        $authAdapter->setEmail($email);
        $authAdapter->setPassword($password);

        $result = $this->authenticationService->authenticate();
        if ($result->getCode()==Result::SUCCESS && $rememberMe){
            $this->sessionManager->rememberMe(86400*30);
        }
        return $result;
    }
    public function logout()
    {
        if ($this->authenticationService->hasIdentity()){
            $this->authenticationService->clearIdentity();
        }
        else{
            throw new \Exception('Ban chua dang nhap.!!');
        }
    }

    public function filterAccess($controllerName,$actionName){
        if (isset($this->config['controllers'][$controllerName])){
            $controllers = $this->config['controllers'][$controllerName];
            foreach ($controllers as $controller){
                $listAction = $controller['actions'];
                $allow = $controller['allow'];
                if (in_array($actionName,$listAction)){
                    if ($allow == "all"){
                        return true;
                    }
                    elseif ($allow=="limit" && $this->authenticationService->hasIdentity()){
                        return true;
                    }
                    else return false;
                }
            }
        }
        else{
            if ($this->authenticationService->hasIdentity()){
                return false;
            }
        }
        return true;
    }
}