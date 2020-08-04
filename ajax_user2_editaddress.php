<?php
session_start();
$userid=$_SESSION['userid'];
include ('connect.php');
$id = $_POST['id'];
$sql="select * from tbl_user_address WHERE user_id='$userid' AND id='$id'";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result_edit_address=$stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($result_edit_address);

?>