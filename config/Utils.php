
<?php 

    class Utils{

        public static function toJSON($data = []){
            header("Content-Type: application/json");
            return json_encode($data);
        }

    }

?>