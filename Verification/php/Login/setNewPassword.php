<?php

$email = $_POST['email'];
$password = $_POST['password'];

require("../../../DBConnection/mysql.php");
        $stmt = $mysql->prepare("UPDATE users SET PASSWORD = :password, erster_login = 0 WHERE EMAIL = :email");
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        $count = $stmt->rowCount();
 
        if ($count > 0) {
            $response = array('success' => true);
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'message' => 'Failed to update password.');
            echo json_encode($response);
        }