<form method="POST" action="index.php">

<input type="text" name="fname" class="form-control mb-2">

<input type="text" name="lname" class="form-control mb-2">

<textarea name="address" class="form-control mb-2"></textarea>

<select name="country" class="form-control mb-2">
<option>egypt</option>
<option>usa</option>
<option>uk</option>
</select>

<input type="radio" name="gender" value="male"> Male
<input type="radio" name="gender" value="female"> Female

<br>

<input type="checkbox" name="skils[]" value="PHP"> PHP
<input type="checkbox" name="skils[]" value="MYSQL"> MYSQL
<input type="checkbox" name="skils[]" value="FLUTTER"> FLUTTER

<input type="text" name="username" class="form-control mb-2">

<input type="password" name="pass" class="form-control mb-2">

<button class="btn btn-success" name="register">Save</button>

</form>