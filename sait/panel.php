<?php
$session_cookies = 60 * 60;
session_set_cookie_params($session_cookies);
include 'connect.php';
session_start();
$id_user = $_SESSION['id_user'];
$status = $_SESSION['status'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demoexamen</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php include "header.php" ?>

<?php if (isset($_SESSION['id_user']) && $_SESSION['status'] === 'user'): ?>
    <div id="top">
        <h2><a class = "orderr" href="order.php">Заказы</a></h2>
        <h2><a class = "orderr" href="neworder.php">Оформить заказ</a></h2>
    </div>
<?php endif; ?>
</body>
</html> 