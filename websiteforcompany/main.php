<?php session_start(); ?>
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
                <h2 style="text-shadow:2px 1px 0 #444">STAFF PAGE</h2>
            </div>
			
            <div class="row">
				<p>
				    <a href="#" class="btn btn-primary">Add Queue & Generate QR Code</a>
					<a href="#" class="btn btn-success">Manage Queue</a>
					<a href="logout.php" class="btn btn-danger">Logout</a>
                </p>
				
				<br>
			
                <table class="w3-table-all w3-card-4">
                  <thead>
                    <tr class="w3-light-grey">
                      <th>Queue Name</th>
                      <th>QR Code</th>
					  <th>Action</th>
		
                    </tr>
                  </thead>
                  <tbody>
                  <?php
								require_once('database.php');
								
								$company=$_SESSION["company"];
								
								$result = $conn->prepare("SELECT * FROM AVAILABLENUM WHERE COMPANY='$company'");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								//$id=$row['id'];
							?>
								<tr>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['QUEUENAME']; ?></td>
								<td style="text-align:center; margin-top:10px; word-break:break-all; width:450px; line-height:100px;">
									<img src="uploads/<?php echo $company.",".$row['QUEUENAME']; ?>" width="100px" height="100px" style="border:1px solid #333333;">
								</td>

								<?php 
								echo '<td width=250>';
								echo '<a class="btn btn-success" href="listnum.php?queuename='.$row ['QUEUENAME'].'">Choose</a>'; 
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