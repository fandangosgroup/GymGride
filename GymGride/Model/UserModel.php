<?php

namespace GymGride\Model;

use GymGride\Model\Model;

class UserModel extends Model
{
    public function login($email, $senha)
    {
        $stmt = $this->getAll('Usuarios', 'ID_User, Nome, Nivel', "Email = '$email' and Senha = SHA1($senha)");
    
        $num = $stmt->rowCount();
        
        if($num == 1){
            $resultado = $this->getResult($stmt);
            $this->setToken($resultado);
            
            $bool = $this->getToken();
            if ($bool){
                echo 'token correto';
                $_SESSION['str_nome'] = $resultado[0]['Nome'];
                $_SESSION['int_id'] = $resultado[0]['ID_User'];
                $_SESSION['int_nivel'] = $resultado[0]['Nivel'];
                $this->getNivel();
                //print_r($_SESSION);
            }else {
                echo 'token errado!';
            }
            return true;

        }else{
            return false;
        }
    }
    
    public function cadastrar($name, $email, $password, $passwordC, $CPF, $tell)
    {
        // $email = $this->email;
        // $password = $this->password;

        $stmt = $this->login($email, $password);
        //$num = $PDO->dbCheck($stmt);
        $res = $stmt;
        //print_r($res);
        
        if ($res == false){
            echo "res é falso";
        }

        if($res == false){
            
            $colunas = array('ID_User', 'Nome', 'Email', 'Senha', 'CPF', 'Telefone', 'Nivel', 'Ativo', 'Dta_Cadastro');
            $valores = array('NULL', "$name", "$email", SHA1($password), "$CPF", "$tell", 1, 1, 'NOW()');
            $this->dbInsert('Usuarios', $colunas, $valores);
            $ok = 1;
        }
    
        if($res){
            $ok = 0;
            echo 'Erro!! Usuario ja cadastrado!';
        }
        
        return $ok;
    }

    public function setToken($dados)
    {
        $token = "";
        for ($i=0 ; $i < 8; $i++){ 
            $token .= rand(1, 99999);
        }
        $token = MD5($token);
        $token .= MD5($dados[0]['Nome']);
        $token .= MD5($dados[0]['ID_User']);
        $token .= MD5(date('h-i-s'));
        $_SESSION['token'] = $token;
        $id = $dados[0]['ID_User'];
        $this->update('Usuarios','token' ,"'$token'" ,"ID_User = $id");
        //print_r($token);
    }

    public function getToken()
    {
        $stmt = $this->getAll('usuarios', 'token', "token = '$_SESSION[token]'");
        //print_r($stmt);
        $num = $stmt->rowCount();

        if ($num == 1){
            return true;
        }else{
            return false;
        }
    }

    public function getNivel()
    {
        $stmt = $this->getAll('Usuarios', 'Nivel', "Token = '$_SESSION[token]' and Nivel = '$_SESSION[int_nivel]'");
        //print_r($stmt);
        //$this->ver($_SESSION);
        $num = $stmt->rowCount();

        if ($num == 1){
            echo 'Nivel Compativel';
            return true;
        }else{
            echo 'Nivel Incompativel';
            return false;
        }
    }
}