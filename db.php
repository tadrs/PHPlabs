<?php

if(isset($_POST['register'])){
   try{

    $connection= new pdo("mysql:host=localhost;dbname=phpLabs","root","root");
    $stm = $connection->prepare("insert into emp (f_name, l_name, address, country, gender, skils, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $skils = isset($_POST['skils']) ? implode(',', $_POST['skils']) : '';

    $stm->execute([$_POST['fname'],$_POST['lname'],$_POST['address'],$_POST['country'],$_POST['gender'],$skils,$_POST['username'],$_POST['pass']]);
   
    echo $connection->lastInsertId();

    }catch (PDOException $e){
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


?>