<?php

require_once "OrderItem.php";

class Order{

    private $idOrder;
    private $totalPrice;
    private $waiter;
    private $desk;
    private $status;
    private $orderItem;
    private $dt_register;
    private $orderName;
    

    function __construct($idOrder = null, $total = null, $w = null, $desk = null, $s = null, $idOrderItem = null, $q = null, $totalP = null, $prod = null, $dt = null, $orderName = null){

        $this->idOrder = $idOrder;
        $this->totalPrice = $total;
        $this->waiter = $w;
        $this->desk = $desk;
        $this->status = $s;
        $this->orderItem[] = new OrderItem($idOrderItem, $q, $totalP, $prod, $this->idOrder);
        $this->dt_register = $dt;
        $this->orderName = $orderName;

    }

    //gets
    function getIdOrder(){return $this->idOrder;}
    function getTotalPrice(){return $this->totalPrice;}
    function getWaiter(){return $this->waiter;}
    function getDesk(){return $this->desk;}
    function getStatus(){return $this->status;}
    function getOrderItem(){return $this->orderItem;}
    function getDtRegister(){return $this->dt_register;}
    function getOrderName(){return $this->orderName;}

    //sets
    function setIdOrder($id){$this->idOrder = $id;}
    function setTotalPrice($totalP){$this->totalPrice = $totalP;}
    function setWaiter($w){$this->waiter = $w;}
    function setStatus($s){$this->status = $s;}
    function setOrderItem($idOrderItem, $q, $totalP, $prod){
        $this->orderItem[] = new OrderItem($idOrderItem, $q, $totalP, $prod, $this->idOrder);
    }
    function setDtRegister($dt){$this->dt_register = $dt;}
    function setOrderName($orderName){$this->orderName = $orderName;}
}






?>