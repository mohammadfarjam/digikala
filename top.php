
<div id="header1">
    <div id="header">
        <div id="logo">
            <img src="images/logo.png">
        </div><!--logo-->

        <div id="login">
            <img class="img-login" src="images/padlock.png">
            <span style="margin-left: 50px;font-family:yekan;font-size: 11pt;color:#929782;line-height: 44px;display:block;float: right;"><a style="text-decoration: none;" href="login.php">وارد شوید</a>
                <p style="margin:0px;padding:0px;float: right;">فروشگاه اینترنتی دیجی کالا،</p></span>
            <img class="img-login" src="images/register.png">
            <a target="_blank" href="register.php"><span
                    style="font-family:yekan;font-size:11pt;color: #929782;line-height: 44px;display:block;float: right;">ثبت نام کنید</span></a>
        </div><!--login-->
       <div class="basket_search">
        <div id="basket-right">
            <img class="img-basket" src="images/basket.png">
        </div><!--bascket-right-->
        <div id="basket-left">
    <span style="font-family: yekan;font-size: 11pt;color: #ffffff;margin-right: 25px;
line-height: 30px;">سبد خرید</span>
            <div id="tedad-dar-sabad"><p>12</p>
            </div><!--tedad-dar-sabad-->
        </div><!--basket-left-->

        <div id="search">
            <input type="text" placeholder="محصول،دسته یا برند مورد نظرتان را جستوجو کنید..."/>
            <div id="btn-search">
                <img class="img-search" src="images/search.png">
            </div><!--btn-search-->
        </div><!--search-->
       </div><!--basket_search-->
    </div><!--header-->
</div><!--header1-->
<div id="nav">
    <div id="menu-top">
        <ul>
            <?php

    include ('connect.php');
    $sql="select * from tbl_category WHERE parent='0'";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result_menu=$stmt->fetchAll(PDO::FETCH_ASSOC);
$i=[];
            foreach ($result_menu as $row) {

                $idd=$row['id'];
                $i=join(',',$i);
                $sql="select * from tbl_category WHERE parent='$i'";
                $stmt=$conn->prepare($sql);
                $stmt->execute();
                $child_menu=$stmt->fetchAll(PDO::FETCH_ASSOC); ?>

            <li data-time="<?=$row['id']?>"><a> <?=$row['title']?><img class=down-arrow src="images/down-arrow.png"></a>

                <ul>
                    <?php
                    foreach ($child_menu as $level1){
                       array_push($idd,$level1['id']);
                        ?>

                    <li data-time="<?=$level1['id']?>">
                        <a><?=$level1['title']?></a>
                       <?php }?>

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
                </ul>
            </li>
            <?php }?>
        </ul>


    </div><!--menu-top-->
</div><!--nav-->