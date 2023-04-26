<?php

if (isset($_POST['submit'])) {
    //connect to database
    require("mysql.php");
    $stmt = $mysql->prepare("SELECT * FROM users WHERE EMAIL = :eMail"); //EMail ueberpruefen
    $stmt->bindParam(":eMail", $_POST["eMail"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 0) {
            $pw=generate_password();
            $stmt = $mysql->prepare("INSERT INTO users (EMAIL, PASSWORD) VALUES (:eMail, :pw)");
            $stmt->bindParam(":eMail", $_POST["eMail"]);
            $hash = password_hash($pw, PASSWORD_BCRYPT);
            $stmt->bindParam(":pw", $hash);
            $stmt->execute();
    }


    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $eMail = $_POST['eMail'];

    if (empty($vorname) || empty($nachname) || empty($eMail)) {
        header("Location: Registration.php?Registrierung=empty&vorname=$vorname&nachname=$nachname&email=$eMail");
        exit();
    } else {
        //check if vorname is valid format
        if (!preg_match("/^[a-zA-Z]*$/", $vorname)) {
            header("Location: Registration.php?Registrierung=vorname&nachname=$nachname&email=$eMail");
            exit();
        } else {
            if (!preg_match("/^[a-zA-Z]*$/", $nachname)) {
                header("Location: Registration.php?Registrierung=nachname&vorname=$vorname&email=$eMail");
                exit();
            } else {
                //Email Validation
                if($count !== 0){
                    header("Location: Registration.php?Registrierung=emailTaken&vorname=$vorname&nachname=$nachname");
                    exit();
                }
                    else{
                        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $eMail)) {
                            header("Location: Registration.php?Registrierung=email&vorname=$vorname&nachname=$nachname");
                            exit();
                        }else {
                            //Success
                            header("Location: Login.php?Registrierung=success");
                            exit();
                        } 
                }
            }
        }
    }
} else {
    header("Location: Registration.php");
    exit();
}


function generate_password() {
    $length = 10; // set desired password length here (including at least one lowercase letter, one uppercase letter, and one digit)
    $password = '';
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  
    while (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{9,}$/', $password)) {
      $password = '';
      for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, strlen($chars) - 1)];
      }
    }
  
    return $password;
  }
  