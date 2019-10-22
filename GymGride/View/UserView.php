<?php
namespace GymGride\View;
use GymGride\View\View;

class UserView extends View {
    
    public function Login(){
        header("Location: /Dashboard");
    }

    public function Cadastro(){
        $this->mostrar('csucesso');
    }
   
}