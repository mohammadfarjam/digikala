<?php
session_start();
include ('connect.php');
$address = $_SESSION['select_address'];
$userid = $_SESSION['userid'];
$basket = $_SESSION['basket'];
$address=unserialize($address);
$name_delivery=$address['name_delivery'];
$state=$address['state'];
$city=$address['city'];
$mobile=$address['mobile'];
$tel=$address['tel'];
$zip_code=$address['zip_code'];
$addres=$address['address'];
$pay_amount=$_POST['price'];
$date=$_POST['date'];
$code_discount=$_POST['code_discount'];




$sql="insert into tbl_order (name_delivery,state,city,mobile,tel,zip_code,address,pay_amount,date,user_order,info_basket,code_discount) VALUES ('".$name_delivery."','".$state."','".$city."','".$mobile."','".$tel."',$zip_code,'".$addres."',$pay_amount,'".$date."','".$userid."','".$basket."','".$code_discount."')";
$stmt=$conn->prepare($sql);
$stmt->execute();
?>