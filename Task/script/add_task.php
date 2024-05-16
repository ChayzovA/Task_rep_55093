<?php
session_start();
$id = $_SESSION['id'];
$description = $_POST['task-field'];


$user = "root";
$password = "";

$conn = new PDO("mysql:host=localhost;dbname=task", $user, $password);

$sql = "INSERT INTO `tasks` (`author`, `description`) VALUES   (:author, :description)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':author', $id);
$stmt->bindParam(':description', $description);
$stmt->execute();

header("Location:../index.php");
?>