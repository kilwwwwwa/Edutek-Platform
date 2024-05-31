<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Student Platform</title>
    <link rel="stylesheet" type="text/css" href="../../style/index.css">
    </head>
    <body>
        <header>
    <div class="head-container">
        <div class="logo">
            <a href="index.php" style="cursor: pointer;">
                <img src="../../pics/Logo2.png" width="110px">
            </a>
        </div>
        <nav>
            <ul >
                <li class="head-li">
                    <button class="home" >
                        <a href="../../index.php">Home</a>
                    </button>
                </li>
                <li class="head-li">
                    <button class="about-us">
                        <a href="#end">About Us</a>
                    </button>
                </li>
                <li class="head-li">
                    <button class='forum'>
                    <a href='../../main/forum/index.php'>Forum</a></button>
                </li>
                <li class="head-li">
                   <div class='dropdown'>
                    <button style='width: 5px;'>Tools</button>
                    <div class='content'>
                    <a href='../../main/ToDoListJS/index.php'>To Do List ✔</a>
                    <a href='../../main/Pomodoro/index.php'>Pomodoro ⏱</a>
                    <a href='../../main/Schedule/index.php'>Calendar 📅</a>
                    </div>
                    </div> 
                    </li>
                    <li class="head-li">
                <?php
                    require_once("../../includes/config.php");

    session_start();
    $conn = mysqli_connect("localhost","root","", "proj_db");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

                    $username=$_SESSION["userName"];
                    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE userName = '$username'") or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    if(!empty($fetch['Avatar'])) {
                        echo '<a href="../../profiledrop.php"><img class ="user-pic" src="../../uploaded_images/'.$fetch['Avatar'].'" width="70px" height="70px" style="min-width: 70px; min-height: 70px;"></a>';
                        
                    } else {
                        echo '<a href="../../profiledrop.php"><img class ="user-pic" src="../../avatar.png" width="70px" height="70px" style="min-width: 70px; min-height: 70px;"></a>';
                        
                    }
                ?>
                </li>
            </ul>
        </nav>
    </div>
    </header>
    <style>
    .logintext{
        text-decoration: none;
    }
    .logintext:hover{
        color: white;
        text-decoration: underline;
    }
    .head-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #80c0e5;
    }

    nav ul {
        list-style-type: none;
        margin-top: 110px;
        padding: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .home > a,
    .about-us > a,
    .forum > a {
        text-decoration: none;
        color: rgb(80, 22, 150);
    }

    nav ul .head-li {
        margin-right: 15px;
    }

    .user-pic {
    display: flex;
    height: 70px;
    width: 70px;
    min-width: 70px;
    min-height:70px ;
    border-radius: 50%; 
    border: 1px solid #80c0e5 ;  
    margin-bottom: 10px; 
    margin-left: auto; 
    margin-right: auto; 
}

.user-pic:hover {
    height: 80px;
    width: 80px;
    border: 1px solid white;  
    border-radius: 50%; 
}


</style>



   