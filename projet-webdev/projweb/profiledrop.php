
<?php
   require_once("./includes/config.php");
   require_once('header.php');
?>

   <link rel="stylesheet" href="./style/profiledrop.css">
   <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<div class="container">

   <div class="profile">

   <?php
         $username = $_SESSION['userName'];
         $select = mysqli_query($conn, "SELECT * FROM `users` WHERE userName = '$username'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['Avatar'] == ''){
            echo '<img src="./images/default-avatar.png">';
         }else{
            echo '<img src="./uploaded_images/'.$fetch['Avatar'].'">';
         }
      ?>
      <h3><?php echo $fetch['userName']; ?></h3>
      <a href="update_profile.php" class="btn">Edit profile</a>
      <a href="./includes/logout.php" class="delete-btn">Logout</a>

   </div>

</div>
<?php require_once('footer.php'); ?>
<style>
body{
    background-color: rgb(230, 255, 255);
}
.container{
   background-color: rgb(230, 255, 255);
}
.container .profile{
   box-shadow: -14px 8px 38px -4px rgba(0,0,0,0.57);
   min-width: 25vw;
   min-height: 30vh;
}
.hero{
padding-bottom: 100px;
border-radius: 13px;
font-family: "Inter";
}
.big-title{
position: relative;
padding-top: 29px;
padding-left: 19%;
font-family: "Poppins";
}
.hero-img img{
width: 1000px;
position: relative;
margin-top: -300px;
margin-left: 18%;
}
.hero-text{
color:rgb(0, 0, 0)
}
.sub-text{
position: relative;
padding-top: 11%;
padding-right: 50%;
font-family: "Poppins";
text-align: center;
}
.sub-text2{
position: relative;
font-family: "Inter";
color: midnightblue;
padding-left: 13%;
padding-top: 10px;
}
footer {
    background-color: #80c0e5;
    border-radius: 8px;
    font-family: "Inter";
    padding-bottom: 4px;
    margin-top: auto;
    text-align: center;
}

.final-title{
position: relative;
margin-left: 15px;
padding-top: 8px;
font-size:larger;
color:white;
font-weight: bolder;
padding-bottom: 3px;
}
.flag{
position: relative;
padding-left: 6px;
margin-top: 5px;
}
footer h3{
padding-left: 15px;
margin-top: -3px;
font-size: large;
color: aliceblue;
}
.his{
position: relative;
padding-left: 90%;
margin-top: -50px;
}
footer h4{
padding-left: 15px;
margin-top: 1px;
}
.footer-title{
background-color: rgb(57, 89, 232);
border-radius: 3px;
}

</style>

