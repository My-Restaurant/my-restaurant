<?php

class Category{

    private $idCategory;
    private $descriptive;

    function __construct($id = null, $desc = null){

        $this->idCategory = $id;
        $this->descriptive = $desc;
    }

    //gets
    function getIdCategory(){return $this->idCategory;}
    function getDescriptive(){return $this->descriptive;}

    //sets
    function setIdCategory($id){$this->idCategory = $id;}
    function setDescriptive($desc){$this->descriptive = $desc;}
}









?>