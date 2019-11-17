<?php

namespace GymGride\Model;

use GymGride\Controller\SessionController;
use GymGride\Model\Model;

class UserModel extends Model
{
    //Busca o login no banco e retorna os resultados
    public function login($email, $senha)
    {
        $stmt = $this->getAll('Usuarios', 'ID_User, Nome, Nivel, Email', "Email = '$email' and Senha = SHA1('$senha')");
    
        $num = $stmt->rowCount();
        
        if($num == 1){
            $resultado = $this->getResult($stmt); 
            return $resultado;
        }else{
            return false;
        }
    }
    
    //Busca o cadastro no banco, se ele não existir ele cria o cadastro
    public function cadastrar($name, $email, $password, $CPF, $tell)
    {
        $stmt = $this->getAll('Usuarios', 'ID_User, Nome, Nivel', "Email = '$email'");
    
        $num = $stmt->rowCount();
        
        if ($num == 1){
            $bool = true;
        }else {
            $bool = false;
        }

        $res = $bool;

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

    //Cria o Token do usuario e insere no banco
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
        
        
        $Session = new SessionController();
        $Session->setValue('User_Token',$token);
        
        
        $id = $dados[0]['ID_User'];
        $this->update('Usuarios','token' ,"'$token'" ,"ID_User = $id");
        //print_r($token);
    }

    //Valida se token da session é a mesma do banco de dados
    public function getToken()                       
    {
        $Session = new SessionController();
        $token = $Session->getValue('User_Token');
        
        $stmt = $this->getAll('usuarios', 'token', "token = '$token'");
        //print_r($stmt);
        $num = $stmt->rowCount();

        if ($num == 1){
            echo 'token valido';
            return true;
        }else{
            return false;
        }
    }

    //Valida se nivel da session é igual ao do banco
    public function getNivel()
    {
        $Session = new SessionController();
        $token = $Session->getValue('User_Token');
        $Nivel = $Session->getValue('User_Nivel');
        
        $stmt = $this->getAll('Usuarios', 'Nivel', "Token = '$token' and Nivel = '$Nivel'");
        //print_r($stmt);
        //$this->ver($_SESSION);
        $num = $stmt->rowCount();

        if ($num == 1){
            echo 'Nivel Compativel';
            return true;
        }else{
            echo 'Nivel Incompativel';
            die("Nivel Incompativel!!!");
            return false;
        }
    }
}