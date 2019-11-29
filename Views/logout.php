<?php

    require_once "../Models/UserDAO.php";

    UserDAO::logout();
    header("Location: login.php");

?>