<?php
error_reporting(0);
include("dbconnect.php");
$email = $_POST['email'];
$password = sha1($_POST['password']);
$phone = $_POST['phone'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
if (strlen($email) > 0){
    $sqlinsert = "INSERT INTO USER(EMAIL,PASSWORD,PHONE,FIRSTNAME,LASTNAME,LATITUDE,LONGITUDE) VALUES ('$email','$password','$phone','$fname','$lname','$latitude','$longitude')";
    if ($conn->query($sqlinsert) === TRUE){
       echo "success";
    }else {
        echo "failed";
    }
}else{
    echo "nodata";
}

?>