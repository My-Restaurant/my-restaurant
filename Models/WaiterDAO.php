<?php 

    require_once "Sql.php";
    require_once "Waiter.php";

    class WaiterDAO{

        public function allWaiters(){
            $sql = new Sql();
            $result = $sql->select("SELECT * FROM tb_waiters");
            $sql->close();
            return $result;
        }

        public function insertWaiter($waiter){
            $sql = new Sql();
            $sql->query(""); //procedure
            $sql->close();
            return true;
        }

        public function oneWaiter($waiter){
            $sql = new Sql();
            $result = $sql->select("SELECT * FROM tb_waiters WHERE idWaiter = :id", [
                ":id"=> $getIdWaiter->getId()
            ]);
            $sql->close();
            return $result[0];
        }
        
        public function updateWaiter($waiter){
            $sql = new Sql();
            $sql->query(""); //procedure
            $sql->close();
            return true;
        }

        public function deleteWaiter($waiter){
            $sql = new Sql();
            $sql->query(""); //procedure
            $sql->close();
            return true;
        }

    }

?>