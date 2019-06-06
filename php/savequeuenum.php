<?php
error_reporting(0);
include("dbconnect.php");
$email = $_POST['email'];
$company = $_POST['company'];
$queuename = $_POST['queuename'];
$holdnum = $_POST['holdnum'];
$qdate = $_POST['qdate'];
$newnum = $holdnum+1;
$status = "waiting";



if (strlen($email) > 0){
   
    
	$sql = "SELECT * FROM HOLDINGNUM WHERE EMAIL = '$email'";
	$oldresult = $conn->query($sql);
	$row = $oldresult ->fetch_assoc();
	
	$status2=$row["STATUS"];
	$qdate2=$row["DATE"];
	$currentdate=date("Y-m-d");
	
	if($status2 == "done"){
		$sqldelete = "DELETE FROM HOLDINGNUM WHERE EMAIL = '$email'";
		$conn->query($sqldelete);
		//echo 123;
	}
	
	if($qdate2 != $currentdate){
		$sqldelete = "DELETE FROM HOLDINGNUM WHERE EMAIL = '$email'";
		$conn->query($sqldelete);
		//echo $qdate2;
		//echo $status2;
		//echo 456;
	}
	
    
    $sqlinsert = "INSERT INTO HOLDINGNUM(EMAIL,COMPANY,QUEUENAME,HOLDINGNUM,DATE,STATUS) VALUES ('$email','$company','$queuename','$holdnum','$qdate','$status')";
	
		
    if ($conn->query($sqlinsert) === TRUE){
        $sqlupdate = "UPDATE AVAILABLENUM SET CURRENTAVAILABLENUM = '$newnum' WHERE COMPANY = '$company' AND QUEUENAME = '$queuename'";
         if ($conn->query($sqlupdate) === TRUE){
                echo "success";
         }else{
             echo "failed";
         }
    }else {
        echo "failed";
    }
}else{
    echo "nodata";
}

?>