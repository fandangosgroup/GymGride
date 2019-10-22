<?php
    namespace GymGride\Controller;
    use GymGride\Controller\Controller;
    use GymGride\Model\Treino;
    use GymGride\View\TreinoView;

    Class TreinoController extends Controller{


        public function getDados()
        {   
            //$this->ver($_SESSION);
       
            $m = new Treino();
            $array = $m->getAll('Serie', '*', "ID_serie = '" . $_SESSION["int_id"] . "'");
            
            $v = new TreinoView();
            $file = $v->render('item', 'list');
            $html = $v->replace($file, $array);
            
            print_r($html);
            $this->ver($_SESSION);
        }
    }
