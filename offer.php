<html>
<head>
</head>
<body>
<div id="offer">
    <img src="images/amazing-offer.png">
    <div class="flipTimer"
         style=" transform: scale(0.3);direction: ltr;top: -21px;position: absolute;float:left;left: -652px;">
        <div class="hours"></div>
        <div class="minutes"></div>
        <div class="seconds"></div>
    </div>

    <?php
    $sql="select * from tbl_product";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $res=$stmt->fetch();
    $special_time=$res['special_time'];

    $sql="select * from tbl_option WHERE setting='time'";
    $stmt2=$conn->prepare($sql);
    $stmt2->execute();
    $ress=$stmt2->fetch();
    $time_value=$ress['value'];
    $time_end=$special_time+$time_value;
    date_default_timezone_set('Asia/Tehran');
    $date=date('F d,Y H:i:s',$time_end);
    ?>
    <script>
        $('.flipTimer').flipTimer({
            direction: 'down',
            date: '<?php echo $date ?>',
            callback: function () {
                $('.finished2 p').css('display', 'block');


            }
        });

    </script>
    <div class="discount">
        <?php
        $idnumber = $_GET['id'];
        $sql="select * from tbl_product WHERE id=?";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(1,$idnumber);
        $stmt->execute();
        $res=$stmt->fetch();
        $price_slider=$res['price_slider'];
        $price_off_slider=$res['price_off_slider'];
        $price_off_total=$price_slider-$price_off_slider;

        ?>
        <span class="right"><?php echo $price_off_total ?></span>
        <span class="center">هزار تومان</span>
        <span class="left">تخفیف</span>
    </div><!--discount-->
</div><!--offer-->
</body>

</html>


