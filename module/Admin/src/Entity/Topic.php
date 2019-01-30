<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as Mapping;
/**
 * @Mapping\Entity
 * @Mapping\Table(name="tb_topic")
 */

class Topic{


    /**
     * @Mapping\Id
     * @Mapping\Column(type="integer")
     * @Mapping\GeneratedValue
     */
    private $id;

    /** @Mapping\Column(type="string") */
    private $name;

    /** @Mapping\Column(type="string") */
    private $date;

    /** @Mapping\Column(type="string") */
    private $author;

    /** @Mapping\Column(type="string") */
    private $content;

    /** @Mapping\Column(type="string") */
    private $img1;



    /**
     * @return mixed
     */
    public function getId(){
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
    public function getName(){
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name){
        $this->name=$name;
    }

    /**
     * @return mixed
     */
    public function getDate(){
        return $this->date;
    }

    /**
     * @param $date
     */
    public function setDate($date){
        $this->date=$date;
    }

    /**
     * @return mixed
     */
    public function getAuthor(){
        return $this->author;
    }

    /**
     * @param $author
     */
    public function setAuthor($author){
        $this->author=$author;
    }


    /**
     * @return mixed
     */
    public function getContent(){
        return $this->content;
    }

    /**
     * @param $content
     */
    public function setContent($content){
        $this->content=$content;
    }

    /**
     * @return mixed
     */
    public function getImg1(){
        return $this->img1;
    }

    /**
     * @param $img1
     */
    public function setImg1($img1){
        $this->img1=$img1;
    }




}