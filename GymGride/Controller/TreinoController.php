<?php
    namespace GymGride\Controller;
    use GymGride\Controller\Controller;
    use GymGride\Model\Model;

    Class TreinoController extends Controller{
        private $dados;

        public function index()
        {
            $this->allPost = $this->getPost();            
            $m = new Treino();
            $m->getAll("treino", "*", "user = $this->allPost['str_login']");
            
            
        }
    }
