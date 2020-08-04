<?php
session_start();
include ('connect.php');
$user_id=$_SESSION['userid'];
$id_fav=$_POST['id_fav'];
 $id_fav_parent=$_POST['id_fav_parent'];

$sql="delete from tbl_favorite WHERE id='$id_fav' AND user_id='$user_id'";
$stmt=$conn->prepare($sql);
$stmt->execute();

$sql1="select tbl_favorite.*,tbl_product.img,tbl_product.id as idproduct from tbl_favorite JOIN tbl_product ON tbl_favorite.idproduct=tbl_product.id WHERE parent='$id_fav_parent' AND user_id='$user_id' ";
$stmt1 = $conn->prepare($sql1);
$stmt1->execute();
$result=$stmt1->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);

?>