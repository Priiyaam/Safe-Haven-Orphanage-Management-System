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

<!-- Html Part Starts Here -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Hope Heaven</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
</head>

<body class="text-break text-center"
    style="background: url('../../../../images/login_background.jpeg');background-size: cover; overflow-x: hidden; "
    data-bs-spy="scroll">
    <div>
        <div class="row">
            <div class="col" style="background-color: tra;">
                <section class="py-4 py-xl-5">
                    <div class="container" style="margin-top: 12%;">
                        <div class="row mb-5">
                            <div class="col-md-8 col-xl-6 col-xxl-5 text-center mx-auto"></div>
                        </div>
                        <div class="row d-flex justify-content-center"
                            style="height: 133%;text-shadow: 0px 0px;box-shadow: 0px 0px;">
                            <div class="col" style="color: white;">
                                <h1>Required for Access</h1>
                                <p class="fs-5">Don't let a forgotten password keep you locked out. Enter your email to
                                    reset and regain access today!</p>
                            </div>
                            <div class="col-md-6 col-xl-4 text-center" style="margin-left: 275px;margin-right: 250px;">
                                <div class="card mb-5" style="background-color: rgba(0, 0, 0, 0.5);">
                                    <div class="card-body d-flex flex-column align-items-center"
                                        style="text-align: center;box-shadow: 0px 0px, 0px 0px 20px 11px;">
                                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4">

                                            <!-- iMAGE -->
                                        </div>


                                        <!-- Login Form -->

                                        <form action="../../../../Controller/Orphan/ForgetPassword_Handler.php"
                                            class="text-center" method="post">

                                            <!-- Mail -->
                                            <div class="mb-3"><input class="form-control" type="text" name="mail"
                                                    id="mail" placeholder="Email">
                                                <p style="color: red;"><?php if ($mailError != "") {
                                                                            echo $mailError;
                                                                        } else {
                                                                            echo "";
                                                                        } ?></p>
                                            </div>

                                            <!-- Login Button -->
                                            <div class="mb-3"><button class="btn btn-primary d-block w-100"
                                                    type="submit">Submit</button></div>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>