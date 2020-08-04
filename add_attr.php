<?php
session_start();
include ('connect.php');


if (empty($_POST['title_attr_val'])) {
    $id_parent = $_POST['id_parent'];
    header('location:property.php?id_parent=' . $id_parent . '');

}else {

    if (isset($_POST['title_attr_val'])) {
        $id_category = $_SESSION['idcategory'];
        $title = $_POST['title_attr_val'];
        $id = $_POST['id'];
        $id_parent = $_POST['id_parent'];

        $sql = "insert into tbl_attr (title,id_category,id_pro,parent) VALUES ('$title',$id_category,$id,$id_parent)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('location:property.php?id_parent=' . $id . '&id_parent=' . $id_parent . '');
    }

}

?>