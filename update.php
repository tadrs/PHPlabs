<?php

if(isset($_GET['id'])){
    $id=$_GET['id'];
     try{
            $connection= new pdo("mysql:host=localhost;dbname=os46","root","root");
              $data=$connection->query("select * from emp where id=$id ");
               $emp= $data->fetch(PDO::FETCH_ASSOC);
              }catch (PDOException $e){
            echo $e->getMessage();
    }
} 

?>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<form action="db.php" method="post">
    <input type="text" class="form-control" value="<?= $emp['f_name']?>" placeholder="first name" name="f_name"><br>
    <input type="text" class="form-control" value="<?= $emp['l_name']?>" placeholder="last name" name="l_name"><br>
    <input type="email"class="form-control" value="<?= $emp['email']?>" placeholder="email" name="email"><br>
    <input type="text" class="form-control" value="<?= $emp['address']?>"placeholder="address" name="address"><br>
    <input type="submit" value="Update" class="btn btn-primary" name="update">

</form>