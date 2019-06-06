<?php
    //ini_set( 'display_errors', 1 );
    error_reporting(0);
    include_once("dbconnect.php");
    $email = $_POST['email'];
    $sql = "SELECT * FROM USER WHERE EMAIL = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
         while ($row = $result ->fetch_assoc()){
             $ran = $row["PASSWORD"];
         }
        $from = "noreply@tanas.com";
        $to = $email;
        $subject = "From TANAS. Reset your password";
        $message = "Use the following link to reset your password :"."\n http://wht0912.000webhostapp.com/tanas/php/reset_password.php?email=".$email."&key=".$ran;
        $headers = "From:" . $from;
        mail($email,$subject,$message, $headers);
        echo "success";
    }else{
        echo "failed";
    }
    
    
?>
