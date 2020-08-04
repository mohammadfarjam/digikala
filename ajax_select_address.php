<?php
session_start();
include ('connect.php');
$userid=$_SESSION['userid'];
$id=$_POST['id'];
$sql="select * from tbl_user_address where id='$id' AND user_id='$userid'";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result_select_address=$stmt->fetch(PDO::FETCH_ASSOC);
$ad=serialize($result_select_address);
$_SESSION['select_address']=$ad;

?>