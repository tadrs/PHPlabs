<form method="POST" action="index.php">

<input type="hidden" name="id" value="<?= $employee['id'] ?>">

<input type="text" name="fname" value="<?= $employee['f_name'] ?>" class="form-control mb-2">

<input type="text" name="lname" value="<?= $employee['l_name'] ?>" class="form-control mb-2">

<textarea name="address" class="form-control mb-2"><?= $employee['address'] ?></textarea>

<input type="text" name="username" value="<?= $employee['email'] ?>" class="form-control mb-2">

<button class="btn btn-success" name="updateEmployee">Update</button>

</form>