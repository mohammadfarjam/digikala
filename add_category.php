<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ایجاد دسته</title>
    <link rel="stylesheet" href="css/bootstrap4.3.1.css">

    <link rel="stylesheet" href="style.css">


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
            <li><i class="icon_admin"></i><a class="back_admin">داشبورد</a></li>
            <li><i class="icon_admin"></i><a href="admin_category.php" target="_blank" class="back_admin-light">مدیریت
                    دسته ها</a></li>
            <li><i class="icon_admin"></i><a class="back_admin">مدیریت محصولات</a></li>
        </ul>
    </div><!--right-->
    <div class="left">


        <?php
        include('connect.php');


        @$edit = $_GET['edit'];
        if ($edit == 1) {
            echo '<p class="title_category">ویرایش دسته ها</p><!--title_category-->';
        } else {
            echo '<p class="title_category">ایجاد دسته ها</p><!--title_category-->';
        }
        ?>

        <?php

        if ($edit == 1) {
            echo '<form action="add_category.php?edit=1" method="POST">';

        } else {
            echo '<form action="add_category.php" method="POST">';
        }

        ?>



        <?php
        if (isset($_GET['id'])) {
            $idd = $_GET['id'];
            $sql3 = "select * from tbl_category WHERE id='{$idd}'";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->execute();
            $result_option3 = $stmt3->fetch(PDO::FETCH_ASSOC);
            $title3 = $result_option3['title'];
            $parent3 = $result_option3['parent'];
            $id3 = $result_option3['id'];
        }

        echo '<input type="hidden" value="' . @$id3 . '" name="id_category">';
        ?>


        <div class="row_form">
            <p class="onvan_category">عنوان دسته :</p>
            <?php

            if ($edit == 1) {
                echo '<input class="tit_category" type="text" name="titl_category" value="' . @$title3 . '">';
            } else {
                echo '<input class="tit_category" type="text" name="titl_category">';
            }
            ?>
            <input type="hidden" name="sub" value="true">

        </div><!--row_form-->

        <div class="row_form">
            <p class="onvan_category">انتخاب دسته اصلي :</p>
            <select class="select" name="cat" id="categoryselector">
                <option class="option">انتخاب کنيد</option>

                <?php

                $sql2 = "select * from tbl_category";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute();
                while ($result_option2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    $title2 = $result_option2['title'];
                    $id2 = $result_option2['id'];
                    echo '<option value="' . $id2 . '">' . $title2 . '</option>';
                };

                ?>

            </select>
        </div><!--row_form-->
<script>
    $('#categoryselector').on('change',function(){
        var category_org=$(this).val();
        $('.row_form').append('<input type="hidden" value='+category_org+' name="category_orginal">');
    });
</script>

        <br>
        <br>

        <div class="container" style="width: 920px;padding: 0px;margin: 0px;">
            <div class="row">
                <div class="col-lg-10">

                    <button class="btn btn-outline-success"
                            style="font-family: Yekan;font-size: 12pt;float: left;width: 120px;margin-top:100px;margin-left: 70px;">
                        ذخیره تغییرات
                    </button>

                </div>

            </div>
            <br>
        </div>


        </form>


        <?php

        if ($edit == 1) {
            if (isset($_POST['cat'])) {
                $cat = $_POST['cat'];
                $id_category= $_POST['id_category'];

                $sql5 = "update tbl_category set title='{$_POST['titl_category']}',parent='{$_POST['category_orginal']}' WHERE id='$id_category' ";
                $stmt5 = $conn->prepare($sql5);
                $stmt5->execute();
            }

        } else {
            if (isset($_POST['sub'])) {
                $r = $_POST['titl_category'];
                $p = $_POST['cat'];
                if (empty($_POST['titl_category'])) {
                } else {
                    $sql = "insert into tbl_category (title,parent) VALUES ('" . $r . "','" . $p . "')";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                }
            }
        }
        ?>
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