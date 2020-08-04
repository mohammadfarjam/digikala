<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <?php
    @$edit = $_GET['edit'];
    if ($edit == 1) {
        echo '  <title> ویرایش نقد و بررسی</title>';
    } else {
        echo '<title> ایجاد نقد و بررسی</title>';
    }
    ?>


    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap4.3.1.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap4.3.1.js"></script>
    <script src="ckeditor/ckeditor.js"></script>


</head>
<body style="direction: rtl;">


<?php
include('top.php');
include('connect.php');
?>


<div id="main_admin_product">
    <div class="right">
        <ul>
            <li><i class="icon_admin"></i><a class="back_admin">داشبورد</a></li>
            <li><i class="icon_admin"></i><a href="admin_category.php" target="_blank" class="back_admin-light">مدیریت
                    دسته ها</a></li>
            <li><i class="icon_admin"></i><a href="add_product.php" target="_blank" class="back_admin">مدیریت
                    محصولات</a></li>
        </ul>
    </div><!--right-->
    <div class="left">
        <?php
        $idproduct = $_GET['id'];

        if ($edit == 1) {
            echo ' <p class="title_category">ویرایش نقد و بررسی</p><!--title_category-->';
        } else {
            echo ' <p class="title_category">ایجاد نقد و بررسی </p><!--title_category-->';
        }
        ?>


        <form action="" method="post">
            <div class="row_form">
                <p class="onvan_category">عنوان محصول :</p>
                <?php
                if ($edit == 1) {
                    $sql3 = "select * from tbl_description where id='$idproduct'";
                    $stmt3 = $conn->prepare($sql3);
                    $stmt3->execute();
                    $result_title3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                    $title_product3 = $result_title3['title'];
                    $tozihat_product3 = $result_title3['tozihat'];
                    echo ' <input class="tit_category" type="text" name="title_review" value="' . $title_product3 . '">';
                } else {
                    echo '<input class="tit_category" type="text" name="title_review">';
                }

                ?>


            </div><!--row_form-->
            <p class="onvan_category">توضیحات محصول :</p>
            <div class="row_form" style="height: 426px;margin-top:10px;">
                <?php
                if ($edit == 1) {
                    echo ' <textarea class="textarea" name="distance" id="editor1" rows="100" cols="80">' . $tozihat_product3 . '</textarea>';
                } else {
                    echo ' <textarea class="textarea" name="distance" id="editor1" rows="100" cols="80"></textarea>';
                }
                ?>

            </div><!--row_form-->
            <div class="containeqr" style="width: 920px;padding: 0px;margin: 0px;">
                <div class="row">
                    <div class="col-lg-1">

                        <button class="btn btn-outline-success"
                                style="font-family: Yekan;font-size: 12pt;float: left;width: 158px;margin-left: 70px;
                           margin-top:680px;">
                            ذخیره نقد و بررسی
                        </button>

                    </div>

                </div>
                <br>
            </div>
        </form>
        <?php




        if ($edit==1) {
            if (isset($_POST['title_review'])) {
                $title_review = $_POST['title_review'];
                $distance = $_POST['distance'];
                $sql4 = "update tbl_description set title='$title_review',tozihat='$distance' WHERE id='$idproduct'";
                $stmt4 = $conn->prepare($sql4);
                $stmt4->execute();
        }
        }else{
            if (empty($_POST['title_review'])) {

            } else {

                $idproduct = $_GET['id'];
                if (isset($_POST['title_review'])) {
                    $title_review = $_POST['title_review'];
                    $distance = $_POST['distance'];
                    $idproduct = $_GET['id'];
                    $sql = "insert into tbl_description (title,tozihat,id_product) VALUES ('" . $title_review . "','" . $distance . "','" . $idproduct . "')";
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

<script>

    CKEDITOR.replace('editor1', {
        language: 'fa',
        height: '250',
        width: '99.8%',
        autoGrow_minHeight: '200',
        autoGrow_maxHeight: '600',
        autoGrow_bottomSpace: '50',
        removePlugins: 'resize'

    });

</script>

</body>
</html>