<?php

class Order{

    private $idOrder;
    private $totalPrice;

    function __construct($id, $totalP){

        $this->idOrder = $id;
        $this->totalPrice = $totalP;
    }

    //gets
    function getIdOrder(){return $this->idOrder;}
    function getTotalPrice(){return $this->totalPrice;}

    //sets
    function setIdOrder($id){$this->idOrder = $id;}
    function setTotalPrice($totalP){$this->totalPrice = $totalP;}
}






?>