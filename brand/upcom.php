<?php

$conn=mysqli_connect("localhost","root","","new");
$comid = mysqli_real_escape_string($conn, $_POST['comid']);
$body = mysqli_real_escape_string($conn, $_POST['body']);
if(isset($_POST['submit']))
{
$sql="UPDATE comment SET body='$body',updatedat=now() WHERE comid='$comid'";

 if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('thanks for updating comment')
    window.location.href='adcom';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='editcom?comid=$comid';
    </SCRIPT>");}
	
	
}


?>