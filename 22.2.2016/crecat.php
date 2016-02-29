<?php
$conn=mysqli_connect("localhost","root","","new");

if(isset($_POST['submit']))
{
     $categorylabel = mysqli_real_escape_string($conn, $_POST['categorylabel']);
 $sql = "INSERT INTO category (category,createdat) VALUES('$categorylabel',now())";
    if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('category created successfully')
    window.location.href='adcat.php';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='admin.php';
    </SCRIPT>");}
}
?>