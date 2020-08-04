<?php
session_start();
include ('connect.php');
$fav=$_POST['fav'];
$userid = $_SESSION['userid'];

$sql="select tbl_favorite.*,tbl_product.img,tbl_product.id as idproduct from tbl_favorite JOIN tbl_product ON tbl_favorite.idproduct=tbl_product.id WHERE parent!=0 AND user_id='$userid'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>