<?php

namespace GymGride\Controller;
use GymGride\Controller\Controller;

class MethodController extends Controller
{
    public function MethodController($m)
    {
        if ($m == 'login')
        {
			$mth = new UserController();
			$mth->login();
        }

        if ($m == 'cadastro')
        {
			$mth = new UserController();
			$mth->cadastro();
        }

        if ($m == 'treino'){
            $mth = new TreinoController();
            $mth->Dados();
        }

        if ($m == 'Logout'){
            $Session = new SessionController();
            $Session->logout();
            header("refresh: 0");
            header("Location: /");
        }
    }   

}