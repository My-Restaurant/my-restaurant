<?php

class OrderItem{

    private $idOrderItem;
    private $quantity;
    private $totalPrice;
    private $observation;
    private $status;
    private $product;

    function __construct($id, $q, $totalP, $obs, $s, $prod){

        $this->idOrderItem = $id;
        $this->quantity = $q;
        $this->totalPrice = $totalP;
        $this->observation = $obs;
        $this->status = $s;
        $this->product[] = $prod;
    }


    //gets
    function getIdOrderItem(){return $this->idOrderItem;}
    function getQuantity(){return $this->quantity;}
    function getTotalPrice(){return $this->totalPrice;}
    function getObservation(){return $this->observation;}
    function getStatus(){return $this->status;}
    function getProduct(){return $this->product;}

    //sets
    function setIdOrderItem($id){$this->idOrderItem = $id;}
    function setQuantity($q){$this->quantity = $q;}
    function setTotalPrice($totalP){$this->totalPrice = $totalP;}
    function setObservation($obs){$this->observation = $obs;}
    function setStatus($s){$this->status = $s;}
    function setProduct($prod){$this->product[] = $prod;}

}




?>