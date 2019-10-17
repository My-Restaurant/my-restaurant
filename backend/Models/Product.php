<?php

class Product{
    
    private $idProduct;
    private $descriptive;
    private $price;

    function __construct($id, $desc, $price){

        $this->idProduct = $id;
        $this->descriptive = $desc;
        $this->price = $price;
    }

    //gets
    function getIdProduct(){return $this->idProduct;}
    function getDescriptive(){return $this->descriptive;}
    function getPrice(){return $this->price;}

    //sets
    function setIdProduct($id){$this->idProduct = $id;}
    function setDescriptive($desc){$this->descriptive = $desc;}
    function setPrice($price){$this->price = $price;}

}





?>