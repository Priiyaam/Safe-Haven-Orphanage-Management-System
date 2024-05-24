<?php 
session_start();


require_once '../../Model/Orphan.php';

if(!isset($_SESSION["loginUser_Name"])){
    header('Location:../Views/Orphan/Login/Login.php');
}


    $name = "";
    $nameError = "";

    $email = "";
    $emailError = "";

    $password = "";
    $passwordError = "";

    $gender = "";
    $genderError = "";

    $height = "";
    $heightError = "";
    
    $age = "";
    $ageError = "";

    $dateOfBirth = "";
    $dateOfBirthError = "";

    $bodyColor = "";
    $bodyColorError = "";
    
    $everythingOK = FALSE;
    $everythingOKCounter = 0;

    $adoptionStatus = "";




    $_SESSION["P_mail"];
    $_SESSION["P_password"];
    $_SESSION["P_name"];
    $_SESSION["P_height"];
    $_SESSION["P_image"];
    $_SESSION["P_profession"];
    $_SESSION["P_gender"];
    $_SESSION["P_dateOfBirth"];
    $_SESSION["P_age"];
    $_SESSION["P_bodyColor"];
    $_SESSION["P_adoptionStatus"];
    
    
    $delete_flag_mail = $_SESSION["P_mail"];
    $email = $_SESSION["P_mail"];
    $updatedImage = "";







    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fileError = "";
        $imageName = "";
    
        $fileError = "";
        $imageName = "";
        
    
    
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $target_dir = "../../images/Orphan_Images/";
                $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            }
            
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_FILES["profilePic"]) && !empty($_FILES["profilePic"]["tmp_name"])){
                    $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    }else if ($_FILES["profilePic"]["size"] > 4000000) { 
                        echo "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
                        $uploadOk = 0;
                    }else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
        
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    } else {
                        if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
                            $imageName = htmlspecialchars(basename($_FILES["profilePic"]["name"])); 
                            $updatedImage = $imageName;
                            $target_file = "" . basename($_FILES["profilePic"]["name"]);
                            $fileError =  "The file ". htmlspecialchars( basename( $_FILES["profilePic"]["name"])). " has been uploaded.";
                        } else {
                            $fileError = "Sorry, there was an error uploading your file.";
                        }
                    }
                }
                
    
            }
        // }
    

    }
    

    





    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $wordCount = str_word_count($name);
            // echo $wordCount;
            if (empty($name)) {
                $nameError = "Name is required";
                $_POST['name'] = "";
                $name = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
                // echo "Name Error 1";
            }elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)){
                $nameError = "Only letters and white space and dash allowed";
                $_POST['name'] = "";
                $name = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
                // echo " Error 3";
            }else{
                $everythingOK = TRUE;
            }
        }

        


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $gender = $_POST['gender'] ;
            if (empty($gender)) {
                $genderError = "Gender is required";
                $_POST['gender'] = "";
                $gender = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
            } else{
                $gender = $_POST['gender'];
                $everythingOK = TRUE;
            }
        }




        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $height = $_POST['height'];
            if (empty($height)) {
                $heightError = "Height is required";
                $_POST['height'] = "";
                $height = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;

            } 
            else {
                $everythingOK = TRUE;
            }
        }



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dateOfBirth = $_POST['dateOfBirth'];
        $current_date = date("d-m-Y");
        $dateOfBirthTimestamp = strtotime($dateOfBirth); 
        $current_dateTimestamp = strtotime($current_date); 

        $age = "";

        if (empty($dateOfBirth)) {
            $dateOfBirthError = "Date of Birth is required";
            $_POST['dateOfBirth'] = $_SESSION["P_dateOfBirth"];
            $dateOfBirth = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
        } elseif ($dateOfBirthTimestamp >= $current_dateTimestamp === true) {
            $dateOfBirthError = "Date of Birth Can not be Future";
            $_POST['dateOfBirth'] = $_SESSION["P_dateOfBirth"];
            $dateOfBirth = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
        } else if (DateTime::createFromFormat('d-m-Y', $dateOfBirth) === false) {
            $dateOfBirthError = "Date must be in 'd-m-Y' format";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
          } else {
            $everythingOK = TRUE;

            $dob = DateTime::createFromFormat('d-m-Y', $dateOfBirth);
            $currentDate = new DateTime();

            $age = $currentDate->diff($dob)->y;

        }
    }



        if($everythingOK && $everythingOKCounter == 0){

        $tempAdoption_status = $_SESSION["P_adoptionStatus"];

        if($imageName == ""){
            $updatedImage = $_SESSION["P_image"];
        }else{
            $updatedImage = $imageName;
        }





        $new_data = array(
            'orphan_mail'          =>      $email,
            'password'     =>     $_SESSION['P_password'],
            'orphan_name'               =>     $_POST['name'],
            'orphan_gender'     =>     $_POST['gender'],
            'orphan_image'     =>     $updatedImage,
            'height'     =>     $_POST['height'],
            'date_of_birth'     =>     $_POST['dateOfBirth'],
            'age'     =>     $age,
            'body_color'    =>     $tempAdoption_status,
            'adoption_status'    =>     $tempAdoption_status
        );
        
        $copiedData = $new_data;
        $isSuccessful = update_orphan_data("orphan_mail",$email,$new_data);
        if($isSuccessful){
            header("Location: ../../Views/Orphan/Login/Login.php");
        }else{
            header("Location: ../../Views/Orphan/Profile.php");
        }




        }else{

            // S_ means status
            $_SESSION['S_nameError'] = $nameError;
            $_SESSION['S_heightError'] = $heightError;
            $_SESSION['S_dateOfBirthError'] = $dateOfBirthError;
            $_SESSION['S_ageError'] = $ageError;
;

            echo "Everything is Not ok, There are errors and we are sending to the front page <br>";
            header('Location: ../../Views/Orphan/Profile.php');
        }


    }

?>