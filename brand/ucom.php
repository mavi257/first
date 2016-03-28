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
    header('Content-Disposition: attachment; filename=comment.csv');

    $outputqw = fopen('php://output', 'w');

    fputcsv($outputqw, array('Comment Id', 'Body', 'Post Id','Created at','User Id', 'Category Id', 'SubCategory Id', 'Updated at'));
    $conqw = mysqli_connect('localhost', 'root', '', 'new');
    $rowsqw = mysqli_query($conqw, 'SELECT * FROM comment');

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
    foreach($idArr as $comid){
        mysqli_query($conn,"DELETE FROM comment WHERE comid=".$comid);
    }
    $_SESSION['success_msg'] = 'Comments have been deleted successfully.';
    
}


if(isset($_GET['comid'])){
$comid = mysqli_real_escape_string($conn,$_GET['comid']);





$sql="DELETE from comment WHERE comid = $comid" ;

 if ($conn->query($sql) === TRUE) {
   $_SESSION['success_msg'] = 'comment have been deleted successfully.';}

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
	<a href="uadmin" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-post open-if-no-js menu-top-first" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-dashboard"><br></div><div class="wp-menu-name">Dashboard</div></a>
	</li>
	
	
	<li class="wp-not-current-submenu menu-top menu-icon-comments" id="menu-comments">
	<a href="upost" class="wp-not-current-submenu menu-top menu-icon-comments"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-post"><br></div><div class="wp-menu-name">Posts</div></a></li>
	
	


	<li class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" id="menu-dashboard">
	<a href="ucom" class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" aria-haspopup="false"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-comments"><br></div><div class="wp-menu-name">Comments </div></a></li>
  

    
    <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-links" id="menu-links">
	<a href="ucat" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-links" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-links"><br></div><div class="wp-menu-name">Categories</div></a>
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
          <?php  $sql1356 = "SELECT * FROM comment where userid='$userid'  ";
    $result2356 = $conn->query($sql1356);$count789=$result2356->num_rows;?>
  
                  <?php
$sql1 = "SELECT * FROM comment where userid='$userid'  order by comid DESC LIMIT $start_from, $per_page ";
    $result2 = $conn->query($sql1);

if ($result2->num_rows > 0){ 
          
      ?>
<h1>Comments(<?php echo $count789;?>)       
 <form action="" method="post" style="
    float: right;
">
    <button class="button" name="exp" >Export All</button>&nbsp;
</form></h1>  
<form name="bulk_action_form" action="" method="post" onSubmit="return delete_confirm();">




            
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
	<table class="wp-list-table widefat fixed striped posts">
      
	<thead>
<tr>
		<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input type="checkbox" name="select_all" id="select_all" value=""/></td><th scope="col" id="author" class="manage-column column-author sortable desc"><a href=""><span>Author</span></a></th><th scope="col" id="comment" class="manage-column column-comment column-primary"><a>Comment</a></th><th scope="col" id="response" class="manage-column column-response sortable desc"><a href=""><span>In Response To</span></a></th><th scope="col" id="date" class="manage-column column-date sortable desc"><a href=""><span>Submitted On</span></a></th>	</tr>
    </thead>
            
            <?php

     while($row2 = $result2->fetch_assoc()) {  
 $userid12345=$row2["userid"];
         $sql09 = "SELECT * FROM user where userid=$userid12345";
       $result09 = $conn->query($sql09);
 $row09 = $result09->fetch_assoc();
 


 
         $postid12345=$row2["postid"];
          $sql0956 = "SELECT * FROM post where postid=$postid12345";
       $result0956 = $conn->query($sql0956);
 $row0956 = $result0956->fetch_assoc();
            $sql095690 = "SELECT * FROM comment where postid=$postid12345";
       $result095690 = $conn->query($sql095690);
$count095690=$result095690->num_rows;
              ?>
<tbody id="the-comment-list" data-wp-lists="list:comment">
			<tr id="post-<?php echo $row2["body"];?>" class="iedit author-self level-0 post-<?php echo $row2["body"];?> type-post status-draft format-standard hentry category">
			<th scope="row" class="check-column">			<label class="screen-reader-text" for="cb-select-<?php echo $row2["postid"];?>">Select <?php echo $row2["body"];?></label>
			<input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row2['comid']; ?>"/>
		</th><td class="author column-author" data-colname="Author"><strong><img alt="" src="upload/pr.png" ><br><br> <?php echo $row09['username'];?></strong></td><td class="comment column-comment has-row-actions column-primary" data-colname="Comment">
            <div class="comment-author"><br><br></div><p><?php echo $row2['body'];?></p>
	
		<div class="row-actions"><span class="reply hide-if-no-js"> <a data-comment-id="6" data-post-id="17" data-action="replyto" class="vim-r comment-inline" title="Reply to this comment" href="post.php?postid=<?php echo $postid12345;?>">Reply</a></span><span class="edit"> | <a href="editcom?comid=<?php echo $row2['comid']; ?>" title="Edit comment">Edit</a></span><span class="trash"> | <a href="?comid=<?php echo $row2['comid']; ?>" data-wp-lists="delete:the-comment-list:comment-6::trash=1" class="delete vim-d vim-destructive" title="Move this comment to the trash">Trash</a></span></div></td>
            
            <td class="response column-response" data-colname="In Response To"><div class="response-links"><a href="post.php?postid=<?php echo $postid12345;?>" class="comments-edit-item-link"><?php echo $row0956['title'];?></a><a href="post.php?postid=<?php echo $postid12345;?>" class="comments-view-item-link">View Post</a><span class="post-com-count-wrapper post-com-count-17"><a  class="post-com-count post-com-count-approved"><span class="comment-count-approved" aria-hidden="true"><?php echo $count095690;?></span></a></span> </div></td><td class="date column-date" data-colname="Submitted On"><div class="submitted-on"><a ><?php echo $row2['createdat'];?></a></div></td></tr>
	</tbody>
  
  <?php }?>
 <tfoot>
<tr>
		<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input type="checkbox" name="select_all" id="select_all" value=""/></td><th scope="col" id="author" class="manage-column column-author sortable desc"><a href=""><span>Author</span></a></th><th scope="col" id="comment" class="manage-column column-comment column-primary"><a>Comment</a></th><th scope="col" id="response" class="manage-column column-response sortable desc"><a href=""><span>In Response To</span></a></th><th scope="col" id="date" class="manage-column column-date sortable desc"><a href=""><span>Submitted On</span></a></th>	</tr>
	</tfoot>

</table><div class="tablenav bottom">

			<div class="alignleft actions bulkactions">
			<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label><select name="action" id="bulk-action-selector-top">
<option value="-1">Bulk Actions</option>
	
	<option value="delete">Move to Trash</option>
</select>
                
<input type="submit" id="delete"  name="bulk_delete_submit" class="button action" value="Apply">
		</div>
				
				

		<br class="clear">
	</div>
  <?php
   } else { ?><br>No comments found<?php }?> 
	
    

            </form><?php
$query78 = "SELECT * FROM comment where userid='$userid'";
$result3478 = mysqli_query($conn, $query78);
if ($result3478->num_rows > 0 && $result3478->num_rows > 5){$total_records = mysqli_num_rows($result3478);

$total_pages = ceil($total_records / $per_page);
if($page==1){ 
echo "<ul class='pager'><li class='previous'>   </li> ";
$i=1; $i<=$total_pages; $i++;




echo "         <li class='next'><a href='ucom?page=".$i."'>".'Older &rarr;'."</a> </li></ul> ";
}
elseif($page==$total_pages)
  {$i=1; $i<=$total_pages; $i++; 

$i2=$page-1; 

echo "     <ul class='pager'>    <li class='previous'><a href='ucom?page=".$i2."'>".'&larr; Newer'."</a> </li> ";
echo "<li class='previous'>   </li></ul> ";

}
else {
  $i=1; $i<=$total_pages; $i++; 
   $i1=$page+1; 
  $i2=$page-1; 

echo "<ul class='pager'>   <li class='previous'><a href='ucom?page=".$i2."'>".'&larr; Newer'."</a>   </li> ";





echo "         <li class='next'><a href='ucom?page=".$i1."'>".'Older &rarr;'."</a> </li></ul> ";

}}



else{

}        
      if(!empty($_SESSION['success_msg'])){ ?><br>
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
    
    </div>

</body></html>

    


