<?php
$user = "root";
$password = "";

$conn = new PDO("mysql:host=localhost;dbname=task", $user, $password);

$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_POST['email']) && isset($_POST['password'])){
    $sql = "SELECT * FROM `users` WHERE `email` = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $emails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}
if (count($emails)>0){
    session_start();
    $_SESSION['id'] = $emails[0]['id'];
    $_SESSION['name'] = $emails[0]['name'];
    $_SESSION['email'] = $emails[0]['email'];
    header("Location: ../index.php");
}
else{
    echo "Данные указаны не верно";
}

?>