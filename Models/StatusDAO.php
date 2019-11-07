<?php

require_once "Sql.php";
require_once "Status.php";

class StatusDAO{

    public function allStatus(){
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_status");
        $sql->close();
        return $result;
    }

    public function insertStatus($status){
        $sql = new Sql();
        $sql->query("INSERT INTO tb_status(descriptive) VALUES(:desc)", 
        [":desc" => $status->getDescriptive()]);
        $sql->close();
        return true;
    }

    public function oneStatus($status){
        $sql = new Sql();
        $result = $sql->select("SELECT descriptive FROM tb_status WHERE idStatus = :id",
        [":id" => $status->getIdStatus()]);
        $sql->close();
        return $result;
    }

    public function updateStatus($status){
        $sql = new Sql();
        $sql->query("UPDATE tb_status SET descriptive = :desc WHERE idStatus = :id",
        [":desc" => $status->getDescriptive(),
         ":id" => $status->getIdStatus()]);
        $sql->close();
        return true;
    }

    public function deleteStatus($status){
        $sql = new Sql();
        $sql->query("DELETE FROM tb_status WHERE idStatus = :id",
        [":id" => $status->getIdStatus()]);
        $sql->close();
        return true;
    }

}




?>