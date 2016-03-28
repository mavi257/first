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
 unset($_SESSION['userid']);
 header("Location: login");
}
    

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar" lang="en"><!--<![endif]--><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Brand Posts</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<style type="text/css">
			.fixed .column-likes { width: 5em; padding-top: 8px; text-align: center !important; }
			.fixed .column-stats { width: 5em; }
			.fixed .column-likes a .comment-count { background: none; color: #555; }
			.fixed .column-likes .post-com-count { background-image: none; }
					.fixed .column-likes .post-com-count::after { border: none !important; }
			.fixed .column-likes .vers img { display: none; }
			.fixed .column-likes .vers:before {
				font: normal 20px/1 dashicons;
				content: '\f155';
				speak: none;
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
			}
			@media screen and (max-width: 782px) {
				.fixed .column-likes {
					display: none;
				}
			}
				</style>
		<link rel="stylesheet" id="all-css-0" href="css/wp1.css" type="text/css" media="all">
<link rel="stylesheet" id="open-sans-css" href="css/fonts.css" type="text/css" media="all">
<link rel="stylesheet" id="all-css-2" href="css/wp2.css" type="text/css" media="all">

<link rel="stylesheet" id="all-css-6" href="css/style.css" type="text/css" media="all">
        
    
<script type="text/javascript" src="js/jquery.min.js"></script>



<style type="text/css" media="screen">

#polldaddy-error.error{
	border-radius:6px;
	margin-left:5px;
	margin-right:2%;
	background-color:#FFC;
	background:url('/wp-content/admin-plugins/post-flair/polldaddy/img/error-gray.png') no-repeat 3px 3px, -moz-linear-gradient(top, #FFF, #FFC);
	background:url('/wp-content/admin-plugins/post-flair/polldaddy/img/error-gray.png') no-repeat 3px 3px, -webkit-linear-gradient(top, #FFF, #FFC);
	margin-top:14px;
	border:1px #cccccc solid;
	padding:3px 5px 3px 40px;
}


h2#polldaddy-header, h2#poll-list-header{
	padding-left:38px;
	background:url('/wp-content/admin-plugins/post-flair/polldaddy/img/pd-wp-icon-gray-lrg.png') no-repeat 0 9px;
	margin-bottom: 14px; 
}

@media only screen and (-moz-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (-webkit-min-device-pixel-ratio: 1.5), only screen and (min-device-pixel-ratio: 1.5) {

	#adminmenu .menu-icon-feedback:hover div.wp-menu-image,
	#adminmenu .menu-icon-feedback.wp-has-current-submenu div.wp-menu-image,
	#adminmenu .menu-icon-feedback.current div.wp-menu-image {
		background: url('/wp-content/admin-plugins/post-flair/polldaddy/img/grunion-menu-hover-2x.png') no-repeat 7px 7px !important;
		background-size: 15px 16px !important;
	}

	#adminmenu .menu-icon-feedback div.wp-menu-image {
		background: url('/wp-content/admin-plugins/post-flair/polldaddy/img/grunion-menu-2x.png') no-repeat 7px 7px !important;
		background-size: 15px 16px !important;
	}
	
	
	h2#polldaddy-header, h2#poll-list-header{
		background:url('') no-repeat 0 9px;
		background-size: 31px 31px;
	}
}	

	
	
</style>
<style type="text/css" media="print">#wpadminbar { display:none; }</style>
	<style type="text/css">
		#wp-content-editor-tools {
			height: auto;
		}
				.wp-editor-container {
			clear: both;
		}
			</style>
<style type="text/css" id="syntaxhighlighteranchor"></style>
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
	
	<li class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" id="menu-dashboard">
	<a href="adpost" class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard" aria-haspopup="false"><div class="wp-menu-arrow"><div></div></div><div class="wp-menu-image dashicons-before dashicons-admin-post"><br></div><div class="wp-menu-name">Posts</div></a>
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

	

	<script type="text/javascript">function hideBubble() { jQuery('body').append( jQuery( 'div.wpcom-bubble' ).removeClass( 'fadein' ) ).off( 'click.bubble touchstart.bubble' ); jQuery(document).off( 'scroll.bubble' ); };</script>

<div id="wpbody" role="main">

<div id="wpbody-content" aria-label="Main content" tabindex="0">
		
				
		<div class="wrap">
<h1>Add New Post</h1>

<form method="post" name="myForm" enctype="multipart/form-data"  onsubmit="return IsEmpty()" action='upload.php'>


<div id="poststuff">
<div id="post-body" class="metabox-holder columns-2">
<div id="post-body-content" style="position: relative;">

<div id="titlediv1">
<div id="titlewrap1">
	<input type="hidden" name="userid" value="<?php echo $userid;?>">	
	<input type="text" name="title" size="117" id="title" spellcheck="true" autocomplete="off" placeholder='Enter Your Title Here' style="
    height: 50px;
" required>
</div>

</div><!-- /titlediv -->
    <textarea style="height: 320px; margin-top: 15px; width:100%" autocomplete="off" placeholder='Enter Your Post Here' cols="40" name="body" required ></textarea>





<div class="wrapper1"> <div class="col1">
  <div id="categorydiv" class="postbox " style="
    width: 100%;
">
<h2 class="hndle ui-sortable-handle"><span>Categories</span></h2>
<div class="inside">

		
<div id="category-all" class="tabs-panel" style="width: 30%;">
         <ul >

         <li id="category-1" class="popular-category"><label class="selectit"><input  value="0" type="radio" name="cat_id" id="0"> Uncategorized</label></li>
            <?php 

      $s12 = "SELECT * FROM category where userid='$userid' ";
$re12=mysqli_query($conn,$s12);
while($row12 = $re12->fetch_assoc())
{
    $che=$row12['cat_id'];
    
    echo '<li id="category-"><label class="selectit"><input type="radio" name="cat_id" value="'.$che.'" id="ho'.$che.'"/>'. $row12['category'].'</label></li>';?>
    <script>

$(function() {
    $("[name=cat_id]").click(function(){
            $('.toHide').hide();
            $("#blk-"+$(this).val()).show('slow');
    });
 });
 </script>
         
             
             
          <div id="blk-<?php echo $che;?>"  class="col1 toHide" style="
    width: 229%;display:none;">
<div  
 class="postbox ">
<h2 class="hndle ui-sortable-handle"><span>Sub Categories</span></h2>
<div class="inside">


		
<div id="category-all" class="tabs-panel" >
            <ul>
         <li id="category-1" class="popular-category"><label class="selectit"><input value="0" type="radio" name="subcat_id" id="in-category-1"> Uncategorized</label></li><?php
   $s12ss = "SELECT * FROM subcategory where cat_id='$che' ";
$re12ss=mysqli_query($conn,$s12ss);
while($row12ss = $re12ss->fetch_assoc())
{
    $che12=$row12ss['subcat_id'];
    
    echo '<li id="category-"><label class="selectit"><input type="radio" name="subcat_id" value="'.$che12.'" id="ho'.$che12.'"/>'. $row12ss['subcategory'].'</label></li>';}?>
    </ul>
			
		
			</div>
	</div>
    </div> </div>      
                
                
                
                <?php }?>
    </ul>
			
		
			</div> 
	</div>
    </div>  </div> </div>
    <div  class="wp-media-buttons"> <input type="file" accept="image/*" onchange="loadFile(event)" name='image' id="files" class="hidden"/><button type="button"  class="button  add_media" >
<label for="files"><span class="wp-media-buttons-icon"></span>Add Media</label></button>


<img id="output" style="
    width: 20%;
" />
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
        <script> 
function IsEmpty() {  
    
    
     var x = document.forms["myForm"]["title"].value;
    if (x == null || x == "") {
        alert("title must be filled out");
        return false;
    }
     var y = document.forms["myForm"]["body"].value;
    if (y == null || y == "") {
        alert("post body must be filled out");
        return false;
    }
       var z = document.forms["myForm"]["cat_id"].value;
    if (z == null || z == "") {
        alert("please select category");
        return false;
    }
  

    if(!document.getElementById('files').value) { 
           alert("add image media for post submission"); 
       return false;
    } 
}  
</script> 
</div>

<div id="publishing-action">

		<input type="submit" name="submit" id="publish" class="button button-primary button-large" value="submit"></div>

    </div></div></div></form>



<br class="clear">
</div>


<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->


        







<script type="text/javascript" src="js/wp.js"></script>
	
<div class="clear"></div></div><!-- wpwrap -->
    
     

</body></html>

      