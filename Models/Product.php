<?php

class Product{
    
    private $idProduct;
    private $descriptive;
    private $price;
    private $category;

    function __construct($id = null, $desc = null, $price = null, $cat = null){

        $this->idProduct = $id;
        $this->descriptive = $desc;
        $this->price = $price;
        $this->category = $cat;
    }

    //gets
    function getIdProduct(){return $this->idProduct;}
    function getDescriptive(){return $this->descriptive;}
    function getPrice(){return $this->price;}
    function getCategory(){return $this->category;}

    //sets
    function setIdProduct($id){$this->idProduct = $id;}
    function setDescriptive($desc){$this->descriptive = $desc;}
    function setPrice($price){$this->price = $price;}
    function setCategory($cat){$this->category;}

}





?>