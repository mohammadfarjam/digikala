<?php
session_start();
if (isset($_SESSION['login'])){
    $userid= $_SESSION['userid'];
}
else{
    ob_clean();
    header('location:user.php');
}



include ('connect.php');
?>
<!DOCTYPE html>
<html lang="fa" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>آدرس دهی</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/city.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">


</head>
<body style="direction: rtl">

<div class="dark"></div>
<?php
include('top.php');
?>



<div id="main-user">
    <form action="" method="post" id="add_address">
        <div class="add-address">
            <span class="closee"><i></i></span>
            <div class="row">
                <span class="title">نام و نام خانوادگی تحویل گیرنده:</span>
                <input name="name_delivery">
            </div><!--row-->
            <div class="row">
                <span class="title">شماره تلفن همراه :</span>
                <input name="mobile">
            </div><!--row-->
            <div class="row">
                <span class="title">شماره تلفن ثابت :</span>
                <input name="tel">
            </div><!--row-->
            <div class="row">
                <span class="title" style="width:210px; ">استان/شهر تحویل گیرنده:</span>
                <select name="state" style="width: 100px;margin-right:30px;" class="selectpicker state font"
                        data-live-search="true" title="شهر خود راانتخاب کنید" onchange="ostan(this);">
                    <option data-val="41" value="آذربایجان شرقی">آذربایجان شرقی</option>
                    <option data-val="44" value="آذربایجان غربی">آذربایجان غربی</option>
                    <option data-val="45" value="اردبیل">اردبیل</option>
                    <option data-val="31" value="اصفهان">اصفهان</option>
                    <option data-val="26" value="البرز">البرز</option>
                    <option data-val="84" value="ایلام">ایلام</option>
                    <option data-val="77" value="بوشهر">بوشهر</option>
                    <option data-val="21" value="تهران">تهران</option>
                    <option data-val="38" value="چهارمحال بختیاری">چهارمحال بختیاری</option>
                    <option data-val="56" value="خراسان جنوبی ">خراسان جنوبی</option>
                    <option data-val="51" value="خراسان رضوی ">خراسان رضوی</option>
                    <option data-val="58" value="خراسان شمالی ">خراسان شمالی</option>
                    <option data-val="61" value="خوزستان ">خوزستان</option>
                    <option data-val="24" value="زنجان ">زنجان</option>
                    <option data-val="23" value="سمنان ">سمنان</option>
                    <option data-val="54" value="سیستان وبلوچستان ">سیستان وبلوچستان</option>
                    <option data-val="71" value=" فارس"> فارس</option>
                    <option data-val="28" value=" قزوین"> قزوین</option>
                    <option data-val="25" value=" قم"> قم</option>
                    <option data-val="87" value=" کردستان"> کردستان</option>
                    <option data-val="34" value=" کرمان"> کرمان</option>
                    <option data-val="34" value=" کرمانشاه"> کرمانشاه</option>
                    <option data-val="74" value=" کهکیلویه و بویراحمد"> کهکیلویه و بویراحمد</option>
                    <option data-val="17" value="گلستان"> گلستان</option>
                    <option data-val="13" value="گیلان"> گیلان</option>
                    <option data-val="66" value="لرستان"> لرستان</option>
                    <option data-val="15" value="مازندران"> مازندران</option>
                    <option data-val="86" value="مرکزی"> مرکزی</option>
                    <option data-val="76" value="هرمزگان"> هرمزگان</option>
                    <option data-val="81" value="همدان"> همدان</option>
                    <option data-val="35" value="یزد"> یزد</option>
                </select>
                <div class="shahr selectpicker">
                    <select name="city" class="selectpicker city font m-r" style="float: right;margin-right: 10px;"></select>
                </div>
            </div><!--row-->
            <div class="row" style="height: auto!important;">
                <span class="title">آدرس پستی :</span>
                <textarea class="textarea" name="address"></textarea>
            </div><!--row-->
            <div class="row">
                <span class="title">کد پستی :</span>
                <input name="zip_code">
            </div><!--row-->
            <div class="row">
                <input name="id" type="hidden">
            </div><!--row-->
            <span class="btn-green" style="left: -340px;margin-top: 115px" onclick="addaddress();">ثبت اطلاعات و بازگشت</span>
        </div><!--add-address-->

    </form>

    <div class="order-steps">
        <ul>
            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>

            <li class="active"><span class="circle circle_active"></span><span class="line2 active"></span> <span
                        class="title active">ورود به دیجی کالا </span></li>
            <li class="active"><span class="circle"></span><span class="line2"></span> <span
                        class="title active">اطلاعات ارسال سفارش</span></li>
            <li><span class="circle_gray"></span><span class="line2"></span> <span class="title">بازبینی سفارش</span></li>
            <li style="width: 33px !important;"><span class="circle_gray"></span> <span class="title" style="width: 100px;">اطلاعات پرداخت </span>
            </li>

            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
            <span class="dashed"></span>
        </ul>
    </div><!--order-steps-->


    <div class="content2">
        <div class="head">
            <p>انتخاب آدرس</p>
            <button class="btn-gray" onclick="reset_add_address();">افزودن آدرس جدید</button>
        </div><!--head-->
        <?php
        $sql="select * from tbl_user_address WHERE user_id=$userid";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
       while ($result_user_address=$stmt->fetch(PDO::FETCH_ASSOC)){
           $name_delivery=$result_user_address['name_delivery'];
           $mobile=$result_user_address['mobile'];
           $tel=$result_user_address['tel'];
           $state=$result_user_address['state'];
           $city=$result_user_address['city'];
           $address=$result_user_address['address'];
           $zip_code=$result_user_address['zip_code'];
           $id=$result_user_address['id'];

           echo'
        <table class="active_table addr" cellspacing="0" style="width: 95%;margin: auto;margin-bottom: 15px;">
            <tr>
                <td class="select_address" onclick="select_address('.$id.');" rowspan="3" style="width: 60px;border-left: 1px solid #b6afaf;position: relative;"><span
                            class="circle2"></span>
                    <span class="tick"><i></i></span></td>
                <td colspan="3" style="border-left: none;"><span class="name">'.$name_delivery.'</span></td>
                <td rowspan="3" style="width: 40px;height: 103px;">
                    <table cellspacing="0">
                        <tr>
                            <td style="width: 52px;height: 70px;background:#96eeff;"><i class="img-edit" onclick="editaddress('.$id.');"></i></td>
                        </tr>
                        <tr>
                            <td style="background:#ffceda;height: 70px;"><i class="img-delete" onclick="delete_address('.$id.');"></i></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 200px;padding: 5px;font-family: Yekan;font-size:12pt;border-left: 1px solid #b6afaf; ">
                    استان :'.$state.'
                </td>
                <td rowspan="2"
                    style="width: 550px;padding: 5px;font-family: Yekan;border-left: 1px solid #b6afaf;font-size:12pt; ">
                    '.$address.'
                </td>
                <td style="width: 200px;padding: 5px;font-family: Yekan;font-size:12pt;border-left: none; "> شماره همراه
                    : '.$mobile.'
                </td>
            </tr>
            <tr>
                <td style="width: 200px;padding: 5px;border-left: 1px solid #b6afaf;font-family: Yekan;font-size:12pt; ">
                    شهر :'.$city.'
                </td>
                <td style="width: 200px;padding: 5px;font-family: Yekan;font-size:12pt;border-left: none; ">شماره تلفن
                    ثابت :'.$tel.'
                </td>

            </tr>
        </table>';
}
        ?>


    </div><!--content2-->

    <div class="send-types">
        <p>شیوه های ارسال</p>
        <table class="active">
            <tr>
                <td style="width: 60px;border-left: 1px solid #989191;"><span class="circle3 active"></span></td>
                <td style="width: 900px;border-left: 1px solid #989191;"><img>
                    <p>پست پیشتاز (هزینه ارسال : طبق تعرفه پست)</p></td>
                <td style="100px;"><span>هزینه ارسال </span>
                    <span2>50,000 تومان</span2>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 60px;border-left: 1px solid #989191;"><span class="circle3"></span></td>
                <td style="width: 900px;border-left: 1px solid #989191;"><img class="img-barbari">
                    <p>باربری (پس کرایه طبق تعرفه باربری | ویژه لوازم خانگی سنگین)</p></td>
                <td style="100px;"><span>هزینه ارسال </span>
                    <span2>100,000 تومان</span2>
                </td>
            </tr>
        </table>
    </div><!--send-types-->
</br>
    <a href="user3.php" class="btn-green">مرحله بازبینی سبد خرید</a>
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
                <div class="btnn"><p>تایید ایمیل</p></div>
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

<script>


</script>
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