<?php
session_start();
if (isset($_SESSION['login'])){
}
else{
    ob_clean();
    header('location:user.php');
}
$address = $_SESSION['select_address'];
$basket = $_SESSION['basket'];
$basket=unserialize($basket);
$address = unserialize($address);

?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>بازبینی سفارش</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
</head>
<body style="direction: rtl">

<div class="dark"></div>
<?php
include('top.php');
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
            <li class="active"><span class="circle"></span><span class="line2"></span> <span class="title active">بازبینی سفارش</span>
            </li>
            <li style="width: 33px !important;"><span class="circle_gray"></span> <span class="title" style="width: 100px;">اطلاعات پرداخت </span>
            </li>


            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
        </ul>
    </div><!--order-steps-->

    <div id="main-bascket">
        <div class="your-shop" style="margin-top: 60px;">
            <table cellspacing="0">
                <tr style="background-color: #eee;height: 37px;">
                    <td>شرح محصول</td>
                    <td>تعداد</td>
                    <td>قیمت واحد</td>
                    <td>قیمت کل</td>
                    <td></td>
                </tr>
                <?php
                if (isset($_SESSION['basket'])) {
                    $b = count($basket);

                    for ($v = 0; $v < $b; $v++) {
                        $price=$basket[$v]['price'];
                        $price_all[$v] = $price * $basket[$v]['tedad'];
                        @$total_price_all=$total_price_all+$price_all[$v];
                      $discount=$basket[$v]['price_off']*$basket[$v]['tedad'];
                      @$discount_all=$discount_all+$discount;
                       $pay_price=$total_price_all-$discount_all;
                       $user_basket=$basket[$v]['idbasket'];
                        $_SESSION['pay']=$pay_price;
                        $_SESSION['userBasket']=$user_basket;

                        echo '<tr>
                          <td>
                       <div class="right">
                      <img  style="max-width: 190px;max-height: 135px;margin-top: 15px;" src="file/' . $basket[$v]['idp'] . '/' . $basket[$v]['img'] . ' ">
                        </div>
                     <div class="left">
                      <p>' . $basket[$v]['title'] . '</p>
               <p>رنگ :' . $basket[$v]['name_color'] . '</p>
                <p>گارانتی :' . $basket[$v]['title_garantee'] . '</p>
             </div>
                </td>
                <td>
                
                <span class="text">' . $basket[$v]['tedad'] . '</span>
             </td>
              <td>'.$price.' تومان</td>
            
               <td> '.$price_all[$v].'تومان
               </br>
               </br>
               <p style="width:250px;color: crimson;font-family: Yekan;font-size: 12pt;margin: 0 auto;">تخفیف :' . $discount . ' تومان</p>
               
               </td>
               
               
               
               <td style="background-color:#b4d0ff;width: 30px;"><a href="bascket.php"><i class="img"></i></a></td>
              </tr>';
                    }
                }

                ?>

            </table>
        </div><!--your-shop-->
    </div><!--main-bascket-->
    <h4>خلاصه صورت حساب شما :</h4>
    <div class="sum-price">

        <p>جمع کل خرید شما :</p>
        <span><?= $total_price_all?>  تومان</span>
        <p>هزینه ارسال و بسته بندی و بیمه :</p>
        <span>0  تومان</span>
        <p style="background-color: #ffc6b7;color: red;">جمع کل تخفیف :</p>
        <span style="background-color: #ffc6b7;color: red;"><?= $discount_all?>  تومان</span>
        <p style="background-color:#28ff64; color:#1c6e0e;font-size: 14pt;">جمع کل قابل پرداخت :</p>
        <span style="background-color:#28ff64; color:#1c6e0e;font-size: 14pt;"><?= $pay_price?>  تومان</span>

    </div><!--sum-price-->
    <h4>اطلاعات ارسال سفارش :</h4>
    <div class="info-send-order">
        <table cellspacing="0">
            <tr style="border-bottom: 1px solid #aaaaaa;">
                <td rowcount="2" style=" width:60px;height:45px;border-bottom: 1px solid #aaaaaa;"><i
                            style="background-position: -807px -203px;"></i></td>
                <?php
                if (isset($_SESSION['select_address'])){

                }
                ?>
                <td style="color:#989191;border-bottom: 1px solid #aaaaaa;"> این سفارش به <span class="green"><?= $address['name_delivery']?> </span>به
                    آدرس <span class="green"><?= $address['address']?></span>  شماره همراه <?= $address['mobile']?> و شماره تلفن <?= $address['tel']?> تحویل می گردد.
                </td>
            </tr>
            <tr style="border-bottom: 1px solid #aaaaaa;">
                <td rowspan="2" style=" width:60px;height:45px;"><i style="background-position: -807px -245px;"></i>
                </td>
                <td style="color:#989191;"> این سفارش از طریق پست پیشتاز (هزینه ارسال : طبق تعرفه پست ) با هزینه <span
                            class="green">10000 تومان </span> به شما تحویل داده خواهد شد.
                </td>
            </tr>
        </table>
    </div><!--info-send-order-->
    <a href="user4.php" class="btn-green">مرحله اطلاعات پرداخت</a>
</div><!--main-user-->

<?php
include('footer.php');
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