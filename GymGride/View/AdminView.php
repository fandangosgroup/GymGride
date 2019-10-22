<?php

namespace GymGride\View;
use GymGride\View\View;

class AdminView extends View 
{
    public function Adminrender($dados, $num)
    {
        $file1 = 'item';
        $file2 = 'list';
        
        $files = $this->render($file1, $file2);
        
        $values = $dados;
      
        $html = $this->replace($files, $values, $num);

        echo($html);
    }
}