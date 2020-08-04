<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>صفحه مدیریت</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap4.3.1.css">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap4.3.1.js"></script>

</head>
<body style="direction: rtl">


<div id="header1">
    <div id="header">
        <div id="logo">
            <img src="images/logo.png">
        </div><!--logo-->

        <div id="login">
            <img class="img-login" src="images/padlock.png">
            <span style="margin-left: 50px;font-family:yekan;font-size: 11pt;color:#929782;line-height: 44px;display:block;float: right;">فروشگاه اینترنتی دیجی کالا، وارد شوید</span>
            <img class="img-login" src="images/register.png">
            <a target="_blank" href="register.php"><span
                        style="font-family:yekan;font-size:11pt;color: #929782;line-height: 44px;display:block;float: right;">ثبت نام کنید</span></a>
        </div><!--login-->
        <br><br>
        <div id="basket-right">
            <img class="img-basket" src="images/basket.png">
        </div><!--bascket-right-->
        <div id="basket-left">
    <span style="font-family: yekan;font-size: 11pt;color: #ffffff;margin-right: 25px;
line-height: 30px;">سبد خرید</span>
            <div id="tedad-dar-sabad">0
            </div><!--tedad-dar-sabad-->
        </div><!--basket-left-->

        <div id="search">
            <input type="text" placeholder="محصول،دسته یا برند مورد نظرتان را جستوجو کنید..."/>
            <div id="btn-search">
                <img class="img-search" src="images/search.png">
            </div><!--btn-search-->
        </div><!--search-->
    </div><!--header-->
</div><!--header1-->
<div id="nav">
    <div id="menu-top">
        <ul>
            <li data-time="1"><a>کالای دیجیتال<img class=down-arrow src="images/down-arrow.png"></a>
                <ul>
                    <li data-time="4">
                        <a>موبایل</a>
                        <div id="top-menu3">
                            <div class="top-menu3">
                                <ul>
                                    <li>گوشی موبایل</li>
                                    <li><a>Apple</a></li>
                                    <li><a>سامسونگ</a></li>
                                </ul>
                            </div>
                            <div class="top-menu3"></div>
                            <div class="top-menu3"></div>
                            <div class="top-menu3"></div>
                            <img src="images/img-menu.png"
                                 style="position: absolute; left: 2px;bottom: 2px; width:298px; height:261px;">
                        </div><!--top-menu3-->
                    </li>
                    </li>
                    <li data-time="5">
                        <a>تبلت و کتاب خوان</a>
                        <div id="top-menu3">
                            <div class="top-menu3">
                                <ul>
                                    <li>تبلت</li>
                                    <li><a>lenovo</a></li>
                                    <li><a>sumsung</a></li>
                                </ul>
                            </div>
                            <div class="top-menu3"></div>
                            <div class="top-menu3"></div>
                            <div class="top-menu3"></div>
                            <img src="images/tablet.png"
                                 style="position: absolute; left: 2px;bottom: 2px; width:298px; height:261px;">
                        </div><!--top-menu3-->
                    <li data-time="6">
                        <a>لپ تاپ</a>
                        <div id="top-menu3">
                            <div class="top-menu3">
                                <ul>
                                    <li>لپ تاب</li>
                                    <li><a>lenovo</a></li>
                                    <li><a>sumsung</a></li>
                                    <li><a>VAIO</a></li>
                                    <li><a>Asus</a></li>
                                </ul>
                            </div>
                            <div class="top-menu3"></div>
                            <div class="top-menu3"></div>
                            <div class="top-menu3"></div>
                            <img src="images/img-menu.png"
                                 style="position: absolute; left: 2px;bottom: 2px; width:298px; height:261px;">
                        </div><!--top-menu3-->
                    </li>

                </ul>
            </li>


            <li data-time="2"><a>لوازم خانگی<img class=down-arrow src="images/down-arrow.png"></a>
                <ul>
                    <li data-time="7">
                        <a>صوتی و تصویری</a>
                        <div id="top-menu3">
                            <div class="top-menu3">
                                <ul>
                                    <li>بر اساس سازنده</li>
                                    <li><a>LG</a></li>
                                    <li><a>sumsung</a></li>
                                    <li><a>KenWood</a></li>
                                </ul>
                            </div>
                            <div class="top-menu3"></div>
                            <div class="top-menu3"></div>
                            <div class="top-menu3"></div>
                            <img src="images/soti-tasvir.png"
                                 style="position: absolute; left: 2px;bottom: 2px; width:298px; height:261px;">
                        </div><!--top-menu3-->
                    </li>
                    <li data-time="8">
                        <a>لوازم برقی</a>
                    </li>
                </ul>

            </li>

            <li data-time="3"><a>وسایل نقلیه و صنعتی<img class=down-arrow src="images/down-arrow.png"></li>
            </a>

        </ul>
    </div><!--menu-top-->

</div><!--nav-->


<div id="main_admin">
    <div class="right">
        <ul>
            <li><i class="icon_admin"></i><a class="back_admin">داشبورد</a></li>
            <li><i class="icon_admin"></i><a href="admin_category.php" target="_blank" class="back_admin-light">مدیریت
                    دسته ها</a></li>
            <li><i class="icon_admin"></i><a class="back_admin">مدیریت محصولات</a></li>
        </ul>
    </div><!--right-->
    <div class="left">

        <?php
        include('connect.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "select * from tbl_category WHERE id=$id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result_title_asli = $stmt->fetch(PDO::FETCH_ASSOC);
            $title_asli = $result_title_asli['title'];


            echo '<p class="title_category">زیر دسته های ' . $title_asli . '</p><!--title_category-->';
            ?>

            <div class="container" style="width: 885px;float: right;padding: 0px;">
                <div>
                    <a href="add_category.php" target="_blank">
                        <button class="btn btn-success"
                                style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;float: right;margin-right: 20px">
                            افزودن
                        </button>
                    </a>
                    <form action="admin_category.php" method="post">
                        <a>
                            <button class="btn btn-danger" onclick="submitform();" name="submit"
                                    style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;float: right;margin-right: 10px;">
                                حذف
                            </button>
                        </a>
                </div>

            </div><!--container-->

            <table class="tbl_cat" cellspacing="0">
                <tr>

                    <td>ردیف</td>
                    <td>نام زیر دسته</td>
                    <td>نمایش زیر دسته ها</td>
                    <td>ویرایش</td>
                    <td style="border-left:1px solid #aaaaaa;">انتخاب</td>
                </tr>
            </table><!--tbl_cat-->

            <?php


            $sql2 = "select * from tbl_category WHERE parent=$id ";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();

            while ($result_under_cat = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                $title_category = $result_under_cat['title'];
                $id_category = $result_under_cat['id'];
                echo '<table class="tbl_cat2" cellspacing="0">
            <tr>
           <td>' . $id_category . '</td>
           <td>' . $title_category . '</td>
           
           <td><a href="show_under_category.php?i=' . $id_category . '"><i class="icon_under_cat"></i></a></td>
            <td><a href="add_category.php?id=' . $id_category . '&edit=1"><i class="icon_under_cat_edit"></i></a></td>
            <td><input type="checkbox" name="id[]" value="' . $id_category . '"></td>
            
            </tr>
        </table><!--tbl_cat2-->
        ';
            }
        }


        if (isset($_GET['i'])) {
            $i = $_GET['i'];
            $sql3 = "select * from tbl_category WHERE parent=$i";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->execute();


            $edit = '1';

            $sql = "select * from tbl_category WHERE id=$i";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result_title_asli3 = $stmt->fetch(PDO::FETCH_ASSOC);
            $title_asli3 = $result_title_asli3['title'];


            echo '<p class="title_category">زیر دسته های ' . $title_asli3 . '</p><!--title_category-->';
            echo '<table class="tbl_cat" cellspacing="0">
 <div class="container" style="width: 885px;float: right;padding: 0px;">
            <div >
                <a href="add_category.php" target="_blank">
                    <button class="btn btn-success"
                            style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;float: right;margin-right: 20px">
                        افزودن
                    </button>
                </a>
                <form action="admin_category.php" method="post">
                <a>
                    <button class="btn btn-danger" onclick="submitform();" name="submit"
                            style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;float: right;margin-right: 10px;">
                        حذف
                    </button>
                </a>
            </div>

        </div><!--container-->
                <tr>

                    <td>ردیف</td>
                    <td>نام زیر دسته</td>
                    <td>نمایش زیر دسته ها</td>
                    <td>ویرایش</td>
                    <td style="border-left:1px solid #aaaaaa;">انتخاب</td>
                </tr>
            </table><!--tbl_cat-->';

            while ($result_under_cat3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                $title_category3 = $result_under_cat3['title'];
                $id_category3 = $result_under_cat3['id'];
                echo '<table class="tbl_cat2">

            <tr>
           <td>' . $id_category3 . '</td>
           <td>' . $title_category3 . '</td>
           
           <td><a href="show_under_category.php?i=' . $id_category3 . '"><i class="icon_under_cat"></i></a></td>
            <td><a href="add_category.php?id=' . $id_category3 . '&edit=1"><i class="icon_under_cat_edit"></i></a></td>
             <td><input type="checkbox" name="id[]" value="' . $id_category3 . '"></td>
            </tr>
        </table><!--tbl_cat2-->
        ';

            }

        }

        echo '<br>';
        ?>
        </form>
    </div><!--left-->
</div><!--main_admin-->


<?php
include
('footer.php');
?>

<?php
include
('script-menu.php');
?>


</body>
</html>