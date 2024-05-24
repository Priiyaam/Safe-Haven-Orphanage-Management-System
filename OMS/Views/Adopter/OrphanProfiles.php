<?php


require_once '../../Model/Orphan.php';
error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"]) || $_SESSION["status"] === FALSE) {
    header('Location:Login.php');
}

$isSelectable = "enabled";
if ($_SESSION["SelectedOrphan"] === $row['id']) {
    $isSelectable = "";
} else {
    $isSelectable = "enabled";
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orphanage Profiles</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
    }

    .container {
        display: flex;
        height: 600px;
        margin: 20px auto;
        max-width: 1015px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .left {
        background-color: #f5f5f5;
        padding: 20px;
        width: 30%;
        border-right: 1px solid #ddd;
        box-sizing: border-box;
    }

    .left h3 {
        margin-top: 0;
    }

   
    .selected {
        background-color: #333;
        color: #fff;
    }

    .left a {
        display: inline-block;
        width: 200px;
        height: 20px;
        padding: 10px;
        margin: 5px;
    }

    a {
        color: #333;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .left a:hover {
        background-color: yellow;
        color: black;
        transform: scale(1.2);
    }

    .right {
        padding: 20px;
        width: 85%;
        overflow-y: auto;
        overflow-x: auto;
        box-sizing: border-box;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    li {
        margin: 10px 0;
    }

    a {
        color: #333;
        text-decoration: none;
    }

    footer {
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .button-container {
        bottom: 0;
        left: 0;
        right: 0;
        background-color: white;
        padding: 10px;
        text-align: center;

        box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
    }

    .request-button {
        display: block;
        margin: 20px auto;
        width: 100px;
        height: 30px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        position: absolute;
        bottom: 100px;
        left: 50%;
        transform: translateX(-50%);
    }

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        font-size: 14px;
        text-align: center;
    }

    thead {
        background-color: #f2f2f2;
    }

    th,
    td {
        text-align: center;
        padding: 8px;
        border: 1px solid #ddd;
    }

    th {
        font-weight: bold;
        color: #333;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    td:first-child,
    th:first-child {
        border-left: none;
    }

    td:last-child,
    th:last-child {
        border-right: none;
    }

    tbody td:nth-child(odd) {
        background-color: #f9f9f9;
    }

    tbody td:nth-child(even) {
        background-color: #fff;
    }
    </style>

    <script>
    function selected_radio_button() {
        var radio_button = document.getElementsByName("adoption_request");
        radio_button.classList.add('custom-radio-after');
    }
    </script>




</head>

<body>
    <?php include '../../Layout/Adopter/AdopterHeader.php'; ?>


    <div class="container">
        <div class="left">
            <p>
            <h3>Orphan Profiles</h3>
            <hr>
            <ul>
                <li><a href="Dashboard_Home.php">The Dashboard Home</a></li> <br>
                <li><a href="Profile.php">My Profile</a></li>
                <li><a href="orphanProfiles.php" class="selected">View Orphan Profiles</a></li>
                <li><a href="ChangePassword.php">Change Password</a></li>
                <li><a href="../../Controller/Adopter/DeleteAccount_Handler.php">Delete Account</a></li>
            </ul>

            </p>


        </div>
        <div class="right">

            <form action="../../Controller/Adopter/AdoptionRequest_Handler.php" method="POST">

                <?php

                $data = show_all_orphans_data();



                echo '<table border="1">';
                echo '<tr>
                <th>Image</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Height</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Body Color</th>
                <th>Adoption Status</th>
                <th>Request</th>
                </tr>';

                foreach ($data as $row) {


                    $file_exists_data = "../../images/Orphan_Images/" . $row['orphan_image'] . "";

                    if (!file_exists($file_exists_data)) {
                        $row['orphan_image'] = "temp.png";
                    }


                    echo '<tr>';
                    echo '<td><img src="../../images/Orphan_Images/' . $row['orphan_image'] . '" height="70px" width="70px"></td>';
                    echo '<td>' . $row['orphan_name'] . '</td>';
                    echo '<td>' . $row['orphan_gender'] . '</td>';
                    echo '<td>' . $row['height'] . '</td>';
                    echo '<td>' . $row['date_of_birth'] . '</td>';
                    echo '<td>' . $row['age'] . '</td>';
                    echo '<td>' . $row['body_color'] . '</td>';
                    echo '<td>' . $row['adoption_status'] . '</td>';
                    echo '<td>  <input type="radio" name="adoption_request" value="' . $row['orphan_id'] . '" ' . $isSelectable . ' class="custom-radio" onclick="selected_radio_button()"> </td>';
                    echo '</tr>';
                }

                echo '</table>';
                ?>

                <button type="submit" class="request-button">Request</button>

            </form>

        </div>
    </div>



    <?php include '../../Layout/Adopter/AdopterFooter.php'; ?>
</body>

</html>