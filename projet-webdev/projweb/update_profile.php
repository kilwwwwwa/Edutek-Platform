<?php
    require_once("./includes/config.php");   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="./style/profiledrop.css"/>
    <title>Student Platform</title>

</head>
    <body>
        <?php require_once("header.php");?>
        <?php
            $username=$_SESSION["userName"];
            if(isset($_POST["submit"])){
                $update_name = $_POST['update_name'];
                $old_pass = $_POST['old_pass'];
                $update_pass = $_POST['update_pass'];
                $new_pass = $_POST['new_pass'];
                $confirm_pass = $_POST['confirm_pass'];
                $update_image = $_FILES['update_image']['name'];
                $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
                $update_image_folder = './uploaded_images/'.$update_image;
                require_once("./includes/functions.php");
        
                if(emptyUsername($update_name) !== false){
                    header("location: ./update_profile.php?error=emptyinput");
                    exit();
                }
                if(invalidUid($update_name) !== false){
                     header("location: ./update_profile.php?error=invaliduid");
                    exit();
                }
                updateUser($conn, $update_name, $username, $update_image, $update_image_tmp_name, $update_image_folder,$update_pass,$new_pass,$confirm_pass);
                }
        
        ?>
        <div class="update-profile">
        <?php
        
            $select = mysqli_query($conn, "SELECT * FROM `users` WHERE userName = '$username'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
            }
        ?>
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                <?php
                
                if($fetch['Avatar'] == ''){
                    echo '<img src="./images/default-avatar.png">';
                }else{
                    echo '<img src="./uploaded_images/'.$fetch['Avatar'].'">';
                }
                
                ?>
                <div class="flex">
                    <div class="inputBox">
                        <span>Username :</span>
                        <input type="text" name="update_name" value="<?php echo$fetch['userName']?>" class="box">
                        <span>Change Profile Picture :</span>
                        <input type="file" name="update_image"class="box" accept="image/jpg,image/jpeg,image/png">
                    </div>
                    <div class="inputBox">
                        <input type="hidden" name="old_name" value="<?php echo$fetch['userPwd']?>">
                        <span>old password: </span>
                        <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                        <span>new password: </span>
                        <input type="password" name="new_pass" placeholder="enter new password" class="box">
                        <span>confirm password: </span>
                        <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">

                    </div>
                </div>
                <input type="submit" value="Update Profile" name="submit" class="btn">
                <a href="./index.php" class="delete-btn">Go Back</a>
            
            </form>
        </div>
        
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"]=="oldpwdwrong"){
                    echo "<script>alert('Old password is Wrong')</script>";
                }
                if($_GET["error"]=="emptyinput"){
                    echo "<script>alert('Username or Password empty!')</script>";
                }
                else if($_GET["error"]=="invaliduid"){
                    echo "<script>alert('Username has invalid characters!')</script>";
                }
                else if($_GET["error"]== "usertaken"){
                    echo "<script>alert('Username already taken!')</script>";
                }
                else if($_GET["error"]== "stmtfailed"){
                    echo "<script>alert('Something went wrong, try again!')</script>";
                }
        }
        require_once("footer.php");
        ?>
    </body>
</html>
<style>
.update-profile{
   min-height: 100vh;
   background-color:rgb(230, 255, 255);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}

</style>