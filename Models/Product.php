<?php

class Product{
    
    private $idProduct;
    private $descriptive;
    private $price;
    private $categorie;

    function __construct($id, $desc, $price, $cat){

        $this->idProduct = $id;
        $this->descriptive = $desc;
        $this->price = $price;
        $this->categorie = $cat;
    }

    //gets
    function getIdProduct(){return $this->idProduct;}
    function getDescriptive(){return $this->descriptive;}
    function getPrice(){return $this->price;}
    function getCategorie(){return $this->categorie;}

    //sets
    function setIdProduct($id){$this->idProduct = $id;}
    function setDescriptive($desc){$this->descriptive = $desc;}
    function setPrice($price){$this->price = $price;}
    function setCategorie($cat){$this->categorie;}

}





?>