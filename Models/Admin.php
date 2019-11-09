<?php

require_once "User.php";

class Admin extends User{

    function __construct($idUser = null, $name = "", $cpf = "", $usertype = "", $email = "", $password = ""){

        parent:: __construct($idUser, $name, $cpf, $usertype, $email, $password);


    }

}





?>