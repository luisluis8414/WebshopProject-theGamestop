<?php
session_start();
$email = $_SESSION['email'];

require('../../../DBConnection/mysql.php');
$stmt = $mysql->prepare("UPDATE users SET is_online = 0 WHERE EMAIL = :email");
$stmt->bindParam(":email", $email);  
$stmt->execute(); 

session_destroy();
header("Location: ../../../index.php");
