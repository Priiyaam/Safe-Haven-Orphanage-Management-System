<?php

session_start();


require_once '../../Model/Orphan.php';

$isSuccessful = delete_orphan("orphan_mail", $_SESSION['mail']);

if ($isSuccessful) {
    session_destroy();
    header('Location:../../Views/Orphan/Login/Login.php');
} else {
    header('Location:../../Views/Orphan/Dashboard_Home.php');
}
