<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>فروشگاه اینترنتی دیجی کالا</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.flipTimer.js"></script>
    <link rel="stylesheet" href="css/flipTimer.css">


</head>

<body style="direction: rtl">

<?php
include ('top.php');
?>


<div id="main">

    <div id="baner">
        <img style="width: 100%;height: 100%;" src="images/menutop-pic.jpeg">
    </div><!--baner-->

    <div id="col-left">
        <div id="slider">
            <span class="prev"></span>
            <span class="next"></span>
            <div id="slider-img">

                <?php

                include('connect.php');

                $sql = "select * from tbl_slider1";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $img = $result['img'];
                    echo '<a class="item">
                    <img src="' . $img . '">
                </a>';
                }

                ?>

            </div><!--slider-img-->
            <div id="slider-navigation">
                <ul>
                    <li>
                        <a>لوازم پذیرایی</a>
                    </li>
                    <li>
                        <a>آرایشی بهداشتی</a>
                    </li>
                    <li>
                        <a>خرید به صرفه</a>
                    </li>
                    <li>
                        <a>لوازم ورزشی</a>
                    </li>
                    <li>
                        <a>آرایشی بهداشتی</a>
                    </li>

                </ul>

            </div><!--slider-navigation-->

        </div><!--slider-->


        <div class="service-feature" style="float: right;">
            <ul style="float: right;">
                <li>
                    <i1></i1>
                    <a> 7 روز ضمانت بازگشت کالا</a>

                </li>
                <li>
                    <i2></i2>
                    <a> پرداخت در محل</a>

                </li>
                <li>
                    <i3></i3>
                    <a>ضمانت اصل بودن کالا</a>

                </li>
                <li>
                    <i4></i4>
                    <a>تحویل اکسپرس</a>

                </li>
                <li>
                    <i5></i5>
                    <a> تضمین بهترین قیمت</a>

                </li>
            </ul>
        </div><!--service-feature-->


        <div class="slider2">
            <div class="finished"></div><!--finished-->
            <div class="finished2"><p>تمام شد!</p></div><!--finished2-->

            <div class="flipTimer">
                <div class="hours"></div>
                <div class="minutes"></div>
                <div class="seconds"></div>
            </div>


            <?php
            $sql = "select * from tbl_product";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $special_time = $result['special_time'];


            $sql = "select * from tbl_option";
            $stmt2 = $conn->prepare($sql);
            $stmt2->execute();
            $result2 = $stmt2->fetch();
            $time_value = $result2['value'];

            $time_end = $special_time + $time_value;
            date_default_timezone_set('Asia/Tehran');
            $date = date('F d,Y H:i:s', $time_end);

            ?>
            <script>
                $('.flipTimer').flipTimer({
                    direction: 'down',
                    date: '<?php echo $date ?>',
                    callback: function () {
                        $('.slider2-right').addClass('finished');
                        $('.finished2 p').css('display', 'block');
                        $('.flipTimer').addClass('finished');

                    }
                });

            </script>


            <div class="slider-navigation2">
                <ul>
                    <?php
                    include('connect.php');
                    $sql = "select * from tbl_product WHERE special=1";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        $nav = $result['title'];
                        echo '<li><a>' . $nav . '</a></li>';
                    }
                    ?>


                </ul>
            </div><!--slider-navigation2-->


            <div class="slider2-right">
                <?php
                include('connect.php');



                $sql = "select * from tbl_product WHERE special=1";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $title = $result['title'];
                    $price_slider = $result['price_slider'];
                    $price_off_slider = $result['price_off_slider'];
                    $img = $result['img'];
                    $id = $result['id'];



                    echo '<a class="item2" href="product.php?id='.$id.' "  target="_blank">
                    <p>جشنواره شگفت انگیز</p>
                    <div class="price-info">
                        <div class="price-info-old"><span>' . $price_slider . '</span></div><!--price-info-old-->
                        <div class="price-info-new"><span>' . $price_off_slider . ' هزار تومان</span></div><!--price-info-new-->
                    </div><!--price-info-->
                    <div class="tozihat-kotah">
                        <p>تعداد:11 پارچه</p>
                        <p>جنس : گرانیت</p>
                        <p>رنگ بندی:قرمز،آبی،بنفش،صورتی،سبز</p>
                    </div><!--tozihat-kotah-->

                    <div class="title">
                        <p>' . $title . '</p>
                    </div><!--title-->
                    <img class="slider2-img" src=file/'.$id.'/' . $img . '>
                </a>';
                }

                ?>


            </div><!--slider2-right-->
        </div><!--slider2-->


        <div class="slider_scroll">

            <h3>فقط در دیجی کالا</h3>

            <div class="sliderscroll_content">

                <div class="sliderscroll_prev">
                    <span class="prev2" onclick="sliderscroll('prev',this);"></span>
                </div><!--sliderscroll_prev-->

                <div class="sliderscroll_main">
                    <ul>
                        <?php
                        $sql = "select * from tbl_option WHERE setting='limit'";
                        $stmt3 = $conn->prepare($sql);
                        $stmt3->execute();
                        $result3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                        $limit = $result3['value'];


                        $sql = "select * from tbl_product WHERE only_in_digikala=1 limit " . $limit . "";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $img = $result['img'];
                            $title = $result['title'];
                            $price = $result['price'];
                            $id=$result['id'];

                            echo '
                        <li>
                            <a>
                                <img style="max-width:180px;max-height:130px;margin: auto;display: block;" src="file/'.$id.'/' . $img . ' ">
                                <br>
                                <img style="position: absolute;bottom: 95px;right: 62px;" src="images/exclusive-blue.png">
                                <span class="title1">' . $title . '</span>
                                <span class="price1">' . $price . '  تومان</span>
                            </a>
                        </li>';
                        };
                        ?>
                    </ul>


                </div><!--sliderscroll_main-->

                <div class="sliderscroll_next">
                    <span class="next2" onclick="sliderscroll('next',this);"></span>
                </div><!--sliderscroll_next-->

            </div><!--sliderscroll_content-->

        </div><!--slider_scroll-->


        <a>
            <img class="direct-acces" src="images/direct-access1.jpg">
        </a>

        <a>
            <img class="direct-acces-large" src="images/direct-access2.jpg">
        </a>
        <a>
            <img style="width:300px;height: 190px; margin-top: 8px;border-radius: 4px;" src="images/direct-access3.jpg">
        </a>
        <a>
            <img style="width: 295px;height: 190px;margin-right: 5px;border-radius: 4px;  margin-top: 8px;"
                 src="images/direct-access4.jpg">
        </a>
        <a>
            <img style="width: 295px;height: 190px;margin-right: 5px;border-radius: 4px; margin-top: 8px;"
                 src="images/direct-access5.jpg">
        </a>


        <div class="slider_scroll">

            <h3>پرفروش ترین ها</h3>

            <div class="sliderscroll_content">

                <div class="sliderscroll_prev">
                    <span class="prev2" onclick="sliderscroll('prev',this);"></span>
                </div><!--sliderscroll_prev-->

                <div class="sliderscroll_main">
                    <ul>
                        <?php
                        $sql = "select * from tbl_option WHERE setting='limit'";
                        $stmt3 = $conn->prepare($sql);
                        $stmt3->execute();
                        $result3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                        $limit = $result3['value'];


                        $sql = "select * from tbl_product ORDER BY VIEW DESC limit " . $limit . "";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $img = $result['img'];
                            $title = $result['title'];
                            $price_slider = $result['price_slider'];

                            echo ' <li>
                            <a>
                                <img src="' . $img . '">
                                <img src="images/exclusive-blue.png">
                                <span class="title1">' . $title . '</span>
                                <span class="price1">' . $price_slider . '  تومان</span>
                            </a>
                        </li>';
                        };
                        ?>


                    </ul>


                </div><!--sliderscroll_main-->

                <div class="sliderscroll_next">
                    <span class="next2" onclick="sliderscroll('next',this);"></span>
                </div><!--sliderscroll_next-->

            </div><!--sliderscroll_content-->

        </div><!--slider_scroll-->


        <div class="slider_scroll">

            <h3>جدید ترین ها</h3>

            <div class="sliderscroll_content">

                <div class="sliderscroll_prev">
                    <span class="prev2" onclick="sliderscroll('prev',this);"></span>
                </div><!--sliderscroll_prev-->

                <div class="sliderscroll_main">
                    <ul>
                        <?php
                        $sql = "select * from tbl_option WHERE setting='limit'";
                        $stmt4 = $conn->prepare($sql);
                        $stmt4->execute();
                        $result4 = $stmt4->fetch(PDO::FETCH_ASSOC);
                        $limit = $result4['value'];


                        $sql = "select * from tbl_product ORDER BY id DESC limit " . $limit . " ";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $img = $result['img'];
                            $title = $result['title'];
                            $price_slider = $result['price_slider'];

                            echo '   <li>
                            <a>
                                <img src="' . $img . '">
                                <img src="images/exclusive-blue.png">
                                <span class="title1">' . $title . '</span>
                                <span class="price1"> ' . $price_slider . '  تومان</span>
                            </a>
                        </li>';
                        };
                        ?>
                    </ul>


                </div><!--sliderscroll_main-->

                <div class="sliderscroll_next">
                    <span class="next2" onclick="sliderscroll('next',this);"></span>
                </div><!--sliderscroll_next-->

            </div><!--sliderscroll_content-->

        </div><!--slider_scroll-->


    </div><!--col-left-->


    <div id="col-right">
        <span1><img src="images/kalaye-meli.png" style="width: 273px;height: 59px;overflow: hidden;"></span1>
        <ul id="digikala-tv">
            <li><a style="display: block;position: relative; margin-top:-6px;">
                    <img style="width: 100%;height: 160px;border-radius: 3px;margin: 0px 0;"
                         src="images/impact-of-technology.jpg">
                    <span class="circle">
                        <img style="text-align: center;margin-right: 10px;margin-top: 12px;"
                             src="images/play-button.png">
                    </span>
                </a></li>

            <li><a style="display: block;position: relative;">
                    <img style="width: 100%;height: 160px;border-radius: 3px;margin: 0px 0;" src="images/tv2.jpg">
                    <span class="circle">
                        <img style="text-align: center;margin-right: 10px;margin-top: 12px;"
                             src="images/play-button.png">
                    </span>
                </a></li>
        </ul><!--digikala-tv-->


        <ul id="tablighat-right">
            <li>
                <a>
                    <img class="img" src="images/chamedoon.jpg">
                </a>
            </li>

            <li>
                <a>
                    <img class="img" src="images/shoes.jpg">
                </a>
            </li>

            <li>
                <a>
                    <img class="img" src="images/AEG.jpg">
                </a>
            </li>
        </ul><!--tablighat-right-->

        <div id="last-news-right">
            <h3>تازه ترین خبرها</h3>
            <ul>
                <li>
                    <a>
                        <div id="news-right">
                            <div class="img-last-news">
                                <img class="img-last-news1" src="images/apple.jpg">
                            </div><!--img-last-news-->
                            <div class="matn-last-news">
                                <p>
                                    اپل درصدد عرضه نسل جدید مک بوک ایر و مک مینی است
                                </p>
                                <p style="color: #ccc2b8;font-size: 9.5pt;">
                                    پنج شنبه 10 تیر 1397
                                </p>
                            </div><!--matn-last-news-->
                        </div><!--news-right-->
                    </a>
                </li>


                <li>
                    <a>
                        <div id="news-right">
                            <div class="img-last-news">
                                <img class="img-last-news1" src="images/car-electric.jpg">
                            </div><!--img-last-news-->
                            <div class="matn-last-news">
                                <p>
                                    خودروی خودران نورو برای تحویل مواد غذایی در آریزونا، عملیاتی می‌شود
                                </p>
                                <p style="color: #ccc2b8;font-size: 9.5pt;">
                                    شنبه 15 تیر 1397
                                </p>
                            </div><!--matn-last-news-->
                        </div><!--news-right-->
                    </a>
                </li>

                <li>
                    <a>
                        <div id="news-right">
                            <div class="img-last-news">
                                <img class="img-last-news1" src="images/mobile.jpg">
                            </div><!--img-last-news-->
                            <div class="matn-last-news">
                                <p>
                                    شیائومی پوکوفون F1 رونمایی شد؛ اسنپدراگون 845 و قیمت ۳۰۰ دلاری
                                </p>
                                <p style="color: #ccc2b8;font-size: 9.5pt;">
                                    دوشنبه 31 تیر 1397
                                </p>
                            </div><!--matn-last-news-->
                        </div><!--news-right-->
                    </a>
                </li>

                <li>
                    <a>
                        <div id="news-right">
                            <div class="img-last-news">
                                <img class="img-last-news1" src="images/paint.jpg">
                            </div><!--img-last-news-->
                            <div class="matn-last-news">
                                <p>
                                    هوش هیجانی خود را با سه سؤال بهبود دهید
                                </p>
                                <p style="color: #ccc2b8;font-size: 9.5pt;">
                                    دوشنبه 31 تیر 1397
                                </p>
                            </div><!--matn-last-news-->
                        </div><!--news-right-->
                    </a>
                </li>

            </ul>

        </div><!--last-news-right-->

        <div id="brands">
            <a>
                <img src="images/samsung.png">
            </a>
            <a>
                <img src="images/xvition.png">
            </a>
            <a>
                <img src="images/adata.png">
            </a>
            <a>
                <img src="images/lg2.png">
            </a>
            <a>
                <img src="images/pars-khazar.png">
            </a>
            <a>
                <img src="images/panason.png">
            </a>

        </div><!--brands-->
    </div><!--col-right-->


</div><!--main-->


<?php
include('footer.php');
?>
<?php
include
('script-menu.php');
?>

<?php
include
('script-slider.php');
?>
<?php
include
('script-slider2.php');
?>
<?php
include
('script-slider-scroll.php');
?>


</body>
</html>