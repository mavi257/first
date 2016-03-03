<?php

$conn=mysqli_connect("localhost","root","","new");

$catlabel = mysqli_real_escape_string($conn,$_POST['catlabel']);
$sublabel = mysqli_real_escape_string($conn, $_POST['sublabel']);
if ($_POST['submit'])   {
 
 

 $sql10 = "SELECT * FROM category where category= '$catlabel'";
$res10=mysqli_query($conn,$sql10);
$reee=mysqli_fetch_array($res10,MYSQLI_ASSOC);
$q=$reee["cat_id"];
$sql="INSERT into subcategory (cat_id,subcategory,createdat) value('$q','$sublabel',now())";
 if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('subcategory successfully created')
    window.location.href='adcat.php';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='admin.php';
    </SCRIPT>");}
 

  
  }
?>
