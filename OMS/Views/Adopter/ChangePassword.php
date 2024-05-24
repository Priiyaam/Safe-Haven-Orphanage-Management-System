<?php
error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"]) || $_SESSION["status"] === FALSE) {
    header('Location:Login.php');
}


$currPasswordError = $_SESSION["currPasswordError"];
$newPasswordError = $_SESSION["newPasswordError"];
$reTypePasswordError = $_SESSION["reTypePasswordError"];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
        max-width: 1015px;
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



    .selected {
        background-color: #333;
        color: #fff;
    }

    .left a {
        display: inline-block;
        width: 200px;
        height: 20px;
        padding: 10px;
        margin: 5px;
    }

    a {
        color: #333;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .left a:hover {
        background-color: yellow;
        color: black;
        transform: scale(1.2);
    }

    .right {
        padding: 50px;
        width: 70%;
        box-sizing: border-box;
        text-align: center;
        /* added */
    }

    .container form input[type="submit"] {
        display: block;
        margin-top: 20px;
        width: 40%;
        height: 40px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.2s ease-in-out;
        margin-left: 31%;

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

    .container form label {
        display: block;
        margin-bottom: 5px;
        font-size: 16px;
        font-weight: bold;
    }

    .container form input[type="password"] {
        display: block;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 16px;
        margin-bottom: 15px;
    }

    .container form .required {
        color: red;
        font-size: 14px;
        font-weight: bold;
    }

    .container form input[type="submit"] {
        display: block;
        margin-top: 20px;
        width: 40%;
        height: 40px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.2s ease-in-out;
        text-align: center;
        /* added */
    }

    .container form input[type="submit"]:hover {
        background-color: #555;
    }

    @media screen and (max-width: 767px) {
        .container {
            flex-direction: column;
            height: auto;
        }

        .left {
            width: 100%;
            border-right: none;
            border-bottom: 1px solid #ddd;
        }

        .right {
            width: 100%;
            padding: 20px;
        }
    }
    </style>

    <script>
    function validateInput(input) {

        const inputId = input.id;
        const submitButton = document.getElementById('submitButton');

        if (input.value.trim() === '') {
            document.getElementById(inputId + 'Error').innerHTML = inputId + " field is Required";
            submitButton.disabled = true;
        } else {
            document.getElementById(inputId + 'Error').innerHTML = "";
            submitButton.disabled = false;
        }
    }

    window.onbeforeunload = function() {
        document.getElementById('currentPassError').innerHTML = "";
        document.getElementById('newPassError').innerHTML = "";
        document.getElementById('reTypeNewPassError').innerHTML = "";
    };
    </script>

</head>

<body>
    <?php include '../../Layout/Adopter/AdopterHeader.php'; ?>


    <div class="container">
        <div class="left">
            <p>
            <h3>Change Password</h3>
            <hr>
            <ul>
                <li><a href="Dashboard_Home.php">The Dashboard Home</a></li> <br>
                <li><a href="Profile.php">My Profile</a></li>
                <li><a href="orphanProfiles.php">View Orphan Profiles</a></li>
                <li><a href="ChangePassword.php" class="selected">Change Password</a></li>
                <li><a href="../../Controller/Adopter/DeleteAccount_Handler.php">Delete Account</a></li>
                <!-- <li><a href="../../Controller/Logout_Handler.php">Logout</a></li> -->
            </ul>

            </p>


        </div>
        <div class="right">

            <form action="../../Controller/Adopter/ChangePassword_Handler.php" method="POST">

                <label for="currentPass">Current Password</label> <br>
                <input type="password" name="currentPass" id="currentPass" style="margin: 5px"
                    onblur="validateInput(this)">
                <span id="currentPassError" class="required"> <br> &nbsp; &nbsp;
                    <?php if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                        echo $currPasswordError;
                    } ?></span>
                <br>

                <label for="newPass" style="color: green">New Password</label> <br>
                <input type="password" name="newPass" id="newPass" style="margin: 5px" onblur="validateInput(this)">
                <span id="newPassError" class="required"> <br> &nbsp; &nbsp;
                    <?php if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                        echo $newPasswordError;
                    } ?> </span> <br>

                <label for="reTypeNewPass" style="color: red">Retype New Password</label> <br>
                <input type="password" name="reTypeNewPass" id="reTypeNewPass" style="margin: 5px"
                    onblur="validateInput(this)">
                <span id="reTypeNewPassError" class="required"> <br> &nbsp;
                    &nbsp;<?php if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                                echo $reTypePasswordError;
                            } ?> </span>
                <br>
                <input type="submit" name="submit" value="Update" class="request-button" /> <br>

            </form>
            <!-- </form> -->

        </div>
    </div>



    <?php include '../../Layout/Adopter/AdopterFooter.php'; ?>
</body>

</html>