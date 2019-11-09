<?php
namespace GymGride\View;
use GymGride\View\View;

class ConfigView extends View
{
    public function MostrarConfig($data)
    {
        
        $dados['User_pass'] = $data[0]['Senha'];
        $dados['User_tel'] = $data[0]['Telefone'];
        $dados['User_CPF'] = $data[0]['CPF'];
        $this->mostrar('Config', 'php', $dados);
    }
}