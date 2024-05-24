<?php

session_start();
// error_reporting(0);  

$newPassError = "";
$ConfirmPassError = "";
$showErrorPass = "none";
$showErrorConfirmPass = "none";

$cookie_mail = "";
$cookie_pass = "";

if (isset($_SESSION['newPassError'])) {
    $newPassError = $_SESSION['newPassError'];
    $showErrorPass = "inline";
    unset($_SESSION['newPassError']);
} else {
    $showErrorPass = "none";
}
if (isset($_SESSION['ConfirmPassError'])) {
    $ConfirmPassError = $_SESSION['ConfirmPassError'];
    $showErrorConfirmPass = "inline";
    unset($_SESSION['ConfirmPassError']);
} else {
    $showErrorConfirmPass = "none";
}

// if(isset($_SESSION['cookie_mail'])   &&    isset($_SESSION['cookie_pass'])){
//     $cookie_mail = $_SESSION['cookie_mail'];
//     $cookie_pass = $_SESSION['cookie_pass'];
// }


if (isset($_COOKIE['email'])) {
    if (isset($_COOKIE['email'])) {
        $cookie_mail  = $_COOKIE['email'];
        $cookie_pass  = $_COOKIE['password'];
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: url("../../../images/login_background.jpg") no-repeat center center fixed;
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
            color: white;
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
            /* Use flexbox to align the items */
            display: flex;
            /* Align items vertically */
            align-items: center;
        }

        .icon-holder input {
            /* width: 20px; */
        }

        .login-container {
            /* border: 12px solid orange; */

            color: white;
            position: absolute;
            top: 20%;
            left: 40%;

            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 40px;
            padding-left: 20px;
            padding-right: 20px;

            /* color: white;
        position: absolute;
        top: 20%;
        left: 38%;
        width: 25%; */
        }



        /* h1 inside the login-container */
        .login-container h1 {
            font-size: 40px;
            /* border-bottom: 6px solid orange; */
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
            margin: 16px 0px;
            padding: 8px 0px;
            font-size: 20px;
            border: none;
            outline: none;
            color: white;
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
            color: white;
        }

        .button-container a {
            color: white;
        }


        .box i {
            padding: 0px 12px;
            width: 25px;
            text-align: center;
        }

        .required-newPass {
            color: red;
            display: <?php echo $showErrorPass;
                        ?>
        }

        .required-confirmPass {
            color: red;
            display: <?php echo $showErrorConfirmPass;
                        ?>
        }
    </style>

</head>

<body>

    <div class="login-container">
        <p>
        <h1>Create New Password</h1>
        </p>

        <form action="../../../Controller/Adopter/NewPassword_Handler.php" method="POST">
            <div class="box icon-holder">
                <i class="load-key"></i>
                <input type="text" name="newPass" id="newPass" placeholder="Enter Your New Password">
                <span class="required-newPass">&nbsp; * &nbsp;<?php echo $newPassError; ?></span>
            </div>

            <div class="box icon-holder">
                <i class="load-key"></i>
                <input type="text" name="ConfirmNewPass" id="ConfirmNewPass" placeholder="Confirm Your New Password">
                <span class="required-confirmPass">&nbsp; * &nbsp;<?php echo $ConfirmPassError; ?></span>
            </div>



            <div class="button-container">
                <button type="submit" class="signin-button">Confirm</button>
                </span></p>
            </div>
        </form>

    </div>


</body>

</html>