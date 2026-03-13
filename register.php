<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$old = $_SESSION['old'] ?? [];
unset($_SESSION['old']);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card shadow-sm p-4" style="max-width:600px; margin:auto;">
        <h3 class="mb-4 text-center">Register</h3>
        <form action="db.php" method="POST">

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="fname" class="form-control" value="<?php echo htmlspecialchars($_POST['fname'] ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="lname" class="form-control" value="<?php echo htmlspecialchars($_POST['lname'] ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" cols="10" rows="3"><?php echo htmlspecialchars($_POST['address'] ?? ''); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Country</label>
                <select name="country" class="form-select">
                    <?php
                        $countries = ["egypt","usa","uk"];
                        foreach($countries as $c){
                            $selected = (($_POST['country'] ?? '') == $c) ? 'selected' : '';
                            echo "<option value='$c' $selected>$c</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <input type="radio" name="gender" value="male" class="form-check-input" <?php if(($_POST['gender'] ?? '')=='male') echo 'checked'; ?>> Male
                <input type="radio" name="gender" value="female" class="form-check-input" <?php if(($_POST['gender'] ?? '')=='female') echo 'checked'; ?>> Female
            </div>

            <div class="mb-3">
                <label class="form-label">Skills</label><br>
                <?php
                    $skills = ["PHP","MYSQL","FLUTTER",".NET"];
                    foreach($skills as $s){
                        $checked = in_array($s, $_POST['skils'] ?? []) ? 'checked' : '';
                        echo "<input type='checkbox' value='$s' name='skils[]' class='form-check-input me-1' $checked>$s ";
                    }
                ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="pass" class="form-control">
            </div>

            <div class="mb-3">
                <?php
                    function generateRandomString($length = 7) {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[random_int(0, $charactersLength - 1)];
                        }
                        return $randomString;
                    }
                    $rand = generateRandomString();
                ?>
                <label class="form-label"><?php echo $rand; ?></label><br>
                <input type="text" name="rand" class="form-control mb-3">
            </div>

            <div class="d-grid">
                <input type="submit" value="Register" class="btn btn-primary" name='register'>
            </div>
        </form>
    </div>
</div>