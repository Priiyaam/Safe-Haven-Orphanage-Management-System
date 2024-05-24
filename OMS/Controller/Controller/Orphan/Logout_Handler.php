<?php

session_start();
$_SESSION['status'] = false;
session_destroy();
header('Location:../../Views/Orphan/Login/Login.php');
