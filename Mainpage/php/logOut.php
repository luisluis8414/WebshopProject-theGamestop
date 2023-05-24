<?php
session_start(); 

$email = $_SESSION['email'];
$this_login = date('Y-m-d H:i:s'); 

require("../../DBConnection/mysql.php");
$stmt = $mysql->prepare("UPDATE users SET last_login = :this_login WHERE email = :email");
$stmt->bindParam(":this_login", $this_login);
$stmt->bindParam(":email", $email);
$stmt->execute();

session_unset();

session_destroy();

header('Location: ../index.php'); 
exit;
?>
