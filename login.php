<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ورود به دیجی کالا</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.3.1.min.js"></script>


</head>
<body style="direction: rtl">
<?php
include('top.php');
?>
<?php
include('connect.php');
if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "select * from tbl_user WHERE email='$email' AND password='$password' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result_login = $stmt->fetch(PDO::FETCH_ASSOC);
    $e = $result_login['email'];
    $p = $result_login['password'];
    $userid = $result_login['id'];


    if ($e == $email & $p == $password) {
        $_SESSION['login']='true';
        $_SESSION['userid']=$userid;
        ob_clean();
        header('location:panel.php');
    } else {
        ob_clean();
        header('location:login.php');
    }

}
?>

<div id="main-register">
    <div class="main-register1">
        <i></i>
        <p>به دیجی کالا وارد شوید</p>

        <form action="" method="post">
            <div id="main-register-right">
                <span>پست الکترونیک</span>
                <input type="email" name="email" placeholder="email">
                <br>
                <br>
                <span>رمز عبور</span>
                <input type="password" name="password" placeholder="password">

                <div class="register-btn">
                    <span2 onclick="submit();">ورود به دیجی کالا</span2>
                </div>
            </div><!--main-register-right-->
        </form>



        <div id="main-register-left">
            <ul>
                <i style="background-position: -981px -332px"></i>
                <li>سریع تر و ساده تر خرید کنید.</li>
                <i style="background-position: -981px -286px"></i>
                <li>به سادگی سوابق خرید و فعالیت های خود را مدیریت کنید.</li>
                <i style="background-position: -981px -245px"></i>
                <li>لیست علاقه مندی های خود را بسازید و تغیرات آنها را دنبال کنید.</li>
                <i style="background-position: -981px -203px"></i>
                <li>نقد بررسی و نظرات خود را با دیگران به استراک گذارید.</li>
                <i style="background-position: -981px -166px"></i>
                <li>در جریان فروش های ویژه و قیمت روز محصولات قرار بگیرید.</li>
            </ul>
        </div><!--main-register1-->

    </div><!--main-register-->


    <?php
    include ('footer.php');
    ?>

    <?php
    include
    ('script-menu.php');
    ?>
    <?php
    include
    ('script-checkbox.php');
    ?>
    <script>
        function submit() {
            $('form').submit();

        }

    </script>
</body>
</html>