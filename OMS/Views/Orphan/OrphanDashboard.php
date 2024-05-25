<?php
error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location:Login.php');
}


header('Location:Profile.php');


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
    }

    .container {
        display: flex;
        height: 600px;
        margin: 20px auto;
        max-width: 800px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .left {
        background-color: #f5f5f5;
        padding: 20px;
        width: 30%;
        border-right: 1px solid #ddd;
        box-sizing: border-box;
    }

    .left h3 {
        margin-top: 0;
    }

    .right {
        padding: 20px;
        width: 85%;
        overflow-y: scroll;
        box-sizing: border-box;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    li {
        margin: 10px 0;
    }

    a {
        color: #333;
        text-decoration: none;
    }

    footer {
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
    }
    </style>

</head>

<body>
    <?php include '../../Views/Layout/Orphan/OrphanHeader.php'; ?>


    <div class="container">
        <div class="left">
            <p>
            <h3>Dashboard</h3>
            <hr>
            <ul>
                <li><a href="../Orphan/Profile.php" class="selected">My Profile</a></li>
                <li><a href="../Orphan/AdopterProfiles.php">View Orphan Profiles</a></li>
                <li><a href="../Orphan/ChangePassword.php">Change Password</a></li>
                <li><a href="../../Controller/Orphan/DeleteAccount_Handler.php">Delete Account</a></li>
            </ul>

            </p>


        </div>
        <div class="right">
            <p>This is the right division.</p>
        </div>
    </div>



    <?php include '../../Views/Layout/Orphan/OrphanFooter.php'; ?>
</body>

</html>