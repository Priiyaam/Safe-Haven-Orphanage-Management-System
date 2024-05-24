<?php
 session_start();
 require "../../Model/db.php";

  
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
    $Email = $_POST['email'];
    $Password = $_POST['pass'];
   
    if(!empty($Email) && !empty($Password) && !is_numeric($Email))
   {
      $query = "select * from donarinfo where email = '$Email' limit 1";
      $result = mysqli_query($con, $query);
      
      if($result)
      {
        if($result && mysqli_num_rows($result)> 0)
        {
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['pass'] == $Password)
            {
                header("location: ../../Controller/Donator/Display.php");
                die;
            }

        }
      }
      echo "<script type='text/javascript'> alert('Wrong Username or Password')</script>";
     
   }
   else
   {
     echo "<script type='text/javascript'> alert('Wrong Username or Password'')</script>";
   }
  
}
 ?>

