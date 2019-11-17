<?php 

namespace GymGride\Controller;

class ValidController extends Controller
{
    private $name;
    private $email;
    private $password;
    private $passwordC;
    private $CPF;

    //Construct recebe os campos e valida CPF.
    public function __construct($name, $email, $password, $passwordC, $CPF)
    {
        $this->name = $name;
        $this->email = $email;
        
        if($this->validaCPF($CPF))
        {
            $this->CPF = $CPF;
        }else {
            die('CPF Invalido!');
        }

        $this->password = $password;
        $this->passwordC = $passwordC;
    }

    //Valida os campos
    public function Validar()
    {
        $name = $this->name;
        $email = $this->email;
        $password = $this->password;
        $passwordC = $this->passwordC;

        try{
            if(!isset($passwordC)){
                if (empty($email) || (empty($password))){
                    $array[0] = 1;
                    $array[1] = 2;

                    return $array;
                    throw new \Exception('ERROR!: Dados Vazios!!<br />');
                }
            }else{
                if(isset($passwordC)){
                    if (empty($name) || (empty($email) || (empty($password)))){
                        $array[0] = 1;
                        $array[1] = 2;

                        return $array;
                        throw new \Exception('ERROR!: Dados Vazios!!<br />');
                    }
                }
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }

        try{
            if(!empty($passwordC)){
                if ($password != $passwordC){
                    $array[0] = 1;
                    $array[1] = 3;

                    return $array;
                    throw new \Exception('As senhas não se corespodem!<br />');
                }
            }else{
            
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }
        
        try{
            if(strstr($name, " ") || (strstr($email, " ") || (strstr($password, " ")))){
                $array[0] = 1;
                $array[1] = 4;

                return $array;
                throw new \Exception('nome , email e senha não podem conter espaço!<br />');
            }else{
            
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }
    
        try{
            if(is_numeric($name)){
                $array[0] = 1;
                $array[1] = 5;

                return $array;
                throw new \Exception('nome tem que ser do tipo caractere!<br />');
                
            }else{
                
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }
    
        try{
            if(strlen($name) > 10){
                $array[0] = 1;
                $array[1] = 6;

                return $array;
                throw new \Exception('nome não pode ter comprimento maior que 10 caracteres!<br />');
            }else{
            
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }
    
        try{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $array[0] = 1;
                $array[1] = 7;

                return $array;
                throw new \Exception('Email não é valido!<br />');
            }else{
            
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }
    
        try{
            if(strlen($password) > 15){
                $array[0] = 1;
                $array[1] = 8;

                return $array;
                throw new \Exception('Senha não pode ter comprimento maior que 15 caracteres!<br />');
            }else{
            
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }

    }

    public function validaLogin(){
        $email = $this->email;
        $password = $this->password;
        $name = $this->name;
     
        try{
            if(!isset($passwordC)){
                if (empty($email) || (empty($password))){
                    $array[0] = 1;
                    $array[1] = 2;

                    return $array;
                    throw new \Exception('ERROR!: Dados Vazios!!<br />');
                }
            }else{
                if(isset($passwordC)){
                    if (empty($name) || (empty($email) || (empty($password)))){
                        $array[0] = 1;
                        $array[1] = 2;

                        return $array;
                        throw new \Exception('ERROR!: Dados Vazios!!<br />');
                    }
                }
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }
        
        try{
            if(strstr($name, " ") || (strstr($email, " ") || (strstr($password, " ")))){
                $array[0] = 1;
                $array[1] = 4;

                return $array;
                throw new \Exception('nome , email e senha não podem conter espaço!<br />');
            }else{
            
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }
    
        try{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $array[0] = 1;
                $array[1] = 7;

                return $array;
                throw new \Exception('Email não é valido!<br />');
            }else{
            
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }
    
        try{
            if(strlen($password) > 15){
                $array[0] = 1;
                $array[1] = 8;

                return $array;
                throw new \Exception('Senha não pode ter comprimento maior que 15 caracteres!<br />');
            }else{
            
            }
        }catch(\Exception $g){
            echo $g->getMessage();
            die();
        }

    }

    //Valida CPF
    public function validaCPF($cpf)
    {

        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        if (strlen($cpf) != 11) {
            return false;
        } else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999')
            {
                return false;
            } else {
                $val1= $cpf[0] * 10 + $cpf[1] * 9 + $cpf[2] * 8 + $cpf[3] * 7 + $cpf[4] * 6 + $cpf[5] * 5 + $cpf[6] * 4 + $cpf[7] * 3 + $cpf[8] * 2;
                //print_r($val1);
                $val1 = $val1 * 10 % 11;
                //print_r($val1);
                

                $val2= $cpf[0] * 11 + $cpf[1] * 10 + $cpf[2] * 9 + $cpf[3] * 8 + $cpf[4] * 7 + $cpf[5] * 6 + $cpf[6] * 5 + $cpf[7] * 4 + $cpf[8] * 3 + $cpf[9] * 2;
                
                $val2 = $val2 * 10 % 11;
                
                //print_r($val1);
                //print_r($cpf[9]);
                if ($val1 == $cpf[9])
                {
                    //print_r("VAL1 É TRUE");
                    $val1 = true;
                }else{
                    //print_r("VAL1 É FALSE");
                    $val1 = false;
                }

                if ($val2 == $cpf[10])
                {
                    $val2 = true;
                }else {
                    $val2 = false;
                }

                if ($val1 == true && $val2 == true)
                {
                    //print_r("PASSEI NA CONDIÇAO");
                    return true;
                }else {
                    return false;
                }

            
            }
    }
}