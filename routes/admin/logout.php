<?php 

    require_once "../../config/Utils.php";

    //Limpa a variavel de sessão
    Utils::destroySess($_SESSION["userData"]);

    var_dump($_SESSION);

?>