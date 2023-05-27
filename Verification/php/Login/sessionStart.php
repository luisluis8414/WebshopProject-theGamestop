<?php
        session_start();
        $email = $_POST['email'];
        $os = $_POST['os'];
        $res = $_POST['res'];
        $lastLogin = date('Y-m-d');

                
        require("../../../DBConnection/mysql.php");

        $_SESSION['logged_in'] = true;
        $_SESSION['email'] =  $email;

        $stmt = $mysql->prepare("UPDATE users SET last_login = :lastLogin, screen_resolution = :res, operating_system = :os, is WHERE email = :email");
         $stmt->bindParam(":email", $email);  
         $stmt->bindParam(":lastLogin", $lastLogin);          
        $stmt->bindParam(":os", $os);
        $stmt->bindParam(":res", $res);
        $stmt->execute(); 

        $response = array(
                "email" => "success"
            );
            echo json_encode($response);
            exit();