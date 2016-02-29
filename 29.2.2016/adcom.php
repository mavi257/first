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

else{


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
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar" lang="en"><!--<![endif]--><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Brand Comments</title>

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
		<link rel="stylesheet" id="all-css-0" href="https://s1.wp.com/_static/??-eJx9y0sOgCAMANELiUT87Ix3gVTFFEpo0Xh7delCl5O80UdSjqJAFB2KSlgWH1lz8AhnyrSBk3fVjrnSH1ux7LJP4umumRDp+PMr7ZCVLdYi3LecCA+fwth0jWlNPwxmuwBGfD1F" type="text/css" media="all">
<link rel="stylesheet" id="open-sans-css" href="https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&amp;subset=latin%2Clatin-ext&amp;ver=4.4.1-alpha-36109" type="text/css" media="all">
<link rel="stylesheet" id="all-css-2" href="https://s1.wp.com/_static/??-eJzTLy/QzcxLzilNSS3WTy4u1k9JLM7ITM7PK9bLzczTA4ro6AOVJKYAeWB5GAdFGsWEpNKSEiT99rm2hiamRqYmFkaWxlkAGX4nzw==" type="text/css" media="all">
<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='https://s0.wp.com/wp-admin/css/ie.min.css?m=1452548293g&#038;ver=4.4.1-alpha-36109' type='text/css' media='all' />
<![endif]-->
<link rel="stylesheet" id="all-css-6" href="css/style.css" type="text/css" media="all">
        
    
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
	$('.checkbox').on('click',function(){
		if($('.checkbox:checked').length == $('.checkbox').length){
			$('#select_all').prop('checked',true);
		}else{
			$('#select_all').prop('checked',false);
		}
	});
});
</script>
<script language="javascript">
function validate()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}
</script>
<script type="text/javascript">
if (window.top !== window.self) {
    window.top.location.href = window.self.location.href; }
</script>
<script type="text/javascript" src="https://s1.wp.com/_static/??-eJyVkWtOAzEMhC9EGiitgB+Is2SzbuRtXsQOYW+P+0ItRIuQIlkZj/J5HN2ywmh9HYH0JOe9QpnPZTXRnV4yqICuGIZVwHgx2xQZIutQVfbVYSRNdSBbMDMmue2S96n9tMvTOREHIDIOeuTK6OmadN2k3Ndv8/zhqqhtKt00BwR4sLy+1J7LjCJ+x7YphBqRZ8XGOSi/hIWVNRwdMGn4kMZQkOEwwklVR0xnwtuwLQtP5ZI+Z1VANOIFoMc9nL5AujX+x6qOpOVdtCwP7ADGwdi9WN/C68Nme/+83jw9vkxfXzjygg=="></script>
<script type="text/javascript">var _wpColorScheme = {"icons":{"base":"#999","focus":"#00a0d2","current":"#fff"}};</script>

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
<link rel="stylesheet" type="text/css" id="gravatar-card-css" href="https://0.gravatar.com/css/hovercard.css?ver=201608y"><link rel="stylesheet" type="text/css" id="gravatar-card-services-css" href="https://0.gravatar.com/css/services.css?ver=201608y"></head>
<body class="wp-admin wp-core-ui js  mp6  admin-color-mp6 legacy-color-fresh edit-php auto-fold admin-bar post-type-post branch-4-4 version-4-4-1 admin-color-fresh locale-en multisite  customize-support svg"><div id="olark" style="display: none;"><olark><iframe frameborder="0" id="olark-loader"></iframe></olark></div>
<script type="text/javascript">
	document.body.className = document.body.className.replace('no-js','js');
</script>

	<script type="text/javascript">
		(function() {
			var request, b = document.body, c = 'className', cs = 'customize-support', rcs = new RegExp('(^|\\s+)(no-)?'+cs+'(\\s+|$)');

			request = true;

			b[c] = b[c].replace( rcs, ' ' );
			b[c] += ( window.postMessage && request ? ' ' : ' no-' ) + cs;
		}());
	</script>
	
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

	<script type="text/javascript">
		(function() {
			var request, b = document.body, c = 'className', cs = 'customize-support', rcs = new RegExp('(^|\\s+)(no-)?'+cs+'(\\s+|$)');

			request = true;

			b[c] = b[c].replace( rcs, ' ' );
			b[c] += ( window.postMessage && request ? ' ' : ' no-' ) + cs;
		}());
	</script>
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
			
		<li id="wp-admin-bar-user-info" class="user-info user-info-item">		<div class="ab-item ab-empty-item" tabindex="-1"><img alt="" src="upload/pr.png" class="avatar avatar-128" height="128" width="128"><span class="display-name">username</span><span class="username">&nbsp;&nbsp;<a href="logout?logout">Sign Out</a></span></div>		</li>
				</ul>
	</div>		</li>
		<li id="wp-admin-bar-ab-new-post"><a class="ab-item" href="createpost"></a>		</li>		</ul>
				</div>
					
					</div>

	
<script type="text/javascript">
/* <![CDATA[ */
var clickDebugLink;

jQuery(document).ready( function($) {
	var single = false, w = 1000,
		supe = false;

	$(document.body).load(function(){ $('#wpadminbar img.grav-hashed').removeClass('grav-hashed'); }); // hack to hide the gravatar hovercard

	if ( single && supe )
		w = 1385;
	else if ( supe )
		w = 1200;

	// debug bar extra
	clickDebugLink = function( parent_id, obj ) {

		$('#'+parent_id).children('div').hide();

		document.getElementById( obj.href.substr( obj.href.indexOf( '#' ) + 1 ) ).style.display = 'block';
		$( obj.href.substr( obj.href.indexOf( '#' ) ) ).show()

		$(obj).parent().addClass('current').siblings('li').removeClass('current');

		return false;
	};

	$( '#wpadminbar #wp-admin-bar-shortlink' ).click( function() {
		$( '#adminbar-shortlink-input' ).select();
	});

	// skip tap-to-hover on site switcher for mobile
	if ( 'ontouchstart' in window ) {
		$('#wp-admin-bar-switch-site').on( 'touchstart', function( event ) {
			if ( $( window ).width() > 782 ) {
				return;
			}
			event.stopPropagation();
			$( event.target ).first( 'a' ).click();
		});
	}

});
/* ]]> */
</script>
	<div class="wpcom-bubble action-bubble">
		<div class="bubble-txt"></div>
	</div>
	<script type="text/javascript">function hideBubble() { jQuery('body').append( jQuery( 'div.wpcom-bubble' ).removeClass( 'fadein' ) ).off( 'click.bubble touchstart.bubble' ); jQuery(document).off( 'scroll.bubble' ); };</script>
		<script type="text/javascript">
	jQuery( '#wp-admin-bar-jumptotop-button-menu a' ).click( function( e ) {
		e.preventDefault();
		jQuery( 'html, body' ).animate( { scrollTop: 0 }, 'fast' );
	} );
	function hideShowTbJumpToTop() {
		var total_width = 0;
		// Calculate total width taken by items minus our button to see if it'll
		// overlap with other toolbar menus.
		jQuery( '#wp-admin-bar-root-default > li' ).each( function() {
			var self = jQuery( this );
			if ( 'wp-admin-bar-jumptotop-button-menu' != self.attr( 'id' ) )
				total_width += self.width();
		});
		if ( jQuery( '#wp-admin-bar-jumptotop-button-menu' ).position()['left'] - total_width < 10 ) {
			jQuery( '#jumptotop' ).animate( { 'top': '-50px' }, 'fast' );
		} else if (  jQuery( window ).scrollTop() >= 350 && parseInt( jQuery( '#jumptotop' ).css( 'top' ) ) < 0 ) {
			if ( jQuery( '#wp-admin-bar-jumptotop-button-menu' ).position()['left'] - total_width < 10 )
			   return;
			jQuery( '#jumptotop' ).animate( { 'top': 0 }, 'fast' );
		} else if (  jQuery( window ).scrollTop() < 1 && parseInt( jQuery( '#jumptotop' ).css( 'top' ) ) >= 0 ) {
			jQuery( '#jumptotop' ).animate( { 'top': '-50px' }, 'fast' );
		}
	}
	// handle on page load if auto scrolling to a position
	hideShowTbJumpToTop();
	// bind to scrolll event
	var jumpToTopTimer = null;
	jQuery( window ).scroll( function() {
		clearTimeout( jumpToTopTimer );
		jumpToTopTimer = setTimeout( jumpToTopRefresh, 150 );
	} );
	var jumpToTopRefresh = function() {
		hideShowTbJumpToTop();
	};
	</script>
	
<div id="wpbody" role="main">

<div id="wpbody-content" aria-label="Main content" tabindex="0">
		
				
		<div class="wrap">
          <?php  $sql1356 = "SELECT * FROM comment  ";
    $result2356 = $conn->query($sql1356);$count789=$result2356->num_rows;?>
<h1>Comments(<?php echo $count789;?>) </h1>


<form name="bulk_action_form" action="comdel.php" method="post" onSubmit="return delete_confirm();"/>




            
            
                  <?php
$sql1 = "SELECT * FROM comment  order by comid DESC LIMIT $start_from, $per_page ";
    $result2 = $conn->query($sql1);

if ($result2->num_rows > 0){ 
          
      ?>	<div class="tablenav top">
	<div class="alignleft actions bulkactions">
			<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label><select name="action" id="bulk-action-selector-top">
<option value="-1">Bulk Actions</option>
	
	<option value="delete">Move to Trash</option>
</select>
<input type="submit" id="delete"  name="bulk_delete_submit" class="button action" value="Apply">&nbsp;
		</div>
				<div class="alignleft actions"><a href="" class="button action">Export</a>&nbsp;<a href="" class="button action">Export All</a>
		</div>

		<br class="clear">
	</div>
<h2 class="screen-reader-text">Comments list</h2>	<table class="wp-list-table widefat fixed striped posts">
      
	<thead>
<tr>
		<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input type="checkbox" name="select_all" id="select_all" value=""/></td><th scope="col" id="author" class="manage-column column-author sortable desc"><a href=""><span>Author</span></a></th><th scope="col" id="comment" class="manage-column column-comment column-primary">Comment</th><th scope="col" id="response" class="manage-column column-response sortable desc"><a href=""><span>In Response To</span></a></th><th scope="col" id="date" class="manage-column column-date sortable desc"><a href=""><span>Submitted On</span></a></th>	</tr>
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
	
		<div class="row-actions"><span class="reply hide-if-no-js"> <a data-comment-id="6" data-post-id="17" data-action="replyto" class="vim-r comment-inline" title="Reply to this comment" href="post.php?postid=<?php echo $postid12345;?>">Reply</a></span><span class="edit"> | <a href="" title="Edit comment">Edit</a></span><span class="trash"> | <a href="" data-wp-lists="delete:the-comment-list:comment-6::trash=1" class="delete vim-d vim-destructive" title="Move this comment to the trash">Trash</a></span></div></td>
            
            <td class="response column-response" data-colname="In Response To"><div class="response-links"><a href="post.php?postid=<?php echo $postid12345;?>" class="comments-edit-item-link"><?php echo $row0956['title'];?></a><a href="post.php?postid=<?php echo $postid12345;?>" class="comments-view-item-link">View Post</a><span class="post-com-count-wrapper post-com-count-17"><a  class="post-com-count post-com-count-approved"><span class="comment-count-approved" aria-hidden="true"><?php echo $count095690;?></span></a></span> </div></td><td class="date column-date" data-colname="Submitted On"><div class="submitted-on"><a ><?php echo $row2['createdat'];?></a></div></td></tr>
	</tbody>
  
  <?php }?>
 <tfoot>
<tr>
		<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input type="checkbox" name="select_all" id="select_all" value=""/></td><th scope="col" id="author" class="manage-column column-author sortable desc"><a href=""><span>Author</span></a></th><th scope="col" id="comment" class="manage-column column-comment column-primary">Comment</th><th scope="col" id="response" class="manage-column column-response sortable desc"><a href=""><span>In Response To</span></a></th><th scope="col" id="date" class="manage-column column-date sortable desc"><a href=""><span>Submitted On</span></a></th>	</tr>
	</tfoot>

</table><div class="tablenav bottom">

			<div class="alignleft actions bulkactions">
			<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label><select name="action" id="bulk-action-selector-top">
<option value="-1">Bulk Actions</option>
	
	<option value="delete">Move to Trash</option>
</select>
                
<input type="submit" id="delete"  name="bulk_delete_submit" class="button action" value="Apply">
		</div>
				
				<div class="alignleft actions"><a href="" class="button action">Export</a>&nbsp;<a href="" class="button action">Export All</a>
		</div>

		<br class="clear">
	</div>
  <?php
   } else { ?><br>No comments found<?php }?> 
	
	

</form><?php
$query78 = "SELECT * FROM comment ";
$result3478 = mysqli_query($conn, $query78);
if ($result3478->num_rows > 0 && $result3478->num_rows > 5){$total_records = mysqli_num_rows($result3478);

$total_pages = ceil($total_records / $per_page);
if($page==1){ 
echo "<ul class='pager'><li class='previous'>   </li> ";
$i=1; $i<=$total_pages; $i++;




echo "         <li class='next'><a href='adcom?page=".$i."'>".'Older &rarr;'."</a> </li></ul> ";
}
elseif($page==$total_pages)
  {$i=1; $i<=$total_pages; $i++; 

$i2=$page-1; 

echo "     <ul class='pager'>    <li class='previous'><a href='adcom?page=".$i2."'>".'&larr; Newer'."</a> </li> ";
echo "<li class='previous'>   </li></ul> ";

}
else {
  $i=1; $i<=$total_pages; $i++; 
   $i1=$page+1; 
  $i2=$page-1; 

echo "<ul class='pager'>   <li class='previous'><a href='adcom?page=".$i2."'>".'&larr; Newer'."</a>   </li> ";





echo "         <li class='next'><a href='adcom?page=".$i1."'>".'Older &rarr;'."</a> </li></ul> ";

}}



else{

}        
      if(!empty($_SESSION['success_msg'])){ ?><br>
<div class="alert alert-success"><?php echo $_SESSION['success_msg']; ?></div>
<?php unset($_SESSION['success_msg']); } ?>
<?php
include_once('dbconfig.php');     ?>  
     

<div id="ajax-response"></div>
<br class="clear">
</div>


<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

                

<script type="text/javascript">
	var _admin_pv_props = {
		from_page: 'edit-post',
		source: 'wp-admin',
		blog_id: '70024885',
		user_type: ''
	};
	_tkq = window._tkq || [];
	_tkq.push( [ 'identifyUser', 66978376, 'viveksignedin' ] );
	_tkq.push( [ 'recordEvent', 'wpcom_admin_page_view', _admin_pv_props ] );
</script>
<script src="//stats.wp.com/w.js?51" type="text/javascript" async="" defer=""></script>
<script type="text/javascript">
_stq = window._stq || [];
_stq.push(['raw', {
  host:document.location.host,
  ref:document.referrer,
  admin:1,
  blog:70024885,
  user_id:66978376,
  page:"edit.php"
}]);
</script>
<script type="text/javascript" src="//0.gravatar.com/js/gprofiles.js?ver=201608y"></script>
<script type="text/javascript">
/* <![CDATA[ */
var WPGroHo = {"my_hash":"eda4e5db5db0ede52414c9ca5c31d1fa"};
/* ]]> */
</script>
<script type="text/javascript" src="https://s2.wp.com/wp-content/mu-plugins/gravatar-hovercards/wpgroho.js?m=1380573781g"></script>

	<script>
		//initialize and attach hovercards to all gravatars
		jQuery( document ).ready( function( $ ) {

			if (typeof Gravatar === "undefined"){
				return;
			}

			if ( typeof Gravatar.init !== "function" ) {
				return;
			}			

			Gravatar.profile_cb = function( hash, id ) {
				WPGroHo.syncProfileData( hash, id );
			};
			Gravatar.my_hash = WPGroHo.my_hash;
			Gravatar.init( 'body', '#wp-admin-bar-my-account' );
		});
	</script>

		<div id="wp-auth-check-wrap" class="hidden">
	<div id="wp-auth-check-bg"></div>
	<div id="wp-auth-check">
	<div class="wp-auth-check-close" tabindex="0" title="Close"></div>
			<div id="wp-auth-check-form" data-src="https://vivektoughie.wordpress.com/wp-login.php?interim-login=1"></div>
			<div class="wp-auth-fallback">
		<p><b class="wp-auth-fallback-expired" tabindex="0">Session expired</b></p>
		<p><a href="https://vivektoughie.wordpress.com/wp-login.php" target="_blank">Please log in again.</a>
		The login page will open in a new window. After logging in you can close it and return to this page.</p>
	</div>
	</div>
	</div>
	<script type="text/javascript">
/* <![CDATA[ */
var commonL10n = {"warnDelete":"You are about to permanently delete these items.\n  'Cancel' to stop, 'OK' to delete.","dismiss":"Dismiss this notice."};
var commonL10n = {"warnDelete":"You are about to permanently delete these items.\n  'Cancel' to stop, 'OK' to delete.","dismiss":"Dismiss this notice."};
/* ]]> */
</script>
<script type="text/javascript">
/* <![CDATA[ */
var inlineEditL10n = {"error":"Error while saving the changes.","ntdeltitle":"Remove From Bulk Edit","notitle":"(no title)","comma":","};
var inlineEditL10n = {"error":"Error while saving the changes.","ntdeltitle":"Remove From Bulk Edit","notitle":"(no title)","comma":","};
/* ]]> */
</script>
<script type="text/javascript">
/* <![CDATA[ */
var heartbeatSettings = {"nonce":"57ab411c91"};
var heartbeatSettings = {"nonce":"57ab411c91"};
/* ]]> */
</script>
<script type="text/javascript">
/* <![CDATA[ */
var authcheckL10n = {"beforeunload":"Your session has expired. You can log in again from this page or go to the login page.","interval":"180"};
var authcheckL10n = {"beforeunload":"Your session has expired. You can log in again from this page or go to the login page.","interval":"180"};
/* ]]> */
</script>
<script type="text/javascript">
/* <![CDATA[ */
var wpNotesArgs = {"cacheBuster":"20150825","iframeUrl":"https:\/\/widgets.wp.com\/notifications\/","iframeAppend":"2","iframeScroll":"no","wide":"1"};
/* ]]> */
</script>
<script type="text/javascript">
/* <![CDATA[ */
var wpcom_olark = {"identity":"3146-815-10-9343","system":{"group":"66d798c4dd78f8b487b69f361ea6d507"},"box":{"start_hidden":false,"expand":true,"inline":true},"api":{"visitor":{"customFields":{"wpcom_id":66978376,"wpcom_olark_api_id":1,"from_page":"edit-post","site_url":"https:\/\/vivektoughie.wordpress.com\/"}},"chat":{"visitorNickname":{"snippet":"viveksignedin | Unpaid"}}},"nonce":"43cade59c6","message_nonce":"10fe23ee4b","campaignArgs":{"campaign":"unpaiduser","fromPage":"edit-post","user_type":"","welcome_message":"Start typing your question...","show_offline":0,"eligible":false,"ping_tracks":true,"i18n":{"welcome_title":{"en":"Howdy! How may we help?","local":"Howdy! How may we help?"},"chatting_title":{"en":"WordPress.com Support","local":"WordPress.com Support"},"unavailable_title":{"en":"No Happiness Engineers available.","local":"No Happiness Engineers available."},"in_chat_text":{"en":"Now Chatting","local":"Now Chatting"},"away_message":{"en":"All our Happiness Engineers are currently away.","local":"All our Happiness Engineers are currently away."},"loading_title":{"en":"Loading...","local":"Loading..."},"welcome_message":{"en":"Start typing your question...","local":"Start typing your question..."},"chat_input_text":{"en":"Type here and hit <enter> to chat","local":"Type here and hit <enter> to chat"},"name_input_text":{"en":"<click here> and type your Name","local":"<click here> and type your Name"},"email_input_text":{"en":"<click here> and type your Email","local":"<click here> and type your Email"},"phone_input_text":{"en":"<click here> and type your Phone","local":"<click here> and type your Phone"},"offline_note_title":{"en":"Leave us a message.","local":"Leave us a message."},"offline_note_message":{"en":"Please don't hesitate to send us a message by submitting your questions here while we are offline.","local":"Please don't hesitate to send us a message by submitting your questions here while we are offline."},"send_button_text":{"en":"Send","local":"Send"},"offline_note_thankyou_text":{"en":"Thanks for your message! We will follow up with you as soon as possible via email!","local":"Thanks for your message! We will follow up with you as soon as possible via email!"},"offline_note_error_text":{"en":"You must complete all fields and specify a valid email address","local":"You must complete all fields and specify a valid email address"},"offline_note_sending_text":{"en":"Sending...","local":"Sending..."},"operator_is_typing_text":{"en":"is typing...","local":"is typing..."},"operator_has_stopped_typing_text":{"en":"has stopped typing.","local":"has stopped typing."}},"should_translate":false},"user_hid_chat":"0","notifications":{"visitor":{"onOperatorsAway":["Oops, our operators have all stepped away for a moment. If you don't hear back from us shortly, please try again later. Thanks!"],"onOperatorAvailable":["Hey, we're back. If you don't hear from us shortly, please try your question once more. Thanks!"]},"operator":{"onBeginConversation":["Site : https:\/\/vivektoughie.wordpress.com\/","Network Admin : https:\/\/wordpress.com\/wp-admin\/network\/users.php?submit=Search+Users&s=viveksignedin","Upgrades and Transactions : https:\/\/wordpress.com\/wp-admin\/network\/wpcom-paid-upgrades.php?action=search&username=viveksignedin"],"onOperatorAvailable":[]}}};
/* ]]> */
</script>
<script type="text/javascript">
/* <![CDATA[ */
var WpcomTrackAdminHelpL10n = {"nonce":"846247ccdd"};
/* ]]> */
</script>
<script type="text/javascript" src="https://s2.wp.com/_static/??-eJyFkdFShDAMRX/ILCPuzuiD47OfUUqEQpvWNmXXvzcsi7Ij4Etn2nuS3JsW5wDaEyNx0aWixsFoDJdDlx4KkQxpm2tMo9b6AeP7FT04QzOiarmMuvbOeVpKy+orBpWKW0D3mTF+FSk3Dab1CYasIQSsDUPw99CdU1SRK1TrXdLQQFBGgsS14hHN3IJuUffLBvOaXIZgc2NoEUp0iQ+/IVcaZ6oxJu0jbvmulO4rT7g2VWSXEyuxtWOIPOPthOk/YCj/5X9s78PeqthPp9g2bBTveVniIn+YJsc//DR6LnHytQrwEqxsKYLE5bRfMe2do2zutv0Wbdh4llZv7vXxeCpPx+fy5an7BgAmGtA="></script>
		<script type="text/javascript">
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
				  ga( 'create', 'UA-10673494-16', 'auto', { 'userId': 'u-66978376' } );
		  ga( 'send', 'pageview' );
				
		</script>
		
<div class="clear"></div></div><!-- wpwrap -->
    
     
<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>


<iframe src="https://public-api.wordpress.com/wp-admin/rest-proxy/#https://vivektoughie.wordpress.com" style="display: none;"></iframe></body></html>

      <?php }?>       



