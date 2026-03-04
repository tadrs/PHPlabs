<?php

        if($_POST['gender'] == "male"){ 
            $res = "Mr. ";
        }else {
            $res = "Mrs. ";
        }

        echo "thanks ". $res . " " . $_POST['fname'] . " " . $_POST['lname'] . "<br>";

        echo "please review your information <br>";

        echo "Name: " . $_POST['fname'] . " " . $_POST['lname'] . "<br>";

        echo "Address: " . $_POST['address'] . "<br>";

        echo "your skiles: ";
        foreach($_POST['skils'] as $ss) {
            echo $ss . " <br>";
        }

?>