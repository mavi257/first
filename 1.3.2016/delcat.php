<?php
$conn=mysqli_connect("localhost","root","","new");


$cat_id = mysqli_real_escape_string($conn,$_GET['cat_id']);




$sql="DELETE from category WHERE cat_id = $cat_id" ;
$sql1="DELETE from subcategory WHERE cat_id = $cat_id" ;
$sql2="DELETE from post WHERE cat_id = $cat_id" ;
$sql3="DELETE from comment WHERE cat_id = $cat_id" ;

 if ($conn->query($sql) === TRUE AND $conn->query($sql1) === TRUE AND $conn->query($sql2) === TRUE AND $conn->query($sql3) === TRUE ) {
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