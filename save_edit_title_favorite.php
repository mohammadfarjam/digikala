<?php
session_start();
include ('connect.php');
$user_id=$_SESSION['userid'];
echo $title=$_POST['title'];
$id_favorite=$_POST['id_favorite'];

$sql="update tbl_favorite set title='$title' WHERE id='$id_favorite' AND user_id='$user_id'";
$stmt=$conn->prepare($sql);
$stmt->execute();


?>