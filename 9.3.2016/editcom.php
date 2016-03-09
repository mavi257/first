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
	<a href="admin" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-post open-if-no-js menu-top-first" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-dashboard"><br></div><div class="wp-menu-name">Dashboard</div></a>
	</li>
	
	
	<li class="wp-not-current-submenu menu-top menu-icon-comments" id="menu-comments">
	<a href="adpost" class="wp-not-current-submenu menu-top menu-icon-comments"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-post"><br></div><div class="wp-menu-name">Posts</div></a></li>
	
	


	<li class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" id="menu-dashboard">
	<a href="adcom" class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" aria-haspopup="false"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-comments"><br></div><div class="wp-menu-name">Comments </div></a></li>
  
  
<li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-users" id="menu-users">
	<a href="aduser" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-users" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-users"><br></div><div class="wp-menu-name">Users</div></a>
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



<div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
		

		<form name="post" action="upcom" method="post" id="post">
<div class="wrap">
<h1>Edit Comment</h1>

<div id="poststuff">    <?php 
if(isset($_GET['comid']))
  {
  $comid=$_GET['comid'];

      
      $soi = "SELECT * FROM comment where comid='$comid' ";
$getselect=mysqli_query($conn,$soi);
$profile=mysqli_fetch_array($getselect,MYSQLI_ASSOC);
      
      
  
    $body=$profile['body'];
    $postid=$profile['postid'];
      
      $soi1 = "SELECT * FROM post where postid='$postid' ";
$get1select=mysqli_query($conn,$soi1);
$profile1=mysqli_fetch_array($get1select,MYSQLI_ASSOC);
      
      
  
    $title=$profile1['title'];

  }?>

<div id="post-body" class="metabox-holder columns-2">
<div id="post-body-content" class="edit-form-section edit-comment-section">
<div class="inside">
	<div id="comment-link-box">
		<strong>Permalink:</strong>
		<span id="sample-permalink"><a href="post?postid=<?php echo $postid;?>">www.brand.in/post?postid=<?php echo $postid;?></a></span>
	</div>
</div>  

  

<textarea name="body"rows="4" cols="120" required>
<?php echo $body;?>
    </textarea>

</div><!-- /post-body-content -->

<div id="postbox-container-1" class="postbox-container">
<div id="submitdiv" class="stuffbox">

<div class="inside">
<div class="submitbox" id="submitcomment">
<div id="minor-publishing">

<div id="misc-publishing-actions">


<div class="misc-pub-section curtime misc-pub-curtime">
<span id="timestamp">Submitted on: <b><?php echo $profile['createdat'];?></b></span>


</div>
  
    
 

<input type="hidden" name="comid" value="<?php echo $comid;?>"/>

<div class="misc-pub-section misc-pub-response-to">
	In response to: <b><a href="post?postid=<?php echo $postid;?>"><?php echo $title;?></a></b></div>



</div> <!-- misc actions -->
<div class="clear"></div>
</div>

<div id="major-publishing-actions">
<div id="delete-action">
<a class="btn-sm btn-danger" href="delcom?comid=<?php echo $comid;?>">Trash</a>
 
    <a class="btn-sm btn-success" onclick="goBack()">Cancel</a>
</div>
<div id="publishing-action">
<input type="submit" name="submit" id="submit" class="button button-primary" value="Update"></div>
<div class="clear"></div>
</div>
</div>
</div>
</div><!-- /submitdiv -->
</div>


</div><!-- /post-body -->
</div>
</div>
</form>

<script>
function goBack() {
    window.history.back();
}
</script>



<br class="clear">
</div>


<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

                







<script type="text/javascript" src="js/wp.js"></script>
	
<div class="clear"></div>
    
     

</body></html>
