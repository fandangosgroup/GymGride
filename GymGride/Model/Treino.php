<?php

    namespace GymGride\Model;    
    use GymGride\Model\Model;
    
    Class Treino extends Model{

        //Pega todas as series do banco
        public function getDados()
        {   
            //$this->ver($_SESSION);
       
            if (!isset($_SESSION)) session_start();
          

            //SELECT * FROM Usuarios U, Series S WHERE U.ID_Serie = S.Cod;

            $stmt = $this->getAll('Usuarios U,Series S, Exercicios E', 'E.Nome as ExercicioNome, S.ID_Serie, E.ID_Exercicio, S.Cod, S.Num_rep, S.Carga, S.Tmp_Pausa, S.Tmp_Pausa', "U.ID_Serie = S.Cod AND E.ID_Exercicio = S.ID_Exercicio");
            $num = $stmt->rowCount();
            
            if ($num >= 1){
                $array = $this->getResult($stmt);

                return $array;
            }else {
                return false;
            }
            
        }

        //Coloca uma serie padrão para o usuario
        public function setDefault()
        {
            $ID = $_SESSION['User_ID'];
            $this->update('Usuarios', 'ID_Serie', "'A'", "ID_User = $ID");
            
            /* $colunas = array('ID_Serie', 'ID_Exercicio', 'Cod', 'Num_rep', 'Carga', 'Tmp_Pausa', 'Ativo');
            $valores = array("$ID", "$ID", "$Cod", 15, "$CPF", "$tell", 1, 1, 'NOW()');
            $this->dbInsert('Usuarios', $colunas, $valores); */
        }

        public function submitTreino($colunas, $dados)
        {

            $this->dbInsert("exercicios", $colunas, $dados);

        }

    }