<?php
    session_start();
    $conn = mysqli_connect("localhost","root","", "proj_db");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
<html>
<head> 
</head>
<body>
    
<header>
    <div class="head-container">
        <div class="logo">
            <a href="index.php" style="cursor: pointer;">
                <img src="./pics/Logo2.png" width="110px">
            </a>
        </div>
        <nav>
            <ul>
                <li>
                    <button class="home" >
                        <a href="index.php">Home</a>
                    </button>
                </li>
                <li>
                    <button class="about-us">
                        <a href="#end">About Us</a>
                    </button>
                </li>
                <?php
                if(isset($_SESSION["userName"])){
                    $username=$_SESSION["userName"];
                    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE userName = '$username'") or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    echo "<li>";
                    echo "<button class='forum'>";
                    echo "<a href='main/forum/index.php'>Forum</a></button>";
                    echo "</li>";
                    echo "<li>";
                    echo "<div class='dropdown'>";
                    echo "<button style='width: 5px;'>Tools</button>";
                    echo "<div class='content'>";
                    echo "<a href='main/ToDoListJS/index.php'>To Do List ✔</a>";
                    echo "<a href='main/Pomodoro/index.php'>Pomodoro ⏱</a>";
                    echo "<a href='main/Schedule/index.php'>Calendar 📅</a>";
                    echo "</div>";
                    echo "</div> ";
                    echo "</li>";
                    echo "<li>";
                    if(!empty($fetch['Avatar'])) {
                        echo '<a href="./profiledrop.php"><img class ="user-pic" src="./uploaded_images/'.$fetch['Avatar'].'" width="70px" height="70px" style="min-width: 70px; min-height: 70px;"></a>';
                        
                    } else {
                        echo '<a href="./profiledrop.php"><img class ="user-pic" src="./avatar.png" width="70px" height="70px" style="min-width: 70px; min-height: 70px;"></a>';
                        
                    }
                    echo "</li>";
                    
                } else {
                    echo '<li><a href="register.php" class="logintext" style="margin-right:7px;">Signup</a></li>';
                    echo '<li><a href="login.php" class="logintext">Login</a></li>';

                }
                ?>
            </ul>
        </nav>
    </div>
</header>
</body>
</html>
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
    border-radius: 20px;
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

nav ul li {
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

header{
background-color: #80c0e5;
border-radius: 10px;
}
nav{
    position:absolute;
    margin-left: 55%;
    margin-top: -90px;
    font-family: "Inter";
    text-decoration:none;
    width: 45%;
}
.logo{
margin-top: -4px;
padding-left: 30px;
}

.navtext{
    text-decoration: none;
    color: rgb(80, 22, 150);
}
.navtext:hover{
    color: #5FB3E4;
}

ul button{
border-radius: 13px;
border: none;
padding: 8px 10px;
text-decoration:none;
}
.about-us{
margin-left: 10px;
}
.dropdown{
    display: inline-block;
}
.dropdown button{
    color: rgb(80, 22, 150);
    padding-right: 42px;
    cursor: pointer;
}
.dropdown a{
    display: block;
color: rgb(80, 22, 150);
    text-decoration: none;
}
.dropdown .content{
    display: none;
    position: absolute;
    background-color: hsl(0, 0%, 95%);
    min-width: 100px;
    border: 1px white solid;
    border-radius: 5px;
}
.dropdown:hover .content{
    display: block;
}
.dropdown:hover button{
    background-color: 5FB3E4;
}
.dropdown a:hover{
   /* background-color: hsl(0, 0%, 100%);*/
    color: #5FB3E4;
}

</style>