<?php

namespace Application\Entity;
use Doctrine\ORM\Mapping as Maping;
/**
 * Users
 *
 * @Maping\Table(name="tb_users")
 * @Maping\Entity(repositoryClass="Repository\UsersRepository")
 */
class Users{
    /**
     * @Maping\Id
     * @Maping\Column(type="integer")
     * @Maping\GeneratedValue
     */
    private $id;

    /** @Maping\Column(type="integer") */
    private $role;

    /** @Maping\Column(type="string") */
    private $name;

    /** @Maping\Column(type="string") */
    private $avatar;

    /** @Maping\Column(type="string") */
    private $phone;

    /** @Maping\Column(type="string") */
    private $email;

    /** @Maping\Column(type="string") */
    private $password;

    /** @Maping\Column(type="string") */
    private $time_work;

    /** @Maping\Column(type="string") */
    private $fb;

    /** @Maping\Column(type="string") */
    private $tw;

    /** @Maping\Column(type="string") */
    private $git;

    /** @Maping\Column(type="string") */
    private $google;

    /** @Maping\Column(type="string") */
    private $description;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id){
        $this->id=$id;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param $role
     */
    public function setRole($role){
        $this->role=$role;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $role
     */
    public function setName($name){
        $this->name=$name;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param $avatar
     */
    public function setAvatar($avatar){
        $this->avatar=$avatar;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param $phone
     */
    public function setPhone($phone){
        $this->phone=$phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email){
        $this->email=$email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password){
        $this->password=$password;
    }

    /**
     * @return mixed
     */
    public function getTimeWork()
    {
        return $this->time_work;
    }

    /**
     * @param $time_work
     */
    public function setTimeWork($time_work){
        $this->time_work=$time_work;
    }

    /**
     * @return mixed
     */
    public function getFb()
    {
        return $this->fb;
    }

    /**
     * @param $fb
     */
    public function setFb($fb){
        $this->fb=$fb;
    }

    /**
     * @return mixed
     */
    public function getTw()
    {
        return $this->tw;
    }

    /**
     * @param $tw
     */
    public function setTw($tw){
        $this->tw=$tw;
    }

    /**
     * @return mixed
     */
    public function getGit()
    {
        return $this->git;
    }

    /**
     * @param $git
     */
    public function setGit($git){
        $this->git=$git;
    }


    /**
     * @return mixed
     */
    public function getGoogle()
    {
        return $this->google;
    }

    /**
     * @param $google
     */
    public function setGoogle($google){
        $this->google=$google;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description){
        $this->description=$description;
    }
}








