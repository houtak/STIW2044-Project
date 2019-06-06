<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['email'];

$sqldelete = "DELETE FROM HOLDINGNUM WHERE EMAIL = '$email'";


if ($conn->query($sqldelete) === TRUE) {
    echo "success";
}else{
    echo "failed";
}


?>