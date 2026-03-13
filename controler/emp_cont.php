<?php

require_once "models/emp.php";

class EmployeeController{

    private $emp;
    public function __construct(){
        $this->emp = new Emp();
    }

    public function list(){
        if(!isset($_SESSION['user'])){
            $this->showLogin();
            return;
        }
        $employees = $this->emp->getAll();
        require "views/data.php";
    }

    public function showLogin(){
        require "views/login.php";
    }

    public function login(){
        $user = $this->emp->login($_POST['email'], $_POST['pass']);
        if($user){
            $_SESSION['user']=$user;
            $this->list();
        }else{
            echo "invalid login";
        }
    }

    public function logout(){
        session_destroy();
        $this->showLogin();
    }

    public function showRegist(){
        require "views/register.php";
    }

    public function store(){
        $skils = isset($_POST['skils'])? implode(',',$_POST['skils']): '';

        $data=[
            $_POST['fname'],
            $_POST['lname'],
            $_POST['address'],
            $_POST['country'],
            $_POST['gender'],
            $skils,
            $_POST['username'],
            password_hash($_POST['pass'],PASSWORD_DEFAULT)
        ];
        $this->emp->create($data);
        $this->list();
    }

    public function view(){
        $employee = $this->emp->getById($_GET['id']);
        require "views/view.php";
    }

    public function showEdit(){
        $employee = $this->emp->getById($_GET['id']);
        require "views/edit.php";
    }

    public function update(){
        $skils = isset($_POST['skils'])? implode(',',$_POST['skils']): '';

        $data=[
            $_POST['fname'],
            $_POST['lname'],
            $_POST['address'],
            $_POST['country'],
            $_POST['gender'],
            $skils,
            $_POST['username']
        ];
        $this->emp->update($_POST['id'],$data);
        $this->list();
    }

    public function delete(){
        $this->emp->delete($_GET['id']);
        $this->list();
    }

}