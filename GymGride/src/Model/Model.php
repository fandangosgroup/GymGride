<?php


    //Critical section dont touch!!!

    abstract class Model
    {
        private $hostname = 'localhost';
        private $dbName = 'secure_login';
        private $username = 'root';
        private $senha = '';


        public function dbConnect(){
            try {
                $con = new \PDO("mysql:host=$this->hostname;dbname=$this->dbName", "$this->username", "$this->senha");
                $con->exec("set names utf8");
                return $con;
            }
    
            catch (PDOException $e) {
                print "Erro!:" . $e->getMessage() . "<br>";
            }
        }

        public function dbClose($con){
            unset($con);
            if (!empty($con)){
                echo "deu ruim na model, chama a microsft! a coneção não fechou nao";
            }
        }
        // ESPERO MESMO Q VC SAIBA O Q TA FAZENDO!!
        public function getAll($table, $column, $where = 0){
        $sqlQuerry = "SELECT {$column} FROM {$table}";
        if (!empty($where)){
            $sqlQuerry .= " WHERE {$where}";
        }

        $con = dbConnect();
        return $con->Exec($sqlQuerry) or die("deu ruim na model, chama a microsoft!! $con");
        dbClose($con);

        }

        public function deletRow($table, $where){
            if (!empty($where)){
                echo "TA FAZENDO MERDA AI Ó, UPDATE SEM WHERE, CHAMA A MICROSOFT";
            }
            $sqlQuerry = "UPDATE {$table}
                          SET 'inativo' = 1
                          WHERE {$where}";
            $con = dbConnect();
            return $con->Exec($sqlQuerry) or die("deu ruim na model, chama a microsoft!! $con");
            dbClose($con);
        }
        
    }