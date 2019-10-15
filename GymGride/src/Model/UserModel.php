<?php

namespace GymGride\Model;

use GymGride\Model\Model;

class UserModel extends Model
{
    public function login($email, $senha)
    {
        $stmt = $this->getAll('usuarios', 'id, nivel, nome, token', "email = '$email' and senha = SHA1($senha)");
    
        $num = $stmt->rowCount();
        
        if($num == 1){
            $resultado = $this->getResult($stmt);
            $this->setToken($resultado);
   
        }else{
            return false;
        }
    }

    public function setToken($dados)
    {
        $token = "";
        for ($i=0 ; $i < 8; $i++){ 
            $token .= random(1, 99999);
        }
        $token = MD5($token);
        $token .= MD5($dados[0]['nome']);
        $token .= MD5($dados[0]['id']);
        $token .= MD5(date('h-i-s'));
        $_SESSION['token'] = $token;
        $this->dbInsert("usuarios", "token", $token);
    }

    public function getToken()
    {
        $dados = $this->getAll('usuarios', 'token', "token = '$_SESSION[token]'");
        if (!empty($dados['token'])){
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
            
            $colunas = array('ID', 'nome', 'CPF', 'email', 'senha', 'numero', 'ativo', 'nivel', 'cadastro');
            $valores = array('NULL', "$name", "$CPF", "$email", SHA1($password), "$tell", 1, 1, 'NOW()');
            $this->dbInsert('Usuarios', $colunas, $valores);
            $ok = 1;
        }
    
        if($res){
            $ok = 0;
            echo 'Erro!! Usuario ja cadastrado!';
        }
        
        return $ok;
    }
}