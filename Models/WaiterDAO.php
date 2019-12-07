<?php 

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

            try {
                $result = $sql->select("CALL sp_waiter_store(:nome, :cpf, :email, :pass, :comm)", [
                    ":nome"=> $waiter->getUsername(),
                    ":cpf"=> $waiter->getCpf(),
                    ":email"=> $waiter->getEmail(),
                    ":pass"=> $waiter->generatePasswdHash($waiter->getPasswd()),
                    ":comm"=> $waiter->getCommission()
                ]);
                $sql->close();
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
            
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

        public static function countWaiters(){

            $sql = new Sql();
    
            try {
    
                $result = $sql->select("
                    SELECT COUNT(idWaiter) 'total' FROM tb_waiters 
                ");
    
                if(count($result) > 0){
                    return $result[0];
                } else {
                    return false;
                }
    
            } catch (Exception $e) {
                die($e->getMessage());
            }
    
        }

    }

?>