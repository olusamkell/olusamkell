<?php
$session_cookies = 60 * 60;
session_set_cookie_params($session_cookies);
session_start();
include 'connect.php';
$id_user = $_SESSION['id_user'];
$status = $_SESSION['status'];
if (isset($_SESSION['id_user'])) {
    $userId = $_SESSION['id_user'];
    $sql = "SELECT * FROM orders WHERE id_user = '$userId'";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои заказы</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include "header.php";
    ?>
    <main class="container_reg">
        <h2>Мои заказы</h2>
        <table class = "status" >
            <tr>
                <th>Автомобиль</th>
                <th>Статус заказа</th>
                <th>Дата бронирования</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["product_name"]."</td><td>".$row["status_order"]."</td><td>".$row["booking_date"]."</td></tr>";
                }
            } else {
                echo "У вас нет бронирований";
            }
            ?>
        </table>
    </main>
<footer class="footer">
      <div class="logo">
        <img src="" alt="Logo" />
      </div>
      <nav class="navig">
        <span>Copy Ivanov Ivan I 2023</span>
      </nav>
      <div class="contacts">
        <p>Phone:...</p>
        <p>Email:...</p>
      </div>
    </footer>
</body>
</html>

<?php
} else {
    echo "Вы не авторизованы";
}
$conn->close();