<?php
	
	require_once 'confi.php';
$username = $_GET['username'];
	
                                               $sth = $db_con->prepare("SELECT userid FROM user WHERE username=:uname");
$sth->execute(array(":uname"=>$username));
     $result = $sth->fetchColumn();
   
   $_SESSION['userid'] =$result; 

			                        	        