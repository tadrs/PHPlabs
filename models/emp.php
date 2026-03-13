<?php

require_once "../db.php";

class Emp{

    private $conn;
    private $table="emp";
    public function __construct(){
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll(){
        $stm = $this->conn->query("select id,f_name,l_name,email from {$this->table}");
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $stm = $this->conn->prepare("select * from emp where id=?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $stm = $this->conn->prepare("insert into emp (f_name,l_name,address,country,gender,skils,email,password) values (?,?,?,?,?,?,?,?)");
        return $stm->execute($data);
    }

    public function update($id,$data){
        $stm = $this->conn->prepare("update emp set f_name=?, l_name=?,address=?, country=?, gender=?, skils=?, email=? where id=?");

        return $stm->execute([
            $data[0],
            $data[1],
            $data[2],
            $data[3],
            $data[4],
            $data[5],
            $data[6],
            $id
        ]);

    }

    public function delete($id){
        $stm = $this->conn->prepare("delete from emp where id=?");
        return $stm->execute([$id]);
    }

    public function login($email,$pass){
        $stm = $this->conn->prepare("select * from emp where email=?");
        $stm->execute([$email]);
        $user = $stm->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($pass,$user['password'])){
            return $user;
        }
        return false;
    }

}