<?php
require_once '../../Model/Supervisor.php';
session_start();


$name = "";
$nameError = "";

$email = "";
$emailError = "";

$password = "";
$passwordError = "";

$gender = "";
$genderError = "";

$phone = "";
$phoneError = "";

$address = "";
$addressError = "";

$profession = "";
$professionError = "";

$JSON_Message = "";
$JSON_Error = "";

$everythingOK = FALSE;
$everythingOKCounter = 0;


$_SESSION['S_nameError'] = "";
$_SESSION['S_emailError'] = "";
$_SESSION['S_passwordError'] = "";
$_SESSION['S_genderError']  = "";
$_SESSION['S_phoneError'] = "";
$_SESSION['S_addressError'] = "";
$_SESSION['S_professionError'] = "";






if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $wordCount = str_word_count($name);
        if (empty($name)) {
            $nameError = "Name is required";
            $_POST['name'] = "";
            $name = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
        } elseif ($wordCount < 2) {
            $nameError = "Write at least 2 words";
            $_POST['name'] = "";
            $name = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameError = "Only letters and white space and dash allowed";
            $_POST['name'] = "";
            $name = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
        } else {
            $everythingOK = TRUE;
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        if (empty($email)) {
            $emailError = "Email is required";
            $_POST['email'] = "";
            $email = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
            $email = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
        } else {
            $everythingOK = TRUE;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = $_POST['password'];
        if (empty($password) || strlen($password) < 8) {
            $passwordError = "Write at least 8 Character";
            $_POST['password'] = "";
            $password = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
            // echo "Pass error 1";
        } else if (!preg_match('/[@#$%]/', $password)) {
            $passwordError = "Password must contain at least one special character (@, #, $, %).";
            $_POST['password'] = "";
            $password = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
        } else {
            $everythingOK = TRUE;
        }
    }






    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $phone = $_POST['phone'];
        if (empty($phone)) {
            $phoneError = "Phone is required";
            $_POST['phone'] = "";
            $phone = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;

        }
       
        else {
            $everythingOK = TRUE;
        }
    }





    if ($everythingOK && $everythingOKCounter == 0) {




        $tempSalary = "50000";
        $tempImage = "N/A";
        $signup_data = array(

            'supervisor_mail'          =>      $_POST['email'],
            'password'     =>     $_POST['password'],
            'supervisor_name'               =>     $_POST['name'],
            'supervisor_phone'     =>     $_POST['phone'],
            'supervisor_salary'     =>    $tempSalary,
            'supervisor_image'     =>     $tempImage
        );


        $is_signup_successful =  add_supervisor($signup_data);
        if ($is_signup_successful) {
            echo "Data Stored";
            header('Location:../../Views/Supervisor/Login/Login.php');
        } else {
            header('Location:../../Views/Supervisor/SignUp/SignUp.php');
        }






        // 
    } else {

        $_SESSION['S_nameError'] = $nameError;
        $_SESSION['S_emailError'] = $emailError;
        $_SESSION['S_passwordError'] = $passwordError;
        $_SESSION['S_phoneError'] = $phoneError;
        echo "Everything is Not ok, There are errors and we are sending to the front page <br>";
        header('Location:../../Views/Supervisor/SignUp/SignUp.php');
    }
}
