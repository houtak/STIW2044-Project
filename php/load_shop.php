<?php
error_reporting(0);
include_once("dbconnect.php");
$location = $_POST['location'];
if (strcasecmp($location, "All") == 0){
    $sql = "SELECT * FROM COMPANY"; 
}else{
    $sql = "SELECT * FROM COMPANY WHERE AREA = '$location'";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $response["rest"] = array();
   while ($row = $result ->fetch_assoc()){
        //$row = $result ->fetch_assoc();
        $restlist = array();
        $restlist[restid] = $row["COMPID"];
        $restlist[name] = $row["COMPNAME"];
        $restlist[phone] = $row["PHONE"];
        $restlist[address] = $row["ADDRESS"];
        $restlist[location] = $row["AREA"];
         $restlist[operationhour] = $row["OPERATIONHOUR"];
        array_push($response["rest"], $restlist);
    }
    echo json_encode($response);
}else{
    echo "nodata";
}
?>