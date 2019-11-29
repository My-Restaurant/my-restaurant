<?php


class User{

    protected $idUser;
    protected $username;
    protected $cpf;
    protected $usertype;
    protected $email;
    protected $passwd;

    function __construct($id = null, $name = "", $cpf = "", $type = "", $email = "", $password = ""){

        $this->idUser = $id;
        $this->username = $name;
        $this->cpf = $cpf;
        $this->usertype = $type;
        $this->email = $email;
        $this->passwd = $password;

    }

    //gets
    function getIdUser(){return $this->idUser;}
    function getUsername(){return $this->username;}
    function getCpf(){return $this->cpf;}
    function getUsertype(){return $this->usertype;}
    function getEmail(){return $this->email;}
    function getPasswd(){return $this->passwd;}
    function getValues(){
        return [
            "idUser"=> $this->idUser,
            "username"=> $this->username,
            "cpf"=> $this->cpf,
            "usertype"=> $this->usertype,
            "email"=> $this->email,
            "passwd"=> $this->passwd
        ];
    }

    //sets
    function setIdUser($id){$this->idUser = $id;}
    function setUsername($name){$this->name = $name;}
    function setCpf($cpf){$this->cpf = $cpf;}
    function setUsertype($type){$this->usertype = $type;}
    function setEmail($email){$this->email = $email;}
    function setPasswd($password){$this->passwd = $password;}
    function setValues($data = []){
        foreach ($data as $key => $value) {
            $this->{"set".ucfirst($key)}($value);
        }
    }

    function generatePasswdHash($pass){
        return $this->passwd = password_hash($pass, PASSWORD_DEFAULT, [
            "cost"=> 12
        ]);
    }

}
?>