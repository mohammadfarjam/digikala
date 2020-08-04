<?php
session_start();
if (isset($_SESSION['login'])) {
    $userid = $_SESSION['userid'];
} else {
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>پنل کاربری</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>


</head>
<body style="direction: rtl">
<?php
include('top.php');
include('jdf.php');
?>


<div id="main-panel">
    <br>
    <?php
    include('connect.php');
    $sql = "select * from tbl_user WHERE id='$userid' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="box">
        <span class="header">اطلاعات کاربر</span>
        <table>
            <tr>
                <td>
                <span class="title">
                    نام و نام خانوادگی :
                </span>
                    <span class="value">
                <?= $result['family'] ?>
                </span>
                </td>
                <td>
                <span class="title">
                   آدرس الکترونیک :
                </span>
                    <span class="value">
                   <?= $result['email'] ?>
                </span>
                </td>
                <td>
                <span class="title">
                   کد ملی:
                </span>
                    <span class="value">
                  <?= $result['national_code'] ?>
                </span>
                </td>
            </tr>


            <tr>
                <td>
                <span class="title">
                   شماره تلفن ثابت :
                </span>
                    <span class="value">
                    <?= $result['tel'] ?>
                </span>
                </td>
                <td>
                <span class="title">
شماره تلفن همراه :
                </span>
                    <span class="value">
                  <?= $result['mobile'] ?>
                </span>
                </td>
                <td>
                <span class="title">
                   تاریخ تولد :
                </span>
                    <span class="value">
                 <?= $result['birth_date'] ?>
                </span>
                </td>
            </tr>


            <tr>
                <td>
                <span class="title">
                   جنسیت :
                </span>
                    <span class="value">
                        <?php
                        $gender = $result['gender'];
                        if ($gender == 0) {
                            echo 'زن';
                        } else {
                            echo 'مرد';
                        }
                        ?>
                    </span>
                </td>
                <td>
                <span class="title">
                   محل سکونت :
                </span>
                    <span class="value">
<?= $result['state'] ?>
                </span>
                </td>
                <td>
                <span class="title">
                   دریافت خبرنامه:
                </span>
                    <span class="value">
<?php
$news_letter = $result['news_letter'];
if ($news_letter == 0) {
    echo 'خیر';
} else {
    echo 'بله';
}
?>
                </span>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left;">
                    <a><img src="images/ChangePassword.png"> </a>
                    <a href="edit_profile.php"><img src="images/Edit.png"></a>
                </td>
            </tr>
        </table>
    </div><!--box-->
    <div class="box">
        <span class="header">گزارش عملکرد</span>
        <?php
        $sql1 = "select * from tbl_order WHERE user_order='$userid' ";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();
        $result_order = $stmt1->fetch(PDO::FETCH_ASSOC);
        $row = $stmt1->rowCount();
        ?>
        <table>
            <tr>
                <td>
                <span class="title">
                   تعداد کل سفارشات :
                </span>
                    <span class="value">
                  <?= $row ?>
                </span>
                </td>
                <td>
                <span class="title">
                  کل دیجی بن دریافتی :
                </span>
                    <span class="value">
4
                </span>
                </td>
                <td>
                <span class="title">
                تعداد نظرات ارسال شده:
                </span>
                    <?php
                    $sql2 = "select * from tbl_comment WHERE user='$userid'";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->execute();
                    $result_comment = $stmt2->fetch(PDO::FETCH_ASSOC);
                    $row_comment = $stmt2->rowCount($result_comment);
                    ?>
                    <span class="value">
                  <?= $row_comment ?>
                </span>
                </td>
            </tr>


            <tr>
                <td>
                <span class="title">
                   سفارشات در انتظار تایید :
                </span>
                    <span class="value">
                   0
                </span>
                </td>
                <td>
                <span class="title">
کد دیجی بن مصرفی :
                </span>
                    <span class="value">
                   0
                </span>
                </td>
                <td>
                <span class="title">
                  تعداد نقد های ارسال شده :
                </span>
                    <span class="value">
                  0
                </span>
                </td>
            </tr>


            <tr>
                <td>
                <span class="title">
                  سفارش در حال پردازش :
                </span>
                    <span class="value">
0
                </span>
                </td>
                <td>
                <span class="title">
                 کل دیجی بن باطل شده :
                </span>
                    <span class="value">
                   0
                </span>
                </td>
                <td>
                <span class="title">
                   تعداد پیغام های خوانده نشده:
                </span>
                    <?php
                    $sql3 = "select * from tbl_message WHERE userid='$userid' AND status_read=0 ";
                    $stmt3 = $conn->prepare($sql3);
                    $stmt3->execute();
                    $result_message = $stmt3->fetch(PDO::FETCH_ASSOC);
                    $row_message = $stmt3->rowCount($result_message);
                    ?>
                    <span class="value">
<?= $row_message ?>
                </span>
                </td>
            </tr>

        </table>
    </div><!--box-->
    <div id="tab2">
        <ul class="tab2">

            <li>پیغام های من</li>
            <li class="active">سفارشات من</li>
            <li>لیست مورد علاقه</li>
            <li>نقدهای من</li>
            <li>نظرات من</li>
            <li>دیجی بن های من</li>
            <li> کارت های هدیه من</li>
            <li> اطلاع رسانی ها</li>
        </ul><!--tab2-->
        <div class="tab-childs2">
            <section>
                <table cellspacing="0">
                    <tr>
                        <td style="width:100px;">ردیف</td>
                        <td style="width:150px;">کد</td>
                        <td style="width:120px;">تاریخ</td>
                        <td style="width:250px;">عنوان پیام</td>
                        <td style="width:400px;">متن پیام</td>
                        <td>وضعیت پیام</td>
                    </tr>
                    <?php
                    $sql4 = "select * from tbl_message WHERE userid='$userid' ORDER by ID DESC ";
                    $stmt4 = $conn->prepare($sql4);
                    $stmt4->execute();
                    $message = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                    $i = 1;
                    foreach ($message as $row_message) { ?>

                        <table style="padding-top: 0px;" cellspacing="0">
                            <tr style="background-color: #fff8f6;color:#000;">

                                <td style="width:100px;"><?= $i ?></td>
                                <td style="width:150px;"><?= $row_message['userid'] ?></td>
                                <td style="width:120px;"><?= $row_message['date'] ?></td>
                                <td style="width:250px;"><?= $row_message['title'] ?></td>
                                <td style="width:400px;"><?= $row_message['text'] ?></td>
                                <td><?php
                                    if ($row_message['status_read'] == 0) {
                                        echo 'خوانده نشده';
                                    } else {
                                        echo 'خوانده شده';
                                    }

                                    ?></td>
                            </tr>

                        </table>
                        <?php $i++;

                    }

                    $sql5 = "update tbl_message set status_read=1 where userid='$userid'";
                    $stmt5 = $conn->prepare($sql5);
                    $stmt5->execute();
                    ?>
                    <br>
            </section>


            <section style="display: block;">
                <table cellspacing="0" ;>
                    <tr>
                        <td>ردیف</td>
                        <td>کد</td>
                        <td>تاریخ</td>
                        <td>مبلغ کل(ریال)</td>
                        <td>وضعیت</td>
                        <td>عملیات پرداخت</td>
                        <td>نوع سفارش</td>
                        <td>جزییات</td>
                    </tr>
                    <?php
                    $sql6 = "select * from tbl_order WHERE user_order='$userid'";
                    $stmt6 = $conn->prepare($sql6);
                    $stmt6->execute();
                    $result_order = $stmt6->fetchAll(PDO::FETCH_ASSOC);
                    $i = 1;

                    foreach ($result_order as $row_order) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row_order['user_order'] ?></td>
                            <td><?= $row_order['date'] ?></td>
                            <td><?= number_format($row_order['pay_amount']); ?></td>
                            <td><?php
                                if ($row_order['delivery_status'] == 0) {
                                    echo 'تحویل نشده';
                                } else {
                                    echo 'تحویل شده';
                                }
                                ?></td>
                            <td>
                                <?php
                                if ($row_order['pay_status'] == 0) {
                                    echo 'پرداخت نشده';
                                } else {
                                    echo 'پرداخت شده';
                                }
                                ?></td>
                            <td><?php
                                if ($row_order['post_type'] == 0) {
                                    echo 'پست پیشتاز';
                                } else {
                                    echo ' پست معمولی';
                                }
                                ?></td>
                            <td><img class="img-details" data-src-img="images/orderdetailsclose.png"></td>
                        </tr>
                        <?php
                        $i++;

                    } ?>
                    <tr>
                        <td colspan="8">
                            <div class="subtable">
                                <table cellspacing="0" ;>
                                    <tr>
                                        <td>کالا</td>
                                        <td>تعداد</td>
                                        <td>قیمت واحد</td>
                                        <td>قیمت کل</td>
                                        <td>تخفیف کل</td>
                                        <td>مبلغ کل</td>
                                    </tr>
                                    <tr>

                                        <td></td>
                                        <td>1</td>
                                        <td>1,000,000</td>
                                        <td>1,000,000</td>
                                        <td>0</td>
                                        <td>1,000,000</td>
                                    </tr>
                                </table>
                                <span class="rahgiri">رهگیری سفارش</span>
                                <div class="order-steps">
                                    <ul>
                                        <span class="dashed" style="margin-right: 210px;"></span>
                                        <span class="dashed"></span>
                                        <span class="dashed"></span>
                                        <span class="dashed"></span>

                                        <li class="done"><span class="circle"></span><span class="line2"></span>
                                            <span
                                                    class="title">تایید سفارش</span></li>
                                        <li><span class="circle"></span> <span class="line2"></span> <span
                                                    class="title"> پرداخت</span></li>
                                        <li><span class="circle"></span> <span class="line2"></span> <span
                                                    class="title">پردازش انبار </span></li>
                                        <li><span class="circle"></span> <span class="line2"></span> <span
                                                    class="title">آماده ی ارسال</span></li>
                                        <li style="width: 33px!important;"><span class="circle"></span> <span
                                                    class="title"> تحویل شده</span></li>


                                        <span class="dashed"></span>
                                        <span class="dashed"></span>
                                        <span class="dashed"></span>
                                        <span class="dashed"></span>
                                    </ul>
                                </div><!--order-steps-->
                                <div class="more">

                                    <table cellspacing="0">
                                        <tr>
                                            <td style=" width: 380px;height: auto;text-align:right;">روش ارسال :
                                                تحویل
                                                اکسپرسروش ارسال : تحویل اکسپرسروش ارسال : تحویل اکسپرسروش ارسال :
                                                تحویل
                                                اکسپرسروش ارسال : تحویل اکسپرسروش ارسال : تحویل اکسپرسروش ارسال :
                                                تحویل
                                                اکسپرسروش ارسال : تحویل اکسپرس
                                            </td>
                                            <td>زمان ارسال :زمان ارسال</td>
                                            <td>زمان ارسال : زمان ارسال</td>
                                        </tr>
                                        <tr>
                                            <td style=" width: 380px;height: auto;text-align:right;">روش ارسال :
                                                تحویل
                                                اکسپرسروش ارسال : تحویل اکسپرسروش ارسال : تحویل اکسپرسروش ارسال :
                                                تحویل
                                                اکسپرسروش ارسال : تحویل اکسپرسروش ارسال : تحویل اکسپرسروش ارسال :
                                                تحویل
                                                اکسپرسروش ارسال : تحویل اکسپرس
                                            </td>
                                            <td>زمان ارسال :زمان ارسال</td>
                                            <td>زمان ارسال : زمان ارسال</td>
                                        </tr>

                                    </table>
                                </div><!--more-->
                            </div><!--subtable-->
                        </td>
                    </tr>


                </table>
            </section>

            <section class="favorite">
                <div class="favorite2">
                    <ul>
                        <li onclick="get_all_favorite();">
                            <img src="images/folder_documents_all.png">
                            <p>همه محصولات </p>
                        </li>

                        <?php
                        $sql7 = "select * from tbl_favorite WHERE parent=0 AND user_id='$userid'";
                        $stmt7 = $conn->prepare($sql7);
                        $stmt7->execute();
                        $result_favorite = $stmt7->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result_favorite as $favorite) {
                            $id_favorite = $favorite['id'];
                            echo '<li onclick="get_favorite(' . $id_favorite . ');">
                          <span class="edit_title_favorite" onclick="edit_title_favorite();"></span>
                          <span class="save_edit_title_favorite" onclick="save_edit_title(' . $id_favorite . ')">ذخیره</span>
                            <img src="images/folder_documents_all.png">
                            <p>' . $favorite['title'] . '</p>
                        </li>';
                        }
                        ?>

                    </ul>
                </div><!--favorite2-->

            </section>
            <section>
                4
            </section>
            <section class="nazarat-man">
                <table cellspacing="0">
                    <tr>
                        <td>ردیف</td>
                        <td>تاریخ</td>
                        <td>کالا</td>
                        <td>می پسندم</td>
                        <td>مشاهده</td>
                        <td>ویرایش</td>
                        <td>حذف</td>
                    </tr>
                    <?php
                    $sql8 = "select * from tbl_comment WHERE user=$userid";
                    $stmt8 = $conn->prepare($sql8);
                    $stmt8->execute();
                    $result_all_comment = $stmt8->fetchAll(PDO::FETCH_ASSOC);


                    $i = 1;
                    foreach ($result_all_comment

                    as $row_comment) {
                    $id_product = $row_comment['idproduct'];
                    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row_comment['date'] ?></td>
                        <td><?= $row_comment['name_product'] ?></td>
                        <td><?= $row_comment['likecount'] ?></td>
                        <td><a onclick="pro()"><img src="images/View.gif"></a></td>
                        <td><img src="images/Edit.gif"></td>
                        <td><img src="images/Delete.gif"></td>
                        <?php $i++;
                        }

                        ?>

                    </tr>
                </table>
                <script>

                </script>
            </section>
            <section class="digi-bon">
                <div class="add-digi-bon">
                    <p> کد دریافت دیجی بن :</p>
                    <input type="text">
                    <img src="images/SaveVoucher.gif">
                </div><!--add-digi-bon-->
                <table cellspacing="0">
                    <tr>
                        <td>ردیف</td>
                        <td>کد</td>
                        <td>شرح</td>
                        <td>تاریخ ثبت</td>
                        <td>تاریخ انقضا</td>
                        <td>اعتبار اولیه</td>
                        <td>اعتبار مصرفی</td>
                        <td>مانده</td>
                        <td>وضعیت</td>
                        <td>جزییات</td>
                    </tr>
                    <?php
                    $sql9 = "select * from tbl_code_discount WHERE user_id='$userid'";
                    $stmt9 = $conn->prepare($sql9);
                    $stmt9->execute();
                    $result_digi_bon = $stmt9->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                    $i = 1;


                    foreach ($result_digi_bon as $row_code){
                    $code = $row_code['code'];
                    $today = $row_code['date_registration'];
                    $expire = $row_code['date_expire'];
                    ?>

                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row_code['code'] ?></td>
                        <td></td>
                        <td><?= $row_code['date_registration'] ?></td>
                        <td><?= $row_code['date_expire'] ?></td>
                        <td><?= $row_code['code_max'] ?></td>
                        <td><?= $row_code['used'] ?></td>
                        <td><?= ($row_code['code_max']) - ($row_code['used']) ?></td>

                        <?php
                        echo $date = jdate('Y-n-j',$timestamp='',$none='',$time_zone='Asia/Tehran',$tr_num='en');
                        $today1 = new DateTime($date);
                        $expire1 = new DateTime($expire);
                        if ($expire1->format('Y-n-j') >= $today1->format('Y-n-j')) {
                            echo '<td>منقضی شده</td>';
                        } else {

                            echo '<td>معتبر</td>';
                        }
                        ?>
                        <td><img class="img-details" data-src-img="images/orderdetailsclose.png"
                                 style="left: -25px;position: relative;">
                        </td>
                    </tr>
                </table>
                <div class="digi-bon2">
                    <table cellspacing="0">
                        <tr colspan="4">
                            <td>سفارش</td>
                            <td>نوع</td>
                            <td>تاریخ</td>

                        </tr>
                        <?php
                        $sql10 = "select * from tbl_order WHERE user_order='$userid' AND code_discount='$code'";
                        $stmt10 = $conn->prepare($sql10);
                        $stmt10->execute();
                        $result_code = $stmt10->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                        foreach ($result_code as $row_code_detail) {
                            ?>
                            <tr>
                                <td><?= $row_code_detail['id'] ?></td>
                                <td>خرید</td>
                                <td><?= $row_code_detail['date'] ?></td>

                            </tr>
                        <?php } ?>

                        <?php
                        $i++;
                        } ?>
                    </table>
                </div><!--digi-bon2-->


            </section>
            <section>
                7
            </section>
            <section>
                8
            </section>


        </div><!--tab-child2-->
    </div><!--id-tab2-->
</div><!--main-panel-->

<?php
include('footer.php');
?>

<?php
include
('script-menu.php');
?>

<?php
include
('script-panel.php');
?>


</body>
</html>