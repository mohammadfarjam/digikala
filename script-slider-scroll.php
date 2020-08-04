<script>

    function sliderscroll(direction,tag) {
       var span_tag=$(tag);
        var sliderscrolltag = span_tag.parents('.slider_scroll');
        var sliderscrollul = sliderscrolltag.find('.sliderscroll_main ul ');
        var sliderscrollitems = sliderscrollul.find(' li ');
        var sliderscrollitemsnumbers = sliderscrollitems.length;
        var sliderscrollnumbers=Math.ceil(sliderscrollitemsnumbers/3);
        var tedad=(sliderscrollitemsnumbers*206)-824;
        var maxnegativemargin = -(sliderscrollnumbers - 1) * tedad ;
        sliderscrollul.css('width',sliderscrollitemsnumbers*206);




        var marginrightold = sliderscrollul.css('margin-right');

        if (direction == 'next') {
            var marginrightnew = parseFloat(marginrightold) - 206;

        }
        if (direction == 'prev') {
            var marginrightnew = parseFloat(marginrightold) + 206;

        }

        if (marginrightnew < maxnegativemargin) {
            var marginrightnew =maxnegativemargin;
        }
        if (marginrightnew > 0) {
            var marginrightnew = 0;
        }



        sliderscrollul.animate({'marginRight': marginrightnew}, 1000);

    }

    $('.next2').click(function () {
        sliderscroll('next');
    });

    $('.prev2').click(function () {
        sliderscroll('prev');
    });



    function sliderscroll2(direction,tag) {
        var span_tag=$(tag);
        var sliderscrolltag = span_tag.parents('.slider_scroll2');
        var sliderscrollul = sliderscrolltag.find('.sliderscroll_main ul ');
        var sliderscrollitems = sliderscrollul.find(' li ');
        var sliderscrollitemsnumbers = sliderscrollitems.length;
        var sliderscrollnumbers=Math.ceil(sliderscrollitemsnumbers/5);
        var tedad=(sliderscrollitemsnumbers*224)-1120;
        var maxnegativemargin = -(sliderscrollnumbers - 1) * tedad ;
        sliderscrollul.css('width',sliderscrollitemsnumbers*224);




        var marginrightold = sliderscrollul.css('margin-right');

        if (direction == 'next') {
            var marginrightnew = parseFloat(marginrightold) - 224;

        }
        if (direction == 'prev') {
            var marginrightnew = parseFloat(marginrightold) + 224;

        }

        if (marginrightnew < maxnegativemargin) {
            var marginrightnew =maxnegativemargin;
        }
        if (marginrightnew > 0) {
            var marginrightnew = 0;
        }



        sliderscrollul.animate({'marginRight': marginrightnew}, 1000);

    }

    $('.next2').click(function () {
        sliderscroll2('next');
    });

    $('.prev2').click(function () {
        sliderscroll2('prev');
    });


</script>