<script>
    $('.display-type .type2').click(function () {
        $('#products').addClass('display');
        $(this).addClass('active-type2');
        $('.display-type .type1').addClass('deactive-type1');
        $('.display-type .type1').removeClass('active-type1');
    });

    $('.display-type .type1').click(function () {
        $('#products').removeClass('display');
        $('.display-type .type2').removeClass('active-type2');
        $('.display-type .type1').addClass('active-type1');

    })


    $('.exist').click(function () {
        $(this).toggleClass('active');
if ($(this).hasClass('active')){
    $('.exist-yesno',this).animate({'left':'11px'},400);
}else{
    $('.exist-yesno',this).animate({'left':'0px'},400);
}

    })


</script>