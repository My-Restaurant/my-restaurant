<?php

class OrderItem{

    private $idOrderItem;
    private $quantity;
    private $totalPrice;
    private $observation;

    function __construct($id, $q, $totalP, $obs){

        $this->idOrderItem = $id;
        $this->quantity = $q;
        $this->totalPrice = $totalP;
        $this->observation = $obs;
    }


    //gets
    function getIdOrderItem(){return $this->idOrderItem;}
    function getQuantity(){return $this->quantity;}
    function getTotalPrice(){return $this->totalPrice;}
    function getObservation(){return $this->observation;}

    //sets
    function setIdOrderItem($id){$this->idOrderItem = $id;}
    function setQuantity($q){$this->quantity = $q;}
    function setTotalPrice($totalP){$this->totalPrice = $totalP;}
    function setObservation($obs){$this->observation = $obs;}

}




?>