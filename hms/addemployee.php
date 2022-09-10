<?php

include 'headers/headeremployee.php';

if (isset($_POST['addbtn'])) {

    include "databaseconfig/config.php";

    $EMP_ID = $_POST["t1"];
    $EMP_NAME = $_POST["t2"];
    $JOB_DEPT = $_POST["t3"];
    $CONTACT_NUM = $_POST["t4"];
    $SALARY = $_POST["t5"];

    $sql = "Insert into employee values('$EMP_ID','$EMP_NAME','$JOB_DEPT','$CONTACT_NUM','$SALARY')";

    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    header("Location: http://localhost/hms/crud_employee.php");

    mysqli_close($conn);
}
?>



<div id="main-content">
    <h2>Add New Record</h2>

    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


        <div class="form-group">
            <label>Employee ID</label>
            <input type="text" name="t1" />
        </div>

        <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="t2" />
        </div>

        <div class="form-group">
            <label>Job Dept</label>
            <input type="text" name="t3" />
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="t4" />
        </div>


        <div class="form-group">
            <label>Salary</label>
            <input type="text" name="t5" />
        </div>



        <input class="submit" type="submit" name="addbtn" value="add" />


    </form>
</div>
</div>
