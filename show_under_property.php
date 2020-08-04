<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">

    <title> نمایش زیر ویژگی ها</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap4.3.1.css">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap4.3.1.js"></script>

</head>
<body style="direction: rtl">


<?php
include ('top.php');
?>


<div id="main_admin">
    <div class="right">
        <ul>
            <li><i class="icon_admin"></i><a class="back_admin">داشبورد</a></li>
            <li><i class="icon_admin"></i><a href="admin_category.php" target="_blank" class="back_admin-light">مدیریت
                    دسته ها</a></li>
            <li><i class="icon_admin"></i><a class="back_admin">مدیریت محصولات</a></li>
        </ul>
    </div><!--right-->
    <div class="left">
        <p class="title_category">مدیریت ویژگی ها</p><!--title_category-->

        <div class="container" style="width: 900px;float: right;">
            <div class="col-3">
                <a href="add_category.php" target="_blank">
                    <button class="btn btn-success"
                            style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;margin-top: 10px;float: right;">
                        افزودن ویژگی
                    </button>
                </a>

                <form action="code_php_comment.php" method="post">
                    <a>
                        <button class="btn btn-danger" onclick="submitform();" name="submit"
                                style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;margin-top: 10px;float: right;margin-right: 10px;">
                            حذف
                        </button>
                    </a>
            </div><!--col-->

        </div><!--container-->


        <table class="tbl_cat" cellspacing="0">
            <tr>
                <td style="border-right: 1px solid #aaaaaa">ردیف</td>
                <td  style="max-width: 170px;min-width: 170px;">پارامتر ها </td>
                <td>نمایش و ویرایش</td>
                <td style="border-left:1px solid #aaaaaa;">انتخاب</td>
            </tr>
        </table><!--tbl_cat-->
        <?php
        include('connect.php');
        $id=$_GET['id'];
        $sql = "select * from tbl_attr WHERE parent='$id' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($result_tbl_cat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id_category = $result_tbl_cat ['id'];
            $title_category = $result_tbl_cat['title'];

            echo '<table class="tbl_cat2" >
    <tr>
        
        <td>' . $id_category . '</td>
        <td  style="max-width: 170px;min-width: 170px;">' . $title_category . '</td>
        <td><a href="show_under_property?id=' . $id_category . '"><i class="icon_under_cat_edit"></i></a></td>
        <td><input type="checkbox" name="id[]" value="' . $id_category . '"></td>
        
    </tr>
   
</table><!--tbl_cat2-->';
        }
        echo '</br>';
        ?>
        </form>
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