<?php
session_start();
$session_ip = $_SESSION['ip'];
ob_start();
$id_parent = $_GET['id_parent'];
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">

    <title> مدیریت ویژگی ها</title>
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
            <li><i class="icon_admin"></i><a href="admin_orders.php" class="back_admin">آمار و گزارشات</a></li>
            <li><i class="icon_admin"></i><a href="admin_comment.php" class="back_admin-light">
                    مدیریت نظرات</a></li>
        </ul>
    </div><!--right-->
    <div class="left">
        <p class="title_category">افزودن ویژگی ها</p><!--title_category-->
        <form action="add_attr.php" method="post" id="submit_attr">
            <div class="container" style="width: 900px;float: right;">
                <div class="col-3">
                    <button onclick="submit()" class="btn btn-success"
                            style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;margin-top: 10px;float: right;">
                        افزودن ویژگی جدید
                    </button>
                </div><!--col3-->
            </div><!--container-->
            <div class="row_form">
                <p class="onvan_category" style="font-size: 12.6pt;">عنوان ویژگی جدید :</p>
                <input class="tit_category" type="text" name="title_attr_val">
                <input type="hidden" name="id" value="<?= $session_ip ?>">
                <input type="hidden" name="id_parent" value="<?= $id_parent ?>">
            </div><!--row-->

        </form>


        <form method="post" action="add_property.php" id="submit_val">
            <?php
            include('connect.php');
            $sql = "select tbl_attr.*,tbl_attr.id as id_attr,tbl_product_attr.val FROM tbl_attr LEFT JOIN tbl_product_attr ON tbl_attr.id=tbl_product_attr.idattr
WHERE parent='$id_parent' AND id_pro='$session_ip'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result_attr = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result_attr as $row) { ?>
                <div class="row_form">
                    <p class="onvan_category"><?= $row['title'] ?></p>
                    <input class="tit_category" type="text" value="<?= $row['val'] ?>" name="val[]">

                    <input class="tit_category" type="hidden" value="<?= $row['id_attr'] ?>"
                           name="id_attribute[]">
                    <input class="tit_category" type="hidden" value="<?= $row['parent'] ?>"
                           name="id_parent">

                </div><!--row_form-->
            <?php } ?>

            <div class="container" style="width: 900px;float: left!important;">
                <div class="col-11">
                    <button onclick="submit_val()" class="btn btn-success"
                            style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;margin-top: 10px;color:black;background-color: #0073ff;float: left;">
                        ثبت ویژگی
                    </button>
                </div><!--col11-->
            </div><!--container-->
        </form>
    </div><!--left-->


</div><!--main_admin-->

<script>
    function submit_val() {
        $('#submit_val').submit();
    }
 function submit() {
        $('#submit_attr').submit();
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