<?php
session_start();
if(empty($_GET['postid'])) {
 header("Location: login.php");
}

 if(!empty($_SESSION['userid'])) {
$userid = $_SESSION['userid'];}
else
{
    $userid='0';
}
$postid = $_GET['postid'];
$conn=mysqli_connect("localhost","root","","new");
  $s = "SELECT * FROM user where userid='$userid' ";
$re=mysqli_query($conn,$s);
$r=mysqli_fetch_array($re,MYSQLI_ASSOC);


if(isset($_POST['submit']))
{
  
 
  $body= $_POST['body'];

$postid = $_GET['postid'];
$cat_id = $_GET['cat_id'];

  $subcat_id = $_GET['subcat_id'];
  if(empty($_SESSION['6_letters_code'] ) ||
    strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
  {
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('captacha doesnt match ')
    window.location.href='post.php?postid=$postid';
    </SCRIPT>");}
else
{
   $sql="INSERT into comment (body,postid,createdat,userid,cat_id,subcat_id) value('$body','$postid',now(),'$userid','$cat_id','$subcat_id')";
 if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('thanks for posting comment')
    window.location.href='post.php?postid=$postid';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='index.php';
    </SCRIPT>");}
  }
}
if(isset($_POST['submit1']))
{
  
 
  $body= $_POST['body'];

$postid = $_GET['postid'];
$cat_id = $_GET['cat_id'];

  $subcat_id = $_GET['subcat_id'];

  $sql="INSERT into comment (body,postid,createdat,userid,cat_id,subcat_id) value('$body','$postid',now(),'$userid','$cat_id','$subcat_id')";
 if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('thanks for posting comment')
    window.location.href='post.php?postid=$postid';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='index.php';
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

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>    
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
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
       
    
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if(!empty($_SESSION['userid'])) {?>

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
  
    

    <!-- Page Content -->
    <div class="container">
    <?php

$sql1 = "SELECT * FROM post where postid='$postid' ";


?>

        <div class="row">
 <?php

$result2 = $conn->query($sql1);

$row2 = $result2->fetch_assoc();
 $cat_id1 = $row2["cat_id"];
  $subcat_id1 = $row2["subcat_id"];
 $userid111 = $row2["userid"];
$sql10011 = "SELECT * FROM user where userid='$userid111' ";
$result20011 = $conn->query($sql10011);

$row20011 = $result20011->fetch_assoc();?>
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <?php    echo "<h1 >".$row2["title"]."</h1>" ;?>
                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $row20011["username"]?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php    echo $row2["created"] ?></p>

                <hr>

                <!-- Preview Image -->
                <img src="<?php echo $row2['path'] ?>" class="img-responsive">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $row2["body"]?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                   <form method="POST" name="contact_form" 
            action="?postid=<?php echo $postid ?>&cat_id=<?php echo $cat_id1?>&subcat_id=<?php echo $subcat_id1?>"> 
                        <div class="form-group">
                            <textarea required name="body" class="form-control" rows="3"></textarea>
                        </div>
<?php if(!empty($_SESSION['userid'])) {?>

  <button type="submit" value="Submit1" name='submit1' class="btn btn-primary">Submit</button> 

<?php } else { ?>

<label >prove you're not a robot:</label> <br>
<p>
<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
<label for='comment'>Enter the code above here :</label>
<input id="6_letters_code" name="6_letters_code" type="text"><br>
<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
</p>
<button type="submit" value="Submit" name='submit'class="btn btn-primary">Submit</button> <br>



<?php } ?>


                        
                    </form>
                </div>

                <hr>
          <!-- Posted Comments -->

                <!-- Comment -->
  
                            <?php

$sql1000 = "SELECT * FROM comment where postid='$postid' ";
$result2000 = $conn->query($sql1000);
         
        
          if ($result2000->num_rows > 0){?>
          <div class="row">

<?php  while($row2000 = $result2000->fetch_assoc()){?>

 <div class="media"><?php
$userid11 = $row2000["userid"];
$sql1001 = "SELECT * FROM user where userid='$userid11' ";
$result2001 = $conn->query($sql1001);

$row2001 = $result2001->fetch_assoc();


      ?> 
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                                     <div class="media-body">
                        <h4 class="media-heading"><?php echo $row2001["username"]?>
                            <small> <?php echo $row2000["createdat"]?></small>
                        </h4>
                        <?php echo $row2000["body"]?>
                                       </div> 
                </div><?php }?>

 </div><?php }?></div>
               
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                

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
                    <h4>ABOUT US</h4>
                    <p>Developers model</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->   
        <hr>

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
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
  var img = document.images['captchaimg'];
  img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</body>

</html>
