<?php 

    require_once "Sql.php";
    require_once "Admin.php";

    class AdminDAO{

        public function show(){
            $sql = new Sql();
            $result = $sql->select("SELECT * FROM tb_users");
            return $result;
        }

        // public function store($data = new Admin()){
        // }

    }

?>