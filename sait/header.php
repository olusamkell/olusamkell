<?php 
session_start();
if(isset($_SESSION['id_user'])  || isset($_SESSION['status'])) {
    echo '<header class="header1">
        <div class="logo">
            <img src="apex1.jpg" alt="Logo" class="logoimage"">
        </div>
        <nav class="navig">
            <ul>
                <li class="navigation"><a href="index.php">Главная</a></li>
                <li class="navigation"><a href="panel.php">Личный кабинет</a></li>
            </ul>
        </nav>
        <div class="contacts">
            <form action="exit.php" method="POST">
                <button type="submit" name="exit_button" value="выйти" class="button_exit">Выйти</button>
            </form>
        </div>
    </header>';
} elseif(!isset($_SESSION['id_user'])  || !isset($_SESSION['status'])) {
    echo '<header class="header1">
        <div class="logo">
            <img src="apex1.jpg" alt="Logo" class="logoimage">
        </div>
        <nav class="navig">
            <ul>
                <li class="navigation"><a href="index.php">Главная</a></li>
                <li class="navigation"><a href="reg.php">Регистрация</a></li>
                <li class="navigation"><a href="auth.php">Авторизация</a></li>
            </ul>
        </nav>
    </header>';
}
?>