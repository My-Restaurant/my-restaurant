<?php 

    require_once "../../Models/Admin.php";
    require_once "../../Models/AdminDAO.php";
    require_once "../../config/Utils.php";

    if(isset($_POST)){

        $admin = new Admin();
        $admin->setValues($_POST);

        $adminDAO = new AdminDAO();

        

    }

?>