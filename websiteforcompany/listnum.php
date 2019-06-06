<?php session_start(); ?>

<? 

$queuename = null;

if (!empty($_GET['queuename'])) {
        $queuename = $_REQUEST['queuename'];
		
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<body background="images/b.png">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h2 style="text-shadow:2px 1px 0 #444">List of queue number for <?php echo $queuename ?> </h2>
            </div>
			
            <div class="row">
				<p>
				    <a href="main.php" class="btn btn-primary">Back</a>
                </p>
				
				<br>
			
                <table class="w3-table-all w3-card-4">
                  <thead>
                    <tr class="w3-light-grey">
                      <th></th>
                      <th>QR Code</th>
					  <th>Action</th>
		
                    </tr>
                  </thead>
                  <tbody>
                  <?php
								require_once('database.php');
								
								$company=$_SESSION["company"];
								
								$currentdate=date("Y-m-d");
								
								$result = $conn->prepare("SELECT * FROM HOLDINGNUM WHERE COMPANY='$company' AND QUEUENAME='$queuename' AND DATE='$currentdate'");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								//$id=$row['id'];
							?>
								<tr>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['HOLDINGNUM']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['STATUS']; ?></td>
								

								<?php 
								echo '<td width=250>';
								echo '<a class="btn btn-success" href="call.php?queuename='.$row ['QUEUENAME'].'&holdnum='.$row ['HOLDINGNUM'].'">CALL</a>'; 
								echo '</td>';
								?>
								
								<?php 
								echo '<td width=250>';
								echo '<a class="btn btn-success" href="done.php?queuename='.$row ['QUEUENAME'].'&holdnum='.$row ['HOLDINGNUM'].'">DONE</a>'; 
								echo '</td>';
								?>
															
						
								<?php } ?>
								</tr>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>