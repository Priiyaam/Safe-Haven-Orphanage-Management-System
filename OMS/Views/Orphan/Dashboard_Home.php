<?php

require_once '../../Model/Orphan.php';

error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header("Location: Login/Login.php");
}


$P_id = $_SESSION["P_id"];



?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-color: lightblue;
}
</style>
</head>
<body>



</body>
</html>

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
            border-radius: 6px;
            transition: background-color 0.3s ease-in-out;
            padding: 22px;
        }

        .left a:hover {
            background-color: blue;
            color: mintcream;
            transform: scale(1.2);

        }



        .right {
            padding: 20px;
            width: 70%;
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
            margin-bottom: 30px;
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
    </style>

</head>

<body>
    <?php include '../../Layout/Orphan/OrphanHeader.php'; ?>


    <div class="container">
        <div class="left">
            <p>
            <h3>Home</h3>
            <hr>
            <ul>
                <li><a href="../Orphan/Dashboard_Home.php" class="selected">The Dashboard Home</a></li> <br>

                <li><a href="../Orphan/Child_Profiles.php" class="selected" style="padding-top:1px;"> Child Profiles </a></li> <br>

                <li><a href="../Orphan/Report&Analytics.php" class="selected">Reporting and Analytics</a></li> <br>

                <li><a href="../Orphan/Profile.php">My Profile</a></li> <br>
                <li><a href="../Orphan/ChangePassword.php">Change Password</a></li> <br>
                <li><a href="../../Controller/Orphan/DeleteAccount_Handler.php">Delete Account</a></li>
            </ul>

            </p>


        </div>
        <div class="right">

            <div class="matrix">
                <div class="row">
                    <div class="column" id="event-table" style="display: flow; justify-content: center; align-items: center; flex-direction: column;">

                        <h1 style="text-align: center;">Upcoming Event</h1>

                        <?php


                       
                        $dates = show_column_data("events","event_date");

                        $current_date = date('m/d/Y'); 

                        $upcoming_date = null;

                        foreach($dates as $date) {
                            if(strtotime($date["event_date"]) > strtotime($current_date)) {
                                $upcoming_date = $date;
                                break;
                            }
                        }

                        $event_name = show_single_cell_data("event_name","events","event_date",$upcoming_date["event_date"]);

                        echo '<table border="2">';
                        echo '<tr>
                            <th>Event Name</th>
                            <th>Event Date</th>

                </tr>';



                        echo '<tr>';
                        echo '<td>' . $event_name["event_name"] . '</td>';
                        echo '<td>' . $upcoming_date["event_date"] . '</td>';
                        echo '</tr>';

                        echo '</table>';
                        ?>


                    </div>
                    
                    
                    
                    
                    
                    <div class="column" id="appointment-time" style="display: flow; justify-content: center; align-items: center; flex-direction: column;">

                        <h1 style="text-align: center;">Upcoming Appointments</h1>

                        <?php


                        $data = show_single_row_data("appointment","orphan_name", $_SESSION["P_name"]);




                        echo '<table border="2">';
                        echo '<tr>
                            <th>Adopter Name</th>
                            <th>Appointment Date</th>

                            </tr>';

                        foreach ($data as $row) {

                            echo '<tr>';
                            echo '<td>' . $row['adopter_name'] . '</td>';
                            echo '<td>' . $row['date_time'] . '</td>';
                            $current_date = date('Y-m-d'); // Get the current date
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

                        <!-- <?php

                        echo '<div class="salary-container">
                        <label class="salary-label">Salary :</label>
                        <span class="salary-amount">' . $supervisorData["supervisor_salary"] . ' /-</span>
                        <span class="salary-currency">BDT</span>
                      </div>';


                        ?> -->



                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include '../../Layout/Orphan/OrphanFooter.php'; ?>

    <script>
