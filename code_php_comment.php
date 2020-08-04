<?php
session_start();
$userid = $_SESSION['userid'];
$id_product = $_SESSION['idproduct'];
$i = $_SESSION['i'];

include('connect.php');
$param = $_POST['param'];
$title_pro = $_POST['title_pro'];
$param = serialize($param);
$title_review = $_POST['title_review'];
$positive = $_POST['positive'];
$negative = $_POST['negative'];
$text_review = $_POST['text_review'];
$ic = $_POST['id_cat'];

$sql1 = "select * from tbl_comment WHERE idproduct='$i' AND user='$userid'";
$stmt1 = $conn->prepare($sql1);
$stmt1->execute();
$result_all = $stmt1->fetch(PDO::FETCH_ASSOC);
$id = $result_all['idproduct'];
$user_se = $result_all['user'];

if ($i == $id & $userid == $user_se) {
    $sql2 = "update tbl_comment set title='$title_review',posetive='$positive',negative='$negative',matn='$text_review',param='$param' WHERE idproduct='$i' AND user='$user_se'";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();

} else {
    $sql = "insert into tbl_comment (title,posetive,negative,matn,param,user,idproduct,name_product) VALUES ('" . $title_review . "','" . $positive . "','" . $negative . "','" . $text_review . "','" . $param . "','" . $userid . "','" . $id_product . "','" . $title_pro . "')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $_SESSION['ic'] = $ic;
    $_SESSION['title'] = $title_pro;
    $_SESSION['i'] = $id_product;
}


header('location:comment.php');
?>





















