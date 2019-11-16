<?php
    namespace GymGride\Controller;
    use GymGride\Controller\Controller;
    use GymGride\Model\Treino;
    use GymGride\View\TreinoView;
    use GymGride\Controller\UserController;
    use GymGride\Controller\SessionController;

    Class TreinoController extends Controller{

        public function Dados(){
            
            $regenerate = new SessionController;

            $session = new UserController;
            $session->pagsave();

            $treino = new Treino;
            $array = $treino->getDados();

            if ($array != false){
                $v = new TreinoView();
                $file = $v->render('item', 'list');
                $html = $v->replace($file, $array);
            
                print_r($html);
                $this->ver($_SESSION);
            }else {
                echo 'Treino Nao Encontrado';
                $treino->setDefault();
            }
            
        }
       
    }
