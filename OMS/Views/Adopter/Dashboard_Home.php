<?php

require_once '../../Model/Orphan.php';
require_once '../../Model/Adopter.php';

error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header("Location: Login/Login.php");
}


$P_id = $_SESSION["P_id"];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            margin: 50px;
        }

        a {
            color: #333;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            padding: 22px;
        }

        .left a:hover {
            background-color: yellow;
            color: black;
            transform: scale(1.2);
        }



        .right {
            padding: 20px;
            width: 70%;
            /* Overflow for scrolling */
            /* overflow-y: hidden; */
            /* overflow-x: hidden; */
            box-sizing: border-box;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .matrix {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .row {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .column {
            width: 49%;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin-bottom: 20px;
            overflow-x: auto;
            overflow-y: auto;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin: -34px 0;
            margin-left: -47px;
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


        .salary-container {
            font-family: Arial, sans-serif;
            border: 2px solid #ccc;
            padding: 10px;
            display: inline-block;
            border-radius: 5px;
        }

        .salary-label {
            font-weight: bold;
            margin-right: 5px;
        }

        .salary-amount {
            font-size: 24px;
            color: #3e3e3e;
        }

        .salary-currency {
            font-size: 18px;
            color: #666;
            margin-left: 5px;
        }

        /* Table Decoration */
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

        li {
            display: inline-block;
            margin-right: -15px;
        }

        /* Reduce gap between time and date */
        p {
            margin: 0;
        }

        /* Style time element */
        #time {
            font-size: 4em;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
            background-color: #ffc107;
            box-shadow: 0 0 20px rgba(255, 193, 7, 0.8);
            border-radius: 10px;
            animation: pulse 2s infinite;
        }

        #date {
            font-size: 1.5em;
            text-align: center;
            background-color: #f44336;
            box-shadow: 0 0 20px rgba(244, 67, 54, 0.8);
            border-radius: 10px;
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            from {
                transform: scale(0.8);
            }
            to {
                transform: scale(1.1);
            }
        }

        #age-select {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #ccc;
            background-color: #f8f8f8;
            transition: all 0.3s ease;
            }

            #age-select option {
            font-size: 14px;
            font-weight: normal;
            color: #333;
            background-color: #fff;
            }





    </style>
    

    <script>
        function showTime() {
            var xhttp = new XMLHttpRequest(); // Create an XMLHttpRequest object
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("time").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../../Controller/Adopter/Time_Handler.php", true); 
            xhttp.send(); 
        }

        setInterval(showTime, 1000);

        function showDate() {
            var xhttp = new XMLHttpRequest(); 
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("date").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../../Controller/Adopter/Date_Handler.php", true); 
            xhttp.send(); 
        }

        setInterval(showDate, 1000);


        function updateTableData() {
            const ageSelect = document.getElementById('age-select');
            const orphansTable = document.getElementById('orphans-table');
            
            
            const ageLimit = ageSelect.value;
            const tableName = 'orphans'; 
            fetch(`../../Controller/Adopter/OrphanInfo_Handler.php?table=${tableName}&age=${ageLimit}`)
                .then(response => response.json())
                .then(data => {
                orphansTable.querySelector('tbody').innerHTML = '';

                
                
                for (let i = 0; i < data.length; i++) {
                    const rowValues = Object.values(data[i]);
                    const row = document.createElement('tr');
                    rowValues.forEach(value => {
                    const cell = document.createElement('td');
                    cell.textContent = value;
                    row.appendChild(cell);
                    });
                    orphansTable.querySelector('tbody').appendChild(row);
                }
                })
            .catch(error => console.error(error));
        }




    </script>



</head>

<body onload="showTime()">
    <?php include '../../Layout/Adopter/AdopterHeader.php'; ?>


    <div class="container">
        <div class="left">
            <p>
            <h3>Home</h3>
            <hr>
            <ul>
                <li><a href="Dashboard_Home.php" class="selected">The Dashboard Home</a></li> <br>
                <li><a href="Profile.php">My Profile</a></li> <br>
                <li><a href="orphanProfiles.php">View Orphan Profiles</a></li>
                <li><a href="ChangePassword.php">Change Password</a></li> <br>
                <li><a href="../../Controller/Adopter/DeleteAccount_Handler.php">Delete Account</a></li>
                <li><a href="searchHere.php">Search</a></li> <br>
                <li><a href="mail.php">Send Mail</a></li> <br>

            </ul>

            </p>


        </div>
        <div class="right">

            <div class="matrix">
                <div class="row">
                    <div class="column" id="event-table" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">

                        
                    <!-- <p><h1 id="time"></h1></p>
                    <p><h3 id="date"></h3></p> -->
                    <!-- <p><h5>Step into your new world of love and care, dear adopter! We're delighted to have you with us.</h5></p> -->
                    
                    <select id="age-select" onchange="updateTableData()">
                        <option value="0">-- Select Age Limits--</option>
                        <option value="5">5 years old or younger</option>
                        <option value="10">10 years old or younger</option>
                        <option value="15">15 years old or younger</option>
                    </select>

                    <div style="height: 150px; overflow-y: scroll;">
                        <table id="orphans-table">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Body Color</th>
                            </tr>
                        </thead>
                        <tbody >
                        </tbody>
                        </table>
                    </div>



                    </div>

  <div class="column" id="appointment-time" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">

                        <h1 style="text-align: center;">Upcoming Appointments</h1>

                        <?php


                        $data = show_single_row_data("appointment","adopter_name", $_SESSION["P_name"]);
                        // $datatype = var_dump($data);
                        //$data =  array_column($data, 'appointment_id ', 'orphan_name', 'adopter_name', 'adopter_phone', 'date_time');




                        echo '<table border="1">';
                        echo '<tr>
                            <th>Orphan Name</th>
                            <th>Appointment Date</th>
                            </tr>';

                        foreach ($data as $row) {

                            echo '<tr>';
                            echo '<td>' . $row['orphan_name'] . '</td>';
                            echo '<td>' . $row['date_time'] . '</td>';
                            $current_date = date('Y-m-d');
                            if(strtotime($row['date_time']) === strtotime($current_date)){
                                $_SESSION["O_appointment"] = "You Have an appointment Today";
                            }else{
                                $_SESSION["O_appointment"] = "No Appointment Today";
                            }
                            echo '</tr>';
                        }

                        echo '</table>';
                        ?>


                    </div>
                </div>
                <div class="row">
                    <div class="column" id="no-use">
                        <h1 style="text-align: center;"><?php echo $_SESSION["O_appointment"]; ?></h1>
                    </div>
                    <div class="column" id="salary">

                       


                    </div>
                </div>
            </div>

        </div>
    </div>



    <script>
