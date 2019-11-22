<?php

class OrderItem{

    private $idOrderItem;
    private $quantity;
    private $totalPrice;
    private $observation;
    private $product;

    function __construct($id, $q, $totalP, $obs, $prod){

        $this->idOrderItem = $id;
        $this->quantity = $q;
        $this->totalPrice = $totalP;
        $this->observation = $obs;
        $this->product = $prod;
    }


    //gets
    function getIdOrderItem(){return $this->idOrderItem;}
    function getQuantity(){return $this->quantity;}
    function getTotalPrice(){return $this->totalPrice;}
    function getObservation(){return $this->observation;}
    function getProduct(){return $this->product;}

    //sets
    function setIdOrderItem($id){$this->idOrderItem = $id;}
    function setQuantity($q){$this->quantity = $q;}
    function setTotalPrice($totalP){$this->totalPrice = $totalP;}
    function setObservation($obs){$this->observation = $obs;}
    function setProduct($prod){$this->product = $prod;}

}




?>