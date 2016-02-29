<?php
$conn=mysqli_connect("localhost","root","","new");


$userid = mysqli_real_escape_string($conn,$_GET['userid']);
$cat_id = mysqli_real_escape_string($conn,$_GET['cat_id']);
$subcat_id = mysqli_real_escape_string($conn,$_GET['subcat_id']);
if(isset($_POST['submit']))  {


  $title = mysqli_real_escape_string($conn, $_POST['title']);
 $body = mysqli_real_escape_string($conn, $_POST['body']);

 $name=basename($_FILES['image']['name']);
   $t_name=$_FILES['image']['tmp_name'];
 $dir='upload';

 if (move_uploaded_file($t_name, $dir."/".$name)) {



$sql="INSERT into post (userid,cat_id,subcat_id,title,body,path,created) value('$userid','$cat_id','$subcat_id','$title','$body','upload/$name',now())";
 if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('successfully posted')
    window.location.href='index.php';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='index.php';
    </SCRIPT>");}
 
}  }
?>