<?php
require_once '../../Model/Supervisor.php';
session_start();



$update_location = $_SESSION['mail'];

$mailFlag = $_SESSION['mail'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['newPass'];
    if (empty($newPassword) || strlen($newPassword) < 8) {
        $newPasswordError = "Write at least 8 Character";
        $_POST['newPass'] = "";
        $newPassword = "";
    } else if (!preg_match('/[@#$%]/', $newPassword)) {
        $newPasswordError = "Password must contain at least one special character (@, #, $, %)";
        $_POST['newPass'] = "";
        $newPassword = "";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reTypePassword = $_POST['ConfirmNewPass'];
    if (empty($reTypePassword) || strlen($reTypePassword) < 8) {
        $reTypePasswordError = "Write at least 8 Character";
        $_POST['ConfirmNewPass'] = "";
        $reTypePassword = "";
    } else if (!($_POST['newPass'] === $_POST['ConfirmNewPass'])) {
        $reTypePasswordError = "New Password and Retype New Password must be same";
        $_POST['ConfirmNewPass'] = "";
        $reTypePassword = "";
    } else {



        $supervisor_data = show_single_supervisor_data("supervisor_mail", $update_location);
        $supervisor_data["password"] = $newPassword;
        $update_confirmation = update_supervisor_data("supervisor_mail", $update_location, $supervisor_data);
        if ($update_confirmation) {
            echo "Password Updated Successfully";
            header("Location: ../../Views/Supervisor/Login/Login.php");
        } else {
            header("Location: ../../Views/Supervisor/Forget_Password/ForgetPassword/ForgetPassword.php");
        }
    }
}