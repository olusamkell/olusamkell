<?php session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demoexamen</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
      <?php include 'header.php'; ?>
    <main class = "container_reg">
    <h2>Авторизация</h2>
    <form action="auth_process.php" method="post">
        <input type="login" name="login" placeholder="Login" required><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <button type="submit">Войти</button>
    </form>
    </main>
</body>
</html>