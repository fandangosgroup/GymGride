<?php

namespace GymGride\View;

abstract class View 
{
    //Mostra um arquivo HTML ou PHP contendo ou não dados, por padrão ela abre o index
    public function mostrar($name = 'index', $type = 'html', $dados = 0)
    {

        if($dados){
           require "GymGride/View/$name.$type";
        }else {
            $file2 = file_get_contents("GymGride/View/$name.$type");
            echo($file2);
        }
    }

    //Seleciona 2 arquivos da View e Content e retorna um array com os 2 files
    public function render($arquivo1, $arquivo2)
    {
        if(!empty($arquivo1)){
            $file1 = file_get_contents("GymGride/View/content/$arquivo1.html");
        }else{
            $file1 = '';
        }
        
        $file2 = file_get_contents("GymGride/View/$arquivo2.html");

        $array[0] = $file1;
        $array[1] = $file2;

        return $array;
    }

    //Recebe 2 Files e um array do banco, e retorna um HTML com os dados.
    public function replace($files, $values, $num = 1)
    {
        $file1 = $files[0];
        $file2 = $files[1];
        $items = '';
        $x = 0;
        $z = 0;
        $h = 0;
        //$count = 0;

        // foreach ($values as $key => $value) {
        //     $count = count($values, 1);
        //     print_r($count);
        //     echo "<pre>";
        //     print_r($values);
        //     echo "<pre>";
        // }

        //print_r($count);

        if(empty($file1)){
            while($h < $num){
                $y = 0;
                $x = 0;
                $file1 = $files[1];
                while ($y <= 1){
              
                $file1 = str_replace(" { $x } ", $values[$z][$x], $file1);
                
                $y++;
                $x++;
                }
    
                $z = $z + 1;
               
                
                $items = $file1;
                
                $h = $h + 1;
                //$file2 = str_replace('{items}', $items, $file2);
                return $items;
            }
        }else {
            while($h < $num){
             
                $y = 0;
                $x = 0;
                $file1 = $files[0];
                while ($y <= 13){
                
                $file1 = str_replace(" { $x } ", $values[$z][$x], $file1);
            
                $y++;
                $x++;
                }
    
    
                $z = $z + 1;
                // foreach ($values[$x] as $key => $value) {
                //     $allValues[$key] = $value;
                //     $x++;
                //     print_r($key);
                //     $file1 = str_replace(" { $key } ", $allValues[$key], $file1);
                //     //var_dump($key);
                //     //print_r($file1);
                //     $items = $file1;
                // }
            
                
                $items .= $file1;
                
                $h = $h + 1;
            }
            
            
            // //while ($y < $x){
            //     $file1 = str_replace(" {$key} ", $allValues[$key], $file1);
    
            //     $items.= $file1;
            //     $y++;
            // //}
            $file2 = str_replace('{items}', $items, $file2);
            //print_r($file2);
            return $file2;
        }
        
    }

    public function ver($v){
        echo "<pre>";
        print_r($v);
        echo "</pre>";
        die();
    }
}