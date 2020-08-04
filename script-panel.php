<script>




    // کد های مربوط به ساخت tab در صفحه ی پنل کاربری
    $('#main-panel .tab2 li').click(function () {
        $('#main-panel .tab2 li').removeClass('active');
        $(this).addClass('active');
        var index = $(this).index();
        $('#tab2 .tab-childs2 section').fadeOut(0);
        $('#tab2 .tab-childs2 section').eq(index).fadeIn(0);
    });


    function pro() {
        window.location='product.php?id=<?=$id_product?>';
    }





    //این کد برای عوض کردن عکس فلش قسمت جزییانت است
    $('.tab-childs2 section table tr .img-details').click(function () {
        $('.subtable').fadeToggle(100);
        $(this).toggleClass('done');
        $('.digi-bon2').fadeToggle(100);
    });


    $('#tab2 .tab-childs2 .favorite .favorite2 ul li').hover(function () {
        $(this).addClass('hover');
        $('.edit_title_favorite', this).css('display', 'block');
        $(this).find('p').addClass('hover_active');
    }, function () {
        $(this).removeClass('hover');
        $('.edit_title_favorite', this).css('display', 'none');
        $(this).find('p').removeClass('hover_active');
    });


    $('#tab2 .tab-childs2 .favorite .favorite2 ul li').click(function () {
        $('#tab2 .tab-childs2 .favorite .favorite2 ul li').removeClass('active');
        $(this).addClass('active');
    });


    //این دستور برای متوقف کردن رویداد فانکشن والد می باشد
    $('.favorite2 li .edit_title_favorite').click(function (e) {
        e.stopPropagation();
    });


    //برای ذخیره کردن نام در دیتا بیس میباشد
    function save_edit_title(id_favorite) {
        var title_favorite = $('.favorite2 ul li input').val();
        var url = 'save_edit_title_favorite.php';
        var data = {title: title_favorite, id_favorite: id_favorite}
        $.post(url, data, function (save_edit_title) {
            $('.favorite2 ul li p.hover_active ').text(save_edit_title);
            $('.favorite2 ul li.hover').find('.save_edit_title_favorite').css('display', 'none');
        })
    }


    function edit_title_favorite() {
        var title_favorite = $('.favorite2 ul li p.hover_active ').text();
        $('.favorite2 ul li p.hover_active').html('');
        $('.favorite2 ul li.hover').find('.save_edit_title_favorite').css('display', 'block');
        var input = '<input style="float: right;position: absolute;top: 15px;" type="text" value="' + title_favorite + '">';
        $('.favorite2 ul li p.hover_active').append(input);


        $('.favorite2 li input').click(function (e) {
            e.stopPropagation();
        });


        $('.favorite2 li .save_edit_title_favorite').click(function (e) {
            e.stopPropagation();
        });
    }


    function get_all_favorite() {
        $('.my-favorite').remove();
        var url = 'ajax_panel2.php';
        var data = {fav: 0}
        $.post(url, data, function (x) {
            console.log(x);
            var len = x.length;
            var i;
            for (i = 0; i < len; i++) {
                var title = x[i]['title'];
                var idproduct = x[i]['idproduct'];
                var img = x[i]['img'];
                var add_item_favorite = title;
                var my_favorite = '<div class="my-favorite"><img src="file/' + idproduct + '/' + img + '"><p>' + add_item_favorite + '</p><img class="delete" src="images/Delete.gif"></div><!--my-favorite-->';

                $('.favorite').append(my_favorite);
            }

        }, 'json')
    }


    function get_favorite(id_favorite) {
        $('.favorite .my-favorite').html('');
        $('.my-favorite').remove();
        var url = 'ajax_panel.php';
        var data = {id_favorite: id_favorite}
        $.post(url, data, function (content_favorite) {
console.log(content_favorite);
            var len = content_favorite.length;
            var i;
            for (i = 0; i < len; i++) {
                var title = content_favorite[i]['title'];
                var idproduct = content_favorite[i]['idproduct'];
                var img = content_favorite[i]['img'];
                var id_fav = content_favorite[i]['id'];
                var id_fav_parent= content_favorite[i]['parent'];

                var my_favorite = '<div class="my-favorite"><img src="file/' + idproduct + '/' + img + '"><p>' +title+ '</p><img class="delete" src="images/Delete.gif" onclick="delete_pro_favorite(' + id_fav + ','+id_fav_parent+')"></div><!--my-favorite-->';

                $('.favorite').append(my_favorite);
            }
        }, 'json');
    }


    function delete_pro_favorite(id_fav,id_fav_parent) {
        $('.favorite .my-favorite').html('');
        $('.favorite .my-favorite').css('display','none');
        var url = 'delete_pro_favorite.php';
        var data = {id_fav: id_fav,id_fav_parent:id_fav_parent}
        $.post(url, data, function (delete_favorite) {
            console.log(delete_favorite);
            var len = delete_favorite.length;
            var i;
            for (i = 0; i < len; i++) {
                var title = delete_favorite[i]['title'];
                var idproduct = delete_favorite[i]['idproduct'];
                var img = delete_favorite[i]['img'];
                var id_fav = delete_favorite[i]['id'];
                var id_fav_parent= delete_favorite[i]['parent'];

                var my_favorite = '<div class="my-favorite"><img src="file/' + idproduct + '/' + img + '"> <p>' +title + '</p><img class="delete" src="images/Delete.gif" onclick="delete_pro_favorite(' + id_fav + ','+id_fav_parent+')"></div><!--my-favorite-->';

                $('.favorite').append(my_favorite);
            }
        },'json')
    }


</script>