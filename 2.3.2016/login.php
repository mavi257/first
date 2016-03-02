
<?php
session_start();
$conn=mysqli_connect("localhost","root","","new");

if(isset($_SESSION['userid'])!="")
{

 header("Location: index");
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
 $username = mysqli_real_escape_string($conn, $_POST['username']);
 $password = md5(mysqli_real_escape_string($conn,$_POST['password']));
$sql = "SELECT * FROM user WHERE username='$username'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

            if ($result['password'] === $password)
                    {
                                  if($result['admin']==1)
                                  {
                                      $_SESSION['userid'] = $result['userid'];
                                                 header("Location:admin");
                                      }
                                elseif($result['admin']==0)
                                {
                                 $_SESSION['userid'] = $result['userid'];
                               
                                 header("Location: profile");
                              }
}
                              else
                              {
                            echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.alert('wrong details')
                    window.location.href='login';
                               </SCRIPT>");

                        } 
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

    <title>Brand - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
      <a class="navbar-brand" href="index">BRAND</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     
  
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
         
 <CENTER> <h2 class = "form-signin-heading">Member Login </h2></CENTER>
        <CENTER>    <input type = "text" class = "form-control" style="width: 30%;"
               name = "username" placeholder = "username " 
                           required autofocus></CENTER><BR>
        <CENTER>    <input type = "password" class = "form-control"style="width: 30%;"
                           name = "password" placeholder = "password" required></CENTER><BR>
         <CENTER>   <button class = "btn btn-sm btn-primary " type = "submit" 
               name = "submit">Login</button></CENTER>
        </form></div>
    <div class="col-md-4">
			<div class="well">
 




 
 <CENTER><p >
  One Account for everything in Brand
     </p>  </CENTER><CENTER>   <a href="signup" class = "btn btn-sm btn-primary " >Create account</a> </CENTER>

 

        </div>
      
  
     

              
                <!-- Blog Categories Well -->
                  
                              
                          
                       
                        
                

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>About Us</h4>
                    <p>DEVELOPERS MODEL</p>
                </div>

            </div>

        </div>    </div>
        <!-- /.row -->


   



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




