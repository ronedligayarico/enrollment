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
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $bdate = $_POST['bdate'];
    $birthdate = date($bdate);
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $program = $_POST['program'];
    $year_sem = $_POST['year_sem'];            
	
	// echo $today;


    $insert = mysqli_query($db,"INSERT INTO `tbl_student`(`first_name`, `last_name`, `middle_name`, `birthdate`, `gender`, `email`, `contact_no` , `program`) VALUES ('$fname','$lname', '$mname','$birthdate','$gender','$email','$contactno','$program')");

    if($insert)
    {
		$sql = 'SELECT MAX(`student_id`) as student_id FROM tbl_student';

			$result = $db->query($sql);  
			if ($result->num_rows > 0) {
  				while($row = $result->fetch_assoc()) {
    			$student_id = $row["student_id"];
				}
			}
		$sql1 = 'SELECT MAX(`payment_id`) as payment_id FROM tbl_payment';

			$result1 = $db->query($sql1);  
			if ($result1->num_rows > 0) {
  				while($row1 = $result1->fetch_assoc()) {
    			$payment_id = $row1["payment_id"];
				}
			}
			 // die($year_sem);
				$sql2 = "UPDATE tbl_payment SET student_id='$student_id', year_sem = '$year_sem' WHERE payment_id='$payment_id'";

				if ($db->query($sql2) === TRUE) {
							?>
							<script type="text/javascript">;
							alert("Records added successfully.");
							window.location.href = "newstudent.php";
							</script>'; <?php
				}
        // echo "Records added successfully.";
    }
}

mysqli_close($db); // Close connection
?>

<form method="POST">
<div class="container mt-5">
		<div class="row">
			<div class="col-1"></div>
			
			<div class="col-10 shadow border p-5 rounded">
			<h2 class="container">Fill the Form</h2>
				  <div class="mb-3">
				    <label class="form-label">First Name</label>
				    <input type="text" class="form-control mb-3" name="fname" required placeholder="Please enter First name">
				    <label class="form-label">Middle Name</label>
				    <input type="text" class="form-control mb-3" name="mname" placeholder="Please enter Middle name">
				    <label class="form-label">Last Name</label>
				    <input type="text" class="form-control mb-3" name="lname" required placeholder="Please enter Last name">
				    <label class="form-label">Birthday</label>
				    <input type="date" class="form-control mb-3" name="bdate" placeholder="Please enter birthdate">
				    <label class="form-label">Gender</label>
				    <div class="mb-3">
					    <div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="gender" id="male" value="1">
						  <label class="form-check-label" for="exampleRadios1">
						    Male
						  </label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="gender" id="female" value="2">
						  <label class="form-check-label" for="exampleRadios2">
						    Female
						  </label>
						</div>
					</div>
					<div class="mb-3">
				      <label for="dSelect" class="form-label">Choose your program</label>
				      <select id="Select" class="form-select" name="program">
				        <option>BS Information Technology</option>
				        <option disabled="disabled">BS Business Administration</option>
				        <option disabled="disabled">BS Computer Engineering</option>
				        <option disabled="disabled">BS Computer Science</option>
				        <option disabled="disabled">BS Information System</option>
				        <option disabled="disabled">BA HRM</option>
				        <option disabled="disabled">BA Tourism</option>
				        <option disabled="disabled">...</option>
				      </select>
				    </div>	
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
				    <label class="form-label">Enter E-mail</label>
				    <input type="email" class="form-control mb-3" name="email" required placeholder="Please enter Email address">
				    <label class="form-label" maxlength="11">Enter Contact Number</label>
				    <input type="text" class="form-control mb-3" name="contactno" required placeholder="Please enter Contact number">
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
					<!-- <input type="submit" name="submit" value="Proceed"> -->
			</div>
			<div class="col-1"></div>
		</div>
	</div>

</form>

</body>
	
</body>
</html>