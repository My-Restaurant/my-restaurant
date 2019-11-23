<?php 

    !isset($_SESSION) ? session_start() : null;
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

        public function login($waiter){

            $sql = new Sql();
            $result = $sql->select("SELECT * FROM tb_waiters w
            INNER JOIN tb_users u USING(idUser)
            WHERE u.email = :email", [
                ":email"=> $waiter->getEmail()
            ]);
            $sql->close();
            
            if(count($result) > 0){
                //compara a senha enviada pelo usuario com o hash do banco de dados
                if(password_verify($waiter->getPasswd(), $result[0]->passwd)){

                    $_SESSION["userData"] = $result[0];

                    return true;

                } else {
                    return false;
                }

            } else {    
                return false;
            }

        }

        public static function logout(){
            unset($_SESSION["userData"]);
        }

        public static function verifyLogin(){

            if (!$_SESSION["userData"] || !isset($_SESSION["userData"])) {
                header("Location: login.php");
            }

        }

    }

?>