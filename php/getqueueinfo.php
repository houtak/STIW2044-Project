<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['email'];


$sql = "SELECT * FROM HOLDINGNUM WHERE EMAIL = '$email' AND STATUS = 'waiting'";
	
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $response["queueinfo"] = array();
   while ($row = $result ->fetch_assoc()){
        
        $restlist = array();
        $restlist[yrnum] = $row["HOLDINGNUM"];
        $restlist[company] = $row["COMPANY"];
		$company = $row["COMPANY"];
        $restlist[queuename] = $row["QUEUENAME"];
		$queuename = $row["QUEUENAME"];
        $restlist[qdate] = $row["DATE"];
        
			$sqlcurrent = "SELECT * FROM HOLDINGNUM WHERE COMPANY = '$company' AND QUEUENAME = '$queuename' AND STATUS = 'servenow'";
			$resultcurrent = $conn->query($sqlcurrent);
			$rowcurnum = $resultcurrent ->fetch_assoc();
			$currentnum = $rowcurnum["HOLDINGNUM"];                                                    //get current servenum
		
		$restlist[currentnum] = $currentnum;
        
		array_push($response["queueinfo"], $restlist);
    }
    echo json_encode($response);
}else{
    echo "nodata";
}
?>