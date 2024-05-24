<?php
require_once '../../Model/Supervisor.php';
session_start();


$name = "";
$nameError = "";

$email = "";
$emailError = "";

$password = "";
$passwordError = "";

// $gender = "";
// $genderError = "";

$dateOfBirth = "";
$dateOfBirthError = "";

$height = "";
$heightError = "";

$bodyColor = "";
$bodyColorError = "";

$JSON_Message = "";
$JSON_Error = "";

$age = "";
$gender = "";

$everythingOK = FALSE;
$everythingOKCounter = 0;


$_SESSION['S_nameError'] = "";
$_SESSION['S_emailError'] = "";
$_SESSION['S_passwordError'] = "";
$_SESSION['S_genderError']  = "";
$_SESSION['S_dateOfBirthError'] = "";
$_SESSION['S_heightError'] = "";
$_SESSION['S_bodyColorError'] = "";






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
        $dateOfBirth = $_POST['dateOfBirth'];
        $current_date = date("Y-m-d");

        if (empty($dateOfBirth)) {
            $dateOfBirthError = "Date of Birth is required";
            $_POST['dateOfBirth'] = "";
            $dateOfBirth = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
        } elseif ($input_date >= $current_date) {
            $dateOfBirthError = "Date of Birth Can not be Future";
            $_POST['dateOfBirth'] = "";
            $dateOfBirth = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
        } else {
            $everythingOK = TRUE;
        }
    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $height = $_POST['height'];
        if (empty($height)) {
            $heightError = "Height is required";
            $_POST['height'] = "";
            $height = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
        } else {
            $everythingOK = TRUE;
        }
    }








    if ($everythingOK && $everythingOKCounter == 0) {


        $birthdate = new DateTime($_POST["dateOfBirth"]);
        $today = new DateTime();

        $age = $today->diff($birthdate)->y;
        $tempImage = "temp.png";
        $tempAdoption_status = "Not Adopted";


        $signup_data = array(

            'orphan_image'          =>     $tempImage,
            'orphan_mail'     =>     $_POST['email'],
            'password'               =>     $_POST['password'],
            'orphan_name'     =>     $_POST['name'],
            'orphan_gender'     =>    $_POST['gender'],
            'height'     =>     $_POST['height'],
            'date_of_birth'               =>     $_POST['dateOfBirth'],
            'age'     =>      $age,
            'body_color'     =>   $_POST['bodyColor'],
            'adoption_status'     =>     $tempAdoption_status
        );


        $is_signup_successful =  add_new_orphan($signup_data);
        if ($is_signup_successful) {
            echo "Data Stored";
            header('Location:../../Views/Supervisor/OrphanProfiles.php');
        } else {
            header('Location:../../Views/Supervisor/AddOrphans.php');
        }






        // 
    } else {

        $_SESSION['S_nameError'] = $nameError;
        $_SESSION['S_emailError'] = $emailError;
        $_SESSION['S_passwordError'] = $passwordError;
        $_SESSION['S_dateOfBirthError'] = $dateOfBirthError;
        $_SESSION['S_heightError'] = $heightError;
        $_SESSION['S_bodyColorError'] = $bodyColorError;
        echo "Everything is Not ok, There are errors and we are sending to the front page <br>";
        header('Location:../../Views/Supervisor/AddOrphans.php');
    }
}
