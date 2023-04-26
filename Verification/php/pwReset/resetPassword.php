<?php
if (isset($_POST['submit'])) {
    //connect to database
    require("mysql.php");
    $stmt = $mysql->prepare("SELECT * FROM users WHERE EMAIL = :eMail"); //EMail ueberpruefen
    $stmt->bindParam(":eMail", $_POST["eMail"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 0) {
        if ($_POST['pw'] == $_POST['pw2']) {
            //User anlegen
            $stmt = $mysql->prepare("INSERT INTO users (EMAIL, PASSWORD) VALUES (:eMail, :pw)");
            $stmt->bindParam(":eMail", $_POST["eMail"]);
            $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
            $stmt->bindParam(":pw", $hash);
            $stmt->execute();
            $sucsess = true;
        }
    }
}
?>

<!-- else {
                            //Are both Passwords the same
                            if ($pw !== $pw2) {
                                header("Location: Registration.php?Registrierung=pw&vorname=$vorname&nachname=$nachname&email=$eMail");
                                exit();
                            } else {
                                if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{9,}$/', $pw)) {
                                    header("Location: Registration.php?Registrierung=NotStrongEnough&vorname=$vorname&nachname=$nachname&email=$eMail");
                                    exit();
                                } else {
                                    //Success
                                    header("Location: Registration.php?Registrierung=success");
                                    exit();
                                }
                            }
                        }  -->