<?php
namespace Application\Service;

class UserManager{

    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager=$entityManager;
    }
}