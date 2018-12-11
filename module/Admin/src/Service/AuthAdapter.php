<?php
namespace Admin\Service;
use Admin\Entity\Users;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Zend\Crypt\Password\Bcrypt;

class AuthAdapter implements AdapterInterface {
    private $entityManager;
    private $email;
    private $password;
    public function __construct($entityManager){
        $this->entityManager=$entityManager;
    }

    public function setEmail($email){
        $this->email=$email;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function authenticate()
    {
        $user = $this->entityManager->getRepository(Users::class)->findOneByEmail($this->email);
        if (!$user){
            return new Result(
                Result::FAILURE_IDENTITY_NOT_FOUND,
                null,
                ['Email khong ton tai.!!!!']);
        }
        else{
            $bcrypt = new Bcrypt();
            $userpass = $this->password;
            $passHas = $user->getPassword();
            if ($bcrypt->verify($userpass,$passHas)){
                return new Result(
                    Result::SUCCESS,
                    $this->email,
                    ['Dang nhap thanh cong.!!!']);
            }
            else{
                return new Result(
                    Result::FAILURE_CREDENTIAL_INVALID,
                    null,
                    ['Sai mat khau.!!!']);
            }
        }
    }
}
