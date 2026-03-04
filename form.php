<?php
// Show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
    <body>
        <form action="save.php" method="POST">
            <div>
                
                <lable>first name</lable>
                <input type="text" name="fname">

            </div>

            <div>
                
                <lable>last name</lable>
                <input type="text" name="lname">

            </div>

            <div>
                
                <lable>address</lable>
                <textarea name="address" col=10 row=15 ></textarea>

            </div>

            <div>
                <lable>country</lable>
                <select name="country">
                    <?php
                        $country = ["egypt","usa","uk"];
                        foreach($country as $c){
                            echo "<option value='$c'>$c</option>";
                        }
                    ?>
                </select>
            </div>

            <div>
                
                <lable>gender</lable>
                <input type="radio" name="gender" value="male">male
                <input type="radio" name="gender" value="female">female

            </div>

            <div>
                
                <lable>skils</lable>
                <?php
                    $skils = ["PHP","MYSQL","FLUTTER",".NET"];
                    foreach($skils as $s){
                        echo "<input type='checkbox' value='$s' name='skils[]'>$s";
                    }
                ?>

            </div>

            <div>
                
                <lable>username</lable>
                <input type="text" name="username">

            </div>

            <div>
                
                <lable>password</lable>
                <input type="password" name="pass">

            </div>

            <div>

                <?php

                    function generateRandomString($length = 10) {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';

                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[random_int(0, $charactersLength - 1)];
                        }

                        return $randomString;
                    }

                    $rand = generateRandomString(7);

                ?>
                
                <lable><?php echo $rand; ?></lable>
                <br>
                <input type="text" name="rand">


                <input type="submit" value="Submit">

            </div>
        </form>
    </body>
</html>