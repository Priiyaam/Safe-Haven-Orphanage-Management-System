<?php
error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location:Login.php');
}

$nameError = "";
$emailError = "";
$passwordError = "";
$genderError = "";
$phoneError = "";
$addressError = "";
$professionError = "";

$fileName = $_SESSION['adopter_image'];


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
$P_adoptionStatus = $_SESSION["P_adoptionStatus"];






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>


    body {
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
        overflow-y: auto;
        overflow-x: auto;
        box-sizing: border-box;
    }


    .sticky-element {
        position: sticky;
        top: 0;
    }



    .box {
        margin-bottom: 15px;
    }

    .icon-holder {
        position: relative;
    }

    .icon-holder p {
        margin-left: 15px;
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



    .required {
        color: red;
        font-size: 14px;
        font-weight: bold;
    }


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
        margin: -130px auto;
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

.custom-select {
  position: relative;
  display: inline-block;
  font-size: 16px;
  font-family: Arial, sans-serif;
  color: #555;
}

.custom-select select {
  display: none;
}

.select-arrow {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  width: 0.5rem;
  height: 0.5rem;
  border-left: 1px solid #999;
  border-bottom: 1px solid #999;
  transform: rotate(45deg);
  pointer-events: none;
}

.select-list {
  position: absolute;
  z-index: 1;
  top: calc(100% + 10px);
  left: 0;
  right: 0;
  padding: 0;
  margin: 0;
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  list-style: none;
  overflow-y: auto;
  max-height: 200px;
}

.select-option {
  display: block;
  padding: 8px 16px;
  cursor: pointer;
}

.select-selected {
  background-color: #f9f9f9;
  font-weight: bold;
}

.select-option:hover {
  background-color: #eee;
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
    <?php include '../../Layout/Adopter/AdopterHeader.php'; ?>


    <div class="container">
        <div class="left">
            <p>
            <h3>My Profile</h3>
            <hr>
            <ul>
                <li><a href="Dashboard_Home.php">The Dashboard Home</a></li> <br>
                <li><a href="Profile.php" class="selected">My Profile</a></li>
                <li><a href="orphanProfiles.php">View Orphan Profiles</a></li>
                <li><a href="ChangePassword.php">Change Password</a></li>
                <li><a href="../../Controller/Adopter/DeleteAccount_Handler.php">Delete Account</a></li>
            </ul>

            </p>


        </div>
        <div class="right">

            <form action="../../Controller/Adopter/Profile_Handler.php" method="POST" enctype="multipart/form-data">



                <div class="box icon-holder">
                    <img src="<?php if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                                    if (!file_exists("../../images/Adopter_Images/$fileName")) {
                                        echo "../../images/Adopter_Images/temp.png";
                                    } else {
                                        echo "../../images/Adopter_Images/$fileName";
                                    }
                                } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    echo "../../images/Adopter_Images/$fileName";
                                } else {
                                    echo "../../images/Adopter_Images/temp.png";
                                } ?>" alt="Profile Picture" width="75px" height="75px" style="border-radius: 50%"> <br>
                    <input type="file" name="profilePic" id="profilePic" style="margin: 5px">
                </div>
                <div class="box icon-holder">
                    <p class="label-margin">Name </p>
                    <input type="text" name="name" id="name" placeholder="Enter Your name"
                        value="<?php echo $P_name; ?>">
                    <span class="required">&nbsp; * &nbsp;<?php echo $nameError; ?></span>
                </div>

                <div class="box icon-holder">
                    <p class="label-margin">E-mail </p>
                    <input type="text" name="email" id="email" placeholder="Enter Your Email"
                        value="<?php echo $P_mail; ?>" disabled>
                    <span class="required">&nbsp; * &nbsp;<?php echo $emailError; ?></span>
                </div>

                <div class="box icon-holder">
                    <!-- Gender -->
                    <p class="label-margin">Gender </p>
                    <input type="radio" name="gender" value="Male" <?php if ($P_gender === "Male") {
                                                                        echo "checked";
                                                                    } ?> />
                    Male
                    <input type="radio" name="gender" value="Female" <?php if ($P_gender === "Female") {
                                                                            echo "checked";
                                                                        } ?> />
                    Female
                    <input type="radio" name="gender" value="Other" <?php if ($P_gender === "Other") {
                                                                        echo "checked";
                                                                    } ?> /> Other
                    <span class="required"> &nbsp; * &nbsp;<?php echo $genderError; ?></span>
                </div>

                <div class="box icon-holder">
                    <p class="label-margin">Phone </p>
                    <input type="text" name="phone" id="phone" placeholder="Enter Your Phone"
                        value="<?php echo $P_phone; ?>">
                    <span class="required">&nbsp; * &nbsp;<?php echo $phoneError; ?></span>
                </div>


                <div class="box icon-holder">
                    <p class="label-margin">Address </p>
                    <input type="text" name="address" id="address" placeholder="Enter Your Address"
                        value="<?php echo $P_address; ?>">
                    <span class="required">&nbsp; * &nbsp;<?php echo $addressError; ?></span>
                </div>

                <div class="box icon-holder">
                    <p class="label-margin">Profession </p>
                    <input type="text" name="profession" id="profession" placeholder="Enter Your Profession"
                        value="<?php echo $P_profession; ?>">
                    <span class="required">&nbsp; * &nbsp;<?php echo $professionError; ?></span>
                </div>

                <div class="box icon-holder">
                    <p class="label-margin">Adoption Status </p>
                    <input type="text" name="profession" id="profession" placeholder=""
                        value="<?php echo $P_adoptionStatus; ?>" disabled>
                    <span class="required">&nbsp; * &nbsp;<?php ?></span>
                </div>



                <div class="button-container">
                    <input type="submit" class="request-button" value="Update"></input>
                    </span></p>
                </div>
            </form>


        </div>
    </div>



    <?php include '../../Layout/Adopter/AdopterFooter.php'; ?>
</body>

</html>