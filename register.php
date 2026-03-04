<?php
// Show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!-- Bootstrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<html>
    <body class="bg-light">
        <div class="container mt-5">
            <form action="db.php" method="POST">

                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="fname" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="lname" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" cols="10" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <select name="country" class="form-select">
                        <?php
                            $country = ["egypt","usa","uk"];
                            foreach($country as $c){
                                echo "<option value='$c'>$c</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label><br>
                    <input type="radio" name="gender" value="male" class="form-check-input"> Male
                    <input type="radio" name="gender" value="female" class="form-check-input"> Female
                </div>

                <div class="mb-3">
                    <label class="form-label">Skils</label><br>
                    <?php
                        $skils = ["PHP","MYSQL","FLUTTER",".NET"];
                        foreach($skils as $s){
                            echo "<input type='checkbox' value='$s' name='skils[]' class='form-check-input me-1'>$s ";
                        }
                    ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control">
                </div>

                <div class="mb-3">
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
                    <label class="form-label"><?php echo $rand; ?></label><br>
                    <input type="text" name="rand" class="form-control mb-3">
                    <input type="submit" value="Register" class="btn btn-primary" name='register'>
                </div>

            </form>
        </div>
    </body>
</html>