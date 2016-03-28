<?php
	
	require_once 'confi.php';

$userid = $_SESSION['userid'];?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Brand</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 

<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>

<script type="text/javascript" src="validation.min.js"></script>
<link href="style.css" rel="stylesheet" media="screen">

<script type="text/javascript">
$('document').ready(function()
{ 
	
	
	
	$("#back").click(function(){
		window.location.href = "uadmin.php";
	});
});
</script>

</head>

<body>

<div class="signin1-form" style="
    margin-top: 0;
">

    
<div style="
    position: absolute;
    top: 120px;
    left: 70px;
">

  <div class="alert alert-success" style="
    width: 350px;
">
		<button class='close' data-dismiss='alert'>&times;</button>
			<strong>Success!</strong>  Successfully Registered.
    </div>
    
 
 <div class="form-group">
<button type="submit" class="btn btn-default" id="back"name="btn-save" id="btn-submit" style="
    margin-left: 15px;      outline: none;  border-radius: 66px;
">
    <span class="glyphicon glyphicon-log-in"></span> &nbsp;Control panel</button>
</div>

    </div></div>

</body>
</html>