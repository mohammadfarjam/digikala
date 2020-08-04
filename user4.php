<?php
session_start();
if (isset($_SESSION['login'])){
}
else{
    ob_clean();
    header('location:user.php');
}
$pay=$_SESSION['pay'];
include ('jdf.php');

$date=jdate('Y/m/d','','','','en');

?>



<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>اطلاعات پرداخت</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
</head>
<body style="direction: rtl">
<?php
require ('top.php');
?>

<div id="main-user">


    <div class="order-steps">
        <ul>
            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>

            <li class="active"><span class="circle circle_active"></span><span class="line2 active"></span> <span
                        class="title active">ورود به دیجی کالا </span></li>
            <li class="active"><span class="circle circle_active"></span><span class="line2 active"></span> <span
                        class="title active">اطلاعات ارسال سفارش</span></li>
            <li class="active"><span class="circle circle_active"></span><span class="line2 active"></span> <span class="title active">بازبینی سفارش</span>
            </li>
            <li style="width: 33px !important;" class="active"><span class="circle"></span> <span class="title active"
                                                                                        style="width: 100px;">اطلاعات پرداخت </span>
            </li>

            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
        </ul>
    </div><!--order-steps-->
    <div class="code-discount">
        <p>کد تخفیف :</p>
        <table>
            <tr>
                <td rowspan="2" style="width: 775px;font-size: 11pt;padding-right: 5px;">کد تخفیف دیجی کالا دارم<br>
                    اگر مایل هستید از کد تخفیف دیجی کالا استفاده کنید کافیست کد آن را وارد کرده و با انتخاب دکمه ثبت
                    مبلغ آن از هزینه قابل پرداخت شما کسر میگردد.
                </td>
                <td style="text-align: center;"><input placeholder="کد تخفیف را وارد کنید" style="padding-right: 7px;" id="code" value=""></td>
                <td class="btn-discount" onclick="check_code_discount();">ثبت کد تخفیف</td>
            </tr>
        </table>
    </div><!--code-discount-->



    <div class="cart-gift">
        <p>کارت هدیه :</p>
        <table>
            <tr>
                <td rowspan="2" style="width: 775px;font-size: 11pt;padding-right: 5px;">کارت هدیه دیجی کالا دارم<br>
                    اگر مایل هستید از کارت هدیه دیجی کالا استفاده کنید کافیست کد آن را وارد کرده و با انتخاب دکمه ثبت
                    مبلغ آن از هزینه قابل پرداخت شما کسر میگردد.
                </td>
                <td style="text-align: center;"><input></td>
                <td style="background: green;" class="btn-null">ثبت کارت هدیه</td>
            </tr>
        </table>
    </div><!--cart-gift-->
    <span class="payment-done">
    <p>مبلغ قابل پرداخت </p>
<form action="save_order.php" method="post" class="save_order">
    <a><?=$pay?> تومان </a>
    <input type="hidden" name="price" value="<?=$pay?>">
    <input type="hidden" name="date" value="<?=$date?>">
    <input type="hidden" name="code_discount" value="">
</form>
    </span>
    <div class="way-payment">
        <p>شیوه پرداخت :</p>
        <table>
            <tr>
                <td rowspan="3" style="width: 45px;border-left: 1px solid #aaaaaa;height: 150px;"><span class="circle4 active"></span></td>
                <td style="font-family: Yekan;font-size: 12pt;padding-right: 15px;font-weight: normal;height:100px">پرداخت اینترنتی<br>
                    <span class="melat"><span class="circle5 active"></span>درگاه بانک ملت</span>
                    <span class="parsian"><span class="circle5 active"></span> درگاه بانک پارسیان</span>
                </td>
            </tr>
            <tr>

            </tr>
        </table>

        <table>
            <tr>
                <td rowspan="3" style="width: 45px;border-left: 1px solid #aaaaaa;height:40px;"><span class="circle4 active"></span></td>
                <td style="font-family: Yekan;font-size: 13pt;padding-right: 15px;height:40px;font-weight: normal;">کارت به کارت<br>
                <p style="margin: 0;font-size: 11pt;color: #aaaaaa;">شما میتوانید وجه سفارش خود را به صورت اتنقال وجه کارت به کارت پرداخت نموده و حداکثر تا 24 ساعت پس از سفارش اطلاعات آن را ثبت نمایید </p>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td rowspan="3" style="width: 45px;border-left: 1px solid #aaaaaa;height:40px;"><span class="circle4 active"></span></td>
                <td style="font-family: Yekan;font-size: 13pt;padding-right: 15px;height:40px;font-weight: normal;">واریز به حساب<br>
                <p style="margin: 0;font-size: 11pt;color: #aaaaaa;">شما میتوانید وجه سفارش خود را از طریق مراجعه به شعب بانک به حساب شرکت فن آوازه واریز کرده و حداکثر تا 24 ساعت پس از سفارش اطلاعات آن را ثبت نمایید </p>
                </td>
            </tr>
        </table>
    </div><!--way-peyment-->
    <a class="btn-green" onclick="save_order();">ادامه خرید</a>
</div><!--main-useer-->

<?php
require ('footer.php');
?>


<?php
include
('script-menu.php');
?>

<?php
include
('script-user.php');
?>


</body>
</html>