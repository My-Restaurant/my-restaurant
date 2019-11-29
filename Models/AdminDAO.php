<?php 

    !isset($_SESSION) ? session_start() : null;
    require_once "Admin.php";
    require_once "Sql.php";

    class AdminDAO{

        public function show(){
            $sql = new Sql();
            $result = $sql->select("SELECT * FROM tb_users");
            $sql->close();
            return $result;
        }

        public function index($id){
            $sql = new Sql();
            $result = $sql->select("SELECT * FROM tb_users WHERE idUser = :id", [":id"=>$id]);
            $sql->close();
            return $result[0];
        }

        public function insert($admin){

            $sql = new Sql();
            $sql->query("INSERT INTO tb_users (username, cpf, usertype, email, passwd) 
            values(:name, :cpf, :type, :email, :passwd)", 
            [
                ":name"=> $admin->getUsername(),
                ":cpf"=> $admin->getCpf(),
                ":type"=> $admin->getUsertype(),
                ":email"=> $admin->getEmail(),
                ":passwd"=> $admin->generatePasswdHash($admin->getPasswd())
            ]);
            $sql->close();

            return true;

        }
     
        public function getByEmail($email){

            $sql = new Sql();

            $result = $sql->select("SELECT * FROM tb_users WHERE email = :email", [
                ":email"=> $email 
            ]);

            if(count($result) > 0){
                return $result[0];
            } else {
                return false;
            }

        }

    }

?>