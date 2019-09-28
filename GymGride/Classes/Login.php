<?php
include_once "Usuario.php";

class Login extends Usuario {
    
    public function efetuar_login(){
        $PDO = new DbGerenciador;
        $con = $PDO->db_connect();
        $stmt = $PDO->db_select($con,$this->email,$this->password);
        $num = $PDO->db_check($stmt);

        if($num == 0){
            echo 'Usuario Invalido';
            $ok = 0;
        }
    
        if($num == 1){
            $ok = 1;
            $resultado = $PDO->db_session($stmt);
            echo 'Usuario Valido!';
            print_r($resultado);
        }
        
        return $ok;
    }
}