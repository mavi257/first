<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>test </title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>

<script type="text/javascript" src="validation.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen">

<script type="text/javascript" src="script.js"></script>

</head>

<body>


    
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-horizontal" method="post" id="register-form">
      
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        
       
        <div class="form-group">
      

        <div class="col-lg-4">
            <input type="text" class="form-control" name="firstname"  placeholder="First name" id="firstname"/>
               
        </div>

        <div class="col-lg-4">
            <input type="text" class="form-control" name="lastname" placeholder="Last name" id="lastname"/>
               
       </div></div>
        <div class="form-group">
            
<div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Username" name="username" id="username" />
            </div></div>
        
        <div class="form-group">
            
<div class="col-lg-8">
        <input type="email" class="form-control" placeholder="Email address" name="email" id="email" />
        <span id="check-e"></span>
            </div></div>
        
        <div class="form-group">
            
<div class="col-lg-8">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
            </div></div>
        
        <div class="form-group">
            
<div class="col-lg-8">
        <input type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" />
            </div></div>
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-save" id="btn-submit" style="
    margin-left: 15px;
">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button> 
        </div>  
      
      </form>
 <div id="error">
        <!-- error will be showen here ! -->
        </div>
    </div>
    
</div>
    
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>