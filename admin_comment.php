<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">

    <title class="t">مدیریت نظرات</title>
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
        <p class="title_category" style="margin-bottom: 20px"> مدیریت نظرات </p><!--title_category-->
        <?php
        require('connect.php');
        @$action = $_POST['action'];
        @$ids = $_POST['id'];
        @$e=implode(',',$ids);
        if ($action == 1) {
            $sql = "update tbl_comment set confirm=1 WHERE id IN ($e)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }

        if ($action == 2) {
            $sql = "update tbl_comment set confirm=0 WHERE id IN ($e)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }

        if ($action == 3) {
            $sql = "delete from tbl_comment WHERE id IN ($e)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            ob_clean();
            header('location:admin_comment.php');
        }
        ?>
        <form action="" method="post">
            <button class="run_action" onclick="submit()">اجرای عملیات</button>
            <select name="action" style="width: 120px;float: left;margin-left: 15px;">
                <option value="1">تایید نظر</option>
                <option value="2">عدم تایید نظر</option>
                <option value="3">حذف نظر</option>
            </select>
            <table class="table_comment" cellspacing="0">
                <tr style="font-family: Yekan;font-size: 14pt!important; background: lightgrey;height: 35px;">
                    <td width="60px">ردیف</td>
                    <td width="200px">عنوان نظر</td>
                    <td width="200px">نکات مثبت</td>
                    <td width="200px">نکات منفی</td>
                    <td width="250px">متن نظر</td>
                    <td width="100px">تاریخ</td>
                    <td width="100px">وضعیت</td>
                    <td width="100px">علامت گذاری</td>
                </tr>
                <?php
                $sql = "select * from tbl_comment order by id DESC ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result_comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $count = sizeof($result_comment);
                $i = 1;
                foreach ($result_comment as $row) {
                    ?>
                    <tr style="border-top: 1px solid #777">
                        <td width="60px"><?= $i ?></td>
                        <td width="200px"><?= $row['title'] ?></td>
                        <td width="200px"><?= $row['posetive'] ?></td>
                        <td width="200px"><?= $row['negative'] ?></td>
                        <td width="250px"><?= $row['matn'] ?></td>
                        <td width="100px"><?= $row['date'] ?></td>
                        <td width="100px">
                            <?php
                            if ($row['confirm']==1){
                                echo 'تایید شده';
                            }else{
                                echo 'عدم تایید';
                            }
                            ?>
                            </td>
                        <td width="100px"><input name="id[]" value="<?= $row['id'] ?>" type="checkbox"></td>
                    </tr>

                    <?php
                    $i++;
                } ?>
        </form>

        </table>
    </div><!--left-->
</div><!--main_admin-->
<script>
    function submit() {
        $('form').attr('action').text('<?=$action?>');


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