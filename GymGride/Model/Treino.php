<?php

    namespace GymGride\Model;    
    use GymGride\Model\Model;
    
    Class Treino extends Model{

        public function getDados()
        {   
            //$this->ver($_SESSION);
       
            
            $stmt = $this->getAll('Series', '*', "ID_serie = '" . $_SESSION["UsuarioID"] . "'");
            
            $num = $stmt->rowCount();
            if ($num == 1){
                $array = $this->getResult($stmt); 
                return $array;
            }else {
                return false;
            }
            
        }
    }