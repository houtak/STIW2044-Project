<?php
error_reporting(0);
include_once("dbconnect.php");
$area = $_POST['area'];
if (strcasecmp($area, "All") == 0){
    $sql = "SELECT * FROM COMPANY"; 
}else{
    $sql = "SELECT * FROM COMPANY WHERE AREA = '$area'";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $response["comp"] = array();
    while ($row = $result ->fetch_assoc()){
        $complist = array();
        $complist[compid] = $row["COMPID"];
        $complist[compname] = $row["COMPNAME"];
        $complist[phone] = $row["PHONE"];
        $complist[address] = $row["ADDRESS"];
        $complist[area] = $row["AREA"];
        array_push($response["comp"], $complist);
    }
    echo json_encode($response);
}else{
    echo "nodata";
}
?>