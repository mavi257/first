<?php 

if(isset($_POST['insert']))
{
  $email = mysqli_real_escape_string($conn, $_POST['email']);
 $username = mysqli_real_escape_string($conn, $_POST['username']);
 $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
 $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
 $password = md5(mysqli_real_escape_string($conn,$_POST['password']));
 $cpassword = md5(mysqli_real_escape_string($conn,$_POST['cpassword']));

if($password===$cpassword)
{

$sql = "INSERT INTO user (email,username,firstname, lastname,password,created) VALUES('$email','$username','$firstname','$lastname','$password',now())";
      if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('successfully registered')
    window.location.href='login.php?';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='signup.php';
    </SCRIPT>");}
}
 
}
?>