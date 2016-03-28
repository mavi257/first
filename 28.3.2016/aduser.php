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

 if ($r['admin']==0 ) {
  
session_destroy();
 unset($_SESSION['user']);
 header("Location: login");
}



$per_page=5;
if (isset($_GET["page"])) {

$page = $_GET["page"];

}

else {

$page=1;

}

$start_from = ($page-1) * $per_page;

if (isset($_POST['exp'])){
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=user.csv');

    $outputqw = fopen('php://output', 'w');

    fputcsv($outputqw, array('User Id', 'Email','Username' ,'Firstname', 'Lastname', 'Password', 'Created at', 'Last Login','Admin Role'));
    $conqw = mysqli_connect('localhost', 'root', '', 'new');
    $rowsqw = mysqli_query($conqw, 'SELECT * FROM user where userid!=0 AND userid!=1 order by userid ASC');

    while ($rowqw = mysqli_fetch_assoc($rowsqw)) {
      fputcsv($outputqw, $rowqw);
    }
    fclose($outputqw);
    mysqli_close($conqw);
    exit();
  }  
include_once('dbConfig.php');
if(isset($_POST['bulk_delete_submit'])){
    $idArr = $_POST['checked_id'];
    foreach($idArr as $userid){
        mysqli_query($conn,"DELETE FROM user WHERE userid=".$userid);
    }
    $_SESSION['success_msg'] = 'users have been deleted successfully.';
    
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar" lang="en"><!--<![endif]--><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Brand Posts</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="stylesheet" id="all-css-6" href="css/wp1.css" type="text/css" media="all">
				
<link rel="stylesheet" id="all-css-6" href="css/wp2.css" type="text/css" media="all">
<link rel="stylesheet" id="all-css-6" href="css/style.css" type="text/css" media="all">
        
    
<link rel="stylesheet" id="all-css-6" href="css/style.css" type="text/css" media="all">
        
    <script type="text/javascript" src="js/jquery.min.js"></script>



</head>
<body class="wp-admin wp-core-ui js  mp6  admin-color-mp6 legacy-color-fresh edit-php auto-fold admin-bar post-type-post branch-4-4 version-4-4-1 admin-color-fresh locale-en multisite  customize-support svg">

	
<div id="wpwrap">

<div id="adminmenumain" role="navigation" aria-label="Main menu">

<div id="adminmenuback"></div>
<div id="adminmenuwrap">
<ul id="adminmenu">


<li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-post open-if-no-js menu-top-first" id="menu-posts">
	<a href="admin" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-post open-if-no-js menu-top-first" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-dashboard"><br></div><div class="wp-menu-name">Dashboard</div></a>
	</li>
	 <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-users" id="menu-users">
	<a href="adpost" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-users" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-post"><br></div><div class="wp-menu-name">Posts</div></a>
	</li>
	
	
	
	
	


	<li class="wp-not-current-submenu menu-top menu-icon-comments" id="menu-comments">
	<a href="adcom" class="wp-not-current-submenu menu-top menu-icon-comments"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-comments"><br></div><div class="wp-menu-name">Comments </div></a></li>
<li class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" id="menu-dashboard">
	<a href="aduser" class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" aria-haspopup="false"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-users"><br></div><div class="wp-menu-name">Users</div></a>
	</li>
    
    
    <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-links" id="menu-links">
	<a href="adcat" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-links" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-links"><br></div><div class="wp-menu-name">Categories</div></a>
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
		<li id="wp-admin-bar-ab-new-post"><a class="ab-item" href="crepost"></a>		</li>		</ul>
				</div>
					
					</div>

	

	
<div id="wpbody" role="main">

<div id="wpbody-content" aria-label="Main content" tabindex="0">
		
				
		<div class="wrap"><?php

$sql1 = "SELECT * FROM user where userid!=0 AND userid!=1 order by userid ASC LIMIT $start_from, $per_page ";


    $sql1222222 = "SELECT * FROM user where userid!=0 AND userid!=1";$result2222222 = $conn->query($sql1222222);
    $result2356 = $conn->query($sql1);$count789=$result2222222->num_rows;
      if ($result2356->num_rows > 0){
 ?>
<h1>Users(<?php echo $count789;?>)
  <form action="" method="post" style="
    float: right;
">
    <button class="button" name="exp" >Export All</button>&nbsp;
</form>
    

		
 </h1>

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
<form name="bulk_action_form" action="" method="post" onSubmit="return delete_confirm();"/>



 
      <div class="tablenav top">
	<div class="alignleft actions bulkactions">
			<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label><select name="action" id="bulk-action-selector-top">
<option value="-1">Bulk Actions</option>
	
	<option value="delete">Move to Trash</option>
</select>
<input type="submit" id="delete"  name="bulk_delete_submit" class="button action" value="Apply">&nbsp;
		</div>
				

		<br class="clear">
	</div>
                
   <table id="export_table" class="wp-list-table widefat fixed striped posts">
      
	<thead>
	<tr>
		<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input type="checkbox" name="select_all" id="select_all" value=""/></td><th scope="col" id="username" class="manage-column column-username column-primary sortable desc"><a><span>Username</span></a></th><th scope="col" id="name" class="manage-column column-name sortable desc"><a ><span>Name</span></a></th><th scope="col" id="email" class="manage-column column-email sortable desc"><a><span>Email</span></a></th><th scope="col" id="role" class="manage-column column-role"><a>Role</a></th><th scope="col" id="posts" class="manage-column column-posts num"><a>Posts</a></th>	</tr>
	</thead>
            
            <?php

     while($row2 = $result2356->fetch_assoc()) {  
  
   $roe=$row2["userid"];
$sql156 = "SELECT * FROM post where userid=$roe  ";
    $result156 = $conn->query($sql156);
$count156=$result156->num_rows;
if($row2["admin"]==1)
{
    $ro='super user';
    
}
else
   {
      $ro='admin'; 
   }?>


<tbody id="the-list">
				<tr id="post-" class="iedit author-self level-0 post- type-post status-draft format-standard hentry category-">
			<th scope="row" class="check-column">			<label class="screen-reader-text" for="cb-select-<?php echo $row2["userid"];?>">Select <?php echo $row2["username"];?></label>
			<input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row2['userid']; ?>"/>
	
		</th><td class="title column-title has-row-actions column-primary page-title" data-colname="Title"><strong><?php echo $row2["username"];?> </strong>


</td><td class="author column-author" data-colname="Author"><?php echo $row2["firstname"];?>&nbsp;<?php echo $row2["lastname"];?></td><td class="categories column-categories" data-colname="Categories"><?php echo $row2['email'];?></td>
          <td class="categories column-categories" data-colname="Categories"><?php echo $ro;?></td>         
                
           
         <td class="posts column-posts num" data-colname="Posts"><a href="" class="edit"><span aria-hidden="true"><?php echo $count156;?></span></a></td>
                    
                    
                    
                    
                    
                    
                    	</tr>
	
		</tbody>
  <?php }?>
 <tfoot>
		<tr>
		<tr>
		<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input type="checkbox" name="select_all" id="select_all" value=""/></td><th scope="col" id="username" class="manage-column column-username column-primary sortable desc"><a><span>Username</span></a></th><th scope="col" id="name" class="manage-column column-name sortable desc"><a ><span>Name</span></a></th><th scope="col" id="email" class="manage-column column-email sortable desc"><a><span>Email</span></a></th><th scope="col" id="role" class="manage-column column-role"><a>Role</a></th><th scope="col" id="posts" class="manage-column column-posts num"><a>Posts</a></th>	</tr>
	</tfoot>

    </table><br class="clear">
	</div>
  <?php
   } else { ?><br>
            No Users found<?php }
    
    $query = "SELECT * FROM user where userid!=0 AND userid!=1";
$result34 = mysqli_query($conn, $query);
if ($result34->num_rows > 0 && $result34->num_rows > 5){$total_records = mysqli_num_rows($result34);

$total_pages = ceil($total_records / $per_page);
if($page==1){ 
echo "<ul class='pager'><li class='previous'>   </li> ";
$i=1; $i<=$total_pages; $i++;




echo "         <li class='next'><a href='aduser?page=".$i."'>".'Older &rarr;'."</a> </li></ul> ";
}
elseif($page==$total_pages)
  {$i=1; $i<=$total_pages; $i++; 

$i2=$page-1; 

echo "     <ul class='pager'>    <li class='previous'><a href='aduser?page=".$i2."'>".'&larr; Newer'."</a> </li> ";
echo "<li class='previous'>   </li></ul> ";

}
else {
  $i=1; $i<=$total_pages; $i++; 
   $i1=$page+1; 
  $i2=$page-1; 

echo "<ul class='pager'>   <li class='previous'><a href='aduser?page=".$i2."'>".'&larr; Newer'."</a>   </li> ";





echo "         <li class='next'><a href='aduser?page=".$i1."'>".'Older &rarr;'."</a> </li></ul> ";

}}



else{

} if(!empty($_SESSION['success_msg'])){ ?><br>
<div class="alert alert-success"><?php echo $_SESSION['success_msg']; ?></div>
<?php unset($_SESSION['success_msg']); } ?>
<?php
include_once('dbconfig.php');     ?>  
     


<br class="clear">
</div>


<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

                







<script type="text/javascript" src="js/wp.js"></script>
	
<div class="clear"></div>
    
     

</body></html>

    


        

                
                 
                 
           
        
       




      
       

      
