$(function(){

    $('#chose-price').click(function(){
        if($('#popover-price').is(':hidden')){
            $(this).addClass('active').next('span').children('#popover-price').show();
        }else{
            $(this).removeClass('active').next('span').children('#popover-price').hide();
        }

    });

    $("#fl-help").tooltip();


    $(document).click(function(event) {
        if ($(event.target).closest("#chose-price").length || $(event.target).closest('.keeper-effect-toogle').length) return;
        $("#chose-price").removeClass('active'); $('#popover-price').hide();
        event.stopPropagation();
    });

});