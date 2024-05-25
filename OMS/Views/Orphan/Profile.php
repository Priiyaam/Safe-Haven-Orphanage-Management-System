<?php
error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location: Login/Login.php');
}


$nameError = "";
$heightError = "";
$genderError = "";
$dateOfBirthError = "";
$ageError = "";
$bodyColorError = "";
$adoptionStatusError = "";

$fileName = $_SESSION['adopter_image'];


if (isset($_SESSION['S_nameError'])) {
    $nameError = $_SESSION['S_nameError'];
    unset($_SESSION['S_nameError']);
}


if (isset($_SESSION['S_dateOfBirthError'])) {
    $dateOfBirthError = $_SESSION['S_dateOfBirthError'];
    unset($_SESSION['S_dateOfBirthError']);
}

if (isset($_SESSION['S_heightError'])) {
    $heightError = $_SESSION['S_heightError'];
    unset($_SESSION['S_heightError']);
}



$P_mail = $_SESSION["P_mail"];
$P_password = $_SESSION["P_password"];
$P_name = $_SESSION["P_name"];
$P_height = $_SESSION["P_height"];
$P_image = $_SESSION["P_image"];
$fileName = $P_image;
$P_profession = $_SESSION["P_profession"];
$P_gender = $_SESSION["P_gender"];
$P_dateOfBirth = $_SESSION["P_dateOfBirth"];
$P_age = $_SESSION["P_age"];
$P_bodyColor = $_SESSION["P_bodyColor"];
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
    <?php include '../../Layout/Orphan/OrphanHeader.php'; ?>


    <div class="container">
        <div class="left">
            <p>
            <h3>My Profile</h3>
            <hr>
            <ul>
                <li><a href="Dashboard_Home.php">The Dashboard Home</a></li> <br>
                <li><a href="Profile.php" class="selected">My Profile</a></li> <br>
                <li><a href="../Orphan/ChangePassword.php">Change Password</a></li> <br>
                <li><a href="../../Controller/Orphan/DeleteAccount_Handler.php">Delete Account</a></li>
            </ul>

            </p>


        </div>
        <div class="right">

            <form action="../../Controller/Orphan/Profile_Handler.php" method="POST" enctype="multipart/form-data">



                <div class="box icon-holder">
                    <img src="<?php if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                                    if (!file_exists("../../images/Orphan_Images/$fileName")) {
                                        echo "../../images/Orphan_Images/temp.png";
                                    } else {
                                        echo "../../images/Orphan_Images/$fileName";
                                    }
                                } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    echo "../../images/Orphan_Images/$fileName";
                                } else {
                                    echo "../../images/Orphan_Images/temp.png";
                                } ?>" alt="Profile Picture" width="75px" height="75px" style="border-radius: 50%"> <br>
                    <input type="file" name="profilePic" id="profilePic" style="margin: 5px">
                </div>
                <div class="box icon-holder">

                    <!-- Name -->
                    <p class="label-margin">Name </p>
                    <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $P_name; ?>">
                    <span class="required">&nbsp; * &nbsp;<?php echo $nameError; ?></span>
                </div>

                <!-- E mail -->
                <div class="box icon-holder">
                    <p class="label-margin">E-mail </p>
                    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $P_mail; ?>"
                        disabled>
                </div>

                <!-- Gender -->
                <div class="box icon-holder">
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

                <!-- Height -->
                <div class="box icon-holder">
                    <p class="label-margin">Height (ft.) </p>
                    <input type="number" name="height" id="height" placeholder="Height"
                        value="<?php echo $P_height; ?>">
                    <span id="heightError" class="required">&nbsp; * &nbsp;<?php echo $heightError; ?></span>
                </div>


                <!-- Date of Birth -->
                <div class="box icon-holder">
                    <p class="label-margin">Date of Birth </p>
                    <input type="text" name="dateOfBirth" id="dateOfBirth" placeholder="yyyy/MM/dd"
                        value="<?php echo $P_dateOfBirth; ?>">
                    <span id="dateOfBirthError" class="required">&nbsp; * &nbsp;<?php echo $dateOfBirthError; ?></span>
                </div>

                <!-- Age -->
                <div class="box icon-holder">
                    <p class="label-margin">Age </p>
                    <input type="text" name="age" id="age" placeholder="Age" disabled value="<?php echo $P_age; ?>">
                </div>

                <!-- Body Color -->
                <div class="box icon-holder">
                    <p class="label-margin">Body Color </p>
                    <select id="bodyColor" name="bodyColor" class="custom-select">
                        <option value="White" selected class="" <?php if($bodyColor == "White"){echo "selected";}?>>
                            White</option>
                        <option value="Light-Brown" class="" <?php if($bodyColor == "Light-Brown"){echo "selected";}?>>
                            Light Brown</option>
                        <option value="Moderate-Brown" class=""
                            <?php if($bodyColor == "Moderate-Brown"){echo "selected";}?>>Moderate Brown</option>
                        <option value="Dark-Brown" class="" <?php if($bodyColor == "Dark-Brown"){echo "selected";}?>>
                            Dark Brown</option>
                    </select>
                </div>



                <!-- Adoption Status -->
                <div class="box icon-holder">
                    <p class="label-margin">Adoption Status </p>
                    <input type="text" name="profession" id="profession" placeholder=""
                        value="<?php echo $P_adoptionStatus; ?>" disabled>
                </div>



                <!-- Update Button -->
                <div class="button-container">
                    <input type="submit" class="request-button" value="UPDATE"></input>
                    </span></p>
                </div>
            </form>


        </div>
    </div>



    <?php include '../../Layout/Orphan/OrphanFooter.php'; ?>
</body>

</html>