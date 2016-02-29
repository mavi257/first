<?php
session_start();
$conn=mysqli_connect("localhost","root","","new");

   


if(isset($_SESSION['userid'])=="")
{
session_destroy();
 unset($_SESSION['user']);
 header("Location: login.php");
}
elseif(!empty($_SESSION['userid']))
  {
    $userid = $_SESSION['userid'];
  $s = "SELECT * FROM user where userid='$userid' ";
$re=mysqli_query($conn,$s);



$r10=mysqli_fetch_array($re,MYSQLI_ASSOC);


require 'config.php';


@$cat=$_GET['cat'];
@$cat3=$_GET['cat3']; 
$r=mysqli_fetch_array($re,MYSQLI_ASSOC);?>
<html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Brand</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
self.location='createpost.php?cat=' + val ;
}
function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='createpost.php?cat=' + val + '&cat3=' + val2 ;
}

</script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">BRAND</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     
      <ul class="nav navbar-nav navbar-right">
      <?php if(!empty($_SESSION['userid'])) 
      {
      
     ?>
       <li >
        <a href="profile.php?userid=<?php echo $userid?>" ><span class="glyphicon glyphicon-user"></span>&nbsp;profile</a>   
    </li>
   

    <li>
        <a href="logout.php?logout"><span class="glyphicon glyphicon-log-in"></span>&nbsp; <?php echo $r10['username'];?>, logout</a>   
    </li>   

<?php } else { ?>

    <li >
        <a href="signup.php" ><span class="glyphicon glyphicon-user"></span>&nbsp;Create blog</a>   
    </li> 
    <li >
        <a href="login.php" ><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a>   
    </li>   

<?php } ?>
   
      </ul>
    </div>
  </div>
</nav>
<hr>
<hr>
    <!-- Page Content -->
    <div class="container">
<div class="row">
<div class="col-md-8">

     <?php  
$re=mysqli_query($conn,$s);

$r=mysqli_fetch_array($re,MYSQLI_ASSOC);?>


     <br>
   <div id='new'>
 <h1 class="page-header">Create Ur Own Posts</h1>
<?Php



$quer2="SELECT DISTINCT category,cat_id FROM category order by category"; 

if(isset($cat) and strlen($cat) > 0){
$quer="SELECT DISTINCT subcategory,subcat_id FROM subcategory where cat_id=$cat order by subcategory"; 
}else{$quer="SELECT DISTINCT subcategory,subcat_id FROM subcategory order by subcategory"; } 

if(isset($cat3) and strlen($cat3) > 0){
$quer3="SELECT DISTINCT subcat2 FROM subcategory2 where subcat_id=$cat3 order by subcat2"; 
}else{$quer3="SELECT DISTINCT subcat2 FROM subcategory2 order by subcat2"; } 

?>
<form method="post" enctype="multipart/form-data"  action='upload.php?userid=<?php echo $userid?>&cat_id=<?php echo $cat?>&subcat_id=<?php echo $cat3?>'>

<?php
echo "CATEGORY:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name='cat' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['cat_id']==@$cat){echo "<option selected value='$noticia2[cat_id]'>$noticia2[category]</option>"."<BR>";}
else{echo  "<option value='$noticia2[cat_id]'>$noticia2[category]</option>";}
}?>
<?php

 echo "</select><BR><BR>";

echo "SUB-CATEGORY:&nbsp;&nbsp;&nbsp;<select name='subcat' onchange=\"reload3(this.form)\"><option value=''>Select one</option>";
foreach ($dbo->query($quer) as $noticia) {
if($noticia['subcat_id']==@$cat3){echo "<option selected value='$noticia[subcat_id]'>$noticia[subcategory]</option>"."<BR>";}
else{echo  "<option value='$noticia[subcat_id]'>$noticia[subcategory]</option>";}
}?>

<?PHP
echo "</select><BR><BR>";
?>
TITLE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name="title"><BR><BR>
  BODY:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<textarea name="body"rows="4" cols="50" required>

</textarea><BR><BR>
<input type='file' name='image'  required><BR><BR>


<button class = "btn " type="submit" value="submit" name="submit" />POST</button>
</form>

</div></div>
<div class="col-md-4">
                <div class="well">

                       <center>   <h3>Categories</h3></center>
                       <div style="margin-left: -29px;" >

<?php
$sql901 = "SELECT * FROM category";
$result901 = $conn->query($sql901);
$rows901 = $result901->num_rows;    // Find total rows returned by database
    if($rows901 > 0) {
        $cols901 = 2;    // Define number of columns
        $counter901 = 1;     // Counter used to identify if we need to start or end a row
        $nbsp901 = $cols901 - ($rows901 % $cols901);    // Calculate the number of blank columns
 
                echo '<table width="78%" align="center"   >';
        while ($rows901= $result901->fetch_array()) {
            if(($counter901 % $cols901) == 1) {    // Check if it's new row
                echo '<tr>';    
            }
                   
            echo '<td><h4 style="margin-left: 29px;"><a href="catpage.php?cat_id='.$rows901['cat_id'].'">'.$rows901['category'].'</a></h4></td>';
            if(($counter901 % $cols901) == 0) { // If it's last column in each row then counter remainder will be zero
                echo '</tr>';   
            }
            $counter901++;    // Increase the counter
        }
        $result901->free();
        if($nbsp901 > 0) { // Add unused column in last row
            for ($i901 = 0; $i901 < $nbsp901; $i901++)  { 
                echo '<td>&nbsp;</td>';     
            }
            echo '</tr>';
        }
                echo '</table>';
    }
?></div></div>
                        
                   <div class="well" >
                   
                        <center>   <h4>Sub Categories</h4></center>
                     
  <div style="margin-left: 23px;">

<?php
$sql90 = "SELECT * FROM subcategory";
$result90 = $conn->query($sql90);
$rows90 = $result90->num_rows;    // Find total rows returned by database
    if($rows90 > 0) {
        $cols = 4;    // Define number of columns
        $counter = 1;     // Counter used to identify if we need to start or end a row
        $nbsp = $cols - ($rows90 % $cols);    // Calculate the number of blank columns
 
                echo '<table width="100%" align="center"   >';
        while ($row90= $result90->fetch_array()) {
            if(($counter % $cols) == 1) {    // Check if it's new row
                echo '<tr>';    
            }
                  echo '<td><h5><a href="subcatpage.php?subcat_id='.$row90['subcat_id'].'">'.$row90['subcategory'].'</a></h5></td>';    
           
            if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
                echo '</tr>';   
            }
            $counter++;    // Increase the counter
        }
        $result90->free();
        if($nbsp > 0) { // Add unused column in last row
            for ($i = 0; $i < $nbsp; $i++)  { 
                echo '<td>&nbsp;</td>';     
            }
            echo '</tr>';
        }
                echo '</table>';
    }
?></div>

</div>
                          
                              
                          
                       
                        
                

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>About Us</h4>
                    <p>DEVELOPERS MODEL</p>
                </div>

            </div>

        </div>    </div>
         <hr>  
       
  <nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
  <div class="col-lg-12" style="
    height: 30px;
">
    <ul class="nav navbar-nav navbar-right">
      <li> <a class="navbar-brand" style="
    padding-top: 6px;
    font-size: 12px;
">  ©2016 Brand.in </a></li>
    
    </ul></div>
  </div>
</nav>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html><?php }?>