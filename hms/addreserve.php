<?php

include 'headers/headerreserve.php';

if (isset($_POST['addbtn'])) {

    include "databaseconfig/config.php";

    $RESERVE_ID = $_POST["t1"];
    $CUST_ID = $_POST["t2"];
    $ROOM_ID = $_POST["t3"];
    $RESERVE_DATE = $_POST["t4"];
    $CHECK_IN  = $_POST["t5"];
    $CHECK_OUT = $_POST["t6"];
    $DAYS_RANGE = $_POST["t7"];

    $sql = "Insert into reservation values('$RESERVE_ID','$CUST_ID','$ROOM_ID','$RESERVE_DATE','$CHECK_IN','$CHECK_OUT','$DAYS_RANGE')";

    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    header("Location: http://localhost/hms/crud_reserve.php");

    mysqli_close($conn);
}
?>



<div id="main-content">
    <h2>Add New Record</h2>

    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


        <div class="form-group">
            <label>Reservation Id</label>
            <input type="text" name="t1" />
        </div>

        <div class="form-group">
            <label>Customer Id</label>
            <input type="text" name="t2" />
        </div>

        <div class="form-group">
            <label>Room Id</label>
            <input type="text" name="t3" />
        </div>

        <div class="form-group">
            <label>Reservation Date</label>
            <input type="date" name="t4" placeholder="yyyy-mm-dd" />
        </div>

        <div class="form-group">
            <label>Check in</label>
            <input type="date" name="t5" placeholder="yyyy-mm-dd" />
        </div>

        <div class="form-group">
            <label>Check Out</label>
            <input type="date" name="t6" placeholder="yyyy-mm-dd" />
        </div>

        <div class="form-group">
            <label>Days Range</label>
            <input type="text" name="t7" />
        </div>


        <input class="submit" type="submit" name="addbtn" value="add" />


    </form>
</div>
</div>
