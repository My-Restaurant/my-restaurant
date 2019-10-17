<?php

class Categorie{

    private $idCategorie;
    private $descriptive;

    function __construct($id, $desc){

        $this->idCategorie = $id;
        $this->descriptive = $desc;
    }

    //gets
    function getIdCategorie(){return $this->idCategorie;}
    function getDescriptive(){return $this->descriptive;}

    //sets
    function setIdCategorie($id){$this->idCategorie = $id;}
    function setDescriptive($desc){$this->descriptive = $desc;}
}









?>