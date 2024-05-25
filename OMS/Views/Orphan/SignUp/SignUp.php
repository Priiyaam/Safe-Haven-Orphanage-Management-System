<?php
session_start();
// error_reporting(0);  // This line will hide all the given errors in php


//  Variable Declarations
$nameError = "";
$emailError = "";
$passwordError = "";
$genderError = "";
$phoneError = "";
$addressError = "";
$professionError = "";

// $nameError = $_SESSION['S_nameError'];

if (isset($_SESSION['S_nameError'])) {
    // echo "<h1>Name Error found</h1>";
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

// echo "<h1>Hii</h1>";


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
    style="background: url('../../../images/login_background.jpeg');background-size: cover; overflow-x: hidden; "
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
                                <h1>Welcome back, friend!</h1>
                                <p class="fs-5">We are excited to have you continue spreading love and making a
                                    difference in our orphanage community</p>
                            </div>
                            <div class="col-md-6 col-xl-4 text-center" style="margin-left: 275px;margin-right: 250px;">
                                <div class="card mb-5" style="background-color: rgba(0, 0, 0, 0.5);">
                                    <div class="card-body d-flex flex-column align-items-center"
                                        style="text-align: center;box-shadow: 0px 0px, 0px 0px 20px 11px;">
                                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4">

                                            <!-- iMAGE -->
                                        </div>


                                        <!-- Login Form -->

                                        <form action="../../../Controller/Adopter/Signup_Handler.php"
                                            class="text-center" method="post">


                                            <!-- Name -->
                                            <div class="mb-3"><input class="form-control" type="text" name="name"
                                                    id="name" placeholder="Name">
                                                <p style="color: red;"><?php if ($nameError != "") {
                                                                            echo $nameError;
                                                                        } else {
                                                                            echo "";
                                                                        } ?></p>
                                            </div>


                                            <!-- Mail -->
                                            <div class="mb-3"><input class="form-control" type="text" name="email"
                                                    id="email" placeholder="Email">
                                                <p style="color: red;"><?php if ($emailError != "") {
                                                                            echo $emailError;
                                                                        } else {
                                                                            echo "";
                                                                        } ?></p>
                                            </div>

                                            <!-- Password -->
                                            <div class="mb-3"><input class="form-control" type="password"
                                                    name="password" id="password" placeholder="Password">
                                                <p style="color: red;"><?php if ($passwordError != "") {
                                                                            echo $passwordError;
                                                                        } else {
                                                                            echo "";
                                                                        } ?></p>

                                            </div>


                                            <!-- Gender -->
                                            <div class="mb-3" style="color: white;">
                                                <!-- <p class="label-margin" style="color: white;">Gender </p> -->
                                                <input type="radio" name="gender" id="gender" value="Male" checked />
                                                Male
                                                &nbsp;
                                                <input type="radio" name="gender" id="gender" value="Female" /> Female
                                                &nbsp;
                                                <input type="radio" name="gender" id="gender" value="Other" /> Other
                                                &nbsp;

                                                <p style="color: red;"><?php if ($genderError != "") {
                                                                            echo $genderError;
                                                                        } else {
                                                                            echo "";
                                                                        } ?></p>

                                            </div>



                                            <!-- Phone -->
                                            <div class="mb-3"><input class="form-control" type="number" name="phone"
                                                    id="phone" placeholder="Phone">
                                                <p style="color: red;"><?php if ($phoneError != "") {
                                                                            echo $phoneError;
                                                                        } else {
                                                                            echo "";
                                                                        } ?></p>
                                            </div>

                                            <!-- Address -->
                                            <div class="mb-3">
                                                <textarea class="form-control" placeholder="Enter your text here..."
                                                    name="address" id="address" rows="2" cols="20">

                                            </textarea>
                                                <p style="color: red;"><?php if ($addressError != "") {
                                                                            echo $addressError;
                                                                        } else {
                                                                            echo "";
                                                                        } ?></p>
                                            </div>

                                            <!-- Profession -->
                                            <div class="mb-3"><input class="form-control" type="text" name="profession"
                                                    id="profession" placeholder="Profession">
                                                <p style="color: red;"><?php if ($professionError != "") {
                                                                            echo $professionError;
                                                                        } else {
                                                                            echo "";
                                                                        } ?></p>
                                            </div>




                                            <!-- Login Button -->
                                            <div class="mb-3"><button class="btn btn-primary d-block w-100"
                                                    type="submit">Sign Up</button></div>


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