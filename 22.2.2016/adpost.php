<?php
session_start();



$conn=mysqli_connect("localhost","root","","new");


$userid = $_SESSION['userid'];
  $s = "SELECT * FROM user where userid='$userid' ";
$re=mysqli_query($conn,$s);


   

$r=mysqli_fetch_array($re,MYSQLI_ASSOC);

if(isset($_SESSION['userid'])=="")
{
session_destroy();
 unset($_SESSION['user']);
 header("Location: login");
}

 elseif ($r['admin']==0 ) {
  
session_destroy();
 unset($_SESSION['user']);
 header("Location: login");
}
  else
  {




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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BRAND</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/noticons.css">
    <link rel="stylesheet" href="css/editor.min.css">
    <link rel="stylesheet" href="css/wpcom.css">
    <link rel="stylesheet" href="css/buttons.min.css">
  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hovercard.css">
    <link rel="stylesheet" href="css/services.css">
    <link rel="stylesheet" href="css/style3.css">
  <link rel="stylesheet" href="accordionmenu.css" type="text/css" media="screen" />
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./jquery.tabletoCSV.js" type="text/javascript" charset="utf-8"></script>
     <script src="css/wpgroho.js" type="text/javascript" charset="utf-8"></script>
     <script src="css/loader0.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $(function(){
            $("#export").click(function(){
                $("#export_table").tableToCSV();
            });
        });
    </script>
  
</head>
<body>

<div id="wpadminbar" class="ltr">
            <div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="Toolbar" tabindex="0">
            <ul id="wp-admin-bar-root-default" class="ab-top-menu">
      
    <li id="wp-admin-bar-blog" class="menupop my-sites"><a class="ab-item" aria-haspopup="true" href="index">Brand</a>       </li>
   
   

     </ul>
      <ul id="wp-admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">
      
 
   
    <li id="wp-admin-bar-my-account" class="menupop with-avatar no-grav"><a  href="logout.php?logout" class="ab-item" aria-haspopup="true"><img alt="" src="https://2.gravatar.com/avatar/eda4e5db5db0ede52414c9ca5c31d1fa?s=32&amp;d=mm&amp;r=G" class="avatar avatar-32" height="32" width="32"></a>         </li>
    <li id="wp-admin-bar-ab-new-post"><a class="ab-item" href="createpost"></a>    </li>   </ul>
        </div>
             
          </div>
<br>
<div id="adminmenuwrap" style="
    top: 2px;
">
<ul id="adminmenu">
<li class="wp-not-current-submenu menu-top menu-icon-comments" id="menu-comments">
	<a href="admin" class="wp-not-current-submenu menu-top menu-icon-comments"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-dashboard"><br></div><div class="wp-menu-name">Dashboard </div></a></li>
	
	
	<li class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" id="menu-dashboard">
	<a href="admin" class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" aria-haspopup="false"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-post"><br></div><div class="wp-menu-name">Posts</div></a>
	</li>
	

<li class="wp-not-current-submenu menu-top menu-icon-comments" id="menu-comments">
	<a href="adcom" class="wp-not-current-submenu menu-top menu-icon-comments"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-comments"><br></div><div class="wp-menu-name">Comments </div></a></li>
  
<li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-users" id="menu-users">
	<a href="aduser" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-users" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-users"><br></div><div class="wp-menu-name">Users</div></a>
	</li>
     
    
    <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-links" id="menu-links">
	<a href="adcat" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-links" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-links"><br></div><div class="wp-menu-name">Categories</div></a>
	</li>
    
    </ul>


</div>
<div class="container" style="
    margin-left: 170px;
    margin-top: 22px;
    margin-right: 15px;
">  
   
     <h1><?php
$sql1 = "SELECT * FROM post  order by postid DESC LIMIT $start_from, $per_page ";
    $result2 = $conn->query($sql1);

$sql1356 = "SELECT * FROM post  ";
    $result2356 = $conn->query($sql1356);$count789=$result2356->num_rows;
?>
                  Posts<small>(<?php echo $count789;?>)</small> <a href="createpost"><button  class = "btn btn-sm  " >Add New</button> </a>  <button class="btn btn-sm  " id="export" data-export="export">Export</button>
                </h1>       
    
   <?php if ($result2->num_rows > 0){ 
          
      
               
 echo "<table id='export_table' style= ' table-layout: fixed;border-radius:10px;background-color: #ECEFF1; color: #01579B;  width:100%; '><tr height='50px'  ><th style='width:15%;padding-right:40px;'   >Title</th><th style='width:30%;padding-right:40px;' >Body</th><th style='width:30%;padding-right:40px;'>Image path</th><th style='width:15%;padding-right:40px;'>Author</th><th style='width:15%;padding-right:40px;' >Category</th><th style='width:20%;padding-right:40px;' >Sub-Category</th><th style='width:15%;padding-right:40px;'  >Date</th></tr>";
     // output data of each row
     while($row2 = $result2->fetch_assoc()) {  
       $userid12345=$row2["userid"];
         $sql09 = "SELECT * FROM user where userid=$userid12345";
       $result09 = $conn->query($sql09);
 $row09 = $result09->fetch_assoc();
 $cat_id12=$row2["cat_id"];
 $sql091 = "SELECT * FROM category where cat_id=$cat_id12";
 $result091 = $conn->query($sql091);
 $row091 = $result091->fetch_assoc();


 if($row2['cat_id']==0)
 {
  $category567='Uncategorized';
 }
else
{
 $category567=$row091["category"];
}
$sql091123 = "SELECT * FROM subcategory where cat_id=$cat_id12";
 $result091123 = $conn->query($sql091123);
 $row091123 = $result091123->fetch_assoc();


 if($row2['subcat_id']==0)
 {
  $subcategory567='Uncategorized';
 }
else
{
 $subcategory567=$row091123["subcategory"];
}



         echo "<tr  height='70px'><td  style='width:15%;padding-right:40px;'  >" . $row2["title"]. "</td><td style='width:30%;padding-right:40px;word-wrap:break-word;'  >" .$row2["body"]." </td><td  style='width:30%;padding-right:40px; word-wrap:break-word;' >" . $row2["path"]. " </td><td  style='width:15%;padding-right:40px;' >" . $row09["username"]. " </td><td  style='width:15%;padding-right:40px;' >" . $category567. " </td><td style='width:20%;padding-right:40px;'  >" . $subcategory567. " </td><td style='width:15%;padding-right:40px;'  >" . $row2["created"]. " </td></tr>";
       
     }
     echo "</table>";
   
      }        
     else {
    echo "0 results";}
    $query = "SELECT * FROM post ";
$result34 = mysqli_query($conn, $query);
if ($result34->num_rows > 0 && $result34->num_rows > 5){$total_records = mysqli_num_rows($result34);

$total_pages = ceil($total_records / $per_page);
if($page==1){ 
echo "<ul class='pager'><li class='previous'>   </li> ";
$i=1; $i<=$total_pages; $i++;




echo "         <li class='next'><a href='adpost?page=".$i."'>".'Older &rarr;'."</a> </li></ul> ";
}
elseif($page==$total_pages)
  {$i=1; $i<=$total_pages; $i++; 

$i2=$page-1; 

echo "     <ul class='pager'>    <li class='previous'><a href='adpost?page=".$i2."'>".'&larr; Newer'."</a> </li> ";
echo "<li class='previous'>   </li></ul> ";

}
else {
  $i=1; $i<=$total_pages; $i++; 
   $i1=$page+1; 
  $i2=$page-1; 

echo "<ul class='pager'>   <li class='previous'><a href='adpost?page=".$i2."'>".'&larr; Newer'."</a>   </li> ";





echo "         <li class='next'><a href='adpost?page=".$i1."'>".'Older &rarr;'."</a> </li></ul> ";

}}



else{

}?>         

                
                 
                 
           
                      
                  
            </div>

          
       




      
       

      

        

  <nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
  <div class="col-lg-12" style="
    height: 30px;
">
    <ul class="nav navbar-nav navbar-right">
    <li><a class="navbar-brand" style="
    padding-top: 6px;
">  &copy;2016 Brand.in </a></li>
    
    </ul></div>
  </div>
</nav>
                     
                




 <script src="js/bootstrap.min.js"></script>

</body>

</html><?php }?>