<?php 

    require_once "../Models/AdminDAO.php";

    $adminDAO = new AdminDAO();

    var_dump($adminDAO->show());

?>