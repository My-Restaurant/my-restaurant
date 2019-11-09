<?php


require_once "User.php";

class Waiter extends User{

    private $idWaiter;
    private $commission;

    function __construct($id = null, $commission = 0.0, $idUser = null, $name = "", $cpf = "", $usertype = "", $email = "", $password = ""){

        parent::__construct($idUser, $name, $cpf, $usertype, $email, $password);
        $this->idWaiter = $id;
        $this->commission = $commission;
    }

    //gets
    function getIdWaiter(){return $this->idWaiter;}
    function getCommission(){return $this->commission;}

    //sets
    function setIdWaiter($id){$this->idWaiter = $id;}
    function setCommission($commission){$this->commission = $commission;}

}







?>