<?php
namespace GymGride\View;
use GymGride\View\View;

class ConfigView extends View
{
    //Recebe os dados e imprimi na tela
    public function MostrarConfig($data)
    {
        $dados['User_Email'] = $data[0]['Email'];
        $dados['User_Name'] = $data[0]['Nome'];
        $dados['User_pass'] = $data[0]['Senha'];
        $dados['User_tell'] = $data[0]['Telefone'];
        $dados['User_CPF'] = $data[0]['CPF'];
        $this->mostrar('Config', 'php', $dados);
    }
}