<?php
session_start();
include_once('dbConfig.php');
if(isset($_POST['bulk_delete_submit'])){
    $idArr = $_POST['checked_id'];
    foreach($idArr as $postid){
        mysqli_query($conn,"DELETE FROM post WHERE postid=".$postid);
    }
    $_SESSION['success_msg'] = 'Users have been deleted successfully.';
    header("Location:index.php");
}
?>