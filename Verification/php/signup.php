<?php

if(isset($_POST['submit'])){
//connect to database
require("mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM users WHERE EMAIL = :eMail");//EMail ueberpruefen
        $stmt->bindParam(":eMail", $_POST["eMail"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count==0){
            if($_POST['pw']== $_POST['pw2']){
                //User anlegen
                $stmt = $mysql->prepare("INSERT INTO users (EMAIL, PASSWORD) VALUES (:eMail, :pw)");
                $stmt->bindParam(":eMail", $_POST["eMail"]);
                $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
                $stmt->bindParam(":pw", $hash);
                $stmt->execute();
                $sucsess=true;
            }
        }

    $vorname= $_POST['vorname'];
    $nachname= $_POST['nachname'];
    $eMail=$_POST['eMail'];
    $pw=$_POST['pw'];
    $pw2=$_POST['pw2'];

    if(empty($vorname)||empty($nachname)||empty($eMail)||empty($pw)||empty($pw2)){
        header("Location: Registration.php?Registrierung=empty&vorname=$vorname&nachname=$nachname&email=$eMail");
        exit();
    }else{
        //check if vorname is valid format
        if(!preg_match("/^[a-zA-Z]*$/", $vorname)){
            header("Location: Registration.php?Registrierung=vorname&nachname=$nachname&email=$eMail");
            exit();
        }else{
            if(!preg_match("/^[a-zA-Z]*$/", $nachname)){
                header("Location: Registration.php?Registrierung=nachname&vorname=$vorname&email=$eMail");
                exit();
            }else{
            //Email Validation
            if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $eMail)){
                header("Location: Registration.php?Registrierung=email&vorname=$vorname&nachname=$nachname");
                exit();
            }else{
                //Are both Passwords the same
                if($pw!=$pw2){
                    header("Location: Registration.php?Registrierung=NotStrongEnough&vorname=$vorname&nachname=$nachname&email=$eMail");
                    exit();   
                }else{
                    if(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_+\\-={}\\[\\]\\|:;\"\'<>,.?\/])(?=\\S+$).{8,}$/', $pw)){
                        header("Location: Registration.php?Registrierung=NotStrongEnough&vorname=$vorname&nachname=$nachname&email=$eMail");
                        exit();
                    }else{                    
                    //Success
                    header("Location: Registration.php?Registrierung=success");
                    exit();
                    }
                }
                
            }
        }
        }
    }
}else{
    header("Location: Registration.php");
    exit();
}