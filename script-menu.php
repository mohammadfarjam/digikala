<script>
    var timer = {};
    $('#menu-top li').hover(function () {
        var tag=$(this);
        var timeAttr=tag.attr('data-time');
        clearTimeout(timer[timeAttr]);
        timer[timeAttr]=setTimeout(function () {
            tag.addClass('active-menu');
            $(' > ul ',tag).fadeIn(0);
            $('> #top-menu3',tag).fadeIn(0);
        },500);

    },function () {
      var tag = $(this);
      var timeAttr = tag.attr('data-time');
        clearTimeout(timer[timeAttr]);
        timer[timeAttr] = setTimeout(function () {
            tag.removeClass('active-menu');
            $('> ul ', tag).fadeOut(0);
            $('> #top-menu3', tag).fadeOut(0);
        }, 600);


    })




    //این دستور برای این بود که منو سطح سوم موقع hover شدن رنگ نوشته قرمز میشد و به حالت اول بازگشت نداشت.
    $('#top-menu3 ul li a').hover(function () {
        $(this).css('color','#ff6b57');
    },function () {
        $(this).css('color','black');
    })


//این قسمت برای تغییر رنگ نوشته های منو است
$('#menu-top >ul >li').hover(function () {
    $(this).addClass('active-menu1');
},function () {
    $(this).removeClass('active-menu1');
})







</script>