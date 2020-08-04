<script>
    var nextslide = 1;
    var slidertag = $('#slider');
    var slideritem = slidertag.find('.item');
    var numitem = slideritem.length;/*این دستور برای پیدا کردن طول یا تعداد کل عکس های اسلایدر می باشد*/
    var slidernavigator =slidertag.find("#slider-navigation ul li");
    var timeout=5000; /* این دستور برای زمان نمایش هر اسلایدر میباشد*/
    var sliderinterval;

    function slider() {
        slideritem.fadeOut(500);
        slideritem.eq(nextslide - 1).fadeIn(1000);
        slidernavigator.removeClass('active');
        slidernavigator.eq(nextslide-1).addClass('active');
        nextslide++;
        /*این دستور برای این است که وقتی اسلاید به انتها رسید دوباره از ابتدا شروع شود */
        if (nextslide > numitem) {
            nextslide = 1;
        }
        /* این دستور برای این است که وقتی اسلاید به ابتدا رسید دوباره از اخر شروع شود*/
        if (nextslide < 1) {
            nextslide = numitem;
        }
    }


    $('.next').click(function () {
        clearInterval(sliderinterval);/* این دستور برای توقف اتوماتیک اسلایدر می باشد*/
        gotonext();
    })

    function gotonext() {
        slider();
    }


    $('.prev').click(function () {
        clearInterval(sliderinterval);/* این دستور برای توقف اتوماتیک اسلایدر می باشد*/
        gotoprev();

    })



    function gotoprev() {
        nextslide = nextslide - 2;
        /*این دستور برای بازگشت به عقب می باشد*/
        slider();
    }


    /*این دستور برای زمانی که ما روی navigator کلیک میکنیم محصول مورد نظر ظاهر شود*/
    $('#slider-navigation ul li').hover(function () {
        clearInterval(sliderinterval);/* این دستور برای توقف اتوماتیک اسلایدر می باشد*/
        var index = $(this).index();
        gotoslider(index + 1);

    });


    function gotoslider(index) {
        nextslide = index;
        slider();
    }



     slider();/* این دستور برای این است که زمانی که صفحه را بارگذاری میکنیم در ابتدا تصویر اول اسلایدر اجرا شود*/
     sliderinterval=setInterval(slider,timeout);/* این دستور برای حرکت اتوماتیک اسلایدر می باشد*/

    slidertag.mouseleave(function () {
        clearInterval(sliderinterval);
        sliderinterval=setInterval(slider,timeout);
    })

</script>