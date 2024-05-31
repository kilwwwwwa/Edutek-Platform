
<?php
        if(isset($_GET["error"])){
            if($_GET["error"]=="none"){
                echo "<script>alert('Account Created Successfully!')</script>";
            }
        }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Platform</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<?php require_once('header.php'); ?>
<div class="wrap">
    <div class="container">
        <h1>Login To Your Account</h1>
        <form action="includes/login.inc.php" method="post"  >
        <div class="user-container">
            <input type="text" id="username" name="username" placeholder="Username..." required>
        </div> 
        <div class="password-container">
            <input type="password" id="password" name="password" placeholder="Password..." required>
            <button type="button" id="togglePassword">
                <img src="eye-icon.png" id="showimg" onclick="showPwd()">
            </button>
        </div>
            <button id="submitbtn" type="submit" name="submit">Login</button>
        </form>
           <a href="register.php" id="registertext"><h4>New user? Regsiter</h4></a>
           
           <script>
                    function showPwd(){
                        const x = document.getElementById("password");
                        const y = document.getElementById("showimg");

                        if (x.type === "password") {
                            x.type = "text";
                            y.src = 'closed-eye-icon.png';
                        }
                        else {
                            x.type = "password";
                            y.src = 'eye-icon.png';
                        }
                    }
           </script>
            <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(230, 255, 255);
        }
        #username{
            text-align: center;
            width: 95%;
        }
        #password{
            text-align: center;
            width: 92%;
        }
        .password-container {
            position: relative;
        }

        #togglePassword {
            position: absolute;
            top: 37%;
            right: -15px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        #togglePassword img {
            border: 2px solid gray;
            border-radius: 10px;
            width: 25px; 
            background-color: white; 
            z-index: 1; 
        }
        #togglePassword img:hover {
            cursor: pointer;
        }
        .wrap{
            display: grid;
            place-items: center;
            height: 100vh;
            
        }
        .container{
            display: inline-block;
            width: 40vw;
            box-shadow: -14px 8px 38px -4px rgba(0,0,0,0.57);
            border-radius: 20px;
                    
        }
        #registertext{
            font-family: arial;
            font-size: 17px;
            text-decoration: none;
            color: blue;
        }
        #registertext:hover{
            cursor: pointer;
            color: rgb(95, 7, 95);
        }
    </style>
    </div>
    </div>
    <?php require_once('footer.php')?>
    <?php
            if(isset($_GET["error"])){
                if($_GET["error"]=="emptyinput"){
                    echo "<script>alert('Username or Password empty!')</script>";
                }
                else if($_GET["error"]=="wronglogin"){
                    echo "<script>alert('Incorrect Login Information!')</script>";
                }
        } 
        ?>
    
</body>
</html>
