    <?php
        session_start();
        $email = $_POST['email'];
        $pw = $_POST['pw'];
        $os = $_POST['os'];
        $res = $_POST['res'];
        
        require("../../../DBConnection/mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM users WHERE EMAIL = :email"); //EMail ueberpruefen
        $stmt->bindParam(":email",  $email);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            //Email ist vergeben
            $row = $stmt->fetch();
            $server_pw=$row["PASSWORD"];
            if ($pw==$server_pw) {
                if($row["erster_login"]==1){
                $response = array(
                    "email" => "",
                    "pw"=>"",
                    "RightCredentials"=>"true",
                    "firstLogin"=>"1"
                );
                echo json_encode($response);
                exit();
            }else{
                if($row["erster_login"]==2){
                    $response = array(
                        "email" => "",
                        "pw"=>"",
                        "RightCredentials"=>"true",
                        "firstLogin"=>"2"
                    );
                    echo json_encode($response);
                    exit();
                }else{
                    $_SESSION['logged_in'] = true;
                    $_SESSION['email'] =  $email;
                    $stmt = $mysql->prepare("UPDATE users SET screen_resolution = :res, operating_system = :os WHERE email = :email");
                     $stmt->bindParam(":email", $email);           
                    $stmt->bindParam(":os", $os);
                    $stmt->bindParam(":res", $res);
                    $stmt->execute(); 
                    $response = array(
                        "email" => "",
                        "pw"=>"",
                        "RightCredentials"=>"true",
                        "firstLogin"=>"0"
                );
                echo json_encode($response);
                exit();
                }
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