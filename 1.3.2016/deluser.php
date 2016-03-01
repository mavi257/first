<?php
$conn=mysqli_connect("localhost","root","","new");


$userid = mysqli_real_escape_string($conn,$_GET['userid']);




$sql="DELETE from user WHERE userid = $userid" ;
$sql1="DELETE from post WHERE userid = $userid" ;
$sql2="DELETE from comment WHERE userid = $userid" ;
 if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE ) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('successfully deleted')
    window.location.href='aduser.php';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='aduser.php';
    </SCRIPT>");}
 
?>


