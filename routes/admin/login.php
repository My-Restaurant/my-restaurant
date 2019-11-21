<?php 

    require_once "../../Models/Admin.php";
    require_once "../../Models/AdminDAO.php";
    require_once "../../config/Utils.php";

    Utils::startSess();

    //POST se encaixa como melhor método de envio por se tratar do cadastro de uma nova sessão
    if(isset($_POST)){

        $admin = new Admin();
        $adminDAO = new AdminDAO();

        $admin->setValues($_POST);

        $res = $adminDAO->getByEmail($admin->getEmail());

        if($res === false){
            echo Utils::toJSON(["response"=> false, "message"=> "Email não encontrado"]);
        } else {

            $admin->setValues($res);

            if(password_verify($_POST["passwd"] ,$admin->getPasswd())){

                $_SESSION["userData"] = $admin->getValues();
                echo Utils::toJSON($_SESSION["userData"]);

            } else {
                echo Utils::toJSON(["response"=> false, "message"=> "Senha incorreta"]);
            }

        }

    }

?>