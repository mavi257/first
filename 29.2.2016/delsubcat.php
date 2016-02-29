<?php
$conn=mysqli_connect("localhost","root","","new");

$subcat_id = mysqli_real_escape_string($conn,$_GET['subcat_id']);




$sql1="DELETE from subcategory WHERE subcat_id = $subcat_id" ;
$sql2="DELETE from post WHERE subcat_id = $subcat_id" ;
$sql3="DELETE from comment WHERE subcat_id = $subcat_id" ;

 if ( $conn->query($sql1) === TRUE AND $conn->query($sql2) === TRUE AND $conn->query($sql3) === TRUE ) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('successfully deleted')
    window.location.href='adcat.php';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='adcat.php';
    </SCRIPT>");}
 

?>