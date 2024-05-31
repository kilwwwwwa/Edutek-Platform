<?php
    if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $image = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = '../uploaded_img/'.$image;
             
            require_once("config.php");
            require_once("functions.php");

            if(emptyInputRegister($username,$password) !== false){
                header("location: ../register.php?error=emptyinput");
                exit();
            }
            if(invalidUid($username) !== false){
                header("location: ../register.php?error=invaliduid");
                exit();
            }
            if(uidExists($conn,$username) !== false){
                header("location: ../register.php?error=usernametaken");
                exit();
            }
            createUser($conn,$username,$password,$image,$image_tmp_name,$image_folder);
        }else{
            header("location : ../register.php");
        }
        ?>
