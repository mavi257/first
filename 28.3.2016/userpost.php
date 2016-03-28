<?php
session_start();

$userid1 = $_GET["userid1"];
$conn=mysqli_connect("localhost","root","","new");
$per_page=5;
if (isset($_GET["page"])) {

$page = $_GET["page"];

}

else {

$page=1;

}

$start_from = ($page-1) * $per_page;


$userid = $_SESSION['userid'];
  $s = "SELECT * FROM user where userid='$userid' ";
$re=mysqli_query($conn,$s);


   

$r=mysqli_fetch_array($re,MYSQLI_ASSOC);

if(isset($_SESSION['userid'])=="")
{
session_destroy();
 unset($_SESSION['user']);
 header("Location: login.php");
}

 elseif ($r['admin']==0 ) {
  
session_destroy();
 unset($_SESSION['user']);
 header("Location: login.php");
}
  else
  {
?>










<!DOCTYPE html>
<html lang="en">
<head>
  <title>BRAND</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">


  
</head>
<body>

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
     

    <li>
        <a href="logout.php?logout"><span class="glyphicon glyphicon-log-in"></span>&nbsp; <?php echo $r['username'];?>, logout</a>   
    </li>   




   
      </ul>
    </div>
  </div>
</nav>
  <hr>  <hr>
    
           <hr>
  <div class="container">

        <div class="row">
        <div class='col-md-8'>
  <?php
  $sql1 = "SELECT * FROM post  where userid=$userid1 order by postid DESC LIMIT $start_from, $per_page";
$result2 = $conn->query($sql1);
if ($result2->num_rows > 0){
    
    while($row2 = $result2->fetch_assoc()) {  
        $userid11 = $row2["userid"];
$sql1001 = "SELECT * FROM user where userid='$userid11' ";
$result2001 = $conn->query($sql1001);

$row2001 = $result2001->fetch_assoc();?>
 <div class="row">
            <div class="col-sm-3">
                <a><img src="<?php echo $row2['path'] ?>" class="img-responsive"></a>
            </div>
            <div class="col-sm-5">
                <?php    echo '<h2 style="margin-top:0px;">'.$row2['title'].'<small>'.'&nbsp' .'by'. '&nbsp'.$row2001['username'].'</small></h2>';
                         echo "<h5>".$row2["created"]. "</h5>";
                 echo "<p>" .$row2["body"]. "</p>";
       
                ?>


        <a class="btn btn-primary" href="post.php?postid=<?php echo $row2['postid']?>">View</a>
 <a class="btn btn-danger" href="delpost.php?postid=<?php echo $row2['postid']?>">Delete</a>
            </div>
       
      </div>  
        <hr>  <?php
    }
} else {
    echo "0 results";}
    $query = "SELECT * FROM post where userid='$userid1'";
$result34 = mysqli_query($conn, $query);
if ($result34->num_rows > 0 && $result34->num_rows > 5){$total_records = mysqli_num_rows($result34);

$total_pages = ceil($total_records / $per_page);
if($page==1){ 
echo "<ul class='pager'><li class='previous'>   </li> ";
$i=1; $i<=$total_pages; $i++;




echo "         <li class='next'><a href='userpost.php?userid1=$userid1&page=".$i."'>".'Older &rarr;'."</a> </li></ul> ";
}
elseif($page==$total_pages)
  {$i=1; $i<=$total_pages; $i++; 

$i2=$page-1; 

echo "     <ul class='pager'>    <li class='previous'><a href='userpost.php?userid1=$userid1&page=".$i2."'>".'&larr; Newer'."</a> </li> ";
echo "<li class='previous'>   </li></ul> ";

}
else {
  $i=1; $i<=$total_pages; $i++; 
   $i1=$page+1; 
  $i2=$page-1; 

echo "<ul class='pager'>   <li class='previous'><a href='userpost.php?userid1=$userid1&page=".$i2."'>".'&larr; Newer'."</a>   </li> ";





echo "         <li class='next'><a href='userpost.php?userid1=$userid1&page=".$i1."'>".'Older &rarr;'."</a> </li></ul> ";

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
                               
                              
                          
                       
                        
                

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>About Us</h4>
                    <p>DEVELOPERS MODEL</p>
                </div>

            </div>

        </div>    </div>
        <!-- /.row -->

        <hr>

   



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
<?php }?>