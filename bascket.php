<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>سبد خرید</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>


</head>
<body style="direction: rtl">
<?php
session_start();
include('top.php');
?>

<div id="main-bascket">
    <div class="your-shop">
        <div class="head">
            <p>سبد خرید شما در دیجی کالا</p>
        </div><!--head-->
        <table cellspacing="0">
            <thead>
            <tr>
                <td>شرح محصول</td>
                <td>تعداد</td>
                <td>قیمت واحد</td>
                <td>قیمت کل</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php

            $cookie = $_COOKIE['mybasket'];
            include('connect.php');
            $sql = "select b.tedad,b.garantee AS garanteebasket,p.*,p.id AS idp,c.name_color,c.id AS colorid,g.title_garantee,b.id AS idbasket FROM tbl_basket b
JOIN tbl_product p ON b.idproduct=p.id
JOIN tbl_colors c ON b.color=c.id
JOIN tbl_garantee g ON b.garantee=g.id WHERE cookie='$cookie' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $ee = serialize($result);
            $_SESSION['basket'] = $ee;
            $bas = count($result);
            for ($z = 0; $z < $bas; $z++) {

                echo '
                   <tr>
                <td>
                    <div class="right">
                        <img style="max-width: 190px;max-height: 135px;margin: auto;margin-top: 15px;" src="file/' . $result[$z]['idp'] . '/' . $result[$z]['img'] . '">
                    </div>
                    <div class="left">
                        <p>' . $result[$z]['title'] . '</p>
                        <p>رنگ :' . $result[$z]['name_color'] . '</p>
                        <p>' . $result[$z]['title_garantee'] . '</p>
                    </div>
                </td>
                <td>
                    <div class="tedad"><span class="text" data_idp="' . $result[$z]['idp'] . '">' . $result[$z]['tedad'] . '</span>
                        <img src="images/arrow-pointing-down.png">
                        <div class="option">
                            <ul>';
                ?>

                <?php
                for ($f = 1; $f < 10; $f++) { ?>
                    <li onclick="updatebasket(<?= $f ?>,<?= $result[$z]['idp'] ?>,<?= $result[$z]['idbasket'] ?>,<?= $result[$z]['colorid'] ?>,<?= $result[$z]['garanteebasket'] ?>);"><?= $f ?></li>
                <?php } ?>

                <?php
                $total_price[$z] = $result[$z]['price'] * $result[$z]['tedad'];
                echo '</ul>
                        </div><!--option-->
                    </div><!--tedad--> </td>
                <td>' . $result[$z]['price'] . ' تومان</td>
                <td>' . $total_price[$z] . ' تومان</td>
                <td onclick="deleteprobasket(' . $result[$z]['idbasket'] . ')"><img src="images/Delete.gif" style="cursor: pointer;"></td>
            </tr>';
                @$total_price_all = $total_price_all + $total_price[$z];
            }
            ?>

            </tbody>
            <script>
                $('.tedad').click(function () {
                    var idpro = $(this).find('.text').attr('data_idp');
                });

                function updatebasket(f, idp, idbasket, idcolor, garanteebasket) {
                    var url = 'ajax.php';
                    var data = {tedad: f, idd: idp, idbasket: idbasket, color: idcolor, garantee: garanteebasket};
                    $.post(url, data, function (msg) {
                        createbasketlist(msg);
                        console.log(msg);
                    }, 'json')
                }

                function deleteprobasket(idbasket) {
                    var url = 'ajax_basket.php';
                    var data = {idbasket: idbasket};
                    $.post(url, data, function (msg) {
                        createbasketlist(msg);
                    }, 'json')
                }


                function createbasketlist(msg) {
                    $('tbody tr').remove();

                    var len = msg.length;
                    var totalall = 0;
                    var t;
                    for (t = 0; t < len; t++) {
                        var price = msg[t]['price'];
                        var tedad = msg[t]['tedad'];
                        var idbasket = msg[t]['idbasket'];
                        var idpro = msg[t]['id'];
                        var color = msg[t]['name_color'];
                        var idcolor = msg[t]['colorid'];
                        var garantee = msg[t]['title_garantee'];
                        var idgarantee = msg[t]['garantee'];
                        var garanteebasket = msg[t]['garanteebasket'];
                        var total = price * tedad;
                        totalall = total + totalall;

                        var trTag = '<tr><td><div class="right"><img style="max-width: 190px;max-height: 135px;margin-top: 15px;" src="file/' + msg[t]['id'] + '/' + msg[t]['img'] + '"></div><div class="left"><p>' + msg[t]['title'] + '</p><p>رنگ :' + color + '</p><p>' + garantee + ' </p></div></td><td><div class="tedad"><span class="text">' + msg[t]['tedad'] + '</span><img src="images/arrow-pointing-down.png"><div class="option"><ul><?php for($i = 1; $i < 10; $i++){?><li onclick="updatebasket(<?= $i ?>,' + idpro + ',' + idbasket + ',' + idcolor + ',' + garanteebasket + ')"><?= $i ?></li><?php }?></ul></div><!--option--></div><!--tedad--></td><td>' + msg[t]['price'] + 'تومان </td><td>' + total + 'تومان </td><td onclick="deleteprobasket(' + msg[t]['idbasket'] + ')"><img src="images/Delete.gif" style="cursor: pointer;"></td></tr>';

                        $('tbody').append(trTag);
                    }
                    $('.total-price .mablagh').text(totalall);
                    $('.total-price-done .mablagh').text(totalall);

                    //این دستور برای باز و بسته شدن قسمت option می باشد
                    $('.your-shop table .tedad').click(function () {
                        $('.option', this).fadeToggle(0);
                    });
                }

            </script>
        </table>
        <div class="total-price">
            <p>جمع کل خرید شما:</p>
            <span class="toman">تومان</span>
            <span class="mablagh"><?= $total_price_all ?></span>
        </div><!--total-price-->
        <div class="total-price-done">
            <p>جمع کل خرید شما:</p>
            <span class="toman">تومان</span>
            <span class="mablagh"><?= $total_price_all ?></span>

        </div><!--total-price-done-->
        <br>
        <a href="user.php" class="btn-green">خرید خود را نهایی کنید</a>
        <br>
    </div><!--your-shop-->

</div><!--main-bascket-->

<?php
include('footer.php');
?>


<?php
include
('script-menu.php');
?>

<?php
include
('script-bascket.php');
?>


</body>
</html>