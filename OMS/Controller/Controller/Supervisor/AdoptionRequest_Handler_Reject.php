<?php


require_once '../../Model/Supervisor.php';
session_start();

$variableValue = -1;
$requestID = -1;

if (!isset($_SESSION["loginUser_Name"])) {
    header('Location: ../../../../Views/Supervisor/Login/Login.php');
}



if (isset($_GET['requestID'])) {
    $requestID = $_GET['requestID'];
    echo "The request ID is: " . $requestID;
}

$req_data = search_specific_data("orphan_name,adopter_name,adopter_phone", "adoption_request", "request_id ", $requestID);

$is_successful =  delete_adoption_request($requestID);

$is_successful2 = update_adoption_status("adopter","Not Adopted","adopter_name",$req_data['adopter_name']);
$is_successful3 = update_adoption_status("orphan","Not Adopted","orphan_name",$req_data['orphan_name']);




if($is_successful && $is_successful2 && $is_successful3){
    header('Location: ../../Views/Supervisor/AdoptionRequests.php');
}else {
    header('Location: ../../Views/Supervisor/Login/Login.php');
}




//