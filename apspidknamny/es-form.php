<?php 
 include('navbar.php');
?>

<html>
<head>
	<title>Enroll</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<script>
function showSubject(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getsubject.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>    
</head>

<body>
<!-- FORM -->
<?php include "conn.php";

	if(isset($_POST['submit']))
{		
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $student_id = $_POST['student_id'];
    $year_sem = $_POST['year_sem'];  
	// die($today);
	// echo $today;


		$sql1 = 'SELECT MAX(`payment_id`) as payment_id FROM tbl_payment';

			$result1 = $db->query($sql1);  
			if ($result1->num_rows > 0) {
  				while($row1 = $result1->fetch_assoc()) {
    			$payment_id = $row1["payment_id"];
				}
			}
				$sql = "UPDATE tbl_payment SET student_id='$student_id' , year_sem = '$year_sem' WHERE payment_id='$payment_id'";

				if ($db->query($sql) === TRUE) {
					$sql2 = "UPDATE tbl_student SET email = '$email', contact_no = '$contactno' WHERE student_id='$student_id'";

						if ($db->query($sql2) === TRUE) {
							?>
							<script type="text/javascript">;
							alert("Records added successfully.");
							window.location.href = "existingstudent.php";
							</script>'; <?php
						}
				}

        // echo "Records added successfully.";

}

mysqli_close($db); // Close connection
?>

<h3>Fill the Form</h3>
<form method="POST">
	<div class="container mt-5">
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10 shadow border p-5 rounded">
				<form>
				  <div class="mb-3">
				    <label class="form-label">Enter Student ID</label>
				    <input type="text" class="form-control mb-3" name="student_id" required>
				    <label class="form-label">Enter E-mail</label>
				    <input type="email" class="form-control mb-3" name="email" required>
				    <label class="form-label">Enter Contact Number</label>
				    <input type="text" class="form-control mb-3" name="contactno" required>
				    <div class="mb-3">
						<label for="dSelect" class="form-label">Select year</label>
				    	<select id="year_sem" class="form-select" name="year_sem" onchange="showSubject(this.value)">
				    	<option value="11">1st Year 1st Sem</option>
				        <option value="12">1st Year 2nd Sem</option>
				        <option value="21">2nd Year 1st Sem</option>
				        <option value="22">2nd Year 2nd Sem</option>
				        <option value="31">3rd Year 1st Sem</option>
				        <option value="32">3rd Year 2nd Sem</option>
				        <option value="41">4th Year 1st Sem</option>
				        <option value="42">4th Year 2nd Sem</option>
				        </select>
				    </div>	
				    <div id="txtHint"><b></b></div>					    
				    <div class="form-text">
				    	<div class="container border border-5 p-3 rounded-3">
				    		<h6 class="text-danger "><strong>Important Note:</strong></h6>
					    	<p class="">Please wait for the confirmation that will be sent to the
					    	contact information indicated above regarding
					    	the release of your evaluation form.</p>
					    	<div class="form-check">
							  <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
							  <label class="form-check-label" for="exampleCheck1">I Understand</label>
							</div>
				    	</div>
				    </div>
				  </div>
 				  <button type="submit" name="submit" value="Submit" class="btn btn-success w-100">Submit</button>
				</form>
			</div>
			<div class="col-1"></div>
		</div>
	</div>
</form>	
</body>
</html>