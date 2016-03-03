<?php
session_start();
include_once('dbConfig.php');
if(isset($_POST['bulk_delete_submit'])){
    $idArr = $_POST['checked_id'];
    foreach($idArr as $comid){
        mysqli_query($conn,"DELETE FROM comment WHERE comid=".$comid);
    }
    $_SESSION['success_msg'] = 'Comments have been deleted successfully.';
    header("Location:adcom");
}
?>