<?php

    session_start();

    if (!isset($_POST['login'])) {
        header("Location: login.php");
        exit;
    }else {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $pdo->prepare("SELECT * FROM emp WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: dashboard.php");
                exit;
            } else {
                $_SESSION['error'] = "wrong pass";
                header("Location: login.php");
                exit;
            }
        } else {
            $_SESSION['error'] = "not find usr";
            header("Location: login.php");
            exit;
        }

    }

?>