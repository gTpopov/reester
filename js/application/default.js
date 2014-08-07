$(function(){

    $('.slct').click(function(){

        var dropBlock = $(this).next('.drop');
        $('.drop').slideUp(250).prev('.slct').removeClass('active');

        if( dropBlock.is(':hidden') ) {

            dropBlock.slideDown(300);

            $(this).addClass('active');

            $('.drop').children('li').click(function(){

                var selectResult = $(this).children('span');

                $(this).parent().parent().find('input').val(selectResult.attr('data-value'));

                $(this).parent().parent().find('.slct').removeClass('active').html(selectResult.text());

                dropBlock.slideUp(250);

            });

        } else {

            $(this).removeClass('active');
            dropBlock.slideUp(250);

        }

        return false;

    });

    $(document).click(function(event) {
        if ($(event.target).closest(".slct").length) return;
        $('.drop').slideUp(250).prev('.slct').removeClass('active');
        event.stopPropagation();
    });

});




