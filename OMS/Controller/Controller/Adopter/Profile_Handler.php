<?php 
session_start();


require_once '../../Model/Adopter.php';

if(!isset($_SESSION["loginUser_Name"])){
    header('Location:../Views/Adopter/Login.php');
}


    $name = "";
    $nameError = "";

    $email = "";
    $emailError = "";

    $password = "";
    $passwordError = "";

    $gender = "";
    $genderError = "";

    $phone = "";
    $phoneError = "";
    
    $address = "";
    $addressError = "";

    $profession = "";
    $professionError = "";

    $JSON_Message = "";
    $JSON_Error = "";
    
    $everythingOK = FALSE;
    $everythingOKCounter = 0;


    $_SESSION['S_nameError'] = "";
    $_SESSION['S_emailError'] = "";
    $_SESSION['S_passwordError'] = "";
    $_SESSION['S_genderError']  = "";
    $_SESSION['S_phoneError'] = "";
    $_SESSION['S_addressError'] = "";
    $_SESSION['S_professionError'] = "";

    $delete_flag_mail = $_SESSION["P_mail"];
    $email = $_SESSION["P_mail"];
    $updatedImage = "";







    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fileError = "";
        $imageName = "";
    
        $fileError = "";
        $imageName = "";
        
    
    
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $target_dir = "../../images/Adopter_Images/";
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
                    }else if ($_FILES["profilePic"]["size"] > 4000000) { // 4MB in Bytes
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
                            $imageName = htmlspecialchars(basename($_FILES["profilePic"]["name"])); //* This is the file name
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
            if (empty($name)) {
                $nameError = "Name is required";
                $_POST['name'] = "";
                $name = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
                // echo "Name Error 1";
            } elseif($wordCount < 2){
                $nameError = "Write at least 2 words";
                $_POST['name'] = "";
                $name = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
                // echo " Error 2";
            } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)){
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
            $phone = $_POST['phone'];
            if (empty($phone)) {
                $phoneError = "Phone is required";
                $_POST['phone'] = "";
                $phone = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;

            } 
            else {
                $everythingOK = TRUE;
            }
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $address = $_POST['address'];
            if (empty($address)) {
                $addressError = "Phone is required";
                $_POST['address'] = "";
                $email = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;

            }else {
                $everythingOK = TRUE;
            }
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profession = $_POST['profession'];
            if (empty($profession)) {
                $professionError = "Profession is required";
                $_POST['profession'] = "";
                $profession = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;

            }else {
                $everythingOK = TRUE;
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
            'adopter_mail'          =>      $email,
            'password'     =>     $_SESSION['P_password'],
            'adopter_name'               =>     $_POST['name'],
            'adopter_phone'     =>     $_POST['phone'],
            'adopter_image'     =>     $updatedImage,
            'adopter_profession'     =>     $_POST['profession'],
            'adopter_gender'     =>     $_POST['gender'],
            'adopter_address'     =>     $_POST['address'],
            'adoption_status'    =>     $tempAdoption_status
        );
        
        $copiedData = $new_data;
        $isSuccessful = update_data("adopter_mail",$email,$new_data);
        if($isSuccessful){
            header("Location: ../../Views/Adopter/Login/Login.php");
        }else{
            header("Location: ../../Views/Adopter/Profile.php");
        }

        





        }else{

            $_SESSION['S_nameError'] = $nameError;
            $_SESSION['S_emailError'] = $emailError;
            $_SESSION['S_passwordError'] = $passwordError;
            $_SESSION['S_genderError'] = $genderError;
            $_SESSION['S_phoneError'] = $phoneError;
            $_SESSION['S_addressError'] = $addressError;
            $_SESSION['S_professionError'] = $professionError;
            echo "Everything is Not ok, There are errors and we are sending to the front page <br>";
            header('Location:../Views/Adopter/Profile.php');
        }


    }
