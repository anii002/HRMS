<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header("location:".host()."../index.php");
    exit();
}
$session_id=$_SESSION['id'];

$user_query = mysqli_query($conn,"select * from tbl_login where adminid = '$session_id'")or die(mysqli_error($conn));
$user_row = mysqli_fetch_array($user_query);
$admin_name = $user_row['adminname'];
$admin_username = $user_row['username'];
?>