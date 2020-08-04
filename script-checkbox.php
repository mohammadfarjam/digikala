<script>
    $('.check-input').click(function () {
        if ($(this).is(':checked')) {
            $(this).parents('.checkbox').find('.label-border').addClass('checked');
        }
        else {
            $(this).parents('.checkbox').find('.label-border').removeClass('checked');
        }
    })


    //checkbox2

    $('.check-input2').click(function () {
        if ($(this).is(':checked')) {
            $(this).parents('.noe ul .checkbox2').find('.label-border2').addClass('checked2');
        }
        else {
            $(this).parents('.noe ul .checkbox2').find('.label-border2').removeClass('checked2');
        }
    })


    //قسمت hover شدن روی هر کدام از li در قسمت option
    $('.options li').hover(function () {
        $('.squere', this).addClass('squere-li-hover');
    }, function () {
        $('.squere', this).removeClass('squere-li-hover');
    })

    //قسمت click کردن و انتخاب کردن هر کدام از li در قسمت option
    $('.options li').click(function () {
        $('.squere', this).toggleClass('squere-li-seleckted');


    });


    //این قسمت برای اضافه کردن filter-seleckted به ان بالا می باشد با استفاده از دستور append
    var Items = $('.filter-top .options li');
    Items.click(function () {

        var title = $(this).parents('li').find('.title-span').text();
        var value = $(this).text();
        var id = $(this).attr('data-id');

        var id_attr = $(this).attr('data_id_attr');
        var filterseleckted = $('.filters-selected p').find('[data-id=' + id +']');
        var len = filterseleckted.length;
        if (len > 0) {
            filterseleckted.remove();

        } else {

            var p = '<p data-id="' +id + '">' + title + ' : ' + value + '<i onclick="removeseleckted(this)"></i><input type="hidden" value="' + id_attr + '" name="' + id + '[' + id_attr + ']"></p>';
            $('.filters-selected').append(p);
        }

//$('#content-search input[name=send]').trigger('click');
        dosearch();
    });


    //این دستور برای انجام جستوجو به صورت ajax می باشد
    function dosearch() {
        var data = $('#form_search').serializeArray();
        var url = 'do_search.php';
        $.post(url, data, function (msg) {
            console.log(msg);
        });
    }


    //برای حدف کردن قسمت filter-selected
    function removeseleckted(tag) {
        var tag_p = $(tag).parents('p').remove();
        var id = tag_p.attr('data-id');
        $('[data-id="' + id + '"]').find('.squere').removeClass('squere-li-seleckted');//این دستور برای زمانی است که کاربر بر روی گزینه حذف کلیک کرد همزمان کلاسی که به squre داده بودیم هم حذف گردد


    }


    $('.filter-top li').click(function () {
        $('.options', this).slideDown(900);
    });

    $('.filter-top li').mouseleave(function(){
        $('.options', this).slideUp(900);
    });


</script>
