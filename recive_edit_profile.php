<?php
include ('connect.php');

$day= $_POST['day'];
$month= $_POST['month'];
$year= $_POST['year'];
$date=$year.'/'.$month.'/'.$day;
$gender= $_POST['gender'];
echo @$news_letter= $_POST['news_letter'];
?>