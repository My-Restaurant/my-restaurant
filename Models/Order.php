<?php

require_once "OrderItem.php";

class Order{

    private $idOrder;
    private $totalPrice;
    private $waiter;
    private $desk;
    private $status;
    private $orderItem;
    

    function __construct($id = null, $total = null, $w = null, $desk = null, $s = null, $idOrder = null, $q = null, $totalP = null, $obs = null, $prod = null){

        $this->idOrder = $id;
        $this->totalPrice = $total;
        $this->waiter = $w;
        $this->desk = $desk;
        $this->status = $s;
        $this->orderItem[] = new OrderItem($idOrder, $q, $totalP, $obs, $prod, $this->idOrder);
        
    }

    //gets
    function getIdOrder(){return $this->idOrder;}
    function getTotalPrice(){return $this->totalPrice;}
    function getWaiter(){return $this->waiter;}
    function getDesk(){return $this->desk;}
    function getStatus(){return $this->status;}
    function getOrderItem(){return $this->orderItem;}

    //sets
    function setIdOrder($id){$this->idOrder = $id;}
    function setTotalPrice($totalP){$this->totalPrice = $totalP;}
    function setWaiter($w){$this->waiter = $w;}
    function setStatus($s){$this->status = $s;}
    function setOrderItem($id, $q, $totalP, $obs, $prod){
        $this->orderItem[] = new OrderItem($id, $q, $totalP, $obs, $prod, $this->idOrder);
    }
}






?>