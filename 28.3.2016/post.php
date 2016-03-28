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

   <link rel="stylesheet" href="css/style3.css">

		<link rel="stylesheet" id="all-css-0" href="css/wp1.css" type="text/css" media="all">
<link rel="stylesheet" id="open-sans-css" href="css/fonts.css" type="text/css" media="all">
<link rel="stylesheet" id="all-css-2" href="css/wp2.css" type="text/css" media="all">
<link rel="stylesheet" id="all-css-6" href="css/bootstrap.css" type="text/css" media="all">
<link rel="stylesheet" id="all-css-6" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" id="all-css-6" href="css/style3.css" type="text/css" media="all">      
   <link rel="stylesheet" id="all-css-6" href="css/color.css" type="text/css" media="all"> 
    <link rel="stylesheet" id="all-css-6" href="css/font-awesome.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery.min.js"></script>
>    
</head>

<body>

    <!-- Navigation -->
   
    <!-- Navigation -->
<div id="wpadminbar" class="ltr">
            <div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="Toolbar" tabindex="0">
            <ul id="wp-admin-bar-root-default" class="ab-top-menu">
      
    <li id="wp-admin-bar-blog" class="menupop my-sites"><a class="ab-item" aria-haspopup="true" href="index">Brand</a>       </li>
   
   

     </ul>
      <ul id="wp-admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">
      <?php 
 if(isset($_SESSION['userid'])!="")
{ ?>
<li id="wp-admin-bar-my-account" class="menupop with-avatar no-grav"><a class="ab-item" aria-haspopup="true" href=""><img alt="" src="upload/pr.png" class="avatar avatar-32" height="32" width="32"><span class="ab-text">Me</span></a>			<div class="ab-sub-wrapper">		<ul id="wp-admin-bar-user-actions" class="ab-submenu">
			
		<li id="wp-admin-bar-user-info" class="user-info user-info-item">		<div class="ab-item ab-empty-item" tabindex="-1"><img alt="" src="upload/pr.png" class="avatar avatar-128" height="128" width="128"><span class="display-name"><?php echo $r['username'];?></span><span class="username">&nbsp;&nbsp;<a href="logout?logout">Sign Out</a></span></div>		</li>
				</ul>
	</div>		</li><?php
} ?>
   
   
     </ul>
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
                
<div id="wrapper-200a" class="well" style="
   margin-top: 96px;
"><center><h4 style="
    margin: 3px;
    position: relative;
    left: -12px;
">Popular tags</h4></center>
	<div class="tags" style="margin-left:30px;padding: 10px;">
              
                        <?php
  $sql145 = "SELECT * FROM category";
$result245 = $conn->query($sql145);

    while($row245 = $result245->fetch_assoc()) { ?>

  
 
              
	<a href="catpage?cat_id=<?php echo $row245['cat_id'];?>"><?php echo  $row245['category'];?></a><?php } ?>
	<?php $sql14523 = "SELECT * FROM subcategory";
$result24523 = $conn->query($sql14523); 
          while($row24523 = $result24523->fetch_assoc()) {
        
      ?>  <a href="subcatpage?subcat_id=<?php echo $row24523['subcat_id'];?>"><?php echo  $row24523['subcategory'];?></a><?php } ?>
 
</div><style>
   #wrapper-200a a {
    
	display: inline-block;
	height: 22px;
	margin: 0 10px 0 0;
	padding: 0 7px 0 14px;
	white-space: nowrap;
	position: relative;

	background: -moz-linear-gradient(top, #fed970 0%, #febc4a 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fed970), color-stop(100%,#febc4a));
	background: -webkit-linear-gradient(top, #fed970 0%,#febc4a 100%);
	background: -o-linear-gradient(top, #fed970 0%,#febc4a 100%);
	background: linear-gradient(to bottom, #fed970 0%,#febc4a 100%);
	background-color: #FEC95B;

	color: #963;
	font: bold 11px/21px Arial, Tahoma, sans-serif;
	text-decoration: none;
	text-shadow: 0 1px rgba(255,255,255,0.4);

	border-top: 1px solid #EDB14A;
	border-bottom: 1px solid #CE922E;
	border-right: 1px solid #DCA03B;
	border-radius: 1px 3px 3px 1px;
	box-shadow: inset 0 1px #FEE395, 0 1px 2px rgba(0,0,0,0.21);
}
 #wrapper-200a a:before {
	content: '';
	position: absolute;
	top: 5px;
	left: -6px;
	width: 10px;
	height: 10px;

	background: -moz-linear-gradient(45deg, #fed970 0%, #febc4a 100%);
	background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#fed970), color-stop(100%,#febc4a));
	background: -webkit-linear-gradient(-45deg, #fed970 0%,#febc4a 100%);
	background: -o-linear-gradient(45deg, #fed970 0%,#febc4a 100%);
	background: linear-gradient(135deg, #fed970 0%,#febc4a 100%);
	background-color: #FEC95B;

	border-left: 1px solid #EDB14A;
	border-bottom: 1px solid #CE922E;
	border-radius: 0 0 0 2px;
	box-shadow: inset 1px 0 #FEDB7C, 0 2px 2px -2px rgba(0,0,0,0.33);
}
 #wrapper-200a a:before {
	-webkit-transform: scale(1, 1.5) rotate(45deg);
	-moz-transform: scale(1, 1.5) rotate(45deg);
	-ms-transform: scale(1, 1.5) rotate(45deg);
	transform: scale(1, 1.5) rotate(45deg);
}
 #wrapper-200a a:after {
	content: '';
	position: absolute;
	top: 7px;
	left: 1px;
	width: 5px;
	height: 5px;
	background: #FFF;
	border-radius: 4px;
	border: 1px solid #DCA03B;
	box-shadow: 0 1px 0 rgba(255,255,255,0.2), inset 0 1px 1px rgba(0,0,0,0.21);
}
 #wrapper-200a a:hover {
	color: #FFF;
	text-shadow: -1px -1px 0 rgba(153,102,51,0.3);
}
            
                    </style>
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
<script type="text/javascript" src="js/wp.js"></script>
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
