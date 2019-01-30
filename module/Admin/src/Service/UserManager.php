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
    public function editUser($user,$data){
        $user->setName($data['username']);
        $user->setPhone($data['phone']);
        $user->setFb($data['facebook']);
        $user->setTw($data['tw']);
        $user->setGit($data['github']);
        $user->setGoogle($data['google']);
        $user->setRole($data['role']);
        $user->setTimeWork($data['weekdays']." - ".$data['time']);
        $user->setDescription($data['description']);
        $this->entityManager->flush();
        return $user;
    }
    public function deleteUser($user){
        $this->entityManager->remove($user);
        $this->entityManager->flush();
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