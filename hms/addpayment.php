<?php

include 'headers/headerpaymentdetails.php';

if (isset($_POST['addbtn'])) {

    include "databaseconfig/config.php";

    $PAY_ID = $_POST["t1"];
    $CUST_ID = $_POST["t2"];
    $PAY_DATE = $_POST["t3"];
    $PAY_AMT = $_POST["t4"];
    $PAY_TYPE = $_POST["t5"];
    $sql = "Insert into payment values('$PAY_ID','$CUST_ID','$PAY_DATE','$PAY_AMT','$PAY_TYPE')";

    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: http://localhost/hms/details_payment.php");
    mysqli_close($conn);
}
?>



<div id="main-content">
    <h2>Add New Record</h2>

    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


        <div class="form-group">
            <label>Payment Id</label>
            <input type="text" name="t1" />
        </div>

        <div class="form-group">
            <label>Customer Id</label>
            <input type="text" name="t2" />
        </div>

        <div class="form-group">
            <label>Payment Date</label>
            <input type="date" name="t3" placeholder="yyyy-mm-dd" />
        </div>

        <div class="form-group">
            <label>Pay Amount</label>
            <input type="text" name="t4" />
        </div>


        <div class="form-group">
            <label>Payment Type</label>
            <select name="t5">
                <option value="cash">cash</option>
                <option value="card">card</option>
                <option value="Gpay">Gpay</option>
            </select>
        </div>


        <input class="submit" type="submit" name="addbtn" value="add" />
    </form>
</div>
</div>
