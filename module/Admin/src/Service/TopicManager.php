<?php
namespace Admin\Service;

use Admin\Entity\Topic;

class TopicManager{
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function showAllTopic(){
        //no join table user return object
        $topic = $this->entityManager->getRepository(Topic::class)->findAll();
        return $topic;
    }

    public function getAllTopic(){
        // get by query join table user return array
        $query = $this->entityManager->createQuery("SELECT t.id, t.name, t.date, u.name as author, t.content, t.img1, t.video1 FROM Admin\Entity\Topic t JOIN Admin\Entity\Users u WHERE t.author = u.id");
        $topic = $query->getResult();
        return $topic;
    }

}


?>