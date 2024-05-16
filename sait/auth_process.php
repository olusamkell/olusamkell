<?php 

include 'connect.php';


// Получение данных из формы
$login = $_POST['login'];
$password = $_POST['password'];

// Запрос к базе данных для проверки данных
$sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    session_start();
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['status'] = $user['status'];
    $_SESSION['login'] = $login;
    header("Location: index.php"); // перенаправление на главную страницу
} else {
    echo '<script>alert("Неверный логин или пароль "); window.location = "auth.php";</script>';
}
?>