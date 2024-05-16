<?php
$check = (int) $_GET['id'];

$user = "root";
$password = "";

$conn = new PDO("mysql:host=localhost;dbname=task;", $user, $password);

$sql = "SELECT * FROM `tasks` WHERE `id` = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if ((int)$task['made'] == 0){
    $sql = "UPDATE `tasks` SET made = 1 WHERE `id` = :id";
}
else{
    $sql = "UPDATE `tasks` SET made = 0 WHERE `id` = :id";
}
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
?>