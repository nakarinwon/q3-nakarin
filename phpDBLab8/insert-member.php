<?php 
include "connect.php";

$stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?,?,?)");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->bindParam(3, $_POST["name"]);
$stmt->bindParam(4, $_POST["address"]);
$stmt->bindParam(5, $_POST["mobile"]);
$stmt->bindParam(6, $_POST["email"]);
$stmt->execute(); 
$pid = $_POST["username"];
header("location: member-detail.php?username=" . $pid);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
</head>
<body>
   
</body>
</html>
