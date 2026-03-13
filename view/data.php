<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

<a href="index.php?add" class="btn btn-primary mb-3">Add</a>
<a href="index.php?logout" class="btn btn-danger mb-3">Logout</a>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>First</th>
<th>Last</th>
<th>Email</th>
<th>Actions</th>
</tr>

<?php foreach($employees as $row){ ?>

<tr>

<td><?= $row['id'] ?></td>
<td><?= $row['f_name'] ?></td>
<td><?= $row['l_name'] ?></td>
<td><?= $row['email'] ?></td>

<td>

<a href="index.php?view&id=<?= $row['id'] ?>" class="btn btn-info btn-sm">View</a>

<a href="index.php?edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="index.php?delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</div>