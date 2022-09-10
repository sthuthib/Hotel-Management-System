<?php

include 'headers/headerroom.php';

if (isset($_POST['addbtn'])) {

    include "databaseconfig/config.php";

    $ROOM_ID = $_POST["t1"];
    $ROOM_TYPE = $_POST["t2"];
    $ROOM_BED = $_POST["t3"];
    $ROOM_MEAL = $_POST["t4"];
    $RPRICE = $_POST["t5"];


    $sql = "Insert into room values('$ROOM_ID','$ROOM_TYPE','$ROOM_BED','$ROOM_MEAL','$RPRICE')";

    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    header("Location: http://localhost/hms/crud_room.php");

    mysqli_close($conn);
}
?>



<div id="main-content">
    <h2>Add New Record</h2>

    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


        <div class="form-group">
            <label>Room ID</label>
            <input type="text" name="t1" />
        </div>

        <div class="form-group">
            <label>Room Type</label>
            <select name="t2" value="<?php echo $row['ROOM_TYPE']; ?>">
                <option value="Superior">Superior</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Single">Single</option>
            </select>
        </div>

        <div class="form-group">
            <label>Bedding</label>
            <select name="t3" value="<?php echo $row['ROOM_BED']; ?>">
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Triple">Triple</option>
                <option value="Quad">Quad</option>
            </select>
        </div>

        <div class="form-group">
            <label>Room Meal</label>
            <select name="t4" value="<?php echo $row['ROOM_MEAL']; ?>">
                <option value="Room Only">Room Only</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Half Board">Half Board</option>
                <option value="Full Board">Full Board</option>
            </select>
        </div>
        <div class="form-group">
            <label>Room Price</label>
            <input type="text" name="t5" />
        </div>

        <input class="submit" type="submit" name="addbtn" value="add" />


    </form>
</div>
</div>
