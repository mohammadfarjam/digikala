<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title> داشبورد</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="Highcharts-8.0.0/code/highcharts.js"></script>
    <script src="Highcharts-8.0.0/code/modules/exporting.js"></script>
</head>
<body style="direction: rtl">


<?php
include('top.php');
?>


<div id="main_admin">
    <div class="right">
        <ul>
            <li><i class="icon_admin"></i><a href="admin_dashboard.php" class="back_admin">داشبورد</a></li>
            <li><i class="icon_admin"></i><a href="admin_category.php" class="back_admin-light">مدیریت
                    دسته ها</a></li>
            <li><i class="icon_admin"></i><a href="admin_product.php" class="back_admin">مدیریت
                    محصولات</a></li>
            <li><i class="icon_admin"></i><a href="admin_orders.php" class="back_admin-light">مدیریت
                    سفارشات</a></li>
            <li><i class="icon_admin"></i><a href="admin_orders.php" class="back_admin">آمار و گزارشات</a></li>
            <li><i class="icon_admin"></i><a href="admin_comment.php" class="back_admin-light">
                    مدیریت نظرات</a></li>
        </ul>
    </div><!--right-->
    <div class="left">

        <?php
        include('connect.php');
        include('jdf.php');
        $today_date = date('Y/m/d');
        $today_time = time();
        $last_week_time = $today_time - (7 * 24 * 3600);
        $last_week_date = date('Y/m/d', $last_week_time);

        $start_day = $last_week_date;
        $last_day = $today_date;
        $current = strtotime($start_day);
        $last = strtotime($last_day);
        $dates = [];
        while ($current <= $last) {
            $dates[] = date('Y/m/d', $current);
            $current = strtotime('+1 day', $current);

        }
        $sql = "select * from tbl_order ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result_order = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $orderstat = [];


        foreach ($dates as $e) {
            $m = explode('/', $e);
            $year = $m[0];
            $mount = $m[1];
            $day = $m[2];
            $j = gregorian_to_jalali($year, $mount, $day);
            $j = implode('/', $j);
            $orderstat[$j] = 0;
        }


        foreach ($result_order as $row) {
            $date = $row['date'];
            $jalali = explode('/', $date);
            $year = $jalali[0];
            $mount = $jalali[1];
            $day = $jalali[2];
            $miladi = jalali_to_gregorian($year, $mount, $day);
            $miladii = implode('/', $miladi);
            $miladii = new DateTime($miladii);
            $miladii = $miladii->format('Y/m/d');


            $milad = explode('/', $miladii);
            $year = $milad[0];
            $mount = $milad[1];
            $day = $milad[2];
            $jalali = gregorian_to_jalali($year, $mount, $day);
            $jalalii = implode('/', $jalali);


            if (in_array($miladii, $dates)) {

                if (isset($orderstat[$jalalii])) {
                    $orderstat[$jalalii] = $orderstat[$jalalii] + 1;
                } else {
                    $orderstat[$jalalii] = 1;
                }
            }

        }
        $keys = array_keys($orderstat);
        $key=implode(',',$keys);
        $values = array_values($orderstat);
        $value = implode(',', $values);

        ?>

        <div id="container"></div>
        <script type="text/javascript">
            Highcharts.chart('container', {


                title: {
                    text: 'آمار فروش طی 7 روز گذشته'
                },

                subtitle: {
                    text: ''
                },

                 xAxis :{
                    categories: [<?php foreach ($keys as $k){echo "'$k',";}?>]
                },

                yAxis: {
                    title: {
                        text: 'تعداد'

                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
//                        pointStart:<?php //foreach ($keys as $k){echo "'$k',";}?>

                    }
                },

                series: [{
                    name: 'تعداد خرید',
                    data:[<?php echo $value?>]
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });
        </script>

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
<?php

?>

</body>
</html>