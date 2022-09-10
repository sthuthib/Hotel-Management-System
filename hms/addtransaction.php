<?php

include 'headers/headertransaction.php';

if (isset($_POST['addbtn'])) {

    include "databaseconfig/config.php";

    $TRANSACTION_ID  = $_POST["t1"];
    $TRANSACTION_NAME = $_POST["t2"];
    $CUST_ID = $_POST["t3"];
    $RESERVE_ID = $_POST["t4"];
    $EMP_ID = $_POST["t5"];
    $TRANSACTION_DATE = $_POST["t6"];

    $sql = "Insert into transactions values('$TRANSACTION_ID','$TRANSACTION_NAME','$CUST_ID','$RESERVE_ID','$EMP_ID','$TRANSACTION_DATE')";

    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    header("Location: http://localhost/hms/crud_transaction.php");

    mysqli_close($conn);
}
?>



<div id="main-content">
    <h2>Add New Record</h2>

    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


        <div class="form-group">
            <label>TRANSACTION ID</label>
            <input type="text" name="t1" />
        </div>

        <div class="form-group">
            <label>TRANSACTION NAME</label>
            <input type="text" name="t2" />
        </div>

        <div class="form-group">
            <label>CUSTOMER ID</label>
            <input type="text" name="t3" />
        </div>

        <div class="form-group">
            <label>RESERVATION ID</label>
            <input type="text" name="t4" />
        </div>


        <div class="form-group">
            <label>EMPLOYEE ID</label>
            <input type="text" name="t5" />
        </div>

        <div class="form-group">
            <label>TRANSACTION DATE</label>
            <input type="text" name="t6" />
        </div>


        <input class="submit" type="submit" name="addbtn" value="add" />


    </form>
</div>
</div>
