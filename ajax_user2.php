<?php
session_start();
include('connect.php');
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $name_delivery = $_POST['name_delivery'];
    $mobile = $_POST['mobile'];
    $tel = $_POST['tel'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $zip_code = $_POST['zip_code'];
    $id = $_POST['id'];
}

$sql = "select * from tbl_user_address WHERE user_id=$userid";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result_user_address = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $idd = $result_user_address['id'];

if ($idd = $id) {
    $sql = "update tbl_user_address set name_delivery='$name_delivery',mobile='$mobile',tel='$tel',state='$state',city='$city',address='$address',zip_code='$zip_code' WHERE id='$id' AND user_id='$userid'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
 else {
    if (!empty($_POST['name_delivery'] & $_POST['mobile'] & $_POST['tel'] & $_POST['state'] & $_POST['city'] & $_POST['address'] & $_POST['zip_code'])) {
        $sql = "insert into tbl_user_address (name_delivery,mobile,tel,state,city,address,zip_code,user_id) VALUES ('" . $name_delivery . "','".$mobile . "','" . $tel . "','" . $state . "','" . $city . "','" . $address . "','" . $zip_code . "','" . $userid . "')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}

?>