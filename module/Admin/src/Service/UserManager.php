<?php
namespace Admin\Service;

use Admin\Entity\Users;
use Zend\Crypt\Password\Bcrypt;

class UserManager{

    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager=$entityManager;
    }

    public function checkEmail($email){
        $user = $this->entityManager->getRepository(Users::class)->findOneByEmail($email);
        return $user !==null;
    }
    public function addUser($data){
        if($this->checkEmail($data['email'])){
            throw  new \Exception("Email ".$data['email'] ."da co nguoi su dung.!");
        }
        $bcrypt = new Bcrypt();
        $securePass=$bcrypt->create($data['password']);
        $user = new Users;
        $user->setName($data['username']);
        $user->setEmail($data['email']);
        $user->setPassword($securePass);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $user;
    }

    public function checkLogin($email,$password){
        $bcrypt = new Bcrypt();
        $user = $this->entityManager->getRepository(Users::class)->findOneByEmail($email);
        if($bcrypt->verify($password,$user->getPassword())){
            return true;
        }
        return false;
    }
}