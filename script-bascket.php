<script>
//این دستور برای باز و بسته شدن قسمت option می باشد
    $('.your-shop table .tedad').click(function () {
        $('.option',this).fadeToggle(0);
    });


// این دستور برای عوض کردن تعداد می باشد
     $('.your-shop table .tedad .option li').click(function () {
         var txt=$(this).text();
         $('.your-shop table .tedad .text').text(txt);
     });



</script>