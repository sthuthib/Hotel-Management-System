<?php
include("databaseconfig/config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form

   $USERNAME = mysqli_real_escape_string($conn, $_POST['USERNAME']);
   $PASSWD = mysqli_real_escape_string($conn, $_POST['PASSWD']);

   $sql = "SELECT ID FROM admin WHERE USERNAME = '$USERNAME' and PASSWD = '$PASSWD'";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


   $count = mysqli_num_rows($result);

   // If result matched $myusername and $mypassword, table row must be 1 row

   if ($count == 1) {


      header("Location: http://localhost/hms/index1.php");
   } else {
      $error = "Your Login Name or Password is invalid";
   }
}
?>
<html>

<head>
   <title>Login Page</title>

   <style>
      body {
         background-image: url('images/hotel1.jpg');
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: 100% 100%;
      }
   </style>

   <style type="text/css">
      body {
         font-family: Arial, Helvetica, sans-serif;
         font-size: 14px;
      }

      label {
         font-weight: bold;
         width: 100px;
         font-size: 14px;
      }

      .box {
         border: #666666 solid 1px;
      }

      #header{
          text-align: center;
          background-color: #552900;
          padding: 10px;
      }

      #header h1{
          color: #fff;
          font-size: 40px;
          font-style: italic;
          font-weight: 700;
          text-transform: uppercase;
          margin: 0;
      }

      #menu {
         background-color: #333;
      }

      #menu ul {
         font-size: 0;
         padding: 0 10px;
         margin: 0;
         list-style: none;
      }

      #menu ul li {
         display: inline-flex;
      }

      #menu ul li a {
         color: #fff;
         font-size: 16px;
         font-weight: 600;
         padding: 8px 10px;
         display: flex;
         flex-wrap: wrap;
         align-content: flex-start;
         text-decoration: none;
         text-transform: uppercase;
         transition: all 0.3s ease;
      }
   </style>

</head>
<div id="wrapper">
    <div id="header">
        <h1>Hotel Management System</h1>
    </div>
    <center>
        <div id="menu">
            <ul>
                <li>
                    <a href="index.php">&#127968; Home</a>
                </li>
            </ul>
        </div>
    </center>
</div>

<body bgcolor="violet">
   <!-- <div id="menu">

      <ul>
         <li>
            <a href="index.php">Home</a>
         </li>

      </ul>

   </div> -->
   <div align="center">
      <div style="width:300px; border: solid 3px #333333; " align="left">
         <div style="background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

         <div style="margin:30px">
            <form action="" method="post">
               <label>USERNAME: </label><input type="text" name="USERNAME" class="box" /><br /><br />
               <label>PASSWD : </label><input type="password" name="PASSWD" class="box" /><br /><br />
               <input type="submit" value=" Submit " /><br />
            </form>



         </div>

      </div>

   </div>

</body>

</html>
