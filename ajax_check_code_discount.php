<?php
session_start();
include ('connect.php');
$code=$_POST['code'];
$sql="select * from tbl_code_discount WHERE code='$code' AND used=0";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result_code=$stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result_code);


?>