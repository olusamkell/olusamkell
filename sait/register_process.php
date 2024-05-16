<?php 
include 'connect.php';
session_start();
if ($_SESSION['id_user']) {
  header('location: index.php');
}
$fio = $_POST['fio'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$driver_license = $_POST['driver_license'];

// Проверяем, нет ли уже такой почты в базе
$email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$result = $conn->query($email_check_query);
if ($result->num_rows > 0) {
    echo '<script>alert("Ошибка при регистрации: неверный формат почты "); window.location = "register.php";</script>';
    exit();
}

// Валидация поля электронной почты
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<script>alert("Ошибка : неверный формат почты  "); window.location = "register.php";</script>';
    exit();
}

// Валидация поля телефона
if (!preg_match('/^8\(\d{3}\)-\d{3}-\d{2}-\d{2}$/', $phone_number)) {
    echo '<script>alert("Ошибка : неверный формат телефона  "); window.location = "register.php";</script>';
    exit();
}

// Валидация поля пароля
if (!preg_match('/^(?=.*\d).{3,}$/', $password)) {
    echo '<script>alert("Ошибка при регистрации: Пароль должен содержать хотя бы одну цифру и быть не менее 3 символов "); window.location = "register.php";</script>';
    exit();
}

$sql = "INSERT INTO users (fio, login, password, email, phone_number) 
        VALUES ('$fio', '$login', '$password', '$email', '$phone_number')";

if ($conn->query($sql) === TRUE) {
    header("Location: auth.php"); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>  