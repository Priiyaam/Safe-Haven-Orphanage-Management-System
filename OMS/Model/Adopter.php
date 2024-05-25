<?php
// session_start();

require_once 'db_connect.php';



function show_all_data()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `adopter` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}




function show_single_data($colName, $id)
{

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `adopter` where $colName = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function update_data($colName, $id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE `adopter` SET 
                        `adopter_mail` = :adopter_mail, 
                        `password` = :password, 
                        `adopter_name` = :adopter_name, 
                        `adopter_phone` = :adopter_phone, 
                        `adopter_image` = :adopter_image, 
                        `adopter_profession` = :adopter_profession, 
                        `adopter_gender` = :adopter_gender, 
                        `adopter_address` = :adopter_address, 
                        `adoption_status` = :adoption_status 
                    WHERE `$colName` = :id";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':adopter_mail' => $data['adopter_mail'],
            ':password' => $data['password'],
            ':adopter_name' => $data['adopter_name'],
            ':adopter_phone' => $data['adopter_phone'],
            ':adopter_image' => $data['adopter_image'],
            ':adopter_profession' => $data['adopter_profession'],
            ':adopter_gender' => $data['adopter_gender'],
            ':adopter_address' => $data['adopter_address'],
            ':adoption_status' => $data['adoption_status'],
            ':id' => $id
        ]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
}








function delete_adopter($colName, $id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM adopter WHERE $colName = :id";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':id'=> $id
        ]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }

    // $conn = db_conn();
    // $selectQuery = "DELETE FROM adopter WHERE $colName = ?";
    // try {
    //     $stmt = $conn->prepare($selectQuery);
    //     $stmt->execute([$id]);
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    // }
    // $conn = null;

    // return true;
    
}


function search_specific_data($colNames, $tableName, $colName, $id)
{

    $conn = db_conn();
    $selectQuery = "SELECT $colNames FROM `$tableName` where $colName = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


function add_adopter($data)
{

    $conn = db_conn();
    $selectQuery = "INSERT into adopter (adopter_mail, password, adopter_name, adopter_phone, adopter_image, adopter_profession, adopter_gender, adopter_address, adoption_status)
    VALUES (:adopter_mail, :password, :adopter_name, :adopter_phone, :adopter_image, :adopter_profession, :adopter_gender, :adopter_address, :adoption_status)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':adopter_mail' => $data['adopter_mail'],
            ':password' => $data['password'],
            ':adopter_name' => $data['adopter_name'],
            ':adopter_phone' => $data['adopter_phone'],
            ':adopter_image' => $data['adopter_image'],
            ':adopter_profession' => $data['adopter_profession'],
            ':adopter_gender' => $data['adopter_gender'],
            ':adopter_address' => $data['adopter_address'],
            ':adoption_status' => $data['adoption_status']
        ]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
}


function send_adoption_request($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into adoption_request (orphan_image, orphan_name, orphan_gender, orphan_age, adopter_image, adopter_name, adopter_mail, adopter_phone, request_date, adoption_status)
    VALUES (:orphan_image, :orphan_name, :orphan_gender, :orphan_age, :adopter_image, :adopter_name, :adopter_mail, :adopter_phone, :request_date, :adoption_status)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':orphan_image' => $data['orphan_image'],
            ':orphan_name' => $data['orphan_name'],
            ':orphan_gender' => $data['orphan_gender'],
            ':orphan_age' => $data['orphan_age'],
            ':adopter_image' => $data['adopter_image'],
            ':adopter_name' => $data['adopter_name'],
            ':adopter_mail' => $data['adopter_mail'],
            ':adopter_phone' => $data['adopter_phone'],
            ':request_date' => $data['request_date'],
            ':adoption_status' => $data['adoption_status']
        ]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
}


function update_adoption_status($tableName, $adoption_status, $colName, $position)
{
    $conn = db_conn();
    $selectQuery = "UPDATE $tableName SET 
                        adoption_status = :adoption_status 
                    WHERE $colName = :id";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':adoption_status' => $adoption_status,
            ':id' => $position
        ]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
}





function add_appointment_adopter($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into appointment (orphan_name, adopter_name, adopter_phone, date_time)
    VALUES (:orphan_name, :adopter_name, :adopter_phone, :date_time)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':orphan_name' => $data['orphan_name'],
            ':adopter_name' => $data['adopter_name'],
            ':adopter_phone' => $data['adopter_phone'],
            ':date_time' => $data['date_time']
        ]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
}

function delete_appointment_adopter($id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `appointment` WHERE `appointment_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function search_orphans_data($age)
{

    $conn = db_conn();
    $selectQuery = "SELECT orphan_name,orphan_gender,age,body_color FROM orphan where CAST(age AS UNSIGNED) <= :age";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':age' => $age
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
}
