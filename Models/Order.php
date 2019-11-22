<?php

require_once "OrderItem.php";

class Order{

    private $idOrder;
    private $totalPrice;
    private $waiter;
    private $desk;
    private $status;
    private $orderItem;
    

    function __construct($id, $total, $w, $desk, $s, $idOrder, $q, $totalP, $obs, $prod){

        $this->idOrder = $id;
        $this->totalPrice = $total;
        $this->waiter = $w;
        $this->desk = $desk;
        $this->status = $s;
        $this->orderItem[] = new OrderItem($idOrder, $q, $totalP, $obs, $prod);
        
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
    function setOrderItem($idOrder, $q, $totalP, $obs, $s, $prod){
        $this->orderItem[] = new OrderItem($idOrder, $q, $totalP, $obs, $s, $prod);
    }
}






?>