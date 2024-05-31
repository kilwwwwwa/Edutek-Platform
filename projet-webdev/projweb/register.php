
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Platform</title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <?php require_once('header.php'); ?>
    <div class="clip">
       <div class="wrap">
        <div class="container">
            <h1>Create an Account</h1>
            <form action="includes/register.inc.php" method="post" id="register-form" enctype="multipart/form-data">
            <div class="user-container">  
            <input type="text" id="username" name="username" placeholder ="Username..." required>
            </div>      
            <div class="password-container">
                <input type="password" id="password" name="password" placeholder ="Password..." required>
                <button type="button" id="togglePassword">
                <img src="eye-icon.png" id="showimg" onclick="showPwd()">
                </button>
                </div>
                <span>Profile Picture: </span><br>
                <div class="file-container">
                <input id="file" type="file" name="image" accept="image/jpg,image/jpeg,image/png" hidden>
                <button type="button" id="custom-button">CHOOSE A IMAGE</button>
                <span id="custom-text">No image chosen, yet.</span>
                </div>
                <button id="submitbtn" type="submit" name="submit">Register</button>
            </form>
            <a href="login.php" id="logintext"><h4>Already have an account? Login.</h4></a>
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
                    const realFileBtn = document.getElementById("file");
                    const customBtn = document.getElementById("custom-button");
                    const customTxt = document.getElementById("custom-text");

                    customBtn.addEventListener("click", function() {
                    realFileBtn.click();
                    });

                    realFileBtn.addEventListener("change", function() {
                    if (realFileBtn.value) {
                        customTxt.innerHTML = realFileBtn.value.match(
                        /[\/\\]([\w\d\s\.\-\(\)]+)$/
                        )[1];
                    } else {
                        customTxt.innerHTML = "No file chosen, yet.";
                    }
                    });
            </script>
        </div>
        </div> 
        </div>
        <?php require_once('footer.php')?>
        <style>

            body{
                background-color: rgb(230, 255, 255);
                font-family: Arial, Helvetica, sans-serif;
            }
            .file-container{
                margin-bottom: 20px;
            }
            #custom-button {
            padding: 10px;
            color: white;
            background-color: #009578;
            border: 1px solid #000;
            border-radius: 5px;
            cursor: pointer;
            width: 160px;
            }

            #custom-button:hover {
            background-color: #00b28f;
            }

            #custom-text {
            margin-left: 10px;
            font-family: sans-serif;
            color: #aaa;
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
                #logintext{
                    font-family: arial;
                    font-size: 17px;
                    text-decoration: none;
                    color: blue;
                }
                #logintext:hover{
                    cursor: pointer;
                    color: rgb(95, 7, 95);
                }
            </style>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"]=="emptyinput"){
                    echo "<script>alert('Username or Password empty!')</script>";
                }
                else if($_GET["error"]=="invaliduid"){
                    echo "<script>alert('Username has invalid characters!')</script>";
                }
                else if($_GET["error"]== "usernametaken"){
                    echo "<script>alert('Username already taken!')</script>";
                }
                else if($_GET["error"]== "stmtfailed"){
                    echo "<script>alert('Something went wrong, try again!')</script>";
                }
        }
        
        ?>
        
    </body>
</html>