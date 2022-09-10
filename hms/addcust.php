<?php
include 'headers/headercust.php';
if (isset($_POST['addbtn'])) {
    include "databaseconfig/config.php";
    $CUST_ID = $_POST["t1"];
    $CUST_NAME = $_POST["t2"];
    $CUST_ADDRESS = $_POST["t3"];
    $CUST_EMAIL = $_POST["t4"];
    $CUST_PHONE = $_POST["t5"];

    $sql = "Insert into customer values('$CUST_ID','$CUST_NAME','$CUST_ADDRESS','$CUST_EMAIL','$CUST_PHONE')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: http://localhost/hms/crud_customer.php");
    mysqli_close($conn);
}
?>
<div id="main-content">
    <h2>Add New Record</h2>

    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Customer ID</label>
            <input type="text" name="t1" />
        </div>

        <div class="form-group">
            <label>Customer Name</label>
            <input type="text" name="t2" />
        </div>

        <div class="form-group">
            <label>Customer Address</label>
            <input type="text" name="t3" />
        </div>

        <div class="form-group">
            <label>Customer Email</label>
            <input type="text" name="t4" />
        </div>
        <div class="form-group">
            <label>Customer Number</label>
            <input type="number" pattern="[0-9]*" name="t5"/>
        </div>
        <input class="submit" type="submit" name="addbtn" value="add" />
    </form>
</div>
</div>
