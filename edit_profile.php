<?php
session_start();
if (isset($_SESSION['login'])) {
    $userid = $_SESSION['userid'];
} else {
    header('location:login.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تکمیل اطلاعات فردی</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
</head>
<body style="direction: rtl;">
<?php
include('top.php');
include('jdf.php');
$date=jdate('Y');
?>
<?php
include ('connect.php');
$sql="select * from tbl_user WHERE user_id='$userid'";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result_user=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result_user as $row_user){
$news_letter=$row_user['news_letter'];
$date=$row_user['birth_date'];
$date2=explode('/',$date);
 $year=$date2[0];
 $month=$date2[1];
 $day=$date2[2];
}
?>
<div id="main_edit_profile">
    <br>
    <form action="recive_edit_profile.php" method="post">
    <div class="row_edit_profile">
        <p>نام و نام خانوادگی :</p>
        <input type="text" name="name_family" class="input" value="<?=$row_user['family']?>">
    </div><!--row_edit_profile-->

    <div class="row_edit_profile">
        <p>آدرس ایمیل:</p>
        <input type="text" name="email" class="input" value="<?=$row_user['email']?>">
    </div><!--row_edit_profile-->

    <div class="row_edit_profile">
        <p>کد ملی:</p>
        <input type="text" name="national_code" class="input" value="<?=$row_user['national_code']?>">
    </div><!--row_edit_profile-->

    <div class="row_edit_profile">
        <p>شماره تلفن ثابت:</p>
        <input type="text" name="tel" class="input" value="<?=$row_user['tel']?>">
    </div><!--row_edit_profile-->

    <div class="row_edit_profile">
        <p>شماره تلفن همراه:</p>
        <input type="text" name="mobile" class="input" value="<?=$row_user['mobile']?>">
    </div><!--row_edit_profile-->

    <div class="row_edit_profile">
        <p>تاریخ تولد:</p>
        <p style="width: 30px;">روز</p>
        <select class="select" name="day">
            <?php
            for ($i=1;$i<=31;$i++){?>
                <option <?php if ($i==$day){echo 'selected="selected"';} ?>><?=$i?></option>
           <?php } ?>
        </select>
        <p style="width: 30px;margin-right: 10px; margin-top: 2px;">ماه</p>
        <select class="select" name="month">
            <?php
            for ($i=1;$i<=12;$i++){?>
               <option <?php if ($i==$month){echo 'selected="selected"';} ?>><?=$i?></option>';
            <?php } ?>
        </select>

        <p style="width: 30px;margin-right: 10px; margin-top: 2px;">سال</p>
        <select class="select" name="year">
            <?php
            for ($i=1330;$i<=$date;$i++){?>
               <option <?php if ($i==$year){echo 'selected="selected"';} ?>><?=$i?></option>
            <?php } ?>
        </select>
    </div><!--row_edit_profile-->

    <div class="row_edit_profile">
        <p>جنسیت:</p>
        <?php
        if ($row_user['gender']==1){ ?>
            <input type="radio" name="gender" style="float: right;margin-top:10px;" checked="checked" value="<?= 1?>"><p style="margin-left: 30px;margin-top: 4px;" class="gender">مرد</p>
            <input type="radio" value="<?= 0?>" name="gender" style="float: right;margin-top: 10px;"><p style="margin-top: 4px;" class="gender" >زن</p>
       <?php }elseif($row_user['gender']==0){?>
            <input type="radio" name="gender" value="<?= 1?>"style="float: right;margin-top:10px;" ><p style="margin-left: 30px;margin-top: 4px;" class="gender">مرد</p>
            <input type="radio" name="gender" style="float: right;margin-top: 10px;" checked="checked" value="<?=0?>"><p style="margin-top: 4px;" class="gender">زن</p>

       <?php } ?>


    </div><!--row_edit_profile-->

    <div class="row_edit_profile">
        <p>دریافت خبر نامه :</p>
        <?php
        if ($news_letter==1){
           echo' <input type="checkbox" name="news_letter" class="input" style="width: 20px" value="1" checked="true"  >';
        }else{
            echo' <input type="checkbox" name="news_letter" class="input" style="width: 20px"  value="1" >';
        }?>
        <p style="float: right;">تمایل دارم</p>
    </div><!--row_edit_profile-->

    <div class="row_edit_profile">
        <p>محل سکونت :</p>
        <textarea name="address" style="min-width: 250px;min-height: 70px;max-width: 250px;max-height: 70px;font-family: Yekan;font-size: 11pt;padding: 5px"><?=$row_user['state']?></textarea>

    </div><!--row_edit_profile-->
<button class="accept_form">ثبت تغیرات</button>
    </form>
</div><!--main_edit_profile-->

    <?php
    include('footer.php');
    ?>

    <?php
    include
    ('script-menu.php');
    ?>
</body>
</html>