<html>
<head>

</head>
<body>

<footer>
    <div id="footer">
        <div class="footer-top">
            <div class="footer-top-main">
                <p> 7 روز هفته 24 ساعته پاسخگوی شما هستیم.</p>
                <ul>
                    <?php
                    include "connect.php";
                    $sql = "select * from tbl_option WHERE setting='tel'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    $tel = $result['value'];


                    ?>
                    <li>
                        <a><?php
                            echo $tel;
                            ?>
                            <i1></i1>
                        </a>

                    </li>
                    <li>
                        <a>سوالات متداول
                            <i2></i2>
                        </a>

                    </li>
                    <li>
                        <?php
                        $sql = "select * from tbl_option WHERE setting='email'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch();
                        $email = $result['value'];
                        ?>
                        <a>
                            <?php
                            echo $email;
                            ?>


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
</body>
</html>


