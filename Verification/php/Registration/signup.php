<?php
    //manipulate data
     //function outputs a comma-separated string
     $vorname = $_POST['vorname'];
     $nachname = $_POST['nachname'];
     $email = $_POST['email'];
     $os= $_POST['os'];
     $res= $_POST['res'];
        
    include '../../../Mailer/php/sendRegistrationMail.php';

    //connect to database
  
    if (empty($vorname) || empty($nachname) || empty($email)) {
        $response = array(
            "empty" => "Please fill out every field!",
            "vorname" => "",
            "nachname" => "",
            "email" => "",
            "success" => "",
            "EmailTaken"=>""
        );
        echo json_encode($response);
        exit();
    }else{
        if(!preg_match("/^[a-zA-ZÜÖÄüöä]*$/", trim($vorname))){
            $response = array(
            "empty" => "",
            "vorname" => "Please enter a valid name!",
            "nachname" => "",
            "email" => "",
            "success" => "",
            "EmailTaken"=>""
            );
            echo json_encode($response);
            exit();
        }else{
            if (!preg_match("/^[a-zA-ZÜÖÄüöä]*$/", $nachname)
            ) {
                $response = array(
                    "empty" => "",
                    "vorname" => "",
                    "nachname" => "Please enter a valid name!",
                    "email" => "",
                    "success" => "",
                    "EmailTaken"=>""
                );
                echo json_encode($response);
                exit();
                }else {
                    if(!preg_match("/^[a-zA-Z0-9._%+-ÜÖÄüöä]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/u", $email)){
                        $response = array(
                            "empty" => "",
                            "vorname" => "",
                            "nachname" => "",
                            "email" => "Please enter a valid Email!",
                            "success" => "",
                            "EmailTaken"=>""
                        );
                        echo json_encode($response);
                        exit();
                    }else{
                    require("../../../DBConnection/mysql.php");
                    $stmt = $mysql->prepare("SELECT * FROM users WHERE EMAIL = :email"); //EMail ueberpruefen
                    $stmt->bindParam(":email", $_POST["email"]);
                    $stmt->execute();
                    $count = $stmt->rowCount();
                    if($count==0){
                        $pw=generate_password();
                        $stmt = $mysql->prepare("INSERT INTO users (EMAIL, PASSWORD, FIRST_NAME, SURNAME, screen_resolution, operating_system) VALUES (:email, :pw, :vorname, :nachname, :res, :os)");
                        $stmt->bindParam(":email", $_POST["email"]);
                        $stmt->bindParam(":pw", $pw);
                        $stmt->bindParam(":vorname", $vorname);
                        $stmt->bindParam(":nachname", $nachname);
                        $stmt->bindParam(":os", $os);
                        $stmt->bindParam(":res", $res);
                        $stmt->execute();
                        // Return a success response
                        $name=$vorname.' '.$nachname;
                        $response = array(
                            "empty" => "",
                            "vorname" => "",
                            "nachname" => "",
                            "email" => "",
                            "success" => "Registration successful. We've send you an Email with your one-time login credentials",
                            "EmailTaken"=>""
                            
                        );
                        echo json_encode($response);
                        sendRegistrationEmail($email,$name,$pw,$vorname);
                        exit();
                    }else{
                        $response = array(
                            "empty" => "",
                            "vorname" => "",
                            "nachname" => "",
                            "email" => "",
                            "success" => "",
                            "EmailTaken"=>"Email already connected to an existing Account"
                        );
                        echo json_encode($response);
                        exit();
                    }
                }
                     }
                }
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

?>