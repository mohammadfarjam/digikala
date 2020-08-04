<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>جستجو</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>


</head>
<body style="direction: rtl">

<?php
include('top.php');
?>


<div id="main-search">
    <div id="sidebar-search">
         <span>گوشی موبایل
        <img src="images/arrow-down-sign-to-navigate.png">
            </span>
        <div class="category">

            <p>کالای دیجیتال</p>
            <ul>
                <li><i></i>موبایل</li>
                <li style="padding-right: 25px;"><i style="padding-right: 10px;"></i>گوشی موبایل</li>
            </ul>
        </div><!--category-->
        <div class="line"></div>

        <div class="asase-price">
            <p>بر اساس قیمت</p>
        </div><!--asase-prise-->
        <div class="line"></div>
        <div class="noe">
            <p>بر اساس نوع</p>
            <ul>
                <div class="checkbox2">
                    <label class="label-border2"></label>
                    <input type="checkbox" class="check-input2">
                    <li>سیستم عامل اندروید</li>
                </div>


                <div class="checkbox2">
                    <label class="label-border2" style="top: 34px;"></label>
                    <input type="checkbox" class="check-input2">
                    <li>سیستم عامل ios</li>
                </div>

                <div class="checkbox2">
                    <label class="label-border2" style="top: 64px;"></label>
                    <input type="checkbox" class="check-input2">
                    <li>سیستم عامل ویندوز فون</li>
                </div>

                <div class="checkbox2">
                    <label class="label-border2" style="top: 94px;"></label>
                    <input type="checkbox" class="check-input2">
                    <li>سایر سیستم عامل ها</li>
                </div>
            </ul>
        </div><!--noe-->

        <div class="line"></div>
        <div class="noe">
            <p>بر اساس سازنده</p>
            <ul>
                <div class="checkbox2">
                    <label class="label-border2"></label>
                    <input type="checkbox" class="check-input2">
                    <li>سونی</li>
                </div>


                <div class="checkbox2">
                    <label class="label-border2" style="top: 34px;"></label>
                    <input type="checkbox" class="check-input2">
                    <li>سامسونگ</li>
                </div>

                <div class="checkbox2">
                    <label class="label-border2" style="top: 64px;"></label>
                    <input type="checkbox" class="check-input2">
                    <li>ال جی</li>
                </div>

                <div class="checkbox2">
                    <label class="label-border2" style="top: 94px;"></label>
                    <input type="checkbox" class="check-input2">
                    <li>اچ تی سی</li>
                </div>
            </ul>
        </div><!--noe-->

        <div class="line"></div>
        <div class="noe">
            <p>بر اساس رنگ</p>
            <ul>
                <div class="checkbox2">
                    <label class="label-border2"></label>
                    <input type="checkbox" class="check-input2">
                    <div class="product-color" style="background-color: red;"></div>
                    <li style="padding-right: 25px;">قرمز</li>
                </div>


                <div class="checkbox2">
                    <label class="label-border2" style="top: 34px;"></label>
                    <input type="checkbox" class="check-input2">
                    <div class="product-color" style="background-color: black; blue;top: 35px;"></div>
                    <li style="padding-right: 25px;">مشکی</li>
                </div>

                <div class="checkbox2">
                    <label class="label-border2" style="top: 64px;"></label>
                    <input type="checkbox" class="check-input2">
                    <div class="product-color" style="background-color: blue;top: 65px;"></div>
                    <li style="padding-right: 25px;">آبی</li>
                </div>

                <div class="checkbox2">
                    <label class="label-border2" style="top: 94px;"></label>
                    <input type="checkbox" class="check-input2">
                    <div class="product-color" style="background-color:#659ca0;top: 95px;"></div>
                    <li style="padding-right: 25px;">فیروزه ای</li>
                </div>
            </ul>
        </div><!--noe-->
    </div><!--sidebar-search-->

    <div id="content-search">
        <div class="page-navigator">
            <ul>
                <li>جستجو کالا</li>
                <img src="images/patharrow.png" class="page-navigator-img">
                <li>کالای دیجیتال</li>
                <img src="images/patharrow.png" class="page-navigator-img">
                <li>موبایل</li>
                <img src="images/patharrow.png" class="page-navigator-img">
                <li>گوشی موبایل</li>
                <li>648 نتیجه یافت شد</li>
            </ul>
        </div><!--page-navigator-->
        <form action="do_search.php" method="post" id="form_search">
        <div class="filters-selected"></div><!--filters-seleckted-->

        <ul class="filter-top">
            <?php
            include('connect.php');
            $sql = "select * from tbl_attr WHERE id_category=1 AND filter_attr=1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result_filter = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result_filter as $row) {
                $id=$row['id'];?>

                <li data-id="<?=$row['id']?>"><span class="title-span"><?= $row['title'] ?></span><img src="images/Untitled-1.png">
                    <div class="options">
                        <ul>
                            <li><a>نمایش همه</a>
                                <span class="squere"></span>
                            </li>
                            <div class="line-options"></div>
                            <?php
                            $sql = "select * from tbl_attr_search WHERE id_attr IN ($id)";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result_li_filter = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($result_li_filter as $filter_li){?>
                          <li data-id="<?=$row['id']?>" data_id_attr="<?=$filter_li['id']?>"><a><?=$filter_li['value']?></a>
                              <span class="squere"></span>
                          </li>
                      <?php }?>
                        </ul>
                    </div><!--options-->
                </li>
            <?php } ?>
        </ul><!--fliter-top-->
</form>
<!--        <input type="text" name="send" onclick="send_form()">-->
<!--        <script>-->
<!--            function send_form() {-->
<!--                $('#form_search').submit();-->
<!--            }-->
<!--        </script>-->
        <div class="search2">
            <input type="text" placeholder="جستجو کنید">
            <img src="images/search2.png">
        </div><!--search2-->
        <span class="exist">
        <span class="exist-back"></span>
        <span class="exist-yesno"></span>
            </span><!--exist-->
        <p style="font-family: yekan;font-size: 11pt;margin: 0;float: right;margin-top: 23px;margin-right: 55px;">فقط
            نمایش کالاهای موجود</p>
        <div class="display-type">
            <span class="type1"></span>
            <span class="type2"></span>
            <p style="font-family: yekan;font-size: 11pt;margin: 0;float: left;margin-left: 5px;margin-top: 9px;">نوع
                نمایش</p>
        </div><!--display-type-->
        <div class="sort">
            <span>مرتب کردن بر اساس </span>
            <select>
                <option>قیمت</option>
                <option>پر بازدید ترین</option>
                <option>پر فروش ترین ها</option>
            </select>
            <select>
                <option>صعودی</option>
                <option>نزولی</option>
            </select>
        </div><!--sort-->
        <div class="paging">
            <span style="margin-left: 50px;">صفحه بعد</span>
            <ul>
                <li>1</li>
                <li>2</li>
            </ul>
            <span>صفحه قبل</span>
        </div><!--paging-->

        <div id="products">
            <ul>
                <li>
                    <a>
                        <div class="right">
                            <div class="img">
                                <img src="images/product1.jpg">
                            </div><!--img-->
                            <div class="colors">
                                <span class="color" style="background:gold;"></span>
                                <span class="color" style="background:black;"></span>
                                <span class="color" style="background:red;"></span>
                            </div><!--colors-->
                            <div class="stars">
                                <div class="star-gray"></div>
                                <div class="star-red"></div>
                            </div><!--stars-->
                        </div><!--right-->
                        <div class="left">
                            <div class="title">
                                <p>Apple iPhone 5s-16GB Mobile phone</p>
                            </div><!--title-->
                            <div class="description">
                                توضیحات
                            </div>
                            <div class="price">
                    <span class="price-old">
                        <p>2,500,000 تومان</p>
                    </span><!--price-old-->
                                <span class="price-new">
                        <p>2,000,000 تومان</p>
                    </span><!--price-old-->
                            </div><!--price-->
                            <div class="addtocart">
                                <img src="images/addtocart-min.png">
                            </div><!--addtocart-->
                        </div><!--left-->
                    </a>
                </li>
            </ul>

        </div><!--products-->
    </div><!--content-search-->

</div><!--main-search-->


<?php
include('footer.php');
?>


<?php
include
('script-menu.php');
?>

<?php
include
('script-checkbox.php');
?>
<?php
include
('script-search.php');
?>


</body>
</html>