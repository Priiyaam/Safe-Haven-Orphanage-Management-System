<?php
 session_start();

 //include("db.php");
 session_start();
 require "../Model/db.php";


 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
   $Name = $_POST['name'];
   $Email = $_POST['email'];
   $Password =  $_POST['pass'];
   $Gender = $_POST['gender'];
   $Address = $_POST['address'];

   if(!empty($Email) && !empty($Password) && !is_numeric($Email))
   {
      $query = "insert into donarinfo (name, email, pass, gender, address) values ('$Name','$Email','$Password','$Gender','$Address')";
      
      mysqli_query($con, $query);

      echo "<script type='text/javascript'> alert('Successfully Register')</script>";
      header("location: ../Controller/Donator/Display.php");
      die;
   }
  else
  {
    echo "<script type='text/javascript'> alert('PLease Insert Valid Informations')</script>";
  }

 }
?>
