<?php
session_start();

$message = $_SESSION['error'] ?? '';
unset($_SESSION['error']);

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h3 class="card-title text-center mb-4">Login</h3>
        
        <?php if($message): ?>
            <div class="alert alert-danger text-center"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <form action="login_controler.php" method="POST">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="login" class="btn btn-success">دخول</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
