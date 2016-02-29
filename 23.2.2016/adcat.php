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
<html lang="en" style="
    BACKGROUND-COLOR: #FFFFFF;
">
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
	<li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-post open-if-no-js menu-top-first" id="menu-posts">
	<a href="adpost" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-post open-if-no-js menu-top-first" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-post"><br></div><div class="wp-menu-name">Posts</div></a>
	</li>
	

	

	
    
  
<li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-users" id="menu-users">
	<a href="adcom" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-users" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-comments"><br></div><div class="wp-menu-name">Comments</div></a>
	</li>
    <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-links" id="menu-links">
	<a href="aduser" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-links" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-users"><br></div><div class="wp-menu-name">Users</div></a>
	</li>
  
     </li><li class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" id="menu-dashboard">
	<a href="adcat" class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" aria-haspopup="false"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-links"><br></div><div class="wp-menu-name">Categories</div></a>
	</li>
  
    
    
    
    
    
  
    
    </ul>


</div>
<div class="container" style="
    margin-left: 170px;
    margin-top: 22px;
    margin-right: 15px;
">  
  <div class='row'>
  <div class='col-lg-3'>
<div class='well'>
                <h3 class="page-header">Category</h3> 
              
   

        
           
               <form action="crecat.php" method="post" >


  name<input type="text" name="categorylabel" required><br><br>

 


<button class = "btn  " type="submit" value="submit" name="submit" />Create</button>
</form></div>
          
         
            <div class="well"><h3 class="page-header">Sub-category</h3> 
            <?php   $sql10 = "SELECT * FROM category ";
$res10=mysqli_query($conn,$sql10);
?>

                 <form action="subcat.php" method="post"  enctype="multipart/form-data">

category
<?php

echo "<select name='catlabel'>";
while ($reee=mysqli_fetch_array($res10,MYSQLI_ASSOC)) {
    echo '<option value="' . $reee[category] . '">'.$reee[category].'</option>';;
}
echo "</select>";?>
  <br>sub category<input type="text" name="sublabel" required><br>

 
<br>

<button class = "btn  " type="submit" value="submit" name="submit" />Create</button>
</form>
            </div>
       
         
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-lg-9">
       
 <div class='well'> <center>   <h4> Categories</h4></center>
 <hr>
 <div style="margin-left: 230px;">
  
               <?php
  $sql1 = "SELECT * FROM category";
$result2 = $conn->query($sql1);
if ($result2->num_rows > 0){
    
    while($row2 = $result2->fetch_assoc()) {  ?>
       
              
          
<div class="row">
            <div class="col-sm-3">
              <h3> <a href="catpage.php?cat_id=<?php echo $row2['cat_id']?>" ><?php echo $row2['category'] ?></a><h3>
            </div>
            <div class="col-sm-5" style="padding-top: 20px;">
            


     <a class="btn btn-sm btn-primary" href="catpage.php?cat_id=<?php echo $row2['cat_id']?>">View</a>
 <a  class="btn btn-sm btn-danger" href="delcat.php?cat_id=<?php echo $row2['cat_id']?>">Delete</a>
            </div>
       
      </div>  
        <hr>  <?php
    }
} else {
    echo "0 results";}
    ?>       
</div>
     </div></div></div></div>
    <div class="container" style="
    margin-left: 170px;
    margin-top: 22px;
    margin-right: 15px;
">  
  <div class='row'>
           <div class="well">
                   
                        <center>   <h4>Sub Categories</h4></center>
                     
  <div style="margin-left: 50px;">

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
            }?>
                 <?php
            echo '<td> 
            <div style="
    align: center;" "><h2><a  href="subcatpage.php?subcat_id='.$row90['subcat_id'].'">'.$row90['subcategory'].'</a></h2></div> <div > 
    <a class="btn btn-sm btn-primary" href="subcatpage.php?subcat_id='. $row90['subcat_id'].'">View</a>
<a class="btn btn-sm btn-danger" href="delsubcat.php?subcat_id='. $row90['subcat_id'].'">Delete</a>
       
     
            </td>';?>
       
       <?php
            if(($counter % $cols) == 0) {?>
                


           <?php
            // If it's last column in each row then counter remainder will be zero
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
        </div></div>               
                              
                          
                       
    
                     <hr>
    
                

                <!-- Side Widget Well -->
              
   
        <!-- /.row -->


  

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