<?php

if(isset($_GET['id'])){
    $id=$_GET['id'];
     try{
            $connection= new pdo("mysql:host=localhost;dbname=os46","root","root");
              $stm=$connection->prepare("select * from emp where id=? ");
              $stm->execute([$id]);
              $emp= $stm->fetch(PDO::FETCH_ASSOC);

               echo "<ul>";
              foreach($emp as $val){
                echo "<li>$val</li>";
              }

                 echo "</ul>";
           
              }catch (PDOException $e){
            echo $e->getMessage();
    }


}
    

?>