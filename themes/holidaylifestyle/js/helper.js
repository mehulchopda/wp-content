$(function() {
	// loader gif.
	$(window).load(function() {
		$(".loader").fadeOut("slow");
	});

	// wrap menu items for positioning.
	$('.nav-outer .menu li').wrap('<div></div>');
	$('.parent').appendTo('.content');

	// toggle journey types.
	$('#von-icon-outer').click(function() {
		$('.journeytype').val('JOURNEY');
		$(this).toggleClass('icon-active');
		if ($('#hotel-icon-outer').hasClass('icon-active')) {
			$('#hotel-icon-outer').toggleClass('icon-active');
		}

	});

	$('#hotel-icon-outer').click(function() {
		$('.journeytype').val('HOTEL');
		$(this).toggleClass('icon-active');
		if ($('#von-icon-outer').hasClass('icon-active')) {
			$('#von-icon-outer').toggleClass('icon-active');
		}

	});

	// write the "sonstiges" values to the input field.
	$('.sonstiges_uebernehmen, .sonstiges_uebernehmen2').click(function() {
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

	// remove thumbnail class from parent img.
	$('.parent img').removeClass('thumbnail');

	// append children to the right parent.
	$('.children').each(function() {
		var that = $(this);
		$('.parent').each(function() {
			if (that.children('.countryId').html() == $(this).children('.countryId').html()) {
				that.appendTo($(this).children('.hotels-show'));
			}
		});
	});

	/*$('.children .owl-controls').each(function () {
	this.style.setProperty( 'display', 'block', 'important' );
	});*/

	// change the text from the parent elements based on the number of child elements.
	function countHotels() {
		$('.parent').each(function () {
			var hotels = $(this).find('.children').length;
			var count = $(this).find('.hotelCount');
			if (hotels < 2) {
				count.html(hotels + ' Hotel');
			} else {
				count.html(hotels + ' Hotels');
			}
		});
	}
	countHotels();

	// filter the hotels on click of the equivalent country.
	$('.dropdown-content a').each(function() {
		$(this).click(function() {

			var countryClass = $(this).attr("class");
			for (var i = 0; i < $('.parent .countryId').length; i++) {
				if ($('.parent .countryId').eq(i).html() != countryClass) {
					$('.parent .countryId').eq(i).parent().fadeOut();
				}
			}
		});
	});

	//scroll to the hotelslist.
	$("[id^=continent]").siblings().children().children().click(function() {
		$('html, body').animate({
			scrollTop : $(".parent").eq(0).offset().top
		}, 2000);
	});

	$("[id^=continent]").click(function() {
		$('html, body').animate({
			scrollTop : $(".parent").eq(0).offset().top
		}, 2000);
	});

	// add country-shortcode as class to the parent elem for filtering.
	$("[id^=continent]").siblings().children().children().each(function(i) {
		var countryClass = $(this).attr('class');
		var continent = $(this).parent().parent().siblings("[id^=continent]");
		continent.addClass(countryClass);
	});

	// filter for continents.
	$("[id^=continent]").click(function() {
		$('.parent').fadeOut('slow');
		var classList = $(this).attr('class').split(/\s+/);
		for (var i = 0; i < $('.parent').length; i++) {
			var tmpParent = $('.parent').eq(i).find('.countryId').eq(0);
			for (var j = 0; j < classList.length; j++) {
				if (tmpParent.html() == classList[j]) {
					tmpParent.parent().fadeIn();
				}
			}
		}
	});

	// show the lowest price off all child elements on the parent element.
	$('.parent').each(function() {
		var price = $(this).find('.minPrice').html();
		$(this).children().find('.hotels_offer').html('ab &euro; ' + price);
	});

	// hide the parent element if it has no child elements.
	$('.hotelCount').each(function() {
		if ($(this).html() == '0 Hotel') {
			var parent = $(this).closest('.parent');
			parent.hide();
		}
	});
	// append the footer to the body.
	$('.footer').appendTo('body');

	// hotel-details dont loop, get single post...so long:
	$('.hotel-details').hide();
	$('.hotel-details').eq(0).show();

	// spacing for owl-carousel items.
	$('.children .item').css({
		'margin' : '2px 2px 0 2px',
		'cursor' : 'pointer'
	});
	
	// spacing if owl pagination is not showing.
	function owlMargin() {
		$('.children .owl-wrapper').each(function() {
			var len = $(this).children().length;
			if (len <= 4) {
				$(this).closest('.children').next().css('margin-top', '33px');
			}
		});
	}
	// set Timeout to wait until owl-carousel is initialized.
	setTimeout(owlMargin, 1000);

	// keep the datepicker visible until click outside

	// hotel-details.
	$('#getNumOfPersons').click(function () {
		numPerson = $('#persons').val();
		var kids = [
			$('#chooseKids').parent().parent().find('.onekid input').val().length,
			$('#chooseKids').parent().parent().find('.twokid input').val().length,
			$('#chooseKids').parent().parent().find('.threekid input').val().length,
			$('#chooseKids').parent().parent().find('.fourkid input').val().length
		];
		var numKids = 0;
		for (var i=0; i<kids.length; i++) {
			if (kids[i] !== 0) numKids++;
		}

		if (numKids == '0') {
			var str_kind = ' Kinder';
		} else if (numKids > '1') {
			var str_kind = ' Kinder';

		} else {
			var str_kind = ' Kind';
		}
		if (numPerson > '1') {
			var str_person = 'Erwachsene ';
		} else {
			var str_person = 'Erwachsener ';
		}
		$('#reiseteilnehmer').val(numPerson + ' ' + str_person + ' | ' + numKids + str_kind);
	});

	// header.
	$('.sonstiges_uebernehmen').click(function () {
		numPerson = $('.persons').val();
		var kids = [
			$('#chooseKids2').parent().parent().find('.onekid input').val().length,
			$('#chooseKids2').parent().parent().find('.twokid input').val().length,
			$('#chooseKids2').parent().parent().find('.threekid input').val().length,
			$('#chooseKids2').parent().parent().find('.fourkid input').val().length
		];
		var numKids = 0;
		for (var i=0; i<kids.length; i++) {
			if (kids[i] !== 0) numKids++;
		}

		if (numKids == '0') {
			var str_kind = ' Kinder';
		} else if (numKids > '1') {
			var str_kind = ' Kinder';

		} else {
			var str_kind = ' Kind';
		}
		if (numPerson > '1') {
			var str_person = 'Erwachsene ';
		} else {
			var str_person = 'Erwachsener ';
		}
		$('#sonstiges').val(numPerson + ' ' + str_person + ' | ' + numKids + str_kind);
	});

	// detailsHeader.
	$('.sonstiges_uebernehmen2').click(function () {
		numPerson = $('.persons').val();
		var kids = [
			$('#chooseKids3').parent().parent().find('.onekid input').val().length,
			$('#chooseKids3').parent().parent().find('.twokid input').val().length,
			$('#chooseKids3').parent().parent().find('.threekid input').val().length,
			$('#chooseKids3').parent().parent().find('.fourkid input').val().length
		];
		var numKids = 0;
		for (var i=0; i<kids.length; i++) {
			if (kids[i] !== 0) numKids++;
		}

		if (numKids == '0') {
			var str_kind = ' Kinder';
		} else if (numKids > '1') {
			var str_kind = ' Kinder';

		} else {
			var str_kind = ' Kind';
		}
		if (numPerson > '1') {
			var str_person = 'Erwachsene ';
		} else {
			var str_person = 'Erwachsener ';
		}
		$('#sonstiges2').val(numPerson + ' ' + str_person + ' | ' + numKids + str_kind);
	});

	$('#chooseKids, #chooseKids2, #chooseKids3').change(function () {
		if ($(this).val() == '1') {
			$('.onekid').show();
			$('.twokid, .threekid, .fourkid').hide();
		} else if ($(this).val() == '2') {
			$('.onekid, .twokid').show();
			$('.threekid, .fourkid').hide();
		} else if ($(this).val() == '3') {
			$('.onekid, .twokid, .threekid').show();
			$('.fourkid').hide();
		} else if ($(this).val() == '4') {
			$('.onekid, .twokid, .threekid, .fourkid').show();
		} else {
			$('.onekid, .twokid, .threekid, .fourkid').hide();
		}
		$('#chooseKids').val($(this).val());
		$('#chooseKids2').val($(this).val());
		$('#chooseKids3').val($(this).val());
	});


	$('#table_data').hide();
	$('#booking-tab').on('click', function() {
		$('#table_data').show();
	});
	$('#details-tab, #umgebung-tab, #klima-tab').on('click', function() {
		$('#table_data').hide();
	});



});

