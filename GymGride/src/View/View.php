<?php

namespace GymGride\View;

abstract class View 
{
    public function mostrar($name)
    {
         header("location: /GymGride/src/View/$name.html");
    }
    public function goIndex(){
    	header("location: /GymGride/src/View/index.html");
    }

    public function render($arquivo1, $arquivo2)
    {
        $file1 = file_get_contents("GymGride/src/View/content/$arquivo1.html");
        $file2 = file_get_contents("GymGride/src/View/$arquivo2.html");

        $array[0] = $file1;
        $array[1] = $file2;

        return $array;
    }

    public function replace($files, $values)
    {
        $file1 = $files[0];
        $file2 = $files[1];
        $items = '';
        $x = 0;
        
        foreach ($values as $key => $value) {
            $allValues[$key] = $value;
            $x++;
            $file1 = str_replace(" { $key } ", $allValues[$key], $file1);
            //var_dump($key);
            //print_r($file1);
            $items = $file1;
        }
        //print_r($allValues);
        //print_r($x);
        $y = 0;
        
        
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