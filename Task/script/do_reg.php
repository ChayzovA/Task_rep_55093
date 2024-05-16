<?php
$user = "root";
$password = "";

$conn = new PDO("mysql:host=localhost;dbname=task", $user, $password);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!isset($_POST['email']) && !isset($_POST['email'])){
    echo "Введите данные";
}
else{
    $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES (:name, :email, :password)"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    echo "Данные добавлены успешно";
}
?>