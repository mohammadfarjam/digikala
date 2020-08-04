<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>صفحه محصول مورد نظر</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/flipTimer.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.flipTimer.js"></script>
    <script src="js/jquery.elevatezoom2.js"></script>
    <script src="js/jquery.mCustomScrollbar.js"></script>
    <script src="js/jsc3d.js"></script>
    <script src="js/jsc3d.touch.js"></script>
    <script src="js/jsc3d.webgl.js"></script>

</head>
<body style="direction: rtl">

<div class="dark"></div>
<div id="product-gallery">
    <div class="top">گوشی HTC مدل m8
        <span class="closee"></span>
    </div>
    <div class="right">
        <canvas id="cv" width="799" height="490"></canvas>
        <img class="show-image" src="">
    </div><!--right-->
    <div class="left scroll">
        <ul>
            <li data-main-image="">
                <img src="images/iphone%20(2).jpg">
                <span class="icon3d"></span>
            </li>
            <li data-main-image="images/product/large/iphone%20org.jpg">
                <img src="images/iphone%20(2).jpg">
            </li>
            <li data-main-image="images/product/large/iphone2.jpg">
                <img src="images/iphone%20(3).jpg">
            </li>
            <li data-main-image="images/product/large/iphone3.jpg">
                <img src="images/iphone%20(4).jpg">
            </li>

        </ul>
    </div><!--left-->
</div><!--product-gallery-->
<?php
include('top.php');
?>


<div id="main-product">
    <?php
    include('connect.php');
    $idnumber = $_GET['id'];
    $sql = "select * from tbl_product WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $idnumber);
    $stmt->execute();
    $re = $stmt->fetch();
    $sp = $re['special'];
    if ($sp == 1) {
        include('offer.php');
    } else {

    }

    ?>

    <div id="details">
        <div class="details-right">
            <span class="share">
                <i class="social2"></i>
                <i class="favorite"></i>
            </span>
            <div class="gallery">
                <?php
                $sql = "select * from tbl_product WHERE id='{$idnumber}'";
                $stmt3 = $conn->prepare($sql);
                $stmt3->execute();
                $resu = $stmt3->fetch(PDO::FETCH_ASSOC);
                $img_orginal = $resu['img'];

                echo '
                <img id="zoom" style="width:350px;height:360px;text_align:center;" src="file/' . $idnumber . '/' . $img_orginal . '">';
                ?>


                <ul>

                    <li data-main-image="images/product/large/iphone%20org.jpg">
                        <img src="images/iphone%20(2-2).jpg">
                    </li>
                    <li data-main-image="images/product/large/iphone2.jpg">
                        <img src="images/iphone%20(3-3).jpg">
                    </li>
                    <li data-main-image="images/product/large/iphone3.jpg">
                        <img src="images/iphone%20(4-4).jpg">
                    </li>
                    <li data-main-image="images/product/large/iphone 4.jpg">
                        <img src="images/iphone%20(5-5).jpg"></li>
                    <span class="se-point"></span>
                </ul>
            </div><!--gallery-->
        </div><!--details-right-->
        <div class="details-left">
            <?php
            if (isset($_GET['id']))
                $idnumber = $_GET['id'];

            $sql = "select * from tbl_product  WHERE id='{$idnumber}'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $title = $result['title'];
            $price = $result['price'];
            $price_off = $result['price_off'];
            $total_price = $price - $price_off;
            $distance = $result['distance'];
            $idcategory = $result['category'];

            $color = $result['color'];
            //این دستورات برای دریافت رنگ محصول از دیتا بیس می باشد.
            $colors = explode(',', $color);
            $hex = array();
            $name_color = array();
            foreach ($colors as $c) {
                $sql = "select * from tbl_colors WHERE id='{$c}'";
                $stmt1 = $conn->prepare($sql);
                $stmt1->execute();
                $re = $stmt1->fetch(PDO::FETCH_ASSOC);
                $name_color[] = $re['name_color'];
                $hex[] = $re['hex'];
                $colorId[] = $re['id'];
            }

            //این دستورات برای دریافت گارنتی از دیتا بیس می باشد.
            $garantee = $result['garantee'];
            $garantee = explode(',', $garantee);
            $title_garantee = array();
            foreach ($garantee as $gara) {
                $sql = "select * from tbl_garantee WHERE id='{$gara}'";
                $stmt2 = $conn->prepare($sql);
                $stmt2->execute();
                $res = $stmt2->fetch(PDO::FETCH_ASSOC);
                $title_garantee[] = $res['title_garantee'];
                $id_garantee[] = $res['id'];
            }


            echo '<div class="title"><p>' . $title . '</p>
                <div class="stars">
                    <div class="star-b"></div>
                    <span>8 از 74 رای</span>
                </div><!--stars-->
            </div><!--title-->
            <div class="right">
                <div class="select-color">
                    <p>انتخاب رنگ</p>
                    <ul>
                       ';

            for ($i = 0; $i < count($hex); $i++) {
                echo ' <li><span data_Id_color="' . $colorId[$i] . '" class="circle" style="background:' . $hex[$i] . '"></span>' . $name_color[$i] . '</li>';
            }

            echo '
                </ul>
                </div><!--select-color-->

                <p>انتخاب گارانتی</p>
                <div class="garanty">
                    <span class="title-garanty">گارانتی محصول را انتخاب کنید</span>
                    <ul>';
            ?>

            <?php for ($m = 0; $m < count($title_garantee); $m++) {?>
                <li data_id_garantee="<?= $id_garantee[$m] ?>"><?= $title_garantee[$m] ?></li>
            <?php }?>

            <?php

            echo '</ul>

                </div><!--garanty-->

                <div id="price">
                    <span style="font-family: yekan;font-size: 12pt;line-height: 37px;display:inline-block;height: 100%;float:right;">قیمت :</span>
                    <span style="font-size: 13pt;font-family: yekan;margin-right:10px;text-decoration: line-through;line-height: 37px;float:right;height: 100%;display:inline-block;color: #ccc;">
                        ' . $price . '</span>
                    <span style="font-family: yekan;color: #ccc;float:right;height: 100%;font-size: 10pt;line-height: 37px;display:inline-block;">تومان</span>

                    <div class="discount">
                        <span class="discount1">تخفیف</span>
                        <span class="discount2">' . $price_off . ' هزار تومان</span>
                    </div><!--discount-->
                </div><!--price-->

                <div class="price-for-you">
                    <i class="img-price-for-you"></i>
                    <span>قیمت برای شما :</span>
                    <a>' . $total_price . '</a>
                    <b>تومان</b>
                </div><!--price-for-you-->
                <span class="compare">مقایسه کن</span>
                <span class="addtobascket" onclick="addtobasket(' . $idnumber . ');">اضافه به سبد خرید</span> ';

            ?>

            <script>
                var idgarantee;
                $('.garanty').click(function () {
                    $('ul', this).slideToggle(200);
                });
                $('.garanty ul li').click(function () {
                    var txt = $(this).text();
                    idgarantee = $(this).attr('data_id_garantee');
                    $('.garanty .title-garanty').text(txt);
                    });

                function addtobasket(idnumber) {

                    var Idcolor = $('.select-color').find('.circle.active').attr('data_Id_color');
                    var url = 'ajax.php';
                    var data = {idd: idnumber,tedad:1, color: Idcolor, garantee: idgarantee};
                    $.post(url, data, function (msg) {
                    });
                }

            </script>

        </div><!--right-->
        <div class="left"></div><!--left-->
        <div class="service-feature-product">
            <ul>
                <li>
                    <i style="background: url(images/calendar-7.png) no-repeat;margin-right: 8px;"></i>
                    <a> 7 روز ضمانت بازگشت کالا</a>

                </li>
                <li style="width: 125px;">
                    <i style="background: url(images/credit-card.png) no-repeat;"></i>
                    <a> پرداخت در محل</a>

                </li>
                <li style="width: 160px;">
                    <i style="background: url(images/checked.png) no-repeat;"></i>
                    <a>ضمانت اصل بودن کالا</a>

                </li>
                <li style="width: 130px;">
                    <i style="background: url(images/delivery-truck.png) no-repeat;"></i>
                    <a>تحویل اکسپرس</a>

                </li>
                <li style="width: 155px;">
                    <i style="background: url(images/cash.png) no-repeat;"></i>
                    <a> تضمین بهترین قیمت</a>

                </li>
            </ul>
        </div><!--service-feature-->
    </div><!--details-left-->
</div><!--details-->

<div class="introdoction">
    <span>معرفی اجمالی محصول</span>
    <div class="justi">

        <?php
        echo '' . $distance . '';
        ?>

    </div><!--justi-->
    <div class="more">ادامه مطلب</div><!--more-->

    <div class="close">بستن</div><!--close-->
</div><!--introdoction-->

<div class="slider_scroll2">

    <h3>جدید ترین ها</h3>


    <div class="sliderscroll_content" style="1200px;">

        <div class="sliderscroll_prev">
            <span class="prev2" onclick="sliderscroll2('prev',this);"></span>
        </div><!--sliderscroll_prev-->

        <div class="sliderscroll_main" style="width: 1120px;">
            <ul>
                <?php
                $sql = "select * from tbl_option WHERE setting='limit'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $limit = $result['value'];


                $sql = "select * from tbl_product WHERE only_in_digikala=1 limit " . $limit . " ";
                $stmt1 = $conn->prepare($sql);
                $stmt1->execute();
                while ($result1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                    $img = $result1['img'];
                    $title = $result1['title'];
                    $price = $result1['price'];
                    $id = $result1['id'];

                    echo '
                        <li style="width: 224px;">
                            <a>
                                <img style="max-width:180px;max-height:130px;margin: auto;display: block;" src="file/' . $id . '/' . $img . ' ">
                                <br>
                                <img style="position: absolute;bottom: 95px;right: 62px;" src="images/exclusive-blue.png">
                                <span class="title1">' . $title . '</span>
                                <span class="price1">' . $price . '  تومان</span>
                            </a>
                        </li>';

                }
                ?>


            </ul>


        </div><!--sliderscroll_main-->

        <div class="sliderscroll_next">
            <span class="next2" onclick="sliderscroll2('next',this);"></span>
        </div><!--sliderscroll_next-->

    </div><!--sliderscroll_content-->

</div><!--slider_scroll-->

<ul class="tab">
    <li class="naghd active">نقد و بررسی تخصصی</li>
    <li class="fani">مشخصات فنی</li>
    <li class="nazar">نظرات کاربران</li>
    <li class="soal">پرسش و پاسخ</li>
</ul>

<div class="tab-childs">

    <section style="display: block;">
        <div class="itemcontiner">


            <?php
            $sql = "select * from tbl_description WHERE id_product=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $idnumber);
            $stmt->execute();
            while ($rw = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $title = $rw['title'];
                $tozihat = $rw['tozihat'];

                echo '
                  <div class="item">
                   <h5>' . $title . '<i></i></h5>
                    <div class="description">
                    <p>' . $tozihat . '</p>
                    </div><!--description-->
                    </div><!--item-->';
            }
            ?>


        </div><!--itemcontiner-->
    </section>

    <section class="section-fani">
        <?php
        $sql = "select * from tbl_attr WHERE parent='0' AND idpro='$idnumber' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $title = $result['title'];
            $id = $result['id'];
            echo '<h6>' . $title . '</h6>';


            $sql2 = "select tbl_attr.*,tbl_product_attr.val from tbl_attr LEFT JOIN tbl_product_attr ON 
tbl_attr.id=tbl_product_attr.idattr   WHERE parent='$id' AND idpro='$idnumber' ";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();
            while ($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                $title2 = $result2['title'];
                $value = $result2['val'];

                echo '
                <span class="right">' . $title2 . '</span>
                <span class="left">' . $value . '</span>';
            }
        }
        ?>

    </section>

    <section class="comment">
        <div class="comment-result">
            <p>امتیاز دهی کاربران به :</p>
            <span>گوشی موبایل HTC one</span>

            <?php
            $sql = "select * from tbl_comment_param WHERE idcategory=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $idcategory);
            $stmt->execute();
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $title_points = $result['title_param'];


                echo ' <div class="row">
                    <p class="title">' . $title_points . '</p>
                    <ul>
                        <li><span></span></li>
                    </ul>
                </div><!--row-->';
            };
            ?>


        </div><!--comment--result-->
        <div class="comment-send">
            <p>شما هم میتوانید در مورد این کالا نظر دهید.</p>
            <p>برای ثبت نظرات و نقد و بررسی شما لازم است ابتدا وارد حساب کاربری خود شوید.اگر این محصول را قبلا از

                دیجی کالا خریده باشید نظر شما به عنوان مالک محصول ثبت خواهد شد.</p>
            <a onclick="sub()">نظر خود را بنویسید</a>

            <form action="comment.php" method="post">
                <input type="hidden" value="<?=$idnumber?>" name="input_id">
            </form>
<script>
    function sub() {
        $('form').submit();

    }
</script>
        </div><!--comment--send-->
        <p style="width: 100%;height: 30px;font-family: yekan;font-size: 13pt;margin: 0;float: right;padding-right: 21px;margin-bottom: 5px;">
            نظرات کاربران</p>
        <span style="width: 97%;height: 3px;background: #eeeeee;display: block;float: right; margin-right: 19px;margin-bottom: 20px;"></span>


        <div class="comment-content">


            <?php


            $sql = "select * from tbl_comment WHERE idproduct='{$idnumber}'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $user = $result['user'];
                $date = $result['date'];
                $likecount = $result['likecount'];
                $deslikecount = $result['deslikecount'];
                $title3 = $result['title'];
                $posetive = $result['posetive'];
                $negative = $result['negative'];
                $matn = $result['matn'];
                $param = $result['param'];
                $scores = unserialize($param);
                print_r($scores);


                echo '
                  <div class="head">
                    <i></i>
                    <span class="name">' . $user . '</span>
                    <span class="date">' . $date . ' </span>
                    <span class="title">آیا این نظر برایتان مفید بود؟</span>
                    <span class="like"><img>' . $likecount . '</span>
                    <span class="delike"><img>' . $deslikecount . '</span>';

                echo '
                </div><!--head-->
                 <div class="mohtava">
                    <div class="right">
                ';

                $sql2 = "select * from tbl_comment_param WHERE idcategory= $idcategory ";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute();
                $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                $title_points2 = $result2['title'];

                echo '
    
                        <div class="row">
                            <p>' . $title_points2 . '</p>
                            <ul>
                                <li><span></span></li>
                                <li></li>
    
    
                            </ul>
                        </div><!--row-->';


                echo '
    
                </div><!--right-->
    
                <div class="left">
    
                    <div class="center">
                        <span class="onvane-comment">' . $title3 . '</span>
                        <p style="width: 100px;color: green;font-family: yekan;font-size: 12pt;margin: 0px;margin-right: 55px;">
                            نقاط قوت</p>
                        <span class="comment-ghovat">' . $posetive . '</span>
                        <p style="width: 100px;color: red;font-family: yekan;font-size: 12pt;margin: 0px;float: left;height: 30px;position: absolute;left:250px;top: 34px;">
                            نقاط ضعف</p>
                        <span class="comment-zaef">' . $negative . '</span>
                    </div><!--center-->
                    <div class="comment-asli">
                        <p>' . $matn . '</p>
                    </div><!--comment-asli-->
                </div><!--left-->
    ';
            };
            ?>
        </div><!--mohtava-->
    </section><!--comment-->


    <section class="question">
        <p>پرسش خود را مطرح نمایید</p>
        <textarea class="textarea-guestion" placeholder="متن پرسش خود را اینجا بنویسید..."></textarea>
        <span class="save-question">ثبت پرسش</span>


        <div class="question-content">

            <p>پرسش ها و پاسخ ها</p>
            <?php

            $sql = "select * from tbl_questions WHERE parent=0 AND id_product='$idnumber' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($question = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $user_id = $question['user'];
                $date_question = $question['date'];
                $matn_question = $question['matn'];
                $id_question = $question['id'];


                $sql2 = "select * from tbl_questions WHERE parent='$id_question' AND id_product='$idnumber'";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute();
                $anwser = $stmt2->fetch(PDO::FETCH_ASSOC);
                $matn_anwser = $anwser['matn'];

                echo '   <span class="head"><img>
                   <a>پرسش</a>
                        <span class="date">' . $date_question . ' </span>
                        <span class="name">' . $user_id . '-</span>
                        </span>
           <div class="content">' . $matn_question . '</div><!--content-->

            <div class="anwser-content">

                    <a>پاسخ:</a>
         <div class="anwser_cont">' . $matn_anwser . '</div><!--anwser-cont-->
        </div><!--anwser-content-->';
            };
            ?>
        </div><!--question-content-->
        <span style="width: 97%;height: 3px;background: #eeeeee;display: block;float: right; margin-right: 19px;margin-bottom: 20px;margin-top: 15px;"></span>


    </section><!--question-->


    ‍
</div><!--tab-childs-->
</div><!--main-product-->


<?php
include
('footer.php');
?>

<?php
include
('script-menu.php');
?>
<?php
include
('script-product.php');
?>
<?php
include
('script-slider-scroll.php');
?>

</body>
</html>