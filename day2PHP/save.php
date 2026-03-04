<?php

var_dump($_POST);

$_POST['skils'] = implode(" - ", $_POST['skils']);
$data = implode(',', $_POST)."\n";


$file = fopen("data.txt", "a");
if ($file) {
    fwrite($file, $data);
    fclose($file);        
} else {
    echo "خطأ: لا يمكن فتح الملف!";
}

header("Location: data.php");

?>