<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

    ?>
    <header>
        <h1>Менеджер задач</h1>
        <a href="auth.php">Авторизация</a>
        <a href=""></a>
    </header>
    <main class="id">
        <form action="script/do_reg.php" method="POST">
            <h2>Регистрация</h2>
            <label for="name">Имя</label>
            <input name="name" type="text" placeholder="name">
            <label for="email">Почта</label>
            <input name="email" type="text" type="email" placeholder="email">
            <label for="password">Пароль</label>
            <input name="password" type="password" placeholder="password">
            <button type="submit">Зарегестрироваться</button>
        </form>
    </main>
    <footer>
        <p>Подписаться на рассылку</p>
        <input type="email" placeholder="email">
        <a href="">Подписаться</a>
    </footer>
</body>
</html>