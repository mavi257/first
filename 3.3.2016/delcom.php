<?php
$conn=mysqli_connect("localhost","root","","new");


$comid = mysqli_real_escape_string($conn,$_GET['comid']);





$sql="DELETE from comment WHERE comid = $comid" ;

 if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('successfully deleted')
    window.location.href='adcom.php';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='adcom.php';
    </SCRIPT>");}
 

?>



