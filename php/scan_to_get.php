<?php
error_reporting(0);
include_once("dbconnect.php");
$company = $_POST['company'];
$queuename = $_POST['queuename'];
$sql = "SELECT * FROM AVAILABLENUM WHERE COMPANY = '$company' AND QUEUENAME = '$queuename'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row = $result ->fetch_assoc();
	$date=$row["DATE"];
	$currentdate=date("Y-m-d");
	
	//echo $currentdate;
	
	if($date==$currentdate){
		$sql2 = "SELECT * FROM AVAILABLENUM WHERE COMPANY = '$company' AND QUEUENAME = '$queuename'";
		$result2 = $conn->query($sql2);
		
		if ($result2->num_rows > 0) {
		$response["num"] = array();
			while ($row2 = $result2 ->fetch_assoc()){
				$numlist = array();
				
				$numlist[company] = $row["COMPANY"];
				$numlist[queuename] = $row["QUEUENAME"];
				$numlist[currentavailablenum] = $row["CURRENTAVAILABLENUM"];
				$numlist[qdate] = $row["DATE"];

				array_push($response["num"], $numlist);
			}
			echo json_encode($response);
		}
	}else{
	    
	    //echo 123;
	    
		$sqlreset = "SELECT * FROM RESETNUM WHERE COMPANY = '$company' AND QUEUENAME = '$queuename'";
		$resultreset = $conn->query($sqlreset);
		$rowreset = $resultreset ->fetch_assoc();
		$basenum=$rowreset["BASENUM"]; //first num eg. 1000
		
		//echo $company;
	    //echo $basenum;
		
		
		$sqlupdate = "UPDATE AVAILABLENUM SET CURRENTAVAILABLENUM = '$basenum', DATE = '$currentdate' WHERE COMPANY = '$company' AND QUEUENAME = '$queuename'";
		$conn->query($sqlupdate);
		
		$sql2 = "SELECT * FROM AVAILABLENUM WHERE COMPANY = '$company' AND QUEUENAME = '$queuename'";
		$result2 = $conn->query($sql2);
		
		if ($result2->num_rows > 0) {
		$response["num"] = array();
			while ($row2 = $result2 ->fetch_assoc()){
				$numlist = array();
				
				$numlist[company] = $row["COMPANY"];
				$numlist[queuename] = $row["QUEUENAME"];
				$numlist[currentavailablenum] = $row["CURRENTAVAILABLENUM"];
				$numlist[qdate] = $row["DATE"];

				array_push($response["num"], $numlist);
			}
			echo json_encode($response);
		}
		
	}
	
}

?>