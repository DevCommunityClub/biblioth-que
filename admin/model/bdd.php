<?php

class bdd
{
    private $bdd;

    public function __construct()
    {

       $this->bdd = new PDO('mysql:host=localhost;dbname=library;charset=utf8', 'root', '');


    }

    public function getStart(){
        return $this->bdd;
    }

}