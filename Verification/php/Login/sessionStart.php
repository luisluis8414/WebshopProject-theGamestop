<?php
        session_start();
        $email = $_POST['email'];
        $os = $_POST['os'];
        $res = $_POST['res'];

                
        require("../../../DBConnection/mysql.php");

        $_SESSION['logged_in'] = true;
        $_SESSION['email'] =  $email;
        $stmt = $mysql->prepare("UPDATE users SET screen_resolution = :res, operating_system = :os WHERE email = :email");
         $stmt->bindParam(":email", $email);           
        $stmt->bindParam(":os", $os);
        $stmt->bindParam(":res", $res);
        $stmt->execute(); 