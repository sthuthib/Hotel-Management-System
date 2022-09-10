<?php

include 'headers/headeremployee.php';

if (isset($_POST['updatebtn'])) {

  //include "config.php";

  $EMP_ID = $_POST["e1"];
  $EMP_NAME = $_POST["e2"];
  $JOB_DEPT = $_POST["e3"];
  $CONTACT_NUM = $_POST["e4"];
  $SALARY = $_POST["e5"];


  include 'databaseconfig/config.php';

  //$sql = "UPDATE student SET SNAME = '$SNAME', ADDRESS = '$ADDRESS', PHONE = '$PHONE',GENDER = '$GENDER' WHERE USN = '$USN'";
  //or
  $sql = "UPDATE EMPLOYEE SET EMP_NAME = '{$EMP_NAME}', JOB_DEPT = '{$JOB_DEPT}', CONTACT_NUM = '{$CONTACT_NUM}',SALARY = '{$SALARY}' WHERE EMP_ID = '{$EMP_ID}'";

  header("Location: http://localhost/hms/crud_employee.php");

  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  header("Location: http://localhost/hms/crud_employee.php");

  mysqli_close($conn);
}
?>



<?php
include 'databaseconfig/config.php';

$EMP_ID = $_GET['EMP_ID'];

//$sql = "SELECT * FROM student WHERE USN = {$usn}";

$sql = "SELECT * FROM EMPLOYEE WHERE EMP_ID = '$EMP_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
?>



    <div id="main-content">
      <h2>Update Record</h2>
      <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="form-group">
          <label>Employee ID</label>
          <input type="text" name="e1" value="<?php echo $row['EMP_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>Employee Name</label>
          <input type="text" name="e2" value="<?php echo $row['EMP_NAME']; ?>" />
        </div>

        <div class="form-group">
          <label>Job Dept</label>
          <input type="text" name="e3" value="<?php echo $row['JOB_DEPT']; ?>" />
        </div>

        <div class="form-group">
          <label>Phone</label>
          <input type="text" name="e4" value="<?php echo $row['CONTACT_NUM']; ?>" />
        </div>

        <div class="form-group">
          <label>Salary</label>
          <input type="text" name="e5" value="<?php echo $row['SALARY']; ?>" />
        </div>

        <input class="submit" type="submit" name="updatebtn" value="update" />

      </form>
  <?php
  }
}
  ?>
    </div>
