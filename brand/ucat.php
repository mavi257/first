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


 if ($r['admin']==1 ) {
  
session_destroy();
 unset($_SESSION['user']);
 header("Location: login");
}


if(isset($_POST['submit']))
{
     $categorylabel = mysqli_real_escape_string($conn, $_POST['categorylabel']);
      
 $sql = "INSERT INTO category (category,createdat,userid) VALUES('$categorylabel',now(),$userid)";
    if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('category created successfully')
  
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')

    </SCRIPT>");}
}


if(isset($_POST['submita']))   {

 
$catlabel = mysqli_real_escape_string($conn,$_POST['catlabel']);
$sublabel = mysqli_real_escape_string($conn, $_POST['sublabel']);
 $sql10 = "SELECT * FROM category where category= '$catlabel'";
$res10=mysqli_query($conn,$sql10);
$reee=mysqli_fetch_array($res10,MYSQLI_ASSOC);
$q=$reee["cat_id"];
$sql="INSERT into subcategory (cat_id,subcategory,createdat,userid) value('$q','$sublabel',now(),$userid)";
 if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('subcategory successfully created')

    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
   
    </SCRIPT>");}
 

  
  }

 if(isset($_POST['submitdelcat'])){

 $cat_id = mysqli_real_escape_string($conn,$_POST['cat_id']);




$sql="DELETE from category WHERE cat_id = $cat_id" ;
$sql1="DELETE from subcategory WHERE cat_id = $cat_id" ;
$sql2="DELETE from post WHERE cat_id = $cat_id" ;
$sql3="DELETE from comment WHERE cat_id = $cat_id" ;

 if ($conn->query($sql) === TRUE AND $conn->query($sql1) === TRUE AND $conn->query($sql2) === TRUE AND $conn->query($sql3) === TRUE ) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Category successfully deleted')
  
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
  
    </SCRIPT>");}
 
}


 if(isset($_POST['submitdelsubcat'])){

 $subcat_id = mysqli_real_escape_string($conn,$_POST['subcat_id']);




$sql1="DELETE from subcategory WHERE subcat_id = $subcat_id" ;
$sql2="DELETE from post WHERE subcat_id = $subcat_id" ;
$sql3="DELETE from comment WHERE subcat_id = $subcat_id" ;

 if ( $conn->query($sql1) === TRUE AND $conn->query($sql2) === TRUE AND $conn->query($sql3) === TRUE ) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Subcategory successfully deleted')
    
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')

    </SCRIPT>");}
 

}



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar" lang="en"><!--<![endif]--><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Brand Posts</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">
	
		<link rel="stylesheet" id="all-css-0" href="css/wp1.css" type="text/css" media="all">
<link rel="stylesheet" id="open-sans-css" href="css/fonts.css" type="text/css" media="all">
<link rel="stylesheet" id="all-css-2" href="css/wp2.css" type="text/css" media="all">

<link rel="stylesheet" id="all-css-6" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" id="all-css-6" href="css/bootstrap.css" type="text/css" media="all">      
   <link rel="stylesheet" id="all-css-6" href="css/color.css" type="text/css" media="all"> 
    <link rel="stylesheet" id="all-css-6" href="css/font-awesome.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery.min.js"></script>






</head>
<body class="wp-admin wp-core-ui js  mp6  admin-color-mp6 legacy-color-fresh edit-php auto-fold admin-bar post-type-post branch-4-4 version-4-4-1 admin-color-fresh locale-en multisite  customize-support svg">

	
<div id="wpwrap">

<div id="adminmenumain" role="navigation" aria-label="Main menu">

<div id="adminmenuback"></div>
<div id="adminmenuwrap">
<ul id="adminmenu">



	
<li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-post open-if-no-js menu-top-first" id="menu-posts">
	<a href="uadmin" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-post open-if-no-js menu-top-first" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-dashboard"><br></div><div class="wp-menu-name">Dashboard</div></a>
	</li>
	

	<li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-post open-if-no-js menu-top-first" id="menu-posts">
	<a href="upost" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-post open-if-no-js menu-top-first" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-post"><br></div><div class="wp-menu-name">Posts</div></a>
	</li>
	


	<li class="wp-not-current-submenu menu-top menu-icon-comments" id="menu-comments">
	<a href="ucom" class="wp-not-current-submenu menu-top menu-icon-comments"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-comments"><br></div><div class="wp-menu-name">Comments </div></a></li>
  

     
    
        <li class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" id="menu-dashboard">
	<a href="ucat" class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" aria-haspopup="false"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-links"><br></div><div class="wp-menu-name">Categories</div></a>
	</li>
	
    
    </ul>

</div>
</div>
<div id="wpcontent">


			<div id="wpadminbar" class="ltr">
						<div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="Toolbar" tabindex="0">
			
<div id="wpadminbar" class="ltr">
            <div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="Toolbar" tabindex="0">
          <ul id="wp-admin-bar-root-default" class="ab-top-menu">
      
    <li id="wp-admin-bar-blog" class="menupop my-sites"><a class="ab-item" aria-haspopup="true" href="index">Brand</a>       </li>
   
   

     </ul>

        </div>
             
          </div>
		
	
			
			<ul id="wp-admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">

		<li id="wp-admin-bar-my-account" class="menupop with-avatar no-grav"><a class="ab-item" aria-haspopup="true" href=""><img alt="" src="upload/pr.png" class="avatar avatar-32" height="32" width="32"><span class="ab-text">Me</span></a>			<div class="ab-sub-wrapper">		<ul id="wp-admin-bar-user-actions" class="ab-submenu">
			
		<li id="wp-admin-bar-user-info" class="user-info user-info-item">		<div class="ab-item ab-empty-item" tabindex="-1"><img alt="" src="upload/pr.png" class="avatar avatar-128" height="128" width="128"><span class="display-name"><?php echo $r['username'];?></span><span class="username">&nbsp;&nbsp;<a href="logout?logout">Sign Out</a></span></div>		</li>
				</ul>
	</div>		</li>
		<li id="wp-admin-bar-ab-new-post"><a class="ab-item" href="createpost"></a>		</li>		</ul>
				</div>
					
					</div>

	

<div id="wpbody" role="main">

<div id="wpbody-content" aria-label="Main content" tabindex="0">
		
				
		<div class="wrap">


	
	
				
<div class="container" >  
  <div class='row'>
  <div class='col-lg-3'>
<div>
                <h3 class="page-header">Category</h3> 
              
   

        
           
               <form action="" method="post" >


  name<input type="text" name="categorylabel" required><br><br>

 


<button class = "btn  " type="submit" value="submit" name="submit" />Create
</form></div><div>
            <h3 class="page-header">Sub-category</h3> 
            <?php   $sql10 = "SELECT * FROM category where userid='$userid' ";
$res10=mysqli_query($conn,$sql10);
?>

                 <form action="" method="post"  enctype="multipart/form-data">

category
<?php

echo "<select name='catlabel'>";
while ($reee=mysqli_fetch_array($res10,MYSQLI_ASSOC)) {
    echo '<option value="' . $reee[category] . '">'.$reee[category].'</option>';;
}
echo "</select>";?>
  <br>sub category<input type="text" name="sublabel" required><br>

 
<br>

<button class = "btn  " type="submit" value="submita" name="submita" />Create
</form></div>
          
      </div>
       

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-lg-3">
       
  <center>   <h4> Categories</h4></center>
 <hr>
 <div >
  
               <?php
  $sql1 = "SELECT * FROM category where userid='$userid'";
$result2 = $conn->query($sql1);
if ($result2->num_rows > 0){
    
    while($row2 = $result2->fetch_assoc()) {  ?>
       
              
          
<div class="row">
            <div class="col-sm-6">
                <h3> <a href="catpage?cat_id=<?php echo $row2['cat_id']?>" ><?php echo $row2['category'] ?></a></h3>
            </div>
            <div class="col-sm-6" style="padding-top: 20px;">
            


     <a class="btn btn-sm btn-primary" href="catpage?cat_id=<?php echo $row2['cat_id']?>">View</a>
                
               <form action="" style="display:inline-block;" method="post" >

<input type="hidden" name="cat_id" value="<?php echo $row2['cat_id']?>" />
                   <button  class="btn btn-sm btn-danger" name="submitdelcat" >Delete</button>
 


</form>
 
            </div>
       
      </div>  
        <hr>  <?php
    }
} else {
    echo "0 results";}
    ?>       
</div>
      </div>
<div class="col-lg-6" style="
    background-color: #EFF3F7;
">    <center>   <h4>Sub Categories</h4></center>
 <hr>

<?php
$sql90 = "SELECT * FROM subcategory where userid='$userid'";
$result90 = $conn->query($sql90);
$rows90 = $result90->num_rows;    // Find total rows returned by database
    if($rows90 > 0) {
        $cols = 4;    // Define number of columns
        $counter = 1;     // Counter used to identify if we need to start or end a row
        $nbsp = $cols - ($rows90 % $cols);    // Calculate the number of blank columns
 
                echo '<table width="100%" align="center" style="
    margin-left: 50px;
">';
        while ($row90= $result90->fetch_array()) {
            if(($counter % $cols) == 1) {    // Check if it's new row
                echo '<tr>';    
            }?>
                 <?php
            echo '<td> 
            <div style="
    height: 77px;
    
"><h6><a  href="subcatpage?subcat_id='.$row90['subcat_id'].'">'.$row90['subcategory'].'</a></h6> 
     <form action="" style="display:inline-block;" method="post" >

<input type="hidden" name="subcat_id" value='.$row90['subcat_id'].' />
                   <button  class="btn btn-sm btn-danger" name="submitdelsubcat" >Delete</button>
 


</form>    
     
         </div></td>';?>
       
       <?php
            if(($counter % $cols) == 0) {?>
                


           <?php
            // If it's last column in each row then counter remainder will be zero
                echo '   </tr>';   
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
?>
                  


      </div></div></div>
<br class="clear">
</div>


<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

                







<script type="text/javascript" src="js/wp.js"></script>
	
<div class="clear"></div></div><!-- wpwrap -->
    
     

</body></html>