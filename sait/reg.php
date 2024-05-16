<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demoexamen</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <?php include "header.php" ?>
    <main class = "container_reg">
    <h2>Регистрация</h2>
    <form action="register_process.php" method="post">
        <input type="text" name="fio" placeholder="ФИО" required><br>
        <input type="text" name="login" placeholder="Логин" required><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="phone_number" placeholder="Номер телефона" required><br>
        <input type="submit" value="Зарегистрироваться">
    </form>
    </main>
</body>
</html>