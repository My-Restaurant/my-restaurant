
<?php 

    class Utils{

        public static function toJSON($data = []){
            header("Content-Type: application/json");
            return json_encode($data);
        }

        //Verifica se há informações nulas em um array
        public static function ifNull($data = []){

            $newData = [];

            foreach ($data as $key => $value) {
                if($data[$key] !== null || $data[$key] !== "") array_push($newData, $data);
            }

            if(count($newData) === count($data)){
                return $newData;
            } else {
                return false;
            }

        }

        public static function startSess(){
            session_start();
        }

        public static function destroySess($session){
            unset($_SESSION["userData"]);
        }

    }

?>