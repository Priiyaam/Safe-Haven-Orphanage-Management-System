<?php

require_once('../../Model/Adopter.php');
$ageLimit = $_GET['age'];

$results  = search_orphans_data($ageLimit);


// Return JSON-encoded results
header('Content-Type: application/json');
echo json_encode($results);