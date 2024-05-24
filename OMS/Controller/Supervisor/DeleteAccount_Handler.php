<?php

session_start();


require_once '../../Model/Supervisor.php';

$isSuccessful = delete_supervisor("supervisor_mail", $_SESSION['mail']);

if ($isSuccessful) {
    session_destroy();
    header('Location:../../Views/Supervisor/Login/Login.php');
} else {
    header('Location:../../Views/Supervisor/Dashboard_Home.php');
}

// End