$(function() {

    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });

    $('.nav-outer .menu li').wrap('<div></div>');
    $('.parent').appendTo('.content');

    /*var syncCount = $('[id^=sync]').length;
     var sync = $('[id^=sync]');
     sync.each(function() {
     syncCount++;
     $(this).attr('id', 'sync' + syncCount);
     });*/

    $('.parent').each(function() {
        var hotels = $(this).find('.children').length;
        var count = $(this).find('.hotelCount');
        count.html(hotels + ' Hotels');
    });

    $('#von-icon-outer').click(function() {
        $('.journeytype').val('JOURNEY');
        $(this).toggleClass('icon-active');
        if ($('#hotel-icon-outer').hasClass('icon-active')) {
            $('#hotel-icon-outer').toggleClass('icon-active');
        }
    })

    $('#hotel-icon-outer').click(function() {
        $('.journeytype').val('HOTEL');
        $(this).toggleClass('icon-active');
        if ($('#von-icon-outer').hasClass('icon-active')) {
            $('#von-icon-outer').toggleClass('icon-active');
        }
    });

    $('.sonstiges_uebernehmen').click(function() {
        var persons = $('.persons').val();
        var personsText = $('.persons :selected').text();
        var children = $('.children').val();
        var childrenText = $('.children :selected').text();
        var catering = $('.catering').val();
        var cateringText = $('.catering :selected').text();

        $('.getCatering').val(catering);
        $('.getPersons').val(persons);
        $('.getChildren').val(children);
        $('#sonstiges').val(cateringText + ' | ' + personsText + ' | ' + childrenText);
    });

    $('.footer').appendTo('body');
});
