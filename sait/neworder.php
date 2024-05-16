<?php 
$session_cookies = 60 * 60;
session_set_cookie_params($session_cookies);
session_start();

include 'connect.php';

if (isset($_POST['car']) && isset($_POST['bookingDate'])) {
    $car = $_POST['car'];
    $bookingDate = $_POST['bookingDate'];
    $userId = $_SESSION['id_user'];

    // Проверка наличия других заявок на выбранный автомобиль на указанную дату
    $sqlCheck = "SELECT * FROM orders WHERE product_name = '$car' AND (status_order = 'новое' OR status_order = 'подтверждено') AND booking_date = '$bookingDate'";
    $resultCheck = $conn->query($sqlCheck);

    if ($resultCheck->num_rows > 0) {
        echo "Невозможно забронировать автомобиль на указанную дату, так как уже есть другая заявка на него.";
    } else {
        // Выполнение запроса на добавление новой заявки
        $sqlInsert = "INSERT INTO orders (id_user, product_name, status_order, booking_date) VALUES ('$userId', '$car', 'новое', '$bookingDate')";
        if ($conn->query($sqlInsert) === TRUE) {
            echo '<script>alert("Вы успешно забронировали авто");</script>';
        } else {
            echo "Ошибка: " . $sqlInsert . "<br>" . $conn->error;
        }
    }
}

// Закрытие соединения с базой данных
$conn->close();

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
    <?php
        include "header.php"
    ?>
    <main class = "container_reg">
    <?php if (isset($_SESSION['id_user'])): ?>
            <h2>Оформление заказа</h2>
<form id="bookingForm" action="" method="POST">
    <label for="carSelect">Выберите автомобиль: </label>
    <select id="carSelect" name="car" required>
        <option value="car1">Автомобиль 1</option>
        <option value="car2">Автомобиль 2</option>
    </select>
    <br>
    <label for="dateInput">Дата бронирования: </label>
    <input type="date" id="dateInput" name="bookingDate" required>
    <br>
    <button type="submit">Отправить заявку</button>
</form>
            <?php else: ?>
            <h1>Вы не авторизованы</h1>
            <?php endif; ?> 
    </main>
</body>
</html>