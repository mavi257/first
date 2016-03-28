
<?php
session_start();
$conn=mysqli_connect("localhost","root","","new");

if(isset($_SESSION['userid'])=="")
{

 header("Location: login");
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
$r=mysqli_fetch_array($re,MYSQLI_ASSOC);?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Brand</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

<style type="text/css">
  html {
  height: 100%;
}
body {
  min-height: 100%;
}
</style>

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
      <?php if(!empty($_SESSION['userid'])) 
      {
      
     ?>
   
\
    <li>
        <a href="logout.php?logout"><span class="glyphicon glyphicon-log-in"></span>&nbsp; <?php echo $r['username'];?>, logout</a>   
    </li>   


<?php } ?>
   
      </ul>
    </div>
  </div>
</nav>
<hr>
<hr>
    <!-- Page Content -->
    <div class="container">


        <div class="row">
 
    <div class="col-md-12">
     <h1 class="page-header"><?php
$sql1 = "SELECT * FROM post where userid=$userid order by postid DESC LIMIT $start_from, $per_page ";
    $result2 = $conn->query($sql1);$count789=$result2->num_rows;
?>
                  Posts<small>(<?php echo $count789;?>)</small> <a href="createpost"><button  class = "btn btn-sm  " >Add New</button> </a>
                </h1>       
    
   <?php if ($result2->num_rows > 0){ 
          
      
               
 echo "<table   style= 'background-color: #ECEFF1; color: #01579B;  width:80%; border-radius:10px '><tr height='50px'  ><th style= 'padding-left: 40px;' >Title</th><th style= 'padding-left: 40px;' >Author</th><th style= 'padding-left: 40px;' >Category</th><th style= 'padding-left: 40px;' >Date</th><th style= 'padding-left: 40px;' >Action</th></tr>";
     // output data of each row
     while($row2 = $result2->fetch_assoc()) {  
         $sql09 = "SELECT * FROM user where userid=$userid";
       $result09 = $conn->query($sql09);
 $row09 = $result09->fetch_assoc();
 $cat_id12=$row2["cat_id"];
 $sql091 = "SELECT * FROM category where cat_id=$cat_id12";






 $result091 = $conn->query($sql091);
 $row091 = $result091->fetch_assoc();
         echo "<tr height='70px'><td  style= 'padding-left: 40px;'  >" . $row2["title"]. "</td><td  style= 'padding-left: 40px;' >" . $row09["username"]. " </td><td  style= 'padding-left: 40px;' >" . $row091["category"]. " </td><td  style= 'padding-left: 40px;' >" . $row2["created"]. " </td><td  style= 'padding-left: 40px;'  >" .'a'." </td></tr>";
       
     }
     echo "</table>";
              



   
}

               


$query = "SELECT * FROM post where userid='$userid'";
$result34 = mysqli_query($conn, $query);
if ($result34->num_rows > 0 && $result34->num_rows > 5){$total_records = mysqli_num_rows($result34);

$total_pages = ceil($total_records / $per_page);
if($page==1){ 
echo "<ul class='pager'><li class='previous'>   </li> ";
$i=1; $i<=$total_pages; $i++;




echo "         <li class='next'><a href='profile.php?userid=$userid&page=".$i."'>".'Older &rarr;'."</a> </li></ul> ";
}
elseif($page==$total_pages)
  {$i=1; $i<=$total_pages; $i++; 

$i2=$page-1; 

echo "     <ul class='pager'>    <li class='previous'><a href='profile.php?userid=$userid&page=".$i2."'>".'&larr; Newer'."</a> </li> ";
echo "<li class='previous'>   </li></ul> ";

}
else {
  $i=1; $i<=$total_pages; $i++; 
   $i1=$page+1; 
  $i2=$page-1; 

echo "<ul class='pager'>   <li class='previous'><a href='profile.php?userid=$userid&page=".$i2."'>".'&larr; Newer'."</a>   </li> ";





echo "         <li class='next'><a href='profile.php?userid=$userid&page=".$i1."'>".'Older &rarr;'."</a> </li></ul> ";

}}
else{

}?> 


                
                 
                 
           
                      
                  
            </div>

            <!-- Blog Sidebar Widgets Column -->
           </div></div>
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
