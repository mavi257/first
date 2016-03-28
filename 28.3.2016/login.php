
<?php
session_start();
$conn=mysqli_connect("localhost","root","","new");

if(isset($_SESSION['userid'])!="")
{

 header("Location: index");
}









if(isset($_POST['submit']))
{
 $username = mysqli_real_escape_string($conn, $_POST['username']);
 $password = md5(mysqli_real_escape_string($conn,$_POST['password']));
$sql = "SELECT * FROM user WHERE username='$username'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
$userid11=$result['userid'];
            if ($result['password'] === $password)
                    {
                                  if($result['admin']==1)
                                  {
                                      $_SESSION['userid'] = $result['userid'];
                                               
                                      $sql1="UPDATE user SET lastlogin=now() WHERE userid='$userid11'";
                                      $conn->query($sql1);  header("Location:admin");
                                      }
                                elseif($result['admin']==0)
                                {
                                 $_SESSION['userid'] = $result['userid'];
                                     $sql2="UPDATE user SET lastlogin=now() WHERE userid='$userid11'";
                                      $conn->query($sql2);
                               
                                 header("Location: uadmin");
                              }
}
                              else
                              {
                            
                          $_SESSION['success_msg'] = 'Error:Wrong details';

                        } 
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar" lang="en"><!--<![endif]--><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Brand Posts</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">

	

<link rel="stylesheet" id="all-css-6" href="css/style.css" type="text/css" media="all">
        
    
<link rel="stylesheet" id="all-css-6" href="css/bootstrap.css" type="text/css" media="all">


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
include_once('dbconfig.php');     ?><div style="display:none;
    position: absolute;
    left: 495px;
    right: 495px;
    top: 48px;

" id="alert" class="alert  alert-danger "><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>

     <form class="form-signin" method="post" action="" onsubmit="return checkForm(this);"><center> <h2 class="form-signin-heading">Please login</h2></center><br>
 <input type="text" class="form-control" name="username" placeholder="Username" required autofocus/>
 <input type="password" class="form-control" name="password" placeholder="Password" required />  

<center>  <input name="submit" class="btn  btn-primary" type="submit" style="
    
    margin-top: 10px;
"></center><br>
          
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
    
if(form.password.value == "" ) {
     $("#alert").text("Error: Password cannot be blank!").show();
      form.password.focus();
      return false;
    }
   
      }

    </script>

  

        
    <script type="text/javascript" src="js/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/wp.js"></script>
	

</body></html>

    





