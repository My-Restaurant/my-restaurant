<?php

class Order{

    private $idOrder;
    private $totalPrice;
    private $waiter;
    private $desk;
    private $orderItem;
    

    function __construct($id, $totalP, $w, $desk, $idOrder, $q, $totalP, $obs,  $s, $prod){

        $this->idOrder = $id;
        $this->totalPrice = $totalP;
        $this->waiter = $w;
        $this->desk = $desk;
        $this->orderItem[] = new OrderItem($idOrder, $q, $totalP, $obs,  $s, $prod);
        
    }

    //gets
    function getIdOrder(){return $this->idOrder;}
    function getTotalPrice(){return $this->totalPrice;}
    function getWaiter(){return $this->waiter;}
    function getDesk(){return $this->desk;}
    function getOrderItem(){return $this->orderItem;}

    //sets
    function setIdOrder($id){$this->idOrder = $id;}
    function setTotalPrice($totalP){$this->totalPrice = $totalP;}
    function setWaiter($w){$this->waiter = $w;}
    function setOrderItem($idOrder, $q, $totalP, $obs, $s, $prod){
        $this->orderItem[] = new OrderItem($idOrder, $q, $totalP, $obs, $s, $prod);
    }
}






?>