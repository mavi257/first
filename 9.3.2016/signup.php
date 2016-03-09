
<?php
session_start();
$conn=mysqli_connect("localhost","root","","new");

if(isset($_SESSION['userid'])!="")
{

 header("Location: index");
}








if(isset($_POST['insert']))
{
  $email = mysqli_real_escape_string($conn, $_POST['email']);
 $username = mysqli_real_escape_string($conn, $_POST['username']);
 $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
 $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
 $password = md5(mysqli_real_escape_string($conn,$_POST['password']));
 $cpassword = md5(mysqli_real_escape_string($conn,$_POST['cpassword']));

if($password===$cpassword)
{

$sql = "INSERT INTO user (email,username,firstname, lastname,password,created) VALUES('$email','$username','$firstname','$lastname','$password',now())";
      if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('successfully registered')
    window.location.href='login.php?';
    </SCRIPT>");}

 else {
    
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('connection error')
    window.location.href='signup.php';
    </SCRIPT>");}
}
 else
 {
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('your password doesnt match')
    window.location.href='signup.php';
    </SCRIPT>");}
}
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar" lang="en"><!--<![endif]--><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Brand Posts</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">

	

<link rel="stylesheet" id="all-css-6" href="css/style.css" type="text/css" media="all">
        
    
<link rel="stylesheet" id="all-css-6" href="css/bootstrap.css" type="text/css" media="all">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  

  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>

    <script type="text/javascript">
$(document).ready(function() {


$('#defaultForm').bootstrapValidator({

message: 'This value is not valid',
         feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
fields: {
firstname: {
message: 'The firstname is not valid',
validators: {
notEmpty: {
message: 'Required'
},
stringLength: {
min: 2,
max: 15,
message: 'Firstname should be 2-15 length'
},
regexp: {
regexp: /^[a-z]*$/i,
message: 'The username can only consist of alphabets'
}

}
},
lastname: {
message: 'The lastname is not valid',
validators: {
notEmpty: {
message: 'Required'
},
stringLength: {
min: 2,
max: 15,
message: 'Lastname should be 2-15 length'
},
regexp: {
regexp: /^[a-z]*$/i,
message: 'The lastname can only consist of alphabets'
}

}
},
username: {
message: 'The username is not valid',
validators: {
notEmpty: {
message: 'Required'
},
stringLength: {
min: 2,
max: 15,
message: 'Username should be 2-15 length'
},
regexp: {
regexp: /^\w+$/,
message: 'The username can only consist of alphabetical, number'
},
different: {
field: 'password',
message: 'The username and password can\'t be the same as each other'
}
}
},
email: {
validators: {
notEmpty: {
message: 'Required'
},
regexp: {
regexp: /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|in|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i,
message: 'Input is not a valid email address'
}

}
},
password: {
validators: {
notEmpty: {
message: 'Required'
},
stringLength: {
min: 6,
max:15,
message: 'Password should be 6-15 length '
},
    
regexp: {
regexp:  /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/,
message: 'The password must contain at least one number,one lowercase letter,one uppercase letter'
},
different: {
field: 'username',
message: 'The password can\'t be the same as username'
}
}
},
cpassword: {
validators: {
notEmpty: {
message: 'Required'
},


identical: {
field: 'password',
message: 'Passwords Do Not Match!'
},
different: {
field: 'username',
message: 'The password can\'t be the same as username'
}
}
},

}
});
});  
        </script>

</head>
<body class="wp-admin wp-core-ui js  mp6  admin-color-mp6 legacy-color-fresh edit-php auto-fold admin-bar post-type-post branch-4-4 version-4-4-1 admin-color-fresh locale-en multisite  customize-support svg">

	
<div id="wpwrap">


<div id="wpcontent">


			<div id="wpadminbar" class="ltr">
						<div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="Toolbar" tabindex="0">
			
<div id="wpadminbar" class="ltr">
            <div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="Toolbar" tabindex="0">
          <ul id="wp-admin-bar-root-default" class="ab-top-menu">
      
    <li id="wp-admin-bar-blog" class="menupop my-sites"><a class="ab-item" aria-haspopup="true" href="index">Brand</a>       </li>

   

     </ul>  <ul id="wp-admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">
      
 
   
                <li id="wp-admin-bar-my-account" class="menupop with-avatar no-grav"><a  href="login" class="btn btn-sm btn-primary" >Have an account? Log&nbsp;in</a>         </li>
 </ul>

        </div>
             
          </div>
		
	
			
			
				</div>
					
					</div>
<div class="clear"></div>
    
    </div>

	
<div class="clear"></div></div><!-- wpcontent -->



		
				
		
      <div class="wrapper"><?PHP
	if(!empty($_SESSION['success_msg'])){ ?><br>
<div class="alert alert-danger" style="
    position: absolute;   left: 495px;
    right: 495px;
    top: 48px;

">
  
    
  <?php echo $_SESSION['success_msg']; ?></div>
<?php unset($_SESSION['success_msg']); } ?>
<?php
include_once('dbconfig.php');     ?>
          <div style="
    position: absolute;
    right: 0px;
    width: 950px;">
<div style="     color: #141823;
    font-family: 'Freight Sans Bold', 'lucida grande',tahoma,verdana,arial,sans-serif;
    font-size: 40px;
    font-weight: normal;
    white-space: nowrap;">Sign Up</div>

<div style="color: #4e5665;
    font-family: 'Freight Sans', 'lucida grande',tahoma,verdana,arial,sans-serif;
    font-size: 22px;
    font-weight: normal;
    line-height: 28px;"
>It's free and always will be.</div><br>
        
   

      <form class="form-horizontal" method="post" action="" id="defaultForm" method="post" >
<div class="form-group">
      
        <div class="col-xs-3">
            <input type="text" class="form-control" name="firstname" placeholder="First name"/>
               
        </div>

        <div class="col-xs-3">
            <input type="text" class="form-control" name="lastname" placeholder="Last name"/>
               
        </div></div>
<div class="form-group">  

<div class="col-lg-5">
   
<input  type="text" class="form-control" name="username" placeholder="User name" required/>
</div>
</div>
<div class="form-group">

<div class="col-lg-5">
<input type="text" class="form-control" name="email" placeholder="Email"/>
</div>
</div>
<div class="form-group">

<div class="col-lg-5">
<input style="
    margin-bottom: 0px;
" type="password" class="form-control" name="password" placeholder="password"/>
</div>
</div>
<div class="form-group">

<div class="col-lg-5">
<input style="
    margin-bottom: 0px;"type="password" class="form-control" name="cpassword" placeholder="confirm password"/>
</div>
</div>
<div class="form-group">
<div class="col-lg-9 col-lg-offset-3" style="
    position: absolute;
    right: 100px;
    
">
<input type="submit" name="insert" class="btn btn-sm btn-primary">
</div>
</div>
              </form></div></div>
     
    <br class="clear">

   

<script type="text/javascript" src="js/wp.js"></script>
	

</body></html>





         
         

      
         
