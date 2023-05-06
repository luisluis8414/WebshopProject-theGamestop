    <?php
        session_start();
        $email = $_POST['email'];
        $pw = $_POST['pw'];
        
        require("../../../DBConnection/mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM users WHERE EMAIL = :email"); //EMail ueberpruefen
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            //Email ist vergeben
            $row = $stmt->fetch();
            if (password_verify($_POST["pw"], $row["PASSWORD"])) {
                $_SESSION['logged_in'] = true;
                $response = array(
                    "email" => "",
                    "pw"=>"",
                    "RightCredentials"=>"true"
                );
                echo json_encode($response);
                exit();
            } else {
                $response = array(
                    "email" => "",
                    "pw"=>"Wrong password",
                    "RightCredentials"=>""
                );
                echo json_encode($response);
                exit();
            }
        } else {
            $response = array(
                "email" => "No Account connected to this email",
                "pw"=>"",
                "RightCredentials"=>""
            );
            echo json_encode($response);
            exit();
        }
?>