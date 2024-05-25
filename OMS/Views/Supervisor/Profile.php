<?php
error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header("Location: Login/Login.php");
}

$nameError = "";
$emailError = "";
$passwordError = "";
$genderError = "";
$phoneError = "";
$addressError = "";
$professionError = "";

$fileName = $_SESSION['supervisor_image'];


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

if (isset($_SESSION['S_genderError'])) {
    $genderError = $_SESSION['S_genderError'];
    unset($_SESSION['S_genderError']);
}

if (isset($_SESSION['S_phoneError'])) {
    $phoneError = $_SESSION['S_phoneError'];
    unset($_SESSION['S_phoneError']);
}

if (isset($_SESSION['S_addressError'])) {
    $addressError = $_SESSION['S_addressError'];
    unset($_SESSION['S_addressError']);
}

if (isset($_SESSION['S_professionError'])) {
    $professionError = $_SESSION['S_professionError'];
    unset($_SESSION['S_professionError']);
}



$P_name = $_SESSION["P_name"];
$P_mail = $_SESSION["P_mail"];
$P_gender = $_SESSION["P_gender"];
$P_phone = $_SESSION["P_phone"];
$P_address = $_SESSION["P_address"];
$P_profession = $_SESSION["P_profession"];
$P_password = $_SESSION["P_password"];
$P_salary = $_SESSION["P_salary"];






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <i style='font-size:24px' class='fas'>&#xf598;</i>

    <style>
    /* Global styles */

    body {
       

 

               
  background-color: pink;



        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    a {
        color: #333;
        text-decoration: none;
    }


    header {
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
    }


    .container {
        display: flex;
        height: 636px;
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

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    li {
        margin: 10px 0;
    }

    .right {
        padding: 20px;
        width: 85%;
        overflow-y: hidden;
        /* overflow-x: hidden; */
        box-sizing: border-box;
    }


    .box {
        margin-bottom: 15px;
    }

    .icon-holder {
        position: relative;
    }

    .icon-holder p {
        margin-left: 40px;
    }

    input[type="text"],
    input[type="password"] {
        display: block;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 16px;
        margin-bottom: 5px;
    }

    input[type="text"]:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    input[type="file"] {
        margin-top: 10px;
    }

    input[type="number"] {
        display: block;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 16px;
        margin-bottom: 5px;
    }

    input[type="number"]:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }


    /* Required fields styles */

    .required {
        color: red;
        font-size: 14px;
        font-weight: bold;
    }

    /* Button styles */

    .button-container {
        bottom: 0;
        left: 0;
        right: 0;
        background-color: white;
        padding: 10px;
        text-align: center;

        box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
    }

    .request-button {
        display: block;
        margin: 2px auto;
        width: 200px;
        height: 30px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        position: absolute;
        bottom: 220px;
        left: 56%;
        transform: translateX(-50%);
    }

    .request-button:hover {
        background-color: #555;
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
            <h3>My Profile</h3>
            <hr>
            <ul>
                <li><a href="Dashboard_Home.php">The Dashboard Home</a></li>
                <li><a href="Profile.php" class="selected">My Profile</a></li>
                <li><a href="AddOrphans.php">Create Orphan Accounts</a></li>
                <li><a href="orphanProfiles.php">View Orphan Profiles</a></li>
                <li><a href="adoptionRequests.php">View Adoption Requests</a></li>
                <li><a href="ChangePassword.php">Change Password</a></li>
                <li><a href="../../Controller/Supervisor/DeleteAccount_Handler.php">Delete Account</a></li>
            </ul>

            </p>


        </div>
        <div class="right">

            <form action="../../Controller/Supervisor/Profile_Handler.php" method="POST" enctype="multipart/form-data">



                <div class="box icon-holder">
                    <img src="<?php if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                                    if (!file_exists("../../images/Supervisor_Images/$fileName")) {
                                        echo "../../images/Supervisor_Images/temp.png";
                                    } else if ($fileName == "N/A") {
                                        echo "../../images/Supervisor_Images/temp.png";
                                    } else {
                                        echo "../../images/Supervisor_Images/$fileName";
                                    }
                                } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    echo "../../images/Supervisor_Images/$fileName";
                                } else {
                                    echo "../../images/Supervisor_Images/temp.png";
                                } ?>" alt="Profile Picture" width="75px" height="75px" style="border-radius: 50%"> <br>
                    <input type="file" name="profilePic" id="profilePic" style="margin: 5px">
                </div>
                <div class="box icon-holder">
                    <p class="label-margin">Name </p>
                    <input type="text" name="name" id="name" placeholder="Enter Your name"
                        value="<?php echo $P_name; ?>" onblur="validateInput(this)">
                    <span class="required">&nbsp; * &nbsp;<?php echo $nameError; ?></span>
                </div>

                <div class="box icon-holder">
                    <p class="label-margin">E-mail </p>
                    <input type="text" name="email" id="email" placeholder="Enter Your Email"
                        value="<?php echo $P_mail; ?>" disabled>
                    <span class="required">&nbsp; * &nbsp;<?php echo $emailError; ?></span>
                </div>


                <div class="box icon-holder">
                    <p class="label-margin">Phone </p>
                    <input type="number" name="phone" id="phone" placeholder="Enter Your Phone"
                        value="<?php echo $P_phone; ?>" onblur="validateInput(this)">
                    <span class="required">&nbsp; * &nbsp;<?php echo $phoneError; ?></span>
                </div>


                <div class="box icon-holder">
                    <p class="label-margin">Salary</p>
                    <input type="text" name="salary" id="salary" placeholder="" value="<?php echo $P_salary; ?>"
                        disabled>
                    <span class="required">&nbsp; * &nbsp;<?php ?></span>
                </div>



                <div class="button-container">
                    <input type="submit" class="request-button" value="Update"></input>
                    </span></p>
                </div>
            </form>


        </div>
    </div>



    <?php include '../../Layout/Supervisor/SupervisorFooter.php'; ?>
</body>

</html>