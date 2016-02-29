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
<title>Brand Posts</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel='stylesheet' id='all-css-0' href='https://s1.wp.com/_static/??-eJyNkd1uwyAMhV9oFK1rpe5i2rMA8VJnJkYY8vP2pVkbNWoa7Y6Dz/ls2boPynGboE3aZxUo19iKFo8EY4jcgEtLtXMib/pFLFtxEUNCLuqHibjf8p+5g6hstpagpNNIsGWvgRWxM1f8QihTeWznKLaOclWI5UNXRs5YYLJbtTSiU6n/Wh7mxzrI5pS2MB4qNEDgp6kfRCAzQvxfrtQe9fokk0N1CP3radDXJoKRAioXXKinFd/3+8eFIRBHiLdWQ3jyT9uer9JhBRwiFLcRgSS3+kS7Zr/91/vhuD8eTvvPj+YCzmzsjA==' type='text/css' media='all' />
<link rel='stylesheet' id='open-sans-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.4.1-alpha-36109' type='text/css' media='all' />
<link rel='stylesheet' id='all-css-2' href='https://s0.wp.com/wp-admin/css/wp-admin.min.css?m=1452548293g' type='text/css' media='all' />
<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='https://s0.wp.com/wp-admin/css/ie.min.css?m=1452548293g&#038;ver=4.4.1-alpha-36109' type='text/css' media='all' />
<![endif]-->
<link rel='stylesheet' id='all-css-6' href='https://s0.wp.com/_static/??/wp-includes/css/wp-auth-check.min.css,/wp-content/mu-plugins/admin-bar/wpcom-admin-bar.css,/i/noticons/noticons.css?m=1456436592j' type='text/css' media='all' />
<link rel='stylesheet' id='screen-css-7' href='https://s0.wp.com/wp-content/admin-plugins/after-the-deadline/atd.css?m=1395359987g' type='text/css' media='screen' />
<link rel='stylesheet' id='all-css-8' href='https://s2.wp.com/_static/??-eJx9kFFywyAMRC9UlSZ1M/3p5CyEKpgESQzISXv7YDx1k7rjH2BW+1ZC5prACSuymlMxBSM63f7cz66UJ3NnsZ8UGFIcfOBinBANHPQb1HqPeSEseBpmmNKuypSstmdv3bms+a85aGAPPcY0tip/pTXY5zqWcCtZp3CUTC2CkAewUf/BH/+KX0myguslOCyNfZTW2rNoZabAg81wWW72zi3R5vN0rtnmuFqvi4TfeJJDiDizrTAtbDSO+p4+Nt3brus2ry/vpxsdFMCG' type='text/css' media='all' />
<script type="text/javascript">
if (window.top !== window.self) {
    window.top.location.href = window.self.location.href; }
</script><script type='text/javascript'>
/* <![CDATA[ */
var userSettings = {"url":"\/","uid":"66978376","time":"1456739230","secure":"1"};
var userSettings = {"url":"\/","uid":"66978376","time":"1456739230","secure":"1"};
/* ]]> */
</script>
<script type='text/javascript' src='https://s0.wp.com/_static/??-eJyNjVEKAjEMRC9kt64W9ks8S62xZEmb2qQse3sr6IciKgSGgTd5dikGc6B2BrFzv2uDuj5imGVjvwEmYaxeYUiYn3DgrJDVpmYKtYhZrLSThIpFkXu7MBEv73h/XVg0gYiP8MncFEl+mCKwIQ7+bnop/298la5F7YtjOozOTeN2P7ndfANr229L'></script>
<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var geolocationI18N = {"current_location":"Current Location","locate":"Locate","locating":"Locating","use":"Use","search":"Search","clear":"Clear","error":"Location Not Found","address":"Address"};
/* ]]> */
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpUtilSettings = {"ajax":{"url":"\/wp-admin\/admin-ajax.php"}};
var _wpUtilSettings = {"ajax":{"url":"\/wp-admin\/admin-ajax.php"}};
/* ]]> */
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpMediaModelsL10n = {"settings":{"ajaxurl":"\/wp-admin\/admin-ajax.php","post":{"id":0}}};
var _wpMediaModelsL10n = {"settings":{"ajaxurl":"\/wp-admin\/admin-ajax.php","post":{"id":0}}};
/* ]]> */
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var pluploadL10n = {"queue_limit_exceeded":"You have attempted to queue too many files.","file_exceeds_size_limit":"%s exceeds the maximum upload size for this site.","zero_byte_file":"This file is empty. Please try another.","invalid_filetype":"This file type is not allowed. Please try another.","not_an_image":"This file is not an image. Please try another.","image_memory_exceeded":"Memory exceeded. Please try another smaller file.","image_dimensions_exceeded":"This is larger than the maximum size. Please try another.","default_error":"An error occurred in the upload. Please try again later.","missing_upload_url":"There was a configuration error. Please contact the server administrator.","upload_limit_exceeded":"You may only upload 1 file.","http_error":"HTTP error.","upload_failed":"Upload failed.","big_upload_failed":"Please try uploading this file with the %1$sbrowser uploader%2$s.","big_upload_queued":"%s exceeds the maximum upload size for the multi-file uploader when used in your browser.","io_error":"IO error.","security_error":"Security error.","file_cancelled":"File canceled.","upload_stopped":"Upload stopped.","dismiss":"Dismiss","crunching":"Crunching\u2026","deleted":"moved to the trash.","error_uploading":"\u201c%s\u201d has failed to upload."};
var pluploadL10n = {"queue_limit_exceeded":"You have attempted to queue too many files.","file_exceeds_size_limit":"%s exceeds the maximum upload size for this site.","zero_byte_file":"This file is empty. Please try another.","invalid_filetype":"This file type is not allowed. Please try another.","not_an_image":"This file is not an image. Please try another.","image_memory_exceeded":"Memory exceeded. Please try another smaller file.","image_dimensions_exceeded":"This is larger than the maximum size. Please try another.","default_error":"An error occurred in the upload. Please try again later.","missing_upload_url":"There was a configuration error. Please contact the server administrator.","upload_limit_exceeded":"You may only upload 1 file.","http_error":"HTTP error.","upload_failed":"Upload failed.","big_upload_failed":"Please try uploading this file with the %1$sbrowser uploader%2$s.","big_upload_queued":"%s exceeds the maximum upload size for the multi-file uploader when used in your browser.","io_error":"IO error.","security_error":"Security error.","file_cancelled":"File canceled.","upload_stopped":"Upload stopped.","dismiss":"Dismiss","crunching":"Crunching\u2026","deleted":"moved to the trash.","error_uploading":"\u201c%s\u201d has failed to upload."};
var _wpPluploadSettings = {"defaults":{"runtimes":"html5,flash,silverlight,html4","file_data_name":"async-upload","url":"\/wp-admin\/async-upload.php","flash_swf_url":"https:\/\/vivektoughie.wordpress.com\/wp-includes\/js\/plupload\/plupload.flash.swf","silverlight_xap_url":"https:\/\/vivektoughie.wordpress.com\/wp-includes\/js\/plupload\/plupload.silverlight.xap","filters":[{"title":"Allowed Files","extensions":"jpg,jpeg,png,gif,pdf,doc,ppt,odt,pptx,docx,pps,ppsx,xls,xlsx,key"}],"multipart_params":{"action":"upload-attachment","_wpnonce":"71fe1d0492"}},"browser":{"mobile":false,"supported":true},"limitExceeded":false};
/* ]]> */
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var mejsL10n = {"language":"en","strings":{"Close":"Close","Fullscreen":"Fullscreen","Download File":"Download File","Download Video":"Download Video","Play\/Pause":"Play\/Pause","Mute Toggle":"Mute Toggle","None":"None","Turn off Fullscreen":"Turn off Fullscreen","Go Fullscreen":"Go Fullscreen","Unmute":"Unmute","Mute":"Mute","Captions\/Subtitles":"Captions\/Subtitles"}};
var _wpmejsSettings = {"pluginPath":"\/wp-includes\/js\/mediaelement\/"};
var mejsL10n = {"language":"en","strings":{"Close":"Close","Fullscreen":"Fullscreen","Download File":"Download File","Download Video":"Download Video","Play\/Pause":"Play\/Pause","Mute Toggle":"Mute Toggle","None":"None","Turn off Fullscreen":"Turn off Fullscreen","Go Fullscreen":"Go Fullscreen","Unmute":"Unmute","Mute":"Mute","Captions\/Subtitles":"Captions\/Subtitles"}};
var _wpmejsSettings = {"pluginPath":"\/wp-includes\/js\/mediaelement\/"};
/* ]]> */
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpMediaViewsL10n = {"url":"URL","addMedia":"Add Media","search":"Search","select":"Select","cancel":"Cancel","update":"Update","replace":"Replace","remove":"Remove","back":"Back","selected":"%d selected","dragInfo":"Drag and drop to reorder media files.","uploadFilesTitle":"Upload Files","uploadImagesTitle":"Upload Images","mediaLibraryTitle":"Media Library","insertMediaTitle":"Insert Media","createNewGallery":"Create a new gallery","createNewPlaylist":"Create a new playlist","createNewVideoPlaylist":"Create a new video playlist","returnToLibrary":"\u2190 Return to library","allMediaItems":"All media items","allDates":"All dates","noItemsFound":"No items found.","insertIntoPost":"Insert into post","unattached":"Unattached","trash":"Trash","uploadedToThisPost":"Uploaded to this post","warnDelete":"You are about to permanently delete this item.\n  'Cancel' to stop, 'OK' to delete.","warnBulkDelete":"You are about to permanently delete these items.\n  'Cancel' to stop, 'OK' to delete.","warnBulkTrash":"You are about to trash these items.\n  'Cancel' to stop, 'OK' to delete.","bulkSelect":"Bulk Select","cancelSelection":"Cancel Selection","trashSelected":"Trash Selected","untrashSelected":"Untrash Selected","deleteSelected":"Delete Selected","deletePermanently":"Delete Permanently","apply":"Apply","filterByDate":"Filter by date","filterByType":"Filter by type","searchMediaLabel":"Search Media","noMedia":"No media attachments found.","attachmentDetails":"Attachment Details","insertFromUrlTitle":"Insert from URL","setFeaturedImageTitle":"Featured Image","setFeaturedImage":"Set featured image","createGalleryTitle":"Create Gallery","editGalleryTitle":"Edit Gallery","cancelGalleryTitle":"\u2190 Cancel Gallery","insertGallery":"Insert gallery","updateGallery":"Update gallery","addToGallery":"Add to gallery","addToGalleryTitle":"Add to Gallery","reverseOrder":"Reverse order","imageDetailsTitle":"Image Details","imageReplaceTitle":"Replace Image","imageDetailsCancel":"Cancel Edit","editImage":"Edit Image","chooseImage":"Choose Image","selectAndCrop":"Select and Crop","skipCropping":"Skip Cropping","cropImage":"Crop Image","cropYourImage":"Crop your image","cropping":"Cropping\u2026","suggestedDimensions":"Suggested image dimensions:","cropError":"There has been an error cropping your image.","audioDetailsTitle":"Audio Details","audioReplaceTitle":"Replace Audio","audioAddSourceTitle":"Add Audio Source","audioDetailsCancel":"Cancel Edit","videoDetailsTitle":"Video Details","videoReplaceTitle":"Replace Video","videoAddSourceTitle":"Add Video Source","videoDetailsCancel":"Cancel Edit","videoSelectPosterImageTitle":"Select Poster Image","videoAddTrackTitle":"Add Subtitles","playlistDragInfo":"Drag and drop to reorder tracks.","createPlaylistTitle":"Create Audio Playlist","editPlaylistTitle":"Edit Audio Playlist","cancelPlaylistTitle":"\u2190 Cancel Audio Playlist","insertPlaylist":"Insert audio playlist","updatePlaylist":"Update audio playlist","addToPlaylist":"Add to audio playlist","addToPlaylistTitle":"Add to Audio Playlist","videoPlaylistDragInfo":"Drag and drop to reorder videos.","createVideoPlaylistTitle":"Create Video Playlist","editVideoPlaylistTitle":"Edit Video Playlist","cancelVideoPlaylistTitle":"\u2190 Cancel Video Playlist","insertVideoPlaylist":"Insert video playlist","updateVideoPlaylist":"Update video playlist","addToVideoPlaylist":"Add to video playlist","addToVideoPlaylistTitle":"Add to Video Playlist","settings":{"tabs":[],"tabUrl":"https:\/\/vivektoughie.wordpress.com\/wp-admin\/media-upload.php?chromeless=1","mimeTypes":{"image":"Images","audio":"Audio","video":"Video"},"captions":true,"nonce":{"sendToEditor":"5f94ce7e18"},"post":{"id":18,"nonce":"11bfd1e8ca","featuredImageId":-1},"defaultProps":{"link":"file","align":"","size":""},"attachmentCounts":{"audio":0,"video":0},"embedExts":["mp3","ogg","wma","m4a","wav","mp4","m4v","webm","ogv","wmv","flv"],"embedMimes":[],"contentWidth":474,"months":[{"year":"2014","month":"6","text":"June 2014"}],"mediaTrash":0}};
/* ]]> */
</script>
<script type='text/javascript' src='https://s2.wp.com/_static/??-eJyNUkuOwyAMvVAJatpK00U1ZyHgiZwaOwO4UW9fVGmqzoKkEgs/3gfLxi6z8cIFuNioZiYdkbMdQQyJdwWF/wHjQkTupryz1YnsSQNkO9Xzq5DuVtF6SdBtqhYMI5RtXRTNH8RlScUN1FQqB0h5rbXB+esg3OQr1IK0Qm8lRAjoTJQAlFuauoGZxIVX0f0oNR+dsnC/GVXvX2lrrQFBfH6EN2Ach+p2d0gfeSv3jttjuCEsf1P4jpf98dSfjl/9+TA9AKyO850='></script>
<script type='text/javascript' src='https://www.google.com/jsapi?ver=4.4.1-alpha-36109'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var mexp = {"_nonce":"a668726efb","labels":{"insert":"Insert into post","loadmore":"Load more"},"base_url":"https:\/\/s2.wp.com\/wp-content\/plugins\/media-explorer","admin_url":"https:\/\/vivektoughie.wordpress.com\/wp-admin","services":{"twitter":{"id":"twitter","labels":{"title":"Insert Tweet","insert":"Insert Tweet","noresults":"No tweets matched your search query","gmaps_url":"https:\/\/maps.google.com\/maps\/api\/js","loadmore":"Load more tweets"},"tabs":{"all":{"text":"All","defaultTab":true},"hashtag":{"text":"With Hashtag"},"by_user":{"text":"By User"},"to_user":{"text":"To User"},"location":{"text":"By Location"}}},"youtube":{"id":"youtube","labels":{"title":"Insert YouTube","insert":"Insert","noresults":"No videos matched your search query."},"tabs":{"all":{"text":"All","defaultTab":true},"by_user":{"text":"By User"}}}}};
/* ]]> */
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var AtD_l10n_r0ar = {"menu_title_spelling":"Spelling","menu_title_repeated_word":"Repeated Word","menu_title_no_suggestions":"No suggestions","menu_option_explain":"Explain...","menu_option_ignore_once":"Ignore suggestion","menu_option_ignore_always":"Ignore always","menu_option_ignore_all":"Ignore all","menu_option_edit_selection":"Edit Selection...","button_proofread":"proofread","button_edit_text":"edit text","button_proofread_tooltip":"Proofread Writing","message_no_errors_found":"No writing errors were found.","message_server_error":"There was a problem communicating with the Proofreading service. Try again in one minute.","message_server_error_short":"There was an error communicating with the proofreading service.","dialog_replace_selection":"Replace selection with:","dialog_confirm_post_publish":"The proofreader has suggestions for this post. Are you sure you want to publish it?\n\nPress OK to publish your post, or Cancel to view the suggestions and edit your post.","dialog_confirm_post_update":"The proofreader has suggestions for this post. Are you sure you want to update it?\n\nPress OK to update your post, or Cancel to view the suggestions and edit your post."};
/* ]]> */
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var quicktagsL10n = {"closeAllOpenTags":"Close all open tags","closeTags":"close tags","enterURL":"Enter the URL","enterImageURL":"Enter the URL of the image","enterImageDescription":"Enter a description of the image","textdirection":"text direction","toggleTextdirection":"Toggle Editor Text Direction","dfw":"Distraction-free writing mode","strong":"Bold","strongClose":"Close bold tag","em":"Italic","emClose":"Close italic tag","link":"Insert link","blockquote":"Blockquote","blockquoteClose":"Close blockquote tag","del":"Deleted text (strikethrough)","delClose":"Close deleted text tag","ins":"Inserted text","insClose":"Close inserted text tag","image":"Insert image","ul":"Bulleted list","ulClose":"Close bulleted list tag","ol":"Numbered list","olClose":"Close numbered list tag","li":"List item","liClose":"Close list item tag","code":"Code","codeClose":"Close code tag","more":"Insert Read More tag"};
var quicktagsL10n = {"closeAllOpenTags":"Close all open tags","closeTags":"close tags","enterURL":"Enter the URL","enterImageURL":"Enter the URL of the image","enterImageDescription":"Enter a description of the image","textdirection":"text direction","toggleTextdirection":"Toggle Editor Text Direction","dfw":"Distraction-free writing mode","strong":"Bold","strongClose":"Close bold tag","em":"Italic","emClose":"Close italic tag","link":"Insert link","blockquote":"Blockquote","blockquoteClose":"Close blockquote tag","del":"Deleted text (strikethrough)","delClose":"Close deleted text tag","ins":"Inserted text","insClose":"Close inserted text tag","image":"Insert image","ul":"Bulleted list","ulClose":"Close bulleted list tag","ol":"Numbered list","olClose":"Close numbered list tag","li":"List item","liClose":"Close list item tag","code":"Code","codeClose":"Close code tag","more":"Insert Read More tag"};
/* ]]> */
</script>
<script type='text/javascript' src='https://s1.wp.com/_static/??-eJydkNFuwjAMRX+INEJl29PEt0SJKQ6pE2KnZX+PQe0emMQEr7bPsa/tXIzPJEBiS2oDEtsRAjoDl5JyhWrjrXIpXeSN/X+aoU7oga3MKHLHH0kXRiSz8hMGyKUCs3XMILz0795HdGy/3OBSgvpjFBGk4W/h+Vp30OOMHMEEcCEhgXUSOq8hVhDJpxY0in7g3NCfxKlVJe+YDWWakI2mklyX4ZdF8dw0Yne7NPJ+/N7uPj77Xb/96uMVMXGruQ=='></script>
<script type='text/javascript' src='https://vivektoughie.wordpress.com/wp-admin/admin-ajax.php?m=1452548293g&#038;action=atd_settings&#038;ver=20150715'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var video = {"promo":"<style>\n\t\t\t\t\t\t\t\ta.video_button { width: 220px; color: #FFFFFF; text-align: center; font-weight: bold; cursor: pointer; font-size: 12px !important; line-height: 13px; padding: 6px 23px 5px; margin: 13px 0 23px 0; display: block; text-decoration: none; text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3); background: #21759B; -moz-border-radius:15px; border-radius:15px; -webkit-border-radius:15px; }\n\t\t\t\t\t\t\t\t.video_promo_container { margin-bottom: 17px; }\n\t\t\t\t\t\t\t\t.video_promo_body { padding: 23px 23px 0; color: #393D39; }\n\t\t\t\t\t\t\t\t.video_promo_body strong { color: #436677; margin-bottom: 6px; display: block; }\n\t\t\t\t\t\t\t\t.video_promo_body_light { font-size: 12px; color: #999; }\n\t\t\t\t\t\t\t<\/style>\n\t\t\t\t\t\t\t<div class=\"video_promo_container\" style=\"display: none;\">\n\t\t\t\t\t\t\t\t<div class=\"video_promo_body\">\n\t\t\t\t\t\t\t\t\t<strong>Upload videos directly to your blog<\/strong>\n\t\t\t\t\t\t\t\t\t<div>With the <a href=\"http:\/\/en.support.wordpress.com\/videopress\/\" target=\"_blank\">VideoPress upgrade<\/a> you can upload HD quality videos straight to your blog.  You'll also have fine-grained privacy control over who can see your videos.<\/div>\n\t\t\t\t\t\t\t\t\t<a class=\"video_button\" href=\"https:\/\/vivektoughie.wordpress.com\/wp-admin\/paid-upgrades.php?product=15&view=purchase&source=post-promos-videopress\" target=\"_blank\"><span>Get started with VideoPress<\/span><\/a>\n\t\t\t\t\t\t\t\t\t<div class=\"video_promo_body_light\">If you just want to embed videos from other sites such as YouTube, click the \"From URL\" tab above.<\/div>\n\t\t\t\t\t\t\t\t\t<div style=\"clear: both;\"><\/div>\n\t\t\t\t\t\t\t\t<\/div>\n\t\t\t\t\t\t\t<\/div>"};
/* ]]> */
</script>
<script type='text/javascript' src='https://s0.wp.com/_static/??-eJx9T1kOwiAQvZCUdNHED+NZKEwRLIsw2PT2UrXGWtOvmbx529DBE+4sgkXKhFGW+D5JZSNlHUIgeAEigIleWaAMBWEJnQ/OdSGjhY47mh2U5X0SEKmONHpl/+H6liCM71F8s+b8SQw9cKzmWZg1a9mSO2OSVTgSZFJCWAHbcu8ikvyOcYv9V2TSRzEoIQEjhXs+tEEhTL1fKHmabycOPpt1AKJl/JqpZ3Mqm2Z/KI91XekHj3qVGQ=='></script>

<script type="text/javascript">
jQuery( function($) {
	$('#publicize-disconnected-form-show').click( function() {
		$('#publicize-form').slideDown( 'fast' );
		$(this).hide();
	} );

	$('#publicize-disconnected-form-hide').click( function() {
		$('#publicize-form').slideUp( 'fast' );
		$('#publicize-disconnected-form-show').show();
	} );

	if ( ! $('#wpas-title' ).length ) {
		return;
	}

	var wpasTitleCounter    = $( '#wpas-title-counter' ),
	    wpasTwitterCheckbox = $( '.wpas-submit-twitter' ).size(),
		postTitle = $( '#title' ),
	    wpasTitle = $('#wpas-title').keyup( function() {
		        var length = wpasTitle.val().length;
		    if ( ! length ) {
			    var postTitleVal = postTitle.val(),
				    length = postTitleVal.length;
			    wpasTitle.attr( 'placeholder', postTitleVal );
			    wpasTitleCounter.text( length ).trigger( 'change' );
		    } else {
			    wpasTitleCounter.text( length ).trigger( 'change' );
		    }
	    } ),
	    authClick = false;

	// set the initial placeholder and lengths
	var initial_postTitle = postTitle.val(),
		initial_wpasTitle = wpasTitle.val();
	wpasTitle.attr( 'placeholder', initial_postTitle );
	if ( initial_wpasTitle ) {
		wpasTitleCounter.text( initial_wpasTitle.length ).trigger( 'change' );
	} else if ( initial_postTitle.length ) {
		wpasTitleCounter.text( initial_postTitle.length ).trigger( 'change' );
	}

	wpasTitleCounter.on( 'change', function(e) {
		if ( wpasTwitterCheckbox && parseInt( $( e.currentTarget ).text(), 10 ) > 140 ) {
			wpasTitleCounter.addClass( 'wpas-twitter-length-limit' );
		} else {
			wpasTitleCounter.removeClass( 'wpas-twitter-length-limit' );
		}
	} );

	$('.publicize-abtest-publishbox #publicize-form-edit').click( function() {
		$('#publicize-form').toggle( 'fast' );
		$('#publicize-defaults').hide();
		return false;
	} );

	$( '.publicize-abtest-separate #publicize-form-edit').click( function() {
		$('#publicize-form').toggle( 'fast', function() {
		});
	});

	$( '#title' ).keyup( function( e ) {
		var title = e.currentTarget.value,
			$publicizeMessage = $( '#wpas-title' );
		$publicizeMessage.attr( 'placeholder', title );
		if ( ! $publicizeMessage.val().length ) {
			wpasTitleCounter.text( title.length ).trigger( 'change' );
		}
	});

	$('#publicize-form-hide').click( function() {
		var newList = $.map( $('#publicize-form').slideUp( 'fast' ).find( ':checked' ), function( el ) {
			return $.trim( $(el).parent( 'label' ).text() );
		} );
		$('#publicize-defaults').html( '<strong>' + newList.join( '</strong>, <strong>' ) + '</strong>' ).show();
		$('#publicize-form-edit').show();
		return false;
	} );

	$('.authorize-link').click( function() {
		if ( authClick ) {
			return false;
		}
		authClick = true;
		$(this).after( '<img src="images/loading.gif" class="alignleft" style="margin: 0 .5em" />' );
		$.ajaxSetup( { async: false } );
		autosave();
		return true;
	} );

	$( '.pub-service' ).click( function() {
		var service = $(this).data( 'service' ),
		    fakebox = '<input id="wpas-submit-' + service + '" type="hidden" value="1" name="wpas[submit][' + service + ']" />';
		$( '#add-publicize-check' ).append( fakebox );
	} );

	publicizeConnTestStart = function() {
		$( '#pub-connection-tests' )
			.removeClass( 'below-h2' )
			.removeClass( 'error' )
			.removeClass( 'publicize-token-refresh-message' )
			.addClass( 'test-in-progress' )
			.html( '' );
		$.post( ajaxurl, { action: 'test_publicize_conns' }, publicizeConnTestComplete );
	}

	publicizeConnRefreshClick = function( event ) {
		event.preventDefault();
		var popupURL = event.currentTarget.href;
		var popupTitle = event.currentTarget.title;
		// open a popup window
		// when it is closed, kick off the tests again
		var popupWin = window.open( popupURL, popupTitle, '' );
		var popupWinTimer= window.setInterval( function() {
			if ( popupWin.closed !== false ) {
				window.clearInterval( popupWinTimer );
				publicizeConnTestStart();
			}
		}, 500 );
	}

	publicizeConnTestComplete = function( response ) {
		var testsSelector = $( '#pub-connection-tests' );
		testsSelector
			.removeClass( 'test-in-progress' )
			.removeClass( 'below-h2' )
			.removeClass( 'error' )
			.removeClass( 'publicize-token-refresh-message' )
			.html( '' );

		// If any of the tests failed, show some stuff
		var somethingShownAlready = false;
		$.each( response.data, function( index, testResult ) {
			// find the li for this connection
			if ( ! testResult.connectionTestPassed ) {
				if ( ! somethingShownAlready ) {
					testsSelector
						.addClass( 'below-h2' )
						.addClass( 'error' )
						.addClass( 'publicize-token-refresh-message' )
						.append( "<p>Before you hit Publish, please refresh the following connection(s) to make sure we can Publicize your post:</p>" );
					somethingShownAlready = true;
				}

				if ( testResult.userCanRefresh ) {
					testsSelector.append( '<p/>' );
					$( '<a/>', {
						'class'  : 'pub-refresh-button button',
						'title'  : testResult.refreshText,
						'href'   : testResult.refreshURL,
						'text'   : testResult.refreshText,
						'target' : '_refresh_' + testResult.serviceName
					} )
						.appendTo( testsSelector.children().last() )
						.click( publicizeConnRefreshClick );
				}
			}
		} );
	}

	$( document ).ready( function() {
		// If we have the #pub-connection-tests div present, kick off the connection test
		if ( $( '#pub-connection-tests' ).length ) {
			publicizeConnTestStart();
		}
	} );

} );
</script>

<style type="text/css">
#publicize {
	line-height: 1.5;
}
#publicize ul {
	margin: 4px 0 4px 6px;
}
#publicize li {
	margin: 0;
}
#publicize textarea {
	margin: 4px 0 0;
	width: 100%
}
#publicize ul.not-connected {
	list-style: square;
	padding-left: 1em;
}
.post-new-php .authorize-link, .post-php .authorize-link {
	line-height: 1.5em;
}
.post-new-php .authorize-message, .post-php .authorize-message {
	margin-bottom: 0;
}
#poststuff #publicize .updated p {
	margin: .5em 0;
}
.wpas-twitter-length-limit {
	color: red;
}

.publicize-abtest-separate .available-services {
	margin-bottom: 0;
}

.publicize-abtest-separate a.connect-link {
	color: #555;
	text-decoration: none;
}

.publicize-abtest-separate a.connect-link-published {
	color: #ccc;
	text-decoration: none;
}

.publicize-abtest-separate .wpas-title-counter {
	color: #ccc;
}

.publicize-abtest-separate .noticon {
	margin-right: .5em;
}

.publicize-abtest-separate .connect-link-published .noticon {
	font-size: 110%;
	margin-right: .15em;
	vertical-align: bottom;
}

.publicize-abtest-separate #publicize-form .noticon {
	font-size: 100%; 
	margin-right: 0;
	vertical-align: bottom;
}

.publicize-abtest-separate .button-secondary {
	top: 10px;
	position: absolute;
	right: 20px;
}

.publicize-abtest-separate textarea {
	width: 100%;
}

.publicize-abtest-separate .publicize-connect-more {
	vertical-align: super;
}

.publicize-abtest-separate .publicize-meta-box-footer {
	color: #ccc;
	font-size: 80%;
	margin-bottom: 0;
}

.publicize-abtest-separate #publicize-form ul {
	margin-left: 1.5em;
}

</style><link rel="shortcut icon" type="image/x-icon" href="https://s2.wp.com/i/favicon.ico" sizes="16x16 24x24 32x32 48x48" />
<link rel="icon" type="image/x-icon" href="https://s2.wp.com/i/favicon.ico" sizes="16x16 24x24 32x32 48x48" />
<link rel="apple-touch-icon-precomposed" href="https://s0.wp.com/i/webclip.png" />
<meta name="application-name" content="vivek toughie" /><meta name="msapplication-window" content="width=device-width;height=device-height" /><meta name="msapplication-tooltip" content="Smile! " /><meta name="msapplication-task" content="name=Write a post;action-uri=https://vivektoughie.wordpress.com/wp-admin/post-new.php;icon-uri=https://s2.wp.com/i/icons/post.ico" /><meta name="msapplication-task" content="name=Moderate comments;action-uri=https://vivektoughie.wordpress.com/wp-admin/edit-comments.php?comment_status=moderated;icon-uri=https://s0.wp.com/i/icons/comment.ico" /><meta name="msapplication-task" content="name=Upload new media;action-uri=https://vivektoughie.wordpress.com/wp-admin/media-new.php;icon-uri=https://s2.wp.com/i/icons/media.ico" /><meta name="msapplication-task" content="name=Blog stats;action-uri=https://vivektoughie.wordpress.com/wp-admin/index.php?page=stats;icon-uri=https://s1.wp.com/i/icons/stats.ico" />	<link id="wp-admin-canonical" rel="canonical" href="https://vivektoughie.wordpress.com/wp-admin/post-new.php" />
	<script>
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, document.getElementById( 'wp-admin-canonical' ).href + window.location.hash );
		}
	</script>
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
		background:url('/wp-content/admin-plugins/post-flair/polldaddy/img/pd-wp-icon-gray-lrg@2x.png') no-repeat 0 9px;
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
<body class="wp-admin wp-core-ui no-js  mp6  admin-color-mp6 legacy-color-fresh post-new-php auto-fold admin-bar post-type-post branch-4-4 version-4-4-1 admin-color-fresh locale-en multisite no-customize-support no-svg">
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
           
<h1>Add New Post</h1>

<form name="post" action="post.php" method="post" id="post" autocomplete="off">


<div id="poststuff">
<div id="post-body" class="metabox-holder columns-2">
<div id="post-body-content" style="position: relative;">

<div id="titlediv">
<div id="titlewrap">
		<label class="" id="title-prompt-text" for="title">Enter title here</label>
	<input type="text" name="title" size="30" value="" id="title" spellcheck="true" autocomplete="off">
</div>

</div><!-- /titlediv -->
    <textarea style="height: 320px; margin-top: 37px; width:100%" autocomplete="off" cols="40" name="body"  ></textarea>









<div id="categorydiv" class="postbox ">
<button type="button" class="handlediv button-link" aria-expanded="true"></button><h2 class="hndle ui-sortable-handle"><span>Categories</span></h2>
<div class="inside">
	<div id="taxonomy-category" class="categorydiv">
		<ul id="category-tabs" class="category-tabs">
			<li class="tabs"><a href="#category-all">All Categories</a></li>
			
		</ul>

		<div id="category-pop" class="tabs-panel" style="display: none;">
			<ul id="categorychecklist-pop" class="categorychecklist form-no-clear">
							</ul>
		</div>

		<div id="category-all" class="tabs-panel" style="display: block;">
			<input type="hidden" name="post_category[]" value="0">			<ul id="categorychecklist" data-wp-lists="list:category" class="categorychecklist form-no-clear">
				
<li id="category-1"><label class="selectit"><input value="1" type="checkbox" name="post_category[]" id="in-category-1"> Uncategorized</label></li>
			</ul>
		</div>
			<div  class="wp-hidden-children">
				<a id="category-add-toggle" href="#category-add" class="hide-if-no-js taxonomy-add-new">
					+ Add New Category				</a>
				<p id="category-add" class="category-add wp-hidden-child">
					<label class="screen-reader-text" for="newcategory">Add New Category</label>
					<input type="text" name="newcategory" id="newcategory" class="form-required form-input-tip" value="New Category Name" aria-required="true">
					<label class="screen-reader-text" for="newcategory_parent">
						Parent Category:					</label>
					<select name="newcategory_parent" id="newcategory_parent" class="postform">
	<option value="-1">— Parent Category —</option>
	<option class="level-0" value="10188">q</option>
	<option class="level-1" value="7361">&nbsp;&nbsp;&nbsp;qq</option>
	<option class="level-2" value="23255">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ddd</option>
	<option class="level-0" value="1">Uncategorized</option>
</select>
					<input type="button" id="category-add-submit" data-wp-lists="add:categorychecklist:category-add" class="button category-add-submit" value="Add New Category">
					<input type="hidden" id="_ajax_nonce-add-category" name="_ajax_nonce-add-category" value="d4e69b43e0">					<span id="category-ajax-response"></span>
				</p>
			</div>
			</div>
	</div>
</div>   
<script type="text/javascript">
try{document.post.title.focus();}catch(e){}
</script>
    
    <div  class="wp-media-buttons"> <input type="file" name='image' id="files" class="hidden"/><button type="button"  class="button  add_media" >
<label for="files"><span class="wp-media-buttons-icon"></span>Add Media</label></button>






</div>

<div id="publishing-action">

		<input type="submit" name="publish" id="publish" class="button button-primary button-large" value="Publish"></div>

    </div></div></div></form></div></div></div></div></div></body></html>



      <?php }?>       