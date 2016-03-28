
<?php
session_start();
$conn=mysqli_connect("localhost","root","","new");
if(isset($_SESSION['userid'])!="")
{

 header("Location: index");
}

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar" lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Brand Posts</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0">

	

<link rel="stylesheet" id="all-css-6" href="css/style.css" type="text/css" media="all">
      
    
<link rel="stylesheet" id="all-css-6" href="css/bootstrap.css" type="text/css" media="all">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  

  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>

<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>

<script type="text/javascript" src="validation.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen">

<script type="text/javascript" src="script.js"></script>


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


              

     </ul>  <ul id="HI" class="ab-top-secondary ab-top-menu">

                <li id="wp-admin-bar-my-account" class="menupop with-avatar no-grav"><a  href="login" class="btn btn-sm btn-primary" >Have an account? Log&nbsp;in</a>         </li>
                
                
                
 
 

                 
                   
                            

 
                </ul>
        </div>
             
          </div>
		
	
			
			
				</div>
					
					</div>
<div class="clear"></div>
    
    </div>

	
<div class="clear"></div></div><!-- wpcontent -->



		
				
		
      <div class="wrapper">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">

              <div class="well">
                <img class="img-responsive" src="upload/About-Us.jpg"/>
                   <h4>About Us</h4>
<p style="
    text-align: justify;
">
Brand is a global leader in consulting, technology, and outsourcing and next-generation services. We enable clients in more than 50 countries to outperform the competition and stay ahead of the innovation curve. With US$9.21 bn in LTM Q3 FY16 revenues and 193,000+ employees, we are helping enterprises renew themselves while also creating new avenues to generate value. We provide enterprises with strategic insights on what lies ahead. We help enterprises transform and thrive in a changing world through strategic consulting, operational leadership, and the co-creation of breakthrough solutions, including those in mobility, sustainability, big data, and cloud computing.</p>

                </div>
                  
                  </div>
              
              
               <div class="col-lg-6"> <div class="signin-form" style="
    margin-top: 0;
    width: 84%;
    float: right;
    
">
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
        
       <form class="form-horizontal" method="post" id="register-form">
      
       
        
       
          <div class="form-group">
      

        <div class="col-lg-4">
            <input type="text" class="form-control" name="firstname"  placeholder="First name" id="firstname"/>
               
        </div>

        <div class="col-lg-4">
            <input type="text" class="form-control" name="lastname" placeholder="Last name" id="lastname"/>
               
       </div></div>
        <div class="form-group"><div class="col-lg-8">

        <input type="text" class="form-control" placeholder="Username" name="username" id="username" />
            </div></div>
        
        <div class="form-group"><div class="col-lg-8">

        <input type="email" class="form-control" placeholder="Email address" name="email" id="email" />
        <span id="check-e"></span>
            </div></div>
        
        <div class="form-group"><div class="col-lg-8">

        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
            </div></div>
        
        <div class="form-group"><div class="col-lg-8">

        <input type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" />
            </div></div>
 
        
        <div class="form-group">
        <button type="submit" class="btn btn-default" name="btn-save" id="btn-submit" style="
    margin-left: 15px;
">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button> 
        </div>  
      
      </form>
 <div id="error">
        <!-- error will be showen here -->
        </div>
 
    
</div>
     

                  </div>
              
              
              </div></div></div>
     
    <br class="clear">

   <footer style="
    BACKGROUND-COLOR: currentColor;
" class="footer">
      <div class="container">
          <style>
#foot {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111; text-decoration: none;
}
</style>
       <ul id='foot' style="height:39px;">  <li><a href="">About</a></li>
  <li><a href="">
Press
  </a></li>
  <li><a href="">Copyright</a></li>
  <li><a href="">
Creators
  </a></li>
  <li><a href="">
Advertise
  </a></li>
  <li><a href="">Developers</a></li>
  <li style="float:right"><a class="active" > © Brand.in 2016</a></li>
</ul>
      </div>
    </footer>
<script type="text/javascript" src="js/wp.js"></script>
	

</body></html>





         
         

      
         
