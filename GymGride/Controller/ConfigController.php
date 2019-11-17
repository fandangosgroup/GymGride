<?php
namespace GymGride\Controller;
use GymGride\Controller\Controller;
use GymGride\Model\ConfigModel;
use GymGride\View\ConfigView;

class ConfigController extends Controller 
{
    //Pega todas as informaçoes do usuario e imprime na tela
    public function ViewConfig()
    {
        $regenerate = new SessionController;
        
        $ViewModel = new ConfigModel;
        $data = $ViewModel->getData();
        
        $_SESSION['User_Name'] = $data[0]['Nome'];

        $ViewConfig = new ConfigView;
        $ViewConfig->MostrarConfig($data);
    }

    //Atualiza as informaçoes do usuario.
    public function UpdateConfig()
    {
        $regenerate = new SessionController;
        
        $post = $this->getPost();
        $this->clearHTML($post);

        $Model = new ConfigModel;
        $Model->setData($post);
    }
}