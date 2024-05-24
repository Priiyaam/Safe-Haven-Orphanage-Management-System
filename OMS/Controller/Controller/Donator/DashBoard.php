<?php

  require_once('../../Model/db.php');
  $query = "select * from donarinfo";
  $result = mysqli_query($con,$query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Dash Board</title>
</head>
<body>

    <a href="Display.php"> BACK </a>
    <div>
        <h1><center>Donar Data From Database</center></h1><br>
    </div>
    <div>
        <center>
        <table id="output" border="2">
            <tr>
                <td>Donar-ID </td>
                <td>Name </td>
                <td>Email </td>
                <td>Password </td>
                <td>Gender </td>
                <td>Address </td>
            </tr>
            <tr>
            <?php
               while($row = mysqli_fetch_assoc($result))
               {
            ?>
              <td><?php echo $row['d_id'] ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['pass'] ?></td>
              <td><?php echo $row['gender'] ?></td>
              <td><?php echo $row['address'] ?></td>
               
            </tr>
              <?php
               }
               ?>
        </table>
            </center>
            <a href="../Views/Donator/Login.html" text-align: right;>Log Out</a>
    </div>
 
</body>
</html>