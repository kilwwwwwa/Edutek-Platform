<?php
require_once("mainhead.php");
?>
<!DOCTYPE html>
<html>
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 	<title>Student Platform</title>
	 <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1 style="color:black; font-family:Poppins">Welcome <span style="color:red;"><?php echo $_SESSION["userName"]?></span> To EDUTEK Forum</h1>
	<div id="wrapper">
	<div id="menu">
		<a class="item" href="index.php">Forum Home</a> -
		<a class="item" href="create_topic.php">Create a topic</a> -
		<a class="item" href="create_cat.php">Create a category</a>
		<div id="userbar">
		<?php
    
if(!isset($_SESSION['userName']) && empty($_SESSION['userName'])) {
    header("location: ./login.php?error=wronglogin");
    exit();
}
?>
		</div>
		<div id="content">
	</body>

</html>