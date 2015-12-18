/**
 * Created by user on 04.11.2015.
 */
var details = {
    init: function () {
        // Accordions
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
        }); // END Accordions

        //owl-carousel details-page

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");

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
            $("#sync2")
                .find(".owl-item")
                .removeClass("synced")
                .eq(current)
                .addClass("synced");
            if ($("#sync2").data("owlCarousel") !== undefined) {
                center(current)
            }
        }

        $("#sync2").on("click", ".owl-item", function (e) {
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
        } // END owl-carousel

        // Disable Flight related Fields when choosing Hotel
        $("#hotelRadioButton").click(function () {

            $('#flug-option-left').addClass("disabledMode");
            $('#flug-option-left').prop('disabled', true);
            $('#flug-option-left-icon').addClass("disabledMode-icon");

            $('#abflugVon').addClass("disabledMode");
            $('#abflugVon').prop('disabled', true);
            $('#abflugVon-icon').addClass("disabledMode-icon");

            $('#ruckflugzeit').addClass("disabledMode");
            $('#ruckflugzeit').prop('disabled', true);
            $('#ruckflugzeit-icon').addClass("disabledMode-icon");

            $('#nur-fluge-text').addClass("disabledMode-icon");

            $('#nurDirektflugeCheckBox').addClass("disabledMode");
            $('#nurDirektflugeCheckBox').prop('disabled', true);

            $('#abflugzeit').addClass('disabledMode');
            $('#abflugzeit').prop('disabled', true);

            $('#rueckflugzeit').addClass('disabledMode');
            $('#rueckflugzeit').prop('disabled', true);

        });

        $("#flugAndHotelRadioButton").click(function () {

            $('#flug-option-left').removeClass("disabledMode");
            $('#flug-option-left').prop('disabled', false);
            $('#flug-option-left-icon').removeClass("disabledMode-icon");
            $('#abflugVon').removeClass("disabledMode");
            $('#abflugVon').prop('disabled', false);
            $('#abflugVon-icon').removeClass("disabledMode-icon");

            $('#ruckflugzeit').removeClass("disabledMode");
            $('#ruckflugzeit').prop('disabled', false);
            $('#ruckflugzeit-icon').removeClass("disabledMode-icon");

            $('#ruckflugzeit-icon').removeClass("disabledMode");

            $('#nur-fluge-text').removeClass("disabledMode-icon");

            $('#nurDirektflugeCheckBox').removeClass("disabledMode");
            $('#nurDirektflugeCheckBox').prop('disabled', false);

            $('#abflugzeit').removeClass('disabledMode');
            $('#abflugzeit').prop('disabled', false);

            $('#rueckflugzeit').removeClass('disabledMode');
            $('#rueckflugzeit').prop('disabled', false);
        });

        // Open/close "reiseteilnehmer" -tab
        $('#reiseteilnehmer').click(function () {
            $('.datum-tabs-reiseteilnehmer').fadeToggle();
        });

        $('.close-form-reiseteilnehmer').click(function () {
            $('.datum-tabs-reiseteilnehmer').fadeOut();
        });

        $('#getDetailsDate').click(function () {
            var abreisedatum = $('#date-picker6').val();
            var ruckreisedatum = $('#date-picker7').val();

            if (abreisedatum != "" && ruckreisedatum != "") {
                var value = abreisedatum + " | " + ruckreisedatum;
                $('#datum-id-left').val(value);
                $('.date-dropdown-filter').fadeToggle();
            } else
                alert("Please select both values");
        });

        $('#flexButton').click(function () {
            var abreisedatum = $('#date-picker8').val();
            var ruckreisedatum = $('#date-picker9').val();
            var nights = $('#reisedauer2').val();

            if (abreisedatum != "" && ruckreisedatum != "") {
                if (nights > 1)
                    var value = abreisedatum + " | " + ruckreisedatum + " | " + nights + " Nächte";

                else
                    var value = abreisedatum + " | " + ruckreisedatum + " | " + nights + " Nacht";


               // var value = abreisedatum + " | " + ruckreisedatum;
                $('#datum-id-left').val(value);
                $('.date-dropdown-filter').fadeToggle();
            } else
                alert("Please select both values");
        });

        $('#datum-id-left').click(function() {
           $('.date-dropdown-filter').fadeToggle();
        });

        // TODO: Is this a desirable function? If so refine and reimplement
        /*$('#flexButton').click(function () {
            alert('button clicked');
            var abreisedatum = $('#date-picker8').val();
            var ruckreisedatum = $('#date-picker9').val();
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
        });*/


    }
};
$(document).ready(function () {
    window.details.init();
}); // document.ready