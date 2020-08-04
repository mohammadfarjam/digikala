<?php
session_start();
$userid=$_SESSION['userid'];
include ('connect.php');
$id=$_POST['id'];

$sql="delete from tbl_user_address WHERE id='$id'";
$stmt=$conn->prepare($sql);
$stmt->execute();

$sql="select * from tbl_user_address WHERE user_id='$userid'";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result_edit_address=$stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result_edit_address);

?>