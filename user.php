<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title> شیوه ارسال کالا</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>


</head>
<body style="direction: rtl">
<?php
include ('top.php');
?>
<?php
if (isset($_SESSION['login'])){
    ob_clean();
    header('location:user2.php');
}



?>
<div id="main-user">
    <div class="order-steps">
        <ul>
            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>

            <li class="active"><span class="circle"></span><span class="line2"></span> <span class="title active">ورود به دیجی کالا </span></li>
            <li><span class="circle_gray"></span><span class="line2"></span> <span class="title">اطلاعات ارسال سفارش</span></li>
            <li><span class="circle_gray"></span><span class="line2"></span> <span class="title">بازبینی سفارش</span></li>
            <li style="width: 33px !important;"><span class="circle_gray"></span> <span class="title" style="width: 100px;">اطلاعات پرداخت </span></li>

            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
        </ul>
    </div><!--order-steps-->
    <div class="content">
<div class="right">
    <br>
    <i></i>
    <p>عضو دیجی کالا هستید؟</p>
    <span>برای تکمیل فرایند خرید خود وارد شوید</span>
    <a href="login.php" class="btn-blue">ورود به دیجی کالا</a>
</div>
<div class="left">
    <br>
    <i></i>
    <p>تازه وارد هستید؟</p>
    <span>برای تکمیل فرایند خرید خود ثبت نام کنید</span>
    <a href="register.php" class="btn-green">ثبت نام در دیجی کالا</a>
    <span style="width: 500px;font-size: 12pt;margin: auto;margin-top: 10px;">با عضویت در دیجی کالا تجربه متفاوتی از خرید اینترنتی داشته باشید.وضیعیت سفارش خود را پیگیری نموده و سوابق خریدتان را مشاهده کنید.</span>
</div>
    </div><!--content-->
</div><!--main-user-->


<footer>
    <div id="footer">
        <div class="footer-top">
            <div class="footer-top-main">
                <p> 7 روز هفته 24 ساعته پاسخگوی شما هستیم.</p>
                <ul>
                    <li>
                        <a>021-88523731
                            <i1></i1>
                        </a>

                    </li>
                    <li>
                        <a>سوالات متداول
                            <i2></i2>
                        </a>

                    </li>
                    <li>
                        <a>info@digikala.com
                            <i3></i3>
                        </a>

                    </li>
                </ul>
            </div><!--footer-top-main-->
        </div><!--footer-top-->
        <div class="footer-bottom">
            <div class="footer-bottom-right">
                <p>راهنمای خرید از دیجی‌کالا</p>
                <ul>
                    <li>
                        <a>نحوه ثبت سفارش</a>
                    </li>
                    <li>
                        <a>رویه ارسال سفارش</a>
                    </li>
                    <li>
                        <a>شیوه‌های پرداخت</a>
                    </li>
                </ul>
            </div><!--footer-bottom-right-->
            <div class="footer-bottom-center">
                <p>خدمات مشتریان</p>
                <ul>
                    <li>
                        <a>نحوه ثبت سفارش</a>
                    </li>
                    <li>
                        <a>رویه ارسال سفارش</a>
                    </li>
                    <li>
                        <a>شیوه‌های پرداخت</a>
                    </li>
                </ul>
            </div><!--footer-bottom-center-->
            <div class="footer-bottom-left">
                <p>اولین نفری که مطلع می شوید باشید!</p>
                <br>
                <span><input type="text" placeholder="آدرس ایمیل خود را وارد کنید"></span>
                <div class="btn"><p>تایید ایمیل</p></div>
                <div class="social">
                    <a><img src="images/android_app_bg.png"> </a>
                    <a><img src="images/android_app_bg.png"> </a>
                    <span class="social-icon"></span>
                    <span class="social-icon" style="background-position: -475px -545px;"></span>
                    <span class="social-icon" style="background-position: -345px -545px;"></span>
                    <span class="social-icon" style="background-position: -378px -545px;"></span>
                    <span class="social-icon" style="background-position: -315px -545px;"></span>
                </div><!--social-->
            </div><!--footer-bottom-left-->


        </div><!--footer-bottom-->
    </div><!--footer-->

</footer>


<?php
include
('script-menu.php');
?>


</body>
</html>