<?php
session_start();
include ('connect.php');
$id_favorite=$_POST['id_favorite'];
$userid = $_SESSION['userid'];


    $sql1="select tbl_favorite.*,tbl_product.img,tbl_product.id as idproduct from tbl_favorite JOIN tbl_product ON tbl_favorite.idproduct=tbl_product.id WHERE parent='$id_favorite' AND user_id='$userid'";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $result=$stmt1->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);





?>