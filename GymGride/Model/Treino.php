<?php

    namespace GymGride\Model;    
    use GymGride\Model\Model;
    
    Class Treino extends Model{

        public function getDados()
        {   
            //$this->ver($_SESSION);
       
            if (!isset($_SESSION)) session_start();
          
            $stmt = $this->getAll('Series', '*', "ID_Serie = '" . $_SESSION["User_ID"] . "'");
            
            $num = $stmt->rowCount();
            if ($num == 1){
                $array = $this->getResult($stmt); 
                return $array;
            }else {
                return false;
            }
            
        }

        public function setDefault()
        {
            $ID = $_SESSION['User_ID'];
            $this->update('Usuarios', 'ID_Serie', "1", "ID_User = $ID");
            
            /* $colunas = array('ID_Serie', 'ID_Exercicio', 'Cod', 'Num_rep', 'Carga', 'Tmp_Pausa', 'Ativo');
            $valores = array("$ID", "$ID", "$Cod", 15, "$CPF", "$tell", 1, 1, 'NOW()');
            $this->dbInsert('Usuarios', $colunas, $valores); */
        }
    }