<?php
namespace GymGride\Controller;
use GymGride\Model\Model;
use GymGride\Controller\Usuario;

class CadastroController extends Usuario{

    private $CPF;
    private $Foto;

    public function efetuar_cadastro($email, $name, $CPF, $password, $tell){
        $PDO = new Model();
        // $email = $this->email;
        // $password = $this->password;

        $stmt = $PDO->getAll('Usuarios', 'id, nivel, ativo', "email = '$email' and senha = SHA1($password)");
        //$num = $PDO->dbCheck($stmt);
        $num = $stmt;
        echo "$num";
        
        if($num == 0){
            
            $colunas = array('ID', 'nome', 'CPF', 'email', 'senha', 'numero', 'ativo', 'nivel', 'cadastro');
            $valores = array('NULL', "$name", "$CPF", "$email", SHA1($password), "$tell", 1, 1, 'NOW()');
            $PDO->dbInsert('Usuarios', $colunas, $valores);
            $ok = 1;
        }
    
        if($num == 1){
            $ok = 0;
            echo 'Erro!! Usuario ja cadastrado!';
        }
        
        return $ok;
    }
}