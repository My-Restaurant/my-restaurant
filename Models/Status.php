<?php

class Status{

    private $idStatus;
    private $descriptive;

    function __construct($id, $desc){

        $this->idStatus = $id;
        $this->descriptive = $desc;
    }

    //gets
    function getIdStatus(){return $this->idStatus;}
    function getDescriptive(){return $this->descriptive;}

    //sets
    function setIdStatus($id){$this->idStatus = $id;}
    function setDescriptive($desc){$this->descriptive = $desc;}
}




?>