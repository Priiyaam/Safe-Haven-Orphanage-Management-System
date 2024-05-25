<?php


require_once 'db_connect.php';



function show_all_orphans_data()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `orphan` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
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


function show_single_orphan_data($colName, $id)
{

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `orphan` where $colName = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function update_orphan_data($colName, $id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE orphan SET 
                        `orphan_image` = :orphan_image, 
                        `orphan_mail` = :orphan_mail, 
                        `password` = :password, 
                        `orphan_name` = :orphan_name, 
                        `orphan_gender` = :orphan_gender, 
                        `height` = :height ,
                        `date_of_birth` = :date_of_birth ,
                        `age` = :age ,
                        `body_color` = :body_color ,
                        `adoption_status` = :adoption_status 
                    WHERE $colName = :id";
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


function show_column_data($tableName,$colName)
{

    $conn = db_conn();
    $selectQuery = "SELECT $colName FROM `$tableName` ";

    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}





function show_single_cell_data($colName,$tableName, $pos, $id)
{

    $conn = db_conn();
    $selectQuery = "SELECT $colName FROM $tableName where $pos = '$id' " ;

    try {
        $stmt = $conn->query($selectQuery);
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function show_single_row_data($tableName, $colName, $id){
    
    $conn = db_conn();
    $selectQuery = "SELECT * FROM $tableName where $colName = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
}


function delete_orphan_appointment($id)
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

function delete_orphan($colName, $id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM orphan WHERE $colName = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}






