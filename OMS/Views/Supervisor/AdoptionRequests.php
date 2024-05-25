<?php


require_once '../../Model/Supervisor.php';
error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location: Login/Login.php');
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Requests</title>
    <style>
        body { background-color: lightpink;
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

        /* Add basic styles to <a> tags */
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
            /* position: fixed; */
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

        .appoint {
            display: inline-block;
            padding-right: 10px;
        }

        .reject {
            display: inline-block;
        }

        td {
            white-space: nowrap;
        }

        .button-appoint {
            display: inline-block;
            padding: 10px 20px;
            background-color: green;
            color: #fff;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            margin-right: 10px;
            cursor: pointer;
        }

        .button-reject {
            display: inline-block;
            padding: 10px 20px;
            background-color: red;
            color: #fff;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            margin-right: 10px;
        }

        .button:last-child {
            margin-right: 0;
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

        /* Overlay Page Decoration */

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
        }

        #overlay .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        #overlay h2 {
            margin-bottom: 10px;
        }

        #overlay input[type="text"] {
            display: block;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
            border: none;
        }

        #overlay button {
            padding: 5px 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #overlay button:hover {
            background-color: #3e8e41;
        }
    </style>







    <script>
        function openOverlay() {
            document.getElementById("overlay").style.display = "block";
        }

        function closeOverlay() {
            document.getElementById("overlay").style.display = "none";
        }


        const inputField = document.getElementById('datepicker');




        function checkDate() {
            const inputDate = document.getElementById("datepicker").value;
            const selectedDate = new Date(inputDate);
            const today = new Date();
            if (selectedDate.getTime() <= today.getTime() || selectedDate.getTime() === "") {
                alert('You cannot select today or any of the previous dates');
                return false;
            } else {
                return true;
            }
        }

        function submitForms() {
            document.getElementById("reqID_form").submit();
            document.getElementById("date_form").submit();
        }


        function get_reject_ID() {


            var rejectBtn = event.target; 
            var requestID = rejectBtn.getAttribute('value')
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
            };
            xhttp.open("GET", "../../Controller/Supervisor/AdoptionRequest_Handler_Reject.php?requestID=" + requestID, true);
            xhttp.send(); 


        }
    </script>





</head>

<body>
    <?php include '../../Layout/Supervisor/SupervisorHeader.php'; ?>


    <div class="container">
        <div class="left">
            <p>
            <h3>Adoption Requests</h3>
            <hr>
            <ul>
                <li><a href="Dashboard_Home.php">The Dashboard Home</a></li>
                <li><a href="Profile.php">My Profile</a></li>
                <li><a href="AddOrphans.php">Create Orphan Accounts</a></li>
                <li><a href="orphanProfiles.php">View Orphan Profiles</a></li>
                <li><a href="AdoptionRequests.php" class="selected">View Adoption Requests</a></li>
                <li><a href="ChangePassword.php">Change Password</a></li>
                <li><a href="../../Controller/DeleteAccount_Handler.php">Delete Account</a></li>
            </ul>

            </p>


        </div>
        <div class="right">

            <form id="reqID_form" action="../../Controller/Supervisor/AdoptionRequest_Handler_Accept.php" method="POST" onsubmit="return checkDate();">

                <?php

                $data = show_adoption_requests();

                $_SESSION["selectedRequestID"] = -1;

                echo '<table border="1">';
                echo '<tr>
                <th>Orphan Image</th>
                <th>Orphan Name</th>
                <th>Orphan Gender</th>
                <th>Orphan Age</th>
                <th>Adopter Image</th>
                <th>Adopter Name</th>
                <th>Adopter Mail</th>
                <th>Adopter Phone</th>
                <th>Request Date</th>
                <th>Adoption Status</th>
                <th>Action</th>
                </tr>';

                foreach ($data as $row) {


                    $file_exists_data = "../../images/Orphan_Images/" . $row['orphan_image'] . "";
                    $file_adopter_exists_data = "../../images/Adopter_Images/" . $row['adopter_image'] . "";

                    if (!file_exists($file_exists_data)) {
                        $row['orphan_image'] = "temp.png";
                    }

                    if (!file_exists($file_adopter_exists_data)) {
                        $row['adopter_image'] = "temp.png";
                    }


                    echo '<tr>';
                    echo '<td><img src="../../images/Orphan_Images/' . $row['orphan_image'] . '" height="70px" width="70px"></td>';
                    echo '<td>' . $row['orphan_name'] . '</td>';
                    echo '<td>' . $row['orphan_gender'] . '</td>';
                    echo '<td>' . $row['orphan_age'] . '</td>';
                    echo '<td><img src="../../images/Adopter_Images/' . $row['adopter_image'] . '" height="70px" width="70px"></td>';
                    echo '<td>' . $row['adopter_name'] . '</td>';
                    echo '<td>' . $row['adopter_mail'] . '</td>';
                    echo '<td>' . $row['adopter_phone'] . '</td>';
                    echo '<td>' . $row['request_date'] . '</td>';
                    echo '<td>' . $row['adoption_status'] . '</td>';
                    echo '<td><span class="appoint">  <a class="button-appoint" name="acceptBtn" id="acceptBtn" onclick="openOverlay()" value="' . $row["request_id"] . '"> Appoint</a>
                    <input type="text" name="accept" id="accept"  value="' . $row['request_id'] . '" style="display: none">
                    </span>
                    <span class="reject"><a href="../../Controller/Supervisor/AdoptionRequest_Handler_Reject.php" class="button-reject" name="rejectBtn" id="rejectBtn" onClick="get_reject_ID();" value="' . $row["request_id"] . '"> Reject</a>
                    <input type="text" name="reject" id="reject" value="' . $row["request_id"] . '" style="display: none">
                    </span></td>';
                    echo '</tr>';
                }

                echo '</table>';
                ?>





                <div id="overlay">
                    <div class="content">
                        <h2>Select Date</h2>
                        onsubmit="return checkDate();" id="date_form"> -->
                        <input type="date" id="datepicker" name="datepicker" placeholder="Choose a date">
                        <button onclick="closeOverlay(); submitForms();">Appoint</button>
                    </div>
                </div>

            </form>

        </div>
    </div>



    <?php include '../../Layout/Supervisor/SupervisorFooter.php'; ?>
</body>

</html>