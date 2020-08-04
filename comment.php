<?php
session_start();
if (isset($_SESSION['login'])) {
    $user_id = $_SESSION['userid'];
} else {
    ob_clean();
    header('location:user.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="js/flat_slider_style.css">
    <link href="style.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/flat_slider.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نظر دادن</title>
</head>
<body dir="rtl">
<?php
include('top.php');
?>
<div class="main_comment">
    <div class="ranking">
        <div class="right">
            <img src="file/2/1566846853.jpg">
            <?php
            include('connect.php');
            @$id = $_POST['input_id'];

            $id_product = $_SESSION['idproduct'] = $id;
            $sql = "select * from tbl_product WHERE id='$id_product'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result_product = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_category = $result_product['category'];
            $title_pro = $result_product['title'];

            if (isset($_SESSION['title'])) {
                $tit = $_SESSION['title'];
                echo '<p class="name_product">' . $tit . '</p>';
            } else {
                echo '<p class="name_product">' . $title_pro . '</p>';
            }


            ?>


        </div><!--right-->
        <div class="left_main">
            <p style="font-family: Yekan;font-size: 14pt;margin: 0px;float: right;padding: 15px 30px;width: 100%;">
                امتیاز شما به این محصول</p>
            <div class="rightt">
                <form action="code_php_comment.php" method="post">

                    <input type="hidden" value="<?= $title_pro ?>" name="title_pro">

                    <input type="hidden" value="<?= $id_category ?>" name="id_cat">
                    <?php
                    $sql1 = "select * from tbl_comment_param WHERE idcategory='$id_category'";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->execute();
                    $result_comment_param = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                    //                    $length = sizeof($result_comment_param);
                    //استفاده از دستور array_slice
                    //                    $rank_right = ceil($length / 2);
                    //                    $rank_left = $length - $rank_right;
                    //                    $right = array_slice($result_comment_param, 0, $rank_right);
                    //                    $left = array_slice($result_comment_param, $rank_right, $rank_left);


                    foreach ($result_comment_param as $row) {
                        echo '<p>' . $row['title_param'] . '</p>
                      
                     <input type="hidden" id="slider_single" class="flat-slider" name="param[]"  value="3" >';
                    }
                    ?>

                    <?php

                    if (isset($_SESSION['i'])) {
                        $i = $_SESSION['i'];
                        $ic = $_SESSION['ic'];
                        $sql2 = "select * from tbl_comment WHERE idproduct='$i' AND user='$user_id' ";
                        $stmt2 = $conn->prepare($sql2);
                        $stmt2->execute();
                        $result_comment = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                        $sql3 = "select * from tbl_comment_param WHERE idcategory='$ic' ";
                        $stmt3 = $conn->prepare($sql3);
                        $stmt3->execute();
                        $result_param = $stmt3->fetchAll(PDO::FETCH_ASSOC);


                        foreach ($result_param as $row_param) {
                            echo '<p>' . $row_param['title_param'] . '</p>
                          <div class="v">
                     <input type="hidden" id="slider_single" name="param[]" class="flat-slider " value="" >
                     </div>';
                        }
                        foreach ($result_comment as $row_all) {
                            $param = $row_all['param'];
                            $paramm = unserialize($param);
                        }

                        foreach ($paramm as $p) {
                            echo ' <input type="hidden" name="f" value="' . $p . '">';
                        }

                    }
                    ?>
            </div><!--right-->

        </div><!--left_main-->
    </div><!--ranking-->

    <div class="comment">
        <span style="font-family: Yekan;padding-top:15px;padding-right:20px;width:98.5%;font-size: 14pt;display: block;">دیگران را با نوشتن نقد، بررسی و نظرات خود، برای انتخاب این محصول راهنمایی کنید</span>
        <br>
        <br>
        <?php
        if (isset($_SESSION['i'])) {
            $i = $_SESSION['i'];
            foreach ($result_comment as $row_comment) {

            }
        }


        ?>
        <p>عنوان نقد و بررسی شما (اجباری)</p>
        <input type="text" value="<?= @$row_comment['title'] ?>" name="title_review">
        <p style="color:green;">نقاط قوت</p>
        <input type="text" value="<?= @$row_comment['posetive'] ?>" name="positive">
        <p style="color:red;">نقاط ضعف</p>
        <input type="text" value="<?= @$row_comment['negative'] ?>" name="negative">
        <p> متن نقد و بررسی شما (اجباری)</p>
        <textarea name="text_review"><?= @$row_comment['matn'] ?></textarea>
        <button onclick="submit()">ثبت نظر</button>
    </div><!--comment-->


    </form>

</div><!--main_comment-->

<script>
    jQuery(function () {
        jQuery(".flat-slider").flatslider({
            min: 1,
            max: 5,
            step: 1,
            value: 3,
            range: "min"
        });
    });


    var w = $('.left_main .rightt input[name=f]').length;
    var x = 0;
    for (x; x < w; x++) {
        var e = $('.left_main .rightt input[name=f]').eq(x).val();
        $('.left_main .rightt .v .flat-slider').eq(x).val(e);

    }
    x++;

    function submit() {
        $('form').submit();
    }


</script>
<?php
include('footer.php');
?>
<?php
include
('script-menu.php');
?>
</body>
</html>