<?php


$id = (int) $_GET['id'];

$data = file("dat.txt");

$file = fopen($filename, "w");

foreach ($lines as $indx=>$l) {
    if ($indx != $id) {
        fwrite($file, $l . "\n");
    }
}

fclose($file);
header("Location: data.php");

?>