
<?php
session_start();
$conn=mysqli_connect("localhost","root","","new");
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="css/accordionmenu.css" type="text/css" media="screen" />
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
     
      <ul class="nav navbar-nav navbar-right">
      <?php if(!empty($_SESSION['userid'])) 
      {
      
     ?>
     <li >
        <a href="profile?userid=<?php echo $userid?>" ><span class="glyphicon glyphicon-user"></span>&nbsp;profile</a>   
    </li>

    <li>
        <a href="logout?logout"><span class="glyphicon glyphicon-log-in"></span>&nbsp; <?php echo $r['username'];?>, logout</a>   
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
 
    <div class="col-md-8">
       <?php
$sql1 = "SELECT * FROM post order by postid DESC LIMIT $start_from, $per_page ";
    $result2 = $conn->query($sql1);
if ($result2->num_rows > 0){?>
     <h1 class="page-header">
                   Users Post
                </h1>
   <?php while($row2 = $result2->fetch_assoc()) {  
          
            $userid11 = $row2["userid"];
$sql1001 = "SELECT * FROM user where userid='$userid11' ";
$result2001 = $conn->query($sql1001);

$row2001 = $result2001->fetch_assoc();?>

               


                <!-- First Blog Post -->
                <h2>
                     <?php    echo $row2["title"]?> <small>by  <?php echo $row2001["username"]?></small></h2>
              
                <p><span class="glyphicon glyphicon-time"></span> Posted on  <?php echo $row2["created"]?></p>
              
                
               
                <img src="<?php echo $row2['path'] ?>" class="img-responsive">
            
                   <?php  echo "<p>" .$row2["body"]. "</p>";
?>
                <a class="btn btn-primary" href="post.php?postid=<?php echo $row2['postid']?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
               <?php




    }
} else {
    echo "0 results";}

               


$query = 'SELECT * FROM post';
$result34 = mysqli_query($conn, $query);
if ($result34->num_rows > 0 && $result34->num_rows > 5){$total_records = mysqli_num_rows($result34);

$total_pages = ceil($total_records / $per_page);
if($page==1){ 
echo "<ul class='pager'><li class='previous'>   </li> ";
$i=1; $i<=$total_pages; $i++;




echo "         <li class='next'><a href='index?page=".$i."'>".'Older &rarr;'."</a> </li></ul> ";
}
elseif($page==$total_pages)
  {$i=1; $i<=$total_pages; $i++; 

$i2=$page-1; 

echo "     <ul class='pager'>    <li class='previous'><a href='index?page=".$i2."'>".'&larr; Newer'."</a> </li> ";
echo "<li class='previous'>   </li></ul> ";

}
else {
  $i=1; $i<=$total_pages; $i++; 
   $i1=$page+1; 
  $i2=$page-1; 

echo "<ul class='pager'>   <li class='previous'><a href='index?page=".$i2."'>".'&larr; Newer'."</a>   </li> ";





echo "         <li class='next'><a href='index?page=".$i1."'>".'Older &rarr;'."</a> </li></ul> ";

}}
else{

}?> 


                
                 
                 
           
                      
                  
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
             <?php if(empty($_SESSION['userid'])) 
      {
      
     ?><div class="well">
                     
      
                    <center>  <h2>Register to post with us</h2></center>
                      <center>   <a class="btn btn-danger"  href="signup">Register</a> </center>
            <center><a href="login">Log in</a><span> if you're already a brand member. </span></center>
                       
                    <!-- /.input-group -->
                </div>

<?php }  ?>

              
                <!-- Blog Categories Well -->
                <div id="wrapper-200a">
	
             <?php
  $sql145 = "SELECT * FROM category";
$result245 = $conn->query($sql145);
if ($result245->num_rows > 0){
    
    while($row245 = $result245->fetch_assoc()) { ?> <ul>  <li class="block"> 
      
<input type="checkbox" name="item" id="<?php echo  $row245['cat_id'];
  ?> " />   
    <label for="<?php echo  $row245['cat_id'];
  ?> "><i aria-hidden="true" class="icon-users"></i> <?php echo  $row245['category'];
  ?> <span><?php 
  $cat_id23=$row245['cat_id'];$sql145232 = "SELECT * FROM post where cat_id=$cat_id23";
$result245232 = $conn->query($sql145232);$count123=$result245232->num_rows;
                                                
                                                
$sql14523 = "SELECT * FROM subcategory where cat_id=$cat_id23";
$result24523 = $conn->query($sql14523); echo  $count123;
  ?></span></label>
<?php



if ($result24523->num_rows > 0){
    
    while($row24523 = $result24523->fetch_assoc()) {  ?>
  <ul class="options">
      <li><a href="" target="_blank"><i aria-hidden="true" class="icon-eye"></i> <?php echo  $row24523['subcategory'];?><span><?php 
  $subcat_id23=$row24523['subcat_id'];
                                                    $sql199 = "SELECT * FROM post where subcat_id=$subcat_id23";
$result199 = $conn->query($sql199);
                                                    $count1234=$result199->num_rows;
                                                    echo  $count1234;
  ?></span>
                                                
  </a></li></ul><?php }}?>
 </li></ul>
	    <?php }}?>
	</div>
              


                 
    
 

                <!-- Side Widget Well -->
             
         

            </div>    </div></div>
        <!-- /.row -->

        <hr>

   



    <!-- /.container -->
     <nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="col-lg-12">
 
    <ul class="nav navbar-nav navbar-right">
    <li><a class="navbar-brand"> &copy;2016 Brand.in </a></li>
    
    </ul></div>
  </div>
</nav>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
