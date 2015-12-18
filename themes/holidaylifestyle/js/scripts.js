// JavaScript Document

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function () {
    $('.sonstiges_uebernehmen, .sonstiges_uebernehmen2').click(function () {
        $('.sonstiges-dropdown').hide();
    });

    /*$("[id^=date-picker]").on('change', function() {
     $('.dropdown-menu').hide();
     });*/

    if ($(window).width() <= 767) {
        //debugger;
        $('#contentOutside').removeAttr('style');
    } else {
        $('#contentOutside').css("margin-top", $(".fixed-header").height());
    }

    $(".burger_icon").click(function () {
        $(".navigation").slideToggle("slow", function () {
            // Animation complete.
        });
    });

    $('#datum-id, .datum-icon').click(function () {
        $('.date-dropdown').fadeToggle();
    });

    $('#datum-id-fixed').click(function () {
        $('.date-dropdown-fixed').fadeToggle();
    });

    $('.close-form-dropdown').click(function () {
        $('.date-dropdown').fadeOut();
    });

    $('.device-search-tab').click(function () {
        $('.travel-form').slideToggle("slow", function () {
            // Animation complete.
        });
    });

    $('.device-continent-tab').click(function () {
        $('.slide_nav').slideToggle("slow", function () {
            // Animation complete.
        });
    });

    $('#sonstiges, #sonstiges2').click(function () {
        $('.sonstiges-dropdown').fadeToggle();
    });

    /*$('.close-sonstigs-dropdown').click(function() {
     $('.sonstigs-dropdown').fadeOut();
     });*/

    $('.scroll-burger').click(function () {
        $('.burger-content').toggleClass("show");
    });

    var go = true;
    $(window).scroll(function () {
        if ($(this).scrollTop() > 120 && go) {
            $(".scroll-burger").removeClass("nav-hidden");
            $(".navigation").addClass("burger-content show");
            $(".form-header").removeClass("scroll-form");
            go = false;
        } else if ($(this).scrollTop() < 120 && !go) {
            $(".navigation").removeClass("nav-hidden");
            $(".scroll-burger").addClass("nav-hidden");
            $(".navigation").removeClass("burger-content show");
            $(".form-header").addClass("scroll-form");
            go = true;
        }
    });

    $("[id^=owl-demo]").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false
    });

});

$(document).ready(function () {
    var len = $('[class^="sync"]').length;
    for (i = 0, j = 1; i <= len; i += 2, j += 2) {
        $('[class^="sync"]').each(function () {
            var sync1 = $('.sync' + i);
            var sync2 = $('.sync' + j);
            sync1.owlCarousel({
                singleItem: true,
                slideSpeed: 1000,
                navigation: true,
                pagination: false,
                afterAction: syncPosition,
                responsiveRefreshRate: 200,
            });

            sync2.owlCarousel({
                items: 4,
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 4],
                itemsTablet: [768, 3],
                itemsMobile: [479, 2],
                pagination: true,
                responsiveRefreshRate: 100,
                afterInit: function (el) {
                    el.find(".owl-item").eq(0).addClass("synced");
                }
            });

            function syncPosition(el) {
                var current = this.currentItem;
                $(".sync" + j).find(".owl-item").removeClass("synced").eq(current).addClass("synced");
                if ($(".sync" + j).data("owlCarousel") !== undefined) {
                    center(current)
                }
            }


            $(".sync" + j).on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).data("owlItem");
                sync1.trigger("owl.goTo", number);
            });

            function center(number) {
                var sync2visible = sync2.data("owlCarousel").owl.visibleItems;

                var num = number;
                var found = false;
                for (var i in sync2visible) {
                    if (num === sync2visible[i]) {
                        var found = true;
                    }
                }

                if (found === false) {
                    if (num > sync2visible[sync2visible.length - 1]) {
                        sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                    } else {
                        if (num - 1 === -1) {
                            num = 0;
                        }
                        sync2.trigger("owl.goTo", num);
                    }
                } else if (num === sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", sync2visible[1])
                } else if (num === sync2visible[0]) {
                    sync2.trigger("owl.goTo", num - 1)
                }
            }
        });
    }
});
$('#button-click').click(function () {

    var abreisedatum = $('#date-picker3').val();
    var ruckreisedatum = $('#date-picker4').val();

    if (abreisedatum != "" && ruckreisedatum != "") {
        var value = abreisedatum + " | " + ruckreisedatum;
        $('#datum-id').val(value);
        $('.date-dropdown').fadeToggle();
    } else
        alert("Please select both values");

});

$('#flexibleDatenUbernehmen').click(function () {

    var abreisedatum = $('#date-picker1').val();
    var ruckreisedatum = $('#date-picker2').val();
    var nights = $('#reisedauer').val();

    if (abreisedatum != "" && ruckreisedatum != "" && nights != "") {
        if (nights > 1)
            var value = abreisedatum + " | " + ruckreisedatum + " | " + nights + " Nächte";

        else
            var value = abreisedatum + " | " + ruckreisedatum + " | " + nights + " Nacht";

        $('#datum-id').val(value);
        $('.date-dropdown').fadeToggle();
    } else
        alert("Please select all values");

});

$('.drop_button_down').click(function () {
    $('.hotels-show').hide();
    $('.drop_button_up').hide();
    $('.drop_button_down').show();
    $(this).closest('.country_details').children('.hotels-show').slideDown();
    $(this).closest('.country_details').children('.drop_button_down').hide();
    $(this).closest('.country_details').children('.drop_button_up').show();
    $(".drop_buutton_up").css({
        "display": "block"
    });
    $('html, body').animate({
        scrollTop: $(this).closest('.country_details').position().top
    }, 'slow');

});

$('.drop_button_up').click(function () {
    $('.hotels-show').slideUp();
    $(this).closest('.country_details').children('.hotels-show').slideUp();
    $(this).closest('.country_details').children('.drop_button_up').hide();
    $(this).closest('.country_details').children('.drop_button_down').show();
});

$('#reisedauer').on('change', function () {
    if ($('#reisedauer').val() === $('#reisedauer2').val()) return;
    $('#reisedauer2').val($(this).val());
});
$('#reisedauer2').on('change', function () {
    if ($('#reisedauer').val() === $('#reisedauer2').val()) return;
    $('#reisedauer').val($(this).val());
});

$(document).on('click', function (e) {
    var target = $(e.target);
    var onDropdown = target.parents('.date-dropdown').length || target.parents('.date-dropdown-filter').length || target.parents('.datum-tabs-reiseteilnehmer').length || target.parents('.sonstiges-dropdown').length;
    var isDropdown = target.hasClass('.date-dropdown') || target.hasClass('.date-dropdown-filter') || target.hasClass('.datum-tabs-reiseteilnehmer') || target.hasClass('.sonstiges-dropdown');
    var isTrigger = target.attr('id') === 'datum-id' || target.attr('id') === 'datum-id-left' || target.attr('id') === 'reiseteilnehmer' || target.attr('id') === 'sonstiges' || target.attr('id') === 'sonstiges2' ? true : false;
    var isDay = target.hasClass('day');
    var isDow = target.hasClass('dow');
    var isPrev = target.hasClass('prev');
    var isNext = target.hasClass('next');
    var isDatepickerSwitch = target.hasClass('datepicker-switch')
    var isTableCondensed = target.hasClass('table-condensed');
    var isDatepicker = target.hasClass('datepicker');
    var isMonth = target.hasClass('month');
    var isYear = target.hasClass('year');
    if (
        !onDropdown && !isDropdown && !isTrigger && !isDay && !isDow && !isPrev && !isNext && !isDatepickerSwitch && !isTableCondensed && !isDatepicker && !isMonth && !isYear
    ) {
        $('.date-dropdown').fadeOut();
        $('.date-dropdown-filter').fadeOut();
        $('.datum-tabs-reiseteilnehmer').fadeOut();
        $('.sonstiges-dropdown').fadeOut();
    }
    if (target.attr('id') === 'sonstiges') {
        $('.date-dropdown').fadeOut();
        $('.datum-tabs-reiseteilnehmer').fadeOut();
        $('.date-dropdown-filter').fadeOut();
    }
    if (target.attr('id') === 'sonstiges2') {
        $('.date-dropdown').fadeOut();
        $('.datum-tabs-reiseteilnehmer').fadeOut();
        $('.date-dropdown-filter').fadeOut();
    }
    if (target.attr('id') === 'datum-id') {
        $('.sonstiges-dropdown').fadeOut();
        $('.datum-tabs-reiseteilnehmer').fadeOut();
        $('.date-dropdown-filter').fadeOut();
    }
    if (target.attr('id') === 'reiseteilnehmer') {
        $('.date-dropdown').fadeOut();
        $('.date-dropdown-filter').fadeOut();
        $('.sonstiges-dropdown').fadeOut();
    }
    if (target.attr('id') === 'datum-id-left') {
        $('.date-dropdown').fadeOut();
        $('.datum-tabs-reiseteilnehmer').fadeOut();
        $('.sonstiges-dropdown').fadeOut();
    }
    // TODO: If datepicker is open and you click on the owl-carousel, the datepicker won't close.
    // TODO: Code has to be refactored !
});

// minimum date is tomorrow
var startDate = new Date();
startDate.setDate(startDate.getDate() + 1);

$('#date-picker1').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});
$('#date-picker2').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});
$('#date-picker3').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});
$('#date-picker4').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});
$('#date-picker6').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});

$('#date-picker7').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});

$('#date-picker8').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});

$('#date-picker9').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});
$('#date-picker11').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,

});
$('#date-picker12').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,

});
$('#date-picker13').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,

});
$('#date-picker14').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,

});
$('#date-picker15').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true

});
$('#date-picker16').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true

});
$('#date-picker17').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true

});
$('#date-picker18').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true

});
$('#date-picker19').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});
$('#date-picker20').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});
$('#date-picker21').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});
$('#date-picker22').datepicker({
    format: "dd/mm/yyyy",
    orientation: "auto",
    autoclose: true,
    startDate: startDate
});


$(window).resize(function () {
    $('.content-outside').css("margin-top", $(".fixed-header").height());

    if ($(window).width() <= 767) {
        //debugger;
        $('#contentOutside').removeAttr('style');
    } else {
        $('#contentOutside').css("margin-top", $(".fixed-header").height());
    }
});
//Javascript for Hotel-Deyails

$('#von-icon-outer-left').click(function () {
    $("#von-icon-outer-left").toggleClass("icon-active");
});

$('#hotel-icon-outer-left').click(function () {
    $("#hotel-icon-outer-left").toggleClass("icon-active");
});

$('#hotel-icon-outer-left').click(function () {
    $('.journeytype').val('HOTEL');
    $(this).toggleClass('icon-active');
    if ($('#von-icon-outer-left').hasClass('icon-active')) {
        $('#von-icon-outer-left').toggleClass('icon-active');
    }
});

// toggle journey types.
$('#von-icon-outer-left').click(function () {
    $('.journeytype').val('JOURNEY');
    $(this).toggleClass('icon-active');
    if ($('#hotel-icon-outer-left').hasClass('icon-active')) {
        $('#hotel-icon-outer-left').toggleClass('icon-active');
    }
});


/*$('#datum-id-left').click(function () {
 $('.date-dropdown-left').fadeToggle();
 $('.date-dropdown-filter').fadeToggle();
 });*/


$('.close-form-dropdown').click(function () {
    $('.date-dropdown').fadeOut();
    $('.date-dropdown-filter').fadeOut();
    $('.datum-tabs-reiseteilnehmer').fadeOut();
    $('.sonstiges-dropdown').fadeOut();
});


/*$('#datum-id-left').click(function () {

 });*/

$('.close-form-details-page').click(function () {
    $('.date-dropdown-filter').fadeOut();
});

$('#flug-option-left').click(function () {
    $('.datum-tabs-flugoption').fadeToggle();
});

$('.close-form-flugoption').click(function () {
    $('.datum-tabs-flugoption').fadeOut();
});




