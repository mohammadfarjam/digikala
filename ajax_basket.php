<?php
session_start();
include('connect.php');
if (isset($_COOKIE['mybasket'])) {
    $cookie = $_COOKIE['mybasket'];
    $idbasket = $_POST['idbasket'];

    $sql = "delete from tbl_basket WHERE id='$idbasket' AND cookie='$cookie' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql2 = "select b.tedad,b.garantee AS garanteebasket,p.*,p.id AS idp,c.name_color,c.id AS colorid,g.title_garantee,b.id AS idbasket FROM tbl_basket b 
JOIN tbl_product p ON b.idproduct=p.id 
JOIN tbl_colors c ON b.color=c.id 
JOIN tbl_garantee g ON b.garantee=g.id WHERE cookie='$cookie' ";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $res = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
    $t = serialize($res);
    $_SESSION['basket'] = $t;

}
?>