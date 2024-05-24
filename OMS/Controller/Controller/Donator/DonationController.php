<?php

session_start();
require "../../Model/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $organization = $_POST['organization'];
    $purpose = $_POST['purpose'];
    $amount = intval($_POST['amount']);

    // You should perform proper data validation and sanitization here

    // Insert the data into the database
    $query = "INSERT INTO donation (name, organization, purpose, amount) VALUES ('$name', '$organization', '$purpose', $amount)";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("location: Display.php");
        die;
    } else {
        echo "Error submitting donation.";
    }
}
?>
