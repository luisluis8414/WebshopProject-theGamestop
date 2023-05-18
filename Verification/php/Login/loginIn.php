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
            $hash_pw=hash('sha512',$row["PASSWORD"]);
            if ($pw==$hash_pw) {
                $_SESSION['logged_in'] = true;
                if($row["erster_login"]==1){
                $response = array(
                    "email" => "",
                    "pw"=>"",
                    "RightCredentials"=>"true",
                    "firstLogin"=>"true"
                );
                echo json_encode($response);
                exit();
            }else{
                $response = array(
                    "email" => "",
                    "pw"=>"",
                    "RightCredentials"=>"true",
                    "firstLogin"=>""
                );
                echo json_encode($response);
                exit();
            }
            } else {
                $response = array(
                    "email" => "",
                    "pw"=>"Wrong password",
                    "RightCredentials"=>"",
                    "firstLogin"=>""
                );
                echo json_encode($response);
                exit();
            }
        } else {
            $response = array(
                "email" => "No Account connected to this email",
                "pw"=>"",
                "RightCredentials"=>"",
                "firstLogin"=>""
            );
            echo json_encode($response);
            exit();
        }
?>