<html>
<head>

</head>
<body>

<?php
$q = intval($_GET['q']);

include "conn.php";

// $sql="SELECT * FROM tbl_curriculum WHERE year_sem = '".$q."'";
// $result = mysqli_query($con,$sql);
?>
 <div class="mb-3">
              <label for="dSelect" class="form-label">Subject available</label>
               <?php
          include "conn.php";
            $sql5 = "SELECT * FROM `tbl_curriculum` WHERE year_sem = '".$q."'";
              $result5 = $db->query($sql5);  
              if ($result5->num_rows > 0) {
                ?>

                        <?php
                  while($row = $result5->fetch_assoc()) {
                              echo "<option value='" . $row['curriculumID'] ."' >" . $row['subjectName'] ."</option>";

                  }
              }
              mysqli_close($db);
            ?>

            </div>
</body>
</html>