<script>

    var nextslid = 1;
    var slidertag2 = $('.slider2-right');
    var slideritem2 = slidertag2.find('.item2');
    var numitem2 = slideritem2.length;
    var slidernavigator2 = $('.slider2').find('.slider-navigation2 ul li');
    var timeout2 = 5000;
    var sliderinterval;

    function slider2() {
        slideritem2.hide();
        slideritem2.eq(nextslid - 1).show(0);
        slidernavigator2.removeClass('active2');
        slidernavigator2.eq(nextslid - 1).addClass('active2');
        nextslid++;

        if (nextslid > numitem2) {
            nextslid = 1;
        }
    }

    /*این دستور برای زمانی که ما روی navigator کلیک میکنیم محصول مورد نظر ظاهر شود*/
    $('.slider-navigation2 ul li').click(function () {
        clearInterval(sliderinterval);/* این دستور برای توقف اتوماتیک اسلایدر می باشد*/
        var index = $(this).index();
        gotoslider2(index + 1);
    })

    function gotoslider2(index) {
        nextslid = index;
        slider2();

    }


    slider2();
    sliderinterval=setInterval(slider2,timeout);









    $('.slider-navigation2 , .slider2-right').hover(function () {
        clearInterval(sliderinterval);
    })





    slidertag2.mouseleave(function () {
        clearInterval(sliderinterval);
        sliderinterval=setInterval(slider2,timeout);

    })



</script>