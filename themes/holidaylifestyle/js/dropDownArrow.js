$(document).ready(function () {
    $('.close-sub-div').each(function () {
        $(this).click(function () {
            $(this).parent().slideUp();
            $(this).parent().parent().parent().children('.drop_button_flugafen_up').hide();
            $(this).parent().parent().parent().children('.drop_button_flugafen_down').show();
        });
    });
    $('.drop_button_flugafen_down').each(function () {
        $(this).click(function () {
            $('.sub-div-white').hide();
            $('.drop_button_flugafen_up').hide();
            $(this).siblings('.table-row').children('.sub-div-white').slideDown();
            $(this).hide();
            $(this).next().show();
            $('.drop_button_flugafen_down').not(this).show();
            $('html, body').animate({scrollTop: ($(this).closest('.flugafen-row').offset().top - $(".fixed-header").height())}, 'slow');
        });
    });

    $('.drop_button_flugafen_up').each(function () {
        $(this).click(function () {
            $(this).siblings('.table-row').children('.sub-div-white').slideUp();
            $(this).hide();
            $(this).prev().show();
        });
    });
});
