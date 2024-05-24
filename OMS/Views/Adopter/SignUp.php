<?php
session_start();


$nameError = "";
$emailError = "";
$passwordError = "";
$genderError = "";
$phoneError = "";
$addressError = "";
$professionError = "";


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



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background: url("../../images/login_background2.jpg") no-repeat center center fixed;
        background-size: cover;
    }

    .load-key {
        background-image: url("../../../images/key.png");
        background-size: contain;
        background-repeat: no-repeat;
        display: inline-block;
        height: 30px;
        width: 30px;
    }


    .signin-button {
        width: 80%;
        background: none;
        border: 2px solid #4caf50;
        color: black;
        padding: 6px;
        font-size: 18px;
        cursor: pointer;
        outline: none;
        margin: 12px 0;
        border-radius: 20px;
        text-align: center;
        display: block;
        margin: 0 auto;
        margin-top: 10px;
    }

    .signin-button:hover {
        background-color: #4caf50;
        color: white;
    }

    .icon-holder {
        display: flex;
        align-items: center;
    }

    .icon-holder input {
    }

    .login-container {

        color: black;
        position: absolute;
        top: 5%;
        left: 40%;

    }



    .login-container h1 {
        font-size: 40px;
        margin-bottom: 43px;
        padding: 13px 0;
        text-align: center;
        border-bottom: 6px solid white;
    }

    .box {
        width: 100%;
    }

    .box input {
        width: 75%;
        margin: 5px 0px;
        padding: 8px 0px;
        font-size: 20px;
        border: none;
        outline: none;
        color: black;
        background: none;
    }

    .box input[type="text"],
    input[type="password"] {
        border-bottom: 3px solid white;
        font-size: 20px;
        border-radius: 10px;
    }

    input[type="checkbox"] {
        font-size: 20px;
        margin: 0 auto;
        background: none;
        width: 15px;
        height: 15px;
        padding: 10px 20px;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .button-container {
        text-align: center;
    }

    .button-container p {
        margin: 0 auto;
        padding: 5px 0px;
        font-size: 19px;
        color: black;
    }

    .button-container a {
        color: black;
    }


    .box i {
        padding: 0px 12px;
        width: 25px;
        text-align: center;
    }

    .required {
        color: red;
    }



    .label-margin {
        margin-right: 6px;
        font-size: 24px;
        padding-right: 10px;
    }
    </style>

</head>

<body>

    <div class="login-container">
        <p>
        <h1>Create New Account</h1>
        </p>

        <form action="../../Controller/Adopter/Signup_Handler.php" method="POST">
            <div class="box icon-holder">
                <p class="label-margin">Name </p>
                <input type="text" name="name" id="name" placeholder="Enter Your name">
                <span class="required">&nbsp; * &nbsp;<?php echo $nameError; ?></span>
            </div>

            <div class="box icon-holder">
                <p class="label-margin">E-mail </p>
                <input type="text" name="email" id="email" placeholder="Enter Your Email">
                <span class="required">&nbsp; * &nbsp;<?php echo $emailError; ?></span>
            </div>
            <div class="box icon-holder">
                <p class="label-margin">Password </p>
                <input type="text" name="password" id="password" placeholder="Enter Your Password">
                <span class="required">&nbsp; * &nbsp;<?php echo $passwordError; ?></span>
            </div>

            <div class="box icon-holder">
                <!-- Gender -->
                <p class="label-margin">Gender </p>
                <input type="radio" name="gender" value="Male" /> Male
                <input type="radio" name="gender" value="Female" /> Female
                <input type="radio" name="gender" value="Other" /> Other
                <span class="required"> &nbsp; * &nbsp;<?php echo $genderError; ?></span>
            </div>

            <div class="box icon-holder">
                <p class="label-margin">Phone </p>
                <input type="text" name="phone" id="phone" placeholder="Enter Your Phone">
                <span class="required">&nbsp; * &nbsp;<?php echo $phoneError; ?></span>
            </div>


            <div class="box icon-holder">
                <p class="label-margin">Address </p>
                <input type="text" name="address" id="address" placeholder="Enter Your Address">
                <span class="required">&nbsp; * &nbsp;<?php echo $addressError; ?></span>
            </div>

            <div class="box icon-holder">
                <p class="label-margin">Profession </p>
                <input type="text" name="profession" id="profession" placeholder="Enter Your Profession">
                <span class="required">&nbsp; * &nbsp;<?php echo $professionError; ?></span>
            </div>



            <div class="button-container">
                <button type="submit" class="signin-button">Signup</button>
                </span></p>
            </div>
        </form>

    </div>



</body>

</html>