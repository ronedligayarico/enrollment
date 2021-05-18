<?php 
 include('navbar.php');
?>

<html>
<head>
	<title>New Student</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php include "conn.php";

	if(isset($_POST['submit']))
{		
    $payment_reference_no = $_POST['payment_reference_no'];

		$sql1 = "SELECT payment_reference_no FROM tbl_payment WHERE `payment_reference_no` = '$payment_reference_no'";
		
			$result1 = $db->query($sql1);  
			if ($result1->num_rows > 0) {
  				while($row1 = $result1->fetch_assoc()) {
    			$payment_reference_no1 = $row1["payment_reference_no"];
				echo '<script>alert("Gcash transaction is not valid.")</script>'; 

				}
			}

    $insert = mysqli_query($db,"INSERT INTO `tbl_payment`(`payment_reference_no`) VALUES ('$payment_reference_no')");

    if($insert)
    {
    	header('location:index.php');
		// echo '<script>alert("Records added successfully.")</script>'; 
        // echo "Records added successfully.";
    }
}

mysqli_close($db); // Close connection
?>


<form method="POST">
	<div class="container mt-5 px-0">
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10 bg-success shadow text-light border rounded p-5">	
				<h5 class="text-warning">Important Note:</h5>
				<h6><small>A Non-Refunable Fee of P500 is required to be paid via Gcash before proceeding.</small></h6>
				<p><small><small>It will serve as processing fee and can be used upon enrollment.</small></small></p>
				<h6>Requirements for New Student</h6>
				<div class="container-fluid px-0 mt-2">
					<div class="row">
						<div class="col-12">
							<ul>
								<small>
									<li>
										Form 137
									</li>
									<li>
										Form 138
									</li>
									<li>
										Diploma Photocopy
									</li>
									<li>
										Good Moral
									</li>
									<li>
										NSO Photocopy
									</li>
									<li>
										3 pcs. 1x1 and 2x2 in green background
									</li>
									<li>
										Marriage Cert
									</li>			
									<li>
										Long Folder and Long Brown Envelope w/ Plastic
									</li>						
								</small>
							</ul>
						</div>	
					</div>	
				</div>
				<div>
					<input class="form-control mb-2" placeholder="Enter Gcash Transaction ID" name="payment_reference_no" required></input>
					<!-- <a class="btn btn-outline-light w-100" type="submit" name="submit">
						Proceed
					</a> -->
					<input class="btn btn-outline-light w-100" type="submit" name="submit" value="Proceed">
				</div>
			</div>
			<div class="col-1"></div>
		</div>	
	</div>	
</form>	
</body>
</html>
