<?php
$conn=mysqli_connect("localhost","root","","new");



$postid = mysqli_real_escape_string($conn,$_GET['postid']);




$sql="DELETE from post WHERE postid = $postid" ;
$sql1="DELETE from comment WHERE postid = $postid" ;
 if ($conn->query($sql) === TRUE AND $conn->query($sql1) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('successfully deleted')
    window.location.href='adpost.php';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='adpost.php';
    </SCRIPT>");}
 
?>

















