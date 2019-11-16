<?php
namespace GymGride\Controller;
use GymGride\Controller\Controller;
use GymGride\Model\ConfigModel;
use GymGride\View\ConfigView;

class ConfigController extends Controller 
{
    public function ViewConfig()
    {
        $regenerate = new SessionController;
        
        $ViewModel = new ConfigModel;
        $data = $ViewModel->getData();
        
        $_SESSION['User_Name'] = $data[0]['Nome'];

        $ViewConfig = new ConfigView;
        $ViewConfig->MostrarConfig($data);
    }

    public function UpdateConfig()
    {
        $regenerate = new SessionController;
        
        $post = $this->getPost();
        $this->clearHTML($post);

        $Model = new ConfigModel;
        $Model->setData($post);
    }
}