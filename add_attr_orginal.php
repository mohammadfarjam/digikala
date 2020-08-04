<?php

include('connect.php');
if (empty($_POST['title_attr'])) {
    $id = $_POST['id'];
    header('location:attr.php?id=' . $id . '');
}else {
    if (isset($_POST['title_attr'])) {
        $title = $_POST['title_attr'];
       $id = $_POST['id'];
       $id_category = $_POST['id_category'];

        $sql = "insert into tbl_attr (title,id_category,id_pro) VALUES ('$title',$id_category,$id)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('location:attr.php?id=' . $id . '');
    }
}





?>


