<script>
    $('.details-left .right ul li').click(function () {
        $('.circle').removeClass('active');
        $('.circle', this).addClass('active');
    });


    //    //دستور مربوط به انتخاب نوع گارانتی
    //    $('.garanty').click(function () {
    //        $('ul', this).slideToggle(200);
    //    });
    //    $('.garanty ul li').click(function () {
    //        var txt = $(this).text();
    //        $('.garanty .title-garanty').text(txt);
    //    });


    //این دستورات برای قسممت ادامه ی مطلب و بستن می باشد
    $('.introdoction .more').click(function () {

        $('.introdoction .justi').toggleClass('active');
        $('.introdoction .close').css('display', 'block');
        $(this).hide();
    });
    $('.introdoction .close').click(function () {
        $('.introdoction .justi').removeClass('active');
        $('.introdoction .more').css('display', 'block');
        $(this).hide();
    });

    //    function pro() {
    //        window.location='product.php?id=<?//=$id_product?>//';
    //
    //
    //    }


    //کدهای مربوط به ساخت Tab
    $('.tab li').click(function () {
        changetab($(this));
    });

    function changetab(tag) {
        $('.tab li').removeClass('active');
        tag.addClass('active');
        $('.tab-childs section').fadeOut(10);
        var index = tag.index();
        $('.tab-childs section').eq(index).fadeIn(100);

    };
    // این دستور در jquery همانند رویداد کلیک عمل میکند(یعنی همان کار کلیک دستی را میکند)


    //این کد مربوط به زمانی که کاربر در بخش نقد و بررسی بر یروی علامت مثبت یا منفی کلیک کرد یا بر روی عنوان ها کلیک کرد توضیحات به صورت کشویی نمایش داده شوند
    $('.itemcontiner .item i').click(function () {
        var item = $(this).parents('.item');
        $(this).toggleClass('active');
        $('.description', item).slideToggle(200);
    });


    //این دستورات برای zoom می باشد
    $('#zoom').elevateZoom({
        'zoomWindowOffetx': -850,
        'zoomWindowOffety': -12,
        'easing': true,
        'zoomWindowWidth': 450,
        'zoomWindowHeight': 450,
        'borderSize': 2,
        'zoomLevel': .85,
        'lensFadeIn': true,
        'lensFadeOut': true,
        'zoomWindowFadeIn': true,
        'zoomWindowFadeOut': true,
        'lensSize': 100,

    });


    //این دستورات برای scroll می باشد
    $(".scroll").mCustomScrollbar({
        "autoHideScrollbar": true,
        "keyboard": true,
        "theme": "minimal-dark",
        "scrollButtons": true,
    });


    //دستور زمانی که کاربر روی هر کدام از عکس های کوچک گالری کلیک کرد تصویر اصلی و سایز بزرگ مربوطه نمایش داده شود
    var product = $('#product-gallery .left ul li');
    $('#product-gallery .left ul li').click(function () {
        product.removeClass('active');
        $(this).addClass('active');
        var index = $(this).index();
        var imageitem = $(this).attr('data-main-image');
        if (imageitem.length > 0) {
            $('#product-gallery .right .show-image').attr('src', imageitem);
            $('#product-gallery .right #cv').fadeOut(0);
            $('#product-gallery .right .show-image').fadeIn(0);
        } else {
            $('#product-gallery .right #cv').fadeIn(0);
            $('#product-gallery .right .show-image').fadeOut(0);
        }


    });


    //دستور بستن کامل گالری عکس
    $('#product-gallery .closee').click(function () {
        $('.dark').hide();
        $('#product-gallery').fadeOut(0);
    });


    //دستور زمانی که کلیک میشود بر روی تصاویر کوچک در صفحه ی اصلی
    var product = $('#product-gallery .left ul li');
    $('#details .gallery li').click(function () {
        $('.dark').fadeIn(0);
        $('#product-gallery').fadeIn(0);
        var index = $(this).index();
        product.removeClass('active');
        $('#product-gallery .left ul li').eq(index + 1).addClass('active');
        var imageitem = $(this).attr('data-main-image');
        if (imageitem.length > 0) {
            $('#product-gallery .right .show-image').attr('src', imageitem);
            $('#product-gallery .right #cv').fadeOut(0);
            $('#product-gallery .right .show-image').fadeIn(0);
        } else {
            $('#product-gallery .right #cv').fadeIn(0);
            $('#product-gallery .right .show-image').fadeOut(0);
        }
    });

    //دستور زمانی که کلیک میشود بر روی سه نقطه در صفحه ی اصلی
    var product = $('#product-gallery .left ul li');
    $('#details .gallery .se-point').click(function () {
        $('.dark').fadeIn(0);
        $('#product-gallery').fadeIn(0);
        $('#product-gallery .right #cv').fadeIn(0);
        $('#product-gallery .right .show-image').fadeOut(0);
        product.removeClass('active');
        var c = product.index();
        $('#product-gallery .left ul li').eq(c).addClass('active');


    });

    //دستور ظاهر شدن عکس سه بعدی و تنظیمات آن
    var canvasTag = document.getElementById('cv');
    var viewer = new JSC3D.Viewer(canvasTag, {
        SceneUrl: 'images/3d/bmw.obj',
        InitRotationX: 0,
        InitRotationY: 90,
        InitRotationZ: 90,
        RenderMode: 'texturesmooth'
    });
    viewer.init();
    viewer.update();


</script>