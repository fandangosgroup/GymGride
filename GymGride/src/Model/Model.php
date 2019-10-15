<?php

namespace GymGride\Model;

    //Critical section dont touch!!!

class Model {
        
    private $hostname = 'us-cdbr-iron-east-05.cleardb.net';
    private $dbName = 'heroku_b481894670aeac7';
    private $username = 'baaf8787ff1507';
    private $senha = '7ec630fc';
    
    public function ver($v){
        echo "<pre>";
        print_r($v);
        echo "</pre>";
        die();
    }
    public function dbConnect()
    {
        try {
            $con = new \PDO("mysql:host=$this->hostname;dbname=$this->dbName", "$this->username", "$this->senha");
            $con->exec("set names utf8");
            return $con;
        }
    
        catch (PDOException $e) {
            print "Erro!:" . $e->getMessage() . "<br>";
        }
    }

    public function dbCheck($stmt)
    {
        $num = $stmt->rowCount();
        return $num;
    }

    public function getResult($stmt)
    {
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function dbQuery($sqlQuery)
    {
        $con = $this->dbConnect();
        
        try {
            $stmt = $con->query($sqlQuery) or die("error chama a microsoft!!");
        }
        
        catch (PDOException $e) {
            print "Erro!:deu ruim na model, chama a microsoft!!" . $e->getMessage() . "<br>";
        }
        
        
        $this->dbClose($con);
        return $stmt;
    }

    public function dbClose($con)
    {
        unset($con);
        if (!empty($con)){
            echo "deu ruim na model, chama a microsft! a coneção não fechou nao";
        }
    }
        // ESPERO MESMO Q VC SAIBA O Q TA FAZENDO!!
    public function getAll($table, $column, $where = 0)
    {
        $sqlQuery = "SELECT {$column} FROM {$table}";
        if (!empty($where)){
            $sqlQuery .= " WHERE {$where}";
        }
        
        $stmt = $this->dbQuery($sqlQuery);
        return $stmt;
    }

    public function deletRow($table, $where)
    {
        if (!empty($where)){
            echo "TA FAZENDO MERDA AI Ó, UPDATE SEM WHERE, CHAMA A MICROSOFT";
        }
        $sqlQuery = "UPDATE {$table}
                        SET 'inativo' = 1
                        WHERE {$where}";
        
        $stmt = $this->dbQuery($sqlQuery);
        return $stmt;
    }

    public function update($table, $column, $value, $where)
    {
        if (!empty($where)){
            echo "TA FAZENDO MERDA AI Ó, UPDATE SEM WHERE, CHAMA A MICROSOFT"; 
            die();                              
        }

        $sqlQuery = "UPDATE {$table}
                        SET {$column} = {$value}
                        WHERE {$where}";
        
        $stmt = $this->dbQuery($sqlQuery);   
        return $stmt;
    }

    public function dbInsert($table, $columns, $values)
    {
        $sqlQuery = "INSERT INTO {$table} (";
        for($_x = 0; $_x < count($columns); $_x++){
            $sqlQuery .= "$columns[$_x], ";
        }

        $sqlQuery = substr($sqlQuery, 0, -2);
        $sqlQuery .= ") VALUES (";

        for($_x = 0; $_x < count($values); $_x++){
            preg_match('/^(NOW())|(SHA1)$/', $values[$_x], $matches) || (intval($values[$_x]));
            if (!empty($matches)){
                $sqlQuery .= "$values[$_x], ";
            }else{
                $sqlQuery .= "'$values[$_x]', ";
            }
        }

        $sqlQuery = substr($sqlQuery, 0, -2);
        $sqlQuery .= ")";      
            
        $stmt = $this->dbQuery($sqlQuery);
        return $stmt;
    }
        
}