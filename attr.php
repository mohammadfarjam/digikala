<?php
session_start();
ob_start();
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
<?php
include('connect.php');
$ip = $_GET['id'];
$_SESSION['ip']=$ip;
$sql = "select * from tbl_product WHERE id=$ip";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result_tbl_product = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result_tbl_product as $row) {
    $id_category = $row['category'];
    $_SESSION['idcategory']=$id_category;
}
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
        <p class="title_category">مدیریت ویژگی ها</p><!--title_category-->
        <form action="add_attr_orginal.php" method="post" id="add">
            <div class="container" style="width: 900px;float: right;">
                <div class="col-3">
                    <button onclick="submit()" class="btn btn-success"
                            style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;margin-top: 10px;float: right;">
                        افزودن ویژگی
                    </button>
                </div><!--col3-->
            </div><!--container-->
            <div class="row_form">
                <p class="onvan_category">عنوان ویژگی والد :</p>
                <input class="tit_category" type="text" name="title_attr">
                <input type="hidden" name="id_category" value="<?= $id_category ?>">
                <input type="hidden" name="id" value="<?= $ip ?>">
            </div><!--row-->

        </form>

        <table class="tbl_cat" cellspacing="0">
            <tr>
                <td style="border-right: 1px solid #aaaaaa;">ردیف</td>
                <td>نام ویژگی (والد)</td>
                <td>مقدار دهی ویژگی ها</td>
                <td style="border-left:1px solid #aaaaaa;">انتخاب</td>
            </tr>
        </table><!--tbl_cat-->
        <?php
        $sql = "select * from tbl_attr WHERE parent=0 AND id_pro=$ip";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result_attr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $i = 1;

        ?>

        <table class="tbl_cat2">
            <?php foreach ($result_attr as $row) { ?>

                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><a href="property.php?id_parent=<?= $row['id']?>"><i class="icon_property"></i></a>
                    </td>
                    <td><input type="checkbox" name="id[]" value="' . $id_attr . ' "></td>
                </tr>
                <?php $i++;
            } ?>

        </table><!--tbl_cat2-->





    </div><!--left-->
</div><!--main_admin-->


<script>
    function submit() {
        $('#add').submit();
    }
</script>
</body>
<?php
include
('footer.php');
?>

<?php
include
('script-menu.php');
?>
</html>