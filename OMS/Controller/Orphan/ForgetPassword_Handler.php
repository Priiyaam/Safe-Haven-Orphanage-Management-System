<?php
require_once '../../Model/Orphan.php';

session_start();



$everythingOK = FALSE;
$everythingOKCounter = 0;
$emailError = "";
$passwordError = "";

$email = "";
$password = "";
$_SESSION['emailError'] = "";
$_SESSION['passwordError'] = "";
$_SESSION['mail'] = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['mail'];
        if (empty($email)) {
            $emailError = "Email is required";
            $_POST['mail'] = "";
            $email = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;

            echo "Mail error 1";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
            $email = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
            echo "Mail error 2";
        } else {
            $everythingOK = TRUE;
        }
    }
}


if ($everythingOK && $everythingOKCounter == 0) {
    $Orphan_confirmation = show_single_orphan_data("orphan_mail", $email);
    if (isset($Orphan_confirmation)) {
        $_SESSION['mail'] = $email;
        header('Location:../../Views/Orphan/Forget_Password/CreateNewPassword/CreateNewPassword.php');
    }
} else {
    $_SESSION['emailError'] = $emailError;
    $_SESSION['passwordError']  = $passwordError;
    header('Location: ../../Views/Orphan/Forget_Password/ForgetPassword/ForgetPassword.php');
}
