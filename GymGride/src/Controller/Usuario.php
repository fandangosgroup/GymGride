<?php
namespace GymGride\Controller;

abstract class Usuario{
    private $name;
    private $email;
    private $password;

    function __set($classname, $value)
    {
        if ($classname == "name"){
            $this->name = $value;
        }
        if ($classname == "email"){
            $this->email = $value;
        }
        if ($classname == "password"){
            $this->password = $value;
        }       
    }

    function __get($classname)
    {
        switch ($classname) {
            case 'name':
                return $this->name;
                break;
            case 'email':
                return $this->email;
                break;
            case 'password':
                return $this->password;
            default:
                die();
                break;
        }
    }
}

