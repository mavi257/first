
<?php
$conn=mysqli_connect("localhost","root","","new");


if(isset($_POST['submit']))  {


  $etitle = mysqli_real_escape_string($conn, $_POST['etitle']);
 $ebody = mysqli_real_escape_string($conn, $_POST['ebody']);

$postid = mysqli_real_escape_string($conn,$_POST['postid']);
$ecat_id = mysqli_real_escape_string($conn,$_POST['ecat_id']);
$esubcat_id = mysqli_real_escape_string($conn,$_POST['esubcat_id']);



 $name=basename($_FILES['image']['name']);
   $t_name=$_FILES['image']['tmp_name'];
 $dir='upload';

 if (move_uploaded_file($t_name, $dir."/".$name)) {



 $sql="UPDATE post SET cat_id='$ecat_id' , subcat_id='$esubcat_id',title=' $etitle', body='$ebody',path='upload/$name',updated=now() WHERE postid='$postid'";
 if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('successfully posted')
    window.location.href='post?postid=$postid';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='editpost';
    </SCRIPT>");}
 
}  }
?>



