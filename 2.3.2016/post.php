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

    <title>Brand Post</title>

     <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/noticons.css">
    <link rel="stylesheet" href="css/editor.min.css">
    <link rel="stylesheet" href="css/wpcom.css">
    <link rel="stylesheet" href="css/buttons.min.css">
  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hovercard.css">
    <link rel="stylesheet" href="css/services.css">
    <link rel="stylesheet" href="css/style3.css">
     <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/color.css">
  <link rel="stylesheet" href="css/accordionmenu.css" type="text/css" media="screen" />
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./jquery.tabletoCSV.js" type="text/javascript" charset="utf-8"></script>
     <script src="css/wpgroho.js" type="text/javascript" charset="utf-8"></script>
     <script src="css/loader0.js" type="text/javascript" charset="utf-8"></script>
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>    
</head>

<body>

    <!-- Navigation -->
   
<div id="wpadminbar" class="ltr">
            <div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="Toolbar" tabindex="0">
            <ul id="wp-admin-bar-root-default" class="ab-top-menu">
      
    <li id="wp-admin-bar-blog" class="menupop my-sites"><a class="ab-item" aria-haspopup="true" href="index">Brand</a>       </li>
   
   

     </ul>
      <ul id="wp-admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">
      
 
   
    <li id="wp-admin-bar-my-account" class="menupop with-avatar no-grav"><a  href="logout.php?logout" class="ab-item" aria-haspopup="true"><img alt="" src="upload/pr.png" class="avatar avatar-32" height="32" width="32"></a>         </li>
    <li id="wp-admin-bar-ab-new-post"><a class="ab-item" href="createpost"></a>    </li>   </ul>
        </div>
             
          </div>
  <br>
    

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

 </div><?php }?><hr></div>
               
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
<br>
                <!-- Blog Search Well -->
                

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

            </div>

        </div>
       


   

    </div>
    <!-- /.container -->   
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
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
  var img = document.images['captchaimg'];
  img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</body>

</html>
