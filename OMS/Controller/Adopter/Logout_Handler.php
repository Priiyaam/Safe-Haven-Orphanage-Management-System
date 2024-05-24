<?php

session_start();
$_SESSION['status'] = false;
session_destroy();
header('Location:../../Views/Adopter/Login/Login.php');
