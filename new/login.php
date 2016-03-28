
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar" lang="en"><!--<![endif]--><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Brand Posts</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">

	

<link rel="stylesheet" id="all-css-6" href="style.css" type="text/css" media="all">
        
    
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


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
   
   

     </ul>

        </div>
             
          </div>
		
	
			
			
				</div>
					
					</div>
<div class="clear"></div>
    
    </div>

	
<div class="clear"></div></div><!-- wpcontent -->



		
				
		
      <div class="wrapper"><div style="display:none;
    position: absolute;
    left: 495px;
    right: 495px;
    top: 48px;

" id="alert" class="alert  alert-danger "><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>

     <form class="form-signin" method="post" action="" onsubmit="return checkForm(this);"><center> <h2 class="form-signin-heading">Please login</h2></center><br>
 <input type="text" class="form-control" name="username" placeholder="Username" required autofocus/>
 <input type="password" class="form-control" name="password" placeholder="Password" required />  

<center>  <input name="submit" class="btn  btn-primary" type="submit"></center><br>
          
       <center>Not yet registered?   <a class="click-register" href="signup">Sign up here</a>  </center>
</form>    
  </div>
<br class="clear">



  

<script type="text/javascript">

  function checkForm(form)
  {
      if(form.username.value == "" && form.password.value == "" ){
   $("#alert").text("Error: Username and Password cannot be blank!").show();
      form.username.focus();
      return false;
    }
    if(form.username.value == "") {
   $("#alert").text("Error: Username cannot be blank!").show();
      form.username.focus();
      return false;
    }
    re = /\w+$/;
    if(!re.test(form.username.value)) {
      $("#alert").text("Error: Username must contain only letters, numbers!").show();
      form.username.focus();
      return false;
    }
if(form.password.value == "" ) {
     $("#alert").text("Error: Password cannot be blank!").show();
      form.password.focus();
      return false;
    }
    if(form.password.value != "" ) {
      if(form.password.value.length < 6) {
        $("#alert").text("Error: Password must contain at least six characters!").show();
        form.password.focus();
        return false;
      }
      if(form.password.value == form.username.value) {
        $("#alert").text("Error: Password must be different from Username!").show();
        form.password.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.password.value)) {
         $("#alert").text("Error: Password must contain at least one number!").show();
        form.password.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.password.value)) {
       $("#alert").text("Error: Password must contain at least one lowercase letter!").show();
        form.password.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.password.value)) {
         $("#alert").text("Error: Password must contain at least one uppercase letter!").show();
        form.password.focus();
        return false;
      }
    } 
  }

    </script>

  

        
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/wp.js"></script>
	

</body></html>

    





