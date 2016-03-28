<?php

$conn=mysqli_connect("localhost","root","","new");
$per_page=5;
if (isset($_GET["page"])) {

$page = $_GET["page"];

}

else {

$page=1;

}

$start_from = ($page-1) * $per_page;


$query = "SELECT * FROM student LIMIT $start_from, $per_page";
$result = mysqli_query ($conn, $query);

?><!DOCTYPE html><html>
<head>
<title>PHP Pagination</title>
</head><body>
<table align=”center” border=”2″ cellpadding=”3″>
<tr><th>Name</th><th>Phone</th><th>Country</th></tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr align=”center”>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['number']; ?></td>
<td><?php echo $row['country']; ?></td>
</tr>
<?php
};
?>
</table>

<div>
<?php


$query = 'select * from student';
$result = mysqli_query($conn, $query);

$total_records = mysqli_num_rows($result);

$total_pages = ceil($total_records / $per_page);

echo "<center><a href='pagination.php?page=1'>".'First Page'."</a> ";

for ($i=1; $i<=$total_pages; $i++) {

echo "<a href='pagination.php?page=".$i."''>".$i."</a> ";
};

echo "<a href='pagination.php?page=$total_pages'>".'Last Page'."</a></center> ";
?>

</div>

</body>
</html>