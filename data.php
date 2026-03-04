<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<a href="register.php" class="btn btn-primary mb-3">Add</a>

<table class="table table-bordered table-hover">
    <tr class="table-dark">
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>

<?php

try{
    
    $connection= new pdo("mysql:host=localhost;dbname=phpLabs","root","root");
    $result=$connection->query("select id,f_name,l_name,email,address from emp");

    while($row=$result->fetch(PDO::FETCH_ASSOC)){

        echo "<tr>";
        foreach($row as $val){
            echo"<td>$val</td>";
        }

        echo "<td>
                <a href='view.php?id={$row['id']}' class='btn btn-info btn-sm'>View</a>
                <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
              </td>";

        echo "</tr>";
     }
  
}catch (PDOException $e){
    echo $e->getMessage();
}

?>

</table>