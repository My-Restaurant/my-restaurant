<?php

    require_once "../Models/WaiterDAO.php";

    WaiterDAO::logout();
    header("Location: login.php");

?>