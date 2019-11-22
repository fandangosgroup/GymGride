<?php

namespace GymGride\Model;

    //Critical section dont touch!!!

class Model {
        
    private $hostname = 'URL';
    private $dbName = 'Nome do Banco';
    private $username = 'Username';
    private $senha = 'Insira a senha';
    
    public function ver($v)
    {
        echo "<pre>";
        print_r($v);
        echo "</pre>";
        die();
    }

    //Faz a conexão com o banco de dados
    public function dbConnect()
    {
        try {
            $con = new \PDO("mysql:host=$this->hostname;dbname=$this->dbName", "$this->username", "$this->senha");
            $con->exec("SET @@auto_increment_increment=1;");
            $con->exec("SET @@global.time_zone = '+3:00';");
            $con->exec("SET time_zone='America/Sao_Paulo';");
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

    //Pega o resultado da consulta e retorna em um array
    public function getResult($stmt)
    {
        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    //Realiza a Query No banco
    public function dbQuery($sqlQuery)
    {
        $con = $this->dbConnect();
        //print_r($sqlQuery);
        try {
            $stmt = $con->query($sqlQuery) or die("ERROR:q Chama a microsoft!!");
        }
        
        catch (PDOException $e) {
            print "Erro!:deu ruim na model, chama a microsoft!!" . $e->getMessage() . "<br>";
        }
        
        
        $this->dbClose($con);
        return $stmt;
    }

    //Fecha conexão com o banco
    public function dbClose($con)
    {
        unset($con);
        if (!empty($con)){
            echo "deu ruim na model, chama a microsft! a coneção não fechou nao";
        }
    }

    //Seleciona resultados do banco de dados , por padrao ele pega todos os resultados
    public function getAll($table, $column, $where = 0)
    {
        $sqlQuery = "SELECT {$column} FROM {$table}";
        if (!empty($where)){
            $sqlQuery .= " WHERE {$where}";
        }
        
        $stmt = $this->dbQuery($sqlQuery);
        return $stmt;
    }

    //Deleta uma Linha do banco de dados
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

    //Realiza o update de um valor no banco
    public function update($table, $column, $value, $where)
    {
        if (empty($where)){
            echo "TA FAZENDO MERDA AI Ó, UPDATE SEM WHERE, CHAMA A MICROSOFT"; 
            die();                              
        }

        $sqlQuery = "UPDATE {$table}
                        SET {$column} = {$value}
                        WHERE {$where}";
        
        $stmt = $this->dbQuery($sqlQuery);   
        return $stmt;
    }

    //Insere valores no banco
    public function dbInsert($table, $columns, $values)
    {
       // $this->ver($values);
        $sqlQuery = "INSERT INTO {$table} (";
        for($_x = 0; $_x < count($columns); $_x++){
            $sqlQuery .= "$columns[$_x], ";
        }

        $sqlQuery = substr($sqlQuery, 0, -2);
        $sqlQuery .= ") VALUES (";

        if (is_array($values)){
            for($_x = 0; $_x < count($values); $_x++){
                preg_match('/^(NOW())|(SHA1)$/', $values[$_x], $matches) || (intval($values[$_x]));
                if (!empty($matches)){
                    $sqlQuery .= "$values[$_x], ";
                }else{
                    $sqlQuery .= "'$values[$_x]', ";
                }
            }
        }else{
            $sqlQuery .= $values . "  ";

        }
        
        $sqlQuery = substr($sqlQuery, 0, -2);
        $sqlQuery .= ")";      
            
        $stmt = $this->dbQuery($sqlQuery);
        return $stmt;
    }
        
}