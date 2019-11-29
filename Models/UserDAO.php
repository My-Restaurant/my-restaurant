<?php 

    !isset($_SESSION) ? session_start() : null;
    require_once "Sql.php";
    require_once "User.php";

    class UserDAO{

        public function login($waiter){

            $sql = new Sql();
            $result = $sql->select("SELECT * FROM tb_users 
            WHERE email = :email", [
                ":email"=> $waiter->getEmail()
            ]);
            
            if(count($result) > 0){
                //compara a senha enviada pelo usuario com o hash do banco de dados
                if(password_verify($waiter->getPasswd(), $result[0]->passwd)){

                    if($result[0]->usertype === "W"){
                        $waiterData = $sql->select("SELECT * FROM tb_waiters WHERE idUser = :id", [
                            ":id"=> $result[0]->idUser
                        ]);

                        $result[0] = (object) array_merge( (array) $result[0], (array) $waiterData[0]);

                    }

                    $sql->close();

                    $_SESSION["userData"] = $result[0];

                    return true;

                } else {
                    $sql->close();
                    return false;
                }

            } else {  
                $sql->close();  
                return false;
            }

        }

        public static function logout(){
            unset($_SESSION["userData"]);
        }

        public static function verifyLogin($isAdmin = false){

            if(!$isAdmin){
                if (!$_SESSION["userData"] || !isset($_SESSION["userData"])) {
                    header("Location: login.php");
                }   
            } else {
                if (!$_SESSION["userData"] || !isset($_SESSION["userData"]) || $_SESSION["userData"]->usertype !== "A") {
                    header("Location: ../login.php");
                } 
            }

        }
    }
?>