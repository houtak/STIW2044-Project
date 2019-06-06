<?php
session_start(); 
require_once ('database.php');

$queuename = null;
$holdnum = null;



    if ( !empty($_GET['queuename'])) {
        $queuename = $_REQUEST['queuename'];
		$holdnum = $_REQUEST['holdnum'];
		
		
		
    }
     
    if ( null==$id ) {
        header("Location: listnum.php");
    }

	if (isset($_POST['Submit'])) {
	
	if ( !empty($_GET['company'])) {
        $company = $_REQUEST['company'];
		$queuename = $_REQUEST['queuename'];
		$holdnum = $_REQUEST['holdnum'];
		
	}
		
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE HOLDINGNUM set STATUS = 'servenow' WHERE COMPANY='$company' AND QUEUENAME='$queuename' AND HOLDINGNUM='$holdnum'";

		$conn->exec($sql);
		echo "<script>alert('Notified customer already!!!'); window.location='listnum.php'</script>";
	
}
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<body background="images/b.png">
	<style>
	.form { 
	margin: 0 auto; 
	width:250px;
	line-height: 200%:
	}
	</style>
</head>
 
<body>
    <form method="post" action="call.php?company=<?php echo $_SESSION["company"]?>&queuename=<?php echo $queuename?>&holdnum=<?php echo $holdnum?>"  enctype="multipart/form-data" class="form">
	
	<p>Are You Sure To Call This Number ?</p>
    
	</div>
    <div>
   <a class="btn" href="listnum.php" class="btn btn-primary">Back</a>
<button type="submit" name="Submit" class="btn btn-danger">Yes</button>
    </div>
</form>
  </body>
</html>