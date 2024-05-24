<?php

session_start();



require_once '../../Model/Adopter.php';

$isSuccessful = delete_adopter("adopter_mail", $_SESSION['mail']);

if ($isSuccessful) {
    session_destroy();
    header('Location:../../Views/Adopter/Login/Login.php');
} else {
    header('Location:../../Views/Adopter/Dashboard_Home.php');
}

// End