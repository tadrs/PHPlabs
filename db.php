<?php

class Database{

    private $host="localhost";
    private $db="phpLabs";
    private $user="root";
    private $pass="root";

    public function connect(){

        try{

            $pdo = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->db,
                $this->user,
                $this->pass
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return $pdo;

        }catch(PDOException $e){

            echo $e->getMessage();

        }

    }

}