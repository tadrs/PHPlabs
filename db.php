<?php


if(isset($_POST['register'])){
    try {
        
        $connection = new PDO("mysql:host=localhost;dbname=phpLabs", "root", "root");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $errors = [];

        if (empty($_POST['fname'])){
            $errors[] = "First Name is required"; 
        }
        if (empty($_POST['lname'])) { 
            $errors[] = "Last Name is required";
        }
        if (empty($_POST['address'])) { 
            $errors[] = "Address is required"; 
        }
        if (empty($_POST['country'])) { 
            $errors[] = "Country is required"; 
        }
        if (empty($_POST['gender'])) { 
            $errors[] = "Gender is required"; 
        }
        if (empty($_POST['skils'])) { 
            $errors[] = "At least one skill must be selected"; 
        }
        
        if (empty($_POST['username'])) {
            $errors[] = "Username is required";
        } elseif (!preg_match("/^[a-zA-Z0-9_]{4,20}$/", $_POST['username'])) {
            $errors[] = "Username must be 4-20 characters and contain only letters, numbers, or underscore";
        }

        if (empty($_POST['pass'])) {
            $errors[] = "Password is required";
        } elseif (strlen($_POST['pass']) < 6) {
            $errors[] = "Password must be at least 6 characters";
        } elseif (!preg_match("/[A-Z]/", $_POST['pass'])) {
            $errors[] = "Password must contain at least one uppercase letter";
        } elseif (!preg_match("/[a-z]/", $_POST['pass'])) {
            $errors[] = "Password must contain at least one lowercase letter";
        } elseif (!preg_match("/[0-9]/", $_POST['pass'])) {
            $errors[] = "Password must contain at least one number";
        } elseif (!preg_match("/[\W]/", $_POST['pass'])) {
            $errors[] = "Password must contain at least one special character";
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST; // حفظ القيم القديمة
            header("Location: register.php");
            exit;
        }

        $stm = $connection->prepare("insert into emp (f_name, l_name, address, country, gender, skils, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $skils = isset($_POST['skils']) ? implode(',', $_POST['skils']) : '';

        $stm->execute([$_POST['fname'],$_POST['lname'],$_POST['address'],$_POST['country'],$_POST['gender'],$skils,$_POST['username'],$_POST['pass']]);
        echo $connection->lastInsertId();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


   



    if (isset($_POST['update'])) {

        try {
            $connection = new PDO("mysql:host=localhost;dbname=phpLabs","root","root");

            $stm = $connection->prepare("update emp SET f_name = ?, l_name = ?, email = ?, address = ? WHERE id = ?");

            $stm->execute([$_POST['f_name'], $_POST['l_name'], $_POST['email'], $_POST['address'], $_POST['id']]);

            header("Location:data.php");
            exit;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }





?>
