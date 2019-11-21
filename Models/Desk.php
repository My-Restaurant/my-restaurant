<?php

class Desk{

    private $idDesk;
    private $descriptive;

    function __construct($id = null, $des = null){

        $this->idDesk = $id;
        $this->descriptive = $des;

    }

    //gets
    function getIdDesk(){return $this->idDesk;}
    function getDescriptive(){return $this->descriptive;}

    //sets
    function setIdDesk($id){$this->idDesk = $id;}
    function setDescriptive($des){$this->descriptive = $des;}

}






?>