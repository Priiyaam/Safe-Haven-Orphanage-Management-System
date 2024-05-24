<?php
session_start();

require_once '../../Model/Supervisor.php';

$everythingOK = FALSE;
$everythingOKCounter = 0;
$emailError = "";
$passwordError = "";

$email = "";
$password = "";
$_SESSION['emailError'] = "";
$_SESSION['passwordError'] = "";

$_SESSION['cookie_mail'] = "";
$_SESSION['cookie_pass'] = "";




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


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'];
            if (empty($password) || strlen($password) < 8) {
                $passwordError = "Write at least 8 Character";
                $_POST['password'] = "";
                $password = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
                echo "Pass error 1";
            } else if (!preg_match('/[@#$%]/', $password)) {
                $passwordError = "Password must contain at least one special character (@, #, $, %).";
                $_POST['password'] = "";
                $password = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
                echo "Pass error 2";
            } else {
                $everythingOK = TRUE;
            }
        }




        if (isset($_POST['rememberMe'])) {
            $email = $_POST['mail'];
            $password = $_POST['password'];
            setcookie('email', $email, time() + 100, '/');                        
            setcookie('password', $password, time() + 100, '/');                  
            echo 'rememberMe set';
        }

        // echo "Line 94";
        if ($everythingOK && $everythingOKCounter == 0) {

            $data = show_single_supervisor_data("supervisor_mail", $email);
            $isSupervisor = FALSE;
            if (isset($data)) {

                if ($data["supervisor_mail"] === $email && $data["password"] === $password) {
                    $_SESSION["loginUser_Name"] = $data["supervisor_name"];
                    $_SESSION["loginUser_mail"] = $data["supervisor_mail"];
                    $_SESSION['mail'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['supervisor_image'] =  $data["supervisor_image"];

                    $_SESSION["P_mail"] = $data["supervisor_mail"];
                    $_SESSION["P_password"] = $data["password"];
                    $_SESSION["P_name"] = $data["supervisor_name"];
                    $_SESSION["P_phone"] = $data["supervisor_phone"];
                    $_SESSION["P_image"] = $data["supervisor_image"];
                    $_SESSION["P_salary"] = $data["supervisor_salary"];
                    $_SESSION["P_id"] = $data["supervisor_id"];



                    echo "Working well 1<br>";
                    $isSupervisor = TRUE;
                } else {
                }
                // }
            }
            if ($isSupervisor) {
                header('Location: ../../Views/Supervisor/Dashboard_Home.php');
            } else {
                header('Location: ../../Views/Supervisor/Login/Login.php');
            }
        } else {
            $_SESSION['emailError'] = $emailError;
            $_SESSION['passwordError']  = $passwordError;
            header('Location: ../../Views/Supervisor/Login/Login.php');
        }
    }
}
