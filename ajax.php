<?php
session_start();
include('connect.php');
if (isset($_COOKIE['mybasket'])) {
    $cookie = $_COOKIE['mybasket'];
    $id = $_POST['idd'];
    $tedad = $_POST['tedad'];
    //$idbasket = $_POST['idbasket'];
    $color = $_POST['color'];
    $garantee = $_POST['garantee'];

    $sql1 = "select * from tbl_basket WHERE cookie='$cookie' AND color='$color' AND garantee='$garantee' AND idproduct='$id' ";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $result = $stmt1->fetch(PDO::FETCH_ASSOC);
    $idproduct = $result['idproduct'];
    $color_result = $result['color'];
    $garantee_result = $result['garantee'];
    $cookie_result = $result['cookie'];


       if ($id == $idproduct & $garantee==$garantee_result & $color==$color_result & $cookie_result==$cookie) {
 $sql2 = "update tbl_basket set tedad='$tedad' WHERE cookie='$cookie' AND idproduct='$id' ";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
       }else {
    $sql = "insert into tbl_basket (cookie,idproduct,tedad,color,garantee) VALUES ($cookie,$id,1,$color,$garantee)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
       }




    $sql3 = "select b.tedad,b.garantee AS garanteebasket,p.*,p.id AS idp,c.name_color,c.id AS colorid,g.title_garantee,b.id AS idbasket FROM tbl_basket b 
JOIN tbl_product p ON b.idproduct=p.id 
JOIN tbl_colors c ON b.color=c.id 
JOIN tbl_garantee g ON b.garantee=g.id WHERE cookie='$cookie' ";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->execute();
    $res = $stmt3->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode($res);
    $t = serialize($res);
    $_SESSION['basket'] = $t;


} else {
    $value = time();
    $expire = time() + 7 * 24 * 3600;
    setcookie('mybasket', $value, $expire, '/');
    $cookie = $value;
    $id = $_POST['idd'];
    $color = $_POST['color'];
    $garantee = $_POST['garantee'];

    $sql = "insert into tbl_basket (cookie,idproduct,tedad,color,garantee) VALUES ($cookie,$id,1,$color,$garantee)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}


?>