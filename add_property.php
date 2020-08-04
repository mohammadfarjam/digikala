<?php
session_start();
include('connect.php');
if(isset($_POST['val'])){
    $session_ip = $_SESSION['ip'];
    $id_attribute = $_POST['id_attribute'];
    $counter = 0;
    $id_parent = $_POST['id_parent'];
    foreach ($id_attribute as $row) {

        $sql1 = "delete from tbl_product_attr WHERE idattr='$row' AND idproduct='$session_ip' ";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();


        $val = $_POST['val'];
        $val=array_filter($val);
        $value = $val[$counter];
        if (empty($value)){

        }
        else{
            $sql = "insert into tbl_product_attr (idproduct,idattr,id_parent,val) VALUES ($session_ip,$row,$id_parent,'$value')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }

        $counter = $counter + 1;
    }
     header('location:property.php?id_parent=' . $id_parent . '');
}

?>


