

<?php
session_start();
$conn=mysqli_connect("localhost","root","","new");


if(isset($_SESSION['userid'])!="")
{

 header("Location: index.php");
}





$per_page=5;
if (isset($_GET["page"])) {

$page = $_GET["page"];

}

else {

$page=1;

}

$start_from = ($page-1) * $per_page;

     if(!empty($_SESSION['userid'])) {
$userid = $_SESSION['userid'];}
else
{
    $userid='0';
}
  $s = "SELECT * FROM user where userid='$userid' ";
$re=mysqli_query($conn,$s);

require 'config.php';


@$cat=$_GET['cat'];
@$cat3=$_GET['cat3']; 
$r=mysqli_fetch_array($re,MYSQLI_ASSOC);




if(isset($_POST['submit']))
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
 else
 {
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('your password doesnt match')
    window.location.href='signup.php';
    </SCRIPT>");}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Brand - signup</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

  


<script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#7FA74D";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  </script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">BRAND</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     
      <ul class="nav navbar-nav navbar-right">
     
   
      </ul>
    </div>
  </div>
</nav>
<hr>
<hr>
    <!-- Page Content -->
    <div class="container">


        <div class="row">
 
    <div class="col-md-8">


        
   

      
         <form class = "form-signin" role = "form" action = "" method = "post">
          <center> <h2 class = "form-signin-heading"> Register to post with Us</h2></center> 
             <center>     <input type = "email" class = "form-control" 
               name = "email" placeholder = "email" style="width: 30%;"
               required autofocus></br></center> 
           <center>  <input type = "text" class = "form-control" 
               name = "username" placeholder = "username " style="width: 30%;"
               required ></br></center> 
             <center>   <input type = "text" class = "form-control" 
               name = "firstname" placeholder = "firstname " style="width: 30%;"
               required ></br></center> 
            <center>    <input type = "text" class = "form-control" 
               name = "lastname" placeholder = "lastname " style="width: 30%;"
               required ></br></center> 
           <center>  <input type = "password" class = "form-control"  id="pass1"
               name = "password" placeholder = "password" style="width: 30%;" required></br></center> 
           <center>     <input type = "password" class = "form-control" style="width: 30%;"  id="pass2"
               name = "cpassword" placeholder = "confirm password" onkeyup="checkPass(); return false;" required >
            <center>     <span id="confirmMessage" class="confirmMessage"></span></br></center> 
           <center>  <button class = "btn  btn-primary " type = "submit" 
               name = "submit">sign up</button></center> 
         </form>
      
      
</div>
      
  <div class="col-md-4">
			<div class="well">
 




 
 <CENTER><p >
 Already registered 
     </p>  </CENTER><CENTER>   <a href="login" class = "btn btn-sm btn-primary " >Login</a> </CENTER>

 

        </div>
      
  
     

              
                <!-- Blog Categories Well -->
                  
                              
                          
                       
                        
                

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>About Us</h4>
                    <p>DEVELOPERS MODEL</p>
                </div>

            </div>

        </div>    </div>

   
   


  <nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
  <div class="col-lg-12" style="
    height: 30px;
">
    <ul class="nav navbar-nav navbar-right">
      <li> <a class="navbar-brand" style="
    padding-top: 6px;
    font-size: 12px;
">  ©2016 Brand.in </a></li>
    
    </ul></div>
  </div>
</nav>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>








         
         

      
         
