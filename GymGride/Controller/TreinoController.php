<?php
    namespace GymGride\Controller;
    use GymGride\Controller\Controller;
    use GymGride\Model\Treino;
    use GymGride\View\TreinoView;
    use GymGride\Controller\UserController;
    use GymGride\Controller\SessionController;

    Class TreinoController extends Controller{

        //Pega os treino encontrados no banco e imprimi na tela o resultado, se não existir ele tenta setar
        //uma serie default
        public function Dados(){
            
            $regenerate = new SessionController;

            $session = new UserController;
            $session->pagsave();

            $treino = new Treino;
            $array = $treino->getDados();

            if ($array != false){
                $v = new TreinoView();
                //$file = $v->render('item', 'list');
                //$html = $v->replace($file, $array);

                $v->mostrar('list', 'php', $array);
            
                //print_r($html);

            }else {
                echo 'Treino Nao Encontrado';
                $treino->setDefault();
            }
            
        }
       
    }
