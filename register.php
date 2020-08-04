<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ثبت نام در دیجی کالا</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>


</head>
<body style="direction: rtl">
<?php
include('top.php');
?>


<div id="main-register">
    <div class="main-register1">
        <i></i>
        <p>به دیجی کالا بپیوندید</p>
        <div id="main-register-right">
            <span>پست الکترونیک</span>
            <input type="email" placeholder="email">
            <br>
            <br>
            <span>رمز عبور</span>
            <input type="password" placeholder="password">


            <div class="checkbox">
                <label class="label-border"></label>
                <input class="check-input" type="checkbox" style="width: 15px;">
                <p>شرایط و قوانین را به طور دقیق مطالعه نموده ام و موافقم.</p>
            </div><!--checkbox-->
            <div class="checkbox" style="margin-top: 0px;">
                <label class="label-border"></label>
                <input class="check-input" type="checkbox" style="width: 15px;">
                <p>ارسال خبر نامه دیجی کالا</p>
            </div><!--checkbox-->


            <div class="register-btn">
                <span2>ثبت نام در دیجی کالا</span2>
            </div>


        </div><!--main-register-right-->
        <div id="main-register-left">
            <ul>
                <i style="background-position: -981px -332px"></i>
                <li>سریع تر و ساده تر خرید کنید.</li>
                <i style="background-position: -981px -286px"></i>
                <li>به سادگی سوابق خرید و فعالیت های خود را مدیریت کنید.</li>
                <i style="background-position: -981px -245px"></i>
                <li>لیست علاقه مندی های خود را بسازید و تغیرات آنها را دنبال کنید.</li>
                <i style="background-position: -981px -203px"></i>
                <li>نقد بررسی و نظرات خود را با دیگران به استراک گذارید.</li>
                <i style="background-position: -981px -166px"></i>
                <li>در جریان فروش های ویژه و قیمت روز محصولات قرار بگیرید.</li>
            </ul>
        </div><!--main-register1-->

    </div><!--main-register-->


    <?php
    include ('footer.php');
    ?>

    <?php
    include
    ('script-menu.php');
    ?>
    <?php
    include
    ('script-checkbox.php');
    ?>


</body>
</html>