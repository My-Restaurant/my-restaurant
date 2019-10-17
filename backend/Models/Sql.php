<?php

    class Sql{

        private $conn;

        const HOST = "127.0.0.1";
        const USER = "root";
        const PASSWORD = "102030";
        const DBNAME = "db_myRestaurant;charset=utf8";

        function __construct(){

            try{
                $this->conn = new \PDO('mysql:host='.Sql::HOST.';dbname='.Sql::DBNAME, Sql::USER, Sql::PASSWORD);
                $this->conn->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(\Exception $e){
                die($e->getMessage());
            }

        }

        private function bindParams($params, $stm){

            foreach ($params as $key => $value) {
                $stm->bindValue($key, $value);
            }

        }

        //Para fazer insert, delete e update. (Tudo que não retorna dado!).
        public function query($query, $params = []){

            try{
                $stm = $this->conn->prepare($query);
                $this->bindParams($params, $stm);
                $stm->execute();
            }
            catch(\Exception $e){
                die($e->getMessage());
            }

        }

        //Para fazer consultas
        public function select($query, $params = []){

            try{
                $stm = $this->conn->prepare($query);
                $this->bindParams($params, $stm);
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(\Exception $e){
                die($e->getMessage());
            }

        }

    }

?>