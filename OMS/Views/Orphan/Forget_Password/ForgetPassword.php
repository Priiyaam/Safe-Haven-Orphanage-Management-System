<?php
session_start();
// error_reporting(0);  
$mailError = "";
$passwordError = "";
$showErrorMail = "none";
$showErrorPass = "none";

$cookie_mail = "";
$cookie_pass = "";

if (isset($_SESSION['emailError'])) {
    $mailError = $_SESSION['emailError'];
    $showErrorMail = "inline";
    unset($_SESSION['emailError']);
} else {
    $showErrorMail = "none";
}
if (isset($_SESSION['passwordError'])) {
    $passwordError = $_SESSION['passwordError'];
    $showErrorPass = "inline";
    unset($_SESSION['passwordError']);
} else {
    $showErrorPass = "none";
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

    .load-mail {
        background-image: url("../../../images/mail.png");
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

    .required-mail {
        color: red;
        display: <?php echo $showErrorMail;
        ?>
    }

    .required-pass {
        color: red;
        display: <?php echo $showErrorPass;
        ?>
    }
    </style>

</head>

<body>

    <div class="login-container">
        <p>
        <h1>Forget Password</h1>
        </p>

        <form action="../../../Controller/Orphan/ForgetPassword_Handler.php" method="POST">
            <div class="box icon-holder">
                <i class="load-mail"></i>
                <input type="text" name="mail" id="mail" placeholder="Enter Your Email" value="<?php if ($cookie_mail != "") {
                                                                                                    echo $cookie_mail;
                                                                                                } ?>">
                <span class="required-mail">&nbsp; * &nbsp;<?php echo $mailError; ?></span>
            </div>
            <div class="button-container">
                <button type="submit" class="signin-button">Submit</button>
                </span></p>
            </div>
        </form>

    </div>


</body>

</html>