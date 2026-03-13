<?php

session_start();

require_once "controllers/EmployeeController.php";

$controller = new EmployeeController();

if(isset($_POST['login'])){
    $controller->login();
}
elseif(isset($_POST['register'])){
    $controller->store();
}
elseif(isset($_POST['updateEmployee'])){
    $controller->update();
}
elseif(isset($_GET['add'])){
    $controller->showRegist();
}
elseif(isset($_GET['view'])){
    $controller->view();
}
elseif(isset($_GET['edit'])){
    $controller->showEdit();
}
elseif(isset($_GET['delete'])){
    $controller->delete();
}
elseif(isset($_GET['logout'])){
    $controller->logout();
}
else{
    $controller->list();
}