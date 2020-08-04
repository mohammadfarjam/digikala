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
            <li><i class="icon_admin"></i><a href="admin_dashboard.php" class="back_admin">داشبورد</a></li>
            <li><i class="icon_admin"></i><a href="admin_category.php" class="back_admin-light">مدیریت
                    دسته ها</a></li>
            <li><i class="icon_admin"></i><a href="admin_product.php" class="back_admin">مدیریت
                    محصولات</a></li>
            <li><i class="icon_admin"></i><a href="admin_orders.php" class="back_admin-light">مدیریت
                    سفارشات</a></li>
            <li><i class="icon_admin"></i><a href="admin_reports.php" class="back_admin">آمار و
                    گزارشات</a></li>
            <li><i class="icon_admin"></i><a href="admin_comment.php" class="back_admin-light">
                    مدیریت نظرات</a></li>
        </ul>
    </div><!--right-->
    <div class="left">
        <p class="title_category"> آمار و گزارشات</p><!--title_category-->

        <form action="reports.php" method="post">
            <div class="row_reports">
                <p style="margin-left: 7px;width:100px;">تاریخ شروع :</p>
                <p style="margin-left: 7px;">روز</p>

                <select class="select" name="day1">
                    <?php
                    for ($i = 1; $i <= 31; $i++) { ?>
                        <option><?= $i ?></option>
                    <?php }
                    $i++;
                    ?>

                </select>

                <p style="margin-left: 7px;margin-right: 7px;">ماه</p>
                <select class="select" name="mount1">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        ?>
                        <option class="option"><?= $i ?></option>
                        <?php
                    }
                    $i++;
                    ?>
                </select>
                <p style="margin-left: 7px;margin-right: 7px;">سال</p>
                <select class="select" name="year1">
                    <?php
                    for ($i = 1390; $i <= 1398; $i++) {
                        ?>
                        <option class="option"><?= $i ?></option>
                    <?php }
                    $i++;
                    ?>

                </select>
            </div><!--row_reports-->

            <div class="row_reports">
                <p style="margin-left: 7px;width:100px;">تاریخ پایان :</p>
                <p style="margin-left: 7px;">روز</p>

                <select class="select" name="day2">
                    <?php
                    for ($i = 1; $i <= 31; $i++) { ?>
                        <option><?= $i ?></option>
                    <?php }
                    $i++;
                    ?>

                </select>

                <p style="margin-left: 7px;margin-right: 7px;">ماه</p>
                <select class="select" name="mount2">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        ?>
                        <option class="option"><?= $i ?></option>
                        <?php
                    }
                    $i++;
                    ?>
                </select>
                <p style="margin-left: 7px;margin-right: 7px;">سال</p>
                <select class="select" name="year2">
                    <?php
                    for ($i = 1390; $i <= 1398; $i++) {
                        ?>
                        <option class="option"><?= $i ?></option>
                    <?php }
                    $i++;
                    ?>

                </select>
            </div><!--row_reports-->
            <button class="report" onclick="submit();">گزارش گیری</button>
        </form>
</div><!--left-->
</div><!--main_admin-->

<script>
    function submit() {
        $('form').submit();
    }
</script>
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