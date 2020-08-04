<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">

    <title> محصولات</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap4.3.1.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap4.3.1.js"></script>
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
            <li><i class="icon_admin"></i><a href="admin_reports.php" class="back_admin">آمار و گزارشات</a></li>
            <li><i class="icon_admin"></i><a href="admin_comment.php" class="back_admin-light">
                    مدیریت نظرات</a></li>
        </ul>
    </div><!--right-->
    <div class="left">
        <p class="title_category">مدیریت سفارشات</p><!--title_category-->

        <div class="container" style="width: 900px;float: right;">
            <div class="col-3">
                <a href="add_product.php">
                    <button class="btn btn-success"
                            style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;margin-top: 10px;float: right;">
                        افزودن محصول
                    </button>
                </a>

                <form action="" method="post">
                    <a>
                        <button class="btn btn-danger" name="delete"
                                style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;margin-top: 10px;float: right;margin-right: 10px;">
                            حذف
                        </button>
                    </a>
            </div><!--col-->

        </div><!--container-->


        <table class="tbl_cat" cellspacing="0">
            <tr>
                <td style="border-right: 1px solid #aaaaaa">ردیف</td>
                <td style="max-width: 170px;min-width: 170px;">نام محصول</td>
                <td>تاریخ</td>
                <td>نام تحویل گیرنده</td>
                <td>استان</td>
                <td>شهر</td>
                <td>ویرایش</td>

                <td style="border-left:1px solid #aaaaaa;width: 60px;">انتخاب</td>
            </tr>
        </table><!--tbl_cat-->

        <table class="tbl_cat2">
            <?php
            include ('connect.php');
            $sql = "select * from tbl_order ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result_order = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result_order as $row_result) {

                ?>
                <tr>
                    <td>1</td>
                    <td style="max-width: 170px;min-width: 170px;"></td>
                    <td><?=$row_result['date']?></td>
                    <td><?=$row_result['name_delivery']?></td>
                    <td><?=$row_result['state']?></td>
                    <td><?=$row_result['city']?></td>
                    <td></td>
                    <td><input type="checkbox" name="id[]" value=""></td>
                </tr>
            <?php } ?>
        </table><!--tbl_cat2-->
        </form>
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
<?php

?>

</body>
</html>