<?php
    function emptyInputRegister($username,$password){
        $result = false;
        if(empty($username) || empty($password)){
            $result= true;
        }
        return $result;
    }
    function invalidUid($username){
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            $result=true;
        }
        return $result;
    }
    function uidExists($conn, $username){
        $sql = "SELECT * FROM users WHERE username = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../register.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
    
        $resultData = mysqli_stmt_get_result($stmt);
    
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
    }
    function createUser($conn,$username,$password,$image,$image_tmp_name,$image_folder){
        $sql="INSERT INTO users (userName,userPwd,Avatar) VALUES (?,?,?);";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../register.php?error=stmtfailed");
            exit();
        }

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if (empty($image)) {
            $defaultAvatar = "../avatar.png";
            mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPwd, $defaultAvatar);
        } else {
            move_uploaded_file($image_tmp_name, $image_folder);
            mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPwd, $image);
        }
        mysqli_stmt_execute($stmt);

        header("location: ../login.php?error=none");
        exit();
    }

    function emptyInputLogin($username,$password){
        $result = false;
        if(empty($username) || empty($password)){
            $result= true;
        }
        return $result;
    }
    function loginUser($conn,$username,$password){
        $uidExists=uidExists($conn,$username);

        if($uidExists == false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $uidExists["userPwd"];
        $checkPwd = password_verify($password, $pwdHashed);

        if($checkPwd == false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        else if($checkPwd == true){
            session_start();
            $_SESSION["userName"]=$uidExists["userName"];
            $_SESSION["userPwd"]=$uidExists["userPwd"];
            $_SESSION["user_id"]=$uidExists["user_id"];
            $_SESSION["type"]=$uidExists["type"];
            $_SESSION["Avatar"]=$uidExists["Avatar"];

            header("location: ../index.php");
            exit();
        }

    }


    function emptyUsername($update_name){
        $result = false;
        if(empty($update_name)){
            $result= true;
        }
        return $result;
    }

    function updateUser($conn, $update_name, $username, $update_image, $update_image_tmp_name, $update_image_folder,$update_pass,$new_pass,$confirm_pass) {
        $uidExist = uidExists($conn, $update_name);
        $uidExists= uidExists($conn,$username);
        $pwdHashed = $uidExists["userPwd"];
        $checkPwd = password_verify($update_pass, $pwdHashed);


        if ($update_name != $username && $uidExist) {
            header("location: ./update_profile.php?error=usertaken");
            exit();
        }
    

        $sql = "UPDATE users SET ";
        $updates = [];
    

        if ($update_name != $username) {
            $updates[] = "userName = '$update_name'";
        }
    

        if (!empty($update_image)) {
            $updates[] = "Avatar = '$update_image'";
            $old_profile_picture_path = './uploaded_images/' . $uidExists["Avatar"];
            if (file_exists($old_profile_picture_path)) {
                unlink($old_profile_picture_path);
            }
        }
        if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
            if($checkPwd==false){
                header("location: ./update_profile.php?error=oldpwdwrong");
                exit();
            }elseif($new_pass != $confirm_pass){
                header("location: ./update_profile.php?error=confpwdwrong");
                exit();
            }else{
                $confirm_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $updates[] = "userPwd = '$confirm_pass'";
            }
         }
    

        if (!empty($updates)) {
            $sql .= implode(", ", $updates);
            $sql .= " WHERE userName = '$username'";
    
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ./update_profile.php?error=stmtfailed");
                exit();
            }
            mysqli_stmt_execute($stmt);
        }
    

        if (!empty($update_image)) {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
        }


        $_SESSION["userName"] = $update_name;
        $_SESSION["Avatar"] = $update_image;


        header("location: ./index.php?error=none");
        exit();
    }



