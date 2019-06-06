<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['email'];

$sql = "SELECT * FROM USER WHERE EMAIL = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $response["user"] = array();
   while ($row = $result ->fetch_assoc()){

        $userlist = array();
        $userlist[phone] = $row["PHONE"];
        $userlist[firstname] = $row["FIRSTNAME"];
        $userlist[lastname] = $row["LASTNAME"];
        $userlist[latitude] = $row["LATITUDE"];
        $userlist[longitude] = $row["LONGITUDE"];
        array_push($response["user"], $userlist);
    }
    echo json_encode($response);
}else{
    echo "nodata";
}
?>