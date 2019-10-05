<?php
namespace GymGride\Controller;
use GymGride\Model\DbGerenciador;

class Cadastro extends Usuario{

    public function efetuar_cadastro(){
        $PDO = new DbGerenciador();
        $con = $PDO->db_connect();
        $stmt = $PDO->db_select($con,$this->email,$this->password);
        $num = $PDO->db_check($stmt);
        
        //echo "$num";
        
        if($num == 0){
            
            $PDO->db_insert($con,$this->name,$this->email,$this->password);
            $ok = 1;
        }
    
        if($num == 1){
            $ok = 0;
            echo 'Erro!! Usuario ja cadastrado!';
        }
        
        return $ok;
    }
}