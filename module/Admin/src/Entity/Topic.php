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

    /** @Mapping\Column(type="datetime") */
    private $date;

    /** @Mapping\Column(type="string") */
    private $author;

    /** @Mapping\Column(type="string") */
    private $content;

    /** @Mapping\Column(type="string") */
    private $img1;

    /** @Mapping\Column(type="string") */
    private $img2;

    /** @Mapping\Column(type="string") */
    private $img3;

    /** @Mapping\Column(type="string") */
    private $img4;

    /** @Mapping\Column(type="string") */
    private $img5;

    /** @Mapping\Column(type="string") */
    private $video1;

    /** @Mapping\Column(type="string") */
    private $video2;


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


    /**
     * @return mixed
     */
    public function getImg2(){
        return $this->img2;
    }

    /**
     * @param $img2
     */
    public function setImg2($img2){
        $this->img2=$img2;
    }


    /**
     * @return mixed
     */
    public function getImg3(){
        return $this->img3;
    }

    /**
     * @param $img3
     */
    public function setImg3($img3){
        $this->img3=$img3;
    }


    /**
     * @return mixed
     */
    public function getImg4(){
        return $this->img4;
    }

    /**
     * @param $img4
     */
    public function setImg4($img4){
        $this->img4=$img4;
    }


    /**
     * @return mixed
     */
    public function getImg5(){
        return $this->img5;
    }

    /**
     * @param $img5
     */
    public function setImg5($img5){
        $this->img5=$img5;
    }


    /**
     * @return mixed
     */
    public function getVideo1(){
        return $this->video1;
    }

    /**
     * @param $video1
     */
    public function setVideo1($video1){
        $this->video1=$video1;
    }


    /**
     * @return mixed
     */
    public function getVideo2(){
        return $this->video2;
    }

    /**
     * @param $video2
     */
    public function setVideo2($video2){
        $this->video2=$video2;
    }



}