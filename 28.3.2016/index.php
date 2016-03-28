
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

</head>

<body>

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
                <a class="btn btn-sm btn-primary" href="post?postid=<?php echo $row2['postid']?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

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

   <div class="col-md-4" style="
    MARGIN-TOP: 140PX;
">
                
             <?php if(empty($_SESSION['userid'])) 
      {
      
     ?><div class="well">
                     
      
                    <center>  <h2>Register to post with us</h2></center>
                      <center>   <a class="btn btn-danger"  href="signup">Register</a> </center>
            <center><a href="login">Log in</a><span> if you're already a brand member. </span></center>
                       
                    <!-- /.input-group -->
                </div>

<?php }  ?>
<div id="wrapper-200a" class="well" style="
   
    padding: 10px;
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

  
 
              
	<a style="margin-bottom: 5px;" href="catpage?cat_id=<?php echo $row245['cat_id'];?>"><?php echo  $row245['category'];?></a><?php } ?>
	<?php $sql14523 = "SELECT * FROM subcategory";
$result24523 = $conn->query($sql14523); 
          while($row24523 = $result24523->fetch_assoc()) {
        
      ?>  <a style="margin-bottom: 5px;" href="subcatpage?subcat_id=<?php echo $row24523['subcat_id'];?>"><?php echo  $row24523['subcategory'];?></a><?php } ?>
 
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
                 
    
 

             

            </div>    </div></div>
    

     
   

 <footer style="
    BACKGROUND-COLOR: currentColor;
" class="footer">
      <div class="container">
          <style>
#foot {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111; text-decoration: none;
}
</style>
       <ul id='foot' style="height:39px;">  <li><a href="">About</a></li>
  <li><a href="">
Press
  </a></li>
  <li><a href="">Copyright</a></li>
  <li><a href="">
Creators
  </a></li>
  <li><a href="">
Advertise
  </a></li>
  <li><a href="">Developers</a></li>
  <li style="float:right"><a class="active" > © Brand.in 2016</a></li>
</ul>
      </div>
    </footer>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/wp.js"></script>
</body>

</html>
