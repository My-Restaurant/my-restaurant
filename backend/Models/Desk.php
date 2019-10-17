<?php

class Desk{

    private $idDesk;
    private $descriptive;

    function __construct($id, $des){

        $this->idDesk = $id;
        $this->descriptive = $des;

    }

    //gets
    function getIdTable(){return $this->idDesk;}
    function getDesTable(){return $this->descriptive;}

    //sets
    function setIdTable($id){$this->idDesk = $id;}
    function setDesTable($des){$this->descriptive = $des;}

}






?>