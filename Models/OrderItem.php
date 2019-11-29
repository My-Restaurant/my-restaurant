<?php

class OrderItem{

    private $idOrderItem;
    private $quantity;
    private $totalPrice;
    private $product;
    private $order;

    function __construct($id = null, $q = null, $totalP = null, $prod = null, $order = null){

        $this->idOrderItem = $id;
        $this->quantity = $q;
        $this->totalPrice = $totalP;
        $this->product = $prod;
        $this->order = $order;
    }


    //gets
    function getIdOrderItem(){return $this->idOrderItem;}
    function getQuantity(){return $this->quantity;}
    function getTotalPrice(){return $this->totalPrice;}
    function getProduct(){return $this->product;}
    function getOrder(){return $this->order;}

    //sets
    function setIdOrderItem($id){$this->idOrderItem = $id;}
    function setQuantity($q){$this->quantity = $q;}
    function setTotalPrice($totalP){$this->totalPrice = $totalP;}
    function setProduct($prod){$this->product = $prod;}
    function setOrder($order){$this->order = $order;}

}




?>