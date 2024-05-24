<?php


require_once '../../Model/Adopter.php';
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location:../Views/Adopter/Login.php');
}



$O_name = "";
$adopter_email = $_SESSION["P_mail"];
$O_gender = "";
$request_status = "Pending";
$request_date = date('d-m-Y');
$adopter_phone = $_SESSION["P_phone"];
$O_age = "";
$O_image = "";
$adopter_image = $_SESSION["P_image"];
$adopter_name = $_SESSION["P_name"];

$request_id = "";
$P_adoptionStatus = "Request Pending"; 
$_SESSION["SelectedOrphan"] = "";
$orphan_id = "";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    

    if (isset($_POST["adoption_request"])) {
        $orphan_id = $_POST["adoption_request"];
    }
    $_SESSION["SelectedOrphan"] = $orphan_id;
    

    $orphan_data = search_specific_data("orphan_image, orphan_name, orphan_gender, age", "orphan", "orphan_id", $orphan_id);
    $adopter_data = search_specific_data("adopter_image, adopter_name, adopter_mail, adopter_phone", "adopter", "adopter_mail", $adopter_email);


    $currentDate = new DateTime();
    $formattedDate = $currentDate->format('d-m-Y');
    $adoption_status = "Request Pending";






    $adoption_req_data = array(
        'orphan_image'               =>     $orphan_data["orphan_image"],
        'orphan_name'          =>      $orphan_data["orphan_name"],
        'orphan_gender'     =>     $orphan_data["orphan_gender"],
        'orphan_age'    =>     $orphan_data["age"],
        'adopter_image'     =>     $adopter_data["adopter_image"],
        'adopter_name'     =>     $adopter_data["adopter_name"],
        'adopter_mail'     =>     $adopter_data["adopter_mail"],
        'adopter_phone'     =>     $adopter_data["adopter_phone"],
        'request_date'     =>     $formattedDate,
        'adoption_status'     =>     $adoption_status
    );

    $insertion_successful = send_adoption_request($adoption_req_data); 

    if ($insertion_successful) {
        $orphan_table_update = update_adoption_status("orphan", "Request Pending", "orphan_id ", $orphan_id);
        $adopter_table_update = update_adoption_status("adopter", "Request Pending", "adopter_mail ", $adopter_email);

        if ($orphan_table_update && $adopter_table_update) {
            header('Location: ../../Views/Adopter/OrphanProfiles.php');
        }
    } else {
        die("<br><br><h1>Adoption Request Unsuccessful</h1>");
    }
}
