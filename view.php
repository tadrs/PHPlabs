<?php


$ID = (int) $_GET['id'];

$dat = file("data.txt");

$lin = explode(",",$dat[$ID]);

foreach($lin as $val){
    echo "$val";
    echo "\n";
}
?>