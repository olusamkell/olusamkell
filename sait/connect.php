<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "deprojectt";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>