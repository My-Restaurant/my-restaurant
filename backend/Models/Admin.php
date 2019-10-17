<?php

require_once "User.php";

class Admin extends User{
    
    private $idAdmin;

    function __construct($id = null, $idUser = null, $name = "", $cpf = "", $usertype = "", $email = "", $password = ""){

        parent:: __construct($idUser, $name, $cpf, $usertype, $email, $password);

        $this->idAdmin = $id;

    }

    //get
    function getIdAdmin(){return $this->$idAdmin;}

    //set
    function setIdAdmin($id){$this->idAdmin = $id;}
}





?>