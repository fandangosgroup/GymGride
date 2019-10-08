<?php

namespace GymGride\Model;

    //Critical section dont touch!!!

 class Model
    {
        private $hostname = 'localhost';
        private $dbName = 'secure_login';
        private $username = 'root';
        private $senha = '';


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

        $con = $this->dbConnect();
        //print_r("$sqlQuery");
        $stmt = $con->query($sqlQuery) or die("deu ruim na model, chama a microsoft!!");
        
        return $stmt;
        $this->dbClose($con);

        }

        public function deletRow($table, $where)
        {
            if (!empty($where)){
                echo "TA FAZENDO MERDA AI Ó, UPDATE SEM WHERE, CHAMA A MICROSOFT";
            }
            $sqlQuery = "UPDATE {$table}
                          SET 'inativo' = 1
                          WHERE {$where}";
            $con = $this->dbConnect();
            $stmt = $con->query($sqlQuery) or die("deu ruim na model, chama a microsoft!!");
            return $stmt;
            $this->dbClose($con);
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

            $con = $this->dbConnect();
            $stmt = $con->query($sqlQuery) or die("deu ruim na model, chama a microsoft!!");

            return $stmt;
        }

        public function insert($table, $columns, $values)
        
        {
            $sqlQuery = "INSERT INTO {$table} (";
            for($_x = 0; $_x < count($columns); $_x++){
                $sqlQuery .= "$columns[$_x], ";
            }

            $sqlQuery = substr($sqlQuery, 0, -2);
            $sqlQuery .= ") VALUES (";

            for($_x = 0; $_x < count($values); $_x++){
                $sqlQuery .= "'$values[$_x]', ";
            }

            $sqlQuery = substr($sqlQuery, 0, -2);
            $sqlQuery .= ")";      
            
            $con = $this->dbConnect();
            $stmt = $con->query($sqlQuery) or die("deu ruim na model, chama a microsoft!!");
            
            return $stmt;
        
        }
        
    }