<?php
namespace GymGride\View;
use GymGride\View\View;

class UserView extends View {
    
    //Mostra tela apos login
    public function Login(){
        header("Location: /Dashboard");
    }

    //Mostra tela apos Cadastro
    public function Cadastro(){
        header("Location: /?alert=1#paralogin");
    }
   
}