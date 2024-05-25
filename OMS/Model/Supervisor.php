<?php
// session_start();

require_once 'db_connect.php';



function show_all_data()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `supervisor` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}




function show_single_supervisor_data($colName, $id)
{

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `supervisor` where $colName = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function update_supervisor_data($colName, $id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE supervisor SET 
                        `supervisor_mail` = :supervisor_mail, 
                        `password` = :password, 
                        `supervisor_name` = :supervisor_name, 
                        `supervisor_phone` = :supervisor_phone, 
                        `supervisor_salary` = :supervisor_salary, 
                        `supervisor_image` = :supervisor_image 
                    WHERE $colName = :id";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':supervisor_mail' => $data['supervisor_mail'],
            ':password' => $data['password'],
            ':supervisor_name' => $data['supervisor_name'],
            ':supervisor_phone' => $data['supervisor_phone'],
            ':supervisor_salary' => $data['supervisor_salary'],
            ':supervisor_image' => $data['supervisor_image'],
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








function delete_supervisor($colName, $id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM supervisor WHERE $colName = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
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


function add_supervisor($data)
{

    $conn = db_conn();
    $selectQuery = "INSERT into supervisor (supervisor_mail, password, supervisor_name, supervisor_phone, supervisor_salary, supervisor_image)
    VALUES (:supervisor_mail, :password, :supervisor_name, :supervisor_phone, :supervisor_salary, :supervisor_image)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':supervisor_mail' => $data['supervisor_mail'],
            ':password' => $data['password'],
            ':supervisor_name' => $data['supervisor_name'],
            ':supervisor_phone' => $data['supervisor_phone'],
            ':supervisor_salary' => $data['supervisor_salary'],
            ':supervisor_image' => $data['supervisor_image']
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


function show_adoption_requests()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `adoption_request` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function show_all_events()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `events` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}



function show_all_appointments()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `appointment` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function add_appointment($data)
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

function delete_appointment($id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `appointment` WHERE `appointment_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    $conn = null;

    return true;
}


function add_new_orphan($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into orphan (orphan_image, orphan_mail, password, orphan_name, orphan_gender, height, date_of_birth, age, body_color, adoption_status)
    VALUES (:orphan_image, :orphan_mail, :password, :orphan_name, :orphan_gender, :height, :date_of_birth, :age, :body_color, :adoption_status)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':orphan_image' => $data['orphan_image'],
            ':orphan_mail' => $data['orphan_mail'],
            ':password' => $data['password'],
            ':orphan_name' => $data['orphan_name'],
            ':orphan_gender' => $data['orphan_gender'],
            ':height' => $data['height'],
            ':date_of_birth' => $data['date_of_birth'],
            ':age' => $data['age'],
            ':body_color' => $data['body_color'],
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



function delete_adoption_request($id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `adoption_request` WHERE `request_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    $conn = null;

    return true;
}





