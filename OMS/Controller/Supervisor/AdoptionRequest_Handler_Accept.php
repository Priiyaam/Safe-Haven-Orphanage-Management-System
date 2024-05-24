<?php


require_once '../../Model/Supervisor.php';
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location:../Views/Adopter/Login.php');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accept'])) {
        $_SESSION["adoption_request_id"] = $_POST['accept'];
        $_POST['accept'] = "";
        echo $_SESSION["adoption_request_id"];
    }
    if (isset($_POST['datepicker'])) {
        $_SESSION["appointment_date"] = $_POST['datepicker'];
        echo $_SESSION["appointment_date"];
        echo $_SESSION["adoption_request_id"];



        $req_data = search_specific_data("orphan_name,adopter_name,adopter_phone", "adoption_request", "request_id ", $_SESSION["adoption_request_id"]);

        $appointment_data = array(

            'orphan_name'          =>      $req_data['orphan_name'],
            'adopter_name'     =>     $req_data['adopter_name'],
            'adopter_phone'               =>     $req_data['adopter_phone'],
            'date_time'     =>    $_SESSION["appointment_date"]
        );


        $is_successful =  add_appointment($appointment_data);
        $is_successful2 = update_adoption_status("adopter","Pending Appointment","adopter_name",$req_data['adopter_name']);
        $is_successful3 = update_adoption_status("orphan","Pending Appointment","orphan_name",$req_data['orphan_name']);
        $is_successful4 =  delete_adoption_request($_SESSION["adoption_request_id"]);
        if ($is_successful && $is_successful2 && $is_successful3 && $is_successful4) {
            echo "Data Stored";
            header('Location: ../../Views/Supervisor/AdoptionRequests.php');
        } else {
            header('Location: ../../Views/Supervisor/Login/Login.php');
        }
    } else {
        echo "Error";
        die("Error");
    }
}