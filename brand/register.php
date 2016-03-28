<?php
	
	require_once 'confi.php';
 
	if($_POST)
	{
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$user_password = $_POST['password'];
		$createdat =date('Y-m-d H:i:s');
		
		$password = md5($user_password);
		
		try
		{	
		
			$stmt = $db_con->prepare("SELECT * FROM user WHERE email=:email");
			$stmt->execute(array(":email"=>$email));
            $count = $stmt->rowCount();
            
           
            $stmt = $db_con->prepare("SELECT * FROM user WHERE username=:uname");
			$stmt->execute(array(":uname"=>$username));
            $count1 = $stmt->rowCount();

            	
            
 if($count1==0){
                
                
			  if($count==0){
				
		                  	$stmt = $db_con->prepare("INSERT INTO user(email,username,firstname,lastname,password,createdat) VALUES(:email,:uname,:fname,:lname,:pass,:jdate)");
			                    $stmt->bindParam(":uname",$username);
                           $stmt->bindParam(":fname",$firstname);
                             $stmt->bindParam(":lname",$lastname);
			                   $stmt->bindParam(":email",$email);
		                     	$stmt->bindParam(":pass",$password);
			                    $stmt->bindParam(":jdate",$createdat);
					
			                 	             if($stmt->execute())
				                                  {
                                                
				                             	echo "registered";
                                                  $sth = $db_con->prepare("SELECT userid FROM user WHERE username=:uname");
$sth->execute(array(":uname"=>$username));
     $result = $sth->fetchColumn();
   
   $_SESSION['userid'] =$result; 
			                        	          }
			                         	    else
				                                 {
					                               echo "Query could not execute !";
				                                }
			
			 }
			else{
				
				echo "1"; //  not available
			}
            
            
 }
else{
echo "2"; //  not available
}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>