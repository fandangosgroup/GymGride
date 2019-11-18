<?php

namespace GymGride\Controller;

use GymGride\View\IndexView;
use GymGride\Model\Model;

class Controller {

    public $allPost;
    public $html;

    public function ver($v, $d = 1)
    {
        echo "<pre>";
        print_r($v);
        echo "</pre>";
        if ($d == 1){
        die();
        }
    }

    //Mostra um arquivo html pelo get
    public function view($p)
    {

        $view = new IndexView;
        $view->mostrar($p);
    }

    //Captura todos os posts, tornar a variavel $allPost Global.
    public function getPost()
    {
        foreach ($_POST as $key => $value) {
            $this->allPost[$key] = $value; 
        }
        $this->clearHTML($this->allPost);
        return $this->allPost;
    }

    public function trainingCrudGeneration()
    {
        $m = new Model(); // a model é abstrada, aqui vai a classe que extende a model, como vai ser outro controller
        //$user = $_SESSION['str_user'];
        $dados = $m->getAll('usuarios', '*');

        //é uma ideia para criar o html da view
        $this->html = '<tr>';
        foreach ($dados as $rows => $value) {
            $this->html .= "<td>$rows, $value</td>";
        }
        $html = $this->html .= '</tr>';
        return $html;
    }

    //Limpa codigos html e php do Post
    public function clearHTML(&$data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = strip_tags ($value);
        }
        return $data;
    }

    //Verifica se usuario tem permissão pra abrir a pagina
    function pagsave(){
        // A sessão precisa ser iniciada em cada página diferente
      if (!isset($_SESSION)) session_start();
        
      $nivel = 1;
      // Verifica se não há a variável da sessão que identifica o usuário
      if (!isset($_SESSION['User_ID']) || ($nivel != $_SESSION['User_Nivel'])) {
          // Destrói a sessão por segurança
          session_destroy();
          // Redireciona o visitante de volta pro login
          header("Location: /Invalido"); exit;
      }
    }

    //Verifica se personal tem permissão pra abrir a pagina
    function pagsavePersonal(){
        // A sessão precisa ser iniciada em cada página diferente
      if (!isset($_SESSION)) session_start();
        
      $nivel = 2;
      // Verifica se não há a variável da sessão que identifica o usuário
      if (!isset($_SESSION['User_ID']) || ($nivel != $_SESSION['User_Nivel'])) {
          // Destrói a sessão por segurança
          session_destroy();
          // Redireciona o visitante de volta pro login
          header("Location: /Invalido"); exit;
      }
    }

    //Verifica se Admin tem permissão pra abrir a pagina
    function pagsaveAdmin(){
        // A sessão precisa ser iniciada em cada página diferente
      if (!isset($_SESSION)) session_start();
        
      $nivel = 3;
      // Verifica se não há a variável da sessão que identifica o usuário
      if (!isset($_SESSION['User_ID']) || ($nivel != $_SESSION['User_Nivel'])) {
          // Destrói a sessão por segurança
          session_destroy();
          // Redireciona o visitante de volta pro login
          header("Location: /Invalido"); exit;
      }
    }



}   
