<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <?php 
$conn=mysqli_connect("localhost","root","","new");


      $s12 = "SELECT * FROM category ";
$re12=mysqli_query($conn,$s12);
while($row12 = $re12->fetch_assoc())
{
    $che=$row12['cat_id'];
    
    echo '<input type="checkbox" id="'.$che.'"/>';?><script>
$('#<?php echo $che;?>').click(function() {
    $("#hi").toggle(this.checked);
});
 </script><?php }?>
<div id="hi" style="display:none">Age is something</div></body></html>