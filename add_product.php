<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <?php
    @$edit = $_GET['edit'];
    if ($edit == 1) {
        echo '<title> نمایش و ویرایش محصول</title>';
    } else {
        echo '<title> ایجاد محصول</title>';
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
        include('connect.php');
        @$edit = $_GET['edit'];
        if ($edit == 1) {
            echo '<p class="title_category"> نمایش و ویرایش محصول </p><!--title_category-->';
        } else {
            echo '<p class="title_category">ایجاد محصول جدید</p><!--title_category-->';
        }
        ?>


        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" value="true" name="ok">
            <div class="row_form">
                <p class="onvan_category">عنوان محصول :</p>
                <?php
                @$id = $_GET['id'];
                if ($edit == 1) {
                    $sql4 = "select * from tbl_product WHERE id=$id";
                    $stmt4 = $conn->prepare($sql4);
                    $stmt4->execute();
                    $resul4 = $stmt4->fetch(PDO::FETCH_ASSOC);
                    $title_pro = $resul4['title'];
                    $price_pro = $resul4['price'];
                    $price_off = $resul4['price_off'];
                    $distance_pro = $resul4['distance'];
                    $number_available_pro = $resul4['number_available_product'];
                    $color_pro = $resul4['color'];
                    $color_pros = explode(',', $color_pro);
                    $garantee_pro = $resul4['garantee'];
                    $garantee_pros = explode(',', $garantee_pro);


                    echo '<input class="tit_category" type="text" value="' . $title_pro . '" name="title_product">';
                } else {
                    echo '<input class="tit_category" type="text" name="title_product">';
                }
                ?>

            </div><!--row_form-->


            <div class="row_form" id="select_categor">
                <p class="onvan_category">انتخاب دسته اصلي :</p>
                <select class="select" name="select_category" id="scr_select_category">
                    <option class="option">انتخاب کنيد</option>
                    <?php
                    include('connect.php');
                    $sql = "select * from tbl_category WHERE parent=0";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $title_category = $result['title'];
                        $id_category = $result['id'];
                        echo '<option class="option" value="' . $id_category . '">' . $title_category . '</option>';
                    }

                    if ($edit == 1) {
                        $sql7 = "select category from tbl_product WHERE id='$id' ";
                        $stmt7 = $conn->prepare($sql7);
                        $stmt7->execute();
                        $result7 = $stmt7->fetch(PDO::FETCH_ASSOC);
                        $id_category_pro = $result7['category'];


                        $sql8 = "select * from tbl_category WHERE id='$id_category_pro' ";
                        $stmt8 = $conn->prepare($sql8);
                        $stmt8->execute();
                        $result8 = $stmt8->fetch(PDO::FETCH_ASSOC);
                        $title_category_pro = $result8['title'];


                        echo '<option class="option" value="' . $id_category_pro . '" selected="' . $title_category_pro . '">         
                        ' . $title_category_pro . '</option>';
                    } else {

                    }


                    ?>
                </select>
                <?php


                ?>


            </div><!--row_form-->


            <div class="row_form">
                <p class="onvan_category">قیمت :</p>
                <?php
                if ($edit == 1) {
                    echo ' <input class="tit_category" type="text" value="' . $price_pro . '" name="price_product">';
                } else {
                    echo ' <input class="tit_category" type="text" name="price_product">';
                }
                ?>

            </div><!--row_form-->
            <div class="show_img"></div>
            <div class="row_form">
                <p class="onvan_category">مبلغ تخفیف:</p>
                <?php
                if ($edit == 1) {
                    echo '<input class="tit_category" type="text"  value="' . $price_off . '" name="price_off">';
                } else {
                    echo '<input class="tit_category" type="text" name="price_off">';
                }
                ?>

            </div><!--row_form-->
            <div class="row_form">
                <p class="onvan_category">انتخاب تصویر محصول:</p>
                <input type="file" name="myfile" class="tit_category">


            </div><!--row_form-->

            <p class="onvan_category">معرفی اجمالی محصول :</p>

            <div class="row_form" style="height: 450px;margin-top:10px">
                <?php
                if ($edit == 1) {
                    $sql9 = "select distance from tbl_product WHERE id='{$id}'";
                    $stmt9 = $conn->prepare($sql9);
                    $stmt9->execute();
                    $result9 = $stmt9->fetch(PDO::FETCH_ASSOC);
                    $title_distance = $result9['distance'];
                    echo '<textarea class="textarea" name="distance" id="editor1"  rows="100" cols="80">' . $title_distance . '</textarea>';
                } else {
                    echo '<textarea class="textarea" name="distance" id="editor1" rows="100" cols="80"></textarea>';
                }
                ?>

            </div><!--row_form-->
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
            <div class="row_form">
                <p class="onvan_category">تعداد موجود :</p>
                <?php
                if ($edit == 1) {
                    echo '<input class="tit_category" type="text" value="' . $number_available_pro . '" name="number_available_product">';
                } else {
                    echo '<input class="tit_category" type="text" name="number_available_product">';
                }
                ?>

            </div><!--row_form-->

            <div class="row_form_color">
                <p class="onvan_category">رنگ محصول :</p>
                <select class="select" id="colorSelector" name="select_color">
                    <option class="option">انتخاب رنگ محصول</option>

                    <?php
                    $sql2 = "select * from tbl_colors";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->execute();
                    while ($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        $color = $result2['name_color'];
                        $id_color = $result2['id'];
                        echo '
                    <option class="option" value="' . $id_color . '"> ' . $color . '</option>
                    ';

                    }
                    ?>

                </select>
                <?php

                if ($edit == 1) {
                    $col = array();
                    foreach ($color_pros as $co) {
                        $sql5 = "select * from tbl_colors WHERE id='{$co}' ";
                        $stmt5 = $conn->prepare($sql5);
                        $stmt5->execute();
                        $result5 = $stmt5->fetch(PDO::FETCH_ASSOC);
                        $col[] = $result5['name_color'];
                        $id_pro_col[] = $result5['id'];
                    }
                    foreach ($col as $color_selected) {
                        echo '<div class="div_item_color">' . $color_selected . '<i class="remove_item" onclick="removeitem(this)"></i></div>';
                    }

                    foreach ($id_pro_col as $id_pro) {
                        echo ' <input type="hidden" value=' . $id_pro . ' name="color_product[]">';
                    }

                } else {

                }
                ?>


            </div><!--row_form_color-->


            <div class="row_form_garantee">
                <p class="onvan_category">گارانتی :</p>
                <select class="select" id="garanteeSelector" name="select_garantee">
                    <option class="option">انتخاب گارانتی</option>
                    <?php
                    $sql3 = "select * from tbl_garantee";
                    $stmt3 = $conn->prepare($sql3);
                    $stmt3->execute();
                    while ($result3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                        $id_garantee = $result3['id'];
                        $title_garantee = $result3['title_garantee'];

                        echo '<option class="option" value="' . $id_garantee . '"> ' . $title_garantee . '</option>';
                    }
                    ?>
                </select>
                <?php
                if ($edit == 1) {
                    foreach ($garantee_pros as $gara) {
                        $gara_pro = array();
                        $sql6 = "select * from tbl_garantee WHERE id='{$gara}' ";
                        $stmt6 = $conn->prepare($sql6);
                        $stmt6->execute();
                        $result6 = $stmt6->fetch(PDO::FETCH_ASSOC);
                        $gara_pro[] = $result6['title_garantee'];
                        $id_gara_pro[] = $result6['id'];


                        foreach ($gara_pro as $garantee_selected) {
                            echo '<div class="div_item_garantee">' . $garantee_selected . '<i class="remove_item" onclick="removeitem2(this)"></i></div>';
                        }

                        foreach ($id_gara_pro as $id_pro_ga) {
                            echo ' <input type="hidden" value=' . $id_pro_ga . ' name="id_garantee[]">';
                        }
                    }
                } else {
                }
                ?>


            </div><!--row_form_garantee-->
            <div class="container" style="width: 920px;padding: 0px;margin: 0px;">
                <div class="row">
                    <div class="col-lg-1">

                        <button class="btn btn-outline-success"
                                style="font-family: Yekan;font-size: 12pt;float: left;width: 150px;margin-left: 70px;
                           margin-top:980px;">
                            ایجاد محصول جدید
                        </button>

                    </div>

                </div>
                <br>
            </div>
        </form>

        <?php
        if ($edit == 1) {
            if (isset($_POST['ok'])) {
                $title_product = $_POST['title_product'];
                $price_product = $_POST['price_product'];
                $price_off_product = $_POST['price_off'];
                $distance = $_POST['distance'];
                $number_available_product = $_POST['number_available_product'];
                $select_category = $_POST['select_category'];
                $select_color = $_POST['select_color'];
                $color_product = $_POST['color_product'];
                $color_products = join(',', $color_product);
                $select_garantee = $_POST['select_garantee'];
                $id_garantee = $_POST['id_garantee'];
                $id_garantees = join(',', $id_garantee);

                $sql10 = "update tbl_product set title='$title_product ',price='$price_product',price_off='$price_off_product',distance='$distance ',number_available_product='$number_available_product',
category='$select_category',color='$color_products',garantee='$id_garantees' WHERE id='$id'";
                $stmt10 = $conn->prepare($sql10);
                $stmt10->execute();
            }
        } else {


            if (isset($_POST['ok'])) {
                $title_product = $_POST['title_product'];
                $select_category = $_POST['select_category'];
                $price_product = $_POST['price_product'];
                $price_off = $_POST['price_off'];
                $distance = $_POST['distance'];
                $number_available_product = $_POST['number_available_product'];
                @$color_product = $_POST['color_product'];
                @$color_products = join(',', $color_product);
                @$id_garantee = $_POST['id_garantee'];
                @$id_garantees = join(',', $id_garantee);


                if (empty($_POST['title_product'])) {

                } else {
                    $sql1 = "insert into tbl_product (title,category,price,price_off,distance,number_available_product,color,garantee)
 VALUES ('" . $title_product . "','" . $select_category . "','" . $price_product . "','" . $price_off . "','" . $distance . "','" . $number_available_product . "','" . $color_products . "','" . $id_garantees . "' )";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->execute();
                    $productid = $conn->lastInsertId();

                }

            }

        }


        if (isset($_FILES['myfile'])) {
            $file = $_FILES['myfile'];
            $fileName = $file['name'];
            $fileSize = $file['size'];
            $filetmp = $file['tmp_name'];
            $fileType = $file['type'];
            $fileError = $file['error'];
            $name = time();
            mkdir('file /' . $productid . '/');
            $targetmain = 'file/';
            if ($fileType == 'image/jpg' or $fileType == 'image/jpeg' or $fileType == 'image/png') {
                $uploadok = 1;
            } else {
                $uploadok = 0;
            }

//            if ($fileSize > 5120000) {
//                'bigsize';
//            } else {
//                'ok';
//            }


            if ($uploadok == 1) {
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                $target = $targetmain . '/' . $productid . '/' . $name . '.' . $ext;
                $ne= $name . '.' . $ext;
                move_uploaded_file($filetmp, $target);
                $sql11="update tbl_product set img='$ne' WHERE id=$productid ";
                $stmt=$conn->prepare($sql11);
                $stmt->execute();
                ob_clean();
                header('location:admin_product.php');
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

    $("#scr_select_category").on('change', function () {
        var idcategory = $(this).val();

        $('#select_categor').append("<input type='hidden' value=" + idcategory + " name='select_categor'>");
    });

    $("#colorSelector").on('change', function () {
        var idcolor = $(this).val();
        var title_color = $(this).find('option:selected').text();

        $('.row_form_color').append("<div class='div_item_color'>" + title_color + " <input type='hidden' value=" + idcolor + " name='color_product[]'><i class='remove_item' onclick='removeitem(this)'></i> </div>");
    });

    function removeitem(tag) {
        $(tag).parents('.div_item_color').remove();
        2

    }


    $("#garanteeSelector").on('change', function () {
        var id_garantee = $(this).val();
        var title_garantee = $(this).find('option:selected').text();

        $('.row_form_garantee').append("<div class='div_item_garantee'>" + title_garantee + " <i class='remove_item' onclick='removeitem2(this)'></i> <input type='hidden' value=" + id_garantee + " name='id_garantee[]'></div>");
    });

    function removeitem2(tag) {
        $(tag).parents('.div_item_garantee').remove();

    }
</script>

</body>
</html>