<?php


require_once '../../Model/Supervisor.php';
error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location: Login/Login.php');
}



$nameError = "";
$emailError = "";
$passwordError = "";
$dateOfBirthError = "";
$heightError = "";
$bodyColorError = "";

$JSON_Message = "";
$JSON_Error = "";

$age = "";
$gender = "";

$everythingOK = FALSE;
$everythingOKCounter = 0;


if (isset($_SESSION['S_nameError'])) {
    $nameError = $_SESSION['S_nameError'];
    unset($_SESSION['S_nameError']);
}
if (isset($_SESSION['S_emailError'])) {
    $emailError = $_SESSION['S_emailError'];
    unset($_SESSION['S_emailError']);
}
if (isset($_SESSION['S_passwordError'])) {
    $passwordError = $_SESSION['S_passwordError'];
    unset($_SESSION['S_passwordError']);
}
if (isset($_SESSION['S_dateOfBirthError'])) {
    $dateOfBirthError = $_SESSION['S_dateOfBirthError'];
    unset($_SESSION['S_dateOfBirthError']);
}
if (isset($_SESSION['S_heightError'])) {
    $heightError = $_SESSION['S_heightError'];
    unset($_SESSION['S_heightError']);
}
if (isset($_SESSION['S_bodyColorError'])) {
    $bodyColorError = $_SESSION['S_bodyColorError'];
    unset($_SESSION['S_bodyColorError']);
}





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Orphan Accounts</title>
    <style>
    /* Style for body */
    body {


        background-color: lightpink;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Style for header */
    header {
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
    }

    /* Style for container */
    .container {
        display: flex;
        height: 685px;
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
        padding: 20px;
        width: 85%;
        box-sizing: border-box;
        margin: 0 auto;
    }

    .box {
        position: relative;
        margin-bottom: 20px;
    }

    .icon-holder {
        display: flex;
        align-items: center;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .icon-holder p {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
        color: #333;
        letter-spacing: 1px;
    }

    /* Style for input fields */
    input[type="text"],
    input[type="date"],
    select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: none;
        font-size: 16px;
        margin-top: 5px;
        outline: none;
    }

    .required {
        color: red;
        font-size: 14px;
        position: absolute;
        bottom: -20px;
        left: 0;
    }

    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .signin-button {
        background-color: #333;
        color: white;
        border-radius: 20px;
        border: none;
        font-size: 18px;
        text-align: center;
        cursor: pointer;
        letter-spacing: 2px;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        padding: 12px 24px;
    }

    .signin-button:hover {
        background-color: #fff;
        color: #333;
    }

    /* Style for footer */
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

    select {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: none;
        font-size: 16px;
        margin-top: 5px;
        outline: none;
        transition: all 0.3s ease-in-out;
    }

    select:focus {
        border: 1px solid #333;
        background-color: #EEE;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .num-input {
        display: block;
        width: 100%;
        padding: 12px 20px;
        font-size: 16px;
        line-height: 22px;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    }

    .styled-num:focus {
        outline: none;
        border-color: #66afe9;
        box-shadow: 0 0 0 3px rgba(102, 175, 233, 0.6);
    }
    </style>







    <script>
    function validateInput(input) {
        const currentDate = new Date();

        const inputId = input.id;
        const submitButton = document.getElementById('submitButton');





        if ((input.value.trim() === 'mm/dd/yyyy' || input.value.trim() === '') && inputId === 'dateOfBirth') {
            document.getElementById('dateOfBirthError').innerHTML = "This Field is Required";
            submitButton.disabled = true;
        } else if (input.value.trim() >= currentDate && inputId === 'dateOfBirth') {
            document.getElementById('dateOfBirthError').innerHTML = "Date of Birth Can not be Future";
            submitButton.disabled = true;
        } else {
            if (input.value.trim() === '') {
                document.getElementById(inputId + 'Error').innerHTML = inputId + " field is Required";
                submitButton.disabled = true;
            } else {
                document.getElementById(inputId + 'Error').innerHTML = "";
                submitButton.disabled = false;
            }
        }

    }
    </script>





</head>

<body>
    <?php include '../../Layout/Supervisor/SupervisorHeader.php'; ?>


    <div class="container">
        <div class="left">
            <p>
            <h3>Create Orphan Accounts</h3>
            <hr>
            <ul>
                <li><a href="Dashboard_Home.php">The Dashboard Home</a></li>
                <li><a href="Profile.php">My Profile</a></li>
                <li><a href="AddOrphans.php" class="selected">Create Orphan Accounts</a></li>
                <li><a href="orphanProfiles.php">View Orphan Profiles</a></li>
                <li><a href="AdoptionRequests.php">View Adoption Requests</a></li>
                <li><a href="ChangePassword.php">Change Password</a></li>
                <li><a href="../../Controller/Supervisor/DeleteAccount_Handler.php">Delete Account</a></li>
            </ul>

            </p>


        </div>
        <div class="right">

            <form action="../../Controller/Supervisor/AddOrphans_Handler.php" method="POST">

                <!-- Name -->
                <div class="box icon-holder">
                    <p class="label-margin">Name </p>
                    <input type="text" name="name" id="name" placeholder="Enter Orphan name"
                        onblur="validateInput(this)">
                    <span id="nameError" class="required">&nbsp; * &nbsp;<?php echo $nameError; ?></span>
                </div>

                <!-- Email -->
                <div class="box icon-holder">
                    <p class="label-margin">E-mail </p>
                    <input type="text" name="email" id="email" placeholder="Enter Orphan Email"
                        onblur="validateInput(this)">
                    <span id="emailError" class="required">&nbsp; * &nbsp;<?php echo $emailError; ?></span>
                </div>

                <!-- Password -->
                <div class="box icon-holder">
                    <p class="label-margin">Password </p>
                    <input type="text" name="password" id="password" placeholder="Enter Orphan Password"
                        onblur="validateInput(this)">
                    <span id="passwordError" class="required">&nbsp; * &nbsp;<?php echo $passwordError; ?></span>
                </div>

                <!-- Date of Birth -->
                <div class="box icon-holder">
                    <p class="label-margin">Date of Birth </p>
                    <input type="date" name="dateOfBirth" id="dateOfBirth" placeholder="Enter Orphan Date of Birth"
                        onblur="validateInput(this)">
                    <span id="dateOfBirthError" class="required">&nbsp; * &nbsp;<?php echo $dateOfBirthError; ?></span>
                </div>

                <!-- Gender -->
                <div class="box icon-holder">
                    <p class="label-margin">Gender </p>
                    <select id="gender" name="gender">
                        <option value="male" selected class="">Male</option>
                        <option value="female" class="">Female</option>
                        <option value="other" class="">Other</option>
                    </select>
                </div>

                <!-- Height -->
                <div class="box icon-holder">
                    <p class="label-margin">Height (ft.)</p>
                    <input type="number" name="height" id="height" placeholder="Enter Orphan Height"
                        onblur="validateInput(this)" step="0.01" class="num-input">
                    <span id="heightError" class="required">&nbsp; * &nbsp;<?php echo $heightError; ?></span>
                </div>

                <!-- Body Color -->
                <div class="box icon-holder">
                    <p class="label-margin">Body Color </p>
                    <select id="bodyColor" name="bodyColor">
                        <option value="White" selected class="">White</option>
                        <option value="Light-Brown" class="">Light Brown</option>
                        <option value="Moderate-Brown" class="">Moderate Brown</option>
                        <option value="Dark-Brown" class="">Dark Brown</option>
                    </select>
                </div>

                <!-- Button -->
                <div class="button-container">
                    <button type="submit" id="submitButton" class="signin-button">Create Account</button>
                    </span></p>
                </div>

            </form>


        </div>
    </div>



    <?php include '../../Layout/Supervisor/SupervisorFooter.php'; ?>
</body>

</html>