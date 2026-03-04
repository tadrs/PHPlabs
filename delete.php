<?php
$id = $_GET['id'] ?? 0;

$connection = new PDO("mysql:host=localhost;dbname=phpLabs","root","root");
$stmt = $connection->prepare("DELETE FROM emp WHERE id=?");
$stmt->execute([$id]);

header("Location: data.php");
exit;

?>