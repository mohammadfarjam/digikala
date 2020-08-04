<?php
include('connect.php');
$date1 = $_POST['year1'] . '/' . $_POST['mount1'] . '/' . $_POST['day1'];
$date2 = $_POST['year2'] . '/' . $_POST['mount2'] . '/' . $_POST['day2'];
$start_day = new DateTime($date1);
$end_day = new DateTime($date2);

$start_day->format('Y/m/d');
$end_day->format('Y/m/d');
$sql = "select * from tbl_order";
$stmt = $conn->prepare($sql);
$stmt->execute();
$totall_all = [];
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $date = $row['date'];
    $date = new DateTime($date);
    $date->format('Y/m/d');
    if ($date >= $start_day and $date <= $end_day) {
        array_push($totall_all, $row);
    }
   $result=sizeof($result);
}
?>


<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">

    <title class="t"> آمار و گزارشات</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap4.3.1.css">
    <script src="js/bootstrap4.3.1.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
</head>
<body style="direction: rtl">


<?php
include('top.php');
?>


<div id="main_admin">
    <div class="right">
        <ul>
            <li><i class="icon_admin"></i><a class="back_admin">داشبورد</a></li>
            <li><i class="icon_admin"></i><a href="admin_category.php" target="_blank" class="back_admin-light">مدیریت
                    دسته ها</a></li>
            <li><i class="icon_admin"></i><a href="admin_product.php" target="_blank" class="back_admin">مدیریت
                    محصولات</a></li>
            <li><i class="icon_admin"></i><a href="admin_orders.php" target="_blank" class="back_admin-light">مدیریت
                    سفارشات</a></li>
            <li><i class="icon_admin"></i><a href="admin_reports.php" target="_blank" class="back_admin">آمار و
                    گزارشات</a></li>
            <li><i class="icon_admin"></i><a href="admin_reports.php" target="_blank" class="back_admin-light">
                    مدیریت نظرات</a></li>
        </ul>
    </div><!--right-->
    <div class="left">
        <p class="title_category">آمار و گزارشات(بازه زمانی از   <?=$date1?>  تا  <?=$date2?>  ) </p><!--title_category-->



    </div><!--left-->
</div><!--main_admin-->

<?php
include
('footer.php');
?>

<?php
include
('script-menu.php');
?>

</body>
</html>
