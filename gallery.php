<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">

    <title> مدیریت گالری</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap4.3.1.css">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap4.3.1.js"></script>

</head>
<body style="direction: rtl">


<?php
include('top.php');
?>


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
        <p class="title_category">مدیریت تصاویر گالری</p><!--title_category-->

        <form action="" method="post" enctype="multipart/form-data" id="image">
            <div class="row_form">
                <p class="onvan_category">افزودن تصویر گالری:</p>
                <input type="file" class="tit_category" name="myfile">
            </div><!--row_form-->


            <div class="row_form">
                <p class="onvan_category"> تصویر محصول:</p>
                <input type="file" class="tit_category" name="img_product">
            </div><!--row_form-->
        </form>


        <div class="container" style="width: 900px;float: right;">
            <div class="col-12">
                <a>
                    <button class="btn btn-success" onclick="submitformimg()"
                            style="font-family: Yekan;font-size: 12pt;margin-bottom: 15px;margin-top: 10px;float: right;margin-right:660px;">
                        افزودن تصویر

                    </button>
                </a>

                <form action="" method="post">
                    <a>
                        <button class="btn btn-danger" onclick="submitform();" name="delete"
                                style="font-family: Yekan;font-size: 12pt;margin-bottom: 10px;margin-top: 10px;float: right;margin-right: 10px;">
                            حذف
                        </button>
                    </a>
            </div><!--col-->

        </div><!--container-->


        <table class="tbl_cat" cellspacing="0">
            <tr>
                <td style="border-right: 1px solid #aaaaaa">ردیف</td>
                <td>نام تصویر</td>
                <td>تصویر</td>
                <td style="border-left:1px solid #aaaaaa;">انتخاب</td>
            </tr>
        </table><!--tbl_cat-->
        <?php
        $id = $_GET['id'];
        include('connect.php');
        $i = 1;
        $sql = "select * from tbl_gallery  WHERE idproduct='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($result_gallery = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $idd = $result_gallery['id'];
            $name_img = $result_gallery['img_small'];

            echo '
   <table class="tbl_cat2">
            <tr>
                <td>' . $i . '</td>
                <td>' . $name_img . '</td>
                <td ><img style="width: 100px;height: 100px;margin-top:8px;" src="file/' . $id . '/' . $name_img . ' " ></td>
                <td><input type="checkbox" name="id[]" value="' . $idd . '"></td>
            </tr>
            </table><!--tbl_cat2-->

';
            $i++;
        }
        ?>

        </form>
        </br>
        <?php
        if (isset($_FILES['myfile'])) {
            $file = $_FILES['myfile'];
            $fileName = $file['name'];
            $fileSize = $file['size'];
            $filetmp = $file['tmp_name'];
            $fileType = $file['type'];
            $fileError = $file['error'];


            $targetmain = 'file /';
            $name = time();

            if ($fileType == 'image/jpg' or $fileType == 'image/jpeg' or $fileType == 'image/png') {
                $uploadok = 1;
            } else {
                $uploadok = 0;
            }

            if ($fileSize > 5120000) {
                $size = 1;
            } else {
                $size = 0;
            }
            if (!file_exists(mkdir('file /' . $id))) {
                if ($uploadok == 1) {
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    $target = $targetmain . '/' . $id . '/' . $name . '.' . $ext;

                    move_uploaded_file($filetmp, $target);

                    $sql2 = "insert into tbl_gallery (idproduct,img_small) VALUES ($id,'$name.$ext')";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->execute();

                }

                ob_clean();
                header('location:gallery.php?id=' . $id . ' ');
            }

        }
        ?>

        <?php
        if (isset($_FILES['img_product'])) {
            $file2 = $_FILES['img_product'];
            $fileName2 = $file2['name'];
            $fileSize2 = $file2['size'];
            $filetmp2 = $file2['tmp_name'];
            $fileType2 = $file2['type'];
            $fileError2 = $file2['error'];


            $targetmain2 = 'file /product';
            $name2 = time();

            if ($fileType2 == 'image/jpg' or $fileType2 == 'image/jpeg' or $fileType2 == 'image/png') {
                $uploadok = 1;
            } else {
                $uploadok = 0;
            }

            if ($fileSize2 > 5120000) {
                $size = 1;
            } else {
                $size = 0;
            }
            if (!file_exists(mkdir('file /product/' . $id))) {
                if ($uploadok == 1) {
                    $ext2 = pathinfo($fileName2, PATHINFO_EXTENSION);
                    $target2 = $targetmain2 . '/' . $id . '/' . $name2 . '.' . $ext2;

                    move_uploaded_file($filetmp2, $target2);

                    $sql2 = "update tbl_product set img='$name2.$ext2' WHERE id='$id' ";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->execute();

                }


                ob_clean();
                header('location:gallery.php?id=' . $id . ' ');
            }


        }
        ?>





        <?php

        if (isset($_POST['delete'])) {

            $ids = $_POST['id'];
            $idss = join(',', $ids);

            $sql = "select * from tbl_gallery where idproduct='$id' AND id IN ($idss)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $name_img = $result['img_small'];
                unlink('file/' . $id . '/' . $name_img . '');
            }

            if (!empty('file/'.$id.'')){
               $f='file/'.$id.'';
                rmdir($f);
            }

            $sql3 = "delete from tbl_gallery WHERE id IN ($idss)";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->execute();

            header('location:gallery.php?id=' . $id . ' ');
        }


        ?>
    </div><!--left-->
    <script>
        function submitform() {
            $('form').submit();
        }

        function submitformimg() {
            $('#image').submit();
        }


    </script>
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