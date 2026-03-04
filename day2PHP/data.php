<?php
echo '
<style>
table {
    border-collapse: collapse;
    width: 90%;
    margin: 20px auto;
    font-family: Arial, sans-serif;
}
th, td {
    border: 1px solid #999;
    padding: 8px 12px;
    text-align: center;
}
th {
    background-color: #4CAF50;
    color: white;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
a.action-btn {
    display: inline-block;
    padding: 4px 8px;
    margin: 2px;
    background-color: #2196F3;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-size: 0.9em;
}
a.action-btn.delete {
    background-color: #f44336;
}
a.action-btn.update {
    background-color: #ff9800;
}
</style>
';

echo "<table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>address</th>
            <th>countery</th>
            <th>gender</th>
            <th>skils</th>
            <th>email</th>
            <th>pass</th>
            <th>not robot</th>
            <th>operations</th>
        </tr>";

$dt = file("data.txt");

foreach($dt as $indx=>$row){
    $rowDt = explode(",",$row);
    echo "<tr>";

    foreach($rowDt as $v){
        echo "<td>$v</td>";
    }

    echo "<td>
            <a class='action-btn' href='view.php?id=$indx'>View</a>
            <a class='action-btn delete' href='delete.php?id=$indx'>Delete</a>
            <a class='action-btn update' href='update.php?id=$indx'>Update</a>
          </td>";

    echo "</tr>";
}
echo "</table>";
?>