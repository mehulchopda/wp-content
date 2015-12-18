// JavaScript Document

$(function() {
	$('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function() {

	$('.sonstiges_uebernehmen').click(function() {
		$('.sonstiges-dropdown').hide();
	});

	$("[id^=date-picker]").on('change', function() {
		$('.dropdown-menu').hide();
	});

	if ($(window).width() <= 767) {
		//debugger;
		$('#contentOutside').removeAttr('style');
	} else {
		$('#contentOutside').css("margin-top", $(".fixed-header").height());
	}

	$(".burger_icon").click(function() {
		$(".navigation").slideToggle("slow", function() {
			// Animation complete.
		});
	});

	$('#datum-id, .datum-icon').click(function() {
		$('.date-dropdown').fadeToggle();
	});

	$('#datum-id-fixed').click(function() {
		$('.date-dropdown-fixed').fadeToggle();
	});

	$('.close-form-dropdown').click(function() {
		$('.date-dropdown').fadeOut();
	});

	$('.device-search-tab').click(function() {
		$('.travel-form').slideToggle("slow", function() {
			// Animation complete.
		});
	});

	$('.device-continent-tab').click(function() {
		$('.slide_nav').slideToggle("slow", function() {
			// Animation complete.
		});
	});

	$('#sonstiges').click(function() {
		$('.sonstiges-dropdown').fadeToggle();
	});

	$('.close-sonstigs-dropdown').click(function() {
		$('.sonstigs-dropdown').fadeOut();
	});

	$('.scroll-burger').click(function() {
		$('.burger-content').toggleClass("show");
	});

	var go = true;
	$(window).scroll(function() {
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
		navigation : true,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : true
		// "singleItem:true" is a shortcut for:
		// items : 1,
		// itemsDesktop : false,
		// itemsDesktopSmall : false,
		// itemsTablet: false,
		// itemsMobile : false
	});

});

$(document).ready(function() {
	var secondSync = 1;
	//$("[id^=sync]").each(function (i) {
	$('[class^="sync"]').each(function(i) {
		var sync1 = $('.sync' + i);
		var sync2 = $('.sync' + secondSync);
		sync1.owlCarousel({
			singleItem : true,
			slideSpeed : 1000,
			navigation : true,
			pagination : false,
			afterAction : syncPosition,
			responsiveRefreshRate : 200,
		});

		sync2.owlCarousel({
			items : 4,
			itemsDesktop : [1199, 4],
			itemsDesktopSmall : [979, 4],
			itemsTablet : [768, 3],
			itemsMobile : [479, 2],
			pagination : true,
			responsiveRefreshRate : 100,
			afterInit : function(el) {
				el.find(".owl-item").eq(0).addClass("synced");
			}
		});

		function syncPosition(el) {
			var current = this.currentItem;
			$(".sync" + secondSync).find(".owl-item").removeClass("synced").eq(current).addClass("synced");
			if ($(".sync" + secondSync).data("owlCarousel") !== undefined) {
				center(current)
			}
		}


		$(".sync" + secondSync).on("click", ".owl-item", function(e) {
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

		i = i + 2;
		secondSync = secondSync + 2;
	});
});

$('#button-click').click(function() {

	var abreisedatum = $('#date-picker3').val();
	var ruckreisedatum = $('#date-picker4').val();

	if (abreisedatum != "" && ruckreisedatum != "") {
		var value = abreisedatum + " | " + ruckreisedatum;
		$('#datum-id').val(value);
		$('.date-dropdown').fadeToggle();
	} else
		alert("Please select both values");

});

$('#flexibleDatenUbernehmen').click(function() {

	var abreisedatum = $('#date-picker1').val();
	var ruckreisedatum = $('#date-picker2').val();
	var nights = $('#ruckreisedatum').val();

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

$('.drop_button_down').click(function() {
	$('.hotels-show').hide();
	$('.drop_button_up').hide();
	$('.drop_button_down').show();
	$(this).closest('.country_details').children('.hotels-show').slideDown();
	$(this).closest('.country_details').children('.drop_button_down').hide();
	$(this).closest('.country_details').children('.drop_button_up').show();
	$(".drop_buutton_up").css({
		"display" : "block"
	});
	$('html, body').animate({
		scrollTop : $(this).closest('.country_details').position().top
	}, 'slow');

});

$('.drop_button_up').click(function() {
	$('.hotels-show').slideUp();
	$(this).closest('.country_details').children('.hotels-show').slideUp();
	$(this).closest('.country_details').children('.drop_button_up').hide();
	$(this).closest('.country_details').children('.drop_button_down').show();
});

$('#date-picker1').datepicker({
	format : "dd/mm/yyyy"
});
$('#date-picker2').datepicker({
	format : "dd/mm/yyyy"
});
$('#date-picker3').datepicker({
	format : "dd/mm/yyyy",
});
$('#date-picker4').datepicker({
	format : "dd/mm/yyyy"
});
$('#date-picker5').datepicker({
	format : "dd/mm/yyyy"
});



$(window).resize(function() {
	$('.content-outside').css("margin-top", $(".fixed-header").height());

	if ($(window).width() <= 767) {
		//debugger;
		$('#contentOutside').removeAttr('style');
	} else {
		$('#contentOutside').css("margin-top", $(".fixed-header").height());
	}
});
