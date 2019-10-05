<?php 

namespace GymGride\Controller;

class ValidController extends Controller
{
    private $name;
    private $email;
    private $password;
    private $passwordC;

    public function __construct($name, $email, $password, $passwordC)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->passwordC = $passwordC;
    }

    public function Validar()
    {
        $name = $this->name;
        $email = $this->email;
        $password = $this->password;
        $passwordC = $this->passwordC;

        try{
            if(!isset($passwordC)){
                if (empty($email) || (empty($password))){
                    throw new Exception('ERROR!: Dados Vazios!!<br />');
                }
            }else{
                if(isset($passwordC)){
                    if (empty($name) || (empty($email) || (empty($password)))){
                        throw new Exception('ERROR!: Dados Vazios!!<br />');
                    }
                }
            }
        }catch(Exception $g){
            echo $g->getMessage();
            die();
        }

        try{
            if(!empty($passwordC)){
                if ($password != $passwordC){
                    throw new Exception('As senhas não se corespodem!<br />');
                }
            }else{
            
            }
        }catch(Exception $g){
            echo $g->getMessage();
            die();
        }
        
        try{
            if(strstr($name, " ") || (strstr($email, " ") || (strstr($password, " ")))){
                throw new Exception('nome , email e senha não podem conter espaço!<br />');
            }else{
            
            }
        }catch(Exception $g){
            echo $g->getMessage();
            die();
        }
    
        try{
            if(is_numeric($name)){
                throw new Exception('nome tem que ser do tipo caractere!<br />');
            }else{
                
            }
        }catch(Exception $g){
            echo $g->getMessage();
            die();
        }
    
        try{
            if(strlen($name) > 10){
                throw new Exception('nome não pode ter comprimento maior que 10 caracteres!<br />');
            }else{
            
            }
        }catch(Exception $g){
            echo $g->getMessage();
            die();
        }
    
        try{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                throw new Exception('Email não é valido!<br />');
            }else{
            
            }
        }catch(Exception $g){
            echo $g->getMessage();
            die();
        }
    
        try{
            if(strlen($password) > 15){
                throw new Exception('Senha não pode ter comprimento maior que 15 caracteres!<br />');
            }else{
            
            }
        }catch(Exception $g){
            echo $g->getMessage();
            die();
        }
    }
}