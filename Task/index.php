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
    $user = "root";
    $password = "";
    $conn = new PDO("mysql:host=localhost;dbname=task;", $user, $password);
    ?>
    <header>
        <h1>Менеджер задач</h1>
        <a href="reg.php">Регистрация</a>
        <a href="auth.php">Авторизация</a>
        <a href="script/do_exit.php">Выход</a>
        <div class="name-email">
            <?php
            session_start();
            if(isset($_SESSION['id'])&&$_SESSION['name']&&$_SESSION['email']){
            $user_id = $_SESSION['id'];
            $name = $_SESSION['name']; 
            $email = $_SESSION['email'];
            echo "<hr><a>$user_id</a><hr>";
            echo "<a>$name</a><hr>";
            echo "<a>$email</a><hr>";
            }
            ?>
        </div>
    </header>
    <p id="index-main-nav">Главная</p>
    <main>
        <div class="task-field-wrapper">
        <form class="add-task" action="script/add_task.php" method="POST">
            <label for="task-field">Введите задачу</label>
            <textarea name="task-field" id="" cols="30" rows="10"></textarea>
            <button id="add-task" type="submit">Добавить задачу</button>
        </form>
        </div>
        <div class="task-list">
            <ul class="task-list-general">
                <label for="task-list-position">Текущие задачи</label>
                <?php
                $sql = "SELECT * FROM `tasks` WHERE `author` = :author";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':author', $user_id);
                $stmt->execute();
                $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

                for ($i=0; $i < count($tasks); $i++) {
                    $description = $tasks[$i]['description'];
                    $made = $tasks[$i]['made'];
                    $id = $tasks[$i]['id'];
                ?>
                    <li class="task-list-position">
                        
                        
                        <input name="done" type="checkbox" <?php if($made==1) echo "checked";?>>
                        
                    
                    <?php echo "<a href='script/check_task.php?id=$id'>$description</a>";
                    ?>
                    </li>
                <?php    
                }
                ?>
            </ul>
        </div>
    </main>
    <footer>
        <p>Подписаться на рассылку</p>
        <input type="email" placeholder="email">
        <a href="">Подписаться</a>
    </footer>
</body>
</html>