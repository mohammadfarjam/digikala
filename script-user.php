<script>

    $('#main-user .content2 .head .btn-gray').click(function () {
        $('.dark').fadeIn(0);
        $('.add-address').fadeIn(0);


    });


    //این دستور برای بستن پنجره اضافه کردن آدرس می باشد
    $('.add-address .closee i').click(function () {
        $('.dark').fadeOut(0);
        $('.add-address').fadeOut(0);
    });


    function reset_add_address() {
        $('#main-user #add_address').trigger('reset');
        $('#main-user .state').val('');
        $('#main-user .city').val('');
        $('.selectpicker').selectpicker('refresh');
    };


    function addaddress() {
        var url = 'ajax_user2.php';
        var data = $('#add_address').serializeArray();
        $.post(url, data, function (msg) {
            window.location = 'user2.php';
        })
    };


    function editaddress(id) {
        $('.dark').fadeIn(0);
        $('.add-address').fadeIn(0);
        var url = 'ajax_user2_editaddress.php';
        var data = {id: id};
        $.post(url, data, function (edit) {
            $('input[name=name_delivery]').val(edit['name_delivery']);
            $('input[name=mobile]').val(edit['mobile']);
            $('input[name=tel]').val(edit['tel']);
            $('textarea[name=address]').val(edit['address']);
            $('input[name=zip_code]').val(edit['zip_code']);
            $('input[name=id]').val(edit['id']);
            var state = edit['state'];
            var city = edit['city'];

            $('.state option').each(function () {
                var txt = $(this).text();
                if (txt == state) {
                    $(this).attr('selected', 'selected');
                    $('.selectpicker').selectpicker('refresh');
                    ostan($('.state'));
                }
            });

            $('.city option').each(function () {
                var txt = $(this).text();
                if (txt == city) {
                    $(this).attr('selected', 'selected');
                    $('.selectpicker').selectpicker('refresh');
                }
            });
        }, 'json');

    }


    function delete_address(id) {
        var url = 'ajax_delete_address.php';
        var data = {id: id};
        $.post(url, data, function (address) {
            createaddress(address);
        }, 'json')

    };


    function createaddress(address) {
        $('table tbody').remove();
        $('#main-user .send-types').remove();
        var i = 0;
        var len_address = address.length;
        for (i = 0; i < len_address; i++) {
            var name_delivery = address[i]['name_delivery'];
            var state = address[i]['state'];
            var city = address[i]['city'];
            var addre = address[i]['address'];
            var mobile = address[i]['mobile'];
            var tel = address[i]['tel'];
            var id = address[i]['id'];

            var table = '<table class="active_table addr" cellspacing="0" style="width: 95%;margin: auto;margin-bottom: 15px;"><tr><td class="select_address" onclick="select_address(' + id + ');" rowspan="3" style="width: 60px;border-left: 1px solid #b6afaf;position: relative;"><span class="circle2"></span><span class="tick"><i></i></span></td><td colspan="3" style="border-left: none;"><span class="name">' + name_delivery + '</span></td><td rowspan="3" style="width: 40px;height: 103px;"><table cellspacing="0"><tr><td style="width: 52px;height: 70px;background:#96eeff;"><i class="img-edit" onclick="editaddress(' + id + ');"></i></td></tr><tr><td style="background:#ffceda;height: 70px;"><i class="img-delete" onclick="delete_address(' + id + ');"></i></td></tr></table></td></tr><tr><td style="width: 200px;padding: 5px;font-family: Yekan;font-size:12pt;border-left: 1px solid #b6afaf; ">استان :' + state + '</td><td rowspan="2" style="width: 550px;padding: 5px;font-family: Yekan;border-left: 1px solid #b6afaf;font-size:12pt; ">' + addre + '</td><td style="width: 200px;padding: 5px;font-family: Yekan;font-size:12pt;border-left: none; "> شماره همراه: ' + mobile + '</td></tr><tr><td style="width: 200px;padding: 5px;border-left: 1px solid #b6afaf;font-family: Yekan;font-size:12pt; "> شهر :' + city + '</td><td style="width: 200px;padding: 5px;font-family: Yekan;font-size:12pt;border-left: none; ">شماره تلفن ثابت :' + tel + '</td></tr></table>';
            $('.content2').append(table);
            $('.select_address').click(function () {
                $('.addr .select_address .circle2').removeClass('active_circle2');
                $('.addr .select_address .tick').removeClass('triangle');
                $('.circle2', this).addClass('active_circle2');
                $('.tick', this).addClass('triangle');
            })
        }

        var send_type = '<div class="send-types"><p>شیوه های ارسال</p><table class="active"><tr><td style="width: 60px;border-left: 1px solid #989191;"><span class="circle3 active"></span></td><td style="width: 900px;border-left: 1px solid #989191;"><img><p>پست پیشتاز (هزینه ارسال : طبق تعرفه پست)</p></td><td style="100px;"><span>هزینه ارسال </span><span2>50,000 تومان</span2></td></tr></table><table><tr><td style="width: 60px;border-left: 1px solid #989191;"><span class="circle3"></span></td><td style="width: 900px;border-left: 1px solid #989191;"><img class="img-barbari"><p>باربری (پس کرایه طبق تعرفه باربری | ویژه لوازم خانگی سنگین)</p></td><td style="100px;"><span>هزینه ارسال </span><span2>100,000 تومان</span2></td></tr></table></div><!--send-types-->';
        $('#main-user').append(send_type);
    }


    $('.select_address').click(function () {

        $('.addr .select_address .circle2').removeClass('active_circle2');
        $('.addr .select_address .tick').removeClass('triangle');
        $('.circle2', this).addClass('active_circle2');
        $('.tick', this).addClass('triangle');
    });


    function select_address(id) {
        var url = 'ajax_select_address.php';
        var data = {id: id};
        $.post(url, data, function (select_address) {
        })
    }


    function check_code_discount() {
        var code = $('#code').val();
        var price = $('input[name=price]').val();

        var url = 'ajax_check_code_discount.php';
        var data = {code: code};
        $.post(url, data, function (check_code) {


            var i;
            var length = check_code.length;
            for (i = 0; i < length; i++) {
                var cod = check_code[i]['code'];
                var percentage = check_code[i]['Percentage'];
            }
            if (length > 0) {
                var pay1 = price * percentage / 100;
                var pay2 = price - pay1;
                $('.payment-done a').text('');
                $('.payment-done a').append(pay2, ' تومان');
                $('input[name=price]').val(pay2);
                $('input[name=code_discount]').val(cod);
            }



            $('#code').click(function () {
                $(this).val('');
                $(this).removeClass('false_code_discount').removeClass('true_code_discount');
                $('.payment-done a').text('');
                $('.payment-done a').append(price, ' تومان');
                $('input[name=price]').val(price);
            });


            if (code = cod) {
                $('#code').removeClass('false_code_discount').addClass('true_code_discount');
            }
            else {
                $('#code').removeClass('true_code_discount').addClass('false_code_discount');
            }

        }, 'json')
    }

    function save_order() {
        $('.save_order').submit();
    }


</script>