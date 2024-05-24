<?php
require_once '../../Model/Orphan.php';
session_start();

$currPasswordError = "";
$newPasswordError = "";
$reTypePasswordError = "";

$currPassword = "";
$newPassword = "";
$reTypePassword = "";
$_SESSION["currPasswordError"] = "";
$_SESSION["newPasswordError"] = "";
$_SESSION["reTypePasswordError"] = "";
$update_location = $_SESSION['mail'];


$everythingOkCounter = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $currPassword = $_POST['currentPass'];
        if (empty($currPassword)) {
            $currPasswordError = "Current Password is required";
            $_POST['currentPass'] = "";
            $currPassword = "";
            $everythingOkCounter += 1;
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newPassword = $_POST['newPass'];
        // echo $wordCount;
        if (empty($newPassword) || strlen($newPassword) < 8) {
            $newPasswordError = "Write at least 8 Character";
            $_POST['newPass'] = "";
            $newPassword = "";
            $everythingOkCounter += 1;
        } else if (!preg_match('/[@#$%]/', $newPassword)) {
            $newPasswordError = "Password must contain at least one special character (@, #, $, %)";
            $_POST['newPass'] = "";
            $newPassword = "";
            $everythingOkCounter += 1;
        } else if ($_POST['currentPass'] === $_POST['newPass']) {
            $newPasswordError = "Current Password and New Password can't be same";
            $_POST['newPass'] = "";
            $newPassword = "";
            $everythingOkCounter += 1;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $reTypePassword = $_POST['reTypeNewPass'];
        // echo $wordCount;
        if (empty($reTypePassword) || strlen($reTypePassword) < 8) {
            $reTypePasswordError = "Write at least 8 Character";
            $_POST['reTypeNewPass'] = "";
            $reTypePassword = "";
            $everythingOkCounter += 1;
        } else if (!($_POST['newPass'] === $_POST['reTypeNewPass'])) {
            $reTypePasswordError = "New Password and Retype New Password must be same";
            $_POST['reTypeNewPass'] = "";
            $reTypePassword = "";
            $everythingOkCounter += 1;
        } else {
        }
    }

    if ($everythingOkCounter == 0) {

        $orphan_data = show_single_orphan_data("orphan_mail", $update_location);
        $orphan_data["password"] = $newPassword;
        $update_confirmation = update_orphan_data("orphan_mail", $update_location, $orphan_data);

        if ($update_confirmation) {
            echo "Password Updated Successfully";
            header("Location: ../../Views/Orphan/Login/Login.php");
        } else {
            header("Location: ../../Views/Orphan/ChangePassword.php");
        }


    } else {
        // show errors 
        $_SESSION["currPasswordError"] = $currPasswordError;
        $_SESSION["newPasswordError"] = $newPasswordError;
        $_SESSION["reTypePasswordError"] = $reTypePasswordError;
        header('Location:../../Views/Orphan/ChangePassword.php');
    }
}
