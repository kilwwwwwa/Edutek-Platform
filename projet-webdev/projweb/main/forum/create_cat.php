
<?php

require_once('header.php');
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    
    echo "<form method='post' action=''> 
    Category name: <br>
    <input type='text' name='cat_name' /> <br>
    Category description: <br>
    <textarea name='cat_description'></textarea> <br>
    <input type='submit' value='Add category' /> 
    </form>";
} else {
    
    $cat_name = $_POST['cat_name'];
    $cat_description = $_POST['cat_description'];
    
    $sql = "INSERT INTO categories (cat_name, cat_description) 
VALUES (?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    mysqli_stmt_bind_param($stmt, 'ss', $cat_name, $cat_description);
   
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        
        echo 'Error: ' . mysqli_error($conn);
    } else {
        echo 'New category successfully added.';
    }
   
    mysqli_stmt_close($stmt);
}
?>
