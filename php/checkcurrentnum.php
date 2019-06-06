<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['email'];
//$password = sha1($_POST['password']);

$sql = "SELECT * FROM HOLDINGNUM WHERE EMAIL = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    $row = $result ->fetch_assoc();
    $qdate=$row["DATE"];
	$status=$row["STATUS"];
	$currentdate=date("Y-m-d");
    
	if($qdate==$currentdate){
		if($status=="servenow"){
			echo "success";
		}elseif($status=="done"){
			echo "close";
		}else{
			echo "failed";
		}
	}else{
		echo "failed";
	}
   
    //echo "<br>";
    
    //$sql2 = "SELECT * FROM USER WHERE EMAIL = '$email'";
    //$result2 = $conn->query($sql2);
    //$row2 = $result2 ->fetch_assoc();
    //$first=$row2["FIRSTNAME"];
    //echo "$first";
    
    
}else{
    echo "failed";
}
?>