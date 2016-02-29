
<?php
session_start();
$conn=mysqli_connect("localhost","root","","new");
if(empty($_GET['subcat_id'])) {
 header("Location: login.php");
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

@$subcat_id=$_GET['subcat_id'];

@$cat=$_GET['cat'];
@$cat3=$_GET['cat3']; 
$r=mysqli_fetch_array($re,MYSQLI_ASSOC);
  $s56 = "SELECT * FROM subcategory where subcat_id='$subcat_id' ";
$re56=mysqli_query($conn,$s56);
$r56=mysqli_fetch_array($re56,MYSQLI_ASSOC);?>
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
      <a class="navbar-brand" href="index.php">BRAND</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     
      <ul class="nav navbar-nav navbar-right">
      <?php if(!empty($_SESSION['userid'])) 
      {
      
     ?>
   <li >
        <a href="profile.php?userid=<?php echo $userid?>" ><span class="glyphicon glyphicon-user"></span>&nbsp;profile</a>   
    </li>

    <li>
        <a href="logout.php?logout"><span class="glyphicon glyphicon-log-in"></span>&nbsp; <?php echo $r['username'];?>, logout</a>   
    </li>   

<?php } else { ?>

    <li >
        <a href="signup.php" ><span class="glyphicon glyphicon-user"></span>&nbsp;Create blog</a>   
    </li> 
    <li >
        <a href="login.php" ><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a>   
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
$sql1 = "SELECT * FROM post where subcat_id=$subcat_id order by postid DESC    LIMIT $start_from, $per_page ";
    $result2 = $conn->query($sql1);
if ($result2->num_rows > 0){?>
     <h3 class="page-header">
                   Home / <?php echo $r56['subcategory']?>
                </h3>
   <?php while($row2 = $result2->fetch_assoc()) {  
          
            $userid11 = $row2["userid"];
$sql1001 = "SELECT * FROM user where userid='$userid11' ";
$result2001 = $conn->query($sql1001);

$row2001 = $result2001->fetch_assoc();?>

               


                <!-- First Blog Post -->
                <h2>
                     <?php    echo $row2["title"]?> <small>by  <?php echo $row2001["username"]?></small></h2>
              
                <p><span class="glyphicon glyphicon-time"></span> Posted on  <?php echo $row2["created"]?></p>
                <hr>
                <img src="<?php echo $row2['path'] ?>" class="img-responsive">
                <hr>
                   <?php  echo "<p>" .$row2["body"]. "</p>";
?>
                <a class="btn btn-primary" href="post.php?postid=<?php echo $row2['postid']?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               <?php
    }
} else {
    echo "0 results";} 

             
$query = "SELECT * FROM post  where subcat_id='$subcat_id'";
$result34 = mysqli_query($conn, $query);
if ($result34->num_rows > 0 && $result34->num_rows > 5 ){$total_records = mysqli_num_rows($result34);

$total_pages = ceil($total_records / $per_page);
if($page==1){ 
echo "<ul class='pager'><li class='previous'>   </li> ";
$i=1; $i<=$total_pages; $i++;




echo "         <li class='next'><a href='subcatpage.php?subcat_id=$subcat_id&page=".$i."'>".'Older &rarr;'."</a> </li></ul> ";
}
elseif($page==$total_pages)
  {$i=1; $i<=$total_pages; $i++; 

$i2=$page-1; 

echo "     <ul class='pager'>    <li class='previous'><a href='subcatpage.php?subcat_id=$subcat_id&page=".$i2."'>".'&larr; Newer'."</a> </li> ";
echo "<li class='previous'>   </li></ul> ";

}
else {
  $i=1; $i<=$total_pages; $i++; 
   $i1=$page+1; 
  $i2=$page-1; 

echo "<ul class='pager'>   <li class='previous'><a href='subcatpage.php?subcat_id=$subcat_id&page=".$i2."'>".'&larr; Newer'."</a>   </li> ";





echo "         <li class='next'><a href='subcatpage.php?subcat_id=$subcat_id&page=".$i1."'>".'Older &rarr;'."</a> </li></ul> ";

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
                      <center>   <a class="btn btn-danger"  href="signup.php">Register</a> </center>
            <center><a href="login.php">Log in</a><span> if you're already a brand member. </span></center>
                       
                    <!-- /.input-group -->
                </div>
   

<?php } else { ?>
<div class="well">
                  
                    <center>  <h2>Create ur own post</h2></center>
                  
                        
                        <span class="input-group-btn">
                           <center>  <a href="createpost.php"> <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-pushpin"></span>
                        </button></a></center>
                        </span>
                  
                    <!-- /.input-group -->
                </div>
   

<?php } ?>

              
                <!-- Blog Categories Well -->
                <div class="well">

                       <center>   <h3>Categories</h3></center>
                       <div style="margin-left: -29px;" >

<?php
$sql901 = "SELECT * FROM category";
$result901 = $conn->query($sql901);
$rows901 = $result901->num_rows;    // Find total rows returned by database
    if($rows901 > 0) {
        $cols901 = 2;    // Define number of columns
        $counter901 = 1;     // Counter used to identify if we need to start or end a row
        $nbsp901 = $cols901 - ($rows901 % $cols901);    // Calculate the number of blank columns
 
                echo '<table width="78%" align="center"   >';
        while ($rows901= $result901->fetch_array()) {
            if(($counter901 % $cols901) == 1) {    // Check if it's new row
                echo '<tr>';    
            }
                   
            echo '<td><h4 style="margin-left: 29px;"><a href="catpage.php?cat_id='.$rows901['cat_id'].'">'.$rows901['category'].'</a></h4></td>';
            if(($counter901 % $cols901) == 0) { // If it's last column in each row then counter remainder will be zero
                echo '</tr>';   
            }
            $counter901++;    // Increase the counter
        }
        $result901->free();
        if($nbsp901 > 0) { // Add unused column in last row
            for ($i901 = 0; $i901 < $nbsp901; $i901++)  { 
                echo '<td>&nbsp;</td>';     
            }
            echo '</tr>';
        }
                echo '</table>';
    }
?></div></div>
                        
                   <div class="well" >
                   
                        <center>   <h4>Sub Categories</h4></center>
                     
  <div style="margin-left: 23px;">

<?php
$sql90 = "SELECT * FROM subcategory";
$result90 = $conn->query($sql90);
$rows90 = $result90->num_rows;    // Find total rows returned by database
    if($rows90 > 0) {
        $cols = 4;    // Define number of columns
        $counter = 1;     // Counter used to identify if we need to start or end a row
        $nbsp = $cols - ($rows90 % $cols);    // Calculate the number of blank columns
 
                echo '<table width="100%" align="center"   >';
        while ($row90= $result90->fetch_array()) {
            if(($counter % $cols) == 1) {    // Check if it's new row
                echo '<tr>';    
            }
                  echo '<td><h5><a href="subcatpage.php?subcat_id='.$row90['subcat_id'].'">'.$row90['subcategory'].'</a></h5></td>';    
           
            if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
                echo '</tr>';   
            }
            $counter++;    // Increase the counter
        }
        $result90->free();
        if($nbsp > 0) { // Add unused column in last row
            for ($i = 0; $i < $nbsp; $i++)  { 
                echo '<td>&nbsp;</td>';     
            }
            echo '</tr>';
        }
                echo '</table>';
    }
?></div>
</div>
                               
                    