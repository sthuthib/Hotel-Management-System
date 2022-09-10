<?php
include 'headers/headeremployee.php';
?>
<div id="main-content">
  <h2>All Records of Employee</h2>
  <?php
  include 'databaseconfig/config.php';

  $sql = "SELECT * FROM EMPLOYEE ";
  // $sql = "CALL display_studentrecods";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  if (mysqli_num_rows($result) > 0) {
  ?>
    <table cellpadding="7px">
      <thead>
        <th>EMP ID</th>
        <th>EMP Name</th>
        <th>Job Dept</th>
        <th>Phone</th>
        <th>Salary</th>

      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row['EMP_ID']; ?></td>
            <td><?php echo $row['EMP_NAME']; ?></td>
            <td><?php echo $row['JOB_DEPT']; ?></td>
            <td><?php echo $row['CONTACT_NUM']; ?></td>
            <td><?php echo $row['SALARY']; ?></td>


            <td>
              <a href='updateemployee.php?EMP_ID=<?php echo $row['EMP_ID']; ?>'>Edit</a>
              <a href='deleteemployee.php?EMP_ID=<?php echo $row['EMP_ID']; ?>'>Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } else {
    echo "<h2>No Record Found</h2>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>
</body>

</html>