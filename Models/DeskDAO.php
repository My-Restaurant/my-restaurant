<?php

require_once "Sql.php";
require_once "Desk.php";

class DeskDAO{

    public function allDesks(){

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_desk");
        $sql->close();
        return $result;

    }
    
    public function insertDesk($desk){
        $sql = new Sql();
        $sql->query("INSERT INTO tb_desk (descriptive) VALUES(:desc)", 
        [":desc" => $desk->getDescriptive()]);
        $sql->close();
        return true;
    }

    public function oneDesk($desk){
        $sql = new Sql();
        $result = $sql->select("SELECT descriptive FROM tb_desk WHERE idDesk = :id",
        [":id" => $desk->getIdDesk()]);
        $sql->close();
        return $result;
    }

    public function updateDesk($desk){
        $sql = new Sql();
        $sql->query("UPDATE tb_desk SET descriptive = :desc WHERE idDesk = :id", 
        [   ":desc" => $desk->getDescriptive(),
            ":id" => $desk->getIdDesk()]);
        $sql->close();
        return true;
    }

    public function deleteDesk($desk){
        $sql = new Sql();
        $sql->query("DELETE FROM tb_desk WHERE idDesk = :id",
        [":id" => $desk->getIdDesk()]);
        $sql->close();
        return true;
    }

    public function showDeskWithOpenOrders(){
        $sql = new Sql();
        try {
            
            $ret = $sql->select("SELECT * FROM tb_desk
            WHERE idDesk IN (SELECT idDesk FROM tb_orders WHERE idStatus = 1)");

            return $ret;
            


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}





?>