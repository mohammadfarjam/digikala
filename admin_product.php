<?php
ob_start();
?>
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
            <li><i class="icon_admin"></i><a href="admin_orders.php" class="back_admin">آمار و گزارشات</a></li>
            <li><i class="icon_admin"></i><a href="admin_comment.php" class="back_admin-light">
                    مدیریت نظرات</a></li>
        </ul>
    </div><!--right-->
    <div class="left">
        <p class="title_category">مدیریت محصولات</p><!--title_category-->

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
                        <button class="btn btn-danger" onclick="submitform();" name="delete"
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
                <td>نمایش و ویرایش</td>
                <td>نقد و بررسی</td>
                <td> ویرایش نقد و بررسی</td>
                <td>ویژگی ها</td>
                <td>گالری</td>

                <td style="border-left:1px solid #aaaaaa;width: 60px;">انتخاب</td>
            </tr>
        </table><!--tbl_cat-->
        <?php
        include('connect.php');
        $i = 1;
        $sql = "select * from tbl_product";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($result_tbl_pro = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id_product = $result_tbl_pro ['id'];
            $title_product = $result_tbl_pro['title'];

            echo '<table class="tbl_cat2" >
        <tr>
        
       <td>' . $i . '</td>
        <td style="max-width: 170px;min-width: 170px;">' . $title_product . '</td>
   
        <td><a href="add_product.php?id=' . $id_product . '&edit=1" target="_blank"><i class="icon_under_cat_edit"></i></a></td>
        <td><a href="add_review.php?id=' . $id_product . '" target="_blank"><i class="icon_naghd"></i></a></td>
        <td><a href="show_under_review.php?id=' . $id_product . '" target="_blank"><i class="icon_naghd_edit"></i></a></td>
        <td><a href="attr.php?id=' . $id_product . '" target="_blank"><i class="icon_property"></i></a></td>
        <td><a href="gallery.php?id=' . $id_product . '" target="_blank"><i class="icon_gallery"></i></a></td>
        <td><input type="checkbox" name="id[]" value="' . $id_product . '"></td>
       
    </tr>
   
</table><!--tbl_cat2-->';
            $i++;
        }

        echo '</br>';
        ?>
        </form>

        <?php
        if (isset($_POST['delete'])) {
            $ids = $_POST['id'];
            $idss = join(',', $ids);
            $sql = "delete from tbl_product WHERE id IN ($idss)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $sql = "delete from tbl_attr WHERE idpro='$id_product' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $sql = "delete from tbl_product_attr WHERE idproduct='$id_product' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();




            ob_clean();
            header('location:admin_product.php');
        }
        ?>

    </div><!--left-->
    <script>
        function submitform() {
            $('form').submit();
        }
    </script>
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