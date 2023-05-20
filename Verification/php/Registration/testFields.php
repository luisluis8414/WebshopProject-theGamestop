<?php
    //manipulate data
     //function outputs a comma-separated string
     $vorname = $_POST['vorname'];
     $nachname = $_POST['nachname'];
     $email = $_POST['email'];
     
        
  

    //connect to database
  
    if (empty($vorname) || empty($nachname) || empty($email)) {
        $response = array(
            "empty" => "Please fill out every field!",
            "vorname" => "",
            "nachname" => "",
            "email" => "",
            "success" => ""

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
            "success" => ""

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
                    "success" => ""
        
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
                            "success" => ""
                
                        );
                        echo json_encode($response);
                        exit();
                    }else{
                        $response = array(
                            "empty" => "",
                            "vorname" => "",
                            "nachname" => "",
                            "email" => "",
                            "success" => "Sucsess!"
                
                        );
                        echo json_encode($response);
                        exit();
                }
                     }
                }
    }

?>