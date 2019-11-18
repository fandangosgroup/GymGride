<?php
namespace GymGride\Controller;
use GymGride\Controller\Controller;
use GymGride\View\TreinoView;
use GymGride\Model\Treino;

class PersonalController extends Controller {
    public function treinoForm() {
       (new TreinoView)->mostrar("TreinoForm");
    }

    public function serieForm(){

        $dados = (new Treino)->getAll("exercicios", "Nome, ID_Exercicio");
        $dados = (new Treino)->getResult($dados);
        (new TreinoView)->mostrar("serieForm", "php", $dados);

    }

    public function submitTreino(){
        $dados = [];
        $colunas = [];
        $nome = $this->getPost();
        
        $dados[] = $nome['name']; 
        $dados[] = $_SESSION['User_Name'];
        $dados[] =  gmdate("Y-m-d", $_SESSION['Tempo']);

        $colunas[] = 'Nome';
        $colunas[] = 'Responsavel';
        $colunas[] = 'Dta_Registro';

        (new Treino)->submitTreino($colunas, $dados);
    }

    public function submitSerie(){
        $post = $this->getPost();
        $dados = array();
        $colunas = ['Cod', 'ID_Exercicio', 'Num_rep', 'Carga', 'Tmp_Pausa'];
        for ($i=0; $i < count($post); $i++) { 
            if(isset($post[$i])){
                $dados[] = "'" .$post['serie']. "', '" . $i . "', '" .$post["repeticao_$i"]. "', '" .$post["carga_$i"]. "', '" .$post["pausa_$i"]. "'";
            }
        
        }
        for ($i=0; $i < count($dados); $i++) { 
            (new Treino)->dbInsert('series', $colunas, $dados[$i]);
        }
        
    }
}
