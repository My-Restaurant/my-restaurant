<?php 

    session_start();

    require_once "../Models/Waiter.php";
    require_once "../Models/WaiterDAO.php";

    $waiter = new Waiter(null, null, null, null, null, null, "vini@gmail.com", "gabriel");

    $waiterDAO = new WaiterDAO();
    $waiterDAO->login($waiter);

    var_dump($_SESSION);

?>